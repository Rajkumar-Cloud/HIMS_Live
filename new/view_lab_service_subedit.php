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
$view_lab_service_sub_edit = new view_lab_service_sub_edit();

// Run the page
$view_lab_service_sub_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_sub_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_lab_service_subedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_lab_service_subedit = currentForm = new ew.Form("fview_lab_service_subedit", "edit");

	// Validate form
	fview_lab_service_subedit.validate = function() {
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
			<?php if ($view_lab_service_sub_edit->Id->Required) { ?>
				elm = this.getElements("x" + infix + "_Id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->Id->caption(), $view_lab_service_sub_edit->Id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->CODE->caption(), $view_lab_service_sub_edit->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->SERVICE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->SERVICE->caption(), $view_lab_service_sub_edit->SERVICE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->UNITS->Required) { ?>
				elm = this.getElements("x" + infix + "_UNITS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->UNITS->caption(), $view_lab_service_sub_edit->UNITS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->AMOUNT->Required) { ?>
				elm = this.getElements("x" + infix + "_AMOUNT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->AMOUNT->caption(), $view_lab_service_sub_edit->AMOUNT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->SERVICE_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->SERVICE_TYPE->caption(), $view_lab_service_sub_edit->SERVICE_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->DEPARTMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_DEPARTMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->DEPARTMENT->caption(), $view_lab_service_sub_edit->DEPARTMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->Modified->Required) { ?>
				elm = this.getElements("x" + infix + "_Modified");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->Modified->caption(), $view_lab_service_sub_edit->Modified->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->ModifiedDateTime->caption(), $view_lab_service_sub_edit->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->mas_services_billingcol->Required) { ?>
				elm = this.getElements("x" + infix + "_mas_services_billingcol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->mas_services_billingcol->caption(), $view_lab_service_sub_edit->mas_services_billingcol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->DrShareAmount->caption(), $view_lab_service_sub_edit->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_edit->DrShareAmount->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_edit->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->HospShareAmount->caption(), $view_lab_service_sub_edit->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_edit->HospShareAmount->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_edit->DrSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->DrSharePer->caption(), $view_lab_service_sub_edit->DrSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_edit->DrSharePer->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_edit->HospSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->HospSharePer->caption(), $view_lab_service_sub_edit->HospSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_edit->HospSharePer->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->HospID->caption(), $view_lab_service_sub_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->TestSubCd->caption(), $view_lab_service_sub_edit->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->Method->caption(), $view_lab_service_sub_edit->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->Order->caption(), $view_lab_service_sub_edit->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_edit->Order->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_edit->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->Form->caption(), $view_lab_service_sub_edit->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->ResType->caption(), $view_lab_service_sub_edit->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->UnitCD->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->UnitCD->caption(), $view_lab_service_sub_edit->UnitCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->RefValue->Required) { ?>
				elm = this.getElements("x" + infix + "_RefValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->RefValue->caption(), $view_lab_service_sub_edit->RefValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->Sample->caption(), $view_lab_service_sub_edit->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->NoD->caption(), $view_lab_service_sub_edit->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_edit->NoD->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_edit->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->BillOrder->caption(), $view_lab_service_sub_edit->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_edit->BillOrder->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_edit->Formula->Required) { ?>
				elm = this.getElements("x" + infix + "_Formula");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->Formula->caption(), $view_lab_service_sub_edit->Formula->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->Inactive->caption(), $view_lab_service_sub_edit->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->Outsource->Required) { ?>
				elm = this.getElements("x" + infix + "_Outsource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->Outsource->caption(), $view_lab_service_sub_edit->Outsource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->CollSample->caption(), $view_lab_service_sub_edit->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->TestType->caption(), $view_lab_service_sub_edit->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->NoHeading->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHeading");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->NoHeading->caption(), $view_lab_service_sub_edit->NoHeading->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->ChemicalCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->ChemicalCode->caption(), $view_lab_service_sub_edit->ChemicalCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->ChemicalName->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->ChemicalName->caption(), $view_lab_service_sub_edit->ChemicalName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->Utilaization->Required) { ?>
				elm = this.getElements("x" + infix + "_Utilaization");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->Utilaization->caption(), $view_lab_service_sub_edit->Utilaization->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_edit->Interpretation->Required) { ?>
				elm = this.getElements("x" + infix + "_Interpretation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_edit->Interpretation->caption(), $view_lab_service_sub_edit->Interpretation->RequiredErrorMessage)) ?>");
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
	fview_lab_service_subedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_service_subedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_lab_service_subedit.lists["x_UNITS"] = <?php echo $view_lab_service_sub_edit->UNITS->Lookup->toClientList($view_lab_service_sub_edit) ?>;
	fview_lab_service_subedit.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_sub_edit->UNITS->lookupOptions()) ?>;
	fview_lab_service_subedit.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_service_sub_edit->SERVICE_TYPE->Lookup->toClientList($view_lab_service_sub_edit) ?>;
	fview_lab_service_subedit.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_service_sub_edit->SERVICE_TYPE->lookupOptions()) ?>;
	fview_lab_service_subedit.lists["x_DEPARTMENT"] = <?php echo $view_lab_service_sub_edit->DEPARTMENT->Lookup->toClientList($view_lab_service_sub_edit) ?>;
	fview_lab_service_subedit.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_service_sub_edit->DEPARTMENT->options(FALSE, TRUE)) ?>;
	fview_lab_service_subedit.lists["x_Inactive[]"] = <?php echo $view_lab_service_sub_edit->Inactive->Lookup->toClientList($view_lab_service_sub_edit) ?>;
	fview_lab_service_subedit.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_sub_edit->Inactive->options(FALSE, TRUE)) ?>;
	fview_lab_service_subedit.lists["x_TestType"] = <?php echo $view_lab_service_sub_edit->TestType->Lookup->toClientList($view_lab_service_sub_edit) ?>;
	fview_lab_service_subedit.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_service_sub_edit->TestType->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_lab_service_subedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_lab_service_sub_edit->showPageHeader(); ?>
<?php
$view_lab_service_sub_edit->showMessage();
?>
<form name="fview_lab_service_subedit" id="fview_lab_service_subedit" class="<?php echo $view_lab_service_sub_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service_sub">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_service_sub_edit->IsModal ?>">
<?php if ($view_lab_service_sub->getCurrentMasterTable() == "view_lab_service") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_lab_service">
<input type="hidden" name="fk_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_edit->CODE->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_lab_service_sub_edit->Id->Visible) { // Id ?>
	<div id="r_Id" class="form-group row">
		<label id="elh_view_lab_service_sub_Id" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->Id->caption() ?><?php echo $view_lab_service_sub_edit->Id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->Id->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub_edit->Id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_edit->Id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="x_Id" id="x_Id" value="<?php echo HtmlEncode($view_lab_service_sub_edit->Id->CurrentValue) ?>">
<?php echo $view_lab_service_sub_edit->Id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_view_lab_service_sub_CODE" for="x_CODE" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->CODE->caption() ?><?php echo $view_lab_service_sub_edit->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->CODE->cellAttributes() ?>>
<?php if ($view_lab_service_sub_edit->CODE->getSessionValue() != "") { ?>
<span id="el_view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub_edit->CODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_edit->CODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_CODE" name="x_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_edit->CODE->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_lab_service_sub_CODE">
<input type="text" data-table="view_lab_service_sub" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->CODE->EditValue ?>"<?php echo $view_lab_service_sub_edit->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_lab_service_sub_edit->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->SERVICE->Visible) { // SERVICE ?>
	<div id="r_SERVICE" class="form-group row">
		<label id="elh_view_lab_service_sub_SERVICE" for="x_SERVICE" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->SERVICE->caption() ?><?php echo $view_lab_service_sub_edit->SERVICE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->SERVICE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE">
<input type="text" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="25" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->SERVICE->EditValue ?>"<?php echo $view_lab_service_sub_edit->SERVICE->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->SERVICE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->UNITS->Visible) { // UNITS ?>
	<div id="r_UNITS" class="form-group row">
		<label id="elh_view_lab_service_sub_UNITS" for="x_UNITS" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->UNITS->caption() ?><?php echo $view_lab_service_sub_edit->UNITS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->UNITS->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UNITS">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_UNITS"><?php echo EmptyValue(strval($view_lab_service_sub_edit->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_lab_service_sub_edit->UNITS->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_sub_edit->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_lab_service_sub_edit->UNITS->ReadOnly || $view_lab_service_sub_edit->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_sub_edit->UNITS->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub_edit->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_sub_edit->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_sub_edit->UNITS->Lookup->getParamTag($view_lab_service_sub_edit, "p_x_UNITS") ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_sub_edit->UNITS->displayValueSeparatorAttribute() ?>" name="x_UNITS" id="x_UNITS" value="<?php echo $view_lab_service_sub_edit->UNITS->CurrentValue ?>"<?php echo $view_lab_service_sub_edit->UNITS->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->UNITS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->AMOUNT->Visible) { // AMOUNT ?>
	<div id="r_AMOUNT" class="form-group row">
		<label id="elh_view_lab_service_sub_AMOUNT" for="x_AMOUNT" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->AMOUNT->caption() ?><?php echo $view_lab_service_sub_edit->AMOUNT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->AMOUNT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_AMOUNT">
<input type="text" data-table="view_lab_service_sub" data-field="x_AMOUNT" name="x_AMOUNT" id="x_AMOUNT" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->AMOUNT->EditValue ?>"<?php echo $view_lab_service_sub_edit->AMOUNT->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->AMOUNT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="r_SERVICE_TYPE" class="form-group row">
		<label id="elh_view_lab_service_sub_SERVICE_TYPE" for="x_SERVICE_TYPE" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->SERVICE_TYPE->caption() ?><?php echo $view_lab_service_sub_edit->SERVICE_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service_sub" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_service_sub_edit->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $view_lab_service_sub_edit->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $view_lab_service_sub_edit->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_lab_services_type") && !$view_lab_service_sub_edit->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub_edit->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_service_sub_edit->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_SERVICE_TYPE',url:'mas_lab_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $view_lab_service_sub_edit->SERVICE_TYPE->Lookup->getParamTag($view_lab_service_sub_edit, "p_x_SERVICE_TYPE") ?>
</span>
<?php echo $view_lab_service_sub_edit->SERVICE_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label id="elh_view_lab_service_sub_DEPARTMENT" for="x_DEPARTMENT" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->DEPARTMENT->caption() ?><?php echo $view_lab_service_sub_edit->DEPARTMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service_sub" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_service_sub_edit->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x_DEPARTMENT" name="x_DEPARTMENT"<?php echo $view_lab_service_sub_edit->DEPARTMENT->editAttributes() ?>>
			<?php echo $view_lab_service_sub_edit->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
		</select>
</div>
</span>
<?php echo $view_lab_service_sub_edit->DEPARTMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<div id="r_mas_services_billingcol" class="form-group row">
		<label id="elh_view_lab_service_sub_mas_services_billingcol" for="x_mas_services_billingcol" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->mas_services_billingcol->caption() ?><?php echo $view_lab_service_sub_edit->mas_services_billingcol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->mas_services_billingcol->cellAttributes() ?>>
<span id="el_view_lab_service_sub_mas_services_billingcol">
<input type="text" data-table="view_lab_service_sub" data-field="x_mas_services_billingcol" name="x_mas_services_billingcol" id="x_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_service_sub_edit->mas_services_billingcol->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->mas_services_billingcol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label id="elh_view_lab_service_sub_DrShareAmount" for="x_DrShareAmount" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->DrShareAmount->caption() ?><?php echo $view_lab_service_sub_edit->DrShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->DrShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrShareAmount">
<input type="text" data-table="view_lab_service_sub" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->DrShareAmount->EditValue ?>"<?php echo $view_lab_service_sub_edit->DrShareAmount->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label id="elh_view_lab_service_sub_HospShareAmount" for="x_HospShareAmount" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->HospShareAmount->caption() ?><?php echo $view_lab_service_sub_edit->HospShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->HospShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospShareAmount">
<input type="text" data-table="view_lab_service_sub" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->HospShareAmount->EditValue ?>"<?php echo $view_lab_service_sub_edit->HospShareAmount->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->DrSharePer->Visible) { // DrSharePer ?>
	<div id="r_DrSharePer" class="form-group row">
		<label id="elh_view_lab_service_sub_DrSharePer" for="x_DrSharePer" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->DrSharePer->caption() ?><?php echo $view_lab_service_sub_edit->DrSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->DrSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrSharePer">
<input type="text" data-table="view_lab_service_sub" data-field="x_DrSharePer" name="x_DrSharePer" id="x_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->DrSharePer->EditValue ?>"<?php echo $view_lab_service_sub_edit->DrSharePer->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->DrSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->HospSharePer->Visible) { // HospSharePer ?>
	<div id="r_HospSharePer" class="form-group row">
		<label id="elh_view_lab_service_sub_HospSharePer" for="x_HospSharePer" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->HospSharePer->caption() ?><?php echo $view_lab_service_sub_edit->HospSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->HospSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospSharePer">
<input type="text" data-table="view_lab_service_sub" data-field="x_HospSharePer" name="x_HospSharePer" id="x_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->HospSharePer->EditValue ?>"<?php echo $view_lab_service_sub_edit->HospSharePer->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->HospSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_view_lab_service_sub_TestSubCd" for="x_TestSubCd" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->TestSubCd->caption() ?><?php echo $view_lab_service_sub_edit->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->TestSubCd->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestSubCd">
<input type="text" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->TestSubCd->EditValue ?>"<?php echo $view_lab_service_sub_edit->TestSubCd->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_view_lab_service_sub_Method" for="x_Method" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->Method->caption() ?><?php echo $view_lab_service_sub_edit->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->Method->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Method">
<input type="text" data-table="view_lab_service_sub" data-field="x_Method" name="x_Method" id="x_Method" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->Method->EditValue ?>"<?php echo $view_lab_service_sub_edit->Method->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_view_lab_service_sub_Order" for="x_Order" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->Order->caption() ?><?php echo $view_lab_service_sub_edit->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->Order->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Order">
<input type="text" data-table="view_lab_service_sub" data-field="x_Order" name="x_Order" id="x_Order" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->Order->EditValue ?>"<?php echo $view_lab_service_sub_edit->Order->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_view_lab_service_sub_Form" for="x_Form" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->Form->caption() ?><?php echo $view_lab_service_sub_edit->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->Form->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Form">
<textarea data-table="view_lab_service_sub" data-field="x_Form" name="x_Form" id="x_Form" cols="8" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->Form->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub_edit->Form->editAttributes() ?>><?php echo $view_lab_service_sub_edit->Form->EditValue ?></textarea>
</span>
<?php echo $view_lab_service_sub_edit->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_view_lab_service_sub_ResType" for="x_ResType" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->ResType->caption() ?><?php echo $view_lab_service_sub_edit->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->ResType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ResType">
<input type="text" data-table="view_lab_service_sub" data-field="x_ResType" name="x_ResType" id="x_ResType" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->ResType->EditValue ?>"<?php echo $view_lab_service_sub_edit->ResType->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->UnitCD->Visible) { // UnitCD ?>
	<div id="r_UnitCD" class="form-group row">
		<label id="elh_view_lab_service_sub_UnitCD" for="x_UnitCD" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->UnitCD->caption() ?><?php echo $view_lab_service_sub_edit->UnitCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->UnitCD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UnitCD">
<input type="text" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->UnitCD->EditValue ?>"<?php echo $view_lab_service_sub_edit->UnitCD->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->UnitCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_view_lab_service_sub_RefValue" for="x_RefValue" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->RefValue->caption() ?><?php echo $view_lab_service_sub_edit->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->RefValue->cellAttributes() ?>>
<span id="el_view_lab_service_sub_RefValue">
<textarea data-table="view_lab_service_sub" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub_edit->RefValue->editAttributes() ?>><?php echo $view_lab_service_sub_edit->RefValue->EditValue ?></textarea>
</span>
<?php echo $view_lab_service_sub_edit->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_view_lab_service_sub_Sample" for="x_Sample" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->Sample->caption() ?><?php echo $view_lab_service_sub_edit->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->Sample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Sample">
<input type="text" data-table="view_lab_service_sub" data-field="x_Sample" name="x_Sample" id="x_Sample" size="8" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->Sample->EditValue ?>"<?php echo $view_lab_service_sub_edit->Sample->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_view_lab_service_sub_NoD" for="x_NoD" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->NoD->caption() ?><?php echo $view_lab_service_sub_edit->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->NoD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoD">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoD" name="x_NoD" id="x_NoD" size="8" maxlength="20" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->NoD->EditValue ?>"<?php echo $view_lab_service_sub_edit->NoD->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_view_lab_service_sub_BillOrder" for="x_BillOrder" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->BillOrder->caption() ?><?php echo $view_lab_service_sub_edit->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->BillOrder->cellAttributes() ?>>
<span id="el_view_lab_service_sub_BillOrder">
<input type="text" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->BillOrder->EditValue ?>"<?php echo $view_lab_service_sub_edit->BillOrder->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_view_lab_service_sub_Formula" for="x_Formula" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->Formula->caption() ?><?php echo $view_lab_service_sub_edit->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->Formula->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Formula">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub_edit->Formula->editAttributes() ?>><?php echo $view_lab_service_sub_edit->Formula->EditValue ?></textarea>
</span>
<?php echo $view_lab_service_sub_edit->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_view_lab_service_sub_Inactive" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->Inactive->caption() ?><?php echo $view_lab_service_sub_edit->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->Inactive->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Inactive">
<div id="tp_x_Inactive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_service_sub" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_sub_edit->Inactive->displayValueSeparatorAttribute() ?>" name="x_Inactive[]" id="x_Inactive[]" value="{value}"<?php echo $view_lab_service_sub_edit->Inactive->editAttributes() ?>></div>
<div id="dsl_x_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_sub_edit->Inactive->checkBoxListHtml(FALSE, "x_Inactive[]") ?>
</div></div>
</span>
<?php echo $view_lab_service_sub_edit->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->Outsource->Visible) { // Outsource ?>
	<div id="r_Outsource" class="form-group row">
		<label id="elh_view_lab_service_sub_Outsource" for="x_Outsource" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->Outsource->caption() ?><?php echo $view_lab_service_sub_edit->Outsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->Outsource->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Outsource">
<input type="text" data-table="view_lab_service_sub" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->Outsource->EditValue ?>"<?php echo $view_lab_service_sub_edit->Outsource->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->Outsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_view_lab_service_sub_CollSample" for="x_CollSample" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->CollSample->caption() ?><?php echo $view_lab_service_sub_edit->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->CollSample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CollSample">
<input type="text" data-table="view_lab_service_sub" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->CollSample->EditValue ?>"<?php echo $view_lab_service_sub_edit->CollSample->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_view_lab_service_sub_TestType" for="x_TestType" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->TestType->caption() ?><?php echo $view_lab_service_sub_edit->TestType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->TestType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service_sub" data-field="x_TestType" data-value-separator="<?php echo $view_lab_service_sub_edit->TestType->displayValueSeparatorAttribute() ?>" id="x_TestType" name="x_TestType"<?php echo $view_lab_service_sub_edit->TestType->editAttributes() ?>>
			<?php echo $view_lab_service_sub_edit->TestType->selectOptionListHtml("x_TestType") ?>
		</select>
</div>
</span>
<?php echo $view_lab_service_sub_edit->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->NoHeading->Visible) { // NoHeading ?>
	<div id="r_NoHeading" class="form-group row">
		<label id="elh_view_lab_service_sub_NoHeading" for="x_NoHeading" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->NoHeading->caption() ?><?php echo $view_lab_service_sub_edit->NoHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->NoHeading->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoHeading">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->NoHeading->EditValue ?>"<?php echo $view_lab_service_sub_edit->NoHeading->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->NoHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->ChemicalCode->Visible) { // ChemicalCode ?>
	<div id="r_ChemicalCode" class="form-group row">
		<label id="elh_view_lab_service_sub_ChemicalCode" for="x_ChemicalCode" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->ChemicalCode->caption() ?><?php echo $view_lab_service_sub_edit->ChemicalCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->ChemicalCode->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalCode">
<input type="text" data-table="view_lab_service_sub" data-field="x_ChemicalCode" name="x_ChemicalCode" id="x_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->ChemicalCode->EditValue ?>"<?php echo $view_lab_service_sub_edit->ChemicalCode->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->ChemicalCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->ChemicalName->Visible) { // ChemicalName ?>
	<div id="r_ChemicalName" class="form-group row">
		<label id="elh_view_lab_service_sub_ChemicalName" for="x_ChemicalName" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->ChemicalName->caption() ?><?php echo $view_lab_service_sub_edit->ChemicalName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->ChemicalName->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalName">
<input type="text" data-table="view_lab_service_sub" data-field="x_ChemicalName" name="x_ChemicalName" id="x_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->ChemicalName->EditValue ?>"<?php echo $view_lab_service_sub_edit->ChemicalName->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->ChemicalName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->Utilaization->Visible) { // Utilaization ?>
	<div id="r_Utilaization" class="form-group row">
		<label id="elh_view_lab_service_sub_Utilaization" for="x_Utilaization" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->Utilaization->caption() ?><?php echo $view_lab_service_sub_edit->Utilaization->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->Utilaization->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Utilaization">
<input type="text" data-table="view_lab_service_sub" data-field="x_Utilaization" name="x_Utilaization" id="x_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_edit->Utilaization->EditValue ?>"<?php echo $view_lab_service_sub_edit->Utilaization->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_edit->Utilaization->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_edit->Interpretation->Visible) { // Interpretation ?>
	<div id="r_Interpretation" class="form-group row">
		<label id="elh_view_lab_service_sub_Interpretation" class="<?php echo $view_lab_service_sub_edit->LeftColumnClass ?>"><?php echo $view_lab_service_sub_edit->Interpretation->caption() ?><?php echo $view_lab_service_sub_edit->Interpretation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_edit->Interpretation->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Interpretation">
<?php $view_lab_service_sub_edit->Interpretation->EditAttrs->appendClass("editor"); ?>
<textarea data-table="view_lab_service_sub" data-field="x_Interpretation" name="x_Interpretation" id="x_Interpretation" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub_edit->Interpretation->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub_edit->Interpretation->editAttributes() ?>><?php echo $view_lab_service_sub_edit->Interpretation->EditValue ?></textarea>
<script>
loadjs.ready(["fview_lab_service_subedit", "editor"], function() {
	ew.createEditor("fview_lab_service_subedit", "x_Interpretation", 35, 4, <?php echo $view_lab_service_sub_edit->Interpretation->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $view_lab_service_sub_edit->Interpretation->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_lab_service_sub_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_lab_service_sub_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_lab_service_sub_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_lab_service_sub_edit->showPageFooter();
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
$view_lab_service_sub_edit->terminate();
?>