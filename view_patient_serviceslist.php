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
$view_patient_services_list = new view_patient_services_list();

// Run the page
$view_patient_services_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_services_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_patient_services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_patient_serviceslist = currentForm = new ew.Form("fview_patient_serviceslist", "list");
fview_patient_serviceslist.formKeyCountName = '<?php echo $view_patient_services_list->FormKeyCountName ?>';

// Validate form
fview_patient_serviceslist.validate = function() {
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
		<?php if ($view_patient_services_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->id->caption(), $view_patient_services->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Reception->caption(), $view_patient_services->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->mrnno->caption(), $view_patient_services->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PatientName->caption(), $view_patient_services->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Age->caption(), $view_patient_services->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Gender->caption(), $view_patient_services->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->profilePic->caption(), $view_patient_services->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Services->caption(), $view_patient_services->Services->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Unit->caption(), $view_patient_services->Unit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Unit->errorMessage()) ?>");
		<?php if ($view_patient_services_list->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->amount->caption(), $view_patient_services->amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->amount->errorMessage()) ?>");
		<?php if ($view_patient_services_list->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Quantity->caption(), $view_patient_services->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Quantity->errorMessage()) ?>");
		<?php if ($view_patient_services_list->DiscountCategory->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountCategory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DiscountCategory->caption(), $view_patient_services->DiscountCategory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Discount->caption(), $view_patient_services->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Discount->errorMessage()) ?>");
		<?php if ($view_patient_services_list->SubTotal->Required) { ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SubTotal->caption(), $view_patient_services->SubTotal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->SubTotal->errorMessage()) ?>");
		<?php if ($view_patient_services_list->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->description->caption(), $view_patient_services->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->patient_type->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->patient_type->caption(), $view_patient_services->patient_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->charged_date->Required) { ?>
			elm = this.getElements("x" + infix + "_charged_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->charged_date->caption(), $view_patient_services->charged_date->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->status->caption(), $view_patient_services->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->createdby->caption(), $view_patient_services->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->createddatetime->caption(), $view_patient_services->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->modifiedby->caption(), $view_patient_services->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->modifieddatetime->caption(), $view_patient_services->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Aid->Required) { ?>
			elm = this.getElements("x" + infix + "_Aid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Aid->caption(), $view_patient_services->Aid->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Vid->caption(), $view_patient_services->Vid->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrID->caption(), $view_patient_services->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->DrCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_DrCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrCODE->caption(), $view_patient_services->DrCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrName->caption(), $view_patient_services->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Department->caption(), $view_patient_services->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->DrSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrSharePres->caption(), $view_patient_services->DrSharePres->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrSharePres->errorMessage()) ?>");
		<?php if ($view_patient_services_list->HospSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->HospSharePres->caption(), $view_patient_services->HospSharePres->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->HospSharePres->errorMessage()) ?>");
		<?php if ($view_patient_services_list->DrShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareAmount->caption(), $view_patient_services->DrShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_list->HospShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->HospShareAmount->caption(), $view_patient_services->HospShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->HospShareAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_list->DrShareSettiledAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareSettiledAmount->caption(), $view_patient_services->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareSettiledAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_list->DrShareSettledId->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareSettledId->caption(), $view_patient_services->DrShareSettledId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareSettledId->errorMessage()) ?>");
		<?php if ($view_patient_services_list->DrShareSettiledStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareSettiledStatus->caption(), $view_patient_services->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareSettiledStatus->errorMessage()) ?>");
		<?php if ($view_patient_services_list->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->invoiceId->caption(), $view_patient_services->invoiceId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->invoiceId->errorMessage()) ?>");
		<?php if ($view_patient_services_list->invoiceAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->invoiceAmount->caption(), $view_patient_services->invoiceAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->invoiceAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_list->invoiceStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->invoiceStatus->caption(), $view_patient_services->invoiceStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->modeOfPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_modeOfPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->modeOfPayment->caption(), $view_patient_services->modeOfPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->HospID->caption(), $view_patient_services->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->RIDNO->caption(), $view_patient_services->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->RIDNO->errorMessage()) ?>");
		<?php if ($view_patient_services_list->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ItemCode->caption(), $view_patient_services->ItemCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TidNo->caption(), $view_patient_services->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->TidNo->errorMessage()) ?>");
		<?php if ($view_patient_services_list->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->sid->caption(), $view_patient_services->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->sid->errorMessage()) ?>");
		<?php if ($view_patient_services_list->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestSubCd->caption(), $view_patient_services->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DEptCd->caption(), $view_patient_services->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->ProfCd->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ProfCd->caption(), $view_patient_services->ProfCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Comments->Required) { ?>
			elm = this.getElements("x" + infix + "_Comments");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Comments->caption(), $view_patient_services->Comments->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Method->caption(), $view_patient_services->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Specimen->Required) { ?>
			elm = this.getElements("x" + infix + "_Specimen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Specimen->caption(), $view_patient_services->Specimen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Abnormal->Required) { ?>
			elm = this.getElements("x" + infix + "_Abnormal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Abnormal->caption(), $view_patient_services->Abnormal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->TestUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_TestUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestUnit->caption(), $view_patient_services->TestUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->LOWHIGH->Required) { ?>
			elm = this.getElements("x" + infix + "_LOWHIGH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->LOWHIGH->caption(), $view_patient_services->LOWHIGH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Branch->Required) { ?>
			elm = this.getElements("x" + infix + "_Branch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Branch->caption(), $view_patient_services->Branch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Dispatch->Required) { ?>
			elm = this.getElements("x" + infix + "_Dispatch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Dispatch->caption(), $view_patient_services->Dispatch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Pic1->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Pic1->caption(), $view_patient_services->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Pic2->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Pic2->caption(), $view_patient_services->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->GraphPath->Required) { ?>
			elm = this.getElements("x" + infix + "_GraphPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->GraphPath->caption(), $view_patient_services->GraphPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->MachineCD->Required) { ?>
			elm = this.getElements("x" + infix + "_MachineCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->MachineCD->caption(), $view_patient_services->MachineCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->TestCancel->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCancel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestCancel->caption(), $view_patient_services->TestCancel->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->OutSource->Required) { ?>
			elm = this.getElements("x" + infix + "_OutSource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->OutSource->caption(), $view_patient_services->OutSource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Printed->Required) { ?>
			elm = this.getElements("x" + infix + "_Printed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Printed->caption(), $view_patient_services->Printed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->PrintBy->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PrintBy->caption(), $view_patient_services->PrintBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->PrintDate->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PrintDate->caption(), $view_patient_services->PrintDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->PrintDate->errorMessage()) ?>");
		<?php if ($view_patient_services_list->BillingDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->BillingDate->caption(), $view_patient_services->BillingDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->BillingDate->errorMessage()) ?>");
		<?php if ($view_patient_services_list->BilledBy->Required) { ?>
			elm = this.getElements("x" + infix + "_BilledBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->BilledBy->caption(), $view_patient_services->BilledBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Resulted->Required) { ?>
			elm = this.getElements("x" + infix + "_Resulted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Resulted->caption(), $view_patient_services->Resulted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ResultDate->caption(), $view_patient_services->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->ResultDate->errorMessage()) ?>");
		<?php if ($view_patient_services_list->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ResultedBy->caption(), $view_patient_services->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->SampleDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SampleDate->caption(), $view_patient_services->SampleDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->SampleDate->errorMessage()) ?>");
		<?php if ($view_patient_services_list->SampleUser->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SampleUser->caption(), $view_patient_services->SampleUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Sampled->Required) { ?>
			elm = this.getElements("x" + infix + "_Sampled");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Sampled->caption(), $view_patient_services->Sampled->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->ReceivedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ReceivedDate->caption(), $view_patient_services->ReceivedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->ReceivedDate->errorMessage()) ?>");
		<?php if ($view_patient_services_list->ReceivedUser->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ReceivedUser->caption(), $view_patient_services->ReceivedUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Recevied->Required) { ?>
			elm = this.getElements("x" + infix + "_Recevied");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Recevied->caption(), $view_patient_services->Recevied->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->DeptRecvDate->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DeptRecvDate->caption(), $view_patient_services->DeptRecvDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DeptRecvDate->errorMessage()) ?>");
		<?php if ($view_patient_services_list->DeptRecvUser->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DeptRecvUser->caption(), $view_patient_services->DeptRecvUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->DeptRecived->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecived");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DeptRecived->caption(), $view_patient_services->DeptRecived->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->SAuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SAuthDate->caption(), $view_patient_services->SAuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->SAuthDate->errorMessage()) ?>");
		<?php if ($view_patient_services_list->SAuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SAuthBy->caption(), $view_patient_services->SAuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->SAuthendicate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthendicate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SAuthendicate->caption(), $view_patient_services->SAuthendicate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->AuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->AuthDate->caption(), $view_patient_services->AuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->AuthDate->errorMessage()) ?>");
		<?php if ($view_patient_services_list->AuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->AuthBy->caption(), $view_patient_services->AuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Authencate->Required) { ?>
			elm = this.getElements("x" + infix + "_Authencate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Authencate->caption(), $view_patient_services->Authencate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->EditDate->Required) { ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->EditDate->caption(), $view_patient_services->EditDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->EditDate->errorMessage()) ?>");
		<?php if ($view_patient_services_list->EditBy->Required) { ?>
			elm = this.getElements("x" + infix + "_EditBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->EditBy->caption(), $view_patient_services->EditBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Editted->Required) { ?>
			elm = this.getElements("x" + infix + "_Editted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Editted->caption(), $view_patient_services->Editted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PatID->caption(), $view_patient_services->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->PatID->errorMessage()) ?>");
		<?php if ($view_patient_services_list->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PatientId->caption(), $view_patient_services->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Mobile->caption(), $view_patient_services->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->CId->caption(), $view_patient_services->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->CId->errorMessage()) ?>");
		<?php if ($view_patient_services_list->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Order->caption(), $view_patient_services->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Order->errorMessage()) ?>");
		<?php if ($view_patient_services_list->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ResType->caption(), $view_patient_services->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Sample->caption(), $view_patient_services->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->NoD->caption(), $view_patient_services->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->NoD->errorMessage()) ?>");
		<?php if ($view_patient_services_list->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->BillOrder->caption(), $view_patient_services->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->BillOrder->errorMessage()) ?>");
		<?php if ($view_patient_services_list->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Inactive->caption(), $view_patient_services->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->CollSample->caption(), $view_patient_services->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestType->caption(), $view_patient_services->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Repeated->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Repeated->caption(), $view_patient_services->Repeated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->RepeatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->RepeatedBy->caption(), $view_patient_services->RepeatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->RepeatedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->RepeatedDate->caption(), $view_patient_services->RepeatedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->RepeatedDate->errorMessage()) ?>");
		<?php if ($view_patient_services_list->serviceID->Required) { ?>
			elm = this.getElements("x" + infix + "_serviceID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->serviceID->caption(), $view_patient_services->serviceID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_serviceID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->serviceID->errorMessage()) ?>");
		<?php if ($view_patient_services_list->Service_Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Service_Type->caption(), $view_patient_services->Service_Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->Service_Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Service_Department->caption(), $view_patient_services->Service_Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_list->RequestNo->Required) { ?>
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
		} // End Grid Add checking
	}
	if (gridinsert && addcnt == 0) { // No row added
		ew.alert(ew.language.phrase("NoAddRecord"));
		return false;
	}
	return true;
}

// Check empty row
fview_patient_serviceslist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "profilePic", false)) return false;
	if (ew.valueChanged(fobj, infix, "Services", false)) return false;
	if (ew.valueChanged(fobj, infix, "Unit", false)) return false;
	if (ew.valueChanged(fobj, infix, "amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "DiscountCategory", false)) return false;
	if (ew.valueChanged(fobj, infix, "Discount", false)) return false;
	if (ew.valueChanged(fobj, infix, "SubTotal", false)) return false;
	if (ew.valueChanged(fobj, infix, "description", false)) return false;
	if (ew.valueChanged(fobj, infix, "patient_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "charged_date", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
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
	if (ew.valueChanged(fobj, infix, "ItemCode", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "sid", false)) return false;
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
fview_patient_serviceslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_patient_serviceslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_patient_serviceslist.lists["x_Services"] = <?php echo $view_patient_services_list->Services->Lookup->toClientList() ?>;
fview_patient_serviceslist.lists["x_Services"].options = <?php echo JsonEncode($view_patient_services_list->Services->lookupOptions()) ?>;
fview_patient_serviceslist.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_patient_serviceslist.lists["x_DiscountCategory"] = <?php echo $view_patient_services_list->DiscountCategory->Lookup->toClientList() ?>;
fview_patient_serviceslist.lists["x_DiscountCategory"].options = <?php echo JsonEncode($view_patient_services_list->DiscountCategory->lookupOptions()) ?>;

// Form object for search
var fview_patient_serviceslistsrch = currentSearchForm = new ew.Form("fview_patient_serviceslistsrch");

// Filters
fview_patient_serviceslistsrch.filterList = <?php echo $view_patient_services_list->getFilterList() ?>;
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
<?php if (!$view_patient_services->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_patient_services_list->TotalRecs > 0 && $view_patient_services_list->ExportOptions->visible()) { ?>
<?php $view_patient_services_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_services_list->ImportOptions->visible()) { ?>
<?php $view_patient_services_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_services_list->SearchOptions->visible()) { ?>
<?php $view_patient_services_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_services_list->FilterOptions->visible()) { ?>
<?php $view_patient_services_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_patient_services->isExport() || EXPORT_MASTER_RECORD && $view_patient_services->isExport("print")) { ?>
<?php
if ($view_patient_services_list->DbMasterFilter <> "" && $view_patient_services->getCurrentMasterTable() == "view_billing_voucher") {
	if ($view_patient_services_list->MasterRecordExists) {
		include_once "view_billing_vouchermaster.php";
	}
}
?>
<?php
if ($view_patient_services_list->DbMasterFilter <> "" && $view_patient_services->getCurrentMasterTable() == "view_billing_voucher_print") {
	if ($view_patient_services_list->MasterRecordExists) {
		include_once "view_billing_voucher_printmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_patient_services_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_patient_services->isExport() && !$view_patient_services->CurrentAction) { ?>
<form name="fview_patient_serviceslistsrch" id="fview_patient_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_patient_services_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_patient_serviceslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_services">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_patient_services_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_patient_services_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_patient_services_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_patient_services_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_patient_services_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_patient_services_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_patient_services_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_patient_services_list->showPageHeader(); ?>
<?php
$view_patient_services_list->showMessage();
?>
<?php if ($view_patient_services_list->TotalRecs > 0 || $view_patient_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_patient_services_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_services">
<?php if (!$view_patient_services->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_patient_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_patient_services_list->Pager)) $view_patient_services_list->Pager = new NumericPager($view_patient_services_list->StartRec, $view_patient_services_list->DisplayRecs, $view_patient_services_list->TotalRecs, $view_patient_services_list->RecRange, $view_patient_services_list->AutoHidePager) ?>
<?php if ($view_patient_services_list->Pager->RecordCount > 0 && $view_patient_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_patient_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_list->pageUrl() ?>start=<?php echo $view_patient_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_list->pageUrl() ?>start=<?php echo $view_patient_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_patient_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_patient_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_list->pageUrl() ?>start=<?php echo $view_patient_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_list->pageUrl() ?>start=<?php echo $view_patient_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_patient_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_patient_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_patient_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_patient_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_patient_services_list->TotalRecs > 0 && (!$view_patient_services_list->AutoHidePageSizeSelector || $view_patient_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_patient_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_patient_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_patient_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_patient_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_patient_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_patient_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_patient_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_patient_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_patient_serviceslist" id="fview_patient_serviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_patient_services_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_patient_services_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_services">
<?php if ($view_patient_services->getCurrentMasterTable() == "view_billing_voucher" && $view_patient_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_billing_voucher">
<input type="hidden" name="fk_id" value="<?php echo $view_patient_services->Vid->getSessionValue() ?>">
<?php } ?>
<?php if ($view_patient_services->getCurrentMasterTable() == "view_billing_voucher_print" && $view_patient_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_billing_voucher_print">
<input type="hidden" name="fk_id" value="<?php echo $view_patient_services->Vid->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_patient_services" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_patient_services_list->TotalRecs > 0 || $view_patient_services->isGridEdit()) { ?>
<table id="tbl_view_patient_serviceslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_patient_services_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_patient_services_list->renderListOptions();

// Render list options (header, left)
$view_patient_services_list->ListOptions->render("header", "left");
?>
<?php if ($view_patient_services->id->Visible) { // id ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_patient_services->id->headerCellClass() ?>"><div id="elh_view_patient_services_id" class="view_patient_services_id"><div class="ew-table-header-caption"><?php echo $view_patient_services->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_patient_services->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->id) ?>',1);"><div id="elh_view_patient_services_id" class="view_patient_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Reception->Visible) { // Reception ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_patient_services->Reception->headerCellClass() ?>"><div id="elh_view_patient_services_Reception" class="view_patient_services_Reception"><div class="ew-table-header-caption"><?php echo $view_patient_services->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_patient_services->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Reception) ?>',1);"><div id="elh_view_patient_services_Reception" class="view_patient_services_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->mrnno->Visible) { // mrnno ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_services->mrnno->headerCellClass() ?>"><div id="elh_view_patient_services_mrnno" class="view_patient_services_mrnno"><div class="ew-table-header-caption"><?php echo $view_patient_services->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_services->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->mrnno) ?>',1);"><div id="elh_view_patient_services_mrnno" class="view_patient_services_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PatientName->Visible) { // PatientName ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_services->PatientName->headerCellClass() ?>"><div id="elh_view_patient_services_PatientName" class="view_patient_services_PatientName"><div class="ew-table-header-caption"><?php echo $view_patient_services->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_services->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->PatientName) ?>',1);"><div id="elh_view_patient_services_PatientName" class="view_patient_services_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Age->Visible) { // Age ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_patient_services->Age->headerCellClass() ?>"><div id="elh_view_patient_services_Age" class="view_patient_services_Age"><div class="ew-table-header-caption"><?php echo $view_patient_services->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_patient_services->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Age) ?>',1);"><div id="elh_view_patient_services_Age" class="view_patient_services_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Gender->Visible) { // Gender ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_patient_services->Gender->headerCellClass() ?>"><div id="elh_view_patient_services_Gender" class="view_patient_services_Gender"><div class="ew-table-header-caption"><?php echo $view_patient_services->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_patient_services->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Gender) ?>',1);"><div id="elh_view_patient_services_Gender" class="view_patient_services_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->profilePic->Visible) { // profilePic ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_services->profilePic->headerCellClass() ?>"><div id="elh_view_patient_services_profilePic" class="view_patient_services_profilePic"><div class="ew-table-header-caption"><?php echo $view_patient_services->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_services->profilePic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->profilePic) ?>',1);"><div id="elh_view_patient_services_profilePic" class="view_patient_services_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Services->Visible) { // Services ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_patient_services->Services->headerCellClass() ?>"><div id="elh_view_patient_services_Services" class="view_patient_services_Services"><div class="ew-table-header-caption"><?php echo $view_patient_services->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_patient_services->Services->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Services) ?>',1);"><div id="elh_view_patient_services_Services" class="view_patient_services_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Services->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Unit->Visible) { // Unit ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $view_patient_services->Unit->headerCellClass() ?>"><div id="elh_view_patient_services_Unit" class="view_patient_services_Unit"><div class="ew-table-header-caption"><?php echo $view_patient_services->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $view_patient_services->Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Unit) ?>',1);"><div id="elh_view_patient_services_Unit" class="view_patient_services_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->amount->Visible) { // amount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $view_patient_services->amount->headerCellClass() ?>"><div id="elh_view_patient_services_amount" class="view_patient_services_amount"><div class="ew-table-header-caption"><?php echo $view_patient_services->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $view_patient_services->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->amount) ?>',1);"><div id="elh_view_patient_services_amount" class="view_patient_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Quantity->Visible) { // Quantity ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_patient_services->Quantity->headerCellClass() ?>"><div id="elh_view_patient_services_Quantity" class="view_patient_services_Quantity"><div class="ew-table-header-caption"><?php echo $view_patient_services->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_patient_services->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Quantity) ?>',1);"><div id="elh_view_patient_services_Quantity" class="view_patient_services_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DiscountCategory) == "") { ?>
		<th data-name="DiscountCategory" class="<?php echo $view_patient_services->DiscountCategory->headerCellClass() ?>"><div id="elh_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory"><div class="ew-table-header-caption"><?php echo $view_patient_services->DiscountCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountCategory" class="<?php echo $view_patient_services->DiscountCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DiscountCategory) ?>',1);"><div id="elh_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DiscountCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DiscountCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DiscountCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Discount->Visible) { // Discount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $view_patient_services->Discount->headerCellClass() ?>"><div id="elh_view_patient_services_Discount" class="view_patient_services_Discount"><div class="ew-table-header-caption"><?php echo $view_patient_services->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $view_patient_services->Discount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Discount) ?>',1);"><div id="elh_view_patient_services_Discount" class="view_patient_services_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Discount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Discount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $view_patient_services->SubTotal->headerCellClass() ?>"><div id="elh_view_patient_services_SubTotal" class="view_patient_services_SubTotal"><div class="ew-table-header-caption"><?php echo $view_patient_services->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $view_patient_services->SubTotal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->SubTotal) ?>',1);"><div id="elh_view_patient_services_SubTotal" class="view_patient_services_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SubTotal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SubTotal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->description->Visible) { // description ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->description) == "") { ?>
		<th data-name="description" class="<?php echo $view_patient_services->description->headerCellClass() ?>"><div id="elh_view_patient_services_description" class="view_patient_services_description"><div class="ew-table-header-caption"><?php echo $view_patient_services->description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $view_patient_services->description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->description) ?>',1);"><div id="elh_view_patient_services_description" class="view_patient_services_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->patient_type->Visible) { // patient_type ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $view_patient_services->patient_type->headerCellClass() ?>"><div id="elh_view_patient_services_patient_type" class="view_patient_services_patient_type"><div class="ew-table-header-caption"><?php echo $view_patient_services->patient_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $view_patient_services->patient_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->patient_type) ?>',1);"><div id="elh_view_patient_services_patient_type" class="view_patient_services_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->patient_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->patient_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->charged_date->Visible) { // charged_date ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $view_patient_services->charged_date->headerCellClass() ?>"><div id="elh_view_patient_services_charged_date" class="view_patient_services_charged_date"><div class="ew-table-header-caption"><?php echo $view_patient_services->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $view_patient_services->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->charged_date) ?>',1);"><div id="elh_view_patient_services_charged_date" class="view_patient_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->charged_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->charged_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->status->Visible) { // status ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_patient_services->status->headerCellClass() ?>"><div id="elh_view_patient_services_status" class="view_patient_services_status"><div class="ew-table-header-caption"><?php echo $view_patient_services->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_patient_services->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->status) ?>',1);"><div id="elh_view_patient_services_status" class="view_patient_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->createdby->Visible) { // createdby ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_patient_services->createdby->headerCellClass() ?>"><div id="elh_view_patient_services_createdby" class="view_patient_services_createdby"><div class="ew-table-header-caption"><?php echo $view_patient_services->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_patient_services->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->createdby) ?>',1);"><div id="elh_view_patient_services_createdby" class="view_patient_services_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_services->createddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_createddatetime" class="view_patient_services_createddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_services->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_services->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->createddatetime) ?>',1);"><div id="elh_view_patient_services_createddatetime" class="view_patient_services_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_services->modifiedby->headerCellClass() ?>"><div id="elh_view_patient_services_modifiedby" class="view_patient_services_modifiedby"><div class="ew-table-header-caption"><?php echo $view_patient_services->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_services->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->modifiedby) ?>',1);"><div id="elh_view_patient_services_modifiedby" class="view_patient_services_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_services->modifieddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_services->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_services->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->modifieddatetime) ?>',1);"><div id="elh_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Aid->Visible) { // Aid ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $view_patient_services->Aid->headerCellClass() ?>"><div id="elh_view_patient_services_Aid" class="view_patient_services_Aid"><div class="ew-table-header-caption"><?php echo $view_patient_services->Aid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $view_patient_services->Aid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Aid) ?>',1);"><div id="elh_view_patient_services_Aid" class="view_patient_services_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Aid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Aid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Vid->Visible) { // Vid ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_patient_services->Vid->headerCellClass() ?>"><div id="elh_view_patient_services_Vid" class="view_patient_services_Vid"><div class="ew-table-header-caption"><?php echo $view_patient_services->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_patient_services->Vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Vid) ?>',1);"><div id="elh_view_patient_services_Vid" class="view_patient_services_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrID->Visible) { // DrID ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_patient_services->DrID->headerCellClass() ?>"><div id="elh_view_patient_services_DrID" class="view_patient_services_DrID"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_patient_services->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DrID) ?>',1);"><div id="elh_view_patient_services_DrID" class="view_patient_services_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_patient_services->DrCODE->headerCellClass() ?>"><div id="elh_view_patient_services_DrCODE" class="view_patient_services_DrCODE"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_patient_services->DrCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DrCODE) ?>',1);"><div id="elh_view_patient_services_DrCODE" class="view_patient_services_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrName->Visible) { // DrName ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_patient_services->DrName->headerCellClass() ?>"><div id="elh_view_patient_services_DrName" class="view_patient_services_DrName"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_patient_services->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DrName) ?>',1);"><div id="elh_view_patient_services_DrName" class="view_patient_services_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Department->Visible) { // Department ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_patient_services->Department->headerCellClass() ?>"><div id="elh_view_patient_services_Department" class="view_patient_services_Department"><div class="ew-table-header-caption"><?php echo $view_patient_services->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_patient_services->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Department) ?>',1);"><div id="elh_view_patient_services_Department" class="view_patient_services_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrSharePres) == "") { ?>
		<th data-name="DrSharePres" class="<?php echo $view_patient_services->DrSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePres" class="<?php echo $view_patient_services->DrSharePres->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DrSharePres) ?>',1);"><div id="elh_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrSharePres->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrSharePres->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->HospSharePres) == "") { ?>
		<th data-name="HospSharePres" class="<?php echo $view_patient_services->HospSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres"><div class="ew-table-header-caption"><?php echo $view_patient_services->HospSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePres" class="<?php echo $view_patient_services->HospSharePres->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->HospSharePres) ?>',1);"><div id="elh_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->HospSharePres->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->HospSharePres->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_patient_services->DrShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_patient_services->DrShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DrShareAmount) ?>',1);"><div id="elh_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_patient_services->HospShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_patient_services->HospShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->HospShareAmount) ?>',1);"><div id="elh_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->HospShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->HospShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrShareSettiledAmount) == "") { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettiledAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services->DrShareSettiledAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DrShareSettiledAmount) ?>',1);"><div id="elh_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrShareSettiledAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrShareSettiledAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrShareSettledId) == "") { ?>
		<th data-name="DrShareSettledId" class="<?php echo $view_patient_services->DrShareSettledId->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettledId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettledId" class="<?php echo $view_patient_services->DrShareSettledId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DrShareSettledId) ?>',1);"><div id="elh_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrShareSettledId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrShareSettledId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrShareSettiledStatus) == "") { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettiledStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services->DrShareSettiledStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DrShareSettiledStatus) ?>',1);"><div id="elh_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrShareSettiledStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrShareSettiledStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_patient_services->invoiceId->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceId" class="view_patient_services_invoiceId"><div class="ew-table-header-caption"><?php echo $view_patient_services->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_patient_services->invoiceId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->invoiceId) ?>',1);"><div id="elh_view_patient_services_invoiceId" class="view_patient_services_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->invoiceId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->invoiceId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $view_patient_services->invoiceAmount->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services->invoiceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $view_patient_services->invoiceAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->invoiceAmount) ?>',1);"><div id="elh_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->invoiceAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->invoiceAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $view_patient_services->invoiceStatus->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus"><div class="ew-table-header-caption"><?php echo $view_patient_services->invoiceStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $view_patient_services->invoiceStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->invoiceStatus) ?>',1);"><div id="elh_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->invoiceStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->invoiceStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->invoiceStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $view_patient_services->modeOfPayment->headerCellClass() ?>"><div id="elh_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment"><div class="ew-table-header-caption"><?php echo $view_patient_services->modeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $view_patient_services->modeOfPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->modeOfPayment) ?>',1);"><div id="elh_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->modeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->modeOfPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->modeOfPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_patient_services->HospID->headerCellClass() ?>"><div id="elh_view_patient_services_HospID" class="view_patient_services_HospID"><div class="ew-table-header-caption"><?php echo $view_patient_services->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_patient_services->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->HospID) ?>',1);"><div id="elh_view_patient_services_HospID" class="view_patient_services_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_services->RIDNO->headerCellClass() ?>"><div id="elh_view_patient_services_RIDNO" class="view_patient_services_RIDNO"><div class="ew-table-header-caption"><?php echo $view_patient_services->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_services->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->RIDNO) ?>',1);"><div id="elh_view_patient_services_RIDNO" class="view_patient_services_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_patient_services->ItemCode->headerCellClass() ?>"><div id="elh_view_patient_services_ItemCode" class="view_patient_services_ItemCode"><div class="ew-table-header-caption"><?php echo $view_patient_services->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_patient_services->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->ItemCode) ?>',1);"><div id="elh_view_patient_services_ItemCode" class="view_patient_services_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ItemCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TidNo->Visible) { // TidNo ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_services->TidNo->headerCellClass() ?>"><div id="elh_view_patient_services_TidNo" class="view_patient_services_TidNo"><div class="ew-table-header-caption"><?php echo $view_patient_services->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_services->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->TidNo) ?>',1);"><div id="elh_view_patient_services_TidNo" class="view_patient_services_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->sid->Visible) { // sid ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_patient_services->sid->headerCellClass() ?>"><div id="elh_view_patient_services_sid" class="view_patient_services_sid"><div class="ew-table-header-caption"><?php echo $view_patient_services->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_patient_services->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->sid) ?>',1);"><div id="elh_view_patient_services_sid" class="view_patient_services_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $view_patient_services->TestSubCd->headerCellClass() ?>"><div id="elh_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd"><div class="ew-table-header-caption"><?php echo $view_patient_services->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $view_patient_services->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->TestSubCd) ?>',1);"><div id="elh_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->TestSubCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->TestSubCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_patient_services->DEptCd->headerCellClass() ?>"><div id="elh_view_patient_services_DEptCd" class="view_patient_services_DEptCd"><div class="ew-table-header-caption"><?php echo $view_patient_services->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_patient_services->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DEptCd) ?>',1);"><div id="elh_view_patient_services_DEptCd" class="view_patient_services_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ProfCd->Visible) { // ProfCd ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $view_patient_services->ProfCd->headerCellClass() ?>"><div id="elh_view_patient_services_ProfCd" class="view_patient_services_ProfCd"><div class="ew-table-header-caption"><?php echo $view_patient_services->ProfCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $view_patient_services->ProfCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->ProfCd) ?>',1);"><div id="elh_view_patient_services_ProfCd" class="view_patient_services_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ProfCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ProfCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ProfCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Comments->Visible) { // Comments ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $view_patient_services->Comments->headerCellClass() ?>"><div id="elh_view_patient_services_Comments" class="view_patient_services_Comments"><div class="ew-table-header-caption"><?php echo $view_patient_services->Comments->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $view_patient_services->Comments->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Comments) ?>',1);"><div id="elh_view_patient_services_Comments" class="view_patient_services_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Comments->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Comments->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Comments->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Method->Visible) { // Method ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $view_patient_services->Method->headerCellClass() ?>"><div id="elh_view_patient_services_Method" class="view_patient_services_Method"><div class="ew-table-header-caption"><?php echo $view_patient_services->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $view_patient_services->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Method) ?>',1);"><div id="elh_view_patient_services_Method" class="view_patient_services_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Specimen->Visible) { // Specimen ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $view_patient_services->Specimen->headerCellClass() ?>"><div id="elh_view_patient_services_Specimen" class="view_patient_services_Specimen"><div class="ew-table-header-caption"><?php echo $view_patient_services->Specimen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $view_patient_services->Specimen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Specimen) ?>',1);"><div id="elh_view_patient_services_Specimen" class="view_patient_services_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Specimen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Specimen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Specimen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Abnormal->Visible) { // Abnormal ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $view_patient_services->Abnormal->headerCellClass() ?>"><div id="elh_view_patient_services_Abnormal" class="view_patient_services_Abnormal"><div class="ew-table-header-caption"><?php echo $view_patient_services->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $view_patient_services->Abnormal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Abnormal) ?>',1);"><div id="elh_view_patient_services_Abnormal" class="view_patient_services_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Abnormal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Abnormal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Abnormal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_patient_services->TestUnit->headerCellClass() ?>"><div id="elh_view_patient_services_TestUnit" class="view_patient_services_TestUnit"><div class="ew-table-header-caption"><?php echo $view_patient_services->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_patient_services->TestUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->TestUnit) ?>',1);"><div id="elh_view_patient_services_TestUnit" class="view_patient_services_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->TestUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->TestUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->TestUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $view_patient_services->LOWHIGH->headerCellClass() ?>"><div id="elh_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH"><div class="ew-table-header-caption"><?php echo $view_patient_services->LOWHIGH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $view_patient_services->LOWHIGH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->LOWHIGH) ?>',1);"><div id="elh_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->LOWHIGH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->LOWHIGH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->LOWHIGH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Branch->Visible) { // Branch ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $view_patient_services->Branch->headerCellClass() ?>"><div id="elh_view_patient_services_Branch" class="view_patient_services_Branch"><div class="ew-table-header-caption"><?php echo $view_patient_services->Branch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $view_patient_services->Branch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Branch) ?>',1);"><div id="elh_view_patient_services_Branch" class="view_patient_services_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Branch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Branch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Branch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Dispatch->Visible) { // Dispatch ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $view_patient_services->Dispatch->headerCellClass() ?>"><div id="elh_view_patient_services_Dispatch" class="view_patient_services_Dispatch"><div class="ew-table-header-caption"><?php echo $view_patient_services->Dispatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $view_patient_services->Dispatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Dispatch) ?>',1);"><div id="elh_view_patient_services_Dispatch" class="view_patient_services_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Dispatch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Dispatch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Dispatch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_patient_services->Pic1->headerCellClass() ?>"><div id="elh_view_patient_services_Pic1" class="view_patient_services_Pic1"><div class="ew-table-header-caption"><?php echo $view_patient_services->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_patient_services->Pic1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Pic1) ?>',1);"><div id="elh_view_patient_services_Pic1" class="view_patient_services_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Pic1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Pic1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Pic1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_patient_services->Pic2->headerCellClass() ?>"><div id="elh_view_patient_services_Pic2" class="view_patient_services_Pic2"><div class="ew-table-header-caption"><?php echo $view_patient_services->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_patient_services->Pic2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Pic2) ?>',1);"><div id="elh_view_patient_services_Pic2" class="view_patient_services_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Pic2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Pic2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Pic2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->GraphPath->Visible) { // GraphPath ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $view_patient_services->GraphPath->headerCellClass() ?>"><div id="elh_view_patient_services_GraphPath" class="view_patient_services_GraphPath"><div class="ew-table-header-caption"><?php echo $view_patient_services->GraphPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $view_patient_services->GraphPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->GraphPath) ?>',1);"><div id="elh_view_patient_services_GraphPath" class="view_patient_services_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->GraphPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->GraphPath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->GraphPath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->MachineCD->Visible) { // MachineCD ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $view_patient_services->MachineCD->headerCellClass() ?>"><div id="elh_view_patient_services_MachineCD" class="view_patient_services_MachineCD"><div class="ew-table-header-caption"><?php echo $view_patient_services->MachineCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $view_patient_services->MachineCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->MachineCD) ?>',1);"><div id="elh_view_patient_services_MachineCD" class="view_patient_services_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->MachineCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->MachineCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->MachineCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestCancel->Visible) { // TestCancel ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $view_patient_services->TestCancel->headerCellClass() ?>"><div id="elh_view_patient_services_TestCancel" class="view_patient_services_TestCancel"><div class="ew-table-header-caption"><?php echo $view_patient_services->TestCancel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $view_patient_services->TestCancel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->TestCancel) ?>',1);"><div id="elh_view_patient_services_TestCancel" class="view_patient_services_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->TestCancel->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->TestCancel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->TestCancel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->OutSource->Visible) { // OutSource ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $view_patient_services->OutSource->headerCellClass() ?>"><div id="elh_view_patient_services_OutSource" class="view_patient_services_OutSource"><div class="ew-table-header-caption"><?php echo $view_patient_services->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $view_patient_services->OutSource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->OutSource) ?>',1);"><div id="elh_view_patient_services_OutSource" class="view_patient_services_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->OutSource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->OutSource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->OutSource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Printed->Visible) { // Printed ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $view_patient_services->Printed->headerCellClass() ?>"><div id="elh_view_patient_services_Printed" class="view_patient_services_Printed"><div class="ew-table-header-caption"><?php echo $view_patient_services->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $view_patient_services->Printed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Printed) ?>',1);"><div id="elh_view_patient_services_Printed" class="view_patient_services_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Printed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Printed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Printed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PrintBy->Visible) { // PrintBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $view_patient_services->PrintBy->headerCellClass() ?>"><div id="elh_view_patient_services_PrintBy" class="view_patient_services_PrintBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $view_patient_services->PrintBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->PrintBy) ?>',1);"><div id="elh_view_patient_services_PrintBy" class="view_patient_services_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->PrintBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->PrintBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->PrintBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PrintDate->Visible) { // PrintDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $view_patient_services->PrintDate->headerCellClass() ?>"><div id="elh_view_patient_services_PrintDate" class="view_patient_services_PrintDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $view_patient_services->PrintDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->PrintDate) ?>',1);"><div id="elh_view_patient_services_PrintDate" class="view_patient_services_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->PrintDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->PrintDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->BillingDate->Visible) { // BillingDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->BillingDate) == "") { ?>
		<th data-name="BillingDate" class="<?php echo $view_patient_services->BillingDate->headerCellClass() ?>"><div id="elh_view_patient_services_BillingDate" class="view_patient_services_BillingDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->BillingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillingDate" class="<?php echo $view_patient_services->BillingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->BillingDate) ?>',1);"><div id="elh_view_patient_services_BillingDate" class="view_patient_services_BillingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->BillingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->BillingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->BilledBy->Visible) { // BilledBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->BilledBy) == "") { ?>
		<th data-name="BilledBy" class="<?php echo $view_patient_services->BilledBy->headerCellClass() ?>"><div id="elh_view_patient_services_BilledBy" class="view_patient_services_BilledBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->BilledBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BilledBy" class="<?php echo $view_patient_services->BilledBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->BilledBy) ?>',1);"><div id="elh_view_patient_services_BilledBy" class="view_patient_services_BilledBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->BilledBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->BilledBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->BilledBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Resulted->Visible) { // Resulted ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_patient_services->Resulted->headerCellClass() ?>"><div id="elh_view_patient_services_Resulted" class="view_patient_services_Resulted"><div class="ew-table-header-caption"><?php echo $view_patient_services->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_patient_services->Resulted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Resulted) ?>',1);"><div id="elh_view_patient_services_Resulted" class="view_patient_services_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Resulted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Resulted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Resulted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_patient_services->ResultDate->headerCellClass() ?>"><div id="elh_view_patient_services_ResultDate" class="view_patient_services_ResultDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_patient_services->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->ResultDate) ?>',1);"><div id="elh_view_patient_services_ResultDate" class="view_patient_services_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_patient_services->ResultedBy->headerCellClass() ?>"><div id="elh_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_patient_services->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->ResultedBy) ?>',1);"><div id="elh_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ResultedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SampleDate->Visible) { // SampleDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $view_patient_services->SampleDate->headerCellClass() ?>"><div id="elh_view_patient_services_SampleDate" class="view_patient_services_SampleDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->SampleDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $view_patient_services->SampleDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->SampleDate) ?>',1);"><div id="elh_view_patient_services_SampleDate" class="view_patient_services_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SampleDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SampleDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SampleUser->Visible) { // SampleUser ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $view_patient_services->SampleUser->headerCellClass() ?>"><div id="elh_view_patient_services_SampleUser" class="view_patient_services_SampleUser"><div class="ew-table-header-caption"><?php echo $view_patient_services->SampleUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $view_patient_services->SampleUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->SampleUser) ?>',1);"><div id="elh_view_patient_services_SampleUser" class="view_patient_services_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SampleUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SampleUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SampleUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Sampled->Visible) { // Sampled ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Sampled) == "") { ?>
		<th data-name="Sampled" class="<?php echo $view_patient_services->Sampled->headerCellClass() ?>"><div id="elh_view_patient_services_Sampled" class="view_patient_services_Sampled"><div class="ew-table-header-caption"><?php echo $view_patient_services->Sampled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sampled" class="<?php echo $view_patient_services->Sampled->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Sampled) ?>',1);"><div id="elh_view_patient_services_Sampled" class="view_patient_services_Sampled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Sampled->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Sampled->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Sampled->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $view_patient_services->ReceivedDate->headerCellClass() ?>"><div id="elh_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->ReceivedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $view_patient_services->ReceivedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->ReceivedDate) ?>',1);"><div id="elh_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ReceivedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ReceivedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $view_patient_services->ReceivedUser->headerCellClass() ?>"><div id="elh_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser"><div class="ew-table-header-caption"><?php echo $view_patient_services->ReceivedUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $view_patient_services->ReceivedUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->ReceivedUser) ?>',1);"><div id="elh_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ReceivedUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ReceivedUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ReceivedUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Recevied->Visible) { // Recevied ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Recevied) == "") { ?>
		<th data-name="Recevied" class="<?php echo $view_patient_services->Recevied->headerCellClass() ?>"><div id="elh_view_patient_services_Recevied" class="view_patient_services_Recevied"><div class="ew-table-header-caption"><?php echo $view_patient_services->Recevied->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Recevied" class="<?php echo $view_patient_services->Recevied->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Recevied) ?>',1);"><div id="elh_view_patient_services_Recevied" class="view_patient_services_Recevied">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Recevied->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Recevied->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Recevied->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $view_patient_services->DeptRecvDate->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecvDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $view_patient_services->DeptRecvDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DeptRecvDate) ?>',1);"><div id="elh_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DeptRecvDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DeptRecvDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $view_patient_services->DeptRecvUser->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser"><div class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecvUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $view_patient_services->DeptRecvUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DeptRecvUser) ?>',1);"><div id="elh_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecvUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DeptRecvUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DeptRecvUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DeptRecived) == "") { ?>
		<th data-name="DeptRecived" class="<?php echo $view_patient_services->DeptRecived->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived"><div class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecived->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecived" class="<?php echo $view_patient_services->DeptRecived->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->DeptRecived) ?>',1);"><div id="elh_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecived->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DeptRecived->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DeptRecived->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $view_patient_services->SAuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->SAuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $view_patient_services->SAuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->SAuthDate) ?>',1);"><div id="elh_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SAuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SAuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $view_patient_services->SAuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->SAuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $view_patient_services->SAuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->SAuthBy) ?>',1);"><div id="elh_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SAuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SAuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SAuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SAuthendicate) == "") { ?>
		<th data-name="SAuthendicate" class="<?php echo $view_patient_services->SAuthendicate->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate"><div class="ew-table-header-caption"><?php echo $view_patient_services->SAuthendicate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthendicate" class="<?php echo $view_patient_services->SAuthendicate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->SAuthendicate) ?>',1);"><div id="elh_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SAuthendicate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SAuthendicate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SAuthendicate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->AuthDate->Visible) { // AuthDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $view_patient_services->AuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_AuthDate" class="view_patient_services_AuthDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->AuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $view_patient_services->AuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->AuthDate) ?>',1);"><div id="elh_view_patient_services_AuthDate" class="view_patient_services_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->AuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->AuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->AuthBy->Visible) { // AuthBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $view_patient_services->AuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_AuthBy" class="view_patient_services_AuthBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->AuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $view_patient_services->AuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->AuthBy) ?>',1);"><div id="elh_view_patient_services_AuthBy" class="view_patient_services_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->AuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->AuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->AuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Authencate->Visible) { // Authencate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Authencate) == "") { ?>
		<th data-name="Authencate" class="<?php echo $view_patient_services->Authencate->headerCellClass() ?>"><div id="elh_view_patient_services_Authencate" class="view_patient_services_Authencate"><div class="ew-table-header-caption"><?php echo $view_patient_services->Authencate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Authencate" class="<?php echo $view_patient_services->Authencate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Authencate) ?>',1);"><div id="elh_view_patient_services_Authencate" class="view_patient_services_Authencate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Authencate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Authencate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Authencate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->EditDate->Visible) { // EditDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $view_patient_services->EditDate->headerCellClass() ?>"><div id="elh_view_patient_services_EditDate" class="view_patient_services_EditDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $view_patient_services->EditDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->EditDate) ?>',1);"><div id="elh_view_patient_services_EditDate" class="view_patient_services_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->EditDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->EditDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->EditBy->Visible) { // EditBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->EditBy) == "") { ?>
		<th data-name="EditBy" class="<?php echo $view_patient_services->EditBy->headerCellClass() ?>"><div id="elh_view_patient_services_EditBy" class="view_patient_services_EditBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->EditBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditBy" class="<?php echo $view_patient_services->EditBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->EditBy) ?>',1);"><div id="elh_view_patient_services_EditBy" class="view_patient_services_EditBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->EditBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->EditBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->EditBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Editted->Visible) { // Editted ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Editted) == "") { ?>
		<th data-name="Editted" class="<?php echo $view_patient_services->Editted->headerCellClass() ?>"><div id="elh_view_patient_services_Editted" class="view_patient_services_Editted"><div class="ew-table-header-caption"><?php echo $view_patient_services->Editted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Editted" class="<?php echo $view_patient_services->Editted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Editted) ?>',1);"><div id="elh_view_patient_services_Editted" class="view_patient_services_Editted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Editted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Editted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Editted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PatID->Visible) { // PatID ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_patient_services->PatID->headerCellClass() ?>"><div id="elh_view_patient_services_PatID" class="view_patient_services_PatID"><div class="ew-table-header-caption"><?php echo $view_patient_services->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_patient_services->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->PatID) ?>',1);"><div id="elh_view_patient_services_PatID" class="view_patient_services_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PatientId->Visible) { // PatientId ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_services->PatientId->headerCellClass() ?>"><div id="elh_view_patient_services_PatientId" class="view_patient_services_PatientId"><div class="ew-table-header-caption"><?php echo $view_patient_services->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_services->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->PatientId) ?>',1);"><div id="elh_view_patient_services_PatientId" class="view_patient_services_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Mobile->Visible) { // Mobile ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_services->Mobile->headerCellClass() ?>"><div id="elh_view_patient_services_Mobile" class="view_patient_services_Mobile"><div class="ew-table-header-caption"><?php echo $view_patient_services->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_services->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Mobile) ?>',1);"><div id="elh_view_patient_services_Mobile" class="view_patient_services_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->CId->Visible) { // CId ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $view_patient_services->CId->headerCellClass() ?>"><div id="elh_view_patient_services_CId" class="view_patient_services_CId"><div class="ew-table-header-caption"><?php echo $view_patient_services->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $view_patient_services->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->CId) ?>',1);"><div id="elh_view_patient_services_CId" class="view_patient_services_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Order->Visible) { // Order ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_patient_services->Order->headerCellClass() ?>"><div id="elh_view_patient_services_Order" class="view_patient_services_Order"><div class="ew-table-header-caption"><?php echo $view_patient_services->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_patient_services->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Order) ?>',1);"><div id="elh_view_patient_services_Order" class="view_patient_services_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ResType->Visible) { // ResType ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $view_patient_services->ResType->headerCellClass() ?>"><div id="elh_view_patient_services_ResType" class="view_patient_services_ResType"><div class="ew-table-header-caption"><?php echo $view_patient_services->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $view_patient_services->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->ResType) ?>',1);"><div id="elh_view_patient_services_ResType" class="view_patient_services_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ResType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ResType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Sample->Visible) { // Sample ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $view_patient_services->Sample->headerCellClass() ?>"><div id="elh_view_patient_services_Sample" class="view_patient_services_Sample"><div class="ew-table-header-caption"><?php echo $view_patient_services->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $view_patient_services->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Sample) ?>',1);"><div id="elh_view_patient_services_Sample" class="view_patient_services_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Sample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Sample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->NoD->Visible) { // NoD ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $view_patient_services->NoD->headerCellClass() ?>"><div id="elh_view_patient_services_NoD" class="view_patient_services_NoD"><div class="ew-table-header-caption"><?php echo $view_patient_services->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $view_patient_services->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->NoD) ?>',1);"><div id="elh_view_patient_services_NoD" class="view_patient_services_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->NoD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->NoD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $view_patient_services->BillOrder->headerCellClass() ?>"><div id="elh_view_patient_services_BillOrder" class="view_patient_services_BillOrder"><div class="ew-table-header-caption"><?php echo $view_patient_services->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $view_patient_services->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->BillOrder) ?>',1);"><div id="elh_view_patient_services_BillOrder" class="view_patient_services_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->BillOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->BillOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Inactive->Visible) { // Inactive ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $view_patient_services->Inactive->headerCellClass() ?>"><div id="elh_view_patient_services_Inactive" class="view_patient_services_Inactive"><div class="ew-table-header-caption"><?php echo $view_patient_services->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $view_patient_services->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Inactive) ?>',1);"><div id="elh_view_patient_services_Inactive" class="view_patient_services_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Inactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Inactive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Inactive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->CollSample->Visible) { // CollSample ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $view_patient_services->CollSample->headerCellClass() ?>"><div id="elh_view_patient_services_CollSample" class="view_patient_services_CollSample"><div class="ew-table-header-caption"><?php echo $view_patient_services->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $view_patient_services->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->CollSample) ?>',1);"><div id="elh_view_patient_services_CollSample" class="view_patient_services_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->CollSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->CollSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestType->Visible) { // TestType ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_patient_services->TestType->headerCellClass() ?>"><div id="elh_view_patient_services_TestType" class="view_patient_services_TestType"><div class="ew-table-header-caption"><?php echo $view_patient_services->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_patient_services->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->TestType) ?>',1);"><div id="elh_view_patient_services_TestType" class="view_patient_services_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->TestType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Repeated->Visible) { // Repeated ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_patient_services->Repeated->headerCellClass() ?>"><div id="elh_view_patient_services_Repeated" class="view_patient_services_Repeated"><div class="ew-table-header-caption"><?php echo $view_patient_services->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_patient_services->Repeated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Repeated) ?>',1);"><div id="elh_view_patient_services_Repeated" class="view_patient_services_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Repeated->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Repeated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Repeated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->RepeatedBy) == "") { ?>
		<th data-name="RepeatedBy" class="<?php echo $view_patient_services->RepeatedBy->headerCellClass() ?>"><div id="elh_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->RepeatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedBy" class="<?php echo $view_patient_services->RepeatedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->RepeatedBy) ?>',1);"><div id="elh_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->RepeatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->RepeatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->RepeatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->RepeatedDate) == "") { ?>
		<th data-name="RepeatedDate" class="<?php echo $view_patient_services->RepeatedDate->headerCellClass() ?>"><div id="elh_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->RepeatedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedDate" class="<?php echo $view_patient_services->RepeatedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->RepeatedDate) ?>',1);"><div id="elh_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->RepeatedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->RepeatedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->serviceID->Visible) { // serviceID ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->serviceID) == "") { ?>
		<th data-name="serviceID" class="<?php echo $view_patient_services->serviceID->headerCellClass() ?>"><div id="elh_view_patient_services_serviceID" class="view_patient_services_serviceID"><div class="ew-table-header-caption"><?php echo $view_patient_services->serviceID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="serviceID" class="<?php echo $view_patient_services->serviceID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->serviceID) ?>',1);"><div id="elh_view_patient_services_serviceID" class="view_patient_services_serviceID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->serviceID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->serviceID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Service_Type->Visible) { // Service_Type ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Service_Type) == "") { ?>
		<th data-name="Service_Type" class="<?php echo $view_patient_services->Service_Type->headerCellClass() ?>"><div id="elh_view_patient_services_Service_Type" class="view_patient_services_Service_Type"><div class="ew-table-header-caption"><?php echo $view_patient_services->Service_Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Type" class="<?php echo $view_patient_services->Service_Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Service_Type) ?>',1);"><div id="elh_view_patient_services_Service_Type" class="view_patient_services_Service_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Service_Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Service_Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Service_Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Service_Department->Visible) { // Service_Department ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Service_Department) == "") { ?>
		<th data-name="Service_Department" class="<?php echo $view_patient_services->Service_Department->headerCellClass() ?>"><div id="elh_view_patient_services_Service_Department" class="view_patient_services_Service_Department"><div class="ew-table-header-caption"><?php echo $view_patient_services->Service_Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Department" class="<?php echo $view_patient_services->Service_Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->Service_Department) ?>',1);"><div id="elh_view_patient_services_Service_Department" class="view_patient_services_Service_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Service_Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Service_Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Service_Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RequestNo->Visible) { // RequestNo ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->RequestNo) == "") { ?>
		<th data-name="RequestNo" class="<?php echo $view_patient_services->RequestNo->headerCellClass() ?>"><div id="elh_view_patient_services_RequestNo" class="view_patient_services_RequestNo"><div class="ew-table-header-caption"><?php echo $view_patient_services->RequestNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestNo" class="<?php echo $view_patient_services->RequestNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services->SortUrl($view_patient_services->RequestNo) ?>',1);"><div id="elh_view_patient_services_RequestNo" class="view_patient_services_RequestNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->RequestNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->RequestNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_patient_services_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_patient_services->ExportAll && $view_patient_services->isExport()) {
	$view_patient_services_list->StopRec = $view_patient_services_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_patient_services_list->TotalRecs > $view_patient_services_list->StartRec + $view_patient_services_list->DisplayRecs - 1)
		$view_patient_services_list->StopRec = $view_patient_services_list->StartRec + $view_patient_services_list->DisplayRecs - 1;
	else
		$view_patient_services_list->StopRec = $view_patient_services_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_patient_services_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_patient_services_list->FormKeyCountName) && ($view_patient_services->isGridAdd() || $view_patient_services->isGridEdit() || $view_patient_services->isConfirm())) {
		$view_patient_services_list->KeyCount = $CurrentForm->getValue($view_patient_services_list->FormKeyCountName);
		$view_patient_services_list->StopRec = $view_patient_services_list->StartRec + $view_patient_services_list->KeyCount - 1;
	}
}
$view_patient_services_list->RecCnt = $view_patient_services_list->StartRec - 1;
if ($view_patient_services_list->Recordset && !$view_patient_services_list->Recordset->EOF) {
	$view_patient_services_list->Recordset->moveFirst();
	$selectLimit = $view_patient_services_list->UseSelectLimit;
	if (!$selectLimit && $view_patient_services_list->StartRec > 1)
		$view_patient_services_list->Recordset->move($view_patient_services_list->StartRec - 1);
} elseif (!$view_patient_services->AllowAddDeleteRow && $view_patient_services_list->StopRec == 0) {
	$view_patient_services_list->StopRec = $view_patient_services->GridAddRowCount;
}

