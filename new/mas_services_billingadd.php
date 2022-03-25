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
$mas_services_billing_add = new mas_services_billing_add();

// Run the page
$mas_services_billing_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_services_billing_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_services_billingadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmas_services_billingadd = currentForm = new ew.Form("fmas_services_billingadd", "add");

	// Validate form
	fmas_services_billingadd.validate = function() {
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
			<?php if ($mas_services_billing_add->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->CODE->caption(), $mas_services_billing_add->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->SERVICE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->SERVICE->caption(), $mas_services_billing_add->SERVICE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->UNITS->Required) { ?>
				elm = this.getElements("x" + infix + "_UNITS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->UNITS->caption(), $mas_services_billing_add->UNITS->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UNITS");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_add->UNITS->errorMessage()) ?>");
			<?php if ($mas_services_billing_add->AMOUNT->Required) { ?>
				elm = this.getElements("x" + infix + "_AMOUNT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->AMOUNT->caption(), $mas_services_billing_add->AMOUNT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->SERVICE_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->SERVICE_TYPE->caption(), $mas_services_billing_add->SERVICE_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->DEPARTMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_DEPARTMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->DEPARTMENT->caption(), $mas_services_billing_add->DEPARTMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->Created->Required) { ?>
				elm = this.getElements("x" + infix + "_Created");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->Created->caption(), $mas_services_billing_add->Created->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->CreatedDateTime->caption(), $mas_services_billing_add->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->mas_services_billingcol->Required) { ?>
				elm = this.getElements("x" + infix + "_mas_services_billingcol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->mas_services_billingcol->caption(), $mas_services_billing_add->mas_services_billingcol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->DrShareAmount->caption(), $mas_services_billing_add->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_add->DrShareAmount->errorMessage()) ?>");
			<?php if ($mas_services_billing_add->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->HospShareAmount->caption(), $mas_services_billing_add->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_add->HospShareAmount->errorMessage()) ?>");
			<?php if ($mas_services_billing_add->DrSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->DrSharePer->caption(), $mas_services_billing_add->DrSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_add->DrSharePer->errorMessage()) ?>");
			<?php if ($mas_services_billing_add->HospSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->HospSharePer->caption(), $mas_services_billing_add->HospSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_add->HospSharePer->errorMessage()) ?>");
			<?php if ($mas_services_billing_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->HospID->caption(), $mas_services_billing_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->TestSubCd->caption(), $mas_services_billing_add->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->Method->caption(), $mas_services_billing_add->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->Order->caption(), $mas_services_billing_add->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_add->Order->errorMessage()) ?>");
			<?php if ($mas_services_billing_add->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->Form->caption(), $mas_services_billing_add->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->ResType->caption(), $mas_services_billing_add->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->UnitCD->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->UnitCD->caption(), $mas_services_billing_add->UnitCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->RefValue->Required) { ?>
				elm = this.getElements("x" + infix + "_RefValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->RefValue->caption(), $mas_services_billing_add->RefValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->Sample->caption(), $mas_services_billing_add->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->NoD->caption(), $mas_services_billing_add->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_add->NoD->errorMessage()) ?>");
			<?php if ($mas_services_billing_add->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->BillOrder->caption(), $mas_services_billing_add->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_services_billing_add->BillOrder->errorMessage()) ?>");
			<?php if ($mas_services_billing_add->Formula->Required) { ?>
				elm = this.getElements("x" + infix + "_Formula");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->Formula->caption(), $mas_services_billing_add->Formula->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->Inactive->caption(), $mas_services_billing_add->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->Outsource->Required) { ?>
				elm = this.getElements("x" + infix + "_Outsource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->Outsource->caption(), $mas_services_billing_add->Outsource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->CollSample->caption(), $mas_services_billing_add->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->TestType->caption(), $mas_services_billing_add->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->NoHeading->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHeading");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->NoHeading->caption(), $mas_services_billing_add->NoHeading->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->ChemicalCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->ChemicalCode->caption(), $mas_services_billing_add->ChemicalCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->ChemicalName->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->ChemicalName->caption(), $mas_services_billing_add->ChemicalName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->Utilaization->Required) { ?>
				elm = this.getElements("x" + infix + "_Utilaization");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->Utilaization->caption(), $mas_services_billing_add->Utilaization->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_services_billing_add->Interpretation->Required) { ?>
				elm = this.getElements("x" + infix + "_Interpretation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing_add->Interpretation->caption(), $mas_services_billing_add->Interpretation->RequiredErrorMessage)) ?>");
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
	fmas_services_billingadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_services_billingadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_services_billingadd.lists["x_SERVICE_TYPE"] = <?php echo $mas_services_billing_add->SERVICE_TYPE->Lookup->toClientList($mas_services_billing_add) ?>;
	fmas_services_billingadd.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($mas_services_billing_add->SERVICE_TYPE->lookupOptions()) ?>;
	fmas_services_billingadd.lists["x_DEPARTMENT"] = <?php echo $mas_services_billing_add->DEPARTMENT->Lookup->toClientList($mas_services_billing_add) ?>;
	fmas_services_billingadd.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($mas_services_billing_add->DEPARTMENT->lookupOptions()) ?>;
	loadjs.done("fmas_services_billingadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_services_billing_add->showPageHeader(); ?>
<?php
$mas_services_billing_add->showMessage();
?>
<form name="fmas_services_billingadd" id="fmas_services_billingadd" class="<?php echo $mas_services_billing_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services_billing">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mas_services_billing_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($mas_services_billing_add->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_mas_services_billing_CODE" for="x_CODE" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_CODE" type="text/html"><?php echo $mas_services_billing_add->CODE->caption() ?><?php echo $mas_services_billing_add->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->CODE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_CODE" type="text/html"><span id="el_mas_services_billing_CODE">
<input type="text" data-table="mas_services_billing" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_add->CODE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->CODE->EditValue ?>"<?php echo $mas_services_billing_add->CODE->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->SERVICE->Visible) { // SERVICE ?>
	<div id="r_SERVICE" class="form-group row">
		<label id="elh_mas_services_billing_SERVICE" for="x_SERVICE" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_SERVICE" type="text/html"><?php echo $mas_services_billing_add->SERVICE->caption() ?><?php echo $mas_services_billing_add->SERVICE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->SERVICE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_SERVICE" type="text/html"><span id="el_mas_services_billing_SERVICE">
<input type="text" data-table="mas_services_billing" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_add->SERVICE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->SERVICE->EditValue ?>"<?php echo $mas_services_billing_add->SERVICE->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->SERVICE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->UNITS->Visible) { // UNITS ?>
	<div id="r_UNITS" class="form-group row">
		<label id="elh_mas_services_billing_UNITS" for="x_UNITS" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_UNITS" type="text/html"><?php echo $mas_services_billing_add->UNITS->caption() ?><?php echo $mas_services_billing_add->UNITS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->UNITS->cellAttributes() ?>>
<script id="tpx_mas_services_billing_UNITS" type="text/html"><span id="el_mas_services_billing_UNITS">
<input type="text" data-table="mas_services_billing" data-field="x_UNITS" name="x_UNITS" id="x_UNITS" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_add->UNITS->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->UNITS->EditValue ?>"<?php echo $mas_services_billing_add->UNITS->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->UNITS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->AMOUNT->Visible) { // AMOUNT ?>
	<div id="r_AMOUNT" class="form-group row">
		<label id="elh_mas_services_billing_AMOUNT" for="x_AMOUNT" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_AMOUNT" type="text/html"><?php echo $mas_services_billing_add->AMOUNT->caption() ?><?php echo $mas_services_billing_add->AMOUNT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->AMOUNT->cellAttributes() ?>>
<script id="tpx_mas_services_billing_AMOUNT" type="text/html"><span id="el_mas_services_billing_AMOUNT">
<input type="text" data-table="mas_services_billing" data-field="x_AMOUNT" name="x_AMOUNT" id="x_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing_add->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->AMOUNT->EditValue ?>"<?php echo $mas_services_billing_add->AMOUNT->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->AMOUNT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="r_SERVICE_TYPE" class="form-group row">
		<label id="elh_mas_services_billing_SERVICE_TYPE" for="x_SERVICE_TYPE" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_SERVICE_TYPE" type="text/html"><?php echo $mas_services_billing_add->SERVICE_TYPE->caption() ?><?php echo $mas_services_billing_add->SERVICE_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->SERVICE_TYPE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_SERVICE_TYPE" type="text/html"><span id="el_mas_services_billing_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing_add->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $mas_services_billing_add->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $mas_services_billing_add->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$mas_services_billing_add->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing_add->SERVICE_TYPE->caption() ?>" data-title="<?php echo $mas_services_billing_add->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_services_billing_add->SERVICE_TYPE->Lookup->getParamTag($mas_services_billing_add, "p_x_SERVICE_TYPE") ?>
</span></script>
<?php echo $mas_services_billing_add->SERVICE_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label id="elh_mas_services_billing_DEPARTMENT" for="x_DEPARTMENT" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_DEPARTMENT" type="text/html"><?php echo $mas_services_billing_add->DEPARTMENT->caption() ?><?php echo $mas_services_billing_add->DEPARTMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->DEPARTMENT->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DEPARTMENT" type="text/html"><span id="el_mas_services_billing_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing_add->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x_DEPARTMENT" name="x_DEPARTMENT"<?php echo $mas_services_billing_add->DEPARTMENT->editAttributes() ?>>
			<?php echo $mas_services_billing_add->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$mas_services_billing_add->DEPARTMENT->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing_add->DEPARTMENT->caption() ?>" data-title="<?php echo $mas_services_billing_add->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_services_billing_add->DEPARTMENT->Lookup->getParamTag($mas_services_billing_add, "p_x_DEPARTMENT") ?>
</span></script>
<?php echo $mas_services_billing_add->DEPARTMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<div id="r_mas_services_billingcol" class="form-group row">
		<label id="elh_mas_services_billing_mas_services_billingcol" for="x_mas_services_billingcol" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_mas_services_billingcol" type="text/html"><?php echo $mas_services_billing_add->mas_services_billingcol->caption() ?><?php echo $mas_services_billing_add->mas_services_billingcol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->mas_services_billingcol->cellAttributes() ?>>
<script id="tpx_mas_services_billing_mas_services_billingcol" type="text/html"><span id="el_mas_services_billing_mas_services_billingcol">
<input type="text" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x_mas_services_billingcol" id="x_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->mas_services_billingcol->EditValue ?>"<?php echo $mas_services_billing_add->mas_services_billingcol->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->mas_services_billingcol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label id="elh_mas_services_billing_DrShareAmount" for="x_DrShareAmount" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_DrShareAmount" type="text/html"><?php echo $mas_services_billing_add->DrShareAmount->caption() ?><?php echo $mas_services_billing_add->DrShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->DrShareAmount->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DrShareAmount" type="text/html"><span id="el_mas_services_billing_DrShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_add->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->DrShareAmount->EditValue ?>"<?php echo $mas_services_billing_add->DrShareAmount->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label id="elh_mas_services_billing_HospShareAmount" for="x_HospShareAmount" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_HospShareAmount" type="text/html"><?php echo $mas_services_billing_add->HospShareAmount->caption() ?><?php echo $mas_services_billing_add->HospShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->HospShareAmount->cellAttributes() ?>>
<script id="tpx_mas_services_billing_HospShareAmount" type="text/html"><span id="el_mas_services_billing_HospShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_add->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->HospShareAmount->EditValue ?>"<?php echo $mas_services_billing_add->HospShareAmount->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->DrSharePer->Visible) { // DrSharePer ?>
	<div id="r_DrSharePer" class="form-group row">
		<label id="elh_mas_services_billing_DrSharePer" for="x_DrSharePer" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_DrSharePer" type="text/html"><?php echo $mas_services_billing_add->DrSharePer->caption() ?><?php echo $mas_services_billing_add->DrSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->DrSharePer->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DrSharePer" type="text/html"><span id="el_mas_services_billing_DrSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_DrSharePer" name="x_DrSharePer" id="x_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_add->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->DrSharePer->EditValue ?>"<?php echo $mas_services_billing_add->DrSharePer->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->DrSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->HospSharePer->Visible) { // HospSharePer ?>
	<div id="r_HospSharePer" class="form-group row">
		<label id="elh_mas_services_billing_HospSharePer" for="x_HospSharePer" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_HospSharePer" type="text/html"><?php echo $mas_services_billing_add->HospSharePer->caption() ?><?php echo $mas_services_billing_add->HospSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->HospSharePer->cellAttributes() ?>>
<script id="tpx_mas_services_billing_HospSharePer" type="text/html"><span id="el_mas_services_billing_HospSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_HospSharePer" name="x_HospSharePer" id="x_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_add->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->HospSharePer->EditValue ?>"<?php echo $mas_services_billing_add->HospSharePer->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->HospSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_mas_services_billing_TestSubCd" for="x_TestSubCd" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_TestSubCd" type="text/html"><?php echo $mas_services_billing_add->TestSubCd->caption() ?><?php echo $mas_services_billing_add->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->TestSubCd->cellAttributes() ?>>
<script id="tpx_mas_services_billing_TestSubCd" type="text/html"><span id="el_mas_services_billing_TestSubCd">
<input type="text" data-table="mas_services_billing" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->TestSubCd->EditValue ?>"<?php echo $mas_services_billing_add->TestSubCd->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_mas_services_billing_Method" for="x_Method" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Method" type="text/html"><?php echo $mas_services_billing_add->Method->caption() ?><?php echo $mas_services_billing_add->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->Method->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Method" type="text/html"><span id="el_mas_services_billing_Method">
<input type="text" data-table="mas_services_billing" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->Method->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->Method->EditValue ?>"<?php echo $mas_services_billing_add->Method->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_mas_services_billing_Order" for="x_Order" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Order" type="text/html"><?php echo $mas_services_billing_add->Order->caption() ?><?php echo $mas_services_billing_add->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->Order->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Order" type="text/html"><span id="el_mas_services_billing_Order">
<input type="text" data-table="mas_services_billing" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_add->Order->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->Order->EditValue ?>"<?php echo $mas_services_billing_add->Order->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_mas_services_billing_Form" for="x_Form" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Form" type="text/html"><?php echo $mas_services_billing_add->Form->caption() ?><?php echo $mas_services_billing_add->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->Form->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Form" type="text/html"><span id="el_mas_services_billing_Form">
<textarea data-table="mas_services_billing" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?php echo HtmlEncode($mas_services_billing_add->Form->getPlaceHolder()) ?>"<?php echo $mas_services_billing_add->Form->editAttributes() ?>><?php echo $mas_services_billing_add->Form->EditValue ?></textarea>
</span></script>
<?php echo $mas_services_billing_add->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_mas_services_billing_ResType" for="x_ResType" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_ResType" type="text/html"><?php echo $mas_services_billing_add->ResType->caption() ?><?php echo $mas_services_billing_add->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->ResType->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ResType" type="text/html"><span id="el_mas_services_billing_ResType">
<input type="text" data-table="mas_services_billing" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->ResType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->ResType->EditValue ?>"<?php echo $mas_services_billing_add->ResType->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->UnitCD->Visible) { // UnitCD ?>
	<div id="r_UnitCD" class="form-group row">
		<label id="elh_mas_services_billing_UnitCD" for="x_UnitCD" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_UnitCD" type="text/html"><?php echo $mas_services_billing_add->UnitCD->caption() ?><?php echo $mas_services_billing_add->UnitCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->UnitCD->cellAttributes() ?>>
<script id="tpx_mas_services_billing_UnitCD" type="text/html"><span id="el_mas_services_billing_UnitCD">
<input type="text" data-table="mas_services_billing" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->UnitCD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->UnitCD->EditValue ?>"<?php echo $mas_services_billing_add->UnitCD->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->UnitCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_mas_services_billing_RefValue" for="x_RefValue" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_RefValue" type="text/html"><?php echo $mas_services_billing_add->RefValue->caption() ?><?php echo $mas_services_billing_add->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->RefValue->cellAttributes() ?>>
<script id="tpx_mas_services_billing_RefValue" type="text/html"><span id="el_mas_services_billing_RefValue">
<textarea data-table="mas_services_billing" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($mas_services_billing_add->RefValue->getPlaceHolder()) ?>"<?php echo $mas_services_billing_add->RefValue->editAttributes() ?>><?php echo $mas_services_billing_add->RefValue->EditValue ?></textarea>
</span></script>
<?php echo $mas_services_billing_add->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_mas_services_billing_Sample" for="x_Sample" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Sample" type="text/html"><?php echo $mas_services_billing_add->Sample->caption() ?><?php echo $mas_services_billing_add->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->Sample->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Sample" type="text/html"><span id="el_mas_services_billing_Sample">
<input type="text" data-table="mas_services_billing" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($mas_services_billing_add->Sample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->Sample->EditValue ?>"<?php echo $mas_services_billing_add->Sample->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_mas_services_billing_NoD" for="x_NoD" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_NoD" type="text/html"><?php echo $mas_services_billing_add->NoD->caption() ?><?php echo $mas_services_billing_add->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->NoD->cellAttributes() ?>>
<script id="tpx_mas_services_billing_NoD" type="text/html"><span id="el_mas_services_billing_NoD">
<input type="text" data-table="mas_services_billing" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_add->NoD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->NoD->EditValue ?>"<?php echo $mas_services_billing_add->NoD->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_mas_services_billing_BillOrder" for="x_BillOrder" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_BillOrder" type="text/html"><?php echo $mas_services_billing_add->BillOrder->caption() ?><?php echo $mas_services_billing_add->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->BillOrder->cellAttributes() ?>>
<script id="tpx_mas_services_billing_BillOrder" type="text/html"><span id="el_mas_services_billing_BillOrder">
<input type="text" data-table="mas_services_billing" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing_add->BillOrder->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->BillOrder->EditValue ?>"<?php echo $mas_services_billing_add->BillOrder->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_mas_services_billing_Formula" for="x_Formula" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Formula" type="text/html"><?php echo $mas_services_billing_add->Formula->caption() ?><?php echo $mas_services_billing_add->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->Formula->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Formula" type="text/html"><span id="el_mas_services_billing_Formula">
<textarea data-table="mas_services_billing" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($mas_services_billing_add->Formula->getPlaceHolder()) ?>"<?php echo $mas_services_billing_add->Formula->editAttributes() ?>><?php echo $mas_services_billing_add->Formula->EditValue ?></textarea>
</span></script>
<?php echo $mas_services_billing_add->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_mas_services_billing_Inactive" for="x_Inactive" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Inactive" type="text/html"><?php echo $mas_services_billing_add->Inactive->caption() ?><?php echo $mas_services_billing_add->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->Inactive->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Inactive" type="text/html"><span id="el_mas_services_billing_Inactive">
<input type="text" data-table="mas_services_billing" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->Inactive->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->Inactive->EditValue ?>"<?php echo $mas_services_billing_add->Inactive->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->Outsource->Visible) { // Outsource ?>
	<div id="r_Outsource" class="form-group row">
		<label id="elh_mas_services_billing_Outsource" for="x_Outsource" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Outsource" type="text/html"><?php echo $mas_services_billing_add->Outsource->caption() ?><?php echo $mas_services_billing_add->Outsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->Outsource->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Outsource" type="text/html"><span id="el_mas_services_billing_Outsource">
<input type="text" data-table="mas_services_billing" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->Outsource->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->Outsource->EditValue ?>"<?php echo $mas_services_billing_add->Outsource->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->Outsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_mas_services_billing_CollSample" for="x_CollSample" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_CollSample" type="text/html"><?php echo $mas_services_billing_add->CollSample->caption() ?><?php echo $mas_services_billing_add->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->CollSample->cellAttributes() ?>>
<script id="tpx_mas_services_billing_CollSample" type="text/html"><span id="el_mas_services_billing_CollSample">
<input type="text" data-table="mas_services_billing" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->CollSample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->CollSample->EditValue ?>"<?php echo $mas_services_billing_add->CollSample->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_mas_services_billing_TestType" for="x_TestType" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_TestType" type="text/html"><?php echo $mas_services_billing_add->TestType->caption() ?><?php echo $mas_services_billing_add->TestType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->TestType->cellAttributes() ?>>
<script id="tpx_mas_services_billing_TestType" type="text/html"><span id="el_mas_services_billing_TestType">
<input type="text" data-table="mas_services_billing" data-field="x_TestType" name="x_TestType" id="x_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->TestType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->TestType->EditValue ?>"<?php echo $mas_services_billing_add->TestType->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->NoHeading->Visible) { // NoHeading ?>
	<div id="r_NoHeading" class="form-group row">
		<label id="elh_mas_services_billing_NoHeading" for="x_NoHeading" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_NoHeading" type="text/html"><?php echo $mas_services_billing_add->NoHeading->caption() ?><?php echo $mas_services_billing_add->NoHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->NoHeading->cellAttributes() ?>>
<script id="tpx_mas_services_billing_NoHeading" type="text/html"><span id="el_mas_services_billing_NoHeading">
<input type="text" data-table="mas_services_billing" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->NoHeading->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->NoHeading->EditValue ?>"<?php echo $mas_services_billing_add->NoHeading->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->NoHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->ChemicalCode->Visible) { // ChemicalCode ?>
	<div id="r_ChemicalCode" class="form-group row">
		<label id="elh_mas_services_billing_ChemicalCode" for="x_ChemicalCode" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_ChemicalCode" type="text/html"><?php echo $mas_services_billing_add->ChemicalCode->caption() ?><?php echo $mas_services_billing_add->ChemicalCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->ChemicalCode->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ChemicalCode" type="text/html"><span id="el_mas_services_billing_ChemicalCode">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x_ChemicalCode" id="x_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->ChemicalCode->EditValue ?>"<?php echo $mas_services_billing_add->ChemicalCode->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->ChemicalCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->ChemicalName->Visible) { // ChemicalName ?>
	<div id="r_ChemicalName" class="form-group row">
		<label id="elh_mas_services_billing_ChemicalName" for="x_ChemicalName" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_ChemicalName" type="text/html"><?php echo $mas_services_billing_add->ChemicalName->caption() ?><?php echo $mas_services_billing_add->ChemicalName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->ChemicalName->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ChemicalName" type="text/html"><span id="el_mas_services_billing_ChemicalName">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalName" name="x_ChemicalName" id="x_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->ChemicalName->EditValue ?>"<?php echo $mas_services_billing_add->ChemicalName->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->ChemicalName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->Utilaization->Visible) { // Utilaization ?>
	<div id="r_Utilaization" class="form-group row">
		<label id="elh_mas_services_billing_Utilaization" for="x_Utilaization" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Utilaization" type="text/html"><?php echo $mas_services_billing_add->Utilaization->caption() ?><?php echo $mas_services_billing_add->Utilaization->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->Utilaization->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Utilaization" type="text/html"><span id="el_mas_services_billing_Utilaization">
<input type="text" data-table="mas_services_billing" data-field="x_Utilaization" name="x_Utilaization" id="x_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing_add->Utilaization->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing_add->Utilaization->EditValue ?>"<?php echo $mas_services_billing_add->Utilaization->editAttributes() ?>>
</span></script>
<?php echo $mas_services_billing_add->Utilaization->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing_add->Interpretation->Visible) { // Interpretation ?>
	<div id="r_Interpretation" class="form-group row">
		<label id="elh_mas_services_billing_Interpretation" class="<?php echo $mas_services_billing_add->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Interpretation" type="text/html"><?php echo $mas_services_billing_add->Interpretation->caption() ?><?php echo $mas_services_billing_add->Interpretation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $mas_services_billing_add->RightColumnClass ?>"><div <?php echo $mas_services_billing_add->Interpretation->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Interpretation" type="text/html"><span id="el_mas_services_billing_Interpretation">
<?php $mas_services_billing_add->Interpretation->EditAttrs->appendClass("editor"); ?>
<textarea data-table="mas_services_billing" data-field="x_Interpretation" name="x_Interpretation" id="x_Interpretation" cols="35" rows="4" placeholder="<?php echo HtmlEncode($mas_services_billing_add->Interpretation->getPlaceHolder()) ?>"<?php echo $mas_services_billing_add->Interpretation->editAttributes() ?>><?php echo $mas_services_billing_add->Interpretation->EditValue ?></textarea>
</span></script>
<script type="text/html" class="mas_services_billingadd_js">
loadjs.ready(["fmas_services_billingadd", "editor"], function() {
	ew.createEditor("fmas_services_billingadd", "x_Interpretation", 35, 4, <?php echo $mas_services_billing_add->Interpretation->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $mas_services_billing_add->Interpretation->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_mas_services_billingadd" class="ew-custom-template"></div>
<script id="tpm_mas_services_billingadd" type="text/html">
<div id="ct_mas_services_billing_add"><style>
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
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_CODE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_CODE")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_SERVICE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_SERVICE")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_UNITS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_UNITS")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_AMOUNT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_AMOUNT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_SERVICE_TYPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_SERVICE_TYPE")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DEPARTMENT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_DEPARTMENT")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_mas_services_billingcol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_mas_services_billingcol")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DrShareAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_DrShareAmount")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_HospShareAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_HospShareAmount")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DrSharePer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_DrSharePer")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_HospSharePer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_HospSharePer")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_TestSubCd"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_TestSubCd")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Method"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Method")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Order"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Order")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Form"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Form")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ResType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_ResType")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_UnitCD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_UnitCD")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Inactive"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Inactive")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Outsource"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Outsource")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_CollSample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_CollSample")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_RefValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_RefValue")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Sample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Sample")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_NoD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_NoD")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_BillOrder"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_BillOrder")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Formula"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Formula")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_TestType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_TestType")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_NoHeading"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_NoHeading")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ChemicalCode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_ChemicalCode")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ChemicalName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_ChemicalName")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Utilaization"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Utilaization")/}}</span>
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
{{include tmpl="#tpc_mas_services_billing_Interpretation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Interpretation")/}}
</div>
</div>
</script>

<?php if (!$mas_services_billing_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_services_billing_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_services_billing_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($mas_services_billing->Rows) ?> };
	ew.applyTemplate("tpd_mas_services_billingadd", "tpm_mas_services_billingadd", "mas_services_billingadd", "<?php echo $mas_services_billing->CustomExport ?>", ew.templateData.rows[0]);
	$("script.mas_services_billingadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$mas_services_billing_add->showPageFooter();
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
$mas_services_billing_add->terminate();
?>