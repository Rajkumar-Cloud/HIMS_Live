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
$patient_services_add = new patient_services_add();

// Run the page
$patient_services_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_services_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_servicesadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatient_servicesadd = currentForm = new ew.Form("fpatient_servicesadd", "add");

	// Validate form
	fpatient_servicesadd.validate = function() {
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
			<?php if ($patient_services_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Reception->caption(), $patient_services_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->Reception->errorMessage()) ?>");
			<?php if ($patient_services_add->Services->Required) { ?>
				elm = this.getElements("x" + infix + "_Services");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Services->caption(), $patient_services_add->Services->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->amount->caption(), $patient_services_add->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->amount->errorMessage()) ?>");
			<?php if ($patient_services_add->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->description->caption(), $patient_services_add->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->patient_type->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->patient_type->caption(), $patient_services_add->patient_type->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->patient_type->errorMessage()) ?>");
			<?php if ($patient_services_add->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->charged_date->caption(), $patient_services_add->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->status->caption(), $patient_services_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->createdby->caption(), $patient_services_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->createddatetime->caption(), $patient_services_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->mrnno->caption(), $patient_services_add->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->PatientName->caption(), $patient_services_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Age->caption(), $patient_services_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Gender->caption(), $patient_services_add->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->profilePic->caption(), $patient_services_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Unit->caption(), $patient_services_add->Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->Unit->errorMessage()) ?>");
			<?php if ($patient_services_add->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Quantity->caption(), $patient_services_add->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->Quantity->errorMessage()) ?>");
			<?php if ($patient_services_add->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Discount->caption(), $patient_services_add->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->Discount->errorMessage()) ?>");
			<?php if ($patient_services_add->SubTotal->Required) { ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->SubTotal->caption(), $patient_services_add->SubTotal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->SubTotal->errorMessage()) ?>");
			<?php if ($patient_services_add->ServiceSelect->Required) { ?>
				elm = this.getElements("x" + infix + "_ServiceSelect[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->ServiceSelect->caption(), $patient_services_add->ServiceSelect->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Aid->Required) { ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Aid->caption(), $patient_services_add->Aid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->Aid->errorMessage()) ?>");
			<?php if ($patient_services_add->Vid->Required) { ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Vid->caption(), $patient_services_add->Vid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->Vid->errorMessage()) ?>");
			<?php if ($patient_services_add->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DrID->caption(), $patient_services_add->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->DrID->errorMessage()) ?>");
			<?php if ($patient_services_add->DrCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_DrCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DrCODE->caption(), $patient_services_add->DrCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->DrName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DrName->caption(), $patient_services_add->DrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Department->caption(), $patient_services_add->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->DrSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DrSharePres->caption(), $patient_services_add->DrSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->DrSharePres->errorMessage()) ?>");
			<?php if ($patient_services_add->HospSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->HospSharePres->caption(), $patient_services_add->HospSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->HospSharePres->errorMessage()) ?>");
			<?php if ($patient_services_add->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DrShareAmount->caption(), $patient_services_add->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->DrShareAmount->errorMessage()) ?>");
			<?php if ($patient_services_add->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->HospShareAmount->caption(), $patient_services_add->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->HospShareAmount->errorMessage()) ?>");
			<?php if ($patient_services_add->DrShareSettiledAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DrShareSettiledAmount->caption(), $patient_services_add->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->DrShareSettiledAmount->errorMessage()) ?>");
			<?php if ($patient_services_add->DrShareSettledId->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DrShareSettledId->caption(), $patient_services_add->DrShareSettledId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->DrShareSettledId->errorMessage()) ?>");
			<?php if ($patient_services_add->DrShareSettiledStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DrShareSettiledStatus->caption(), $patient_services_add->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->DrShareSettiledStatus->errorMessage()) ?>");
			<?php if ($patient_services_add->invoiceId->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->invoiceId->caption(), $patient_services_add->invoiceId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->invoiceId->errorMessage()) ?>");
			<?php if ($patient_services_add->invoiceAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->invoiceAmount->caption(), $patient_services_add->invoiceAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->invoiceAmount->errorMessage()) ?>");
			<?php if ($patient_services_add->invoiceStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->invoiceStatus->caption(), $patient_services_add->invoiceStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->modeOfPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_modeOfPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->modeOfPayment->caption(), $patient_services_add->modeOfPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->HospID->caption(), $patient_services_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->RIDNO->caption(), $patient_services_add->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->RIDNO->errorMessage()) ?>");
			<?php if ($patient_services_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->TidNo->caption(), $patient_services_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->TidNo->errorMessage()) ?>");
			<?php if ($patient_services_add->DiscountCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DiscountCategory->caption(), $patient_services_add->DiscountCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->sid->Required) { ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->sid->caption(), $patient_services_add->sid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->sid->errorMessage()) ?>");
			<?php if ($patient_services_add->ItemCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->ItemCode->caption(), $patient_services_add->ItemCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->TestSubCd->caption(), $patient_services_add->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->DEptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DEptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DEptCd->caption(), $patient_services_add->DEptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->ProfCd->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->ProfCd->caption(), $patient_services_add->ProfCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->LabReport->Required) { ?>
				elm = this.getElements("x" + infix + "_LabReport");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->LabReport->caption(), $patient_services_add->LabReport->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Comments->Required) { ?>
				elm = this.getElements("x" + infix + "_Comments");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Comments->caption(), $patient_services_add->Comments->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Method->caption(), $patient_services_add->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Specimen->Required) { ?>
				elm = this.getElements("x" + infix + "_Specimen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Specimen->caption(), $patient_services_add->Specimen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Abnormal->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Abnormal->caption(), $patient_services_add->Abnormal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->RefValue->Required) { ?>
				elm = this.getElements("x" + infix + "_RefValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->RefValue->caption(), $patient_services_add->RefValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->TestUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_TestUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->TestUnit->caption(), $patient_services_add->TestUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->LOWHIGH->Required) { ?>
				elm = this.getElements("x" + infix + "_LOWHIGH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->LOWHIGH->caption(), $patient_services_add->LOWHIGH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Branch->Required) { ?>
				elm = this.getElements("x" + infix + "_Branch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Branch->caption(), $patient_services_add->Branch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Dispatch->Required) { ?>
				elm = this.getElements("x" + infix + "_Dispatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Dispatch->caption(), $patient_services_add->Dispatch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Pic1->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Pic1->caption(), $patient_services_add->Pic1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Pic2->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Pic2->caption(), $patient_services_add->Pic2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->GraphPath->Required) { ?>
				elm = this.getElements("x" + infix + "_GraphPath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->GraphPath->caption(), $patient_services_add->GraphPath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->MachineCD->Required) { ?>
				elm = this.getElements("x" + infix + "_MachineCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->MachineCD->caption(), $patient_services_add->MachineCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->TestCancel->Required) { ?>
				elm = this.getElements("x" + infix + "_TestCancel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->TestCancel->caption(), $patient_services_add->TestCancel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->OutSource->Required) { ?>
				elm = this.getElements("x" + infix + "_OutSource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->OutSource->caption(), $patient_services_add->OutSource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Printed->Required) { ?>
				elm = this.getElements("x" + infix + "_Printed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Printed->caption(), $patient_services_add->Printed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->PrintBy->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->PrintBy->caption(), $patient_services_add->PrintBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->PrintDate->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->PrintDate->caption(), $patient_services_add->PrintDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->PrintDate->errorMessage()) ?>");
			<?php if ($patient_services_add->BillingDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->BillingDate->caption(), $patient_services_add->BillingDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->BillingDate->errorMessage()) ?>");
			<?php if ($patient_services_add->BilledBy->Required) { ?>
				elm = this.getElements("x" + infix + "_BilledBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->BilledBy->caption(), $patient_services_add->BilledBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Resulted->Required) { ?>
				elm = this.getElements("x" + infix + "_Resulted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Resulted->caption(), $patient_services_add->Resulted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->ResultDate->caption(), $patient_services_add->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->ResultDate->errorMessage()) ?>");
			<?php if ($patient_services_add->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->ResultedBy->caption(), $patient_services_add->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->SampleDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->SampleDate->caption(), $patient_services_add->SampleDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->SampleDate->errorMessage()) ?>");
			<?php if ($patient_services_add->SampleUser->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->SampleUser->caption(), $patient_services_add->SampleUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Sampled->Required) { ?>
				elm = this.getElements("x" + infix + "_Sampled");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Sampled->caption(), $patient_services_add->Sampled->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->ReceivedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->ReceivedDate->caption(), $patient_services_add->ReceivedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->ReceivedDate->errorMessage()) ?>");
			<?php if ($patient_services_add->ReceivedUser->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->ReceivedUser->caption(), $patient_services_add->ReceivedUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Recevied->Required) { ?>
				elm = this.getElements("x" + infix + "_Recevied");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Recevied->caption(), $patient_services_add->Recevied->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->DeptRecvDate->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DeptRecvDate->caption(), $patient_services_add->DeptRecvDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->DeptRecvDate->errorMessage()) ?>");
			<?php if ($patient_services_add->DeptRecvUser->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DeptRecvUser->caption(), $patient_services_add->DeptRecvUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->DeptRecived->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecived");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->DeptRecived->caption(), $patient_services_add->DeptRecived->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->SAuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->SAuthDate->caption(), $patient_services_add->SAuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->SAuthDate->errorMessage()) ?>");
			<?php if ($patient_services_add->SAuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->SAuthBy->caption(), $patient_services_add->SAuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->SAuthendicate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthendicate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->SAuthendicate->caption(), $patient_services_add->SAuthendicate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->AuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->AuthDate->caption(), $patient_services_add->AuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->AuthDate->errorMessage()) ?>");
			<?php if ($patient_services_add->AuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->AuthBy->caption(), $patient_services_add->AuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Authencate->Required) { ?>
				elm = this.getElements("x" + infix + "_Authencate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Authencate->caption(), $patient_services_add->Authencate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->EditDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->EditDate->caption(), $patient_services_add->EditDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->EditDate->errorMessage()) ?>");
			<?php if ($patient_services_add->EditBy->Required) { ?>
				elm = this.getElements("x" + infix + "_EditBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->EditBy->caption(), $patient_services_add->EditBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Editted->Required) { ?>
				elm = this.getElements("x" + infix + "_Editted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Editted->caption(), $patient_services_add->Editted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->PatID->caption(), $patient_services_add->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->PatID->errorMessage()) ?>");
			<?php if ($patient_services_add->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->PatientId->caption(), $patient_services_add->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Mobile->caption(), $patient_services_add->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->CId->caption(), $patient_services_add->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->CId->errorMessage()) ?>");
			<?php if ($patient_services_add->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Order->caption(), $patient_services_add->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->Order->errorMessage()) ?>");
			<?php if ($patient_services_add->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Form->caption(), $patient_services_add->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->ResType->caption(), $patient_services_add->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Sample->caption(), $patient_services_add->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->NoD->caption(), $patient_services_add->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->NoD->errorMessage()) ?>");
			<?php if ($patient_services_add->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->BillOrder->caption(), $patient_services_add->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->BillOrder->errorMessage()) ?>");
			<?php if ($patient_services_add->Formula->Required) { ?>
				elm = this.getElements("x" + infix + "_Formula");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Formula->caption(), $patient_services_add->Formula->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Inactive->caption(), $patient_services_add->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->CollSample->caption(), $patient_services_add->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->TestType->caption(), $patient_services_add->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Repeated->Required) { ?>
				elm = this.getElements("x" + infix + "_Repeated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Repeated->caption(), $patient_services_add->Repeated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->RepeatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->RepeatedBy->caption(), $patient_services_add->RepeatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->RepeatedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->RepeatedDate->caption(), $patient_services_add->RepeatedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->RepeatedDate->errorMessage()) ?>");
			<?php if ($patient_services_add->serviceID->Required) { ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->serviceID->caption(), $patient_services_add->serviceID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->serviceID->errorMessage()) ?>");
			<?php if ($patient_services_add->Service_Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Service_Type->caption(), $patient_services_add->Service_Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->Service_Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->Service_Department->caption(), $patient_services_add->Service_Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_add->RequestNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_add->RequestNo->caption(), $patient_services_add->RequestNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_add->RequestNo->errorMessage()) ?>");

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
	fpatient_servicesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_servicesadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_servicesadd.lists["x_Services"] = <?php echo $patient_services_add->Services->Lookup->toClientList($patient_services_add) ?>;
	fpatient_servicesadd.lists["x_Services"].options = <?php echo JsonEncode($patient_services_add->Services->lookupOptions()) ?>;
	fpatient_servicesadd.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_servicesadd.lists["x_status"] = <?php echo $patient_services_add->status->Lookup->toClientList($patient_services_add) ?>;
	fpatient_servicesadd.lists["x_status"].options = <?php echo JsonEncode($patient_services_add->status->lookupOptions()) ?>;
	fpatient_servicesadd.lists["x_ServiceSelect[]"] = <?php echo $patient_services_add->ServiceSelect->Lookup->toClientList($patient_services_add) ?>;
	fpatient_servicesadd.lists["x_ServiceSelect[]"].options = <?php echo JsonEncode($patient_services_add->ServiceSelect->options(FALSE, TRUE)) ?>;
	loadjs.done("fpatient_servicesadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_services_add->showPageHeader(); ?>
<?php
$patient_services_add->showMessage();
?>
<form name="fpatient_servicesadd" id="fpatient_servicesadd" class="<?php echo $patient_services_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_services_add->IsModal ?>">
<?php if ($patient_services->getCurrentMasterTable() == "billing_voucher") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="billing_voucher">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_services_add->Vid->getSessionValue()) ?>">
<?php } ?>
<?php if ($patient_services->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_services_add->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_services_add->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_services_add->PatID->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_services_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_services_Reception" for="x_Reception" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Reception->caption() ?><?php echo $patient_services_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Reception->cellAttributes() ?>>
<?php if ($patient_services_add->Reception->getSessionValue() != "") { ?>
<span id="el_patient_services_Reception">
<span<?php echo $patient_services_add->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_add->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_services_add->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_services_Reception">
<input type="text" data-table="patient_services" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Reception->EditValue ?>"<?php echo $patient_services_add->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_services_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Services->Visible) { // Services ?>
	<div id="r_Services" class="form-group row">
		<label id="elh_patient_services_Services" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Services->caption() ?><?php echo $patient_services_add->Services->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Services->cellAttributes() ?>>
<span id="el_patient_services_Services">
<?php
$onchange = $patient_services_add->Services->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_services_add->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x_Services">
	<input type="text" class="form-control" name="sv_x_Services" id="sv_x_Services" value="<?php echo RemoveHtml($patient_services_add->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services_add->Services->getPlaceHolder()) ?>"<?php echo $patient_services_add->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services_add->Services->displayValueSeparatorAttribute() ?>" name="x_Services" id="x_Services" value="<?php echo HtmlEncode($patient_services_add->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_servicesadd"], function() {
	fpatient_servicesadd.createAutoSuggest({"id":"x_Services","forceSelect":true});
});
</script>
<?php echo $patient_services_add->Services->Lookup->getParamTag($patient_services_add, "p_x_Services") ?>
</span>
<?php echo $patient_services_add->Services->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_patient_services_amount" for="x_amount" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->amount->caption() ?><?php echo $patient_services_add->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->amount->cellAttributes() ?>>
<span id="el_patient_services_amount">
<input type="text" data-table="patient_services" data-field="x_amount" name="x_amount" id="x_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_add->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->amount->EditValue ?>"<?php echo $patient_services_add->amount->editAttributes() ?>>
</span>
<?php echo $patient_services_add->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_patient_services_description" for="x_description" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->description->caption() ?><?php echo $patient_services_add->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->description->cellAttributes() ?>>
<span id="el_patient_services_description">
<input type="text" data-table="patient_services" data-field="x_description" name="x_description" id="x_description" placeholder="<?php echo HtmlEncode($patient_services_add->description->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->description->EditValue ?>"<?php echo $patient_services_add->description->editAttributes() ?>>
</span>
<?php echo $patient_services_add->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->patient_type->Visible) { // patient_type ?>
	<div id="r_patient_type" class="form-group row">
		<label id="elh_patient_services_patient_type" for="x_patient_type" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->patient_type->caption() ?><?php echo $patient_services_add->patient_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->patient_type->cellAttributes() ?>>
<span id="el_patient_services_patient_type">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x_patient_type" id="x_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->patient_type->EditValue ?>"<?php echo $patient_services_add->patient_type->editAttributes() ?>>
</span>
<?php echo $patient_services_add->patient_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_services_status" for="x_status" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->status->caption() ?><?php echo $patient_services_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->status->cellAttributes() ?>>
<span id="el_patient_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_services_add->status->editAttributes() ?>>
			<?php echo $patient_services_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_services_add->status->Lookup->getParamTag($patient_services_add, "p_x_status") ?>
</span>
<?php echo $patient_services_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_services_mrnno" for="x_mrnno" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->mrnno->caption() ?><?php echo $patient_services_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->mrnno->cellAttributes() ?>>
<?php if ($patient_services_add->mrnno->getSessionValue() != "") { ?>
<span id="el_patient_services_mrnno">
<span<?php echo $patient_services_add->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_add->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_services_add->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_services_mrnno">
<input type="text" data-table="patient_services" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->mrnno->EditValue ?>"<?php echo $patient_services_add->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_services_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_services_PatientName" for="x_PatientName" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->PatientName->caption() ?><?php echo $patient_services_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->PatientName->cellAttributes() ?>>
<span id="el_patient_services_PatientName">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->PatientName->EditValue ?>"<?php echo $patient_services_add->PatientName->editAttributes() ?>>
</span>
<?php echo $patient_services_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_services_Age" for="x_Age" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Age->caption() ?><?php echo $patient_services_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Age->cellAttributes() ?>>
<span id="el_patient_services_Age">
<input type="text" data-table="patient_services" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Age->EditValue ?>"<?php echo $patient_services_add->Age->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_services_Gender" for="x_Gender" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Gender->caption() ?><?php echo $patient_services_add->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Gender->cellAttributes() ?>>
<span id="el_patient_services_Gender">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Gender->EditValue ?>"<?php echo $patient_services_add->Gender->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_services_profilePic" for="x_profilePic" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->profilePic->caption() ?><?php echo $patient_services_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->profilePic->cellAttributes() ?>>
<span id="el_patient_services_profilePic">
<textarea data-table="patient_services" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_services_add->profilePic->getPlaceHolder()) ?>"<?php echo $patient_services_add->profilePic->editAttributes() ?>><?php echo $patient_services_add->profilePic->EditValue ?></textarea>
</span>
<?php echo $patient_services_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Unit->Visible) { // Unit ?>
	<div id="r_Unit" class="form-group row">
		<label id="elh_patient_services_Unit" for="x_Unit" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Unit->caption() ?><?php echo $patient_services_add->Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Unit->cellAttributes() ?>>
<span id="el_patient_services_Unit">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x_Unit" id="x_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Unit->EditValue ?>"<?php echo $patient_services_add->Unit->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_patient_services_Quantity" for="x_Quantity" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Quantity->caption() ?><?php echo $patient_services_add->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Quantity->cellAttributes() ?>>
<span id="el_patient_services_Quantity">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services_add->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Quantity->EditValue ?>"<?php echo $patient_services_add->Quantity->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_patient_services_Discount" for="x_Discount" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Discount->caption() ?><?php echo $patient_services_add->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Discount->cellAttributes() ?>>
<span id="el_patient_services_Discount">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x_Discount" id="x_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_add->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Discount->EditValue ?>"<?php echo $patient_services_add->Discount->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->SubTotal->Visible) { // SubTotal ?>
	<div id="r_SubTotal" class="form-group row">
		<label id="elh_patient_services_SubTotal" for="x_SubTotal" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->SubTotal->caption() ?><?php echo $patient_services_add->SubTotal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->SubTotal->cellAttributes() ?>>
<span id="el_patient_services_SubTotal">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_add->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->SubTotal->EditValue ?>"<?php echo $patient_services_add->SubTotal->editAttributes() ?>>
</span>
<?php echo $patient_services_add->SubTotal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->ServiceSelect->Visible) { // ServiceSelect ?>
	<div id="r_ServiceSelect" class="form-group row">
		<label id="elh_patient_services_ServiceSelect" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->ServiceSelect->caption() ?><?php echo $patient_services_add->ServiceSelect->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->ServiceSelect->cellAttributes() ?>>
<span id="el_patient_services_ServiceSelect">
<div id="tp_x_ServiceSelect" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services_add->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x_ServiceSelect[]" id="x_ServiceSelect[]" value="{value}"<?php echo $patient_services_add->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services_add->ServiceSelect->checkBoxListHtml(FALSE, "x_ServiceSelect[]") ?>
</div></div>
</span>
<?php echo $patient_services_add->ServiceSelect->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Aid->Visible) { // Aid ?>
	<div id="r_Aid" class="form-group row">
		<label id="elh_patient_services_Aid" for="x_Aid" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Aid->caption() ?><?php echo $patient_services_add->Aid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Aid->cellAttributes() ?>>
<span id="el_patient_services_Aid">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x_Aid" id="x_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Aid->EditValue ?>"<?php echo $patient_services_add->Aid->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Aid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Vid->Visible) { // Vid ?>
	<div id="r_Vid" class="form-group row">
		<label id="elh_patient_services_Vid" for="x_Vid" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Vid->caption() ?><?php echo $patient_services_add->Vid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Vid->cellAttributes() ?>>
<?php if ($patient_services_add->Vid->getSessionValue() != "") { ?>
<span id="el_patient_services_Vid">
<span<?php echo $patient_services_add->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_add->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_Vid" name="x_Vid" value="<?php echo HtmlEncode($patient_services_add->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_services_Vid">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x_Vid" id="x_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Vid->EditValue ?>"<?php echo $patient_services_add->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_services_add->Vid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_patient_services_DrID" for="x_DrID" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DrID->caption() ?><?php echo $patient_services_add->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DrID->cellAttributes() ?>>
<span id="el_patient_services_DrID">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DrID->EditValue ?>"<?php echo $patient_services_add->DrID->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DrCODE->Visible) { // DrCODE ?>
	<div id="r_DrCODE" class="form-group row">
		<label id="elh_patient_services_DrCODE" for="x_DrCODE" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DrCODE->caption() ?><?php echo $patient_services_add->DrCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DrCODE->cellAttributes() ?>>
<span id="el_patient_services_DrCODE">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x_DrCODE" id="x_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DrCODE->EditValue ?>"<?php echo $patient_services_add->DrCODE->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DrCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label id="elh_patient_services_DrName" for="x_DrName" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DrName->caption() ?><?php echo $patient_services_add->DrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DrName->cellAttributes() ?>>
<span id="el_patient_services_DrName">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DrName->EditValue ?>"<?php echo $patient_services_add->DrName->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh_patient_services_Department" for="x_Department" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Department->caption() ?><?php echo $patient_services_add->Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Department->cellAttributes() ?>>
<span id="el_patient_services_Department">
<input type="text" data-table="patient_services" data-field="x_Department" name="x_Department" id="x_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Department->EditValue ?>"<?php echo $patient_services_add->Department->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DrSharePres->Visible) { // DrSharePres ?>
	<div id="r_DrSharePres" class="form-group row">
		<label id="elh_patient_services_DrSharePres" for="x_DrSharePres" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DrSharePres->caption() ?><?php echo $patient_services_add->DrSharePres->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DrSharePres->cellAttributes() ?>>
<span id="el_patient_services_DrSharePres">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x_DrSharePres" id="x_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DrSharePres->EditValue ?>"<?php echo $patient_services_add->DrSharePres->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DrSharePres->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->HospSharePres->Visible) { // HospSharePres ?>
	<div id="r_HospSharePres" class="form-group row">
		<label id="elh_patient_services_HospSharePres" for="x_HospSharePres" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->HospSharePres->caption() ?><?php echo $patient_services_add->HospSharePres->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->HospSharePres->cellAttributes() ?>>
<span id="el_patient_services_HospSharePres">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x_HospSharePres" id="x_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->HospSharePres->EditValue ?>"<?php echo $patient_services_add->HospSharePres->editAttributes() ?>>
</span>
<?php echo $patient_services_add->HospSharePres->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label id="elh_patient_services_DrShareAmount" for="x_DrShareAmount" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DrShareAmount->caption() ?><?php echo $patient_services_add->DrShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DrShareAmount->cellAttributes() ?>>
<span id="el_patient_services_DrShareAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DrShareAmount->EditValue ?>"<?php echo $patient_services_add->DrShareAmount->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label id="elh_patient_services_HospShareAmount" for="x_HospShareAmount" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->HospShareAmount->caption() ?><?php echo $patient_services_add->HospShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->HospShareAmount->cellAttributes() ?>>
<span id="el_patient_services_HospShareAmount">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->HospShareAmount->EditValue ?>"<?php echo $patient_services_add->HospShareAmount->editAttributes() ?>>
</span>
<?php echo $patient_services_add->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<div id="r_DrShareSettiledAmount" class="form-group row">
		<label id="elh_patient_services_DrShareSettiledAmount" for="x_DrShareSettiledAmount" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DrShareSettiledAmount->caption() ?><?php echo $patient_services_add->DrShareSettiledAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettiledAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x_DrShareSettiledAmount" id="x_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services_add->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DrShareSettiledAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<div id="r_DrShareSettledId" class="form-group row">
		<label id="elh_patient_services_DrShareSettledId" for="x_DrShareSettledId" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DrShareSettledId->caption() ?><?php echo $patient_services_add->DrShareSettledId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DrShareSettledId->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettledId">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x_DrShareSettledId" id="x_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DrShareSettledId->EditValue ?>"<?php echo $patient_services_add->DrShareSettledId->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DrShareSettledId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<div id="r_DrShareSettiledStatus" class="form-group row">
		<label id="elh_patient_services_DrShareSettiledStatus" for="x_DrShareSettiledStatus" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DrShareSettiledStatus->caption() ?><?php echo $patient_services_add->DrShareSettiledStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettiledStatus">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x_DrShareSettiledStatus" id="x_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services_add->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DrShareSettiledStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->invoiceId->Visible) { // invoiceId ?>
	<div id="r_invoiceId" class="form-group row">
		<label id="elh_patient_services_invoiceId" for="x_invoiceId" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->invoiceId->caption() ?><?php echo $patient_services_add->invoiceId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->invoiceId->cellAttributes() ?>>
<span id="el_patient_services_invoiceId">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->invoiceId->EditValue ?>"<?php echo $patient_services_add->invoiceId->editAttributes() ?>>
</span>
<?php echo $patient_services_add->invoiceId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->invoiceAmount->Visible) { // invoiceAmount ?>
	<div id="r_invoiceAmount" class="form-group row">
		<label id="elh_patient_services_invoiceAmount" for="x_invoiceAmount" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->invoiceAmount->caption() ?><?php echo $patient_services_add->invoiceAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->invoiceAmount->cellAttributes() ?>>
<span id="el_patient_services_invoiceAmount">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->invoiceAmount->EditValue ?>"<?php echo $patient_services_add->invoiceAmount->editAttributes() ?>>
</span>
<?php echo $patient_services_add->invoiceAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->invoiceStatus->Visible) { // invoiceStatus ?>
	<div id="r_invoiceStatus" class="form-group row">
		<label id="elh_patient_services_invoiceStatus" for="x_invoiceStatus" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->invoiceStatus->caption() ?><?php echo $patient_services_add->invoiceStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->invoiceStatus->cellAttributes() ?>>
<span id="el_patient_services_invoiceStatus">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->invoiceStatus->EditValue ?>"<?php echo $patient_services_add->invoiceStatus->editAttributes() ?>>
</span>
<?php echo $patient_services_add->invoiceStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->modeOfPayment->Visible) { // modeOfPayment ?>
	<div id="r_modeOfPayment" class="form-group row">
		<label id="elh_patient_services_modeOfPayment" for="x_modeOfPayment" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->modeOfPayment->caption() ?><?php echo $patient_services_add->modeOfPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->modeOfPayment->cellAttributes() ?>>
<span id="el_patient_services_modeOfPayment">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->modeOfPayment->EditValue ?>"<?php echo $patient_services_add->modeOfPayment->editAttributes() ?>>
</span>
<?php echo $patient_services_add->modeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_patient_services_RIDNO" for="x_RIDNO" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->RIDNO->caption() ?><?php echo $patient_services_add->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->RIDNO->cellAttributes() ?>>
<span id="el_patient_services_RIDNO">
<input type="text" data-table="patient_services" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->RIDNO->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->RIDNO->EditValue ?>"<?php echo $patient_services_add->RIDNO->editAttributes() ?>>
</span>
<?php echo $patient_services_add->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_patient_services_TidNo" for="x_TidNo" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->TidNo->caption() ?><?php echo $patient_services_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->TidNo->cellAttributes() ?>>
<span id="el_patient_services_TidNo">
<input type="text" data-table="patient_services" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->TidNo->EditValue ?>"<?php echo $patient_services_add->TidNo->editAttributes() ?>>
</span>
<?php echo $patient_services_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DiscountCategory->Visible) { // DiscountCategory ?>
	<div id="r_DiscountCategory" class="form-group row">
		<label id="elh_patient_services_DiscountCategory" for="x_DiscountCategory" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DiscountCategory->caption() ?><?php echo $patient_services_add->DiscountCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DiscountCategory->cellAttributes() ?>>
<span id="el_patient_services_DiscountCategory">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x_DiscountCategory" id="x_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DiscountCategory->EditValue ?>"<?php echo $patient_services_add->DiscountCategory->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DiscountCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label id="elh_patient_services_sid" for="x_sid" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->sid->caption() ?><?php echo $patient_services_add->sid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->sid->cellAttributes() ?>>
<span id="el_patient_services_sid">
<input type="text" data-table="patient_services" data-field="x_sid" name="x_sid" id="x_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_add->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->sid->EditValue ?>"<?php echo $patient_services_add->sid->editAttributes() ?>>
</span>
<?php echo $patient_services_add->sid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->ItemCode->Visible) { // ItemCode ?>
	<div id="r_ItemCode" class="form-group row">
		<label id="elh_patient_services_ItemCode" for="x_ItemCode" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->ItemCode->caption() ?><?php echo $patient_services_add->ItemCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->ItemCode->cellAttributes() ?>>
<span id="el_patient_services_ItemCode">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_add->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->ItemCode->EditValue ?>"<?php echo $patient_services_add->ItemCode->editAttributes() ?>>
</span>
<?php echo $patient_services_add->ItemCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_patient_services_TestSubCd" for="x_TestSubCd" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->TestSubCd->caption() ?><?php echo $patient_services_add->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->TestSubCd->cellAttributes() ?>>
<span id="el_patient_services_TestSubCd">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->TestSubCd->EditValue ?>"<?php echo $patient_services_add->TestSubCd->editAttributes() ?>>
</span>
<?php echo $patient_services_add->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label id="elh_patient_services_DEptCd" for="x_DEptCd" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DEptCd->caption() ?><?php echo $patient_services_add->DEptCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DEptCd->cellAttributes() ?>>
<span id="el_patient_services_DEptCd">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DEptCd->EditValue ?>"<?php echo $patient_services_add->DEptCd->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DEptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->ProfCd->Visible) { // ProfCd ?>
	<div id="r_ProfCd" class="form-group row">
		<label id="elh_patient_services_ProfCd" for="x_ProfCd" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->ProfCd->caption() ?><?php echo $patient_services_add->ProfCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->ProfCd->cellAttributes() ?>>
<span id="el_patient_services_ProfCd">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->ProfCd->EditValue ?>"<?php echo $patient_services_add->ProfCd->editAttributes() ?>>
</span>
<?php echo $patient_services_add->ProfCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->LabReport->Visible) { // LabReport ?>
	<div id="r_LabReport" class="form-group row">
		<label id="elh_patient_services_LabReport" for="x_LabReport" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->LabReport->caption() ?><?php echo $patient_services_add->LabReport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->LabReport->cellAttributes() ?>>
<span id="el_patient_services_LabReport">
<textarea data-table="patient_services" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_services_add->LabReport->getPlaceHolder()) ?>"<?php echo $patient_services_add->LabReport->editAttributes() ?>><?php echo $patient_services_add->LabReport->EditValue ?></textarea>
</span>
<?php echo $patient_services_add->LabReport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label id="elh_patient_services_Comments" for="x_Comments" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Comments->caption() ?><?php echo $patient_services_add->Comments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Comments->cellAttributes() ?>>
<span id="el_patient_services_Comments">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Comments->EditValue ?>"<?php echo $patient_services_add->Comments->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Comments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_patient_services_Method" for="x_Method" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Method->caption() ?><?php echo $patient_services_add->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Method->cellAttributes() ?>>
<span id="el_patient_services_Method">
<input type="text" data-table="patient_services" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Method->EditValue ?>"<?php echo $patient_services_add->Method->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Specimen->Visible) { // Specimen ?>
	<div id="r_Specimen" class="form-group row">
		<label id="elh_patient_services_Specimen" for="x_Specimen" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Specimen->caption() ?><?php echo $patient_services_add->Specimen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Specimen->cellAttributes() ?>>
<span id="el_patient_services_Specimen">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Specimen->EditValue ?>"<?php echo $patient_services_add->Specimen->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Specimen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label id="elh_patient_services_Abnormal" for="x_Abnormal" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Abnormal->caption() ?><?php echo $patient_services_add->Abnormal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Abnormal->cellAttributes() ?>>
<span id="el_patient_services_Abnormal">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Abnormal->EditValue ?>"<?php echo $patient_services_add->Abnormal->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Abnormal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_patient_services_RefValue" for="x_RefValue" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->RefValue->caption() ?><?php echo $patient_services_add->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->RefValue->cellAttributes() ?>>
<span id="el_patient_services_RefValue">
<textarea data-table="patient_services" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_services_add->RefValue->getPlaceHolder()) ?>"<?php echo $patient_services_add->RefValue->editAttributes() ?>><?php echo $patient_services_add->RefValue->EditValue ?></textarea>
</span>
<?php echo $patient_services_add->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->TestUnit->Visible) { // TestUnit ?>
	<div id="r_TestUnit" class="form-group row">
		<label id="elh_patient_services_TestUnit" for="x_TestUnit" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->TestUnit->caption() ?><?php echo $patient_services_add->TestUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->TestUnit->cellAttributes() ?>>
<span id="el_patient_services_TestUnit">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x_TestUnit" id="x_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->TestUnit->EditValue ?>"<?php echo $patient_services_add->TestUnit->editAttributes() ?>>
</span>
<?php echo $patient_services_add->TestUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->LOWHIGH->Visible) { // LOWHIGH ?>
	<div id="r_LOWHIGH" class="form-group row">
		<label id="elh_patient_services_LOWHIGH" for="x_LOWHIGH" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->LOWHIGH->caption() ?><?php echo $patient_services_add->LOWHIGH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->LOWHIGH->cellAttributes() ?>>
<span id="el_patient_services_LOWHIGH">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->LOWHIGH->EditValue ?>"<?php echo $patient_services_add->LOWHIGH->editAttributes() ?>>
</span>
<?php echo $patient_services_add->LOWHIGH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Branch->Visible) { // Branch ?>
	<div id="r_Branch" class="form-group row">
		<label id="elh_patient_services_Branch" for="x_Branch" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Branch->caption() ?><?php echo $patient_services_add->Branch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Branch->cellAttributes() ?>>
<span id="el_patient_services_Branch">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Branch->EditValue ?>"<?php echo $patient_services_add->Branch->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Branch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Dispatch->Visible) { // Dispatch ?>
	<div id="r_Dispatch" class="form-group row">
		<label id="elh_patient_services_Dispatch" for="x_Dispatch" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Dispatch->caption() ?><?php echo $patient_services_add->Dispatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Dispatch->cellAttributes() ?>>
<span id="el_patient_services_Dispatch">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Dispatch->EditValue ?>"<?php echo $patient_services_add->Dispatch->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Dispatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Pic1->Visible) { // Pic1 ?>
	<div id="r_Pic1" class="form-group row">
		<label id="elh_patient_services_Pic1" for="x_Pic1" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Pic1->caption() ?><?php echo $patient_services_add->Pic1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Pic1->cellAttributes() ?>>
<span id="el_patient_services_Pic1">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Pic1->EditValue ?>"<?php echo $patient_services_add->Pic1->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Pic1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Pic2->Visible) { // Pic2 ?>
	<div id="r_Pic2" class="form-group row">
		<label id="elh_patient_services_Pic2" for="x_Pic2" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Pic2->caption() ?><?php echo $patient_services_add->Pic2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Pic2->cellAttributes() ?>>
<span id="el_patient_services_Pic2">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Pic2->EditValue ?>"<?php echo $patient_services_add->Pic2->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Pic2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->GraphPath->Visible) { // GraphPath ?>
	<div id="r_GraphPath" class="form-group row">
		<label id="elh_patient_services_GraphPath" for="x_GraphPath" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->GraphPath->caption() ?><?php echo $patient_services_add->GraphPath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->GraphPath->cellAttributes() ?>>
<span id="el_patient_services_GraphPath">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->GraphPath->EditValue ?>"<?php echo $patient_services_add->GraphPath->editAttributes() ?>>
</span>
<?php echo $patient_services_add->GraphPath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->MachineCD->Visible) { // MachineCD ?>
	<div id="r_MachineCD" class="form-group row">
		<label id="elh_patient_services_MachineCD" for="x_MachineCD" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->MachineCD->caption() ?><?php echo $patient_services_add->MachineCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->MachineCD->cellAttributes() ?>>
<span id="el_patient_services_MachineCD">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->MachineCD->EditValue ?>"<?php echo $patient_services_add->MachineCD->editAttributes() ?>>
</span>
<?php echo $patient_services_add->MachineCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->TestCancel->Visible) { // TestCancel ?>
	<div id="r_TestCancel" class="form-group row">
		<label id="elh_patient_services_TestCancel" for="x_TestCancel" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->TestCancel->caption() ?><?php echo $patient_services_add->TestCancel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->TestCancel->cellAttributes() ?>>
<span id="el_patient_services_TestCancel">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->TestCancel->EditValue ?>"<?php echo $patient_services_add->TestCancel->editAttributes() ?>>
</span>
<?php echo $patient_services_add->TestCancel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->OutSource->Visible) { // OutSource ?>
	<div id="r_OutSource" class="form-group row">
		<label id="elh_patient_services_OutSource" for="x_OutSource" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->OutSource->caption() ?><?php echo $patient_services_add->OutSource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->OutSource->cellAttributes() ?>>
<span id="el_patient_services_OutSource">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->OutSource->EditValue ?>"<?php echo $patient_services_add->OutSource->editAttributes() ?>>
</span>
<?php echo $patient_services_add->OutSource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Printed->Visible) { // Printed ?>
	<div id="r_Printed" class="form-group row">
		<label id="elh_patient_services_Printed" for="x_Printed" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Printed->caption() ?><?php echo $patient_services_add->Printed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Printed->cellAttributes() ?>>
<span id="el_patient_services_Printed">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Printed->EditValue ?>"<?php echo $patient_services_add->Printed->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Printed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->PrintBy->Visible) { // PrintBy ?>
	<div id="r_PrintBy" class="form-group row">
		<label id="elh_patient_services_PrintBy" for="x_PrintBy" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->PrintBy->caption() ?><?php echo $patient_services_add->PrintBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->PrintBy->cellAttributes() ?>>
<span id="el_patient_services_PrintBy">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->PrintBy->EditValue ?>"<?php echo $patient_services_add->PrintBy->editAttributes() ?>>
</span>
<?php echo $patient_services_add->PrintBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->PrintDate->Visible) { // PrintDate ?>
	<div id="r_PrintDate" class="form-group row">
		<label id="elh_patient_services_PrintDate" for="x_PrintDate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->PrintDate->caption() ?><?php echo $patient_services_add->PrintDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->PrintDate->cellAttributes() ?>>
<span id="el_patient_services_PrintDate">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?php echo HtmlEncode($patient_services_add->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->PrintDate->EditValue ?>"<?php echo $patient_services_add->PrintDate->editAttributes() ?>>
<?php if (!$patient_services_add->PrintDate->ReadOnly && !$patient_services_add->PrintDate->Disabled && !isset($patient_services_add->PrintDate->EditAttrs["readonly"]) && !isset($patient_services_add->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesadd", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_services_add->PrintDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->BillingDate->Visible) { // BillingDate ?>
	<div id="r_BillingDate" class="form-group row">
		<label id="elh_patient_services_BillingDate" for="x_BillingDate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->BillingDate->caption() ?><?php echo $patient_services_add->BillingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->BillingDate->cellAttributes() ?>>
<span id="el_patient_services_BillingDate">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x_BillingDate" id="x_BillingDate" placeholder="<?php echo HtmlEncode($patient_services_add->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->BillingDate->EditValue ?>"<?php echo $patient_services_add->BillingDate->editAttributes() ?>>
<?php if (!$patient_services_add->BillingDate->ReadOnly && !$patient_services_add->BillingDate->Disabled && !isset($patient_services_add->BillingDate->EditAttrs["readonly"]) && !isset($patient_services_add->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesadd", "x_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_services_add->BillingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->BilledBy->Visible) { // BilledBy ?>
	<div id="r_BilledBy" class="form-group row">
		<label id="elh_patient_services_BilledBy" for="x_BilledBy" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->BilledBy->caption() ?><?php echo $patient_services_add->BilledBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->BilledBy->cellAttributes() ?>>
<span id="el_patient_services_BilledBy">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x_BilledBy" id="x_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->BilledBy->EditValue ?>"<?php echo $patient_services_add->BilledBy->editAttributes() ?>>
</span>
<?php echo $patient_services_add->BilledBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Resulted->Visible) { // Resulted ?>
	<div id="r_Resulted" class="form-group row">
		<label id="elh_patient_services_Resulted" for="x_Resulted" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Resulted->caption() ?><?php echo $patient_services_add->Resulted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Resulted->cellAttributes() ?>>
<span id="el_patient_services_Resulted">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x_Resulted" id="x_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Resulted->EditValue ?>"<?php echo $patient_services_add->Resulted->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Resulted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label id="elh_patient_services_ResultDate" for="x_ResultDate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->ResultDate->caption() ?><?php echo $patient_services_add->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->ResultDate->cellAttributes() ?>>
<span id="el_patient_services_ResultDate">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($patient_services_add->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->ResultDate->EditValue ?>"<?php echo $patient_services_add->ResultDate->editAttributes() ?>>
<?php if (!$patient_services_add->ResultDate->ReadOnly && !$patient_services_add->ResultDate->Disabled && !isset($patient_services_add->ResultDate->EditAttrs["readonly"]) && !isset($patient_services_add->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesadd", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_services_add->ResultDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->ResultedBy->Visible) { // ResultedBy ?>
	<div id="r_ResultedBy" class="form-group row">
		<label id="elh_patient_services_ResultedBy" for="x_ResultedBy" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->ResultedBy->caption() ?><?php echo $patient_services_add->ResultedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->ResultedBy->cellAttributes() ?>>
<span id="el_patient_services_ResultedBy">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->ResultedBy->EditValue ?>"<?php echo $patient_services_add->ResultedBy->editAttributes() ?>>
</span>
<?php echo $patient_services_add->ResultedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->SampleDate->Visible) { // SampleDate ?>
	<div id="r_SampleDate" class="form-group row">
		<label id="elh_patient_services_SampleDate" for="x_SampleDate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->SampleDate->caption() ?><?php echo $patient_services_add->SampleDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->SampleDate->cellAttributes() ?>>
<span id="el_patient_services_SampleDate">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?php echo HtmlEncode($patient_services_add->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->SampleDate->EditValue ?>"<?php echo $patient_services_add->SampleDate->editAttributes() ?>>
<?php if (!$patient_services_add->SampleDate->ReadOnly && !$patient_services_add->SampleDate->Disabled && !isset($patient_services_add->SampleDate->EditAttrs["readonly"]) && !isset($patient_services_add->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesadd", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_services_add->SampleDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->SampleUser->Visible) { // SampleUser ?>
	<div id="r_SampleUser" class="form-group row">
		<label id="elh_patient_services_SampleUser" for="x_SampleUser" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->SampleUser->caption() ?><?php echo $patient_services_add->SampleUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->SampleUser->cellAttributes() ?>>
<span id="el_patient_services_SampleUser">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->SampleUser->EditValue ?>"<?php echo $patient_services_add->SampleUser->editAttributes() ?>>
</span>
<?php echo $patient_services_add->SampleUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Sampled->Visible) { // Sampled ?>
	<div id="r_Sampled" class="form-group row">
		<label id="elh_patient_services_Sampled" for="x_Sampled" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Sampled->caption() ?><?php echo $patient_services_add->Sampled->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Sampled->cellAttributes() ?>>
<span id="el_patient_services_Sampled">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x_Sampled" id="x_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Sampled->EditValue ?>"<?php echo $patient_services_add->Sampled->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Sampled->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->ReceivedDate->Visible) { // ReceivedDate ?>
	<div id="r_ReceivedDate" class="form-group row">
		<label id="elh_patient_services_ReceivedDate" for="x_ReceivedDate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->ReceivedDate->caption() ?><?php echo $patient_services_add->ReceivedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->ReceivedDate->cellAttributes() ?>>
<span id="el_patient_services_ReceivedDate">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services_add->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->ReceivedDate->EditValue ?>"<?php echo $patient_services_add->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services_add->ReceivedDate->ReadOnly && !$patient_services_add->ReceivedDate->Disabled && !isset($patient_services_add->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services_add->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesadd", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_services_add->ReceivedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->ReceivedUser->Visible) { // ReceivedUser ?>
	<div id="r_ReceivedUser" class="form-group row">
		<label id="elh_patient_services_ReceivedUser" for="x_ReceivedUser" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->ReceivedUser->caption() ?><?php echo $patient_services_add->ReceivedUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->ReceivedUser->cellAttributes() ?>>
<span id="el_patient_services_ReceivedUser">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->ReceivedUser->EditValue ?>"<?php echo $patient_services_add->ReceivedUser->editAttributes() ?>>
</span>
<?php echo $patient_services_add->ReceivedUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Recevied->Visible) { // Recevied ?>
	<div id="r_Recevied" class="form-group row">
		<label id="elh_patient_services_Recevied" for="x_Recevied" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Recevied->caption() ?><?php echo $patient_services_add->Recevied->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Recevied->cellAttributes() ?>>
<span id="el_patient_services_Recevied">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x_Recevied" id="x_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Recevied->EditValue ?>"<?php echo $patient_services_add->Recevied->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Recevied->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<div id="r_DeptRecvDate" class="form-group row">
		<label id="elh_patient_services_DeptRecvDate" for="x_DeptRecvDate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DeptRecvDate->caption() ?><?php echo $patient_services_add->DeptRecvDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DeptRecvDate->cellAttributes() ?>>
<span id="el_patient_services_DeptRecvDate">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services_add->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DeptRecvDate->EditValue ?>"<?php echo $patient_services_add->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services_add->DeptRecvDate->ReadOnly && !$patient_services_add->DeptRecvDate->Disabled && !isset($patient_services_add->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services_add->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesadd", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_services_add->DeptRecvDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<div id="r_DeptRecvUser" class="form-group row">
		<label id="elh_patient_services_DeptRecvUser" for="x_DeptRecvUser" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DeptRecvUser->caption() ?><?php echo $patient_services_add->DeptRecvUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DeptRecvUser->cellAttributes() ?>>
<span id="el_patient_services_DeptRecvUser">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DeptRecvUser->EditValue ?>"<?php echo $patient_services_add->DeptRecvUser->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DeptRecvUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->DeptRecived->Visible) { // DeptRecived ?>
	<div id="r_DeptRecived" class="form-group row">
		<label id="elh_patient_services_DeptRecived" for="x_DeptRecived" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->DeptRecived->caption() ?><?php echo $patient_services_add->DeptRecived->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->DeptRecived->cellAttributes() ?>>
<span id="el_patient_services_DeptRecived">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x_DeptRecived" id="x_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->DeptRecived->EditValue ?>"<?php echo $patient_services_add->DeptRecived->editAttributes() ?>>
</span>
<?php echo $patient_services_add->DeptRecived->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->SAuthDate->Visible) { // SAuthDate ?>
	<div id="r_SAuthDate" class="form-group row">
		<label id="elh_patient_services_SAuthDate" for="x_SAuthDate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->SAuthDate->caption() ?><?php echo $patient_services_add->SAuthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->SAuthDate->cellAttributes() ?>>
<span id="el_patient_services_SAuthDate">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services_add->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->SAuthDate->EditValue ?>"<?php echo $patient_services_add->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services_add->SAuthDate->ReadOnly && !$patient_services_add->SAuthDate->Disabled && !isset($patient_services_add->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services_add->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesadd", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_services_add->SAuthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->SAuthBy->Visible) { // SAuthBy ?>
	<div id="r_SAuthBy" class="form-group row">
		<label id="elh_patient_services_SAuthBy" for="x_SAuthBy" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->SAuthBy->caption() ?><?php echo $patient_services_add->SAuthBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->SAuthBy->cellAttributes() ?>>
<span id="el_patient_services_SAuthBy">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->SAuthBy->EditValue ?>"<?php echo $patient_services_add->SAuthBy->editAttributes() ?>>
</span>
<?php echo $patient_services_add->SAuthBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->SAuthendicate->Visible) { // SAuthendicate ?>
	<div id="r_SAuthendicate" class="form-group row">
		<label id="elh_patient_services_SAuthendicate" for="x_SAuthendicate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->SAuthendicate->caption() ?><?php echo $patient_services_add->SAuthendicate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->SAuthendicate->cellAttributes() ?>>
<span id="el_patient_services_SAuthendicate">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x_SAuthendicate" id="x_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->SAuthendicate->EditValue ?>"<?php echo $patient_services_add->SAuthendicate->editAttributes() ?>>
</span>
<?php echo $patient_services_add->SAuthendicate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->AuthDate->Visible) { // AuthDate ?>
	<div id="r_AuthDate" class="form-group row">
		<label id="elh_patient_services_AuthDate" for="x_AuthDate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->AuthDate->caption() ?><?php echo $patient_services_add->AuthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->AuthDate->cellAttributes() ?>>
<span id="el_patient_services_AuthDate">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?php echo HtmlEncode($patient_services_add->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->AuthDate->EditValue ?>"<?php echo $patient_services_add->AuthDate->editAttributes() ?>>
<?php if (!$patient_services_add->AuthDate->ReadOnly && !$patient_services_add->AuthDate->Disabled && !isset($patient_services_add->AuthDate->EditAttrs["readonly"]) && !isset($patient_services_add->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesadd", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_services_add->AuthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->AuthBy->Visible) { // AuthBy ?>
	<div id="r_AuthBy" class="form-group row">
		<label id="elh_patient_services_AuthBy" for="x_AuthBy" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->AuthBy->caption() ?><?php echo $patient_services_add->AuthBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->AuthBy->cellAttributes() ?>>
<span id="el_patient_services_AuthBy">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->AuthBy->EditValue ?>"<?php echo $patient_services_add->AuthBy->editAttributes() ?>>
</span>
<?php echo $patient_services_add->AuthBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Authencate->Visible) { // Authencate ?>
	<div id="r_Authencate" class="form-group row">
		<label id="elh_patient_services_Authencate" for="x_Authencate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Authencate->caption() ?><?php echo $patient_services_add->Authencate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Authencate->cellAttributes() ?>>
<span id="el_patient_services_Authencate">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x_Authencate" id="x_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Authencate->EditValue ?>"<?php echo $patient_services_add->Authencate->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Authencate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label id="elh_patient_services_EditDate" for="x_EditDate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->EditDate->caption() ?><?php echo $patient_services_add->EditDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->EditDate->cellAttributes() ?>>
<span id="el_patient_services_EditDate">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($patient_services_add->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->EditDate->EditValue ?>"<?php echo $patient_services_add->EditDate->editAttributes() ?>>
<?php if (!$patient_services_add->EditDate->ReadOnly && !$patient_services_add->EditDate->Disabled && !isset($patient_services_add->EditDate->EditAttrs["readonly"]) && !isset($patient_services_add->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesadd", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_services_add->EditDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->EditBy->Visible) { // EditBy ?>
	<div id="r_EditBy" class="form-group row">
		<label id="elh_patient_services_EditBy" for="x_EditBy" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->EditBy->caption() ?><?php echo $patient_services_add->EditBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->EditBy->cellAttributes() ?>>
<span id="el_patient_services_EditBy">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x_EditBy" id="x_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->EditBy->EditValue ?>"<?php echo $patient_services_add->EditBy->editAttributes() ?>>
</span>
<?php echo $patient_services_add->EditBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Editted->Visible) { // Editted ?>
	<div id="r_Editted" class="form-group row">
		<label id="elh_patient_services_Editted" for="x_Editted" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Editted->caption() ?><?php echo $patient_services_add->Editted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Editted->cellAttributes() ?>>
<span id="el_patient_services_Editted">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x_Editted" id="x_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Editted->EditValue ?>"<?php echo $patient_services_add->Editted->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Editted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_services_PatID" for="x_PatID" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->PatID->caption() ?><?php echo $patient_services_add->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->PatID->cellAttributes() ?>>
<?php if ($patient_services_add->PatID->getSessionValue() != "") { ?>
<span id="el_patient_services_PatID">
<span<?php echo $patient_services_add->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_add->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_PatID" name="x_PatID" value="<?php echo HtmlEncode($patient_services_add->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_services_PatID">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->PatID->EditValue ?>"<?php echo $patient_services_add->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_services_add->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_services_PatientId" for="x_PatientId" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->PatientId->caption() ?><?php echo $patient_services_add->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->PatientId->cellAttributes() ?>>
<span id="el_patient_services_PatientId">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->PatientId->EditValue ?>"<?php echo $patient_services_add->PatientId->editAttributes() ?>>
</span>
<?php echo $patient_services_add->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_patient_services_Mobile" for="x_Mobile" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Mobile->caption() ?><?php echo $patient_services_add->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Mobile->cellAttributes() ?>>
<span id="el_patient_services_Mobile">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Mobile->EditValue ?>"<?php echo $patient_services_add->Mobile->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_patient_services_CId" for="x_CId" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->CId->caption() ?><?php echo $patient_services_add->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->CId->cellAttributes() ?>>
<span id="el_patient_services_CId">
<input type="text" data-table="patient_services" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->CId->EditValue ?>"<?php echo $patient_services_add->CId->editAttributes() ?>>
</span>
<?php echo $patient_services_add->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_patient_services_Order" for="x_Order" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Order->caption() ?><?php echo $patient_services_add->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Order->cellAttributes() ?>>
<span id="el_patient_services_Order">
<input type="text" data-table="patient_services" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Order->EditValue ?>"<?php echo $patient_services_add->Order->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_patient_services_Form" for="x_Form" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Form->caption() ?><?php echo $patient_services_add->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Form->cellAttributes() ?>>
<span id="el_patient_services_Form">
<textarea data-table="patient_services" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_services_add->Form->getPlaceHolder()) ?>"<?php echo $patient_services_add->Form->editAttributes() ?>><?php echo $patient_services_add->Form->EditValue ?></textarea>
</span>
<?php echo $patient_services_add->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_patient_services_ResType" for="x_ResType" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->ResType->caption() ?><?php echo $patient_services_add->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->ResType->cellAttributes() ?>>
<span id="el_patient_services_ResType">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->ResType->EditValue ?>"<?php echo $patient_services_add->ResType->editAttributes() ?>>
</span>
<?php echo $patient_services_add->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_patient_services_Sample" for="x_Sample" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Sample->caption() ?><?php echo $patient_services_add->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Sample->cellAttributes() ?>>
<span id="el_patient_services_Sample">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services_add->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Sample->EditValue ?>"<?php echo $patient_services_add->Sample->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_patient_services_NoD" for="x_NoD" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->NoD->caption() ?><?php echo $patient_services_add->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->NoD->cellAttributes() ?>>
<span id="el_patient_services_NoD">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->NoD->EditValue ?>"<?php echo $patient_services_add->NoD->editAttributes() ?>>
</span>
<?php echo $patient_services_add->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_patient_services_BillOrder" for="x_BillOrder" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->BillOrder->caption() ?><?php echo $patient_services_add->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->BillOrder->cellAttributes() ?>>
<span id="el_patient_services_BillOrder">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->BillOrder->EditValue ?>"<?php echo $patient_services_add->BillOrder->editAttributes() ?>>
</span>
<?php echo $patient_services_add->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_patient_services_Formula" for="x_Formula" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Formula->caption() ?><?php echo $patient_services_add->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Formula->cellAttributes() ?>>
<span id="el_patient_services_Formula">
<textarea data-table="patient_services" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_services_add->Formula->getPlaceHolder()) ?>"<?php echo $patient_services_add->Formula->editAttributes() ?>><?php echo $patient_services_add->Formula->EditValue ?></textarea>
</span>
<?php echo $patient_services_add->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_patient_services_Inactive" for="x_Inactive" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Inactive->caption() ?><?php echo $patient_services_add->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Inactive->cellAttributes() ?>>
<span id="el_patient_services_Inactive">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Inactive->EditValue ?>"<?php echo $patient_services_add->Inactive->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_patient_services_CollSample" for="x_CollSample" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->CollSample->caption() ?><?php echo $patient_services_add->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->CollSample->cellAttributes() ?>>
<span id="el_patient_services_CollSample">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->CollSample->EditValue ?>"<?php echo $patient_services_add->CollSample->editAttributes() ?>>
</span>
<?php echo $patient_services_add->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_patient_services_TestType" for="x_TestType" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->TestType->caption() ?><?php echo $patient_services_add->TestType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->TestType->cellAttributes() ?>>
<span id="el_patient_services_TestType">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x_TestType" id="x_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->TestType->EditValue ?>"<?php echo $patient_services_add->TestType->editAttributes() ?>>
</span>
<?php echo $patient_services_add->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Repeated->Visible) { // Repeated ?>
	<div id="r_Repeated" class="form-group row">
		<label id="elh_patient_services_Repeated" for="x_Repeated" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Repeated->caption() ?><?php echo $patient_services_add->Repeated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Repeated->cellAttributes() ?>>
<span id="el_patient_services_Repeated">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x_Repeated" id="x_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Repeated->EditValue ?>"<?php echo $patient_services_add->Repeated->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Repeated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->RepeatedBy->Visible) { // RepeatedBy ?>
	<div id="r_RepeatedBy" class="form-group row">
		<label id="elh_patient_services_RepeatedBy" for="x_RepeatedBy" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->RepeatedBy->caption() ?><?php echo $patient_services_add->RepeatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->RepeatedBy->cellAttributes() ?>>
<span id="el_patient_services_RepeatedBy">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x_RepeatedBy" id="x_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->RepeatedBy->EditValue ?>"<?php echo $patient_services_add->RepeatedBy->editAttributes() ?>>
</span>
<?php echo $patient_services_add->RepeatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->RepeatedDate->Visible) { // RepeatedDate ?>
	<div id="r_RepeatedDate" class="form-group row">
		<label id="elh_patient_services_RepeatedDate" for="x_RepeatedDate" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->RepeatedDate->caption() ?><?php echo $patient_services_add->RepeatedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->RepeatedDate->cellAttributes() ?>>
<span id="el_patient_services_RepeatedDate">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x_RepeatedDate" id="x_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services_add->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->RepeatedDate->EditValue ?>"<?php echo $patient_services_add->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services_add->RepeatedDate->ReadOnly && !$patient_services_add->RepeatedDate->Disabled && !isset($patient_services_add->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services_add->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesadd", "x_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_services_add->RepeatedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->serviceID->Visible) { // serviceID ?>
	<div id="r_serviceID" class="form-group row">
		<label id="elh_patient_services_serviceID" for="x_serviceID" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->serviceID->caption() ?><?php echo $patient_services_add->serviceID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->serviceID->cellAttributes() ?>>
<span id="el_patient_services_serviceID">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x_serviceID" id="x_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->serviceID->EditValue ?>"<?php echo $patient_services_add->serviceID->editAttributes() ?>>
</span>
<?php echo $patient_services_add->serviceID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Service_Type->Visible) { // Service_Type ?>
	<div id="r_Service_Type" class="form-group row">
		<label id="elh_patient_services_Service_Type" for="x_Service_Type" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Service_Type->caption() ?><?php echo $patient_services_add->Service_Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Service_Type->cellAttributes() ?>>
<span id="el_patient_services_Service_Type">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x_Service_Type" id="x_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Service_Type->EditValue ?>"<?php echo $patient_services_add->Service_Type->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Service_Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->Service_Department->Visible) { // Service_Department ?>
	<div id="r_Service_Department" class="form-group row">
		<label id="elh_patient_services_Service_Department" for="x_Service_Department" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->Service_Department->caption() ?><?php echo $patient_services_add->Service_Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->Service_Department->cellAttributes() ?>>
<span id="el_patient_services_Service_Department">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x_Service_Department" id="x_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_add->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->Service_Department->EditValue ?>"<?php echo $patient_services_add->Service_Department->editAttributes() ?>>
</span>
<?php echo $patient_services_add->Service_Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services_add->RequestNo->Visible) { // RequestNo ?>
	<div id="r_RequestNo" class="form-group row">
		<label id="elh_patient_services_RequestNo" for="x_RequestNo" class="<?php echo $patient_services_add->LeftColumnClass ?>"><?php echo $patient_services_add->RequestNo->caption() ?><?php echo $patient_services_add->RequestNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_services_add->RightColumnClass ?>"><div <?php echo $patient_services_add->RequestNo->cellAttributes() ?>>
<span id="el_patient_services_RequestNo">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x_RequestNo" id="x_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_add->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_add->RequestNo->EditValue ?>"<?php echo $patient_services_add->RequestNo->editAttributes() ?>>
</span>
<?php echo $patient_services_add->RequestNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_services_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_services_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_services_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_services_add->showPageFooter();
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
$patient_services_add->terminate();
?>