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
<?php include_once "header.php"; ?>
<?php if (!$view_patient_services_list->isExport()) { ?>
<script>
var fview_patient_serviceslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_patient_serviceslist = currentForm = new ew.Form("fview_patient_serviceslist", "list");
	fview_patient_serviceslist.formKeyCountName = '<?php echo $view_patient_services_list->FormKeyCountName ?>';

	// Validate form
	fview_patient_serviceslist.validate = function() {
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
			<?php if ($view_patient_services_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->id->caption(), $view_patient_services_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Reception->caption(), $view_patient_services_list->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->mrnno->caption(), $view_patient_services_list->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->PatientName->caption(), $view_patient_services_list->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Age->caption(), $view_patient_services_list->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Gender->caption(), $view_patient_services_list->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->profilePic->caption(), $view_patient_services_list->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Services->Required) { ?>
				elm = this.getElements("x" + infix + "_Services");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Services->caption(), $view_patient_services_list->Services->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Unit->caption(), $view_patient_services_list->Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->Unit->errorMessage()) ?>");
			<?php if ($view_patient_services_list->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->amount->caption(), $view_patient_services_list->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->amount->errorMessage()) ?>");
			<?php if ($view_patient_services_list->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Quantity->caption(), $view_patient_services_list->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->Quantity->errorMessage()) ?>");
			<?php if ($view_patient_services_list->DiscountCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DiscountCategory->caption(), $view_patient_services_list->DiscountCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Discount->caption(), $view_patient_services_list->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->Discount->errorMessage()) ?>");
			<?php if ($view_patient_services_list->SubTotal->Required) { ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->SubTotal->caption(), $view_patient_services_list->SubTotal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->SubTotal->errorMessage()) ?>");
			<?php if ($view_patient_services_list->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->description->caption(), $view_patient_services_list->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->patient_type->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->patient_type->caption(), $view_patient_services_list->patient_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->charged_date->caption(), $view_patient_services_list->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->status->caption(), $view_patient_services_list->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->createdby->caption(), $view_patient_services_list->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->createddatetime->caption(), $view_patient_services_list->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->modifiedby->caption(), $view_patient_services_list->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->modifieddatetime->caption(), $view_patient_services_list->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Aid->Required) { ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Aid->caption(), $view_patient_services_list->Aid->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Vid->Required) { ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Vid->caption(), $view_patient_services_list->Vid->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DrID->caption(), $view_patient_services_list->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->DrCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_DrCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DrCODE->caption(), $view_patient_services_list->DrCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->DrName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DrName->caption(), $view_patient_services_list->DrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Department->caption(), $view_patient_services_list->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->DrSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DrSharePres->caption(), $view_patient_services_list->DrSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->DrSharePres->errorMessage()) ?>");
			<?php if ($view_patient_services_list->HospSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->HospSharePres->caption(), $view_patient_services_list->HospSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->HospSharePres->errorMessage()) ?>");
			<?php if ($view_patient_services_list->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DrShareAmount->caption(), $view_patient_services_list->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->DrShareAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_list->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->HospShareAmount->caption(), $view_patient_services_list->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->HospShareAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_list->DrShareSettiledAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DrShareSettiledAmount->caption(), $view_patient_services_list->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->DrShareSettiledAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_list->DrShareSettledId->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DrShareSettledId->caption(), $view_patient_services_list->DrShareSettledId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->DrShareSettledId->errorMessage()) ?>");
			<?php if ($view_patient_services_list->DrShareSettiledStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DrShareSettiledStatus->caption(), $view_patient_services_list->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->DrShareSettiledStatus->errorMessage()) ?>");
			<?php if ($view_patient_services_list->invoiceId->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->invoiceId->caption(), $view_patient_services_list->invoiceId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->invoiceId->errorMessage()) ?>");
			<?php if ($view_patient_services_list->invoiceAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->invoiceAmount->caption(), $view_patient_services_list->invoiceAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->invoiceAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_list->invoiceStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->invoiceStatus->caption(), $view_patient_services_list->invoiceStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->modeOfPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_modeOfPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->modeOfPayment->caption(), $view_patient_services_list->modeOfPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->HospID->caption(), $view_patient_services_list->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->RIDNO->caption(), $view_patient_services_list->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->RIDNO->errorMessage()) ?>");
			<?php if ($view_patient_services_list->ItemCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->ItemCode->caption(), $view_patient_services_list->ItemCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->TidNo->caption(), $view_patient_services_list->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->TidNo->errorMessage()) ?>");
			<?php if ($view_patient_services_list->sid->Required) { ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->sid->caption(), $view_patient_services_list->sid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->sid->errorMessage()) ?>");
			<?php if ($view_patient_services_list->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->TestSubCd->caption(), $view_patient_services_list->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->DEptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DEptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DEptCd->caption(), $view_patient_services_list->DEptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->ProfCd->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->ProfCd->caption(), $view_patient_services_list->ProfCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Comments->Required) { ?>
				elm = this.getElements("x" + infix + "_Comments");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Comments->caption(), $view_patient_services_list->Comments->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Method->caption(), $view_patient_services_list->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Specimen->Required) { ?>
				elm = this.getElements("x" + infix + "_Specimen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Specimen->caption(), $view_patient_services_list->Specimen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Abnormal->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Abnormal->caption(), $view_patient_services_list->Abnormal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->TestUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_TestUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->TestUnit->caption(), $view_patient_services_list->TestUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->LOWHIGH->Required) { ?>
				elm = this.getElements("x" + infix + "_LOWHIGH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->LOWHIGH->caption(), $view_patient_services_list->LOWHIGH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Branch->Required) { ?>
				elm = this.getElements("x" + infix + "_Branch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Branch->caption(), $view_patient_services_list->Branch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Dispatch->Required) { ?>
				elm = this.getElements("x" + infix + "_Dispatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Dispatch->caption(), $view_patient_services_list->Dispatch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Pic1->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Pic1->caption(), $view_patient_services_list->Pic1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Pic2->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Pic2->caption(), $view_patient_services_list->Pic2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->GraphPath->Required) { ?>
				elm = this.getElements("x" + infix + "_GraphPath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->GraphPath->caption(), $view_patient_services_list->GraphPath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->MachineCD->Required) { ?>
				elm = this.getElements("x" + infix + "_MachineCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->MachineCD->caption(), $view_patient_services_list->MachineCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->TestCancel->Required) { ?>
				elm = this.getElements("x" + infix + "_TestCancel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->TestCancel->caption(), $view_patient_services_list->TestCancel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->OutSource->Required) { ?>
				elm = this.getElements("x" + infix + "_OutSource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->OutSource->caption(), $view_patient_services_list->OutSource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Printed->Required) { ?>
				elm = this.getElements("x" + infix + "_Printed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Printed->caption(), $view_patient_services_list->Printed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->PrintBy->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->PrintBy->caption(), $view_patient_services_list->PrintBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->PrintDate->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->PrintDate->caption(), $view_patient_services_list->PrintDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->PrintDate->errorMessage()) ?>");
			<?php if ($view_patient_services_list->BillingDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->BillingDate->caption(), $view_patient_services_list->BillingDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->BillingDate->errorMessage()) ?>");
			<?php if ($view_patient_services_list->BilledBy->Required) { ?>
				elm = this.getElements("x" + infix + "_BilledBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->BilledBy->caption(), $view_patient_services_list->BilledBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Resulted->Required) { ?>
				elm = this.getElements("x" + infix + "_Resulted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Resulted->caption(), $view_patient_services_list->Resulted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->ResultDate->caption(), $view_patient_services_list->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->ResultDate->errorMessage()) ?>");
			<?php if ($view_patient_services_list->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->ResultedBy->caption(), $view_patient_services_list->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->SampleDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->SampleDate->caption(), $view_patient_services_list->SampleDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->SampleDate->errorMessage()) ?>");
			<?php if ($view_patient_services_list->SampleUser->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->SampleUser->caption(), $view_patient_services_list->SampleUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Sampled->Required) { ?>
				elm = this.getElements("x" + infix + "_Sampled");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Sampled->caption(), $view_patient_services_list->Sampled->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->ReceivedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->ReceivedDate->caption(), $view_patient_services_list->ReceivedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->ReceivedDate->errorMessage()) ?>");
			<?php if ($view_patient_services_list->ReceivedUser->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->ReceivedUser->caption(), $view_patient_services_list->ReceivedUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Recevied->Required) { ?>
				elm = this.getElements("x" + infix + "_Recevied");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Recevied->caption(), $view_patient_services_list->Recevied->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->DeptRecvDate->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DeptRecvDate->caption(), $view_patient_services_list->DeptRecvDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->DeptRecvDate->errorMessage()) ?>");
			<?php if ($view_patient_services_list->DeptRecvUser->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DeptRecvUser->caption(), $view_patient_services_list->DeptRecvUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->DeptRecived->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecived");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->DeptRecived->caption(), $view_patient_services_list->DeptRecived->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->SAuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->SAuthDate->caption(), $view_patient_services_list->SAuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->SAuthDate->errorMessage()) ?>");
			<?php if ($view_patient_services_list->SAuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->SAuthBy->caption(), $view_patient_services_list->SAuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->SAuthendicate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthendicate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->SAuthendicate->caption(), $view_patient_services_list->SAuthendicate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->AuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->AuthDate->caption(), $view_patient_services_list->AuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->AuthDate->errorMessage()) ?>");
			<?php if ($view_patient_services_list->AuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->AuthBy->caption(), $view_patient_services_list->AuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Authencate->Required) { ?>
				elm = this.getElements("x" + infix + "_Authencate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Authencate->caption(), $view_patient_services_list->Authencate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->EditDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->EditDate->caption(), $view_patient_services_list->EditDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->EditDate->errorMessage()) ?>");
			<?php if ($view_patient_services_list->EditBy->Required) { ?>
				elm = this.getElements("x" + infix + "_EditBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->EditBy->caption(), $view_patient_services_list->EditBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Editted->Required) { ?>
				elm = this.getElements("x" + infix + "_Editted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Editted->caption(), $view_patient_services_list->Editted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->PatID->caption(), $view_patient_services_list->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->PatID->errorMessage()) ?>");
			<?php if ($view_patient_services_list->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->PatientId->caption(), $view_patient_services_list->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Mobile->caption(), $view_patient_services_list->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->CId->caption(), $view_patient_services_list->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->CId->errorMessage()) ?>");
			<?php if ($view_patient_services_list->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Order->caption(), $view_patient_services_list->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->Order->errorMessage()) ?>");
			<?php if ($view_patient_services_list->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->ResType->caption(), $view_patient_services_list->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Sample->caption(), $view_patient_services_list->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->NoD->caption(), $view_patient_services_list->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->NoD->errorMessage()) ?>");
			<?php if ($view_patient_services_list->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->BillOrder->caption(), $view_patient_services_list->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->BillOrder->errorMessage()) ?>");
			<?php if ($view_patient_services_list->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Inactive->caption(), $view_patient_services_list->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->CollSample->caption(), $view_patient_services_list->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->TestType->caption(), $view_patient_services_list->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Repeated->Required) { ?>
				elm = this.getElements("x" + infix + "_Repeated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Repeated->caption(), $view_patient_services_list->Repeated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->RepeatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->RepeatedBy->caption(), $view_patient_services_list->RepeatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->RepeatedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->RepeatedDate->caption(), $view_patient_services_list->RepeatedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->RepeatedDate->errorMessage()) ?>");
			<?php if ($view_patient_services_list->serviceID->Required) { ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->serviceID->caption(), $view_patient_services_list->serviceID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->serviceID->errorMessage()) ?>");
			<?php if ($view_patient_services_list->Service_Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Service_Type->caption(), $view_patient_services_list->Service_Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->Service_Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->Service_Department->caption(), $view_patient_services_list->Service_Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_list->RequestNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_list->RequestNo->caption(), $view_patient_services_list->RequestNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_list->RequestNo->errorMessage()) ?>");

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

	// Form_CustomValidate
	fview_patient_serviceslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_patient_serviceslist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_patient_serviceslist.lists["x_Services"] = <?php echo $view_patient_services_list->Services->Lookup->toClientList($view_patient_services_list) ?>;
	fview_patient_serviceslist.lists["x_Services"].options = <?php echo JsonEncode($view_patient_services_list->Services->lookupOptions()) ?>;
	fview_patient_serviceslist.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_patient_serviceslist.lists["x_DiscountCategory"] = <?php echo $view_patient_services_list->DiscountCategory->Lookup->toClientList($view_patient_services_list) ?>;
	fview_patient_serviceslist.lists["x_DiscountCategory"].options = <?php echo JsonEncode($view_patient_services_list->DiscountCategory->lookupOptions()) ?>;
	loadjs.done("fview_patient_serviceslist");
});
var fview_patient_serviceslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_patient_serviceslistsrch = currentSearchForm = new ew.Form("fview_patient_serviceslistsrch");

	// Dynamic selection lists
	// Filters

	fview_patient_serviceslistsrch.filterList = <?php echo $view_patient_services_list->getFilterList() ?>;
	loadjs.done("fview_patient_serviceslistsrch");
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
<?php if (!$view_patient_services_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_patient_services_list->TotalRecords > 0 && $view_patient_services_list->ExportOptions->visible()) { ?>
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
<?php if (!$view_patient_services_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_patient_services_list->isExport("print")) { ?>
<?php
if ($view_patient_services_list->DbMasterFilter != "" && $view_patient_services->getCurrentMasterTable() == "view_billing_voucher") {
	if ($view_patient_services_list->MasterRecordExists) {
		include_once "view_billing_vouchermaster.php";
	}
}
?>
<?php
if ($view_patient_services_list->DbMasterFilter != "" && $view_patient_services->getCurrentMasterTable() == "view_billing_voucher_print") {
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
<?php if (!$view_patient_services_list->isExport() && !$view_patient_services->CurrentAction) { ?>
<form name="fview_patient_serviceslistsrch" id="fview_patient_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_patient_serviceslistsrch-search-panel" class="<?php echo $view_patient_services_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_services">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_patient_services_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_patient_services_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_patient_services_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_patient_services_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_patient_services_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_patient_services_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_patient_services_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_patient_services_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_patient_services_list->showPageHeader(); ?>
<?php
$view_patient_services_list->showMessage();
?>
<?php if ($view_patient_services_list->TotalRecords > 0 || $view_patient_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_patient_services_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_services">
<?php if (!$view_patient_services_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_patient_services_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_patient_services_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_patient_serviceslist" id="fview_patient_serviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_services">
<?php if ($view_patient_services->getCurrentMasterTable() == "view_billing_voucher" && $view_patient_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_billing_voucher">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_patient_services_list->Vid->getSessionValue()) ?>">
<?php } ?>
<?php if ($view_patient_services->getCurrentMasterTable() == "view_billing_voucher_print" && $view_patient_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_billing_voucher_print">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_patient_services_list->Vid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_patient_services" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_patient_services_list->TotalRecords > 0 || $view_patient_services_list->isGridEdit()) { ?>
<table id="tbl_view_patient_serviceslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_patient_services->RowType = ROWTYPE_HEADER;

// Render list options
$view_patient_services_list->renderListOptions();

// Render list options (header, left)
$view_patient_services_list->ListOptions->render("header", "left");
?>
<?php if ($view_patient_services_list->id->Visible) { // id ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_patient_services_list->id->headerCellClass() ?>"><div id="elh_view_patient_services_id" class="view_patient_services_id"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_patient_services_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->id) ?>', 1);"><div id="elh_view_patient_services_id" class="view_patient_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Reception->Visible) { // Reception ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_patient_services_list->Reception->headerCellClass() ?>"><div id="elh_view_patient_services_Reception" class="view_patient_services_Reception"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_patient_services_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Reception) ?>', 1);"><div id="elh_view_patient_services_Reception" class="view_patient_services_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->mrnno->Visible) { // mrnno ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_services_list->mrnno->headerCellClass() ?>"><div id="elh_view_patient_services_mrnno" class="view_patient_services_mrnno"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_services_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->mrnno) ?>', 1);"><div id="elh_view_patient_services_mrnno" class="view_patient_services_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_services_list->PatientName->headerCellClass() ?>"><div id="elh_view_patient_services_PatientName" class="view_patient_services_PatientName"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_services_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->PatientName) ?>', 1);"><div id="elh_view_patient_services_PatientName" class="view_patient_services_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Age->Visible) { // Age ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_patient_services_list->Age->headerCellClass() ?>"><div id="elh_view_patient_services_Age" class="view_patient_services_Age"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_patient_services_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Age) ?>', 1);"><div id="elh_view_patient_services_Age" class="view_patient_services_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Gender->Visible) { // Gender ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_patient_services_list->Gender->headerCellClass() ?>"><div id="elh_view_patient_services_Gender" class="view_patient_services_Gender"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_patient_services_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Gender) ?>', 1);"><div id="elh_view_patient_services_Gender" class="view_patient_services_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->profilePic->Visible) { // profilePic ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_services_list->profilePic->headerCellClass() ?>"><div id="elh_view_patient_services_profilePic" class="view_patient_services_profilePic"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_services_list->profilePic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->profilePic) ?>', 1);"><div id="elh_view_patient_services_profilePic" class="view_patient_services_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->profilePic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->profilePic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Services->Visible) { // Services ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_patient_services_list->Services->headerCellClass() ?>"><div id="elh_view_patient_services_Services" class="view_patient_services_Services"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_patient_services_list->Services->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Services) ?>', 1);"><div id="elh_view_patient_services_Services" class="view_patient_services_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Services->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Services->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Services->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Unit->Visible) { // Unit ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $view_patient_services_list->Unit->headerCellClass() ?>"><div id="elh_view_patient_services_Unit" class="view_patient_services_Unit"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $view_patient_services_list->Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Unit) ?>', 1);"><div id="elh_view_patient_services_Unit" class="view_patient_services_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->amount->Visible) { // amount ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $view_patient_services_list->amount->headerCellClass() ?>"><div id="elh_view_patient_services_amount" class="view_patient_services_amount"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $view_patient_services_list->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->amount) ?>', 1);"><div id="elh_view_patient_services_amount" class="view_patient_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Quantity->Visible) { // Quantity ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_patient_services_list->Quantity->headerCellClass() ?>"><div id="elh_view_patient_services_Quantity" class="view_patient_services_Quantity"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_patient_services_list->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Quantity) ?>', 1);"><div id="elh_view_patient_services_Quantity" class="view_patient_services_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DiscountCategory) == "") { ?>
		<th data-name="DiscountCategory" class="<?php echo $view_patient_services_list->DiscountCategory->headerCellClass() ?>"><div id="elh_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DiscountCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountCategory" class="<?php echo $view_patient_services_list->DiscountCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DiscountCategory) ?>', 1);"><div id="elh_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DiscountCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DiscountCategory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DiscountCategory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Discount->Visible) { // Discount ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $view_patient_services_list->Discount->headerCellClass() ?>"><div id="elh_view_patient_services_Discount" class="view_patient_services_Discount"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $view_patient_services_list->Discount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Discount) ?>', 1);"><div id="elh_view_patient_services_Discount" class="view_patient_services_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Discount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Discount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $view_patient_services_list->SubTotal->headerCellClass() ?>"><div id="elh_view_patient_services_SubTotal" class="view_patient_services_SubTotal"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $view_patient_services_list->SubTotal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->SubTotal) ?>', 1);"><div id="elh_view_patient_services_SubTotal" class="view_patient_services_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->SubTotal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->SubTotal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->description->Visible) { // description ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->description) == "") { ?>
		<th data-name="description" class="<?php echo $view_patient_services_list->description->headerCellClass() ?>"><div id="elh_view_patient_services_description" class="view_patient_services_description"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $view_patient_services_list->description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->description) ?>', 1);"><div id="elh_view_patient_services_description" class="view_patient_services_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->patient_type->Visible) { // patient_type ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $view_patient_services_list->patient_type->headerCellClass() ?>"><div id="elh_view_patient_services_patient_type" class="view_patient_services_patient_type"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->patient_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $view_patient_services_list->patient_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->patient_type) ?>', 1);"><div id="elh_view_patient_services_patient_type" class="view_patient_services_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->patient_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->patient_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->charged_date->Visible) { // charged_date ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $view_patient_services_list->charged_date->headerCellClass() ?>"><div id="elh_view_patient_services_charged_date" class="view_patient_services_charged_date"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $view_patient_services_list->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->charged_date) ?>', 1);"><div id="elh_view_patient_services_charged_date" class="view_patient_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->charged_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->charged_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->status->Visible) { // status ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_patient_services_list->status->headerCellClass() ?>"><div id="elh_view_patient_services_status" class="view_patient_services_status"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_patient_services_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->status) ?>', 1);"><div id="elh_view_patient_services_status" class="view_patient_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->createdby->Visible) { // createdby ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_patient_services_list->createdby->headerCellClass() ?>"><div id="elh_view_patient_services_createdby" class="view_patient_services_createdby"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_patient_services_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->createdby) ?>', 1);"><div id="elh_view_patient_services_createdby" class="view_patient_services_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_services_list->createddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_createddatetime" class="view_patient_services_createddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_services_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->createddatetime) ?>', 1);"><div id="elh_view_patient_services_createddatetime" class="view_patient_services_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_services_list->modifiedby->headerCellClass() ?>"><div id="elh_view_patient_services_modifiedby" class="view_patient_services_modifiedby"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_services_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->modifiedby) ?>', 1);"><div id="elh_view_patient_services_modifiedby" class="view_patient_services_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_services_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_services_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->modifieddatetime) ?>', 1);"><div id="elh_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Aid->Visible) { // Aid ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $view_patient_services_list->Aid->headerCellClass() ?>"><div id="elh_view_patient_services_Aid" class="view_patient_services_Aid"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Aid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $view_patient_services_list->Aid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Aid) ?>', 1);"><div id="elh_view_patient_services_Aid" class="view_patient_services_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Aid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Aid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Vid->Visible) { // Vid ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_patient_services_list->Vid->headerCellClass() ?>"><div id="elh_view_patient_services_Vid" class="view_patient_services_Vid"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_patient_services_list->Vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Vid) ?>', 1);"><div id="elh_view_patient_services_Vid" class="view_patient_services_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Vid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Vid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DrID->Visible) { // DrID ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_patient_services_list->DrID->headerCellClass() ?>"><div id="elh_view_patient_services_DrID" class="view_patient_services_DrID"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_patient_services_list->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DrID) ?>', 1);"><div id="elh_view_patient_services_DrID" class="view_patient_services_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_patient_services_list->DrCODE->headerCellClass() ?>"><div id="elh_view_patient_services_DrCODE" class="view_patient_services_DrCODE"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_patient_services_list->DrCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DrCODE) ?>', 1);"><div id="elh_view_patient_services_DrCODE" class="view_patient_services_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DrCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DrCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DrCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DrName->Visible) { // DrName ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_patient_services_list->DrName->headerCellClass() ?>"><div id="elh_view_patient_services_DrName" class="view_patient_services_DrName"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_patient_services_list->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DrName) ?>', 1);"><div id="elh_view_patient_services_DrName" class="view_patient_services_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Department->Visible) { // Department ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_patient_services_list->Department->headerCellClass() ?>"><div id="elh_view_patient_services_Department" class="view_patient_services_Department"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_patient_services_list->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Department) ?>', 1);"><div id="elh_view_patient_services_Department" class="view_patient_services_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DrSharePres) == "") { ?>
		<th data-name="DrSharePres" class="<?php echo $view_patient_services_list->DrSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DrSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePres" class="<?php echo $view_patient_services_list->DrSharePres->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DrSharePres) ?>', 1);"><div id="elh_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DrSharePres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DrSharePres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->HospSharePres) == "") { ?>
		<th data-name="HospSharePres" class="<?php echo $view_patient_services_list->HospSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->HospSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePres" class="<?php echo $view_patient_services_list->HospSharePres->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->HospSharePres) ?>', 1);"><div id="elh_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->HospSharePres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->HospSharePres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_patient_services_list->DrShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_patient_services_list->DrShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DrShareAmount) ?>', 1);"><div id="elh_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DrShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DrShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_patient_services_list->HospShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_patient_services_list->HospShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->HospShareAmount) ?>', 1);"><div id="elh_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->HospShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->HospShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DrShareSettiledAmount) == "") { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services_list->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DrShareSettiledAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services_list->DrShareSettiledAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DrShareSettiledAmount) ?>', 1);"><div id="elh_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DrShareSettiledAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DrShareSettiledAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DrShareSettledId) == "") { ?>
		<th data-name="DrShareSettledId" class="<?php echo $view_patient_services_list->DrShareSettledId->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DrShareSettledId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettledId" class="<?php echo $view_patient_services_list->DrShareSettledId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DrShareSettledId) ?>', 1);"><div id="elh_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DrShareSettledId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DrShareSettledId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DrShareSettiledStatus) == "") { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services_list->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DrShareSettiledStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services_list->DrShareSettiledStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DrShareSettiledStatus) ?>', 1);"><div id="elh_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DrShareSettiledStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DrShareSettiledStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_patient_services_list->invoiceId->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceId" class="view_patient_services_invoiceId"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_patient_services_list->invoiceId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->invoiceId) ?>', 1);"><div id="elh_view_patient_services_invoiceId" class="view_patient_services_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->invoiceId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->invoiceId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $view_patient_services_list->invoiceAmount->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->invoiceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $view_patient_services_list->invoiceAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->invoiceAmount) ?>', 1);"><div id="elh_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->invoiceAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->invoiceAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $view_patient_services_list->invoiceStatus->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->invoiceStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $view_patient_services_list->invoiceStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->invoiceStatus) ?>', 1);"><div id="elh_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->invoiceStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->invoiceStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->invoiceStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $view_patient_services_list->modeOfPayment->headerCellClass() ?>"><div id="elh_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->modeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $view_patient_services_list->modeOfPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->modeOfPayment) ?>', 1);"><div id="elh_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->modeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->modeOfPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->modeOfPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_patient_services_list->HospID->headerCellClass() ?>"><div id="elh_view_patient_services_HospID" class="view_patient_services_HospID"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_patient_services_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->HospID) ?>', 1);"><div id="elh_view_patient_services_HospID" class="view_patient_services_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_services_list->RIDNO->headerCellClass() ?>"><div id="elh_view_patient_services_RIDNO" class="view_patient_services_RIDNO"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_services_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->RIDNO) ?>', 1);"><div id="elh_view_patient_services_RIDNO" class="view_patient_services_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_patient_services_list->ItemCode->headerCellClass() ?>"><div id="elh_view_patient_services_ItemCode" class="view_patient_services_ItemCode"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_patient_services_list->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->ItemCode) ?>', 1);"><div id="elh_view_patient_services_ItemCode" class="view_patient_services_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->ItemCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->ItemCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->ItemCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->TidNo->Visible) { // TidNo ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_services_list->TidNo->headerCellClass() ?>"><div id="elh_view_patient_services_TidNo" class="view_patient_services_TidNo"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_services_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->TidNo) ?>', 1);"><div id="elh_view_patient_services_TidNo" class="view_patient_services_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->sid->Visible) { // sid ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_patient_services_list->sid->headerCellClass() ?>"><div id="elh_view_patient_services_sid" class="view_patient_services_sid"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_patient_services_list->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->sid) ?>', 1);"><div id="elh_view_patient_services_sid" class="view_patient_services_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->sid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->sid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $view_patient_services_list->TestSubCd->headerCellClass() ?>"><div id="elh_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $view_patient_services_list->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->TestSubCd) ?>', 1);"><div id="elh_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->TestSubCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->TestSubCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_patient_services_list->DEptCd->headerCellClass() ?>"><div id="elh_view_patient_services_DEptCd" class="view_patient_services_DEptCd"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_patient_services_list->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DEptCd) ?>', 1);"><div id="elh_view_patient_services_DEptCd" class="view_patient_services_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DEptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DEptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->ProfCd->Visible) { // ProfCd ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $view_patient_services_list->ProfCd->headerCellClass() ?>"><div id="elh_view_patient_services_ProfCd" class="view_patient_services_ProfCd"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->ProfCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $view_patient_services_list->ProfCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->ProfCd) ?>', 1);"><div id="elh_view_patient_services_ProfCd" class="view_patient_services_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->ProfCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->ProfCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->ProfCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Comments->Visible) { // Comments ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $view_patient_services_list->Comments->headerCellClass() ?>"><div id="elh_view_patient_services_Comments" class="view_patient_services_Comments"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Comments->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $view_patient_services_list->Comments->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Comments) ?>', 1);"><div id="elh_view_patient_services_Comments" class="view_patient_services_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Comments->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Comments->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Comments->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Method->Visible) { // Method ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $view_patient_services_list->Method->headerCellClass() ?>"><div id="elh_view_patient_services_Method" class="view_patient_services_Method"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $view_patient_services_list->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Method) ?>', 1);"><div id="elh_view_patient_services_Method" class="view_patient_services_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Specimen->Visible) { // Specimen ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $view_patient_services_list->Specimen->headerCellClass() ?>"><div id="elh_view_patient_services_Specimen" class="view_patient_services_Specimen"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Specimen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $view_patient_services_list->Specimen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Specimen) ?>', 1);"><div id="elh_view_patient_services_Specimen" class="view_patient_services_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Specimen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Specimen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Specimen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Abnormal->Visible) { // Abnormal ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $view_patient_services_list->Abnormal->headerCellClass() ?>"><div id="elh_view_patient_services_Abnormal" class="view_patient_services_Abnormal"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $view_patient_services_list->Abnormal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Abnormal) ?>', 1);"><div id="elh_view_patient_services_Abnormal" class="view_patient_services_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Abnormal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Abnormal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Abnormal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_patient_services_list->TestUnit->headerCellClass() ?>"><div id="elh_view_patient_services_TestUnit" class="view_patient_services_TestUnit"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_patient_services_list->TestUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->TestUnit) ?>', 1);"><div id="elh_view_patient_services_TestUnit" class="view_patient_services_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->TestUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->TestUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->TestUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $view_patient_services_list->LOWHIGH->headerCellClass() ?>"><div id="elh_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->LOWHIGH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $view_patient_services_list->LOWHIGH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->LOWHIGH) ?>', 1);"><div id="elh_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->LOWHIGH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->LOWHIGH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->LOWHIGH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Branch->Visible) { // Branch ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $view_patient_services_list->Branch->headerCellClass() ?>"><div id="elh_view_patient_services_Branch" class="view_patient_services_Branch"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Branch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $view_patient_services_list->Branch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Branch) ?>', 1);"><div id="elh_view_patient_services_Branch" class="view_patient_services_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Branch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Branch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Branch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Dispatch->Visible) { // Dispatch ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $view_patient_services_list->Dispatch->headerCellClass() ?>"><div id="elh_view_patient_services_Dispatch" class="view_patient_services_Dispatch"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Dispatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $view_patient_services_list->Dispatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Dispatch) ?>', 1);"><div id="elh_view_patient_services_Dispatch" class="view_patient_services_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Dispatch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Dispatch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Dispatch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_patient_services_list->Pic1->headerCellClass() ?>"><div id="elh_view_patient_services_Pic1" class="view_patient_services_Pic1"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_patient_services_list->Pic1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Pic1) ?>', 1);"><div id="elh_view_patient_services_Pic1" class="view_patient_services_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Pic1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Pic1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Pic1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_patient_services_list->Pic2->headerCellClass() ?>"><div id="elh_view_patient_services_Pic2" class="view_patient_services_Pic2"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_patient_services_list->Pic2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Pic2) ?>', 1);"><div id="elh_view_patient_services_Pic2" class="view_patient_services_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Pic2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Pic2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Pic2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->GraphPath->Visible) { // GraphPath ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $view_patient_services_list->GraphPath->headerCellClass() ?>"><div id="elh_view_patient_services_GraphPath" class="view_patient_services_GraphPath"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->GraphPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $view_patient_services_list->GraphPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->GraphPath) ?>', 1);"><div id="elh_view_patient_services_GraphPath" class="view_patient_services_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->GraphPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->GraphPath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->GraphPath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->MachineCD->Visible) { // MachineCD ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $view_patient_services_list->MachineCD->headerCellClass() ?>"><div id="elh_view_patient_services_MachineCD" class="view_patient_services_MachineCD"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->MachineCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $view_patient_services_list->MachineCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->MachineCD) ?>', 1);"><div id="elh_view_patient_services_MachineCD" class="view_patient_services_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->MachineCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->MachineCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->MachineCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->TestCancel->Visible) { // TestCancel ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $view_patient_services_list->TestCancel->headerCellClass() ?>"><div id="elh_view_patient_services_TestCancel" class="view_patient_services_TestCancel"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->TestCancel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $view_patient_services_list->TestCancel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->TestCancel) ?>', 1);"><div id="elh_view_patient_services_TestCancel" class="view_patient_services_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->TestCancel->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->TestCancel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->TestCancel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->OutSource->Visible) { // OutSource ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $view_patient_services_list->OutSource->headerCellClass() ?>"><div id="elh_view_patient_services_OutSource" class="view_patient_services_OutSource"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $view_patient_services_list->OutSource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->OutSource) ?>', 1);"><div id="elh_view_patient_services_OutSource" class="view_patient_services_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->OutSource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->OutSource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->OutSource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Printed->Visible) { // Printed ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $view_patient_services_list->Printed->headerCellClass() ?>"><div id="elh_view_patient_services_Printed" class="view_patient_services_Printed"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $view_patient_services_list->Printed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Printed) ?>', 1);"><div id="elh_view_patient_services_Printed" class="view_patient_services_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Printed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Printed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Printed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->PrintBy->Visible) { // PrintBy ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $view_patient_services_list->PrintBy->headerCellClass() ?>"><div id="elh_view_patient_services_PrintBy" class="view_patient_services_PrintBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $view_patient_services_list->PrintBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->PrintBy) ?>', 1);"><div id="elh_view_patient_services_PrintBy" class="view_patient_services_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->PrintBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->PrintBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->PrintBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->PrintDate->Visible) { // PrintDate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $view_patient_services_list->PrintDate->headerCellClass() ?>"><div id="elh_view_patient_services_PrintDate" class="view_patient_services_PrintDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $view_patient_services_list->PrintDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->PrintDate) ?>', 1);"><div id="elh_view_patient_services_PrintDate" class="view_patient_services_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->PrintDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->PrintDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->BillingDate->Visible) { // BillingDate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->BillingDate) == "") { ?>
		<th data-name="BillingDate" class="<?php echo $view_patient_services_list->BillingDate->headerCellClass() ?>"><div id="elh_view_patient_services_BillingDate" class="view_patient_services_BillingDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->BillingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillingDate" class="<?php echo $view_patient_services_list->BillingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->BillingDate) ?>', 1);"><div id="elh_view_patient_services_BillingDate" class="view_patient_services_BillingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->BillingDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->BillingDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->BilledBy->Visible) { // BilledBy ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->BilledBy) == "") { ?>
		<th data-name="BilledBy" class="<?php echo $view_patient_services_list->BilledBy->headerCellClass() ?>"><div id="elh_view_patient_services_BilledBy" class="view_patient_services_BilledBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->BilledBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BilledBy" class="<?php echo $view_patient_services_list->BilledBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->BilledBy) ?>', 1);"><div id="elh_view_patient_services_BilledBy" class="view_patient_services_BilledBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->BilledBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->BilledBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->BilledBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Resulted->Visible) { // Resulted ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_patient_services_list->Resulted->headerCellClass() ?>"><div id="elh_view_patient_services_Resulted" class="view_patient_services_Resulted"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_patient_services_list->Resulted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Resulted) ?>', 1);"><div id="elh_view_patient_services_Resulted" class="view_patient_services_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Resulted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Resulted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Resulted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_patient_services_list->ResultDate->headerCellClass() ?>"><div id="elh_view_patient_services_ResultDate" class="view_patient_services_ResultDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_patient_services_list->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->ResultDate) ?>', 1);"><div id="elh_view_patient_services_ResultDate" class="view_patient_services_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_patient_services_list->ResultedBy->headerCellClass() ?>"><div id="elh_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_patient_services_list->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->ResultedBy) ?>', 1);"><div id="elh_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->ResultedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->ResultedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->ResultedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->SampleDate->Visible) { // SampleDate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $view_patient_services_list->SampleDate->headerCellClass() ?>"><div id="elh_view_patient_services_SampleDate" class="view_patient_services_SampleDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->SampleDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $view_patient_services_list->SampleDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->SampleDate) ?>', 1);"><div id="elh_view_patient_services_SampleDate" class="view_patient_services_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->SampleDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->SampleDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->SampleUser->Visible) { // SampleUser ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $view_patient_services_list->SampleUser->headerCellClass() ?>"><div id="elh_view_patient_services_SampleUser" class="view_patient_services_SampleUser"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->SampleUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $view_patient_services_list->SampleUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->SampleUser) ?>', 1);"><div id="elh_view_patient_services_SampleUser" class="view_patient_services_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->SampleUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->SampleUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->SampleUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Sampled->Visible) { // Sampled ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Sampled) == "") { ?>
		<th data-name="Sampled" class="<?php echo $view_patient_services_list->Sampled->headerCellClass() ?>"><div id="elh_view_patient_services_Sampled" class="view_patient_services_Sampled"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Sampled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sampled" class="<?php echo $view_patient_services_list->Sampled->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Sampled) ?>', 1);"><div id="elh_view_patient_services_Sampled" class="view_patient_services_Sampled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Sampled->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Sampled->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Sampled->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $view_patient_services_list->ReceivedDate->headerCellClass() ?>"><div id="elh_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->ReceivedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $view_patient_services_list->ReceivedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->ReceivedDate) ?>', 1);"><div id="elh_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->ReceivedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->ReceivedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $view_patient_services_list->ReceivedUser->headerCellClass() ?>"><div id="elh_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->ReceivedUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $view_patient_services_list->ReceivedUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->ReceivedUser) ?>', 1);"><div id="elh_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->ReceivedUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->ReceivedUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->ReceivedUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Recevied->Visible) { // Recevied ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Recevied) == "") { ?>
		<th data-name="Recevied" class="<?php echo $view_patient_services_list->Recevied->headerCellClass() ?>"><div id="elh_view_patient_services_Recevied" class="view_patient_services_Recevied"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Recevied->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Recevied" class="<?php echo $view_patient_services_list->Recevied->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Recevied) ?>', 1);"><div id="elh_view_patient_services_Recevied" class="view_patient_services_Recevied">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Recevied->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Recevied->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Recevied->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $view_patient_services_list->DeptRecvDate->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DeptRecvDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $view_patient_services_list->DeptRecvDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DeptRecvDate) ?>', 1);"><div id="elh_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DeptRecvDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DeptRecvDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $view_patient_services_list->DeptRecvUser->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DeptRecvUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $view_patient_services_list->DeptRecvUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DeptRecvUser) ?>', 1);"><div id="elh_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DeptRecvUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DeptRecvUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DeptRecvUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->DeptRecived) == "") { ?>
		<th data-name="DeptRecived" class="<?php echo $view_patient_services_list->DeptRecived->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->DeptRecived->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecived" class="<?php echo $view_patient_services_list->DeptRecived->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->DeptRecived) ?>', 1);"><div id="elh_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->DeptRecived->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->DeptRecived->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->DeptRecived->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $view_patient_services_list->SAuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->SAuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $view_patient_services_list->SAuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->SAuthDate) ?>', 1);"><div id="elh_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->SAuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->SAuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $view_patient_services_list->SAuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->SAuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $view_patient_services_list->SAuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->SAuthBy) ?>', 1);"><div id="elh_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->SAuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->SAuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->SAuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->SAuthendicate) == "") { ?>
		<th data-name="SAuthendicate" class="<?php echo $view_patient_services_list->SAuthendicate->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->SAuthendicate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthendicate" class="<?php echo $view_patient_services_list->SAuthendicate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->SAuthendicate) ?>', 1);"><div id="elh_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->SAuthendicate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->SAuthendicate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->SAuthendicate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->AuthDate->Visible) { // AuthDate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $view_patient_services_list->AuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_AuthDate" class="view_patient_services_AuthDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->AuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $view_patient_services_list->AuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->AuthDate) ?>', 1);"><div id="elh_view_patient_services_AuthDate" class="view_patient_services_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->AuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->AuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->AuthBy->Visible) { // AuthBy ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $view_patient_services_list->AuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_AuthBy" class="view_patient_services_AuthBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->AuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $view_patient_services_list->AuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->AuthBy) ?>', 1);"><div id="elh_view_patient_services_AuthBy" class="view_patient_services_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->AuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->AuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->AuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Authencate->Visible) { // Authencate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Authencate) == "") { ?>
		<th data-name="Authencate" class="<?php echo $view_patient_services_list->Authencate->headerCellClass() ?>"><div id="elh_view_patient_services_Authencate" class="view_patient_services_Authencate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Authencate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Authencate" class="<?php echo $view_patient_services_list->Authencate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Authencate) ?>', 1);"><div id="elh_view_patient_services_Authencate" class="view_patient_services_Authencate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Authencate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Authencate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Authencate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->EditDate->Visible) { // EditDate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $view_patient_services_list->EditDate->headerCellClass() ?>"><div id="elh_view_patient_services_EditDate" class="view_patient_services_EditDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $view_patient_services_list->EditDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->EditDate) ?>', 1);"><div id="elh_view_patient_services_EditDate" class="view_patient_services_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->EditDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->EditDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->EditBy->Visible) { // EditBy ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->EditBy) == "") { ?>
		<th data-name="EditBy" class="<?php echo $view_patient_services_list->EditBy->headerCellClass() ?>"><div id="elh_view_patient_services_EditBy" class="view_patient_services_EditBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->EditBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditBy" class="<?php echo $view_patient_services_list->EditBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->EditBy) ?>', 1);"><div id="elh_view_patient_services_EditBy" class="view_patient_services_EditBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->EditBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->EditBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->EditBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Editted->Visible) { // Editted ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Editted) == "") { ?>
		<th data-name="Editted" class="<?php echo $view_patient_services_list->Editted->headerCellClass() ?>"><div id="elh_view_patient_services_Editted" class="view_patient_services_Editted"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Editted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Editted" class="<?php echo $view_patient_services_list->Editted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Editted) ?>', 1);"><div id="elh_view_patient_services_Editted" class="view_patient_services_Editted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Editted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Editted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Editted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->PatID->Visible) { // PatID ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_patient_services_list->PatID->headerCellClass() ?>"><div id="elh_view_patient_services_PatID" class="view_patient_services_PatID"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_patient_services_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->PatID) ?>', 1);"><div id="elh_view_patient_services_PatID" class="view_patient_services_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->PatientId->Visible) { // PatientId ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_services_list->PatientId->headerCellClass() ?>"><div id="elh_view_patient_services_PatientId" class="view_patient_services_PatientId"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_services_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->PatientId) ?>', 1);"><div id="elh_view_patient_services_PatientId" class="view_patient_services_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Mobile->Visible) { // Mobile ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_services_list->Mobile->headerCellClass() ?>"><div id="elh_view_patient_services_Mobile" class="view_patient_services_Mobile"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_services_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Mobile) ?>', 1);"><div id="elh_view_patient_services_Mobile" class="view_patient_services_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->CId->Visible) { // CId ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $view_patient_services_list->CId->headerCellClass() ?>"><div id="elh_view_patient_services_CId" class="view_patient_services_CId"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $view_patient_services_list->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->CId) ?>', 1);"><div id="elh_view_patient_services_CId" class="view_patient_services_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->CId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->CId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Order->Visible) { // Order ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_patient_services_list->Order->headerCellClass() ?>"><div id="elh_view_patient_services_Order" class="view_patient_services_Order"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_patient_services_list->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Order) ?>', 1);"><div id="elh_view_patient_services_Order" class="view_patient_services_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->ResType->Visible) { // ResType ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $view_patient_services_list->ResType->headerCellClass() ?>"><div id="elh_view_patient_services_ResType" class="view_patient_services_ResType"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $view_patient_services_list->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->ResType) ?>', 1);"><div id="elh_view_patient_services_ResType" class="view_patient_services_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->ResType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->ResType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Sample->Visible) { // Sample ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $view_patient_services_list->Sample->headerCellClass() ?>"><div id="elh_view_patient_services_Sample" class="view_patient_services_Sample"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $view_patient_services_list->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Sample) ?>', 1);"><div id="elh_view_patient_services_Sample" class="view_patient_services_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Sample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Sample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->NoD->Visible) { // NoD ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $view_patient_services_list->NoD->headerCellClass() ?>"><div id="elh_view_patient_services_NoD" class="view_patient_services_NoD"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $view_patient_services_list->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->NoD) ?>', 1);"><div id="elh_view_patient_services_NoD" class="view_patient_services_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->NoD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->NoD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $view_patient_services_list->BillOrder->headerCellClass() ?>"><div id="elh_view_patient_services_BillOrder" class="view_patient_services_BillOrder"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $view_patient_services_list->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->BillOrder) ?>', 1);"><div id="elh_view_patient_services_BillOrder" class="view_patient_services_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->BillOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->BillOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Inactive->Visible) { // Inactive ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $view_patient_services_list->Inactive->headerCellClass() ?>"><div id="elh_view_patient_services_Inactive" class="view_patient_services_Inactive"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $view_patient_services_list->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Inactive) ?>', 1);"><div id="elh_view_patient_services_Inactive" class="view_patient_services_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Inactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Inactive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Inactive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->CollSample->Visible) { // CollSample ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $view_patient_services_list->CollSample->headerCellClass() ?>"><div id="elh_view_patient_services_CollSample" class="view_patient_services_CollSample"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $view_patient_services_list->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->CollSample) ?>', 1);"><div id="elh_view_patient_services_CollSample" class="view_patient_services_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->CollSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->CollSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->TestType->Visible) { // TestType ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_patient_services_list->TestType->headerCellClass() ?>"><div id="elh_view_patient_services_TestType" class="view_patient_services_TestType"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_patient_services_list->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->TestType) ?>', 1);"><div id="elh_view_patient_services_TestType" class="view_patient_services_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->TestType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->TestType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->TestType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Repeated->Visible) { // Repeated ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_patient_services_list->Repeated->headerCellClass() ?>"><div id="elh_view_patient_services_Repeated" class="view_patient_services_Repeated"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_patient_services_list->Repeated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Repeated) ?>', 1);"><div id="elh_view_patient_services_Repeated" class="view_patient_services_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Repeated->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Repeated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Repeated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->RepeatedBy) == "") { ?>
		<th data-name="RepeatedBy" class="<?php echo $view_patient_services_list->RepeatedBy->headerCellClass() ?>"><div id="elh_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->RepeatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedBy" class="<?php echo $view_patient_services_list->RepeatedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->RepeatedBy) ?>', 1);"><div id="elh_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->RepeatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->RepeatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->RepeatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->RepeatedDate) == "") { ?>
		<th data-name="RepeatedDate" class="<?php echo $view_patient_services_list->RepeatedDate->headerCellClass() ?>"><div id="elh_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->RepeatedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedDate" class="<?php echo $view_patient_services_list->RepeatedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->RepeatedDate) ?>', 1);"><div id="elh_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->RepeatedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->RepeatedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->serviceID->Visible) { // serviceID ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->serviceID) == "") { ?>
		<th data-name="serviceID" class="<?php echo $view_patient_services_list->serviceID->headerCellClass() ?>"><div id="elh_view_patient_services_serviceID" class="view_patient_services_serviceID"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->serviceID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="serviceID" class="<?php echo $view_patient_services_list->serviceID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->serviceID) ?>', 1);"><div id="elh_view_patient_services_serviceID" class="view_patient_services_serviceID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->serviceID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->serviceID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Service_Type->Visible) { // Service_Type ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Service_Type) == "") { ?>
		<th data-name="Service_Type" class="<?php echo $view_patient_services_list->Service_Type->headerCellClass() ?>"><div id="elh_view_patient_services_Service_Type" class="view_patient_services_Service_Type"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Service_Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Type" class="<?php echo $view_patient_services_list->Service_Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Service_Type) ?>', 1);"><div id="elh_view_patient_services_Service_Type" class="view_patient_services_Service_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Service_Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Service_Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Service_Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->Service_Department->Visible) { // Service_Department ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->Service_Department) == "") { ?>
		<th data-name="Service_Department" class="<?php echo $view_patient_services_list->Service_Department->headerCellClass() ?>"><div id="elh_view_patient_services_Service_Department" class="view_patient_services_Service_Department"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->Service_Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Department" class="<?php echo $view_patient_services_list->Service_Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->Service_Department) ?>', 1);"><div id="elh_view_patient_services_Service_Department" class="view_patient_services_Service_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->Service_Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->Service_Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->Service_Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_list->RequestNo->Visible) { // RequestNo ?>
	<?php if ($view_patient_services_list->SortUrl($view_patient_services_list->RequestNo) == "") { ?>
		<th data-name="RequestNo" class="<?php echo $view_patient_services_list->RequestNo->headerCellClass() ?>"><div id="elh_view_patient_services_RequestNo" class="view_patient_services_RequestNo"><div class="ew-table-header-caption"><?php echo $view_patient_services_list->RequestNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestNo" class="<?php echo $view_patient_services_list->RequestNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_services_list->SortUrl($view_patient_services_list->RequestNo) ?>', 1);"><div id="elh_view_patient_services_RequestNo" class="view_patient_services_RequestNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_list->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_list->RequestNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_list->RequestNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($view_patient_services_list->ExportAll && $view_patient_services_list->isExport()) {
	$view_patient_services_list->StopRecord = $view_patient_services_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_patient_services_list->TotalRecords > $view_patient_services_list->StartRecord + $view_patient_services_list->DisplayRecords - 1)
		$view_patient_services_list->StopRecord = $view_patient_services_list->StartRecord + $view_patient_services_list->DisplayRecords - 1;
	else
		$view_patient_services_list->StopRecord = $view_patient_services_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_patient_services->isConfirm() || $view_patient_services_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_patient_services_list->FormKeyCountName) && ($view_patient_services_list->isGridAdd() || $view_patient_services_list->isGridEdit() || $view_patient_services->isConfirm())) {
		$view_patient_services_list->KeyCount = $CurrentForm->getValue($view_patient_services_list->FormKeyCountName);
		$view_patient_services_list->StopRecord = $view_patient_services_list->StartRecord + $view_patient_services_list->KeyCount - 1;
	}
}
$view_patient_services_list->RecordCount = $view_patient_services_list->StartRecord - 1;
if ($view_patient_services_list->Recordset && !$view_patient_services_list->Recordset->EOF) {
	$view_patient_services_list->Recordset->moveFirst();
	$selectLimit = $view_patient_services_list->UseSelectLimit;
	if (!$selectLimit && $view_patient_services_list->StartRecord > 1)
		$view_patient_services_list->Recordset->move($view_patient_services_list->StartRecord - 1);
} elseif (!$view_patient_services->AllowAddDeleteRow && $view_patient_services_list->StopRecord == 0) {
	$view_patient_services_list->StopRecord = $view_patient_services->GridAddRowCount;
}