// Initialize aggregate
$view_patient_services->RowType = ROWTYPE_AGGREGATEINIT;
$view_patient_services->resetAttributes();
$view_patient_services_list->renderRow();
if ($view_patient_services->isGridAdd())
	$view_patient_services_list->RowIndex = 0;
if ($view_patient_services->isGridEdit())
	$view_patient_services_list->RowIndex = 0;
while ($view_patient_services_list->RecCnt < $view_patient_services_list->StopRec) {
	$view_patient_services_list->RecCnt++;
	if ($view_patient_services_list->RecCnt >= $view_patient_services_list->StartRec) {
		$view_patient_services_list->RowCnt++;
		if ($view_patient_services->isGridAdd() || $view_patient_services->isGridEdit() || $view_patient_services->isConfirm()) {
			$view_patient_services_list->RowIndex++;
			$CurrentForm->Index = $view_patient_services_list->RowIndex;
			if ($CurrentForm->hasValue($view_patient_services_list->FormActionName) && $view_patient_services_list->EventCancelled)
				$view_patient_services_list->RowAction = strval($CurrentForm->getValue($view_patient_services_list->FormActionName));
			elseif ($view_patient_services->isGridAdd())
				$view_patient_services_list->RowAction = "insert";
			else
				$view_patient_services_list->RowAction = "";
		}

		// Set up key count
		$view_patient_services_list->KeyCount = $view_patient_services_list->RowIndex;

		// Init row class and style
		$view_patient_services->resetAttributes();
		$view_patient_services->CssClass = "";
		if ($view_patient_services->isGridAdd()) {
			$view_patient_services_list->loadRowValues(); // Load default values
		} else {
			$view_patient_services_list->loadRowValues($view_patient_services_list->Recordset); // Load row values
		}
		$view_patient_services->RowType = ROWTYPE_VIEW; // Render view
		if ($view_patient_services->isGridAdd()) // Grid add
			$view_patient_services->RowType = ROWTYPE_ADD; // Render add
		if ($view_patient_services->isGridAdd() && $view_patient_services->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_patient_services_list->restoreCurrentRowFormValues($view_patient_services_list->RowIndex); // Restore form values
		if ($view_patient_services->isGridEdit()) { // Grid edit
			if ($view_patient_services->EventCancelled)
				$view_patient_services_list->restoreCurrentRowFormValues($view_patient_services_list->RowIndex); // Restore form values
			if ($view_patient_services_list->RowAction == "insert")
				$view_patient_services->RowType = ROWTYPE_ADD; // Render add
			else
				$view_patient_services->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_patient_services->isGridEdit() && ($view_patient_services->RowType == ROWTYPE_EDIT || $view_patient_services->RowType == ROWTYPE_ADD) && $view_patient_services->EventCancelled) // Update failed
			$view_patient_services_list->restoreCurrentRowFormValues($view_patient_services_list->RowIndex); // Restore form values
		if ($view_patient_services->RowType == ROWTYPE_EDIT) // Edit row
			$view_patient_services_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_patient_services->RowAttrs = array_merge($view_patient_services->RowAttrs, array('data-rowindex'=>$view_patient_services_list->RowCnt, 'id'=>'r' . $view_patient_services_list->RowCnt . '_view_patient_services', 'data-rowtype'=>$view_patient_services->RowType));

		// Render row
		$view_patient_services_list->renderRow();

		// Render list options
		$view_patient_services_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_patient_services_list->RowAction <> "delete" && $view_patient_services_list->RowAction <> "insertdelete" && !($view_patient_services_list->RowAction == "insert" && $view_patient_services->isConfirm() && $view_patient_services_list->emptyRow())) {
?>
	<tr<?php echo $view_patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_services_list->ListOptions->render("body", "left", $view_patient_services_list->RowCnt);
?>
	<?php if ($view_patient_services->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_patient_services->id->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="o<?php echo $view_patient_services_list->RowIndex ?>_id" id="o<?php echo $view_patient_services_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services->id->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_id" class="form-group view_patient_services_id">
<span<?php echo $view_patient_services->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="x<?php echo $view_patient_services_list->RowIndex ?>_id" id="x<?php echo $view_patient_services_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_id" class="view_patient_services_id">
<span<?php echo $view_patient_services->id->viewAttributes() ?>>
<?php echo $view_patient_services->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_patient_services->Reception->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Reception" class="form-group view_patient_services_Reception">
<input type="text" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Reception->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Reception->EditValue ?>"<?php echo $view_patient_services->Reception->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="o<?php echo $view_patient_services_list->RowIndex ?>_Reception" id="o<?php echo $view_patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Reception" class="form-group view_patient_services_Reception">
<span<?php echo $view_patient_services->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Reception" class="view_patient_services_Reception">
<span<?php echo $view_patient_services->Reception->viewAttributes() ?>>
<?php echo $view_patient_services->Reception->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_patient_services->mrnno->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_mrnno" class="form-group view_patient_services_mrnno">
<input type="text" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->mrnno->EditValue ?>"<?php echo $view_patient_services->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="o<?php echo $view_patient_services_list->RowIndex ?>_mrnno" id="o<?php echo $view_patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_mrnno" class="form-group view_patient_services_mrnno">
<span<?php echo $view_patient_services->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_mrnno" class="view_patient_services_mrnno">
<span<?php echo $view_patient_services->mrnno->viewAttributes() ?>>
<?php echo $view_patient_services->mrnno->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_patient_services->PatientName->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PatientName" class="form-group view_patient_services_PatientName">
<input type="text" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatientName->EditValue ?>"<?php echo $view_patient_services->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatientName" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PatientName" class="form-group view_patient_services_PatientName">
<span<?php echo $view_patient_services->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->PatientName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PatientName" class="view_patient_services_PatientName">
<span<?php echo $view_patient_services->PatientName->viewAttributes() ?>>
<?php echo $view_patient_services->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_patient_services->Age->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Age" class="form-group view_patient_services_Age">
<input type="text" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_list->RowIndex ?>_Age" id="x<?php echo $view_patient_services_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Age->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Age->EditValue ?>"<?php echo $view_patient_services->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="o<?php echo $view_patient_services_list->RowIndex ?>_Age" id="o<?php echo $view_patient_services_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services->Age->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Age" class="form-group view_patient_services_Age">
<span<?php echo $view_patient_services->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Age->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_list->RowIndex ?>_Age" id="x<?php echo $view_patient_services_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services->Age->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Age" class="view_patient_services_Age">
<span<?php echo $view_patient_services->Age->viewAttributes() ?>>
<?php echo $view_patient_services->Age->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_patient_services->Gender->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Gender" class="form-group view_patient_services_Gender">
<input type="text" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Gender->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Gender->EditValue ?>"<?php echo $view_patient_services->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="o<?php echo $view_patient_services_list->RowIndex ?>_Gender" id="o<?php echo $view_patient_services_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Gender" class="form-group view_patient_services_Gender">
<span<?php echo $view_patient_services->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Gender->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Gender" class="view_patient_services_Gender">
<span<?php echo $view_patient_services->Gender->viewAttributes() ?>>
<?php echo $view_patient_services->Gender->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic"<?php echo $view_patient_services->profilePic->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_profilePic" class="form-group view_patient_services_profilePic">
<textarea data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->profilePic->getPlaceHolder()) ?>"<?php echo $view_patient_services->profilePic->editAttributes() ?>><?php echo $view_patient_services->profilePic->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="o<?php echo $view_patient_services_list->RowIndex ?>_profilePic" id="o<?php echo $view_patient_services_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_profilePic" class="form-group view_patient_services_profilePic">
<span<?php echo $view_patient_services->profilePic->viewAttributes() ?>>
<?php echo $view_patient_services->profilePic->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_profilePic" class="view_patient_services_profilePic">
<span<?php echo $view_patient_services->profilePic->viewAttributes() ?>>
<?php echo $view_patient_services->profilePic->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $view_patient_services->Services->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Services" class="form-group view_patient_services_Services">
<?php
$wrkonchange = "" . trim(@$view_patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_list->RowIndex ?>_Services" class="text-nowrap" style="z-index: <?php echo (9000 - $view_patient_services_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_patient_serviceslist.createAutoSuggest({"id":"x<?php echo $view_patient_services_list->RowIndex ?>_Services","forceSelect":false});
</script>
<?php echo $view_patient_services->Services->Lookup->getParamTag("p_x" . $view_patient_services_list->RowIndex . "_Services") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="o<?php echo $view_patient_services_list->RowIndex ?>_Services" id="o<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Services" class="form-group view_patient_services_Services">
<?php
$wrkonchange = "" . trim(@$view_patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_list->RowIndex ?>_Services" class="text-nowrap" style="z-index: <?php echo (9000 - $view_patient_services_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_patient_serviceslist.createAutoSuggest({"id":"x<?php echo $view_patient_services_list->RowIndex ?>_Services","forceSelect":false});
</script>
<?php echo $view_patient_services->Services->Lookup->getParamTag("p_x" . $view_patient_services_list->RowIndex . "_Services") ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Services" class="view_patient_services_Services">
<span<?php echo $view_patient_services->Services->viewAttributes() ?>>
<?php echo $view_patient_services->Services->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Unit->Visible) { // Unit ?>
		<td data-name="Unit"<?php echo $view_patient_services->Unit->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Unit" class="form-group view_patient_services_Unit">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Unit->EditValue ?>"<?php echo $view_patient_services->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="o<?php echo $view_patient_services_list->RowIndex ?>_Unit" id="o<?php echo $view_patient_services_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services->Unit->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Unit" class="form-group view_patient_services_Unit">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Unit->EditValue ?>"<?php echo $view_patient_services->Unit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Unit" class="view_patient_services_Unit">
<span<?php echo $view_patient_services->Unit->viewAttributes() ?>>
<?php echo $view_patient_services->Unit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $view_patient_services->amount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_amount" class="form-group view_patient_services_amount">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_list->RowIndex ?>_amount" id="x<?php echo $view_patient_services_list->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->amount->EditValue ?>"<?php echo $view_patient_services->amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="o<?php echo $view_patient_services_list->RowIndex ?>_amount" id="o<?php echo $view_patient_services_list->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services->amount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_amount" class="form-group view_patient_services_amount">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_list->RowIndex ?>_amount" id="x<?php echo $view_patient_services_list->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->amount->EditValue ?>"<?php echo $view_patient_services->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_amount" class="view_patient_services_amount">
<span<?php echo $view_patient_services->amount->viewAttributes() ?>>
<?php echo $view_patient_services->amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_patient_services->Quantity->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Quantity" class="form-group view_patient_services_Quantity">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Quantity->EditValue ?>"<?php echo $view_patient_services->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="o<?php echo $view_patient_services_list->RowIndex ?>_Quantity" id="o<?php echo $view_patient_services_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Quantity" class="form-group view_patient_services_Quantity">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Quantity->EditValue ?>"<?php echo $view_patient_services->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Quantity" class="view_patient_services_Quantity">
<span<?php echo $view_patient_services->Quantity->viewAttributes() ?>>
<?php echo $view_patient_services->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory"<?php echo $view_patient_services->DiscountCategory->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DiscountCategory" class="form-group view_patient_services_DiscountCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services->DiscountCategory->editAttributes() ?>>
		<?php echo $view_patient_services->DiscountCategory->selectOptionListHtml("x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory") ?>
	</select>
</div>
<?php echo $view_patient_services->DiscountCategory->Lookup->getParamTag("p_x" . $view_patient_services_list->RowIndex . "_DiscountCategory") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="o<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" id="o<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DiscountCategory" class="form-group view_patient_services_DiscountCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services->DiscountCategory->editAttributes() ?>>
		<?php echo $view_patient_services->DiscountCategory->selectOptionListHtml("x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory") ?>
	</select>
</div>
<?php echo $view_patient_services->DiscountCategory->Lookup->getParamTag("p_x" . $view_patient_services_list->RowIndex . "_DiscountCategory") ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory">
<span<?php echo $view_patient_services->DiscountCategory->viewAttributes() ?>>
<?php echo $view_patient_services->DiscountCategory->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Discount->Visible) { // Discount ?>
		<td data-name="Discount"<?php echo $view_patient_services->Discount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Discount" class="form-group view_patient_services_Discount">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Discount->EditValue ?>"<?php echo $view_patient_services->Discount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="o<?php echo $view_patient_services_list->RowIndex ?>_Discount" id="o<?php echo $view_patient_services_list->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services->Discount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Discount" class="form-group view_patient_services_Discount">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Discount->EditValue ?>"<?php echo $view_patient_services->Discount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Discount" class="view_patient_services_Discount">
<span<?php echo $view_patient_services->Discount->viewAttributes() ?>>
<?php echo $view_patient_services->Discount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal"<?php echo $view_patient_services->SubTotal->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SubTotal" class="form-group view_patient_services_SubTotal">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SubTotal->EditValue ?>"<?php echo $view_patient_services->SubTotal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="o<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" id="o<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SubTotal" class="form-group view_patient_services_SubTotal">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SubTotal->EditValue ?>"<?php echo $view_patient_services->SubTotal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SubTotal" class="view_patient_services_SubTotal">
<span<?php echo $view_patient_services->SubTotal->viewAttributes() ?>>
<?php echo $view_patient_services->SubTotal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->description->Visible) { // description ?>
		<td data-name="description"<?php echo $view_patient_services->description->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_description" class="form-group view_patient_services_description">
<textarea data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_list->RowIndex ?>_description" id="x<?php echo $view_patient_services_list->RowIndex ?>_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->description->getPlaceHolder()) ?>"<?php echo $view_patient_services->description->editAttributes() ?>><?php echo $view_patient_services->description->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="o<?php echo $view_patient_services_list->RowIndex ?>_description" id="o<?php echo $view_patient_services_list->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services->description->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_description" class="form-group view_patient_services_description">
<span<?php echo $view_patient_services->description->viewAttributes() ?>>
<?php echo $view_patient_services->description->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_list->RowIndex ?>_description" id="x<?php echo $view_patient_services_list->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services->description->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_description" class="view_patient_services_description">
<span<?php echo $view_patient_services->description->viewAttributes() ?>>
<?php echo $view_patient_services->description->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type"<?php echo $view_patient_services->patient_type->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_patient_type" class="form-group view_patient_services_patient_type">
<input type="text" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->patient_type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->patient_type->EditValue ?>"<?php echo $view_patient_services->patient_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="o<?php echo $view_patient_services_list->RowIndex ?>_patient_type" id="o<?php echo $view_patient_services_list->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_patient_type" class="form-group view_patient_services_patient_type">
<span<?php echo $view_patient_services->patient_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->patient_type->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_patient_type" class="view_patient_services_patient_type">
<span<?php echo $view_patient_services->patient_type->viewAttributes() ?>>
<?php echo $view_patient_services->patient_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date"<?php echo $view_patient_services->charged_date->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_charged_date" class="form-group view_patient_services_charged_date">
<input type="text" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" placeholder="<?php echo HtmlEncode($view_patient_services->charged_date->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->charged_date->EditValue ?>"<?php echo $view_patient_services->charged_date->editAttributes() ?>>
<?php if (!$view_patient_services->charged_date->ReadOnly && !$view_patient_services->charged_date->Disabled && !isset($view_patient_services->charged_date->EditAttrs["readonly"]) && !isset($view_patient_services->charged_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="o<?php echo $view_patient_services_list->RowIndex ?>_charged_date" id="o<?php echo $view_patient_services_list->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_charged_date" class="form-group view_patient_services_charged_date">
<span<?php echo $view_patient_services->charged_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->charged_date->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_charged_date" class="view_patient_services_charged_date">
<span<?php echo $view_patient_services->charged_date->viewAttributes() ?>>
<?php echo $view_patient_services->charged_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_patient_services->status->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_status" class="form-group view_patient_services_status">
<input type="text" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_list->RowIndex ?>_status" id="x<?php echo $view_patient_services_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->status->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->status->EditValue ?>"<?php echo $view_patient_services->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="o<?php echo $view_patient_services_list->RowIndex ?>_status" id="o<?php echo $view_patient_services_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services->status->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_status" class="form-group view_patient_services_status">
<span<?php echo $view_patient_services->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->status->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_list->RowIndex ?>_status" id="x<?php echo $view_patient_services_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services->status->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_status" class="view_patient_services_status">
<span<?php echo $view_patient_services->status->viewAttributes() ?>>
<?php echo $view_patient_services->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_patient_services->createdby->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="o<?php echo $view_patient_services_list->RowIndex ?>_createdby" id="o<?php echo $view_patient_services_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_createdby" class="view_patient_services_createdby">
<span<?php echo $view_patient_services->createdby->viewAttributes() ?>>
<?php echo $view_patient_services->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_patient_services->createddatetime->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="o<?php echo $view_patient_services_list->RowIndex ?>_createddatetime" id="o<?php echo $view_patient_services_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_createddatetime" class="view_patient_services_createddatetime">
<span<?php echo $view_patient_services->createddatetime->viewAttributes() ?>>
<?php echo $view_patient_services->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_patient_services->modifiedby->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="o<?php echo $view_patient_services_list->RowIndex ?>_modifiedby" id="o<?php echo $view_patient_services_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_modifiedby" class="view_patient_services_modifiedby">
<span<?php echo $view_patient_services->modifiedby->viewAttributes() ?>>
<?php echo $view_patient_services->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_patient_services->modifieddatetime->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="o<?php echo $view_patient_services_list->RowIndex ?>_modifieddatetime" id="o<?php echo $view_patient_services_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime">
<span<?php echo $view_patient_services->modifieddatetime->viewAttributes() ?>>
<?php echo $view_patient_services->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Aid->Visible) { // Aid ?>
		<td data-name="Aid"<?php echo $view_patient_services->Aid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Aid" class="form-group view_patient_services_Aid">
<input type="text" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Aid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Aid->EditValue ?>"<?php echo $view_patient_services->Aid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="o<?php echo $view_patient_services_list->RowIndex ?>_Aid" id="o<?php echo $view_patient_services_list->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Aid" class="form-group view_patient_services_Aid">
<span<?php echo $view_patient_services->Aid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Aid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Aid" class="view_patient_services_Aid">
<span<?php echo $view_patient_services->Aid->viewAttributes() ?>>
<?php echo $view_patient_services->Aid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Vid->Visible) { // Vid ?>
		<td data-name="Vid"<?php echo $view_patient_services->Vid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_patient_services->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<span<?php echo $view_patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<input type="text" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Vid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Vid->EditValue ?>"<?php echo $view_patient_services->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="o<?php echo $view_patient_services_list->RowIndex ?>_Vid" id="o<?php echo $view_patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<span<?php echo $view_patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Vid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Vid" class="view_patient_services_Vid">
<span<?php echo $view_patient_services->Vid->viewAttributes() ?>>
<?php echo $view_patient_services->Vid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_patient_services->DrID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrID" class="form-group view_patient_services_DrID">
<input type="text" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrID->EditValue ?>"<?php echo $view_patient_services->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrID" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrID" class="form-group view_patient_services_DrID">
<span<?php echo $view_patient_services->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrID" class="view_patient_services_DrID">
<span<?php echo $view_patient_services->DrID->viewAttributes() ?>>
<?php echo $view_patient_services->DrID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE"<?php echo $view_patient_services->DrCODE->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrCODE" class="form-group view_patient_services_DrCODE">
<input type="text" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrCODE->EditValue ?>"<?php echo $view_patient_services->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrCODE" class="form-group view_patient_services_DrCODE">
<span<?php echo $view_patient_services->DrCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrCODE->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrCODE" class="view_patient_services_DrCODE">
<span<?php echo $view_patient_services->DrCODE->viewAttributes() ?>>
<?php echo $view_patient_services->DrCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $view_patient_services->DrName->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrName" class="form-group view_patient_services_DrName">
<input type="text" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DrName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrName->EditValue ?>"<?php echo $view_patient_services->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrName" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrName" class="form-group view_patient_services_DrName">
<span<?php echo $view_patient_services->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrName" class="view_patient_services_DrName">
<span<?php echo $view_patient_services->DrName->viewAttributes() ?>>
<?php echo $view_patient_services->DrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $view_patient_services->Department->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Department" class="form-group view_patient_services_Department">
<input type="text" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Department->EditValue ?>"<?php echo $view_patient_services->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="o<?php echo $view_patient_services_list->RowIndex ?>_Department" id="o<?php echo $view_patient_services_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services->Department->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Department" class="form-group view_patient_services_Department">
<span<?php echo $view_patient_services->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Department->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services->Department->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Department" class="view_patient_services_Department">
<span<?php echo $view_patient_services->Department->viewAttributes() ?>>
<?php echo $view_patient_services->Department->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres"<?php echo $view_patient_services->DrSharePres->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrSharePres" class="form-group view_patient_services_DrSharePres">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrSharePres->EditValue ?>"<?php echo $view_patient_services->DrSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services->DrSharePres->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrSharePres" class="form-group view_patient_services_DrSharePres">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrSharePres->EditValue ?>"<?php echo $view_patient_services->DrSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres">
<span<?php echo $view_patient_services->DrSharePres->viewAttributes() ?>>
<?php echo $view_patient_services->DrSharePres->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres"<?php echo $view_patient_services->HospSharePres->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_HospSharePres" class="form-group view_patient_services_HospSharePres">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospSharePres->EditValue ?>"<?php echo $view_patient_services->HospSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services->HospSharePres->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_HospSharePres" class="form-group view_patient_services_HospSharePres">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospSharePres->EditValue ?>"<?php echo $view_patient_services->HospSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres">
<span<?php echo $view_patient_services->HospSharePres->viewAttributes() ?>>
<?php echo $view_patient_services->HospSharePres->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount"<?php echo $view_patient_services->DrShareAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareAmount" class="form-group view_patient_services_DrShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareAmount->EditValue ?>"<?php echo $view_patient_services->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareAmount" class="form-group view_patient_services_DrShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareAmount->EditValue ?>"<?php echo $view_patient_services->DrShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount">
<span<?php echo $view_patient_services->DrShareAmount->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount"<?php echo $view_patient_services->HospShareAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_HospShareAmount" class="form-group view_patient_services_HospShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospShareAmount->EditValue ?>"<?php echo $view_patient_services->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_HospShareAmount" class="form-group view_patient_services_HospShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospShareAmount->EditValue ?>"<?php echo $view_patient_services->HospShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount">
<span<?php echo $view_patient_services->HospShareAmount->viewAttributes() ?>>
<?php echo $view_patient_services->HospShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount"<?php echo $view_patient_services->DrShareSettiledAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareSettiledAmount" class="form-group view_patient_services_DrShareSettiledAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareSettiledAmount" class="form-group view_patient_services_DrShareSettiledAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount">
<span<?php echo $view_patient_services->DrShareSettiledAmount->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareSettiledAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId"<?php echo $view_patient_services->DrShareSettledId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareSettledId" class="form-group view_patient_services_DrShareSettledId">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services->DrShareSettledId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareSettledId" class="form-group view_patient_services_DrShareSettledId">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services->DrShareSettledId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId">
<span<?php echo $view_patient_services->DrShareSettledId->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareSettledId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus"<?php echo $view_patient_services->DrShareSettiledStatus->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareSettiledStatus" class="form-group view_patient_services_DrShareSettiledStatus">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareSettiledStatus" class="form-group view_patient_services_DrShareSettiledStatus">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus">
<span<?php echo $view_patient_services->DrShareSettiledStatus->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareSettiledStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId"<?php echo $view_patient_services->invoiceId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_invoiceId" class="form-group view_patient_services_invoiceId">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceId->EditValue ?>"<?php echo $view_patient_services->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_invoiceId" class="form-group view_patient_services_invoiceId">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceId->EditValue ?>"<?php echo $view_patient_services->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_invoiceId" class="view_patient_services_invoiceId">
<span<?php echo $view_patient_services->invoiceId->viewAttributes() ?>>
<?php echo $view_patient_services->invoiceId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount"<?php echo $view_patient_services->invoiceAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_invoiceAmount" class="form-group view_patient_services_invoiceAmount">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceAmount->EditValue ?>"<?php echo $view_patient_services->invoiceAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_invoiceAmount" class="form-group view_patient_services_invoiceAmount">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceAmount->EditValue ?>"<?php echo $view_patient_services->invoiceAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount">
<span<?php echo $view_patient_services->invoiceAmount->viewAttributes() ?>>
<?php echo $view_patient_services->invoiceAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus"<?php echo $view_patient_services->invoiceStatus->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_invoiceStatus" class="form-group view_patient_services_invoiceStatus">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceStatus->EditValue ?>"<?php echo $view_patient_services->invoiceStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_invoiceStatus" class="form-group view_patient_services_invoiceStatus">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceStatus->EditValue ?>"<?php echo $view_patient_services->invoiceStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus">
<span<?php echo $view_patient_services->invoiceStatus->viewAttributes() ?>>
<?php echo $view_patient_services->invoiceStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment"<?php echo $view_patient_services->modeOfPayment->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_modeOfPayment" class="form-group view_patient_services_modeOfPayment">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->modeOfPayment->EditValue ?>"<?php echo $view_patient_services->modeOfPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="o<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" id="o<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_modeOfPayment" class="form-group view_patient_services_modeOfPayment">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->modeOfPayment->EditValue ?>"<?php echo $view_patient_services->modeOfPayment->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment">
<span<?php echo $view_patient_services->modeOfPayment->viewAttributes() ?>>
<?php echo $view_patient_services->modeOfPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_patient_services->HospID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospID" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_HospID" class="view_patient_services_HospID">
<span<?php echo $view_patient_services->HospID->viewAttributes() ?>>
<?php echo $view_patient_services->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_patient_services->RIDNO->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RIDNO" class="form-group view_patient_services_RIDNO">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RIDNO->EditValue ?>"<?php echo $view_patient_services->RIDNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="o<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" id="o<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RIDNO" class="form-group view_patient_services_RIDNO">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RIDNO->EditValue ?>"<?php echo $view_patient_services->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RIDNO" class="view_patient_services_RIDNO">
<span<?php echo $view_patient_services->RIDNO->viewAttributes() ?>>
<?php echo $view_patient_services->RIDNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $view_patient_services->ItemCode->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ItemCode" class="form-group view_patient_services_ItemCode">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ItemCode->EditValue ?>"<?php echo $view_patient_services->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="o<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" id="o<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ItemCode" class="form-group view_patient_services_ItemCode">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ItemCode->EditValue ?>"<?php echo $view_patient_services->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ItemCode" class="view_patient_services_ItemCode">
<span<?php echo $view_patient_services->ItemCode->viewAttributes() ?>>
<?php echo $view_patient_services->ItemCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $view_patient_services->TidNo->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TidNo" class="form-group view_patient_services_TidNo">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TidNo->EditValue ?>"<?php echo $view_patient_services->TidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="o<?php echo $view_patient_services_list->RowIndex ?>_TidNo" id="o<?php echo $view_patient_services_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TidNo" class="form-group view_patient_services_TidNo">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TidNo->EditValue ?>"<?php echo $view_patient_services->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TidNo" class="view_patient_services_TidNo">
<span<?php echo $view_patient_services->TidNo->viewAttributes() ?>>
<?php echo $view_patient_services->TidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $view_patient_services->sid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_sid" class="form-group view_patient_services_sid">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_list->RowIndex ?>_sid" id="x<?php echo $view_patient_services_list->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->sid->EditValue ?>"<?php echo $view_patient_services->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="o<?php echo $view_patient_services_list->RowIndex ?>_sid" id="o<?php echo $view_patient_services_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_sid" class="form-group view_patient_services_sid">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_list->RowIndex ?>_sid" id="x<?php echo $view_patient_services_list->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->sid->EditValue ?>"<?php echo $view_patient_services->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_sid" class="view_patient_services_sid">
<span<?php echo $view_patient_services->sid->viewAttributes() ?>>
<?php echo $view_patient_services->sid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd"<?php echo $view_patient_services->TestSubCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestSubCd" class="form-group view_patient_services_TestSubCd">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestSubCd->EditValue ?>"<?php echo $view_patient_services->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestSubCd" class="form-group view_patient_services_TestSubCd">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestSubCd->EditValue ?>"<?php echo $view_patient_services->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd">
<span<?php echo $view_patient_services->TestSubCd->viewAttributes() ?>>
<?php echo $view_patient_services->TestSubCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $view_patient_services->DEptCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DEptCd" class="form-group view_patient_services_DEptCd">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DEptCd->EditValue ?>"<?php echo $view_patient_services->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DEptCd" class="form-group view_patient_services_DEptCd">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DEptCd->EditValue ?>"<?php echo $view_patient_services->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DEptCd" class="view_patient_services_DEptCd">
<span<?php echo $view_patient_services->DEptCd->viewAttributes() ?>>
<?php echo $view_patient_services->DEptCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd"<?php echo $view_patient_services->ProfCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ProfCd" class="form-group view_patient_services_ProfCd">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ProfCd->EditValue ?>"<?php echo $view_patient_services->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ProfCd" class="form-group view_patient_services_ProfCd">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ProfCd->EditValue ?>"<?php echo $view_patient_services->ProfCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ProfCd" class="view_patient_services_ProfCd">
<span<?php echo $view_patient_services->ProfCd->viewAttributes() ?>>
<?php echo $view_patient_services->ProfCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Comments->Visible) { // Comments ?>
		<td data-name="Comments"<?php echo $view_patient_services->Comments->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Comments" class="form-group view_patient_services_Comments">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Comments->EditValue ?>"<?php echo $view_patient_services->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="o<?php echo $view_patient_services_list->RowIndex ?>_Comments" id="o<?php echo $view_patient_services_list->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services->Comments->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Comments" class="form-group view_patient_services_Comments">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Comments->EditValue ?>"<?php echo $view_patient_services->Comments->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Comments" class="view_patient_services_Comments">
<span<?php echo $view_patient_services->Comments->viewAttributes() ?>>
<?php echo $view_patient_services->Comments->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $view_patient_services->Method->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Method" class="form-group view_patient_services_Method">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_list->RowIndex ?>_Method" id="x<?php echo $view_patient_services_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Method->EditValue ?>"<?php echo $view_patient_services->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="o<?php echo $view_patient_services_list->RowIndex ?>_Method" id="o<?php echo $view_patient_services_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services->Method->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Method" class="form-group view_patient_services_Method">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_list->RowIndex ?>_Method" id="x<?php echo $view_patient_services_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Method->EditValue ?>"<?php echo $view_patient_services->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Method" class="view_patient_services_Method">
<span<?php echo $view_patient_services->Method->viewAttributes() ?>>
<?php echo $view_patient_services->Method->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen"<?php echo $view_patient_services->Specimen->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Specimen" class="form-group view_patient_services_Specimen">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Specimen->EditValue ?>"<?php echo $view_patient_services->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="o<?php echo $view_patient_services_list->RowIndex ?>_Specimen" id="o<?php echo $view_patient_services_list->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Specimen" class="form-group view_patient_services_Specimen">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Specimen->EditValue ?>"<?php echo $view_patient_services->Specimen->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Specimen" class="view_patient_services_Specimen">
<span<?php echo $view_patient_services->Specimen->viewAttributes() ?>>
<?php echo $view_patient_services->Specimen->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal"<?php echo $view_patient_services->Abnormal->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Abnormal" class="form-group view_patient_services_Abnormal">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Abnormal->EditValue ?>"<?php echo $view_patient_services->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="o<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" id="o<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Abnormal" class="form-group view_patient_services_Abnormal">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Abnormal->EditValue ?>"<?php echo $view_patient_services->Abnormal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Abnormal" class="view_patient_services_Abnormal">
<span<?php echo $view_patient_services->Abnormal->viewAttributes() ?>>
<?php echo $view_patient_services->Abnormal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit"<?php echo $view_patient_services->TestUnit->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestUnit" class="form-group view_patient_services_TestUnit">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestUnit->EditValue ?>"<?php echo $view_patient_services->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestUnit" class="form-group view_patient_services_TestUnit">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestUnit->EditValue ?>"<?php echo $view_patient_services->TestUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestUnit" class="view_patient_services_TestUnit">
<span<?php echo $view_patient_services->TestUnit->viewAttributes() ?>>
<?php echo $view_patient_services->TestUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH"<?php echo $view_patient_services->LOWHIGH->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_LOWHIGH" class="form-group view_patient_services_LOWHIGH">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->LOWHIGH->EditValue ?>"<?php echo $view_patient_services->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="o<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" id="o<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_LOWHIGH" class="form-group view_patient_services_LOWHIGH">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->LOWHIGH->EditValue ?>"<?php echo $view_patient_services->LOWHIGH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH">
<span<?php echo $view_patient_services->LOWHIGH->viewAttributes() ?>>
<?php echo $view_patient_services->LOWHIGH->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Branch->Visible) { // Branch ?>
		<td data-name="Branch"<?php echo $view_patient_services->Branch->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Branch" class="form-group view_patient_services_Branch">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Branch->EditValue ?>"<?php echo $view_patient_services->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="o<?php echo $view_patient_services_list->RowIndex ?>_Branch" id="o<?php echo $view_patient_services_list->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services->Branch->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Branch" class="form-group view_patient_services_Branch">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Branch->EditValue ?>"<?php echo $view_patient_services->Branch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Branch" class="view_patient_services_Branch">
<span<?php echo $view_patient_services->Branch->viewAttributes() ?>>
<?php echo $view_patient_services->Branch->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch"<?php echo $view_patient_services->Dispatch->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Dispatch" class="form-group view_patient_services_Dispatch">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Dispatch->EditValue ?>"<?php echo $view_patient_services->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="o<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" id="o<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Dispatch" class="form-group view_patient_services_Dispatch">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Dispatch->EditValue ?>"<?php echo $view_patient_services->Dispatch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Dispatch" class="view_patient_services_Dispatch">
<span<?php echo $view_patient_services->Dispatch->viewAttributes() ?>>
<?php echo $view_patient_services->Dispatch->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1"<?php echo $view_patient_services->Pic1->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Pic1" class="form-group view_patient_services_Pic1">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic1->EditValue ?>"<?php echo $view_patient_services->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="o<?php echo $view_patient_services_list->RowIndex ?>_Pic1" id="o<?php echo $view_patient_services_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Pic1" class="form-group view_patient_services_Pic1">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic1->EditValue ?>"<?php echo $view_patient_services->Pic1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Pic1" class="view_patient_services_Pic1">
<span<?php echo $view_patient_services->Pic1->viewAttributes() ?>>
<?php echo $view_patient_services->Pic1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2"<?php echo $view_patient_services->Pic2->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Pic2" class="form-group view_patient_services_Pic2">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic2->EditValue ?>"<?php echo $view_patient_services->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="o<?php echo $view_patient_services_list->RowIndex ?>_Pic2" id="o<?php echo $view_patient_services_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Pic2" class="form-group view_patient_services_Pic2">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic2->EditValue ?>"<?php echo $view_patient_services->Pic2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Pic2" class="view_patient_services_Pic2">
<span<?php echo $view_patient_services->Pic2->viewAttributes() ?>>
<?php echo $view_patient_services->Pic2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath"<?php echo $view_patient_services->GraphPath->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_GraphPath" class="form-group view_patient_services_GraphPath">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->GraphPath->EditValue ?>"<?php echo $view_patient_services->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="o<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" id="o<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_GraphPath" class="form-group view_patient_services_GraphPath">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->GraphPath->EditValue ?>"<?php echo $view_patient_services->GraphPath->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_GraphPath" class="view_patient_services_GraphPath">
<span<?php echo $view_patient_services->GraphPath->viewAttributes() ?>>
<?php echo $view_patient_services->GraphPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD"<?php echo $view_patient_services->MachineCD->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_MachineCD" class="form-group view_patient_services_MachineCD">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->MachineCD->EditValue ?>"<?php echo $view_patient_services->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="o<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" id="o<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_MachineCD" class="form-group view_patient_services_MachineCD">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->MachineCD->EditValue ?>"<?php echo $view_patient_services->MachineCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_MachineCD" class="view_patient_services_MachineCD">
<span<?php echo $view_patient_services->MachineCD->viewAttributes() ?>>
<?php echo $view_patient_services->MachineCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel"<?php echo $view_patient_services->TestCancel->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestCancel" class="form-group view_patient_services_TestCancel">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestCancel->EditValue ?>"<?php echo $view_patient_services->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestCancel" class="form-group view_patient_services_TestCancel">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestCancel->EditValue ?>"<?php echo $view_patient_services->TestCancel->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestCancel" class="view_patient_services_TestCancel">
<span<?php echo $view_patient_services->TestCancel->viewAttributes() ?>>
<?php echo $view_patient_services->TestCancel->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource"<?php echo $view_patient_services->OutSource->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_OutSource" class="form-group view_patient_services_OutSource">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->OutSource->EditValue ?>"<?php echo $view_patient_services->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="o<?php echo $view_patient_services_list->RowIndex ?>_OutSource" id="o<?php echo $view_patient_services_list->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_OutSource" class="form-group view_patient_services_OutSource">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->OutSource->EditValue ?>"<?php echo $view_patient_services->OutSource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_OutSource" class="view_patient_services_OutSource">
<span<?php echo $view_patient_services->OutSource->viewAttributes() ?>>
<?php echo $view_patient_services->OutSource->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Printed->Visible) { // Printed ?>
		<td data-name="Printed"<?php echo $view_patient_services->Printed->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Printed" class="form-group view_patient_services_Printed">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Printed->EditValue ?>"<?php echo $view_patient_services->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="o<?php echo $view_patient_services_list->RowIndex ?>_Printed" id="o<?php echo $view_patient_services_list->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services->Printed->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Printed" class="form-group view_patient_services_Printed">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Printed->EditValue ?>"<?php echo $view_patient_services->Printed->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Printed" class="view_patient_services_Printed">
<span<?php echo $view_patient_services->Printed->viewAttributes() ?>>
<?php echo $view_patient_services->Printed->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy"<?php echo $view_patient_services->PrintBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PrintBy" class="form-group view_patient_services_PrintBy">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintBy->EditValue ?>"<?php echo $view_patient_services->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PrintBy" class="form-group view_patient_services_PrintBy">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintBy->EditValue ?>"<?php echo $view_patient_services->PrintBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PrintBy" class="view_patient_services_PrintBy">
<span<?php echo $view_patient_services->PrintBy->viewAttributes() ?>>
<?php echo $view_patient_services->PrintBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate"<?php echo $view_patient_services->PrintDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PrintDate" class="form-group view_patient_services_PrintDate">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintDate->EditValue ?>"<?php echo $view_patient_services->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services->PrintDate->ReadOnly && !$view_patient_services->PrintDate->Disabled && !isset($view_patient_services->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PrintDate" class="form-group view_patient_services_PrintDate">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintDate->EditValue ?>"<?php echo $view_patient_services->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services->PrintDate->ReadOnly && !$view_patient_services->PrintDate->Disabled && !isset($view_patient_services->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PrintDate" class="view_patient_services_PrintDate">
<span<?php echo $view_patient_services->PrintDate->viewAttributes() ?>>
<?php echo $view_patient_services->PrintDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate"<?php echo $view_patient_services->BillingDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_BillingDate" class="form-group view_patient_services_BillingDate">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillingDate->EditValue ?>"<?php echo $view_patient_services->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services->BillingDate->ReadOnly && !$view_patient_services->BillingDate->Disabled && !isset($view_patient_services->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services->BillingDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_BillingDate" class="form-group view_patient_services_BillingDate">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillingDate->EditValue ?>"<?php echo $view_patient_services->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services->BillingDate->ReadOnly && !$view_patient_services->BillingDate->Disabled && !isset($view_patient_services->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_BillingDate" class="view_patient_services_BillingDate">
<span<?php echo $view_patient_services->BillingDate->viewAttributes() ?>>
<?php echo $view_patient_services->BillingDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy"<?php echo $view_patient_services->BilledBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_BilledBy" class="form-group view_patient_services_BilledBy">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BilledBy->EditValue ?>"<?php echo $view_patient_services->BilledBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services->BilledBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_BilledBy" class="form-group view_patient_services_BilledBy">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BilledBy->EditValue ?>"<?php echo $view_patient_services->BilledBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_BilledBy" class="view_patient_services_BilledBy">
<span<?php echo $view_patient_services->BilledBy->viewAttributes() ?>>
<?php echo $view_patient_services->BilledBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted"<?php echo $view_patient_services->Resulted->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Resulted" class="form-group view_patient_services_Resulted">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Resulted->EditValue ?>"<?php echo $view_patient_services->Resulted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="o<?php echo $view_patient_services_list->RowIndex ?>_Resulted" id="o<?php echo $view_patient_services_list->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Resulted" class="form-group view_patient_services_Resulted">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Resulted->EditValue ?>"<?php echo $view_patient_services->Resulted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Resulted" class="view_patient_services_Resulted">
<span<?php echo $view_patient_services->Resulted->viewAttributes() ?>>
<?php echo $view_patient_services->Resulted->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $view_patient_services->ResultDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ResultDate" class="form-group view_patient_services_ResultDate">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultDate->EditValue ?>"<?php echo $view_patient_services->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services->ResultDate->ReadOnly && !$view_patient_services->ResultDate->Disabled && !isset($view_patient_services->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ResultDate" class="form-group view_patient_services_ResultDate">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultDate->EditValue ?>"<?php echo $view_patient_services->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services->ResultDate->ReadOnly && !$view_patient_services->ResultDate->Disabled && !isset($view_patient_services->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ResultDate" class="view_patient_services_ResultDate">
<span<?php echo $view_patient_services->ResultDate->viewAttributes() ?>>
<?php echo $view_patient_services->ResultDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $view_patient_services->ResultedBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ResultedBy" class="form-group view_patient_services_ResultedBy">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultedBy->EditValue ?>"<?php echo $view_patient_services->ResultedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ResultedBy" class="form-group view_patient_services_ResultedBy">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultedBy->EditValue ?>"<?php echo $view_patient_services->ResultedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy">
<span<?php echo $view_patient_services->ResultedBy->viewAttributes() ?>>
<?php echo $view_patient_services->ResultedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate"<?php echo $view_patient_services->SampleDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SampleDate" class="form-group view_patient_services_SampleDate">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleDate->EditValue ?>"<?php echo $view_patient_services->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services->SampleDate->ReadOnly && !$view_patient_services->SampleDate->Disabled && !isset($view_patient_services->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SampleDate" class="form-group view_patient_services_SampleDate">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleDate->EditValue ?>"<?php echo $view_patient_services->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services->SampleDate->ReadOnly && !$view_patient_services->SampleDate->Disabled && !isset($view_patient_services->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SampleDate" class="view_patient_services_SampleDate">
<span<?php echo $view_patient_services->SampleDate->viewAttributes() ?>>
<?php echo $view_patient_services->SampleDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser"<?php echo $view_patient_services->SampleUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SampleUser" class="form-group view_patient_services_SampleUser">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleUser->EditValue ?>"<?php echo $view_patient_services->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SampleUser" class="form-group view_patient_services_SampleUser">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleUser->EditValue ?>"<?php echo $view_patient_services->SampleUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SampleUser" class="view_patient_services_SampleUser">
<span<?php echo $view_patient_services->SampleUser->viewAttributes() ?>>
<?php echo $view_patient_services->SampleUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled"<?php echo $view_patient_services->Sampled->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Sampled" class="form-group view_patient_services_Sampled">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sampled->EditValue ?>"<?php echo $view_patient_services->Sampled->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="o<?php echo $view_patient_services_list->RowIndex ?>_Sampled" id="o<?php echo $view_patient_services_list->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services->Sampled->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Sampled" class="form-group view_patient_services_Sampled">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sampled->EditValue ?>"<?php echo $view_patient_services->Sampled->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Sampled" class="view_patient_services_Sampled">
<span<?php echo $view_patient_services->Sampled->viewAttributes() ?>>
<?php echo $view_patient_services->Sampled->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate"<?php echo $view_patient_services->ReceivedDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ReceivedDate" class="form-group view_patient_services_ReceivedDate">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedDate->EditValue ?>"<?php echo $view_patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services->ReceivedDate->ReadOnly && !$view_patient_services->ReceivedDate->Disabled && !isset($view_patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ReceivedDate" class="form-group view_patient_services_ReceivedDate">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedDate->EditValue ?>"<?php echo $view_patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services->ReceivedDate->ReadOnly && !$view_patient_services->ReceivedDate->Disabled && !isset($view_patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate">
<span<?php echo $view_patient_services->ReceivedDate->viewAttributes() ?>>
<?php echo $view_patient_services->ReceivedDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser"<?php echo $view_patient_services->ReceivedUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ReceivedUser" class="form-group view_patient_services_ReceivedUser">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedUser->EditValue ?>"<?php echo $view_patient_services->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ReceivedUser" class="form-group view_patient_services_ReceivedUser">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedUser->EditValue ?>"<?php echo $view_patient_services->ReceivedUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser">
<span<?php echo $view_patient_services->ReceivedUser->viewAttributes() ?>>
<?php echo $view_patient_services->ReceivedUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied"<?php echo $view_patient_services->Recevied->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Recevied" class="form-group view_patient_services_Recevied">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Recevied->EditValue ?>"<?php echo $view_patient_services->Recevied->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="o<?php echo $view_patient_services_list->RowIndex ?>_Recevied" id="o<?php echo $view_patient_services_list->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services->Recevied->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Recevied" class="form-group view_patient_services_Recevied">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Recevied->EditValue ?>"<?php echo $view_patient_services->Recevied->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Recevied" class="view_patient_services_Recevied">
<span<?php echo $view_patient_services->Recevied->viewAttributes() ?>>
<?php echo $view_patient_services->Recevied->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate"<?php echo $view_patient_services->DeptRecvDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DeptRecvDate" class="form-group view_patient_services_DeptRecvDate">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services->DeptRecvDate->ReadOnly && !$view_patient_services->DeptRecvDate->Disabled && !isset($view_patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DeptRecvDate" class="form-group view_patient_services_DeptRecvDate">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services->DeptRecvDate->ReadOnly && !$view_patient_services->DeptRecvDate->Disabled && !isset($view_patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate">
<span<?php echo $view_patient_services->DeptRecvDate->viewAttributes() ?>>
<?php echo $view_patient_services->DeptRecvDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser"<?php echo $view_patient_services->DeptRecvUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DeptRecvUser" class="form-group view_patient_services_DeptRecvUser">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DeptRecvUser" class="form-group view_patient_services_DeptRecvUser">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services->DeptRecvUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser">
<span<?php echo $view_patient_services->DeptRecvUser->viewAttributes() ?>>
<?php echo $view_patient_services->DeptRecvUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived"<?php echo $view_patient_services->DeptRecived->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DeptRecived" class="form-group view_patient_services_DeptRecived">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecived->EditValue ?>"<?php echo $view_patient_services->DeptRecived->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services->DeptRecived->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DeptRecived" class="form-group view_patient_services_DeptRecived">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecived->EditValue ?>"<?php echo $view_patient_services->DeptRecived->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived">
<span<?php echo $view_patient_services->DeptRecived->viewAttributes() ?>>
<?php echo $view_patient_services->DeptRecived->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate"<?php echo $view_patient_services->SAuthDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SAuthDate" class="form-group view_patient_services_SAuthDate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthDate->EditValue ?>"<?php echo $view_patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->SAuthDate->ReadOnly && !$view_patient_services->SAuthDate->Disabled && !isset($view_patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SAuthDate" class="form-group view_patient_services_SAuthDate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthDate->EditValue ?>"<?php echo $view_patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->SAuthDate->ReadOnly && !$view_patient_services->SAuthDate->Disabled && !isset($view_patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate">
<span<?php echo $view_patient_services->SAuthDate->viewAttributes() ?>>
<?php echo $view_patient_services->SAuthDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy"<?php echo $view_patient_services->SAuthBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SAuthBy" class="form-group view_patient_services_SAuthBy">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthBy->EditValue ?>"<?php echo $view_patient_services->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SAuthBy" class="form-group view_patient_services_SAuthBy">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthBy->EditValue ?>"<?php echo $view_patient_services->SAuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy">
<span<?php echo $view_patient_services->SAuthBy->viewAttributes() ?>>
<?php echo $view_patient_services->SAuthBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate"<?php echo $view_patient_services->SAuthendicate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SAuthendicate" class="form-group view_patient_services_SAuthendicate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthendicate->EditValue ?>"<?php echo $view_patient_services->SAuthendicate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SAuthendicate" class="form-group view_patient_services_SAuthendicate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthendicate->EditValue ?>"<?php echo $view_patient_services->SAuthendicate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate">
<span<?php echo $view_patient_services->SAuthendicate->viewAttributes() ?>>
<?php echo $view_patient_services->SAuthendicate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate"<?php echo $view_patient_services->AuthDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_AuthDate" class="form-group view_patient_services_AuthDate">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthDate->EditValue ?>"<?php echo $view_patient_services->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->AuthDate->ReadOnly && !$view_patient_services->AuthDate->Disabled && !isset($view_patient_services->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_AuthDate" class="form-group view_patient_services_AuthDate">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthDate->EditValue ?>"<?php echo $view_patient_services->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->AuthDate->ReadOnly && !$view_patient_services->AuthDate->Disabled && !isset($view_patient_services->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_AuthDate" class="view_patient_services_AuthDate">
<span<?php echo $view_patient_services->AuthDate->viewAttributes() ?>>
<?php echo $view_patient_services->AuthDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy"<?php echo $view_patient_services->AuthBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_AuthBy" class="form-group view_patient_services_AuthBy">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthBy->EditValue ?>"<?php echo $view_patient_services->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_AuthBy" class="form-group view_patient_services_AuthBy">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthBy->EditValue ?>"<?php echo $view_patient_services->AuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_AuthBy" class="view_patient_services_AuthBy">
<span<?php echo $view_patient_services->AuthBy->viewAttributes() ?>>
<?php echo $view_patient_services->AuthBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate"<?php echo $view_patient_services->Authencate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Authencate" class="form-group view_patient_services_Authencate">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Authencate->EditValue ?>"<?php echo $view_patient_services->Authencate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="o<?php echo $view_patient_services_list->RowIndex ?>_Authencate" id="o<?php echo $view_patient_services_list->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services->Authencate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Authencate" class="form-group view_patient_services_Authencate">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Authencate->EditValue ?>"<?php echo $view_patient_services->Authencate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Authencate" class="view_patient_services_Authencate">
<span<?php echo $view_patient_services->Authencate->viewAttributes() ?>>
<?php echo $view_patient_services->Authencate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate"<?php echo $view_patient_services->EditDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_EditDate" class="form-group view_patient_services_EditDate">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditDate->EditValue ?>"<?php echo $view_patient_services->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services->EditDate->ReadOnly && !$view_patient_services->EditDate->Disabled && !isset($view_patient_services->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_EditDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services->EditDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_EditDate" class="form-group view_patient_services_EditDate">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditDate->EditValue ?>"<?php echo $view_patient_services->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services->EditDate->ReadOnly && !$view_patient_services->EditDate->Disabled && !isset($view_patient_services->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_EditDate" class="view_patient_services_EditDate">
<span<?php echo $view_patient_services->EditDate->viewAttributes() ?>>
<?php echo $view_patient_services->EditDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy"<?php echo $view_patient_services->EditBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_EditBy" class="form-group view_patient_services_EditBy">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditBy->EditValue ?>"<?php echo $view_patient_services->EditBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_EditBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services->EditBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_EditBy" class="form-group view_patient_services_EditBy">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditBy->EditValue ?>"<?php echo $view_patient_services->EditBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_EditBy" class="view_patient_services_EditBy">
<span<?php echo $view_patient_services->EditBy->viewAttributes() ?>>
<?php echo $view_patient_services->EditBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Editted->Visible) { // Editted ?>
		<td data-name="Editted"<?php echo $view_patient_services->Editted->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Editted" class="form-group view_patient_services_Editted">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Editted->EditValue ?>"<?php echo $view_patient_services->Editted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="o<?php echo $view_patient_services_list->RowIndex ?>_Editted" id="o<?php echo $view_patient_services_list->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services->Editted->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Editted" class="form-group view_patient_services_Editted">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Editted->EditValue ?>"<?php echo $view_patient_services->Editted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Editted" class="view_patient_services_Editted">
<span<?php echo $view_patient_services->Editted->viewAttributes() ?>>
<?php echo $view_patient_services->Editted->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $view_patient_services->PatID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PatID" class="form-group view_patient_services_PatID">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatID->EditValue ?>"<?php echo $view_patient_services->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatID" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PatID" class="form-group view_patient_services_PatID">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatID->EditValue ?>"<?php echo $view_patient_services->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PatID" class="view_patient_services_PatID">
<span<?php echo $view_patient_services->PatID->viewAttributes() ?>>
<?php echo $view_patient_services->PatID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_patient_services->PatientId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PatientId" class="form-group view_patient_services_PatientId">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatientId->EditValue ?>"<?php echo $view_patient_services->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatientId" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PatientId" class="form-group view_patient_services_PatientId">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatientId->EditValue ?>"<?php echo $view_patient_services->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_PatientId" class="view_patient_services_PatientId">
<span<?php echo $view_patient_services->PatientId->viewAttributes() ?>>
<?php echo $view_patient_services->PatientId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_patient_services->Mobile->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Mobile" class="form-group view_patient_services_Mobile">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Mobile->EditValue ?>"<?php echo $view_patient_services->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="o<?php echo $view_patient_services_list->RowIndex ?>_Mobile" id="o<?php echo $view_patient_services_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Mobile" class="form-group view_patient_services_Mobile">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Mobile->EditValue ?>"<?php echo $view_patient_services->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Mobile" class="view_patient_services_Mobile">
<span<?php echo $view_patient_services->Mobile->viewAttributes() ?>>
<?php echo $view_patient_services->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $view_patient_services->CId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_CId" class="form-group view_patient_services_CId">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_list->RowIndex ?>_CId" id="x<?php echo $view_patient_services_list->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CId->EditValue ?>"<?php echo $view_patient_services->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="o<?php echo $view_patient_services_list->RowIndex ?>_CId" id="o<?php echo $view_patient_services_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services->CId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_CId" class="form-group view_patient_services_CId">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_list->RowIndex ?>_CId" id="x<?php echo $view_patient_services_list->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CId->EditValue ?>"<?php echo $view_patient_services->CId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_CId" class="view_patient_services_CId">
<span<?php echo $view_patient_services->CId->viewAttributes() ?>>
<?php echo $view_patient_services->CId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $view_patient_services->Order->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Order" class="form-group view_patient_services_Order">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_list->RowIndex ?>_Order" id="x<?php echo $view_patient_services_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Order->EditValue ?>"<?php echo $view_patient_services->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="o<?php echo $view_patient_services_list->RowIndex ?>_Order" id="o<?php echo $view_patient_services_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Order" class="form-group view_patient_services_Order">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_list->RowIndex ?>_Order" id="x<?php echo $view_patient_services_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Order->EditValue ?>"<?php echo $view_patient_services->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Order" class="view_patient_services_Order">
<span<?php echo $view_patient_services->Order->viewAttributes() ?>>
<?php echo $view_patient_services->Order->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResType->Visible) { // ResType ?>
		<td data-name="ResType"<?php echo $view_patient_services->ResType->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ResType" class="form-group view_patient_services_ResType">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResType->EditValue ?>"<?php echo $view_patient_services->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResType" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services->ResType->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ResType" class="form-group view_patient_services_ResType">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResType->EditValue ?>"<?php echo $view_patient_services->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_ResType" class="view_patient_services_ResType">
<span<?php echo $view_patient_services->ResType->viewAttributes() ?>>
<?php echo $view_patient_services->ResType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Sample->Visible) { // Sample ?>
		<td data-name="Sample"<?php echo $view_patient_services->Sample->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Sample" class="form-group view_patient_services_Sample">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sample->EditValue ?>"<?php echo $view_patient_services->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="o<?php echo $view_patient_services_list->RowIndex ?>_Sample" id="o<?php echo $view_patient_services_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services->Sample->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Sample" class="form-group view_patient_services_Sample">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sample->EditValue ?>"<?php echo $view_patient_services->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Sample" class="view_patient_services_Sample">
<span<?php echo $view_patient_services->Sample->viewAttributes() ?>>
<?php echo $view_patient_services->Sample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->NoD->Visible) { // NoD ?>
		<td data-name="NoD"<?php echo $view_patient_services->NoD->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_NoD" class="form-group view_patient_services_NoD">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->NoD->EditValue ?>"<?php echo $view_patient_services->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="o<?php echo $view_patient_services_list->RowIndex ?>_NoD" id="o<?php echo $view_patient_services_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services->NoD->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_NoD" class="form-group view_patient_services_NoD">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->NoD->EditValue ?>"<?php echo $view_patient_services->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_NoD" class="view_patient_services_NoD">
<span<?php echo $view_patient_services->NoD->viewAttributes() ?>>
<?php echo $view_patient_services->NoD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder"<?php echo $view_patient_services->BillOrder->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_BillOrder" class="form-group view_patient_services_BillOrder">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillOrder->EditValue ?>"<?php echo $view_patient_services->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="o<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" id="o<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_BillOrder" class="form-group view_patient_services_BillOrder">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillOrder->EditValue ?>"<?php echo $view_patient_services->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_BillOrder" class="view_patient_services_BillOrder">
<span<?php echo $view_patient_services->BillOrder->viewAttributes() ?>>
<?php echo $view_patient_services->BillOrder->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive"<?php echo $view_patient_services->Inactive->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Inactive" class="form-group view_patient_services_Inactive">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Inactive->EditValue ?>"<?php echo $view_patient_services->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="o<?php echo $view_patient_services_list->RowIndex ?>_Inactive" id="o<?php echo $view_patient_services_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Inactive" class="form-group view_patient_services_Inactive">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Inactive->EditValue ?>"<?php echo $view_patient_services->Inactive->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Inactive" class="view_patient_services_Inactive">
<span<?php echo $view_patient_services->Inactive->viewAttributes() ?>>
<?php echo $view_patient_services->Inactive->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample"<?php echo $view_patient_services->CollSample->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_CollSample" class="form-group view_patient_services_CollSample">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CollSample->EditValue ?>"<?php echo $view_patient_services->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="o<?php echo $view_patient_services_list->RowIndex ?>_CollSample" id="o<?php echo $view_patient_services_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_CollSample" class="form-group view_patient_services_CollSample">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CollSample->EditValue ?>"<?php echo $view_patient_services->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_CollSample" class="view_patient_services_CollSample">
<span<?php echo $view_patient_services->CollSample->viewAttributes() ?>>
<?php echo $view_patient_services->CollSample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $view_patient_services->TestType->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestType" class="form-group view_patient_services_TestType">
<input type="text" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestType->EditValue ?>"<?php echo $view_patient_services->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestType" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestType" class="form-group view_patient_services_TestType">
<span<?php echo $view_patient_services->TestType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->TestType->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_TestType" class="view_patient_services_TestType">
<span<?php echo $view_patient_services->TestType->viewAttributes() ?>>
<?php echo $view_patient_services->TestType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated"<?php echo $view_patient_services->Repeated->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Repeated" class="form-group view_patient_services_Repeated">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Repeated->EditValue ?>"<?php echo $view_patient_services->Repeated->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="o<?php echo $view_patient_services_list->RowIndex ?>_Repeated" id="o<?php echo $view_patient_services_list->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Repeated" class="form-group view_patient_services_Repeated">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Repeated->EditValue ?>"<?php echo $view_patient_services->Repeated->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Repeated" class="view_patient_services_Repeated">
<span<?php echo $view_patient_services->Repeated->viewAttributes() ?>>
<?php echo $view_patient_services->Repeated->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy"<?php echo $view_patient_services->RepeatedBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RepeatedBy" class="form-group view_patient_services_RepeatedBy">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedBy->EditValue ?>"<?php echo $view_patient_services->RepeatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RepeatedBy" class="form-group view_patient_services_RepeatedBy">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedBy->EditValue ?>"<?php echo $view_patient_services->RepeatedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy">
<span<?php echo $view_patient_services->RepeatedBy->viewAttributes() ?>>
<?php echo $view_patient_services->RepeatedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate"<?php echo $view_patient_services->RepeatedDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RepeatedDate" class="form-group view_patient_services_RepeatedDate">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedDate->EditValue ?>"<?php echo $view_patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services->RepeatedDate->ReadOnly && !$view_patient_services->RepeatedDate->Disabled && !isset($view_patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RepeatedDate" class="form-group view_patient_services_RepeatedDate">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedDate->EditValue ?>"<?php echo $view_patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services->RepeatedDate->ReadOnly && !$view_patient_services->RepeatedDate->Disabled && !isset($view_patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate">
<span<?php echo $view_patient_services->RepeatedDate->viewAttributes() ?>>
<?php echo $view_patient_services->RepeatedDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID"<?php echo $view_patient_services->serviceID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_serviceID" class="form-group view_patient_services_serviceID">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->serviceID->EditValue ?>"<?php echo $view_patient_services->serviceID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="o<?php echo $view_patient_services_list->RowIndex ?>_serviceID" id="o<?php echo $view_patient_services_list->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services->serviceID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_serviceID" class="form-group view_patient_services_serviceID">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->serviceID->EditValue ?>"<?php echo $view_patient_services->serviceID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_serviceID" class="view_patient_services_serviceID">
<span<?php echo $view_patient_services->serviceID->viewAttributes() ?>>
<?php echo $view_patient_services->serviceID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type"<?php echo $view_patient_services->Service_Type->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Service_Type" class="form-group view_patient_services_Service_Type">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Type->EditValue ?>"<?php echo $view_patient_services->Service_Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" id="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services->Service_Type->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Service_Type" class="form-group view_patient_services_Service_Type">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Type->EditValue ?>"<?php echo $view_patient_services->Service_Type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Service_Type" class="view_patient_services_Service_Type">
<span<?php echo $view_patient_services->Service_Type->viewAttributes() ?>>
<?php echo $view_patient_services->Service_Type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department"<?php echo $view_patient_services->Service_Department->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Service_Department" class="form-group view_patient_services_Service_Department">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Department->EditValue ?>"<?php echo $view_patient_services->Service_Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" id="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services->Service_Department->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Service_Department" class="form-group view_patient_services_Service_Department">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Department->EditValue ?>"<?php echo $view_patient_services->Service_Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_Service_Department" class="view_patient_services_Service_Department">
<span<?php echo $view_patient_services->Service_Department->viewAttributes() ?>>
<?php echo $view_patient_services->Service_Department->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo"<?php echo $view_patient_services->RequestNo->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RequestNo" class="form-group view_patient_services_RequestNo">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RequestNo->EditValue ?>"<?php echo $view_patient_services->RequestNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="o<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" id="o<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services->RequestNo->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RequestNo" class="form-group view_patient_services_RequestNo">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RequestNo->EditValue ?>"<?php echo $view_patient_services->RequestNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCnt ?>_view_patient_services_RequestNo" class="view_patient_services_RequestNo">
<span<?php echo $view_patient_services->RequestNo->viewAttributes() ?>>
<?php echo $view_patient_services->RequestNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_services_list->ListOptions->render("body", "right", $view_patient_services_list->RowCnt);
?>
	</tr>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD || $view_patient_services->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_patient_serviceslist.updateLists(<?php echo $view_patient_services_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_patient_services->isGridAdd())
		if (!$view_patient_services_list->Recordset->EOF)
			$view_patient_services_list->Recordset->moveNext();
}
?>
<?php
	if ($view_patient_services->isGridAdd() || $view_patient_services->isGridEdit()) {
		$view_patient_services_list->RowIndex = '$rowindex$';
		$view_patient_services_list->loadRowValues();

		// Set row properties
		$view_patient_services->resetAttributes();
		$view_patient_services->RowAttrs = array_merge($view_patient_services->RowAttrs, array('data-rowindex'=>$view_patient_services_list->RowIndex, 'id'=>'r0_view_patient_services', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_patient_services->RowAttrs["class"], "ew-template");
		$view_patient_services->RowType = ROWTYPE_ADD;

		// Render row
		$view_patient_services_list->renderRow();

		// Render list options
		$view_patient_services_list->renderListOptions();
		$view_patient_services_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_services_list->ListOptions->render("body", "left", $view_patient_services_list->RowIndex);
?>
	<?php if ($view_patient_services->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="o<?php echo $view_patient_services_list->RowIndex ?>_id" id="o<?php echo $view_patient_services_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<span id="el$rowindex$_view_patient_services_Reception" class="form-group view_patient_services_Reception">
<input type="text" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Reception->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Reception->EditValue ?>"<?php echo $view_patient_services->Reception->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="o<?php echo $view_patient_services_list->RowIndex ?>_Reception" id="o<?php echo $view_patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<span id="el$rowindex$_view_patient_services_mrnno" class="form-group view_patient_services_mrnno">
<input type="text" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->mrnno->EditValue ?>"<?php echo $view_patient_services->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="o<?php echo $view_patient_services_list->RowIndex ?>_mrnno" id="o<?php echo $view_patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_view_patient_services_PatientName" class="form-group view_patient_services_PatientName">
<input type="text" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatientName->EditValue ?>"<?php echo $view_patient_services->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatientName" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Age->Visible) { // Age ?>
		<td data-name="Age">
<span id="el$rowindex$_view_patient_services_Age" class="form-group view_patient_services_Age">
<input type="text" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_list->RowIndex ?>_Age" id="x<?php echo $view_patient_services_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Age->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Age->EditValue ?>"<?php echo $view_patient_services->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="o<?php echo $view_patient_services_list->RowIndex ?>_Age" id="o<?php echo $view_patient_services_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<span id="el$rowindex$_view_patient_services_Gender" class="form-group view_patient_services_Gender">
<input type="text" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Gender->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Gender->EditValue ?>"<?php echo $view_patient_services->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="o<?php echo $view_patient_services_list->RowIndex ?>_Gender" id="o<?php echo $view_patient_services_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic">
<span id="el$rowindex$_view_patient_services_profilePic" class="form-group view_patient_services_profilePic">
<textarea data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->profilePic->getPlaceHolder()) ?>"<?php echo $view_patient_services->profilePic->editAttributes() ?>><?php echo $view_patient_services->profilePic->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="o<?php echo $view_patient_services_list->RowIndex ?>_profilePic" id="o<?php echo $view_patient_services_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Services->Visible) { // Services ?>
		<td data-name="Services">
<span id="el$rowindex$_view_patient_services_Services" class="form-group view_patient_services_Services">
<?php
$wrkonchange = "" . trim(@$view_patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_list->RowIndex ?>_Services" class="text-nowrap" style="z-index: <?php echo (9000 - $view_patient_services_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_patient_serviceslist.createAutoSuggest({"id":"x<?php echo $view_patient_services_list->RowIndex ?>_Services","forceSelect":false});
</script>
<?php echo $view_patient_services->Services->Lookup->getParamTag("p_x" . $view_patient_services_list->RowIndex . "_Services") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="o<?php echo $view_patient_services_list->RowIndex ?>_Services" id="o<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Unit->Visible) { // Unit ?>
		<td data-name="Unit">
<span id="el$rowindex$_view_patient_services_Unit" class="form-group view_patient_services_Unit">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Unit->EditValue ?>"<?php echo $view_patient_services->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="o<?php echo $view_patient_services_list->RowIndex ?>_Unit" id="o<?php echo $view_patient_services_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services->Unit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->amount->Visible) { // amount ?>
		<td data-name="amount">
<span id="el$rowindex$_view_patient_services_amount" class="form-group view_patient_services_amount">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_list->RowIndex ?>_amount" id="x<?php echo $view_patient_services_list->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->amount->EditValue ?>"<?php echo $view_patient_services->amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="o<?php echo $view_patient_services_list->RowIndex ?>_amount" id="o<?php echo $view_patient_services_list->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services->amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<span id="el$rowindex$_view_patient_services_Quantity" class="form-group view_patient_services_Quantity">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Quantity->EditValue ?>"<?php echo $view_patient_services->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="o<?php echo $view_patient_services_list->RowIndex ?>_Quantity" id="o<?php echo $view_patient_services_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory">
<span id="el$rowindex$_view_patient_services_DiscountCategory" class="form-group view_patient_services_DiscountCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services->DiscountCategory->editAttributes() ?>>
		<?php echo $view_patient_services->DiscountCategory->selectOptionListHtml("x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory") ?>
	</select>
</div>
<?php echo $view_patient_services->DiscountCategory->Lookup->getParamTag("p_x" . $view_patient_services_list->RowIndex . "_DiscountCategory") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="o<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" id="o<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services->DiscountCategory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Discount->Visible) { // Discount ?>
		<td data-name="Discount">
<span id="el$rowindex$_view_patient_services_Discount" class="form-group view_patient_services_Discount">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Discount->EditValue ?>"<?php echo $view_patient_services->Discount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="o<?php echo $view_patient_services_list->RowIndex ?>_Discount" id="o<?php echo $view_patient_services_list->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services->Discount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal">
<span id="el$rowindex$_view_patient_services_SubTotal" class="form-group view_patient_services_SubTotal">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SubTotal->EditValue ?>"<?php echo $view_patient_services->SubTotal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="o<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" id="o<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services->SubTotal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->description->Visible) { // description ?>
		<td data-name="description">
<span id="el$rowindex$_view_patient_services_description" class="form-group view_patient_services_description">
<textarea data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_list->RowIndex ?>_description" id="x<?php echo $view_patient_services_list->RowIndex ?>_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->description->getPlaceHolder()) ?>"<?php echo $view_patient_services->description->editAttributes() ?>><?php echo $view_patient_services->description->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="o<?php echo $view_patient_services_list->RowIndex ?>_description" id="o<?php echo $view_patient_services_list->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services->description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type">
<span id="el$rowindex$_view_patient_services_patient_type" class="form-group view_patient_services_patient_type">
<input type="text" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->patient_type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->patient_type->EditValue ?>"<?php echo $view_patient_services->patient_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="o<?php echo $view_patient_services_list->RowIndex ?>_patient_type" id="o<?php echo $view_patient_services_list->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date">
<span id="el$rowindex$_view_patient_services_charged_date" class="form-group view_patient_services_charged_date">
<input type="text" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" placeholder="<?php echo HtmlEncode($view_patient_services->charged_date->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->charged_date->EditValue ?>"<?php echo $view_patient_services->charged_date->editAttributes() ?>>
<?php if (!$view_patient_services->charged_date->ReadOnly && !$view_patient_services->charged_date->Disabled && !isset($view_patient_services->charged_date->EditAttrs["readonly"]) && !isset($view_patient_services->charged_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="o<?php echo $view_patient_services_list->RowIndex ?>_charged_date" id="o<?php echo $view_patient_services_list->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_view_patient_services_status" class="form-group view_patient_services_status">
<input type="text" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_list->RowIndex ?>_status" id="x<?php echo $view_patient_services_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->status->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->status->EditValue ?>"<?php echo $view_patient_services->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="o<?php echo $view_patient_services_list->RowIndex ?>_status" id="o<?php echo $view_patient_services_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="o<?php echo $view_patient_services_list->RowIndex ?>_createdby" id="o<?php echo $view_patient_services_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="o<?php echo $view_patient_services_list->RowIndex ?>_createddatetime" id="o<?php echo $view_patient_services_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="o<?php echo $view_patient_services_list->RowIndex ?>_modifiedby" id="o<?php echo $view_patient_services_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="o<?php echo $view_patient_services_list->RowIndex ?>_modifieddatetime" id="o<?php echo $view_patient_services_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Aid->Visible) { // Aid ?>
		<td data-name="Aid">
<span id="el$rowindex$_view_patient_services_Aid" class="form-group view_patient_services_Aid">
<input type="text" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Aid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Aid->EditValue ?>"<?php echo $view_patient_services->Aid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="o<?php echo $view_patient_services_list->RowIndex ?>_Aid" id="o<?php echo $view_patient_services_list->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if ($view_patient_services->Vid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<span<?php echo $view_patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<input type="text" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Vid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Vid->EditValue ?>"<?php echo $view_patient_services->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="o<?php echo $view_patient_services_list->RowIndex ?>_Vid" id="o<?php echo $view_patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<span id="el$rowindex$_view_patient_services_DrID" class="form-group view_patient_services_DrID">
<input type="text" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrID->EditValue ?>"<?php echo $view_patient_services->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrID" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<span id="el$rowindex$_view_patient_services_DrCODE" class="form-group view_patient_services_DrCODE">
<input type="text" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrCODE->EditValue ?>"<?php echo $view_patient_services->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<span id="el$rowindex$_view_patient_services_DrName" class="form-group view_patient_services_DrName">
<input type="text" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DrName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrName->EditValue ?>"<?php echo $view_patient_services->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrName" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Department->Visible) { // Department ?>
		<td data-name="Department">
<span id="el$rowindex$_view_patient_services_Department" class="form-group view_patient_services_Department">
<input type="text" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Department->EditValue ?>"<?php echo $view_patient_services->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="o<?php echo $view_patient_services_list->RowIndex ?>_Department" id="o<?php echo $view_patient_services_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres">
<span id="el$rowindex$_view_patient_services_DrSharePres" class="form-group view_patient_services_DrSharePres">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrSharePres->EditValue ?>"<?php echo $view_patient_services->DrSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services->DrSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres">
<span id="el$rowindex$_view_patient_services_HospSharePres" class="form-group view_patient_services_HospSharePres">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospSharePres->EditValue ?>"<?php echo $view_patient_services->HospSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services->HospSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<span id="el$rowindex$_view_patient_services_DrShareAmount" class="form-group view_patient_services_DrShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareAmount->EditValue ?>"<?php echo $view_patient_services->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<span id="el$rowindex$_view_patient_services_HospShareAmount" class="form-group view_patient_services_HospShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospShareAmount->EditValue ?>"<?php echo $view_patient_services->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount">
<span id="el$rowindex$_view_patient_services_DrShareSettiledAmount" class="form-group view_patient_services_DrShareSettiledAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId">
<span id="el$rowindex$_view_patient_services_DrShareSettledId" class="form-group view_patient_services_DrShareSettledId">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services->DrShareSettledId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus">
<span id="el$rowindex$_view_patient_services_DrShareSettiledStatus" class="form-group view_patient_services_DrShareSettiledStatus">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<span id="el$rowindex$_view_patient_services_invoiceId" class="form-group view_patient_services_invoiceId">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceId->EditValue ?>"<?php echo $view_patient_services->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount">
<span id="el$rowindex$_view_patient_services_invoiceAmount" class="form-group view_patient_services_invoiceAmount">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceAmount->EditValue ?>"<?php echo $view_patient_services->invoiceAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services->invoiceAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus">
<span id="el$rowindex$_view_patient_services_invoiceStatus" class="form-group view_patient_services_invoiceStatus">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceStatus->EditValue ?>"<?php echo $view_patient_services->invoiceStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services->invoiceStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment">
<span id="el$rowindex$_view_patient_services_modeOfPayment" class="form-group view_patient_services_modeOfPayment">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->modeOfPayment->EditValue ?>"<?php echo $view_patient_services->modeOfPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="o<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" id="o<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services->modeOfPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospID" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<span id="el$rowindex$_view_patient_services_RIDNO" class="form-group view_patient_services_RIDNO">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RIDNO->EditValue ?>"<?php echo $view_patient_services->RIDNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="o<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" id="o<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<span id="el$rowindex$_view_patient_services_ItemCode" class="form-group view_patient_services_ItemCode">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ItemCode->EditValue ?>"<?php echo $view_patient_services->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="o<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" id="o<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<span id="el$rowindex$_view_patient_services_TidNo" class="form-group view_patient_services_TidNo">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TidNo->EditValue ?>"<?php echo $view_patient_services->TidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="o<?php echo $view_patient_services_list->RowIndex ?>_TidNo" id="o<?php echo $view_patient_services_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->sid->Visible) { // sid ?>
		<td data-name="sid">
<span id="el$rowindex$_view_patient_services_sid" class="form-group view_patient_services_sid">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_list->RowIndex ?>_sid" id="x<?php echo $view_patient_services_list->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->sid->EditValue ?>"<?php echo $view_patient_services->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="o<?php echo $view_patient_services_list->RowIndex ?>_sid" id="o<?php echo $view_patient_services_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el$rowindex$_view_patient_services_TestSubCd" class="form-group view_patient_services_TestSubCd">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestSubCd->EditValue ?>"<?php echo $view_patient_services->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<span id="el$rowindex$_view_patient_services_DEptCd" class="form-group view_patient_services_DEptCd">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DEptCd->EditValue ?>"<?php echo $view_patient_services->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd">
<span id="el$rowindex$_view_patient_services_ProfCd" class="form-group view_patient_services_ProfCd">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ProfCd->EditValue ?>"<?php echo $view_patient_services->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services->ProfCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Comments->Visible) { // Comments ?>
		<td data-name="Comments">
<span id="el$rowindex$_view_patient_services_Comments" class="form-group view_patient_services_Comments">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Comments->EditValue ?>"<?php echo $view_patient_services->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="o<?php echo $view_patient_services_list->RowIndex ?>_Comments" id="o<?php echo $view_patient_services_list->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services->Comments->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el$rowindex$_view_patient_services_Method" class="form-group view_patient_services_Method">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_list->RowIndex ?>_Method" id="x<?php echo $view_patient_services_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Method->EditValue ?>"<?php echo $view_patient_services->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="o<?php echo $view_patient_services_list->RowIndex ?>_Method" id="o<?php echo $view_patient_services_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen">
<span id="el$rowindex$_view_patient_services_Specimen" class="form-group view_patient_services_Specimen">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Specimen->EditValue ?>"<?php echo $view_patient_services->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="o<?php echo $view_patient_services_list->RowIndex ?>_Specimen" id="o<?php echo $view_patient_services_list->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services->Specimen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal">
<span id="el$rowindex$_view_patient_services_Abnormal" class="form-group view_patient_services_Abnormal">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Abnormal->EditValue ?>"<?php echo $view_patient_services->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="o<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" id="o<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services->Abnormal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<span id="el$rowindex$_view_patient_services_TestUnit" class="form-group view_patient_services_TestUnit">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestUnit->EditValue ?>"<?php echo $view_patient_services->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH">
<span id="el$rowindex$_view_patient_services_LOWHIGH" class="form-group view_patient_services_LOWHIGH">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->LOWHIGH->EditValue ?>"<?php echo $view_patient_services->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="o<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" id="o<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services->LOWHIGH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Branch->Visible) { // Branch ?>
		<td data-name="Branch">
<span id="el$rowindex$_view_patient_services_Branch" class="form-group view_patient_services_Branch">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Branch->EditValue ?>"<?php echo $view_patient_services->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="o<?php echo $view_patient_services_list->RowIndex ?>_Branch" id="o<?php echo $view_patient_services_list->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services->Branch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch">
<span id="el$rowindex$_view_patient_services_Dispatch" class="form-group view_patient_services_Dispatch">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Dispatch->EditValue ?>"<?php echo $view_patient_services->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="o<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" id="o<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services->Dispatch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<span id="el$rowindex$_view_patient_services_Pic1" class="form-group view_patient_services_Pic1">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic1->EditValue ?>"<?php echo $view_patient_services->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="o<?php echo $view_patient_services_list->RowIndex ?>_Pic1" id="o<?php echo $view_patient_services_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<span id="el$rowindex$_view_patient_services_Pic2" class="form-group view_patient_services_Pic2">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic2->EditValue ?>"<?php echo $view_patient_services->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="o<?php echo $view_patient_services_list->RowIndex ?>_Pic2" id="o<?php echo $view_patient_services_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath">
<span id="el$rowindex$_view_patient_services_GraphPath" class="form-group view_patient_services_GraphPath">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->GraphPath->EditValue ?>"<?php echo $view_patient_services->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="o<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" id="o<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services->GraphPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD">
<span id="el$rowindex$_view_patient_services_MachineCD" class="form-group view_patient_services_MachineCD">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->MachineCD->EditValue ?>"<?php echo $view_patient_services->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="o<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" id="o<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services->MachineCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel">
<span id="el$rowindex$_view_patient_services_TestCancel" class="form-group view_patient_services_TestCancel">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestCancel->EditValue ?>"<?php echo $view_patient_services->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services->TestCancel->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource">
<span id="el$rowindex$_view_patient_services_OutSource" class="form-group view_patient_services_OutSource">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->OutSource->EditValue ?>"<?php echo $view_patient_services->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="o<?php echo $view_patient_services_list->RowIndex ?>_OutSource" id="o<?php echo $view_patient_services_list->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services->OutSource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Printed->Visible) { // Printed ?>
		<td data-name="Printed">
<span id="el$rowindex$_view_patient_services_Printed" class="form-group view_patient_services_Printed">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Printed->EditValue ?>"<?php echo $view_patient_services->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="o<?php echo $view_patient_services_list->RowIndex ?>_Printed" id="o<?php echo $view_patient_services_list->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services->Printed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy">
<span id="el$rowindex$_view_patient_services_PrintBy" class="form-group view_patient_services_PrintBy">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintBy->EditValue ?>"<?php echo $view_patient_services->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services->PrintBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate">
<span id="el$rowindex$_view_patient_services_PrintDate" class="form-group view_patient_services_PrintDate">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintDate->EditValue ?>"<?php echo $view_patient_services->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services->PrintDate->ReadOnly && !$view_patient_services->PrintDate->Disabled && !isset($view_patient_services->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services->PrintDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate">
<span id="el$rowindex$_view_patient_services_BillingDate" class="form-group view_patient_services_BillingDate">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillingDate->EditValue ?>"<?php echo $view_patient_services->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services->BillingDate->ReadOnly && !$view_patient_services->BillingDate->Disabled && !isset($view_patient_services->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services->BillingDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy">
<span id="el$rowindex$_view_patient_services_BilledBy" class="form-group view_patient_services_BilledBy">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BilledBy->EditValue ?>"<?php echo $view_patient_services->BilledBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services->BilledBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<span id="el$rowindex$_view_patient_services_Resulted" class="form-group view_patient_services_Resulted">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Resulted->EditValue ?>"<?php echo $view_patient_services->Resulted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="o<?php echo $view_patient_services_list->RowIndex ?>_Resulted" id="o<?php echo $view_patient_services_list->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<span id="el$rowindex$_view_patient_services_ResultDate" class="form-group view_patient_services_ResultDate">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultDate->EditValue ?>"<?php echo $view_patient_services->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services->ResultDate->ReadOnly && !$view_patient_services->ResultDate->Disabled && !isset($view_patient_services->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<span id="el$rowindex$_view_patient_services_ResultedBy" class="form-group view_patient_services_ResultedBy">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultedBy->EditValue ?>"<?php echo $view_patient_services->ResultedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate">
<span id="el$rowindex$_view_patient_services_SampleDate" class="form-group view_patient_services_SampleDate">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleDate->EditValue ?>"<?php echo $view_patient_services->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services->SampleDate->ReadOnly && !$view_patient_services->SampleDate->Disabled && !isset($view_patient_services->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services->SampleDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser">
<span id="el$rowindex$_view_patient_services_SampleUser" class="form-group view_patient_services_SampleUser">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleUser->EditValue ?>"<?php echo $view_patient_services->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services->SampleUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled">
<span id="el$rowindex$_view_patient_services_Sampled" class="form-group view_patient_services_Sampled">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sampled->EditValue ?>"<?php echo $view_patient_services->Sampled->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="o<?php echo $view_patient_services_list->RowIndex ?>_Sampled" id="o<?php echo $view_patient_services_list->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services->Sampled->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate">
<span id="el$rowindex$_view_patient_services_ReceivedDate" class="form-group view_patient_services_ReceivedDate">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedDate->EditValue ?>"<?php echo $view_patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services->ReceivedDate->ReadOnly && !$view_patient_services->ReceivedDate->Disabled && !isset($view_patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services->ReceivedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser">
<span id="el$rowindex$_view_patient_services_ReceivedUser" class="form-group view_patient_services_ReceivedUser">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedUser->EditValue ?>"<?php echo $view_patient_services->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services->ReceivedUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied">
<span id="el$rowindex$_view_patient_services_Recevied" class="form-group view_patient_services_Recevied">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Recevied->EditValue ?>"<?php echo $view_patient_services->Recevied->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="o<?php echo $view_patient_services_list->RowIndex ?>_Recevied" id="o<?php echo $view_patient_services_list->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services->Recevied->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate">
<span id="el$rowindex$_view_patient_services_DeptRecvDate" class="form-group view_patient_services_DeptRecvDate">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services->DeptRecvDate->ReadOnly && !$view_patient_services->DeptRecvDate->Disabled && !isset($view_patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser">
<span id="el$rowindex$_view_patient_services_DeptRecvUser" class="form-group view_patient_services_DeptRecvUser">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived">
<span id="el$rowindex$_view_patient_services_DeptRecived" class="form-group view_patient_services_DeptRecived">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecived->EditValue ?>"<?php echo $view_patient_services->DeptRecived->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services->DeptRecived->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate">
<span id="el$rowindex$_view_patient_services_SAuthDate" class="form-group view_patient_services_SAuthDate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthDate->EditValue ?>"<?php echo $view_patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->SAuthDate->ReadOnly && !$view_patient_services->SAuthDate->Disabled && !isset($view_patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services->SAuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy">
<span id="el$rowindex$_view_patient_services_SAuthBy" class="form-group view_patient_services_SAuthBy">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthBy->EditValue ?>"<?php echo $view_patient_services->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services->SAuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate">
<span id="el$rowindex$_view_patient_services_SAuthendicate" class="form-group view_patient_services_SAuthendicate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthendicate->EditValue ?>"<?php echo $view_patient_services->SAuthendicate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services->SAuthendicate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate">
<span id="el$rowindex$_view_patient_services_AuthDate" class="form-group view_patient_services_AuthDate">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthDate->EditValue ?>"<?php echo $view_patient_services->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->AuthDate->ReadOnly && !$view_patient_services->AuthDate->Disabled && !isset($view_patient_services->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services->AuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy">
<span id="el$rowindex$_view_patient_services_AuthBy" class="form-group view_patient_services_AuthBy">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthBy->EditValue ?>"<?php echo $view_patient_services->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services->AuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate">
<span id="el$rowindex$_view_patient_services_Authencate" class="form-group view_patient_services_Authencate">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Authencate->EditValue ?>"<?php echo $view_patient_services->Authencate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="o<?php echo $view_patient_services_list->RowIndex ?>_Authencate" id="o<?php echo $view_patient_services_list->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services->Authencate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate">
<span id="el$rowindex$_view_patient_services_EditDate" class="form-group view_patient_services_EditDate">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditDate->EditValue ?>"<?php echo $view_patient_services->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services->EditDate->ReadOnly && !$view_patient_services->EditDate->Disabled && !isset($view_patient_services->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_EditDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services->EditDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy">
<span id="el$rowindex$_view_patient_services_EditBy" class="form-group view_patient_services_EditBy">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditBy->EditValue ?>"<?php echo $view_patient_services->EditBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_EditBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services->EditBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Editted->Visible) { // Editted ?>
		<td data-name="Editted">
<span id="el$rowindex$_view_patient_services_Editted" class="form-group view_patient_services_Editted">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Editted->EditValue ?>"<?php echo $view_patient_services->Editted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="o<?php echo $view_patient_services_list->RowIndex ?>_Editted" id="o<?php echo $view_patient_services_list->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services->Editted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<span id="el$rowindex$_view_patient_services_PatID" class="form-group view_patient_services_PatID">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatID->EditValue ?>"<?php echo $view_patient_services->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatID" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<span id="el$rowindex$_view_patient_services_PatientId" class="form-group view_patient_services_PatientId">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatientId->EditValue ?>"<?php echo $view_patient_services->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatientId" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<span id="el$rowindex$_view_patient_services_Mobile" class="form-group view_patient_services_Mobile">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Mobile->EditValue ?>"<?php echo $view_patient_services->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="o<?php echo $view_patient_services_list->RowIndex ?>_Mobile" id="o<?php echo $view_patient_services_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->CId->Visible) { // CId ?>
		<td data-name="CId">
<span id="el$rowindex$_view_patient_services_CId" class="form-group view_patient_services_CId">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_list->RowIndex ?>_CId" id="x<?php echo $view_patient_services_list->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CId->EditValue ?>"<?php echo $view_patient_services->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="o<?php echo $view_patient_services_list->RowIndex ?>_CId" id="o<?php echo $view_patient_services_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services->CId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el$rowindex$_view_patient_services_Order" class="form-group view_patient_services_Order">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_list->RowIndex ?>_Order" id="x<?php echo $view_patient_services_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Order->EditValue ?>"<?php echo $view_patient_services->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="o<?php echo $view_patient_services_list->RowIndex ?>_Order" id="o<?php echo $view_patient_services_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<span id="el$rowindex$_view_patient_services_ResType" class="form-group view_patient_services_ResType">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResType->EditValue ?>"<?php echo $view_patient_services->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResType" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<span id="el$rowindex$_view_patient_services_Sample" class="form-group view_patient_services_Sample">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sample->EditValue ?>"<?php echo $view_patient_services->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="o<?php echo $view_patient_services_list->RowIndex ?>_Sample" id="o<?php echo $view_patient_services_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<span id="el$rowindex$_view_patient_services_NoD" class="form-group view_patient_services_NoD">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->NoD->EditValue ?>"<?php echo $view_patient_services->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="o<?php echo $view_patient_services_list->RowIndex ?>_NoD" id="o<?php echo $view_patient_services_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<span id="el$rowindex$_view_patient_services_BillOrder" class="form-group view_patient_services_BillOrder">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillOrder->EditValue ?>"<?php echo $view_patient_services->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="o<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" id="o<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<span id="el$rowindex$_view_patient_services_Inactive" class="form-group view_patient_services_Inactive">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Inactive->EditValue ?>"<?php echo $view_patient_services->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="o<?php echo $view_patient_services_list->RowIndex ?>_Inactive" id="o<?php echo $view_patient_services_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<span id="el$rowindex$_view_patient_services_CollSample" class="form-group view_patient_services_CollSample">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CollSample->EditValue ?>"<?php echo $view_patient_services->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="o<?php echo $view_patient_services_list->RowIndex ?>_CollSample" id="o<?php echo $view_patient_services_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el$rowindex$_view_patient_services_TestType" class="form-group view_patient_services_TestType">
<input type="text" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestType->EditValue ?>"<?php echo $view_patient_services->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestType" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<span id="el$rowindex$_view_patient_services_Repeated" class="form-group view_patient_services_Repeated">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Repeated->EditValue ?>"<?php echo $view_patient_services->Repeated->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="o<?php echo $view_patient_services_list->RowIndex ?>_Repeated" id="o<?php echo $view_patient_services_list->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy">
<span id="el$rowindex$_view_patient_services_RepeatedBy" class="form-group view_patient_services_RepeatedBy">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedBy->EditValue ?>"<?php echo $view_patient_services->RepeatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services->RepeatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate">
<span id="el$rowindex$_view_patient_services_RepeatedDate" class="form-group view_patient_services_RepeatedDate">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedDate->EditValue ?>"<?php echo $view_patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services->RepeatedDate->ReadOnly && !$view_patient_services->RepeatedDate->Disabled && !isset($view_patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services->RepeatedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID">
<span id="el$rowindex$_view_patient_services_serviceID" class="form-group view_patient_services_serviceID">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->serviceID->EditValue ?>"<?php echo $view_patient_services->serviceID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="o<?php echo $view_patient_services_list->RowIndex ?>_serviceID" id="o<?php echo $view_patient_services_list->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services->serviceID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type">
<span id="el$rowindex$_view_patient_services_Service_Type" class="form-group view_patient_services_Service_Type">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Type->EditValue ?>"<?php echo $view_patient_services->Service_Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" id="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services->Service_Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department">
<span id="el$rowindex$_view_patient_services_Service_Department" class="form-group view_patient_services_Service_Department">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Department->EditValue ?>"<?php echo $view_patient_services->Service_Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" id="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services->Service_Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo">
<span id="el$rowindex$_view_patient_services_RequestNo" class="form-group view_patient_services_RequestNo">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RequestNo->EditValue ?>"<?php echo $view_patient_services->RequestNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="o<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" id="o<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services->RequestNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_services_list->ListOptions->render("body", "right", $view_patient_services_list->RowIndex);
?>
<script>
fview_patient_serviceslist.updateLists(<?php echo $view_patient_services_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
<?php

// Render aggregate row
$view_patient_services->RowType = ROWTYPE_AGGREGATE;
$view_patient_services->resetAttributes();
$view_patient_services_list->renderRow();
?>
<?php if ($view_patient_services_list->TotalRecs > 0 && !$view_patient_services->isGridAdd() && !$view_patient_services->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_patient_services_list->renderListOptions();

// Render list options (footer, left)
$view_patient_services_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_patient_services->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_patient_services->id->footerCellClass() ?>"><span id="elf_view_patient_services_id" class="view_patient_services_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Reception->Visible) { // Reception ?>
		<td data-name="Reception" class="<?php echo $view_patient_services->Reception->footerCellClass() ?>"><span id="elf_view_patient_services_Reception" class="view_patient_services_Reception">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" class="<?php echo $view_patient_services->mrnno->footerCellClass() ?>"><span id="elf_view_patient_services_mrnno" class="view_patient_services_mrnno">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_patient_services->PatientName->footerCellClass() ?>"><span id="elf_view_patient_services_PatientName" class="view_patient_services_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Age->Visible) { // Age ?>
		<td data-name="Age" class="<?php echo $view_patient_services->Age->footerCellClass() ?>"><span id="elf_view_patient_services_Age" class="view_patient_services_Age">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Gender->Visible) { // Gender ?>
		<td data-name="Gender" class="<?php echo $view_patient_services->Gender->footerCellClass() ?>"><span id="elf_view_patient_services_Gender" class="view_patient_services_Gender">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" class="<?php echo $view_patient_services->profilePic->footerCellClass() ?>"><span id="elf_view_patient_services_profilePic" class="view_patient_services_profilePic">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Services->Visible) { // Services ?>
		<td data-name="Services" class="<?php echo $view_patient_services->Services->footerCellClass() ?>"><span id="elf_view_patient_services_Services" class="view_patient_services_Services">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Unit->Visible) { // Unit ?>
		<td data-name="Unit" class="<?php echo $view_patient_services->Unit->footerCellClass() ?>"><span id="elf_view_patient_services_Unit" class="view_patient_services_Unit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->amount->Visible) { // amount ?>
		<td data-name="amount" class="<?php echo $view_patient_services->amount->footerCellClass() ?>"><span id="elf_view_patient_services_amount" class="view_patient_services_amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_patient_services->amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $view_patient_services->Quantity->footerCellClass() ?>"><span id="elf_view_patient_services_Quantity" class="view_patient_services_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory" class="<?php echo $view_patient_services->DiscountCategory->footerCellClass() ?>"><span id="elf_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Discount->Visible) { // Discount ?>
		<td data-name="Discount" class="<?php echo $view_patient_services->Discount->footerCellClass() ?>"><span id="elf_view_patient_services_Discount" class="view_patient_services_Discount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" class="<?php echo $view_patient_services->SubTotal->footerCellClass() ?>"><span id="elf_view_patient_services_SubTotal" class="view_patient_services_SubTotal">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_patient_services->SubTotal->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->description->Visible) { // description ?>
		<td data-name="description" class="<?php echo $view_patient_services->description->footerCellClass() ?>"><span id="elf_view_patient_services_description" class="view_patient_services_description">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" class="<?php echo $view_patient_services->patient_type->footerCellClass() ?>"><span id="elf_view_patient_services_patient_type" class="view_patient_services_patient_type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" class="<?php echo $view_patient_services->charged_date->footerCellClass() ?>"><span id="elf_view_patient_services_charged_date" class="view_patient_services_charged_date">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->status->Visible) { // status ?>
		<td data-name="status" class="<?php echo $view_patient_services->status->footerCellClass() ?>"><span id="elf_view_patient_services_status" class="view_patient_services_status">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $view_patient_services->createdby->footerCellClass() ?>"><span id="elf_view_patient_services_createdby" class="view_patient_services_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_patient_services->createddatetime->footerCellClass() ?>"><span id="elf_view_patient_services_createddatetime" class="view_patient_services_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" class="<?php echo $view_patient_services->modifiedby->footerCellClass() ?>"><span id="elf_view_patient_services_modifiedby" class="view_patient_services_modifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" class="<?php echo $view_patient_services->modifieddatetime->footerCellClass() ?>"><span id="elf_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Aid->Visible) { // Aid ?>
		<td data-name="Aid" class="<?php echo $view_patient_services->Aid->footerCellClass() ?>"><span id="elf_view_patient_services_Aid" class="view_patient_services_Aid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Vid->Visible) { // Vid ?>
		<td data-name="Vid" class="<?php echo $view_patient_services->Vid->footerCellClass() ?>"><span id="elf_view_patient_services_Vid" class="view_patient_services_Vid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DrID->Visible) { // DrID ?>
		<td data-name="DrID" class="<?php echo $view_patient_services->DrID->footerCellClass() ?>"><span id="elf_view_patient_services_DrID" class="view_patient_services_DrID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" class="<?php echo $view_patient_services->DrCODE->footerCellClass() ?>"><span id="elf_view_patient_services_DrCODE" class="view_patient_services_DrCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DrName->Visible) { // DrName ?>
		<td data-name="DrName" class="<?php echo $view_patient_services->DrName->footerCellClass() ?>"><span id="elf_view_patient_services_DrName" class="view_patient_services_DrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Department->Visible) { // Department ?>
		<td data-name="Department" class="<?php echo $view_patient_services->Department->footerCellClass() ?>"><span id="elf_view_patient_services_Department" class="view_patient_services_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres" class="<?php echo $view_patient_services->DrSharePres->footerCellClass() ?>"><span id="elf_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres" class="<?php echo $view_patient_services->HospSharePres->footerCellClass() ?>"><span id="elf_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" class="<?php echo $view_patient_services->DrShareAmount->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" class="<?php echo $view_patient_services->HospShareAmount->footerCellClass() ?>"><span id="elf_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services->DrShareSettiledAmount->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId" class="<?php echo $view_patient_services->DrShareSettledId->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services->DrShareSettiledStatus->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" class="<?php echo $view_patient_services->invoiceId->footerCellClass() ?>"><span id="elf_view_patient_services_invoiceId" class="view_patient_services_invoiceId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" class="<?php echo $view_patient_services->invoiceAmount->footerCellClass() ?>"><span id="elf_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" class="<?php echo $view_patient_services->invoiceStatus->footerCellClass() ?>"><span id="elf_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" class="<?php echo $view_patient_services->modeOfPayment->footerCellClass() ?>"><span id="elf_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_patient_services->HospID->footerCellClass() ?>"><span id="elf_view_patient_services_HospID" class="view_patient_services_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" class="<?php echo $view_patient_services->RIDNO->footerCellClass() ?>"><span id="elf_view_patient_services_RIDNO" class="view_patient_services_RIDNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" class="<?php echo $view_patient_services->ItemCode->footerCellClass() ?>"><span id="elf_view_patient_services_ItemCode" class="view_patient_services_ItemCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" class="<?php echo $view_patient_services->TidNo->footerCellClass() ?>"><span id="elf_view_patient_services_TidNo" class="view_patient_services_TidNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->sid->Visible) { // sid ?>
		<td data-name="sid" class="<?php echo $view_patient_services->sid->footerCellClass() ?>"><span id="elf_view_patient_services_sid" class="view_patient_services_sid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" class="<?php echo $view_patient_services->TestSubCd->footerCellClass() ?>"><span id="elf_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" class="<?php echo $view_patient_services->DEptCd->footerCellClass() ?>"><span id="elf_view_patient_services_DEptCd" class="view_patient_services_DEptCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" class="<?php echo $view_patient_services->ProfCd->footerCellClass() ?>"><span id="elf_view_patient_services_ProfCd" class="view_patient_services_ProfCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Comments->Visible) { // Comments ?>
		<td data-name="Comments" class="<?php echo $view_patient_services->Comments->footerCellClass() ?>"><span id="elf_view_patient_services_Comments" class="view_patient_services_Comments">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Method->Visible) { // Method ?>
		<td data-name="Method" class="<?php echo $view_patient_services->Method->footerCellClass() ?>"><span id="elf_view_patient_services_Method" class="view_patient_services_Method">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" class="<?php echo $view_patient_services->Specimen->footerCellClass() ?>"><span id="elf_view_patient_services_Specimen" class="view_patient_services_Specimen">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" class="<?php echo $view_patient_services->Abnormal->footerCellClass() ?>"><span id="elf_view_patient_services_Abnormal" class="view_patient_services_Abnormal">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" class="<?php echo $view_patient_services->TestUnit->footerCellClass() ?>"><span id="elf_view_patient_services_TestUnit" class="view_patient_services_TestUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" class="<?php echo $view_patient_services->LOWHIGH->footerCellClass() ?>"><span id="elf_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Branch->Visible) { // Branch ?>
		<td data-name="Branch" class="<?php echo $view_patient_services->Branch->footerCellClass() ?>"><span id="elf_view_patient_services_Branch" class="view_patient_services_Branch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" class="<?php echo $view_patient_services->Dispatch->footerCellClass() ?>"><span id="elf_view_patient_services_Dispatch" class="view_patient_services_Dispatch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" class="<?php echo $view_patient_services->Pic1->footerCellClass() ?>"><span id="elf_view_patient_services_Pic1" class="view_patient_services_Pic1">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" class="<?php echo $view_patient_services->Pic2->footerCellClass() ?>"><span id="elf_view_patient_services_Pic2" class="view_patient_services_Pic2">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" class="<?php echo $view_patient_services->GraphPath->footerCellClass() ?>"><span id="elf_view_patient_services_GraphPath" class="view_patient_services_GraphPath">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" class="<?php echo $view_patient_services->MachineCD->footerCellClass() ?>"><span id="elf_view_patient_services_MachineCD" class="view_patient_services_MachineCD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" class="<?php echo $view_patient_services->TestCancel->footerCellClass() ?>"><span id="elf_view_patient_services_TestCancel" class="view_patient_services_TestCancel">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" class="<?php echo $view_patient_services->OutSource->footerCellClass() ?>"><span id="elf_view_patient_services_OutSource" class="view_patient_services_OutSource">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Printed->Visible) { // Printed ?>
		<td data-name="Printed" class="<?php echo $view_patient_services->Printed->footerCellClass() ?>"><span id="elf_view_patient_services_Printed" class="view_patient_services_Printed">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" class="<?php echo $view_patient_services->PrintBy->footerCellClass() ?>"><span id="elf_view_patient_services_PrintBy" class="view_patient_services_PrintBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" class="<?php echo $view_patient_services->PrintDate->footerCellClass() ?>"><span id="elf_view_patient_services_PrintDate" class="view_patient_services_PrintDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate" class="<?php echo $view_patient_services->BillingDate->footerCellClass() ?>"><span id="elf_view_patient_services_BillingDate" class="view_patient_services_BillingDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy" class="<?php echo $view_patient_services->BilledBy->footerCellClass() ?>"><span id="elf_view_patient_services_BilledBy" class="view_patient_services_BilledBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" class="<?php echo $view_patient_services->Resulted->footerCellClass() ?>"><span id="elf_view_patient_services_Resulted" class="view_patient_services_Resulted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" class="<?php echo $view_patient_services->ResultDate->footerCellClass() ?>"><span id="elf_view_patient_services_ResultDate" class="view_patient_services_ResultDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" class="<?php echo $view_patient_services->ResultedBy->footerCellClass() ?>"><span id="elf_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" class="<?php echo $view_patient_services->SampleDate->footerCellClass() ?>"><span id="elf_view_patient_services_SampleDate" class="view_patient_services_SampleDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" class="<?php echo $view_patient_services->SampleUser->footerCellClass() ?>"><span id="elf_view_patient_services_SampleUser" class="view_patient_services_SampleUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled" class="<?php echo $view_patient_services->Sampled->footerCellClass() ?>"><span id="elf_view_patient_services_Sampled" class="view_patient_services_Sampled">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" class="<?php echo $view_patient_services->ReceivedDate->footerCellClass() ?>"><span id="elf_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" class="<?php echo $view_patient_services->ReceivedUser->footerCellClass() ?>"><span id="elf_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied" class="<?php echo $view_patient_services->Recevied->footerCellClass() ?>"><span id="elf_view_patient_services_Recevied" class="view_patient_services_Recevied">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" class="<?php echo $view_patient_services->DeptRecvDate->footerCellClass() ?>"><span id="elf_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" class="<?php echo $view_patient_services->DeptRecvUser->footerCellClass() ?>"><span id="elf_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived" class="<?php echo $view_patient_services->DeptRecived->footerCellClass() ?>"><span id="elf_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" class="<?php echo $view_patient_services->SAuthDate->footerCellClass() ?>"><span id="elf_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" class="<?php echo $view_patient_services->SAuthBy->footerCellClass() ?>"><span id="elf_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate" class="<?php echo $view_patient_services->SAuthendicate->footerCellClass() ?>"><span id="elf_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" class="<?php echo $view_patient_services->AuthDate->footerCellClass() ?>"><span id="elf_view_patient_services_AuthDate" class="view_patient_services_AuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" class="<?php echo $view_patient_services->AuthBy->footerCellClass() ?>"><span id="elf_view_patient_services_AuthBy" class="view_patient_services_AuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate" class="<?php echo $view_patient_services->Authencate->footerCellClass() ?>"><span id="elf_view_patient_services_Authencate" class="view_patient_services_Authencate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" class="<?php echo $view_patient_services->EditDate->footerCellClass() ?>"><span id="elf_view_patient_services_EditDate" class="view_patient_services_EditDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy" class="<?php echo $view_patient_services->EditBy->footerCellClass() ?>"><span id="elf_view_patient_services_EditBy" class="view_patient_services_EditBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Editted->Visible) { // Editted ?>
		<td data-name="Editted" class="<?php echo $view_patient_services->Editted->footerCellClass() ?>"><span id="elf_view_patient_services_Editted" class="view_patient_services_Editted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->PatID->Visible) { // PatID ?>
		<td data-name="PatID" class="<?php echo $view_patient_services->PatID->footerCellClass() ?>"><span id="elf_view_patient_services_PatID" class="view_patient_services_PatID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $view_patient_services->PatientId->footerCellClass() ?>"><span id="elf_view_patient_services_PatientId" class="view_patient_services_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $view_patient_services->Mobile->footerCellClass() ?>"><span id="elf_view_patient_services_Mobile" class="view_patient_services_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->CId->Visible) { // CId ?>
		<td data-name="CId" class="<?php echo $view_patient_services->CId->footerCellClass() ?>"><span id="elf_view_patient_services_CId" class="view_patient_services_CId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Order->Visible) { // Order ?>
		<td data-name="Order" class="<?php echo $view_patient_services->Order->footerCellClass() ?>"><span id="elf_view_patient_services_Order" class="view_patient_services_Order">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->ResType->Visible) { // ResType ?>
		<td data-name="ResType" class="<?php echo $view_patient_services->ResType->footerCellClass() ?>"><span id="elf_view_patient_services_ResType" class="view_patient_services_ResType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Sample->Visible) { // Sample ?>
		<td data-name="Sample" class="<?php echo $view_patient_services->Sample->footerCellClass() ?>"><span id="elf_view_patient_services_Sample" class="view_patient_services_Sample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->NoD->Visible) { // NoD ?>
		<td data-name="NoD" class="<?php echo $view_patient_services->NoD->footerCellClass() ?>"><span id="elf_view_patient_services_NoD" class="view_patient_services_NoD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" class="<?php echo $view_patient_services->BillOrder->footerCellClass() ?>"><span id="elf_view_patient_services_BillOrder" class="view_patient_services_BillOrder">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" class="<?php echo $view_patient_services->Inactive->footerCellClass() ?>"><span id="elf_view_patient_services_Inactive" class="view_patient_services_Inactive">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" class="<?php echo $view_patient_services->CollSample->footerCellClass() ?>"><span id="elf_view_patient_services_CollSample" class="view_patient_services_CollSample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->TestType->Visible) { // TestType ?>
		<td data-name="TestType" class="<?php echo $view_patient_services->TestType->footerCellClass() ?>"><span id="elf_view_patient_services_TestType" class="view_patient_services_TestType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" class="<?php echo $view_patient_services->Repeated->footerCellClass() ?>"><span id="elf_view_patient_services_Repeated" class="view_patient_services_Repeated">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy" class="<?php echo $view_patient_services->RepeatedBy->footerCellClass() ?>"><span id="elf_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate" class="<?php echo $view_patient_services->RepeatedDate->footerCellClass() ?>"><span id="elf_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID" class="<?php echo $view_patient_services->serviceID->footerCellClass() ?>"><span id="elf_view_patient_services_serviceID" class="view_patient_services_serviceID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type" class="<?php echo $view_patient_services->Service_Type->footerCellClass() ?>"><span id="elf_view_patient_services_Service_Type" class="view_patient_services_Service_Type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department" class="<?php echo $view_patient_services->Service_Department->footerCellClass() ?>"><span id="elf_view_patient_services_Service_Department" class="view_patient_services_Service_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo" class="<?php echo $view_patient_services->RequestNo->footerCellClass() ?>"><span id="elf_view_patient_services_RequestNo" class="view_patient_services_RequestNo">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_patient_services_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_patient_services->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $view_patient_services_list->FormKeyCountName ?>" id="<?php echo $view_patient_services_list->FormKeyCountName ?>" value="<?php echo $view_patient_services_list->KeyCount ?>">
<?php echo $view_patient_services_list->MultiSelectKey ?>
<?php } ?>
<?php if ($view_patient_services->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_patient_services_list->FormKeyCountName ?>" id="<?php echo $view_patient_services_list->FormKeyCountName ?>" value="<?php echo $view_patient_services_list->KeyCount ?>">
<?php echo $view_patient_services_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_patient_services->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_patient_services_list->Recordset)
	$view_patient_services_list->Recordset->Close();
?>
<?php if (!$view_patient_services->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_patient_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_patient_services_list->Pager)) $view_patient_services_list->Pager = new NumericPager($view_patient_services_list->StartRec, $view_patient_services_list->DisplayRecs, $view_patient_services_list->TotalRecs, $view_patient_services_list->RecRange, $view_patient_services_list->AutoHidePager) ?>
<?php if ($view_patient_services_list->Pager->RecordCount > 0 && $view_patient_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_patient_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_list->pageUrl() ?>start=<?php echo $view_patient_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_list->pageUrl() ?>start=<?php echo $view_patient_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_patient_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_patient_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_list->pageUrl() ?>start=<?php echo $view_patient_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_list->pageUrl() ?>start=<?php echo $view_patient_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_patient_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_patient_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_patient_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_patient_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_patient_services_list->TotalRecs > 0 && (!$view_patient_services_list->AutoHidePageSizeSelector || $view_patient_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_patient_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_patient_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_patient_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_patient_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_patient_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_patient_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_patient_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_patient_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_services_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_patient_services_list->TotalRecs == 0 && !$view_patient_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_patient_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_patient_services_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_patient_services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
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
		var BillAmount = document.getElementById("x_Amount");
		BillAmount.value = totSum;
}
var HospitalIDDD = '<?php echo HospitalID(); ?>';
var grpButton = '<input type="hidden" id="HospitalIDDD" name="HospitalIDDD" value="'+HospitalIDDD+'">';
		var searchfrm = document.getElementById("tbl_view_patient_servicesgrid");
		var node = document.createElement("div");
		node.innerHTML = grpButton;    
		searchfrm.appendChild(node);
</script>
<?php if (!$view_patient_services->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_patient_services", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_patient_services_list->terminate();
?>