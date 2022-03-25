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
$patient_services_search = new patient_services_search();

// Run the page
$patient_services_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_services_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_servicessearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($patient_services_search->IsModal) { ?>
	fpatient_servicessearch = currentAdvancedSearchForm = new ew.Form("fpatient_servicessearch", "search");
	<?php } else { ?>
	fpatient_servicessearch = currentForm = new ew.Form("fpatient_servicessearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fpatient_servicessearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Reception");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->Reception->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_amount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->amount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_patient_type");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->patient_type->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_charged_date");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->charged_date->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createdby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->createdby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->createddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifiedby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->modifiedby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifieddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->modifieddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Unit");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->Unit->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Quantity");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->Quantity->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Discount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->Discount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SubTotal");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->SubTotal->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Aid");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->Aid->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Vid");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->Vid->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DrID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->DrID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DrSharePres");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->DrSharePres->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospSharePres");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->HospSharePres->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DrShareAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->DrShareAmount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospShareAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->HospShareAmount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->DrShareSettiledAmount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DrShareSettledId");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->DrShareSettledId->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->DrShareSettiledStatus->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_invoiceId");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->invoiceId->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_invoiceAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->invoiceAmount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->HospID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RIDNO");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->RIDNO->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_TidNo");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->TidNo->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_sid");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->sid->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PrintDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->PrintDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BillingDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->BillingDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ResultDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->ResultDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SampleDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->SampleDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ReceivedDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->ReceivedDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DeptRecvDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->DeptRecvDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SAuthDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->SAuthDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_AuthDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->AuthDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_EditDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->EditDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PatID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->PatID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_CId");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->CId->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Order");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->Order->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_NoD");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->NoD->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BillOrder");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->BillOrder->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RepeatedDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->RepeatedDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_serviceID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->serviceID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RequestNo");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_services_search->RequestNo->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_servicessearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_servicessearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_servicessearch.lists["x_Services"] = <?php echo $patient_services_search->Services->Lookup->toClientList($patient_services_search) ?>;
	fpatient_servicessearch.lists["x_Services"].options = <?php echo JsonEncode($patient_services_search->Services->lookupOptions()) ?>;
	fpatient_servicessearch.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_servicessearch.lists["x_status"] = <?php echo $patient_services_search->status->Lookup->toClientList($patient_services_search) ?>;
	fpatient_servicessearch.lists["x_status"].options = <?php echo JsonEncode($patient_services_search->status->lookupOptions()) ?>;
	fpatient_servicessearch.lists["x_ServiceSelect[]"] = <?php echo $patient_services_search->ServiceSelect->Lookup->toClientList($patient_services_search) ?>;
	fpatient_servicessearch.lists["x_ServiceSelect[]"].options = <?php echo JsonEncode($patient_services_search->ServiceSelect->options(FALSE, TRUE)) ?>;
	loadjs.done("fpatient_servicessearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_services_search->showPageHeader(); ?>
<?php
$patient_services_search->showMessage();
?>
<form name="fpatient_servicessearch" id="fpatient_servicessearch" class="<?php echo $patient_services_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$patient_services_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($patient_services_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_id"><?php echo $patient_services_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->id->cellAttributes() ?>>
			<span id="el_patient_services_id" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($patient_services_search->id->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->id->EditValue ?>"<?php echo $patient_services_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Reception"><?php echo $patient_services_search->Reception->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Reception->cellAttributes() ?>>
			<span id="el_patient_services_Reception" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Reception->EditValue ?>"<?php echo $patient_services_search->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Services->Visible) { // Services ?>
	<div id="r_Services" class="form-group row">
		<label class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Services"><?php echo $patient_services_search->Services->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Services" id="z_Services" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Services->cellAttributes() ?>>
			<span id="el_patient_services_Services" class="ew-search-field">
<?php
$onchange = $patient_services_search->Services->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_services_search->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x_Services">
	<input type="text" class="form-control" name="sv_x_Services" id="sv_x_Services" value="<?php echo RemoveHtml($patient_services_search->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services_search->Services->getPlaceHolder()) ?>"<?php echo $patient_services_search->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services_search->Services->displayValueSeparatorAttribute() ?>" name="x_Services" id="x_Services" value="<?php echo HtmlEncode($patient_services_search->Services->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_servicessearch"], function() {
	fpatient_servicessearch.createAutoSuggest({"id":"x_Services","forceSelect":false});
});
</script>
<?php echo $patient_services_search->Services->Lookup->getParamTag($patient_services_search, "p_x_Services") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label for="x_amount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_amount"><?php echo $patient_services_search->amount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_amount" id="z_amount" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->amount->cellAttributes() ?>>
			<span id="el_patient_services_amount" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_amount" name="x_amount" id="x_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_search->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->amount->EditValue ?>"<?php echo $patient_services_search->amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label for="x_description" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_description"><?php echo $patient_services_search->description->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_description" id="z_description" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->description->cellAttributes() ?>>
			<span id="el_patient_services_description" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_description" name="x_description" id="x_description" placeholder="<?php echo HtmlEncode($patient_services_search->description->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->description->EditValue ?>"<?php echo $patient_services_search->description->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->patient_type->Visible) { // patient_type ?>
	<div id="r_patient_type" class="form-group row">
		<label for="x_patient_type" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_patient_type"><?php echo $patient_services_search->patient_type->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_patient_type" id="z_patient_type" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->patient_type->cellAttributes() ?>>
			<span id="el_patient_services_patient_type" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x_patient_type" id="x_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->patient_type->EditValue ?>"<?php echo $patient_services_search->patient_type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label for="x_charged_date" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_charged_date"><?php echo $patient_services_search->charged_date->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_charged_date" id="z_charged_date" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->charged_date->cellAttributes() ?>>
			<span id="el_patient_services_charged_date" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?php echo HtmlEncode($patient_services_search->charged_date->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->charged_date->EditValue ?>"<?php echo $patient_services_search->charged_date->editAttributes() ?>>
<?php if (!$patient_services_search->charged_date->ReadOnly && !$patient_services_search->charged_date->Disabled && !isset($patient_services_search->charged_date->EditAttrs["readonly"]) && !isset($patient_services_search->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_status"><?php echo $patient_services_search->status->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->status->cellAttributes() ?>>
			<span id="el_patient_services_status" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services_search->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_services_search->status->editAttributes() ?>>
			<?php echo $patient_services_search->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_services_search->status->Lookup->getParamTag($patient_services_search, "p_x_status") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_createdby"><?php echo $patient_services_search->createdby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->createdby->cellAttributes() ?>>
			<span id="el_patient_services_createdby" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->createdby->EditValue ?>"<?php echo $patient_services_search->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_createddatetime"><?php echo $patient_services_search->createddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->createddatetime->cellAttributes() ?>>
			<span id="el_patient_services_createddatetime" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_services_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->createddatetime->EditValue ?>"<?php echo $patient_services_search->createddatetime->editAttributes() ?>>
<?php if (!$patient_services_search->createddatetime->ReadOnly && !$patient_services_search->createddatetime->Disabled && !isset($patient_services_search->createddatetime->EditAttrs["readonly"]) && !isset($patient_services_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_modifiedby"><?php echo $patient_services_search->modifiedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->modifiedby->cellAttributes() ?>>
			<span id="el_patient_services_modifiedby" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->modifiedby->EditValue ?>"<?php echo $patient_services_search->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_modifieddatetime"><?php echo $patient_services_search->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->modifieddatetime->cellAttributes() ?>>
			<span id="el_patient_services_modifieddatetime" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_services_search->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->modifieddatetime->EditValue ?>"<?php echo $patient_services_search->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_services_search->modifieddatetime->ReadOnly && !$patient_services_search->modifieddatetime->Disabled && !isset($patient_services_search->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_services_search->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_mrnno"><?php echo $patient_services_search->mrnno->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->mrnno->cellAttributes() ?>>
			<span id="el_patient_services_mrnno" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->mrnno->EditValue ?>"<?php echo $patient_services_search->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_PatientName"><?php echo $patient_services_search->PatientName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->PatientName->cellAttributes() ?>>
			<span id="el_patient_services_PatientName" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->PatientName->EditValue ?>"<?php echo $patient_services_search->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Age"><?php echo $patient_services_search->Age->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Age->cellAttributes() ?>>
			<span id="el_patient_services_Age" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Age->EditValue ?>"<?php echo $patient_services_search->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Gender"><?php echo $patient_services_search->Gender->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Gender->cellAttributes() ?>>
			<span id="el_patient_services_Gender" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Gender->EditValue ?>"<?php echo $patient_services_search->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_profilePic"><?php echo $patient_services_search->profilePic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->profilePic->cellAttributes() ?>>
			<span id="el_patient_services_profilePic" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($patient_services_search->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->profilePic->EditValue ?>"<?php echo $patient_services_search->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Unit->Visible) { // Unit ?>
	<div id="r_Unit" class="form-group row">
		<label for="x_Unit" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Unit"><?php echo $patient_services_search->Unit->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Unit" id="z_Unit" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Unit->cellAttributes() ?>>
			<span id="el_patient_services_Unit" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x_Unit" id="x_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Unit->EditValue ?>"<?php echo $patient_services_search->Unit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label for="x_Quantity" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Quantity"><?php echo $patient_services_search->Quantity->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Quantity" id="z_Quantity" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Quantity->cellAttributes() ?>>
			<span id="el_patient_services_Quantity" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services_search->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Quantity->EditValue ?>"<?php echo $patient_services_search->Quantity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label for="x_Discount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Discount"><?php echo $patient_services_search->Discount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Discount" id="z_Discount" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Discount->cellAttributes() ?>>
			<span id="el_patient_services_Discount" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x_Discount" id="x_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_search->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Discount->EditValue ?>"<?php echo $patient_services_search->Discount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->SubTotal->Visible) { // SubTotal ?>
	<div id="r_SubTotal" class="form-group row">
		<label for="x_SubTotal" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SubTotal"><?php echo $patient_services_search->SubTotal->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SubTotal" id="z_SubTotal" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->SubTotal->cellAttributes() ?>>
			<span id="el_patient_services_SubTotal" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_search->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->SubTotal->EditValue ?>"<?php echo $patient_services_search->SubTotal->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->ServiceSelect->Visible) { // ServiceSelect ?>
	<div id="r_ServiceSelect" class="form-group row">
		<label class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ServiceSelect"><?php echo $patient_services_search->ServiceSelect->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ServiceSelect" id="z_ServiceSelect" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->ServiceSelect->cellAttributes() ?>>
			<span id="el_patient_services_ServiceSelect" class="ew-search-field">
<div id="tp_x_ServiceSelect" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services_search->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x_ServiceSelect[]" id="x_ServiceSelect[]" value="{value}"<?php echo $patient_services_search->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services_search->ServiceSelect->checkBoxListHtml(FALSE, "x_ServiceSelect[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Aid->Visible) { // Aid ?>
	<div id="r_Aid" class="form-group row">
		<label for="x_Aid" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Aid"><?php echo $patient_services_search->Aid->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Aid" id="z_Aid" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Aid->cellAttributes() ?>>
			<span id="el_patient_services_Aid" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x_Aid" id="x_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Aid->EditValue ?>"<?php echo $patient_services_search->Aid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Vid->Visible) { // Vid ?>
	<div id="r_Vid" class="form-group row">
		<label for="x_Vid" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Vid"><?php echo $patient_services_search->Vid->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Vid" id="z_Vid" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Vid->cellAttributes() ?>>
			<span id="el_patient_services_Vid" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x_Vid" id="x_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Vid->EditValue ?>"<?php echo $patient_services_search->Vid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrID"><?php echo $patient_services_search->DrID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DrID" id="z_DrID" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DrID->cellAttributes() ?>>
			<span id="el_patient_services_DrID" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DrID->EditValue ?>"<?php echo $patient_services_search->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DrCODE->Visible) { // DrCODE ?>
	<div id="r_DrCODE" class="form-group row">
		<label for="x_DrCODE" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrCODE"><?php echo $patient_services_search->DrCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrCODE" id="z_DrCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DrCODE->cellAttributes() ?>>
			<span id="el_patient_services_DrCODE" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x_DrCODE" id="x_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DrCODE->EditValue ?>"<?php echo $patient_services_search->DrCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label for="x_DrName" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrName"><?php echo $patient_services_search->DrName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrName" id="z_DrName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DrName->cellAttributes() ?>>
			<span id="el_patient_services_DrName" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DrName->EditValue ?>"<?php echo $patient_services_search->DrName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label for="x_Department" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Department"><?php echo $patient_services_search->Department->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Department" id="z_Department" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Department->cellAttributes() ?>>
			<span id="el_patient_services_Department" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Department" name="x_Department" id="x_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Department->EditValue ?>"<?php echo $patient_services_search->Department->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DrSharePres->Visible) { // DrSharePres ?>
	<div id="r_DrSharePres" class="form-group row">
		<label for="x_DrSharePres" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrSharePres"><?php echo $patient_services_search->DrSharePres->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DrSharePres" id="z_DrSharePres" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DrSharePres->cellAttributes() ?>>
			<span id="el_patient_services_DrSharePres" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x_DrSharePres" id="x_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DrSharePres->EditValue ?>"<?php echo $patient_services_search->DrSharePres->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->HospSharePres->Visible) { // HospSharePres ?>
	<div id="r_HospSharePres" class="form-group row">
		<label for="x_HospSharePres" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_HospSharePres"><?php echo $patient_services_search->HospSharePres->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospSharePres" id="z_HospSharePres" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->HospSharePres->cellAttributes() ?>>
			<span id="el_patient_services_HospSharePres" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x_HospSharePres" id="x_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->HospSharePres->EditValue ?>"<?php echo $patient_services_search->HospSharePres->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label for="x_DrShareAmount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrShareAmount"><?php echo $patient_services_search->DrShareAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DrShareAmount" id="z_DrShareAmount" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DrShareAmount->cellAttributes() ?>>
			<span id="el_patient_services_DrShareAmount" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DrShareAmount->EditValue ?>"<?php echo $patient_services_search->DrShareAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label for="x_HospShareAmount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_HospShareAmount"><?php echo $patient_services_search->HospShareAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospShareAmount" id="z_HospShareAmount" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->HospShareAmount->cellAttributes() ?>>
			<span id="el_patient_services_HospShareAmount" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->HospShareAmount->EditValue ?>"<?php echo $patient_services_search->HospShareAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<div id="r_DrShareSettiledAmount" class="form-group row">
		<label for="x_DrShareSettiledAmount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledAmount"><?php echo $patient_services_search->DrShareSettiledAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DrShareSettiledAmount" id="z_DrShareSettiledAmount" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DrShareSettiledAmount->cellAttributes() ?>>
			<span id="el_patient_services_DrShareSettiledAmount" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x_DrShareSettiledAmount" id="x_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services_search->DrShareSettiledAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<div id="r_DrShareSettledId" class="form-group row">
		<label for="x_DrShareSettledId" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrShareSettledId"><?php echo $patient_services_search->DrShareSettledId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DrShareSettledId" id="z_DrShareSettledId" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DrShareSettledId->cellAttributes() ?>>
			<span id="el_patient_services_DrShareSettledId" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x_DrShareSettledId" id="x_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DrShareSettledId->EditValue ?>"<?php echo $patient_services_search->DrShareSettledId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<div id="r_DrShareSettiledStatus" class="form-group row">
		<label for="x_DrShareSettiledStatus" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledStatus"><?php echo $patient_services_search->DrShareSettiledStatus->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DrShareSettiledStatus" id="z_DrShareSettiledStatus" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DrShareSettiledStatus->cellAttributes() ?>>
			<span id="el_patient_services_DrShareSettiledStatus" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x_DrShareSettiledStatus" id="x_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services_search->DrShareSettiledStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->invoiceId->Visible) { // invoiceId ?>
	<div id="r_invoiceId" class="form-group row">
		<label for="x_invoiceId" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_invoiceId"><?php echo $patient_services_search->invoiceId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_invoiceId" id="z_invoiceId" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->invoiceId->cellAttributes() ?>>
			<span id="el_patient_services_invoiceId" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->invoiceId->EditValue ?>"<?php echo $patient_services_search->invoiceId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->invoiceAmount->Visible) { // invoiceAmount ?>
	<div id="r_invoiceAmount" class="form-group row">
		<label for="x_invoiceAmount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_invoiceAmount"><?php echo $patient_services_search->invoiceAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_invoiceAmount" id="z_invoiceAmount" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->invoiceAmount->cellAttributes() ?>>
			<span id="el_patient_services_invoiceAmount" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->invoiceAmount->EditValue ?>"<?php echo $patient_services_search->invoiceAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->invoiceStatus->Visible) { // invoiceStatus ?>
	<div id="r_invoiceStatus" class="form-group row">
		<label for="x_invoiceStatus" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_invoiceStatus"><?php echo $patient_services_search->invoiceStatus->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_invoiceStatus" id="z_invoiceStatus" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->invoiceStatus->cellAttributes() ?>>
			<span id="el_patient_services_invoiceStatus" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->invoiceStatus->EditValue ?>"<?php echo $patient_services_search->invoiceStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->modeOfPayment->Visible) { // modeOfPayment ?>
	<div id="r_modeOfPayment" class="form-group row">
		<label for="x_modeOfPayment" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_modeOfPayment"><?php echo $patient_services_search->modeOfPayment->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modeOfPayment" id="z_modeOfPayment" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->modeOfPayment->cellAttributes() ?>>
			<span id="el_patient_services_modeOfPayment" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->modeOfPayment->EditValue ?>"<?php echo $patient_services_search->modeOfPayment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_HospID"><?php echo $patient_services_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->HospID->cellAttributes() ?>>
			<span id="el_patient_services_HospID" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->HospID->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->HospID->EditValue ?>"<?php echo $patient_services_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label for="x_RIDNO" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_RIDNO"><?php echo $patient_services_search->RIDNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RIDNO" id="z_RIDNO" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->RIDNO->cellAttributes() ?>>
			<span id="el_patient_services_RIDNO" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->RIDNO->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->RIDNO->EditValue ?>"<?php echo $patient_services_search->RIDNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_TidNo"><?php echo $patient_services_search->TidNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TidNo" id="z_TidNo" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->TidNo->cellAttributes() ?>>
			<span id="el_patient_services_TidNo" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->TidNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->TidNo->EditValue ?>"<?php echo $patient_services_search->TidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DiscountCategory->Visible) { // DiscountCategory ?>
	<div id="r_DiscountCategory" class="form-group row">
		<label for="x_DiscountCategory" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DiscountCategory"><?php echo $patient_services_search->DiscountCategory->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DiscountCategory" id="z_DiscountCategory" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DiscountCategory->cellAttributes() ?>>
			<span id="el_patient_services_DiscountCategory" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x_DiscountCategory" id="x_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DiscountCategory->EditValue ?>"<?php echo $patient_services_search->DiscountCategory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label for="x_sid" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_sid"><?php echo $patient_services_search->sid->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_sid" id="z_sid" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->sid->cellAttributes() ?>>
			<span id="el_patient_services_sid" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_sid" name="x_sid" id="x_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_search->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->sid->EditValue ?>"<?php echo $patient_services_search->sid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->ItemCode->Visible) { // ItemCode ?>
	<div id="r_ItemCode" class="form-group row">
		<label for="x_ItemCode" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ItemCode"><?php echo $patient_services_search->ItemCode->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ItemCode" id="z_ItemCode" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->ItemCode->cellAttributes() ?>>
			<span id="el_patient_services_ItemCode" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_search->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->ItemCode->EditValue ?>"<?php echo $patient_services_search->ItemCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label for="x_TestSubCd" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_TestSubCd"><?php echo $patient_services_search->TestSubCd->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestSubCd" id="z_TestSubCd" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->TestSubCd->cellAttributes() ?>>
			<span id="el_patient_services_TestSubCd" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->TestSubCd->EditValue ?>"<?php echo $patient_services_search->TestSubCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label for="x_DEptCd" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DEptCd"><?php echo $patient_services_search->DEptCd->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEptCd" id="z_DEptCd" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DEptCd->cellAttributes() ?>>
			<span id="el_patient_services_DEptCd" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DEptCd->EditValue ?>"<?php echo $patient_services_search->DEptCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->ProfCd->Visible) { // ProfCd ?>
	<div id="r_ProfCd" class="form-group row">
		<label for="x_ProfCd" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ProfCd"><?php echo $patient_services_search->ProfCd->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProfCd" id="z_ProfCd" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->ProfCd->cellAttributes() ?>>
			<span id="el_patient_services_ProfCd" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->ProfCd->EditValue ?>"<?php echo $patient_services_search->ProfCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->LabReport->Visible) { // LabReport ?>
	<div id="r_LabReport" class="form-group row">
		<label for="x_LabReport" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_LabReport"><?php echo $patient_services_search->LabReport->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LabReport" id="z_LabReport" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->LabReport->cellAttributes() ?>>
			<span id="el_patient_services_LabReport" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" size="35" placeholder="<?php echo HtmlEncode($patient_services_search->LabReport->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->LabReport->EditValue ?>"<?php echo $patient_services_search->LabReport->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label for="x_Comments" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Comments"><?php echo $patient_services_search->Comments->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Comments" id="z_Comments" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Comments->cellAttributes() ?>>
			<span id="el_patient_services_Comments" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Comments->EditValue ?>"<?php echo $patient_services_search->Comments->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label for="x_Method" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Method"><?php echo $patient_services_search->Method->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Method" id="z_Method" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Method->cellAttributes() ?>>
			<span id="el_patient_services_Method" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Method->EditValue ?>"<?php echo $patient_services_search->Method->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Specimen->Visible) { // Specimen ?>
	<div id="r_Specimen" class="form-group row">
		<label for="x_Specimen" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Specimen"><?php echo $patient_services_search->Specimen->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Specimen" id="z_Specimen" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Specimen->cellAttributes() ?>>
			<span id="el_patient_services_Specimen" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Specimen->EditValue ?>"<?php echo $patient_services_search->Specimen->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label for="x_Abnormal" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Abnormal"><?php echo $patient_services_search->Abnormal->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Abnormal" id="z_Abnormal" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Abnormal->cellAttributes() ?>>
			<span id="el_patient_services_Abnormal" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Abnormal->EditValue ?>"<?php echo $patient_services_search->Abnormal->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label for="x_RefValue" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_RefValue"><?php echo $patient_services_search->RefValue->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RefValue" id="z_RefValue" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->RefValue->cellAttributes() ?>>
			<span id="el_patient_services_RefValue" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" size="35" placeholder="<?php echo HtmlEncode($patient_services_search->RefValue->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->RefValue->EditValue ?>"<?php echo $patient_services_search->RefValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->TestUnit->Visible) { // TestUnit ?>
	<div id="r_TestUnit" class="form-group row">
		<label for="x_TestUnit" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_TestUnit"><?php echo $patient_services_search->TestUnit->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestUnit" id="z_TestUnit" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->TestUnit->cellAttributes() ?>>
			<span id="el_patient_services_TestUnit" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x_TestUnit" id="x_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->TestUnit->EditValue ?>"<?php echo $patient_services_search->TestUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->LOWHIGH->Visible) { // LOWHIGH ?>
	<div id="r_LOWHIGH" class="form-group row">
		<label for="x_LOWHIGH" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_LOWHIGH"><?php echo $patient_services_search->LOWHIGH->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LOWHIGH" id="z_LOWHIGH" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->LOWHIGH->cellAttributes() ?>>
			<span id="el_patient_services_LOWHIGH" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->LOWHIGH->EditValue ?>"<?php echo $patient_services_search->LOWHIGH->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Branch->Visible) { // Branch ?>
	<div id="r_Branch" class="form-group row">
		<label for="x_Branch" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Branch"><?php echo $patient_services_search->Branch->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Branch" id="z_Branch" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Branch->cellAttributes() ?>>
			<span id="el_patient_services_Branch" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Branch->EditValue ?>"<?php echo $patient_services_search->Branch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Dispatch->Visible) { // Dispatch ?>
	<div id="r_Dispatch" class="form-group row">
		<label for="x_Dispatch" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Dispatch"><?php echo $patient_services_search->Dispatch->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Dispatch" id="z_Dispatch" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Dispatch->cellAttributes() ?>>
			<span id="el_patient_services_Dispatch" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Dispatch->EditValue ?>"<?php echo $patient_services_search->Dispatch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Pic1->Visible) { // Pic1 ?>
	<div id="r_Pic1" class="form-group row">
		<label for="x_Pic1" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Pic1"><?php echo $patient_services_search->Pic1->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pic1" id="z_Pic1" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Pic1->cellAttributes() ?>>
			<span id="el_patient_services_Pic1" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Pic1->EditValue ?>"<?php echo $patient_services_search->Pic1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Pic2->Visible) { // Pic2 ?>
	<div id="r_Pic2" class="form-group row">
		<label for="x_Pic2" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Pic2"><?php echo $patient_services_search->Pic2->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pic2" id="z_Pic2" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Pic2->cellAttributes() ?>>
			<span id="el_patient_services_Pic2" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Pic2->EditValue ?>"<?php echo $patient_services_search->Pic2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->GraphPath->Visible) { // GraphPath ?>
	<div id="r_GraphPath" class="form-group row">
		<label for="x_GraphPath" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_GraphPath"><?php echo $patient_services_search->GraphPath->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GraphPath" id="z_GraphPath" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->GraphPath->cellAttributes() ?>>
			<span id="el_patient_services_GraphPath" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->GraphPath->EditValue ?>"<?php echo $patient_services_search->GraphPath->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->MachineCD->Visible) { // MachineCD ?>
	<div id="r_MachineCD" class="form-group row">
		<label for="x_MachineCD" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_MachineCD"><?php echo $patient_services_search->MachineCD->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MachineCD" id="z_MachineCD" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->MachineCD->cellAttributes() ?>>
			<span id="el_patient_services_MachineCD" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->MachineCD->EditValue ?>"<?php echo $patient_services_search->MachineCD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->TestCancel->Visible) { // TestCancel ?>
	<div id="r_TestCancel" class="form-group row">
		<label for="x_TestCancel" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_TestCancel"><?php echo $patient_services_search->TestCancel->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestCancel" id="z_TestCancel" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->TestCancel->cellAttributes() ?>>
			<span id="el_patient_services_TestCancel" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->TestCancel->EditValue ?>"<?php echo $patient_services_search->TestCancel->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->OutSource->Visible) { // OutSource ?>
	<div id="r_OutSource" class="form-group row">
		<label for="x_OutSource" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_OutSource"><?php echo $patient_services_search->OutSource->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OutSource" id="z_OutSource" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->OutSource->cellAttributes() ?>>
			<span id="el_patient_services_OutSource" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->OutSource->EditValue ?>"<?php echo $patient_services_search->OutSource->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Printed->Visible) { // Printed ?>
	<div id="r_Printed" class="form-group row">
		<label for="x_Printed" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Printed"><?php echo $patient_services_search->Printed->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Printed" id="z_Printed" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Printed->cellAttributes() ?>>
			<span id="el_patient_services_Printed" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Printed->EditValue ?>"<?php echo $patient_services_search->Printed->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->PrintBy->Visible) { // PrintBy ?>
	<div id="r_PrintBy" class="form-group row">
		<label for="x_PrintBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_PrintBy"><?php echo $patient_services_search->PrintBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrintBy" id="z_PrintBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->PrintBy->cellAttributes() ?>>
			<span id="el_patient_services_PrintBy" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->PrintBy->EditValue ?>"<?php echo $patient_services_search->PrintBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->PrintDate->Visible) { // PrintDate ?>
	<div id="r_PrintDate" class="form-group row">
		<label for="x_PrintDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_PrintDate"><?php echo $patient_services_search->PrintDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PrintDate" id="z_PrintDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->PrintDate->cellAttributes() ?>>
			<span id="el_patient_services_PrintDate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?php echo HtmlEncode($patient_services_search->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->PrintDate->EditValue ?>"<?php echo $patient_services_search->PrintDate->editAttributes() ?>>
<?php if (!$patient_services_search->PrintDate->ReadOnly && !$patient_services_search->PrintDate->Disabled && !isset($patient_services_search->PrintDate->EditAttrs["readonly"]) && !isset($patient_services_search->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->BillingDate->Visible) { // BillingDate ?>
	<div id="r_BillingDate" class="form-group row">
		<label for="x_BillingDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_BillingDate"><?php echo $patient_services_search->BillingDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BillingDate" id="z_BillingDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->BillingDate->cellAttributes() ?>>
			<span id="el_patient_services_BillingDate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x_BillingDate" id="x_BillingDate" placeholder="<?php echo HtmlEncode($patient_services_search->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->BillingDate->EditValue ?>"<?php echo $patient_services_search->BillingDate->editAttributes() ?>>
<?php if (!$patient_services_search->BillingDate->ReadOnly && !$patient_services_search->BillingDate->Disabled && !isset($patient_services_search->BillingDate->EditAttrs["readonly"]) && !isset($patient_services_search->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->BilledBy->Visible) { // BilledBy ?>
	<div id="r_BilledBy" class="form-group row">
		<label for="x_BilledBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_BilledBy"><?php echo $patient_services_search->BilledBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BilledBy" id="z_BilledBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->BilledBy->cellAttributes() ?>>
			<span id="el_patient_services_BilledBy" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x_BilledBy" id="x_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->BilledBy->EditValue ?>"<?php echo $patient_services_search->BilledBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Resulted->Visible) { // Resulted ?>
	<div id="r_Resulted" class="form-group row">
		<label for="x_Resulted" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Resulted"><?php echo $patient_services_search->Resulted->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Resulted" id="z_Resulted" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Resulted->cellAttributes() ?>>
			<span id="el_patient_services_Resulted" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x_Resulted" id="x_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Resulted->EditValue ?>"<?php echo $patient_services_search->Resulted->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label for="x_ResultDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ResultDate"><?php echo $patient_services_search->ResultDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ResultDate" id="z_ResultDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->ResultDate->cellAttributes() ?>>
			<span id="el_patient_services_ResultDate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($patient_services_search->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->ResultDate->EditValue ?>"<?php echo $patient_services_search->ResultDate->editAttributes() ?>>
<?php if (!$patient_services_search->ResultDate->ReadOnly && !$patient_services_search->ResultDate->Disabled && !isset($patient_services_search->ResultDate->EditAttrs["readonly"]) && !isset($patient_services_search->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->ResultedBy->Visible) { // ResultedBy ?>
	<div id="r_ResultedBy" class="form-group row">
		<label for="x_ResultedBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ResultedBy"><?php echo $patient_services_search->ResultedBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ResultedBy" id="z_ResultedBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->ResultedBy->cellAttributes() ?>>
			<span id="el_patient_services_ResultedBy" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->ResultedBy->EditValue ?>"<?php echo $patient_services_search->ResultedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->SampleDate->Visible) { // SampleDate ?>
	<div id="r_SampleDate" class="form-group row">
		<label for="x_SampleDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SampleDate"><?php echo $patient_services_search->SampleDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SampleDate" id="z_SampleDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->SampleDate->cellAttributes() ?>>
			<span id="el_patient_services_SampleDate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?php echo HtmlEncode($patient_services_search->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->SampleDate->EditValue ?>"<?php echo $patient_services_search->SampleDate->editAttributes() ?>>
<?php if (!$patient_services_search->SampleDate->ReadOnly && !$patient_services_search->SampleDate->Disabled && !isset($patient_services_search->SampleDate->EditAttrs["readonly"]) && !isset($patient_services_search->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->SampleUser->Visible) { // SampleUser ?>
	<div id="r_SampleUser" class="form-group row">
		<label for="x_SampleUser" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SampleUser"><?php echo $patient_services_search->SampleUser->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SampleUser" id="z_SampleUser" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->SampleUser->cellAttributes() ?>>
			<span id="el_patient_services_SampleUser" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->SampleUser->EditValue ?>"<?php echo $patient_services_search->SampleUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Sampled->Visible) { // Sampled ?>
	<div id="r_Sampled" class="form-group row">
		<label for="x_Sampled" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Sampled"><?php echo $patient_services_search->Sampled->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Sampled" id="z_Sampled" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Sampled->cellAttributes() ?>>
			<span id="el_patient_services_Sampled" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x_Sampled" id="x_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Sampled->EditValue ?>"<?php echo $patient_services_search->Sampled->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->ReceivedDate->Visible) { // ReceivedDate ?>
	<div id="r_ReceivedDate" class="form-group row">
		<label for="x_ReceivedDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ReceivedDate"><?php echo $patient_services_search->ReceivedDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ReceivedDate" id="z_ReceivedDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->ReceivedDate->cellAttributes() ?>>
			<span id="el_patient_services_ReceivedDate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services_search->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->ReceivedDate->EditValue ?>"<?php echo $patient_services_search->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services_search->ReceivedDate->ReadOnly && !$patient_services_search->ReceivedDate->Disabled && !isset($patient_services_search->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services_search->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->ReceivedUser->Visible) { // ReceivedUser ?>
	<div id="r_ReceivedUser" class="form-group row">
		<label for="x_ReceivedUser" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ReceivedUser"><?php echo $patient_services_search->ReceivedUser->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReceivedUser" id="z_ReceivedUser" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->ReceivedUser->cellAttributes() ?>>
			<span id="el_patient_services_ReceivedUser" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->ReceivedUser->EditValue ?>"<?php echo $patient_services_search->ReceivedUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Recevied->Visible) { // Recevied ?>
	<div id="r_Recevied" class="form-group row">
		<label for="x_Recevied" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Recevied"><?php echo $patient_services_search->Recevied->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Recevied" id="z_Recevied" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Recevied->cellAttributes() ?>>
			<span id="el_patient_services_Recevied" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x_Recevied" id="x_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Recevied->EditValue ?>"<?php echo $patient_services_search->Recevied->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<div id="r_DeptRecvDate" class="form-group row">
		<label for="x_DeptRecvDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DeptRecvDate"><?php echo $patient_services_search->DeptRecvDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DeptRecvDate" id="z_DeptRecvDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DeptRecvDate->cellAttributes() ?>>
			<span id="el_patient_services_DeptRecvDate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services_search->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DeptRecvDate->EditValue ?>"<?php echo $patient_services_search->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services_search->DeptRecvDate->ReadOnly && !$patient_services_search->DeptRecvDate->Disabled && !isset($patient_services_search->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services_search->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<div id="r_DeptRecvUser" class="form-group row">
		<label for="x_DeptRecvUser" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DeptRecvUser"><?php echo $patient_services_search->DeptRecvUser->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DeptRecvUser" id="z_DeptRecvUser" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DeptRecvUser->cellAttributes() ?>>
			<span id="el_patient_services_DeptRecvUser" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DeptRecvUser->EditValue ?>"<?php echo $patient_services_search->DeptRecvUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->DeptRecived->Visible) { // DeptRecived ?>
	<div id="r_DeptRecived" class="form-group row">
		<label for="x_DeptRecived" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DeptRecived"><?php echo $patient_services_search->DeptRecived->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DeptRecived" id="z_DeptRecived" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->DeptRecived->cellAttributes() ?>>
			<span id="el_patient_services_DeptRecived" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x_DeptRecived" id="x_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->DeptRecived->EditValue ?>"<?php echo $patient_services_search->DeptRecived->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->SAuthDate->Visible) { // SAuthDate ?>
	<div id="r_SAuthDate" class="form-group row">
		<label for="x_SAuthDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SAuthDate"><?php echo $patient_services_search->SAuthDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SAuthDate" id="z_SAuthDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->SAuthDate->cellAttributes() ?>>
			<span id="el_patient_services_SAuthDate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services_search->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->SAuthDate->EditValue ?>"<?php echo $patient_services_search->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services_search->SAuthDate->ReadOnly && !$patient_services_search->SAuthDate->Disabled && !isset($patient_services_search->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services_search->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->SAuthBy->Visible) { // SAuthBy ?>
	<div id="r_SAuthBy" class="form-group row">
		<label for="x_SAuthBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SAuthBy"><?php echo $patient_services_search->SAuthBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SAuthBy" id="z_SAuthBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->SAuthBy->cellAttributes() ?>>
			<span id="el_patient_services_SAuthBy" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->SAuthBy->EditValue ?>"<?php echo $patient_services_search->SAuthBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->SAuthendicate->Visible) { // SAuthendicate ?>
	<div id="r_SAuthendicate" class="form-group row">
		<label for="x_SAuthendicate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SAuthendicate"><?php echo $patient_services_search->SAuthendicate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SAuthendicate" id="z_SAuthendicate" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->SAuthendicate->cellAttributes() ?>>
			<span id="el_patient_services_SAuthendicate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x_SAuthendicate" id="x_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->SAuthendicate->EditValue ?>"<?php echo $patient_services_search->SAuthendicate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->AuthDate->Visible) { // AuthDate ?>
	<div id="r_AuthDate" class="form-group row">
		<label for="x_AuthDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_AuthDate"><?php echo $patient_services_search->AuthDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_AuthDate" id="z_AuthDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->AuthDate->cellAttributes() ?>>
			<span id="el_patient_services_AuthDate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?php echo HtmlEncode($patient_services_search->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->AuthDate->EditValue ?>"<?php echo $patient_services_search->AuthDate->editAttributes() ?>>
<?php if (!$patient_services_search->AuthDate->ReadOnly && !$patient_services_search->AuthDate->Disabled && !isset($patient_services_search->AuthDate->EditAttrs["readonly"]) && !isset($patient_services_search->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->AuthBy->Visible) { // AuthBy ?>
	<div id="r_AuthBy" class="form-group row">
		<label for="x_AuthBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_AuthBy"><?php echo $patient_services_search->AuthBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AuthBy" id="z_AuthBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->AuthBy->cellAttributes() ?>>
			<span id="el_patient_services_AuthBy" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->AuthBy->EditValue ?>"<?php echo $patient_services_search->AuthBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Authencate->Visible) { // Authencate ?>
	<div id="r_Authencate" class="form-group row">
		<label for="x_Authencate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Authencate"><?php echo $patient_services_search->Authencate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Authencate" id="z_Authencate" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Authencate->cellAttributes() ?>>
			<span id="el_patient_services_Authencate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x_Authencate" id="x_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Authencate->EditValue ?>"<?php echo $patient_services_search->Authencate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label for="x_EditDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_EditDate"><?php echo $patient_services_search->EditDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_EditDate" id="z_EditDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->EditDate->cellAttributes() ?>>
			<span id="el_patient_services_EditDate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($patient_services_search->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->EditDate->EditValue ?>"<?php echo $patient_services_search->EditDate->editAttributes() ?>>
<?php if (!$patient_services_search->EditDate->ReadOnly && !$patient_services_search->EditDate->Disabled && !isset($patient_services_search->EditDate->EditAttrs["readonly"]) && !isset($patient_services_search->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->EditBy->Visible) { // EditBy ?>
	<div id="r_EditBy" class="form-group row">
		<label for="x_EditBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_EditBy"><?php echo $patient_services_search->EditBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_EditBy" id="z_EditBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->EditBy->cellAttributes() ?>>
			<span id="el_patient_services_EditBy" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x_EditBy" id="x_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->EditBy->EditValue ?>"<?php echo $patient_services_search->EditBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Editted->Visible) { // Editted ?>
	<div id="r_Editted" class="form-group row">
		<label for="x_Editted" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Editted"><?php echo $patient_services_search->Editted->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Editted" id="z_Editted" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Editted->cellAttributes() ?>>
			<span id="el_patient_services_Editted" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x_Editted" id="x_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Editted->EditValue ?>"<?php echo $patient_services_search->Editted->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label for="x_PatID" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_PatID"><?php echo $patient_services_search->PatID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PatID" id="z_PatID" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->PatID->cellAttributes() ?>>
			<span id="el_patient_services_PatID" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->PatID->EditValue ?>"<?php echo $patient_services_search->PatID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_PatientId"><?php echo $patient_services_search->PatientId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->PatientId->cellAttributes() ?>>
			<span id="el_patient_services_PatientId" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->PatientId->EditValue ?>"<?php echo $patient_services_search->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label for="x_Mobile" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Mobile"><?php echo $patient_services_search->Mobile->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Mobile->cellAttributes() ?>>
			<span id="el_patient_services_Mobile" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Mobile->EditValue ?>"<?php echo $patient_services_search->Mobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label for="x_CId" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_CId"><?php echo $patient_services_search->CId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_CId" id="z_CId" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->CId->cellAttributes() ?>>
			<span id="el_patient_services_CId" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->CId->EditValue ?>"<?php echo $patient_services_search->CId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label for="x_Order" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Order"><?php echo $patient_services_search->Order->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Order" id="z_Order" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Order->cellAttributes() ?>>
			<span id="el_patient_services_Order" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Order->EditValue ?>"<?php echo $patient_services_search->Order->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label for="x_Form" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Form"><?php echo $patient_services_search->Form->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Form" id="z_Form" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Form->cellAttributes() ?>>
			<span id="el_patient_services_Form" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Form" name="x_Form" id="x_Form" size="35" placeholder="<?php echo HtmlEncode($patient_services_search->Form->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Form->EditValue ?>"<?php echo $patient_services_search->Form->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label for="x_ResType" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ResType"><?php echo $patient_services_search->ResType->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ResType" id="z_ResType" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->ResType->cellAttributes() ?>>
			<span id="el_patient_services_ResType" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->ResType->EditValue ?>"<?php echo $patient_services_search->ResType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label for="x_Sample" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Sample"><?php echo $patient_services_search->Sample->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Sample" id="z_Sample" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Sample->cellAttributes() ?>>
			<span id="el_patient_services_Sample" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services_search->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Sample->EditValue ?>"<?php echo $patient_services_search->Sample->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label for="x_NoD" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_NoD"><?php echo $patient_services_search->NoD->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_NoD" id="z_NoD" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->NoD->cellAttributes() ?>>
			<span id="el_patient_services_NoD" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->NoD->EditValue ?>"<?php echo $patient_services_search->NoD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label for="x_BillOrder" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_BillOrder"><?php echo $patient_services_search->BillOrder->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BillOrder" id="z_BillOrder" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->BillOrder->cellAttributes() ?>>
			<span id="el_patient_services_BillOrder" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->BillOrder->EditValue ?>"<?php echo $patient_services_search->BillOrder->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label for="x_Formula" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Formula"><?php echo $patient_services_search->Formula->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Formula" id="z_Formula" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Formula->cellAttributes() ?>>
			<span id="el_patient_services_Formula" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Formula" name="x_Formula" id="x_Formula" size="35" placeholder="<?php echo HtmlEncode($patient_services_search->Formula->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Formula->EditValue ?>"<?php echo $patient_services_search->Formula->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label for="x_Inactive" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Inactive"><?php echo $patient_services_search->Inactive->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Inactive" id="z_Inactive" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Inactive->cellAttributes() ?>>
			<span id="el_patient_services_Inactive" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Inactive->EditValue ?>"<?php echo $patient_services_search->Inactive->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label for="x_CollSample" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_CollSample"><?php echo $patient_services_search->CollSample->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CollSample" id="z_CollSample" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->CollSample->cellAttributes() ?>>
			<span id="el_patient_services_CollSample" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->CollSample->EditValue ?>"<?php echo $patient_services_search->CollSample->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label for="x_TestType" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_TestType"><?php echo $patient_services_search->TestType->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestType" id="z_TestType" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->TestType->cellAttributes() ?>>
			<span id="el_patient_services_TestType" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x_TestType" id="x_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->TestType->EditValue ?>"<?php echo $patient_services_search->TestType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Repeated->Visible) { // Repeated ?>
	<div id="r_Repeated" class="form-group row">
		<label for="x_Repeated" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Repeated"><?php echo $patient_services_search->Repeated->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Repeated" id="z_Repeated" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Repeated->cellAttributes() ?>>
			<span id="el_patient_services_Repeated" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x_Repeated" id="x_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Repeated->EditValue ?>"<?php echo $patient_services_search->Repeated->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->RepeatedBy->Visible) { // RepeatedBy ?>
	<div id="r_RepeatedBy" class="form-group row">
		<label for="x_RepeatedBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_RepeatedBy"><?php echo $patient_services_search->RepeatedBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RepeatedBy" id="z_RepeatedBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->RepeatedBy->cellAttributes() ?>>
			<span id="el_patient_services_RepeatedBy" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x_RepeatedBy" id="x_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->RepeatedBy->EditValue ?>"<?php echo $patient_services_search->RepeatedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->RepeatedDate->Visible) { // RepeatedDate ?>
	<div id="r_RepeatedDate" class="form-group row">
		<label for="x_RepeatedDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_RepeatedDate"><?php echo $patient_services_search->RepeatedDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RepeatedDate" id="z_RepeatedDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->RepeatedDate->cellAttributes() ?>>
			<span id="el_patient_services_RepeatedDate" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x_RepeatedDate" id="x_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services_search->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->RepeatedDate->EditValue ?>"<?php echo $patient_services_search->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services_search->RepeatedDate->ReadOnly && !$patient_services_search->RepeatedDate->Disabled && !isset($patient_services_search->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services_search->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicessearch", "x_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->serviceID->Visible) { // serviceID ?>
	<div id="r_serviceID" class="form-group row">
		<label for="x_serviceID" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_serviceID"><?php echo $patient_services_search->serviceID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_serviceID" id="z_serviceID" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->serviceID->cellAttributes() ?>>
			<span id="el_patient_services_serviceID" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x_serviceID" id="x_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->serviceID->EditValue ?>"<?php echo $patient_services_search->serviceID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Service_Type->Visible) { // Service_Type ?>
	<div id="r_Service_Type" class="form-group row">
		<label for="x_Service_Type" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Service_Type"><?php echo $patient_services_search->Service_Type->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Service_Type" id="z_Service_Type" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Service_Type->cellAttributes() ?>>
			<span id="el_patient_services_Service_Type" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x_Service_Type" id="x_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Service_Type->EditValue ?>"<?php echo $patient_services_search->Service_Type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->Service_Department->Visible) { // Service_Department ?>
	<div id="r_Service_Department" class="form-group row">
		<label for="x_Service_Department" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Service_Department"><?php echo $patient_services_search->Service_Department->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Service_Department" id="z_Service_Department" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->Service_Department->cellAttributes() ?>>
			<span id="el_patient_services_Service_Department" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x_Service_Department" id="x_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_search->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->Service_Department->EditValue ?>"<?php echo $patient_services_search->Service_Department->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services_search->RequestNo->Visible) { // RequestNo ?>
	<div id="r_RequestNo" class="form-group row">
		<label for="x_RequestNo" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_RequestNo"><?php echo $patient_services_search->RequestNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RequestNo" id="z_RequestNo" value="=">
</span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div <?php echo $patient_services_search->RequestNo->cellAttributes() ?>>
			<span id="el_patient_services_RequestNo" class="ew-search-field">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x_RequestNo" id="x_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_search->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_search->RequestNo->EditValue ?>"<?php echo $patient_services_search->RequestNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_services_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_services_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_services_search->showPageFooter();
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
$patient_services_search->terminate();
?>