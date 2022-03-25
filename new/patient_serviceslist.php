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
<?php include_once "header.php"; ?>
<?php if (!$patient_services_list->isExport()) { ?>
<script>
var fpatient_serviceslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_serviceslist = currentForm = new ew.Form("fpatient_serviceslist", "list");
	fpatient_serviceslist.formKeyCountName = '<?php echo $patient_services_list->FormKeyCountName ?>';

	// Validate form
	fpatient_serviceslist.validate = function() {
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
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($patient_services_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->id->caption(), $patient_services_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Reception->caption(), $patient_services_list->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Services->Required) { ?>
				elm = this.getElements("x" + infix + "_Services");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Services->caption(), $patient_services_list->Services->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->amount->caption(), $patient_services_list->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->amount->errorMessage()) ?>");
			<?php if ($patient_services_list->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->description->caption(), $patient_services_list->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->patient_type->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->patient_type->caption(), $patient_services_list->patient_type->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->patient_type->errorMessage()) ?>");
			<?php if ($patient_services_list->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->charged_date->caption(), $patient_services_list->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->status->caption(), $patient_services_list->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->mrnno->caption(), $patient_services_list->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->PatientName->caption(), $patient_services_list->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Age->caption(), $patient_services_list->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Gender->caption(), $patient_services_list->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Unit->caption(), $patient_services_list->Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->Unit->errorMessage()) ?>");
			<?php if ($patient_services_list->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Quantity->caption(), $patient_services_list->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->Quantity->errorMessage()) ?>");
			<?php if ($patient_services_list->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Discount->caption(), $patient_services_list->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->Discount->errorMessage()) ?>");
			<?php if ($patient_services_list->SubTotal->Required) { ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->SubTotal->caption(), $patient_services_list->SubTotal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->SubTotal->errorMessage()) ?>");
			<?php if ($patient_services_list->ServiceSelect->Required) { ?>
				elm = this.getElements("x" + infix + "_ServiceSelect[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->ServiceSelect->caption(), $patient_services_list->ServiceSelect->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Aid->Required) { ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Aid->caption(), $patient_services_list->Aid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->Aid->errorMessage()) ?>");
			<?php if ($patient_services_list->Vid->Required) { ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Vid->caption(), $patient_services_list->Vid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->Vid->errorMessage()) ?>");
			<?php if ($patient_services_list->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DrID->caption(), $patient_services_list->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->DrID->errorMessage()) ?>");
			<?php if ($patient_services_list->DrCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_DrCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DrCODE->caption(), $patient_services_list->DrCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->DrName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DrName->caption(), $patient_services_list->DrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Department->caption(), $patient_services_list->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->DrSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DrSharePres->caption(), $patient_services_list->DrSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->DrSharePres->errorMessage()) ?>");
			<?php if ($patient_services_list->HospSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->HospSharePres->caption(), $patient_services_list->HospSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->HospSharePres->errorMessage()) ?>");
			<?php if ($patient_services_list->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DrShareAmount->caption(), $patient_services_list->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->DrShareAmount->errorMessage()) ?>");
			<?php if ($patient_services_list->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->HospShareAmount->caption(), $patient_services_list->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->HospShareAmount->errorMessage()) ?>");
			<?php if ($patient_services_list->DrShareSettiledAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DrShareSettiledAmount->caption(), $patient_services_list->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->DrShareSettiledAmount->errorMessage()) ?>");
			<?php if ($patient_services_list->DrShareSettledId->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DrShareSettledId->caption(), $patient_services_list->DrShareSettledId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->DrShareSettledId->errorMessage()) ?>");
			<?php if ($patient_services_list->DrShareSettiledStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DrShareSettiledStatus->caption(), $patient_services_list->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->DrShareSettiledStatus->errorMessage()) ?>");
			<?php if ($patient_services_list->invoiceId->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->invoiceId->caption(), $patient_services_list->invoiceId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->invoiceId->errorMessage()) ?>");
			<?php if ($patient_services_list->invoiceAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->invoiceAmount->caption(), $patient_services_list->invoiceAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->invoiceAmount->errorMessage()) ?>");
			<?php if ($patient_services_list->invoiceStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->invoiceStatus->caption(), $patient_services_list->invoiceStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->modeOfPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_modeOfPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->modeOfPayment->caption(), $patient_services_list->modeOfPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->HospID->caption(), $patient_services_list->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->RIDNO->caption(), $patient_services_list->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->TidNo->caption(), $patient_services_list->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->DiscountCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DiscountCategory->caption(), $patient_services_list->DiscountCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->sid->Required) { ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->sid->caption(), $patient_services_list->sid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->sid->errorMessage()) ?>");
			<?php if ($patient_services_list->ItemCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->ItemCode->caption(), $patient_services_list->ItemCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->TestSubCd->caption(), $patient_services_list->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->DEptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DEptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DEptCd->caption(), $patient_services_list->DEptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->ProfCd->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->ProfCd->caption(), $patient_services_list->ProfCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Comments->Required) { ?>
				elm = this.getElements("x" + infix + "_Comments");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Comments->caption(), $patient_services_list->Comments->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Method->caption(), $patient_services_list->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Specimen->Required) { ?>
				elm = this.getElements("x" + infix + "_Specimen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Specimen->caption(), $patient_services_list->Specimen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Abnormal->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Abnormal->caption(), $patient_services_list->Abnormal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->TestUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_TestUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->TestUnit->caption(), $patient_services_list->TestUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->LOWHIGH->Required) { ?>
				elm = this.getElements("x" + infix + "_LOWHIGH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->LOWHIGH->caption(), $patient_services_list->LOWHIGH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Branch->Required) { ?>
				elm = this.getElements("x" + infix + "_Branch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Branch->caption(), $patient_services_list->Branch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Dispatch->Required) { ?>
				elm = this.getElements("x" + infix + "_Dispatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Dispatch->caption(), $patient_services_list->Dispatch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Pic1->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Pic1->caption(), $patient_services_list->Pic1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Pic2->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Pic2->caption(), $patient_services_list->Pic2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->GraphPath->Required) { ?>
				elm = this.getElements("x" + infix + "_GraphPath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->GraphPath->caption(), $patient_services_list->GraphPath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->MachineCD->Required) { ?>
				elm = this.getElements("x" + infix + "_MachineCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->MachineCD->caption(), $patient_services_list->MachineCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->TestCancel->Required) { ?>
				elm = this.getElements("x" + infix + "_TestCancel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->TestCancel->caption(), $patient_services_list->TestCancel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->OutSource->Required) { ?>
				elm = this.getElements("x" + infix + "_OutSource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->OutSource->caption(), $patient_services_list->OutSource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Printed->Required) { ?>
				elm = this.getElements("x" + infix + "_Printed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Printed->caption(), $patient_services_list->Printed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->PrintBy->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->PrintBy->caption(), $patient_services_list->PrintBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->PrintDate->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->PrintDate->caption(), $patient_services_list->PrintDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->PrintDate->errorMessage()) ?>");
			<?php if ($patient_services_list->BillingDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->BillingDate->caption(), $patient_services_list->BillingDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->BillingDate->errorMessage()) ?>");
			<?php if ($patient_services_list->BilledBy->Required) { ?>
				elm = this.getElements("x" + infix + "_BilledBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->BilledBy->caption(), $patient_services_list->BilledBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Resulted->Required) { ?>
				elm = this.getElements("x" + infix + "_Resulted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Resulted->caption(), $patient_services_list->Resulted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->ResultDate->caption(), $patient_services_list->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->ResultDate->errorMessage()) ?>");
			<?php if ($patient_services_list->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->ResultedBy->caption(), $patient_services_list->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->SampleDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->SampleDate->caption(), $patient_services_list->SampleDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->SampleDate->errorMessage()) ?>");
			<?php if ($patient_services_list->SampleUser->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->SampleUser->caption(), $patient_services_list->SampleUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Sampled->Required) { ?>
				elm = this.getElements("x" + infix + "_Sampled");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Sampled->caption(), $patient_services_list->Sampled->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->ReceivedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->ReceivedDate->caption(), $patient_services_list->ReceivedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->ReceivedDate->errorMessage()) ?>");
			<?php if ($patient_services_list->ReceivedUser->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->ReceivedUser->caption(), $patient_services_list->ReceivedUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Recevied->Required) { ?>
				elm = this.getElements("x" + infix + "_Recevied");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Recevied->caption(), $patient_services_list->Recevied->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->DeptRecvDate->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DeptRecvDate->caption(), $patient_services_list->DeptRecvDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->DeptRecvDate->errorMessage()) ?>");
			<?php if ($patient_services_list->DeptRecvUser->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DeptRecvUser->caption(), $patient_services_list->DeptRecvUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->DeptRecived->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecived");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->DeptRecived->caption(), $patient_services_list->DeptRecived->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->SAuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->SAuthDate->caption(), $patient_services_list->SAuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->SAuthDate->errorMessage()) ?>");
			<?php if ($patient_services_list->SAuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->SAuthBy->caption(), $patient_services_list->SAuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->SAuthendicate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthendicate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->SAuthendicate->caption(), $patient_services_list->SAuthendicate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->AuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->AuthDate->caption(), $patient_services_list->AuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->AuthDate->errorMessage()) ?>");
			<?php if ($patient_services_list->AuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->AuthBy->caption(), $patient_services_list->AuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Authencate->Required) { ?>
				elm = this.getElements("x" + infix + "_Authencate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Authencate->caption(), $patient_services_list->Authencate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->EditDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->EditDate->caption(), $patient_services_list->EditDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->EditDate->errorMessage()) ?>");
			<?php if ($patient_services_list->EditBy->Required) { ?>
				elm = this.getElements("x" + infix + "_EditBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->EditBy->caption(), $patient_services_list->EditBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Editted->Required) { ?>
				elm = this.getElements("x" + infix + "_Editted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Editted->caption(), $patient_services_list->Editted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->PatID->caption(), $patient_services_list->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->PatID->errorMessage()) ?>");
			<?php if ($patient_services_list->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->PatientId->caption(), $patient_services_list->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Mobile->caption(), $patient_services_list->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->CId->caption(), $patient_services_list->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->CId->errorMessage()) ?>");
			<?php if ($patient_services_list->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Order->caption(), $patient_services_list->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->Order->errorMessage()) ?>");
			<?php if ($patient_services_list->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->ResType->caption(), $patient_services_list->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Sample->caption(), $patient_services_list->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->NoD->caption(), $patient_services_list->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->NoD->errorMessage()) ?>");
			<?php if ($patient_services_list->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->BillOrder->caption(), $patient_services_list->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->BillOrder->errorMessage()) ?>");
			<?php if ($patient_services_list->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Inactive->caption(), $patient_services_list->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->CollSample->caption(), $patient_services_list->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->TestType->caption(), $patient_services_list->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Repeated->Required) { ?>
				elm = this.getElements("x" + infix + "_Repeated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Repeated->caption(), $patient_services_list->Repeated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->RepeatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->RepeatedBy->caption(), $patient_services_list->RepeatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->RepeatedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->RepeatedDate->caption(), $patient_services_list->RepeatedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->RepeatedDate->errorMessage()) ?>");
			<?php if ($patient_services_list->serviceID->Required) { ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->serviceID->caption(), $patient_services_list->serviceID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->serviceID->errorMessage()) ?>");
			<?php if ($patient_services_list->Service_Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Service_Type->caption(), $patient_services_list->Service_Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->Service_Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->Service_Department->caption(), $patient_services_list->Service_Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_list->RequestNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_list->RequestNo->caption(), $patient_services_list->RequestNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_list->RequestNo->errorMessage()) ?>");

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpatient_serviceslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_serviceslist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_serviceslist.lists["x_Services"] = <?php echo $patient_services_list->Services->Lookup->toClientList($patient_services_list) ?>;
	fpatient_serviceslist.lists["x_Services"].options = <?php echo JsonEncode($patient_services_list->Services->lookupOptions()) ?>;
	fpatient_serviceslist.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_serviceslist.lists["x_status"] = <?php echo $patient_services_list->status->Lookup->toClientList($patient_services_list) ?>;
	fpatient_serviceslist.lists["x_status"].options = <?php echo JsonEncode($patient_services_list->status->lookupOptions()) ?>;
	fpatient_serviceslist.lists["x_ServiceSelect[]"] = <?php echo $patient_services_list->ServiceSelect->Lookup->toClientList($patient_services_list) ?>;
	fpatient_serviceslist.lists["x_ServiceSelect[]"].options = <?php echo JsonEncode($patient_services_list->ServiceSelect->options(FALSE, TRUE)) ?>;
	loadjs.done("fpatient_serviceslist");
});
var fpatient_serviceslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_serviceslistsrch = currentSearchForm = new ew.Form("fpatient_serviceslistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_serviceslistsrch.filterList = <?php echo $patient_services_list->getFilterList() ?>;
	loadjs.done("fpatient_serviceslistsrch");
});
</script>
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
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_services_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_services_list->TotalRecords > 0 && $patient_services_list->ExportOptions->visible()) { ?>
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
<?php if (!$patient_services_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_services_list->isExport("print")) { ?>
<?php
if ($patient_services_list->DbMasterFilter != "" && $patient_services->getCurrentMasterTable() == "billing_voucher") {
	if ($patient_services_list->MasterRecordExists) {
		include_once "billing_vouchermaster.php";
	}
}
?>
<?php
if ($patient_services_list->DbMasterFilter != "" && $patient_services->getCurrentMasterTable() == "ip_admission") {
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
<?php if (!$patient_services_list->isExport() && !$patient_services->CurrentAction) { ?>
<form name="fpatient_serviceslistsrch" id="fpatient_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_serviceslistsrch-search-panel" class="<?php echo $patient_services_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_services">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_services_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_services_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_services_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_services_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_services_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_services_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_services_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_services_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_services_list->showPageHeader(); ?>
<?php
$patient_services_list->showMessage();
?>
<?php if ($patient_services_list->TotalRecords > 0 || $patient_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_services_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_services">
<?php if (!$patient_services_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_services_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_services_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_serviceslist" id="fpatient_serviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<?php if ($patient_services->getCurrentMasterTable() == "billing_voucher" && $patient_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="billing_voucher">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_services_list->Vid->getSessionValue()) ?>">
<?php } ?>
<?php if ($patient_services->getCurrentMasterTable() == "ip_admission" && $patient_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_services_list->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_services_list->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_services_list->PatID->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_services" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_services_list->TotalRecords > 0 || $patient_services_list->isGridEdit()) { ?>
<table id="tbl_patient_serviceslist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_services->RowType = ROWTYPE_HEADER;

// Render list options
$patient_services_list->renderListOptions();

// Render list options (header, left)
$patient_services_list->ListOptions->render("header", "left", "", "block", $patient_services->TableVar, "patient_serviceslist");
?>
<?php if ($patient_services_list->id->Visible) { // id ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_services_list->id->headerCellClass() ?>"><div id="elh_patient_services_id" class="patient_services_id"><div class="ew-table-header-caption"><script id="tpc_patient_services_id" type="text/html"><?php echo $patient_services_list->id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_services_list->id->headerCellClass() ?>"><script id="tpc_patient_services_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->id) ?>', 1);"><div id="elh_patient_services_id" class="patient_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Reception->Visible) { // Reception ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_services_list->Reception->headerCellClass() ?>"><div id="elh_patient_services_Reception" class="patient_services_Reception"><div class="ew-table-header-caption"><script id="tpc_patient_services_Reception" type="text/html"><?php echo $patient_services_list->Reception->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_services_list->Reception->headerCellClass() ?>"><script id="tpc_patient_services_Reception" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Reception) ?>', 1);"><div id="elh_patient_services_Reception" class="patient_services_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Services->Visible) { // Services ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $patient_services_list->Services->headerCellClass() ?>"><div id="elh_patient_services_Services" class="patient_services_Services"><div class="ew-table-header-caption"><script id="tpc_patient_services_Services" type="text/html"><?php echo $patient_services_list->Services->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $patient_services_list->Services->headerCellClass() ?>"><script id="tpc_patient_services_Services" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Services) ?>', 1);"><div id="elh_patient_services_Services" class="patient_services_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Services->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Services->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Services->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->amount->Visible) { // amount ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $patient_services_list->amount->headerCellClass() ?>"><div id="elh_patient_services_amount" class="patient_services_amount"><div class="ew-table-header-caption"><script id="tpc_patient_services_amount" type="text/html"><?php echo $patient_services_list->amount->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $patient_services_list->amount->headerCellClass() ?>"><script id="tpc_patient_services_amount" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->amount) ?>', 1);"><div id="elh_patient_services_amount" class="patient_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->description->Visible) { // description ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->description) == "") { ?>
		<th data-name="description" class="<?php echo $patient_services_list->description->headerCellClass() ?>"><div id="elh_patient_services_description" class="patient_services_description"><div class="ew-table-header-caption"><script id="tpc_patient_services_description" type="text/html"><?php echo $patient_services_list->description->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $patient_services_list->description->headerCellClass() ?>"><script id="tpc_patient_services_description" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->description) ?>', 1);"><div id="elh_patient_services_description" class="patient_services_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->patient_type->Visible) { // patient_type ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $patient_services_list->patient_type->headerCellClass() ?>"><div id="elh_patient_services_patient_type" class="patient_services_patient_type"><div class="ew-table-header-caption"><script id="tpc_patient_services_patient_type" type="text/html"><?php echo $patient_services_list->patient_type->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $patient_services_list->patient_type->headerCellClass() ?>"><script id="tpc_patient_services_patient_type" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->patient_type) ?>', 1);"><div id="elh_patient_services_patient_type" class="patient_services_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->patient_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->patient_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->charged_date->Visible) { // charged_date ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $patient_services_list->charged_date->headerCellClass() ?>"><div id="elh_patient_services_charged_date" class="patient_services_charged_date"><div class="ew-table-header-caption"><script id="tpc_patient_services_charged_date" type="text/html"><?php echo $patient_services_list->charged_date->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $patient_services_list->charged_date->headerCellClass() ?>"><script id="tpc_patient_services_charged_date" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->charged_date) ?>', 1);"><div id="elh_patient_services_charged_date" class="patient_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->charged_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->charged_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->status->Visible) { // status ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_services_list->status->headerCellClass() ?>"><div id="elh_patient_services_status" class="patient_services_status"><div class="ew-table-header-caption"><script id="tpc_patient_services_status" type="text/html"><?php echo $patient_services_list->status->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_services_list->status->headerCellClass() ?>"><script id="tpc_patient_services_status" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->status) ?>', 1);"><div id="elh_patient_services_status" class="patient_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_services_list->mrnno->headerCellClass() ?>"><div id="elh_patient_services_mrnno" class="patient_services_mrnno"><div class="ew-table-header-caption"><script id="tpc_patient_services_mrnno" type="text/html"><?php echo $patient_services_list->mrnno->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_services_list->mrnno->headerCellClass() ?>"><script id="tpc_patient_services_mrnno" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->mrnno) ?>', 1);"><div id="elh_patient_services_mrnno" class="patient_services_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_services_list->PatientName->headerCellClass() ?>"><div id="elh_patient_services_PatientName" class="patient_services_PatientName"><div class="ew-table-header-caption"><script id="tpc_patient_services_PatientName" type="text/html"><?php echo $patient_services_list->PatientName->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_services_list->PatientName->headerCellClass() ?>"><script id="tpc_patient_services_PatientName" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->PatientName) ?>', 1);"><div id="elh_patient_services_PatientName" class="patient_services_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Age->Visible) { // Age ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_services_list->Age->headerCellClass() ?>"><div id="elh_patient_services_Age" class="patient_services_Age"><div class="ew-table-header-caption"><script id="tpc_patient_services_Age" type="text/html"><?php echo $patient_services_list->Age->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_services_list->Age->headerCellClass() ?>"><script id="tpc_patient_services_Age" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Age) ?>', 1);"><div id="elh_patient_services_Age" class="patient_services_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Gender->Visible) { // Gender ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_services_list->Gender->headerCellClass() ?>"><div id="elh_patient_services_Gender" class="patient_services_Gender"><div class="ew-table-header-caption"><script id="tpc_patient_services_Gender" type="text/html"><?php echo $patient_services_list->Gender->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_services_list->Gender->headerCellClass() ?>"><script id="tpc_patient_services_Gender" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Gender) ?>', 1);"><div id="elh_patient_services_Gender" class="patient_services_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Unit->Visible) { // Unit ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $patient_services_list->Unit->headerCellClass() ?>"><div id="elh_patient_services_Unit" class="patient_services_Unit"><div class="ew-table-header-caption"><script id="tpc_patient_services_Unit" type="text/html"><?php echo $patient_services_list->Unit->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $patient_services_list->Unit->headerCellClass() ?>"><script id="tpc_patient_services_Unit" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Unit) ?>', 1);"><div id="elh_patient_services_Unit" class="patient_services_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Quantity->Visible) { // Quantity ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $patient_services_list->Quantity->headerCellClass() ?>"><div id="elh_patient_services_Quantity" class="patient_services_Quantity"><div class="ew-table-header-caption"><script id="tpc_patient_services_Quantity" type="text/html"><?php echo $patient_services_list->Quantity->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $patient_services_list->Quantity->headerCellClass() ?>"><script id="tpc_patient_services_Quantity" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Quantity) ?>', 1);"><div id="elh_patient_services_Quantity" class="patient_services_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Discount->Visible) { // Discount ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $patient_services_list->Discount->headerCellClass() ?>"><div id="elh_patient_services_Discount" class="patient_services_Discount"><div class="ew-table-header-caption"><script id="tpc_patient_services_Discount" type="text/html"><?php echo $patient_services_list->Discount->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $patient_services_list->Discount->headerCellClass() ?>"><script id="tpc_patient_services_Discount" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Discount) ?>', 1);"><div id="elh_patient_services_Discount" class="patient_services_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Discount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Discount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->SubTotal->Visible) { // SubTotal ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $patient_services_list->SubTotal->headerCellClass() ?>"><div id="elh_patient_services_SubTotal" class="patient_services_SubTotal"><div class="ew-table-header-caption"><script id="tpc_patient_services_SubTotal" type="text/html"><?php echo $patient_services_list->SubTotal->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $patient_services_list->SubTotal->headerCellClass() ?>"><script id="tpc_patient_services_SubTotal" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->SubTotal) ?>', 1);"><div id="elh_patient_services_SubTotal" class="patient_services_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->SubTotal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->SubTotal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->ServiceSelect->Visible) { // ServiceSelect ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->ServiceSelect) == "") { ?>
		<th data-name="ServiceSelect" class="<?php echo $patient_services_list->ServiceSelect->headerCellClass() ?>"><div id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect"><div class="ew-table-header-caption"><script id="tpc_patient_services_ServiceSelect" type="text/html"><?php echo $patient_services_list->ServiceSelect->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ServiceSelect" class="<?php echo $patient_services_list->ServiceSelect->headerCellClass() ?>"><script id="tpc_patient_services_ServiceSelect" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->ServiceSelect) ?>', 1);"><div id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->ServiceSelect->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->ServiceSelect->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->ServiceSelect->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Aid->Visible) { // Aid ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $patient_services_list->Aid->headerCellClass() ?>"><div id="elh_patient_services_Aid" class="patient_services_Aid"><div class="ew-table-header-caption"><script id="tpc_patient_services_Aid" type="text/html"><?php echo $patient_services_list->Aid->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $patient_services_list->Aid->headerCellClass() ?>"><script id="tpc_patient_services_Aid" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Aid) ?>', 1);"><div id="elh_patient_services_Aid" class="patient_services_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Aid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Aid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Vid->Visible) { // Vid ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $patient_services_list->Vid->headerCellClass() ?>"><div id="elh_patient_services_Vid" class="patient_services_Vid"><div class="ew-table-header-caption"><script id="tpc_patient_services_Vid" type="text/html"><?php echo $patient_services_list->Vid->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $patient_services_list->Vid->headerCellClass() ?>"><script id="tpc_patient_services_Vid" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Vid) ?>', 1);"><div id="elh_patient_services_Vid" class="patient_services_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Vid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Vid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DrID->Visible) { // DrID ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $patient_services_list->DrID->headerCellClass() ?>"><div id="elh_patient_services_DrID" class="patient_services_DrID"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrID" type="text/html"><?php echo $patient_services_list->DrID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $patient_services_list->DrID->headerCellClass() ?>"><script id="tpc_patient_services_DrID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DrID) ?>', 1);"><div id="elh_patient_services_DrID" class="patient_services_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DrCODE->Visible) { // DrCODE ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $patient_services_list->DrCODE->headerCellClass() ?>"><div id="elh_patient_services_DrCODE" class="patient_services_DrCODE"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrCODE" type="text/html"><?php echo $patient_services_list->DrCODE->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $patient_services_list->DrCODE->headerCellClass() ?>"><script id="tpc_patient_services_DrCODE" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DrCODE) ?>', 1);"><div id="elh_patient_services_DrCODE" class="patient_services_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DrCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DrCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DrCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DrName->Visible) { // DrName ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $patient_services_list->DrName->headerCellClass() ?>"><div id="elh_patient_services_DrName" class="patient_services_DrName"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrName" type="text/html"><?php echo $patient_services_list->DrName->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $patient_services_list->DrName->headerCellClass() ?>"><script id="tpc_patient_services_DrName" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DrName) ?>', 1);"><div id="elh_patient_services_DrName" class="patient_services_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Department->Visible) { // Department ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $patient_services_list->Department->headerCellClass() ?>"><div id="elh_patient_services_Department" class="patient_services_Department"><div class="ew-table-header-caption"><script id="tpc_patient_services_Department" type="text/html"><?php echo $patient_services_list->Department->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $patient_services_list->Department->headerCellClass() ?>"><script id="tpc_patient_services_Department" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Department) ?>', 1);"><div id="elh_patient_services_Department" class="patient_services_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DrSharePres) == "") { ?>
		<th data-name="DrSharePres" class="<?php echo $patient_services_list->DrSharePres->headerCellClass() ?>"><div id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrSharePres" type="text/html"><?php echo $patient_services_list->DrSharePres->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePres" class="<?php echo $patient_services_list->DrSharePres->headerCellClass() ?>"><script id="tpc_patient_services_DrSharePres" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DrSharePres) ?>', 1);"><div id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DrSharePres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DrSharePres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->HospSharePres) == "") { ?>
		<th data-name="HospSharePres" class="<?php echo $patient_services_list->HospSharePres->headerCellClass() ?>"><div id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres"><div class="ew-table-header-caption"><script id="tpc_patient_services_HospSharePres" type="text/html"><?php echo $patient_services_list->HospSharePres->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePres" class="<?php echo $patient_services_list->HospSharePres->headerCellClass() ?>"><script id="tpc_patient_services_HospSharePres" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->HospSharePres) ?>', 1);"><div id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->HospSharePres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->HospSharePres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $patient_services_list->DrShareAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrShareAmount" type="text/html"><?php echo $patient_services_list->DrShareAmount->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $patient_services_list->DrShareAmount->headerCellClass() ?>"><script id="tpc_patient_services_DrShareAmount" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DrShareAmount) ?>', 1);"><div id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DrShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DrShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $patient_services_list->HospShareAmount->headerCellClass() ?>"><div id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount"><div class="ew-table-header-caption"><script id="tpc_patient_services_HospShareAmount" type="text/html"><?php echo $patient_services_list->HospShareAmount->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $patient_services_list->HospShareAmount->headerCellClass() ?>"><script id="tpc_patient_services_HospShareAmount" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->HospShareAmount) ?>', 1);"><div id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->HospShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->HospShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DrShareSettiledAmount) == "") { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $patient_services_list->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrShareSettiledAmount" type="text/html"><?php echo $patient_services_list->DrShareSettiledAmount->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $patient_services_list->DrShareSettiledAmount->headerCellClass() ?>"><script id="tpc_patient_services_DrShareSettiledAmount" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DrShareSettiledAmount) ?>', 1);"><div id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DrShareSettiledAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DrShareSettiledAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DrShareSettledId) == "") { ?>
		<th data-name="DrShareSettledId" class="<?php echo $patient_services_list->DrShareSettledId->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrShareSettledId" type="text/html"><?php echo $patient_services_list->DrShareSettledId->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettledId" class="<?php echo $patient_services_list->DrShareSettledId->headerCellClass() ?>"><script id="tpc_patient_services_DrShareSettledId" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DrShareSettledId) ?>', 1);"><div id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DrShareSettledId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DrShareSettledId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DrShareSettiledStatus) == "") { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $patient_services_list->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus"><div class="ew-table-header-caption"><script id="tpc_patient_services_DrShareSettiledStatus" type="text/html"><?php echo $patient_services_list->DrShareSettiledStatus->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $patient_services_list->DrShareSettiledStatus->headerCellClass() ?>"><script id="tpc_patient_services_DrShareSettiledStatus" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DrShareSettiledStatus) ?>', 1);"><div id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DrShareSettiledStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DrShareSettiledStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->invoiceId->Visible) { // invoiceId ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $patient_services_list->invoiceId->headerCellClass() ?>"><div id="elh_patient_services_invoiceId" class="patient_services_invoiceId"><div class="ew-table-header-caption"><script id="tpc_patient_services_invoiceId" type="text/html"><?php echo $patient_services_list->invoiceId->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $patient_services_list->invoiceId->headerCellClass() ?>"><script id="tpc_patient_services_invoiceId" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->invoiceId) ?>', 1);"><div id="elh_patient_services_invoiceId" class="patient_services_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->invoiceId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->invoiceId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $patient_services_list->invoiceAmount->headerCellClass() ?>"><div id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount"><div class="ew-table-header-caption"><script id="tpc_patient_services_invoiceAmount" type="text/html"><?php echo $patient_services_list->invoiceAmount->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $patient_services_list->invoiceAmount->headerCellClass() ?>"><script id="tpc_patient_services_invoiceAmount" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->invoiceAmount) ?>', 1);"><div id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->invoiceAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->invoiceAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $patient_services_list->invoiceStatus->headerCellClass() ?>"><div id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus"><div class="ew-table-header-caption"><script id="tpc_patient_services_invoiceStatus" type="text/html"><?php echo $patient_services_list->invoiceStatus->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $patient_services_list->invoiceStatus->headerCellClass() ?>"><script id="tpc_patient_services_invoiceStatus" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->invoiceStatus) ?>', 1);"><div id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->invoiceStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->invoiceStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->invoiceStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $patient_services_list->modeOfPayment->headerCellClass() ?>"><div id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment"><div class="ew-table-header-caption"><script id="tpc_patient_services_modeOfPayment" type="text/html"><?php echo $patient_services_list->modeOfPayment->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $patient_services_list->modeOfPayment->headerCellClass() ?>"><script id="tpc_patient_services_modeOfPayment" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->modeOfPayment) ?>', 1);"><div id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->modeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->modeOfPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->modeOfPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->HospID->Visible) { // HospID ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_services_list->HospID->headerCellClass() ?>"><div id="elh_patient_services_HospID" class="patient_services_HospID"><div class="ew-table-header-caption"><script id="tpc_patient_services_HospID" type="text/html"><?php echo $patient_services_list->HospID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_services_list->HospID->headerCellClass() ?>"><script id="tpc_patient_services_HospID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->HospID) ?>', 1);"><div id="elh_patient_services_HospID" class="patient_services_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $patient_services_list->RIDNO->headerCellClass() ?>"><div id="elh_patient_services_RIDNO" class="patient_services_RIDNO"><div class="ew-table-header-caption"><script id="tpc_patient_services_RIDNO" type="text/html"><?php echo $patient_services_list->RIDNO->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $patient_services_list->RIDNO->headerCellClass() ?>"><script id="tpc_patient_services_RIDNO" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->RIDNO) ?>', 1);"><div id="elh_patient_services_RIDNO" class="patient_services_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->TidNo->Visible) { // TidNo ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $patient_services_list->TidNo->headerCellClass() ?>"><div id="elh_patient_services_TidNo" class="patient_services_TidNo"><div class="ew-table-header-caption"><script id="tpc_patient_services_TidNo" type="text/html"><?php echo $patient_services_list->TidNo->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $patient_services_list->TidNo->headerCellClass() ?>"><script id="tpc_patient_services_TidNo" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->TidNo) ?>', 1);"><div id="elh_patient_services_TidNo" class="patient_services_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DiscountCategory) == "") { ?>
		<th data-name="DiscountCategory" class="<?php echo $patient_services_list->DiscountCategory->headerCellClass() ?>"><div id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory"><div class="ew-table-header-caption"><script id="tpc_patient_services_DiscountCategory" type="text/html"><?php echo $patient_services_list->DiscountCategory->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountCategory" class="<?php echo $patient_services_list->DiscountCategory->headerCellClass() ?>"><script id="tpc_patient_services_DiscountCategory" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DiscountCategory) ?>', 1);"><div id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DiscountCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DiscountCategory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DiscountCategory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->sid->Visible) { // sid ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $patient_services_list->sid->headerCellClass() ?>"><div id="elh_patient_services_sid" class="patient_services_sid"><div class="ew-table-header-caption"><script id="tpc_patient_services_sid" type="text/html"><?php echo $patient_services_list->sid->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $patient_services_list->sid->headerCellClass() ?>"><script id="tpc_patient_services_sid" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->sid) ?>', 1);"><div id="elh_patient_services_sid" class="patient_services_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->sid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->sid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->ItemCode->Visible) { // ItemCode ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $patient_services_list->ItemCode->headerCellClass() ?>"><div id="elh_patient_services_ItemCode" class="patient_services_ItemCode"><div class="ew-table-header-caption"><script id="tpc_patient_services_ItemCode" type="text/html"><?php echo $patient_services_list->ItemCode->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $patient_services_list->ItemCode->headerCellClass() ?>"><script id="tpc_patient_services_ItemCode" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->ItemCode) ?>', 1);"><div id="elh_patient_services_ItemCode" class="patient_services_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->ItemCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->ItemCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->ItemCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $patient_services_list->TestSubCd->headerCellClass() ?>"><div id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd"><div class="ew-table-header-caption"><script id="tpc_patient_services_TestSubCd" type="text/html"><?php echo $patient_services_list->TestSubCd->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $patient_services_list->TestSubCd->headerCellClass() ?>"><script id="tpc_patient_services_TestSubCd" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->TestSubCd) ?>', 1);"><div id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->TestSubCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->TestSubCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DEptCd->Visible) { // DEptCd ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $patient_services_list->DEptCd->headerCellClass() ?>"><div id="elh_patient_services_DEptCd" class="patient_services_DEptCd"><div class="ew-table-header-caption"><script id="tpc_patient_services_DEptCd" type="text/html"><?php echo $patient_services_list->DEptCd->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $patient_services_list->DEptCd->headerCellClass() ?>"><script id="tpc_patient_services_DEptCd" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DEptCd) ?>', 1);"><div id="elh_patient_services_DEptCd" class="patient_services_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DEptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DEptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->ProfCd->Visible) { // ProfCd ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $patient_services_list->ProfCd->headerCellClass() ?>"><div id="elh_patient_services_ProfCd" class="patient_services_ProfCd"><div class="ew-table-header-caption"><script id="tpc_patient_services_ProfCd" type="text/html"><?php echo $patient_services_list->ProfCd->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $patient_services_list->ProfCd->headerCellClass() ?>"><script id="tpc_patient_services_ProfCd" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->ProfCd) ?>', 1);"><div id="elh_patient_services_ProfCd" class="patient_services_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->ProfCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->ProfCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->ProfCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Comments->Visible) { // Comments ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $patient_services_list->Comments->headerCellClass() ?>"><div id="elh_patient_services_Comments" class="patient_services_Comments"><div class="ew-table-header-caption"><script id="tpc_patient_services_Comments" type="text/html"><?php echo $patient_services_list->Comments->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $patient_services_list->Comments->headerCellClass() ?>"><script id="tpc_patient_services_Comments" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Comments) ?>', 1);"><div id="elh_patient_services_Comments" class="patient_services_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Comments->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Comments->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Comments->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Method->Visible) { // Method ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $patient_services_list->Method->headerCellClass() ?>"><div id="elh_patient_services_Method" class="patient_services_Method"><div class="ew-table-header-caption"><script id="tpc_patient_services_Method" type="text/html"><?php echo $patient_services_list->Method->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $patient_services_list->Method->headerCellClass() ?>"><script id="tpc_patient_services_Method" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Method) ?>', 1);"><div id="elh_patient_services_Method" class="patient_services_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Specimen->Visible) { // Specimen ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $patient_services_list->Specimen->headerCellClass() ?>"><div id="elh_patient_services_Specimen" class="patient_services_Specimen"><div class="ew-table-header-caption"><script id="tpc_patient_services_Specimen" type="text/html"><?php echo $patient_services_list->Specimen->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $patient_services_list->Specimen->headerCellClass() ?>"><script id="tpc_patient_services_Specimen" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Specimen) ?>', 1);"><div id="elh_patient_services_Specimen" class="patient_services_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Specimen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Specimen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Specimen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Abnormal->Visible) { // Abnormal ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $patient_services_list->Abnormal->headerCellClass() ?>"><div id="elh_patient_services_Abnormal" class="patient_services_Abnormal"><div class="ew-table-header-caption"><script id="tpc_patient_services_Abnormal" type="text/html"><?php echo $patient_services_list->Abnormal->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $patient_services_list->Abnormal->headerCellClass() ?>"><script id="tpc_patient_services_Abnormal" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Abnormal) ?>', 1);"><div id="elh_patient_services_Abnormal" class="patient_services_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Abnormal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Abnormal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Abnormal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->TestUnit->Visible) { // TestUnit ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $patient_services_list->TestUnit->headerCellClass() ?>"><div id="elh_patient_services_TestUnit" class="patient_services_TestUnit"><div class="ew-table-header-caption"><script id="tpc_patient_services_TestUnit" type="text/html"><?php echo $patient_services_list->TestUnit->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $patient_services_list->TestUnit->headerCellClass() ?>"><script id="tpc_patient_services_TestUnit" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->TestUnit) ?>', 1);"><div id="elh_patient_services_TestUnit" class="patient_services_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->TestUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->TestUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->TestUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $patient_services_list->LOWHIGH->headerCellClass() ?>"><div id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH"><div class="ew-table-header-caption"><script id="tpc_patient_services_LOWHIGH" type="text/html"><?php echo $patient_services_list->LOWHIGH->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $patient_services_list->LOWHIGH->headerCellClass() ?>"><script id="tpc_patient_services_LOWHIGH" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->LOWHIGH) ?>', 1);"><div id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->LOWHIGH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->LOWHIGH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->LOWHIGH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Branch->Visible) { // Branch ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $patient_services_list->Branch->headerCellClass() ?>"><div id="elh_patient_services_Branch" class="patient_services_Branch"><div class="ew-table-header-caption"><script id="tpc_patient_services_Branch" type="text/html"><?php echo $patient_services_list->Branch->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $patient_services_list->Branch->headerCellClass() ?>"><script id="tpc_patient_services_Branch" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Branch) ?>', 1);"><div id="elh_patient_services_Branch" class="patient_services_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Branch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Branch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Branch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Dispatch->Visible) { // Dispatch ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $patient_services_list->Dispatch->headerCellClass() ?>"><div id="elh_patient_services_Dispatch" class="patient_services_Dispatch"><div class="ew-table-header-caption"><script id="tpc_patient_services_Dispatch" type="text/html"><?php echo $patient_services_list->Dispatch->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $patient_services_list->Dispatch->headerCellClass() ?>"><script id="tpc_patient_services_Dispatch" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Dispatch) ?>', 1);"><div id="elh_patient_services_Dispatch" class="patient_services_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Dispatch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Dispatch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Dispatch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Pic1->Visible) { // Pic1 ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $patient_services_list->Pic1->headerCellClass() ?>"><div id="elh_patient_services_Pic1" class="patient_services_Pic1"><div class="ew-table-header-caption"><script id="tpc_patient_services_Pic1" type="text/html"><?php echo $patient_services_list->Pic1->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $patient_services_list->Pic1->headerCellClass() ?>"><script id="tpc_patient_services_Pic1" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Pic1) ?>', 1);"><div id="elh_patient_services_Pic1" class="patient_services_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Pic1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Pic1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Pic1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Pic2->Visible) { // Pic2 ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $patient_services_list->Pic2->headerCellClass() ?>"><div id="elh_patient_services_Pic2" class="patient_services_Pic2"><div class="ew-table-header-caption"><script id="tpc_patient_services_Pic2" type="text/html"><?php echo $patient_services_list->Pic2->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $patient_services_list->Pic2->headerCellClass() ?>"><script id="tpc_patient_services_Pic2" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Pic2) ?>', 1);"><div id="elh_patient_services_Pic2" class="patient_services_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Pic2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Pic2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Pic2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->GraphPath->Visible) { // GraphPath ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $patient_services_list->GraphPath->headerCellClass() ?>"><div id="elh_patient_services_GraphPath" class="patient_services_GraphPath"><div class="ew-table-header-caption"><script id="tpc_patient_services_GraphPath" type="text/html"><?php echo $patient_services_list->GraphPath->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $patient_services_list->GraphPath->headerCellClass() ?>"><script id="tpc_patient_services_GraphPath" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->GraphPath) ?>', 1);"><div id="elh_patient_services_GraphPath" class="patient_services_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->GraphPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->GraphPath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->GraphPath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->MachineCD->Visible) { // MachineCD ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $patient_services_list->MachineCD->headerCellClass() ?>"><div id="elh_patient_services_MachineCD" class="patient_services_MachineCD"><div class="ew-table-header-caption"><script id="tpc_patient_services_MachineCD" type="text/html"><?php echo $patient_services_list->MachineCD->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $patient_services_list->MachineCD->headerCellClass() ?>"><script id="tpc_patient_services_MachineCD" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->MachineCD) ?>', 1);"><div id="elh_patient_services_MachineCD" class="patient_services_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->MachineCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->MachineCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->MachineCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->TestCancel->Visible) { // TestCancel ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $patient_services_list->TestCancel->headerCellClass() ?>"><div id="elh_patient_services_TestCancel" class="patient_services_TestCancel"><div class="ew-table-header-caption"><script id="tpc_patient_services_TestCancel" type="text/html"><?php echo $patient_services_list->TestCancel->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $patient_services_list->TestCancel->headerCellClass() ?>"><script id="tpc_patient_services_TestCancel" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->TestCancel) ?>', 1);"><div id="elh_patient_services_TestCancel" class="patient_services_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->TestCancel->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->TestCancel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->TestCancel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->OutSource->Visible) { // OutSource ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $patient_services_list->OutSource->headerCellClass() ?>"><div id="elh_patient_services_OutSource" class="patient_services_OutSource"><div class="ew-table-header-caption"><script id="tpc_patient_services_OutSource" type="text/html"><?php echo $patient_services_list->OutSource->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $patient_services_list->OutSource->headerCellClass() ?>"><script id="tpc_patient_services_OutSource" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->OutSource) ?>', 1);"><div id="elh_patient_services_OutSource" class="patient_services_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->OutSource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->OutSource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->OutSource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Printed->Visible) { // Printed ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $patient_services_list->Printed->headerCellClass() ?>"><div id="elh_patient_services_Printed" class="patient_services_Printed"><div class="ew-table-header-caption"><script id="tpc_patient_services_Printed" type="text/html"><?php echo $patient_services_list->Printed->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $patient_services_list->Printed->headerCellClass() ?>"><script id="tpc_patient_services_Printed" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Printed) ?>', 1);"><div id="elh_patient_services_Printed" class="patient_services_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Printed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Printed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Printed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->PrintBy->Visible) { // PrintBy ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $patient_services_list->PrintBy->headerCellClass() ?>"><div id="elh_patient_services_PrintBy" class="patient_services_PrintBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_PrintBy" type="text/html"><?php echo $patient_services_list->PrintBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $patient_services_list->PrintBy->headerCellClass() ?>"><script id="tpc_patient_services_PrintBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->PrintBy) ?>', 1);"><div id="elh_patient_services_PrintBy" class="patient_services_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->PrintBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->PrintBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->PrintBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->PrintDate->Visible) { // PrintDate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $patient_services_list->PrintDate->headerCellClass() ?>"><div id="elh_patient_services_PrintDate" class="patient_services_PrintDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_PrintDate" type="text/html"><?php echo $patient_services_list->PrintDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $patient_services_list->PrintDate->headerCellClass() ?>"><script id="tpc_patient_services_PrintDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->PrintDate) ?>', 1);"><div id="elh_patient_services_PrintDate" class="patient_services_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->PrintDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->PrintDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->BillingDate->Visible) { // BillingDate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->BillingDate) == "") { ?>
		<th data-name="BillingDate" class="<?php echo $patient_services_list->BillingDate->headerCellClass() ?>"><div id="elh_patient_services_BillingDate" class="patient_services_BillingDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_BillingDate" type="text/html"><?php echo $patient_services_list->BillingDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillingDate" class="<?php echo $patient_services_list->BillingDate->headerCellClass() ?>"><script id="tpc_patient_services_BillingDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->BillingDate) ?>', 1);"><div id="elh_patient_services_BillingDate" class="patient_services_BillingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->BillingDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->BillingDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->BilledBy->Visible) { // BilledBy ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->BilledBy) == "") { ?>
		<th data-name="BilledBy" class="<?php echo $patient_services_list->BilledBy->headerCellClass() ?>"><div id="elh_patient_services_BilledBy" class="patient_services_BilledBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_BilledBy" type="text/html"><?php echo $patient_services_list->BilledBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="BilledBy" class="<?php echo $patient_services_list->BilledBy->headerCellClass() ?>"><script id="tpc_patient_services_BilledBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->BilledBy) ?>', 1);"><div id="elh_patient_services_BilledBy" class="patient_services_BilledBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->BilledBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->BilledBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->BilledBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Resulted->Visible) { // Resulted ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $patient_services_list->Resulted->headerCellClass() ?>"><div id="elh_patient_services_Resulted" class="patient_services_Resulted"><div class="ew-table-header-caption"><script id="tpc_patient_services_Resulted" type="text/html"><?php echo $patient_services_list->Resulted->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $patient_services_list->Resulted->headerCellClass() ?>"><script id="tpc_patient_services_Resulted" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Resulted) ?>', 1);"><div id="elh_patient_services_Resulted" class="patient_services_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Resulted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Resulted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Resulted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->ResultDate->Visible) { // ResultDate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $patient_services_list->ResultDate->headerCellClass() ?>"><div id="elh_patient_services_ResultDate" class="patient_services_ResultDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_ResultDate" type="text/html"><?php echo $patient_services_list->ResultDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $patient_services_list->ResultDate->headerCellClass() ?>"><script id="tpc_patient_services_ResultDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->ResultDate) ?>', 1);"><div id="elh_patient_services_ResultDate" class="patient_services_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_services_list->ResultedBy->headerCellClass() ?>"><div id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_ResultedBy" type="text/html"><?php echo $patient_services_list->ResultedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_services_list->ResultedBy->headerCellClass() ?>"><script id="tpc_patient_services_ResultedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->ResultedBy) ?>', 1);"><div id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->ResultedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->ResultedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->ResultedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->SampleDate->Visible) { // SampleDate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $patient_services_list->SampleDate->headerCellClass() ?>"><div id="elh_patient_services_SampleDate" class="patient_services_SampleDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_SampleDate" type="text/html"><?php echo $patient_services_list->SampleDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $patient_services_list->SampleDate->headerCellClass() ?>"><script id="tpc_patient_services_SampleDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->SampleDate) ?>', 1);"><div id="elh_patient_services_SampleDate" class="patient_services_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->SampleDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->SampleDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->SampleUser->Visible) { // SampleUser ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $patient_services_list->SampleUser->headerCellClass() ?>"><div id="elh_patient_services_SampleUser" class="patient_services_SampleUser"><div class="ew-table-header-caption"><script id="tpc_patient_services_SampleUser" type="text/html"><?php echo $patient_services_list->SampleUser->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $patient_services_list->SampleUser->headerCellClass() ?>"><script id="tpc_patient_services_SampleUser" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->SampleUser) ?>', 1);"><div id="elh_patient_services_SampleUser" class="patient_services_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->SampleUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->SampleUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->SampleUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Sampled->Visible) { // Sampled ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Sampled) == "") { ?>
		<th data-name="Sampled" class="<?php echo $patient_services_list->Sampled->headerCellClass() ?>"><div id="elh_patient_services_Sampled" class="patient_services_Sampled"><div class="ew-table-header-caption"><script id="tpc_patient_services_Sampled" type="text/html"><?php echo $patient_services_list->Sampled->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Sampled" class="<?php echo $patient_services_list->Sampled->headerCellClass() ?>"><script id="tpc_patient_services_Sampled" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Sampled) ?>', 1);"><div id="elh_patient_services_Sampled" class="patient_services_Sampled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Sampled->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Sampled->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Sampled->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $patient_services_list->ReceivedDate->headerCellClass() ?>"><div id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_ReceivedDate" type="text/html"><?php echo $patient_services_list->ReceivedDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $patient_services_list->ReceivedDate->headerCellClass() ?>"><script id="tpc_patient_services_ReceivedDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->ReceivedDate) ?>', 1);"><div id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->ReceivedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->ReceivedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $patient_services_list->ReceivedUser->headerCellClass() ?>"><div id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser"><div class="ew-table-header-caption"><script id="tpc_patient_services_ReceivedUser" type="text/html"><?php echo $patient_services_list->ReceivedUser->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $patient_services_list->ReceivedUser->headerCellClass() ?>"><script id="tpc_patient_services_ReceivedUser" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->ReceivedUser) ?>', 1);"><div id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->ReceivedUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->ReceivedUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->ReceivedUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Recevied->Visible) { // Recevied ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Recevied) == "") { ?>
		<th data-name="Recevied" class="<?php echo $patient_services_list->Recevied->headerCellClass() ?>"><div id="elh_patient_services_Recevied" class="patient_services_Recevied"><div class="ew-table-header-caption"><script id="tpc_patient_services_Recevied" type="text/html"><?php echo $patient_services_list->Recevied->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Recevied" class="<?php echo $patient_services_list->Recevied->headerCellClass() ?>"><script id="tpc_patient_services_Recevied" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Recevied) ?>', 1);"><div id="elh_patient_services_Recevied" class="patient_services_Recevied">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Recevied->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Recevied->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Recevied->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $patient_services_list->DeptRecvDate->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_DeptRecvDate" type="text/html"><?php echo $patient_services_list->DeptRecvDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $patient_services_list->DeptRecvDate->headerCellClass() ?>"><script id="tpc_patient_services_DeptRecvDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DeptRecvDate) ?>', 1);"><div id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DeptRecvDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DeptRecvDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $patient_services_list->DeptRecvUser->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser"><div class="ew-table-header-caption"><script id="tpc_patient_services_DeptRecvUser" type="text/html"><?php echo $patient_services_list->DeptRecvUser->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $patient_services_list->DeptRecvUser->headerCellClass() ?>"><script id="tpc_patient_services_DeptRecvUser" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DeptRecvUser) ?>', 1);"><div id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DeptRecvUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DeptRecvUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DeptRecvUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->DeptRecived) == "") { ?>
		<th data-name="DeptRecived" class="<?php echo $patient_services_list->DeptRecived->headerCellClass() ?>"><div id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived"><div class="ew-table-header-caption"><script id="tpc_patient_services_DeptRecived" type="text/html"><?php echo $patient_services_list->DeptRecived->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecived" class="<?php echo $patient_services_list->DeptRecived->headerCellClass() ?>"><script id="tpc_patient_services_DeptRecived" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->DeptRecived) ?>', 1);"><div id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->DeptRecived->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->DeptRecived->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->DeptRecived->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $patient_services_list->SAuthDate->headerCellClass() ?>"><div id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_SAuthDate" type="text/html"><?php echo $patient_services_list->SAuthDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $patient_services_list->SAuthDate->headerCellClass() ?>"><script id="tpc_patient_services_SAuthDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->SAuthDate) ?>', 1);"><div id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->SAuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->SAuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $patient_services_list->SAuthBy->headerCellClass() ?>"><div id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_SAuthBy" type="text/html"><?php echo $patient_services_list->SAuthBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $patient_services_list->SAuthBy->headerCellClass() ?>"><script id="tpc_patient_services_SAuthBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->SAuthBy) ?>', 1);"><div id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->SAuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->SAuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->SAuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->SAuthendicate) == "") { ?>
		<th data-name="SAuthendicate" class="<?php echo $patient_services_list->SAuthendicate->headerCellClass() ?>"><div id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate"><div class="ew-table-header-caption"><script id="tpc_patient_services_SAuthendicate" type="text/html"><?php echo $patient_services_list->SAuthendicate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthendicate" class="<?php echo $patient_services_list->SAuthendicate->headerCellClass() ?>"><script id="tpc_patient_services_SAuthendicate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->SAuthendicate) ?>', 1);"><div id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->SAuthendicate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->SAuthendicate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->SAuthendicate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->AuthDate->Visible) { // AuthDate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $patient_services_list->AuthDate->headerCellClass() ?>"><div id="elh_patient_services_AuthDate" class="patient_services_AuthDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_AuthDate" type="text/html"><?php echo $patient_services_list->AuthDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $patient_services_list->AuthDate->headerCellClass() ?>"><script id="tpc_patient_services_AuthDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->AuthDate) ?>', 1);"><div id="elh_patient_services_AuthDate" class="patient_services_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->AuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->AuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->AuthBy->Visible) { // AuthBy ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $patient_services_list->AuthBy->headerCellClass() ?>"><div id="elh_patient_services_AuthBy" class="patient_services_AuthBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_AuthBy" type="text/html"><?php echo $patient_services_list->AuthBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $patient_services_list->AuthBy->headerCellClass() ?>"><script id="tpc_patient_services_AuthBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->AuthBy) ?>', 1);"><div id="elh_patient_services_AuthBy" class="patient_services_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->AuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->AuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->AuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Authencate->Visible) { // Authencate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Authencate) == "") { ?>
		<th data-name="Authencate" class="<?php echo $patient_services_list->Authencate->headerCellClass() ?>"><div id="elh_patient_services_Authencate" class="patient_services_Authencate"><div class="ew-table-header-caption"><script id="tpc_patient_services_Authencate" type="text/html"><?php echo $patient_services_list->Authencate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Authencate" class="<?php echo $patient_services_list->Authencate->headerCellClass() ?>"><script id="tpc_patient_services_Authencate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Authencate) ?>', 1);"><div id="elh_patient_services_Authencate" class="patient_services_Authencate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Authencate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Authencate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Authencate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->EditDate->Visible) { // EditDate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $patient_services_list->EditDate->headerCellClass() ?>"><div id="elh_patient_services_EditDate" class="patient_services_EditDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_EditDate" type="text/html"><?php echo $patient_services_list->EditDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $patient_services_list->EditDate->headerCellClass() ?>"><script id="tpc_patient_services_EditDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->EditDate) ?>', 1);"><div id="elh_patient_services_EditDate" class="patient_services_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->EditDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->EditDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->EditBy->Visible) { // EditBy ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->EditBy) == "") { ?>
		<th data-name="EditBy" class="<?php echo $patient_services_list->EditBy->headerCellClass() ?>"><div id="elh_patient_services_EditBy" class="patient_services_EditBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_EditBy" type="text/html"><?php echo $patient_services_list->EditBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="EditBy" class="<?php echo $patient_services_list->EditBy->headerCellClass() ?>"><script id="tpc_patient_services_EditBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->EditBy) ?>', 1);"><div id="elh_patient_services_EditBy" class="patient_services_EditBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->EditBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->EditBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->EditBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Editted->Visible) { // Editted ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Editted) == "") { ?>
		<th data-name="Editted" class="<?php echo $patient_services_list->Editted->headerCellClass() ?>"><div id="elh_patient_services_Editted" class="patient_services_Editted"><div class="ew-table-header-caption"><script id="tpc_patient_services_Editted" type="text/html"><?php echo $patient_services_list->Editted->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Editted" class="<?php echo $patient_services_list->Editted->headerCellClass() ?>"><script id="tpc_patient_services_Editted" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Editted) ?>', 1);"><div id="elh_patient_services_Editted" class="patient_services_Editted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Editted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Editted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Editted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->PatID->Visible) { // PatID ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_services_list->PatID->headerCellClass() ?>"><div id="elh_patient_services_PatID" class="patient_services_PatID"><div class="ew-table-header-caption"><script id="tpc_patient_services_PatID" type="text/html"><?php echo $patient_services_list->PatID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_services_list->PatID->headerCellClass() ?>"><script id="tpc_patient_services_PatID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->PatID) ?>', 1);"><div id="elh_patient_services_PatID" class="patient_services_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_services_list->PatientId->headerCellClass() ?>"><div id="elh_patient_services_PatientId" class="patient_services_PatientId"><div class="ew-table-header-caption"><script id="tpc_patient_services_PatientId" type="text/html"><?php echo $patient_services_list->PatientId->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_services_list->PatientId->headerCellClass() ?>"><script id="tpc_patient_services_PatientId" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->PatientId) ?>', 1);"><div id="elh_patient_services_PatientId" class="patient_services_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Mobile->Visible) { // Mobile ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $patient_services_list->Mobile->headerCellClass() ?>"><div id="elh_patient_services_Mobile" class="patient_services_Mobile"><div class="ew-table-header-caption"><script id="tpc_patient_services_Mobile" type="text/html"><?php echo $patient_services_list->Mobile->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $patient_services_list->Mobile->headerCellClass() ?>"><script id="tpc_patient_services_Mobile" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Mobile) ?>', 1);"><div id="elh_patient_services_Mobile" class="patient_services_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->CId->Visible) { // CId ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $patient_services_list->CId->headerCellClass() ?>"><div id="elh_patient_services_CId" class="patient_services_CId"><div class="ew-table-header-caption"><script id="tpc_patient_services_CId" type="text/html"><?php echo $patient_services_list->CId->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $patient_services_list->CId->headerCellClass() ?>"><script id="tpc_patient_services_CId" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->CId) ?>', 1);"><div id="elh_patient_services_CId" class="patient_services_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->CId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->CId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Order->Visible) { // Order ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $patient_services_list->Order->headerCellClass() ?>"><div id="elh_patient_services_Order" class="patient_services_Order"><div class="ew-table-header-caption"><script id="tpc_patient_services_Order" type="text/html"><?php echo $patient_services_list->Order->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $patient_services_list->Order->headerCellClass() ?>"><script id="tpc_patient_services_Order" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Order) ?>', 1);"><div id="elh_patient_services_Order" class="patient_services_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->ResType->Visible) { // ResType ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $patient_services_list->ResType->headerCellClass() ?>"><div id="elh_patient_services_ResType" class="patient_services_ResType"><div class="ew-table-header-caption"><script id="tpc_patient_services_ResType" type="text/html"><?php echo $patient_services_list->ResType->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $patient_services_list->ResType->headerCellClass() ?>"><script id="tpc_patient_services_ResType" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->ResType) ?>', 1);"><div id="elh_patient_services_ResType" class="patient_services_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->ResType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->ResType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Sample->Visible) { // Sample ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $patient_services_list->Sample->headerCellClass() ?>"><div id="elh_patient_services_Sample" class="patient_services_Sample"><div class="ew-table-header-caption"><script id="tpc_patient_services_Sample" type="text/html"><?php echo $patient_services_list->Sample->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $patient_services_list->Sample->headerCellClass() ?>"><script id="tpc_patient_services_Sample" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Sample) ?>', 1);"><div id="elh_patient_services_Sample" class="patient_services_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Sample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Sample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->NoD->Visible) { // NoD ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $patient_services_list->NoD->headerCellClass() ?>"><div id="elh_patient_services_NoD" class="patient_services_NoD"><div class="ew-table-header-caption"><script id="tpc_patient_services_NoD" type="text/html"><?php echo $patient_services_list->NoD->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $patient_services_list->NoD->headerCellClass() ?>"><script id="tpc_patient_services_NoD" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->NoD) ?>', 1);"><div id="elh_patient_services_NoD" class="patient_services_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->NoD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->NoD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->BillOrder->Visible) { // BillOrder ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $patient_services_list->BillOrder->headerCellClass() ?>"><div id="elh_patient_services_BillOrder" class="patient_services_BillOrder"><div class="ew-table-header-caption"><script id="tpc_patient_services_BillOrder" type="text/html"><?php echo $patient_services_list->BillOrder->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $patient_services_list->BillOrder->headerCellClass() ?>"><script id="tpc_patient_services_BillOrder" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->BillOrder) ?>', 1);"><div id="elh_patient_services_BillOrder" class="patient_services_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->BillOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->BillOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Inactive->Visible) { // Inactive ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $patient_services_list->Inactive->headerCellClass() ?>"><div id="elh_patient_services_Inactive" class="patient_services_Inactive"><div class="ew-table-header-caption"><script id="tpc_patient_services_Inactive" type="text/html"><?php echo $patient_services_list->Inactive->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $patient_services_list->Inactive->headerCellClass() ?>"><script id="tpc_patient_services_Inactive" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Inactive) ?>', 1);"><div id="elh_patient_services_Inactive" class="patient_services_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Inactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Inactive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Inactive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->CollSample->Visible) { // CollSample ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $patient_services_list->CollSample->headerCellClass() ?>"><div id="elh_patient_services_CollSample" class="patient_services_CollSample"><div class="ew-table-header-caption"><script id="tpc_patient_services_CollSample" type="text/html"><?php echo $patient_services_list->CollSample->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $patient_services_list->CollSample->headerCellClass() ?>"><script id="tpc_patient_services_CollSample" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->CollSample) ?>', 1);"><div id="elh_patient_services_CollSample" class="patient_services_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->CollSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->CollSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->TestType->Visible) { // TestType ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $patient_services_list->TestType->headerCellClass() ?>"><div id="elh_patient_services_TestType" class="patient_services_TestType"><div class="ew-table-header-caption"><script id="tpc_patient_services_TestType" type="text/html"><?php echo $patient_services_list->TestType->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $patient_services_list->TestType->headerCellClass() ?>"><script id="tpc_patient_services_TestType" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->TestType) ?>', 1);"><div id="elh_patient_services_TestType" class="patient_services_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->TestType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->TestType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->TestType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Repeated->Visible) { // Repeated ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $patient_services_list->Repeated->headerCellClass() ?>"><div id="elh_patient_services_Repeated" class="patient_services_Repeated"><div class="ew-table-header-caption"><script id="tpc_patient_services_Repeated" type="text/html"><?php echo $patient_services_list->Repeated->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $patient_services_list->Repeated->headerCellClass() ?>"><script id="tpc_patient_services_Repeated" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Repeated) ?>', 1);"><div id="elh_patient_services_Repeated" class="patient_services_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Repeated->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Repeated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Repeated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->RepeatedBy) == "") { ?>
		<th data-name="RepeatedBy" class="<?php echo $patient_services_list->RepeatedBy->headerCellClass() ?>"><div id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy"><div class="ew-table-header-caption"><script id="tpc_patient_services_RepeatedBy" type="text/html"><?php echo $patient_services_list->RepeatedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedBy" class="<?php echo $patient_services_list->RepeatedBy->headerCellClass() ?>"><script id="tpc_patient_services_RepeatedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->RepeatedBy) ?>', 1);"><div id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->RepeatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->RepeatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->RepeatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->RepeatedDate) == "") { ?>
		<th data-name="RepeatedDate" class="<?php echo $patient_services_list->RepeatedDate->headerCellClass() ?>"><div id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate"><div class="ew-table-header-caption"><script id="tpc_patient_services_RepeatedDate" type="text/html"><?php echo $patient_services_list->RepeatedDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedDate" class="<?php echo $patient_services_list->RepeatedDate->headerCellClass() ?>"><script id="tpc_patient_services_RepeatedDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->RepeatedDate) ?>', 1);"><div id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->RepeatedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->RepeatedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->serviceID->Visible) { // serviceID ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->serviceID) == "") { ?>
		<th data-name="serviceID" class="<?php echo $patient_services_list->serviceID->headerCellClass() ?>"><div id="elh_patient_services_serviceID" class="patient_services_serviceID"><div class="ew-table-header-caption"><script id="tpc_patient_services_serviceID" type="text/html"><?php echo $patient_services_list->serviceID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="serviceID" class="<?php echo $patient_services_list->serviceID->headerCellClass() ?>"><script id="tpc_patient_services_serviceID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->serviceID) ?>', 1);"><div id="elh_patient_services_serviceID" class="patient_services_serviceID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->serviceID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->serviceID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Service_Type->Visible) { // Service_Type ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Service_Type) == "") { ?>
		<th data-name="Service_Type" class="<?php echo $patient_services_list->Service_Type->headerCellClass() ?>"><div id="elh_patient_services_Service_Type" class="patient_services_Service_Type"><div class="ew-table-header-caption"><script id="tpc_patient_services_Service_Type" type="text/html"><?php echo $patient_services_list->Service_Type->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Type" class="<?php echo $patient_services_list->Service_Type->headerCellClass() ?>"><script id="tpc_patient_services_Service_Type" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Service_Type) ?>', 1);"><div id="elh_patient_services_Service_Type" class="patient_services_Service_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Service_Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Service_Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Service_Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->Service_Department->Visible) { // Service_Department ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->Service_Department) == "") { ?>
		<th data-name="Service_Department" class="<?php echo $patient_services_list->Service_Department->headerCellClass() ?>"><div id="elh_patient_services_Service_Department" class="patient_services_Service_Department"><div class="ew-table-header-caption"><script id="tpc_patient_services_Service_Department" type="text/html"><?php echo $patient_services_list->Service_Department->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Department" class="<?php echo $patient_services_list->Service_Department->headerCellClass() ?>"><script id="tpc_patient_services_Service_Department" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->Service_Department) ?>', 1);"><div id="elh_patient_services_Service_Department" class="patient_services_Service_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->Service_Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->Service_Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->Service_Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_list->RequestNo->Visible) { // RequestNo ?>
	<?php if ($patient_services_list->SortUrl($patient_services_list->RequestNo) == "") { ?>
		<th data-name="RequestNo" class="<?php echo $patient_services_list->RequestNo->headerCellClass() ?>"><div id="elh_patient_services_RequestNo" class="patient_services_RequestNo"><div class="ew-table-header-caption"><script id="tpc_patient_services_RequestNo" type="text/html"><?php echo $patient_services_list->RequestNo->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="RequestNo" class="<?php echo $patient_services_list->RequestNo->headerCellClass() ?>"><script id="tpc_patient_services_RequestNo" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_services_list->SortUrl($patient_services_list->RequestNo) ?>', 1);"><div id="elh_patient_services_RequestNo" class="patient_services_RequestNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_list->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_list->RequestNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_list->RequestNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($patient_services_list->ExportAll && $patient_services_list->isExport()) {
	$patient_services_list->StopRecord = $patient_services_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_services_list->TotalRecords > $patient_services_list->StartRecord + $patient_services_list->DisplayRecords - 1)
		$patient_services_list->StopRecord = $patient_services_list->StartRecord + $patient_services_list->DisplayRecords - 1;
	else
		$patient_services_list->StopRecord = $patient_services_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($patient_services->isConfirm() || $patient_services_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_services_list->FormKeyCountName) && ($patient_services_list->isGridAdd() || $patient_services_list->isGridEdit() || $patient_services->isConfirm())) {
		$patient_services_list->KeyCount = $CurrentForm->getValue($patient_services_list->FormKeyCountName);
		$patient_services_list->StopRecord = $patient_services_list->StartRecord + $patient_services_list->KeyCount - 1;
	}
}
$patient_services_list->RecordCount = $patient_services_list->StartRecord - 1;
if ($patient_services_list->Recordset && !$patient_services_list->Recordset->EOF) {
	$patient_services_list->Recordset->moveFirst();
	$selectLimit = $patient_services_list->UseSelectLimit;
	if (!$selectLimit && $patient_services_list->StartRecord > 1)
		$patient_services_list->Recordset->move($patient_services_list->StartRecord - 1);
} elseif (!$patient_services->AllowAddDeleteRow && $patient_services_list->StopRecord == 0) {
	$patient_services_list->StopRecord = $patient_services->GridAddRowCount;
}

