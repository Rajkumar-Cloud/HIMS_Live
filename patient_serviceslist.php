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
$patient_services_list = new patient_services_list();

// Run the page
$patient_services_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_services_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_serviceslist = currentForm = new ew.Form("fpatient_serviceslist", "list");
fpatient_serviceslist.formKeyCountName = '<?php echo $patient_services_list->FormKeyCountName ?>';

// Validate form
fpatient_serviceslist.validate = function() {
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
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($patient_services_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->id->caption(), $patient_services->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Reception->caption(), $patient_services->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Services->caption(), $patient_services->Services->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->amount->caption(), $patient_services->amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->amount->errorMessage()) ?>");
		<?php if ($patient_services_list->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->description->caption(), $patient_services->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->patient_type->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->patient_type->caption(), $patient_services->patient_type->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_type");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->patient_type->errorMessage()) ?>");
		<?php if ($patient_services_list->charged_date->Required) { ?>
			elm = this.getElements("x" + infix + "_charged_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->charged_date->caption(), $patient_services->charged_date->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->status->caption(), $patient_services->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->mrnno->caption(), $patient_services->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PatientName->caption(), $patient_services->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Age->caption(), $patient_services->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Gender->caption(), $patient_services->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Unit->caption(), $patient_services->Unit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Unit->errorMessage()) ?>");
		<?php if ($patient_services_list->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Quantity->caption(), $patient_services->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Quantity->errorMessage()) ?>");
		<?php if ($patient_services_list->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Discount->caption(), $patient_services->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Discount->errorMessage()) ?>");
		<?php if ($patient_services_list->SubTotal->Required) { ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SubTotal->caption(), $patient_services->SubTotal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->SubTotal->errorMessage()) ?>");
		<?php if ($patient_services_list->ServiceSelect->Required) { ?>
			elm = this.getElements("x" + infix + "_ServiceSelect[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ServiceSelect->caption(), $patient_services->ServiceSelect->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Aid->Required) { ?>
			elm = this.getElements("x" + infix + "_Aid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Aid->caption(), $patient_services->Aid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Aid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Aid->errorMessage()) ?>");
		<?php if ($patient_services_list->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Vid->caption(), $patient_services->Vid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Vid->errorMessage()) ?>");
		<?php if ($patient_services_list->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrID->caption(), $patient_services->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrID->errorMessage()) ?>");
		<?php if ($patient_services_list->DrCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_DrCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrCODE->caption(), $patient_services->DrCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrName->caption(), $patient_services->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Department->caption(), $patient_services->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->DrSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrSharePres->caption(), $patient_services->DrSharePres->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrSharePres->errorMessage()) ?>");
		<?php if ($patient_services_list->HospSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->HospSharePres->caption(), $patient_services->HospSharePres->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->HospSharePres->errorMessage()) ?>");
		<?php if ($patient_services_list->DrShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareAmount->caption(), $patient_services->DrShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareAmount->errorMessage()) ?>");
		<?php if ($patient_services_list->HospShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->HospShareAmount->caption(), $patient_services->HospShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->HospShareAmount->errorMessage()) ?>");
		<?php if ($patient_services_list->DrShareSettiledAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareSettiledAmount->caption(), $patient_services->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettiledAmount->errorMessage()) ?>");
		<?php if ($patient_services_list->DrShareSettledId->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareSettledId->caption(), $patient_services->DrShareSettledId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettledId->errorMessage()) ?>");
		<?php if ($patient_services_list->DrShareSettiledStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareSettiledStatus->caption(), $patient_services->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettiledStatus->errorMessage()) ?>");
		<?php if ($patient_services_list->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->invoiceId->caption(), $patient_services->invoiceId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->invoiceId->errorMessage()) ?>");
		<?php if ($patient_services_list->invoiceAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->invoiceAmount->caption(), $patient_services->invoiceAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->invoiceAmount->errorMessage()) ?>");
		<?php if ($patient_services_list->invoiceStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->invoiceStatus->caption(), $patient_services->invoiceStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->modeOfPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_modeOfPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->modeOfPayment->caption(), $patient_services->modeOfPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->HospID->caption(), $patient_services->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RIDNO->caption(), $patient_services->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TidNo->caption(), $patient_services->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->DiscountCategory->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountCategory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DiscountCategory->caption(), $patient_services->DiscountCategory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->sid->caption(), $patient_services->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->sid->errorMessage()) ?>");
		<?php if ($patient_services_list->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ItemCode->caption(), $patient_services->ItemCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestSubCd->caption(), $patient_services->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DEptCd->caption(), $patient_services->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->ProfCd->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ProfCd->caption(), $patient_services->ProfCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Comments->Required) { ?>
			elm = this.getElements("x" + infix + "_Comments");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Comments->caption(), $patient_services->Comments->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Method->caption(), $patient_services->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Specimen->Required) { ?>
			elm = this.getElements("x" + infix + "_Specimen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Specimen->caption(), $patient_services->Specimen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Abnormal->Required) { ?>
			elm = this.getElements("x" + infix + "_Abnormal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Abnormal->caption(), $patient_services->Abnormal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->TestUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_TestUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestUnit->caption(), $patient_services->TestUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->LOWHIGH->Required) { ?>
			elm = this.getElements("x" + infix + "_LOWHIGH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->LOWHIGH->caption(), $patient_services->LOWHIGH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Branch->Required) { ?>
			elm = this.getElements("x" + infix + "_Branch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Branch->caption(), $patient_services->Branch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Dispatch->Required) { ?>
			elm = this.getElements("x" + infix + "_Dispatch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Dispatch->caption(), $patient_services->Dispatch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Pic1->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Pic1->caption(), $patient_services->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Pic2->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Pic2->caption(), $patient_services->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->GraphPath->Required) { ?>
			elm = this.getElements("x" + infix + "_GraphPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->GraphPath->caption(), $patient_services->GraphPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->MachineCD->Required) { ?>
			elm = this.getElements("x" + infix + "_MachineCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->MachineCD->caption(), $patient_services->MachineCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->TestCancel->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCancel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestCancel->caption(), $patient_services->TestCancel->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->OutSource->Required) { ?>
			elm = this.getElements("x" + infix + "_OutSource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->OutSource->caption(), $patient_services->OutSource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Printed->Required) { ?>
			elm = this.getElements("x" + infix + "_Printed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Printed->caption(), $patient_services->Printed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->PrintBy->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PrintBy->caption(), $patient_services->PrintBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->PrintDate->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PrintDate->caption(), $patient_services->PrintDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->PrintDate->errorMessage()) ?>");
		<?php if ($patient_services_list->BillingDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->BillingDate->caption(), $patient_services->BillingDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->BillingDate->errorMessage()) ?>");
		<?php if ($patient_services_list->BilledBy->Required) { ?>
			elm = this.getElements("x" + infix + "_BilledBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->BilledBy->caption(), $patient_services->BilledBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Resulted->Required) { ?>
			elm = this.getElements("x" + infix + "_Resulted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Resulted->caption(), $patient_services->Resulted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ResultDate->caption(), $patient_services->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->ResultDate->errorMessage()) ?>");
		<?php if ($patient_services_list->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ResultedBy->caption(), $patient_services->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->SampleDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SampleDate->caption(), $patient_services->SampleDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->SampleDate->errorMessage()) ?>");
		<?php if ($patient_services_list->SampleUser->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SampleUser->caption(), $patient_services->SampleUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Sampled->Required) { ?>
			elm = this.getElements("x" + infix + "_Sampled");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Sampled->caption(), $patient_services->Sampled->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->ReceivedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ReceivedDate->caption(), $patient_services->ReceivedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->ReceivedDate->errorMessage()) ?>");
		<?php if ($patient_services_list->ReceivedUser->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ReceivedUser->caption(), $patient_services->ReceivedUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Recevied->Required) { ?>
			elm = this.getElements("x" + infix + "_Recevied");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Recevied->caption(), $patient_services->Recevied->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->DeptRecvDate->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DeptRecvDate->caption(), $patient_services->DeptRecvDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DeptRecvDate->errorMessage()) ?>");
		<?php if ($patient_services_list->DeptRecvUser->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DeptRecvUser->caption(), $patient_services->DeptRecvUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->DeptRecived->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecived");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DeptRecived->caption(), $patient_services->DeptRecived->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->SAuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SAuthDate->caption(), $patient_services->SAuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->SAuthDate->errorMessage()) ?>");
		<?php if ($patient_services_list->SAuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SAuthBy->caption(), $patient_services->SAuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->SAuthendicate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthendicate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SAuthendicate->caption(), $patient_services->SAuthendicate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->AuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->AuthDate->caption(), $patient_services->AuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->AuthDate->errorMessage()) ?>");
		<?php if ($patient_services_list->AuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->AuthBy->caption(), $patient_services->AuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Authencate->Required) { ?>
			elm = this.getElements("x" + infix + "_Authencate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Authencate->caption(), $patient_services->Authencate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->EditDate->Required) { ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->EditDate->caption(), $patient_services->EditDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->EditDate->errorMessage()) ?>");
		<?php if ($patient_services_list->EditBy->Required) { ?>
			elm = this.getElements("x" + infix + "_EditBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->EditBy->caption(), $patient_services->EditBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Editted->Required) { ?>
			elm = this.getElements("x" + infix + "_Editted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Editted->caption(), $patient_services->Editted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PatID->caption(), $patient_services->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->PatID->errorMessage()) ?>");
		<?php if ($patient_services_list->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PatientId->caption(), $patient_services->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Mobile->caption(), $patient_services->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->CId->caption(), $patient_services->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->CId->errorMessage()) ?>");
		<?php if ($patient_services_list->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Order->caption(), $patient_services->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Order->errorMessage()) ?>");
		<?php if ($patient_services_list->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ResType->caption(), $patient_services->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Sample->caption(), $patient_services->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->NoD->caption(), $patient_services->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->NoD->errorMessage()) ?>");
		<?php if ($patient_services_list->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->BillOrder->caption(), $patient_services->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->BillOrder->errorMessage()) ?>");
		<?php if ($patient_services_list->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Inactive->caption(), $patient_services->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->CollSample->caption(), $patient_services->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestType->caption(), $patient_services->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Repeated->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Repeated->caption(), $patient_services->Repeated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->RepeatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RepeatedBy->caption(), $patient_services->RepeatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->RepeatedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RepeatedDate->caption(), $patient_services->RepeatedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->RepeatedDate->errorMessage()) ?>");
		<?php if ($patient_services_list->serviceID->Required) { ?>
			elm = this.getElements("x" + infix + "_serviceID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->serviceID->caption(), $patient_services->serviceID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_serviceID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->serviceID->errorMessage()) ?>");
		<?php if ($patient_services_list->Service_Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Service_Type->caption(), $patient_services->Service_Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->Service_Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Service_Department->caption(), $patient_services->Service_Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_list->RequestNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RequestNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RequestNo->caption(), $patient_services->RequestNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RequestNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->RequestNo->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	if (gridinsert && addcnt == 0) { // No row added
		ew.alert(ew.language.phrase("NoAddRecord"));
		return false;
	}
	return true;
}

// Check empty row
fpatient_serviceslist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	if (ew.valueChanged(fobj, infix, "Services", false)) return false;
	if (ew.valueChanged(fobj, infix, "amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "description", false)) return false;
	if (ew.valueChanged(fobj, infix, "patient_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "Unit", false)) return false;
	if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "Discount", false)) return false;
	if (ew.valueChanged(fobj, infix, "SubTotal", false)) return false;
	if (ew.valueChanged(fobj, infix, "ServiceSelect[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "Aid", false)) return false;
	if (ew.valueChanged(fobj, infix, "Vid", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrID", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrCODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Department", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrSharePres", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospSharePres", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrShareAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospShareAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrShareSettiledAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrShareSettledId", false)) return false;
	if (ew.valueChanged(fobj, infix, "DrShareSettiledStatus", false)) return false;
	if (ew.valueChanged(fobj, infix, "invoiceId", false)) return false;
	if (ew.valueChanged(fobj, infix, "invoiceAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "invoiceStatus", false)) return false;
	if (ew.valueChanged(fobj, infix, "modeOfPayment", false)) return false;
	if (ew.valueChanged(fobj, infix, "RIDNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "DiscountCategory", false)) return false;
	if (ew.valueChanged(fobj, infix, "sid", false)) return false;
	if (ew.valueChanged(fobj, infix, "ItemCode", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestSubCd", false)) return false;
	if (ew.valueChanged(fobj, infix, "DEptCd", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProfCd", false)) return false;
	if (ew.valueChanged(fobj, infix, "Comments", false)) return false;
	if (ew.valueChanged(fobj, infix, "Method", false)) return false;
	if (ew.valueChanged(fobj, infix, "Specimen", false)) return false;
	if (ew.valueChanged(fobj, infix, "Abnormal", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestUnit", false)) return false;
	if (ew.valueChanged(fobj, infix, "LOWHIGH", false)) return false;
	if (ew.valueChanged(fobj, infix, "Branch", false)) return false;
	if (ew.valueChanged(fobj, infix, "Dispatch", false)) return false;
	if (ew.valueChanged(fobj, infix, "Pic1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Pic2", false)) return false;
	if (ew.valueChanged(fobj, infix, "GraphPath", false)) return false;
	if (ew.valueChanged(fobj, infix, "MachineCD", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestCancel", false)) return false;
	if (ew.valueChanged(fobj, infix, "OutSource", false)) return false;
	if (ew.valueChanged(fobj, infix, "Printed", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrintBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrintDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillingDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "BilledBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Resulted", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "SampleDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "SampleUser", false)) return false;
	if (ew.valueChanged(fobj, infix, "Sampled", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReceivedDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReceivedUser", false)) return false;
	if (ew.valueChanged(fobj, infix, "Recevied", false)) return false;
	if (ew.valueChanged(fobj, infix, "DeptRecvDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "DeptRecvUser", false)) return false;
	if (ew.valueChanged(fobj, infix, "DeptRecived", false)) return false;
	if (ew.valueChanged(fobj, infix, "SAuthDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "SAuthBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "SAuthendicate", false)) return false;
	if (ew.valueChanged(fobj, infix, "AuthDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "AuthBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Authencate", false)) return false;
	if (ew.valueChanged(fobj, infix, "EditDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "EditBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Editted", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatID", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "Mobile", false)) return false;
	if (ew.valueChanged(fobj, infix, "CId", false)) return false;
	if (ew.valueChanged(fobj, infix, "Order", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResType", false)) return false;
	if (ew.valueChanged(fobj, infix, "Sample", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoD", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillOrder", false)) return false;
	if (ew.valueChanged(fobj, infix, "Inactive", false)) return false;
	if (ew.valueChanged(fobj, infix, "CollSample", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestType", false)) return false;
	if (ew.valueChanged(fobj, infix, "Repeated", false)) return false;
	if (ew.valueChanged(fobj, infix, "RepeatedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "RepeatedDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "serviceID", false)) return false;
	if (ew.valueChanged(fobj, infix, "Service_Type", false)) return false;
	if (ew.valueChanged(fobj, infix, "Service_Department", false)) return false;
	if (ew.valueChanged(fobj, infix, "RequestNo", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_serviceslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_serviceslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_serviceslist.lists["x_Services"] = <?php echo $patient_services_list->Services->Lookup->toClientList() ?>;
fpatient_serviceslist.lists["x_Services"].options = <?php echo JsonEncode($patient_services_list->Services->lookupOptions()) ?>;
fpatient_serviceslist.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_serviceslist.lists["x_status"] = <?php echo $patient_services_list->status->Lookup->toClientList() ?>;
fpatient_serviceslist.lists["x_status"].options = <?php echo JsonEncode($patient_services_list->status->lookupOptions()) ?>;
fpatient_serviceslist.lists["x_ServiceSelect[]"] = <?php echo $patient_services_list->ServiceSelect->Lookup->toClientList() ?>;
fpatient_serviceslist.lists["x_ServiceSelect[]"].options = <?php echo JsonEncode($patient_services_list->ServiceSelect->options(FALSE, TRUE)) ?>;

// Form object for search
var fpatient_serviceslistsrch = currentSearchForm = new ew.Form("fpatient_serviceslistsrch");

// Filters
fpatient_serviceslistsrch.filterList = <?php echo $patient_services_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_services->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_services_list->TotalRecs > 0 && $patient_services_list->ExportOptions->visible()) { ?>
<?php $patient_services_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_services_list->ImportOptions->visible()) { ?>
<?php $patient_services_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_services_list->SearchOptions->visible()) { ?>
<?php $patient_services_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_services_list->FilterOptions->visible()) { ?>
<?php $patient_services_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_services->isExport() || EXPORT_MASTER_RECORD && $patient_services->isExport("print")) { ?>
<?php
if ($patient_services_list->DbMasterFilter <> "" && $patient_services->getCurrentMasterTable() == "billing_voucher") {
	if ($patient_services_list->MasterRecordExists) {
		include_once "billing_vouchermaster.php";
	}
}
?>
<?php
if ($patient_services_list->DbMasterFilter <> "" && $patient_services->getCurrentMasterTable() == "ip_admission") {
	if ($patient_services_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_services_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_services->isExport() && !$patient_services->CurrentAction) { ?>
<form name="fpatient_serviceslistsrch" id="fpatient_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_services_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_serviceslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_services">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_services_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_services_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_services_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_services_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_services_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_services_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_services_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_services_list->showPageHeader(); ?>
<?php
$patient_services_list->showMessage();
?>
<?php if ($patient_services_list->TotalRecs > 0 || $patient_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_services_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_services">
<?php if (!$patient_services->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_services_list->Pager)) $patient_services_list->Pager = new NumericPager($patient_services_list->StartRec, $patient_services_list->DisplayRecs, $patient_services_list->TotalRecs, $patient_services_list->RecRange, $patient_services_list->AutoHidePager) ?>
<?php if ($patient_services_list->Pager->RecordCount > 0 && $patient_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_services_list->pageUrl() ?>start=<?php echo $patient_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_services_list->pageUrl() ?>start=<?php echo $patient_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_services_list->pageUrl() ?>start=<?php echo $patient_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_services_list->pageUrl() ?>start=<?php echo $patient_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_services_list->TotalRecs > 0 && (!$patient_services_list->AutoHidePageSizeSelector || $patient_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_serviceslist" id="fpatient_serviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_services_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_services_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<?php if ($patient_services->getCurrentMasterTable() == "billing_voucher" && $patient_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="billing_voucher">
<input type="hidden" name="fk_id" value="<?php echo $patient_services->Vid->getSessionValue() ?>">
<?php } ?>
<?php if ($patient_services->getCurrentMasterTable() == "ip_admission" && $patient_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_services->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_services->mrnno->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_services->PatID->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_services" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_services_list->TotalRecs > 0 || $patient_services->isGridEdit()) { ?>
<table id="tbl_patient_serviceslist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_services_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_services_list->renderListOptions();

// Render list options (header, left)
$patient_services_list->ListOptions->render("header", "left", "", "block", $patient_services->TableVar, "patient_serviceslist");
?>
<?php if ($patient_services->id->Visible) { // id ?>
	<?php if ($patient_services->sortUrl($patient_services->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_services->id->headerCellClass() ?>"><div id="elh_patient_services_id" class="patient_services_id"><div class="ew-table-header-caption"><script id="tpc_patient_services_id" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_services->id->headerCellClass() ?>"><script id="tpc_patient_services_id" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->id) ?>',1);"><div id="elh_patient_services_id" class="patient_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Reception->Visible) { // Reception ?>
	<?php if ($patient_services->sortUrl($patient_services->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_services->Reception->headerCellClass() ?>"><div id="elh_patient_services_Reception" class="patient_services_Reception"><div class="ew-table-header-caption"><script id="tpc_patient_services_Reception" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Reception->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_services->Reception->headerCellClass() ?>"><script id="tpc_patient_services_Reception" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Reception) ?>',1);"><div id="elh_patient_services_Reception" class="patient_services_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Services->Visible) { // Services ?>
	<?php if ($patient_services->sortUrl($patient_services->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $patient_services->Services->headerCellClass() ?>"><div id="elh_patient_services_Services" class="patient_services_Services"><div class="ew-table-header-caption"><script id="tpc_patient_services_Services" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Services->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $patient_services->Services->headerCellClass() ?>"><script id="tpc_patient_services_Services" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Services) ?>',1);"><div id="elh_patient_services_Services" class="patient_services_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Services->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->amount->Visible) { // amount ?>
	<?php if ($patient_services->sortUrl($patient_services->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $patient_services->amount->headerCellClass() ?>"><div id="elh_patient_services_amount" class="patient_services_amount"><div class="ew-table-header-caption"><script id="tpc_patient_services_amount" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->amount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $patient_services->amount->headerCellClass() ?>"><script id="tpc_patient_services_amount" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->amount) ?>',1);"><div id="elh_patient_services_amount" class="patient_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->description->Visible) { // description ?>
	<?php if ($patient_services->sortUrl($patient_services->description) == "") { ?>
		<th data-name="description" class="<?php echo $patient_services->description->headerCellClass() ?>"><div id="elh_patient_services_description" class="patient_services_description"><div class="ew-table-header-caption"><script id="tpc_patient_services_description" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->description->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $patient_services->description->headerCellClass() ?>"><script id="tpc_patient_services_description" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->description) ?>',1);"><div id="elh_patient_services_description" class="patient_services_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->patient_type->Visible) { // patient_type ?>
	<?php if ($patient_services->sortUrl($patient_services->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $patient_services->patient_type->headerCellClass() ?>"><div id="elh_patient_services_patient_type" class="patient_services_patient_type"><div class="ew-table-header-caption"><script id="tpc_patient_services_patient_type" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->patient_type->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $patient_services->patient_type->headerCellClass() ?>"><script id="tpc_patient_services_patient_type" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->patient_type) ?>',1);"><div id="elh_patient_services_patient_type" class="patient_services_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->patient_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->patient_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->charged_date->Visible) { // charged_date ?>
	<?php if ($patient_services->sortUrl($patient_services->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $patient_services->charged_date->headerCellClass() ?>"><div id="elh_patient_services_charged_date" class="patient_services_charged_date"><div class="ew-table-header-caption"><script id="tpc_patient_services_charged_date" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->charged_date->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $patient_services->charged_date->headerCellClass() ?>"><script id="tpc_patient_services_charged_date" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->charged_date) ?>',1);"><div id="elh_patient_services_charged_date" class="patient_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->charged_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->charged_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->status->Visible) { // status ?>
	<?php if ($patient_services->sortUrl($patient_services->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_services->status->headerCellClass() ?>"><div id="elh_patient_services_status" class="patient_services_status"><div class="ew-table-header-caption"><script id="tpc_patient_services_status" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->status->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_services->status->headerCellClass() ?>"><script id="tpc_patient_services_status" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->status) ?>',1);"><div id="elh_patient_services_status" class="patient_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_services->sortUrl($patient_services->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_services->mrnno->headerCellClass() ?>"><div id="elh_patient_services_mrnno" class="patient_services_mrnno"><div class="ew-table-header-caption"><script id="tpc_patient_services_mrnno" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->mrnno->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_services->mrnno->headerCellClass() ?>"><script id="tpc_patient_services_mrnno" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->mrnno) ?>',1);"><div id="elh_patient_services_mrnno" class="patient_services_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_services->sortUrl($patient_services->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_services->PatientName->headerCellClass() ?>"><div id="elh_patient_services_PatientName" class="patient_services_PatientName"><div class="ew-table-header-caption"><script id="tpc_patient_services_PatientName" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->PatientName->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_services->PatientName->headerCellClass() ?>"><script id="tpc_patient_services_PatientName" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->PatientName) ?>',1);"><div id="elh_patient_services_PatientName" class="patient_services_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Age->Visible) { // Age ?>
	<?php if ($patient_services->sortUrl($patient_services->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_services->Age->headerCellClass() ?>"><div id="elh_patient_services_Age" class="patient_services_Age"><div class="ew-table-header-caption"><script id="tpc_patient_services_Age" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Age->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_services->Age->headerCellClass() ?>"><script id="tpc_patient_services_Age" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Age) ?>',1);"><div id="elh_patient_services_Age" class="patient_services_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Gender->Visible) { // Gender ?>
	<?php if ($patient_services->sortUrl($patient_services->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_services->Gender->headerCellClass() ?>"><div id="elh_patient_services_Gender" class="patient_services_Gender"><div class="ew-table-header-caption"><script id="tpc_patient_services_Gender" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Gender->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_services->Gender->headerCellClass() ?>"><script id="tpc_patient_services_Gender" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Gender) ?>',1);"><div id="elh_patient_services_Gender" class="patient_services_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Unit->Visible) { // Unit ?>
	<?php if ($patient_services->sortUrl($patient_services->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $patient_services->Unit->headerCellClass() ?>"><div id="elh_patient_services_Unit" class="patient_services_Unit"><div class="ew-table-header-caption"><script id="tpc_patient_services_Unit" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Unit->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $patient_services->Unit->headerCellClass() ?>"><script id="tpc_patient_services_Unit" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Unit) ?>',1);"><div id="elh_patient_services_Unit" class="patient_services_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Quantity->Visible) { // Quantity ?>
	<?php if ($patient_services->sortUrl($patient_services->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $patient_services->Quantity->headerCellClass() ?>"><div id="elh_patient_services_Quantity" class="patient_services_Quantity"><div class="ew-table-header-caption"><script id="tpc_patient_services_Quantity" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Quantity->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $patient_services->Quantity->headerCellClass() ?>"><script id="tpc_patient_services_Quantity" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Quantity) ?>',1);"><div id="elh_patient_services_Quantity" class="patient_services_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Discount->Visible) { // Discount ?>
	<?php if ($patient_services->sortUrl($patient_services->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $patient_services->Discount->headerCellClass() ?>"><div id="elh_patient_services_Discount" class="patient_services_Discount"><div class="ew-table-header-caption"><script id="tpc_patient_services_Discount" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Discount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $patient_services->Discount->headerCellClass() ?>"><script id="tpc_patient_services_Discount" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Discount) ?>',1);"><div id="elh_patient_services_Discount" class="patient_services_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Discount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Discount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SubTotal->Visible) { // SubTotal ?>
	<?php if ($patient_services->sortUrl($patient_services->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $patient_services->SubTotal->headerCellClass() ?>"><div id="elh_patient_services_SubTotal" class="patient_services_SubTotal"><div class="ew-table-header-caption"><script id="tpc_patient_services_SubTotal" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->SubTotal->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $patient_services->SubTotal->headerCellClass() ?>"><script id="tpc_patient_services_SubTotal" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->SubTotal) ?>',1);"><div id="elh_patient_services_SubTotal" class="patient_services_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SubTotal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SubTotal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ServiceSelect->Visible) { // ServiceSelect ?>
	<?php if ($patient_services->sortUrl($patient_services->ServiceSelect) == "") { ?>
		<th data-name="ServiceSelect" class="<?php echo $patient_services->ServiceSelect->headerCellClass() ?>"><div id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect"><div class="ew-table-header-caption"><script id="tpc_patient_services_ServiceSelect" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->ServiceSelect->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ServiceSelect" class="<?php echo $patient_services->ServiceSelect->headerCellClass() ?>"><script id="tpc_patient_services_ServiceSelect" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->ServiceSelect) ?>',1);"><div id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ServiceSelect->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ServiceSelect->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ServiceSelect->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Aid->Visible) { // Aid ?>
	<?php if ($patient_services->sortUrl($patient_services->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $patient_services->Aid->headerCellClass() ?>"><div id="elh_patient_services_Aid" class="patient_services_Aid"><div class="ew-table-header-caption"><script id="tpc_patient_services_Aid" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Aid->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $patient_services->Aid->headerCellClass() ?>"><script id="tpc_patient_services_Aid" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Aid) ?>',1);"><div id="elh_patient_services_Aid" class="patient_services_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Aid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Aid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Vid->Visible) { // Vid ?>
	<?php if ($patient_services->sortUrl($patient_services->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $patient_services->Vid->headerCellClass() ?>"><div id="elh_patient_services_Vid" class="patient_services_Vid"><div class="ew-table-header-caption"><script id="tpc_patient_services_Vid" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Vid->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $patient_services->Vid->headerCellClass() ?>"><script id="tpc_patient_services_Vid" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Vid) ?>',1);"><div id="elh_patient_services_Vid" class="patient_services_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrID->Visible) { // DrID ?>
	<?php if ($patient_services->sortUrl($patient_services->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $patient_services->DrID->headerCellClass() ?>"><div id="elh_patient_services_DrID" class="patient_services_DrID"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrID" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DrID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $patient_services->DrID->headerCellClass() ?>"><script id="tpc_patient_services_DrID" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DrID) ?>',1);"><div id="elh_patient_services_DrID" class="patient_services_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrCODE->Visible) { // DrCODE ?>
	<?php if ($patient_services->sortUrl($patient_services->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $patient_services->DrCODE->headerCellClass() ?>"><div id="elh_patient_services_DrCODE" class="patient_services_DrCODE"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrCODE" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DrCODE->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $patient_services->DrCODE->headerCellClass() ?>"><script id="tpc_patient_services_DrCODE" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DrCODE) ?>',1);"><div id="elh_patient_services_DrCODE" class="patient_services_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrName->Visible) { // DrName ?>
	<?php if ($patient_services->sortUrl($patient_services->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $patient_services->DrName->headerCellClass() ?>"><div id="elh_patient_services_DrName" class="patient_services_DrName"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrName" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DrName->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $patient_services->DrName->headerCellClass() ?>"><script id="tpc_patient_services_DrName" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DrName) ?>',1);"><div id="elh_patient_services_DrName" class="patient_services_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Department->Visible) { // Department ?>
	<?php if ($patient_services->sortUrl($patient_services->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $patient_services->Department->headerCellClass() ?>"><div id="elh_patient_services_Department" class="patient_services_Department"><div class="ew-table-header-caption"><script id="tpc_patient_services_Department" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Department->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $patient_services->Department->headerCellClass() ?>"><script id="tpc_patient_services_Department" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Department) ?>',1);"><div id="elh_patient_services_Department" class="patient_services_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($patient_services->sortUrl($patient_services->DrSharePres) == "") { ?>
		<th data-name="DrSharePres" class="<?php echo $patient_services->DrSharePres->headerCellClass() ?>"><div id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrSharePres" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DrSharePres->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePres" class="<?php echo $patient_services->DrSharePres->headerCellClass() ?>"><script id="tpc_patient_services_DrSharePres" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DrSharePres) ?>',1);"><div id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrSharePres->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrSharePres->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($patient_services->sortUrl($patient_services->HospSharePres) == "") { ?>
		<th data-name="HospSharePres" class="<?php echo $patient_services->HospSharePres->headerCellClass() ?>"><div id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres"><div class="ew-table-header-caption"><script id="tpc_patient_services_HospSharePres" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->HospSharePres->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePres" class="<?php echo $patient_services->HospSharePres->headerCellClass() ?>"><script id="tpc_patient_services_HospSharePres" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->HospSharePres) ?>',1);"><div id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->HospSharePres->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->HospSharePres->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($patient_services->sortUrl($patient_services->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $patient_services->DrShareAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrShareAmount" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DrShareAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $patient_services->DrShareAmount->headerCellClass() ?>"><script id="tpc_patient_services_DrShareAmount" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DrShareAmount) ?>',1);"><div id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($patient_services->sortUrl($patient_services->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $patient_services->HospShareAmount->headerCellClass() ?>"><div id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount"><div class="ew-table-header-caption"><script id="tpc_patient_services_HospShareAmount" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->HospShareAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $patient_services->HospShareAmount->headerCellClass() ?>"><script id="tpc_patient_services_HospShareAmount" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->HospShareAmount) ?>',1);"><div id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->HospShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->HospShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($patient_services->sortUrl($patient_services->DrShareSettiledAmount) == "") { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $patient_services->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrShareSettiledAmount" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DrShareSettiledAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $patient_services->DrShareSettiledAmount->headerCellClass() ?>"><script id="tpc_patient_services_DrShareSettiledAmount" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DrShareSettiledAmount) ?>',1);"><div id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrShareSettiledAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrShareSettiledAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($patient_services->sortUrl($patient_services->DrShareSettledId) == "") { ?>
		<th data-name="DrShareSettledId" class="<?php echo $patient_services->DrShareSettledId->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrShareSettledId" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DrShareSettledId->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettledId" class="<?php echo $patient_services->DrShareSettledId->headerCellClass() ?>"><script id="tpc_patient_services_DrShareSettledId" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DrShareSettledId) ?>',1);"><div id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrShareSettledId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrShareSettledId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($patient_services->sortUrl($patient_services->DrShareSettiledStatus) == "") { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $patient_services->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrShareSettiledStatus" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DrShareSettiledStatus->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $patient_services->DrShareSettiledStatus->headerCellClass() ?>"><script id="tpc_patient_services_DrShareSettiledStatus" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DrShareSettiledStatus) ?>',1);"><div id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrShareSettiledStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrShareSettiledStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->invoiceId->Visible) { // invoiceId ?>
	<?php if ($patient_services->sortUrl($patient_services->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $patient_services->invoiceId->headerCellClass() ?>"><div id="elh_patient_services_invoiceId" class="patient_services_invoiceId"><div class="ew-table-header-caption"><script id="tpc_patient_services_invoiceId" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->invoiceId->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $patient_services->invoiceId->headerCellClass() ?>"><script id="tpc_patient_services_invoiceId" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->invoiceId) ?>',1);"><div id="elh_patient_services_invoiceId" class="patient_services_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->invoiceId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->invoiceId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($patient_services->sortUrl($patient_services->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $patient_services->invoiceAmount->headerCellClass() ?>"><div id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount"><div class="ew-table-header-caption"><script id="tpc_patient_services_invoiceAmount" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->invoiceAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $patient_services->invoiceAmount->headerCellClass() ?>"><script id="tpc_patient_services_invoiceAmount" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->invoiceAmount) ?>',1);"><div id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->invoiceAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->invoiceAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($patient_services->sortUrl($patient_services->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $patient_services->invoiceStatus->headerCellClass() ?>"><div id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus"><div class="ew-table-header-caption"><script id="tpc_patient_services_invoiceStatus" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->invoiceStatus->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $patient_services->invoiceStatus->headerCellClass() ?>"><script id="tpc_patient_services_invoiceStatus" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->invoiceStatus) ?>',1);"><div id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->invoiceStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->invoiceStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->invoiceStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($patient_services->sortUrl($patient_services->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $patient_services->modeOfPayment->headerCellClass() ?>"><div id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment"><div class="ew-table-header-caption"><script id="tpc_patient_services_modeOfPayment" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->modeOfPayment->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $patient_services->modeOfPayment->headerCellClass() ?>"><script id="tpc_patient_services_modeOfPayment" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->modeOfPayment) ?>',1);"><div id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->modeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->modeOfPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->modeOfPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->HospID->Visible) { // HospID ?>
	<?php if ($patient_services->sortUrl($patient_services->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_services->HospID->headerCellClass() ?>"><div id="elh_patient_services_HospID" class="patient_services_HospID"><div class="ew-table-header-caption"><script id="tpc_patient_services_HospID" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_services->HospID->headerCellClass() ?>"><script id="tpc_patient_services_HospID" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->HospID) ?>',1);"><div id="elh_patient_services_HospID" class="patient_services_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->RIDNO->Visible) { // RIDNO ?>
	<?php if ($patient_services->sortUrl($patient_services->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $patient_services->RIDNO->headerCellClass() ?>"><div id="elh_patient_services_RIDNO" class="patient_services_RIDNO"><div class="ew-table-header-caption"><script id="tpc_patient_services_RIDNO" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->RIDNO->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $patient_services->RIDNO->headerCellClass() ?>"><script id="tpc_patient_services_RIDNO" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->RIDNO) ?>',1);"><div id="elh_patient_services_RIDNO" class="patient_services_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->TidNo->Visible) { // TidNo ?>
	<?php if ($patient_services->sortUrl($patient_services->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $patient_services->TidNo->headerCellClass() ?>"><div id="elh_patient_services_TidNo" class="patient_services_TidNo"><div class="ew-table-header-caption"><script id="tpc_patient_services_TidNo" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->TidNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $patient_services->TidNo->headerCellClass() ?>"><script id="tpc_patient_services_TidNo" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->TidNo) ?>',1);"><div id="elh_patient_services_TidNo" class="patient_services_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($patient_services->sortUrl($patient_services->DiscountCategory) == "") { ?>
		<th data-name="DiscountCategory" class="<?php echo $patient_services->DiscountCategory->headerCellClass() ?>"><div id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory"><div class="ew-table-header-caption"><script id="tpc_patient_services_DiscountCategory" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DiscountCategory->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountCategory" class="<?php echo $patient_services->DiscountCategory->headerCellClass() ?>"><script id="tpc_patient_services_DiscountCategory" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DiscountCategory) ?>',1);"><div id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DiscountCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DiscountCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DiscountCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->sid->Visible) { // sid ?>
	<?php if ($patient_services->sortUrl($patient_services->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $patient_services->sid->headerCellClass() ?>"><div id="elh_patient_services_sid" class="patient_services_sid"><div class="ew-table-header-caption"><script id="tpc_patient_services_sid" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->sid->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $patient_services->sid->headerCellClass() ?>"><script id="tpc_patient_services_sid" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->sid) ?>',1);"><div id="elh_patient_services_sid" class="patient_services_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ItemCode->Visible) { // ItemCode ?>
	<?php if ($patient_services->sortUrl($patient_services->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $patient_services->ItemCode->headerCellClass() ?>"><div id="elh_patient_services_ItemCode" class="patient_services_ItemCode"><div class="ew-table-header-caption"><script id="tpc_patient_services_ItemCode" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->ItemCode->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $patient_services->ItemCode->headerCellClass() ?>"><script id="tpc_patient_services_ItemCode" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->ItemCode) ?>',1);"><div id="elh_patient_services_ItemCode" class="patient_services_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ItemCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($patient_services->sortUrl($patient_services->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $patient_services->TestSubCd->headerCellClass() ?>"><div id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd"><div class="ew-table-header-caption"><script id="tpc_patient_services_TestSubCd" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->TestSubCd->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $patient_services->TestSubCd->headerCellClass() ?>"><script id="tpc_patient_services_TestSubCd" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->TestSubCd) ?>',1);"><div id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->TestSubCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->TestSubCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DEptCd->Visible) { // DEptCd ?>
	<?php if ($patient_services->sortUrl($patient_services->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $patient_services->DEptCd->headerCellClass() ?>"><div id="elh_patient_services_DEptCd" class="patient_services_DEptCd"><div class="ew-table-header-caption"><script id="tpc_patient_services_DEptCd" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DEptCd->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $patient_services->DEptCd->headerCellClass() ?>"><script id="tpc_patient_services_DEptCd" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DEptCd) ?>',1);"><div id="elh_patient_services_DEptCd" class="patient_services_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ProfCd->Visible) { // ProfCd ?>
	<?php if ($patient_services->sortUrl($patient_services->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $patient_services->ProfCd->headerCellClass() ?>"><div id="elh_patient_services_ProfCd" class="patient_services_ProfCd"><div class="ew-table-header-caption"><script id="tpc_patient_services_ProfCd" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->ProfCd->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $patient_services->ProfCd->headerCellClass() ?>"><script id="tpc_patient_services_ProfCd" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->ProfCd) ?>',1);"><div id="elh_patient_services_ProfCd" class="patient_services_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ProfCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ProfCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ProfCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Comments->Visible) { // Comments ?>
	<?php if ($patient_services->sortUrl($patient_services->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $patient_services->Comments->headerCellClass() ?>"><div id="elh_patient_services_Comments" class="patient_services_Comments"><div class="ew-table-header-caption"><script id="tpc_patient_services_Comments" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Comments->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $patient_services->Comments->headerCellClass() ?>"><script id="tpc_patient_services_Comments" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Comments) ?>',1);"><div id="elh_patient_services_Comments" class="patient_services_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Comments->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Comments->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Comments->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Method->Visible) { // Method ?>
	<?php if ($patient_services->sortUrl($patient_services->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $patient_services->Method->headerCellClass() ?>"><div id="elh_patient_services_Method" class="patient_services_Method"><div class="ew-table-header-caption"><script id="tpc_patient_services_Method" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Method->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $patient_services->Method->headerCellClass() ?>"><script id="tpc_patient_services_Method" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Method) ?>',1);"><div id="elh_patient_services_Method" class="patient_services_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Specimen->Visible) { // Specimen ?>
	<?php if ($patient_services->sortUrl($patient_services->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $patient_services->Specimen->headerCellClass() ?>"><div id="elh_patient_services_Specimen" class="patient_services_Specimen"><div class="ew-table-header-caption"><script id="tpc_patient_services_Specimen" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Specimen->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $patient_services->Specimen->headerCellClass() ?>"><script id="tpc_patient_services_Specimen" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Specimen) ?>',1);"><div id="elh_patient_services_Specimen" class="patient_services_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Specimen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Specimen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Specimen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Abnormal->Visible) { // Abnormal ?>
	<?php if ($patient_services->sortUrl($patient_services->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $patient_services->Abnormal->headerCellClass() ?>"><div id="elh_patient_services_Abnormal" class="patient_services_Abnormal"><div class="ew-table-header-caption"><script id="tpc_patient_services_Abnormal" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Abnormal->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $patient_services->Abnormal->headerCellClass() ?>"><script id="tpc_patient_services_Abnormal" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Abnormal) ?>',1);"><div id="elh_patient_services_Abnormal" class="patient_services_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Abnormal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Abnormal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Abnormal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->TestUnit->Visible) { // TestUnit ?>
	<?php if ($patient_services->sortUrl($patient_services->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $patient_services->TestUnit->headerCellClass() ?>"><div id="elh_patient_services_TestUnit" class="patient_services_TestUnit"><div class="ew-table-header-caption"><script id="tpc_patient_services_TestUnit" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->TestUnit->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $patient_services->TestUnit->headerCellClass() ?>"><script id="tpc_patient_services_TestUnit" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->TestUnit) ?>',1);"><div id="elh_patient_services_TestUnit" class="patient_services_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->TestUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->TestUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->TestUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($patient_services->sortUrl($patient_services->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $patient_services->LOWHIGH->headerCellClass() ?>"><div id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH"><div class="ew-table-header-caption"><script id="tpc_patient_services_LOWHIGH" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->LOWHIGH->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $patient_services->LOWHIGH->headerCellClass() ?>"><script id="tpc_patient_services_LOWHIGH" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->LOWHIGH) ?>',1);"><div id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->LOWHIGH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->LOWHIGH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->LOWHIGH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Branch->Visible) { // Branch ?>
	<?php if ($patient_services->sortUrl($patient_services->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $patient_services->Branch->headerCellClass() ?>"><div id="elh_patient_services_Branch" class="patient_services_Branch"><div class="ew-table-header-caption"><script id="tpc_patient_services_Branch" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Branch->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $patient_services->Branch->headerCellClass() ?>"><script id="tpc_patient_services_Branch" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Branch) ?>',1);"><div id="elh_patient_services_Branch" class="patient_services_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Branch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Branch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Branch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Dispatch->Visible) { // Dispatch ?>
	<?php if ($patient_services->sortUrl($patient_services->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $patient_services->Dispatch->headerCellClass() ?>"><div id="elh_patient_services_Dispatch" class="patient_services_Dispatch"><div class="ew-table-header-caption"><script id="tpc_patient_services_Dispatch" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Dispatch->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $patient_services->Dispatch->headerCellClass() ?>"><script id="tpc_patient_services_Dispatch" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Dispatch) ?>',1);"><div id="elh_patient_services_Dispatch" class="patient_services_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Dispatch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Dispatch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Dispatch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Pic1->Visible) { // Pic1 ?>
	<?php if ($patient_services->sortUrl($patient_services->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $patient_services->Pic1->headerCellClass() ?>"><div id="elh_patient_services_Pic1" class="patient_services_Pic1"><div class="ew-table-header-caption"><script id="tpc_patient_services_Pic1" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Pic1->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $patient_services->Pic1->headerCellClass() ?>"><script id="tpc_patient_services_Pic1" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Pic1) ?>',1);"><div id="elh_patient_services_Pic1" class="patient_services_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Pic1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Pic1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Pic1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Pic2->Visible) { // Pic2 ?>
	<?php if ($patient_services->sortUrl($patient_services->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $patient_services->Pic2->headerCellClass() ?>"><div id="elh_patient_services_Pic2" class="patient_services_Pic2"><div class="ew-table-header-caption"><script id="tpc_patient_services_Pic2" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Pic2->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $patient_services->Pic2->headerCellClass() ?>"><script id="tpc_patient_services_Pic2" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Pic2) ?>',1);"><div id="elh_patient_services_Pic2" class="patient_services_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Pic2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Pic2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Pic2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->GraphPath->Visible) { // GraphPath ?>
	<?php if ($patient_services->sortUrl($patient_services->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $patient_services->GraphPath->headerCellClass() ?>"><div id="elh_patient_services_GraphPath" class="patient_services_GraphPath"><div class="ew-table-header-caption"><script id="tpc_patient_services_GraphPath" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->GraphPath->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $patient_services->GraphPath->headerCellClass() ?>"><script id="tpc_patient_services_GraphPath" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->GraphPath) ?>',1);"><div id="elh_patient_services_GraphPath" class="patient_services_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->GraphPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->GraphPath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->GraphPath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->MachineCD->Visible) { // MachineCD ?>
	<?php if ($patient_services->sortUrl($patient_services->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $patient_services->MachineCD->headerCellClass() ?>"><div id="elh_patient_services_MachineCD" class="patient_services_MachineCD"><div class="ew-table-header-caption"><script id="tpc_patient_services_MachineCD" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->MachineCD->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $patient_services->MachineCD->headerCellClass() ?>"><script id="tpc_patient_services_MachineCD" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->MachineCD) ?>',1);"><div id="elh_patient_services_MachineCD" class="patient_services_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->MachineCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->MachineCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->MachineCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->TestCancel->Visible) { // TestCancel ?>
	<?php if ($patient_services->sortUrl($patient_services->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $patient_services->TestCancel->headerCellClass() ?>"><div id="elh_patient_services_TestCancel" class="patient_services_TestCancel"><div class="ew-table-header-caption"><script id="tpc_patient_services_TestCancel" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->TestCancel->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $patient_services->TestCancel->headerCellClass() ?>"><script id="tpc_patient_services_TestCancel" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->TestCancel) ?>',1);"><div id="elh_patient_services_TestCancel" class="patient_services_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->TestCancel->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->TestCancel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->TestCancel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->OutSource->Visible) { // OutSource ?>
	<?php if ($patient_services->sortUrl($patient_services->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $patient_services->OutSource->headerCellClass() ?>"><div id="elh_patient_services_OutSource" class="patient_services_OutSource"><div class="ew-table-header-caption"><script id="tpc_patient_services_OutSource" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->OutSource->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $patient_services->OutSource->headerCellClass() ?>"><script id="tpc_patient_services_OutSource" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->OutSource) ?>',1);"><div id="elh_patient_services_OutSource" class="patient_services_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->OutSource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->OutSource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->OutSource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Printed->Visible) { // Printed ?>
	<?php if ($patient_services->sortUrl($patient_services->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $patient_services->Printed->headerCellClass() ?>"><div id="elh_patient_services_Printed" class="patient_services_Printed"><div class="ew-table-header-caption"><script id="tpc_patient_services_Printed" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Printed->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $patient_services->Printed->headerCellClass() ?>"><script id="tpc_patient_services_Printed" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Printed) ?>',1);"><div id="elh_patient_services_Printed" class="patient_services_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Printed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Printed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Printed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->PrintBy->Visible) { // PrintBy ?>
	<?php if ($patient_services->sortUrl($patient_services->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $patient_services->PrintBy->headerCellClass() ?>"><div id="elh_patient_services_PrintBy" class="patient_services_PrintBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_PrintBy" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->PrintBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $patient_services->PrintBy->headerCellClass() ?>"><script id="tpc_patient_services_PrintBy" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->PrintBy) ?>',1);"><div id="elh_patient_services_PrintBy" class="patient_services_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->PrintBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->PrintBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->PrintBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->PrintDate->Visible) { // PrintDate ?>
	<?php if ($patient_services->sortUrl($patient_services->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $patient_services->PrintDate->headerCellClass() ?>"><div id="elh_patient_services_PrintDate" class="patient_services_PrintDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_PrintDate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->PrintDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $patient_services->PrintDate->headerCellClass() ?>"><script id="tpc_patient_services_PrintDate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->PrintDate) ?>',1);"><div id="elh_patient_services_PrintDate" class="patient_services_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->PrintDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->PrintDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->BillingDate->Visible) { // BillingDate ?>
	<?php if ($patient_services->sortUrl($patient_services->BillingDate) == "") { ?>
		<th data-name="BillingDate" class="<?php echo $patient_services->BillingDate->headerCellClass() ?>"><div id="elh_patient_services_BillingDate" class="patient_services_BillingDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_BillingDate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->BillingDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillingDate" class="<?php echo $patient_services->BillingDate->headerCellClass() ?>"><script id="tpc_patient_services_BillingDate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->BillingDate) ?>',1);"><div id="elh_patient_services_BillingDate" class="patient_services_BillingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->BillingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->BillingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->BilledBy->Visible) { // BilledBy ?>
	<?php if ($patient_services->sortUrl($patient_services->BilledBy) == "") { ?>
		<th data-name="BilledBy" class="<?php echo $patient_services->BilledBy->headerCellClass() ?>"><div id="elh_patient_services_BilledBy" class="patient_services_BilledBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_BilledBy" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->BilledBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BilledBy" class="<?php echo $patient_services->BilledBy->headerCellClass() ?>"><script id="tpc_patient_services_BilledBy" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->BilledBy) ?>',1);"><div id="elh_patient_services_BilledBy" class="patient_services_BilledBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->BilledBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->BilledBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->BilledBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Resulted->Visible) { // Resulted ?>
	<?php if ($patient_services->sortUrl($patient_services->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $patient_services->Resulted->headerCellClass() ?>"><div id="elh_patient_services_Resulted" class="patient_services_Resulted"><div class="ew-table-header-caption"><script id="tpc_patient_services_Resulted" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Resulted->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $patient_services->Resulted->headerCellClass() ?>"><script id="tpc_patient_services_Resulted" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Resulted) ?>',1);"><div id="elh_patient_services_Resulted" class="patient_services_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Resulted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Resulted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Resulted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ResultDate->Visible) { // ResultDate ?>
	<?php if ($patient_services->sortUrl($patient_services->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $patient_services->ResultDate->headerCellClass() ?>"><div id="elh_patient_services_ResultDate" class="patient_services_ResultDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_ResultDate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->ResultDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $patient_services->ResultDate->headerCellClass() ?>"><script id="tpc_patient_services_ResultDate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->ResultDate) ?>',1);"><div id="elh_patient_services_ResultDate" class="patient_services_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($patient_services->sortUrl($patient_services->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_services->ResultedBy->headerCellClass() ?>"><div id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_ResultedBy" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->ResultedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_services->ResultedBy->headerCellClass() ?>"><script id="tpc_patient_services_ResultedBy" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->ResultedBy) ?>',1);"><div id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ResultedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SampleDate->Visible) { // SampleDate ?>
	<?php if ($patient_services->sortUrl($patient_services->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $patient_services->SampleDate->headerCellClass() ?>"><div id="elh_patient_services_SampleDate" class="patient_services_SampleDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_SampleDate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->SampleDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $patient_services->SampleDate->headerCellClass() ?>"><script id="tpc_patient_services_SampleDate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->SampleDate) ?>',1);"><div id="elh_patient_services_SampleDate" class="patient_services_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SampleDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SampleDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SampleUser->Visible) { // SampleUser ?>
	<?php if ($patient_services->sortUrl($patient_services->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $patient_services->SampleUser->headerCellClass() ?>"><div id="elh_patient_services_SampleUser" class="patient_services_SampleUser"><div class="ew-table-header-caption"><script id="tpc_patient_services_SampleUser" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->SampleUser->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $patient_services->SampleUser->headerCellClass() ?>"><script id="tpc_patient_services_SampleUser" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->SampleUser) ?>',1);"><div id="elh_patient_services_SampleUser" class="patient_services_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SampleUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SampleUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SampleUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Sampled->Visible) { // Sampled ?>
	<?php if ($patient_services->sortUrl($patient_services->Sampled) == "") { ?>
		<th data-name="Sampled" class="<?php echo $patient_services->Sampled->headerCellClass() ?>"><div id="elh_patient_services_Sampled" class="patient_services_Sampled"><div class="ew-table-header-caption"><script id="tpc_patient_services_Sampled" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Sampled->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Sampled" class="<?php echo $patient_services->Sampled->headerCellClass() ?>"><script id="tpc_patient_services_Sampled" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Sampled) ?>',1);"><div id="elh_patient_services_Sampled" class="patient_services_Sampled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Sampled->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Sampled->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Sampled->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($patient_services->sortUrl($patient_services->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $patient_services->ReceivedDate->headerCellClass() ?>"><div id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_ReceivedDate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->ReceivedDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $patient_services->ReceivedDate->headerCellClass() ?>"><script id="tpc_patient_services_ReceivedDate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->ReceivedDate) ?>',1);"><div id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ReceivedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ReceivedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($patient_services->sortUrl($patient_services->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $patient_services->ReceivedUser->headerCellClass() ?>"><div id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser"><div class="ew-table-header-caption"><script id="tpc_patient_services_ReceivedUser" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->ReceivedUser->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $patient_services->ReceivedUser->headerCellClass() ?>"><script id="tpc_patient_services_ReceivedUser" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->ReceivedUser) ?>',1);"><div id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ReceivedUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ReceivedUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ReceivedUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Recevied->Visible) { // Recevied ?>
	<?php if ($patient_services->sortUrl($patient_services->Recevied) == "") { ?>
		<th data-name="Recevied" class="<?php echo $patient_services->Recevied->headerCellClass() ?>"><div id="elh_patient_services_Recevied" class="patient_services_Recevied"><div class="ew-table-header-caption"><script id="tpc_patient_services_Recevied" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Recevied->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Recevied" class="<?php echo $patient_services->Recevied->headerCellClass() ?>"><script id="tpc_patient_services_Recevied" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Recevied) ?>',1);"><div id="elh_patient_services_Recevied" class="patient_services_Recevied">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Recevied->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Recevied->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Recevied->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($patient_services->sortUrl($patient_services->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $patient_services->DeptRecvDate->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_DeptRecvDate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DeptRecvDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $patient_services->DeptRecvDate->headerCellClass() ?>"><script id="tpc_patient_services_DeptRecvDate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DeptRecvDate) ?>',1);"><div id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DeptRecvDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DeptRecvDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($patient_services->sortUrl($patient_services->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $patient_services->DeptRecvUser->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser"><div class="ew-table-header-caption"><script id="tpc_patient_services_DeptRecvUser" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DeptRecvUser->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $patient_services->DeptRecvUser->headerCellClass() ?>"><script id="tpc_patient_services_DeptRecvUser" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DeptRecvUser) ?>',1);"><div id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DeptRecvUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DeptRecvUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DeptRecvUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($patient_services->sortUrl($patient_services->DeptRecived) == "") { ?>
		<th data-name="DeptRecived" class="<?php echo $patient_services->DeptRecived->headerCellClass() ?>"><div id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived"><div class="ew-table-header-caption"><script id="tpc_patient_services_DeptRecived" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->DeptRecived->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecived" class="<?php echo $patient_services->DeptRecived->headerCellClass() ?>"><script id="tpc_patient_services_DeptRecived" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->DeptRecived) ?>',1);"><div id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DeptRecived->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DeptRecived->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DeptRecived->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($patient_services->sortUrl($patient_services->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $patient_services->SAuthDate->headerCellClass() ?>"><div id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_SAuthDate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->SAuthDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $patient_services->SAuthDate->headerCellClass() ?>"><script id="tpc_patient_services_SAuthDate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->SAuthDate) ?>',1);"><div id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SAuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SAuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($patient_services->sortUrl($patient_services->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $patient_services->SAuthBy->headerCellClass() ?>"><div id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_SAuthBy" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->SAuthBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $patient_services->SAuthBy->headerCellClass() ?>"><script id="tpc_patient_services_SAuthBy" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->SAuthBy) ?>',1);"><div id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SAuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SAuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SAuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($patient_services->sortUrl($patient_services->SAuthendicate) == "") { ?>
		<th data-name="SAuthendicate" class="<?php echo $patient_services->SAuthendicate->headerCellClass() ?>"><div id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate"><div class="ew-table-header-caption"><script id="tpc_patient_services_SAuthendicate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->SAuthendicate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthendicate" class="<?php echo $patient_services->SAuthendicate->headerCellClass() ?>"><script id="tpc_patient_services_SAuthendicate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->SAuthendicate) ?>',1);"><div id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SAuthendicate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SAuthendicate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SAuthendicate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->AuthDate->Visible) { // AuthDate ?>
	<?php if ($patient_services->sortUrl($patient_services->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $patient_services->AuthDate->headerCellClass() ?>"><div id="elh_patient_services_AuthDate" class="patient_services_AuthDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_AuthDate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->AuthDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $patient_services->AuthDate->headerCellClass() ?>"><script id="tpc_patient_services_AuthDate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->AuthDate) ?>',1);"><div id="elh_patient_services_AuthDate" class="patient_services_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->AuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->AuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->AuthBy->Visible) { // AuthBy ?>
	<?php if ($patient_services->sortUrl($patient_services->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $patient_services->AuthBy->headerCellClass() ?>"><div id="elh_patient_services_AuthBy" class="patient_services_AuthBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_AuthBy" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->AuthBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $patient_services->AuthBy->headerCellClass() ?>"><script id="tpc_patient_services_AuthBy" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->AuthBy) ?>',1);"><div id="elh_patient_services_AuthBy" class="patient_services_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->AuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->AuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->AuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Authencate->Visible) { // Authencate ?>
	<?php if ($patient_services->sortUrl($patient_services->Authencate) == "") { ?>
		<th data-name="Authencate" class="<?php echo $patient_services->Authencate->headerCellClass() ?>"><div id="elh_patient_services_Authencate" class="patient_services_Authencate"><div class="ew-table-header-caption"><script id="tpc_patient_services_Authencate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Authencate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Authencate" class="<?php echo $patient_services->Authencate->headerCellClass() ?>"><script id="tpc_patient_services_Authencate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Authencate) ?>',1);"><div id="elh_patient_services_Authencate" class="patient_services_Authencate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Authencate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Authencate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Authencate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->EditDate->Visible) { // EditDate ?>
	<?php if ($patient_services->sortUrl($patient_services->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $patient_services->EditDate->headerCellClass() ?>"><div id="elh_patient_services_EditDate" class="patient_services_EditDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_EditDate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->EditDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $patient_services->EditDate->headerCellClass() ?>"><script id="tpc_patient_services_EditDate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->EditDate) ?>',1);"><div id="elh_patient_services_EditDate" class="patient_services_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->EditDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->EditDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->EditBy->Visible) { // EditBy ?>
	<?php if ($patient_services->sortUrl($patient_services->EditBy) == "") { ?>
		<th data-name="EditBy" class="<?php echo $patient_services->EditBy->headerCellClass() ?>"><div id="elh_patient_services_EditBy" class="patient_services_EditBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_EditBy" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->EditBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="EditBy" class="<?php echo $patient_services->EditBy->headerCellClass() ?>"><script id="tpc_patient_services_EditBy" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->EditBy) ?>',1);"><div id="elh_patient_services_EditBy" class="patient_services_EditBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->EditBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->EditBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->EditBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Editted->Visible) { // Editted ?>
	<?php if ($patient_services->sortUrl($patient_services->Editted) == "") { ?>
		<th data-name="Editted" class="<?php echo $patient_services->Editted->headerCellClass() ?>"><div id="elh_patient_services_Editted" class="patient_services_Editted"><div class="ew-table-header-caption"><script id="tpc_patient_services_Editted" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Editted->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Editted" class="<?php echo $patient_services->Editted->headerCellClass() ?>"><script id="tpc_patient_services_Editted" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Editted) ?>',1);"><div id="elh_patient_services_Editted" class="patient_services_Editted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Editted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Editted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Editted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->PatID->Visible) { // PatID ?>
	<?php if ($patient_services->sortUrl($patient_services->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_services->PatID->headerCellClass() ?>"><div id="elh_patient_services_PatID" class="patient_services_PatID"><div class="ew-table-header-caption"><script id="tpc_patient_services_PatID" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->PatID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_services->PatID->headerCellClass() ?>"><script id="tpc_patient_services_PatID" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->PatID) ?>',1);"><div id="elh_patient_services_PatID" class="patient_services_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_services->sortUrl($patient_services->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_services->PatientId->headerCellClass() ?>"><div id="elh_patient_services_PatientId" class="patient_services_PatientId"><div class="ew-table-header-caption"><script id="tpc_patient_services_PatientId" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->PatientId->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_services->PatientId->headerCellClass() ?>"><script id="tpc_patient_services_PatientId" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->PatientId) ?>',1);"><div id="elh_patient_services_PatientId" class="patient_services_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Mobile->Visible) { // Mobile ?>
	<?php if ($patient_services->sortUrl($patient_services->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $patient_services->Mobile->headerCellClass() ?>"><div id="elh_patient_services_Mobile" class="patient_services_Mobile"><div class="ew-table-header-caption"><script id="tpc_patient_services_Mobile" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Mobile->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $patient_services->Mobile->headerCellClass() ?>"><script id="tpc_patient_services_Mobile" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Mobile) ?>',1);"><div id="elh_patient_services_Mobile" class="patient_services_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->CId->Visible) { // CId ?>
	<?php if ($patient_services->sortUrl($patient_services->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $patient_services->CId->headerCellClass() ?>"><div id="elh_patient_services_CId" class="patient_services_CId"><div class="ew-table-header-caption"><script id="tpc_patient_services_CId" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->CId->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $patient_services->CId->headerCellClass() ?>"><script id="tpc_patient_services_CId" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->CId) ?>',1);"><div id="elh_patient_services_CId" class="patient_services_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Order->Visible) { // Order ?>
	<?php if ($patient_services->sortUrl($patient_services->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $patient_services->Order->headerCellClass() ?>"><div id="elh_patient_services_Order" class="patient_services_Order"><div class="ew-table-header-caption"><script id="tpc_patient_services_Order" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Order->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $patient_services->Order->headerCellClass() ?>"><script id="tpc_patient_services_Order" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Order) ?>',1);"><div id="elh_patient_services_Order" class="patient_services_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ResType->Visible) { // ResType ?>
	<?php if ($patient_services->sortUrl($patient_services->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $patient_services->ResType->headerCellClass() ?>"><div id="elh_patient_services_ResType" class="patient_services_ResType"><div class="ew-table-header-caption"><script id="tpc_patient_services_ResType" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->ResType->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $patient_services->ResType->headerCellClass() ?>"><script id="tpc_patient_services_ResType" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->ResType) ?>',1);"><div id="elh_patient_services_ResType" class="patient_services_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ResType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ResType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Sample->Visible) { // Sample ?>
	<?php if ($patient_services->sortUrl($patient_services->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $patient_services->Sample->headerCellClass() ?>"><div id="elh_patient_services_Sample" class="patient_services_Sample"><div class="ew-table-header-caption"><script id="tpc_patient_services_Sample" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Sample->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $patient_services->Sample->headerCellClass() ?>"><script id="tpc_patient_services_Sample" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Sample) ?>',1);"><div id="elh_patient_services_Sample" class="patient_services_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Sample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Sample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->NoD->Visible) { // NoD ?>
	<?php if ($patient_services->sortUrl($patient_services->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $patient_services->NoD->headerCellClass() ?>"><div id="elh_patient_services_NoD" class="patient_services_NoD"><div class="ew-table-header-caption"><script id="tpc_patient_services_NoD" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->NoD->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $patient_services->NoD->headerCellClass() ?>"><script id="tpc_patient_services_NoD" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->NoD) ?>',1);"><div id="elh_patient_services_NoD" class="patient_services_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->NoD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->NoD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->BillOrder->Visible) { // BillOrder ?>
	<?php if ($patient_services->sortUrl($patient_services->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $patient_services->BillOrder->headerCellClass() ?>"><div id="elh_patient_services_BillOrder" class="patient_services_BillOrder"><div class="ew-table-header-caption"><script id="tpc_patient_services_BillOrder" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->BillOrder->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $patient_services->BillOrder->headerCellClass() ?>"><script id="tpc_patient_services_BillOrder" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->BillOrder) ?>',1);"><div id="elh_patient_services_BillOrder" class="patient_services_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->BillOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->BillOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Inactive->Visible) { // Inactive ?>
	<?php if ($patient_services->sortUrl($patient_services->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $patient_services->Inactive->headerCellClass() ?>"><div id="elh_patient_services_Inactive" class="patient_services_Inactive"><div class="ew-table-header-caption"><script id="tpc_patient_services_Inactive" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Inactive->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $patient_services->Inactive->headerCellClass() ?>"><script id="tpc_patient_services_Inactive" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Inactive) ?>',1);"><div id="elh_patient_services_Inactive" class="patient_services_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Inactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Inactive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Inactive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->CollSample->Visible) { // CollSample ?>
	<?php if ($patient_services->sortUrl($patient_services->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $patient_services->CollSample->headerCellClass() ?>"><div id="elh_patient_services_CollSample" class="patient_services_CollSample"><div class="ew-table-header-caption"><script id="tpc_patient_services_CollSample" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->CollSample->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $patient_services->CollSample->headerCellClass() ?>"><script id="tpc_patient_services_CollSample" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->CollSample) ?>',1);"><div id="elh_patient_services_CollSample" class="patient_services_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->CollSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->CollSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->TestType->Visible) { // TestType ?>
	<?php if ($patient_services->sortUrl($patient_services->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $patient_services->TestType->headerCellClass() ?>"><div id="elh_patient_services_TestType" class="patient_services_TestType"><div class="ew-table-header-caption"><script id="tpc_patient_services_TestType" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->TestType->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $patient_services->TestType->headerCellClass() ?>"><script id="tpc_patient_services_TestType" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->TestType) ?>',1);"><div id="elh_patient_services_TestType" class="patient_services_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->TestType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Repeated->Visible) { // Repeated ?>
	<?php if ($patient_services->sortUrl($patient_services->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $patient_services->Repeated->headerCellClass() ?>"><div id="elh_patient_services_Repeated" class="patient_services_Repeated"><div class="ew-table-header-caption"><script id="tpc_patient_services_Repeated" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Repeated->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $patient_services->Repeated->headerCellClass() ?>"><script id="tpc_patient_services_Repeated" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Repeated) ?>',1);"><div id="elh_patient_services_Repeated" class="patient_services_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Repeated->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Repeated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Repeated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($patient_services->sortUrl($patient_services->RepeatedBy) == "") { ?>
		<th data-name="RepeatedBy" class="<?php echo $patient_services->RepeatedBy->headerCellClass() ?>"><div id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_RepeatedBy" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->RepeatedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedBy" class="<?php echo $patient_services->RepeatedBy->headerCellClass() ?>"><script id="tpc_patient_services_RepeatedBy" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->RepeatedBy) ?>',1);"><div id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->RepeatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->RepeatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->RepeatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($patient_services->sortUrl($patient_services->RepeatedDate) == "") { ?>
		<th data-name="RepeatedDate" class="<?php echo $patient_services->RepeatedDate->headerCellClass() ?>"><div id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_RepeatedDate" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->RepeatedDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedDate" class="<?php echo $patient_services->RepeatedDate->headerCellClass() ?>"><script id="tpc_patient_services_RepeatedDate" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->RepeatedDate) ?>',1);"><div id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->RepeatedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->RepeatedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->serviceID->Visible) { // serviceID ?>
	<?php if ($patient_services->sortUrl($patient_services->serviceID) == "") { ?>
		<th data-name="serviceID" class="<?php echo $patient_services->serviceID->headerCellClass() ?>"><div id="elh_patient_services_serviceID" class="patient_services_serviceID"><div class="ew-table-header-caption"><script id="tpc_patient_services_serviceID" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->serviceID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="serviceID" class="<?php echo $patient_services->serviceID->headerCellClass() ?>"><script id="tpc_patient_services_serviceID" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->serviceID) ?>',1);"><div id="elh_patient_services_serviceID" class="patient_services_serviceID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->serviceID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->serviceID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Service_Type->Visible) { // Service_Type ?>
	<?php if ($patient_services->sortUrl($patient_services->Service_Type) == "") { ?>
		<th data-name="Service_Type" class="<?php echo $patient_services->Service_Type->headerCellClass() ?>"><div id="elh_patient_services_Service_Type" class="patient_services_Service_Type"><div class="ew-table-header-caption"><script id="tpc_patient_services_Service_Type" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Service_Type->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Type" class="<?php echo $patient_services->Service_Type->headerCellClass() ?>"><script id="tpc_patient_services_Service_Type" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Service_Type) ?>',1);"><div id="elh_patient_services_Service_Type" class="patient_services_Service_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Service_Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Service_Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Service_Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Service_Department->Visible) { // Service_Department ?>
	<?php if ($patient_services->sortUrl($patient_services->Service_Department) == "") { ?>
		<th data-name="Service_Department" class="<?php echo $patient_services->Service_Department->headerCellClass() ?>"><div id="elh_patient_services_Service_Department" class="patient_services_Service_Department"><div class="ew-table-header-caption"><script id="tpc_patient_services_Service_Department" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->Service_Department->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Department" class="<?php echo $patient_services->Service_Department->headerCellClass() ?>"><script id="tpc_patient_services_Service_Department" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->Service_Department) ?>',1);"><div id="elh_patient_services_Service_Department" class="patient_services_Service_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Service_Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Service_Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Service_Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->RequestNo->Visible) { // RequestNo ?>
	<?php if ($patient_services->sortUrl($patient_services->RequestNo) == "") { ?>
		<th data-name="RequestNo" class="<?php echo $patient_services->RequestNo->headerCellClass() ?>"><div id="elh_patient_services_RequestNo" class="patient_services_RequestNo"><div class="ew-table-header-caption"><script id="tpc_patient_services_RequestNo" class="patient_serviceslist" type="text/html"><span><?php echo $patient_services->RequestNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="RequestNo" class="<?php echo $patient_services->RequestNo->headerCellClass() ?>"><script id="tpc_patient_services_RequestNo" class="patient_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_services->SortUrl($patient_services->RequestNo) ?>',1);"><div id="elh_patient_services_RequestNo" class="patient_services_RequestNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->RequestNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->RequestNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_services_list->ListOptions->render("header", "right", "", "block", $patient_services->TableVar, "patient_serviceslist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_services->ExportAll && $patient_services->isExport()) {
	$patient_services_list->StopRec = $patient_services_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_services_list->TotalRecs > $patient_services_list->StartRec + $patient_services_list->DisplayRecs - 1)
		$patient_services_list->StopRec = $patient_services_list->StartRec + $patient_services_list->DisplayRecs - 1;
	else
		$patient_services_list->StopRec = $patient_services_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $patient_services_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_services_list->FormKeyCountName) && ($patient_services->isGridAdd() || $patient_services->isGridEdit() || $patient_services->isConfirm())) {
		$patient_services_list->KeyCount = $CurrentForm->getValue($patient_services_list->FormKeyCountName);
		$patient_services_list->StopRec = $patient_services_list->StartRec + $patient_services_list->KeyCount - 1;
	}
}
$patient_services_list->RecCnt = $patient_services_list->StartRec - 1;
if ($patient_services_list->Recordset && !$patient_services_list->Recordset->EOF) {
	$patient_services_list->Recordset->moveFirst();
	$selectLimit = $patient_services_list->UseSelectLimit;
	if (!$selectLimit && $patient_services_list->StartRec > 1)
		$patient_services_list->Recordset->move($patient_services_list->StartRec - 1);
} elseif (!$patient_services->AllowAddDeleteRow && $patient_services_list->StopRec == 0) {
	$patient_services_list->StopRec = $patient_services->GridAddRowCount;
}

// Initialize aggregate
$patient_services->RowType = ROWTYPE_AGGREGATEINIT;
$patient_services->resetAttributes();
$patient_services_list->renderRow();
if ($patient_services->isGridAdd())
	$patient_services_list->RowIndex = 0;
if ($patient_services->isGridEdit())
	$patient_services_list->RowIndex = 0;
while ($patient_services_list->RecCnt < $patient_services_list->StopRec) {
	$patient_services_list->RecCnt++;
	if ($patient_services_list->RecCnt >= $patient_services_list->StartRec) {
		$patient_services_list->RowCnt++;
		if ($patient_services->isGridAdd() || $patient_services->isGridEdit() || $patient_services->isConfirm()) {
			$patient_services_list->RowIndex++;
			$CurrentForm->Index = $patient_services_list->RowIndex;
			if ($CurrentForm->hasValue($patient_services_list->FormActionName) && $patient_services_list->EventCancelled)
				$patient_services_list->RowAction = strval($CurrentForm->getValue($patient_services_list->FormActionName));
			elseif ($patient_services->isGridAdd())
				$patient_services_list->RowAction = "insert";
			else
				$patient_services_list->RowAction = "";
		}

		// Set up key count
		$patient_services_list->KeyCount = $patient_services_list->RowIndex;

		// Init row class and style
		$patient_services->resetAttributes();
		$patient_services->CssClass = "";
		if ($patient_services->isGridAdd()) {
			$patient_services_list->loadRowValues(); // Load default values
		} else {
			$patient_services_list->loadRowValues($patient_services_list->Recordset); // Load row values
		}
		$patient_services->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_services->isGridAdd()) // Grid add
			$patient_services->RowType = ROWTYPE_ADD; // Render add
		if ($patient_services->isGridAdd() && $patient_services->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_services_list->restoreCurrentRowFormValues($patient_services_list->RowIndex); // Restore form values
		if ($patient_services->isGridEdit()) { // Grid edit
			if ($patient_services->EventCancelled)
				$patient_services_list->restoreCurrentRowFormValues($patient_services_list->RowIndex); // Restore form values
			if ($patient_services_list->RowAction == "insert")
				$patient_services->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_services->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_services->isGridEdit() && ($patient_services->RowType == ROWTYPE_EDIT || $patient_services->RowType == ROWTYPE_ADD) && $patient_services->EventCancelled) // Update failed
			$patient_services_list->restoreCurrentRowFormValues($patient_services_list->RowIndex); // Restore form values
		if ($patient_services->RowType == ROWTYPE_EDIT) // Edit row
			$patient_services_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$patient_services->RowAttrs = array_merge($patient_services->RowAttrs, array('data-rowindex'=>$patient_services_list->RowCnt, 'id'=>'r' . $patient_services_list->RowCnt . '_patient_services', 'data-rowtype'=>$patient_services->RowType));

		// Render row
		$patient_services_list->renderRow();

		// Render list options
		$patient_services_list->renderListOptions();

		// Save row and cell attributes
		$patient_services_list->Attrs[$patient_services_list->RowCnt] = array("row_attrs" => $patient_services->rowAttributes(), "cell_attrs" => array());
		$patient_services_list->Attrs[$patient_services_list->RowCnt]["cell_attrs"] = $patient_services->fieldCellAttributes();

		// Skip delete row / empty row for confirm page
		if ($patient_services_list->RowAction <> "delete" && $patient_services_list->RowAction <> "insertdelete" && !($patient_services_list->RowAction == "insert" && $patient_services->isConfirm() && $patient_services_list->emptyRow())) {
?>
	<tr<?php echo $patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_services_list->ListOptions->render("body", "left", $patient_services_list->RowCnt, "block", $patient_services->TableVar, "patient_serviceslist");
?>
	<?php if ($patient_services->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_services->id->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_id" class="patient_serviceslist" type="text/html"><span></span></script>
<input type="hidden" data-table="patient_services" data-field="x_id" name="o<?php echo $patient_services_list->RowIndex ?>_id" id="o<?php echo $patient_services_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_id" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_id" class="form-group patient_services_id">
<span<?php echo $patient_services->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_id" name="x<?php echo $patient_services_list->RowIndex ?>_id" id="x<?php echo $patient_services_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_id" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_id" class="patient_services_id">
<span<?php echo $patient_services->id->viewAttributes() ?>>
<?php echo $patient_services->id->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_services->Reception->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services->Reception->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Reception" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Reception" class="form-group patient_services_Reception">
<span<?php echo $patient_services->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Reception->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_Reception" name="x<?php echo $patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Reception" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Reception" class="form-group patient_services_Reception">
<input type="text" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_list->RowIndex ?>_Reception" id="x<?php echo $patient_services_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_services->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_services->Reception->EditValue ?>"<?php echo $patient_services->Reception->editAttributes() ?>>
</span>
</script>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="o<?php echo $patient_services_list->RowIndex ?>_Reception" id="o<?php echo $patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Reception" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Reception" class="form-group patient_services_Reception">
<span<?php echo $patient_services->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Reception->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_list->RowIndex ?>_Reception" id="x<?php echo $patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Reception" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Reception" class="patient_services_Reception">
<span<?php echo $patient_services->Reception->viewAttributes() ?>>
<?php echo $patient_services->Reception->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $patient_services->Services->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Services" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Services" class="form-group patient_services_Services">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_services_list->RowIndex ?>_Services" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_services_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_services_list->RowIndex ?>_Services" id="sv_x<?php echo $patient_services_list->RowIndex ?>_Services" value="<?php echo RemoveHtml($patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>"<?php echo $patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_list->RowIndex ?>_Services" id="x<?php echo $patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_services->Services->Lookup->getParamTag("p_x" . $patient_services_list->RowIndex . "_Services") ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
fpatient_serviceslist.createAutoSuggest({"id":"x<?php echo $patient_services_list->RowIndex ?>_Services","forceSelect":true});
</script>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="o<?php echo $patient_services_list->RowIndex ?>_Services" id="o<?php echo $patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Services" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Services" class="form-group patient_services_Services">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_services_list->RowIndex ?>_Services" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_services_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_services_list->RowIndex ?>_Services" id="sv_x<?php echo $patient_services_list->RowIndex ?>_Services" value="<?php echo RemoveHtml($patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>"<?php echo $patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_list->RowIndex ?>_Services" id="x<?php echo $patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_services->Services->Lookup->getParamTag("p_x" . $patient_services_list->RowIndex . "_Services") ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
fpatient_serviceslist.createAutoSuggest({"id":"x<?php echo $patient_services_list->RowIndex ?>_Services","forceSelect":true});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Services" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Services" class="patient_services_Services">
<span<?php echo $patient_services->Services->viewAttributes() ?>>
<?php echo $patient_services->Services->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $patient_services->amount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_amount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_amount" class="form-group patient_services_amount">
<input type="text" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_list->RowIndex ?>_amount" id="x<?php echo $patient_services_list->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services->amount->EditValue ?>"<?php echo $patient_services->amount->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="o<?php echo $patient_services_list->RowIndex ?>_amount" id="o<?php echo $patient_services_list->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services->amount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_amount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_amount" class="form-group patient_services_amount">
<input type="text" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_list->RowIndex ?>_amount" id="x<?php echo $patient_services_list->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services->amount->EditValue ?>"<?php echo $patient_services->amount->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_amount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_amount" class="patient_services_amount">
<span<?php echo $patient_services->amount->viewAttributes() ?>>
<?php echo $patient_services->amount->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->description->Visible) { // description ?>
		<td data-name="description"<?php echo $patient_services->description->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_description" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_description" class="form-group patient_services_description">
<input type="text" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_list->RowIndex ?>_description" id="x<?php echo $patient_services_list->RowIndex ?>_description" placeholder="<?php echo HtmlEncode($patient_services->description->getPlaceHolder()) ?>" value="<?php echo $patient_services->description->EditValue ?>"<?php echo $patient_services->description->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_description" name="o<?php echo $patient_services_list->RowIndex ?>_description" id="o<?php echo $patient_services_list->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services->description->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_description" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_description" class="form-group patient_services_description">
<input type="text" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_list->RowIndex ?>_description" id="x<?php echo $patient_services_list->RowIndex ?>_description" placeholder="<?php echo HtmlEncode($patient_services->description->getPlaceHolder()) ?>" value="<?php echo $patient_services->description->EditValue ?>"<?php echo $patient_services->description->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_description" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_description" class="patient_services_description">
<span<?php echo $patient_services->description->viewAttributes() ?>>
<?php echo $patient_services->description->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type"<?php echo $patient_services->patient_type->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_patient_type" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_patient_type" class="form-group patient_services_patient_type">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_list->RowIndex ?>_patient_type" id="x<?php echo $patient_services_list->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services->patient_type->EditValue ?>"<?php echo $patient_services->patient_type->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="o<?php echo $patient_services_list->RowIndex ?>_patient_type" id="o<?php echo $patient_services_list->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services->patient_type->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_patient_type" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_patient_type" class="form-group patient_services_patient_type">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_list->RowIndex ?>_patient_type" id="x<?php echo $patient_services_list->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services->patient_type->EditValue ?>"<?php echo $patient_services->patient_type->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_patient_type" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_patient_type" class="patient_services_patient_type">
<span<?php echo $patient_services->patient_type->viewAttributes() ?>>
<?php echo $patient_services->patient_type->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date"<?php echo $patient_services->charged_date->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="o<?php echo $patient_services_list->RowIndex ?>_charged_date" id="o<?php echo $patient_services_list->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_charged_date" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_charged_date" class="patient_services_charged_date">
<span<?php echo $patient_services->charged_date->viewAttributes() ?>>
<?php echo $patient_services->charged_date->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_services->status->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_status" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_status" class="form-group patient_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_services_list->RowIndex ?>_status" name="x<?php echo $patient_services_list->RowIndex ?>_status"<?php echo $patient_services->status->editAttributes() ?>>
		<?php echo $patient_services->status->selectOptionListHtml("x<?php echo $patient_services_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_services->status->Lookup->getParamTag("p_x" . $patient_services_list->RowIndex . "_status") ?>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_status" name="o<?php echo $patient_services_list->RowIndex ?>_status" id="o<?php echo $patient_services_list->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_status" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_status" class="form-group patient_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_services_list->RowIndex ?>_status" name="x<?php echo $patient_services_list->RowIndex ?>_status"<?php echo $patient_services->status->editAttributes() ?>>
		<?php echo $patient_services->status->selectOptionListHtml("x<?php echo $patient_services_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_services->status->Lookup->getParamTag("p_x" . $patient_services_list->RowIndex . "_status") ?>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_status" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_status" class="patient_services_status">
<span<?php echo $patient_services->status->viewAttributes() ?>>
<?php echo $patient_services->status->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_services->mrnno->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services->mrnno->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_mrnno" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_mrnno" class="form-group patient_services_mrnno">
<span<?php echo $patient_services->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->mrnno->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_mrnno" name="x<?php echo $patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_mrnno" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_mrnno" class="form-group patient_services_mrnno">
<input type="text" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_list->RowIndex ?>_mrnno" id="x<?php echo $patient_services_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_services->mrnno->EditValue ?>"<?php echo $patient_services->mrnno->editAttributes() ?>>
</span>
</script>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="o<?php echo $patient_services_list->RowIndex ?>_mrnno" id="o<?php echo $patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_mrnno" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_mrnno" class="form-group patient_services_mrnno">
<span<?php echo $patient_services->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->mrnno->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_list->RowIndex ?>_mrnno" id="x<?php echo $patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_mrnno" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_mrnno" class="patient_services_mrnno">
<span<?php echo $patient_services->mrnno->viewAttributes() ?>>
<?php echo $patient_services->mrnno->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_services->PatientName->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientName" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientName" class="form-group patient_services_PatientName">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_list->RowIndex ?>_PatientName" id="x<?php echo $patient_services_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientName->EditValue ?>"<?php echo $patient_services->PatientName->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="o<?php echo $patient_services_list->RowIndex ?>_PatientName" id="o<?php echo $patient_services_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientName" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientName" class="form-group patient_services_PatientName">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_list->RowIndex ?>_PatientName" id="x<?php echo $patient_services_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientName->EditValue ?>"<?php echo $patient_services->PatientName->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientName" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientName" class="patient_services_PatientName">
<span<?php echo $patient_services->PatientName->viewAttributes() ?>>
<?php echo $patient_services->PatientName->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_services->Age->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Age" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Age" class="form-group patient_services_Age">
<input type="text" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_list->RowIndex ?>_Age" id="x<?php echo $patient_services_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services->Age->EditValue ?>"<?php echo $patient_services->Age->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="o<?php echo $patient_services_list->RowIndex ?>_Age" id="o<?php echo $patient_services_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Age" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Age" class="form-group patient_services_Age">
<input type="text" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_list->RowIndex ?>_Age" id="x<?php echo $patient_services_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services->Age->EditValue ?>"<?php echo $patient_services->Age->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Age" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Age" class="patient_services_Age">
<span<?php echo $patient_services->Age->viewAttributes() ?>>
<?php echo $patient_services->Age->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_services->Gender->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Gender" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Gender" class="form-group patient_services_Gender">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_list->RowIndex ?>_Gender" id="x<?php echo $patient_services_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services->Gender->EditValue ?>"<?php echo $patient_services->Gender->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="o<?php echo $patient_services_list->RowIndex ?>_Gender" id="o<?php echo $patient_services_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Gender" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Gender" class="form-group patient_services_Gender">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_list->RowIndex ?>_Gender" id="x<?php echo $patient_services_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services->Gender->EditValue ?>"<?php echo $patient_services->Gender->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Gender" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Gender" class="patient_services_Gender">
<span<?php echo $patient_services->Gender->viewAttributes() ?>>
<?php echo $patient_services->Gender->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Unit->Visible) { // Unit ?>
		<td data-name="Unit"<?php echo $patient_services->Unit->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Unit" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Unit" class="form-group patient_services_Unit">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_list->RowIndex ?>_Unit" id="x<?php echo $patient_services_list->RowIndex ?>_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services->Unit->EditValue ?>"<?php echo $patient_services->Unit->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="o<?php echo $patient_services_list->RowIndex ?>_Unit" id="o<?php echo $patient_services_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services->Unit->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Unit" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Unit" class="form-group patient_services_Unit">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_list->RowIndex ?>_Unit" id="x<?php echo $patient_services_list->RowIndex ?>_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services->Unit->EditValue ?>"<?php echo $patient_services->Unit->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Unit" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Unit" class="patient_services_Unit">
<span<?php echo $patient_services->Unit->viewAttributes() ?>>
<?php echo $patient_services->Unit->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $patient_services->Quantity->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Quantity" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Quantity" class="form-group patient_services_Quantity">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_list->RowIndex ?>_Quantity" id="x<?php echo $patient_services_list->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services->Quantity->EditValue ?>"<?php echo $patient_services->Quantity->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="o<?php echo $patient_services_list->RowIndex ?>_Quantity" id="o<?php echo $patient_services_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Quantity" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Quantity" class="form-group patient_services_Quantity">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_list->RowIndex ?>_Quantity" id="x<?php echo $patient_services_list->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services->Quantity->EditValue ?>"<?php echo $patient_services->Quantity->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Quantity" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Quantity" class="patient_services_Quantity">
<span<?php echo $patient_services->Quantity->viewAttributes() ?>>
<?php echo $patient_services->Quantity->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Discount->Visible) { // Discount ?>
		<td data-name="Discount"<?php echo $patient_services->Discount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Discount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Discount" class="form-group patient_services_Discount">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_list->RowIndex ?>_Discount" id="x<?php echo $patient_services_list->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services->Discount->EditValue ?>"<?php echo $patient_services->Discount->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="o<?php echo $patient_services_list->RowIndex ?>_Discount" id="o<?php echo $patient_services_list->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services->Discount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Discount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Discount" class="form-group patient_services_Discount">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_list->RowIndex ?>_Discount" id="x<?php echo $patient_services_list->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services->Discount->EditValue ?>"<?php echo $patient_services->Discount->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Discount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Discount" class="patient_services_Discount">
<span<?php echo $patient_services->Discount->viewAttributes() ?>>
<?php echo $patient_services->Discount->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal"<?php echo $patient_services->SubTotal->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SubTotal" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SubTotal" class="form-group patient_services_SubTotal">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_list->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_list->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services->SubTotal->EditValue ?>"<?php echo $patient_services->SubTotal->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="o<?php echo $patient_services_list->RowIndex ?>_SubTotal" id="o<?php echo $patient_services_list->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SubTotal" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SubTotal" class="form-group patient_services_SubTotal">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_list->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_list->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services->SubTotal->EditValue ?>"<?php echo $patient_services->SubTotal->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SubTotal" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SubTotal" class="patient_services_SubTotal">
<span<?php echo $patient_services->SubTotal->viewAttributes() ?>>
<?php echo $patient_services->SubTotal->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ServiceSelect->Visible) { // ServiceSelect ?>
		<td data-name="ServiceSelect"<?php echo $patient_services->ServiceSelect->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ServiceSelect" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ServiceSelect" class="form-group patient_services_ServiceSelect">
<div id="tp_x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" id="x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" value="{value}"<?php echo $patient_services->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services->ServiceSelect->checkBoxListHtml(FALSE, "x{$patient_services_list->RowIndex}_ServiceSelect[]") ?>
</div></div>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="o<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" id="o<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" value="<?php echo HtmlEncode($patient_services->ServiceSelect->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ServiceSelect" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ServiceSelect" class="form-group patient_services_ServiceSelect">
<div id="tp_x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" id="x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" value="{value}"<?php echo $patient_services->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services->ServiceSelect->checkBoxListHtml(FALSE, "x{$patient_services_list->RowIndex}_ServiceSelect[]") ?>
</div></div>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ServiceSelect" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
<span<?php echo $patient_services->ServiceSelect->viewAttributes() ?>>
<?php echo $patient_services->ServiceSelect->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Aid->Visible) { // Aid ?>
		<td data-name="Aid"<?php echo $patient_services->Aid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Aid" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Aid" class="form-group patient_services_Aid">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_list->RowIndex ?>_Aid" id="x<?php echo $patient_services_list->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Aid->EditValue ?>"<?php echo $patient_services->Aid->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="o<?php echo $patient_services_list->RowIndex ?>_Aid" id="o<?php echo $patient_services_list->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services->Aid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Aid" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Aid" class="form-group patient_services_Aid">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_list->RowIndex ?>_Aid" id="x<?php echo $patient_services_list->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Aid->EditValue ?>"<?php echo $patient_services->Aid->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Aid" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Aid" class="patient_services_Aid">
<span<?php echo $patient_services->Aid->viewAttributes() ?>>
<?php echo $patient_services->Aid->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Vid->Visible) { // Vid ?>
		<td data-name="Vid"<?php echo $patient_services->Vid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services->Vid->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Vid" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Vid" class="form-group patient_services_Vid">
<span<?php echo $patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Vid->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_Vid" name="x<?php echo $patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Vid" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Vid" class="form-group patient_services_Vid">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_list->RowIndex ?>_Vid" id="x<?php echo $patient_services_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Vid->EditValue ?>"<?php echo $patient_services->Vid->editAttributes() ?>>
</span>
</script>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="o<?php echo $patient_services_list->RowIndex ?>_Vid" id="o<?php echo $patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_services->Vid->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Vid" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Vid" class="form-group patient_services_Vid">
<span<?php echo $patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Vid->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_Vid" name="x<?php echo $patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Vid" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Vid" class="form-group patient_services_Vid">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_list->RowIndex ?>_Vid" id="x<?php echo $patient_services_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Vid->EditValue ?>"<?php echo $patient_services->Vid->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Vid" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Vid" class="patient_services_Vid">
<span<?php echo $patient_services->Vid->viewAttributes() ?>>
<?php echo $patient_services->Vid->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $patient_services->DrID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrID" class="form-group patient_services_DrID">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_list->RowIndex ?>_DrID" id="x<?php echo $patient_services_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrID->EditValue ?>"<?php echo $patient_services->DrID->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="o<?php echo $patient_services_list->RowIndex ?>_DrID" id="o<?php echo $patient_services_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services->DrID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrID" class="form-group patient_services_DrID">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_list->RowIndex ?>_DrID" id="x<?php echo $patient_services_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrID->EditValue ?>"<?php echo $patient_services->DrID->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrID" class="patient_services_DrID">
<span<?php echo $patient_services->DrID->viewAttributes() ?>>
<?php echo $patient_services->DrID->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE"<?php echo $patient_services->DrCODE->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrCODE" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrCODE" class="form-group patient_services_DrCODE">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_list->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrCODE->EditValue ?>"<?php echo $patient_services->DrCODE->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="o<?php echo $patient_services_list->RowIndex ?>_DrCODE" id="o<?php echo $patient_services_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrCODE" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrCODE" class="form-group patient_services_DrCODE">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_list->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrCODE->EditValue ?>"<?php echo $patient_services->DrCODE->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrCODE" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrCODE" class="patient_services_DrCODE">
<span<?php echo $patient_services->DrCODE->viewAttributes() ?>>
<?php echo $patient_services->DrCODE->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $patient_services->DrName->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrName" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrName" class="form-group patient_services_DrName">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_list->RowIndex ?>_DrName" id="x<?php echo $patient_services_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrName->EditValue ?>"<?php echo $patient_services->DrName->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="o<?php echo $patient_services_list->RowIndex ?>_DrName" id="o<?php echo $patient_services_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services->DrName->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrName" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrName" class="form-group patient_services_DrName">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_list->RowIndex ?>_DrName" id="x<?php echo $patient_services_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrName->EditValue ?>"<?php echo $patient_services->DrName->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrName" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrName" class="patient_services_DrName">
<span<?php echo $patient_services->DrName->viewAttributes() ?>>
<?php echo $patient_services->DrName->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $patient_services->Department->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Department" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Department" class="form-group patient_services_Department">
<input type="text" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_list->RowIndex ?>_Department" id="x<?php echo $patient_services_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Department->EditValue ?>"<?php echo $patient_services->Department->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="o<?php echo $patient_services_list->RowIndex ?>_Department" id="o<?php echo $patient_services_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services->Department->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Department" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Department" class="form-group patient_services_Department">
<input type="text" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_list->RowIndex ?>_Department" id="x<?php echo $patient_services_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Department->EditValue ?>"<?php echo $patient_services->Department->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Department" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Department" class="patient_services_Department">
<span<?php echo $patient_services->Department->viewAttributes() ?>>
<?php echo $patient_services->Department->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres"<?php echo $patient_services->DrSharePres->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrSharePres" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrSharePres" class="form-group patient_services_DrSharePres">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_list->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_list->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrSharePres->EditValue ?>"<?php echo $patient_services->DrSharePres->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="o<?php echo $patient_services_list->RowIndex ?>_DrSharePres" id="o<?php echo $patient_services_list->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services->DrSharePres->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrSharePres" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrSharePres" class="form-group patient_services_DrSharePres">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_list->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_list->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrSharePres->EditValue ?>"<?php echo $patient_services->DrSharePres->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrSharePres" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrSharePres" class="patient_services_DrSharePres">
<span<?php echo $patient_services->DrSharePres->viewAttributes() ?>>
<?php echo $patient_services->DrSharePres->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres"<?php echo $patient_services->HospSharePres->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_HospSharePres" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_HospSharePres" class="form-group patient_services_HospSharePres">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_list->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_list->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospSharePres->EditValue ?>"<?php echo $patient_services->HospSharePres->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="o<?php echo $patient_services_list->RowIndex ?>_HospSharePres" id="o<?php echo $patient_services_list->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services->HospSharePres->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_HospSharePres" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_HospSharePres" class="form-group patient_services_HospSharePres">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_list->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_list->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospSharePres->EditValue ?>"<?php echo $patient_services->HospSharePres->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_HospSharePres" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_HospSharePres" class="patient_services_HospSharePres">
<span<?php echo $patient_services->HospSharePres->viewAttributes() ?>>
<?php echo $patient_services->HospSharePres->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount"<?php echo $patient_services->DrShareAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareAmount" class="form-group patient_services_DrShareAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareAmount->EditValue ?>"<?php echo $patient_services->DrShareAmount->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="o<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" id="o<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareAmount" class="form-group patient_services_DrShareAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareAmount->EditValue ?>"<?php echo $patient_services->DrShareAmount->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
<span<?php echo $patient_services->DrShareAmount->viewAttributes() ?>>
<?php echo $patient_services->DrShareAmount->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount"<?php echo $patient_services->HospShareAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_HospShareAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_HospShareAmount" class="form-group patient_services_HospShareAmount">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospShareAmount->EditValue ?>"<?php echo $patient_services->HospShareAmount->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="o<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" id="o<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_HospShareAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_HospShareAmount" class="form-group patient_services_HospShareAmount">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospShareAmount->EditValue ?>"<?php echo $patient_services->HospShareAmount->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_HospShareAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
<span<?php echo $patient_services->HospShareAmount->viewAttributes() ?>>
<?php echo $patient_services->HospShareAmount->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount"<?php echo $patient_services->DrShareSettiledAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledAmount" class="form-group patient_services_DrShareSettiledAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledAmount" class="form-group patient_services_DrShareSettiledAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
<span<?php echo $patient_services->DrShareSettiledAmount->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettiledAmount->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId"<?php echo $patient_services->DrShareSettledId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettledId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettledId" class="form-group patient_services_DrShareSettledId">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettledId->EditValue ?>"<?php echo $patient_services->DrShareSettledId->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" id="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettledId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettledId" class="form-group patient_services_DrShareSettledId">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettledId->EditValue ?>"<?php echo $patient_services->DrShareSettledId->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettledId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
<span<?php echo $patient_services->DrShareSettledId->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettledId->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus"<?php echo $patient_services->DrShareSettiledStatus->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledStatus" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledStatus" class="form-group patient_services_DrShareSettiledStatus">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledStatus" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledStatus" class="form-group patient_services_DrShareSettiledStatus">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledStatus" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
<span<?php echo $patient_services->DrShareSettiledStatus->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettiledStatus->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId"<?php echo $patient_services->invoiceId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceId" class="form-group patient_services_invoiceId">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceId->EditValue ?>"<?php echo $patient_services->invoiceId->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="o<?php echo $patient_services_list->RowIndex ?>_invoiceId" id="o<?php echo $patient_services_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceId" class="form-group patient_services_invoiceId">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceId->EditValue ?>"<?php echo $patient_services->invoiceId->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceId" class="patient_services_invoiceId">
<span<?php echo $patient_services->invoiceId->viewAttributes() ?>>
<?php echo $patient_services->invoiceId->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount"<?php echo $patient_services->invoiceAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceAmount" class="form-group patient_services_invoiceAmount">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceAmount->EditValue ?>"<?php echo $patient_services->invoiceAmount->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="o<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" id="o<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceAmount" class="form-group patient_services_invoiceAmount">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceAmount->EditValue ?>"<?php echo $patient_services->invoiceAmount->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceAmount" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
<span<?php echo $patient_services->invoiceAmount->viewAttributes() ?>>
<?php echo $patient_services->invoiceAmount->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus"<?php echo $patient_services->invoiceStatus->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceStatus" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceStatus" class="form-group patient_services_invoiceStatus">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceStatus->EditValue ?>"<?php echo $patient_services->invoiceStatus->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="o<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" id="o<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceStatus" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceStatus" class="form-group patient_services_invoiceStatus">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceStatus->EditValue ?>"<?php echo $patient_services->invoiceStatus->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceStatus" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
<span<?php echo $patient_services->invoiceStatus->viewAttributes() ?>>
<?php echo $patient_services->invoiceStatus->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment"<?php echo $patient_services->modeOfPayment->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_modeOfPayment" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_modeOfPayment" class="form-group patient_services_modeOfPayment">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services->modeOfPayment->EditValue ?>"<?php echo $patient_services->modeOfPayment->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="o<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" id="o<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_modeOfPayment" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_modeOfPayment" class="form-group patient_services_modeOfPayment">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services->modeOfPayment->EditValue ?>"<?php echo $patient_services->modeOfPayment->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_modeOfPayment" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
<span<?php echo $patient_services->modeOfPayment->viewAttributes() ?>>
<?php echo $patient_services->modeOfPayment->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_services->HospID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="o<?php echo $patient_services_list->RowIndex ?>_HospID" id="o<?php echo $patient_services_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_HospID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_HospID" class="patient_services_HospID">
<span<?php echo $patient_services->HospID->viewAttributes() ?>>
<?php echo $patient_services->HospID->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $patient_services->RIDNO->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RIDNO" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RIDNO" class="form-group patient_services_RIDNO">
<input type="text" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_list->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_list->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($patient_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $patient_services->RIDNO->EditValue ?>"<?php echo $patient_services->RIDNO->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="o<?php echo $patient_services_list->RowIndex ?>_RIDNO" id="o<?php echo $patient_services_list->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RIDNO" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RIDNO" class="form-group patient_services_RIDNO">
<span<?php echo $patient_services->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->RIDNO->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_list->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_list->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services->RIDNO->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RIDNO" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RIDNO" class="patient_services_RIDNO">
<span<?php echo $patient_services->RIDNO->viewAttributes() ?>>
<?php echo $patient_services->RIDNO->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $patient_services->TidNo->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TidNo" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TidNo" class="form-group patient_services_TidNo">
<input type="text" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_list->RowIndex ?>_TidNo" id="x<?php echo $patient_services_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($patient_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $patient_services->TidNo->EditValue ?>"<?php echo $patient_services->TidNo->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="o<?php echo $patient_services_list->RowIndex ?>_TidNo" id="o<?php echo $patient_services_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TidNo" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TidNo" class="form-group patient_services_TidNo">
<span<?php echo $patient_services->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->TidNo->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_list->RowIndex ?>_TidNo" id="x<?php echo $patient_services_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services->TidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TidNo" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TidNo" class="patient_services_TidNo">
<span<?php echo $patient_services->TidNo->viewAttributes() ?>>
<?php echo $patient_services->TidNo->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory"<?php echo $patient_services->DiscountCategory->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DiscountCategory" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DiscountCategory" class="form-group patient_services_DiscountCategory">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services->DiscountCategory->EditValue ?>"<?php echo $patient_services->DiscountCategory->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="o<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" id="o<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DiscountCategory" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DiscountCategory" class="form-group patient_services_DiscountCategory">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services->DiscountCategory->EditValue ?>"<?php echo $patient_services->DiscountCategory->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DiscountCategory" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
<span<?php echo $patient_services->DiscountCategory->viewAttributes() ?>>
<?php echo $patient_services->DiscountCategory->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $patient_services->sid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_sid" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_sid" class="form-group patient_services_sid">
<input type="text" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_list->RowIndex ?>_sid" id="x<?php echo $patient_services_list->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services->sid->EditValue ?>"<?php echo $patient_services->sid->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="o<?php echo $patient_services_list->RowIndex ?>_sid" id="o<?php echo $patient_services_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services->sid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_sid" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_sid" class="form-group patient_services_sid">
<input type="text" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_list->RowIndex ?>_sid" id="x<?php echo $patient_services_list->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services->sid->EditValue ?>"<?php echo $patient_services->sid->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_sid" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_sid" class="patient_services_sid">
<span<?php echo $patient_services->sid->viewAttributes() ?>>
<?php echo $patient_services->sid->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $patient_services->ItemCode->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ItemCode" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ItemCode" class="form-group patient_services_ItemCode">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_list->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_list->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services->ItemCode->EditValue ?>"<?php echo $patient_services->ItemCode->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="o<?php echo $patient_services_list->RowIndex ?>_ItemCode" id="o<?php echo $patient_services_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ItemCode" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ItemCode" class="form-group patient_services_ItemCode">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_list->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_list->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services->ItemCode->EditValue ?>"<?php echo $patient_services->ItemCode->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ItemCode" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ItemCode" class="patient_services_ItemCode">
<span<?php echo $patient_services->ItemCode->viewAttributes() ?>>
<?php echo $patient_services->ItemCode->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd"<?php echo $patient_services->TestSubCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestSubCd" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestSubCd" class="form-group patient_services_TestSubCd">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_list->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestSubCd->EditValue ?>"<?php echo $patient_services->TestSubCd->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="o<?php echo $patient_services_list->RowIndex ?>_TestSubCd" id="o<?php echo $patient_services_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestSubCd" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestSubCd" class="form-group patient_services_TestSubCd">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_list->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestSubCd->EditValue ?>"<?php echo $patient_services->TestSubCd->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestSubCd" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestSubCd" class="patient_services_TestSubCd">
<span<?php echo $patient_services->TestSubCd->viewAttributes() ?>>
<?php echo $patient_services->TestSubCd->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $patient_services->DEptCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DEptCd" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DEptCd" class="form-group patient_services_DEptCd">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_list->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->DEptCd->EditValue ?>"<?php echo $patient_services->DEptCd->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="o<?php echo $patient_services_list->RowIndex ?>_DEptCd" id="o<?php echo $patient_services_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DEptCd" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DEptCd" class="form-group patient_services_DEptCd">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_list->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->DEptCd->EditValue ?>"<?php echo $patient_services->DEptCd->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DEptCd" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DEptCd" class="patient_services_DEptCd">
<span<?php echo $patient_services->DEptCd->viewAttributes() ?>>
<?php echo $patient_services->DEptCd->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd"<?php echo $patient_services->ProfCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ProfCd" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ProfCd" class="form-group patient_services_ProfCd">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_list->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_list->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->ProfCd->EditValue ?>"<?php echo $patient_services->ProfCd->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="o<?php echo $patient_services_list->RowIndex ?>_ProfCd" id="o<?php echo $patient_services_list->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ProfCd" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ProfCd" class="form-group patient_services_ProfCd">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_list->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_list->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->ProfCd->EditValue ?>"<?php echo $patient_services->ProfCd->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ProfCd" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ProfCd" class="patient_services_ProfCd">
<span<?php echo $patient_services->ProfCd->viewAttributes() ?>>
<?php echo $patient_services->ProfCd->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Comments->Visible) { // Comments ?>
		<td data-name="Comments"<?php echo $patient_services->Comments->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Comments" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Comments" class="form-group patient_services_Comments">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_list->RowIndex ?>_Comments" id="x<?php echo $patient_services_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services->Comments->EditValue ?>"<?php echo $patient_services->Comments->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="o<?php echo $patient_services_list->RowIndex ?>_Comments" id="o<?php echo $patient_services_list->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services->Comments->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Comments" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Comments" class="form-group patient_services_Comments">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_list->RowIndex ?>_Comments" id="x<?php echo $patient_services_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services->Comments->EditValue ?>"<?php echo $patient_services->Comments->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Comments" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Comments" class="patient_services_Comments">
<span<?php echo $patient_services->Comments->viewAttributes() ?>>
<?php echo $patient_services->Comments->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $patient_services->Method->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Method" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Method" class="form-group patient_services_Method">
<input type="text" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_list->RowIndex ?>_Method" id="x<?php echo $patient_services_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services->Method->EditValue ?>"<?php echo $patient_services->Method->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="o<?php echo $patient_services_list->RowIndex ?>_Method" id="o<?php echo $patient_services_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services->Method->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Method" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Method" class="form-group patient_services_Method">
<input type="text" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_list->RowIndex ?>_Method" id="x<?php echo $patient_services_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services->Method->EditValue ?>"<?php echo $patient_services->Method->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Method" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Method" class="patient_services_Method">
<span<?php echo $patient_services->Method->viewAttributes() ?>>
<?php echo $patient_services->Method->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen"<?php echo $patient_services->Specimen->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Specimen" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Specimen" class="form-group patient_services_Specimen">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_list->RowIndex ?>_Specimen" id="x<?php echo $patient_services_list->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services->Specimen->EditValue ?>"<?php echo $patient_services->Specimen->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="o<?php echo $patient_services_list->RowIndex ?>_Specimen" id="o<?php echo $patient_services_list->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Specimen" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Specimen" class="form-group patient_services_Specimen">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_list->RowIndex ?>_Specimen" id="x<?php echo $patient_services_list->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services->Specimen->EditValue ?>"<?php echo $patient_services->Specimen->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Specimen" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Specimen" class="patient_services_Specimen">
<span<?php echo $patient_services->Specimen->viewAttributes() ?>>
<?php echo $patient_services->Specimen->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal"<?php echo $patient_services->Abnormal->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Abnormal" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Abnormal" class="form-group patient_services_Abnormal">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_list->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_list->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services->Abnormal->EditValue ?>"<?php echo $patient_services->Abnormal->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="o<?php echo $patient_services_list->RowIndex ?>_Abnormal" id="o<?php echo $patient_services_list->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Abnormal" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Abnormal" class="form-group patient_services_Abnormal">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_list->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_list->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services->Abnormal->EditValue ?>"<?php echo $patient_services->Abnormal->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Abnormal" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Abnormal" class="patient_services_Abnormal">
<span<?php echo $patient_services->Abnormal->viewAttributes() ?>>
<?php echo $patient_services->Abnormal->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit"<?php echo $patient_services->TestUnit->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestUnit" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestUnit" class="form-group patient_services_TestUnit">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_list->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_list->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestUnit->EditValue ?>"<?php echo $patient_services->TestUnit->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="o<?php echo $patient_services_list->RowIndex ?>_TestUnit" id="o<?php echo $patient_services_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestUnit" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestUnit" class="form-group patient_services_TestUnit">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_list->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_list->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestUnit->EditValue ?>"<?php echo $patient_services->TestUnit->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestUnit" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestUnit" class="patient_services_TestUnit">
<span<?php echo $patient_services->TestUnit->viewAttributes() ?>>
<?php echo $patient_services->TestUnit->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH"<?php echo $patient_services->LOWHIGH->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_LOWHIGH" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_LOWHIGH" class="form-group patient_services_LOWHIGH">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services->LOWHIGH->EditValue ?>"<?php echo $patient_services->LOWHIGH->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="o<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" id="o<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_LOWHIGH" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_LOWHIGH" class="form-group patient_services_LOWHIGH">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services->LOWHIGH->EditValue ?>"<?php echo $patient_services->LOWHIGH->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_LOWHIGH" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
<span<?php echo $patient_services->LOWHIGH->viewAttributes() ?>>
<?php echo $patient_services->LOWHIGH->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Branch->Visible) { // Branch ?>
		<td data-name="Branch"<?php echo $patient_services->Branch->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Branch" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Branch" class="form-group patient_services_Branch">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_list->RowIndex ?>_Branch" id="x<?php echo $patient_services_list->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Branch->EditValue ?>"<?php echo $patient_services->Branch->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="o<?php echo $patient_services_list->RowIndex ?>_Branch" id="o<?php echo $patient_services_list->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services->Branch->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Branch" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Branch" class="form-group patient_services_Branch">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_list->RowIndex ?>_Branch" id="x<?php echo $patient_services_list->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Branch->EditValue ?>"<?php echo $patient_services->Branch->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Branch" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Branch" class="patient_services_Branch">
<span<?php echo $patient_services->Branch->viewAttributes() ?>>
<?php echo $patient_services->Branch->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch"<?php echo $patient_services->Dispatch->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Dispatch" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Dispatch" class="form-group patient_services_Dispatch">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_list->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_list->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Dispatch->EditValue ?>"<?php echo $patient_services->Dispatch->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="o<?php echo $patient_services_list->RowIndex ?>_Dispatch" id="o<?php echo $patient_services_list->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Dispatch" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Dispatch" class="form-group patient_services_Dispatch">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_list->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_list->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Dispatch->EditValue ?>"<?php echo $patient_services->Dispatch->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Dispatch" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Dispatch" class="patient_services_Dispatch">
<span<?php echo $patient_services->Dispatch->viewAttributes() ?>>
<?php echo $patient_services->Dispatch->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1"<?php echo $patient_services->Pic1->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic1" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic1" class="form-group patient_services_Pic1">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_list->RowIndex ?>_Pic1" id="x<?php echo $patient_services_list->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic1->EditValue ?>"<?php echo $patient_services->Pic1->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="o<?php echo $patient_services_list->RowIndex ?>_Pic1" id="o<?php echo $patient_services_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic1" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic1" class="form-group patient_services_Pic1">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_list->RowIndex ?>_Pic1" id="x<?php echo $patient_services_list->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic1->EditValue ?>"<?php echo $patient_services->Pic1->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic1" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic1" class="patient_services_Pic1">
<span<?php echo $patient_services->Pic1->viewAttributes() ?>>
<?php echo $patient_services->Pic1->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2"<?php echo $patient_services->Pic2->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic2" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic2" class="form-group patient_services_Pic2">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_list->RowIndex ?>_Pic2" id="x<?php echo $patient_services_list->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic2->EditValue ?>"<?php echo $patient_services->Pic2->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="o<?php echo $patient_services_list->RowIndex ?>_Pic2" id="o<?php echo $patient_services_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic2" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic2" class="form-group patient_services_Pic2">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_list->RowIndex ?>_Pic2" id="x<?php echo $patient_services_list->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic2->EditValue ?>"<?php echo $patient_services->Pic2->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic2" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Pic2" class="patient_services_Pic2">
<span<?php echo $patient_services->Pic2->viewAttributes() ?>>
<?php echo $patient_services->Pic2->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath"<?php echo $patient_services->GraphPath->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_GraphPath" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_GraphPath" class="form-group patient_services_GraphPath">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_list->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_list->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services->GraphPath->EditValue ?>"<?php echo $patient_services->GraphPath->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="o<?php echo $patient_services_list->RowIndex ?>_GraphPath" id="o<?php echo $patient_services_list->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_GraphPath" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_GraphPath" class="form-group patient_services_GraphPath">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_list->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_list->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services->GraphPath->EditValue ?>"<?php echo $patient_services->GraphPath->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_GraphPath" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_GraphPath" class="patient_services_GraphPath">
<span<?php echo $patient_services->GraphPath->viewAttributes() ?>>
<?php echo $patient_services->GraphPath->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD"<?php echo $patient_services->MachineCD->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_MachineCD" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_MachineCD" class="form-group patient_services_MachineCD">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_list->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_list->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services->MachineCD->EditValue ?>"<?php echo $patient_services->MachineCD->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="o<?php echo $patient_services_list->RowIndex ?>_MachineCD" id="o<?php echo $patient_services_list->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_MachineCD" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_MachineCD" class="form-group patient_services_MachineCD">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_list->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_list->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services->MachineCD->EditValue ?>"<?php echo $patient_services->MachineCD->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_MachineCD" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_MachineCD" class="patient_services_MachineCD">
<span<?php echo $patient_services->MachineCD->viewAttributes() ?>>
<?php echo $patient_services->MachineCD->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel"<?php echo $patient_services->TestCancel->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestCancel" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestCancel" class="form-group patient_services_TestCancel">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_list->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_list->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestCancel->EditValue ?>"<?php echo $patient_services->TestCancel->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="o<?php echo $patient_services_list->RowIndex ?>_TestCancel" id="o<?php echo $patient_services_list->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestCancel" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestCancel" class="form-group patient_services_TestCancel">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_list->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_list->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestCancel->EditValue ?>"<?php echo $patient_services->TestCancel->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestCancel" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestCancel" class="patient_services_TestCancel">
<span<?php echo $patient_services->TestCancel->viewAttributes() ?>>
<?php echo $patient_services->TestCancel->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource"<?php echo $patient_services->OutSource->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_OutSource" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_OutSource" class="form-group patient_services_OutSource">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_list->RowIndex ?>_OutSource" id="x<?php echo $patient_services_list->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services->OutSource->EditValue ?>"<?php echo $patient_services->OutSource->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="o<?php echo $patient_services_list->RowIndex ?>_OutSource" id="o<?php echo $patient_services_list->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_OutSource" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_OutSource" class="form-group patient_services_OutSource">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_list->RowIndex ?>_OutSource" id="x<?php echo $patient_services_list->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services->OutSource->EditValue ?>"<?php echo $patient_services->OutSource->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_OutSource" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_OutSource" class="patient_services_OutSource">
<span<?php echo $patient_services->OutSource->viewAttributes() ?>>
<?php echo $patient_services->OutSource->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Printed->Visible) { // Printed ?>
		<td data-name="Printed"<?php echo $patient_services->Printed->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Printed" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Printed" class="form-group patient_services_Printed">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_list->RowIndex ?>_Printed" id="x<?php echo $patient_services_list->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services->Printed->EditValue ?>"<?php echo $patient_services->Printed->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="o<?php echo $patient_services_list->RowIndex ?>_Printed" id="o<?php echo $patient_services_list->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services->Printed->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Printed" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Printed" class="form-group patient_services_Printed">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_list->RowIndex ?>_Printed" id="x<?php echo $patient_services_list->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services->Printed->EditValue ?>"<?php echo $patient_services->Printed->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Printed" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Printed" class="patient_services_Printed">
<span<?php echo $patient_services->Printed->viewAttributes() ?>>
<?php echo $patient_services->Printed->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy"<?php echo $patient_services->PrintBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintBy" class="form-group patient_services_PrintBy">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_list->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_list->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintBy->EditValue ?>"<?php echo $patient_services->PrintBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="o<?php echo $patient_services_list->RowIndex ?>_PrintBy" id="o<?php echo $patient_services_list->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintBy" class="form-group patient_services_PrintBy">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_list->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_list->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintBy->EditValue ?>"<?php echo $patient_services->PrintBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintBy" class="patient_services_PrintBy">
<span<?php echo $patient_services->PrintBy->viewAttributes() ?>>
<?php echo $patient_services->PrintBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate"<?php echo $patient_services->PrintDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintDate" class="form-group patient_services_PrintDate">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_list->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintDate->EditValue ?>"<?php echo $patient_services->PrintDate->editAttributes() ?>>
<?php if (!$patient_services->PrintDate->ReadOnly && !$patient_services->PrintDate->Disabled && !isset($patient_services->PrintDate->EditAttrs["readonly"]) && !isset($patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="o<?php echo $patient_services_list->RowIndex ?>_PrintDate" id="o<?php echo $patient_services_list->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintDate" class="form-group patient_services_PrintDate">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_list->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintDate->EditValue ?>"<?php echo $patient_services->PrintDate->editAttributes() ?>>
<?php if (!$patient_services->PrintDate->ReadOnly && !$patient_services->PrintDate->Disabled && !isset($patient_services->PrintDate->EditAttrs["readonly"]) && !isset($patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PrintDate" class="patient_services_PrintDate">
<span<?php echo $patient_services->PrintDate->viewAttributes() ?>>
<?php echo $patient_services->PrintDate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate"<?php echo $patient_services->BillingDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_BillingDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_BillingDate" class="form-group patient_services_BillingDate">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_list->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_list->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillingDate->EditValue ?>"<?php echo $patient_services->BillingDate->editAttributes() ?>>
<?php if (!$patient_services->BillingDate->ReadOnly && !$patient_services->BillingDate->Disabled && !isset($patient_services->BillingDate->EditAttrs["readonly"]) && !isset($patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="o<?php echo $patient_services_list->RowIndex ?>_BillingDate" id="o<?php echo $patient_services_list->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services->BillingDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_BillingDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_BillingDate" class="form-group patient_services_BillingDate">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_list->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_list->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillingDate->EditValue ?>"<?php echo $patient_services->BillingDate->editAttributes() ?>>
<?php if (!$patient_services->BillingDate->ReadOnly && !$patient_services->BillingDate->Disabled && !isset($patient_services->BillingDate->EditAttrs["readonly"]) && !isset($patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_BillingDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_BillingDate" class="patient_services_BillingDate">
<span<?php echo $patient_services->BillingDate->viewAttributes() ?>>
<?php echo $patient_services->BillingDate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy"<?php echo $patient_services->BilledBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_BilledBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_BilledBy" class="form-group patient_services_BilledBy">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_list->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_list->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->BilledBy->EditValue ?>"<?php echo $patient_services->BilledBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="o<?php echo $patient_services_list->RowIndex ?>_BilledBy" id="o<?php echo $patient_services_list->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services->BilledBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_BilledBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_BilledBy" class="form-group patient_services_BilledBy">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_list->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_list->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->BilledBy->EditValue ?>"<?php echo $patient_services->BilledBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_BilledBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_BilledBy" class="patient_services_BilledBy">
<span<?php echo $patient_services->BilledBy->viewAttributes() ?>>
<?php echo $patient_services->BilledBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted"<?php echo $patient_services->Resulted->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Resulted" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Resulted" class="form-group patient_services_Resulted">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_list->RowIndex ?>_Resulted" id="x<?php echo $patient_services_list->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Resulted->EditValue ?>"<?php echo $patient_services->Resulted->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="o<?php echo $patient_services_list->RowIndex ?>_Resulted" id="o<?php echo $patient_services_list->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Resulted" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Resulted" class="form-group patient_services_Resulted">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_list->RowIndex ?>_Resulted" id="x<?php echo $patient_services_list->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Resulted->EditValue ?>"<?php echo $patient_services->Resulted->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Resulted" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Resulted" class="patient_services_Resulted">
<span<?php echo $patient_services->Resulted->viewAttributes() ?>>
<?php echo $patient_services->Resulted->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $patient_services->ResultDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultDate" class="form-group patient_services_ResultDate">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_list->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultDate->EditValue ?>"<?php echo $patient_services->ResultDate->editAttributes() ?>>
<?php if (!$patient_services->ResultDate->ReadOnly && !$patient_services->ResultDate->Disabled && !isset($patient_services->ResultDate->EditAttrs["readonly"]) && !isset($patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="o<?php echo $patient_services_list->RowIndex ?>_ResultDate" id="o<?php echo $patient_services_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultDate" class="form-group patient_services_ResultDate">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_list->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultDate->EditValue ?>"<?php echo $patient_services->ResultDate->editAttributes() ?>>
<?php if (!$patient_services->ResultDate->ReadOnly && !$patient_services->ResultDate->Disabled && !isset($patient_services->ResultDate->EditAttrs["readonly"]) && !isset($patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultDate" class="patient_services_ResultDate">
<span<?php echo $patient_services->ResultDate->viewAttributes() ?>>
<?php echo $patient_services->ResultDate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $patient_services->ResultedBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultedBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultedBy" class="form-group patient_services_ResultedBy">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_list->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultedBy->EditValue ?>"<?php echo $patient_services->ResultedBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="o<?php echo $patient_services_list->RowIndex ?>_ResultedBy" id="o<?php echo $patient_services_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultedBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultedBy" class="form-group patient_services_ResultedBy">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_list->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultedBy->EditValue ?>"<?php echo $patient_services->ResultedBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultedBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ResultedBy" class="patient_services_ResultedBy">
<span<?php echo $patient_services->ResultedBy->viewAttributes() ?>>
<?php echo $patient_services->ResultedBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate"<?php echo $patient_services->SampleDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleDate" class="form-group patient_services_SampleDate">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_list->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleDate->EditValue ?>"<?php echo $patient_services->SampleDate->editAttributes() ?>>
<?php if (!$patient_services->SampleDate->ReadOnly && !$patient_services->SampleDate->Disabled && !isset($patient_services->SampleDate->EditAttrs["readonly"]) && !isset($patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="o<?php echo $patient_services_list->RowIndex ?>_SampleDate" id="o<?php echo $patient_services_list->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleDate" class="form-group patient_services_SampleDate">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_list->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleDate->EditValue ?>"<?php echo $patient_services->SampleDate->editAttributes() ?>>
<?php if (!$patient_services->SampleDate->ReadOnly && !$patient_services->SampleDate->Disabled && !isset($patient_services->SampleDate->EditAttrs["readonly"]) && !isset($patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleDate" class="patient_services_SampleDate">
<span<?php echo $patient_services->SampleDate->viewAttributes() ?>>
<?php echo $patient_services->SampleDate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser"<?php echo $patient_services->SampleUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleUser" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleUser" class="form-group patient_services_SampleUser">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_list->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_list->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleUser->EditValue ?>"<?php echo $patient_services->SampleUser->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="o<?php echo $patient_services_list->RowIndex ?>_SampleUser" id="o<?php echo $patient_services_list->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleUser" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleUser" class="form-group patient_services_SampleUser">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_list->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_list->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleUser->EditValue ?>"<?php echo $patient_services->SampleUser->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleUser" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SampleUser" class="patient_services_SampleUser">
<span<?php echo $patient_services->SampleUser->viewAttributes() ?>>
<?php echo $patient_services->SampleUser->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled"<?php echo $patient_services->Sampled->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Sampled" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Sampled" class="form-group patient_services_Sampled">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_list->RowIndex ?>_Sampled" id="x<?php echo $patient_services_list->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sampled->EditValue ?>"<?php echo $patient_services->Sampled->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="o<?php echo $patient_services_list->RowIndex ?>_Sampled" id="o<?php echo $patient_services_list->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services->Sampled->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Sampled" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Sampled" class="form-group patient_services_Sampled">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_list->RowIndex ?>_Sampled" id="x<?php echo $patient_services_list->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sampled->EditValue ?>"<?php echo $patient_services->Sampled->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Sampled" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Sampled" class="patient_services_Sampled">
<span<?php echo $patient_services->Sampled->viewAttributes() ?>>
<?php echo $patient_services->Sampled->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate"<?php echo $patient_services->ReceivedDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedDate" class="form-group patient_services_ReceivedDate">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedDate->EditValue ?>"<?php echo $patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services->ReceivedDate->ReadOnly && !$patient_services->ReceivedDate->Disabled && !isset($patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="o<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" id="o<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedDate" class="form-group patient_services_ReceivedDate">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedDate->EditValue ?>"<?php echo $patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services->ReceivedDate->ReadOnly && !$patient_services->ReceivedDate->Disabled && !isset($patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
<span<?php echo $patient_services->ReceivedDate->viewAttributes() ?>>
<?php echo $patient_services->ReceivedDate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser"<?php echo $patient_services->ReceivedUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedUser" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedUser" class="form-group patient_services_ReceivedUser">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedUser->EditValue ?>"<?php echo $patient_services->ReceivedUser->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="o<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" id="o<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedUser" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedUser" class="form-group patient_services_ReceivedUser">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedUser->EditValue ?>"<?php echo $patient_services->ReceivedUser->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedUser" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
<span<?php echo $patient_services->ReceivedUser->viewAttributes() ?>>
<?php echo $patient_services->ReceivedUser->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied"<?php echo $patient_services->Recevied->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Recevied" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Recevied" class="form-group patient_services_Recevied">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_list->RowIndex ?>_Recevied" id="x<?php echo $patient_services_list->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services->Recevied->EditValue ?>"<?php echo $patient_services->Recevied->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="o<?php echo $patient_services_list->RowIndex ?>_Recevied" id="o<?php echo $patient_services_list->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services->Recevied->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Recevied" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Recevied" class="form-group patient_services_Recevied">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_list->RowIndex ?>_Recevied" id="x<?php echo $patient_services_list->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services->Recevied->EditValue ?>"<?php echo $patient_services->Recevied->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Recevied" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Recevied" class="patient_services_Recevied">
<span<?php echo $patient_services->Recevied->viewAttributes() ?>>
<?php echo $patient_services->Recevied->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate"<?php echo $patient_services->DeptRecvDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvDate" class="form-group patient_services_DeptRecvDate">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvDate->EditValue ?>"<?php echo $patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services->DeptRecvDate->ReadOnly && !$patient_services->DeptRecvDate->Disabled && !isset($patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="o<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" id="o<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvDate" class="form-group patient_services_DeptRecvDate">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvDate->EditValue ?>"<?php echo $patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services->DeptRecvDate->ReadOnly && !$patient_services->DeptRecvDate->Disabled && !isset($patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
<span<?php echo $patient_services->DeptRecvDate->viewAttributes() ?>>
<?php echo $patient_services->DeptRecvDate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser"<?php echo $patient_services->DeptRecvUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvUser" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvUser" class="form-group patient_services_DeptRecvUser">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvUser->EditValue ?>"<?php echo $patient_services->DeptRecvUser->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="o<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" id="o<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvUser" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvUser" class="form-group patient_services_DeptRecvUser">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvUser->EditValue ?>"<?php echo $patient_services->DeptRecvUser->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvUser" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
<span<?php echo $patient_services->DeptRecvUser->viewAttributes() ?>>
<?php echo $patient_services->DeptRecvUser->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived"<?php echo $patient_services->DeptRecived->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecived" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecived" class="form-group patient_services_DeptRecived">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecived->EditValue ?>"<?php echo $patient_services->DeptRecived->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="o<?php echo $patient_services_list->RowIndex ?>_DeptRecived" id="o<?php echo $patient_services_list->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services->DeptRecived->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecived" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecived" class="form-group patient_services_DeptRecived">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecived->EditValue ?>"<?php echo $patient_services->DeptRecived->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecived" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_DeptRecived" class="patient_services_DeptRecived">
<span<?php echo $patient_services->DeptRecived->viewAttributes() ?>>
<?php echo $patient_services->DeptRecived->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate"<?php echo $patient_services->SAuthDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthDate" class="form-group patient_services_SAuthDate">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthDate->EditValue ?>"<?php echo $patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services->SAuthDate->ReadOnly && !$patient_services->SAuthDate->Disabled && !isset($patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="o<?php echo $patient_services_list->RowIndex ?>_SAuthDate" id="o<?php echo $patient_services_list->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthDate" class="form-group patient_services_SAuthDate">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthDate->EditValue ?>"<?php echo $patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services->SAuthDate->ReadOnly && !$patient_services->SAuthDate->Disabled && !isset($patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthDate" class="patient_services_SAuthDate">
<span<?php echo $patient_services->SAuthDate->viewAttributes() ?>>
<?php echo $patient_services->SAuthDate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy"<?php echo $patient_services->SAuthBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthBy" class="form-group patient_services_SAuthBy">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthBy->EditValue ?>"<?php echo $patient_services->SAuthBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="o<?php echo $patient_services_list->RowIndex ?>_SAuthBy" id="o<?php echo $patient_services_list->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthBy" class="form-group patient_services_SAuthBy">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthBy->EditValue ?>"<?php echo $patient_services->SAuthBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthBy" class="patient_services_SAuthBy">
<span<?php echo $patient_services->SAuthBy->viewAttributes() ?>>
<?php echo $patient_services->SAuthBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate"<?php echo $patient_services->SAuthendicate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthendicate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthendicate" class="form-group patient_services_SAuthendicate">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthendicate->EditValue ?>"<?php echo $patient_services->SAuthendicate->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="o<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" id="o<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthendicate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthendicate" class="form-group patient_services_SAuthendicate">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthendicate->EditValue ?>"<?php echo $patient_services->SAuthendicate->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthendicate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
<span<?php echo $patient_services->SAuthendicate->viewAttributes() ?>>
<?php echo $patient_services->SAuthendicate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate"<?php echo $patient_services->AuthDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthDate" class="form-group patient_services_AuthDate">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_list->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthDate->EditValue ?>"<?php echo $patient_services->AuthDate->editAttributes() ?>>
<?php if (!$patient_services->AuthDate->ReadOnly && !$patient_services->AuthDate->Disabled && !isset($patient_services->AuthDate->EditAttrs["readonly"]) && !isset($patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="o<?php echo $patient_services_list->RowIndex ?>_AuthDate" id="o<?php echo $patient_services_list->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthDate" class="form-group patient_services_AuthDate">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_list->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthDate->EditValue ?>"<?php echo $patient_services->AuthDate->editAttributes() ?>>
<?php if (!$patient_services->AuthDate->ReadOnly && !$patient_services->AuthDate->Disabled && !isset($patient_services->AuthDate->EditAttrs["readonly"]) && !isset($patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthDate" class="patient_services_AuthDate">
<span<?php echo $patient_services->AuthDate->viewAttributes() ?>>
<?php echo $patient_services->AuthDate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy"<?php echo $patient_services->AuthBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthBy" class="form-group patient_services_AuthBy">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_list->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_list->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthBy->EditValue ?>"<?php echo $patient_services->AuthBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="o<?php echo $patient_services_list->RowIndex ?>_AuthBy" id="o<?php echo $patient_services_list->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthBy" class="form-group patient_services_AuthBy">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_list->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_list->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthBy->EditValue ?>"<?php echo $patient_services->AuthBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_AuthBy" class="patient_services_AuthBy">
<span<?php echo $patient_services->AuthBy->viewAttributes() ?>>
<?php echo $patient_services->AuthBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate"<?php echo $patient_services->Authencate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Authencate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Authencate" class="form-group patient_services_Authencate">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_list->RowIndex ?>_Authencate" id="x<?php echo $patient_services_list->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services->Authencate->EditValue ?>"<?php echo $patient_services->Authencate->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="o<?php echo $patient_services_list->RowIndex ?>_Authencate" id="o<?php echo $patient_services_list->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services->Authencate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Authencate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Authencate" class="form-group patient_services_Authencate">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_list->RowIndex ?>_Authencate" id="x<?php echo $patient_services_list->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services->Authencate->EditValue ?>"<?php echo $patient_services->Authencate->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Authencate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Authencate" class="patient_services_Authencate">
<span<?php echo $patient_services->Authencate->viewAttributes() ?>>
<?php echo $patient_services->Authencate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate"<?php echo $patient_services->EditDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_EditDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_EditDate" class="form-group patient_services_EditDate">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_list->RowIndex ?>_EditDate" id="x<?php echo $patient_services_list->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditDate->EditValue ?>"<?php echo $patient_services->EditDate->editAttributes() ?>>
<?php if (!$patient_services->EditDate->ReadOnly && !$patient_services->EditDate->Disabled && !isset($patient_services->EditDate->EditAttrs["readonly"]) && !isset($patient_services->EditDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="o<?php echo $patient_services_list->RowIndex ?>_EditDate" id="o<?php echo $patient_services_list->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services->EditDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_EditDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_EditDate" class="form-group patient_services_EditDate">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_list->RowIndex ?>_EditDate" id="x<?php echo $patient_services_list->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditDate->EditValue ?>"<?php echo $patient_services->EditDate->editAttributes() ?>>
<?php if (!$patient_services->EditDate->ReadOnly && !$patient_services->EditDate->Disabled && !isset($patient_services->EditDate->EditAttrs["readonly"]) && !isset($patient_services->EditDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_EditDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_EditDate" class="patient_services_EditDate">
<span<?php echo $patient_services->EditDate->viewAttributes() ?>>
<?php echo $patient_services->EditDate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy"<?php echo $patient_services->EditBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_EditBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_EditBy" class="form-group patient_services_EditBy">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_list->RowIndex ?>_EditBy" id="x<?php echo $patient_services_list->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditBy->EditValue ?>"<?php echo $patient_services->EditBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="o<?php echo $patient_services_list->RowIndex ?>_EditBy" id="o<?php echo $patient_services_list->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services->EditBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_EditBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_EditBy" class="form-group patient_services_EditBy">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_list->RowIndex ?>_EditBy" id="x<?php echo $patient_services_list->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditBy->EditValue ?>"<?php echo $patient_services->EditBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_EditBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_EditBy" class="patient_services_EditBy">
<span<?php echo $patient_services->EditBy->viewAttributes() ?>>
<?php echo $patient_services->EditBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Editted->Visible) { // Editted ?>
		<td data-name="Editted"<?php echo $patient_services->Editted->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Editted" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Editted" class="form-group patient_services_Editted">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_list->RowIndex ?>_Editted" id="x<?php echo $patient_services_list->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Editted->EditValue ?>"<?php echo $patient_services->Editted->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="o<?php echo $patient_services_list->RowIndex ?>_Editted" id="o<?php echo $patient_services_list->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services->Editted->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Editted" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Editted" class="form-group patient_services_Editted">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_list->RowIndex ?>_Editted" id="x<?php echo $patient_services_list->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Editted->EditValue ?>"<?php echo $patient_services->Editted->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Editted" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Editted" class="patient_services_Editted">
<span<?php echo $patient_services->Editted->viewAttributes() ?>>
<?php echo $patient_services->Editted->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_services->PatID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services->PatID->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PatID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PatID" class="form-group patient_services_PatID">
<span<?php echo $patient_services->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->PatID->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_PatID" name="x<?php echo $patient_services_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PatID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PatID" class="form-group patient_services_PatID">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_list->RowIndex ?>_PatID" id="x<?php echo $patient_services_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatID->EditValue ?>"<?php echo $patient_services->PatID->editAttributes() ?>>
</span>
</script>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="o<?php echo $patient_services_list->RowIndex ?>_PatID" id="o<?php echo $patient_services_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_services->PatID->getSessionValue() <> "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PatID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PatID" class="form-group patient_services_PatID">
<span<?php echo $patient_services->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->PatID->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_PatID" name="x<?php echo $patient_services_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PatID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PatID" class="form-group patient_services_PatID">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_list->RowIndex ?>_PatID" id="x<?php echo $patient_services_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatID->EditValue ?>"<?php echo $patient_services->PatID->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PatID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PatID" class="patient_services_PatID">
<span<?php echo $patient_services->PatID->viewAttributes() ?>>
<?php echo $patient_services->PatID->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_services->PatientId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientId" class="form-group patient_services_PatientId">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_list->RowIndex ?>_PatientId" id="x<?php echo $patient_services_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientId->EditValue ?>"<?php echo $patient_services->PatientId->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="o<?php echo $patient_services_list->RowIndex ?>_PatientId" id="o<?php echo $patient_services_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientId" class="form-group patient_services_PatientId">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_list->RowIndex ?>_PatientId" id="x<?php echo $patient_services_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientId->EditValue ?>"<?php echo $patient_services->PatientId->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_PatientId" class="patient_services_PatientId">
<span<?php echo $patient_services->PatientId->viewAttributes() ?>>
<?php echo $patient_services->PatientId->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $patient_services->Mobile->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Mobile" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Mobile" class="form-group patient_services_Mobile">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_list->RowIndex ?>_Mobile" id="x<?php echo $patient_services_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services->Mobile->EditValue ?>"<?php echo $patient_services->Mobile->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="o<?php echo $patient_services_list->RowIndex ?>_Mobile" id="o<?php echo $patient_services_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Mobile" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Mobile" class="form-group patient_services_Mobile">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_list->RowIndex ?>_Mobile" id="x<?php echo $patient_services_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services->Mobile->EditValue ?>"<?php echo $patient_services->Mobile->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Mobile" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Mobile" class="patient_services_Mobile">
<span<?php echo $patient_services->Mobile->viewAttributes() ?>>
<?php echo $patient_services->Mobile->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $patient_services->CId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_CId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_CId" class="form-group patient_services_CId">
<input type="text" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_list->RowIndex ?>_CId" id="x<?php echo $patient_services_list->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services->CId->EditValue ?>"<?php echo $patient_services->CId->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="o<?php echo $patient_services_list->RowIndex ?>_CId" id="o<?php echo $patient_services_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services->CId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_CId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_CId" class="form-group patient_services_CId">
<input type="text" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_list->RowIndex ?>_CId" id="x<?php echo $patient_services_list->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services->CId->EditValue ?>"<?php echo $patient_services->CId->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_CId" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_CId" class="patient_services_CId">
<span<?php echo $patient_services->CId->viewAttributes() ?>>
<?php echo $patient_services->CId->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $patient_services->Order->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Order" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Order" class="form-group patient_services_Order">
<input type="text" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_list->RowIndex ?>_Order" id="x<?php echo $patient_services_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services->Order->EditValue ?>"<?php echo $patient_services->Order->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="o<?php echo $patient_services_list->RowIndex ?>_Order" id="o<?php echo $patient_services_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services->Order->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Order" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Order" class="form-group patient_services_Order">
<input type="text" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_list->RowIndex ?>_Order" id="x<?php echo $patient_services_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services->Order->EditValue ?>"<?php echo $patient_services->Order->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Order" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Order" class="patient_services_Order">
<span<?php echo $patient_services->Order->viewAttributes() ?>>
<?php echo $patient_services->Order->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ResType->Visible) { // ResType ?>
		<td data-name="ResType"<?php echo $patient_services->ResType->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ResType" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ResType" class="form-group patient_services_ResType">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_list->RowIndex ?>_ResType" id="x<?php echo $patient_services_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResType->EditValue ?>"<?php echo $patient_services->ResType->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="o<?php echo $patient_services_list->RowIndex ?>_ResType" id="o<?php echo $patient_services_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services->ResType->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ResType" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ResType" class="form-group patient_services_ResType">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_list->RowIndex ?>_ResType" id="x<?php echo $patient_services_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResType->EditValue ?>"<?php echo $patient_services->ResType->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_ResType" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_ResType" class="patient_services_ResType">
<span<?php echo $patient_services->ResType->viewAttributes() ?>>
<?php echo $patient_services->ResType->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Sample->Visible) { // Sample ?>
		<td data-name="Sample"<?php echo $patient_services->Sample->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Sample" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Sample" class="form-group patient_services_Sample">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_list->RowIndex ?>_Sample" id="x<?php echo $patient_services_list->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sample->EditValue ?>"<?php echo $patient_services->Sample->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="o<?php echo $patient_services_list->RowIndex ?>_Sample" id="o<?php echo $patient_services_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services->Sample->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Sample" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Sample" class="form-group patient_services_Sample">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_list->RowIndex ?>_Sample" id="x<?php echo $patient_services_list->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sample->EditValue ?>"<?php echo $patient_services->Sample->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Sample" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Sample" class="patient_services_Sample">
<span<?php echo $patient_services->Sample->viewAttributes() ?>>
<?php echo $patient_services->Sample->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->NoD->Visible) { // NoD ?>
		<td data-name="NoD"<?php echo $patient_services->NoD->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_NoD" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_NoD" class="form-group patient_services_NoD">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_list->RowIndex ?>_NoD" id="x<?php echo $patient_services_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services->NoD->EditValue ?>"<?php echo $patient_services->NoD->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="o<?php echo $patient_services_list->RowIndex ?>_NoD" id="o<?php echo $patient_services_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services->NoD->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_NoD" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_NoD" class="form-group patient_services_NoD">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_list->RowIndex ?>_NoD" id="x<?php echo $patient_services_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services->NoD->EditValue ?>"<?php echo $patient_services->NoD->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_NoD" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_NoD" class="patient_services_NoD">
<span<?php echo $patient_services->NoD->viewAttributes() ?>>
<?php echo $patient_services->NoD->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder"<?php echo $patient_services->BillOrder->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_BillOrder" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_BillOrder" class="form-group patient_services_BillOrder">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_list->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillOrder->EditValue ?>"<?php echo $patient_services->BillOrder->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="o<?php echo $patient_services_list->RowIndex ?>_BillOrder" id="o<?php echo $patient_services_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_BillOrder" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_BillOrder" class="form-group patient_services_BillOrder">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_list->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillOrder->EditValue ?>"<?php echo $patient_services->BillOrder->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_BillOrder" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_BillOrder" class="patient_services_BillOrder">
<span<?php echo $patient_services->BillOrder->viewAttributes() ?>>
<?php echo $patient_services->BillOrder->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive"<?php echo $patient_services->Inactive->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Inactive" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Inactive" class="form-group patient_services_Inactive">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_list->RowIndex ?>_Inactive" id="x<?php echo $patient_services_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services->Inactive->EditValue ?>"<?php echo $patient_services->Inactive->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="o<?php echo $patient_services_list->RowIndex ?>_Inactive" id="o<?php echo $patient_services_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Inactive" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Inactive" class="form-group patient_services_Inactive">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_list->RowIndex ?>_Inactive" id="x<?php echo $patient_services_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services->Inactive->EditValue ?>"<?php echo $patient_services->Inactive->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Inactive" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Inactive" class="patient_services_Inactive">
<span<?php echo $patient_services->Inactive->viewAttributes() ?>>
<?php echo $patient_services->Inactive->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample"<?php echo $patient_services->CollSample->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_CollSample" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_CollSample" class="form-group patient_services_CollSample">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_list->RowIndex ?>_CollSample" id="x<?php echo $patient_services_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services->CollSample->EditValue ?>"<?php echo $patient_services->CollSample->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="o<?php echo $patient_services_list->RowIndex ?>_CollSample" id="o<?php echo $patient_services_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_CollSample" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_CollSample" class="form-group patient_services_CollSample">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_list->RowIndex ?>_CollSample" id="x<?php echo $patient_services_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services->CollSample->EditValue ?>"<?php echo $patient_services->CollSample->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_CollSample" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_CollSample" class="patient_services_CollSample">
<span<?php echo $patient_services->CollSample->viewAttributes() ?>>
<?php echo $patient_services->CollSample->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $patient_services->TestType->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestType" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestType" class="form-group patient_services_TestType">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_list->RowIndex ?>_TestType" id="x<?php echo $patient_services_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestType->EditValue ?>"<?php echo $patient_services->TestType->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="o<?php echo $patient_services_list->RowIndex ?>_TestType" id="o<?php echo $patient_services_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services->TestType->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestType" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestType" class="form-group patient_services_TestType">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_list->RowIndex ?>_TestType" id="x<?php echo $patient_services_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestType->EditValue ?>"<?php echo $patient_services->TestType->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_TestType" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_TestType" class="patient_services_TestType">
<span<?php echo $patient_services->TestType->viewAttributes() ?>>
<?php echo $patient_services->TestType->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated"<?php echo $patient_services->Repeated->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Repeated" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Repeated" class="form-group patient_services_Repeated">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_list->RowIndex ?>_Repeated" id="x<?php echo $patient_services_list->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services->Repeated->EditValue ?>"<?php echo $patient_services->Repeated->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="o<?php echo $patient_services_list->RowIndex ?>_Repeated" id="o<?php echo $patient_services_list->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Repeated" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Repeated" class="form-group patient_services_Repeated">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_list->RowIndex ?>_Repeated" id="x<?php echo $patient_services_list->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services->Repeated->EditValue ?>"<?php echo $patient_services->Repeated->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Repeated" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Repeated" class="patient_services_Repeated">
<span<?php echo $patient_services->Repeated->viewAttributes() ?>>
<?php echo $patient_services->Repeated->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy"<?php echo $patient_services->RepeatedBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedBy" class="form-group patient_services_RepeatedBy">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedBy->EditValue ?>"<?php echo $patient_services->RepeatedBy->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="o<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" id="o<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedBy" class="form-group patient_services_RepeatedBy">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedBy->EditValue ?>"<?php echo $patient_services->RepeatedBy->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedBy" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
<span<?php echo $patient_services->RepeatedBy->viewAttributes() ?>>
<?php echo $patient_services->RepeatedBy->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate"<?php echo $patient_services->RepeatedDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedDate" class="form-group patient_services_RepeatedDate">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedDate->EditValue ?>"<?php echo $patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services->RepeatedDate->ReadOnly && !$patient_services->RepeatedDate->Disabled && !isset($patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="o<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" id="o<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedDate" class="form-group patient_services_RepeatedDate">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedDate->EditValue ?>"<?php echo $patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services->RepeatedDate->ReadOnly && !$patient_services->RepeatedDate->Disabled && !isset($patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_serviceslist_js">
ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedDate" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
<span<?php echo $patient_services->RepeatedDate->viewAttributes() ?>>
<?php echo $patient_services->RepeatedDate->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID"<?php echo $patient_services->serviceID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_serviceID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_serviceID" class="form-group patient_services_serviceID">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_list->RowIndex ?>_serviceID" id="x<?php echo $patient_services_list->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services->serviceID->EditValue ?>"<?php echo $patient_services->serviceID->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="o<?php echo $patient_services_list->RowIndex ?>_serviceID" id="o<?php echo $patient_services_list->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services->serviceID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_serviceID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_serviceID" class="form-group patient_services_serviceID">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_list->RowIndex ?>_serviceID" id="x<?php echo $patient_services_list->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services->serviceID->EditValue ?>"<?php echo $patient_services->serviceID->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_serviceID" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_serviceID" class="patient_services_serviceID">
<span<?php echo $patient_services->serviceID->viewAttributes() ?>>
<?php echo $patient_services->serviceID->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type"<?php echo $patient_services->Service_Type->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Type" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Type" class="form-group patient_services_Service_Type">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_list->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_list->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Type->EditValue ?>"<?php echo $patient_services->Service_Type->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="o<?php echo $patient_services_list->RowIndex ?>_Service_Type" id="o<?php echo $patient_services_list->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services->Service_Type->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Type" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Type" class="form-group patient_services_Service_Type">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_list->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_list->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Type->EditValue ?>"<?php echo $patient_services->Service_Type->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Type" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Type" class="patient_services_Service_Type">
<span<?php echo $patient_services->Service_Type->viewAttributes() ?>>
<?php echo $patient_services->Service_Type->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department"<?php echo $patient_services->Service_Department->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Department" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Department" class="form-group patient_services_Service_Department">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_list->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_list->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Department->EditValue ?>"<?php echo $patient_services->Service_Department->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="o<?php echo $patient_services_list->RowIndex ?>_Service_Department" id="o<?php echo $patient_services_list->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services->Service_Department->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Department" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Department" class="form-group patient_services_Service_Department">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_list->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_list->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Department->EditValue ?>"<?php echo $patient_services->Service_Department->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Department" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_Service_Department" class="patient_services_Service_Department">
<span<?php echo $patient_services->Service_Department->viewAttributes() ?>>
<?php echo $patient_services->Service_Department->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo"<?php echo $patient_services->RequestNo->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RequestNo" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RequestNo" class="form-group patient_services_RequestNo">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_list->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_list->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services->RequestNo->EditValue ?>"<?php echo $patient_services->RequestNo->editAttributes() ?>>
</span>
</script>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="o<?php echo $patient_services_list->RowIndex ?>_RequestNo" id="o<?php echo $patient_services_list->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services->RequestNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RequestNo" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RequestNo" class="form-group patient_services_RequestNo">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_list->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_list->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services->RequestNo->EditValue ?>"<?php echo $patient_services->RequestNo->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCnt ?>_patient_services_RequestNo" class="patient_serviceslist" type="text/html">
<span id="el<?php echo $patient_services_list->RowCnt ?>_patient_services_RequestNo" class="patient_services_RequestNo">
<span<?php echo $patient_services->RequestNo->viewAttributes() ?>>
<?php echo $patient_services->RequestNo->getViewValue() ?></span>
</span>
</script>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_services_list->ListOptions->render("body", "right", $patient_services_list->RowCnt, "block", $patient_services->TableVar, "patient_serviceslist");
?>
	</tr>
<?php if ($patient_services->RowType == ROWTYPE_ADD || $patient_services->RowType == ROWTYPE_EDIT) { ?>
<script class="patient_serviceslist_js" type="text/html">
fpatient_serviceslist.updateLists(<?php echo $patient_services_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_services->isGridAdd())
		if (!$patient_services_list->Recordset->EOF)
			$patient_services_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$patient_services->RowType = ROWTYPE_AGGREGATE;
$patient_services->resetAttributes();
$patient_services_list->renderRow();
?>
<?php if ($patient_services_list->TotalRecs > 0 && !$patient_services->isGridAdd() && !$patient_services->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$patient_services_list->renderListOptions();

// Render list options (footer, left)
$patient_services_list->ListOptions->render("footer", "left", "", "block", $patient_services->TableVar, "patient_serviceslist");
?>
	<?php if ($patient_services->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $patient_services->id->footerCellClass() ?>"><span id="elf_patient_services_id" class="patient_services_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Reception->Visible) { // Reception ?>
		<td data-name="Reception" class="<?php echo $patient_services->Reception->footerCellClass() ?>"><span id="elf_patient_services_Reception" class="patient_services_Reception">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Services->Visible) { // Services ?>
		<td data-name="Services" class="<?php echo $patient_services->Services->footerCellClass() ?>"><span id="elf_patient_services_Services" class="patient_services_Services">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->amount->Visible) { // amount ?>
		<td data-name="amount" class="<?php echo $patient_services->amount->footerCellClass() ?>"><span id="elf_patient_services_amount" class="patient_services_amount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->description->Visible) { // description ?>
		<td data-name="description" class="<?php echo $patient_services->description->footerCellClass() ?>"><span id="elf_patient_services_description" class="patient_services_description">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" class="<?php echo $patient_services->patient_type->footerCellClass() ?>"><span id="elf_patient_services_patient_type" class="patient_services_patient_type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" class="<?php echo $patient_services->charged_date->footerCellClass() ?>"><span id="elf_patient_services_charged_date" class="patient_services_charged_date">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->status->Visible) { // status ?>
		<td data-name="status" class="<?php echo $patient_services->status->footerCellClass() ?>"><span id="elf_patient_services_status" class="patient_services_status">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" class="<?php echo $patient_services->mrnno->footerCellClass() ?>"><span id="elf_patient_services_mrnno" class="patient_services_mrnno">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $patient_services->PatientName->footerCellClass() ?>"><span id="elf_patient_services_PatientName" class="patient_services_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Age->Visible) { // Age ?>
		<td data-name="Age" class="<?php echo $patient_services->Age->footerCellClass() ?>"><span id="elf_patient_services_Age" class="patient_services_Age">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Gender->Visible) { // Gender ?>
		<td data-name="Gender" class="<?php echo $patient_services->Gender->footerCellClass() ?>"><span id="elf_patient_services_Gender" class="patient_services_Gender">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Unit->Visible) { // Unit ?>
		<td data-name="Unit" class="<?php echo $patient_services->Unit->footerCellClass() ?>"><span id="elf_patient_services_Unit" class="patient_services_Unit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $patient_services->Quantity->footerCellClass() ?>"><span id="elf_patient_services_Quantity" class="patient_services_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Discount->Visible) { // Discount ?>
		<td data-name="Discount" class="<?php echo $patient_services->Discount->footerCellClass() ?>"><span id="elf_patient_services_Discount" class="patient_services_Discount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" class="<?php echo $patient_services->SubTotal->footerCellClass() ?>"><span id="elf_patient_services_SubTotal" class="patient_services_SubTotal">
		<script id="tpg_patient_services_SubTotal" class="patient_serviceslist" type="text/html"><span<?php echo $patient_services->SubTotal->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $patient_services->SubTotal->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($patient_services->ServiceSelect->Visible) { // ServiceSelect ?>
		<td data-name="ServiceSelect" class="<?php echo $patient_services->ServiceSelect->footerCellClass() ?>"><span id="elf_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Aid->Visible) { // Aid ?>
		<td data-name="Aid" class="<?php echo $patient_services->Aid->footerCellClass() ?>"><span id="elf_patient_services_Aid" class="patient_services_Aid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Vid->Visible) { // Vid ?>
		<td data-name="Vid" class="<?php echo $patient_services->Vid->footerCellClass() ?>"><span id="elf_patient_services_Vid" class="patient_services_Vid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DrID->Visible) { // DrID ?>
		<td data-name="DrID" class="<?php echo $patient_services->DrID->footerCellClass() ?>"><span id="elf_patient_services_DrID" class="patient_services_DrID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" class="<?php echo $patient_services->DrCODE->footerCellClass() ?>"><span id="elf_patient_services_DrCODE" class="patient_services_DrCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DrName->Visible) { // DrName ?>
		<td data-name="DrName" class="<?php echo $patient_services->DrName->footerCellClass() ?>"><span id="elf_patient_services_DrName" class="patient_services_DrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Department->Visible) { // Department ?>
		<td data-name="Department" class="<?php echo $patient_services->Department->footerCellClass() ?>"><span id="elf_patient_services_Department" class="patient_services_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres" class="<?php echo $patient_services->DrSharePres->footerCellClass() ?>"><span id="elf_patient_services_DrSharePres" class="patient_services_DrSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres" class="<?php echo $patient_services->HospSharePres->footerCellClass() ?>"><span id="elf_patient_services_HospSharePres" class="patient_services_HospSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" class="<?php echo $patient_services->DrShareAmount->footerCellClass() ?>"><span id="elf_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" class="<?php echo $patient_services->HospShareAmount->footerCellClass() ?>"><span id="elf_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount" class="<?php echo $patient_services->DrShareSettiledAmount->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId" class="<?php echo $patient_services->DrShareSettledId->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus" class="<?php echo $patient_services->DrShareSettiledStatus->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" class="<?php echo $patient_services->invoiceId->footerCellClass() ?>"><span id="elf_patient_services_invoiceId" class="patient_services_invoiceId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" class="<?php echo $patient_services->invoiceAmount->footerCellClass() ?>"><span id="elf_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" class="<?php echo $patient_services->invoiceStatus->footerCellClass() ?>"><span id="elf_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" class="<?php echo $patient_services->modeOfPayment->footerCellClass() ?>"><span id="elf_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $patient_services->HospID->footerCellClass() ?>"><span id="elf_patient_services_HospID" class="patient_services_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" class="<?php echo $patient_services->RIDNO->footerCellClass() ?>"><span id="elf_patient_services_RIDNO" class="patient_services_RIDNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" class="<?php echo $patient_services->TidNo->footerCellClass() ?>"><span id="elf_patient_services_TidNo" class="patient_services_TidNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory" class="<?php echo $patient_services->DiscountCategory->footerCellClass() ?>"><span id="elf_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->sid->Visible) { // sid ?>
		<td data-name="sid" class="<?php echo $patient_services->sid->footerCellClass() ?>"><span id="elf_patient_services_sid" class="patient_services_sid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" class="<?php echo $patient_services->ItemCode->footerCellClass() ?>"><span id="elf_patient_services_ItemCode" class="patient_services_ItemCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" class="<?php echo $patient_services->TestSubCd->footerCellClass() ?>"><span id="elf_patient_services_TestSubCd" class="patient_services_TestSubCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" class="<?php echo $patient_services->DEptCd->footerCellClass() ?>"><span id="elf_patient_services_DEptCd" class="patient_services_DEptCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" class="<?php echo $patient_services->ProfCd->footerCellClass() ?>"><span id="elf_patient_services_ProfCd" class="patient_services_ProfCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Comments->Visible) { // Comments ?>
		<td data-name="Comments" class="<?php echo $patient_services->Comments->footerCellClass() ?>"><span id="elf_patient_services_Comments" class="patient_services_Comments">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Method->Visible) { // Method ?>
		<td data-name="Method" class="<?php echo $patient_services->Method->footerCellClass() ?>"><span id="elf_patient_services_Method" class="patient_services_Method">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" class="<?php echo $patient_services->Specimen->footerCellClass() ?>"><span id="elf_patient_services_Specimen" class="patient_services_Specimen">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" class="<?php echo $patient_services->Abnormal->footerCellClass() ?>"><span id="elf_patient_services_Abnormal" class="patient_services_Abnormal">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" class="<?php echo $patient_services->TestUnit->footerCellClass() ?>"><span id="elf_patient_services_TestUnit" class="patient_services_TestUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" class="<?php echo $patient_services->LOWHIGH->footerCellClass() ?>"><span id="elf_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Branch->Visible) { // Branch ?>
		<td data-name="Branch" class="<?php echo $patient_services->Branch->footerCellClass() ?>"><span id="elf_patient_services_Branch" class="patient_services_Branch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" class="<?php echo $patient_services->Dispatch->footerCellClass() ?>"><span id="elf_patient_services_Dispatch" class="patient_services_Dispatch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" class="<?php echo $patient_services->Pic1->footerCellClass() ?>"><span id="elf_patient_services_Pic1" class="patient_services_Pic1">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" class="<?php echo $patient_services->Pic2->footerCellClass() ?>"><span id="elf_patient_services_Pic2" class="patient_services_Pic2">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" class="<?php echo $patient_services->GraphPath->footerCellClass() ?>"><span id="elf_patient_services_GraphPath" class="patient_services_GraphPath">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" class="<?php echo $patient_services->MachineCD->footerCellClass() ?>"><span id="elf_patient_services_MachineCD" class="patient_services_MachineCD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" class="<?php echo $patient_services->TestCancel->footerCellClass() ?>"><span id="elf_patient_services_TestCancel" class="patient_services_TestCancel">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" class="<?php echo $patient_services->OutSource->footerCellClass() ?>"><span id="elf_patient_services_OutSource" class="patient_services_OutSource">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Printed->Visible) { // Printed ?>
		<td data-name="Printed" class="<?php echo $patient_services->Printed->footerCellClass() ?>"><span id="elf_patient_services_Printed" class="patient_services_Printed">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" class="<?php echo $patient_services->PrintBy->footerCellClass() ?>"><span id="elf_patient_services_PrintBy" class="patient_services_PrintBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" class="<?php echo $patient_services->PrintDate->footerCellClass() ?>"><span id="elf_patient_services_PrintDate" class="patient_services_PrintDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate" class="<?php echo $patient_services->BillingDate->footerCellClass() ?>"><span id="elf_patient_services_BillingDate" class="patient_services_BillingDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy" class="<?php echo $patient_services->BilledBy->footerCellClass() ?>"><span id="elf_patient_services_BilledBy" class="patient_services_BilledBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" class="<?php echo $patient_services->Resulted->footerCellClass() ?>"><span id="elf_patient_services_Resulted" class="patient_services_Resulted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" class="<?php echo $patient_services->ResultDate->footerCellClass() ?>"><span id="elf_patient_services_ResultDate" class="patient_services_ResultDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" class="<?php echo $patient_services->ResultedBy->footerCellClass() ?>"><span id="elf_patient_services_ResultedBy" class="patient_services_ResultedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" class="<?php echo $patient_services->SampleDate->footerCellClass() ?>"><span id="elf_patient_services_SampleDate" class="patient_services_SampleDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" class="<?php echo $patient_services->SampleUser->footerCellClass() ?>"><span id="elf_patient_services_SampleUser" class="patient_services_SampleUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled" class="<?php echo $patient_services->Sampled->footerCellClass() ?>"><span id="elf_patient_services_Sampled" class="patient_services_Sampled">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" class="<?php echo $patient_services->ReceivedDate->footerCellClass() ?>"><span id="elf_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" class="<?php echo $patient_services->ReceivedUser->footerCellClass() ?>"><span id="elf_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied" class="<?php echo $patient_services->Recevied->footerCellClass() ?>"><span id="elf_patient_services_Recevied" class="patient_services_Recevied">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" class="<?php echo $patient_services->DeptRecvDate->footerCellClass() ?>"><span id="elf_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" class="<?php echo $patient_services->DeptRecvUser->footerCellClass() ?>"><span id="elf_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived" class="<?php echo $patient_services->DeptRecived->footerCellClass() ?>"><span id="elf_patient_services_DeptRecived" class="patient_services_DeptRecived">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" class="<?php echo $patient_services->SAuthDate->footerCellClass() ?>"><span id="elf_patient_services_SAuthDate" class="patient_services_SAuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" class="<?php echo $patient_services->SAuthBy->footerCellClass() ?>"><span id="elf_patient_services_SAuthBy" class="patient_services_SAuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate" class="<?php echo $patient_services->SAuthendicate->footerCellClass() ?>"><span id="elf_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" class="<?php echo $patient_services->AuthDate->footerCellClass() ?>"><span id="elf_patient_services_AuthDate" class="patient_services_AuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" class="<?php echo $patient_services->AuthBy->footerCellClass() ?>"><span id="elf_patient_services_AuthBy" class="patient_services_AuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate" class="<?php echo $patient_services->Authencate->footerCellClass() ?>"><span id="elf_patient_services_Authencate" class="patient_services_Authencate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" class="<?php echo $patient_services->EditDate->footerCellClass() ?>"><span id="elf_patient_services_EditDate" class="patient_services_EditDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy" class="<?php echo $patient_services->EditBy->footerCellClass() ?>"><span id="elf_patient_services_EditBy" class="patient_services_EditBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Editted->Visible) { // Editted ?>
		<td data-name="Editted" class="<?php echo $patient_services->Editted->footerCellClass() ?>"><span id="elf_patient_services_Editted" class="patient_services_Editted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->PatID->Visible) { // PatID ?>
		<td data-name="PatID" class="<?php echo $patient_services->PatID->footerCellClass() ?>"><span id="elf_patient_services_PatID" class="patient_services_PatID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $patient_services->PatientId->footerCellClass() ?>"><span id="elf_patient_services_PatientId" class="patient_services_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $patient_services->Mobile->footerCellClass() ?>"><span id="elf_patient_services_Mobile" class="patient_services_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->CId->Visible) { // CId ?>
		<td data-name="CId" class="<?php echo $patient_services->CId->footerCellClass() ?>"><span id="elf_patient_services_CId" class="patient_services_CId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Order->Visible) { // Order ?>
		<td data-name="Order" class="<?php echo $patient_services->Order->footerCellClass() ?>"><span id="elf_patient_services_Order" class="patient_services_Order">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->ResType->Visible) { // ResType ?>
		<td data-name="ResType" class="<?php echo $patient_services->ResType->footerCellClass() ?>"><span id="elf_patient_services_ResType" class="patient_services_ResType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Sample->Visible) { // Sample ?>
		<td data-name="Sample" class="<?php echo $patient_services->Sample->footerCellClass() ?>"><span id="elf_patient_services_Sample" class="patient_services_Sample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->NoD->Visible) { // NoD ?>
		<td data-name="NoD" class="<?php echo $patient_services->NoD->footerCellClass() ?>"><span id="elf_patient_services_NoD" class="patient_services_NoD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" class="<?php echo $patient_services->BillOrder->footerCellClass() ?>"><span id="elf_patient_services_BillOrder" class="patient_services_BillOrder">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" class="<?php echo $patient_services->Inactive->footerCellClass() ?>"><span id="elf_patient_services_Inactive" class="patient_services_Inactive">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" class="<?php echo $patient_services->CollSample->footerCellClass() ?>"><span id="elf_patient_services_CollSample" class="patient_services_CollSample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->TestType->Visible) { // TestType ?>
		<td data-name="TestType" class="<?php echo $patient_services->TestType->footerCellClass() ?>"><span id="elf_patient_services_TestType" class="patient_services_TestType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" class="<?php echo $patient_services->Repeated->footerCellClass() ?>"><span id="elf_patient_services_Repeated" class="patient_services_Repeated">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy" class="<?php echo $patient_services->RepeatedBy->footerCellClass() ?>"><span id="elf_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate" class="<?php echo $patient_services->RepeatedDate->footerCellClass() ?>"><span id="elf_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID" class="<?php echo $patient_services->serviceID->footerCellClass() ?>"><span id="elf_patient_services_serviceID" class="patient_services_serviceID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type" class="<?php echo $patient_services->Service_Type->footerCellClass() ?>"><span id="elf_patient_services_Service_Type" class="patient_services_Service_Type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department" class="<?php echo $patient_services->Service_Department->footerCellClass() ?>"><span id="elf_patient_services_Service_Department" class="patient_services_Service_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo" class="<?php echo $patient_services->RequestNo->footerCellClass() ?>"><span id="elf_patient_services_RequestNo" class="patient_services_RequestNo">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$patient_services_list->ListOptions->render("footer", "right", "", "block", $patient_services->TableVar, "patient_serviceslist");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($patient_services->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $patient_services_list->FormKeyCountName ?>" id="<?php echo $patient_services_list->FormKeyCountName ?>" value="<?php echo $patient_services_list->KeyCount ?>">
<?php echo $patient_services_list->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_services->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $patient_services_list->FormKeyCountName ?>" id="<?php echo $patient_services_list->FormKeyCountName ?>" value="<?php echo $patient_services_list->KeyCount ?>">
<?php echo $patient_services_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$patient_services->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_patient_serviceslist" class="ew-custom-template"></div>
<script id="tpm_patient_serviceslist" type="text/html">
<div id="ct_patient_services_list"><?php if ($patient_services_list->RowCnt > 0) { ?>
<table class="ew-table">
  <thead>
	<tr class="ew-table-header">
	<th  class="text-center" >*</th>
	  <th  class="text-center" >{{include tmpl="#tpc_patient_services_Services"/}}</th>
	  <th  class="text-center" >{{include tmpl="#tpc_patient_services_amount"/}}</th>
	  <th  class="text-center" >{{include tmpl="#tpc_patient_services_ServiceSelect"/}}</th>
	  <th  class="text-center" >{{include tmpl="#tpc_patient_services_Quantity"/}}</th>
	  <th  class="text-center" >{{include tmpl="#tpc_patient_services_Discount"/}}</th>
	  <th  class="text-center" >{{include tmpl="#tpc_patient_services_SubTotal"/}}</th>
	  <th  class="text-center" >{{include tmpl="#tpc_patient_services_description"/}}</th>
	   <th hidden class="text-center" >{{include tmpl="#tpc_patient_services_serviceID"/}}</th>
	    <th hidden class="text-center" >{{include tmpl="#tpc_patient_services_Service_Type"/}}</th>
	     <th hidden class="text-center" >{{include tmpl="#tpc_patient_services_Service_Department"/}}</th>
	     <th  class="text-center" >{{include tmpl="#tpc_patient_services_sid"/}}</th>
	     <th  class="text-center" >{{include tmpl="#tpc_patient_services_ItemCode"/}}</th>
	</tr>
  </thead>
  <tbody>
<?php for ($i = $patient_services_list->StartRowCnt; $i <= $patient_services_list->RowCnt; $i++) { ?>
<tr>
<td class="ew-list-option-body text-nowrap" data-name="button" rowspan="1"><div style="width: 25px;"><div class="btn-group btn-group-sm ew-btn-group"><a class="btn btn-default ew-grid-link ew-grid-delete" id="RowDeleteButton<?php echo $i ?>" title="" data-caption="Delete" onclick="return ew.deleteGridRow(this, <?php echo $i ?>);" data-original-title="Delete"><i data-phrase="DeleteLink" class="fa fa-trash ew-icon" data-caption="Delete"></i></a></div></div></td>
	  <td>{{include tmpl="#tpx<?php echo $i ?>_patient_services_Services"/}}</td>
	  <td>{{include tmpl="#tpx<?php echo $i ?>_patient_services_amount"/}}</td>
	  <td>{{include tmpl="#tpx<?php echo $i ?>_patient_services_ServiceSelect"/}}</td>
	  <td>{{include tmpl="#tpx<?php echo $i ?>_patient_services_Quantity"/}}</td>
	  <td>{{include tmpl="#tpx<?php echo $i ?>_patient_services_Discount"/}}</td>
	  <td>{{include tmpl="#tpx<?php echo $i ?>_patient_services_SubTotal"/}}</td>
	  <td>{{include tmpl="#tpx<?php echo $i ?>_patient_services_description"/}}</td>
	   <td hidden >{{include tmpl="#tpx<?php echo $i ?>_patient_services_serviceID"/}}</td>
	   <td hidden >{{include tmpl="#tpx<?php echo $i ?>_patient_services_Service_Type"/}}</td>
	   <td hidden >{{include tmpl="#tpx<?php echo $i ?>_patient_services_Service_Department"/}}</td>
	    <td  >{{include tmpl="#tpx<?php echo $i ?>_patient_services_sid"/}}</td>
	     <td  >{{include tmpl="#tpx<?php echo $i ?>_patient_services_ItemCode"/}}</td>
</tr>
<?php } ?>
</tbody>
	<?php if ($patient_services_list->TotalRecs > 0 && !$patient_services->isGridAdd() && !$patient_services->isGridEdit()) { ?>
<tfoot>
		<tr class="ew-table-footer">{{include tmpl="#tpof_patient_services"/}}
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>{{include tmpl="#tpg_patient_services_SubTotal"/}}</td>
			<td>&nbsp;</td>
		</tr>
	</tfoot>
<?php } ?>
</table>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_services_list->Recordset)
	$patient_services_list->Recordset->Close();
?>
<?php if (!$patient_services->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_services_list->Pager)) $patient_services_list->Pager = new NumericPager($patient_services_list->StartRec, $patient_services_list->DisplayRecs, $patient_services_list->TotalRecs, $patient_services_list->RecRange, $patient_services_list->AutoHidePager) ?>
<?php if ($patient_services_list->Pager->RecordCount > 0 && $patient_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_services_list->pageUrl() ?>start=<?php echo $patient_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_services_list->pageUrl() ?>start=<?php echo $patient_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_services_list->pageUrl() ?>start=<?php echo $patient_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_services_list->pageUrl() ?>start=<?php echo $patient_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_services_list->TotalRecs > 0 && (!$patient_services_list->AutoHidePageSizeSelector || $patient_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_services_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_services_list->TotalRecs == 0 && !$patient_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_services->Rows) ?> };
ew.applyTemplate("tpd_patient_serviceslist", "tpm_patient_serviceslist", "patient_serviceslist", "<?php echo $patient_services->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_patient_serviceslist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_patient_serviceslist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.patient_serviceslist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_services_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

	var myParent =  document.getElementById("tpd_ip_admissionmaster");

//		var myParent =  document.getElementById("fpatient_serviceslistsrch");
	var t = document.createTextNode("Select Activity Card : ");
	try {
		myParent.appendChild(t);
	} catch{
		var myParent = document.getElementById("tpd_view_appointment_schedulermaster");
		myParent.appendChild(t);
	}

//Create array of options to be added
var array = ["Volvo","Saab","Mercades","Audi"];

//Create and append select list
var selectList = document.createElement("select");
selectList.id = "mySelect";
myParent.appendChild(selectList);

//Create and append the options
//for (var i = 0; i < array.length; i++) {
//    var option = document.createElement("option");
//    option.value = array[i];
//    option.text = array[i];
//    selectList.appendChild(option);
//}

	var btn = document.createElement("BUTTON");   // Create a <button> element
	btn.innerHTML = "Select";                   // Insert text
	btn.addEventListener("click", myScriptSelect);
myParent.appendChild(btn);               // Append <button> to <body>
		var user = [{
			'CustomerName': '<?php  echo CurrentUserName();  ?>'                    
		}];

	//v
		var jsonString = JSON.stringify(user);
			$.ajax({
				type: "POST",
				url: "ajaxinsert.php?control=selectActivityCardGroup",
				data: { data: jsonString },
				cache: false,
				success: function (data) {
					let jsonObject = JSON.parse(data);
					var json = jsonObject["records"];
					for(var i = 0; i < json.length; i++) {
						var obj = json[i];

						//console.log(obj.id);
						 var option = document.createElement("option");
	option.value = obj.Type;
	option.text = obj.Type;
	selectList.appendChild(option);
					  }

					//alert(data + "Saved Sucessfully...........");
					//swal({ text: "Saved Sucessfully......", icon: "success", });
				   // Receiptreset();
				  //  document.getElementById("VoucherAmt0").focus();

				}
			});
	for (var i = 0; i < 40; i++) {
		var kkk = $('*[data-caption="Add Blank Row"]')
		ew.addGridRow(kkk);
	}

	function myScriptSelect() {

	   // alert("hai");
//n

		var hhhh = document.getElementById("mySelect");
				var user = [{
					'CustomerName': '<?php  echo CurrentUserName();  ?>',
					'ActivityCard': hhhh.value
		}];

	//v
		var jsonString = JSON.stringify(user);
			$.ajax({
				type: "POST",
				url: "ajaxinsert.php?control=selectActivityCard",
				data: { data: jsonString },
				cache: false,
				success: function (data) {
					let jsonObject = JSON.parse(data);
					var json = jsonObject["records"];
					for (var i = 0; i < json.length; i++) {

					//	var kkk  = $('*[data-caption="Add Blank Row"]')
					//	ew.addGridRow(kkk);

						var obj = json[i];
						console.log(obj.id);

						  //var Services = document.getElementById("lu_x" + (i + 1) + "_Services");
						   var Services = document.getElementById("sv_x" + (i + 1) + "_Services");
						Services.innerHTML  = obj.SERVICE;
						Services.selectedIndex = obj.SERVICE;
						Services.value = obj.SERVICE;
						Services.text = obj.SERVICE;

					  //  Services.innerHTML  = obj.SERVICE;
					  //  Services.selectedIndex = obj.id;

					 var Services = document.getElementById("x" + (i + 1) + "_Services");
					 Services.value = obj.SERVICE;
						var amount = document.getElementById("x"+(i+1)+"_amount");
						amount.value = obj.Amount;
						var serviceID = document.getElementById("x"+(i+1)+"_serviceID");
						serviceID.value = obj.serviceID;
						var sid = document.getElementById("x"+(i+1)+"_sid");
						sid.value = obj.serviceID;
						var ItemCode = document.getElementById("x"+(i+1)+"_ItemCode");
						ItemCode.value = obj.ItemCode;
						var Service_Type = document.getElementById("x"+(i+1)+"_Service_Type");
						Service_Type.value = obj.Service_Type;
						var Service_Department = document.getElementById("x"+(i+1)+"_Service_Department");
						Service_Department.value = obj.Service_Department;

						//var M = document.getElementById("x"+(i+1)+"_M");
						//M.value = obj.M;
						//var A = document.getElementById("x"+(i+1)+"_A");
						//A.value = obj.A;
						//var N = document.getElementById("x"+(i+1)+"_N");
						//N.value = obj.N;
						//var NoOfDays = document.getElementById("x"+(i+1)+"_NoOfDays");
						//NoOfDays.value = obj.NoOfDays;
						//var PreRoute = document.getElementById("sv_x"+(i+1)+"_PreRoute");
						//PreRoute.value = obj.PreRoute;
						//var TimeOfTaking = document.getElementById("sv_x"+(i+1)+"_TimeOfTaking");
						//TimeOfTaking.value = obj.TimeOfTaking;
						//   var TimeOfTaking = document.getElementById("x"+(i+1)+"_Type");
						//TimeOfTaking.value = 'Normal';
						//var TimeOfTaking = document.getElementById("x"+(i+1)+"_Status");
						//TimeOfTaking.value = 'Live';

					  }

					//alert(data + "Saved Sucessfully...........");
					//swal({ text: "Saved Sucessfully......", icon: "success", });
				   // Receiptreset();
				  //  document.getElementById("VoucherAmt0").focus();

				}
			});
	}
	document.getElementById("ct_patient_services_list").style.overflow = "auto";
 </script>
<style>
.input-group {
	position: relative;
	display: flex;
	flex-wrap: unset;
	align-items: stretch;
	width: 100%;
}
.ew-grid .ew-table>tbody>tr>td, .ew-grid .ew-table>tfoot>tr>td {
	padding: .0rem;
	border-bottom: 1px solid;
	border-top: 0;
	border-left: 0;
	border-right: 1px solid;
	border-color: silver;
}
.text-nowrap {
	white-space: nowrap !important;
	line-height: 1;
	height: 33px;
}
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 25px;
}
</style>
<script>

	function ModeOfPaymentSelected(hh) {

		//alert(hh.value);
		var str = hh.value;
		var res = str.split("###");

		//alert(res[0]);
		if (res[1]==2) {
			document.getElementById("BankDetailsShowHide").style.display = "none";
		} else {
			document.getElementById("BankDetailsShowHide").style.display = "block";
		}
	}

	function BillingTypeSelected(hh) {
		var str = hh.value;
		document.getElementById("SaveBill").innerHTML = 'Create ' + str;
	}

	function SaveBill() {

//	b
//alert('Save Bill');

	for (var i = 1; i < 40; i++) {

	//	var deletebilll = $('*[data-caption="Delete"]');
	//	RowDeleteButton

			var deletebilll =	document.getElementById("RowDeleteButton"+i);
	var QUel =	document.getElementById("x"+i+"_Quantity");
		if(QUel.value=='')
		{

			 // var Services = document.getElementById("lu_x"+i+"_Services");
			    var Services = document.getElementById("sv_x" + i + "_Services");
						Services.innerHTML  = '';
						Services.selectedIndex = '';
						Services.value = '';
						Services.text = '';

					  //  Services.innerHTML  = obj.SERVICE;
					  //  Services.selectedIndex = obj.id;

					 var Services = document.getElementById("x"+i+"_Services");
					 Services.value = '';
						var amount = document.getElementById("x"+i+"_amount");
			amount.value = '';
						var serviceID = document.getElementById("x"+i+"_serviceID");
						serviceID.value = '';
						var sid = document.getElementById("x"+i+"_sid");
						sid.value = '';
						var ItemCode = document.getElementById("x"+i+"_ItemCode");
						ItemCode.value = '';
						var Service_Type = document.getElementById("x"+i+"_Service_Type");
						Service_Type.value = '';
						var Service_Department = document.getElementById("x"+i+"_Service_Department");
						Service_Department.value = '';

			//ew.deleteGridRow(deletebilll, i);
		}
	}

//	var savebillll = $('*[data-caption="Insert"]');
//ew.forms(savebillll).submit('patient_serviceslist.php');
	//	var fk_mrnNoA = getUrlVars()["fk_mrnNo"];
	//	var fk_patient_idA = getUrlVars()["fk_patient_id"];
	//	var fk_idA = getUrlVars()["fk_id"];
	//	var ModeOfPayment = document.getElementById("ModeOfPayment");
	//	var ModeOfPaymentV = ModeOfPayment.value;
	///	var BillingType = document.getElementById("BillingType");
	//	var BillingTypeV = BillingType.value;
	//	var BillAmount = document.getElementById("BillAmount");
	//	var BillAmountV = BillAmount.value;
	//	ew.forms(savebillll).submit('patient_serviceslist.php?showmaster=ip_admission&fk_mrnNo=' + fk_mrnNoA + '&fk_patient_id=' + fk_patient_idA + '&fk_id=' + fk_idA  + '&PBillingType=' + BillingTypeV + '&PBillAmount=' + BillAmountV + '&PModeOfPayment=' + ModeOfPaymentV);
	//	ew.forms(savebillll).submit('patient_serviceslist.php?showmaster=ip_admission&fk_mrnNo=' + fk_mrnNoA + '&fk_patient_id=' + fk_patient_idA + '&fk_id=' + fk_idA + '&PModeOfPayment=' + ModeOfPaymentV + '&PBillingType=' + BillingTypeV + '&PBillAmount=' + BillAmountV);
		//alert('Save Bill ---  AAAAAAA ');

	}

 function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
	});
	return vars;
}

function addtotalSum()
{	
	var totSum = 0;
	for (var i = 1; i < 40; i++) {
			try {
				var amount = document.getElementById("x" + i + "_SubTotal");
				if (amount.value != '') {
					totSum = parseInt(totSum) + parseInt(amount.value);
				}
			}
			catch(err) {
			}
	}
		var BillAmount = document.getElementById("BillAmount");
		BillAmount.value = totSum;
}	
</script>
<div class="row">
		  <div class="col-md-12">
			<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Final Bill / Receipt</h3>
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
<table class="table table-bordered">
	 <tbody>
		<tr hidden ><td style="width: 50%">
			 <div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Mode Of Payment</label>
					<div class="col-sm-8">
			<select class="custom-select" id="ModeOfPayment" name="ModeOfPayment" onchange="ModeOfPaymentSelected(this)">
<?php
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.mas_modepayment;";
$rs = $dbhelper->LoadRecordset($sql);
$optioon = '';
while (!$rs->EOF) {
	$row = &$rs->fields;
	$ModeId =  $row["id"];
	$PayMode =  $row["Mode"];
	$BankingDatails =  $row["BankingDatails"];
	$optioon .= '  <option value="'.$PayMode.'###'.$BankingDatails.'">'.$PayMode.'</option>';
	$rs->MoveNext();
}
echo $optioon;
 ?>
				</select>
						</div>
			 </div>
		  </td>
		 <td style="width: 50%">
<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Billing Type</label>
					<div class="col-sm-8">
			<select class="custom-select"  id="BillingType" name="BillingType"  onchange="BillingTypeSelected(this)">
<?php
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_type;";
$rs = $dbhelper->LoadRecordset($sql);
$optioon = '';
while (!$rs->EOF) {
	$row = &$rs->fields;
	$ModeId =  $row["id"];
	$PayMode =  $row["Type"];
	$optioon .= '  <option value="'.$PayMode.'">'.$PayMode.'</option>';
	$rs->MoveNext();
}
echo $optioon;
 ?>
				</select>
						</div>
			 </div>
		 </td>
		 </tr>
		<tr>
		 <td>
			<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Amount</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="BillAmount" name="BillAmount" placeholder="Amount">
					</div>
			 </div>
		 </td>
		 <td>
			<div class="form-group row">
					<button onclick="SaveBill()" type="button" id="SaveBill" class="btn btn-info">Save</button>
			 </div>
		 </td>
		</tr>
	</tbody>
</table>
 </div>
			  <!-- /.card-body -->
			</div>
			<!-- /.card -->
		  </div>
		  <!-- /.col -->
		</div>
<div class="row" id="BankDetailsShowHide">
		  <div class="col-md-12">
			<div class="card bg-success">
			  <div class="card-header">
				<h3 class="card-title">Bank Details</h3>
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
<table class="table table-bordered">
	 <tbody>
		<tr>
			<td style="width: 25%">
							<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Card/Acc No</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" id="CardAccNo" name="CardAccNo" placeholder="Card/Acc No">
					</div>
			 </div>
			</td>
			 <td style="width: 25%">
				 			<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">BankName</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" id="BankName" name="BankName" placeholder="Bank Name">
					</div>
			 </div>
			</td>
			 <td style="width: 25%">
				 			<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Acc Holder Name</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" id="AccHolderName" name="AccHolderName" placeholder="Acc Holder Name">
					</div>
			 </div>
			</td>
		</tr>
		 <tr>
			<td style="width: 25%">
							<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Type</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" id="BankingType" name="BankingType" placeholder="Type">
					</div>
			 </div>
			</td>
			 <td style="width: 25%">
				 			<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Machine</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" id="Machine" name="Machine" placeholder="Machine">
					</div>
			 </div>
			</td>
			 <td style="width: 25%">
				 			<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Batch No</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" id="BatchNo" name="BatchNo" placeholder="BatchNo">
					</div>
			 </div>
			</td>
		</tr>
		 <tr>
			<td style="width: 25%">
				 			<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Tax</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" id="BankingTax" name="BankingTax" placeholder="Tax">
					</div>
			 </div>
			</td>
				<td style="width: 25%">
				 			<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Deduction Amount</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" id="DeductionAmount" name="DeductionAmount" placeholder="Deduction Amount">
					</div>
			 </div>
			</td>
				<td style="width: 25%">
				 			<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Acc Holder Mobile No</label>
					<div class="col-sm-6">
					  <input type="text" class="form-control" id="AccHolderMobileNo" name="AccHolderMobileNo" placeholder="Acc Holder Mobile No">
					</div>
			 </div>
			</td>
		 </tr>
	</tbody>
</table>
 </div>
			  <!-- /.card-body -->
			</div>
			<!-- /.card -->
		  </div>
		  <!-- /.col -->
		</div>
<script>
	document.getElementById("BankDetailsShowHide").style.display = "none";
	document.getElementById("SaveBill").innerHTML = 'Create Final Bill' ;
	jQuery("#tpd_patient_serviceslist th.ew-list-option-header").each(function() {this.rowSpan = 1});
jQuery("#tpd_patient_serviceslist td.ew-list-option-body").each(function() {this.rowSpan = 1});
</script>
<?php if (!$patient_services->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_services", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_services_list->terminate();
?>