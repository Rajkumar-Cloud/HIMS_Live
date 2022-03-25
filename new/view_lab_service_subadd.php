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
<?php include_once "header.php"; ?>
<script>
var fview_lab_service_subadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fview_lab_service_subadd = currentForm = new ew.Form("fview_lab_service_subadd", "add");

	// Validate form
	fview_lab_service_subadd.validate = function() {
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
			<?php if ($view_lab_service_sub_add->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->CODE->caption(), $view_lab_service_sub_add->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->SERVICE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->SERVICE->caption(), $view_lab_service_sub_add->SERVICE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->UNITS->Required) { ?>
				elm = this.getElements("x" + infix + "_UNITS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->UNITS->caption(), $view_lab_service_sub_add->UNITS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->AMOUNT->Required) { ?>
				elm = this.getElements("x" + infix + "_AMOUNT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->AMOUNT->caption(), $view_lab_service_sub_add->AMOUNT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->SERVICE_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->SERVICE_TYPE->caption(), $view_lab_service_sub_add->SERVICE_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->DEPARTMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_DEPARTMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->DEPARTMENT->caption(), $view_lab_service_sub_add->DEPARTMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->Created->Required) { ?>
				elm = this.getElements("x" + infix + "_Created");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->Created->caption(), $view_lab_service_sub_add->Created->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->CreatedDateTime->caption(), $view_lab_service_sub_add->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->mas_services_billingcol->Required) { ?>
				elm = this.getElements("x" + infix + "_mas_services_billingcol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->mas_services_billingcol->caption(), $view_lab_service_sub_add->mas_services_billingcol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->DrShareAmount->caption(), $view_lab_service_sub_add->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_add->DrShareAmount->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_add->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->HospShareAmount->caption(), $view_lab_service_sub_add->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_add->HospShareAmount->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_add->DrSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->DrSharePer->caption(), $view_lab_service_sub_add->DrSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_add->DrSharePer->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_add->HospSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->HospSharePer->caption(), $view_lab_service_sub_add->HospSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_add->HospSharePer->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->HospID->caption(), $view_lab_service_sub_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->TestSubCd->caption(), $view_lab_service_sub_add->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->Method->caption(), $view_lab_service_sub_add->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->Order->caption(), $view_lab_service_sub_add->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_add->Order->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_add->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->Form->caption(), $view_lab_service_sub_add->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->ResType->caption(), $view_lab_service_sub_add->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->UnitCD->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->UnitCD->caption(), $view_lab_service_sub_add->UnitCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->RefValue->Required) { ?>
				elm = this.getElements("x" + infix + "_RefValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->RefValue->caption(), $view_lab_service_sub_add->RefValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->Sample->caption(), $view_lab_service_sub_add->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->NoD->caption(), $view_lab_service_sub_add->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_add->NoD->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_add->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->BillOrder->caption(), $view_lab_service_sub_add->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_add->BillOrder->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_add->Formula->Required) { ?>
				elm = this.getElements("x" + infix + "_Formula");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->Formula->caption(), $view_lab_service_sub_add->Formula->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->Inactive->caption(), $view_lab_service_sub_add->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->Outsource->Required) { ?>
				elm = this.getElements("x" + infix + "_Outsource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->Outsource->caption(), $view_lab_service_sub_add->Outsource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->CollSample->caption(), $view_lab_service_sub_add->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->TestType->caption(), $view_lab_service_sub_add->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->NoHeading->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHeading");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->NoHeading->caption(), $view_lab_service_sub_add->NoHeading->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->ChemicalCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->ChemicalCode->caption(), $view_lab_service_sub_add->ChemicalCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->ChemicalName->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->ChemicalName->caption(), $view_lab_service_sub_add->ChemicalName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->Utilaization->Required) { ?>
				elm = this.getElements("x" + infix + "_Utilaization");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->Utilaization->caption(), $view_lab_service_sub_add->Utilaization->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_add->Interpretation->Required) { ?>
				elm = this.getElements("x" + infix + "_Interpretation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_add->Interpretation->caption(), $view_lab_service_sub_add->Interpretation->RequiredErrorMessage)) ?>");
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
	fview_lab_service_subadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_service_subadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_lab_service_subadd.lists["x_UNITS"] = <?php echo $view_lab_service_sub_add->UNITS->Lookup->toClientList($view_lab_service_sub_add) ?>;
	fview_lab_service_subadd.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_sub_add->UNITS->lookupOptions()) ?>;
	fview_lab_service_subadd.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_service_sub_add->SERVICE_TYPE->Lookup->toClientList($view_lab_service_sub_add) ?>;
	fview_lab_service_subadd.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_service_sub_add->SERVICE_TYPE->lookupOptions()) ?>;
	fview_lab_service_subadd.lists["x_DEPARTMENT"] = <?php echo $view_lab_service_sub_add->DEPARTMENT->Lookup->toClientList($view_lab_service_sub_add) ?>;
	fview_lab_service_subadd.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_service_sub_add->DEPARTMENT->options(FALSE, TRUE)) ?>;
	fview_lab_service_subadd.lists["x_Inactive[]"] = <?php echo $view_lab_service_sub_add->Inactive->Lookup->toClientList($view_lab_service_sub_add) ?>;
	fview_lab_service_subadd.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_sub_add->Inactive->options(FALSE, TRUE)) ?>;
	fview_lab_service_subadd.lists["x_TestType"] = <?php echo $view_lab_service_sub_add->TestType->Lookup->toClientList($view_lab_service_sub_add) ?>;
	fview_lab_service_subadd.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_service_sub_add->TestType->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_lab_service_subadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_lab_service_sub_add->showPageHeader(); ?>
<?php
$view_lab_service_sub_add->showMessage();
?>
<form name="fview_lab_service_subadd" id="fview_lab_service_subadd" class="<?php echo $view_lab_service_sub_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service_sub">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_service_sub_add->IsModal ?>">
<?php if ($view_lab_service_sub->getCurrentMasterTable() == "view_lab_service") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_lab_service">
<input type="hidden" name="fk_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_add->CODE->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($view_lab_service_sub_add->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_view_lab_service_sub_CODE" for="x_CODE" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->CODE->caption() ?><?php echo $view_lab_service_sub_add->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->CODE->cellAttributes() ?>>
<?php if ($view_lab_service_sub_add->CODE->getSessionValue() != "") { ?>
<span id="el_view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub_add->CODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_add->CODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_CODE" name="x_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_add->CODE->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_lab_service_sub_CODE">
<input type="text" data-table="view_lab_service_sub" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->CODE->EditValue ?>"<?php echo $view_lab_service_sub_add->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_lab_service_sub_add->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->SERVICE->Visible) { // SERVICE ?>
	<div id="r_SERVICE" class="form-group row">
		<label id="elh_view_lab_service_sub_SERVICE" for="x_SERVICE" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->SERVICE->caption() ?><?php echo $view_lab_service_sub_add->SERVICE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->SERVICE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE">
<input type="text" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="25" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->SERVICE->EditValue ?>"<?php echo $view_lab_service_sub_add->SERVICE->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->SERVICE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->UNITS->Visible) { // UNITS ?>
	<div id="r_UNITS" class="form-group row">
		<label id="elh_view_lab_service_sub_UNITS" for="x_UNITS" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->UNITS->caption() ?><?php echo $view_lab_service_sub_add->UNITS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->UNITS->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UNITS">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_UNITS"><?php echo EmptyValue(strval($view_lab_service_sub_add->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_lab_service_sub_add->UNITS->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_sub_add->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_lab_service_sub_add->UNITS->ReadOnly || $view_lab_service_sub_add->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_sub_add->UNITS->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub_add->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_sub_add->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_sub_add->UNITS->Lookup->getParamTag($view_lab_service_sub_add, "p_x_UNITS") ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_sub_add->UNITS->displayValueSeparatorAttribute() ?>" name="x_UNITS" id="x_UNITS" value="<?php echo $view_lab_service_sub_add->UNITS->CurrentValue ?>"<?php echo $view_lab_service_sub_add->UNITS->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->UNITS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->AMOUNT->Visible) { // AMOUNT ?>
	<div id="r_AMOUNT" class="form-group row">
		<label id="elh_view_lab_service_sub_AMOUNT" for="x_AMOUNT" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->AMOUNT->caption() ?><?php echo $view_lab_service_sub_add->AMOUNT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->AMOUNT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_AMOUNT">
<input type="text" data-table="view_lab_service_sub" data-field="x_AMOUNT" name="x_AMOUNT" id="x_AMOUNT" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->AMOUNT->EditValue ?>"<?php echo $view_lab_service_sub_add->AMOUNT->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->AMOUNT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="r_SERVICE_TYPE" class="form-group row">
		<label id="elh_view_lab_service_sub_SERVICE_TYPE" for="x_SERVICE_TYPE" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->SERVICE_TYPE->caption() ?><?php echo $view_lab_service_sub_add->SERVICE_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service_sub" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_service_sub_add->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $view_lab_service_sub_add->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $view_lab_service_sub_add->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_lab_services_type") && !$view_lab_service_sub_add->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub_add->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_service_sub_add->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_SERVICE_TYPE',url:'mas_lab_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $view_lab_service_sub_add->SERVICE_TYPE->Lookup->getParamTag($view_lab_service_sub_add, "p_x_SERVICE_TYPE") ?>
</span>
<?php echo $view_lab_service_sub_add->SERVICE_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label id="elh_view_lab_service_sub_DEPARTMENT" for="x_DEPARTMENT" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->DEPARTMENT->caption() ?><?php echo $view_lab_service_sub_add->DEPARTMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service_sub" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_service_sub_add->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x_DEPARTMENT" name="x_DEPARTMENT"<?php echo $view_lab_service_sub_add->DEPARTMENT->editAttributes() ?>>
			<?php echo $view_lab_service_sub_add->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
		</select>
</div>
</span>
<?php echo $view_lab_service_sub_add->DEPARTMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<div id="r_mas_services_billingcol" class="form-group row">
		<label id="elh_view_lab_service_sub_mas_services_billingcol" for="x_mas_services_billingcol" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->mas_services_billingcol->caption() ?><?php echo $view_lab_service_sub_add->mas_services_billingcol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->mas_services_billingcol->cellAttributes() ?>>
<span id="el_view_lab_service_sub_mas_services_billingcol">
<input type="text" data-table="view_lab_service_sub" data-field="x_mas_services_billingcol" name="x_mas_services_billingcol" id="x_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_service_sub_add->mas_services_billingcol->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->mas_services_billingcol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label id="elh_view_lab_service_sub_DrShareAmount" for="x_DrShareAmount" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->DrShareAmount->caption() ?><?php echo $view_lab_service_sub_add->DrShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->DrShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrShareAmount">
<input type="text" data-table="view_lab_service_sub" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->DrShareAmount->EditValue ?>"<?php echo $view_lab_service_sub_add->DrShareAmount->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label id="elh_view_lab_service_sub_HospShareAmount" for="x_HospShareAmount" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->HospShareAmount->caption() ?><?php echo $view_lab_service_sub_add->HospShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->HospShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospShareAmount">
<input type="text" data-table="view_lab_service_sub" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->HospShareAmount->EditValue ?>"<?php echo $view_lab_service_sub_add->HospShareAmount->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->DrSharePer->Visible) { // DrSharePer ?>
	<div id="r_DrSharePer" class="form-group row">
		<label id="elh_view_lab_service_sub_DrSharePer" for="x_DrSharePer" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->DrSharePer->caption() ?><?php echo $view_lab_service_sub_add->DrSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->DrSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrSharePer">
<input type="text" data-table="view_lab_service_sub" data-field="x_DrSharePer" name="x_DrSharePer" id="x_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->DrSharePer->EditValue ?>"<?php echo $view_lab_service_sub_add->DrSharePer->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->DrSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->HospSharePer->Visible) { // HospSharePer ?>
	<div id="r_HospSharePer" class="form-group row">
		<label id="elh_view_lab_service_sub_HospSharePer" for="x_HospSharePer" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->HospSharePer->caption() ?><?php echo $view_lab_service_sub_add->HospSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->HospSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospSharePer">
<input type="text" data-table="view_lab_service_sub" data-field="x_HospSharePer" name="x_HospSharePer" id="x_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->HospSharePer->EditValue ?>"<?php echo $view_lab_service_sub_add->HospSharePer->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->HospSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_view_lab_service_sub_TestSubCd" for="x_TestSubCd" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->TestSubCd->caption() ?><?php echo $view_lab_service_sub_add->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->TestSubCd->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestSubCd">
<input type="text" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->TestSubCd->EditValue ?>"<?php echo $view_lab_service_sub_add->TestSubCd->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_view_lab_service_sub_Method" for="x_Method" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->Method->caption() ?><?php echo $view_lab_service_sub_add->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->Method->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Method">
<input type="text" data-table="view_lab_service_sub" data-field="x_Method" name="x_Method" id="x_Method" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->Method->EditValue ?>"<?php echo $view_lab_service_sub_add->Method->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_view_lab_service_sub_Order" for="x_Order" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->Order->caption() ?><?php echo $view_lab_service_sub_add->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->Order->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Order">
<input type="text" data-table="view_lab_service_sub" data-field="x_Order" name="x_Order" id="x_Order" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->Order->EditValue ?>"<?php echo $view_lab_service_sub_add->Order->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_view_lab_service_sub_Form" for="x_Form" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->Form->caption() ?><?php echo $view_lab_service_sub_add->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->Form->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Form">
<textarea data-table="view_lab_service_sub" data-field="x_Form" name="x_Form" id="x_Form" cols="8" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->Form->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub_add->Form->editAttributes() ?>><?php echo $view_lab_service_sub_add->Form->EditValue ?></textarea>
</span>
<?php echo $view_lab_service_sub_add->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_view_lab_service_sub_ResType" for="x_ResType" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->ResType->caption() ?><?php echo $view_lab_service_sub_add->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->ResType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ResType">
<input type="text" data-table="view_lab_service_sub" data-field="x_ResType" name="x_ResType" id="x_ResType" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->ResType->EditValue ?>"<?php echo $view_lab_service_sub_add->ResType->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->UnitCD->Visible) { // UnitCD ?>
	<div id="r_UnitCD" class="form-group row">
		<label id="elh_view_lab_service_sub_UnitCD" for="x_UnitCD" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->UnitCD->caption() ?><?php echo $view_lab_service_sub_add->UnitCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->UnitCD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UnitCD">
<input type="text" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->UnitCD->EditValue ?>"<?php echo $view_lab_service_sub_add->UnitCD->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->UnitCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_view_lab_service_sub_RefValue" for="x_RefValue" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->RefValue->caption() ?><?php echo $view_lab_service_sub_add->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->RefValue->cellAttributes() ?>>
<span id="el_view_lab_service_sub_RefValue">
<textarea data-table="view_lab_service_sub" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub_add->RefValue->editAttributes() ?>><?php echo $view_lab_service_sub_add->RefValue->EditValue ?></textarea>
</span>
<?php echo $view_lab_service_sub_add->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_view_lab_service_sub_Sample" for="x_Sample" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->Sample->caption() ?><?php echo $view_lab_service_sub_add->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->Sample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Sample">
<input type="text" data-table="view_lab_service_sub" data-field="x_Sample" name="x_Sample" id="x_Sample" size="8" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->Sample->EditValue ?>"<?php echo $view_lab_service_sub_add->Sample->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_view_lab_service_sub_NoD" for="x_NoD" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->NoD->caption() ?><?php echo $view_lab_service_sub_add->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->NoD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoD">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoD" name="x_NoD" id="x_NoD" size="8" maxlength="20" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->NoD->EditValue ?>"<?php echo $view_lab_service_sub_add->NoD->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_view_lab_service_sub_BillOrder" for="x_BillOrder" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->BillOrder->caption() ?><?php echo $view_lab_service_sub_add->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->BillOrder->cellAttributes() ?>>
<span id="el_view_lab_service_sub_BillOrder">
<input type="text" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->BillOrder->EditValue ?>"<?php echo $view_lab_service_sub_add->BillOrder->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_view_lab_service_sub_Formula" for="x_Formula" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->Formula->caption() ?><?php echo $view_lab_service_sub_add->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->Formula->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Formula">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub_add->Formula->editAttributes() ?>><?php echo $view_lab_service_sub_add->Formula->EditValue ?></textarea>
</span>
<?php echo $view_lab_service_sub_add->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_view_lab_service_sub_Inactive" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->Inactive->caption() ?><?php echo $view_lab_service_sub_add->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->Inactive->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Inactive">
<div id="tp_x_Inactive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_service_sub" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_sub_add->Inactive->displayValueSeparatorAttribute() ?>" name="x_Inactive[]" id="x_Inactive[]" value="{value}"<?php echo $view_lab_service_sub_add->Inactive->editAttributes() ?>></div>
<div id="dsl_x_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_sub_add->Inactive->checkBoxListHtml(FALSE, "x_Inactive[]") ?>
</div></div>
</span>
<?php echo $view_lab_service_sub_add->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->Outsource->Visible) { // Outsource ?>
	<div id="r_Outsource" class="form-group row">
		<label id="elh_view_lab_service_sub_Outsource" for="x_Outsource" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->Outsource->caption() ?><?php echo $view_lab_service_sub_add->Outsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->Outsource->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Outsource">
<input type="text" data-table="view_lab_service_sub" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->Outsource->EditValue ?>"<?php echo $view_lab_service_sub_add->Outsource->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->Outsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_view_lab_service_sub_CollSample" for="x_CollSample" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->CollSample->caption() ?><?php echo $view_lab_service_sub_add->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->CollSample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CollSample">
<input type="text" data-table="view_lab_service_sub" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->CollSample->EditValue ?>"<?php echo $view_lab_service_sub_add->CollSample->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_view_lab_service_sub_TestType" for="x_TestType" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->TestType->caption() ?><?php echo $view_lab_service_sub_add->TestType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->TestType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service_sub" data-field="x_TestType" data-value-separator="<?php echo $view_lab_service_sub_add->TestType->displayValueSeparatorAttribute() ?>" id="x_TestType" name="x_TestType"<?php echo $view_lab_service_sub_add->TestType->editAttributes() ?>>
			<?php echo $view_lab_service_sub_add->TestType->selectOptionListHtml("x_TestType") ?>
		</select>
</div>
</span>
<?php echo $view_lab_service_sub_add->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->NoHeading->Visible) { // NoHeading ?>
	<div id="r_NoHeading" class="form-group row">
		<label id="elh_view_lab_service_sub_NoHeading" for="x_NoHeading" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->NoHeading->caption() ?><?php echo $view_lab_service_sub_add->NoHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->NoHeading->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoHeading">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->NoHeading->EditValue ?>"<?php echo $view_lab_service_sub_add->NoHeading->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->NoHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->ChemicalCode->Visible) { // ChemicalCode ?>
	<div id="r_ChemicalCode" class="form-group row">
		<label id="elh_view_lab_service_sub_ChemicalCode" for="x_ChemicalCode" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->ChemicalCode->caption() ?><?php echo $view_lab_service_sub_add->ChemicalCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->ChemicalCode->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalCode">
<input type="text" data-table="view_lab_service_sub" data-field="x_ChemicalCode" name="x_ChemicalCode" id="x_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->ChemicalCode->EditValue ?>"<?php echo $view_lab_service_sub_add->ChemicalCode->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->ChemicalCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->ChemicalName->Visible) { // ChemicalName ?>
	<div id="r_ChemicalName" class="form-group row">
		<label id="elh_view_lab_service_sub_ChemicalName" for="x_ChemicalName" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->ChemicalName->caption() ?><?php echo $view_lab_service_sub_add->ChemicalName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->ChemicalName->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalName">
<input type="text" data-table="view_lab_service_sub" data-field="x_ChemicalName" name="x_ChemicalName" id="x_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->ChemicalName->EditValue ?>"<?php echo $view_lab_service_sub_add->ChemicalName->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->ChemicalName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->Utilaization->Visible) { // Utilaization ?>
	<div id="r_Utilaization" class="form-group row">
		<label id="elh_view_lab_service_sub_Utilaization" for="x_Utilaization" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->Utilaization->caption() ?><?php echo $view_lab_service_sub_add->Utilaization->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->Utilaization->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Utilaization">
<input type="text" data-table="view_lab_service_sub" data-field="x_Utilaization" name="x_Utilaization" id="x_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_add->Utilaization->EditValue ?>"<?php echo $view_lab_service_sub_add->Utilaization->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub_add->Utilaization->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub_add->Interpretation->Visible) { // Interpretation ?>
	<div id="r_Interpretation" class="form-group row">
		<label id="elh_view_lab_service_sub_Interpretation" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub_add->Interpretation->caption() ?><?php echo $view_lab_service_sub_add->Interpretation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div <?php echo $view_lab_service_sub_add->Interpretation->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Interpretation">
<?php $view_lab_service_sub_add->Interpretation->EditAttrs->appendClass("editor"); ?>
<textarea data-table="view_lab_service_sub" data-field="x_Interpretation" name="x_Interpretation" id="x_Interpretation" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub_add->Interpretation->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub_add->Interpretation->editAttributes() ?>><?php echo $view_lab_service_sub_add->Interpretation->EditValue ?></textarea>
<script>
loadjs.ready(["fview_lab_service_subadd", "editor"], function() {
	ew.createEditor("fview_lab_service_subadd", "x_Interpretation", 35, 4, <?php echo $view_lab_service_sub_add->Interpretation->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $view_lab_service_sub_add->Interpretation->CustomMsg ?></div></div>
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
$view_lab_service_sub_add->terminate();
?>