// Initialize aggregate
$patient_services->RowType = ROWTYPE_AGGREGATEINIT;
$patient_services->resetAttributes();
$patient_services_list->renderRow();
if ($patient_services_list->isGridAdd())
	$patient_services_list->RowIndex = 0;
if ($patient_services_list->isGridEdit())
	$patient_services_list->RowIndex = 0;
while ($patient_services_list->RecordCount < $patient_services_list->StopRecord) {
	$patient_services_list->RecordCount++;
	if ($patient_services_list->RecordCount >= $patient_services_list->StartRecord) {
		$patient_services_list->RowCount++;
		if ($patient_services_list->isGridAdd() || $patient_services_list->isGridEdit() || $patient_services->isConfirm()) {
			$patient_services_list->RowIndex++;
			$CurrentForm->Index = $patient_services_list->RowIndex;
			if ($CurrentForm->hasValue($patient_services_list->FormActionName) && ($patient_services->isConfirm() || $patient_services_list->EventCancelled))
				$patient_services_list->RowAction = strval($CurrentForm->getValue($patient_services_list->FormActionName));
			elseif ($patient_services_list->isGridAdd())
				$patient_services_list->RowAction = "insert";
			else
				$patient_services_list->RowAction = "";
		}

		// Set up key count
		$patient_services_list->KeyCount = $patient_services_list->RowIndex;

		// Init row class and style
		$patient_services->resetAttributes();
		$patient_services->CssClass = "";
		if ($patient_services_list->isGridAdd()) {
			$patient_services_list->loadRowValues(); // Load default values
		} else {
			$patient_services_list->loadRowValues($patient_services_list->Recordset); // Load row values
		}
		$patient_services->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_services_list->isGridAdd()) // Grid add
			$patient_services->RowType = ROWTYPE_ADD; // Render add
		if ($patient_services_list->isGridAdd() && $patient_services->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_services_list->restoreCurrentRowFormValues($patient_services_list->RowIndex); // Restore form values
		if ($patient_services_list->isGridEdit()) { // Grid edit
			if ($patient_services->EventCancelled)
				$patient_services_list->restoreCurrentRowFormValues($patient_services_list->RowIndex); // Restore form values
			if ($patient_services_list->RowAction == "insert")
				$patient_services->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_services->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_services_list->isGridEdit() && ($patient_services->RowType == ROWTYPE_EDIT || $patient_services->RowType == ROWTYPE_ADD) && $patient_services->EventCancelled) // Update failed
			$patient_services_list->restoreCurrentRowFormValues($patient_services_list->RowIndex); // Restore form values
		if ($patient_services->RowType == ROWTYPE_EDIT) // Edit row
			$patient_services_list->EditRowCount++;

		// Set up row id / data-rowindex
		$patient_services->RowAttrs->merge(["data-rowindex" => $patient_services_list->RowCount, "id" => "r" . $patient_services_list->RowCount . "_patient_services", "data-rowtype" => $patient_services->RowType]);

		// Render row
		$patient_services_list->renderRow();

		// Render list options
		$patient_services_list->renderListOptions();

		// Save row and cell attributes
		$patient_services_list->Attrs[$patient_services_list->RowCount] = ["row_attrs" => $patient_services->rowAttributes(), "cell_attrs" => []];
		$patient_services_list->Attrs[$patient_services_list->RowCount]["cell_attrs"] = $patient_services->fieldCellAttributes();

		// Skip delete row / empty row for confirm page
		if ($patient_services_list->RowAction != "delete" && $patient_services_list->RowAction != "insertdelete" && !($patient_services_list->RowAction == "insert" && $patient_services->isConfirm() && $patient_services_list->emptyRow())) {
?>
	<tr <?php echo $patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_services_list->ListOptions->render("body", "left", $patient_services_list->RowCount, "block", $patient_services->TableVar, "patient_serviceslist");
?>
	<?php if ($patient_services_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_services_list->id->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_id" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_id" class="form-group"></span></script>
<input type="hidden" data-table="patient_services" data-field="x_id" name="o<?php echo $patient_services_list->RowIndex ?>_id" id="o<?php echo $patient_services_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services_list->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_id" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_id" class="form-group">
<span<?php echo $patient_services_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_list->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_id" name="x<?php echo $patient_services_list->RowIndex ?>_id" id="x<?php echo $patient_services_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_id" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_id">
<span<?php echo $patient_services_list->id->viewAttributes() ?>><?php echo $patient_services_list->id->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_services_list->Reception->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services_list->Reception->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Reception" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Reception" class="form-group">
<span<?php echo $patient_services_list->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_list->Reception->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_Reception" name="x<?php echo $patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_list->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Reception" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Reception" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_list->RowIndex ?>_Reception" id="x<?php echo $patient_services_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Reception->EditValue ?>"<?php echo $patient_services_list->Reception->editAttributes() ?>>
</span></script>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="o<?php echo $patient_services_list->RowIndex ?>_Reception" id="o<?php echo $patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_list->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Reception" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Reception" class="form-group">
<span<?php echo $patient_services_list->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_list->Reception->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_list->RowIndex ?>_Reception" id="x<?php echo $patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_list->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Reception" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Reception">
<span<?php echo $patient_services_list->Reception->viewAttributes() ?>><?php echo $patient_services_list->Reception->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Services->Visible) { // Services ?>
		<td data-name="Services" <?php echo $patient_services_list->Services->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Services" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Services" class="form-group">
<?php
$onchange = $patient_services_list->Services->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_services_list->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_services_list->RowIndex ?>_Services">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_services_list->RowIndex ?>_Services" id="sv_x<?php echo $patient_services_list->RowIndex ?>_Services" value="<?php echo RemoveHtml($patient_services_list->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services_list->Services->getPlaceHolder()) ?>"<?php echo $patient_services_list->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services_list->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_list->RowIndex ?>_Services" id="x<?php echo $patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_list->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_services_list->Services->Lookup->getParamTag($patient_services_list, "p_x" . $patient_services_list->RowIndex . "_Services") ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist"], function() {
	fpatient_serviceslist.createAutoSuggest({"id":"x<?php echo $patient_services_list->RowIndex ?>_Services","forceSelect":true});
});
</script>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="o<?php echo $patient_services_list->RowIndex ?>_Services" id="o<?php echo $patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_list->Services->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Services" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Services" class="form-group">
<?php
$onchange = $patient_services_list->Services->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_services_list->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_services_list->RowIndex ?>_Services">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_services_list->RowIndex ?>_Services" id="sv_x<?php echo $patient_services_list->RowIndex ?>_Services" value="<?php echo RemoveHtml($patient_services_list->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services_list->Services->getPlaceHolder()) ?>"<?php echo $patient_services_list->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services_list->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_list->RowIndex ?>_Services" id="x<?php echo $patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_list->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_services_list->Services->Lookup->getParamTag($patient_services_list, "p_x" . $patient_services_list->RowIndex . "_Services") ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist"], function() {
	fpatient_serviceslist.createAutoSuggest({"id":"x<?php echo $patient_services_list->RowIndex ?>_Services","forceSelect":true});
});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Services" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Services">
<span<?php echo $patient_services_list->Services->viewAttributes() ?>><?php echo $patient_services_list->Services->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->amount->Visible) { // amount ?>
		<td data-name="amount" <?php echo $patient_services_list->amount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_amount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_amount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_list->RowIndex ?>_amount" id="x<?php echo $patient_services_list->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_list->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->amount->EditValue ?>"<?php echo $patient_services_list->amount->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="o<?php echo $patient_services_list->RowIndex ?>_amount" id="o<?php echo $patient_services_list->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services_list->amount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_amount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_amount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_list->RowIndex ?>_amount" id="x<?php echo $patient_services_list->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_list->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->amount->EditValue ?>"<?php echo $patient_services_list->amount->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_amount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_amount">
<span<?php echo $patient_services_list->amount->viewAttributes() ?>><?php echo $patient_services_list->amount->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->description->Visible) { // description ?>
		<td data-name="description" <?php echo $patient_services_list->description->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_description" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_description" class="form-group">
<input type="text" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_list->RowIndex ?>_description" id="x<?php echo $patient_services_list->RowIndex ?>_description" placeholder="<?php echo HtmlEncode($patient_services_list->description->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->description->EditValue ?>"<?php echo $patient_services_list->description->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_description" name="o<?php echo $patient_services_list->RowIndex ?>_description" id="o<?php echo $patient_services_list->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services_list->description->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_description" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_description" class="form-group">
<input type="text" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_list->RowIndex ?>_description" id="x<?php echo $patient_services_list->RowIndex ?>_description" placeholder="<?php echo HtmlEncode($patient_services_list->description->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->description->EditValue ?>"<?php echo $patient_services_list->description->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_description" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_description">
<span<?php echo $patient_services_list->description->viewAttributes() ?>><?php echo $patient_services_list->description->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" <?php echo $patient_services_list->patient_type->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_patient_type" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_patient_type" class="form-group">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_list->RowIndex ?>_patient_type" id="x<?php echo $patient_services_list->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->patient_type->EditValue ?>"<?php echo $patient_services_list->patient_type->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="o<?php echo $patient_services_list->RowIndex ?>_patient_type" id="o<?php echo $patient_services_list->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services_list->patient_type->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_patient_type" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_patient_type" class="form-group">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_list->RowIndex ?>_patient_type" id="x<?php echo $patient_services_list->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->patient_type->EditValue ?>"<?php echo $patient_services_list->patient_type->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_patient_type" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_patient_type">
<span<?php echo $patient_services_list->patient_type->viewAttributes() ?>><?php echo $patient_services_list->patient_type->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" <?php echo $patient_services_list->charged_date->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="o<?php echo $patient_services_list->RowIndex ?>_charged_date" id="o<?php echo $patient_services_list->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services_list->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_charged_date" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_charged_date">
<span<?php echo $patient_services_list->charged_date->viewAttributes() ?>><?php echo $patient_services_list->charged_date->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_services_list->status->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_status" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_services_list->RowIndex ?>_status" name="x<?php echo $patient_services_list->RowIndex ?>_status"<?php echo $patient_services_list->status->editAttributes() ?>>
			<?php echo $patient_services_list->status->selectOptionListHtml("x{$patient_services_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_services_list->status->Lookup->getParamTag($patient_services_list, "p_x" . $patient_services_list->RowIndex . "_status") ?>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_status" name="o<?php echo $patient_services_list->RowIndex ?>_status" id="o<?php echo $patient_services_list->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services_list->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_status" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_services_list->RowIndex ?>_status" name="x<?php echo $patient_services_list->RowIndex ?>_status"<?php echo $patient_services_list->status->editAttributes() ?>>
			<?php echo $patient_services_list->status->selectOptionListHtml("x{$patient_services_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_services_list->status->Lookup->getParamTag($patient_services_list, "p_x" . $patient_services_list->RowIndex . "_status") ?>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_status" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_status">
<span<?php echo $patient_services_list->status->viewAttributes() ?>><?php echo $patient_services_list->status->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_services_list->mrnno->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services_list->mrnno->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_mrnno" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_mrnno" class="form-group">
<span<?php echo $patient_services_list->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_list->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_mrnno" name="x<?php echo $patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_list->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_mrnno" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_mrnno" class="form-group">
<input type="text" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_list->RowIndex ?>_mrnno" id="x<?php echo $patient_services_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->mrnno->EditValue ?>"<?php echo $patient_services_list->mrnno->editAttributes() ?>>
</span></script>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="o<?php echo $patient_services_list->RowIndex ?>_mrnno" id="o<?php echo $patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_list->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_mrnno" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_mrnno" class="form-group">
<span<?php echo $patient_services_list->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_list->mrnno->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_list->RowIndex ?>_mrnno" id="x<?php echo $patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_list->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_mrnno" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_mrnno">
<span<?php echo $patient_services_list->mrnno->viewAttributes() ?>><?php echo $patient_services_list->mrnno->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_services_list->PatientName->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PatientName" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PatientName" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_list->RowIndex ?>_PatientName" id="x<?php echo $patient_services_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->PatientName->EditValue ?>"<?php echo $patient_services_list->PatientName->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="o<?php echo $patient_services_list->RowIndex ?>_PatientName" id="o<?php echo $patient_services_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services_list->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PatientName" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PatientName" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_list->RowIndex ?>_PatientName" id="x<?php echo $patient_services_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->PatientName->EditValue ?>"<?php echo $patient_services_list->PatientName->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PatientName" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PatientName">
<span<?php echo $patient_services_list->PatientName->viewAttributes() ?>><?php echo $patient_services_list->PatientName->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_services_list->Age->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Age" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Age" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_list->RowIndex ?>_Age" id="x<?php echo $patient_services_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Age->EditValue ?>"<?php echo $patient_services_list->Age->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="o<?php echo $patient_services_list->RowIndex ?>_Age" id="o<?php echo $patient_services_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services_list->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Age" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Age" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_list->RowIndex ?>_Age" id="x<?php echo $patient_services_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Age->EditValue ?>"<?php echo $patient_services_list->Age->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Age" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Age">
<span<?php echo $patient_services_list->Age->viewAttributes() ?>><?php echo $patient_services_list->Age->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_services_list->Gender->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Gender" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Gender" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_list->RowIndex ?>_Gender" id="x<?php echo $patient_services_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Gender->EditValue ?>"<?php echo $patient_services_list->Gender->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="o<?php echo $patient_services_list->RowIndex ?>_Gender" id="o<?php echo $patient_services_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services_list->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Gender" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Gender" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_list->RowIndex ?>_Gender" id="x<?php echo $patient_services_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Gender->EditValue ?>"<?php echo $patient_services_list->Gender->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Gender" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Gender">
<span<?php echo $patient_services_list->Gender->viewAttributes() ?>><?php echo $patient_services_list->Gender->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit" <?php echo $patient_services_list->Unit->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Unit" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Unit" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_list->RowIndex ?>_Unit" id="x<?php echo $patient_services_list->RowIndex ?>_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Unit->EditValue ?>"<?php echo $patient_services_list->Unit->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="o<?php echo $patient_services_list->RowIndex ?>_Unit" id="o<?php echo $patient_services_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services_list->Unit->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Unit" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Unit" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_list->RowIndex ?>_Unit" id="x<?php echo $patient_services_list->RowIndex ?>_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Unit->EditValue ?>"<?php echo $patient_services_list->Unit->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Unit" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Unit">
<span<?php echo $patient_services_list->Unit->viewAttributes() ?>><?php echo $patient_services_list->Unit->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $patient_services_list->Quantity->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Quantity" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Quantity" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_list->RowIndex ?>_Quantity" id="x<?php echo $patient_services_list->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Quantity->EditValue ?>"<?php echo $patient_services_list->Quantity->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="o<?php echo $patient_services_list->RowIndex ?>_Quantity" id="o<?php echo $patient_services_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services_list->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Quantity" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Quantity" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_list->RowIndex ?>_Quantity" id="x<?php echo $patient_services_list->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Quantity->EditValue ?>"<?php echo $patient_services_list->Quantity->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Quantity" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Quantity">
<span<?php echo $patient_services_list->Quantity->viewAttributes() ?>><?php echo $patient_services_list->Quantity->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Discount->Visible) { // Discount ?>
		<td data-name="Discount" <?php echo $patient_services_list->Discount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Discount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Discount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_list->RowIndex ?>_Discount" id="x<?php echo $patient_services_list->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_list->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Discount->EditValue ?>"<?php echo $patient_services_list->Discount->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="o<?php echo $patient_services_list->RowIndex ?>_Discount" id="o<?php echo $patient_services_list->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services_list->Discount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Discount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Discount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_list->RowIndex ?>_Discount" id="x<?php echo $patient_services_list->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_list->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Discount->EditValue ?>"<?php echo $patient_services_list->Discount->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Discount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Discount">
<span<?php echo $patient_services_list->Discount->viewAttributes() ?>><?php echo $patient_services_list->Discount->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" <?php echo $patient_services_list->SubTotal->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SubTotal" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SubTotal" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_list->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_list->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_list->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SubTotal->EditValue ?>"<?php echo $patient_services_list->SubTotal->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="o<?php echo $patient_services_list->RowIndex ?>_SubTotal" id="o<?php echo $patient_services_list->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services_list->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SubTotal" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SubTotal" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_list->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_list->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_list->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SubTotal->EditValue ?>"<?php echo $patient_services_list->SubTotal->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SubTotal" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SubTotal">
<span<?php echo $patient_services_list->SubTotal->viewAttributes() ?>><?php echo $patient_services_list->SubTotal->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->ServiceSelect->Visible) { // ServiceSelect ?>
		<td data-name="ServiceSelect" <?php echo $patient_services_list->ServiceSelect->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ServiceSelect" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ServiceSelect" class="form-group">
<div id="tp_x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services_list->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" id="x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" value="{value}"<?php echo $patient_services_list->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services_list->ServiceSelect->checkBoxListHtml(FALSE, "x{$patient_services_list->RowIndex}_ServiceSelect[]") ?>
</div></div>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="o<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" id="o<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" value="<?php echo HtmlEncode($patient_services_list->ServiceSelect->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ServiceSelect" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ServiceSelect" class="form-group">
<div id="tp_x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services_list->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" id="x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect[]" value="{value}"<?php echo $patient_services_list->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_services_list->RowIndex ?>_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services_list->ServiceSelect->checkBoxListHtml(FALSE, "x{$patient_services_list->RowIndex}_ServiceSelect[]") ?>
</div></div>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ServiceSelect" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ServiceSelect">
<span<?php echo $patient_services_list->ServiceSelect->viewAttributes() ?>><?php echo $patient_services_list->ServiceSelect->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Aid->Visible) { // Aid ?>
		<td data-name="Aid" <?php echo $patient_services_list->Aid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Aid" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Aid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_list->RowIndex ?>_Aid" id="x<?php echo $patient_services_list->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Aid->EditValue ?>"<?php echo $patient_services_list->Aid->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="o<?php echo $patient_services_list->RowIndex ?>_Aid" id="o<?php echo $patient_services_list->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services_list->Aid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Aid" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Aid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_list->RowIndex ?>_Aid" id="x<?php echo $patient_services_list->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Aid->EditValue ?>"<?php echo $patient_services_list->Aid->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Aid" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Aid">
<span<?php echo $patient_services_list->Aid->viewAttributes() ?>><?php echo $patient_services_list->Aid->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Vid->Visible) { // Vid ?>
		<td data-name="Vid" <?php echo $patient_services_list->Vid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services_list->Vid->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Vid" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Vid" class="form-group">
<span<?php echo $patient_services_list->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_list->Vid->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_Vid" name="x<?php echo $patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_list->Vid->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Vid" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Vid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_list->RowIndex ?>_Vid" id="x<?php echo $patient_services_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Vid->EditValue ?>"<?php echo $patient_services_list->Vid->editAttributes() ?>>
</span></script>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="o<?php echo $patient_services_list->RowIndex ?>_Vid" id="o<?php echo $patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_list->Vid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_services_list->Vid->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Vid" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Vid" class="form-group">
<span<?php echo $patient_services_list->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_list->Vid->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_Vid" name="x<?php echo $patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_list->Vid->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Vid" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Vid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_list->RowIndex ?>_Vid" id="x<?php echo $patient_services_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Vid->EditValue ?>"<?php echo $patient_services_list->Vid->editAttributes() ?>>
</span></script>
<?php } ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Vid" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Vid">
<span<?php echo $patient_services_list->Vid->viewAttributes() ?>><?php echo $patient_services_list->Vid->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $patient_services_list->DrID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_list->RowIndex ?>_DrID" id="x<?php echo $patient_services_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrID->EditValue ?>"<?php echo $patient_services_list->DrID->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="o<?php echo $patient_services_list->RowIndex ?>_DrID" id="o<?php echo $patient_services_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services_list->DrID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_list->RowIndex ?>_DrID" id="x<?php echo $patient_services_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrID->EditValue ?>"<?php echo $patient_services_list->DrID->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrID">
<span<?php echo $patient_services_list->DrID->viewAttributes() ?>><?php echo $patient_services_list->DrID->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" <?php echo $patient_services_list->DrCODE->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrCODE" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrCODE" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_list->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrCODE->EditValue ?>"<?php echo $patient_services_list->DrCODE->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="o<?php echo $patient_services_list->RowIndex ?>_DrCODE" id="o<?php echo $patient_services_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services_list->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrCODE" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrCODE" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_list->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrCODE->EditValue ?>"<?php echo $patient_services_list->DrCODE->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrCODE" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrCODE">
<span<?php echo $patient_services_list->DrCODE->viewAttributes() ?>><?php echo $patient_services_list->DrCODE->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $patient_services_list->DrName->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrName" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrName" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_list->RowIndex ?>_DrName" id="x<?php echo $patient_services_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrName->EditValue ?>"<?php echo $patient_services_list->DrName->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="o<?php echo $patient_services_list->RowIndex ?>_DrName" id="o<?php echo $patient_services_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services_list->DrName->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrName" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrName" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_list->RowIndex ?>_DrName" id="x<?php echo $patient_services_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrName->EditValue ?>"<?php echo $patient_services_list->DrName->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrName" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrName">
<span<?php echo $patient_services_list->DrName->viewAttributes() ?>><?php echo $patient_services_list->DrName->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $patient_services_list->Department->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Department" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Department" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_list->RowIndex ?>_Department" id="x<?php echo $patient_services_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Department->EditValue ?>"<?php echo $patient_services_list->Department->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="o<?php echo $patient_services_list->RowIndex ?>_Department" id="o<?php echo $patient_services_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services_list->Department->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Department" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Department" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_list->RowIndex ?>_Department" id="x<?php echo $patient_services_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Department->EditValue ?>"<?php echo $patient_services_list->Department->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Department" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Department">
<span<?php echo $patient_services_list->Department->viewAttributes() ?>><?php echo $patient_services_list->Department->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres" <?php echo $patient_services_list->DrSharePres->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrSharePres" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrSharePres" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_list->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_list->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrSharePres->EditValue ?>"<?php echo $patient_services_list->DrSharePres->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="o<?php echo $patient_services_list->RowIndex ?>_DrSharePres" id="o<?php echo $patient_services_list->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services_list->DrSharePres->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrSharePres" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrSharePres" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_list->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_list->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrSharePres->EditValue ?>"<?php echo $patient_services_list->DrSharePres->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrSharePres" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrSharePres">
<span<?php echo $patient_services_list->DrSharePres->viewAttributes() ?>><?php echo $patient_services_list->DrSharePres->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres" <?php echo $patient_services_list->HospSharePres->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_HospSharePres" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_HospSharePres" class="form-group">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_list->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_list->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->HospSharePres->EditValue ?>"<?php echo $patient_services_list->HospSharePres->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="o<?php echo $patient_services_list->RowIndex ?>_HospSharePres" id="o<?php echo $patient_services_list->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services_list->HospSharePres->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_HospSharePres" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_HospSharePres" class="form-group">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_list->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_list->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->HospSharePres->EditValue ?>"<?php echo $patient_services_list->HospSharePres->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_HospSharePres" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_HospSharePres">
<span<?php echo $patient_services_list->HospSharePres->viewAttributes() ?>><?php echo $patient_services_list->HospSharePres->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" <?php echo $patient_services_list->DrShareAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrShareAmount->EditValue ?>"<?php echo $patient_services_list->DrShareAmount->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="o<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" id="o<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services_list->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrShareAmount->EditValue ?>"<?php echo $patient_services_list->DrShareAmount->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareAmount">
<span<?php echo $patient_services_list->DrShareAmount->viewAttributes() ?>><?php echo $patient_services_list->DrShareAmount->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" <?php echo $patient_services_list->HospShareAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_HospShareAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_HospShareAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->HospShareAmount->EditValue ?>"<?php echo $patient_services_list->HospShareAmount->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="o<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" id="o<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services_list->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_HospShareAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_HospShareAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->HospShareAmount->EditValue ?>"<?php echo $patient_services_list->HospShareAmount->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_HospShareAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_HospShareAmount">
<span<?php echo $patient_services_list->HospShareAmount->viewAttributes() ?>><?php echo $patient_services_list->HospShareAmount->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount" <?php echo $patient_services_list->DrShareSettiledAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services_list->DrShareSettiledAmount->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services_list->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services_list->DrShareSettiledAmount->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledAmount">
<span<?php echo $patient_services_list->DrShareSettiledAmount->viewAttributes() ?>><?php echo $patient_services_list->DrShareSettiledAmount->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId" <?php echo $patient_services_list->DrShareSettledId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettledId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettledId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrShareSettledId->EditValue ?>"<?php echo $patient_services_list->DrShareSettledId->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" id="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services_list->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettledId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettledId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrShareSettledId->EditValue ?>"<?php echo $patient_services_list->DrShareSettledId->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettledId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettledId">
<span<?php echo $patient_services_list->DrShareSettledId->viewAttributes() ?>><?php echo $patient_services_list->DrShareSettledId->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus" <?php echo $patient_services_list->DrShareSettiledStatus->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledStatus" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledStatus" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services_list->DrShareSettiledStatus->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services_list->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledStatus" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledStatus" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_list->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services_list->DrShareSettiledStatus->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledStatus" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DrShareSettiledStatus">
<span<?php echo $patient_services_list->DrShareSettiledStatus->viewAttributes() ?>><?php echo $patient_services_list->DrShareSettiledStatus->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" <?php echo $patient_services_list->invoiceId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->invoiceId->EditValue ?>"<?php echo $patient_services_list->invoiceId->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="o<?php echo $patient_services_list->RowIndex ?>_invoiceId" id="o<?php echo $patient_services_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services_list->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->invoiceId->EditValue ?>"<?php echo $patient_services_list->invoiceId->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceId">
<span<?php echo $patient_services_list->invoiceId->viewAttributes() ?>><?php echo $patient_services_list->invoiceId->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" <?php echo $patient_services_list->invoiceAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->invoiceAmount->EditValue ?>"<?php echo $patient_services_list->invoiceAmount->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="o<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" id="o<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services_list->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->invoiceAmount->EditValue ?>"<?php echo $patient_services_list->invoiceAmount->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceAmount" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceAmount">
<span<?php echo $patient_services_list->invoiceAmount->viewAttributes() ?>><?php echo $patient_services_list->invoiceAmount->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" <?php echo $patient_services_list->invoiceStatus->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceStatus" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceStatus" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->invoiceStatus->EditValue ?>"<?php echo $patient_services_list->invoiceStatus->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="o<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" id="o<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services_list->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceStatus" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceStatus" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_list->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->invoiceStatus->EditValue ?>"<?php echo $patient_services_list->invoiceStatus->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceStatus" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_invoiceStatus">
<span<?php echo $patient_services_list->invoiceStatus->viewAttributes() ?>><?php echo $patient_services_list->invoiceStatus->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" <?php echo $patient_services_list->modeOfPayment->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_modeOfPayment" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_modeOfPayment" class="form-group">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->modeOfPayment->EditValue ?>"<?php echo $patient_services_list->modeOfPayment->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="o<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" id="o<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services_list->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_modeOfPayment" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_modeOfPayment" class="form-group">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_list->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->modeOfPayment->EditValue ?>"<?php echo $patient_services_list->modeOfPayment->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_modeOfPayment" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_modeOfPayment">
<span<?php echo $patient_services_list->modeOfPayment->viewAttributes() ?>><?php echo $patient_services_list->modeOfPayment->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_services_list->HospID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="o<?php echo $patient_services_list->RowIndex ?>_HospID" id="o<?php echo $patient_services_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services_list->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_HospID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_HospID">
<span<?php echo $patient_services_list->HospID->viewAttributes() ?>><?php echo $patient_services_list->HospID->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $patient_services_list->RIDNO->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RIDNO" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RIDNO" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_list->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_list->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->RIDNO->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->RIDNO->EditValue ?>"<?php echo $patient_services_list->RIDNO->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="o<?php echo $patient_services_list->RowIndex ?>_RIDNO" id="o<?php echo $patient_services_list->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services_list->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RIDNO" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RIDNO" class="form-group">
<span<?php echo $patient_services_list->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_list->RIDNO->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_list->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_list->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services_list->RIDNO->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RIDNO" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RIDNO">
<span<?php echo $patient_services_list->RIDNO->viewAttributes() ?>><?php echo $patient_services_list->RIDNO->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $patient_services_list->TidNo->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TidNo" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TidNo" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_list->RowIndex ?>_TidNo" id="x<?php echo $patient_services_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->TidNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->TidNo->EditValue ?>"<?php echo $patient_services_list->TidNo->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="o<?php echo $patient_services_list->RowIndex ?>_TidNo" id="o<?php echo $patient_services_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services_list->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TidNo" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TidNo" class="form-group">
<span<?php echo $patient_services_list->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_list->TidNo->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_list->RowIndex ?>_TidNo" id="x<?php echo $patient_services_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services_list->TidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TidNo" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TidNo">
<span<?php echo $patient_services_list->TidNo->viewAttributes() ?>><?php echo $patient_services_list->TidNo->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory" <?php echo $patient_services_list->DiscountCategory->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DiscountCategory" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DiscountCategory" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DiscountCategory->EditValue ?>"<?php echo $patient_services_list->DiscountCategory->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="o<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" id="o<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services_list->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DiscountCategory" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DiscountCategory" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_list->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DiscountCategory->EditValue ?>"<?php echo $patient_services_list->DiscountCategory->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DiscountCategory" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DiscountCategory">
<span<?php echo $patient_services_list->DiscountCategory->viewAttributes() ?>><?php echo $patient_services_list->DiscountCategory->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->sid->Visible) { // sid ?>
		<td data-name="sid" <?php echo $patient_services_list->sid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_sid" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_sid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_list->RowIndex ?>_sid" id="x<?php echo $patient_services_list->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_list->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->sid->EditValue ?>"<?php echo $patient_services_list->sid->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="o<?php echo $patient_services_list->RowIndex ?>_sid" id="o<?php echo $patient_services_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services_list->sid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_sid" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_sid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_list->RowIndex ?>_sid" id="x<?php echo $patient_services_list->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_list->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->sid->EditValue ?>"<?php echo $patient_services_list->sid->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_sid" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_sid">
<span<?php echo $patient_services_list->sid->viewAttributes() ?>><?php echo $patient_services_list->sid->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" <?php echo $patient_services_list->ItemCode->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ItemCode" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ItemCode" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_list->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_list->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_list->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ItemCode->EditValue ?>"<?php echo $patient_services_list->ItemCode->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="o<?php echo $patient_services_list->RowIndex ?>_ItemCode" id="o<?php echo $patient_services_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services_list->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ItemCode" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ItemCode" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_list->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_list->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_list->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ItemCode->EditValue ?>"<?php echo $patient_services_list->ItemCode->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ItemCode" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ItemCode">
<span<?php echo $patient_services_list->ItemCode->viewAttributes() ?>><?php echo $patient_services_list->ItemCode->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" <?php echo $patient_services_list->TestSubCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestSubCd" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestSubCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_list->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->TestSubCd->EditValue ?>"<?php echo $patient_services_list->TestSubCd->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="o<?php echo $patient_services_list->RowIndex ?>_TestSubCd" id="o<?php echo $patient_services_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services_list->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestSubCd" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestSubCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_list->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->TestSubCd->EditValue ?>"<?php echo $patient_services_list->TestSubCd->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestSubCd" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestSubCd">
<span<?php echo $patient_services_list->TestSubCd->viewAttributes() ?>><?php echo $patient_services_list->TestSubCd->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" <?php echo $patient_services_list->DEptCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DEptCd" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DEptCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_list->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DEptCd->EditValue ?>"<?php echo $patient_services_list->DEptCd->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="o<?php echo $patient_services_list->RowIndex ?>_DEptCd" id="o<?php echo $patient_services_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services_list->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DEptCd" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DEptCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_list->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DEptCd->EditValue ?>"<?php echo $patient_services_list->DEptCd->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DEptCd" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DEptCd">
<span<?php echo $patient_services_list->DEptCd->viewAttributes() ?>><?php echo $patient_services_list->DEptCd->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" <?php echo $patient_services_list->ProfCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ProfCd" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ProfCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_list->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_list->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ProfCd->EditValue ?>"<?php echo $patient_services_list->ProfCd->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="o<?php echo $patient_services_list->RowIndex ?>_ProfCd" id="o<?php echo $patient_services_list->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services_list->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ProfCd" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ProfCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_list->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_list->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ProfCd->EditValue ?>"<?php echo $patient_services_list->ProfCd->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ProfCd" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ProfCd">
<span<?php echo $patient_services_list->ProfCd->viewAttributes() ?>><?php echo $patient_services_list->ProfCd->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Comments->Visible) { // Comments ?>
		<td data-name="Comments" <?php echo $patient_services_list->Comments->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Comments" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Comments" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_list->RowIndex ?>_Comments" id="x<?php echo $patient_services_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Comments->EditValue ?>"<?php echo $patient_services_list->Comments->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="o<?php echo $patient_services_list->RowIndex ?>_Comments" id="o<?php echo $patient_services_list->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services_list->Comments->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Comments" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Comments" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_list->RowIndex ?>_Comments" id="x<?php echo $patient_services_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Comments->EditValue ?>"<?php echo $patient_services_list->Comments->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Comments" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Comments">
<span<?php echo $patient_services_list->Comments->viewAttributes() ?>><?php echo $patient_services_list->Comments->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $patient_services_list->Method->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Method" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Method" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_list->RowIndex ?>_Method" id="x<?php echo $patient_services_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Method->EditValue ?>"<?php echo $patient_services_list->Method->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="o<?php echo $patient_services_list->RowIndex ?>_Method" id="o<?php echo $patient_services_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services_list->Method->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Method" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Method" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_list->RowIndex ?>_Method" id="x<?php echo $patient_services_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Method->EditValue ?>"<?php echo $patient_services_list->Method->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Method" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Method">
<span<?php echo $patient_services_list->Method->viewAttributes() ?>><?php echo $patient_services_list->Method->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" <?php echo $patient_services_list->Specimen->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Specimen" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Specimen" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_list->RowIndex ?>_Specimen" id="x<?php echo $patient_services_list->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Specimen->EditValue ?>"<?php echo $patient_services_list->Specimen->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="o<?php echo $patient_services_list->RowIndex ?>_Specimen" id="o<?php echo $patient_services_list->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services_list->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Specimen" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Specimen" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_list->RowIndex ?>_Specimen" id="x<?php echo $patient_services_list->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Specimen->EditValue ?>"<?php echo $patient_services_list->Specimen->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Specimen" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Specimen">
<span<?php echo $patient_services_list->Specimen->viewAttributes() ?>><?php echo $patient_services_list->Specimen->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" <?php echo $patient_services_list->Abnormal->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Abnormal" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Abnormal" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_list->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_list->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Abnormal->EditValue ?>"<?php echo $patient_services_list->Abnormal->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="o<?php echo $patient_services_list->RowIndex ?>_Abnormal" id="o<?php echo $patient_services_list->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services_list->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Abnormal" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Abnormal" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_list->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_list->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Abnormal->EditValue ?>"<?php echo $patient_services_list->Abnormal->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Abnormal" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Abnormal">
<span<?php echo $patient_services_list->Abnormal->viewAttributes() ?>><?php echo $patient_services_list->Abnormal->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" <?php echo $patient_services_list->TestUnit->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestUnit" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestUnit" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_list->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_list->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->TestUnit->EditValue ?>"<?php echo $patient_services_list->TestUnit->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="o<?php echo $patient_services_list->RowIndex ?>_TestUnit" id="o<?php echo $patient_services_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services_list->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestUnit" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestUnit" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_list->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_list->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->TestUnit->EditValue ?>"<?php echo $patient_services_list->TestUnit->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestUnit" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestUnit">
<span<?php echo $patient_services_list->TestUnit->viewAttributes() ?>><?php echo $patient_services_list->TestUnit->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" <?php echo $patient_services_list->LOWHIGH->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_LOWHIGH" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_LOWHIGH" class="form-group">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->LOWHIGH->EditValue ?>"<?php echo $patient_services_list->LOWHIGH->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="o<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" id="o<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services_list->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_LOWHIGH" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_LOWHIGH" class="form-group">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_list->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->LOWHIGH->EditValue ?>"<?php echo $patient_services_list->LOWHIGH->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_LOWHIGH" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_LOWHIGH">
<span<?php echo $patient_services_list->LOWHIGH->viewAttributes() ?>><?php echo $patient_services_list->LOWHIGH->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Branch->Visible) { // Branch ?>
		<td data-name="Branch" <?php echo $patient_services_list->Branch->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Branch" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Branch" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_list->RowIndex ?>_Branch" id="x<?php echo $patient_services_list->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Branch->EditValue ?>"<?php echo $patient_services_list->Branch->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="o<?php echo $patient_services_list->RowIndex ?>_Branch" id="o<?php echo $patient_services_list->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services_list->Branch->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Branch" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Branch" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_list->RowIndex ?>_Branch" id="x<?php echo $patient_services_list->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Branch->EditValue ?>"<?php echo $patient_services_list->Branch->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Branch" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Branch">
<span<?php echo $patient_services_list->Branch->viewAttributes() ?>><?php echo $patient_services_list->Branch->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" <?php echo $patient_services_list->Dispatch->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Dispatch" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Dispatch" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_list->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_list->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Dispatch->EditValue ?>"<?php echo $patient_services_list->Dispatch->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="o<?php echo $patient_services_list->RowIndex ?>_Dispatch" id="o<?php echo $patient_services_list->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services_list->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Dispatch" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Dispatch" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_list->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_list->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Dispatch->EditValue ?>"<?php echo $patient_services_list->Dispatch->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Dispatch" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Dispatch">
<span<?php echo $patient_services_list->Dispatch->viewAttributes() ?>><?php echo $patient_services_list->Dispatch->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" <?php echo $patient_services_list->Pic1->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Pic1" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Pic1" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_list->RowIndex ?>_Pic1" id="x<?php echo $patient_services_list->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Pic1->EditValue ?>"<?php echo $patient_services_list->Pic1->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="o<?php echo $patient_services_list->RowIndex ?>_Pic1" id="o<?php echo $patient_services_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services_list->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Pic1" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Pic1" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_list->RowIndex ?>_Pic1" id="x<?php echo $patient_services_list->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Pic1->EditValue ?>"<?php echo $patient_services_list->Pic1->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Pic1" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Pic1">
<span<?php echo $patient_services_list->Pic1->viewAttributes() ?>><?php echo $patient_services_list->Pic1->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" <?php echo $patient_services_list->Pic2->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Pic2" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Pic2" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_list->RowIndex ?>_Pic2" id="x<?php echo $patient_services_list->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Pic2->EditValue ?>"<?php echo $patient_services_list->Pic2->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="o<?php echo $patient_services_list->RowIndex ?>_Pic2" id="o<?php echo $patient_services_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services_list->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Pic2" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Pic2" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_list->RowIndex ?>_Pic2" id="x<?php echo $patient_services_list->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Pic2->EditValue ?>"<?php echo $patient_services_list->Pic2->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Pic2" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Pic2">
<span<?php echo $patient_services_list->Pic2->viewAttributes() ?>><?php echo $patient_services_list->Pic2->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" <?php echo $patient_services_list->GraphPath->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_GraphPath" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_GraphPath" class="form-group">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_list->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_list->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->GraphPath->EditValue ?>"<?php echo $patient_services_list->GraphPath->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="o<?php echo $patient_services_list->RowIndex ?>_GraphPath" id="o<?php echo $patient_services_list->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services_list->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_GraphPath" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_GraphPath" class="form-group">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_list->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_list->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->GraphPath->EditValue ?>"<?php echo $patient_services_list->GraphPath->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_GraphPath" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_GraphPath">
<span<?php echo $patient_services_list->GraphPath->viewAttributes() ?>><?php echo $patient_services_list->GraphPath->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" <?php echo $patient_services_list->MachineCD->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_MachineCD" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_MachineCD" class="form-group">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_list->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_list->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->MachineCD->EditValue ?>"<?php echo $patient_services_list->MachineCD->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="o<?php echo $patient_services_list->RowIndex ?>_MachineCD" id="o<?php echo $patient_services_list->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services_list->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_MachineCD" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_MachineCD" class="form-group">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_list->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_list->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->MachineCD->EditValue ?>"<?php echo $patient_services_list->MachineCD->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_MachineCD" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_MachineCD">
<span<?php echo $patient_services_list->MachineCD->viewAttributes() ?>><?php echo $patient_services_list->MachineCD->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" <?php echo $patient_services_list->TestCancel->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestCancel" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestCancel" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_list->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_list->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->TestCancel->EditValue ?>"<?php echo $patient_services_list->TestCancel->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="o<?php echo $patient_services_list->RowIndex ?>_TestCancel" id="o<?php echo $patient_services_list->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services_list->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestCancel" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestCancel" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_list->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_list->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->TestCancel->EditValue ?>"<?php echo $patient_services_list->TestCancel->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestCancel" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestCancel">
<span<?php echo $patient_services_list->TestCancel->viewAttributes() ?>><?php echo $patient_services_list->TestCancel->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" <?php echo $patient_services_list->OutSource->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_OutSource" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_OutSource" class="form-group">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_list->RowIndex ?>_OutSource" id="x<?php echo $patient_services_list->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->OutSource->EditValue ?>"<?php echo $patient_services_list->OutSource->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="o<?php echo $patient_services_list->RowIndex ?>_OutSource" id="o<?php echo $patient_services_list->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services_list->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_OutSource" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_OutSource" class="form-group">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_list->RowIndex ?>_OutSource" id="x<?php echo $patient_services_list->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->OutSource->EditValue ?>"<?php echo $patient_services_list->OutSource->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_OutSource" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_OutSource">
<span<?php echo $patient_services_list->OutSource->viewAttributes() ?>><?php echo $patient_services_list->OutSource->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Printed->Visible) { // Printed ?>
		<td data-name="Printed" <?php echo $patient_services_list->Printed->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Printed" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Printed" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_list->RowIndex ?>_Printed" id="x<?php echo $patient_services_list->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Printed->EditValue ?>"<?php echo $patient_services_list->Printed->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="o<?php echo $patient_services_list->RowIndex ?>_Printed" id="o<?php echo $patient_services_list->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services_list->Printed->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Printed" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Printed" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_list->RowIndex ?>_Printed" id="x<?php echo $patient_services_list->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Printed->EditValue ?>"<?php echo $patient_services_list->Printed->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Printed" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Printed">
<span<?php echo $patient_services_list->Printed->viewAttributes() ?>><?php echo $patient_services_list->Printed->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" <?php echo $patient_services_list->PrintBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PrintBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PrintBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_list->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_list->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->PrintBy->EditValue ?>"<?php echo $patient_services_list->PrintBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="o<?php echo $patient_services_list->RowIndex ?>_PrintBy" id="o<?php echo $patient_services_list->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services_list->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PrintBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PrintBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_list->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_list->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->PrintBy->EditValue ?>"<?php echo $patient_services_list->PrintBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PrintBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PrintBy">
<span<?php echo $patient_services_list->PrintBy->viewAttributes() ?>><?php echo $patient_services_list->PrintBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" <?php echo $patient_services_list->PrintDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PrintDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PrintDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_list->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($patient_services_list->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->PrintDate->EditValue ?>"<?php echo $patient_services_list->PrintDate->editAttributes() ?>>
<?php if (!$patient_services_list->PrintDate->ReadOnly && !$patient_services_list->PrintDate->Disabled && !isset($patient_services_list->PrintDate->EditAttrs["readonly"]) && !isset($patient_services_list->PrintDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="o<?php echo $patient_services_list->RowIndex ?>_PrintDate" id="o<?php echo $patient_services_list->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services_list->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PrintDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PrintDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_list->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($patient_services_list->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->PrintDate->EditValue ?>"<?php echo $patient_services_list->PrintDate->editAttributes() ?>>
<?php if (!$patient_services_list->PrintDate->ReadOnly && !$patient_services_list->PrintDate->Disabled && !isset($patient_services_list->PrintDate->EditAttrs["readonly"]) && !isset($patient_services_list->PrintDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PrintDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PrintDate">
<span<?php echo $patient_services_list->PrintDate->viewAttributes() ?>><?php echo $patient_services_list->PrintDate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate" <?php echo $patient_services_list->BillingDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_BillingDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_BillingDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_list->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_list->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($patient_services_list->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->BillingDate->EditValue ?>"<?php echo $patient_services_list->BillingDate->editAttributes() ?>>
<?php if (!$patient_services_list->BillingDate->ReadOnly && !$patient_services_list->BillingDate->Disabled && !isset($patient_services_list->BillingDate->EditAttrs["readonly"]) && !isset($patient_services_list->BillingDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="o<?php echo $patient_services_list->RowIndex ?>_BillingDate" id="o<?php echo $patient_services_list->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services_list->BillingDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_BillingDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_BillingDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_list->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_list->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($patient_services_list->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->BillingDate->EditValue ?>"<?php echo $patient_services_list->BillingDate->editAttributes() ?>>
<?php if (!$patient_services_list->BillingDate->ReadOnly && !$patient_services_list->BillingDate->Disabled && !isset($patient_services_list->BillingDate->EditAttrs["readonly"]) && !isset($patient_services_list->BillingDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_BillingDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_BillingDate">
<span<?php echo $patient_services_list->BillingDate->viewAttributes() ?>><?php echo $patient_services_list->BillingDate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy" <?php echo $patient_services_list->BilledBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_BilledBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_BilledBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_list->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_list->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->BilledBy->EditValue ?>"<?php echo $patient_services_list->BilledBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="o<?php echo $patient_services_list->RowIndex ?>_BilledBy" id="o<?php echo $patient_services_list->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services_list->BilledBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_BilledBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_BilledBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_list->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_list->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->BilledBy->EditValue ?>"<?php echo $patient_services_list->BilledBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_BilledBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_BilledBy">
<span<?php echo $patient_services_list->BilledBy->viewAttributes() ?>><?php echo $patient_services_list->BilledBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" <?php echo $patient_services_list->Resulted->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Resulted" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Resulted" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_list->RowIndex ?>_Resulted" id="x<?php echo $patient_services_list->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Resulted->EditValue ?>"<?php echo $patient_services_list->Resulted->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="o<?php echo $patient_services_list->RowIndex ?>_Resulted" id="o<?php echo $patient_services_list->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services_list->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Resulted" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Resulted" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_list->RowIndex ?>_Resulted" id="x<?php echo $patient_services_list->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Resulted->EditValue ?>"<?php echo $patient_services_list->Resulted->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Resulted" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Resulted">
<span<?php echo $patient_services_list->Resulted->viewAttributes() ?>><?php echo $patient_services_list->Resulted->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $patient_services_list->ResultDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ResultDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ResultDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_list->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($patient_services_list->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ResultDate->EditValue ?>"<?php echo $patient_services_list->ResultDate->editAttributes() ?>>
<?php if (!$patient_services_list->ResultDate->ReadOnly && !$patient_services_list->ResultDate->Disabled && !isset($patient_services_list->ResultDate->EditAttrs["readonly"]) && !isset($patient_services_list->ResultDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="o<?php echo $patient_services_list->RowIndex ?>_ResultDate" id="o<?php echo $patient_services_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services_list->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ResultDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ResultDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_list->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($patient_services_list->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ResultDate->EditValue ?>"<?php echo $patient_services_list->ResultDate->editAttributes() ?>>
<?php if (!$patient_services_list->ResultDate->ReadOnly && !$patient_services_list->ResultDate->Disabled && !isset($patient_services_list->ResultDate->EditAttrs["readonly"]) && !isset($patient_services_list->ResultDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ResultDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ResultDate">
<span<?php echo $patient_services_list->ResultDate->viewAttributes() ?>><?php echo $patient_services_list->ResultDate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" <?php echo $patient_services_list->ResultedBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ResultedBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ResultedBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_list->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ResultedBy->EditValue ?>"<?php echo $patient_services_list->ResultedBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="o<?php echo $patient_services_list->RowIndex ?>_ResultedBy" id="o<?php echo $patient_services_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services_list->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ResultedBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ResultedBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_list->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ResultedBy->EditValue ?>"<?php echo $patient_services_list->ResultedBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ResultedBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ResultedBy">
<span<?php echo $patient_services_list->ResultedBy->viewAttributes() ?>><?php echo $patient_services_list->ResultedBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" <?php echo $patient_services_list->SampleDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SampleDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SampleDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_list->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($patient_services_list->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SampleDate->EditValue ?>"<?php echo $patient_services_list->SampleDate->editAttributes() ?>>
<?php if (!$patient_services_list->SampleDate->ReadOnly && !$patient_services_list->SampleDate->Disabled && !isset($patient_services_list->SampleDate->EditAttrs["readonly"]) && !isset($patient_services_list->SampleDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="o<?php echo $patient_services_list->RowIndex ?>_SampleDate" id="o<?php echo $patient_services_list->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services_list->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SampleDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SampleDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_list->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($patient_services_list->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SampleDate->EditValue ?>"<?php echo $patient_services_list->SampleDate->editAttributes() ?>>
<?php if (!$patient_services_list->SampleDate->ReadOnly && !$patient_services_list->SampleDate->Disabled && !isset($patient_services_list->SampleDate->EditAttrs["readonly"]) && !isset($patient_services_list->SampleDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SampleDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SampleDate">
<span<?php echo $patient_services_list->SampleDate->viewAttributes() ?>><?php echo $patient_services_list->SampleDate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" <?php echo $patient_services_list->SampleUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SampleUser" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SampleUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_list->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_list->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SampleUser->EditValue ?>"<?php echo $patient_services_list->SampleUser->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="o<?php echo $patient_services_list->RowIndex ?>_SampleUser" id="o<?php echo $patient_services_list->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services_list->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SampleUser" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SampleUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_list->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_list->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SampleUser->EditValue ?>"<?php echo $patient_services_list->SampleUser->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SampleUser" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SampleUser">
<span<?php echo $patient_services_list->SampleUser->viewAttributes() ?>><?php echo $patient_services_list->SampleUser->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled" <?php echo $patient_services_list->Sampled->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Sampled" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Sampled" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_list->RowIndex ?>_Sampled" id="x<?php echo $patient_services_list->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Sampled->EditValue ?>"<?php echo $patient_services_list->Sampled->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="o<?php echo $patient_services_list->RowIndex ?>_Sampled" id="o<?php echo $patient_services_list->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services_list->Sampled->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Sampled" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Sampled" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_list->RowIndex ?>_Sampled" id="x<?php echo $patient_services_list->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Sampled->EditValue ?>"<?php echo $patient_services_list->Sampled->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Sampled" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Sampled">
<span<?php echo $patient_services_list->Sampled->viewAttributes() ?>><?php echo $patient_services_list->Sampled->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" <?php echo $patient_services_list->ReceivedDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services_list->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ReceivedDate->EditValue ?>"<?php echo $patient_services_list->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services_list->ReceivedDate->ReadOnly && !$patient_services_list->ReceivedDate->Disabled && !isset($patient_services_list->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services_list->ReceivedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="o<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" id="o<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services_list->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services_list->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ReceivedDate->EditValue ?>"<?php echo $patient_services_list->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services_list->ReceivedDate->ReadOnly && !$patient_services_list->ReceivedDate->Disabled && !isset($patient_services_list->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services_list->ReceivedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedDate">
<span<?php echo $patient_services_list->ReceivedDate->viewAttributes() ?>><?php echo $patient_services_list->ReceivedDate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" <?php echo $patient_services_list->ReceivedUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedUser" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ReceivedUser->EditValue ?>"<?php echo $patient_services_list->ReceivedUser->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="o<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" id="o<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services_list->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedUser" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_list->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ReceivedUser->EditValue ?>"<?php echo $patient_services_list->ReceivedUser->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedUser" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ReceivedUser">
<span<?php echo $patient_services_list->ReceivedUser->viewAttributes() ?>><?php echo $patient_services_list->ReceivedUser->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied" <?php echo $patient_services_list->Recevied->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Recevied" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Recevied" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_list->RowIndex ?>_Recevied" id="x<?php echo $patient_services_list->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Recevied->EditValue ?>"<?php echo $patient_services_list->Recevied->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="o<?php echo $patient_services_list->RowIndex ?>_Recevied" id="o<?php echo $patient_services_list->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services_list->Recevied->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Recevied" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Recevied" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_list->RowIndex ?>_Recevied" id="x<?php echo $patient_services_list->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Recevied->EditValue ?>"<?php echo $patient_services_list->Recevied->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Recevied" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Recevied">
<span<?php echo $patient_services_list->Recevied->viewAttributes() ?>><?php echo $patient_services_list->Recevied->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" <?php echo $patient_services_list->DeptRecvDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services_list->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DeptRecvDate->EditValue ?>"<?php echo $patient_services_list->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services_list->DeptRecvDate->ReadOnly && !$patient_services_list->DeptRecvDate->Disabled && !isset($patient_services_list->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services_list->DeptRecvDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="o<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" id="o<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services_list->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services_list->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DeptRecvDate->EditValue ?>"<?php echo $patient_services_list->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services_list->DeptRecvDate->ReadOnly && !$patient_services_list->DeptRecvDate->Disabled && !isset($patient_services_list->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services_list->DeptRecvDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvDate">
<span<?php echo $patient_services_list->DeptRecvDate->viewAttributes() ?>><?php echo $patient_services_list->DeptRecvDate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" <?php echo $patient_services_list->DeptRecvUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvUser" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DeptRecvUser->EditValue ?>"<?php echo $patient_services_list->DeptRecvUser->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="o<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" id="o<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services_list->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvUser" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DeptRecvUser->EditValue ?>"<?php echo $patient_services_list->DeptRecvUser->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvUser" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecvUser">
<span<?php echo $patient_services_list->DeptRecvUser->viewAttributes() ?>><?php echo $patient_services_list->DeptRecvUser->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived" <?php echo $patient_services_list->DeptRecived->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecived" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecived" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DeptRecived->EditValue ?>"<?php echo $patient_services_list->DeptRecived->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="o<?php echo $patient_services_list->RowIndex ?>_DeptRecived" id="o<?php echo $patient_services_list->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services_list->DeptRecived->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecived" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecived" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_list->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_list->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->DeptRecived->EditValue ?>"<?php echo $patient_services_list->DeptRecived->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecived" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_DeptRecived">
<span<?php echo $patient_services_list->DeptRecived->viewAttributes() ?>><?php echo $patient_services_list->DeptRecived->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" <?php echo $patient_services_list->SAuthDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services_list->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SAuthDate->EditValue ?>"<?php echo $patient_services_list->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services_list->SAuthDate->ReadOnly && !$patient_services_list->SAuthDate->Disabled && !isset($patient_services_list->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services_list->SAuthDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="o<?php echo $patient_services_list->RowIndex ?>_SAuthDate" id="o<?php echo $patient_services_list->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services_list->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services_list->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SAuthDate->EditValue ?>"<?php echo $patient_services_list->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services_list->SAuthDate->ReadOnly && !$patient_services_list->SAuthDate->Disabled && !isset($patient_services_list->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services_list->SAuthDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthDate">
<span<?php echo $patient_services_list->SAuthDate->viewAttributes() ?>><?php echo $patient_services_list->SAuthDate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" <?php echo $patient_services_list->SAuthBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SAuthBy->EditValue ?>"<?php echo $patient_services_list->SAuthBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="o<?php echo $patient_services_list->RowIndex ?>_SAuthBy" id="o<?php echo $patient_services_list->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services_list->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SAuthBy->EditValue ?>"<?php echo $patient_services_list->SAuthBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthBy">
<span<?php echo $patient_services_list->SAuthBy->viewAttributes() ?>><?php echo $patient_services_list->SAuthBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate" <?php echo $patient_services_list->SAuthendicate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthendicate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthendicate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SAuthendicate->EditValue ?>"<?php echo $patient_services_list->SAuthendicate->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="o<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" id="o<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services_list->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthendicate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthendicate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_list->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->SAuthendicate->EditValue ?>"<?php echo $patient_services_list->SAuthendicate->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthendicate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_SAuthendicate">
<span<?php echo $patient_services_list->SAuthendicate->viewAttributes() ?>><?php echo $patient_services_list->SAuthendicate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" <?php echo $patient_services_list->AuthDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_AuthDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_AuthDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_list->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($patient_services_list->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->AuthDate->EditValue ?>"<?php echo $patient_services_list->AuthDate->editAttributes() ?>>
<?php if (!$patient_services_list->AuthDate->ReadOnly && !$patient_services_list->AuthDate->Disabled && !isset($patient_services_list->AuthDate->EditAttrs["readonly"]) && !isset($patient_services_list->AuthDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="o<?php echo $patient_services_list->RowIndex ?>_AuthDate" id="o<?php echo $patient_services_list->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services_list->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_AuthDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_AuthDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_list->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($patient_services_list->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->AuthDate->EditValue ?>"<?php echo $patient_services_list->AuthDate->editAttributes() ?>>
<?php if (!$patient_services_list->AuthDate->ReadOnly && !$patient_services_list->AuthDate->Disabled && !isset($patient_services_list->AuthDate->EditAttrs["readonly"]) && !isset($patient_services_list->AuthDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_AuthDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_AuthDate">
<span<?php echo $patient_services_list->AuthDate->viewAttributes() ?>><?php echo $patient_services_list->AuthDate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" <?php echo $patient_services_list->AuthBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_AuthBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_AuthBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_list->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_list->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->AuthBy->EditValue ?>"<?php echo $patient_services_list->AuthBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="o<?php echo $patient_services_list->RowIndex ?>_AuthBy" id="o<?php echo $patient_services_list->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services_list->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_AuthBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_AuthBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_list->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_list->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->AuthBy->EditValue ?>"<?php echo $patient_services_list->AuthBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_AuthBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_AuthBy">
<span<?php echo $patient_services_list->AuthBy->viewAttributes() ?>><?php echo $patient_services_list->AuthBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate" <?php echo $patient_services_list->Authencate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Authencate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Authencate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_list->RowIndex ?>_Authencate" id="x<?php echo $patient_services_list->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Authencate->EditValue ?>"<?php echo $patient_services_list->Authencate->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="o<?php echo $patient_services_list->RowIndex ?>_Authencate" id="o<?php echo $patient_services_list->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services_list->Authencate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Authencate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Authencate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_list->RowIndex ?>_Authencate" id="x<?php echo $patient_services_list->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Authencate->EditValue ?>"<?php echo $patient_services_list->Authencate->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Authencate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Authencate">
<span<?php echo $patient_services_list->Authencate->viewAttributes() ?>><?php echo $patient_services_list->Authencate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" <?php echo $patient_services_list->EditDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_EditDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_EditDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_list->RowIndex ?>_EditDate" id="x<?php echo $patient_services_list->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($patient_services_list->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->EditDate->EditValue ?>"<?php echo $patient_services_list->EditDate->editAttributes() ?>>
<?php if (!$patient_services_list->EditDate->ReadOnly && !$patient_services_list->EditDate->Disabled && !isset($patient_services_list->EditDate->EditAttrs["readonly"]) && !isset($patient_services_list->EditDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="o<?php echo $patient_services_list->RowIndex ?>_EditDate" id="o<?php echo $patient_services_list->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services_list->EditDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_EditDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_EditDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_list->RowIndex ?>_EditDate" id="x<?php echo $patient_services_list->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($patient_services_list->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->EditDate->EditValue ?>"<?php echo $patient_services_list->EditDate->editAttributes() ?>>
<?php if (!$patient_services_list->EditDate->ReadOnly && !$patient_services_list->EditDate->Disabled && !isset($patient_services_list->EditDate->EditAttrs["readonly"]) && !isset($patient_services_list->EditDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_EditDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_EditDate">
<span<?php echo $patient_services_list->EditDate->viewAttributes() ?>><?php echo $patient_services_list->EditDate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy" <?php echo $patient_services_list->EditBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_EditBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_EditBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_list->RowIndex ?>_EditBy" id="x<?php echo $patient_services_list->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->EditBy->EditValue ?>"<?php echo $patient_services_list->EditBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="o<?php echo $patient_services_list->RowIndex ?>_EditBy" id="o<?php echo $patient_services_list->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services_list->EditBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_EditBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_EditBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_list->RowIndex ?>_EditBy" id="x<?php echo $patient_services_list->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->EditBy->EditValue ?>"<?php echo $patient_services_list->EditBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_EditBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_EditBy">
<span<?php echo $patient_services_list->EditBy->viewAttributes() ?>><?php echo $patient_services_list->EditBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Editted->Visible) { // Editted ?>
		<td data-name="Editted" <?php echo $patient_services_list->Editted->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Editted" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Editted" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_list->RowIndex ?>_Editted" id="x<?php echo $patient_services_list->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Editted->EditValue ?>"<?php echo $patient_services_list->Editted->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="o<?php echo $patient_services_list->RowIndex ?>_Editted" id="o<?php echo $patient_services_list->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services_list->Editted->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Editted" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Editted" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_list->RowIndex ?>_Editted" id="x<?php echo $patient_services_list->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Editted->EditValue ?>"<?php echo $patient_services_list->Editted->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Editted" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Editted">
<span<?php echo $patient_services_list->Editted->viewAttributes() ?>><?php echo $patient_services_list->Editted->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_services_list->PatID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services_list->PatID->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PatID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PatID" class="form-group">
<span<?php echo $patient_services_list->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_list->PatID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_PatID" name="x<?php echo $patient_services_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_list->PatID->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PatID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PatID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_list->RowIndex ?>_PatID" id="x<?php echo $patient_services_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->PatID->EditValue ?>"<?php echo $patient_services_list->PatID->editAttributes() ?>>
</span></script>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="o<?php echo $patient_services_list->RowIndex ?>_PatID" id="o<?php echo $patient_services_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_list->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_services_list->PatID->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PatID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PatID" class="form-group">
<span<?php echo $patient_services_list->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_list->PatID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_services_list->RowIndex ?>_PatID" name="x<?php echo $patient_services_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_list->PatID->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PatID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PatID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_list->RowIndex ?>_PatID" id="x<?php echo $patient_services_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->PatID->EditValue ?>"<?php echo $patient_services_list->PatID->editAttributes() ?>>
</span></script>
<?php } ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PatID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PatID">
<span<?php echo $patient_services_list->PatID->viewAttributes() ?>><?php echo $patient_services_list->PatID->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_services_list->PatientId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PatientId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PatientId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_list->RowIndex ?>_PatientId" id="x<?php echo $patient_services_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->PatientId->EditValue ?>"<?php echo $patient_services_list->PatientId->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="o<?php echo $patient_services_list->RowIndex ?>_PatientId" id="o<?php echo $patient_services_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services_list->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PatientId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PatientId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_list->RowIndex ?>_PatientId" id="x<?php echo $patient_services_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->PatientId->EditValue ?>"<?php echo $patient_services_list->PatientId->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_PatientId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_PatientId">
<span<?php echo $patient_services_list->PatientId->viewAttributes() ?>><?php echo $patient_services_list->PatientId->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $patient_services_list->Mobile->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Mobile" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Mobile" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_list->RowIndex ?>_Mobile" id="x<?php echo $patient_services_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Mobile->EditValue ?>"<?php echo $patient_services_list->Mobile->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="o<?php echo $patient_services_list->RowIndex ?>_Mobile" id="o<?php echo $patient_services_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services_list->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Mobile" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Mobile" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_list->RowIndex ?>_Mobile" id="x<?php echo $patient_services_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Mobile->EditValue ?>"<?php echo $patient_services_list->Mobile->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Mobile" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Mobile">
<span<?php echo $patient_services_list->Mobile->viewAttributes() ?>><?php echo $patient_services_list->Mobile->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->CId->Visible) { // CId ?>
		<td data-name="CId" <?php echo $patient_services_list->CId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_CId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_CId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_list->RowIndex ?>_CId" id="x<?php echo $patient_services_list->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->CId->EditValue ?>"<?php echo $patient_services_list->CId->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="o<?php echo $patient_services_list->RowIndex ?>_CId" id="o<?php echo $patient_services_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services_list->CId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_CId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_CId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_list->RowIndex ?>_CId" id="x<?php echo $patient_services_list->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->CId->EditValue ?>"<?php echo $patient_services_list->CId->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_CId" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_CId">
<span<?php echo $patient_services_list->CId->viewAttributes() ?>><?php echo $patient_services_list->CId->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $patient_services_list->Order->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Order" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Order" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_list->RowIndex ?>_Order" id="x<?php echo $patient_services_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Order->EditValue ?>"<?php echo $patient_services_list->Order->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="o<?php echo $patient_services_list->RowIndex ?>_Order" id="o<?php echo $patient_services_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services_list->Order->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Order" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Order" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_list->RowIndex ?>_Order" id="x<?php echo $patient_services_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Order->EditValue ?>"<?php echo $patient_services_list->Order->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Order" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Order">
<span<?php echo $patient_services_list->Order->viewAttributes() ?>><?php echo $patient_services_list->Order->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType" <?php echo $patient_services_list->ResType->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ResType" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ResType" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_list->RowIndex ?>_ResType" id="x<?php echo $patient_services_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ResType->EditValue ?>"<?php echo $patient_services_list->ResType->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="o<?php echo $patient_services_list->RowIndex ?>_ResType" id="o<?php echo $patient_services_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services_list->ResType->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ResType" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ResType" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_list->RowIndex ?>_ResType" id="x<?php echo $patient_services_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->ResType->EditValue ?>"<?php echo $patient_services_list->ResType->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_ResType" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_ResType">
<span<?php echo $patient_services_list->ResType->viewAttributes() ?>><?php echo $patient_services_list->ResType->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample" <?php echo $patient_services_list->Sample->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Sample" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Sample" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_list->RowIndex ?>_Sample" id="x<?php echo $patient_services_list->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services_list->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Sample->EditValue ?>"<?php echo $patient_services_list->Sample->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="o<?php echo $patient_services_list->RowIndex ?>_Sample" id="o<?php echo $patient_services_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services_list->Sample->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Sample" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Sample" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_list->RowIndex ?>_Sample" id="x<?php echo $patient_services_list->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services_list->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Sample->EditValue ?>"<?php echo $patient_services_list->Sample->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Sample" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Sample">
<span<?php echo $patient_services_list->Sample->viewAttributes() ?>><?php echo $patient_services_list->Sample->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD" <?php echo $patient_services_list->NoD->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_NoD" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_NoD" class="form-group">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_list->RowIndex ?>_NoD" id="x<?php echo $patient_services_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->NoD->EditValue ?>"<?php echo $patient_services_list->NoD->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="o<?php echo $patient_services_list->RowIndex ?>_NoD" id="o<?php echo $patient_services_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services_list->NoD->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_NoD" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_NoD" class="form-group">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_list->RowIndex ?>_NoD" id="x<?php echo $patient_services_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->NoD->EditValue ?>"<?php echo $patient_services_list->NoD->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_NoD" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_NoD">
<span<?php echo $patient_services_list->NoD->viewAttributes() ?>><?php echo $patient_services_list->NoD->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" <?php echo $patient_services_list->BillOrder->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_BillOrder" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_BillOrder" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_list->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->BillOrder->EditValue ?>"<?php echo $patient_services_list->BillOrder->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="o<?php echo $patient_services_list->RowIndex ?>_BillOrder" id="o<?php echo $patient_services_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services_list->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_BillOrder" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_BillOrder" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_list->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->BillOrder->EditValue ?>"<?php echo $patient_services_list->BillOrder->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_BillOrder" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_BillOrder">
<span<?php echo $patient_services_list->BillOrder->viewAttributes() ?>><?php echo $patient_services_list->BillOrder->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" <?php echo $patient_services_list->Inactive->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Inactive" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Inactive" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_list->RowIndex ?>_Inactive" id="x<?php echo $patient_services_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Inactive->EditValue ?>"<?php echo $patient_services_list->Inactive->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="o<?php echo $patient_services_list->RowIndex ?>_Inactive" id="o<?php echo $patient_services_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services_list->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Inactive" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Inactive" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_list->RowIndex ?>_Inactive" id="x<?php echo $patient_services_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Inactive->EditValue ?>"<?php echo $patient_services_list->Inactive->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Inactive" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Inactive">
<span<?php echo $patient_services_list->Inactive->viewAttributes() ?>><?php echo $patient_services_list->Inactive->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" <?php echo $patient_services_list->CollSample->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_CollSample" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_CollSample" class="form-group">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_list->RowIndex ?>_CollSample" id="x<?php echo $patient_services_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->CollSample->EditValue ?>"<?php echo $patient_services_list->CollSample->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="o<?php echo $patient_services_list->RowIndex ?>_CollSample" id="o<?php echo $patient_services_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services_list->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_CollSample" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_CollSample" class="form-group">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_list->RowIndex ?>_CollSample" id="x<?php echo $patient_services_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->CollSample->EditValue ?>"<?php echo $patient_services_list->CollSample->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_CollSample" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_CollSample">
<span<?php echo $patient_services_list->CollSample->viewAttributes() ?>><?php echo $patient_services_list->CollSample->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType" <?php echo $patient_services_list->TestType->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestType" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestType" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_list->RowIndex ?>_TestType" id="x<?php echo $patient_services_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->TestType->EditValue ?>"<?php echo $patient_services_list->TestType->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="o<?php echo $patient_services_list->RowIndex ?>_TestType" id="o<?php echo $patient_services_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services_list->TestType->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestType" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestType" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_list->RowIndex ?>_TestType" id="x<?php echo $patient_services_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->TestType->EditValue ?>"<?php echo $patient_services_list->TestType->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_TestType" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_TestType">
<span<?php echo $patient_services_list->TestType->viewAttributes() ?>><?php echo $patient_services_list->TestType->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" <?php echo $patient_services_list->Repeated->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Repeated" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Repeated" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_list->RowIndex ?>_Repeated" id="x<?php echo $patient_services_list->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Repeated->EditValue ?>"<?php echo $patient_services_list->Repeated->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="o<?php echo $patient_services_list->RowIndex ?>_Repeated" id="o<?php echo $patient_services_list->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services_list->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Repeated" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Repeated" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_list->RowIndex ?>_Repeated" id="x<?php echo $patient_services_list->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Repeated->EditValue ?>"<?php echo $patient_services_list->Repeated->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Repeated" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Repeated">
<span<?php echo $patient_services_list->Repeated->viewAttributes() ?>><?php echo $patient_services_list->Repeated->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy" <?php echo $patient_services_list->RepeatedBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->RepeatedBy->EditValue ?>"<?php echo $patient_services_list->RepeatedBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="o<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" id="o<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services_list->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_list->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->RepeatedBy->EditValue ?>"<?php echo $patient_services_list->RepeatedBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedBy" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedBy">
<span<?php echo $patient_services_list->RepeatedBy->viewAttributes() ?>><?php echo $patient_services_list->RepeatedBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate" <?php echo $patient_services_list->RepeatedDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services_list->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->RepeatedDate->EditValue ?>"<?php echo $patient_services_list->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services_list->RepeatedDate->ReadOnly && !$patient_services_list->RepeatedDate->Disabled && !isset($patient_services_list->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services_list->RepeatedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="o<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" id="o<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services_list->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services_list->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->RepeatedDate->EditValue ?>"<?php echo $patient_services_list->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services_list->RepeatedDate->ReadOnly && !$patient_services_list->RepeatedDate->Disabled && !isset($patient_services_list->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services_list->RepeatedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_serviceslist_js">
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_serviceslist", "x<?php echo $patient_services_list->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedDate" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RepeatedDate">
<span<?php echo $patient_services_list->RepeatedDate->viewAttributes() ?>><?php echo $patient_services_list->RepeatedDate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID" <?php echo $patient_services_list->serviceID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_serviceID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_serviceID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_list->RowIndex ?>_serviceID" id="x<?php echo $patient_services_list->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->serviceID->EditValue ?>"<?php echo $patient_services_list->serviceID->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="o<?php echo $patient_services_list->RowIndex ?>_serviceID" id="o<?php echo $patient_services_list->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services_list->serviceID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_serviceID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_serviceID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_list->RowIndex ?>_serviceID" id="x<?php echo $patient_services_list->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->serviceID->EditValue ?>"<?php echo $patient_services_list->serviceID->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_serviceID" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_serviceID">
<span<?php echo $patient_services_list->serviceID->viewAttributes() ?>><?php echo $patient_services_list->serviceID->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type" <?php echo $patient_services_list->Service_Type->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Type" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Type" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_list->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_list->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Service_Type->EditValue ?>"<?php echo $patient_services_list->Service_Type->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="o<?php echo $patient_services_list->RowIndex ?>_Service_Type" id="o<?php echo $patient_services_list->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services_list->Service_Type->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Type" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Type" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_list->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_list->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Service_Type->EditValue ?>"<?php echo $patient_services_list->Service_Type->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Type" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Type">
<span<?php echo $patient_services_list->Service_Type->viewAttributes() ?>><?php echo $patient_services_list->Service_Type->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department" <?php echo $patient_services_list->Service_Department->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Department" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Department" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_list->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_list->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Service_Department->EditValue ?>"<?php echo $patient_services_list->Service_Department->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="o<?php echo $patient_services_list->RowIndex ?>_Service_Department" id="o<?php echo $patient_services_list->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services_list->Service_Department->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Department" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Department" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_list->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_list->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_list->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->Service_Department->EditValue ?>"<?php echo $patient_services_list->Service_Department->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Department" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_Service_Department">
<span<?php echo $patient_services_list->Service_Department->viewAttributes() ?>><?php echo $patient_services_list->Service_Department->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_list->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo" <?php echo $patient_services_list->RequestNo->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RequestNo" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RequestNo" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_list->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_list->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->RequestNo->EditValue ?>"<?php echo $patient_services_list->RequestNo->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="o<?php echo $patient_services_list->RowIndex ?>_RequestNo" id="o<?php echo $patient_services_list->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services_list->RequestNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RequestNo" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RequestNo" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_list->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_list->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_list->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_list->RequestNo->EditValue ?>"<?php echo $patient_services_list->RequestNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_services_list->RowCount ?>_patient_services_RequestNo" type="text/html"><span id="el<?php echo $patient_services_list->RowCount ?>_patient_services_RequestNo">
<span<?php echo $patient_services_list->RequestNo->viewAttributes() ?>><?php echo $patient_services_list->RequestNo->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_services_list->ListOptions->render("body", "right", $patient_services_list->RowCount, "block", $patient_services->TableVar, "patient_serviceslist");
?>
	</tr>
<?php if ($patient_services->RowType == ROWTYPE_ADD || $patient_services->RowType == ROWTYPE_EDIT) { ?>
<script class="patient_serviceslist_js" type="text/html">
loadjs.ready(["fpatient_serviceslist", "load"], function() {
	fpatient_serviceslist.updateLists(<?php echo $patient_services_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_services_list->isGridAdd())
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
<?php if ($patient_services_list->TotalRecords > 0 && !$patient_services_list->isGridAdd() && !$patient_services_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$patient_services_list->renderListOptions();

// Render list options (footer, left)
$patient_services_list->ListOptions->render("footer", "left", "", "block", $patient_services->TableVar, "patient_serviceslist");
?>
	<?php if ($patient_services_list->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $patient_services_list->id->footerCellClass() ?>"><span id="elf_patient_services_id" class="patient_services_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" class="<?php echo $patient_services_list->Reception->footerCellClass() ?>"><span id="elf_patient_services_Reception" class="patient_services_Reception">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Services->Visible) { // Services ?>
		<td data-name="Services" class="<?php echo $patient_services_list->Services->footerCellClass() ?>"><span id="elf_patient_services_Services" class="patient_services_Services">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->amount->Visible) { // amount ?>
		<td data-name="amount" class="<?php echo $patient_services_list->amount->footerCellClass() ?>"><span id="elf_patient_services_amount" class="patient_services_amount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->description->Visible) { // description ?>
		<td data-name="description" class="<?php echo $patient_services_list->description->footerCellClass() ?>"><span id="elf_patient_services_description" class="patient_services_description">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" class="<?php echo $patient_services_list->patient_type->footerCellClass() ?>"><span id="elf_patient_services_patient_type" class="patient_services_patient_type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" class="<?php echo $patient_services_list->charged_date->footerCellClass() ?>"><span id="elf_patient_services_charged_date" class="patient_services_charged_date">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->status->Visible) { // status ?>
		<td data-name="status" class="<?php echo $patient_services_list->status->footerCellClass() ?>"><span id="elf_patient_services_status" class="patient_services_status">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" class="<?php echo $patient_services_list->mrnno->footerCellClass() ?>"><span id="elf_patient_services_mrnno" class="patient_services_mrnno">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $patient_services_list->PatientName->footerCellClass() ?>"><span id="elf_patient_services_PatientName" class="patient_services_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Age->Visible) { // Age ?>
		<td data-name="Age" class="<?php echo $patient_services_list->Age->footerCellClass() ?>"><span id="elf_patient_services_Age" class="patient_services_Age">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" class="<?php echo $patient_services_list->Gender->footerCellClass() ?>"><span id="elf_patient_services_Gender" class="patient_services_Gender">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit" class="<?php echo $patient_services_list->Unit->footerCellClass() ?>"><span id="elf_patient_services_Unit" class="patient_services_Unit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $patient_services_list->Quantity->footerCellClass() ?>"><span id="elf_patient_services_Quantity" class="patient_services_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Discount->Visible) { // Discount ?>
		<td data-name="Discount" class="<?php echo $patient_services_list->Discount->footerCellClass() ?>"><span id="elf_patient_services_Discount" class="patient_services_Discount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" class="<?php echo $patient_services_list->SubTotal->footerCellClass() ?>"><span id="elf_patient_services_SubTotal" class="patient_services_SubTotal">
		<script id="tpg_patient_services_SubTotal" class="patient_serviceslist" type="text/html"><span<?php echo $patient_services_list->SubTotal->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $patient_services_list->SubTotal->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->ServiceSelect->Visible) { // ServiceSelect ?>
		<td data-name="ServiceSelect" class="<?php echo $patient_services_list->ServiceSelect->footerCellClass() ?>"><span id="elf_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Aid->Visible) { // Aid ?>
		<td data-name="Aid" class="<?php echo $patient_services_list->Aid->footerCellClass() ?>"><span id="elf_patient_services_Aid" class="patient_services_Aid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Vid->Visible) { // Vid ?>
		<td data-name="Vid" class="<?php echo $patient_services_list->Vid->footerCellClass() ?>"><span id="elf_patient_services_Vid" class="patient_services_Vid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID" class="<?php echo $patient_services_list->DrID->footerCellClass() ?>"><span id="elf_patient_services_DrID" class="patient_services_DrID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" class="<?php echo $patient_services_list->DrCODE->footerCellClass() ?>"><span id="elf_patient_services_DrCODE" class="patient_services_DrCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName" class="<?php echo $patient_services_list->DrName->footerCellClass() ?>"><span id="elf_patient_services_DrName" class="patient_services_DrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Department->Visible) { // Department ?>
		<td data-name="Department" class="<?php echo $patient_services_list->Department->footerCellClass() ?>"><span id="elf_patient_services_Department" class="patient_services_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres" class="<?php echo $patient_services_list->DrSharePres->footerCellClass() ?>"><span id="elf_patient_services_DrSharePres" class="patient_services_DrSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres" class="<?php echo $patient_services_list->HospSharePres->footerCellClass() ?>"><span id="elf_patient_services_HospSharePres" class="patient_services_HospSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" class="<?php echo $patient_services_list->DrShareAmount->footerCellClass() ?>"><span id="elf_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" class="<?php echo $patient_services_list->HospShareAmount->footerCellClass() ?>"><span id="elf_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount" class="<?php echo $patient_services_list->DrShareSettiledAmount->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId" class="<?php echo $patient_services_list->DrShareSettledId->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus" class="<?php echo $patient_services_list->DrShareSettiledStatus->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" class="<?php echo $patient_services_list->invoiceId->footerCellClass() ?>"><span id="elf_patient_services_invoiceId" class="patient_services_invoiceId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" class="<?php echo $patient_services_list->invoiceAmount->footerCellClass() ?>"><span id="elf_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" class="<?php echo $patient_services_list->invoiceStatus->footerCellClass() ?>"><span id="elf_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" class="<?php echo $patient_services_list->modeOfPayment->footerCellClass() ?>"><span id="elf_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $patient_services_list->HospID->footerCellClass() ?>"><span id="elf_patient_services_HospID" class="patient_services_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" class="<?php echo $patient_services_list->RIDNO->footerCellClass() ?>"><span id="elf_patient_services_RIDNO" class="patient_services_RIDNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" class="<?php echo $patient_services_list->TidNo->footerCellClass() ?>"><span id="elf_patient_services_TidNo" class="patient_services_TidNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory" class="<?php echo $patient_services_list->DiscountCategory->footerCellClass() ?>"><span id="elf_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->sid->Visible) { // sid ?>
		<td data-name="sid" class="<?php echo $patient_services_list->sid->footerCellClass() ?>"><span id="elf_patient_services_sid" class="patient_services_sid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" class="<?php echo $patient_services_list->ItemCode->footerCellClass() ?>"><span id="elf_patient_services_ItemCode" class="patient_services_ItemCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" class="<?php echo $patient_services_list->TestSubCd->footerCellClass() ?>"><span id="elf_patient_services_TestSubCd" class="patient_services_TestSubCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" class="<?php echo $patient_services_list->DEptCd->footerCellClass() ?>"><span id="elf_patient_services_DEptCd" class="patient_services_DEptCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" class="<?php echo $patient_services_list->ProfCd->footerCellClass() ?>"><span id="elf_patient_services_ProfCd" class="patient_services_ProfCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Comments->Visible) { // Comments ?>
		<td data-name="Comments" class="<?php echo $patient_services_list->Comments->footerCellClass() ?>"><span id="elf_patient_services_Comments" class="patient_services_Comments">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Method->Visible) { // Method ?>
		<td data-name="Method" class="<?php echo $patient_services_list->Method->footerCellClass() ?>"><span id="elf_patient_services_Method" class="patient_services_Method">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" class="<?php echo $patient_services_list->Specimen->footerCellClass() ?>"><span id="elf_patient_services_Specimen" class="patient_services_Specimen">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" class="<?php echo $patient_services_list->Abnormal->footerCellClass() ?>"><span id="elf_patient_services_Abnormal" class="patient_services_Abnormal">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" class="<?php echo $patient_services_list->TestUnit->footerCellClass() ?>"><span id="elf_patient_services_TestUnit" class="patient_services_TestUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" class="<?php echo $patient_services_list->LOWHIGH->footerCellClass() ?>"><span id="elf_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Branch->Visible) { // Branch ?>
		<td data-name="Branch" class="<?php echo $patient_services_list->Branch->footerCellClass() ?>"><span id="elf_patient_services_Branch" class="patient_services_Branch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" class="<?php echo $patient_services_list->Dispatch->footerCellClass() ?>"><span id="elf_patient_services_Dispatch" class="patient_services_Dispatch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" class="<?php echo $patient_services_list->Pic1->footerCellClass() ?>"><span id="elf_patient_services_Pic1" class="patient_services_Pic1">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" class="<?php echo $patient_services_list->Pic2->footerCellClass() ?>"><span id="elf_patient_services_Pic2" class="patient_services_Pic2">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" class="<?php echo $patient_services_list->GraphPath->footerCellClass() ?>"><span id="elf_patient_services_GraphPath" class="patient_services_GraphPath">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" class="<?php echo $patient_services_list->MachineCD->footerCellClass() ?>"><span id="elf_patient_services_MachineCD" class="patient_services_MachineCD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" class="<?php echo $patient_services_list->TestCancel->footerCellClass() ?>"><span id="elf_patient_services_TestCancel" class="patient_services_TestCancel">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" class="<?php echo $patient_services_list->OutSource->footerCellClass() ?>"><span id="elf_patient_services_OutSource" class="patient_services_OutSource">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Printed->Visible) { // Printed ?>
		<td data-name="Printed" class="<?php echo $patient_services_list->Printed->footerCellClass() ?>"><span id="elf_patient_services_Printed" class="patient_services_Printed">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" class="<?php echo $patient_services_list->PrintBy->footerCellClass() ?>"><span id="elf_patient_services_PrintBy" class="patient_services_PrintBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" class="<?php echo $patient_services_list->PrintDate->footerCellClass() ?>"><span id="elf_patient_services_PrintDate" class="patient_services_PrintDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate" class="<?php echo $patient_services_list->BillingDate->footerCellClass() ?>"><span id="elf_patient_services_BillingDate" class="patient_services_BillingDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy" class="<?php echo $patient_services_list->BilledBy->footerCellClass() ?>"><span id="elf_patient_services_BilledBy" class="patient_services_BilledBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" class="<?php echo $patient_services_list->Resulted->footerCellClass() ?>"><span id="elf_patient_services_Resulted" class="patient_services_Resulted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" class="<?php echo $patient_services_list->ResultDate->footerCellClass() ?>"><span id="elf_patient_services_ResultDate" class="patient_services_ResultDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" class="<?php echo $patient_services_list->ResultedBy->footerCellClass() ?>"><span id="elf_patient_services_ResultedBy" class="patient_services_ResultedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" class="<?php echo $patient_services_list->SampleDate->footerCellClass() ?>"><span id="elf_patient_services_SampleDate" class="patient_services_SampleDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" class="<?php echo $patient_services_list->SampleUser->footerCellClass() ?>"><span id="elf_patient_services_SampleUser" class="patient_services_SampleUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled" class="<?php echo $patient_services_list->Sampled->footerCellClass() ?>"><span id="elf_patient_services_Sampled" class="patient_services_Sampled">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" class="<?php echo $patient_services_list->ReceivedDate->footerCellClass() ?>"><span id="elf_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" class="<?php echo $patient_services_list->ReceivedUser->footerCellClass() ?>"><span id="elf_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied" class="<?php echo $patient_services_list->Recevied->footerCellClass() ?>"><span id="elf_patient_services_Recevied" class="patient_services_Recevied">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" class="<?php echo $patient_services_list->DeptRecvDate->footerCellClass() ?>"><span id="elf_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" class="<?php echo $patient_services_list->DeptRecvUser->footerCellClass() ?>"><span id="elf_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived" class="<?php echo $patient_services_list->DeptRecived->footerCellClass() ?>"><span id="elf_patient_services_DeptRecived" class="patient_services_DeptRecived">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" class="<?php echo $patient_services_list->SAuthDate->footerCellClass() ?>"><span id="elf_patient_services_SAuthDate" class="patient_services_SAuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" class="<?php echo $patient_services_list->SAuthBy->footerCellClass() ?>"><span id="elf_patient_services_SAuthBy" class="patient_services_SAuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate" class="<?php echo $patient_services_list->SAuthendicate->footerCellClass() ?>"><span id="elf_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" class="<?php echo $patient_services_list->AuthDate->footerCellClass() ?>"><span id="elf_patient_services_AuthDate" class="patient_services_AuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" class="<?php echo $patient_services_list->AuthBy->footerCellClass() ?>"><span id="elf_patient_services_AuthBy" class="patient_services_AuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate" class="<?php echo $patient_services_list->Authencate->footerCellClass() ?>"><span id="elf_patient_services_Authencate" class="patient_services_Authencate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" class="<?php echo $patient_services_list->EditDate->footerCellClass() ?>"><span id="elf_patient_services_EditDate" class="patient_services_EditDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy" class="<?php echo $patient_services_list->EditBy->footerCellClass() ?>"><span id="elf_patient_services_EditBy" class="patient_services_EditBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Editted->Visible) { // Editted ?>
		<td data-name="Editted" class="<?php echo $patient_services_list->Editted->footerCellClass() ?>"><span id="elf_patient_services_Editted" class="patient_services_Editted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" class="<?php echo $patient_services_list->PatID->footerCellClass() ?>"><span id="elf_patient_services_PatID" class="patient_services_PatID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $patient_services_list->PatientId->footerCellClass() ?>"><span id="elf_patient_services_PatientId" class="patient_services_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $patient_services_list->Mobile->footerCellClass() ?>"><span id="elf_patient_services_Mobile" class="patient_services_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->CId->Visible) { // CId ?>
		<td data-name="CId" class="<?php echo $patient_services_list->CId->footerCellClass() ?>"><span id="elf_patient_services_CId" class="patient_services_CId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Order->Visible) { // Order ?>
		<td data-name="Order" class="<?php echo $patient_services_list->Order->footerCellClass() ?>"><span id="elf_patient_services_Order" class="patient_services_Order">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType" class="<?php echo $patient_services_list->ResType->footerCellClass() ?>"><span id="elf_patient_services_ResType" class="patient_services_ResType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample" class="<?php echo $patient_services_list->Sample->footerCellClass() ?>"><span id="elf_patient_services_Sample" class="patient_services_Sample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD" class="<?php echo $patient_services_list->NoD->footerCellClass() ?>"><span id="elf_patient_services_NoD" class="patient_services_NoD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" class="<?php echo $patient_services_list->BillOrder->footerCellClass() ?>"><span id="elf_patient_services_BillOrder" class="patient_services_BillOrder">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" class="<?php echo $patient_services_list->Inactive->footerCellClass() ?>"><span id="elf_patient_services_Inactive" class="patient_services_Inactive">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" class="<?php echo $patient_services_list->CollSample->footerCellClass() ?>"><span id="elf_patient_services_CollSample" class="patient_services_CollSample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType" class="<?php echo $patient_services_list->TestType->footerCellClass() ?>"><span id="elf_patient_services_TestType" class="patient_services_TestType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" class="<?php echo $patient_services_list->Repeated->footerCellClass() ?>"><span id="elf_patient_services_Repeated" class="patient_services_Repeated">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy" class="<?php echo $patient_services_list->RepeatedBy->footerCellClass() ?>"><span id="elf_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate" class="<?php echo $patient_services_list->RepeatedDate->footerCellClass() ?>"><span id="elf_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID" class="<?php echo $patient_services_list->serviceID->footerCellClass() ?>"><span id="elf_patient_services_serviceID" class="patient_services_serviceID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type" class="<?php echo $patient_services_list->Service_Type->footerCellClass() ?>"><span id="elf_patient_services_Service_Type" class="patient_services_Service_Type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department" class="<?php echo $patient_services_list->Service_Department->footerCellClass() ?>"><span id="elf_patient_services_Service_Department" class="patient_services_Service_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_list->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo" class="<?php echo $patient_services_list->RequestNo->footerCellClass() ?>"><span id="elf_patient_services_RequestNo" class="patient_services_RequestNo">
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
<div id="tpd_patient_serviceslist" class="ew-custom-template"></div>
<script id="tpm_patient_serviceslist" type="text/html">
<div id="ct_patient_services_list"><?php if ($patient_services_list->RowCount > 0) { ?>
<table class="ew-table">
  <thead>
	<tr class="ew-table-header">
	<th  class="text-center" >*</th>
	  <th  class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_Services")/}}</th>
	  <th  class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_amount")/}}</th>
	  <th  class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_ServiceSelect")/}}</th>
	  <th  class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_Quantity")/}}</th>
	  <th  class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_Discount")/}}</th>
	  <th  class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_SubTotal")/}}</th>
	  <th  class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_description")/}}</th>
	   <th hidden class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_serviceID")/}}</th>
	    <th hidden class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_Service_Type")/}}</th>
	     <th hidden class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_Service_Department")/}}</th>
	     <th  class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_sid")/}}</th>
	     <th  class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_services_ItemCode")/}}</th>
	</tr>
  </thead>
  <tbody>
<?php for ($i = $patient_services_list->StartRowCount; $i <= $patient_services_list->RowCount; $i++) { ?>
<tr>
<td class="ew-list-option-body text-nowrap" data-name="button" rowspan="1"><div style="width: 25px;"><div class="btn-group btn-group-sm ew-btn-group"><a class="btn btn-default ew-grid-link ew-grid-delete" id="RowDeleteButton<?php echo $i ?>" title="" data-caption="Delete" onclick="return ew.deleteGridRow(this, <?php echo $i ?>);" data-original-title="Delete"><i data-phrase="DeleteLink" class="fa fa-trash ew-icon" data-caption="Delete"></i></a></div></div></td>
	  <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_Services")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_amount")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_ServiceSelect")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_Quantity")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_Discount")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_SubTotal")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_description")/}}</td>
	   <td hidden >{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_serviceID")/}}</td>
	   <td hidden >{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_Service_Type")/}}</td>
	   <td hidden >{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_Service_Department")/}}</td>
	    <td  >{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_sid")/}}</td>
	     <td  >{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_services_ItemCode")/}}</td>
</tr>

<?php } ?>
</tbody>
	<?php if ($patient_services_list->TotalRecords > 0 && !$patient_services->isGridAdd() && !$patient_services->isGridEdit()) { ?>
<tfoot>
		<tr class="ew-table-footer">{{include tmpl=~getTemplate("#tpof_patient_services")/}}
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>{{include tmpl=~getTemplate("#tpg_patient_services_SubTotal")/}}</td>
			<td>&nbsp;</td>
		</tr>
	</tfoot>
<?php } ?>
</table>
<?php } ?>
</div>
</script>

</div><!-- /.ew-grid-middle-panel -->
<?php if ($patient_services_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $patient_services_list->FormKeyCountName ?>" id="<?php echo $patient_services_list->FormKeyCountName ?>" value="<?php echo $patient_services_list->KeyCount ?>">
<?php echo $patient_services_list->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_services_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $patient_services_list->FormKeyCountName ?>" id="<?php echo $patient_services_list->FormKeyCountName ?>" value="<?php echo $patient_services_list->KeyCount ?>">
<?php echo $patient_services_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$patient_services->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_services_list->Recordset)
	$patient_services_list->Recordset->Close();
?>
<?php if (!$patient_services_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_services_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_services_list->Pager->render() ?>
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
<?php if ($patient_services_list->TotalRecords == 0 && !$patient_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_services->Rows) ?> };
	ew.applyTemplate("tpd_patient_serviceslist", "tpm_patient_serviceslist", "patient_serviceslist", "<?php echo $patient_services->CustomExport ?>", ew.templateData);
	$("#tpd_patient_serviceslist th.ew-list-option-header").each(function() {
		this.rowSpan = 2;
	});
	$("#tpd_patient_serviceslist td.ew-list-option-body").each(function() {
		this.rowSpan = 2;
	});
	$("script.patient_serviceslist_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_services_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_services_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
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
});
</script>
<?php if (!$patient_services->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_services",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_services_list->terminate();
?>