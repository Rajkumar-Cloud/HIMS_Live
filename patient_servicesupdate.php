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
$patient_services_update = new patient_services_update();

// Run the page
$patient_services_update->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_services_update->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "update";
var fpatient_servicesupdate = currentForm = new ew.Form("fpatient_servicesupdate", "update");

// Validate form
fpatient_servicesupdate.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	if (!ew.updateSelected(fobj)) {
		ew.alert(ew.language.phrase("NoFieldSelected"));
		return false;
	}
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($patient_services_update->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			uelm = this.getElements("u" + infix + "_Reception");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Reception->caption(), $patient_services->Reception->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			uelm = this.getElements("u" + infix + "_Services");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Services->caption(), $patient_services->Services->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			uelm = this.getElements("u" + infix + "_amount");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->amount->caption(), $patient_services->amount->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			uelm = this.getElements("u" + infix + "_amount");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->amount->errorMessage()) ?>");
		<?php if ($patient_services_update->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			uelm = this.getElements("u" + infix + "_description");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->description->caption(), $patient_services->description->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->patient_type->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_type");
			uelm = this.getElements("u" + infix + "_patient_type");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->patient_type->caption(), $patient_services->patient_type->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_type");
			uelm = this.getElements("u" + infix + "_patient_type");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->patient_type->errorMessage()) ?>");
		<?php if ($patient_services_update->charged_date->Required) { ?>
			elm = this.getElements("x" + infix + "_charged_date");
			uelm = this.getElements("u" + infix + "_charged_date");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->charged_date->caption(), $patient_services->charged_date->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			uelm = this.getElements("u" + infix + "_status");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->status->caption(), $patient_services->status->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			uelm = this.getElements("u" + infix + "_createdby");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->createdby->caption(), $patient_services->createdby->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			uelm = this.getElements("u" + infix + "_createddatetime");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->createddatetime->caption(), $patient_services->createddatetime->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			uelm = this.getElements("u" + infix + "_modifiedby");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->modifiedby->caption(), $patient_services->modifiedby->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			uelm = this.getElements("u" + infix + "_modifieddatetime");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->modifieddatetime->caption(), $patient_services->modifieddatetime->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			uelm = this.getElements("u" + infix + "_mrnno");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->mrnno->caption(), $patient_services->mrnno->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			uelm = this.getElements("u" + infix + "_PatientName");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PatientName->caption(), $patient_services->PatientName->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			uelm = this.getElements("u" + infix + "_Age");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Age->caption(), $patient_services->Age->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			uelm = this.getElements("u" + infix + "_Gender");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Gender->caption(), $patient_services->Gender->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			uelm = this.getElements("u" + infix + "_profilePic");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->profilePic->caption(), $patient_services->profilePic->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit");
			uelm = this.getElements("u" + infix + "_Unit");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Unit->caption(), $patient_services->Unit->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_Unit");
			uelm = this.getElements("u" + infix + "_Unit");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Unit->errorMessage()) ?>");
		<?php if ($patient_services_update->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			uelm = this.getElements("u" + infix + "_Quantity");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Quantity->caption(), $patient_services->Quantity->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			uelm = this.getElements("u" + infix + "_Quantity");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Quantity->errorMessage()) ?>");
		<?php if ($patient_services_update->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			uelm = this.getElements("u" + infix + "_Discount");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Discount->caption(), $patient_services->Discount->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			uelm = this.getElements("u" + infix + "_Discount");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Discount->errorMessage()) ?>");
		<?php if ($patient_services_update->SubTotal->Required) { ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			uelm = this.getElements("u" + infix + "_SubTotal");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SubTotal->caption(), $patient_services->SubTotal->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			uelm = this.getElements("u" + infix + "_SubTotal");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->SubTotal->errorMessage()) ?>");
		<?php if ($patient_services_update->ServiceSelect->Required) { ?>
			elm = this.getElements("x" + infix + "_ServiceSelect[]");
			uelm = this.getElements("u" + infix + "_ServiceSelect");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ServiceSelect->caption(), $patient_services->ServiceSelect->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Aid->Required) { ?>
			elm = this.getElements("x" + infix + "_Aid");
			uelm = this.getElements("u" + infix + "_Aid");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Aid->caption(), $patient_services->Aid->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_Aid");
			uelm = this.getElements("u" + infix + "_Aid");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Aid->errorMessage()) ?>");
		<?php if ($patient_services_update->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			uelm = this.getElements("u" + infix + "_Vid");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Vid->caption(), $patient_services->Vid->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_Vid");
			uelm = this.getElements("u" + infix + "_Vid");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Vid->errorMessage()) ?>");
		<?php if ($patient_services_update->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			uelm = this.getElements("u" + infix + "_DrID");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrID->caption(), $patient_services->DrID->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			uelm = this.getElements("u" + infix + "_DrID");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrID->errorMessage()) ?>");
		<?php if ($patient_services_update->DrCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_DrCODE");
			uelm = this.getElements("u" + infix + "_DrCODE");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrCODE->caption(), $patient_services->DrCODE->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			uelm = this.getElements("u" + infix + "_DrName");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrName->caption(), $patient_services->DrName->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			uelm = this.getElements("u" + infix + "_Department");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Department->caption(), $patient_services->Department->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->DrSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			uelm = this.getElements("u" + infix + "_DrSharePres");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrSharePres->caption(), $patient_services->DrSharePres->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			uelm = this.getElements("u" + infix + "_DrSharePres");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrSharePres->errorMessage()) ?>");
		<?php if ($patient_services_update->HospSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			uelm = this.getElements("u" + infix + "_HospSharePres");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->HospSharePres->caption(), $patient_services->HospSharePres->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			uelm = this.getElements("u" + infix + "_HospSharePres");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->HospSharePres->errorMessage()) ?>");
		<?php if ($patient_services_update->DrShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			uelm = this.getElements("u" + infix + "_DrShareAmount");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareAmount->caption(), $patient_services->DrShareAmount->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			uelm = this.getElements("u" + infix + "_DrShareAmount");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareAmount->errorMessage()) ?>");
		<?php if ($patient_services_update->HospShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			uelm = this.getElements("u" + infix + "_HospShareAmount");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->HospShareAmount->caption(), $patient_services->HospShareAmount->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			uelm = this.getElements("u" + infix + "_HospShareAmount");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->HospShareAmount->errorMessage()) ?>");
		<?php if ($patient_services_update->DrShareSettiledAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			uelm = this.getElements("u" + infix + "_DrShareSettiledAmount");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareSettiledAmount->caption(), $patient_services->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			uelm = this.getElements("u" + infix + "_DrShareSettiledAmount");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettiledAmount->errorMessage()) ?>");
		<?php if ($patient_services_update->DrShareSettledId->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			uelm = this.getElements("u" + infix + "_DrShareSettledId");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareSettledId->caption(), $patient_services->DrShareSettledId->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			uelm = this.getElements("u" + infix + "_DrShareSettledId");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettledId->errorMessage()) ?>");
		<?php if ($patient_services_update->DrShareSettiledStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			uelm = this.getElements("u" + infix + "_DrShareSettiledStatus");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareSettiledStatus->caption(), $patient_services->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			uelm = this.getElements("u" + infix + "_DrShareSettiledStatus");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettiledStatus->errorMessage()) ?>");
		<?php if ($patient_services_update->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			uelm = this.getElements("u" + infix + "_invoiceId");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->invoiceId->caption(), $patient_services->invoiceId->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			uelm = this.getElements("u" + infix + "_invoiceId");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->invoiceId->errorMessage()) ?>");
		<?php if ($patient_services_update->invoiceAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			uelm = this.getElements("u" + infix + "_invoiceAmount");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->invoiceAmount->caption(), $patient_services->invoiceAmount->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			uelm = this.getElements("u" + infix + "_invoiceAmount");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->invoiceAmount->errorMessage()) ?>");
		<?php if ($patient_services_update->invoiceStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceStatus");
			uelm = this.getElements("u" + infix + "_invoiceStatus");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->invoiceStatus->caption(), $patient_services->invoiceStatus->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->modeOfPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_modeOfPayment");
			uelm = this.getElements("u" + infix + "_modeOfPayment");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->modeOfPayment->caption(), $patient_services->modeOfPayment->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			uelm = this.getElements("u" + infix + "_HospID");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->HospID->caption(), $patient_services->HospID->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			uelm = this.getElements("u" + infix + "_RIDNO");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RIDNO->caption(), $patient_services->RIDNO->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			uelm = this.getElements("u" + infix + "_TidNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TidNo->caption(), $patient_services->TidNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->DiscountCategory->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountCategory");
			uelm = this.getElements("u" + infix + "_DiscountCategory");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DiscountCategory->caption(), $patient_services->DiscountCategory->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			uelm = this.getElements("u" + infix + "_sid");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->sid->caption(), $patient_services->sid->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			uelm = this.getElements("u" + infix + "_sid");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->sid->errorMessage()) ?>");
		<?php if ($patient_services_update->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			uelm = this.getElements("u" + infix + "_ItemCode");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ItemCode->caption(), $patient_services->ItemCode->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			uelm = this.getElements("u" + infix + "_TestSubCd");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestSubCd->caption(), $patient_services->TestSubCd->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			uelm = this.getElements("u" + infix + "_DEptCd");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DEptCd->caption(), $patient_services->DEptCd->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->ProfCd->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfCd");
			uelm = this.getElements("u" + infix + "_ProfCd");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ProfCd->caption(), $patient_services->ProfCd->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->LabReport->Required) { ?>
			elm = this.getElements("x" + infix + "_LabReport");
			uelm = this.getElements("u" + infix + "_LabReport");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->LabReport->caption(), $patient_services->LabReport->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Comments->Required) { ?>
			elm = this.getElements("x" + infix + "_Comments");
			uelm = this.getElements("u" + infix + "_Comments");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Comments->caption(), $patient_services->Comments->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			uelm = this.getElements("u" + infix + "_Method");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Method->caption(), $patient_services->Method->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Specimen->Required) { ?>
			elm = this.getElements("x" + infix + "_Specimen");
			uelm = this.getElements("u" + infix + "_Specimen");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Specimen->caption(), $patient_services->Specimen->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Abnormal->Required) { ?>
			elm = this.getElements("x" + infix + "_Abnormal");
			uelm = this.getElements("u" + infix + "_Abnormal");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Abnormal->caption(), $patient_services->Abnormal->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->RefValue->Required) { ?>
			elm = this.getElements("x" + infix + "_RefValue");
			uelm = this.getElements("u" + infix + "_RefValue");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RefValue->caption(), $patient_services->RefValue->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->TestUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_TestUnit");
			uelm = this.getElements("u" + infix + "_TestUnit");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestUnit->caption(), $patient_services->TestUnit->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->LOWHIGH->Required) { ?>
			elm = this.getElements("x" + infix + "_LOWHIGH");
			uelm = this.getElements("u" + infix + "_LOWHIGH");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->LOWHIGH->caption(), $patient_services->LOWHIGH->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Branch->Required) { ?>
			elm = this.getElements("x" + infix + "_Branch");
			uelm = this.getElements("u" + infix + "_Branch");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Branch->caption(), $patient_services->Branch->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Dispatch->Required) { ?>
			elm = this.getElements("x" + infix + "_Dispatch");
			uelm = this.getElements("u" + infix + "_Dispatch");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Dispatch->caption(), $patient_services->Dispatch->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Pic1->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic1");
			uelm = this.getElements("u" + infix + "_Pic1");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Pic1->caption(), $patient_services->Pic1->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Pic2->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic2");
			uelm = this.getElements("u" + infix + "_Pic2");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Pic2->caption(), $patient_services->Pic2->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->GraphPath->Required) { ?>
			elm = this.getElements("x" + infix + "_GraphPath");
			uelm = this.getElements("u" + infix + "_GraphPath");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->GraphPath->caption(), $patient_services->GraphPath->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->MachineCD->Required) { ?>
			elm = this.getElements("x" + infix + "_MachineCD");
			uelm = this.getElements("u" + infix + "_MachineCD");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->MachineCD->caption(), $patient_services->MachineCD->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->TestCancel->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCancel");
			uelm = this.getElements("u" + infix + "_TestCancel");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestCancel->caption(), $patient_services->TestCancel->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->OutSource->Required) { ?>
			elm = this.getElements("x" + infix + "_OutSource");
			uelm = this.getElements("u" + infix + "_OutSource");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->OutSource->caption(), $patient_services->OutSource->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Printed->Required) { ?>
			elm = this.getElements("x" + infix + "_Printed");
			uelm = this.getElements("u" + infix + "_Printed");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Printed->caption(), $patient_services->Printed->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->PrintBy->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintBy");
			uelm = this.getElements("u" + infix + "_PrintBy");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PrintBy->caption(), $patient_services->PrintBy->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->PrintDate->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			uelm = this.getElements("u" + infix + "_PrintDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PrintDate->caption(), $patient_services->PrintDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			uelm = this.getElements("u" + infix + "_PrintDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->PrintDate->errorMessage()) ?>");
		<?php if ($patient_services_update->BillingDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			uelm = this.getElements("u" + infix + "_BillingDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->BillingDate->caption(), $patient_services->BillingDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			uelm = this.getElements("u" + infix + "_BillingDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->BillingDate->errorMessage()) ?>");
		<?php if ($patient_services_update->BilledBy->Required) { ?>
			elm = this.getElements("x" + infix + "_BilledBy");
			uelm = this.getElements("u" + infix + "_BilledBy");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->BilledBy->caption(), $patient_services->BilledBy->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Resulted->Required) { ?>
			elm = this.getElements("x" + infix + "_Resulted");
			uelm = this.getElements("u" + infix + "_Resulted");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Resulted->caption(), $patient_services->Resulted->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			uelm = this.getElements("u" + infix + "_ResultDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ResultDate->caption(), $patient_services->ResultDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			uelm = this.getElements("u" + infix + "_ResultDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->ResultDate->errorMessage()) ?>");
		<?php if ($patient_services_update->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			uelm = this.getElements("u" + infix + "_ResultedBy");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ResultedBy->caption(), $patient_services->ResultedBy->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->SampleDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			uelm = this.getElements("u" + infix + "_SampleDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SampleDate->caption(), $patient_services->SampleDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			uelm = this.getElements("u" + infix + "_SampleDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->SampleDate->errorMessage()) ?>");
		<?php if ($patient_services_update->SampleUser->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleUser");
			uelm = this.getElements("u" + infix + "_SampleUser");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SampleUser->caption(), $patient_services->SampleUser->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Sampled->Required) { ?>
			elm = this.getElements("x" + infix + "_Sampled");
			uelm = this.getElements("u" + infix + "_Sampled");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Sampled->caption(), $patient_services->Sampled->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->ReceivedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			uelm = this.getElements("u" + infix + "_ReceivedDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ReceivedDate->caption(), $patient_services->ReceivedDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			uelm = this.getElements("u" + infix + "_ReceivedDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->ReceivedDate->errorMessage()) ?>");
		<?php if ($patient_services_update->ReceivedUser->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedUser");
			uelm = this.getElements("u" + infix + "_ReceivedUser");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ReceivedUser->caption(), $patient_services->ReceivedUser->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Recevied->Required) { ?>
			elm = this.getElements("x" + infix + "_Recevied");
			uelm = this.getElements("u" + infix + "_Recevied");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Recevied->caption(), $patient_services->Recevied->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->DeptRecvDate->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			uelm = this.getElements("u" + infix + "_DeptRecvDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DeptRecvDate->caption(), $patient_services->DeptRecvDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			uelm = this.getElements("u" + infix + "_DeptRecvDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DeptRecvDate->errorMessage()) ?>");
		<?php if ($patient_services_update->DeptRecvUser->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvUser");
			uelm = this.getElements("u" + infix + "_DeptRecvUser");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DeptRecvUser->caption(), $patient_services->DeptRecvUser->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->DeptRecived->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecived");
			uelm = this.getElements("u" + infix + "_DeptRecived");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DeptRecived->caption(), $patient_services->DeptRecived->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->SAuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			uelm = this.getElements("u" + infix + "_SAuthDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SAuthDate->caption(), $patient_services->SAuthDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			uelm = this.getElements("u" + infix + "_SAuthDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->SAuthDate->errorMessage()) ?>");
		<?php if ($patient_services_update->SAuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthBy");
			uelm = this.getElements("u" + infix + "_SAuthBy");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SAuthBy->caption(), $patient_services->SAuthBy->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->SAuthendicate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthendicate");
			uelm = this.getElements("u" + infix + "_SAuthendicate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SAuthendicate->caption(), $patient_services->SAuthendicate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->AuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			uelm = this.getElements("u" + infix + "_AuthDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->AuthDate->caption(), $patient_services->AuthDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			uelm = this.getElements("u" + infix + "_AuthDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->AuthDate->errorMessage()) ?>");
		<?php if ($patient_services_update->AuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthBy");
			uelm = this.getElements("u" + infix + "_AuthBy");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->AuthBy->caption(), $patient_services->AuthBy->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Authencate->Required) { ?>
			elm = this.getElements("x" + infix + "_Authencate");
			uelm = this.getElements("u" + infix + "_Authencate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Authencate->caption(), $patient_services->Authencate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->EditDate->Required) { ?>
			elm = this.getElements("x" + infix + "_EditDate");
			uelm = this.getElements("u" + infix + "_EditDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->EditDate->caption(), $patient_services->EditDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_EditDate");
			uelm = this.getElements("u" + infix + "_EditDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->EditDate->errorMessage()) ?>");
		<?php if ($patient_services_update->EditBy->Required) { ?>
			elm = this.getElements("x" + infix + "_EditBy");
			uelm = this.getElements("u" + infix + "_EditBy");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->EditBy->caption(), $patient_services->EditBy->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Editted->Required) { ?>
			elm = this.getElements("x" + infix + "_Editted");
			uelm = this.getElements("u" + infix + "_Editted");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Editted->caption(), $patient_services->Editted->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			uelm = this.getElements("u" + infix + "_PatID");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PatID->caption(), $patient_services->PatID->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			uelm = this.getElements("u" + infix + "_PatID");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->PatID->errorMessage()) ?>");
		<?php if ($patient_services_update->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			uelm = this.getElements("u" + infix + "_PatientId");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PatientId->caption(), $patient_services->PatientId->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			uelm = this.getElements("u" + infix + "_Mobile");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Mobile->caption(), $patient_services->Mobile->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			uelm = this.getElements("u" + infix + "_CId");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->CId->caption(), $patient_services->CId->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_CId");
			uelm = this.getElements("u" + infix + "_CId");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->CId->errorMessage()) ?>");
		<?php if ($patient_services_update->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			uelm = this.getElements("u" + infix + "_Order");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Order->caption(), $patient_services->Order->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			uelm = this.getElements("u" + infix + "_Order");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Order->errorMessage()) ?>");
		<?php if ($patient_services_update->Form->Required) { ?>
			elm = this.getElements("x" + infix + "_Form");
			uelm = this.getElements("u" + infix + "_Form");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Form->caption(), $patient_services->Form->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			uelm = this.getElements("u" + infix + "_ResType");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ResType->caption(), $patient_services->ResType->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			uelm = this.getElements("u" + infix + "_Sample");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Sample->caption(), $patient_services->Sample->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			uelm = this.getElements("u" + infix + "_NoD");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->NoD->caption(), $patient_services->NoD->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			uelm = this.getElements("u" + infix + "_NoD");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->NoD->errorMessage()) ?>");
		<?php if ($patient_services_update->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			uelm = this.getElements("u" + infix + "_BillOrder");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->BillOrder->caption(), $patient_services->BillOrder->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			uelm = this.getElements("u" + infix + "_BillOrder");
			if (uelm && uelm.checked && elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->BillOrder->errorMessage()) ?>");
		<?php if ($patient_services_update->Formula->Required) { ?>
			elm = this.getElements("x" + infix + "_Formula");
			uelm = this.getElements("u" + infix + "_Formula");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Formula->caption(), $patient_services->Formula->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive");
			uelm = this.getElements("u" + infix + "_Inactive");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Inactive->caption(), $patient_services->Inactive->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			uelm = this.getElements("u" + infix + "_CollSample");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->CollSample->caption(), $patient_services->CollSample->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			uelm = this.getElements("u" + infix + "_TestType");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestType->caption(), $patient_services->TestType->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Repeated->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeated");
			uelm = this.getElements("u" + infix + "_Repeated");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Repeated->caption(), $patient_services->Repeated->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->RepeatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedBy");
			uelm = this.getElements("u" + infix + "_RepeatedBy");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RepeatedBy->caption(), $patient_services->RepeatedBy->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->RepeatedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			uelm = this.getElements("u" + infix + "_RepeatedDate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RepeatedDate->caption(), $patient_services->RepeatedDate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			uelm = this.getElements("u" + infix + "_RepeatedDate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->RepeatedDate->errorMessage()) ?>");
		<?php if ($patient_services_update->serviceID->Required) { ?>
			elm = this.getElements("x" + infix + "_serviceID");
			uelm = this.getElements("u" + infix + "_serviceID");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->serviceID->caption(), $patient_services->serviceID->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_serviceID");
			uelm = this.getElements("u" + infix + "_serviceID");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->serviceID->errorMessage()) ?>");
		<?php if ($patient_services_update->Service_Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Type");
			uelm = this.getElements("u" + infix + "_Service_Type");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Service_Type->caption(), $patient_services->Service_Type->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->Service_Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Department");
			uelm = this.getElements("u" + infix + "_Service_Department");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Service_Department->caption(), $patient_services->Service_Department->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($patient_services_update->RequestNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RequestNo");
			uelm = this.getElements("u" + infix + "_RequestNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RequestNo->caption(), $patient_services->RequestNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_RequestNo");
			uelm = this.getElements("u" + infix + "_RequestNo");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->RequestNo->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fpatient_servicesupdate.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_servicesupdate.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_servicesupdate.lists["x_Services"] = <?php echo $patient_services_update->Services->Lookup->toClientList() ?>;
fpatient_servicesupdate.lists["x_Services"].options = <?php echo JsonEncode($patient_services_update->Services->lookupOptions()) ?>;
fpatient_servicesupdate.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_servicesupdate.lists["x_status"] = <?php echo $patient_services_update->status->Lookup->toClientList() ?>;
fpatient_servicesupdate.lists["x_status"].options = <?php echo JsonEncode($patient_services_update->status->lookupOptions()) ?>;
fpatient_servicesupdate.lists["x_ServiceSelect[]"] = <?php echo $patient_services_update->ServiceSelect->Lookup->toClientList() ?>;
fpatient_servicesupdate.lists["x_ServiceSelect[]"].options = <?php echo JsonEncode($patient_services_update->ServiceSelect->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_services_update->showPageHeader(); ?>
<?php
$patient_services_update->showMessage();
?>
<form name="fpatient_servicesupdate" id="fpatient_servicesupdate" class="<?php echo $patient_services_update->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_services_update->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_services_update->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_services_update->IsModal ?>">
<?php foreach ($patient_services_update->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_patient_servicesupdate" class="ew-update-div"><!-- page -->
	<div class="form-check">
		<input type="checkbox" class="form-check-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="form-check-label" for="u"><?php echo $Language->Phrase("UpdateSelectAll") ?></label>
	</div>
<?php if ($patient_services->Services->Visible) { // Services ?>
	<div id="r_Services" class="form-group row">
		<label class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Services" id="u_Services" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Services->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Services"><?php echo $patient_services->Services->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Services->cellAttributes() ?>>
<span id="el_patient_services_Services">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x_Services" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_Services" id="sv_x_Services" value="<?php echo RemoveHtml($patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>"<?php echo $patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services->Services->displayValueSeparatorAttribute() ?>" name="x_Services" id="x_Services" value="<?php echo HtmlEncode($patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_servicesupdate.createAutoSuggest({"id":"x_Services","forceSelect":true});
</script>
<?php echo $patient_services->Services->Lookup->getParamTag("p_x_Services") ?>
</span>
<?php echo $patient_services->Services->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label for="x_amount" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_amount" id="u_amount" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->amount->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_amount"><?php echo $patient_services->amount->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->amount->cellAttributes() ?>>
<span id="el_patient_services_amount">
<input type="text" data-table="patient_services" data-field="x_amount" name="x_amount" id="x_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services->amount->EditValue ?>"<?php echo $patient_services->amount->editAttributes() ?>>
</span>
<?php echo $patient_services->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label for="x_description" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_description" id="u_description" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->description->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_description"><?php echo $patient_services->description->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->description->cellAttributes() ?>>
<span id="el_patient_services_description">
<input type="text" data-table="patient_services" data-field="x_description" name="x_description" id="x_description" placeholder="<?php echo HtmlEncode($patient_services->description->getPlaceHolder()) ?>" value="<?php echo $patient_services->description->EditValue ?>"<?php echo $patient_services->description->editAttributes() ?>>
</span>
<?php echo $patient_services->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->patient_type->Visible) { // patient_type ?>
	<div id="r_patient_type" class="form-group row">
		<label for="x_patient_type" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_patient_type" id="u_patient_type" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->patient_type->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_patient_type"><?php echo $patient_services->patient_type->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->patient_type->cellAttributes() ?>>
<span id="el_patient_services_patient_type">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x_patient_type" id="x_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services->patient_type->EditValue ?>"<?php echo $patient_services->patient_type->editAttributes() ?>>
</span>
<?php echo $patient_services->patient_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label for="x_charged_date" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_charged_date" id="u_charged_date" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->charged_date->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_charged_date"><?php echo $patient_services->charged_date->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->charged_date->cellAttributes() ?>>
<?php echo $patient_services->charged_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_status" id="u_status" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->status->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_status"><?php echo $patient_services->status->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->status->cellAttributes() ?>>
<span id="el_patient_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_services->status->editAttributes() ?>>
		<?php echo $patient_services->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient_services->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $patient_services->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_createdby" id="u_createdby" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->createdby->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_createdby"><?php echo $patient_services->createdby->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->createdby->cellAttributes() ?>>
<?php echo $patient_services->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_createddatetime" id="u_createddatetime" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->createddatetime->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_createddatetime"><?php echo $patient_services->createddatetime->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->createddatetime->cellAttributes() ?>>
<?php echo $patient_services->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_PatientName" id="u_PatientName" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->PatientName->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_PatientName"><?php echo $patient_services->PatientName->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->PatientName->cellAttributes() ?>>
<span id="el_patient_services_PatientName">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientName->EditValue ?>"<?php echo $patient_services->PatientName->editAttributes() ?>>
</span>
<?php echo $patient_services->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Age" id="u_Age" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Age->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Age"><?php echo $patient_services->Age->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Age->cellAttributes() ?>>
<span id="el_patient_services_Age">
<input type="text" data-table="patient_services" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services->Age->EditValue ?>"<?php echo $patient_services->Age->editAttributes() ?>>
</span>
<?php echo $patient_services->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Gender" id="u_Gender" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Gender->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Gender"><?php echo $patient_services->Gender->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Gender->cellAttributes() ?>>
<span id="el_patient_services_Gender">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services->Gender->EditValue ?>"<?php echo $patient_services->Gender->editAttributes() ?>>
</span>
<?php echo $patient_services->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_profilePic" id="u_profilePic" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->profilePic->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_profilePic"><?php echo $patient_services->profilePic->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->profilePic->cellAttributes() ?>>
<span id="el_patient_services_profilePic">
<textarea data-table="patient_services" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_services->profilePic->getPlaceHolder()) ?>"<?php echo $patient_services->profilePic->editAttributes() ?>><?php echo $patient_services->profilePic->EditValue ?></textarea>
</span>
<?php echo $patient_services->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Unit->Visible) { // Unit ?>
	<div id="r_Unit" class="form-group row">
		<label for="x_Unit" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Unit" id="u_Unit" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Unit->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Unit"><?php echo $patient_services->Unit->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Unit->cellAttributes() ?>>
<span id="el_patient_services_Unit">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x_Unit" id="x_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services->Unit->EditValue ?>"<?php echo $patient_services->Unit->editAttributes() ?>>
</span>
<?php echo $patient_services->Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label for="x_Quantity" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Quantity" id="u_Quantity" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Quantity->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Quantity"><?php echo $patient_services->Quantity->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Quantity->cellAttributes() ?>>
<span id="el_patient_services_Quantity">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services->Quantity->EditValue ?>"<?php echo $patient_services->Quantity->editAttributes() ?>>
</span>
<?php echo $patient_services->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label for="x_Discount" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Discount" id="u_Discount" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Discount->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Discount"><?php echo $patient_services->Discount->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Discount->cellAttributes() ?>>
<span id="el_patient_services_Discount">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x_Discount" id="x_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services->Discount->EditValue ?>"<?php echo $patient_services->Discount->editAttributes() ?>>
</span>
<?php echo $patient_services->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SubTotal->Visible) { // SubTotal ?>
	<div id="r_SubTotal" class="form-group row">
		<label for="x_SubTotal" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_SubTotal" id="u_SubTotal" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->SubTotal->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_SubTotal"><?php echo $patient_services->SubTotal->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->SubTotal->cellAttributes() ?>>
<span id="el_patient_services_SubTotal">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services->SubTotal->EditValue ?>"<?php echo $patient_services->SubTotal->editAttributes() ?>>
</span>
<?php echo $patient_services->SubTotal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ServiceSelect->Visible) { // ServiceSelect ?>
	<div id="r_ServiceSelect" class="form-group row">
		<label class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ServiceSelect" id="u_ServiceSelect" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->ServiceSelect->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ServiceSelect"><?php echo $patient_services->ServiceSelect->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->ServiceSelect->cellAttributes() ?>>
<span id="el_patient_services_ServiceSelect">
<div id="tp_x_ServiceSelect" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x_ServiceSelect[]" id="x_ServiceSelect[]" value="{value}"<?php echo $patient_services->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services->ServiceSelect->checkBoxListHtml(FALSE, "x_ServiceSelect[]") ?>
</div></div>
</span>
<?php echo $patient_services->ServiceSelect->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Aid->Visible) { // Aid ?>
	<div id="r_Aid" class="form-group row">
		<label for="x_Aid" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Aid" id="u_Aid" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Aid->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Aid"><?php echo $patient_services->Aid->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Aid->cellAttributes() ?>>
<span id="el_patient_services_Aid">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x_Aid" id="x_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Aid->EditValue ?>"<?php echo $patient_services->Aid->editAttributes() ?>>
</span>
<?php echo $patient_services->Aid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Vid->Visible) { // Vid ?>
	<div id="r_Vid" class="form-group row">
		<label for="x_Vid" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Vid" id="u_Vid" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Vid->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Vid"><?php echo $patient_services->Vid->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Vid->cellAttributes() ?>>
<span id="el_patient_services_Vid">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x_Vid" id="x_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Vid->EditValue ?>"<?php echo $patient_services->Vid->editAttributes() ?>>
</span>
<?php echo $patient_services->Vid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DrID" id="u_DrID" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DrID->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DrID"><?php echo $patient_services->DrID->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DrID->cellAttributes() ?>>
<span id="el_patient_services_DrID">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrID->EditValue ?>"<?php echo $patient_services->DrID->editAttributes() ?>>
</span>
<?php echo $patient_services->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrCODE->Visible) { // DrCODE ?>
	<div id="r_DrCODE" class="form-group row">
		<label for="x_DrCODE" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DrCODE" id="u_DrCODE" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DrCODE->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DrCODE"><?php echo $patient_services->DrCODE->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DrCODE->cellAttributes() ?>>
<span id="el_patient_services_DrCODE">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x_DrCODE" id="x_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrCODE->EditValue ?>"<?php echo $patient_services->DrCODE->editAttributes() ?>>
</span>
<?php echo $patient_services->DrCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label for="x_DrName" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DrName" id="u_DrName" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DrName->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DrName"><?php echo $patient_services->DrName->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DrName->cellAttributes() ?>>
<span id="el_patient_services_DrName">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrName->EditValue ?>"<?php echo $patient_services->DrName->editAttributes() ?>>
</span>
<?php echo $patient_services->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label for="x_Department" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Department" id="u_Department" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Department->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Department"><?php echo $patient_services->Department->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Department->cellAttributes() ?>>
<span id="el_patient_services_Department">
<input type="text" data-table="patient_services" data-field="x_Department" name="x_Department" id="x_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Department->EditValue ?>"<?php echo $patient_services->Department->editAttributes() ?>>
</span>
<?php echo $patient_services->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrSharePres->Visible) { // DrSharePres ?>
	<div id="r_DrSharePres" class="form-group row">
		<label for="x_DrSharePres" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DrSharePres" id="u_DrSharePres" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DrSharePres->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DrSharePres"><?php echo $patient_services->DrSharePres->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DrSharePres->cellAttributes() ?>>
<span id="el_patient_services_DrSharePres">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x_DrSharePres" id="x_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrSharePres->EditValue ?>"<?php echo $patient_services->DrSharePres->editAttributes() ?>>
</span>
<?php echo $patient_services->DrSharePres->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->HospSharePres->Visible) { // HospSharePres ?>
	<div id="r_HospSharePres" class="form-group row">
		<label for="x_HospSharePres" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_HospSharePres" id="u_HospSharePres" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->HospSharePres->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_HospSharePres"><?php echo $patient_services->HospSharePres->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->HospSharePres->cellAttributes() ?>>
<span id="el_patient_services_HospSharePres">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x_HospSharePres" id="x_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospSharePres->EditValue ?>"<?php echo $patient_services->HospSharePres->editAttributes() ?>>
</span>
<?php echo $patient_services->HospSharePres->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label for="x_DrShareAmount" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DrShareAmount" id="u_DrShareAmount" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DrShareAmount->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DrShareAmount"><?php echo $patient_services->DrShareAmount->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DrShareAmount->cellAttributes() ?>>
<span id="el_patient_services_DrShareAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareAmount->EditValue ?>"<?php echo $patient_services->DrShareAmount->editAttributes() ?>>
</span>
<?php echo $patient_services->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label for="x_HospShareAmount" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_HospShareAmount" id="u_HospShareAmount" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->HospShareAmount->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_HospShareAmount"><?php echo $patient_services->HospShareAmount->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->HospShareAmount->cellAttributes() ?>>
<span id="el_patient_services_HospShareAmount">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospShareAmount->EditValue ?>"<?php echo $patient_services->HospShareAmount->editAttributes() ?>>
</span>
<?php echo $patient_services->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<div id="r_DrShareSettiledAmount" class="form-group row">
		<label for="x_DrShareSettiledAmount" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DrShareSettiledAmount" id="u_DrShareSettiledAmount" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DrShareSettiledAmount->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DrShareSettiledAmount"><?php echo $patient_services->DrShareSettiledAmount->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettiledAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x_DrShareSettiledAmount" id="x_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php echo $patient_services->DrShareSettiledAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<div id="r_DrShareSettledId" class="form-group row">
		<label for="x_DrShareSettledId" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DrShareSettledId" id="u_DrShareSettledId" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DrShareSettledId->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DrShareSettledId"><?php echo $patient_services->DrShareSettledId->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DrShareSettledId->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettledId">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x_DrShareSettledId" id="x_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettledId->EditValue ?>"<?php echo $patient_services->DrShareSettledId->editAttributes() ?>>
</span>
<?php echo $patient_services->DrShareSettledId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<div id="r_DrShareSettiledStatus" class="form-group row">
		<label for="x_DrShareSettiledStatus" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DrShareSettiledStatus" id="u_DrShareSettiledStatus" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DrShareSettiledStatus->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DrShareSettiledStatus"><?php echo $patient_services->DrShareSettiledStatus->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettiledStatus">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x_DrShareSettiledStatus" id="x_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php echo $patient_services->DrShareSettiledStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->invoiceId->Visible) { // invoiceId ?>
	<div id="r_invoiceId" class="form-group row">
		<label for="x_invoiceId" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_invoiceId" id="u_invoiceId" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->invoiceId->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_invoiceId"><?php echo $patient_services->invoiceId->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->invoiceId->cellAttributes() ?>>
<span id="el_patient_services_invoiceId">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceId->EditValue ?>"<?php echo $patient_services->invoiceId->editAttributes() ?>>
</span>
<?php echo $patient_services->invoiceId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
	<div id="r_invoiceAmount" class="form-group row">
		<label for="x_invoiceAmount" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_invoiceAmount" id="u_invoiceAmount" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->invoiceAmount->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_invoiceAmount"><?php echo $patient_services->invoiceAmount->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->invoiceAmount->cellAttributes() ?>>
<span id="el_patient_services_invoiceAmount">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceAmount->EditValue ?>"<?php echo $patient_services->invoiceAmount->editAttributes() ?>>
</span>
<?php echo $patient_services->invoiceAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
	<div id="r_invoiceStatus" class="form-group row">
		<label for="x_invoiceStatus" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_invoiceStatus" id="u_invoiceStatus" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->invoiceStatus->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_invoiceStatus"><?php echo $patient_services->invoiceStatus->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->invoiceStatus->cellAttributes() ?>>
<span id="el_patient_services_invoiceStatus">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceStatus->EditValue ?>"<?php echo $patient_services->invoiceStatus->editAttributes() ?>>
</span>
<?php echo $patient_services->invoiceStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
	<div id="r_modeOfPayment" class="form-group row">
		<label for="x_modeOfPayment" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_modeOfPayment" id="u_modeOfPayment" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->modeOfPayment->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_modeOfPayment"><?php echo $patient_services->modeOfPayment->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->modeOfPayment->cellAttributes() ?>>
<span id="el_patient_services_modeOfPayment">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services->modeOfPayment->EditValue ?>"<?php echo $patient_services->modeOfPayment->editAttributes() ?>>
</span>
<?php echo $patient_services->modeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
	<div id="r_DiscountCategory" class="form-group row">
		<label for="x_DiscountCategory" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DiscountCategory" id="u_DiscountCategory" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DiscountCategory->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DiscountCategory"><?php echo $patient_services->DiscountCategory->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DiscountCategory->cellAttributes() ?>>
<span id="el_patient_services_DiscountCategory">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x_DiscountCategory" id="x_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services->DiscountCategory->EditValue ?>"<?php echo $patient_services->DiscountCategory->editAttributes() ?>>
</span>
<?php echo $patient_services->DiscountCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label for="x_sid" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_sid" id="u_sid" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->sid->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_sid"><?php echo $patient_services->sid->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->sid->cellAttributes() ?>>
<span id="el_patient_services_sid">
<input type="text" data-table="patient_services" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?php echo HtmlEncode($patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services->sid->EditValue ?>"<?php echo $patient_services->sid->editAttributes() ?>>
</span>
<?php echo $patient_services->sid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ItemCode->Visible) { // ItemCode ?>
	<div id="r_ItemCode" class="form-group row">
		<label for="x_ItemCode" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ItemCode" id="u_ItemCode" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->ItemCode->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ItemCode"><?php echo $patient_services->ItemCode->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->ItemCode->cellAttributes() ?>>
<span id="el_patient_services_ItemCode">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services->ItemCode->EditValue ?>"<?php echo $patient_services->ItemCode->editAttributes() ?>>
</span>
<?php echo $patient_services->ItemCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label for="x_TestSubCd" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_TestSubCd" id="u_TestSubCd" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->TestSubCd->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_TestSubCd"><?php echo $patient_services->TestSubCd->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->TestSubCd->cellAttributes() ?>>
<span id="el_patient_services_TestSubCd">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestSubCd->EditValue ?>"<?php echo $patient_services->TestSubCd->editAttributes() ?>>
</span>
<?php echo $patient_services->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label for="x_DEptCd" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DEptCd" id="u_DEptCd" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DEptCd->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DEptCd"><?php echo $patient_services->DEptCd->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DEptCd->cellAttributes() ?>>
<span id="el_patient_services_DEptCd">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->DEptCd->EditValue ?>"<?php echo $patient_services->DEptCd->editAttributes() ?>>
</span>
<?php echo $patient_services->DEptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ProfCd->Visible) { // ProfCd ?>
	<div id="r_ProfCd" class="form-group row">
		<label for="x_ProfCd" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ProfCd" id="u_ProfCd" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->ProfCd->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ProfCd"><?php echo $patient_services->ProfCd->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->ProfCd->cellAttributes() ?>>
<span id="el_patient_services_ProfCd">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->ProfCd->EditValue ?>"<?php echo $patient_services->ProfCd->editAttributes() ?>>
</span>
<?php echo $patient_services->ProfCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->LabReport->Visible) { // LabReport ?>
	<div id="r_LabReport" class="form-group row">
		<label for="x_LabReport" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_LabReport" id="u_LabReport" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->LabReport->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_LabReport"><?php echo $patient_services->LabReport->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->LabReport->cellAttributes() ?>>
<span id="el_patient_services_LabReport">
<textarea data-table="patient_services" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_services->LabReport->getPlaceHolder()) ?>"<?php echo $patient_services->LabReport->editAttributes() ?>><?php echo $patient_services->LabReport->EditValue ?></textarea>
</span>
<?php echo $patient_services->LabReport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label for="x_Comments" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Comments" id="u_Comments" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Comments->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Comments"><?php echo $patient_services->Comments->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Comments->cellAttributes() ?>>
<span id="el_patient_services_Comments">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services->Comments->EditValue ?>"<?php echo $patient_services->Comments->editAttributes() ?>>
</span>
<?php echo $patient_services->Comments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label for="x_Method" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Method" id="u_Method" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Method->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Method"><?php echo $patient_services->Method->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Method->cellAttributes() ?>>
<span id="el_patient_services_Method">
<input type="text" data-table="patient_services" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services->Method->EditValue ?>"<?php echo $patient_services->Method->editAttributes() ?>>
</span>
<?php echo $patient_services->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Specimen->Visible) { // Specimen ?>
	<div id="r_Specimen" class="form-group row">
		<label for="x_Specimen" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Specimen" id="u_Specimen" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Specimen->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Specimen"><?php echo $patient_services->Specimen->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Specimen->cellAttributes() ?>>
<span id="el_patient_services_Specimen">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services->Specimen->EditValue ?>"<?php echo $patient_services->Specimen->editAttributes() ?>>
</span>
<?php echo $patient_services->Specimen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label for="x_Abnormal" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Abnormal" id="u_Abnormal" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Abnormal->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Abnormal"><?php echo $patient_services->Abnormal->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Abnormal->cellAttributes() ?>>
<span id="el_patient_services_Abnormal">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services->Abnormal->EditValue ?>"<?php echo $patient_services->Abnormal->editAttributes() ?>>
</span>
<?php echo $patient_services->Abnormal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label for="x_RefValue" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_RefValue" id="u_RefValue" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->RefValue->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_RefValue"><?php echo $patient_services->RefValue->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->RefValue->cellAttributes() ?>>
<span id="el_patient_services_RefValue">
<textarea data-table="patient_services" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_services->RefValue->getPlaceHolder()) ?>"<?php echo $patient_services->RefValue->editAttributes() ?>><?php echo $patient_services->RefValue->EditValue ?></textarea>
</span>
<?php echo $patient_services->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->TestUnit->Visible) { // TestUnit ?>
	<div id="r_TestUnit" class="form-group row">
		<label for="x_TestUnit" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_TestUnit" id="u_TestUnit" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->TestUnit->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_TestUnit"><?php echo $patient_services->TestUnit->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->TestUnit->cellAttributes() ?>>
<span id="el_patient_services_TestUnit">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x_TestUnit" id="x_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestUnit->EditValue ?>"<?php echo $patient_services->TestUnit->editAttributes() ?>>
</span>
<?php echo $patient_services->TestUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
	<div id="r_LOWHIGH" class="form-group row">
		<label for="x_LOWHIGH" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_LOWHIGH" id="u_LOWHIGH" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->LOWHIGH->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_LOWHIGH"><?php echo $patient_services->LOWHIGH->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->LOWHIGH->cellAttributes() ?>>
<span id="el_patient_services_LOWHIGH">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services->LOWHIGH->EditValue ?>"<?php echo $patient_services->LOWHIGH->editAttributes() ?>>
</span>
<?php echo $patient_services->LOWHIGH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Branch->Visible) { // Branch ?>
	<div id="r_Branch" class="form-group row">
		<label for="x_Branch" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Branch" id="u_Branch" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Branch->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Branch"><?php echo $patient_services->Branch->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Branch->cellAttributes() ?>>
<span id="el_patient_services_Branch">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Branch->EditValue ?>"<?php echo $patient_services->Branch->editAttributes() ?>>
</span>
<?php echo $patient_services->Branch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Dispatch->Visible) { // Dispatch ?>
	<div id="r_Dispatch" class="form-group row">
		<label for="x_Dispatch" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Dispatch" id="u_Dispatch" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Dispatch->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Dispatch"><?php echo $patient_services->Dispatch->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Dispatch->cellAttributes() ?>>
<span id="el_patient_services_Dispatch">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Dispatch->EditValue ?>"<?php echo $patient_services->Dispatch->editAttributes() ?>>
</span>
<?php echo $patient_services->Dispatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Pic1->Visible) { // Pic1 ?>
	<div id="r_Pic1" class="form-group row">
		<label for="x_Pic1" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Pic1" id="u_Pic1" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Pic1->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Pic1"><?php echo $patient_services->Pic1->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Pic1->cellAttributes() ?>>
<span id="el_patient_services_Pic1">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic1->EditValue ?>"<?php echo $patient_services->Pic1->editAttributes() ?>>
</span>
<?php echo $patient_services->Pic1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Pic2->Visible) { // Pic2 ?>
	<div id="r_Pic2" class="form-group row">
		<label for="x_Pic2" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Pic2" id="u_Pic2" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Pic2->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Pic2"><?php echo $patient_services->Pic2->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Pic2->cellAttributes() ?>>
<span id="el_patient_services_Pic2">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic2->EditValue ?>"<?php echo $patient_services->Pic2->editAttributes() ?>>
</span>
<?php echo $patient_services->Pic2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->GraphPath->Visible) { // GraphPath ?>
	<div id="r_GraphPath" class="form-group row">
		<label for="x_GraphPath" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_GraphPath" id="u_GraphPath" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->GraphPath->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_GraphPath"><?php echo $patient_services->GraphPath->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->GraphPath->cellAttributes() ?>>
<span id="el_patient_services_GraphPath">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services->GraphPath->EditValue ?>"<?php echo $patient_services->GraphPath->editAttributes() ?>>
</span>
<?php echo $patient_services->GraphPath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->MachineCD->Visible) { // MachineCD ?>
	<div id="r_MachineCD" class="form-group row">
		<label for="x_MachineCD" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_MachineCD" id="u_MachineCD" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->MachineCD->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_MachineCD"><?php echo $patient_services->MachineCD->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->MachineCD->cellAttributes() ?>>
<span id="el_patient_services_MachineCD">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services->MachineCD->EditValue ?>"<?php echo $patient_services->MachineCD->editAttributes() ?>>
</span>
<?php echo $patient_services->MachineCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->TestCancel->Visible) { // TestCancel ?>
	<div id="r_TestCancel" class="form-group row">
		<label for="x_TestCancel" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_TestCancel" id="u_TestCancel" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->TestCancel->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_TestCancel"><?php echo $patient_services->TestCancel->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->TestCancel->cellAttributes() ?>>
<span id="el_patient_services_TestCancel">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestCancel->EditValue ?>"<?php echo $patient_services->TestCancel->editAttributes() ?>>
</span>
<?php echo $patient_services->TestCancel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->OutSource->Visible) { // OutSource ?>
	<div id="r_OutSource" class="form-group row">
		<label for="x_OutSource" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_OutSource" id="u_OutSource" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->OutSource->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_OutSource"><?php echo $patient_services->OutSource->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->OutSource->cellAttributes() ?>>
<span id="el_patient_services_OutSource">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services->OutSource->EditValue ?>"<?php echo $patient_services->OutSource->editAttributes() ?>>
</span>
<?php echo $patient_services->OutSource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Printed->Visible) { // Printed ?>
	<div id="r_Printed" class="form-group row">
		<label for="x_Printed" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Printed" id="u_Printed" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Printed->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Printed"><?php echo $patient_services->Printed->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Printed->cellAttributes() ?>>
<span id="el_patient_services_Printed">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services->Printed->EditValue ?>"<?php echo $patient_services->Printed->editAttributes() ?>>
</span>
<?php echo $patient_services->Printed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->PrintBy->Visible) { // PrintBy ?>
	<div id="r_PrintBy" class="form-group row">
		<label for="x_PrintBy" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_PrintBy" id="u_PrintBy" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->PrintBy->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_PrintBy"><?php echo $patient_services->PrintBy->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->PrintBy->cellAttributes() ?>>
<span id="el_patient_services_PrintBy">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintBy->EditValue ?>"<?php echo $patient_services->PrintBy->editAttributes() ?>>
</span>
<?php echo $patient_services->PrintBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->PrintDate->Visible) { // PrintDate ?>
	<div id="r_PrintDate" class="form-group row">
		<label for="x_PrintDate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_PrintDate" id="u_PrintDate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->PrintDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_PrintDate"><?php echo $patient_services->PrintDate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->PrintDate->cellAttributes() ?>>
<span id="el_patient_services_PrintDate">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?php echo HtmlEncode($patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintDate->EditValue ?>"<?php echo $patient_services->PrintDate->editAttributes() ?>>
<?php if (!$patient_services->PrintDate->ReadOnly && !$patient_services->PrintDate->Disabled && !isset($patient_services->PrintDate->EditAttrs["readonly"]) && !isset($patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesupdate", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_services->PrintDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->BillingDate->Visible) { // BillingDate ?>
	<div id="r_BillingDate" class="form-group row">
		<label for="x_BillingDate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_BillingDate" id="u_BillingDate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->BillingDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_BillingDate"><?php echo $patient_services->BillingDate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->BillingDate->cellAttributes() ?>>
<span id="el_patient_services_BillingDate">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x_BillingDate" id="x_BillingDate" placeholder="<?php echo HtmlEncode($patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillingDate->EditValue ?>"<?php echo $patient_services->BillingDate->editAttributes() ?>>
<?php if (!$patient_services->BillingDate->ReadOnly && !$patient_services->BillingDate->Disabled && !isset($patient_services->BillingDate->EditAttrs["readonly"]) && !isset($patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesupdate", "x_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_services->BillingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->BilledBy->Visible) { // BilledBy ?>
	<div id="r_BilledBy" class="form-group row">
		<label for="x_BilledBy" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_BilledBy" id="u_BilledBy" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->BilledBy->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_BilledBy"><?php echo $patient_services->BilledBy->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->BilledBy->cellAttributes() ?>>
<span id="el_patient_services_BilledBy">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x_BilledBy" id="x_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->BilledBy->EditValue ?>"<?php echo $patient_services->BilledBy->editAttributes() ?>>
</span>
<?php echo $patient_services->BilledBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Resulted->Visible) { // Resulted ?>
	<div id="r_Resulted" class="form-group row">
		<label for="x_Resulted" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Resulted" id="u_Resulted" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Resulted->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Resulted"><?php echo $patient_services->Resulted->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Resulted->cellAttributes() ?>>
<span id="el_patient_services_Resulted">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x_Resulted" id="x_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Resulted->EditValue ?>"<?php echo $patient_services->Resulted->editAttributes() ?>>
</span>
<?php echo $patient_services->Resulted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label for="x_ResultDate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ResultDate" id="u_ResultDate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->ResultDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ResultDate"><?php echo $patient_services->ResultDate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->ResultDate->cellAttributes() ?>>
<span id="el_patient_services_ResultDate">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultDate->EditValue ?>"<?php echo $patient_services->ResultDate->editAttributes() ?>>
<?php if (!$patient_services->ResultDate->ReadOnly && !$patient_services->ResultDate->Disabled && !isset($patient_services->ResultDate->EditAttrs["readonly"]) && !isset($patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesupdate", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_services->ResultDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ResultedBy->Visible) { // ResultedBy ?>
	<div id="r_ResultedBy" class="form-group row">
		<label for="x_ResultedBy" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ResultedBy" id="u_ResultedBy" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->ResultedBy->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ResultedBy"><?php echo $patient_services->ResultedBy->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->ResultedBy->cellAttributes() ?>>
<span id="el_patient_services_ResultedBy">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultedBy->EditValue ?>"<?php echo $patient_services->ResultedBy->editAttributes() ?>>
</span>
<?php echo $patient_services->ResultedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SampleDate->Visible) { // SampleDate ?>
	<div id="r_SampleDate" class="form-group row">
		<label for="x_SampleDate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_SampleDate" id="u_SampleDate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->SampleDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_SampleDate"><?php echo $patient_services->SampleDate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->SampleDate->cellAttributes() ?>>
<span id="el_patient_services_SampleDate">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?php echo HtmlEncode($patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleDate->EditValue ?>"<?php echo $patient_services->SampleDate->editAttributes() ?>>
<?php if (!$patient_services->SampleDate->ReadOnly && !$patient_services->SampleDate->Disabled && !isset($patient_services->SampleDate->EditAttrs["readonly"]) && !isset($patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesupdate", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_services->SampleDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SampleUser->Visible) { // SampleUser ?>
	<div id="r_SampleUser" class="form-group row">
		<label for="x_SampleUser" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_SampleUser" id="u_SampleUser" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->SampleUser->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_SampleUser"><?php echo $patient_services->SampleUser->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->SampleUser->cellAttributes() ?>>
<span id="el_patient_services_SampleUser">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleUser->EditValue ?>"<?php echo $patient_services->SampleUser->editAttributes() ?>>
</span>
<?php echo $patient_services->SampleUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Sampled->Visible) { // Sampled ?>
	<div id="r_Sampled" class="form-group row">
		<label for="x_Sampled" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Sampled" id="u_Sampled" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Sampled->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Sampled"><?php echo $patient_services->Sampled->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Sampled->cellAttributes() ?>>
<span id="el_patient_services_Sampled">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x_Sampled" id="x_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sampled->EditValue ?>"<?php echo $patient_services->Sampled->editAttributes() ?>>
</span>
<?php echo $patient_services->Sampled->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
	<div id="r_ReceivedDate" class="form-group row">
		<label for="x_ReceivedDate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ReceivedDate" id="u_ReceivedDate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->ReceivedDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ReceivedDate"><?php echo $patient_services->ReceivedDate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->ReceivedDate->cellAttributes() ?>>
<span id="el_patient_services_ReceivedDate">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedDate->EditValue ?>"<?php echo $patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services->ReceivedDate->ReadOnly && !$patient_services->ReceivedDate->Disabled && !isset($patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesupdate", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_services->ReceivedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
	<div id="r_ReceivedUser" class="form-group row">
		<label for="x_ReceivedUser" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ReceivedUser" id="u_ReceivedUser" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->ReceivedUser->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ReceivedUser"><?php echo $patient_services->ReceivedUser->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->ReceivedUser->cellAttributes() ?>>
<span id="el_patient_services_ReceivedUser">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedUser->EditValue ?>"<?php echo $patient_services->ReceivedUser->editAttributes() ?>>
</span>
<?php echo $patient_services->ReceivedUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Recevied->Visible) { // Recevied ?>
	<div id="r_Recevied" class="form-group row">
		<label for="x_Recevied" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Recevied" id="u_Recevied" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Recevied->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Recevied"><?php echo $patient_services->Recevied->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Recevied->cellAttributes() ?>>
<span id="el_patient_services_Recevied">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x_Recevied" id="x_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services->Recevied->EditValue ?>"<?php echo $patient_services->Recevied->editAttributes() ?>>
</span>
<?php echo $patient_services->Recevied->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<div id="r_DeptRecvDate" class="form-group row">
		<label for="x_DeptRecvDate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DeptRecvDate" id="u_DeptRecvDate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DeptRecvDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DeptRecvDate"><?php echo $patient_services->DeptRecvDate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DeptRecvDate->cellAttributes() ?>>
<span id="el_patient_services_DeptRecvDate">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvDate->EditValue ?>"<?php echo $patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services->DeptRecvDate->ReadOnly && !$patient_services->DeptRecvDate->Disabled && !isset($patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesupdate", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_services->DeptRecvDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<div id="r_DeptRecvUser" class="form-group row">
		<label for="x_DeptRecvUser" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DeptRecvUser" id="u_DeptRecvUser" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DeptRecvUser->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DeptRecvUser"><?php echo $patient_services->DeptRecvUser->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DeptRecvUser->cellAttributes() ?>>
<span id="el_patient_services_DeptRecvUser">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvUser->EditValue ?>"<?php echo $patient_services->DeptRecvUser->editAttributes() ?>>
</span>
<?php echo $patient_services->DeptRecvUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->DeptRecived->Visible) { // DeptRecived ?>
	<div id="r_DeptRecived" class="form-group row">
		<label for="x_DeptRecived" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DeptRecived" id="u_DeptRecived" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->DeptRecived->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DeptRecived"><?php echo $patient_services->DeptRecived->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->DeptRecived->cellAttributes() ?>>
<span id="el_patient_services_DeptRecived">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x_DeptRecived" id="x_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecived->EditValue ?>"<?php echo $patient_services->DeptRecived->editAttributes() ?>>
</span>
<?php echo $patient_services->DeptRecived->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SAuthDate->Visible) { // SAuthDate ?>
	<div id="r_SAuthDate" class="form-group row">
		<label for="x_SAuthDate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_SAuthDate" id="u_SAuthDate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->SAuthDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_SAuthDate"><?php echo $patient_services->SAuthDate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->SAuthDate->cellAttributes() ?>>
<span id="el_patient_services_SAuthDate">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthDate->EditValue ?>"<?php echo $patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services->SAuthDate->ReadOnly && !$patient_services->SAuthDate->Disabled && !isset($patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesupdate", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_services->SAuthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SAuthBy->Visible) { // SAuthBy ?>
	<div id="r_SAuthBy" class="form-group row">
		<label for="x_SAuthBy" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_SAuthBy" id="u_SAuthBy" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->SAuthBy->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_SAuthBy"><?php echo $patient_services->SAuthBy->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->SAuthBy->cellAttributes() ?>>
<span id="el_patient_services_SAuthBy">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthBy->EditValue ?>"<?php echo $patient_services->SAuthBy->editAttributes() ?>>
</span>
<?php echo $patient_services->SAuthBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
	<div id="r_SAuthendicate" class="form-group row">
		<label for="x_SAuthendicate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_SAuthendicate" id="u_SAuthendicate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->SAuthendicate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_SAuthendicate"><?php echo $patient_services->SAuthendicate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->SAuthendicate->cellAttributes() ?>>
<span id="el_patient_services_SAuthendicate">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x_SAuthendicate" id="x_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthendicate->EditValue ?>"<?php echo $patient_services->SAuthendicate->editAttributes() ?>>
</span>
<?php echo $patient_services->SAuthendicate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->AuthDate->Visible) { // AuthDate ?>
	<div id="r_AuthDate" class="form-group row">
		<label for="x_AuthDate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_AuthDate" id="u_AuthDate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->AuthDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_AuthDate"><?php echo $patient_services->AuthDate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->AuthDate->cellAttributes() ?>>
<span id="el_patient_services_AuthDate">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?php echo HtmlEncode($patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthDate->EditValue ?>"<?php echo $patient_services->AuthDate->editAttributes() ?>>
<?php if (!$patient_services->AuthDate->ReadOnly && !$patient_services->AuthDate->Disabled && !isset($patient_services->AuthDate->EditAttrs["readonly"]) && !isset($patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesupdate", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_services->AuthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->AuthBy->Visible) { // AuthBy ?>
	<div id="r_AuthBy" class="form-group row">
		<label for="x_AuthBy" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_AuthBy" id="u_AuthBy" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->AuthBy->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_AuthBy"><?php echo $patient_services->AuthBy->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->AuthBy->cellAttributes() ?>>
<span id="el_patient_services_AuthBy">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthBy->EditValue ?>"<?php echo $patient_services->AuthBy->editAttributes() ?>>
</span>
<?php echo $patient_services->AuthBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Authencate->Visible) { // Authencate ?>
	<div id="r_Authencate" class="form-group row">
		<label for="x_Authencate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Authencate" id="u_Authencate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Authencate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Authencate"><?php echo $patient_services->Authencate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Authencate->cellAttributes() ?>>
<span id="el_patient_services_Authencate">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x_Authencate" id="x_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services->Authencate->EditValue ?>"<?php echo $patient_services->Authencate->editAttributes() ?>>
</span>
<?php echo $patient_services->Authencate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label for="x_EditDate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_EditDate" id="u_EditDate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->EditDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_EditDate"><?php echo $patient_services->EditDate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->EditDate->cellAttributes() ?>>
<span id="el_patient_services_EditDate">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditDate->EditValue ?>"<?php echo $patient_services->EditDate->editAttributes() ?>>
<?php if (!$patient_services->EditDate->ReadOnly && !$patient_services->EditDate->Disabled && !isset($patient_services->EditDate->EditAttrs["readonly"]) && !isset($patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesupdate", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_services->EditDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->EditBy->Visible) { // EditBy ?>
	<div id="r_EditBy" class="form-group row">
		<label for="x_EditBy" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_EditBy" id="u_EditBy" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->EditBy->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_EditBy"><?php echo $patient_services->EditBy->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->EditBy->cellAttributes() ?>>
<span id="el_patient_services_EditBy">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x_EditBy" id="x_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditBy->EditValue ?>"<?php echo $patient_services->EditBy->editAttributes() ?>>
</span>
<?php echo $patient_services->EditBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Editted->Visible) { // Editted ?>
	<div id="r_Editted" class="form-group row">
		<label for="x_Editted" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Editted" id="u_Editted" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Editted->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Editted"><?php echo $patient_services->Editted->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Editted->cellAttributes() ?>>
<span id="el_patient_services_Editted">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x_Editted" id="x_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Editted->EditValue ?>"<?php echo $patient_services->Editted->editAttributes() ?>>
</span>
<?php echo $patient_services->Editted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label for="x_PatID" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_PatID" id="u_PatID" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->PatID->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_PatID"><?php echo $patient_services->PatID->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->PatID->cellAttributes() ?>>
<?php if ($patient_services->PatID->getSessionValue() <> "") { ?>
<span id="el_patient_services_PatID">
<span<?php echo $patient_services->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_PatID" name="x_PatID" value="<?php echo HtmlEncode($patient_services->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_services_PatID">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatID->EditValue ?>"<?php echo $patient_services->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_services->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_PatientId" id="u_PatientId" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->PatientId->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_PatientId"><?php echo $patient_services->PatientId->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->PatientId->cellAttributes() ?>>
<span id="el_patient_services_PatientId">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientId->EditValue ?>"<?php echo $patient_services->PatientId->editAttributes() ?>>
</span>
<?php echo $patient_services->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label for="x_Mobile" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Mobile" id="u_Mobile" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Mobile->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Mobile"><?php echo $patient_services->Mobile->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Mobile->cellAttributes() ?>>
<span id="el_patient_services_Mobile">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services->Mobile->EditValue ?>"<?php echo $patient_services->Mobile->editAttributes() ?>>
</span>
<?php echo $patient_services->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label for="x_CId" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_CId" id="u_CId" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->CId->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_CId"><?php echo $patient_services->CId->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->CId->cellAttributes() ?>>
<span id="el_patient_services_CId">
<input type="text" data-table="patient_services" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services->CId->EditValue ?>"<?php echo $patient_services->CId->editAttributes() ?>>
</span>
<?php echo $patient_services->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label for="x_Order" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Order" id="u_Order" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Order->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Order"><?php echo $patient_services->Order->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Order->cellAttributes() ?>>
<span id="el_patient_services_Order">
<input type="text" data-table="patient_services" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services->Order->EditValue ?>"<?php echo $patient_services->Order->editAttributes() ?>>
</span>
<?php echo $patient_services->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label for="x_Form" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Form" id="u_Form" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Form->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Form"><?php echo $patient_services->Form->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Form->cellAttributes() ?>>
<span id="el_patient_services_Form">
<textarea data-table="patient_services" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_services->Form->getPlaceHolder()) ?>"<?php echo $patient_services->Form->editAttributes() ?>><?php echo $patient_services->Form->EditValue ?></textarea>
</span>
<?php echo $patient_services->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label for="x_ResType" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ResType" id="u_ResType" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->ResType->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ResType"><?php echo $patient_services->ResType->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->ResType->cellAttributes() ?>>
<span id="el_patient_services_ResType">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResType->EditValue ?>"<?php echo $patient_services->ResType->editAttributes() ?>>
</span>
<?php echo $patient_services->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label for="x_Sample" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Sample" id="u_Sample" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Sample->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Sample"><?php echo $patient_services->Sample->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Sample->cellAttributes() ?>>
<span id="el_patient_services_Sample">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sample->EditValue ?>"<?php echo $patient_services->Sample->editAttributes() ?>>
</span>
<?php echo $patient_services->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label for="x_NoD" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_NoD" id="u_NoD" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->NoD->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_NoD"><?php echo $patient_services->NoD->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->NoD->cellAttributes() ?>>
<span id="el_patient_services_NoD">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services->NoD->EditValue ?>"<?php echo $patient_services->NoD->editAttributes() ?>>
</span>
<?php echo $patient_services->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label for="x_BillOrder" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_BillOrder" id="u_BillOrder" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->BillOrder->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_BillOrder"><?php echo $patient_services->BillOrder->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->BillOrder->cellAttributes() ?>>
<span id="el_patient_services_BillOrder">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillOrder->EditValue ?>"<?php echo $patient_services->BillOrder->editAttributes() ?>>
</span>
<?php echo $patient_services->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label for="x_Formula" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Formula" id="u_Formula" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Formula->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Formula"><?php echo $patient_services->Formula->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Formula->cellAttributes() ?>>
<span id="el_patient_services_Formula">
<textarea data-table="patient_services" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_services->Formula->getPlaceHolder()) ?>"<?php echo $patient_services->Formula->editAttributes() ?>><?php echo $patient_services->Formula->EditValue ?></textarea>
</span>
<?php echo $patient_services->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label for="x_Inactive" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Inactive" id="u_Inactive" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Inactive->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Inactive"><?php echo $patient_services->Inactive->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Inactive->cellAttributes() ?>>
<span id="el_patient_services_Inactive">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services->Inactive->EditValue ?>"<?php echo $patient_services->Inactive->editAttributes() ?>>
</span>
<?php echo $patient_services->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label for="x_CollSample" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_CollSample" id="u_CollSample" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->CollSample->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_CollSample"><?php echo $patient_services->CollSample->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->CollSample->cellAttributes() ?>>
<span id="el_patient_services_CollSample">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services->CollSample->EditValue ?>"<?php echo $patient_services->CollSample->editAttributes() ?>>
</span>
<?php echo $patient_services->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label for="x_TestType" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_TestType" id="u_TestType" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->TestType->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_TestType"><?php echo $patient_services->TestType->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->TestType->cellAttributes() ?>>
<span id="el_patient_services_TestType">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x_TestType" id="x_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestType->EditValue ?>"<?php echo $patient_services->TestType->editAttributes() ?>>
</span>
<?php echo $patient_services->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Repeated->Visible) { // Repeated ?>
	<div id="r_Repeated" class="form-group row">
		<label for="x_Repeated" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Repeated" id="u_Repeated" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Repeated->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Repeated"><?php echo $patient_services->Repeated->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Repeated->cellAttributes() ?>>
<span id="el_patient_services_Repeated">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x_Repeated" id="x_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services->Repeated->EditValue ?>"<?php echo $patient_services->Repeated->editAttributes() ?>>
</span>
<?php echo $patient_services->Repeated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
	<div id="r_RepeatedBy" class="form-group row">
		<label for="x_RepeatedBy" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_RepeatedBy" id="u_RepeatedBy" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->RepeatedBy->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_RepeatedBy"><?php echo $patient_services->RepeatedBy->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->RepeatedBy->cellAttributes() ?>>
<span id="el_patient_services_RepeatedBy">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x_RepeatedBy" id="x_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedBy->EditValue ?>"<?php echo $patient_services->RepeatedBy->editAttributes() ?>>
</span>
<?php echo $patient_services->RepeatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
	<div id="r_RepeatedDate" class="form-group row">
		<label for="x_RepeatedDate" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_RepeatedDate" id="u_RepeatedDate" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->RepeatedDate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_RepeatedDate"><?php echo $patient_services->RepeatedDate->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->RepeatedDate->cellAttributes() ?>>
<span id="el_patient_services_RepeatedDate">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x_RepeatedDate" id="x_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedDate->EditValue ?>"<?php echo $patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services->RepeatedDate->ReadOnly && !$patient_services->RepeatedDate->Disabled && !isset($patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesupdate", "x_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_services->RepeatedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->serviceID->Visible) { // serviceID ?>
	<div id="r_serviceID" class="form-group row">
		<label for="x_serviceID" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_serviceID" id="u_serviceID" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->serviceID->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_serviceID"><?php echo $patient_services->serviceID->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->serviceID->cellAttributes() ?>>
<span id="el_patient_services_serviceID">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x_serviceID" id="x_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services->serviceID->EditValue ?>"<?php echo $patient_services->serviceID->editAttributes() ?>>
</span>
<?php echo $patient_services->serviceID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Service_Type->Visible) { // Service_Type ?>
	<div id="r_Service_Type" class="form-group row">
		<label for="x_Service_Type" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Service_Type" id="u_Service_Type" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Service_Type->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Service_Type"><?php echo $patient_services->Service_Type->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Service_Type->cellAttributes() ?>>
<span id="el_patient_services_Service_Type">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x_Service_Type" id="x_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Type->EditValue ?>"<?php echo $patient_services->Service_Type->editAttributes() ?>>
</span>
<?php echo $patient_services->Service_Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->Service_Department->Visible) { // Service_Department ?>
	<div id="r_Service_Department" class="form-group row">
		<label for="x_Service_Department" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Service_Department" id="u_Service_Department" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->Service_Department->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Service_Department"><?php echo $patient_services->Service_Department->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->Service_Department->cellAttributes() ?>>
<span id="el_patient_services_Service_Department">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x_Service_Department" id="x_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Department->EditValue ?>"<?php echo $patient_services->Service_Department->editAttributes() ?>>
</span>
<?php echo $patient_services->Service_Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_services->RequestNo->Visible) { // RequestNo ?>
	<div id="r_RequestNo" class="form-group row">
		<label for="x_RequestNo" class="<?php echo $patient_services_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_RequestNo" id="u_RequestNo" class="form-check-input ew-multi-select" value="1"<?php echo ($patient_services->RequestNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_RequestNo"><?php echo $patient_services->RequestNo->caption() ?></label></div></label>
		<div class="<?php echo $patient_services_update->RightColumnClass ?>"><div<?php echo $patient_services->RequestNo->cellAttributes() ?>>
<span id="el_patient_services_RequestNo">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x_RequestNo" id="x_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services->RequestNo->EditValue ?>"<?php echo $patient_services->RequestNo->editAttributes() ?>>
</span>
<?php echo $patient_services->RequestNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page -->
<?php if (!$patient_services_update->IsModal) { ?>
	<div class="form-group row"><!-- buttons .form-group -->
		<div class="<?php echo $patient_services_update->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("UpdateBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_services_update->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
		</div><!-- /buttons offset -->
	</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_services_update->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_services_update->terminate();
?>