// Initialize aggregate
$view_patient_services->RowType = ROWTYPE_AGGREGATEINIT;
$view_patient_services->resetAttributes();
$view_patient_services_list->renderRow();
if ($view_patient_services_list->isGridAdd())
	$view_patient_services_list->RowIndex = 0;
if ($view_patient_services_list->isGridEdit())
	$view_patient_services_list->RowIndex = 0;
while ($view_patient_services_list->RecordCount < $view_patient_services_list->StopRecord) {
	$view_patient_services_list->RecordCount++;
	if ($view_patient_services_list->RecordCount >= $view_patient_services_list->StartRecord) {
		$view_patient_services_list->RowCount++;
		if ($view_patient_services_list->isGridAdd() || $view_patient_services_list->isGridEdit() || $view_patient_services->isConfirm()) {
			$view_patient_services_list->RowIndex++;
			$CurrentForm->Index = $view_patient_services_list->RowIndex;
			if ($CurrentForm->hasValue($view_patient_services_list->FormActionName) && ($view_patient_services->isConfirm() || $view_patient_services_list->EventCancelled))
				$view_patient_services_list->RowAction = strval($CurrentForm->getValue($view_patient_services_list->FormActionName));
			elseif ($view_patient_services_list->isGridAdd())
				$view_patient_services_list->RowAction = "insert";
			else
				$view_patient_services_list->RowAction = "";
		}

		// Set up key count
		$view_patient_services_list->KeyCount = $view_patient_services_list->RowIndex;

		// Init row class and style
		$view_patient_services->resetAttributes();
		$view_patient_services->CssClass = "";
		if ($view_patient_services_list->isGridAdd()) {
			$view_patient_services_list->loadRowValues(); // Load default values
		} else {
			$view_patient_services_list->loadRowValues($view_patient_services_list->Recordset); // Load row values
		}
		$view_patient_services->RowType = ROWTYPE_VIEW; // Render view
		if ($view_patient_services_list->isGridAdd()) // Grid add
			$view_patient_services->RowType = ROWTYPE_ADD; // Render add
		if ($view_patient_services_list->isGridAdd() && $view_patient_services->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_patient_services_list->restoreCurrentRowFormValues($view_patient_services_list->RowIndex); // Restore form values
		if ($view_patient_services_list->isGridEdit()) { // Grid edit
			if ($view_patient_services->EventCancelled)
				$view_patient_services_list->restoreCurrentRowFormValues($view_patient_services_list->RowIndex); // Restore form values
			if ($view_patient_services_list->RowAction == "insert")
				$view_patient_services->RowType = ROWTYPE_ADD; // Render add
			else
				$view_patient_services->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_patient_services_list->isGridEdit() && ($view_patient_services->RowType == ROWTYPE_EDIT || $view_patient_services->RowType == ROWTYPE_ADD) && $view_patient_services->EventCancelled) // Update failed
			$view_patient_services_list->restoreCurrentRowFormValues($view_patient_services_list->RowIndex); // Restore form values
		if ($view_patient_services->RowType == ROWTYPE_EDIT) // Edit row
			$view_patient_services_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_patient_services->RowAttrs->merge(["data-rowindex" => $view_patient_services_list->RowCount, "id" => "r" . $view_patient_services_list->RowCount . "_view_patient_services", "data-rowtype" => $view_patient_services->RowType]);

		// Render row
		$view_patient_services_list->renderRow();

		// Render list options
		$view_patient_services_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_patient_services_list->RowAction != "delete" && $view_patient_services_list->RowAction != "insertdelete" && !($view_patient_services_list->RowAction == "insert" && $view_patient_services->isConfirm() && $view_patient_services_list->emptyRow())) {
?>
	<tr <?php echo $view_patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_services_list->ListOptions->render("body", "left", $view_patient_services_list->RowCount);
?>
	<?php if ($view_patient_services_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_patient_services_list->id->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_id" class="form-group"></span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="o<?php echo $view_patient_services_list->RowIndex ?>_id" id="o<?php echo $view_patient_services_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services_list->id->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_id" class="form-group">
<span<?php echo $view_patient_services_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="x<?php echo $view_patient_services_list->RowIndex ?>_id" id="x<?php echo $view_patient_services_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_id">
<span<?php echo $view_patient_services_list->id->viewAttributes() ?>><?php echo $view_patient_services_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $view_patient_services_list->Reception->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Reception" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Reception->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Reception->EditValue ?>"<?php echo $view_patient_services_list->Reception->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="o<?php echo $view_patient_services_list->RowIndex ?>_Reception" id="o<?php echo $view_patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services_list->Reception->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Reception" class="form-group">
<span<?php echo $view_patient_services_list->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services_list->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Reception">
<span<?php echo $view_patient_services_list->Reception->viewAttributes() ?>><?php echo $view_patient_services_list->Reception->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $view_patient_services_list->mrnno->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_mrnno" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->mrnno->EditValue ?>"<?php echo $view_patient_services_list->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="o<?php echo $view_patient_services_list->RowIndex ?>_mrnno" id="o<?php echo $view_patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services_list->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_mrnno" class="form-group">
<span<?php echo $view_patient_services_list->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services_list->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_mrnno">
<span<?php echo $view_patient_services_list->mrnno->viewAttributes() ?>><?php echo $view_patient_services_list->mrnno->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_patient_services_list->PatientName->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PatientName" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PatientName->EditValue ?>"<?php echo $view_patient_services_list->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatientName" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services_list->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PatientName" class="form-group">
<span<?php echo $view_patient_services_list->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->PatientName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services_list->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PatientName">
<span<?php echo $view_patient_services_list->PatientName->viewAttributes() ?>><?php echo $view_patient_services_list->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $view_patient_services_list->Age->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Age" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_list->RowIndex ?>_Age" id="x<?php echo $view_patient_services_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Age->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Age->EditValue ?>"<?php echo $view_patient_services_list->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="o<?php echo $view_patient_services_list->RowIndex ?>_Age" id="o<?php echo $view_patient_services_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services_list->Age->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Age" class="form-group">
<span<?php echo $view_patient_services_list->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->Age->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_list->RowIndex ?>_Age" id="x<?php echo $view_patient_services_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services_list->Age->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Age">
<span<?php echo $view_patient_services_list->Age->viewAttributes() ?>><?php echo $view_patient_services_list->Age->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $view_patient_services_list->Gender->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Gender" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Gender->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Gender->EditValue ?>"<?php echo $view_patient_services_list->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="o<?php echo $view_patient_services_list->RowIndex ?>_Gender" id="o<?php echo $view_patient_services_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services_list->Gender->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Gender" class="form-group">
<span<?php echo $view_patient_services_list->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->Gender->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services_list->Gender->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Gender">
<span<?php echo $view_patient_services_list->Gender->viewAttributes() ?>><?php echo $view_patient_services_list->Gender->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" <?php echo $view_patient_services_list->profilePic->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_profilePic" class="form-group">
<textarea data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_list->profilePic->getPlaceHolder()) ?>"<?php echo $view_patient_services_list->profilePic->editAttributes() ?>><?php echo $view_patient_services_list->profilePic->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="o<?php echo $view_patient_services_list->RowIndex ?>_profilePic" id="o<?php echo $view_patient_services_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services_list->profilePic->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_profilePic" class="form-group">
<span<?php echo $view_patient_services_list->profilePic->viewAttributes() ?>><?php echo $view_patient_services_list->profilePic->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services_list->profilePic->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_profilePic">
<span<?php echo $view_patient_services_list->profilePic->viewAttributes() ?>><?php echo $view_patient_services_list->profilePic->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Services->Visible) { // Services ?>
		<td data-name="Services" <?php echo $view_patient_services_list->Services->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Services" class="form-group">
<?php
$onchange = $view_patient_services_list->Services->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_patient_services_list->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_list->RowIndex ?>_Services">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services_list->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services_list->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services_list->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services_list->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_list->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_patient_serviceslist"], function() {
	fview_patient_serviceslist.createAutoSuggest({"id":"x<?php echo $view_patient_services_list->RowIndex ?>_Services","forceSelect":false});
});
</script>
<?php echo $view_patient_services_list->Services->Lookup->getParamTag($view_patient_services_list, "p_x" . $view_patient_services_list->RowIndex . "_Services") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="o<?php echo $view_patient_services_list->RowIndex ?>_Services" id="o<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_list->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Services" class="form-group">
<?php
$onchange = $view_patient_services_list->Services->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_patient_services_list->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_list->RowIndex ?>_Services">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services_list->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services_list->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services_list->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services_list->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_list->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_patient_serviceslist"], function() {
	fview_patient_serviceslist.createAutoSuggest({"id":"x<?php echo $view_patient_services_list->RowIndex ?>_Services","forceSelect":false});
});
</script>
<?php echo $view_patient_services_list->Services->Lookup->getParamTag($view_patient_services_list, "p_x" . $view_patient_services_list->RowIndex . "_Services") ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Services">
<span<?php echo $view_patient_services_list->Services->viewAttributes() ?>><?php echo $view_patient_services_list->Services->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit" <?php echo $view_patient_services_list->Unit->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Unit" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_list->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Unit->EditValue ?>"<?php echo $view_patient_services_list->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="o<?php echo $view_patient_services_list->RowIndex ?>_Unit" id="o<?php echo $view_patient_services_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services_list->Unit->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Unit" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_list->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Unit->EditValue ?>"<?php echo $view_patient_services_list->Unit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Unit">
<span<?php echo $view_patient_services_list->Unit->viewAttributes() ?>><?php echo $view_patient_services_list->Unit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->amount->Visible) { // amount ?>
		<td data-name="amount" <?php echo $view_patient_services_list->amount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_amount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_list->RowIndex ?>_amount" id="x<?php echo $view_patient_services_list->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services_list->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->amount->EditValue ?>"<?php echo $view_patient_services_list->amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="o<?php echo $view_patient_services_list->RowIndex ?>_amount" id="o<?php echo $view_patient_services_list->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services_list->amount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_amount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_list->RowIndex ?>_amount" id="x<?php echo $view_patient_services_list->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services_list->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->amount->EditValue ?>"<?php echo $view_patient_services_list->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_amount">
<span<?php echo $view_patient_services_list->amount->viewAttributes() ?>><?php echo $view_patient_services_list->amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $view_patient_services_list->Quantity->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Quantity" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Quantity->EditValue ?>"<?php echo $view_patient_services_list->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="o<?php echo $view_patient_services_list->RowIndex ?>_Quantity" id="o<?php echo $view_patient_services_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services_list->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Quantity" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Quantity->EditValue ?>"<?php echo $view_patient_services_list->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Quantity">
<span<?php echo $view_patient_services_list->Quantity->viewAttributes() ?>><?php echo $view_patient_services_list->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory" <?php echo $view_patient_services_list->DiscountCategory->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DiscountCategory" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services_list->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services_list->DiscountCategory->editAttributes() ?>>
			<?php echo $view_patient_services_list->DiscountCategory->selectOptionListHtml("x{$view_patient_services_list->RowIndex}_DiscountCategory") ?>
		</select>
</div>
<?php echo $view_patient_services_list->DiscountCategory->Lookup->getParamTag($view_patient_services_list, "p_x" . $view_patient_services_list->RowIndex . "_DiscountCategory") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="o<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" id="o<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services_list->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DiscountCategory" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services_list->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services_list->DiscountCategory->editAttributes() ?>>
			<?php echo $view_patient_services_list->DiscountCategory->selectOptionListHtml("x{$view_patient_services_list->RowIndex}_DiscountCategory") ?>
		</select>
</div>
<?php echo $view_patient_services_list->DiscountCategory->Lookup->getParamTag($view_patient_services_list, "p_x" . $view_patient_services_list->RowIndex . "_DiscountCategory") ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DiscountCategory">
<span<?php echo $view_patient_services_list->DiscountCategory->viewAttributes() ?>><?php echo $view_patient_services_list->DiscountCategory->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Discount->Visible) { // Discount ?>
		<td data-name="Discount" <?php echo $view_patient_services_list->Discount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Discount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_list->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Discount->EditValue ?>"<?php echo $view_patient_services_list->Discount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="o<?php echo $view_patient_services_list->RowIndex ?>_Discount" id="o<?php echo $view_patient_services_list->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services_list->Discount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Discount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_list->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Discount->EditValue ?>"<?php echo $view_patient_services_list->Discount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Discount">
<span<?php echo $view_patient_services_list->Discount->viewAttributes() ?>><?php echo $view_patient_services_list->Discount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" <?php echo $view_patient_services_list->SubTotal->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SubTotal" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_list->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SubTotal->EditValue ?>"<?php echo $view_patient_services_list->SubTotal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="o<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" id="o<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services_list->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SubTotal" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_list->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SubTotal->EditValue ?>"<?php echo $view_patient_services_list->SubTotal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SubTotal">
<span<?php echo $view_patient_services_list->SubTotal->viewAttributes() ?>><?php echo $view_patient_services_list->SubTotal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->description->Visible) { // description ?>
		<td data-name="description" <?php echo $view_patient_services_list->description->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_description" class="form-group">
<textarea data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_list->RowIndex ?>_description" id="x<?php echo $view_patient_services_list->RowIndex ?>_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_list->description->getPlaceHolder()) ?>"<?php echo $view_patient_services_list->description->editAttributes() ?>><?php echo $view_patient_services_list->description->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="o<?php echo $view_patient_services_list->RowIndex ?>_description" id="o<?php echo $view_patient_services_list->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services_list->description->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_description" class="form-group">
<span<?php echo $view_patient_services_list->description->viewAttributes() ?>><?php echo $view_patient_services_list->description->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_list->RowIndex ?>_description" id="x<?php echo $view_patient_services_list->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services_list->description->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_description">
<span<?php echo $view_patient_services_list->description->viewAttributes() ?>><?php echo $view_patient_services_list->description->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" <?php echo $view_patient_services_list->patient_type->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_patient_type" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->patient_type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->patient_type->EditValue ?>"<?php echo $view_patient_services_list->patient_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="o<?php echo $view_patient_services_list->RowIndex ?>_patient_type" id="o<?php echo $view_patient_services_list->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services_list->patient_type->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_patient_type" class="form-group">
<span<?php echo $view_patient_services_list->patient_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->patient_type->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services_list->patient_type->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_patient_type">
<span<?php echo $view_patient_services_list->patient_type->viewAttributes() ?>><?php echo $view_patient_services_list->patient_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" <?php echo $view_patient_services_list->charged_date->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_charged_date" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" placeholder="<?php echo HtmlEncode($view_patient_services_list->charged_date->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->charged_date->EditValue ?>"<?php echo $view_patient_services_list->charged_date->editAttributes() ?>>
<?php if (!$view_patient_services_list->charged_date->ReadOnly && !$view_patient_services_list->charged_date->Disabled && !isset($view_patient_services_list->charged_date->EditAttrs["readonly"]) && !isset($view_patient_services_list->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="o<?php echo $view_patient_services_list->RowIndex ?>_charged_date" id="o<?php echo $view_patient_services_list->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services_list->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_charged_date" class="form-group">
<span<?php echo $view_patient_services_list->charged_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->charged_date->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services_list->charged_date->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_charged_date">
<span<?php echo $view_patient_services_list->charged_date->viewAttributes() ?>><?php echo $view_patient_services_list->charged_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_patient_services_list->status->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_status" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_list->RowIndex ?>_status" id="x<?php echo $view_patient_services_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->status->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->status->EditValue ?>"<?php echo $view_patient_services_list->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="o<?php echo $view_patient_services_list->RowIndex ?>_status" id="o<?php echo $view_patient_services_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services_list->status->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_status" class="form-group">
<span<?php echo $view_patient_services_list->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->status->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_list->RowIndex ?>_status" id="x<?php echo $view_patient_services_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services_list->status->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_status">
<span<?php echo $view_patient_services_list->status->viewAttributes() ?>><?php echo $view_patient_services_list->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_patient_services_list->createdby->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="o<?php echo $view_patient_services_list->RowIndex ?>_createdby" id="o<?php echo $view_patient_services_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services_list->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_createdby">
<span<?php echo $view_patient_services_list->createdby->viewAttributes() ?>><?php echo $view_patient_services_list->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_patient_services_list->createddatetime->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="o<?php echo $view_patient_services_list->RowIndex ?>_createddatetime" id="o<?php echo $view_patient_services_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services_list->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_createddatetime">
<span<?php echo $view_patient_services_list->createddatetime->viewAttributes() ?>><?php echo $view_patient_services_list->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_patient_services_list->modifiedby->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="o<?php echo $view_patient_services_list->RowIndex ?>_modifiedby" id="o<?php echo $view_patient_services_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services_list->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_modifiedby">
<span<?php echo $view_patient_services_list->modifiedby->viewAttributes() ?>><?php echo $view_patient_services_list->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_patient_services_list->modifieddatetime->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="o<?php echo $view_patient_services_list->RowIndex ?>_modifieddatetime" id="o<?php echo $view_patient_services_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services_list->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_modifieddatetime">
<span<?php echo $view_patient_services_list->modifieddatetime->viewAttributes() ?>><?php echo $view_patient_services_list->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Aid->Visible) { // Aid ?>
		<td data-name="Aid" <?php echo $view_patient_services_list->Aid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Aid" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Aid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Aid->EditValue ?>"<?php echo $view_patient_services_list->Aid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="o<?php echo $view_patient_services_list->RowIndex ?>_Aid" id="o<?php echo $view_patient_services_list->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services_list->Aid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Aid" class="form-group">
<span<?php echo $view_patient_services_list->Aid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->Aid->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services_list->Aid->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Aid">
<span<?php echo $view_patient_services_list->Aid->viewAttributes() ?>><?php echo $view_patient_services_list->Aid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Vid->Visible) { // Vid ?>
		<td data-name="Vid" <?php echo $view_patient_services_list->Vid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_patient_services_list->Vid->getSessionValue() != "") { ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Vid" class="form-group">
<span<?php echo $view_patient_services_list->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_list->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Vid" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Vid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Vid->EditValue ?>"<?php echo $view_patient_services_list->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="o<?php echo $view_patient_services_list->RowIndex ?>_Vid" id="o<?php echo $view_patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_list->Vid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Vid" class="form-group">
<span<?php echo $view_patient_services_list->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->Vid->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_list->Vid->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Vid">
<span<?php echo $view_patient_services_list->Vid->viewAttributes() ?>><?php echo $view_patient_services_list->Vid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $view_patient_services_list->DrID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrID" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrID->EditValue ?>"<?php echo $view_patient_services_list->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrID" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services_list->DrID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrID" class="form-group">
<span<?php echo $view_patient_services_list->DrID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->DrID->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services_list->DrID->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrID">
<span<?php echo $view_patient_services_list->DrID->viewAttributes() ?>><?php echo $view_patient_services_list->DrID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" <?php echo $view_patient_services_list->DrCODE->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrCODE" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrCODE->EditValue ?>"<?php echo $view_patient_services_list->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services_list->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrCODE" class="form-group">
<span<?php echo $view_patient_services_list->DrCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->DrCODE->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services_list->DrCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrCODE">
<span<?php echo $view_patient_services_list->DrCODE->viewAttributes() ?>><?php echo $view_patient_services_list->DrCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $view_patient_services_list->DrName->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrName" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrName->EditValue ?>"<?php echo $view_patient_services_list->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrName" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services_list->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrName" class="form-group">
<span<?php echo $view_patient_services_list->DrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->DrName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services_list->DrName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrName">
<span<?php echo $view_patient_services_list->DrName->viewAttributes() ?>><?php echo $view_patient_services_list->DrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $view_patient_services_list->Department->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Department" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Department->EditValue ?>"<?php echo $view_patient_services_list->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="o<?php echo $view_patient_services_list->RowIndex ?>_Department" id="o<?php echo $view_patient_services_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services_list->Department->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Department" class="form-group">
<span<?php echo $view_patient_services_list->Department->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->Department->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services_list->Department->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Department">
<span<?php echo $view_patient_services_list->Department->viewAttributes() ?>><?php echo $view_patient_services_list->Department->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres" <?php echo $view_patient_services_list->DrSharePres->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrSharePres" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrSharePres->EditValue ?>"<?php echo $view_patient_services_list->DrSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services_list->DrSharePres->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrSharePres" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrSharePres->EditValue ?>"<?php echo $view_patient_services_list->DrSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrSharePres">
<span<?php echo $view_patient_services_list->DrSharePres->viewAttributes() ?>><?php echo $view_patient_services_list->DrSharePres->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres" <?php echo $view_patient_services_list->HospSharePres->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_HospSharePres" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->HospSharePres->EditValue ?>"<?php echo $view_patient_services_list->HospSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services_list->HospSharePres->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_HospSharePres" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->HospSharePres->EditValue ?>"<?php echo $view_patient_services_list->HospSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_HospSharePres">
<span<?php echo $view_patient_services_list->HospSharePres->viewAttributes() ?>><?php echo $view_patient_services_list->HospSharePres->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" <?php echo $view_patient_services_list->DrShareAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareAmount->EditValue ?>"<?php echo $view_patient_services_list->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services_list->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareAmount->EditValue ?>"<?php echo $view_patient_services_list->DrShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareAmount">
<span<?php echo $view_patient_services_list->DrShareAmount->viewAttributes() ?>><?php echo $view_patient_services_list->DrShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" <?php echo $view_patient_services_list->HospShareAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_HospShareAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->HospShareAmount->EditValue ?>"<?php echo $view_patient_services_list->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services_list->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_HospShareAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->HospShareAmount->EditValue ?>"<?php echo $view_patient_services_list->HospShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_HospShareAmount">
<span<?php echo $view_patient_services_list->HospShareAmount->viewAttributes() ?>><?php echo $view_patient_services_list->HospShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount" <?php echo $view_patient_services_list->DrShareSettiledAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareSettiledAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services_list->DrShareSettiledAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services_list->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareSettiledAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services_list->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareSettiledAmount">
<span<?php echo $view_patient_services_list->DrShareSettiledAmount->viewAttributes() ?>><?php echo $view_patient_services_list->DrShareSettiledAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId" <?php echo $view_patient_services_list->DrShareSettledId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareSettledId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services_list->DrShareSettledId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services_list->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareSettledId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services_list->DrShareSettledId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareSettledId">
<span<?php echo $view_patient_services_list->DrShareSettledId->viewAttributes() ?>><?php echo $view_patient_services_list->DrShareSettledId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus" <?php echo $view_patient_services_list->DrShareSettiledStatus->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareSettiledStatus" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services_list->DrShareSettiledStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services_list->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareSettiledStatus" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services_list->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DrShareSettiledStatus">
<span<?php echo $view_patient_services_list->DrShareSettiledStatus->viewAttributes() ?>><?php echo $view_patient_services_list->DrShareSettiledStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" <?php echo $view_patient_services_list->invoiceId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_invoiceId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->invoiceId->EditValue ?>"<?php echo $view_patient_services_list->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services_list->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_invoiceId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->invoiceId->EditValue ?>"<?php echo $view_patient_services_list->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_invoiceId">
<span<?php echo $view_patient_services_list->invoiceId->viewAttributes() ?>><?php echo $view_patient_services_list->invoiceId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" <?php echo $view_patient_services_list->invoiceAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_invoiceAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->invoiceAmount->EditValue ?>"<?php echo $view_patient_services_list->invoiceAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services_list->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_invoiceAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->invoiceAmount->EditValue ?>"<?php echo $view_patient_services_list->invoiceAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_invoiceAmount">
<span<?php echo $view_patient_services_list->invoiceAmount->viewAttributes() ?>><?php echo $view_patient_services_list->invoiceAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" <?php echo $view_patient_services_list->invoiceStatus->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_invoiceStatus" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->invoiceStatus->EditValue ?>"<?php echo $view_patient_services_list->invoiceStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services_list->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_invoiceStatus" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->invoiceStatus->EditValue ?>"<?php echo $view_patient_services_list->invoiceStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_invoiceStatus">
<span<?php echo $view_patient_services_list->invoiceStatus->viewAttributes() ?>><?php echo $view_patient_services_list->invoiceStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" <?php echo $view_patient_services_list->modeOfPayment->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_modeOfPayment" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->modeOfPayment->EditValue ?>"<?php echo $view_patient_services_list->modeOfPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="o<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" id="o<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services_list->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_modeOfPayment" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->modeOfPayment->EditValue ?>"<?php echo $view_patient_services_list->modeOfPayment->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_modeOfPayment">
<span<?php echo $view_patient_services_list->modeOfPayment->viewAttributes() ?>><?php echo $view_patient_services_list->modeOfPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_patient_services_list->HospID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospID" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services_list->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_HospID">
<span<?php echo $view_patient_services_list->HospID->viewAttributes() ?>><?php echo $view_patient_services_list->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $view_patient_services_list->RIDNO->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RIDNO" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RIDNO->EditValue ?>"<?php echo $view_patient_services_list->RIDNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="o<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" id="o<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services_list->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RIDNO" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RIDNO->EditValue ?>"<?php echo $view_patient_services_list->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RIDNO">
<span<?php echo $view_patient_services_list->RIDNO->viewAttributes() ?>><?php echo $view_patient_services_list->RIDNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" <?php echo $view_patient_services_list->ItemCode->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ItemCode" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_list->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ItemCode->EditValue ?>"<?php echo $view_patient_services_list->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="o<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" id="o<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services_list->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ItemCode" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_list->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ItemCode->EditValue ?>"<?php echo $view_patient_services_list->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ItemCode">
<span<?php echo $view_patient_services_list->ItemCode->viewAttributes() ?>><?php echo $view_patient_services_list->ItemCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $view_patient_services_list->TidNo->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TidNo" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TidNo->EditValue ?>"<?php echo $view_patient_services_list->TidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="o<?php echo $view_patient_services_list->RowIndex ?>_TidNo" id="o<?php echo $view_patient_services_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services_list->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TidNo" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TidNo->EditValue ?>"<?php echo $view_patient_services_list->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TidNo">
<span<?php echo $view_patient_services_list->TidNo->viewAttributes() ?>><?php echo $view_patient_services_list->TidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->sid->Visible) { // sid ?>
		<td data-name="sid" <?php echo $view_patient_services_list->sid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_sid" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_list->RowIndex ?>_sid" id="x<?php echo $view_patient_services_list->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services_list->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->sid->EditValue ?>"<?php echo $view_patient_services_list->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="o<?php echo $view_patient_services_list->RowIndex ?>_sid" id="o<?php echo $view_patient_services_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services_list->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_sid" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_list->RowIndex ?>_sid" id="x<?php echo $view_patient_services_list->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services_list->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->sid->EditValue ?>"<?php echo $view_patient_services_list->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_sid">
<span<?php echo $view_patient_services_list->sid->viewAttributes() ?>><?php echo $view_patient_services_list->sid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" <?php echo $view_patient_services_list->TestSubCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestSubCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TestSubCd->EditValue ?>"<?php echo $view_patient_services_list->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services_list->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestSubCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TestSubCd->EditValue ?>"<?php echo $view_patient_services_list->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestSubCd">
<span<?php echo $view_patient_services_list->TestSubCd->viewAttributes() ?>><?php echo $view_patient_services_list->TestSubCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" <?php echo $view_patient_services_list->DEptCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DEptCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DEptCd->EditValue ?>"<?php echo $view_patient_services_list->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services_list->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DEptCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DEptCd->EditValue ?>"<?php echo $view_patient_services_list->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DEptCd">
<span<?php echo $view_patient_services_list->DEptCd->viewAttributes() ?>><?php echo $view_patient_services_list->DEptCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" <?php echo $view_patient_services_list->ProfCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ProfCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ProfCd->EditValue ?>"<?php echo $view_patient_services_list->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services_list->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ProfCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ProfCd->EditValue ?>"<?php echo $view_patient_services_list->ProfCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ProfCd">
<span<?php echo $view_patient_services_list->ProfCd->viewAttributes() ?>><?php echo $view_patient_services_list->ProfCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Comments->Visible) { // Comments ?>
		<td data-name="Comments" <?php echo $view_patient_services_list->Comments->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Comments" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Comments->EditValue ?>"<?php echo $view_patient_services_list->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="o<?php echo $view_patient_services_list->RowIndex ?>_Comments" id="o<?php echo $view_patient_services_list->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services_list->Comments->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Comments" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Comments->EditValue ?>"<?php echo $view_patient_services_list->Comments->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Comments">
<span<?php echo $view_patient_services_list->Comments->viewAttributes() ?>><?php echo $view_patient_services_list->Comments->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $view_patient_services_list->Method->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Method" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_list->RowIndex ?>_Method" id="x<?php echo $view_patient_services_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Method->EditValue ?>"<?php echo $view_patient_services_list->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="o<?php echo $view_patient_services_list->RowIndex ?>_Method" id="o<?php echo $view_patient_services_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services_list->Method->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Method" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_list->RowIndex ?>_Method" id="x<?php echo $view_patient_services_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Method->EditValue ?>"<?php echo $view_patient_services_list->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Method">
<span<?php echo $view_patient_services_list->Method->viewAttributes() ?>><?php echo $view_patient_services_list->Method->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" <?php echo $view_patient_services_list->Specimen->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Specimen" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Specimen->EditValue ?>"<?php echo $view_patient_services_list->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="o<?php echo $view_patient_services_list->RowIndex ?>_Specimen" id="o<?php echo $view_patient_services_list->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services_list->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Specimen" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Specimen->EditValue ?>"<?php echo $view_patient_services_list->Specimen->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Specimen">
<span<?php echo $view_patient_services_list->Specimen->viewAttributes() ?>><?php echo $view_patient_services_list->Specimen->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" <?php echo $view_patient_services_list->Abnormal->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Abnormal" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Abnormal->EditValue ?>"<?php echo $view_patient_services_list->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="o<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" id="o<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services_list->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Abnormal" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Abnormal->EditValue ?>"<?php echo $view_patient_services_list->Abnormal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Abnormal">
<span<?php echo $view_patient_services_list->Abnormal->viewAttributes() ?>><?php echo $view_patient_services_list->Abnormal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" <?php echo $view_patient_services_list->TestUnit->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestUnit" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TestUnit->EditValue ?>"<?php echo $view_patient_services_list->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services_list->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestUnit" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TestUnit->EditValue ?>"<?php echo $view_patient_services_list->TestUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestUnit">
<span<?php echo $view_patient_services_list->TestUnit->viewAttributes() ?>><?php echo $view_patient_services_list->TestUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" <?php echo $view_patient_services_list->LOWHIGH->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_LOWHIGH" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->LOWHIGH->EditValue ?>"<?php echo $view_patient_services_list->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="o<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" id="o<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services_list->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_LOWHIGH" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->LOWHIGH->EditValue ?>"<?php echo $view_patient_services_list->LOWHIGH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_LOWHIGH">
<span<?php echo $view_patient_services_list->LOWHIGH->viewAttributes() ?>><?php echo $view_patient_services_list->LOWHIGH->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Branch->Visible) { // Branch ?>
		<td data-name="Branch" <?php echo $view_patient_services_list->Branch->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Branch" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Branch->EditValue ?>"<?php echo $view_patient_services_list->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="o<?php echo $view_patient_services_list->RowIndex ?>_Branch" id="o<?php echo $view_patient_services_list->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services_list->Branch->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Branch" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Branch->EditValue ?>"<?php echo $view_patient_services_list->Branch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Branch">
<span<?php echo $view_patient_services_list->Branch->viewAttributes() ?>><?php echo $view_patient_services_list->Branch->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" <?php echo $view_patient_services_list->Dispatch->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Dispatch" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Dispatch->EditValue ?>"<?php echo $view_patient_services_list->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="o<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" id="o<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services_list->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Dispatch" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Dispatch->EditValue ?>"<?php echo $view_patient_services_list->Dispatch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Dispatch">
<span<?php echo $view_patient_services_list->Dispatch->viewAttributes() ?>><?php echo $view_patient_services_list->Dispatch->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" <?php echo $view_patient_services_list->Pic1->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Pic1" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Pic1->EditValue ?>"<?php echo $view_patient_services_list->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="o<?php echo $view_patient_services_list->RowIndex ?>_Pic1" id="o<?php echo $view_patient_services_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services_list->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Pic1" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Pic1->EditValue ?>"<?php echo $view_patient_services_list->Pic1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Pic1">
<span<?php echo $view_patient_services_list->Pic1->viewAttributes() ?>><?php echo $view_patient_services_list->Pic1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" <?php echo $view_patient_services_list->Pic2->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Pic2" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Pic2->EditValue ?>"<?php echo $view_patient_services_list->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="o<?php echo $view_patient_services_list->RowIndex ?>_Pic2" id="o<?php echo $view_patient_services_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services_list->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Pic2" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Pic2->EditValue ?>"<?php echo $view_patient_services_list->Pic2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Pic2">
<span<?php echo $view_patient_services_list->Pic2->viewAttributes() ?>><?php echo $view_patient_services_list->Pic2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" <?php echo $view_patient_services_list->GraphPath->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_GraphPath" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->GraphPath->EditValue ?>"<?php echo $view_patient_services_list->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="o<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" id="o<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services_list->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_GraphPath" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->GraphPath->EditValue ?>"<?php echo $view_patient_services_list->GraphPath->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_GraphPath">
<span<?php echo $view_patient_services_list->GraphPath->viewAttributes() ?>><?php echo $view_patient_services_list->GraphPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" <?php echo $view_patient_services_list->MachineCD->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_MachineCD" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->MachineCD->EditValue ?>"<?php echo $view_patient_services_list->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="o<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" id="o<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services_list->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_MachineCD" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->MachineCD->EditValue ?>"<?php echo $view_patient_services_list->MachineCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_MachineCD">
<span<?php echo $view_patient_services_list->MachineCD->viewAttributes() ?>><?php echo $view_patient_services_list->MachineCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" <?php echo $view_patient_services_list->TestCancel->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestCancel" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TestCancel->EditValue ?>"<?php echo $view_patient_services_list->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services_list->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestCancel" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TestCancel->EditValue ?>"<?php echo $view_patient_services_list->TestCancel->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestCancel">
<span<?php echo $view_patient_services_list->TestCancel->viewAttributes() ?>><?php echo $view_patient_services_list->TestCancel->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" <?php echo $view_patient_services_list->OutSource->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_OutSource" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->OutSource->EditValue ?>"<?php echo $view_patient_services_list->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="o<?php echo $view_patient_services_list->RowIndex ?>_OutSource" id="o<?php echo $view_patient_services_list->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services_list->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_OutSource" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->OutSource->EditValue ?>"<?php echo $view_patient_services_list->OutSource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_OutSource">
<span<?php echo $view_patient_services_list->OutSource->viewAttributes() ?>><?php echo $view_patient_services_list->OutSource->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Printed->Visible) { // Printed ?>
		<td data-name="Printed" <?php echo $view_patient_services_list->Printed->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Printed" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Printed->EditValue ?>"<?php echo $view_patient_services_list->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="o<?php echo $view_patient_services_list->RowIndex ?>_Printed" id="o<?php echo $view_patient_services_list->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services_list->Printed->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Printed" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Printed->EditValue ?>"<?php echo $view_patient_services_list->Printed->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Printed">
<span<?php echo $view_patient_services_list->Printed->viewAttributes() ?>><?php echo $view_patient_services_list->Printed->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" <?php echo $view_patient_services_list->PrintBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PrintBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PrintBy->EditValue ?>"<?php echo $view_patient_services_list->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services_list->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PrintBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PrintBy->EditValue ?>"<?php echo $view_patient_services_list->PrintBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PrintBy">
<span<?php echo $view_patient_services_list->PrintBy->viewAttributes() ?>><?php echo $view_patient_services_list->PrintBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" <?php echo $view_patient_services_list->PrintDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PrintDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PrintDate->EditValue ?>"<?php echo $view_patient_services_list->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->PrintDate->ReadOnly && !$view_patient_services_list->PrintDate->Disabled && !isset($view_patient_services_list->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services_list->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PrintDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PrintDate->EditValue ?>"<?php echo $view_patient_services_list->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->PrintDate->ReadOnly && !$view_patient_services_list->PrintDate->Disabled && !isset($view_patient_services_list->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PrintDate">
<span<?php echo $view_patient_services_list->PrintDate->viewAttributes() ?>><?php echo $view_patient_services_list->PrintDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate" <?php echo $view_patient_services_list->BillingDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_BillingDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->BillingDate->EditValue ?>"<?php echo $view_patient_services_list->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->BillingDate->ReadOnly && !$view_patient_services_list->BillingDate->Disabled && !isset($view_patient_services_list->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services_list->BillingDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_BillingDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->BillingDate->EditValue ?>"<?php echo $view_patient_services_list->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->BillingDate->ReadOnly && !$view_patient_services_list->BillingDate->Disabled && !isset($view_patient_services_list->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_BillingDate">
<span<?php echo $view_patient_services_list->BillingDate->viewAttributes() ?>><?php echo $view_patient_services_list->BillingDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy" <?php echo $view_patient_services_list->BilledBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_BilledBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->BilledBy->EditValue ?>"<?php echo $view_patient_services_list->BilledBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services_list->BilledBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_BilledBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->BilledBy->EditValue ?>"<?php echo $view_patient_services_list->BilledBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_BilledBy">
<span<?php echo $view_patient_services_list->BilledBy->viewAttributes() ?>><?php echo $view_patient_services_list->BilledBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" <?php echo $view_patient_services_list->Resulted->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Resulted" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Resulted->EditValue ?>"<?php echo $view_patient_services_list->Resulted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="o<?php echo $view_patient_services_list->RowIndex ?>_Resulted" id="o<?php echo $view_patient_services_list->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services_list->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Resulted" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Resulted->EditValue ?>"<?php echo $view_patient_services_list->Resulted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Resulted">
<span<?php echo $view_patient_services_list->Resulted->viewAttributes() ?>><?php echo $view_patient_services_list->Resulted->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $view_patient_services_list->ResultDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ResultDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ResultDate->EditValue ?>"<?php echo $view_patient_services_list->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->ResultDate->ReadOnly && !$view_patient_services_list->ResultDate->Disabled && !isset($view_patient_services_list->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services_list->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ResultDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ResultDate->EditValue ?>"<?php echo $view_patient_services_list->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->ResultDate->ReadOnly && !$view_patient_services_list->ResultDate->Disabled && !isset($view_patient_services_list->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ResultDate">
<span<?php echo $view_patient_services_list->ResultDate->viewAttributes() ?>><?php echo $view_patient_services_list->ResultDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" <?php echo $view_patient_services_list->ResultedBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ResultedBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ResultedBy->EditValue ?>"<?php echo $view_patient_services_list->ResultedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services_list->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ResultedBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ResultedBy->EditValue ?>"<?php echo $view_patient_services_list->ResultedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ResultedBy">
<span<?php echo $view_patient_services_list->ResultedBy->viewAttributes() ?>><?php echo $view_patient_services_list->ResultedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" <?php echo $view_patient_services_list->SampleDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SampleDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SampleDate->EditValue ?>"<?php echo $view_patient_services_list->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->SampleDate->ReadOnly && !$view_patient_services_list->SampleDate->Disabled && !isset($view_patient_services_list->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services_list->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SampleDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SampleDate->EditValue ?>"<?php echo $view_patient_services_list->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->SampleDate->ReadOnly && !$view_patient_services_list->SampleDate->Disabled && !isset($view_patient_services_list->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SampleDate">
<span<?php echo $view_patient_services_list->SampleDate->viewAttributes() ?>><?php echo $view_patient_services_list->SampleDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" <?php echo $view_patient_services_list->SampleUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SampleUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SampleUser->EditValue ?>"<?php echo $view_patient_services_list->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services_list->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SampleUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SampleUser->EditValue ?>"<?php echo $view_patient_services_list->SampleUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SampleUser">
<span<?php echo $view_patient_services_list->SampleUser->viewAttributes() ?>><?php echo $view_patient_services_list->SampleUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled" <?php echo $view_patient_services_list->Sampled->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Sampled" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Sampled->EditValue ?>"<?php echo $view_patient_services_list->Sampled->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="o<?php echo $view_patient_services_list->RowIndex ?>_Sampled" id="o<?php echo $view_patient_services_list->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services_list->Sampled->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Sampled" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Sampled->EditValue ?>"<?php echo $view_patient_services_list->Sampled->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Sampled">
<span<?php echo $view_patient_services_list->Sampled->viewAttributes() ?>><?php echo $view_patient_services_list->Sampled->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" <?php echo $view_patient_services_list->ReceivedDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ReceivedDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ReceivedDate->EditValue ?>"<?php echo $view_patient_services_list->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->ReceivedDate->ReadOnly && !$view_patient_services_list->ReceivedDate->Disabled && !isset($view_patient_services_list->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services_list->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ReceivedDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ReceivedDate->EditValue ?>"<?php echo $view_patient_services_list->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->ReceivedDate->ReadOnly && !$view_patient_services_list->ReceivedDate->Disabled && !isset($view_patient_services_list->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ReceivedDate">
<span<?php echo $view_patient_services_list->ReceivedDate->viewAttributes() ?>><?php echo $view_patient_services_list->ReceivedDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" <?php echo $view_patient_services_list->ReceivedUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ReceivedUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ReceivedUser->EditValue ?>"<?php echo $view_patient_services_list->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services_list->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ReceivedUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ReceivedUser->EditValue ?>"<?php echo $view_patient_services_list->ReceivedUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ReceivedUser">
<span<?php echo $view_patient_services_list->ReceivedUser->viewAttributes() ?>><?php echo $view_patient_services_list->ReceivedUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied" <?php echo $view_patient_services_list->Recevied->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Recevied" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Recevied->EditValue ?>"<?php echo $view_patient_services_list->Recevied->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="o<?php echo $view_patient_services_list->RowIndex ?>_Recevied" id="o<?php echo $view_patient_services_list->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services_list->Recevied->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Recevied" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Recevied->EditValue ?>"<?php echo $view_patient_services_list->Recevied->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Recevied">
<span<?php echo $view_patient_services_list->Recevied->viewAttributes() ?>><?php echo $view_patient_services_list->Recevied->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" <?php echo $view_patient_services_list->DeptRecvDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DeptRecvDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services_list->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->DeptRecvDate->ReadOnly && !$view_patient_services_list->DeptRecvDate->Disabled && !isset($view_patient_services_list->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services_list->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DeptRecvDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services_list->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->DeptRecvDate->ReadOnly && !$view_patient_services_list->DeptRecvDate->Disabled && !isset($view_patient_services_list->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DeptRecvDate">
<span<?php echo $view_patient_services_list->DeptRecvDate->viewAttributes() ?>><?php echo $view_patient_services_list->DeptRecvDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" <?php echo $view_patient_services_list->DeptRecvUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DeptRecvUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services_list->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services_list->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DeptRecvUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services_list->DeptRecvUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DeptRecvUser">
<span<?php echo $view_patient_services_list->DeptRecvUser->viewAttributes() ?>><?php echo $view_patient_services_list->DeptRecvUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived" <?php echo $view_patient_services_list->DeptRecived->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DeptRecived" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DeptRecived->EditValue ?>"<?php echo $view_patient_services_list->DeptRecived->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services_list->DeptRecived->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DeptRecived" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DeptRecived->EditValue ?>"<?php echo $view_patient_services_list->DeptRecived->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_DeptRecived">
<span<?php echo $view_patient_services_list->DeptRecived->viewAttributes() ?>><?php echo $view_patient_services_list->DeptRecived->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" <?php echo $view_patient_services_list->SAuthDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SAuthDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SAuthDate->EditValue ?>"<?php echo $view_patient_services_list->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->SAuthDate->ReadOnly && !$view_patient_services_list->SAuthDate->Disabled && !isset($view_patient_services_list->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services_list->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SAuthDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SAuthDate->EditValue ?>"<?php echo $view_patient_services_list->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->SAuthDate->ReadOnly && !$view_patient_services_list->SAuthDate->Disabled && !isset($view_patient_services_list->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SAuthDate">
<span<?php echo $view_patient_services_list->SAuthDate->viewAttributes() ?>><?php echo $view_patient_services_list->SAuthDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" <?php echo $view_patient_services_list->SAuthBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SAuthBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SAuthBy->EditValue ?>"<?php echo $view_patient_services_list->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services_list->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SAuthBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SAuthBy->EditValue ?>"<?php echo $view_patient_services_list->SAuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SAuthBy">
<span<?php echo $view_patient_services_list->SAuthBy->viewAttributes() ?>><?php echo $view_patient_services_list->SAuthBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate" <?php echo $view_patient_services_list->SAuthendicate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SAuthendicate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SAuthendicate->EditValue ?>"<?php echo $view_patient_services_list->SAuthendicate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services_list->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SAuthendicate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SAuthendicate->EditValue ?>"<?php echo $view_patient_services_list->SAuthendicate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_SAuthendicate">
<span<?php echo $view_patient_services_list->SAuthendicate->viewAttributes() ?>><?php echo $view_patient_services_list->SAuthendicate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" <?php echo $view_patient_services_list->AuthDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_AuthDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->AuthDate->EditValue ?>"<?php echo $view_patient_services_list->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->AuthDate->ReadOnly && !$view_patient_services_list->AuthDate->Disabled && !isset($view_patient_services_list->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services_list->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_AuthDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->AuthDate->EditValue ?>"<?php echo $view_patient_services_list->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->AuthDate->ReadOnly && !$view_patient_services_list->AuthDate->Disabled && !isset($view_patient_services_list->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_AuthDate">
<span<?php echo $view_patient_services_list->AuthDate->viewAttributes() ?>><?php echo $view_patient_services_list->AuthDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" <?php echo $view_patient_services_list->AuthBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_AuthBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->AuthBy->EditValue ?>"<?php echo $view_patient_services_list->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services_list->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_AuthBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->AuthBy->EditValue ?>"<?php echo $view_patient_services_list->AuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_AuthBy">
<span<?php echo $view_patient_services_list->AuthBy->viewAttributes() ?>><?php echo $view_patient_services_list->AuthBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate" <?php echo $view_patient_services_list->Authencate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Authencate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Authencate->EditValue ?>"<?php echo $view_patient_services_list->Authencate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="o<?php echo $view_patient_services_list->RowIndex ?>_Authencate" id="o<?php echo $view_patient_services_list->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services_list->Authencate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Authencate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Authencate->EditValue ?>"<?php echo $view_patient_services_list->Authencate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Authencate">
<span<?php echo $view_patient_services_list->Authencate->viewAttributes() ?>><?php echo $view_patient_services_list->Authencate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" <?php echo $view_patient_services_list->EditDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_EditDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->EditDate->EditValue ?>"<?php echo $view_patient_services_list->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->EditDate->ReadOnly && !$view_patient_services_list->EditDate->Disabled && !isset($view_patient_services_list->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_EditDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services_list->EditDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_EditDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->EditDate->EditValue ?>"<?php echo $view_patient_services_list->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->EditDate->ReadOnly && !$view_patient_services_list->EditDate->Disabled && !isset($view_patient_services_list->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_EditDate">
<span<?php echo $view_patient_services_list->EditDate->viewAttributes() ?>><?php echo $view_patient_services_list->EditDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy" <?php echo $view_patient_services_list->EditBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_EditBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->EditBy->EditValue ?>"<?php echo $view_patient_services_list->EditBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_EditBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services_list->EditBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_EditBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->EditBy->EditValue ?>"<?php echo $view_patient_services_list->EditBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_EditBy">
<span<?php echo $view_patient_services_list->EditBy->viewAttributes() ?>><?php echo $view_patient_services_list->EditBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Editted->Visible) { // Editted ?>
		<td data-name="Editted" <?php echo $view_patient_services_list->Editted->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Editted" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Editted->EditValue ?>"<?php echo $view_patient_services_list->Editted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="o<?php echo $view_patient_services_list->RowIndex ?>_Editted" id="o<?php echo $view_patient_services_list->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services_list->Editted->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Editted" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Editted->EditValue ?>"<?php echo $view_patient_services_list->Editted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Editted">
<span<?php echo $view_patient_services_list->Editted->viewAttributes() ?>><?php echo $view_patient_services_list->Editted->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $view_patient_services_list->PatID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PatID" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PatID->EditValue ?>"<?php echo $view_patient_services_list->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatID" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services_list->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PatID" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PatID->EditValue ?>"<?php echo $view_patient_services_list->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PatID">
<span<?php echo $view_patient_services_list->PatID->viewAttributes() ?>><?php echo $view_patient_services_list->PatID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_patient_services_list->PatientId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PatientId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PatientId->EditValue ?>"<?php echo $view_patient_services_list->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatientId" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services_list->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PatientId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PatientId->EditValue ?>"<?php echo $view_patient_services_list->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_PatientId">
<span<?php echo $view_patient_services_list->PatientId->viewAttributes() ?>><?php echo $view_patient_services_list->PatientId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_patient_services_list->Mobile->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Mobile" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Mobile->EditValue ?>"<?php echo $view_patient_services_list->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="o<?php echo $view_patient_services_list->RowIndex ?>_Mobile" id="o<?php echo $view_patient_services_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services_list->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Mobile" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Mobile->EditValue ?>"<?php echo $view_patient_services_list->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Mobile">
<span<?php echo $view_patient_services_list->Mobile->viewAttributes() ?>><?php echo $view_patient_services_list->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->CId->Visible) { // CId ?>
		<td data-name="CId" <?php echo $view_patient_services_list->CId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_CId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_list->RowIndex ?>_CId" id="x<?php echo $view_patient_services_list->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->CId->EditValue ?>"<?php echo $view_patient_services_list->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="o<?php echo $view_patient_services_list->RowIndex ?>_CId" id="o<?php echo $view_patient_services_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services_list->CId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_CId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_list->RowIndex ?>_CId" id="x<?php echo $view_patient_services_list->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->CId->EditValue ?>"<?php echo $view_patient_services_list->CId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_CId">
<span<?php echo $view_patient_services_list->CId->viewAttributes() ?>><?php echo $view_patient_services_list->CId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $view_patient_services_list->Order->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Order" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_list->RowIndex ?>_Order" id="x<?php echo $view_patient_services_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Order->EditValue ?>"<?php echo $view_patient_services_list->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="o<?php echo $view_patient_services_list->RowIndex ?>_Order" id="o<?php echo $view_patient_services_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services_list->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Order" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_list->RowIndex ?>_Order" id="x<?php echo $view_patient_services_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Order->EditValue ?>"<?php echo $view_patient_services_list->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Order">
<span<?php echo $view_patient_services_list->Order->viewAttributes() ?>><?php echo $view_patient_services_list->Order->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType" <?php echo $view_patient_services_list->ResType->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ResType" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ResType->EditValue ?>"<?php echo $view_patient_services_list->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResType" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services_list->ResType->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ResType" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ResType->EditValue ?>"<?php echo $view_patient_services_list->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_ResType">
<span<?php echo $view_patient_services_list->ResType->viewAttributes() ?>><?php echo $view_patient_services_list->ResType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample" <?php echo $view_patient_services_list->Sample->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Sample" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services_list->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Sample->EditValue ?>"<?php echo $view_patient_services_list->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="o<?php echo $view_patient_services_list->RowIndex ?>_Sample" id="o<?php echo $view_patient_services_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services_list->Sample->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Sample" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services_list->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Sample->EditValue ?>"<?php echo $view_patient_services_list->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Sample">
<span<?php echo $view_patient_services_list->Sample->viewAttributes() ?>><?php echo $view_patient_services_list->Sample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD" <?php echo $view_patient_services_list->NoD->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_NoD" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->NoD->EditValue ?>"<?php echo $view_patient_services_list->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="o<?php echo $view_patient_services_list->RowIndex ?>_NoD" id="o<?php echo $view_patient_services_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services_list->NoD->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_NoD" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->NoD->EditValue ?>"<?php echo $view_patient_services_list->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_NoD">
<span<?php echo $view_patient_services_list->NoD->viewAttributes() ?>><?php echo $view_patient_services_list->NoD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" <?php echo $view_patient_services_list->BillOrder->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_BillOrder" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->BillOrder->EditValue ?>"<?php echo $view_patient_services_list->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="o<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" id="o<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services_list->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_BillOrder" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->BillOrder->EditValue ?>"<?php echo $view_patient_services_list->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_BillOrder">
<span<?php echo $view_patient_services_list->BillOrder->viewAttributes() ?>><?php echo $view_patient_services_list->BillOrder->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" <?php echo $view_patient_services_list->Inactive->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Inactive" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Inactive->EditValue ?>"<?php echo $view_patient_services_list->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="o<?php echo $view_patient_services_list->RowIndex ?>_Inactive" id="o<?php echo $view_patient_services_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services_list->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Inactive" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Inactive->EditValue ?>"<?php echo $view_patient_services_list->Inactive->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Inactive">
<span<?php echo $view_patient_services_list->Inactive->viewAttributes() ?>><?php echo $view_patient_services_list->Inactive->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" <?php echo $view_patient_services_list->CollSample->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_CollSample" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->CollSample->EditValue ?>"<?php echo $view_patient_services_list->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="o<?php echo $view_patient_services_list->RowIndex ?>_CollSample" id="o<?php echo $view_patient_services_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services_list->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_CollSample" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->CollSample->EditValue ?>"<?php echo $view_patient_services_list->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_CollSample">
<span<?php echo $view_patient_services_list->CollSample->viewAttributes() ?>><?php echo $view_patient_services_list->CollSample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType" <?php echo $view_patient_services_list->TestType->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestType" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->TestType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TestType->EditValue ?>"<?php echo $view_patient_services_list->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestType" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services_list->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestType" class="form-group">
<span<?php echo $view_patient_services_list->TestType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->TestType->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services_list->TestType->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_TestType">
<span<?php echo $view_patient_services_list->TestType->viewAttributes() ?>><?php echo $view_patient_services_list->TestType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" <?php echo $view_patient_services_list->Repeated->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Repeated" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Repeated->EditValue ?>"<?php echo $view_patient_services_list->Repeated->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="o<?php echo $view_patient_services_list->RowIndex ?>_Repeated" id="o<?php echo $view_patient_services_list->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services_list->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Repeated" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Repeated->EditValue ?>"<?php echo $view_patient_services_list->Repeated->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Repeated">
<span<?php echo $view_patient_services_list->Repeated->viewAttributes() ?>><?php echo $view_patient_services_list->Repeated->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy" <?php echo $view_patient_services_list->RepeatedBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RepeatedBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RepeatedBy->EditValue ?>"<?php echo $view_patient_services_list->RepeatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services_list->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RepeatedBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RepeatedBy->EditValue ?>"<?php echo $view_patient_services_list->RepeatedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RepeatedBy">
<span<?php echo $view_patient_services_list->RepeatedBy->viewAttributes() ?>><?php echo $view_patient_services_list->RepeatedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate" <?php echo $view_patient_services_list->RepeatedDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RepeatedDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RepeatedDate->EditValue ?>"<?php echo $view_patient_services_list->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->RepeatedDate->ReadOnly && !$view_patient_services_list->RepeatedDate->Disabled && !isset($view_patient_services_list->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services_list->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RepeatedDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RepeatedDate->EditValue ?>"<?php echo $view_patient_services_list->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->RepeatedDate->ReadOnly && !$view_patient_services_list->RepeatedDate->Disabled && !isset($view_patient_services_list->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RepeatedDate">
<span<?php echo $view_patient_services_list->RepeatedDate->viewAttributes() ?>><?php echo $view_patient_services_list->RepeatedDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID" <?php echo $view_patient_services_list->serviceID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_serviceID" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->serviceID->EditValue ?>"<?php echo $view_patient_services_list->serviceID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="o<?php echo $view_patient_services_list->RowIndex ?>_serviceID" id="o<?php echo $view_patient_services_list->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services_list->serviceID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_serviceID" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->serviceID->EditValue ?>"<?php echo $view_patient_services_list->serviceID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_serviceID">
<span<?php echo $view_patient_services_list->serviceID->viewAttributes() ?>><?php echo $view_patient_services_list->serviceID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type" <?php echo $view_patient_services_list->Service_Type->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Service_Type" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Service_Type->EditValue ?>"<?php echo $view_patient_services_list->Service_Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" id="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services_list->Service_Type->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Service_Type" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Service_Type->EditValue ?>"<?php echo $view_patient_services_list->Service_Type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Service_Type">
<span<?php echo $view_patient_services_list->Service_Type->viewAttributes() ?>><?php echo $view_patient_services_list->Service_Type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department" <?php echo $view_patient_services_list->Service_Department->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Service_Department" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Service_Department->EditValue ?>"<?php echo $view_patient_services_list->Service_Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" id="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services_list->Service_Department->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Service_Department" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Service_Department->EditValue ?>"<?php echo $view_patient_services_list->Service_Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_Service_Department">
<span<?php echo $view_patient_services_list->Service_Department->viewAttributes() ?>><?php echo $view_patient_services_list->Service_Department->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo" <?php echo $view_patient_services_list->RequestNo->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RequestNo" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RequestNo->EditValue ?>"<?php echo $view_patient_services_list->RequestNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="o<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" id="o<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services_list->RequestNo->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RequestNo" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RequestNo->EditValue ?>"<?php echo $view_patient_services_list->RequestNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_list->RowCount ?>_view_patient_services_RequestNo">
<span<?php echo $view_patient_services_list->RequestNo->viewAttributes() ?>><?php echo $view_patient_services_list->RequestNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_services_list->ListOptions->render("body", "right", $view_patient_services_list->RowCount);
?>
	</tr>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD || $view_patient_services->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "load"], function() {
	fview_patient_serviceslist.updateLists(<?php echo $view_patient_services_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_patient_services_list->isGridAdd())
		if (!$view_patient_services_list->Recordset->EOF)
			$view_patient_services_list->Recordset->moveNext();
}
?>
<?php
	if ($view_patient_services_list->isGridAdd() || $view_patient_services_list->isGridEdit()) {
		$view_patient_services_list->RowIndex = '$rowindex$';
		$view_patient_services_list->loadRowValues();

		// Set row properties
		$view_patient_services->resetAttributes();
		$view_patient_services->RowAttrs->merge(["data-rowindex" => $view_patient_services_list->RowIndex, "id" => "r0_view_patient_services", "data-rowtype" => ROWTYPE_ADD]);
		$view_patient_services->RowAttrs->appendClass("ew-template");
		$view_patient_services->RowType = ROWTYPE_ADD;

		// Render row
		$view_patient_services_list->renderRow();

		// Render list options
		$view_patient_services_list->renderListOptions();
		$view_patient_services_list->StartRowCount = 0;
?>
	<tr <?php echo $view_patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_services_list->ListOptions->render("body", "left", $view_patient_services_list->RowIndex);
?>
	<?php if ($view_patient_services_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_view_patient_services_id" class="form-group view_patient_services_id"></span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="o<?php echo $view_patient_services_list->RowIndex ?>_id" id="o<?php echo $view_patient_services_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<span id="el$rowindex$_view_patient_services_Reception" class="form-group view_patient_services_Reception">
<input type="text" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Reception->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Reception->EditValue ?>"<?php echo $view_patient_services_list->Reception->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="o<?php echo $view_patient_services_list->RowIndex ?>_Reception" id="o<?php echo $view_patient_services_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services_list->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<span id="el$rowindex$_view_patient_services_mrnno" class="form-group view_patient_services_mrnno">
<input type="text" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->mrnno->EditValue ?>"<?php echo $view_patient_services_list->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="o<?php echo $view_patient_services_list->RowIndex ?>_mrnno" id="o<?php echo $view_patient_services_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services_list->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_view_patient_services_PatientName" class="form-group view_patient_services_PatientName">
<input type="text" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PatientName->EditValue ?>"<?php echo $view_patient_services_list->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatientName" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services_list->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Age->Visible) { // Age ?>
		<td data-name="Age">
<span id="el$rowindex$_view_patient_services_Age" class="form-group view_patient_services_Age">
<input type="text" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_list->RowIndex ?>_Age" id="x<?php echo $view_patient_services_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Age->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Age->EditValue ?>"<?php echo $view_patient_services_list->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="o<?php echo $view_patient_services_list->RowIndex ?>_Age" id="o<?php echo $view_patient_services_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services_list->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<span id="el$rowindex$_view_patient_services_Gender" class="form-group view_patient_services_Gender">
<input type="text" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Gender->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Gender->EditValue ?>"<?php echo $view_patient_services_list->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="o<?php echo $view_patient_services_list->RowIndex ?>_Gender" id="o<?php echo $view_patient_services_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services_list->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic">
<span id="el$rowindex$_view_patient_services_profilePic" class="form-group view_patient_services_profilePic">
<textarea data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_list->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_list->profilePic->getPlaceHolder()) ?>"<?php echo $view_patient_services_list->profilePic->editAttributes() ?>><?php echo $view_patient_services_list->profilePic->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="o<?php echo $view_patient_services_list->RowIndex ?>_profilePic" id="o<?php echo $view_patient_services_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services_list->profilePic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Services->Visible) { // Services ?>
		<td data-name="Services">
<span id="el$rowindex$_view_patient_services_Services" class="form-group view_patient_services_Services">
<?php
$onchange = $view_patient_services_list->Services->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_patient_services_list->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_list->RowIndex ?>_Services">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services_list->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services_list->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services_list->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services_list->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_list->RowIndex ?>_Services" id="x<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_list->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_patient_serviceslist"], function() {
	fview_patient_serviceslist.createAutoSuggest({"id":"x<?php echo $view_patient_services_list->RowIndex ?>_Services","forceSelect":false});
});
</script>
<?php echo $view_patient_services_list->Services->Lookup->getParamTag($view_patient_services_list, "p_x" . $view_patient_services_list->RowIndex . "_Services") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="o<?php echo $view_patient_services_list->RowIndex ?>_Services" id="o<?php echo $view_patient_services_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_list->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit">
<span id="el$rowindex$_view_patient_services_Unit" class="form-group view_patient_services_Unit">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_list->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_list->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Unit->EditValue ?>"<?php echo $view_patient_services_list->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="o<?php echo $view_patient_services_list->RowIndex ?>_Unit" id="o<?php echo $view_patient_services_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services_list->Unit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->amount->Visible) { // amount ?>
		<td data-name="amount">
<span id="el$rowindex$_view_patient_services_amount" class="form-group view_patient_services_amount">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_list->RowIndex ?>_amount" id="x<?php echo $view_patient_services_list->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services_list->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->amount->EditValue ?>"<?php echo $view_patient_services_list->amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="o<?php echo $view_patient_services_list->RowIndex ?>_amount" id="o<?php echo $view_patient_services_list->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services_list->amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<span id="el$rowindex$_view_patient_services_Quantity" class="form-group view_patient_services_Quantity">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_list->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Quantity->EditValue ?>"<?php echo $view_patient_services_list->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="o<?php echo $view_patient_services_list->RowIndex ?>_Quantity" id="o<?php echo $view_patient_services_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services_list->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory">
<span id="el$rowindex$_view_patient_services_DiscountCategory" class="form-group view_patient_services_DiscountCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services_list->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services_list->DiscountCategory->editAttributes() ?>>
			<?php echo $view_patient_services_list->DiscountCategory->selectOptionListHtml("x{$view_patient_services_list->RowIndex}_DiscountCategory") ?>
		</select>
</div>
<?php echo $view_patient_services_list->DiscountCategory->Lookup->getParamTag($view_patient_services_list, "p_x" . $view_patient_services_list->RowIndex . "_DiscountCategory") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="o<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" id="o<?php echo $view_patient_services_list->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services_list->DiscountCategory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Discount->Visible) { // Discount ?>
		<td data-name="Discount">
<span id="el$rowindex$_view_patient_services_Discount" class="form-group view_patient_services_Discount">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_list->RowIndex ?>_Discount" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_list->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Discount->EditValue ?>"<?php echo $view_patient_services_list->Discount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="o<?php echo $view_patient_services_list->RowIndex ?>_Discount" id="o<?php echo $view_patient_services_list->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services_list->Discount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal">
<span id="el$rowindex$_view_patient_services_SubTotal" class="form-group view_patient_services_SubTotal">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_list->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SubTotal->EditValue ?>"<?php echo $view_patient_services_list->SubTotal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="o<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" id="o<?php echo $view_patient_services_list->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services_list->SubTotal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->description->Visible) { // description ?>
		<td data-name="description">
<span id="el$rowindex$_view_patient_services_description" class="form-group view_patient_services_description">
<textarea data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_list->RowIndex ?>_description" id="x<?php echo $view_patient_services_list->RowIndex ?>_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_list->description->getPlaceHolder()) ?>"<?php echo $view_patient_services_list->description->editAttributes() ?>><?php echo $view_patient_services_list->description->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="o<?php echo $view_patient_services_list->RowIndex ?>_description" id="o<?php echo $view_patient_services_list->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services_list->description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type">
<span id="el$rowindex$_view_patient_services_patient_type" class="form-group view_patient_services_patient_type">
<input type="text" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_list->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->patient_type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->patient_type->EditValue ?>"<?php echo $view_patient_services_list->patient_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="o<?php echo $view_patient_services_list->RowIndex ?>_patient_type" id="o<?php echo $view_patient_services_list->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services_list->patient_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date">
<span id="el$rowindex$_view_patient_services_charged_date" class="form-group view_patient_services_charged_date">
<input type="text" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_list->RowIndex ?>_charged_date" placeholder="<?php echo HtmlEncode($view_patient_services_list->charged_date->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->charged_date->EditValue ?>"<?php echo $view_patient_services_list->charged_date->editAttributes() ?>>
<?php if (!$view_patient_services_list->charged_date->ReadOnly && !$view_patient_services_list->charged_date->Disabled && !isset($view_patient_services_list->charged_date->EditAttrs["readonly"]) && !isset($view_patient_services_list->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="o<?php echo $view_patient_services_list->RowIndex ?>_charged_date" id="o<?php echo $view_patient_services_list->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services_list->charged_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_view_patient_services_status" class="form-group view_patient_services_status">
<input type="text" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_list->RowIndex ?>_status" id="x<?php echo $view_patient_services_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->status->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->status->EditValue ?>"<?php echo $view_patient_services_list->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="o<?php echo $view_patient_services_list->RowIndex ?>_status" id="o<?php echo $view_patient_services_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services_list->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="o<?php echo $view_patient_services_list->RowIndex ?>_createdby" id="o<?php echo $view_patient_services_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services_list->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="o<?php echo $view_patient_services_list->RowIndex ?>_createddatetime" id="o<?php echo $view_patient_services_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services_list->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="o<?php echo $view_patient_services_list->RowIndex ?>_modifiedby" id="o<?php echo $view_patient_services_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services_list->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="o<?php echo $view_patient_services_list->RowIndex ?>_modifieddatetime" id="o<?php echo $view_patient_services_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services_list->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Aid->Visible) { // Aid ?>
		<td data-name="Aid">
<span id="el$rowindex$_view_patient_services_Aid" class="form-group view_patient_services_Aid">
<input type="text" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Aid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Aid->EditValue ?>"<?php echo $view_patient_services_list->Aid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="o<?php echo $view_patient_services_list->RowIndex ?>_Aid" id="o<?php echo $view_patient_services_list->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services_list->Aid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if ($view_patient_services_list->Vid->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<span<?php echo $view_patient_services_list->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_list->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_list->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<input type="text" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Vid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Vid->EditValue ?>"<?php echo $view_patient_services_list->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="o<?php echo $view_patient_services_list->RowIndex ?>_Vid" id="o<?php echo $view_patient_services_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_list->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<span id="el$rowindex$_view_patient_services_DrID" class="form-group view_patient_services_DrID">
<input type="text" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrID->EditValue ?>"<?php echo $view_patient_services_list->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrID" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services_list->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<span id="el$rowindex$_view_patient_services_DrCODE" class="form-group view_patient_services_DrCODE">
<input type="text" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrCODE->EditValue ?>"<?php echo $view_patient_services_list->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services_list->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<span id="el$rowindex$_view_patient_services_DrName" class="form-group view_patient_services_DrName">
<input type="text" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrName->EditValue ?>"<?php echo $view_patient_services_list->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrName" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services_list->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Department->Visible) { // Department ?>
		<td data-name="Department">
<span id="el$rowindex$_view_patient_services_Department" class="form-group view_patient_services_Department">
<input type="text" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Department->EditValue ?>"<?php echo $view_patient_services_list->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="o<?php echo $view_patient_services_list->RowIndex ?>_Department" id="o<?php echo $view_patient_services_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services_list->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres">
<span id="el$rowindex$_view_patient_services_DrSharePres" class="form-group view_patient_services_DrSharePres">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrSharePres->EditValue ?>"<?php echo $view_patient_services_list->DrSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services_list->DrSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres">
<span id="el$rowindex$_view_patient_services_HospSharePres" class="form-group view_patient_services_HospSharePres">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->HospSharePres->EditValue ?>"<?php echo $view_patient_services_list->HospSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services_list->HospSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<span id="el$rowindex$_view_patient_services_DrShareAmount" class="form-group view_patient_services_DrShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareAmount->EditValue ?>"<?php echo $view_patient_services_list->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services_list->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<span id="el$rowindex$_view_patient_services_HospShareAmount" class="form-group view_patient_services_HospShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->HospShareAmount->EditValue ?>"<?php echo $view_patient_services_list->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services_list->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount">
<span id="el$rowindex$_view_patient_services_DrShareSettiledAmount" class="form-group view_patient_services_DrShareSettiledAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services_list->DrShareSettiledAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services_list->DrShareSettiledAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId">
<span id="el$rowindex$_view_patient_services_DrShareSettledId" class="form-group view_patient_services_DrShareSettledId">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services_list->DrShareSettledId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services_list->DrShareSettledId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus">
<span id="el$rowindex$_view_patient_services_DrShareSettiledStatus" class="form-group view_patient_services_DrShareSettiledStatus">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services_list->DrShareSettiledStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $view_patient_services_list->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services_list->DrShareSettiledStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<span id="el$rowindex$_view_patient_services_invoiceId" class="form-group view_patient_services_invoiceId">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->invoiceId->EditValue ?>"<?php echo $view_patient_services_list->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services_list->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount">
<span id="el$rowindex$_view_patient_services_invoiceAmount" class="form-group view_patient_services_invoiceAmount">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->invoiceAmount->EditValue ?>"<?php echo $view_patient_services_list->invoiceAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services_list->invoiceAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus">
<span id="el$rowindex$_view_patient_services_invoiceStatus" class="form-group view_patient_services_invoiceStatus">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->invoiceStatus->EditValue ?>"<?php echo $view_patient_services_list->invoiceStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" id="o<?php echo $view_patient_services_list->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services_list->invoiceStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment">
<span id="el$rowindex$_view_patient_services_modeOfPayment" class="form-group view_patient_services_modeOfPayment">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->modeOfPayment->EditValue ?>"<?php echo $view_patient_services_list->modeOfPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="o<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" id="o<?php echo $view_patient_services_list->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services_list->modeOfPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="o<?php echo $view_patient_services_list->RowIndex ?>_HospID" id="o<?php echo $view_patient_services_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<span id="el$rowindex$_view_patient_services_RIDNO" class="form-group view_patient_services_RIDNO">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RIDNO->EditValue ?>"<?php echo $view_patient_services_list->RIDNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="o<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" id="o<?php echo $view_patient_services_list->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services_list->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<span id="el$rowindex$_view_patient_services_ItemCode" class="form-group view_patient_services_ItemCode">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_list->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ItemCode->EditValue ?>"<?php echo $view_patient_services_list->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="o<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" id="o<?php echo $view_patient_services_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services_list->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<span id="el$rowindex$_view_patient_services_TidNo" class="form-group view_patient_services_TidNo">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TidNo->EditValue ?>"<?php echo $view_patient_services_list->TidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="o<?php echo $view_patient_services_list->RowIndex ?>_TidNo" id="o<?php echo $view_patient_services_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services_list->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->sid->Visible) { // sid ?>
		<td data-name="sid">
<span id="el$rowindex$_view_patient_services_sid" class="form-group view_patient_services_sid">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_list->RowIndex ?>_sid" id="x<?php echo $view_patient_services_list->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services_list->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->sid->EditValue ?>"<?php echo $view_patient_services_list->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="o<?php echo $view_patient_services_list->RowIndex ?>_sid" id="o<?php echo $view_patient_services_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services_list->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el$rowindex$_view_patient_services_TestSubCd" class="form-group view_patient_services_TestSubCd">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TestSubCd->EditValue ?>"<?php echo $view_patient_services_list->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services_list->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<span id="el$rowindex$_view_patient_services_DEptCd" class="form-group view_patient_services_DEptCd">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DEptCd->EditValue ?>"<?php echo $view_patient_services_list->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services_list->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd">
<span id="el$rowindex$_view_patient_services_ProfCd" class="form-group view_patient_services_ProfCd">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ProfCd->EditValue ?>"<?php echo $view_patient_services_list->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="o<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" id="o<?php echo $view_patient_services_list->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services_list->ProfCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Comments->Visible) { // Comments ?>
		<td data-name="Comments">
<span id="el$rowindex$_view_patient_services_Comments" class="form-group view_patient_services_Comments">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Comments->EditValue ?>"<?php echo $view_patient_services_list->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="o<?php echo $view_patient_services_list->RowIndex ?>_Comments" id="o<?php echo $view_patient_services_list->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services_list->Comments->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el$rowindex$_view_patient_services_Method" class="form-group view_patient_services_Method">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_list->RowIndex ?>_Method" id="x<?php echo $view_patient_services_list->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Method->EditValue ?>"<?php echo $view_patient_services_list->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="o<?php echo $view_patient_services_list->RowIndex ?>_Method" id="o<?php echo $view_patient_services_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services_list->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen">
<span id="el$rowindex$_view_patient_services_Specimen" class="form-group view_patient_services_Specimen">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_list->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Specimen->EditValue ?>"<?php echo $view_patient_services_list->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="o<?php echo $view_patient_services_list->RowIndex ?>_Specimen" id="o<?php echo $view_patient_services_list->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services_list->Specimen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal">
<span id="el$rowindex$_view_patient_services_Abnormal" class="form-group view_patient_services_Abnormal">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Abnormal->EditValue ?>"<?php echo $view_patient_services_list->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="o<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" id="o<?php echo $view_patient_services_list->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services_list->Abnormal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<span id="el$rowindex$_view_patient_services_TestUnit" class="form-group view_patient_services_TestUnit">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TestUnit->EditValue ?>"<?php echo $view_patient_services_list->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services_list->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH">
<span id="el$rowindex$_view_patient_services_LOWHIGH" class="form-group view_patient_services_LOWHIGH">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->LOWHIGH->EditValue ?>"<?php echo $view_patient_services_list->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="o<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" id="o<?php echo $view_patient_services_list->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services_list->LOWHIGH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Branch->Visible) { // Branch ?>
		<td data-name="Branch">
<span id="el$rowindex$_view_patient_services_Branch" class="form-group view_patient_services_Branch">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Branch->EditValue ?>"<?php echo $view_patient_services_list->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="o<?php echo $view_patient_services_list->RowIndex ?>_Branch" id="o<?php echo $view_patient_services_list->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services_list->Branch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch">
<span id="el$rowindex$_view_patient_services_Dispatch" class="form-group view_patient_services_Dispatch">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Dispatch->EditValue ?>"<?php echo $view_patient_services_list->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="o<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" id="o<?php echo $view_patient_services_list->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services_list->Dispatch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<span id="el$rowindex$_view_patient_services_Pic1" class="form-group view_patient_services_Pic1">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Pic1->EditValue ?>"<?php echo $view_patient_services_list->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="o<?php echo $view_patient_services_list->RowIndex ?>_Pic1" id="o<?php echo $view_patient_services_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services_list->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<span id="el$rowindex$_view_patient_services_Pic2" class="form-group view_patient_services_Pic2">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_list->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Pic2->EditValue ?>"<?php echo $view_patient_services_list->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="o<?php echo $view_patient_services_list->RowIndex ?>_Pic2" id="o<?php echo $view_patient_services_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services_list->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath">
<span id="el$rowindex$_view_patient_services_GraphPath" class="form-group view_patient_services_GraphPath">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->GraphPath->EditValue ?>"<?php echo $view_patient_services_list->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="o<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" id="o<?php echo $view_patient_services_list->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services_list->GraphPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD">
<span id="el$rowindex$_view_patient_services_MachineCD" class="form-group view_patient_services_MachineCD">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->MachineCD->EditValue ?>"<?php echo $view_patient_services_list->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="o<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" id="o<?php echo $view_patient_services_list->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services_list->MachineCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel">
<span id="el$rowindex$_view_patient_services_TestCancel" class="form-group view_patient_services_TestCancel">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TestCancel->EditValue ?>"<?php echo $view_patient_services_list->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services_list->TestCancel->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource">
<span id="el$rowindex$_view_patient_services_OutSource" class="form-group view_patient_services_OutSource">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_list->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->OutSource->EditValue ?>"<?php echo $view_patient_services_list->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="o<?php echo $view_patient_services_list->RowIndex ?>_OutSource" id="o<?php echo $view_patient_services_list->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services_list->OutSource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Printed->Visible) { // Printed ?>
		<td data-name="Printed">
<span id="el$rowindex$_view_patient_services_Printed" class="form-group view_patient_services_Printed">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_list->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Printed->EditValue ?>"<?php echo $view_patient_services_list->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="o<?php echo $view_patient_services_list->RowIndex ?>_Printed" id="o<?php echo $view_patient_services_list->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services_list->Printed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy">
<span id="el$rowindex$_view_patient_services_PrintBy" class="form-group view_patient_services_PrintBy">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PrintBy->EditValue ?>"<?php echo $view_patient_services_list->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services_list->PrintBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate">
<span id="el$rowindex$_view_patient_services_PrintDate" class="form-group view_patient_services_PrintDate">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PrintDate->EditValue ?>"<?php echo $view_patient_services_list->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->PrintDate->ReadOnly && !$view_patient_services_list->PrintDate->Disabled && !isset($view_patient_services_list->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services_list->PrintDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate">
<span id="el$rowindex$_view_patient_services_BillingDate" class="form-group view_patient_services_BillingDate">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->BillingDate->EditValue ?>"<?php echo $view_patient_services_list->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->BillingDate->ReadOnly && !$view_patient_services_list->BillingDate->Disabled && !isset($view_patient_services_list->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services_list->BillingDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy">
<span id="el$rowindex$_view_patient_services_BilledBy" class="form-group view_patient_services_BilledBy">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->BilledBy->EditValue ?>"<?php echo $view_patient_services_list->BilledBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services_list->BilledBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<span id="el$rowindex$_view_patient_services_Resulted" class="form-group view_patient_services_Resulted">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Resulted->EditValue ?>"<?php echo $view_patient_services_list->Resulted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="o<?php echo $view_patient_services_list->RowIndex ?>_Resulted" id="o<?php echo $view_patient_services_list->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services_list->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<span id="el$rowindex$_view_patient_services_ResultDate" class="form-group view_patient_services_ResultDate">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ResultDate->EditValue ?>"<?php echo $view_patient_services_list->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->ResultDate->ReadOnly && !$view_patient_services_list->ResultDate->Disabled && !isset($view_patient_services_list->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services_list->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<span id="el$rowindex$_view_patient_services_ResultedBy" class="form-group view_patient_services_ResultedBy">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ResultedBy->EditValue ?>"<?php echo $view_patient_services_list->ResultedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services_list->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate">
<span id="el$rowindex$_view_patient_services_SampleDate" class="form-group view_patient_services_SampleDate">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SampleDate->EditValue ?>"<?php echo $view_patient_services_list->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->SampleDate->ReadOnly && !$view_patient_services_list->SampleDate->Disabled && !isset($view_patient_services_list->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services_list->SampleDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser">
<span id="el$rowindex$_view_patient_services_SampleUser" class="form-group view_patient_services_SampleUser">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SampleUser->EditValue ?>"<?php echo $view_patient_services_list->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services_list->SampleUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled">
<span id="el$rowindex$_view_patient_services_Sampled" class="form-group view_patient_services_Sampled">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Sampled->EditValue ?>"<?php echo $view_patient_services_list->Sampled->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="o<?php echo $view_patient_services_list->RowIndex ?>_Sampled" id="o<?php echo $view_patient_services_list->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services_list->Sampled->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate">
<span id="el$rowindex$_view_patient_services_ReceivedDate" class="form-group view_patient_services_ReceivedDate">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ReceivedDate->EditValue ?>"<?php echo $view_patient_services_list->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->ReceivedDate->ReadOnly && !$view_patient_services_list->ReceivedDate->Disabled && !isset($view_patient_services_list->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services_list->ReceivedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser">
<span id="el$rowindex$_view_patient_services_ReceivedUser" class="form-group view_patient_services_ReceivedUser">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ReceivedUser->EditValue ?>"<?php echo $view_patient_services_list->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services_list->ReceivedUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied">
<span id="el$rowindex$_view_patient_services_Recevied" class="form-group view_patient_services_Recevied">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_list->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Recevied->EditValue ?>"<?php echo $view_patient_services_list->Recevied->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="o<?php echo $view_patient_services_list->RowIndex ?>_Recevied" id="o<?php echo $view_patient_services_list->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services_list->Recevied->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate">
<span id="el$rowindex$_view_patient_services_DeptRecvDate" class="form-group view_patient_services_DeptRecvDate">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services_list->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->DeptRecvDate->ReadOnly && !$view_patient_services_list->DeptRecvDate->Disabled && !isset($view_patient_services_list->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services_list->DeptRecvDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser">
<span id="el$rowindex$_view_patient_services_DeptRecvUser" class="form-group view_patient_services_DeptRecvUser">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services_list->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services_list->DeptRecvUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived">
<span id="el$rowindex$_view_patient_services_DeptRecived" class="form-group view_patient_services_DeptRecived">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->DeptRecived->EditValue ?>"<?php echo $view_patient_services_list->DeptRecived->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" id="o<?php echo $view_patient_services_list->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services_list->DeptRecived->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate">
<span id="el$rowindex$_view_patient_services_SAuthDate" class="form-group view_patient_services_SAuthDate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SAuthDate->EditValue ?>"<?php echo $view_patient_services_list->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->SAuthDate->ReadOnly && !$view_patient_services_list->SAuthDate->Disabled && !isset($view_patient_services_list->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services_list->SAuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy">
<span id="el$rowindex$_view_patient_services_SAuthBy" class="form-group view_patient_services_SAuthBy">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SAuthBy->EditValue ?>"<?php echo $view_patient_services_list->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services_list->SAuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate">
<span id="el$rowindex$_view_patient_services_SAuthendicate" class="form-group view_patient_services_SAuthendicate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->SAuthendicate->EditValue ?>"<?php echo $view_patient_services_list->SAuthendicate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" id="o<?php echo $view_patient_services_list->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services_list->SAuthendicate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate">
<span id="el$rowindex$_view_patient_services_AuthDate" class="form-group view_patient_services_AuthDate">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->AuthDate->EditValue ?>"<?php echo $view_patient_services_list->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->AuthDate->ReadOnly && !$view_patient_services_list->AuthDate->Disabled && !isset($view_patient_services_list->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services_list->AuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy">
<span id="el$rowindex$_view_patient_services_AuthBy" class="form-group view_patient_services_AuthBy">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->AuthBy->EditValue ?>"<?php echo $view_patient_services_list->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services_list->AuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate">
<span id="el$rowindex$_view_patient_services_Authencate" class="form-group view_patient_services_Authencate">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_list->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Authencate->EditValue ?>"<?php echo $view_patient_services_list->Authencate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="o<?php echo $view_patient_services_list->RowIndex ?>_Authencate" id="o<?php echo $view_patient_services_list->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services_list->Authencate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate">
<span id="el$rowindex$_view_patient_services_EditDate" class="form-group view_patient_services_EditDate">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->EditDate->EditValue ?>"<?php echo $view_patient_services_list->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->EditDate->ReadOnly && !$view_patient_services_list->EditDate->Disabled && !isset($view_patient_services_list->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_EditDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services_list->EditDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy">
<span id="el$rowindex$_view_patient_services_EditBy" class="form-group view_patient_services_EditBy">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->EditBy->EditValue ?>"<?php echo $view_patient_services_list->EditBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_EditBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services_list->EditBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Editted->Visible) { // Editted ?>
		<td data-name="Editted">
<span id="el$rowindex$_view_patient_services_Editted" class="form-group view_patient_services_Editted">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_list->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Editted->EditValue ?>"<?php echo $view_patient_services_list->Editted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="o<?php echo $view_patient_services_list->RowIndex ?>_Editted" id="o<?php echo $view_patient_services_list->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services_list->Editted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<span id="el$rowindex$_view_patient_services_PatID" class="form-group view_patient_services_PatID">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PatID->EditValue ?>"<?php echo $view_patient_services_list->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatID" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services_list->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<span id="el$rowindex$_view_patient_services_PatientId" class="form-group view_patient_services_PatientId">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->PatientId->EditValue ?>"<?php echo $view_patient_services_list->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="o<?php echo $view_patient_services_list->RowIndex ?>_PatientId" id="o<?php echo $view_patient_services_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services_list->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<span id="el$rowindex$_view_patient_services_Mobile" class="form-group view_patient_services_Mobile">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Mobile->EditValue ?>"<?php echo $view_patient_services_list->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="o<?php echo $view_patient_services_list->RowIndex ?>_Mobile" id="o<?php echo $view_patient_services_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services_list->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->CId->Visible) { // CId ?>
		<td data-name="CId">
<span id="el$rowindex$_view_patient_services_CId" class="form-group view_patient_services_CId">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_list->RowIndex ?>_CId" id="x<?php echo $view_patient_services_list->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->CId->EditValue ?>"<?php echo $view_patient_services_list->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="o<?php echo $view_patient_services_list->RowIndex ?>_CId" id="o<?php echo $view_patient_services_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services_list->CId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el$rowindex$_view_patient_services_Order" class="form-group view_patient_services_Order">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_list->RowIndex ?>_Order" id="x<?php echo $view_patient_services_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Order->EditValue ?>"<?php echo $view_patient_services_list->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="o<?php echo $view_patient_services_list->RowIndex ?>_Order" id="o<?php echo $view_patient_services_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services_list->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<span id="el$rowindex$_view_patient_services_ResType" class="form-group view_patient_services_ResType">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_list->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->ResType->EditValue ?>"<?php echo $view_patient_services_list->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="o<?php echo $view_patient_services_list->RowIndex ?>_ResType" id="o<?php echo $view_patient_services_list->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services_list->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<span id="el$rowindex$_view_patient_services_Sample" class="form-group view_patient_services_Sample">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_list->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services_list->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Sample->EditValue ?>"<?php echo $view_patient_services_list->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="o<?php echo $view_patient_services_list->RowIndex ?>_Sample" id="o<?php echo $view_patient_services_list->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services_list->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<span id="el$rowindex$_view_patient_services_NoD" class="form-group view_patient_services_NoD">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_list->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->NoD->EditValue ?>"<?php echo $view_patient_services_list->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="o<?php echo $view_patient_services_list->RowIndex ?>_NoD" id="o<?php echo $view_patient_services_list->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services_list->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<span id="el$rowindex$_view_patient_services_BillOrder" class="form-group view_patient_services_BillOrder">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->BillOrder->EditValue ?>"<?php echo $view_patient_services_list->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="o<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" id="o<?php echo $view_patient_services_list->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services_list->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<span id="el$rowindex$_view_patient_services_Inactive" class="form-group view_patient_services_Inactive">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_list->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Inactive->EditValue ?>"<?php echo $view_patient_services_list->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="o<?php echo $view_patient_services_list->RowIndex ?>_Inactive" id="o<?php echo $view_patient_services_list->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services_list->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<span id="el$rowindex$_view_patient_services_CollSample" class="form-group view_patient_services_CollSample">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_list->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->CollSample->EditValue ?>"<?php echo $view_patient_services_list->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="o<?php echo $view_patient_services_list->RowIndex ?>_CollSample" id="o<?php echo $view_patient_services_list->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services_list->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el$rowindex$_view_patient_services_TestType" class="form-group view_patient_services_TestType">
<input type="text" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->TestType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->TestType->EditValue ?>"<?php echo $view_patient_services_list->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="o<?php echo $view_patient_services_list->RowIndex ?>_TestType" id="o<?php echo $view_patient_services_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services_list->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<span id="el$rowindex$_view_patient_services_Repeated" class="form-group view_patient_services_Repeated">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_list->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Repeated->EditValue ?>"<?php echo $view_patient_services_list->Repeated->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="o<?php echo $view_patient_services_list->RowIndex ?>_Repeated" id="o<?php echo $view_patient_services_list->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services_list->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy">
<span id="el$rowindex$_view_patient_services_RepeatedBy" class="form-group view_patient_services_RepeatedBy">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RepeatedBy->EditValue ?>"<?php echo $view_patient_services_list->RepeatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" id="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services_list->RepeatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate">
<span id="el$rowindex$_view_patient_services_RepeatedDate" class="form-group view_patient_services_RepeatedDate">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services_list->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RepeatedDate->EditValue ?>"<?php echo $view_patient_services_list->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services_list->RepeatedDate->ReadOnly && !$view_patient_services_list->RepeatedDate->Disabled && !isset($view_patient_services_list->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services_list->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_serviceslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_serviceslist", "x<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" id="o<?php echo $view_patient_services_list->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services_list->RepeatedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID">
<span id="el$rowindex$_view_patient_services_serviceID" class="form-group view_patient_services_serviceID">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_list->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->serviceID->EditValue ?>"<?php echo $view_patient_services_list->serviceID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="o<?php echo $view_patient_services_list->RowIndex ?>_serviceID" id="o<?php echo $view_patient_services_list->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services_list->serviceID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type">
<span id="el$rowindex$_view_patient_services_Service_Type" class="form-group view_patient_services_Service_Type">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Service_Type->EditValue ?>"<?php echo $view_patient_services_list->Service_Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" id="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services_list->Service_Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department">
<span id="el$rowindex$_view_patient_services_Service_Department" class="form-group view_patient_services_Service_Department">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_list->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->Service_Department->EditValue ?>"<?php echo $view_patient_services_list->Service_Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" id="o<?php echo $view_patient_services_list->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services_list->Service_Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_list->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo">
<span id="el$rowindex$_view_patient_services_RequestNo" class="form-group view_patient_services_RequestNo">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_list->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_list->RequestNo->EditValue ?>"<?php echo $view_patient_services_list->RequestNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="o<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" id="o<?php echo $view_patient_services_list->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services_list->RequestNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_services_list->ListOptions->render("body", "right", $view_patient_services_list->RowIndex);
?>
<script>
loadjs.ready(["fview_patient_serviceslist", "load"], function() {
	fview_patient_serviceslist.updateLists(<?php echo $view_patient_services_list->RowIndex ?>);
});
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
<?php if ($view_patient_services_list->TotalRecords > 0 && !$view_patient_services_list->isGridAdd() && !$view_patient_services_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_patient_services_list->renderListOptions();

// Render list options (footer, left)
$view_patient_services_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_patient_services_list->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_patient_services_list->id->footerCellClass() ?>"><span id="elf_view_patient_services_id" class="view_patient_services_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" class="<?php echo $view_patient_services_list->Reception->footerCellClass() ?>"><span id="elf_view_patient_services_Reception" class="view_patient_services_Reception">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" class="<?php echo $view_patient_services_list->mrnno->footerCellClass() ?>"><span id="elf_view_patient_services_mrnno" class="view_patient_services_mrnno">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_patient_services_list->PatientName->footerCellClass() ?>"><span id="elf_view_patient_services_PatientName" class="view_patient_services_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Age->Visible) { // Age ?>
		<td data-name="Age" class="<?php echo $view_patient_services_list->Age->footerCellClass() ?>"><span id="elf_view_patient_services_Age" class="view_patient_services_Age">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" class="<?php echo $view_patient_services_list->Gender->footerCellClass() ?>"><span id="elf_view_patient_services_Gender" class="view_patient_services_Gender">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" class="<?php echo $view_patient_services_list->profilePic->footerCellClass() ?>"><span id="elf_view_patient_services_profilePic" class="view_patient_services_profilePic">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Services->Visible) { // Services ?>
		<td data-name="Services" class="<?php echo $view_patient_services_list->Services->footerCellClass() ?>"><span id="elf_view_patient_services_Services" class="view_patient_services_Services">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit" class="<?php echo $view_patient_services_list->Unit->footerCellClass() ?>"><span id="elf_view_patient_services_Unit" class="view_patient_services_Unit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->amount->Visible) { // amount ?>
		<td data-name="amount" class="<?php echo $view_patient_services_list->amount->footerCellClass() ?>"><span id="elf_view_patient_services_amount" class="view_patient_services_amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_patient_services_list->amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $view_patient_services_list->Quantity->footerCellClass() ?>"><span id="elf_view_patient_services_Quantity" class="view_patient_services_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory" class="<?php echo $view_patient_services_list->DiscountCategory->footerCellClass() ?>"><span id="elf_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Discount->Visible) { // Discount ?>
		<td data-name="Discount" class="<?php echo $view_patient_services_list->Discount->footerCellClass() ?>"><span id="elf_view_patient_services_Discount" class="view_patient_services_Discount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" class="<?php echo $view_patient_services_list->SubTotal->footerCellClass() ?>"><span id="elf_view_patient_services_SubTotal" class="view_patient_services_SubTotal">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_patient_services_list->SubTotal->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->description->Visible) { // description ?>
		<td data-name="description" class="<?php echo $view_patient_services_list->description->footerCellClass() ?>"><span id="elf_view_patient_services_description" class="view_patient_services_description">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" class="<?php echo $view_patient_services_list->patient_type->footerCellClass() ?>"><span id="elf_view_patient_services_patient_type" class="view_patient_services_patient_type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" class="<?php echo $view_patient_services_list->charged_date->footerCellClass() ?>"><span id="elf_view_patient_services_charged_date" class="view_patient_services_charged_date">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->status->Visible) { // status ?>
		<td data-name="status" class="<?php echo $view_patient_services_list->status->footerCellClass() ?>"><span id="elf_view_patient_services_status" class="view_patient_services_status">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $view_patient_services_list->createdby->footerCellClass() ?>"><span id="elf_view_patient_services_createdby" class="view_patient_services_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_patient_services_list->createddatetime->footerCellClass() ?>"><span id="elf_view_patient_services_createddatetime" class="view_patient_services_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" class="<?php echo $view_patient_services_list->modifiedby->footerCellClass() ?>"><span id="elf_view_patient_services_modifiedby" class="view_patient_services_modifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" class="<?php echo $view_patient_services_list->modifieddatetime->footerCellClass() ?>"><span id="elf_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Aid->Visible) { // Aid ?>
		<td data-name="Aid" class="<?php echo $view_patient_services_list->Aid->footerCellClass() ?>"><span id="elf_view_patient_services_Aid" class="view_patient_services_Aid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Vid->Visible) { // Vid ?>
		<td data-name="Vid" class="<?php echo $view_patient_services_list->Vid->footerCellClass() ?>"><span id="elf_view_patient_services_Vid" class="view_patient_services_Vid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID" class="<?php echo $view_patient_services_list->DrID->footerCellClass() ?>"><span id="elf_view_patient_services_DrID" class="view_patient_services_DrID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" class="<?php echo $view_patient_services_list->DrCODE->footerCellClass() ?>"><span id="elf_view_patient_services_DrCODE" class="view_patient_services_DrCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName" class="<?php echo $view_patient_services_list->DrName->footerCellClass() ?>"><span id="elf_view_patient_services_DrName" class="view_patient_services_DrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Department->Visible) { // Department ?>
		<td data-name="Department" class="<?php echo $view_patient_services_list->Department->footerCellClass() ?>"><span id="elf_view_patient_services_Department" class="view_patient_services_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres" class="<?php echo $view_patient_services_list->DrSharePres->footerCellClass() ?>"><span id="elf_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres" class="<?php echo $view_patient_services_list->HospSharePres->footerCellClass() ?>"><span id="elf_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" class="<?php echo $view_patient_services_list->DrShareAmount->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" class="<?php echo $view_patient_services_list->HospShareAmount->footerCellClass() ?>"><span id="elf_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services_list->DrShareSettiledAmount->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId" class="<?php echo $view_patient_services_list->DrShareSettledId->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services_list->DrShareSettiledStatus->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" class="<?php echo $view_patient_services_list->invoiceId->footerCellClass() ?>"><span id="elf_view_patient_services_invoiceId" class="view_patient_services_invoiceId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" class="<?php echo $view_patient_services_list->invoiceAmount->footerCellClass() ?>"><span id="elf_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" class="<?php echo $view_patient_services_list->invoiceStatus->footerCellClass() ?>"><span id="elf_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" class="<?php echo $view_patient_services_list->modeOfPayment->footerCellClass() ?>"><span id="elf_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_patient_services_list->HospID->footerCellClass() ?>"><span id="elf_view_patient_services_HospID" class="view_patient_services_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" class="<?php echo $view_patient_services_list->RIDNO->footerCellClass() ?>"><span id="elf_view_patient_services_RIDNO" class="view_patient_services_RIDNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" class="<?php echo $view_patient_services_list->ItemCode->footerCellClass() ?>"><span id="elf_view_patient_services_ItemCode" class="view_patient_services_ItemCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" class="<?php echo $view_patient_services_list->TidNo->footerCellClass() ?>"><span id="elf_view_patient_services_TidNo" class="view_patient_services_TidNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->sid->Visible) { // sid ?>
		<td data-name="sid" class="<?php echo $view_patient_services_list->sid->footerCellClass() ?>"><span id="elf_view_patient_services_sid" class="view_patient_services_sid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" class="<?php echo $view_patient_services_list->TestSubCd->footerCellClass() ?>"><span id="elf_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" class="<?php echo $view_patient_services_list->DEptCd->footerCellClass() ?>"><span id="elf_view_patient_services_DEptCd" class="view_patient_services_DEptCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" class="<?php echo $view_patient_services_list->ProfCd->footerCellClass() ?>"><span id="elf_view_patient_services_ProfCd" class="view_patient_services_ProfCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Comments->Visible) { // Comments ?>
		<td data-name="Comments" class="<?php echo $view_patient_services_list->Comments->footerCellClass() ?>"><span id="elf_view_patient_services_Comments" class="view_patient_services_Comments">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Method->Visible) { // Method ?>
		<td data-name="Method" class="<?php echo $view_patient_services_list->Method->footerCellClass() ?>"><span id="elf_view_patient_services_Method" class="view_patient_services_Method">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" class="<?php echo $view_patient_services_list->Specimen->footerCellClass() ?>"><span id="elf_view_patient_services_Specimen" class="view_patient_services_Specimen">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" class="<?php echo $view_patient_services_list->Abnormal->footerCellClass() ?>"><span id="elf_view_patient_services_Abnormal" class="view_patient_services_Abnormal">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" class="<?php echo $view_patient_services_list->TestUnit->footerCellClass() ?>"><span id="elf_view_patient_services_TestUnit" class="view_patient_services_TestUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" class="<?php echo $view_patient_services_list->LOWHIGH->footerCellClass() ?>"><span id="elf_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Branch->Visible) { // Branch ?>
		<td data-name="Branch" class="<?php echo $view_patient_services_list->Branch->footerCellClass() ?>"><span id="elf_view_patient_services_Branch" class="view_patient_services_Branch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" class="<?php echo $view_patient_services_list->Dispatch->footerCellClass() ?>"><span id="elf_view_patient_services_Dispatch" class="view_patient_services_Dispatch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" class="<?php echo $view_patient_services_list->Pic1->footerCellClass() ?>"><span id="elf_view_patient_services_Pic1" class="view_patient_services_Pic1">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" class="<?php echo $view_patient_services_list->Pic2->footerCellClass() ?>"><span id="elf_view_patient_services_Pic2" class="view_patient_services_Pic2">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" class="<?php echo $view_patient_services_list->GraphPath->footerCellClass() ?>"><span id="elf_view_patient_services_GraphPath" class="view_patient_services_GraphPath">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" class="<?php echo $view_patient_services_list->MachineCD->footerCellClass() ?>"><span id="elf_view_patient_services_MachineCD" class="view_patient_services_MachineCD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" class="<?php echo $view_patient_services_list->TestCancel->footerCellClass() ?>"><span id="elf_view_patient_services_TestCancel" class="view_patient_services_TestCancel">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" class="<?php echo $view_patient_services_list->OutSource->footerCellClass() ?>"><span id="elf_view_patient_services_OutSource" class="view_patient_services_OutSource">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Printed->Visible) { // Printed ?>
		<td data-name="Printed" class="<?php echo $view_patient_services_list->Printed->footerCellClass() ?>"><span id="elf_view_patient_services_Printed" class="view_patient_services_Printed">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" class="<?php echo $view_patient_services_list->PrintBy->footerCellClass() ?>"><span id="elf_view_patient_services_PrintBy" class="view_patient_services_PrintBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" class="<?php echo $view_patient_services_list->PrintDate->footerCellClass() ?>"><span id="elf_view_patient_services_PrintDate" class="view_patient_services_PrintDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate" class="<?php echo $view_patient_services_list->BillingDate->footerCellClass() ?>"><span id="elf_view_patient_services_BillingDate" class="view_patient_services_BillingDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy" class="<?php echo $view_patient_services_list->BilledBy->footerCellClass() ?>"><span id="elf_view_patient_services_BilledBy" class="view_patient_services_BilledBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" class="<?php echo $view_patient_services_list->Resulted->footerCellClass() ?>"><span id="elf_view_patient_services_Resulted" class="view_patient_services_Resulted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" class="<?php echo $view_patient_services_list->ResultDate->footerCellClass() ?>"><span id="elf_view_patient_services_ResultDate" class="view_patient_services_ResultDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" class="<?php echo $view_patient_services_list->ResultedBy->footerCellClass() ?>"><span id="elf_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" class="<?php echo $view_patient_services_list->SampleDate->footerCellClass() ?>"><span id="elf_view_patient_services_SampleDate" class="view_patient_services_SampleDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" class="<?php echo $view_patient_services_list->SampleUser->footerCellClass() ?>"><span id="elf_view_patient_services_SampleUser" class="view_patient_services_SampleUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled" class="<?php echo $view_patient_services_list->Sampled->footerCellClass() ?>"><span id="elf_view_patient_services_Sampled" class="view_patient_services_Sampled">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" class="<?php echo $view_patient_services_list->ReceivedDate->footerCellClass() ?>"><span id="elf_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" class="<?php echo $view_patient_services_list->ReceivedUser->footerCellClass() ?>"><span id="elf_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied" class="<?php echo $view_patient_services_list->Recevied->footerCellClass() ?>"><span id="elf_view_patient_services_Recevied" class="view_patient_services_Recevied">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" class="<?php echo $view_patient_services_list->DeptRecvDate->footerCellClass() ?>"><span id="elf_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" class="<?php echo $view_patient_services_list->DeptRecvUser->footerCellClass() ?>"><span id="elf_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived" class="<?php echo $view_patient_services_list->DeptRecived->footerCellClass() ?>"><span id="elf_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" class="<?php echo $view_patient_services_list->SAuthDate->footerCellClass() ?>"><span id="elf_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" class="<?php echo $view_patient_services_list->SAuthBy->footerCellClass() ?>"><span id="elf_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate" class="<?php echo $view_patient_services_list->SAuthendicate->footerCellClass() ?>"><span id="elf_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" class="<?php echo $view_patient_services_list->AuthDate->footerCellClass() ?>"><span id="elf_view_patient_services_AuthDate" class="view_patient_services_AuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" class="<?php echo $view_patient_services_list->AuthBy->footerCellClass() ?>"><span id="elf_view_patient_services_AuthBy" class="view_patient_services_AuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate" class="<?php echo $view_patient_services_list->Authencate->footerCellClass() ?>"><span id="elf_view_patient_services_Authencate" class="view_patient_services_Authencate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" class="<?php echo $view_patient_services_list->EditDate->footerCellClass() ?>"><span id="elf_view_patient_services_EditDate" class="view_patient_services_EditDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy" class="<?php echo $view_patient_services_list->EditBy->footerCellClass() ?>"><span id="elf_view_patient_services_EditBy" class="view_patient_services_EditBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Editted->Visible) { // Editted ?>
		<td data-name="Editted" class="<?php echo $view_patient_services_list->Editted->footerCellClass() ?>"><span id="elf_view_patient_services_Editted" class="view_patient_services_Editted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" class="<?php echo $view_patient_services_list->PatID->footerCellClass() ?>"><span id="elf_view_patient_services_PatID" class="view_patient_services_PatID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $view_patient_services_list->PatientId->footerCellClass() ?>"><span id="elf_view_patient_services_PatientId" class="view_patient_services_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $view_patient_services_list->Mobile->footerCellClass() ?>"><span id="elf_view_patient_services_Mobile" class="view_patient_services_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->CId->Visible) { // CId ?>
		<td data-name="CId" class="<?php echo $view_patient_services_list->CId->footerCellClass() ?>"><span id="elf_view_patient_services_CId" class="view_patient_services_CId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Order->Visible) { // Order ?>
		<td data-name="Order" class="<?php echo $view_patient_services_list->Order->footerCellClass() ?>"><span id="elf_view_patient_services_Order" class="view_patient_services_Order">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType" class="<?php echo $view_patient_services_list->ResType->footerCellClass() ?>"><span id="elf_view_patient_services_ResType" class="view_patient_services_ResType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample" class="<?php echo $view_patient_services_list->Sample->footerCellClass() ?>"><span id="elf_view_patient_services_Sample" class="view_patient_services_Sample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD" class="<?php echo $view_patient_services_list->NoD->footerCellClass() ?>"><span id="elf_view_patient_services_NoD" class="view_patient_services_NoD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" class="<?php echo $view_patient_services_list->BillOrder->footerCellClass() ?>"><span id="elf_view_patient_services_BillOrder" class="view_patient_services_BillOrder">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" class="<?php echo $view_patient_services_list->Inactive->footerCellClass() ?>"><span id="elf_view_patient_services_Inactive" class="view_patient_services_Inactive">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" class="<?php echo $view_patient_services_list->CollSample->footerCellClass() ?>"><span id="elf_view_patient_services_CollSample" class="view_patient_services_CollSample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType" class="<?php echo $view_patient_services_list->TestType->footerCellClass() ?>"><span id="elf_view_patient_services_TestType" class="view_patient_services_TestType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" class="<?php echo $view_patient_services_list->Repeated->footerCellClass() ?>"><span id="elf_view_patient_services_Repeated" class="view_patient_services_Repeated">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy" class="<?php echo $view_patient_services_list->RepeatedBy->footerCellClass() ?>"><span id="elf_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate" class="<?php echo $view_patient_services_list->RepeatedDate->footerCellClass() ?>"><span id="elf_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID" class="<?php echo $view_patient_services_list->serviceID->footerCellClass() ?>"><span id="elf_view_patient_services_serviceID" class="view_patient_services_serviceID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type" class="<?php echo $view_patient_services_list->Service_Type->footerCellClass() ?>"><span id="elf_view_patient_services_Service_Type" class="view_patient_services_Service_Type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department" class="<?php echo $view_patient_services_list->Service_Department->footerCellClass() ?>"><span id="elf_view_patient_services_Service_Department" class="view_patient_services_Service_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_list->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo" class="<?php echo $view_patient_services_list->RequestNo->footerCellClass() ?>"><span id="elf_view_patient_services_RequestNo" class="view_patient_services_RequestNo">
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
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_patient_services_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $view_patient_services_list->FormKeyCountName ?>" id="<?php echo $view_patient_services_list->FormKeyCountName ?>" value="<?php echo $view_patient_services_list->KeyCount ?>">
<?php echo $view_patient_services_list->MultiSelectKey ?>
<?php } ?>
<?php if ($view_patient_services_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_patient_services_list->FormKeyCountName ?>" id="<?php echo $view_patient_services_list->FormKeyCountName ?>" value="<?php echo $view_patient_services_list->KeyCount ?>">
<?php echo $view_patient_services_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_patient_services->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_patient_services_list->Recordset)
	$view_patient_services_list->Recordset->Close();
?>
<?php if (!$view_patient_services_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_patient_services_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_patient_services_list->Pager->render() ?>
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
<?php if ($view_patient_services_list->TotalRecords == 0 && !$view_patient_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_patient_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_patient_services_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_patient_services_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function addtotalSum(){for(var e=0,t=1;t<40;t++)try{var n=document.getElementById("x"+t+"_SubTotal");""!=n.value&&(e=parseInt(e)+parseInt(n.value))}catch(e){}document.getElementById("x_Amount").value=e}var HospitalIDDD="<?php echo HospitalID(); ?>",grpButton='<input type="hidden" id="HospitalIDDD" name="HospitalIDDD" value="'+HospitalIDDD+'">',searchfrm=document.getElementById("tbl_view_patient_servicesgrid"),node=document.createElement("div");node.innerHTML=grpButton,searchfrm.appendChild(node);
});
</script>
<?php if (!$view_patient_services->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_patient_services",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_patient_services_list->terminate();
?>