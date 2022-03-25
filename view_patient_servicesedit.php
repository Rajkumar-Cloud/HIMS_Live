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
$view_patient_services_edit = new view_patient_services_edit();

// Run the page
$view_patient_services_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_services_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_patient_servicesedit = currentForm = new ew.Form("fview_patient_servicesedit", "edit");

// Validate form
fview_patient_servicesedit.validate = function() {
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
		<?php if ($view_patient_services_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->id->caption(), $view_patient_services->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Reception->caption(), $view_patient_services->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->mrnno->caption(), $view_patient_services->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PatientName->caption(), $view_patient_services->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Age->caption(), $view_patient_services->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Gender->caption(), $view_patient_services->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->profilePic->caption(), $view_patient_services->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Services->caption(), $view_patient_services->Services->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Unit->caption(), $view_patient_services->Unit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Unit->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->amount->caption(), $view_patient_services->amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->amount->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Quantity->caption(), $view_patient_services->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Quantity->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->DiscountCategory->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountCategory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DiscountCategory->caption(), $view_patient_services->DiscountCategory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Discount->caption(), $view_patient_services->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Discount->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->SubTotal->Required) { ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SubTotal->caption(), $view_patient_services->SubTotal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->SubTotal->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->description->caption(), $view_patient_services->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->patient_type->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->patient_type->caption(), $view_patient_services->patient_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->charged_date->Required) { ?>
			elm = this.getElements("x" + infix + "_charged_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->charged_date->caption(), $view_patient_services->charged_date->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->status->caption(), $view_patient_services->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->modifiedby->caption(), $view_patient_services->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->modifieddatetime->caption(), $view_patient_services->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Aid->Required) { ?>
			elm = this.getElements("x" + infix + "_Aid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Aid->caption(), $view_patient_services->Aid->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Vid->caption(), $view_patient_services->Vid->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrID->caption(), $view_patient_services->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->DrCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_DrCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrCODE->caption(), $view_patient_services->DrCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrName->caption(), $view_patient_services->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Department->caption(), $view_patient_services->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->DrSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrSharePres->caption(), $view_patient_services->DrSharePres->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrSharePres->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->HospSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->HospSharePres->caption(), $view_patient_services->HospSharePres->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->HospSharePres->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->DrShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareAmount->caption(), $view_patient_services->DrShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->HospShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->HospShareAmount->caption(), $view_patient_services->HospShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->HospShareAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->DrShareSettiledAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareSettiledAmount->caption(), $view_patient_services->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareSettiledAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->DrShareSettledId->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareSettledId->caption(), $view_patient_services->DrShareSettledId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareSettledId->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->DrShareSettiledStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareSettiledStatus->caption(), $view_patient_services->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareSettiledStatus->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->invoiceId->caption(), $view_patient_services->invoiceId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->invoiceId->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->invoiceAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->invoiceAmount->caption(), $view_patient_services->invoiceAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->invoiceAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->invoiceStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->invoiceStatus->caption(), $view_patient_services->invoiceStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->modeOfPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_modeOfPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->modeOfPayment->caption(), $view_patient_services->modeOfPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->HospID->caption(), $view_patient_services->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->RIDNO->caption(), $view_patient_services->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->RIDNO->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ItemCode->caption(), $view_patient_services->ItemCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TidNo->caption(), $view_patient_services->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->TidNo->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->sid->caption(), $view_patient_services->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->sid->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestSubCd->caption(), $view_patient_services->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DEptCd->caption(), $view_patient_services->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->ProfCd->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ProfCd->caption(), $view_patient_services->ProfCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->LabReport->Required) { ?>
			elm = this.getElements("x" + infix + "_LabReport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->LabReport->caption(), $view_patient_services->LabReport->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Comments->Required) { ?>
			elm = this.getElements("x" + infix + "_Comments");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Comments->caption(), $view_patient_services->Comments->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Method->caption(), $view_patient_services->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Specimen->Required) { ?>
			elm = this.getElements("x" + infix + "_Specimen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Specimen->caption(), $view_patient_services->Specimen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Abnormal->Required) { ?>
			elm = this.getElements("x" + infix + "_Abnormal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Abnormal->caption(), $view_patient_services->Abnormal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->RefValue->Required) { ?>
			elm = this.getElements("x" + infix + "_RefValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->RefValue->caption(), $view_patient_services->RefValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->TestUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_TestUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestUnit->caption(), $view_patient_services->TestUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->LOWHIGH->Required) { ?>
			elm = this.getElements("x" + infix + "_LOWHIGH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->LOWHIGH->caption(), $view_patient_services->LOWHIGH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Branch->Required) { ?>
			elm = this.getElements("x" + infix + "_Branch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Branch->caption(), $view_patient_services->Branch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Dispatch->Required) { ?>
			elm = this.getElements("x" + infix + "_Dispatch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Dispatch->caption(), $view_patient_services->Dispatch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Pic1->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Pic1->caption(), $view_patient_services->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Pic2->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Pic2->caption(), $view_patient_services->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->GraphPath->Required) { ?>
			elm = this.getElements("x" + infix + "_GraphPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->GraphPath->caption(), $view_patient_services->GraphPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->MachineCD->Required) { ?>
			elm = this.getElements("x" + infix + "_MachineCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->MachineCD->caption(), $view_patient_services->MachineCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->TestCancel->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCancel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestCancel->caption(), $view_patient_services->TestCancel->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->OutSource->Required) { ?>
			elm = this.getElements("x" + infix + "_OutSource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->OutSource->caption(), $view_patient_services->OutSource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Printed->Required) { ?>
			elm = this.getElements("x" + infix + "_Printed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Printed->caption(), $view_patient_services->Printed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->PrintBy->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PrintBy->caption(), $view_patient_services->PrintBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->PrintDate->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PrintDate->caption(), $view_patient_services->PrintDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->PrintDate->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->BillingDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->BillingDate->caption(), $view_patient_services->BillingDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->BillingDate->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->BilledBy->Required) { ?>
			elm = this.getElements("x" + infix + "_BilledBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->BilledBy->caption(), $view_patient_services->BilledBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Resulted->Required) { ?>
			elm = this.getElements("x" + infix + "_Resulted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Resulted->caption(), $view_patient_services->Resulted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ResultDate->caption(), $view_patient_services->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->ResultDate->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ResultedBy->caption(), $view_patient_services->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->SampleDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SampleDate->caption(), $view_patient_services->SampleDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->SampleDate->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->SampleUser->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SampleUser->caption(), $view_patient_services->SampleUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Sampled->Required) { ?>
			elm = this.getElements("x" + infix + "_Sampled");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Sampled->caption(), $view_patient_services->Sampled->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->ReceivedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ReceivedDate->caption(), $view_patient_services->ReceivedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->ReceivedDate->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->ReceivedUser->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ReceivedUser->caption(), $view_patient_services->ReceivedUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Recevied->Required) { ?>
			elm = this.getElements("x" + infix + "_Recevied");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Recevied->caption(), $view_patient_services->Recevied->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->DeptRecvDate->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DeptRecvDate->caption(), $view_patient_services->DeptRecvDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DeptRecvDate->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->DeptRecvUser->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DeptRecvUser->caption(), $view_patient_services->DeptRecvUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->DeptRecived->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecived");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DeptRecived->caption(), $view_patient_services->DeptRecived->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->SAuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SAuthDate->caption(), $view_patient_services->SAuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->SAuthDate->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->SAuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SAuthBy->caption(), $view_patient_services->SAuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->SAuthendicate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthendicate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SAuthendicate->caption(), $view_patient_services->SAuthendicate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->AuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->AuthDate->caption(), $view_patient_services->AuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->AuthDate->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->AuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->AuthBy->caption(), $view_patient_services->AuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Authencate->Required) { ?>
			elm = this.getElements("x" + infix + "_Authencate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Authencate->caption(), $view_patient_services->Authencate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->EditDate->Required) { ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->EditDate->caption(), $view_patient_services->EditDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->EditDate->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->EditBy->Required) { ?>
			elm = this.getElements("x" + infix + "_EditBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->EditBy->caption(), $view_patient_services->EditBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Editted->Required) { ?>
			elm = this.getElements("x" + infix + "_Editted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Editted->caption(), $view_patient_services->Editted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PatID->caption(), $view_patient_services->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->PatID->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PatientId->caption(), $view_patient_services->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Mobile->caption(), $view_patient_services->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->CId->caption(), $view_patient_services->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->CId->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Order->caption(), $view_patient_services->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Order->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->Form->Required) { ?>
			elm = this.getElements("x" + infix + "_Form");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Form->caption(), $view_patient_services->Form->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ResType->caption(), $view_patient_services->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Sample->caption(), $view_patient_services->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->NoD->caption(), $view_patient_services->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->NoD->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->BillOrder->caption(), $view_patient_services->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->BillOrder->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->Formula->Required) { ?>
			elm = this.getElements("x" + infix + "_Formula");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Formula->caption(), $view_patient_services->Formula->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Inactive->caption(), $view_patient_services->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->CollSample->caption(), $view_patient_services->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestType->caption(), $view_patient_services->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Repeated->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Repeated->caption(), $view_patient_services->Repeated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->RepeatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->RepeatedBy->caption(), $view_patient_services->RepeatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->RepeatedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->RepeatedDate->caption(), $view_patient_services->RepeatedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->RepeatedDate->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->serviceID->Required) { ?>
			elm = this.getElements("x" + infix + "_serviceID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->serviceID->caption(), $view_patient_services->serviceID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_serviceID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->serviceID->errorMessage()) ?>");
		<?php if ($view_patient_services_edit->Service_Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Service_Type->caption(), $view_patient_services->Service_Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->Service_Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Service_Department->caption(), $view_patient_services->Service_Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_edit->RequestNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RequestNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->RequestNo->caption(), $view_patient_services->RequestNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RequestNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->RequestNo->errorMessage()) ?>");

			// Fire Form_CustomValidate event
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

// Form_CustomValidate event
fview_patient_servicesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_patient_servicesedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_patient_servicesedit.lists["x_Services"] = <?php echo $view_patient_services_edit->Services->Lookup->toClientList() ?>;
fview_patient_servicesedit.lists["x_Services"].options = <?php echo JsonEncode($view_patient_services_edit->Services->lookupOptions()) ?>;
fview_patient_servicesedit.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_patient_servicesedit.lists["x_DiscountCategory"] = <?php echo $view_patient_services_edit->DiscountCategory->Lookup->toClientList() ?>;
fview_patient_servicesedit.lists["x_DiscountCategory"].options = <?php echo JsonEncode($view_patient_services_edit->DiscountCategory->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_patient_services_edit->showPageHeader(); ?>
<?php
$view_patient_services_edit->showMessage();
?>
<form name="fview_patient_servicesedit" id="fview_patient_servicesedit" class="<?php echo $view_patient_services_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_patient_services_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_patient_services_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_services">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_patient_services_edit->IsModal ?>">
<?php if ($view_patient_services->getCurrentMasterTable() == "view_billing_voucher") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_billing_voucher">
<input type="hidden" name="fk_id" value="<?php echo $view_patient_services->Vid->getSessionValue() ?>">
<?php } ?>
<?php if ($view_patient_services->getCurrentMasterTable() == "view_billing_voucher_print") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_billing_voucher_print">
<input type="hidden" name="fk_id" value="<?php echo $view_patient_services->Vid->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_patient_services->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_patient_services_id" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->id->caption() ?><?php echo ($view_patient_services->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->id->cellAttributes() ?>>
<span id="el_view_patient_services_id">
<span<?php echo $view_patient_services->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_patient_services->id->CurrentValue) ?>">
<?php echo $view_patient_services->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_patient_services_Reception" for="x_Reception" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Reception->caption() ?><?php echo ($view_patient_services->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Reception->cellAttributes() ?>>
<span id="el_view_patient_services_Reception">
<span<?php echo $view_patient_services->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->CurrentValue) ?>">
<?php echo $view_patient_services->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_patient_services_mrnno" for="x_mrnno" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->mrnno->caption() ?><?php echo ($view_patient_services->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->mrnno->cellAttributes() ?>>
<span id="el_view_patient_services_mrnno">
<span<?php echo $view_patient_services->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->CurrentValue) ?>">
<?php echo $view_patient_services->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_patient_services_PatientName" for="x_PatientName" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->PatientName->caption() ?><?php echo ($view_patient_services->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->PatientName->cellAttributes() ?>>
<span id="el_view_patient_services_PatientName">
<span<?php echo $view_patient_services->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->PatientName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->CurrentValue) ?>">
<?php echo $view_patient_services->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_view_patient_services_Age" for="x_Age" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Age->caption() ?><?php echo ($view_patient_services->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Age->cellAttributes() ?>>
<span id="el_view_patient_services_Age">
<span<?php echo $view_patient_services->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Age->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="x_Age" id="x_Age" value="<?php echo HtmlEncode($view_patient_services->Age->CurrentValue) ?>">
<?php echo $view_patient_services->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_view_patient_services_Gender" for="x_Gender" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Gender->caption() ?><?php echo ($view_patient_services->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Gender->cellAttributes() ?>>
<span id="el_view_patient_services_Gender">
<span<?php echo $view_patient_services->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Gender->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="x_Gender" id="x_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->CurrentValue) ?>">
<?php echo $view_patient_services->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_patient_services_profilePic" for="x_profilePic" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->profilePic->caption() ?><?php echo ($view_patient_services->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->profilePic->cellAttributes() ?>>
<span id="el_view_patient_services_profilePic">
<span<?php echo $view_patient_services->profilePic->viewAttributes() ?>>
<?php echo $view_patient_services->profilePic->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->CurrentValue) ?>">
<?php echo $view_patient_services->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Services->Visible) { // Services ?>
	<div id="r_Services" class="form-group row">
		<label id="elh_view_patient_services_Services" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Services->caption() ?><?php echo ($view_patient_services->Services->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Services->cellAttributes() ?>>
<span id="el_view_patient_services_Services">
<?php
$wrkonchange = "" . trim(@$view_patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x_Services" class="text-nowrap" style="z-index: 8920">
	<input type="text" class="form-control" name="sv_x_Services" id="sv_x_Services" value="<?php echo RemoveHtml($view_patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services->Services->displayValueSeparatorAttribute() ?>" name="x_Services" id="x_Services" value="<?php echo HtmlEncode($view_patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_patient_servicesedit.createAutoSuggest({"id":"x_Services","forceSelect":false});
</script>
<?php echo $view_patient_services->Services->Lookup->getParamTag("p_x_Services") ?>
</span>
<?php echo $view_patient_services->Services->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Unit->Visible) { // Unit ?>
	<div id="r_Unit" class="form-group row">
		<label id="elh_view_patient_services_Unit" for="x_Unit" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Unit->caption() ?><?php echo ($view_patient_services->Unit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Unit->cellAttributes() ?>>
<span id="el_view_patient_services_Unit">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x_Unit" id="x_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Unit->EditValue ?>"<?php echo $view_patient_services->Unit->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_view_patient_services_amount" for="x_amount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->amount->caption() ?><?php echo ($view_patient_services->amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->amount->cellAttributes() ?>>
<span id="el_view_patient_services_amount">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x_amount" id="x_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->amount->EditValue ?>"<?php echo $view_patient_services->amount->editAttributes() ?>>
</span>
<?php echo $view_patient_services->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_patient_services_Quantity" for="x_Quantity" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Quantity->caption() ?><?php echo ($view_patient_services->Quantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Quantity->cellAttributes() ?>>
<span id="el_view_patient_services_Quantity">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Quantity->EditValue ?>"<?php echo $view_patient_services->Quantity->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
	<div id="r_DiscountCategory" class="form-group row">
		<label id="elh_view_patient_services_DiscountCategory" for="x_DiscountCategory" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DiscountCategory->caption() ?><?php echo ($view_patient_services->DiscountCategory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DiscountCategory->cellAttributes() ?>>
<span id="el_view_patient_services_DiscountCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x_DiscountCategory" name="x_DiscountCategory"<?php echo $view_patient_services->DiscountCategory->editAttributes() ?>>
		<?php echo $view_patient_services->DiscountCategory->selectOptionListHtml("x_DiscountCategory") ?>
	</select>
</div>
<?php echo $view_patient_services->DiscountCategory->Lookup->getParamTag("p_x_DiscountCategory") ?>
</span>
<?php echo $view_patient_services->DiscountCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_view_patient_services_Discount" for="x_Discount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Discount->caption() ?><?php echo ($view_patient_services->Discount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Discount->cellAttributes() ?>>
<span id="el_view_patient_services_Discount">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x_Discount" id="x_Discount" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Discount->EditValue ?>"<?php echo $view_patient_services->Discount->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->SubTotal->Visible) { // SubTotal ?>
	<div id="r_SubTotal" class="form-group row">
		<label id="elh_view_patient_services_SubTotal" for="x_SubTotal" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->SubTotal->caption() ?><?php echo ($view_patient_services->SubTotal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->SubTotal->cellAttributes() ?>>
<span id="el_view_patient_services_SubTotal">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SubTotal->EditValue ?>"<?php echo $view_patient_services->SubTotal->editAttributes() ?>>
</span>
<?php echo $view_patient_services->SubTotal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_view_patient_services_description" for="x_description" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->description->caption() ?><?php echo ($view_patient_services->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->description->cellAttributes() ?>>
<span id="el_view_patient_services_description">
<span<?php echo $view_patient_services->description->viewAttributes() ?>>
<?php echo $view_patient_services->description->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="x_description" id="x_description" value="<?php echo HtmlEncode($view_patient_services->description->CurrentValue) ?>">
<?php echo $view_patient_services->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->patient_type->Visible) { // patient_type ?>
	<div id="r_patient_type" class="form-group row">
		<label id="elh_view_patient_services_patient_type" for="x_patient_type" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->patient_type->caption() ?><?php echo ($view_patient_services->patient_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->patient_type->cellAttributes() ?>>
<span id="el_view_patient_services_patient_type">
<span<?php echo $view_patient_services->patient_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->patient_type->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="x_patient_type" id="x_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->CurrentValue) ?>">
<?php echo $view_patient_services->patient_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label id="elh_view_patient_services_charged_date" for="x_charged_date" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->charged_date->caption() ?><?php echo ($view_patient_services->charged_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->charged_date->cellAttributes() ?>>
<span id="el_view_patient_services_charged_date">
<span<?php echo $view_patient_services->charged_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->charged_date->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->CurrentValue) ?>">
<?php echo $view_patient_services->charged_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_patient_services_status" for="x_status" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->status->caption() ?><?php echo ($view_patient_services->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->status->cellAttributes() ?>>
<span id="el_view_patient_services_status">
<span<?php echo $view_patient_services->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->status->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="x_status" id="x_status" value="<?php echo HtmlEncode($view_patient_services->status->CurrentValue) ?>">
<?php echo $view_patient_services->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Aid->Visible) { // Aid ?>
	<div id="r_Aid" class="form-group row">
		<label id="elh_view_patient_services_Aid" for="x_Aid" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Aid->caption() ?><?php echo ($view_patient_services->Aid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Aid->cellAttributes() ?>>
<span id="el_view_patient_services_Aid">
<span<?php echo $view_patient_services->Aid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Aid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="x_Aid" id="x_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->CurrentValue) ?>">
<?php echo $view_patient_services->Aid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Vid->Visible) { // Vid ?>
	<div id="r_Vid" class="form-group row">
		<label id="elh_view_patient_services_Vid" for="x_Vid" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Vid->caption() ?><?php echo ($view_patient_services->Vid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Vid->cellAttributes() ?>>
<span id="el_view_patient_services_Vid">
<span<?php echo $view_patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Vid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="x_Vid" id="x_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->CurrentValue) ?>">
<?php echo $view_patient_services->Vid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_view_patient_services_DrID" for="x_DrID" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DrID->caption() ?><?php echo ($view_patient_services->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DrID->cellAttributes() ?>>
<span id="el_view_patient_services_DrID">
<span<?php echo $view_patient_services->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="x_DrID" id="x_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->CurrentValue) ?>">
<?php echo $view_patient_services->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DrCODE->Visible) { // DrCODE ?>
	<div id="r_DrCODE" class="form-group row">
		<label id="elh_view_patient_services_DrCODE" for="x_DrCODE" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DrCODE->caption() ?><?php echo ($view_patient_services->DrCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DrCODE->cellAttributes() ?>>
<span id="el_view_patient_services_DrCODE">
<span<?php echo $view_patient_services->DrCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrCODE->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="x_DrCODE" id="x_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->CurrentValue) ?>">
<?php echo $view_patient_services->DrCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label id="elh_view_patient_services_DrName" for="x_DrName" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DrName->caption() ?><?php echo ($view_patient_services->DrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DrName->cellAttributes() ?>>
<span id="el_view_patient_services_DrName">
<span<?php echo $view_patient_services->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="x_DrName" id="x_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->CurrentValue) ?>">
<?php echo $view_patient_services->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh_view_patient_services_Department" for="x_Department" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Department->caption() ?><?php echo ($view_patient_services->Department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Department->cellAttributes() ?>>
<span id="el_view_patient_services_Department">
<span<?php echo $view_patient_services->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Department->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="x_Department" id="x_Department" value="<?php echo HtmlEncode($view_patient_services->Department->CurrentValue) ?>">
<?php echo $view_patient_services->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DrSharePres->Visible) { // DrSharePres ?>
	<div id="r_DrSharePres" class="form-group row">
		<label id="elh_view_patient_services_DrSharePres" for="x_DrSharePres" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DrSharePres->caption() ?><?php echo ($view_patient_services->DrSharePres->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DrSharePres->cellAttributes() ?>>
<span id="el_view_patient_services_DrSharePres">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x_DrSharePres" id="x_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrSharePres->EditValue ?>"<?php echo $view_patient_services->DrSharePres->editAttributes() ?>>
</span>
<?php echo $view_patient_services->DrSharePres->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->HospSharePres->Visible) { // HospSharePres ?>
	<div id="r_HospSharePres" class="form-group row">
		<label id="elh_view_patient_services_HospSharePres" for="x_HospSharePres" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->HospSharePres->caption() ?><?php echo ($view_patient_services->HospSharePres->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->HospSharePres->cellAttributes() ?>>
<span id="el_view_patient_services_HospSharePres">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x_HospSharePres" id="x_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospSharePres->EditValue ?>"<?php echo $view_patient_services->HospSharePres->editAttributes() ?>>
</span>
<?php echo $view_patient_services->HospSharePres->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label id="elh_view_patient_services_DrShareAmount" for="x_DrShareAmount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DrShareAmount->caption() ?><?php echo ($view_patient_services->DrShareAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DrShareAmount->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareAmount->EditValue ?>"<?php echo $view_patient_services->DrShareAmount->editAttributes() ?>>
</span>
<?php echo $view_patient_services->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label id="elh_view_patient_services_HospShareAmount" for="x_HospShareAmount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->HospShareAmount->caption() ?><?php echo ($view_patient_services->HospShareAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->HospShareAmount->cellAttributes() ?>>
<span id="el_view_patient_services_HospShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospShareAmount->EditValue ?>"<?php echo $view_patient_services->HospShareAmount->editAttributes() ?>>
</span>
<?php echo $view_patient_services->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<div id="r_DrShareSettiledAmount" class="form-group row">
		<label id="elh_view_patient_services_DrShareSettiledAmount" for="x_DrShareSettiledAmount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DrShareSettiledAmount->caption() ?><?php echo ($view_patient_services->DrShareSettiledAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareSettiledAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x_DrShareSettiledAmount" id="x_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php echo $view_patient_services->DrShareSettiledAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<div id="r_DrShareSettledId" class="form-group row">
		<label id="elh_view_patient_services_DrShareSettledId" for="x_DrShareSettledId" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DrShareSettledId->caption() ?><?php echo ($view_patient_services->DrShareSettledId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DrShareSettledId->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareSettledId">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x_DrShareSettledId" id="x_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services->DrShareSettledId->editAttributes() ?>>
</span>
<?php echo $view_patient_services->DrShareSettledId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<div id="r_DrShareSettiledStatus" class="form-group row">
		<label id="elh_view_patient_services_DrShareSettiledStatus" for="x_DrShareSettiledStatus" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DrShareSettiledStatus->caption() ?><?php echo ($view_patient_services->DrShareSettiledStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareSettiledStatus">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x_DrShareSettiledStatus" id="x_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php echo $view_patient_services->DrShareSettiledStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->invoiceId->Visible) { // invoiceId ?>
	<div id="r_invoiceId" class="form-group row">
		<label id="elh_view_patient_services_invoiceId" for="x_invoiceId" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->invoiceId->caption() ?><?php echo ($view_patient_services->invoiceId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->invoiceId->cellAttributes() ?>>
<span id="el_view_patient_services_invoiceId">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceId->EditValue ?>"<?php echo $view_patient_services->invoiceId->editAttributes() ?>>
</span>
<?php echo $view_patient_services->invoiceId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
	<div id="r_invoiceAmount" class="form-group row">
		<label id="elh_view_patient_services_invoiceAmount" for="x_invoiceAmount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->invoiceAmount->caption() ?><?php echo ($view_patient_services->invoiceAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->invoiceAmount->cellAttributes() ?>>
<span id="el_view_patient_services_invoiceAmount">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceAmount->EditValue ?>"<?php echo $view_patient_services->invoiceAmount->editAttributes() ?>>
</span>
<?php echo $view_patient_services->invoiceAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
	<div id="r_invoiceStatus" class="form-group row">
		<label id="elh_view_patient_services_invoiceStatus" for="x_invoiceStatus" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->invoiceStatus->caption() ?><?php echo ($view_patient_services->invoiceStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->invoiceStatus->cellAttributes() ?>>
<span id="el_view_patient_services_invoiceStatus">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceStatus->EditValue ?>"<?php echo $view_patient_services->invoiceStatus->editAttributes() ?>>
</span>
<?php echo $view_patient_services->invoiceStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
	<div id="r_modeOfPayment" class="form-group row">
		<label id="elh_view_patient_services_modeOfPayment" for="x_modeOfPayment" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->modeOfPayment->caption() ?><?php echo ($view_patient_services->modeOfPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->modeOfPayment->cellAttributes() ?>>
<span id="el_view_patient_services_modeOfPayment">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->modeOfPayment->EditValue ?>"<?php echo $view_patient_services->modeOfPayment->editAttributes() ?>>
</span>
<?php echo $view_patient_services->modeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_view_patient_services_RIDNO" for="x_RIDNO" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->RIDNO->caption() ?><?php echo ($view_patient_services->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->RIDNO->cellAttributes() ?>>
<span id="el_view_patient_services_RIDNO">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RIDNO->EditValue ?>"<?php echo $view_patient_services->RIDNO->editAttributes() ?>>
</span>
<?php echo $view_patient_services->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->ItemCode->Visible) { // ItemCode ?>
	<div id="r_ItemCode" class="form-group row">
		<label id="elh_view_patient_services_ItemCode" for="x_ItemCode" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->ItemCode->caption() ?><?php echo ($view_patient_services->ItemCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->ItemCode->cellAttributes() ?>>
<span id="el_view_patient_services_ItemCode">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ItemCode->EditValue ?>"<?php echo $view_patient_services->ItemCode->editAttributes() ?>>
</span>
<?php echo $view_patient_services->ItemCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_view_patient_services_TidNo" for="x_TidNo" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->TidNo->caption() ?><?php echo ($view_patient_services->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->TidNo->cellAttributes() ?>>
<span id="el_view_patient_services_TidNo">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TidNo->EditValue ?>"<?php echo $view_patient_services->TidNo->editAttributes() ?>>
</span>
<?php echo $view_patient_services->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label id="elh_view_patient_services_sid" for="x_sid" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->sid->caption() ?><?php echo ($view_patient_services->sid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->sid->cellAttributes() ?>>
<span id="el_view_patient_services_sid">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x_sid" id="x_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->sid->EditValue ?>"<?php echo $view_patient_services->sid->editAttributes() ?>>
</span>
<?php echo $view_patient_services->sid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_view_patient_services_TestSubCd" for="x_TestSubCd" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->TestSubCd->caption() ?><?php echo ($view_patient_services->TestSubCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->TestSubCd->cellAttributes() ?>>
<span id="el_view_patient_services_TestSubCd">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestSubCd->EditValue ?>"<?php echo $view_patient_services->TestSubCd->editAttributes() ?>>
</span>
<?php echo $view_patient_services->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label id="elh_view_patient_services_DEptCd" for="x_DEptCd" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DEptCd->caption() ?><?php echo ($view_patient_services->DEptCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DEptCd->cellAttributes() ?>>
<span id="el_view_patient_services_DEptCd">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DEptCd->EditValue ?>"<?php echo $view_patient_services->DEptCd->editAttributes() ?>>
</span>
<?php echo $view_patient_services->DEptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->ProfCd->Visible) { // ProfCd ?>
	<div id="r_ProfCd" class="form-group row">
		<label id="elh_view_patient_services_ProfCd" for="x_ProfCd" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->ProfCd->caption() ?><?php echo ($view_patient_services->ProfCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->ProfCd->cellAttributes() ?>>
<span id="el_view_patient_services_ProfCd">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ProfCd->EditValue ?>"<?php echo $view_patient_services->ProfCd->editAttributes() ?>>
</span>
<?php echo $view_patient_services->ProfCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->LabReport->Visible) { // LabReport ?>
	<div id="r_LabReport" class="form-group row">
		<label id="elh_view_patient_services_LabReport" for="x_LabReport" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->LabReport->caption() ?><?php echo ($view_patient_services->LabReport->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->LabReport->cellAttributes() ?>>
<span id="el_view_patient_services_LabReport">
<textarea data-table="view_patient_services" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->LabReport->getPlaceHolder()) ?>"<?php echo $view_patient_services->LabReport->editAttributes() ?>><?php echo $view_patient_services->LabReport->EditValue ?></textarea>
</span>
<?php echo $view_patient_services->LabReport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label id="elh_view_patient_services_Comments" for="x_Comments" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Comments->caption() ?><?php echo ($view_patient_services->Comments->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Comments->cellAttributes() ?>>
<span id="el_view_patient_services_Comments">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Comments->EditValue ?>"<?php echo $view_patient_services->Comments->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Comments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_view_patient_services_Method" for="x_Method" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Method->caption() ?><?php echo ($view_patient_services->Method->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Method->cellAttributes() ?>>
<span id="el_view_patient_services_Method">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Method->EditValue ?>"<?php echo $view_patient_services->Method->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Specimen->Visible) { // Specimen ?>
	<div id="r_Specimen" class="form-group row">
		<label id="elh_view_patient_services_Specimen" for="x_Specimen" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Specimen->caption() ?><?php echo ($view_patient_services->Specimen->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Specimen->cellAttributes() ?>>
<span id="el_view_patient_services_Specimen">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Specimen->EditValue ?>"<?php echo $view_patient_services->Specimen->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Specimen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label id="elh_view_patient_services_Abnormal" for="x_Abnormal" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Abnormal->caption() ?><?php echo ($view_patient_services->Abnormal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Abnormal->cellAttributes() ?>>
<span id="el_view_patient_services_Abnormal">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Abnormal->EditValue ?>"<?php echo $view_patient_services->Abnormal->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Abnormal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_view_patient_services_RefValue" for="x_RefValue" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->RefValue->caption() ?><?php echo ($view_patient_services->RefValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->RefValue->cellAttributes() ?>>
<span id="el_view_patient_services_RefValue">
<textarea data-table="view_patient_services" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->RefValue->getPlaceHolder()) ?>"<?php echo $view_patient_services->RefValue->editAttributes() ?>><?php echo $view_patient_services->RefValue->EditValue ?></textarea>
</span>
<?php echo $view_patient_services->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->TestUnit->Visible) { // TestUnit ?>
	<div id="r_TestUnit" class="form-group row">
		<label id="elh_view_patient_services_TestUnit" for="x_TestUnit" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->TestUnit->caption() ?><?php echo ($view_patient_services->TestUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->TestUnit->cellAttributes() ?>>
<span id="el_view_patient_services_TestUnit">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x_TestUnit" id="x_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestUnit->EditValue ?>"<?php echo $view_patient_services->TestUnit->editAttributes() ?>>
</span>
<?php echo $view_patient_services->TestUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
	<div id="r_LOWHIGH" class="form-group row">
		<label id="elh_view_patient_services_LOWHIGH" for="x_LOWHIGH" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->LOWHIGH->caption() ?><?php echo ($view_patient_services->LOWHIGH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->LOWHIGH->cellAttributes() ?>>
<span id="el_view_patient_services_LOWHIGH">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->LOWHIGH->EditValue ?>"<?php echo $view_patient_services->LOWHIGH->editAttributes() ?>>
</span>
<?php echo $view_patient_services->LOWHIGH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Branch->Visible) { // Branch ?>
	<div id="r_Branch" class="form-group row">
		<label id="elh_view_patient_services_Branch" for="x_Branch" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Branch->caption() ?><?php echo ($view_patient_services->Branch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Branch->cellAttributes() ?>>
<span id="el_view_patient_services_Branch">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Branch->EditValue ?>"<?php echo $view_patient_services->Branch->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Branch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Dispatch->Visible) { // Dispatch ?>
	<div id="r_Dispatch" class="form-group row">
		<label id="elh_view_patient_services_Dispatch" for="x_Dispatch" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Dispatch->caption() ?><?php echo ($view_patient_services->Dispatch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Dispatch->cellAttributes() ?>>
<span id="el_view_patient_services_Dispatch">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Dispatch->EditValue ?>"<?php echo $view_patient_services->Dispatch->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Dispatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Pic1->Visible) { // Pic1 ?>
	<div id="r_Pic1" class="form-group row">
		<label id="elh_view_patient_services_Pic1" for="x_Pic1" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Pic1->caption() ?><?php echo ($view_patient_services->Pic1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Pic1->cellAttributes() ?>>
<span id="el_view_patient_services_Pic1">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic1->EditValue ?>"<?php echo $view_patient_services->Pic1->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Pic1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Pic2->Visible) { // Pic2 ?>
	<div id="r_Pic2" class="form-group row">
		<label id="elh_view_patient_services_Pic2" for="x_Pic2" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Pic2->caption() ?><?php echo ($view_patient_services->Pic2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Pic2->cellAttributes() ?>>
<span id="el_view_patient_services_Pic2">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic2->EditValue ?>"<?php echo $view_patient_services->Pic2->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Pic2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->GraphPath->Visible) { // GraphPath ?>
	<div id="r_GraphPath" class="form-group row">
		<label id="elh_view_patient_services_GraphPath" for="x_GraphPath" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->GraphPath->caption() ?><?php echo ($view_patient_services->GraphPath->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->GraphPath->cellAttributes() ?>>
<span id="el_view_patient_services_GraphPath">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->GraphPath->EditValue ?>"<?php echo $view_patient_services->GraphPath->editAttributes() ?>>
</span>
<?php echo $view_patient_services->GraphPath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->MachineCD->Visible) { // MachineCD ?>
	<div id="r_MachineCD" class="form-group row">
		<label id="elh_view_patient_services_MachineCD" for="x_MachineCD" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->MachineCD->caption() ?><?php echo ($view_patient_services->MachineCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->MachineCD->cellAttributes() ?>>
<span id="el_view_patient_services_MachineCD">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->MachineCD->EditValue ?>"<?php echo $view_patient_services->MachineCD->editAttributes() ?>>
</span>
<?php echo $view_patient_services->MachineCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->TestCancel->Visible) { // TestCancel ?>
	<div id="r_TestCancel" class="form-group row">
		<label id="elh_view_patient_services_TestCancel" for="x_TestCancel" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->TestCancel->caption() ?><?php echo ($view_patient_services->TestCancel->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->TestCancel->cellAttributes() ?>>
<span id="el_view_patient_services_TestCancel">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestCancel->EditValue ?>"<?php echo $view_patient_services->TestCancel->editAttributes() ?>>
</span>
<?php echo $view_patient_services->TestCancel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->OutSource->Visible) { // OutSource ?>
	<div id="r_OutSource" class="form-group row">
		<label id="elh_view_patient_services_OutSource" for="x_OutSource" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->OutSource->caption() ?><?php echo ($view_patient_services->OutSource->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->OutSource->cellAttributes() ?>>
<span id="el_view_patient_services_OutSource">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->OutSource->EditValue ?>"<?php echo $view_patient_services->OutSource->editAttributes() ?>>
</span>
<?php echo $view_patient_services->OutSource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Printed->Visible) { // Printed ?>
	<div id="r_Printed" class="form-group row">
		<label id="elh_view_patient_services_Printed" for="x_Printed" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Printed->caption() ?><?php echo ($view_patient_services->Printed->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Printed->cellAttributes() ?>>
<span id="el_view_patient_services_Printed">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Printed->EditValue ?>"<?php echo $view_patient_services->Printed->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Printed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->PrintBy->Visible) { // PrintBy ?>
	<div id="r_PrintBy" class="form-group row">
		<label id="elh_view_patient_services_PrintBy" for="x_PrintBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->PrintBy->caption() ?><?php echo ($view_patient_services->PrintBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->PrintBy->cellAttributes() ?>>
<span id="el_view_patient_services_PrintBy">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintBy->EditValue ?>"<?php echo $view_patient_services->PrintBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services->PrintBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->PrintDate->Visible) { // PrintDate ?>
	<div id="r_PrintDate" class="form-group row">
		<label id="elh_view_patient_services_PrintDate" for="x_PrintDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->PrintDate->caption() ?><?php echo ($view_patient_services->PrintDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->PrintDate->cellAttributes() ?>>
<span id="el_view_patient_services_PrintDate">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintDate->EditValue ?>"<?php echo $view_patient_services->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services->PrintDate->ReadOnly && !$view_patient_services->PrintDate->Disabled && !isset($view_patient_services->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesedit", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services->PrintDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->BillingDate->Visible) { // BillingDate ?>
	<div id="r_BillingDate" class="form-group row">
		<label id="elh_view_patient_services_BillingDate" for="x_BillingDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->BillingDate->caption() ?><?php echo ($view_patient_services->BillingDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->BillingDate->cellAttributes() ?>>
<span id="el_view_patient_services_BillingDate">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x_BillingDate" id="x_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillingDate->EditValue ?>"<?php echo $view_patient_services->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services->BillingDate->ReadOnly && !$view_patient_services->BillingDate->Disabled && !isset($view_patient_services->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesedit", "x_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services->BillingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->BilledBy->Visible) { // BilledBy ?>
	<div id="r_BilledBy" class="form-group row">
		<label id="elh_view_patient_services_BilledBy" for="x_BilledBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->BilledBy->caption() ?><?php echo ($view_patient_services->BilledBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->BilledBy->cellAttributes() ?>>
<span id="el_view_patient_services_BilledBy">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x_BilledBy" id="x_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BilledBy->EditValue ?>"<?php echo $view_patient_services->BilledBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services->BilledBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Resulted->Visible) { // Resulted ?>
	<div id="r_Resulted" class="form-group row">
		<label id="elh_view_patient_services_Resulted" for="x_Resulted" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Resulted->caption() ?><?php echo ($view_patient_services->Resulted->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Resulted->cellAttributes() ?>>
<span id="el_view_patient_services_Resulted">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x_Resulted" id="x_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Resulted->EditValue ?>"<?php echo $view_patient_services->Resulted->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Resulted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label id="elh_view_patient_services_ResultDate" for="x_ResultDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->ResultDate->caption() ?><?php echo ($view_patient_services->ResultDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->ResultDate->cellAttributes() ?>>
<span id="el_view_patient_services_ResultDate">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultDate->EditValue ?>"<?php echo $view_patient_services->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services->ResultDate->ReadOnly && !$view_patient_services->ResultDate->Disabled && !isset($view_patient_services->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesedit", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services->ResultDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->ResultedBy->Visible) { // ResultedBy ?>
	<div id="r_ResultedBy" class="form-group row">
		<label id="elh_view_patient_services_ResultedBy" for="x_ResultedBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->ResultedBy->caption() ?><?php echo ($view_patient_services->ResultedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->ResultedBy->cellAttributes() ?>>
<span id="el_view_patient_services_ResultedBy">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultedBy->EditValue ?>"<?php echo $view_patient_services->ResultedBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services->ResultedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->SampleDate->Visible) { // SampleDate ?>
	<div id="r_SampleDate" class="form-group row">
		<label id="elh_view_patient_services_SampleDate" for="x_SampleDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->SampleDate->caption() ?><?php echo ($view_patient_services->SampleDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->SampleDate->cellAttributes() ?>>
<span id="el_view_patient_services_SampleDate">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleDate->EditValue ?>"<?php echo $view_patient_services->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services->SampleDate->ReadOnly && !$view_patient_services->SampleDate->Disabled && !isset($view_patient_services->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesedit", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services->SampleDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->SampleUser->Visible) { // SampleUser ?>
	<div id="r_SampleUser" class="form-group row">
		<label id="elh_view_patient_services_SampleUser" for="x_SampleUser" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->SampleUser->caption() ?><?php echo ($view_patient_services->SampleUser->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->SampleUser->cellAttributes() ?>>
<span id="el_view_patient_services_SampleUser">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleUser->EditValue ?>"<?php echo $view_patient_services->SampleUser->editAttributes() ?>>
</span>
<?php echo $view_patient_services->SampleUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Sampled->Visible) { // Sampled ?>
	<div id="r_Sampled" class="form-group row">
		<label id="elh_view_patient_services_Sampled" for="x_Sampled" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Sampled->caption() ?><?php echo ($view_patient_services->Sampled->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Sampled->cellAttributes() ?>>
<span id="el_view_patient_services_Sampled">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x_Sampled" id="x_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sampled->EditValue ?>"<?php echo $view_patient_services->Sampled->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Sampled->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
	<div id="r_ReceivedDate" class="form-group row">
		<label id="elh_view_patient_services_ReceivedDate" for="x_ReceivedDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->ReceivedDate->caption() ?><?php echo ($view_patient_services->ReceivedDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->ReceivedDate->cellAttributes() ?>>
<span id="el_view_patient_services_ReceivedDate">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedDate->EditValue ?>"<?php echo $view_patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services->ReceivedDate->ReadOnly && !$view_patient_services->ReceivedDate->Disabled && !isset($view_patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesedit", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services->ReceivedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
	<div id="r_ReceivedUser" class="form-group row">
		<label id="elh_view_patient_services_ReceivedUser" for="x_ReceivedUser" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->ReceivedUser->caption() ?><?php echo ($view_patient_services->ReceivedUser->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->ReceivedUser->cellAttributes() ?>>
<span id="el_view_patient_services_ReceivedUser">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedUser->EditValue ?>"<?php echo $view_patient_services->ReceivedUser->editAttributes() ?>>
</span>
<?php echo $view_patient_services->ReceivedUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Recevied->Visible) { // Recevied ?>
	<div id="r_Recevied" class="form-group row">
		<label id="elh_view_patient_services_Recevied" for="x_Recevied" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Recevied->caption() ?><?php echo ($view_patient_services->Recevied->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Recevied->cellAttributes() ?>>
<span id="el_view_patient_services_Recevied">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x_Recevied" id="x_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Recevied->EditValue ?>"<?php echo $view_patient_services->Recevied->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Recevied->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<div id="r_DeptRecvDate" class="form-group row">
		<label id="elh_view_patient_services_DeptRecvDate" for="x_DeptRecvDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DeptRecvDate->caption() ?><?php echo ($view_patient_services->DeptRecvDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DeptRecvDate->cellAttributes() ?>>
<span id="el_view_patient_services_DeptRecvDate">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services->DeptRecvDate->ReadOnly && !$view_patient_services->DeptRecvDate->Disabled && !isset($view_patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesedit", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services->DeptRecvDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<div id="r_DeptRecvUser" class="form-group row">
		<label id="elh_view_patient_services_DeptRecvUser" for="x_DeptRecvUser" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DeptRecvUser->caption() ?><?php echo ($view_patient_services->DeptRecvUser->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DeptRecvUser->cellAttributes() ?>>
<span id="el_view_patient_services_DeptRecvUser">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services->DeptRecvUser->editAttributes() ?>>
</span>
<?php echo $view_patient_services->DeptRecvUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->DeptRecived->Visible) { // DeptRecived ?>
	<div id="r_DeptRecived" class="form-group row">
		<label id="elh_view_patient_services_DeptRecived" for="x_DeptRecived" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->DeptRecived->caption() ?><?php echo ($view_patient_services->DeptRecived->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->DeptRecived->cellAttributes() ?>>
<span id="el_view_patient_services_DeptRecived">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x_DeptRecived" id="x_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecived->EditValue ?>"<?php echo $view_patient_services->DeptRecived->editAttributes() ?>>
</span>
<?php echo $view_patient_services->DeptRecived->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->SAuthDate->Visible) { // SAuthDate ?>
	<div id="r_SAuthDate" class="form-group row">
		<label id="elh_view_patient_services_SAuthDate" for="x_SAuthDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->SAuthDate->caption() ?><?php echo ($view_patient_services->SAuthDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->SAuthDate->cellAttributes() ?>>
<span id="el_view_patient_services_SAuthDate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthDate->EditValue ?>"<?php echo $view_patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->SAuthDate->ReadOnly && !$view_patient_services->SAuthDate->Disabled && !isset($view_patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesedit", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services->SAuthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->SAuthBy->Visible) { // SAuthBy ?>
	<div id="r_SAuthBy" class="form-group row">
		<label id="elh_view_patient_services_SAuthBy" for="x_SAuthBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->SAuthBy->caption() ?><?php echo ($view_patient_services->SAuthBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->SAuthBy->cellAttributes() ?>>
<span id="el_view_patient_services_SAuthBy">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthBy->EditValue ?>"<?php echo $view_patient_services->SAuthBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services->SAuthBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
	<div id="r_SAuthendicate" class="form-group row">
		<label id="elh_view_patient_services_SAuthendicate" for="x_SAuthendicate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->SAuthendicate->caption() ?><?php echo ($view_patient_services->SAuthendicate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->SAuthendicate->cellAttributes() ?>>
<span id="el_view_patient_services_SAuthendicate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x_SAuthendicate" id="x_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthendicate->EditValue ?>"<?php echo $view_patient_services->SAuthendicate->editAttributes() ?>>
</span>
<?php echo $view_patient_services->SAuthendicate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->AuthDate->Visible) { // AuthDate ?>
	<div id="r_AuthDate" class="form-group row">
		<label id="elh_view_patient_services_AuthDate" for="x_AuthDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->AuthDate->caption() ?><?php echo ($view_patient_services->AuthDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->AuthDate->cellAttributes() ?>>
<span id="el_view_patient_services_AuthDate">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthDate->EditValue ?>"<?php echo $view_patient_services->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->AuthDate->ReadOnly && !$view_patient_services->AuthDate->Disabled && !isset($view_patient_services->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesedit", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services->AuthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->AuthBy->Visible) { // AuthBy ?>
	<div id="r_AuthBy" class="form-group row">
		<label id="elh_view_patient_services_AuthBy" for="x_AuthBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->AuthBy->caption() ?><?php echo ($view_patient_services->AuthBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->AuthBy->cellAttributes() ?>>
<span id="el_view_patient_services_AuthBy">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthBy->EditValue ?>"<?php echo $view_patient_services->AuthBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services->AuthBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Authencate->Visible) { // Authencate ?>
	<div id="r_Authencate" class="form-group row">
		<label id="elh_view_patient_services_Authencate" for="x_Authencate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Authencate->caption() ?><?php echo ($view_patient_services->Authencate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Authencate->cellAttributes() ?>>
<span id="el_view_patient_services_Authencate">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x_Authencate" id="x_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Authencate->EditValue ?>"<?php echo $view_patient_services->Authencate->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Authencate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label id="elh_view_patient_services_EditDate" for="x_EditDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->EditDate->caption() ?><?php echo ($view_patient_services->EditDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->EditDate->cellAttributes() ?>>
<span id="el_view_patient_services_EditDate">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditDate->EditValue ?>"<?php echo $view_patient_services->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services->EditDate->ReadOnly && !$view_patient_services->EditDate->Disabled && !isset($view_patient_services->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesedit", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services->EditDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->EditBy->Visible) { // EditBy ?>
	<div id="r_EditBy" class="form-group row">
		<label id="elh_view_patient_services_EditBy" for="x_EditBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->EditBy->caption() ?><?php echo ($view_patient_services->EditBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->EditBy->cellAttributes() ?>>
<span id="el_view_patient_services_EditBy">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x_EditBy" id="x_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditBy->EditValue ?>"<?php echo $view_patient_services->EditBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services->EditBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Editted->Visible) { // Editted ?>
	<div id="r_Editted" class="form-group row">
		<label id="elh_view_patient_services_Editted" for="x_Editted" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Editted->caption() ?><?php echo ($view_patient_services->Editted->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Editted->cellAttributes() ?>>
<span id="el_view_patient_services_Editted">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x_Editted" id="x_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Editted->EditValue ?>"<?php echo $view_patient_services->Editted->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Editted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_view_patient_services_PatID" for="x_PatID" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->PatID->caption() ?><?php echo ($view_patient_services->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->PatID->cellAttributes() ?>>
<span id="el_view_patient_services_PatID">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatID->EditValue ?>"<?php echo $view_patient_services->PatID->editAttributes() ?>>
</span>
<?php echo $view_patient_services->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_view_patient_services_PatientId" for="x_PatientId" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->PatientId->caption() ?><?php echo ($view_patient_services->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->PatientId->cellAttributes() ?>>
<span id="el_view_patient_services_PatientId">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatientId->EditValue ?>"<?php echo $view_patient_services->PatientId->editAttributes() ?>>
</span>
<?php echo $view_patient_services->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_view_patient_services_Mobile" for="x_Mobile" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Mobile->caption() ?><?php echo ($view_patient_services->Mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Mobile->cellAttributes() ?>>
<span id="el_view_patient_services_Mobile">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Mobile->EditValue ?>"<?php echo $view_patient_services->Mobile->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_view_patient_services_CId" for="x_CId" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->CId->caption() ?><?php echo ($view_patient_services->CId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->CId->cellAttributes() ?>>
<span id="el_view_patient_services_CId">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CId->EditValue ?>"<?php echo $view_patient_services->CId->editAttributes() ?>>
</span>
<?php echo $view_patient_services->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_view_patient_services_Order" for="x_Order" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Order->caption() ?><?php echo ($view_patient_services->Order->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Order->cellAttributes() ?>>
<span id="el_view_patient_services_Order">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Order->EditValue ?>"<?php echo $view_patient_services->Order->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_view_patient_services_Form" for="x_Form" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Form->caption() ?><?php echo ($view_patient_services->Form->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Form->cellAttributes() ?>>
<span id="el_view_patient_services_Form">
<textarea data-table="view_patient_services" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->Form->getPlaceHolder()) ?>"<?php echo $view_patient_services->Form->editAttributes() ?>><?php echo $view_patient_services->Form->EditValue ?></textarea>
</span>
<?php echo $view_patient_services->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_view_patient_services_ResType" for="x_ResType" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->ResType->caption() ?><?php echo ($view_patient_services->ResType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->ResType->cellAttributes() ?>>
<span id="el_view_patient_services_ResType">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResType->EditValue ?>"<?php echo $view_patient_services->ResType->editAttributes() ?>>
</span>
<?php echo $view_patient_services->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_view_patient_services_Sample" for="x_Sample" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Sample->caption() ?><?php echo ($view_patient_services->Sample->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Sample->cellAttributes() ?>>
<span id="el_view_patient_services_Sample">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sample->EditValue ?>"<?php echo $view_patient_services->Sample->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_view_patient_services_NoD" for="x_NoD" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->NoD->caption() ?><?php echo ($view_patient_services->NoD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->NoD->cellAttributes() ?>>
<span id="el_view_patient_services_NoD">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->NoD->EditValue ?>"<?php echo $view_patient_services->NoD->editAttributes() ?>>
</span>
<?php echo $view_patient_services->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_view_patient_services_BillOrder" for="x_BillOrder" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->BillOrder->caption() ?><?php echo ($view_patient_services->BillOrder->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->BillOrder->cellAttributes() ?>>
<span id="el_view_patient_services_BillOrder">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillOrder->EditValue ?>"<?php echo $view_patient_services->BillOrder->editAttributes() ?>>
</span>
<?php echo $view_patient_services->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_view_patient_services_Formula" for="x_Formula" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Formula->caption() ?><?php echo ($view_patient_services->Formula->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Formula->cellAttributes() ?>>
<span id="el_view_patient_services_Formula">
<textarea data-table="view_patient_services" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->Formula->getPlaceHolder()) ?>"<?php echo $view_patient_services->Formula->editAttributes() ?>><?php echo $view_patient_services->Formula->EditValue ?></textarea>
</span>
<?php echo $view_patient_services->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_view_patient_services_Inactive" for="x_Inactive" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Inactive->caption() ?><?php echo ($view_patient_services->Inactive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Inactive->cellAttributes() ?>>
<span id="el_view_patient_services_Inactive">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Inactive->EditValue ?>"<?php echo $view_patient_services->Inactive->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_view_patient_services_CollSample" for="x_CollSample" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->CollSample->caption() ?><?php echo ($view_patient_services->CollSample->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->CollSample->cellAttributes() ?>>
<span id="el_view_patient_services_CollSample">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CollSample->EditValue ?>"<?php echo $view_patient_services->CollSample->editAttributes() ?>>
</span>
<?php echo $view_patient_services->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_view_patient_services_TestType" for="x_TestType" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->TestType->caption() ?><?php echo ($view_patient_services->TestType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->TestType->cellAttributes() ?>>
<span id="el_view_patient_services_TestType">
<span<?php echo $view_patient_services->TestType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->TestType->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="x_TestType" id="x_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->CurrentValue) ?>">
<?php echo $view_patient_services->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Repeated->Visible) { // Repeated ?>
	<div id="r_Repeated" class="form-group row">
		<label id="elh_view_patient_services_Repeated" for="x_Repeated" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Repeated->caption() ?><?php echo ($view_patient_services->Repeated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Repeated->cellAttributes() ?>>
<span id="el_view_patient_services_Repeated">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x_Repeated" id="x_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Repeated->EditValue ?>"<?php echo $view_patient_services->Repeated->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Repeated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
	<div id="r_RepeatedBy" class="form-group row">
		<label id="elh_view_patient_services_RepeatedBy" for="x_RepeatedBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->RepeatedBy->caption() ?><?php echo ($view_patient_services->RepeatedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->RepeatedBy->cellAttributes() ?>>
<span id="el_view_patient_services_RepeatedBy">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x_RepeatedBy" id="x_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedBy->EditValue ?>"<?php echo $view_patient_services->RepeatedBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services->RepeatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
	<div id="r_RepeatedDate" class="form-group row">
		<label id="elh_view_patient_services_RepeatedDate" for="x_RepeatedDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->RepeatedDate->caption() ?><?php echo ($view_patient_services->RepeatedDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->RepeatedDate->cellAttributes() ?>>
<span id="el_view_patient_services_RepeatedDate">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x_RepeatedDate" id="x_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedDate->EditValue ?>"<?php echo $view_patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services->RepeatedDate->ReadOnly && !$view_patient_services->RepeatedDate->Disabled && !isset($view_patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesedit", "x_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services->RepeatedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->serviceID->Visible) { // serviceID ?>
	<div id="r_serviceID" class="form-group row">
		<label id="elh_view_patient_services_serviceID" for="x_serviceID" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->serviceID->caption() ?><?php echo ($view_patient_services->serviceID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->serviceID->cellAttributes() ?>>
<span id="el_view_patient_services_serviceID">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x_serviceID" id="x_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->serviceID->EditValue ?>"<?php echo $view_patient_services->serviceID->editAttributes() ?>>
</span>
<?php echo $view_patient_services->serviceID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Service_Type->Visible) { // Service_Type ?>
	<div id="r_Service_Type" class="form-group row">
		<label id="elh_view_patient_services_Service_Type" for="x_Service_Type" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Service_Type->caption() ?><?php echo ($view_patient_services->Service_Type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Service_Type->cellAttributes() ?>>
<span id="el_view_patient_services_Service_Type">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x_Service_Type" id="x_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Type->EditValue ?>"<?php echo $view_patient_services->Service_Type->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Service_Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->Service_Department->Visible) { // Service_Department ?>
	<div id="r_Service_Department" class="form-group row">
		<label id="elh_view_patient_services_Service_Department" for="x_Service_Department" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->Service_Department->caption() ?><?php echo ($view_patient_services->Service_Department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->Service_Department->cellAttributes() ?>>
<span id="el_view_patient_services_Service_Department">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x_Service_Department" id="x_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Department->EditValue ?>"<?php echo $view_patient_services->Service_Department->editAttributes() ?>>
</span>
<?php echo $view_patient_services->Service_Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services->RequestNo->Visible) { // RequestNo ?>
	<div id="r_RequestNo" class="form-group row">
		<label id="elh_view_patient_services_RequestNo" for="x_RequestNo" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services->RequestNo->caption() ?><?php echo ($view_patient_services->RequestNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div<?php echo $view_patient_services->RequestNo->cellAttributes() ?>>
<span id="el_view_patient_services_RequestNo">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x_RequestNo" id="x_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RequestNo->EditValue ?>"<?php echo $view_patient_services->RequestNo->editAttributes() ?>>
</span>
<?php echo $view_patient_services->RequestNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_patient_services_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_patient_services_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_patient_services_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_patient_services_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_patient_services_edit->terminate();
?>