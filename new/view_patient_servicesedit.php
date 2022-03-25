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
<?php include_once "header.php"; ?>
<script>
var fview_patient_servicesedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_patient_servicesedit = currentForm = new ew.Form("fview_patient_servicesedit", "edit");

	// Validate form
	fview_patient_servicesedit.validate = function() {
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
			<?php if ($view_patient_services_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->id->caption(), $view_patient_services_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Reception->caption(), $view_patient_services_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->mrnno->caption(), $view_patient_services_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->PatientName->caption(), $view_patient_services_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Age->caption(), $view_patient_services_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Gender->caption(), $view_patient_services_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->profilePic->caption(), $view_patient_services_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Services->Required) { ?>
				elm = this.getElements("x" + infix + "_Services");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Services->caption(), $view_patient_services_edit->Services->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Unit->caption(), $view_patient_services_edit->Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->Unit->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->amount->caption(), $view_patient_services_edit->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->amount->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Quantity->caption(), $view_patient_services_edit->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->Quantity->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->DiscountCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DiscountCategory->caption(), $view_patient_services_edit->DiscountCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Discount->caption(), $view_patient_services_edit->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->Discount->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->SubTotal->Required) { ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->SubTotal->caption(), $view_patient_services_edit->SubTotal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->SubTotal->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->description->caption(), $view_patient_services_edit->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->patient_type->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->patient_type->caption(), $view_patient_services_edit->patient_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->charged_date->caption(), $view_patient_services_edit->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->status->caption(), $view_patient_services_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->modifiedby->caption(), $view_patient_services_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->modifieddatetime->caption(), $view_patient_services_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Aid->Required) { ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Aid->caption(), $view_patient_services_edit->Aid->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Vid->Required) { ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Vid->caption(), $view_patient_services_edit->Vid->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DrID->caption(), $view_patient_services_edit->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->DrCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_DrCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DrCODE->caption(), $view_patient_services_edit->DrCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->DrName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DrName->caption(), $view_patient_services_edit->DrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Department->caption(), $view_patient_services_edit->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->DrSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DrSharePres->caption(), $view_patient_services_edit->DrSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->DrSharePres->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->HospSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->HospSharePres->caption(), $view_patient_services_edit->HospSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->HospSharePres->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DrShareAmount->caption(), $view_patient_services_edit->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->DrShareAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->HospShareAmount->caption(), $view_patient_services_edit->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->HospShareAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->DrShareSettiledAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DrShareSettiledAmount->caption(), $view_patient_services_edit->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->DrShareSettiledAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->DrShareSettledId->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DrShareSettledId->caption(), $view_patient_services_edit->DrShareSettledId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->DrShareSettledId->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->DrShareSettiledStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DrShareSettiledStatus->caption(), $view_patient_services_edit->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->DrShareSettiledStatus->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->invoiceId->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->invoiceId->caption(), $view_patient_services_edit->invoiceId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->invoiceId->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->invoiceAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->invoiceAmount->caption(), $view_patient_services_edit->invoiceAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->invoiceAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->invoiceStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->invoiceStatus->caption(), $view_patient_services_edit->invoiceStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->modeOfPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_modeOfPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->modeOfPayment->caption(), $view_patient_services_edit->modeOfPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->HospID->caption(), $view_patient_services_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->RIDNO->caption(), $view_patient_services_edit->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->RIDNO->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->ItemCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->ItemCode->caption(), $view_patient_services_edit->ItemCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->TidNo->caption(), $view_patient_services_edit->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->TidNo->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->sid->Required) { ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->sid->caption(), $view_patient_services_edit->sid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->sid->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->TestSubCd->caption(), $view_patient_services_edit->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->DEptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DEptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DEptCd->caption(), $view_patient_services_edit->DEptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->ProfCd->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->ProfCd->caption(), $view_patient_services_edit->ProfCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->LabReport->Required) { ?>
				elm = this.getElements("x" + infix + "_LabReport");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->LabReport->caption(), $view_patient_services_edit->LabReport->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Comments->Required) { ?>
				elm = this.getElements("x" + infix + "_Comments");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Comments->caption(), $view_patient_services_edit->Comments->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Method->caption(), $view_patient_services_edit->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Specimen->Required) { ?>
				elm = this.getElements("x" + infix + "_Specimen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Specimen->caption(), $view_patient_services_edit->Specimen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Abnormal->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Abnormal->caption(), $view_patient_services_edit->Abnormal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->RefValue->Required) { ?>
				elm = this.getElements("x" + infix + "_RefValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->RefValue->caption(), $view_patient_services_edit->RefValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->TestUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_TestUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->TestUnit->caption(), $view_patient_services_edit->TestUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->LOWHIGH->Required) { ?>
				elm = this.getElements("x" + infix + "_LOWHIGH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->LOWHIGH->caption(), $view_patient_services_edit->LOWHIGH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Branch->Required) { ?>
				elm = this.getElements("x" + infix + "_Branch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Branch->caption(), $view_patient_services_edit->Branch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Dispatch->Required) { ?>
				elm = this.getElements("x" + infix + "_Dispatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Dispatch->caption(), $view_patient_services_edit->Dispatch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Pic1->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Pic1->caption(), $view_patient_services_edit->Pic1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Pic2->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Pic2->caption(), $view_patient_services_edit->Pic2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->GraphPath->Required) { ?>
				elm = this.getElements("x" + infix + "_GraphPath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->GraphPath->caption(), $view_patient_services_edit->GraphPath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->MachineCD->Required) { ?>
				elm = this.getElements("x" + infix + "_MachineCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->MachineCD->caption(), $view_patient_services_edit->MachineCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->TestCancel->Required) { ?>
				elm = this.getElements("x" + infix + "_TestCancel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->TestCancel->caption(), $view_patient_services_edit->TestCancel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->OutSource->Required) { ?>
				elm = this.getElements("x" + infix + "_OutSource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->OutSource->caption(), $view_patient_services_edit->OutSource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Printed->Required) { ?>
				elm = this.getElements("x" + infix + "_Printed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Printed->caption(), $view_patient_services_edit->Printed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->PrintBy->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->PrintBy->caption(), $view_patient_services_edit->PrintBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->PrintDate->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->PrintDate->caption(), $view_patient_services_edit->PrintDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->PrintDate->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->BillingDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->BillingDate->caption(), $view_patient_services_edit->BillingDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->BillingDate->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->BilledBy->Required) { ?>
				elm = this.getElements("x" + infix + "_BilledBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->BilledBy->caption(), $view_patient_services_edit->BilledBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Resulted->Required) { ?>
				elm = this.getElements("x" + infix + "_Resulted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Resulted->caption(), $view_patient_services_edit->Resulted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->ResultDate->caption(), $view_patient_services_edit->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->ResultDate->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->ResultedBy->caption(), $view_patient_services_edit->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->SampleDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->SampleDate->caption(), $view_patient_services_edit->SampleDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->SampleDate->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->SampleUser->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->SampleUser->caption(), $view_patient_services_edit->SampleUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Sampled->Required) { ?>
				elm = this.getElements("x" + infix + "_Sampled");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Sampled->caption(), $view_patient_services_edit->Sampled->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->ReceivedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->ReceivedDate->caption(), $view_patient_services_edit->ReceivedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->ReceivedDate->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->ReceivedUser->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->ReceivedUser->caption(), $view_patient_services_edit->ReceivedUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Recevied->Required) { ?>
				elm = this.getElements("x" + infix + "_Recevied");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Recevied->caption(), $view_patient_services_edit->Recevied->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->DeptRecvDate->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DeptRecvDate->caption(), $view_patient_services_edit->DeptRecvDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->DeptRecvDate->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->DeptRecvUser->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DeptRecvUser->caption(), $view_patient_services_edit->DeptRecvUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->DeptRecived->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecived");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->DeptRecived->caption(), $view_patient_services_edit->DeptRecived->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->SAuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->SAuthDate->caption(), $view_patient_services_edit->SAuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->SAuthDate->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->SAuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->SAuthBy->caption(), $view_patient_services_edit->SAuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->SAuthendicate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthendicate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->SAuthendicate->caption(), $view_patient_services_edit->SAuthendicate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->AuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->AuthDate->caption(), $view_patient_services_edit->AuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->AuthDate->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->AuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->AuthBy->caption(), $view_patient_services_edit->AuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Authencate->Required) { ?>
				elm = this.getElements("x" + infix + "_Authencate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Authencate->caption(), $view_patient_services_edit->Authencate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->EditDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->EditDate->caption(), $view_patient_services_edit->EditDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->EditDate->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->EditBy->Required) { ?>
				elm = this.getElements("x" + infix + "_EditBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->EditBy->caption(), $view_patient_services_edit->EditBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Editted->Required) { ?>
				elm = this.getElements("x" + infix + "_Editted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Editted->caption(), $view_patient_services_edit->Editted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->PatID->caption(), $view_patient_services_edit->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->PatID->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->PatientId->caption(), $view_patient_services_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Mobile->caption(), $view_patient_services_edit->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->CId->caption(), $view_patient_services_edit->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->CId->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Order->caption(), $view_patient_services_edit->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->Order->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Form->caption(), $view_patient_services_edit->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->ResType->caption(), $view_patient_services_edit->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Sample->caption(), $view_patient_services_edit->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->NoD->caption(), $view_patient_services_edit->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->NoD->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->BillOrder->caption(), $view_patient_services_edit->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->BillOrder->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->Formula->Required) { ?>
				elm = this.getElements("x" + infix + "_Formula");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Formula->caption(), $view_patient_services_edit->Formula->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Inactive->caption(), $view_patient_services_edit->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->CollSample->caption(), $view_patient_services_edit->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->TestType->caption(), $view_patient_services_edit->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Repeated->Required) { ?>
				elm = this.getElements("x" + infix + "_Repeated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Repeated->caption(), $view_patient_services_edit->Repeated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->RepeatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->RepeatedBy->caption(), $view_patient_services_edit->RepeatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->RepeatedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->RepeatedDate->caption(), $view_patient_services_edit->RepeatedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->RepeatedDate->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->serviceID->Required) { ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->serviceID->caption(), $view_patient_services_edit->serviceID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->serviceID->errorMessage()) ?>");
			<?php if ($view_patient_services_edit->Service_Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Service_Type->caption(), $view_patient_services_edit->Service_Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->Service_Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->Service_Department->caption(), $view_patient_services_edit->Service_Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_edit->RequestNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_edit->RequestNo->caption(), $view_patient_services_edit->RequestNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_edit->RequestNo->errorMessage()) ?>");

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
	fview_patient_servicesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_patient_servicesedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_patient_servicesedit.lists["x_Services"] = <?php echo $view_patient_services_edit->Services->Lookup->toClientList($view_patient_services_edit) ?>;
	fview_patient_servicesedit.lists["x_Services"].options = <?php echo JsonEncode($view_patient_services_edit->Services->lookupOptions()) ?>;
	fview_patient_servicesedit.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_patient_servicesedit.lists["x_DiscountCategory"] = <?php echo $view_patient_services_edit->DiscountCategory->Lookup->toClientList($view_patient_services_edit) ?>;
	fview_patient_servicesedit.lists["x_DiscountCategory"].options = <?php echo JsonEncode($view_patient_services_edit->DiscountCategory->lookupOptions()) ?>;
	loadjs.done("fview_patient_servicesedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_patient_services_edit->showPageHeader(); ?>
<?php
$view_patient_services_edit->showMessage();
?>
<form name="fview_patient_servicesedit" id="fview_patient_servicesedit" class="<?php echo $view_patient_services_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_services">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_patient_services_edit->IsModal ?>">
<?php if ($view_patient_services->getCurrentMasterTable() == "view_billing_voucher") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_billing_voucher">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_patient_services_edit->Vid->getSessionValue()) ?>">
<?php } ?>
<?php if ($view_patient_services->getCurrentMasterTable() == "view_billing_voucher_print") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_billing_voucher_print">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_patient_services_edit->Vid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_patient_services_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_patient_services_id" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->id->caption() ?><?php echo $view_patient_services_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->id->cellAttributes() ?>>
<span id="el_view_patient_services_id">
<span<?php echo $view_patient_services_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_patient_services_edit->id->CurrentValue) ?>">
<?php echo $view_patient_services_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_patient_services_Reception" for="x_Reception" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Reception->caption() ?><?php echo $view_patient_services_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Reception->cellAttributes() ?>>
<span id="el_view_patient_services_Reception">
<span<?php echo $view_patient_services_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($view_patient_services_edit->Reception->CurrentValue) ?>">
<?php echo $view_patient_services_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_patient_services_mrnno" for="x_mrnno" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->mrnno->caption() ?><?php echo $view_patient_services_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->mrnno->cellAttributes() ?>>
<span id="el_view_patient_services_mrnno">
<span<?php echo $view_patient_services_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($view_patient_services_edit->mrnno->CurrentValue) ?>">
<?php echo $view_patient_services_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_patient_services_PatientName" for="x_PatientName" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->PatientName->caption() ?><?php echo $view_patient_services_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->PatientName->cellAttributes() ?>>
<span id="el_view_patient_services_PatientName">
<span<?php echo $view_patient_services_edit->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->PatientName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($view_patient_services_edit->PatientName->CurrentValue) ?>">
<?php echo $view_patient_services_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_view_patient_services_Age" for="x_Age" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Age->caption() ?><?php echo $view_patient_services_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Age->cellAttributes() ?>>
<span id="el_view_patient_services_Age">
<span<?php echo $view_patient_services_edit->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->Age->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="x_Age" id="x_Age" value="<?php echo HtmlEncode($view_patient_services_edit->Age->CurrentValue) ?>">
<?php echo $view_patient_services_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_view_patient_services_Gender" for="x_Gender" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Gender->caption() ?><?php echo $view_patient_services_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Gender->cellAttributes() ?>>
<span id="el_view_patient_services_Gender">
<span<?php echo $view_patient_services_edit->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->Gender->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="x_Gender" id="x_Gender" value="<?php echo HtmlEncode($view_patient_services_edit->Gender->CurrentValue) ?>">
<?php echo $view_patient_services_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_patient_services_profilePic" for="x_profilePic" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->profilePic->caption() ?><?php echo $view_patient_services_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->profilePic->cellAttributes() ?>>
<span id="el_view_patient_services_profilePic">
<span<?php echo $view_patient_services_edit->profilePic->viewAttributes() ?>><?php echo $view_patient_services_edit->profilePic->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" value="<?php echo HtmlEncode($view_patient_services_edit->profilePic->CurrentValue) ?>">
<?php echo $view_patient_services_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Services->Visible) { // Services ?>
	<div id="r_Services" class="form-group row">
		<label id="elh_view_patient_services_Services" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Services->caption() ?><?php echo $view_patient_services_edit->Services->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Services->cellAttributes() ?>>
<span id="el_view_patient_services_Services">
<?php
$onchange = $view_patient_services_edit->Services->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_patient_services_edit->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x_Services">
	<input type="text" class="form-control" name="sv_x_Services" id="sv_x_Services" value="<?php echo RemoveHtml($view_patient_services_edit->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services_edit->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services_edit->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services_edit->Services->displayValueSeparatorAttribute() ?>" name="x_Services" id="x_Services" value="<?php echo HtmlEncode($view_patient_services_edit->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_patient_servicesedit"], function() {
	fview_patient_servicesedit.createAutoSuggest({"id":"x_Services","forceSelect":false});
});
</script>
<?php echo $view_patient_services_edit->Services->Lookup->getParamTag($view_patient_services_edit, "p_x_Services") ?>
</span>
<?php echo $view_patient_services_edit->Services->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Unit->Visible) { // Unit ?>
	<div id="r_Unit" class="form-group row">
		<label id="elh_view_patient_services_Unit" for="x_Unit" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Unit->caption() ?><?php echo $view_patient_services_edit->Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Unit->cellAttributes() ?>>
<span id="el_view_patient_services_Unit">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x_Unit" id="x_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Unit->EditValue ?>"<?php echo $view_patient_services_edit->Unit->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_view_patient_services_amount" for="x_amount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->amount->caption() ?><?php echo $view_patient_services_edit->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->amount->cellAttributes() ?>>
<span id="el_view_patient_services_amount">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x_amount" id="x_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services_edit->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->amount->EditValue ?>"<?php echo $view_patient_services_edit->amount->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_patient_services_Quantity" for="x_Quantity" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Quantity->caption() ?><?php echo $view_patient_services_edit->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Quantity->cellAttributes() ?>>
<span id="el_view_patient_services_Quantity">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Quantity->EditValue ?>"<?php echo $view_patient_services_edit->Quantity->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DiscountCategory->Visible) { // DiscountCategory ?>
	<div id="r_DiscountCategory" class="form-group row">
		<label id="elh_view_patient_services_DiscountCategory" for="x_DiscountCategory" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DiscountCategory->caption() ?><?php echo $view_patient_services_edit->DiscountCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DiscountCategory->cellAttributes() ?>>
<span id="el_view_patient_services_DiscountCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services_edit->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x_DiscountCategory" name="x_DiscountCategory"<?php echo $view_patient_services_edit->DiscountCategory->editAttributes() ?>>
			<?php echo $view_patient_services_edit->DiscountCategory->selectOptionListHtml("x_DiscountCategory") ?>
		</select>
</div>
<?php echo $view_patient_services_edit->DiscountCategory->Lookup->getParamTag($view_patient_services_edit, "p_x_DiscountCategory") ?>
</span>
<?php echo $view_patient_services_edit->DiscountCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_view_patient_services_Discount" for="x_Discount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Discount->caption() ?><?php echo $view_patient_services_edit->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Discount->cellAttributes() ?>>
<span id="el_view_patient_services_Discount">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x_Discount" id="x_Discount" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Discount->EditValue ?>"<?php echo $view_patient_services_edit->Discount->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->SubTotal->Visible) { // SubTotal ?>
	<div id="r_SubTotal" class="form-group row">
		<label id="elh_view_patient_services_SubTotal" for="x_SubTotal" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->SubTotal->caption() ?><?php echo $view_patient_services_edit->SubTotal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->SubTotal->cellAttributes() ?>>
<span id="el_view_patient_services_SubTotal">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_edit->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->SubTotal->EditValue ?>"<?php echo $view_patient_services_edit->SubTotal->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->SubTotal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_view_patient_services_description" for="x_description" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->description->caption() ?><?php echo $view_patient_services_edit->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->description->cellAttributes() ?>>
<span id="el_view_patient_services_description">
<span<?php echo $view_patient_services_edit->description->viewAttributes() ?>><?php echo $view_patient_services_edit->description->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="x_description" id="x_description" value="<?php echo HtmlEncode($view_patient_services_edit->description->CurrentValue) ?>">
<?php echo $view_patient_services_edit->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->patient_type->Visible) { // patient_type ?>
	<div id="r_patient_type" class="form-group row">
		<label id="elh_view_patient_services_patient_type" for="x_patient_type" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->patient_type->caption() ?><?php echo $view_patient_services_edit->patient_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->patient_type->cellAttributes() ?>>
<span id="el_view_patient_services_patient_type">
<span<?php echo $view_patient_services_edit->patient_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->patient_type->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="x_patient_type" id="x_patient_type" value="<?php echo HtmlEncode($view_patient_services_edit->patient_type->CurrentValue) ?>">
<?php echo $view_patient_services_edit->patient_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label id="elh_view_patient_services_charged_date" for="x_charged_date" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->charged_date->caption() ?><?php echo $view_patient_services_edit->charged_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->charged_date->cellAttributes() ?>>
<span id="el_view_patient_services_charged_date">
<span<?php echo $view_patient_services_edit->charged_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->charged_date->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" value="<?php echo HtmlEncode($view_patient_services_edit->charged_date->CurrentValue) ?>">
<?php echo $view_patient_services_edit->charged_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_patient_services_status" for="x_status" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->status->caption() ?><?php echo $view_patient_services_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->status->cellAttributes() ?>>
<span id="el_view_patient_services_status">
<span<?php echo $view_patient_services_edit->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->status->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="x_status" id="x_status" value="<?php echo HtmlEncode($view_patient_services_edit->status->CurrentValue) ?>">
<?php echo $view_patient_services_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Aid->Visible) { // Aid ?>
	<div id="r_Aid" class="form-group row">
		<label id="elh_view_patient_services_Aid" for="x_Aid" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Aid->caption() ?><?php echo $view_patient_services_edit->Aid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Aid->cellAttributes() ?>>
<span id="el_view_patient_services_Aid">
<span<?php echo $view_patient_services_edit->Aid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->Aid->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="x_Aid" id="x_Aid" value="<?php echo HtmlEncode($view_patient_services_edit->Aid->CurrentValue) ?>">
<?php echo $view_patient_services_edit->Aid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Vid->Visible) { // Vid ?>
	<div id="r_Vid" class="form-group row">
		<label id="elh_view_patient_services_Vid" for="x_Vid" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Vid->caption() ?><?php echo $view_patient_services_edit->Vid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Vid->cellAttributes() ?>>
<span id="el_view_patient_services_Vid">
<span<?php echo $view_patient_services_edit->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->Vid->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="x_Vid" id="x_Vid" value="<?php echo HtmlEncode($view_patient_services_edit->Vid->CurrentValue) ?>">
<?php echo $view_patient_services_edit->Vid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_view_patient_services_DrID" for="x_DrID" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DrID->caption() ?><?php echo $view_patient_services_edit->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DrID->cellAttributes() ?>>
<span id="el_view_patient_services_DrID">
<span<?php echo $view_patient_services_edit->DrID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->DrID->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="x_DrID" id="x_DrID" value="<?php echo HtmlEncode($view_patient_services_edit->DrID->CurrentValue) ?>">
<?php echo $view_patient_services_edit->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DrCODE->Visible) { // DrCODE ?>
	<div id="r_DrCODE" class="form-group row">
		<label id="elh_view_patient_services_DrCODE" for="x_DrCODE" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DrCODE->caption() ?><?php echo $view_patient_services_edit->DrCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DrCODE->cellAttributes() ?>>
<span id="el_view_patient_services_DrCODE">
<span<?php echo $view_patient_services_edit->DrCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->DrCODE->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="x_DrCODE" id="x_DrCODE" value="<?php echo HtmlEncode($view_patient_services_edit->DrCODE->CurrentValue) ?>">
<?php echo $view_patient_services_edit->DrCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label id="elh_view_patient_services_DrName" for="x_DrName" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DrName->caption() ?><?php echo $view_patient_services_edit->DrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DrName->cellAttributes() ?>>
<span id="el_view_patient_services_DrName">
<span<?php echo $view_patient_services_edit->DrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->DrName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="x_DrName" id="x_DrName" value="<?php echo HtmlEncode($view_patient_services_edit->DrName->CurrentValue) ?>">
<?php echo $view_patient_services_edit->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh_view_patient_services_Department" for="x_Department" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Department->caption() ?><?php echo $view_patient_services_edit->Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Department->cellAttributes() ?>>
<span id="el_view_patient_services_Department">
<span<?php echo $view_patient_services_edit->Department->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->Department->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="x_Department" id="x_Department" value="<?php echo HtmlEncode($view_patient_services_edit->Department->CurrentValue) ?>">
<?php echo $view_patient_services_edit->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DrSharePres->Visible) { // DrSharePres ?>
	<div id="r_DrSharePres" class="form-group row">
		<label id="elh_view_patient_services_DrSharePres" for="x_DrSharePres" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DrSharePres->caption() ?><?php echo $view_patient_services_edit->DrSharePres->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DrSharePres->cellAttributes() ?>>
<span id="el_view_patient_services_DrSharePres">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x_DrSharePres" id="x_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->DrSharePres->EditValue ?>"<?php echo $view_patient_services_edit->DrSharePres->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->DrSharePres->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->HospSharePres->Visible) { // HospSharePres ?>
	<div id="r_HospSharePres" class="form-group row">
		<label id="elh_view_patient_services_HospSharePres" for="x_HospSharePres" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->HospSharePres->caption() ?><?php echo $view_patient_services_edit->HospSharePres->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->HospSharePres->cellAttributes() ?>>
<span id="el_view_patient_services_HospSharePres">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x_HospSharePres" id="x_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->HospSharePres->EditValue ?>"<?php echo $view_patient_services_edit->HospSharePres->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->HospSharePres->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label id="elh_view_patient_services_DrShareAmount" for="x_DrShareAmount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DrShareAmount->caption() ?><?php echo $view_patient_services_edit->DrShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DrShareAmount->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->DrShareAmount->EditValue ?>"<?php echo $view_patient_services_edit->DrShareAmount->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label id="elh_view_patient_services_HospShareAmount" for="x_HospShareAmount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->HospShareAmount->caption() ?><?php echo $view_patient_services_edit->HospShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->HospShareAmount->cellAttributes() ?>>
<span id="el_view_patient_services_HospShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->HospShareAmount->EditValue ?>"<?php echo $view_patient_services_edit->HospShareAmount->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<div id="r_DrShareSettiledAmount" class="form-group row">
		<label id="elh_view_patient_services_DrShareSettiledAmount" for="x_DrShareSettiledAmount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DrShareSettiledAmount->caption() ?><?php echo $view_patient_services_edit->DrShareSettiledAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareSettiledAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x_DrShareSettiledAmount" id="x_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services_edit->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->DrShareSettiledAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<div id="r_DrShareSettledId" class="form-group row">
		<label id="elh_view_patient_services_DrShareSettledId" for="x_DrShareSettledId" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DrShareSettledId->caption() ?><?php echo $view_patient_services_edit->DrShareSettledId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DrShareSettledId->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareSettledId">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x_DrShareSettledId" id="x_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services_edit->DrShareSettledId->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->DrShareSettledId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<div id="r_DrShareSettiledStatus" class="form-group row">
		<label id="elh_view_patient_services_DrShareSettiledStatus" for="x_DrShareSettiledStatus" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DrShareSettiledStatus->caption() ?><?php echo $view_patient_services_edit->DrShareSettiledStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareSettiledStatus">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x_DrShareSettiledStatus" id="x_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services_edit->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->DrShareSettiledStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->invoiceId->Visible) { // invoiceId ?>
	<div id="r_invoiceId" class="form-group row">
		<label id="elh_view_patient_services_invoiceId" for="x_invoiceId" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->invoiceId->caption() ?><?php echo $view_patient_services_edit->invoiceId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->invoiceId->cellAttributes() ?>>
<span id="el_view_patient_services_invoiceId">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->invoiceId->EditValue ?>"<?php echo $view_patient_services_edit->invoiceId->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->invoiceId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->invoiceAmount->Visible) { // invoiceAmount ?>
	<div id="r_invoiceAmount" class="form-group row">
		<label id="elh_view_patient_services_invoiceAmount" for="x_invoiceAmount" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->invoiceAmount->caption() ?><?php echo $view_patient_services_edit->invoiceAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->invoiceAmount->cellAttributes() ?>>
<span id="el_view_patient_services_invoiceAmount">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->invoiceAmount->EditValue ?>"<?php echo $view_patient_services_edit->invoiceAmount->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->invoiceAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->invoiceStatus->Visible) { // invoiceStatus ?>
	<div id="r_invoiceStatus" class="form-group row">
		<label id="elh_view_patient_services_invoiceStatus" for="x_invoiceStatus" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->invoiceStatus->caption() ?><?php echo $view_patient_services_edit->invoiceStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->invoiceStatus->cellAttributes() ?>>
<span id="el_view_patient_services_invoiceStatus">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->invoiceStatus->EditValue ?>"<?php echo $view_patient_services_edit->invoiceStatus->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->invoiceStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->modeOfPayment->Visible) { // modeOfPayment ?>
	<div id="r_modeOfPayment" class="form-group row">
		<label id="elh_view_patient_services_modeOfPayment" for="x_modeOfPayment" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->modeOfPayment->caption() ?><?php echo $view_patient_services_edit->modeOfPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->modeOfPayment->cellAttributes() ?>>
<span id="el_view_patient_services_modeOfPayment">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->modeOfPayment->EditValue ?>"<?php echo $view_patient_services_edit->modeOfPayment->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->modeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_view_patient_services_RIDNO" for="x_RIDNO" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->RIDNO->caption() ?><?php echo $view_patient_services_edit->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->RIDNO->cellAttributes() ?>>
<span id="el_view_patient_services_RIDNO">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->RIDNO->EditValue ?>"<?php echo $view_patient_services_edit->RIDNO->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->ItemCode->Visible) { // ItemCode ?>
	<div id="r_ItemCode" class="form-group row">
		<label id="elh_view_patient_services_ItemCode" for="x_ItemCode" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->ItemCode->caption() ?><?php echo $view_patient_services_edit->ItemCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->ItemCode->cellAttributes() ?>>
<span id="el_view_patient_services_ItemCode">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_edit->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->ItemCode->EditValue ?>"<?php echo $view_patient_services_edit->ItemCode->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->ItemCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_view_patient_services_TidNo" for="x_TidNo" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->TidNo->caption() ?><?php echo $view_patient_services_edit->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->TidNo->cellAttributes() ?>>
<span id="el_view_patient_services_TidNo">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->TidNo->EditValue ?>"<?php echo $view_patient_services_edit->TidNo->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label id="elh_view_patient_services_sid" for="x_sid" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->sid->caption() ?><?php echo $view_patient_services_edit->sid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->sid->cellAttributes() ?>>
<span id="el_view_patient_services_sid">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x_sid" id="x_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services_edit->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->sid->EditValue ?>"<?php echo $view_patient_services_edit->sid->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->sid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_view_patient_services_TestSubCd" for="x_TestSubCd" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->TestSubCd->caption() ?><?php echo $view_patient_services_edit->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->TestSubCd->cellAttributes() ?>>
<span id="el_view_patient_services_TestSubCd">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->TestSubCd->EditValue ?>"<?php echo $view_patient_services_edit->TestSubCd->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label id="elh_view_patient_services_DEptCd" for="x_DEptCd" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DEptCd->caption() ?><?php echo $view_patient_services_edit->DEptCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DEptCd->cellAttributes() ?>>
<span id="el_view_patient_services_DEptCd">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->DEptCd->EditValue ?>"<?php echo $view_patient_services_edit->DEptCd->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->DEptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->ProfCd->Visible) { // ProfCd ?>
	<div id="r_ProfCd" class="form-group row">
		<label id="elh_view_patient_services_ProfCd" for="x_ProfCd" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->ProfCd->caption() ?><?php echo $view_patient_services_edit->ProfCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->ProfCd->cellAttributes() ?>>
<span id="el_view_patient_services_ProfCd">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->ProfCd->EditValue ?>"<?php echo $view_patient_services_edit->ProfCd->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->ProfCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->LabReport->Visible) { // LabReport ?>
	<div id="r_LabReport" class="form-group row">
		<label id="elh_view_patient_services_LabReport" for="x_LabReport" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->LabReport->caption() ?><?php echo $view_patient_services_edit->LabReport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->LabReport->cellAttributes() ?>>
<span id="el_view_patient_services_LabReport">
<textarea data-table="view_patient_services" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_edit->LabReport->getPlaceHolder()) ?>"<?php echo $view_patient_services_edit->LabReport->editAttributes() ?>><?php echo $view_patient_services_edit->LabReport->EditValue ?></textarea>
</span>
<?php echo $view_patient_services_edit->LabReport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label id="elh_view_patient_services_Comments" for="x_Comments" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Comments->caption() ?><?php echo $view_patient_services_edit->Comments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Comments->cellAttributes() ?>>
<span id="el_view_patient_services_Comments">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Comments->EditValue ?>"<?php echo $view_patient_services_edit->Comments->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Comments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_view_patient_services_Method" for="x_Method" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Method->caption() ?><?php echo $view_patient_services_edit->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Method->cellAttributes() ?>>
<span id="el_view_patient_services_Method">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Method->EditValue ?>"<?php echo $view_patient_services_edit->Method->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Specimen->Visible) { // Specimen ?>
	<div id="r_Specimen" class="form-group row">
		<label id="elh_view_patient_services_Specimen" for="x_Specimen" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Specimen->caption() ?><?php echo $view_patient_services_edit->Specimen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Specimen->cellAttributes() ?>>
<span id="el_view_patient_services_Specimen">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Specimen->EditValue ?>"<?php echo $view_patient_services_edit->Specimen->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Specimen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label id="elh_view_patient_services_Abnormal" for="x_Abnormal" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Abnormal->caption() ?><?php echo $view_patient_services_edit->Abnormal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Abnormal->cellAttributes() ?>>
<span id="el_view_patient_services_Abnormal">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Abnormal->EditValue ?>"<?php echo $view_patient_services_edit->Abnormal->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Abnormal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_view_patient_services_RefValue" for="x_RefValue" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->RefValue->caption() ?><?php echo $view_patient_services_edit->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->RefValue->cellAttributes() ?>>
<span id="el_view_patient_services_RefValue">
<textarea data-table="view_patient_services" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_edit->RefValue->getPlaceHolder()) ?>"<?php echo $view_patient_services_edit->RefValue->editAttributes() ?>><?php echo $view_patient_services_edit->RefValue->EditValue ?></textarea>
</span>
<?php echo $view_patient_services_edit->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->TestUnit->Visible) { // TestUnit ?>
	<div id="r_TestUnit" class="form-group row">
		<label id="elh_view_patient_services_TestUnit" for="x_TestUnit" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->TestUnit->caption() ?><?php echo $view_patient_services_edit->TestUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->TestUnit->cellAttributes() ?>>
<span id="el_view_patient_services_TestUnit">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x_TestUnit" id="x_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->TestUnit->EditValue ?>"<?php echo $view_patient_services_edit->TestUnit->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->TestUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->LOWHIGH->Visible) { // LOWHIGH ?>
	<div id="r_LOWHIGH" class="form-group row">
		<label id="elh_view_patient_services_LOWHIGH" for="x_LOWHIGH" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->LOWHIGH->caption() ?><?php echo $view_patient_services_edit->LOWHIGH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->LOWHIGH->cellAttributes() ?>>
<span id="el_view_patient_services_LOWHIGH">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->LOWHIGH->EditValue ?>"<?php echo $view_patient_services_edit->LOWHIGH->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->LOWHIGH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Branch->Visible) { // Branch ?>
	<div id="r_Branch" class="form-group row">
		<label id="elh_view_patient_services_Branch" for="x_Branch" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Branch->caption() ?><?php echo $view_patient_services_edit->Branch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Branch->cellAttributes() ?>>
<span id="el_view_patient_services_Branch">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Branch->EditValue ?>"<?php echo $view_patient_services_edit->Branch->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Branch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Dispatch->Visible) { // Dispatch ?>
	<div id="r_Dispatch" class="form-group row">
		<label id="elh_view_patient_services_Dispatch" for="x_Dispatch" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Dispatch->caption() ?><?php echo $view_patient_services_edit->Dispatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Dispatch->cellAttributes() ?>>
<span id="el_view_patient_services_Dispatch">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Dispatch->EditValue ?>"<?php echo $view_patient_services_edit->Dispatch->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Dispatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Pic1->Visible) { // Pic1 ?>
	<div id="r_Pic1" class="form-group row">
		<label id="elh_view_patient_services_Pic1" for="x_Pic1" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Pic1->caption() ?><?php echo $view_patient_services_edit->Pic1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Pic1->cellAttributes() ?>>
<span id="el_view_patient_services_Pic1">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Pic1->EditValue ?>"<?php echo $view_patient_services_edit->Pic1->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Pic1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Pic2->Visible) { // Pic2 ?>
	<div id="r_Pic2" class="form-group row">
		<label id="elh_view_patient_services_Pic2" for="x_Pic2" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Pic2->caption() ?><?php echo $view_patient_services_edit->Pic2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Pic2->cellAttributes() ?>>
<span id="el_view_patient_services_Pic2">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Pic2->EditValue ?>"<?php echo $view_patient_services_edit->Pic2->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Pic2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->GraphPath->Visible) { // GraphPath ?>
	<div id="r_GraphPath" class="form-group row">
		<label id="elh_view_patient_services_GraphPath" for="x_GraphPath" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->GraphPath->caption() ?><?php echo $view_patient_services_edit->GraphPath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->GraphPath->cellAttributes() ?>>
<span id="el_view_patient_services_GraphPath">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->GraphPath->EditValue ?>"<?php echo $view_patient_services_edit->GraphPath->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->GraphPath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->MachineCD->Visible) { // MachineCD ?>
	<div id="r_MachineCD" class="form-group row">
		<label id="elh_view_patient_services_MachineCD" for="x_MachineCD" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->MachineCD->caption() ?><?php echo $view_patient_services_edit->MachineCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->MachineCD->cellAttributes() ?>>
<span id="el_view_patient_services_MachineCD">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->MachineCD->EditValue ?>"<?php echo $view_patient_services_edit->MachineCD->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->MachineCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->TestCancel->Visible) { // TestCancel ?>
	<div id="r_TestCancel" class="form-group row">
		<label id="elh_view_patient_services_TestCancel" for="x_TestCancel" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->TestCancel->caption() ?><?php echo $view_patient_services_edit->TestCancel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->TestCancel->cellAttributes() ?>>
<span id="el_view_patient_services_TestCancel">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->TestCancel->EditValue ?>"<?php echo $view_patient_services_edit->TestCancel->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->TestCancel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->OutSource->Visible) { // OutSource ?>
	<div id="r_OutSource" class="form-group row">
		<label id="elh_view_patient_services_OutSource" for="x_OutSource" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->OutSource->caption() ?><?php echo $view_patient_services_edit->OutSource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->OutSource->cellAttributes() ?>>
<span id="el_view_patient_services_OutSource">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->OutSource->EditValue ?>"<?php echo $view_patient_services_edit->OutSource->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->OutSource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Printed->Visible) { // Printed ?>
	<div id="r_Printed" class="form-group row">
		<label id="elh_view_patient_services_Printed" for="x_Printed" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Printed->caption() ?><?php echo $view_patient_services_edit->Printed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Printed->cellAttributes() ?>>
<span id="el_view_patient_services_Printed">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Printed->EditValue ?>"<?php echo $view_patient_services_edit->Printed->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Printed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->PrintBy->Visible) { // PrintBy ?>
	<div id="r_PrintBy" class="form-group row">
		<label id="elh_view_patient_services_PrintBy" for="x_PrintBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->PrintBy->caption() ?><?php echo $view_patient_services_edit->PrintBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->PrintBy->cellAttributes() ?>>
<span id="el_view_patient_services_PrintBy">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->PrintBy->EditValue ?>"<?php echo $view_patient_services_edit->PrintBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->PrintBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->PrintDate->Visible) { // PrintDate ?>
	<div id="r_PrintDate" class="form-group row">
		<label id="elh_view_patient_services_PrintDate" for="x_PrintDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->PrintDate->caption() ?><?php echo $view_patient_services_edit->PrintDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->PrintDate->cellAttributes() ?>>
<span id="el_view_patient_services_PrintDate">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services_edit->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->PrintDate->EditValue ?>"<?php echo $view_patient_services_edit->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services_edit->PrintDate->ReadOnly && !$view_patient_services_edit->PrintDate->Disabled && !isset($view_patient_services_edit->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services_edit->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesedit", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services_edit->PrintDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->BillingDate->Visible) { // BillingDate ?>
	<div id="r_BillingDate" class="form-group row">
		<label id="elh_view_patient_services_BillingDate" for="x_BillingDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->BillingDate->caption() ?><?php echo $view_patient_services_edit->BillingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->BillingDate->cellAttributes() ?>>
<span id="el_view_patient_services_BillingDate">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x_BillingDate" id="x_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services_edit->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->BillingDate->EditValue ?>"<?php echo $view_patient_services_edit->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services_edit->BillingDate->ReadOnly && !$view_patient_services_edit->BillingDate->Disabled && !isset($view_patient_services_edit->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services_edit->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesedit", "x_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services_edit->BillingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->BilledBy->Visible) { // BilledBy ?>
	<div id="r_BilledBy" class="form-group row">
		<label id="elh_view_patient_services_BilledBy" for="x_BilledBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->BilledBy->caption() ?><?php echo $view_patient_services_edit->BilledBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->BilledBy->cellAttributes() ?>>
<span id="el_view_patient_services_BilledBy">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x_BilledBy" id="x_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->BilledBy->EditValue ?>"<?php echo $view_patient_services_edit->BilledBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->BilledBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Resulted->Visible) { // Resulted ?>
	<div id="r_Resulted" class="form-group row">
		<label id="elh_view_patient_services_Resulted" for="x_Resulted" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Resulted->caption() ?><?php echo $view_patient_services_edit->Resulted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Resulted->cellAttributes() ?>>
<span id="el_view_patient_services_Resulted">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x_Resulted" id="x_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Resulted->EditValue ?>"<?php echo $view_patient_services_edit->Resulted->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Resulted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label id="elh_view_patient_services_ResultDate" for="x_ResultDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->ResultDate->caption() ?><?php echo $view_patient_services_edit->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->ResultDate->cellAttributes() ?>>
<span id="el_view_patient_services_ResultDate">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services_edit->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->ResultDate->EditValue ?>"<?php echo $view_patient_services_edit->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services_edit->ResultDate->ReadOnly && !$view_patient_services_edit->ResultDate->Disabled && !isset($view_patient_services_edit->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services_edit->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesedit", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services_edit->ResultDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->ResultedBy->Visible) { // ResultedBy ?>
	<div id="r_ResultedBy" class="form-group row">
		<label id="elh_view_patient_services_ResultedBy" for="x_ResultedBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->ResultedBy->caption() ?><?php echo $view_patient_services_edit->ResultedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->ResultedBy->cellAttributes() ?>>
<span id="el_view_patient_services_ResultedBy">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->ResultedBy->EditValue ?>"<?php echo $view_patient_services_edit->ResultedBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->ResultedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->SampleDate->Visible) { // SampleDate ?>
	<div id="r_SampleDate" class="form-group row">
		<label id="elh_view_patient_services_SampleDate" for="x_SampleDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->SampleDate->caption() ?><?php echo $view_patient_services_edit->SampleDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->SampleDate->cellAttributes() ?>>
<span id="el_view_patient_services_SampleDate">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services_edit->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->SampleDate->EditValue ?>"<?php echo $view_patient_services_edit->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services_edit->SampleDate->ReadOnly && !$view_patient_services_edit->SampleDate->Disabled && !isset($view_patient_services_edit->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services_edit->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesedit", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services_edit->SampleDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->SampleUser->Visible) { // SampleUser ?>
	<div id="r_SampleUser" class="form-group row">
		<label id="elh_view_patient_services_SampleUser" for="x_SampleUser" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->SampleUser->caption() ?><?php echo $view_patient_services_edit->SampleUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->SampleUser->cellAttributes() ?>>
<span id="el_view_patient_services_SampleUser">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->SampleUser->EditValue ?>"<?php echo $view_patient_services_edit->SampleUser->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->SampleUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Sampled->Visible) { // Sampled ?>
	<div id="r_Sampled" class="form-group row">
		<label id="elh_view_patient_services_Sampled" for="x_Sampled" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Sampled->caption() ?><?php echo $view_patient_services_edit->Sampled->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Sampled->cellAttributes() ?>>
<span id="el_view_patient_services_Sampled">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x_Sampled" id="x_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Sampled->EditValue ?>"<?php echo $view_patient_services_edit->Sampled->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Sampled->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->ReceivedDate->Visible) { // ReceivedDate ?>
	<div id="r_ReceivedDate" class="form-group row">
		<label id="elh_view_patient_services_ReceivedDate" for="x_ReceivedDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->ReceivedDate->caption() ?><?php echo $view_patient_services_edit->ReceivedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->ReceivedDate->cellAttributes() ?>>
<span id="el_view_patient_services_ReceivedDate">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services_edit->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->ReceivedDate->EditValue ?>"<?php echo $view_patient_services_edit->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services_edit->ReceivedDate->ReadOnly && !$view_patient_services_edit->ReceivedDate->Disabled && !isset($view_patient_services_edit->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services_edit->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesedit", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services_edit->ReceivedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->ReceivedUser->Visible) { // ReceivedUser ?>
	<div id="r_ReceivedUser" class="form-group row">
		<label id="elh_view_patient_services_ReceivedUser" for="x_ReceivedUser" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->ReceivedUser->caption() ?><?php echo $view_patient_services_edit->ReceivedUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->ReceivedUser->cellAttributes() ?>>
<span id="el_view_patient_services_ReceivedUser">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->ReceivedUser->EditValue ?>"<?php echo $view_patient_services_edit->ReceivedUser->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->ReceivedUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Recevied->Visible) { // Recevied ?>
	<div id="r_Recevied" class="form-group row">
		<label id="elh_view_patient_services_Recevied" for="x_Recevied" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Recevied->caption() ?><?php echo $view_patient_services_edit->Recevied->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Recevied->cellAttributes() ?>>
<span id="el_view_patient_services_Recevied">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x_Recevied" id="x_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Recevied->EditValue ?>"<?php echo $view_patient_services_edit->Recevied->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Recevied->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<div id="r_DeptRecvDate" class="form-group row">
		<label id="elh_view_patient_services_DeptRecvDate" for="x_DeptRecvDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DeptRecvDate->caption() ?><?php echo $view_patient_services_edit->DeptRecvDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DeptRecvDate->cellAttributes() ?>>
<span id="el_view_patient_services_DeptRecvDate">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services_edit->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services_edit->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services_edit->DeptRecvDate->ReadOnly && !$view_patient_services_edit->DeptRecvDate->Disabled && !isset($view_patient_services_edit->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services_edit->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesedit", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services_edit->DeptRecvDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<div id="r_DeptRecvUser" class="form-group row">
		<label id="elh_view_patient_services_DeptRecvUser" for="x_DeptRecvUser" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DeptRecvUser->caption() ?><?php echo $view_patient_services_edit->DeptRecvUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DeptRecvUser->cellAttributes() ?>>
<span id="el_view_patient_services_DeptRecvUser">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services_edit->DeptRecvUser->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->DeptRecvUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->DeptRecived->Visible) { // DeptRecived ?>
	<div id="r_DeptRecived" class="form-group row">
		<label id="elh_view_patient_services_DeptRecived" for="x_DeptRecived" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->DeptRecived->caption() ?><?php echo $view_patient_services_edit->DeptRecived->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->DeptRecived->cellAttributes() ?>>
<span id="el_view_patient_services_DeptRecived">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x_DeptRecived" id="x_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->DeptRecived->EditValue ?>"<?php echo $view_patient_services_edit->DeptRecived->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->DeptRecived->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->SAuthDate->Visible) { // SAuthDate ?>
	<div id="r_SAuthDate" class="form-group row">
		<label id="elh_view_patient_services_SAuthDate" for="x_SAuthDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->SAuthDate->caption() ?><?php echo $view_patient_services_edit->SAuthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->SAuthDate->cellAttributes() ?>>
<span id="el_view_patient_services_SAuthDate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_edit->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->SAuthDate->EditValue ?>"<?php echo $view_patient_services_edit->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_edit->SAuthDate->ReadOnly && !$view_patient_services_edit->SAuthDate->Disabled && !isset($view_patient_services_edit->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_edit->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesedit", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services_edit->SAuthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->SAuthBy->Visible) { // SAuthBy ?>
	<div id="r_SAuthBy" class="form-group row">
		<label id="elh_view_patient_services_SAuthBy" for="x_SAuthBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->SAuthBy->caption() ?><?php echo $view_patient_services_edit->SAuthBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->SAuthBy->cellAttributes() ?>>
<span id="el_view_patient_services_SAuthBy">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->SAuthBy->EditValue ?>"<?php echo $view_patient_services_edit->SAuthBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->SAuthBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->SAuthendicate->Visible) { // SAuthendicate ?>
	<div id="r_SAuthendicate" class="form-group row">
		<label id="elh_view_patient_services_SAuthendicate" for="x_SAuthendicate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->SAuthendicate->caption() ?><?php echo $view_patient_services_edit->SAuthendicate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->SAuthendicate->cellAttributes() ?>>
<span id="el_view_patient_services_SAuthendicate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x_SAuthendicate" id="x_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->SAuthendicate->EditValue ?>"<?php echo $view_patient_services_edit->SAuthendicate->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->SAuthendicate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->AuthDate->Visible) { // AuthDate ?>
	<div id="r_AuthDate" class="form-group row">
		<label id="elh_view_patient_services_AuthDate" for="x_AuthDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->AuthDate->caption() ?><?php echo $view_patient_services_edit->AuthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->AuthDate->cellAttributes() ?>>
<span id="el_view_patient_services_AuthDate">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_edit->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->AuthDate->EditValue ?>"<?php echo $view_patient_services_edit->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_edit->AuthDate->ReadOnly && !$view_patient_services_edit->AuthDate->Disabled && !isset($view_patient_services_edit->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_edit->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesedit", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services_edit->AuthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->AuthBy->Visible) { // AuthBy ?>
	<div id="r_AuthBy" class="form-group row">
		<label id="elh_view_patient_services_AuthBy" for="x_AuthBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->AuthBy->caption() ?><?php echo $view_patient_services_edit->AuthBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->AuthBy->cellAttributes() ?>>
<span id="el_view_patient_services_AuthBy">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->AuthBy->EditValue ?>"<?php echo $view_patient_services_edit->AuthBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->AuthBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Authencate->Visible) { // Authencate ?>
	<div id="r_Authencate" class="form-group row">
		<label id="elh_view_patient_services_Authencate" for="x_Authencate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Authencate->caption() ?><?php echo $view_patient_services_edit->Authencate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Authencate->cellAttributes() ?>>
<span id="el_view_patient_services_Authencate">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x_Authencate" id="x_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Authencate->EditValue ?>"<?php echo $view_patient_services_edit->Authencate->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Authencate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label id="elh_view_patient_services_EditDate" for="x_EditDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->EditDate->caption() ?><?php echo $view_patient_services_edit->EditDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->EditDate->cellAttributes() ?>>
<span id="el_view_patient_services_EditDate">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services_edit->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->EditDate->EditValue ?>"<?php echo $view_patient_services_edit->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services_edit->EditDate->ReadOnly && !$view_patient_services_edit->EditDate->Disabled && !isset($view_patient_services_edit->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services_edit->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesedit", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services_edit->EditDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->EditBy->Visible) { // EditBy ?>
	<div id="r_EditBy" class="form-group row">
		<label id="elh_view_patient_services_EditBy" for="x_EditBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->EditBy->caption() ?><?php echo $view_patient_services_edit->EditBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->EditBy->cellAttributes() ?>>
<span id="el_view_patient_services_EditBy">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x_EditBy" id="x_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->EditBy->EditValue ?>"<?php echo $view_patient_services_edit->EditBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->EditBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Editted->Visible) { // Editted ?>
	<div id="r_Editted" class="form-group row">
		<label id="elh_view_patient_services_Editted" for="x_Editted" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Editted->caption() ?><?php echo $view_patient_services_edit->Editted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Editted->cellAttributes() ?>>
<span id="el_view_patient_services_Editted">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x_Editted" id="x_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Editted->EditValue ?>"<?php echo $view_patient_services_edit->Editted->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Editted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_view_patient_services_PatID" for="x_PatID" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->PatID->caption() ?><?php echo $view_patient_services_edit->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->PatID->cellAttributes() ?>>
<span id="el_view_patient_services_PatID">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->PatID->EditValue ?>"<?php echo $view_patient_services_edit->PatID->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_view_patient_services_PatientId" for="x_PatientId" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->PatientId->caption() ?><?php echo $view_patient_services_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->PatientId->cellAttributes() ?>>
<span id="el_view_patient_services_PatientId">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->PatientId->EditValue ?>"<?php echo $view_patient_services_edit->PatientId->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_view_patient_services_Mobile" for="x_Mobile" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Mobile->caption() ?><?php echo $view_patient_services_edit->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Mobile->cellAttributes() ?>>
<span id="el_view_patient_services_Mobile">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Mobile->EditValue ?>"<?php echo $view_patient_services_edit->Mobile->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_view_patient_services_CId" for="x_CId" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->CId->caption() ?><?php echo $view_patient_services_edit->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->CId->cellAttributes() ?>>
<span id="el_view_patient_services_CId">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->CId->EditValue ?>"<?php echo $view_patient_services_edit->CId->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_view_patient_services_Order" for="x_Order" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Order->caption() ?><?php echo $view_patient_services_edit->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Order->cellAttributes() ?>>
<span id="el_view_patient_services_Order">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Order->EditValue ?>"<?php echo $view_patient_services_edit->Order->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_view_patient_services_Form" for="x_Form" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Form->caption() ?><?php echo $view_patient_services_edit->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Form->cellAttributes() ?>>
<span id="el_view_patient_services_Form">
<textarea data-table="view_patient_services" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Form->getPlaceHolder()) ?>"<?php echo $view_patient_services_edit->Form->editAttributes() ?>><?php echo $view_patient_services_edit->Form->EditValue ?></textarea>
</span>
<?php echo $view_patient_services_edit->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_view_patient_services_ResType" for="x_ResType" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->ResType->caption() ?><?php echo $view_patient_services_edit->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->ResType->cellAttributes() ?>>
<span id="el_view_patient_services_ResType">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->ResType->EditValue ?>"<?php echo $view_patient_services_edit->ResType->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_view_patient_services_Sample" for="x_Sample" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Sample->caption() ?><?php echo $view_patient_services_edit->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Sample->cellAttributes() ?>>
<span id="el_view_patient_services_Sample">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Sample->EditValue ?>"<?php echo $view_patient_services_edit->Sample->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_view_patient_services_NoD" for="x_NoD" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->NoD->caption() ?><?php echo $view_patient_services_edit->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->NoD->cellAttributes() ?>>
<span id="el_view_patient_services_NoD">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->NoD->EditValue ?>"<?php echo $view_patient_services_edit->NoD->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_view_patient_services_BillOrder" for="x_BillOrder" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->BillOrder->caption() ?><?php echo $view_patient_services_edit->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->BillOrder->cellAttributes() ?>>
<span id="el_view_patient_services_BillOrder">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->BillOrder->EditValue ?>"<?php echo $view_patient_services_edit->BillOrder->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_view_patient_services_Formula" for="x_Formula" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Formula->caption() ?><?php echo $view_patient_services_edit->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Formula->cellAttributes() ?>>
<span id="el_view_patient_services_Formula">
<textarea data-table="view_patient_services" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Formula->getPlaceHolder()) ?>"<?php echo $view_patient_services_edit->Formula->editAttributes() ?>><?php echo $view_patient_services_edit->Formula->EditValue ?></textarea>
</span>
<?php echo $view_patient_services_edit->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_view_patient_services_Inactive" for="x_Inactive" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Inactive->caption() ?><?php echo $view_patient_services_edit->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Inactive->cellAttributes() ?>>
<span id="el_view_patient_services_Inactive">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Inactive->EditValue ?>"<?php echo $view_patient_services_edit->Inactive->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_view_patient_services_CollSample" for="x_CollSample" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->CollSample->caption() ?><?php echo $view_patient_services_edit->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->CollSample->cellAttributes() ?>>
<span id="el_view_patient_services_CollSample">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->CollSample->EditValue ?>"<?php echo $view_patient_services_edit->CollSample->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_view_patient_services_TestType" for="x_TestType" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->TestType->caption() ?><?php echo $view_patient_services_edit->TestType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->TestType->cellAttributes() ?>>
<span id="el_view_patient_services_TestType">
<span<?php echo $view_patient_services_edit->TestType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_edit->TestType->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="x_TestType" id="x_TestType" value="<?php echo HtmlEncode($view_patient_services_edit->TestType->CurrentValue) ?>">
<?php echo $view_patient_services_edit->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Repeated->Visible) { // Repeated ?>
	<div id="r_Repeated" class="form-group row">
		<label id="elh_view_patient_services_Repeated" for="x_Repeated" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Repeated->caption() ?><?php echo $view_patient_services_edit->Repeated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Repeated->cellAttributes() ?>>
<span id="el_view_patient_services_Repeated">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x_Repeated" id="x_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Repeated->EditValue ?>"<?php echo $view_patient_services_edit->Repeated->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Repeated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->RepeatedBy->Visible) { // RepeatedBy ?>
	<div id="r_RepeatedBy" class="form-group row">
		<label id="elh_view_patient_services_RepeatedBy" for="x_RepeatedBy" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->RepeatedBy->caption() ?><?php echo $view_patient_services_edit->RepeatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->RepeatedBy->cellAttributes() ?>>
<span id="el_view_patient_services_RepeatedBy">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x_RepeatedBy" id="x_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->RepeatedBy->EditValue ?>"<?php echo $view_patient_services_edit->RepeatedBy->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->RepeatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->RepeatedDate->Visible) { // RepeatedDate ?>
	<div id="r_RepeatedDate" class="form-group row">
		<label id="elh_view_patient_services_RepeatedDate" for="x_RepeatedDate" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->RepeatedDate->caption() ?><?php echo $view_patient_services_edit->RepeatedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->RepeatedDate->cellAttributes() ?>>
<span id="el_view_patient_services_RepeatedDate">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x_RepeatedDate" id="x_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services_edit->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->RepeatedDate->EditValue ?>"<?php echo $view_patient_services_edit->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services_edit->RepeatedDate->ReadOnly && !$view_patient_services_edit->RepeatedDate->Disabled && !isset($view_patient_services_edit->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services_edit->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesedit", "x_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $view_patient_services_edit->RepeatedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->serviceID->Visible) { // serviceID ?>
	<div id="r_serviceID" class="form-group row">
		<label id="elh_view_patient_services_serviceID" for="x_serviceID" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->serviceID->caption() ?><?php echo $view_patient_services_edit->serviceID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->serviceID->cellAttributes() ?>>
<span id="el_view_patient_services_serviceID">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x_serviceID" id="x_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->serviceID->EditValue ?>"<?php echo $view_patient_services_edit->serviceID->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->serviceID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Service_Type->Visible) { // Service_Type ?>
	<div id="r_Service_Type" class="form-group row">
		<label id="elh_view_patient_services_Service_Type" for="x_Service_Type" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Service_Type->caption() ?><?php echo $view_patient_services_edit->Service_Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Service_Type->cellAttributes() ?>>
<span id="el_view_patient_services_Service_Type">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x_Service_Type" id="x_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Service_Type->EditValue ?>"<?php echo $view_patient_services_edit->Service_Type->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Service_Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->Service_Department->Visible) { // Service_Department ?>
	<div id="r_Service_Department" class="form-group row">
		<label id="elh_view_patient_services_Service_Department" for="x_Service_Department" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->Service_Department->caption() ?><?php echo $view_patient_services_edit->Service_Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->Service_Department->cellAttributes() ?>>
<span id="el_view_patient_services_Service_Department">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x_Service_Department" id="x_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_edit->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->Service_Department->EditValue ?>"<?php echo $view_patient_services_edit->Service_Department->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->Service_Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_services_edit->RequestNo->Visible) { // RequestNo ?>
	<div id="r_RequestNo" class="form-group row">
		<label id="elh_view_patient_services_RequestNo" for="x_RequestNo" class="<?php echo $view_patient_services_edit->LeftColumnClass ?>"><?php echo $view_patient_services_edit->RequestNo->caption() ?><?php echo $view_patient_services_edit->RequestNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_services_edit->RightColumnClass ?>"><div <?php echo $view_patient_services_edit->RequestNo->cellAttributes() ?>>
<span id="el_view_patient_services_RequestNo">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x_RequestNo" id="x_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_edit->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_edit->RequestNo->EditValue ?>"<?php echo $view_patient_services_edit->RequestNo->editAttributes() ?>>
</span>
<?php echo $view_patient_services_edit->RequestNo->CustomMsg ?></div></div>
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
$view_patient_services_edit->terminate();
?>