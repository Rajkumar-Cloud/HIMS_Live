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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($patient_services_search->IsModal) { ?>
var fpatient_servicessearch = currentAdvancedSearchForm = new ew.Form("fpatient_servicessearch", "search");
<?php } else { ?>
var fpatient_servicessearch = currentForm = new ew.Form("fpatient_servicessearch", "search");
<?php } ?>

// Form_CustomValidate event
fpatient_servicessearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_servicessearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_servicessearch.lists["x_Services"] = <?php echo $patient_services_search->Services->Lookup->toClientList() ?>;
fpatient_servicessearch.lists["x_Services"].options = <?php echo JsonEncode($patient_services_search->Services->lookupOptions()) ?>;
fpatient_servicessearch.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_servicessearch.lists["x_status"] = <?php echo $patient_services_search->status->Lookup->toClientList() ?>;
fpatient_servicessearch.lists["x_status"].options = <?php echo JsonEncode($patient_services_search->status->lookupOptions()) ?>;
fpatient_servicessearch.lists["x_ServiceSelect[]"] = <?php echo $patient_services_search->ServiceSelect->Lookup->toClientList() ?>;
fpatient_servicessearch.lists["x_ServiceSelect[]"].options = <?php echo JsonEncode($patient_services_search->ServiceSelect->options(FALSE, TRUE)) ?>;

// Form object for search
// Validate function for search

fpatient_servicessearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Reception");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->Reception->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_amount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->amount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_patient_type");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->patient_type->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_charged_date");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->charged_date->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createdby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->createdby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifiedby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->modifiedby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Unit");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->Unit->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Quantity");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->Quantity->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Discount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->Discount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SubTotal");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->SubTotal->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Aid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->Aid->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Vid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->Vid->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DrID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->DrID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DrSharePres");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->DrSharePres->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospSharePres");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->HospSharePres->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DrShareAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospShareAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->HospShareAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettiledAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DrShareSettledId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettledId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettiledStatus->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_invoiceId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->invoiceId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_invoiceAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->invoiceAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->HospID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RIDNO");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->RIDNO->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TidNo");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->TidNo->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_sid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->sid->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PrintDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->PrintDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BillingDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->BillingDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ResultDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->ResultDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SampleDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->SampleDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ReceivedDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->ReceivedDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DeptRecvDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->DeptRecvDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SAuthDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->SAuthDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_AuthDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->AuthDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_EditDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->EditDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PatID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->PatID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->CId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Order");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->Order->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_NoD");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->NoD->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BillOrder");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->BillOrder->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RepeatedDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->RepeatedDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_serviceID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->serviceID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RequestNo");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_services->RequestNo->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_services_search->showPageHeader(); ?>
<?php
$patient_services_search->showMessage();
?>
<form name="fpatient_servicessearch" id="fpatient_servicessearch" class="<?php echo $patient_services_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_services_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_services_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$patient_services_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($patient_services->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_id"><?php echo $patient_services->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->id->cellAttributes() ?>>
			<span id="el_patient_services_id">
<input type="text" data-table="patient_services" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($patient_services->id->getPlaceHolder()) ?>" value="<?php echo $patient_services->id->EditValue ?>"<?php echo $patient_services->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Reception"><?php echo $patient_services->Reception->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Reception" id="z_Reception" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Reception->cellAttributes() ?>>
			<span id="el_patient_services_Reception">
<input type="text" data-table="patient_services" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_services->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_services->Reception->EditValue ?>"<?php echo $patient_services->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Services->Visible) { // Services ?>
	<div id="r_Services" class="form-group row">
		<label class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Services"><?php echo $patient_services->Services->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Services" id="z_Services" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Services->cellAttributes() ?>>
			<span id="el_patient_services_Services">
<?php
$wrkonchange = "" . trim(@$patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x_Services" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_Services" id="sv_x_Services" value="<?php echo RemoveHtml($patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>"<?php echo $patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services->Services->displayValueSeparatorAttribute() ?>" name="x_Services" id="x_Services" value="<?php echo HtmlEncode($patient_services->Services->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_servicessearch.createAutoSuggest({"id":"x_Services","forceSelect":false});
</script>
<?php echo $patient_services->Services->Lookup->getParamTag("p_x_Services") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label for="x_amount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_amount"><?php echo $patient_services->amount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_amount" id="z_amount" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->amount->cellAttributes() ?>>
			<span id="el_patient_services_amount">
<input type="text" data-table="patient_services" data-field="x_amount" name="x_amount" id="x_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services->amount->EditValue ?>"<?php echo $patient_services->amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label for="x_description" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_description"><?php echo $patient_services->description->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_description" id="z_description" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->description->cellAttributes() ?>>
			<span id="el_patient_services_description">
<input type="text" data-table="patient_services" data-field="x_description" name="x_description" id="x_description" placeholder="<?php echo HtmlEncode($patient_services->description->getPlaceHolder()) ?>" value="<?php echo $patient_services->description->EditValue ?>"<?php echo $patient_services->description->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->patient_type->Visible) { // patient_type ?>
	<div id="r_patient_type" class="form-group row">
		<label for="x_patient_type" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_patient_type"><?php echo $patient_services->patient_type->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_patient_type" id="z_patient_type" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->patient_type->cellAttributes() ?>>
			<span id="el_patient_services_patient_type">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x_patient_type" id="x_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services->patient_type->EditValue ?>"<?php echo $patient_services->patient_type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label for="x_charged_date" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_charged_date"><?php echo $patient_services->charged_date->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_charged_date" id="z_charged_date" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->charged_date->cellAttributes() ?>>
			<span id="el_patient_services_charged_date">
<input type="text" data-table="patient_services" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?php echo HtmlEncode($patient_services->charged_date->getPlaceHolder()) ?>" value="<?php echo $patient_services->charged_date->EditValue ?>"<?php echo $patient_services->charged_date->editAttributes() ?>>
<?php if (!$patient_services->charged_date->ReadOnly && !$patient_services->charged_date->Disabled && !isset($patient_services->charged_date->EditAttrs["readonly"]) && !isset($patient_services->charged_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_status"><?php echo $patient_services->status->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->status->cellAttributes() ?>>
			<span id="el_patient_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_services->status->editAttributes() ?>>
		<?php echo $patient_services->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient_services->status->Lookup->getParamTag("p_x_status") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_createdby"><?php echo $patient_services->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createdby" id="z_createdby" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->createdby->cellAttributes() ?>>
			<span id="el_patient_services_createdby">
<input type="text" data-table="patient_services" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_services->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_services->createdby->EditValue ?>"<?php echo $patient_services->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_createddatetime"><?php echo $patient_services->createddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->createddatetime->cellAttributes() ?>>
			<span id="el_patient_services_createddatetime">
<input type="text" data-table="patient_services" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_services->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_services->createddatetime->EditValue ?>"<?php echo $patient_services->createddatetime->editAttributes() ?>>
<?php if (!$patient_services->createddatetime->ReadOnly && !$patient_services->createddatetime->Disabled && !isset($patient_services->createddatetime->EditAttrs["readonly"]) && !isset($patient_services->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_modifiedby"><?php echo $patient_services->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->modifiedby->cellAttributes() ?>>
			<span id="el_patient_services_modifiedby">
<input type="text" data-table="patient_services" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_services->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_services->modifiedby->EditValue ?>"<?php echo $patient_services->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_modifieddatetime"><?php echo $patient_services->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->modifieddatetime->cellAttributes() ?>>
			<span id="el_patient_services_modifieddatetime">
<input type="text" data-table="patient_services" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_services->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_services->modifieddatetime->EditValue ?>"<?php echo $patient_services->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_services->modifieddatetime->ReadOnly && !$patient_services->modifieddatetime->Disabled && !isset($patient_services->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_services->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_mrnno"><?php echo $patient_services->mrnno->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->mrnno->cellAttributes() ?>>
			<span id="el_patient_services_mrnno">
<input type="text" data-table="patient_services" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_services->mrnno->EditValue ?>"<?php echo $patient_services->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_PatientName"><?php echo $patient_services->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->PatientName->cellAttributes() ?>>
			<span id="el_patient_services_PatientName">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientName->EditValue ?>"<?php echo $patient_services->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Age"><?php echo $patient_services->Age->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Age" id="z_Age" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Age->cellAttributes() ?>>
			<span id="el_patient_services_Age">
<input type="text" data-table="patient_services" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services->Age->EditValue ?>"<?php echo $patient_services->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Gender"><?php echo $patient_services->Gender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Gender" id="z_Gender" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Gender->cellAttributes() ?>>
			<span id="el_patient_services_Gender">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services->Gender->EditValue ?>"<?php echo $patient_services->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_profilePic"><?php echo $patient_services->profilePic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->profilePic->cellAttributes() ?>>
			<span id="el_patient_services_profilePic">
<input type="text" data-table="patient_services" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($patient_services->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_services->profilePic->EditValue ?>"<?php echo $patient_services->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Unit->Visible) { // Unit ?>
	<div id="r_Unit" class="form-group row">
		<label for="x_Unit" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Unit"><?php echo $patient_services->Unit->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Unit" id="z_Unit" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Unit->cellAttributes() ?>>
			<span id="el_patient_services_Unit">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x_Unit" id="x_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services->Unit->EditValue ?>"<?php echo $patient_services->Unit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label for="x_Quantity" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Quantity"><?php echo $patient_services->Quantity->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Quantity" id="z_Quantity" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Quantity->cellAttributes() ?>>
			<span id="el_patient_services_Quantity">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services->Quantity->EditValue ?>"<?php echo $patient_services->Quantity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label for="x_Discount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Discount"><?php echo $patient_services->Discount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Discount" id="z_Discount" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Discount->cellAttributes() ?>>
			<span id="el_patient_services_Discount">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x_Discount" id="x_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services->Discount->EditValue ?>"<?php echo $patient_services->Discount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SubTotal->Visible) { // SubTotal ?>
	<div id="r_SubTotal" class="form-group row">
		<label for="x_SubTotal" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SubTotal"><?php echo $patient_services->SubTotal->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SubTotal" id="z_SubTotal" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->SubTotal->cellAttributes() ?>>
			<span id="el_patient_services_SubTotal">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services->SubTotal->EditValue ?>"<?php echo $patient_services->SubTotal->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ServiceSelect->Visible) { // ServiceSelect ?>
	<div id="r_ServiceSelect" class="form-group row">
		<label class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ServiceSelect"><?php echo $patient_services->ServiceSelect->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ServiceSelect" id="z_ServiceSelect" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->ServiceSelect->cellAttributes() ?>>
			<span id="el_patient_services_ServiceSelect">
<div id="tp_x_ServiceSelect" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x_ServiceSelect[]" id="x_ServiceSelect[]" value="{value}"<?php echo $patient_services->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services->ServiceSelect->checkBoxListHtml(FALSE, "x_ServiceSelect[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Aid->Visible) { // Aid ?>
	<div id="r_Aid" class="form-group row">
		<label for="x_Aid" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Aid"><?php echo $patient_services->Aid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Aid" id="z_Aid" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Aid->cellAttributes() ?>>
			<span id="el_patient_services_Aid">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x_Aid" id="x_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Aid->EditValue ?>"<?php echo $patient_services->Aid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Vid->Visible) { // Vid ?>
	<div id="r_Vid" class="form-group row">
		<label for="x_Vid" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Vid"><?php echo $patient_services->Vid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Vid" id="z_Vid" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Vid->cellAttributes() ?>>
			<span id="el_patient_services_Vid">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x_Vid" id="x_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Vid->EditValue ?>"<?php echo $patient_services->Vid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrID"><?php echo $patient_services->DrID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrID" id="z_DrID" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DrID->cellAttributes() ?>>
			<span id="el_patient_services_DrID">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrID->EditValue ?>"<?php echo $patient_services->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrCODE->Visible) { // DrCODE ?>
	<div id="r_DrCODE" class="form-group row">
		<label for="x_DrCODE" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrCODE"><?php echo $patient_services->DrCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrCODE" id="z_DrCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DrCODE->cellAttributes() ?>>
			<span id="el_patient_services_DrCODE">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x_DrCODE" id="x_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrCODE->EditValue ?>"<?php echo $patient_services->DrCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label for="x_DrName" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrName"><?php echo $patient_services->DrName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrName" id="z_DrName" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DrName->cellAttributes() ?>>
			<span id="el_patient_services_DrName">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrName->EditValue ?>"<?php echo $patient_services->DrName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label for="x_Department" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Department"><?php echo $patient_services->Department->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Department" id="z_Department" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Department->cellAttributes() ?>>
			<span id="el_patient_services_Department">
<input type="text" data-table="patient_services" data-field="x_Department" name="x_Department" id="x_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Department->EditValue ?>"<?php echo $patient_services->Department->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrSharePres->Visible) { // DrSharePres ?>
	<div id="r_DrSharePres" class="form-group row">
		<label for="x_DrSharePres" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrSharePres"><?php echo $patient_services->DrSharePres->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrSharePres" id="z_DrSharePres" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DrSharePres->cellAttributes() ?>>
			<span id="el_patient_services_DrSharePres">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x_DrSharePres" id="x_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrSharePres->EditValue ?>"<?php echo $patient_services->DrSharePres->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->HospSharePres->Visible) { // HospSharePres ?>
	<div id="r_HospSharePres" class="form-group row">
		<label for="x_HospSharePres" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_HospSharePres"><?php echo $patient_services->HospSharePres->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospSharePres" id="z_HospSharePres" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->HospSharePres->cellAttributes() ?>>
			<span id="el_patient_services_HospSharePres">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x_HospSharePres" id="x_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospSharePres->EditValue ?>"<?php echo $patient_services->HospSharePres->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label for="x_DrShareAmount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrShareAmount"><?php echo $patient_services->DrShareAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrShareAmount" id="z_DrShareAmount" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DrShareAmount->cellAttributes() ?>>
			<span id="el_patient_services_DrShareAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareAmount->EditValue ?>"<?php echo $patient_services->DrShareAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label for="x_HospShareAmount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_HospShareAmount"><?php echo $patient_services->HospShareAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospShareAmount" id="z_HospShareAmount" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->HospShareAmount->cellAttributes() ?>>
			<span id="el_patient_services_HospShareAmount">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospShareAmount->EditValue ?>"<?php echo $patient_services->HospShareAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<div id="r_DrShareSettiledAmount" class="form-group row">
		<label for="x_DrShareSettiledAmount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledAmount"><?php echo $patient_services->DrShareSettiledAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrShareSettiledAmount" id="z_DrShareSettiledAmount" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DrShareSettiledAmount->cellAttributes() ?>>
			<span id="el_patient_services_DrShareSettiledAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x_DrShareSettiledAmount" id="x_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<div id="r_DrShareSettledId" class="form-group row">
		<label for="x_DrShareSettledId" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrShareSettledId"><?php echo $patient_services->DrShareSettledId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrShareSettledId" id="z_DrShareSettledId" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DrShareSettledId->cellAttributes() ?>>
			<span id="el_patient_services_DrShareSettledId">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x_DrShareSettledId" id="x_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettledId->EditValue ?>"<?php echo $patient_services->DrShareSettledId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<div id="r_DrShareSettiledStatus" class="form-group row">
		<label for="x_DrShareSettiledStatus" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledStatus"><?php echo $patient_services->DrShareSettiledStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrShareSettiledStatus" id="z_DrShareSettiledStatus" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DrShareSettiledStatus->cellAttributes() ?>>
			<span id="el_patient_services_DrShareSettiledStatus">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x_DrShareSettiledStatus" id="x_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->invoiceId->Visible) { // invoiceId ?>
	<div id="r_invoiceId" class="form-group row">
		<label for="x_invoiceId" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_invoiceId"><?php echo $patient_services->invoiceId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_invoiceId" id="z_invoiceId" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->invoiceId->cellAttributes() ?>>
			<span id="el_patient_services_invoiceId">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceId->EditValue ?>"<?php echo $patient_services->invoiceId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
	<div id="r_invoiceAmount" class="form-group row">
		<label for="x_invoiceAmount" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_invoiceAmount"><?php echo $patient_services->invoiceAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_invoiceAmount" id="z_invoiceAmount" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->invoiceAmount->cellAttributes() ?>>
			<span id="el_patient_services_invoiceAmount">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceAmount->EditValue ?>"<?php echo $patient_services->invoiceAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
	<div id="r_invoiceStatus" class="form-group row">
		<label for="x_invoiceStatus" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_invoiceStatus"><?php echo $patient_services->invoiceStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_invoiceStatus" id="z_invoiceStatus" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->invoiceStatus->cellAttributes() ?>>
			<span id="el_patient_services_invoiceStatus">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceStatus->EditValue ?>"<?php echo $patient_services->invoiceStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
	<div id="r_modeOfPayment" class="form-group row">
		<label for="x_modeOfPayment" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_modeOfPayment"><?php echo $patient_services->modeOfPayment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_modeOfPayment" id="z_modeOfPayment" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->modeOfPayment->cellAttributes() ?>>
			<span id="el_patient_services_modeOfPayment">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services->modeOfPayment->EditValue ?>"<?php echo $patient_services->modeOfPayment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_HospID"><?php echo $patient_services->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->HospID->cellAttributes() ?>>
			<span id="el_patient_services_HospID">
<input type="text" data-table="patient_services" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospID->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospID->EditValue ?>"<?php echo $patient_services->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label for="x_RIDNO" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_RIDNO"><?php echo $patient_services->RIDNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RIDNO" id="z_RIDNO" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->RIDNO->cellAttributes() ?>>
			<span id="el_patient_services_RIDNO">
<input type="text" data-table="patient_services" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($patient_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $patient_services->RIDNO->EditValue ?>"<?php echo $patient_services->RIDNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_TidNo"><?php echo $patient_services->TidNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TidNo" id="z_TidNo" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->TidNo->cellAttributes() ?>>
			<span id="el_patient_services_TidNo">
<input type="text" data-table="patient_services" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($patient_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $patient_services->TidNo->EditValue ?>"<?php echo $patient_services->TidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
	<div id="r_DiscountCategory" class="form-group row">
		<label for="x_DiscountCategory" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DiscountCategory"><?php echo $patient_services->DiscountCategory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DiscountCategory" id="z_DiscountCategory" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DiscountCategory->cellAttributes() ?>>
			<span id="el_patient_services_DiscountCategory">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x_DiscountCategory" id="x_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services->DiscountCategory->EditValue ?>"<?php echo $patient_services->DiscountCategory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label for="x_sid" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_sid"><?php echo $patient_services->sid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_sid" id="z_sid" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->sid->cellAttributes() ?>>
			<span id="el_patient_services_sid">
<input type="text" data-table="patient_services" data-field="x_sid" name="x_sid" id="x_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services->sid->EditValue ?>"<?php echo $patient_services->sid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ItemCode->Visible) { // ItemCode ?>
	<div id="r_ItemCode" class="form-group row">
		<label for="x_ItemCode" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ItemCode"><?php echo $patient_services->ItemCode->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ItemCode" id="z_ItemCode" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->ItemCode->cellAttributes() ?>>
			<span id="el_patient_services_ItemCode">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services->ItemCode->EditValue ?>"<?php echo $patient_services->ItemCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label for="x_TestSubCd" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_TestSubCd"><?php echo $patient_services->TestSubCd->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TestSubCd" id="z_TestSubCd" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->TestSubCd->cellAttributes() ?>>
			<span id="el_patient_services_TestSubCd">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestSubCd->EditValue ?>"<?php echo $patient_services->TestSubCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label for="x_DEptCd" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DEptCd"><?php echo $patient_services->DEptCd->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DEptCd" id="z_DEptCd" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DEptCd->cellAttributes() ?>>
			<span id="el_patient_services_DEptCd">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->DEptCd->EditValue ?>"<?php echo $patient_services->DEptCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ProfCd->Visible) { // ProfCd ?>
	<div id="r_ProfCd" class="form-group row">
		<label for="x_ProfCd" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ProfCd"><?php echo $patient_services->ProfCd->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProfCd" id="z_ProfCd" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->ProfCd->cellAttributes() ?>>
			<span id="el_patient_services_ProfCd">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->ProfCd->EditValue ?>"<?php echo $patient_services->ProfCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->LabReport->Visible) { // LabReport ?>
	<div id="r_LabReport" class="form-group row">
		<label for="x_LabReport" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_LabReport"><?php echo $patient_services->LabReport->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LabReport" id="z_LabReport" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->LabReport->cellAttributes() ?>>
			<span id="el_patient_services_LabReport">
<input type="text" data-table="patient_services" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" size="35" placeholder="<?php echo HtmlEncode($patient_services->LabReport->getPlaceHolder()) ?>" value="<?php echo $patient_services->LabReport->EditValue ?>"<?php echo $patient_services->LabReport->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label for="x_Comments" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Comments"><?php echo $patient_services->Comments->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Comments" id="z_Comments" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Comments->cellAttributes() ?>>
			<span id="el_patient_services_Comments">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services->Comments->EditValue ?>"<?php echo $patient_services->Comments->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label for="x_Method" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Method"><?php echo $patient_services->Method->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Method" id="z_Method" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Method->cellAttributes() ?>>
			<span id="el_patient_services_Method">
<input type="text" data-table="patient_services" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services->Method->EditValue ?>"<?php echo $patient_services->Method->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Specimen->Visible) { // Specimen ?>
	<div id="r_Specimen" class="form-group row">
		<label for="x_Specimen" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Specimen"><?php echo $patient_services->Specimen->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Specimen" id="z_Specimen" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Specimen->cellAttributes() ?>>
			<span id="el_patient_services_Specimen">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services->Specimen->EditValue ?>"<?php echo $patient_services->Specimen->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label for="x_Abnormal" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Abnormal"><?php echo $patient_services->Abnormal->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Abnormal" id="z_Abnormal" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Abnormal->cellAttributes() ?>>
			<span id="el_patient_services_Abnormal">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services->Abnormal->EditValue ?>"<?php echo $patient_services->Abnormal->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label for="x_RefValue" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_RefValue"><?php echo $patient_services->RefValue->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RefValue" id="z_RefValue" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->RefValue->cellAttributes() ?>>
			<span id="el_patient_services_RefValue">
<input type="text" data-table="patient_services" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" size="35" placeholder="<?php echo HtmlEncode($patient_services->RefValue->getPlaceHolder()) ?>" value="<?php echo $patient_services->RefValue->EditValue ?>"<?php echo $patient_services->RefValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->TestUnit->Visible) { // TestUnit ?>
	<div id="r_TestUnit" class="form-group row">
		<label for="x_TestUnit" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_TestUnit"><?php echo $patient_services->TestUnit->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TestUnit" id="z_TestUnit" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->TestUnit->cellAttributes() ?>>
			<span id="el_patient_services_TestUnit">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x_TestUnit" id="x_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestUnit->EditValue ?>"<?php echo $patient_services->TestUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
	<div id="r_LOWHIGH" class="form-group row">
		<label for="x_LOWHIGH" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_LOWHIGH"><?php echo $patient_services->LOWHIGH->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LOWHIGH" id="z_LOWHIGH" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->LOWHIGH->cellAttributes() ?>>
			<span id="el_patient_services_LOWHIGH">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services->LOWHIGH->EditValue ?>"<?php echo $patient_services->LOWHIGH->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Branch->Visible) { // Branch ?>
	<div id="r_Branch" class="form-group row">
		<label for="x_Branch" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Branch"><?php echo $patient_services->Branch->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Branch" id="z_Branch" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Branch->cellAttributes() ?>>
			<span id="el_patient_services_Branch">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Branch->EditValue ?>"<?php echo $patient_services->Branch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Dispatch->Visible) { // Dispatch ?>
	<div id="r_Dispatch" class="form-group row">
		<label for="x_Dispatch" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Dispatch"><?php echo $patient_services->Dispatch->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Dispatch" id="z_Dispatch" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Dispatch->cellAttributes() ?>>
			<span id="el_patient_services_Dispatch">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Dispatch->EditValue ?>"<?php echo $patient_services->Dispatch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Pic1->Visible) { // Pic1 ?>
	<div id="r_Pic1" class="form-group row">
		<label for="x_Pic1" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Pic1"><?php echo $patient_services->Pic1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Pic1" id="z_Pic1" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Pic1->cellAttributes() ?>>
			<span id="el_patient_services_Pic1">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic1->EditValue ?>"<?php echo $patient_services->Pic1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Pic2->Visible) { // Pic2 ?>
	<div id="r_Pic2" class="form-group row">
		<label for="x_Pic2" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Pic2"><?php echo $patient_services->Pic2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Pic2" id="z_Pic2" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Pic2->cellAttributes() ?>>
			<span id="el_patient_services_Pic2">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic2->EditValue ?>"<?php echo $patient_services->Pic2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->GraphPath->Visible) { // GraphPath ?>
	<div id="r_GraphPath" class="form-group row">
		<label for="x_GraphPath" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_GraphPath"><?php echo $patient_services->GraphPath->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GraphPath" id="z_GraphPath" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->GraphPath->cellAttributes() ?>>
			<span id="el_patient_services_GraphPath">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services->GraphPath->EditValue ?>"<?php echo $patient_services->GraphPath->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->MachineCD->Visible) { // MachineCD ?>
	<div id="r_MachineCD" class="form-group row">
		<label for="x_MachineCD" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_MachineCD"><?php echo $patient_services->MachineCD->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MachineCD" id="z_MachineCD" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->MachineCD->cellAttributes() ?>>
			<span id="el_patient_services_MachineCD">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services->MachineCD->EditValue ?>"<?php echo $patient_services->MachineCD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->TestCancel->Visible) { // TestCancel ?>
	<div id="r_TestCancel" class="form-group row">
		<label for="x_TestCancel" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_TestCancel"><?php echo $patient_services->TestCancel->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TestCancel" id="z_TestCancel" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->TestCancel->cellAttributes() ?>>
			<span id="el_patient_services_TestCancel">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestCancel->EditValue ?>"<?php echo $patient_services->TestCancel->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->OutSource->Visible) { // OutSource ?>
	<div id="r_OutSource" class="form-group row">
		<label for="x_OutSource" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_OutSource"><?php echo $patient_services->OutSource->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_OutSource" id="z_OutSource" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->OutSource->cellAttributes() ?>>
			<span id="el_patient_services_OutSource">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services->OutSource->EditValue ?>"<?php echo $patient_services->OutSource->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Printed->Visible) { // Printed ?>
	<div id="r_Printed" class="form-group row">
		<label for="x_Printed" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Printed"><?php echo $patient_services->Printed->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Printed" id="z_Printed" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Printed->cellAttributes() ?>>
			<span id="el_patient_services_Printed">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services->Printed->EditValue ?>"<?php echo $patient_services->Printed->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->PrintBy->Visible) { // PrintBy ?>
	<div id="r_PrintBy" class="form-group row">
		<label for="x_PrintBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_PrintBy"><?php echo $patient_services->PrintBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PrintBy" id="z_PrintBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->PrintBy->cellAttributes() ?>>
			<span id="el_patient_services_PrintBy">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintBy->EditValue ?>"<?php echo $patient_services->PrintBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->PrintDate->Visible) { // PrintDate ?>
	<div id="r_PrintDate" class="form-group row">
		<label for="x_PrintDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_PrintDate"><?php echo $patient_services->PrintDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PrintDate" id="z_PrintDate" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->PrintDate->cellAttributes() ?>>
			<span id="el_patient_services_PrintDate">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?php echo HtmlEncode($patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintDate->EditValue ?>"<?php echo $patient_services->PrintDate->editAttributes() ?>>
<?php if (!$patient_services->PrintDate->ReadOnly && !$patient_services->PrintDate->Disabled && !isset($patient_services->PrintDate->EditAttrs["readonly"]) && !isset($patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->BillingDate->Visible) { // BillingDate ?>
	<div id="r_BillingDate" class="form-group row">
		<label for="x_BillingDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_BillingDate"><?php echo $patient_services->BillingDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BillingDate" id="z_BillingDate" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->BillingDate->cellAttributes() ?>>
			<span id="el_patient_services_BillingDate">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x_BillingDate" id="x_BillingDate" placeholder="<?php echo HtmlEncode($patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillingDate->EditValue ?>"<?php echo $patient_services->BillingDate->editAttributes() ?>>
<?php if (!$patient_services->BillingDate->ReadOnly && !$patient_services->BillingDate->Disabled && !isset($patient_services->BillingDate->EditAttrs["readonly"]) && !isset($patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->BilledBy->Visible) { // BilledBy ?>
	<div id="r_BilledBy" class="form-group row">
		<label for="x_BilledBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_BilledBy"><?php echo $patient_services->BilledBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BilledBy" id="z_BilledBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->BilledBy->cellAttributes() ?>>
			<span id="el_patient_services_BilledBy">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x_BilledBy" id="x_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->BilledBy->EditValue ?>"<?php echo $patient_services->BilledBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Resulted->Visible) { // Resulted ?>
	<div id="r_Resulted" class="form-group row">
		<label for="x_Resulted" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Resulted"><?php echo $patient_services->Resulted->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Resulted" id="z_Resulted" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Resulted->cellAttributes() ?>>
			<span id="el_patient_services_Resulted">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x_Resulted" id="x_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Resulted->EditValue ?>"<?php echo $patient_services->Resulted->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label for="x_ResultDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ResultDate"><?php echo $patient_services->ResultDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ResultDate" id="z_ResultDate" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->ResultDate->cellAttributes() ?>>
			<span id="el_patient_services_ResultDate">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultDate->EditValue ?>"<?php echo $patient_services->ResultDate->editAttributes() ?>>
<?php if (!$patient_services->ResultDate->ReadOnly && !$patient_services->ResultDate->Disabled && !isset($patient_services->ResultDate->EditAttrs["readonly"]) && !isset($patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ResultedBy->Visible) { // ResultedBy ?>
	<div id="r_ResultedBy" class="form-group row">
		<label for="x_ResultedBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ResultedBy"><?php echo $patient_services->ResultedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ResultedBy" id="z_ResultedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->ResultedBy->cellAttributes() ?>>
			<span id="el_patient_services_ResultedBy">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultedBy->EditValue ?>"<?php echo $patient_services->ResultedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SampleDate->Visible) { // SampleDate ?>
	<div id="r_SampleDate" class="form-group row">
		<label for="x_SampleDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SampleDate"><?php echo $patient_services->SampleDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SampleDate" id="z_SampleDate" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->SampleDate->cellAttributes() ?>>
			<span id="el_patient_services_SampleDate">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?php echo HtmlEncode($patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleDate->EditValue ?>"<?php echo $patient_services->SampleDate->editAttributes() ?>>
<?php if (!$patient_services->SampleDate->ReadOnly && !$patient_services->SampleDate->Disabled && !isset($patient_services->SampleDate->EditAttrs["readonly"]) && !isset($patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SampleUser->Visible) { // SampleUser ?>
	<div id="r_SampleUser" class="form-group row">
		<label for="x_SampleUser" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SampleUser"><?php echo $patient_services->SampleUser->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SampleUser" id="z_SampleUser" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->SampleUser->cellAttributes() ?>>
			<span id="el_patient_services_SampleUser">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleUser->EditValue ?>"<?php echo $patient_services->SampleUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Sampled->Visible) { // Sampled ?>
	<div id="r_Sampled" class="form-group row">
		<label for="x_Sampled" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Sampled"><?php echo $patient_services->Sampled->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Sampled" id="z_Sampled" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Sampled->cellAttributes() ?>>
			<span id="el_patient_services_Sampled">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x_Sampled" id="x_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sampled->EditValue ?>"<?php echo $patient_services->Sampled->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
	<div id="r_ReceivedDate" class="form-group row">
		<label for="x_ReceivedDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ReceivedDate"><?php echo $patient_services->ReceivedDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ReceivedDate" id="z_ReceivedDate" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->ReceivedDate->cellAttributes() ?>>
			<span id="el_patient_services_ReceivedDate">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedDate->EditValue ?>"<?php echo $patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services->ReceivedDate->ReadOnly && !$patient_services->ReceivedDate->Disabled && !isset($patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
	<div id="r_ReceivedUser" class="form-group row">
		<label for="x_ReceivedUser" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ReceivedUser"><?php echo $patient_services->ReceivedUser->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReceivedUser" id="z_ReceivedUser" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->ReceivedUser->cellAttributes() ?>>
			<span id="el_patient_services_ReceivedUser">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedUser->EditValue ?>"<?php echo $patient_services->ReceivedUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Recevied->Visible) { // Recevied ?>
	<div id="r_Recevied" class="form-group row">
		<label for="x_Recevied" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Recevied"><?php echo $patient_services->Recevied->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Recevied" id="z_Recevied" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Recevied->cellAttributes() ?>>
			<span id="el_patient_services_Recevied">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x_Recevied" id="x_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services->Recevied->EditValue ?>"<?php echo $patient_services->Recevied->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<div id="r_DeptRecvDate" class="form-group row">
		<label for="x_DeptRecvDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DeptRecvDate"><?php echo $patient_services->DeptRecvDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DeptRecvDate" id="z_DeptRecvDate" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DeptRecvDate->cellAttributes() ?>>
			<span id="el_patient_services_DeptRecvDate">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvDate->EditValue ?>"<?php echo $patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services->DeptRecvDate->ReadOnly && !$patient_services->DeptRecvDate->Disabled && !isset($patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<div id="r_DeptRecvUser" class="form-group row">
		<label for="x_DeptRecvUser" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DeptRecvUser"><?php echo $patient_services->DeptRecvUser->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DeptRecvUser" id="z_DeptRecvUser" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DeptRecvUser->cellAttributes() ?>>
			<span id="el_patient_services_DeptRecvUser">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvUser->EditValue ?>"<?php echo $patient_services->DeptRecvUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DeptRecived->Visible) { // DeptRecived ?>
	<div id="r_DeptRecived" class="form-group row">
		<label for="x_DeptRecived" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_DeptRecived"><?php echo $patient_services->DeptRecived->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DeptRecived" id="z_DeptRecived" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->DeptRecived->cellAttributes() ?>>
			<span id="el_patient_services_DeptRecived">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x_DeptRecived" id="x_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecived->EditValue ?>"<?php echo $patient_services->DeptRecived->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SAuthDate->Visible) { // SAuthDate ?>
	<div id="r_SAuthDate" class="form-group row">
		<label for="x_SAuthDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SAuthDate"><?php echo $patient_services->SAuthDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SAuthDate" id="z_SAuthDate" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->SAuthDate->cellAttributes() ?>>
			<span id="el_patient_services_SAuthDate">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthDate->EditValue ?>"<?php echo $patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services->SAuthDate->ReadOnly && !$patient_services->SAuthDate->Disabled && !isset($patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SAuthBy->Visible) { // SAuthBy ?>
	<div id="r_SAuthBy" class="form-group row">
		<label for="x_SAuthBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SAuthBy"><?php echo $patient_services->SAuthBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SAuthBy" id="z_SAuthBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->SAuthBy->cellAttributes() ?>>
			<span id="el_patient_services_SAuthBy">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthBy->EditValue ?>"<?php echo $patient_services->SAuthBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
	<div id="r_SAuthendicate" class="form-group row">
		<label for="x_SAuthendicate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_SAuthendicate"><?php echo $patient_services->SAuthendicate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SAuthendicate" id="z_SAuthendicate" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->SAuthendicate->cellAttributes() ?>>
			<span id="el_patient_services_SAuthendicate">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x_SAuthendicate" id="x_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthendicate->EditValue ?>"<?php echo $patient_services->SAuthendicate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->AuthDate->Visible) { // AuthDate ?>
	<div id="r_AuthDate" class="form-group row">
		<label for="x_AuthDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_AuthDate"><?php echo $patient_services->AuthDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_AuthDate" id="z_AuthDate" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->AuthDate->cellAttributes() ?>>
			<span id="el_patient_services_AuthDate">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?php echo HtmlEncode($patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthDate->EditValue ?>"<?php echo $patient_services->AuthDate->editAttributes() ?>>
<?php if (!$patient_services->AuthDate->ReadOnly && !$patient_services->AuthDate->Disabled && !isset($patient_services->AuthDate->EditAttrs["readonly"]) && !isset($patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->AuthBy->Visible) { // AuthBy ?>
	<div id="r_AuthBy" class="form-group row">
		<label for="x_AuthBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_AuthBy"><?php echo $patient_services->AuthBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AuthBy" id="z_AuthBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->AuthBy->cellAttributes() ?>>
			<span id="el_patient_services_AuthBy">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthBy->EditValue ?>"<?php echo $patient_services->AuthBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Authencate->Visible) { // Authencate ?>
	<div id="r_Authencate" class="form-group row">
		<label for="x_Authencate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Authencate"><?php echo $patient_services->Authencate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Authencate" id="z_Authencate" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Authencate->cellAttributes() ?>>
			<span id="el_patient_services_Authencate">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x_Authencate" id="x_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services->Authencate->EditValue ?>"<?php echo $patient_services->Authencate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label for="x_EditDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_EditDate"><?php echo $patient_services->EditDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_EditDate" id="z_EditDate" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->EditDate->cellAttributes() ?>>
			<span id="el_patient_services_EditDate">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditDate->EditValue ?>"<?php echo $patient_services->EditDate->editAttributes() ?>>
<?php if (!$patient_services->EditDate->ReadOnly && !$patient_services->EditDate->Disabled && !isset($patient_services->EditDate->EditAttrs["readonly"]) && !isset($patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->EditBy->Visible) { // EditBy ?>
	<div id="r_EditBy" class="form-group row">
		<label for="x_EditBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_EditBy"><?php echo $patient_services->EditBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_EditBy" id="z_EditBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->EditBy->cellAttributes() ?>>
			<span id="el_patient_services_EditBy">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x_EditBy" id="x_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditBy->EditValue ?>"<?php echo $patient_services->EditBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Editted->Visible) { // Editted ?>
	<div id="r_Editted" class="form-group row">
		<label for="x_Editted" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Editted"><?php echo $patient_services->Editted->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Editted" id="z_Editted" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Editted->cellAttributes() ?>>
			<span id="el_patient_services_Editted">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x_Editted" id="x_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Editted->EditValue ?>"<?php echo $patient_services->Editted->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label for="x_PatID" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_PatID"><?php echo $patient_services->PatID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PatID" id="z_PatID" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->PatID->cellAttributes() ?>>
			<span id="el_patient_services_PatID">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatID->EditValue ?>"<?php echo $patient_services->PatID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_PatientId"><?php echo $patient_services->PatientId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->PatientId->cellAttributes() ?>>
			<span id="el_patient_services_PatientId">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientId->EditValue ?>"<?php echo $patient_services->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label for="x_Mobile" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Mobile"><?php echo $patient_services->Mobile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Mobile->cellAttributes() ?>>
			<span id="el_patient_services_Mobile">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services->Mobile->EditValue ?>"<?php echo $patient_services->Mobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label for="x_CId" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_CId"><?php echo $patient_services->CId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CId" id="z_CId" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->CId->cellAttributes() ?>>
			<span id="el_patient_services_CId">
<input type="text" data-table="patient_services" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services->CId->EditValue ?>"<?php echo $patient_services->CId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label for="x_Order" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Order"><?php echo $patient_services->Order->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Order" id="z_Order" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Order->cellAttributes() ?>>
			<span id="el_patient_services_Order">
<input type="text" data-table="patient_services" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services->Order->EditValue ?>"<?php echo $patient_services->Order->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label for="x_Form" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Form"><?php echo $patient_services->Form->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Form" id="z_Form" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Form->cellAttributes() ?>>
			<span id="el_patient_services_Form">
<input type="text" data-table="patient_services" data-field="x_Form" name="x_Form" id="x_Form" size="35" placeholder="<?php echo HtmlEncode($patient_services->Form->getPlaceHolder()) ?>" value="<?php echo $patient_services->Form->EditValue ?>"<?php echo $patient_services->Form->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label for="x_ResType" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_ResType"><?php echo $patient_services->ResType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ResType" id="z_ResType" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->ResType->cellAttributes() ?>>
			<span id="el_patient_services_ResType">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResType->EditValue ?>"<?php echo $patient_services->ResType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label for="x_Sample" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Sample"><?php echo $patient_services->Sample->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Sample" id="z_Sample" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Sample->cellAttributes() ?>>
			<span id="el_patient_services_Sample">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sample->EditValue ?>"<?php echo $patient_services->Sample->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label for="x_NoD" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_NoD"><?php echo $patient_services->NoD->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_NoD" id="z_NoD" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->NoD->cellAttributes() ?>>
			<span id="el_patient_services_NoD">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services->NoD->EditValue ?>"<?php echo $patient_services->NoD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label for="x_BillOrder" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_BillOrder"><?php echo $patient_services->BillOrder->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BillOrder" id="z_BillOrder" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->BillOrder->cellAttributes() ?>>
			<span id="el_patient_services_BillOrder">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillOrder->EditValue ?>"<?php echo $patient_services->BillOrder->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label for="x_Formula" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Formula"><?php echo $patient_services->Formula->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Formula" id="z_Formula" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Formula->cellAttributes() ?>>
			<span id="el_patient_services_Formula">
<input type="text" data-table="patient_services" data-field="x_Formula" name="x_Formula" id="x_Formula" size="35" placeholder="<?php echo HtmlEncode($patient_services->Formula->getPlaceHolder()) ?>" value="<?php echo $patient_services->Formula->EditValue ?>"<?php echo $patient_services->Formula->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label for="x_Inactive" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Inactive"><?php echo $patient_services->Inactive->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Inactive" id="z_Inactive" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Inactive->cellAttributes() ?>>
			<span id="el_patient_services_Inactive">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services->Inactive->EditValue ?>"<?php echo $patient_services->Inactive->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label for="x_CollSample" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_CollSample"><?php echo $patient_services->CollSample->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CollSample" id="z_CollSample" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->CollSample->cellAttributes() ?>>
			<span id="el_patient_services_CollSample">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services->CollSample->EditValue ?>"<?php echo $patient_services->CollSample->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label for="x_TestType" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_TestType"><?php echo $patient_services->TestType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TestType" id="z_TestType" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->TestType->cellAttributes() ?>>
			<span id="el_patient_services_TestType">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x_TestType" id="x_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestType->EditValue ?>"<?php echo $patient_services->TestType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Repeated->Visible) { // Repeated ?>
	<div id="r_Repeated" class="form-group row">
		<label for="x_Repeated" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Repeated"><?php echo $patient_services->Repeated->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Repeated" id="z_Repeated" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Repeated->cellAttributes() ?>>
			<span id="el_patient_services_Repeated">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x_Repeated" id="x_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services->Repeated->EditValue ?>"<?php echo $patient_services->Repeated->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
	<div id="r_RepeatedBy" class="form-group row">
		<label for="x_RepeatedBy" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_RepeatedBy"><?php echo $patient_services->RepeatedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RepeatedBy" id="z_RepeatedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->RepeatedBy->cellAttributes() ?>>
			<span id="el_patient_services_RepeatedBy">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x_RepeatedBy" id="x_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedBy->EditValue ?>"<?php echo $patient_services->RepeatedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
	<div id="r_RepeatedDate" class="form-group row">
		<label for="x_RepeatedDate" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_RepeatedDate"><?php echo $patient_services->RepeatedDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RepeatedDate" id="z_RepeatedDate" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->RepeatedDate->cellAttributes() ?>>
			<span id="el_patient_services_RepeatedDate">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x_RepeatedDate" id="x_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedDate->EditValue ?>"<?php echo $patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services->RepeatedDate->ReadOnly && !$patient_services->RepeatedDate->Disabled && !isset($patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicessearch", "x_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->serviceID->Visible) { // serviceID ?>
	<div id="r_serviceID" class="form-group row">
		<label for="x_serviceID" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_serviceID"><?php echo $patient_services->serviceID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_serviceID" id="z_serviceID" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->serviceID->cellAttributes() ?>>
			<span id="el_patient_services_serviceID">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x_serviceID" id="x_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services->serviceID->EditValue ?>"<?php echo $patient_services->serviceID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Service_Type->Visible) { // Service_Type ?>
	<div id="r_Service_Type" class="form-group row">
		<label for="x_Service_Type" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Service_Type"><?php echo $patient_services->Service_Type->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Service_Type" id="z_Service_Type" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Service_Type->cellAttributes() ?>>
			<span id="el_patient_services_Service_Type">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x_Service_Type" id="x_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Type->EditValue ?>"<?php echo $patient_services->Service_Type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Service_Department->Visible) { // Service_Department ?>
	<div id="r_Service_Department" class="form-group row">
		<label for="x_Service_Department" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_Service_Department"><?php echo $patient_services->Service_Department->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Service_Department" id="z_Service_Department" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->Service_Department->cellAttributes() ?>>
			<span id="el_patient_services_Service_Department">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x_Service_Department" id="x_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Department->EditValue ?>"<?php echo $patient_services->Service_Department->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_services->RequestNo->Visible) { // RequestNo ?>
	<div id="r_RequestNo" class="form-group row">
		<label for="x_RequestNo" class="<?php echo $patient_services_search->LeftColumnClass ?>"><span id="elh_patient_services_RequestNo"><?php echo $patient_services->RequestNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RequestNo" id="z_RequestNo" value="="></span>
		</label>
		<div class="<?php echo $patient_services_search->RightColumnClass ?>"><div<?php echo $patient_services->RequestNo->cellAttributes() ?>>
			<span id="el_patient_services_RequestNo">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x_RequestNo" id="x_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services->RequestNo->EditValue ?>"<?php echo $patient_services->RequestNo->editAttributes() ?>>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_services_search->terminate();
?>