<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_services_grid))
	$patient_services_grid = new patient_services_grid();

// Run the page
$patient_services_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_services_grid->Page_Render();
?>
<?php if (!$patient_services_grid->isExport()) { ?>
<script>
var fpatient_servicesgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_servicesgrid = new ew.Form("fpatient_servicesgrid", "grid");
	fpatient_servicesgrid.formKeyCountName = '<?php echo $patient_services_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_servicesgrid.validate = function() {
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
			<?php if ($patient_services_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->id->caption(), $patient_services_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Reception->caption(), $patient_services_grid->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Services->Required) { ?>
				elm = this.getElements("x" + infix + "_Services");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Services->caption(), $patient_services_grid->Services->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->amount->caption(), $patient_services_grid->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->amount->errorMessage()) ?>");
			<?php if ($patient_services_grid->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->description->caption(), $patient_services_grid->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->patient_type->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->patient_type->caption(), $patient_services_grid->patient_type->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->patient_type->errorMessage()) ?>");
			<?php if ($patient_services_grid->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->charged_date->caption(), $patient_services_grid->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->status->caption(), $patient_services_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->mrnno->caption(), $patient_services_grid->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->PatientName->caption(), $patient_services_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Age->caption(), $patient_services_grid->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Gender->caption(), $patient_services_grid->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Unit->caption(), $patient_services_grid->Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->Unit->errorMessage()) ?>");
			<?php if ($patient_services_grid->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Quantity->caption(), $patient_services_grid->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->Quantity->errorMessage()) ?>");
			<?php if ($patient_services_grid->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Discount->caption(), $patient_services_grid->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->Discount->errorMessage()) ?>");
			<?php if ($patient_services_grid->SubTotal->Required) { ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->SubTotal->caption(), $patient_services_grid->SubTotal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->SubTotal->errorMessage()) ?>");
			<?php if ($patient_services_grid->ServiceSelect->Required) { ?>
				elm = this.getElements("x" + infix + "_ServiceSelect[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->ServiceSelect->caption(), $patient_services_grid->ServiceSelect->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Aid->Required) { ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Aid->caption(), $patient_services_grid->Aid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->Aid->errorMessage()) ?>");
			<?php if ($patient_services_grid->Vid->Required) { ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Vid->caption(), $patient_services_grid->Vid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->Vid->errorMessage()) ?>");
			<?php if ($patient_services_grid->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DrID->caption(), $patient_services_grid->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->DrID->errorMessage()) ?>");
			<?php if ($patient_services_grid->DrCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_DrCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DrCODE->caption(), $patient_services_grid->DrCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->DrName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DrName->caption(), $patient_services_grid->DrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Department->caption(), $patient_services_grid->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->DrSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DrSharePres->caption(), $patient_services_grid->DrSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->DrSharePres->errorMessage()) ?>");
			<?php if ($patient_services_grid->HospSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->HospSharePres->caption(), $patient_services_grid->HospSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->HospSharePres->errorMessage()) ?>");
			<?php if ($patient_services_grid->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DrShareAmount->caption(), $patient_services_grid->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->DrShareAmount->errorMessage()) ?>");
			<?php if ($patient_services_grid->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->HospShareAmount->caption(), $patient_services_grid->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->HospShareAmount->errorMessage()) ?>");
			<?php if ($patient_services_grid->DrShareSettiledAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DrShareSettiledAmount->caption(), $patient_services_grid->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->DrShareSettiledAmount->errorMessage()) ?>");
			<?php if ($patient_services_grid->DrShareSettledId->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DrShareSettledId->caption(), $patient_services_grid->DrShareSettledId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->DrShareSettledId->errorMessage()) ?>");
			<?php if ($patient_services_grid->DrShareSettiledStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DrShareSettiledStatus->caption(), $patient_services_grid->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->DrShareSettiledStatus->errorMessage()) ?>");
			<?php if ($patient_services_grid->invoiceId->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->invoiceId->caption(), $patient_services_grid->invoiceId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->invoiceId->errorMessage()) ?>");
			<?php if ($patient_services_grid->invoiceAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->invoiceAmount->caption(), $patient_services_grid->invoiceAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->invoiceAmount->errorMessage()) ?>");
			<?php if ($patient_services_grid->invoiceStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->invoiceStatus->caption(), $patient_services_grid->invoiceStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->modeOfPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_modeOfPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->modeOfPayment->caption(), $patient_services_grid->modeOfPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->HospID->caption(), $patient_services_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->RIDNO->caption(), $patient_services_grid->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->TidNo->caption(), $patient_services_grid->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->DiscountCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DiscountCategory->caption(), $patient_services_grid->DiscountCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->sid->Required) { ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->sid->caption(), $patient_services_grid->sid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->sid->errorMessage()) ?>");
			<?php if ($patient_services_grid->ItemCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->ItemCode->caption(), $patient_services_grid->ItemCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->TestSubCd->caption(), $patient_services_grid->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->DEptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DEptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DEptCd->caption(), $patient_services_grid->DEptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->ProfCd->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->ProfCd->caption(), $patient_services_grid->ProfCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Comments->Required) { ?>
				elm = this.getElements("x" + infix + "_Comments");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Comments->caption(), $patient_services_grid->Comments->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Method->caption(), $patient_services_grid->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Specimen->Required) { ?>
				elm = this.getElements("x" + infix + "_Specimen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Specimen->caption(), $patient_services_grid->Specimen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Abnormal->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Abnormal->caption(), $patient_services_grid->Abnormal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->TestUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_TestUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->TestUnit->caption(), $patient_services_grid->TestUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->LOWHIGH->Required) { ?>
				elm = this.getElements("x" + infix + "_LOWHIGH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->LOWHIGH->caption(), $patient_services_grid->LOWHIGH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Branch->Required) { ?>
				elm = this.getElements("x" + infix + "_Branch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Branch->caption(), $patient_services_grid->Branch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Dispatch->Required) { ?>
				elm = this.getElements("x" + infix + "_Dispatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Dispatch->caption(), $patient_services_grid->Dispatch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Pic1->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Pic1->caption(), $patient_services_grid->Pic1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Pic2->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Pic2->caption(), $patient_services_grid->Pic2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->GraphPath->Required) { ?>
				elm = this.getElements("x" + infix + "_GraphPath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->GraphPath->caption(), $patient_services_grid->GraphPath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->MachineCD->Required) { ?>
				elm = this.getElements("x" + infix + "_MachineCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->MachineCD->caption(), $patient_services_grid->MachineCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->TestCancel->Required) { ?>
				elm = this.getElements("x" + infix + "_TestCancel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->TestCancel->caption(), $patient_services_grid->TestCancel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->OutSource->Required) { ?>
				elm = this.getElements("x" + infix + "_OutSource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->OutSource->caption(), $patient_services_grid->OutSource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Printed->Required) { ?>
				elm = this.getElements("x" + infix + "_Printed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Printed->caption(), $patient_services_grid->Printed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->PrintBy->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->PrintBy->caption(), $patient_services_grid->PrintBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->PrintDate->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->PrintDate->caption(), $patient_services_grid->PrintDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->PrintDate->errorMessage()) ?>");
			<?php if ($patient_services_grid->BillingDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->BillingDate->caption(), $patient_services_grid->BillingDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->BillingDate->errorMessage()) ?>");
			<?php if ($patient_services_grid->BilledBy->Required) { ?>
				elm = this.getElements("x" + infix + "_BilledBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->BilledBy->caption(), $patient_services_grid->BilledBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Resulted->Required) { ?>
				elm = this.getElements("x" + infix + "_Resulted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Resulted->caption(), $patient_services_grid->Resulted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->ResultDate->caption(), $patient_services_grid->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->ResultDate->errorMessage()) ?>");
			<?php if ($patient_services_grid->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->ResultedBy->caption(), $patient_services_grid->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->SampleDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->SampleDate->caption(), $patient_services_grid->SampleDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->SampleDate->errorMessage()) ?>");
			<?php if ($patient_services_grid->SampleUser->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->SampleUser->caption(), $patient_services_grid->SampleUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Sampled->Required) { ?>
				elm = this.getElements("x" + infix + "_Sampled");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Sampled->caption(), $patient_services_grid->Sampled->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->ReceivedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->ReceivedDate->caption(), $patient_services_grid->ReceivedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->ReceivedDate->errorMessage()) ?>");
			<?php if ($patient_services_grid->ReceivedUser->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->ReceivedUser->caption(), $patient_services_grid->ReceivedUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Recevied->Required) { ?>
				elm = this.getElements("x" + infix + "_Recevied");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Recevied->caption(), $patient_services_grid->Recevied->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->DeptRecvDate->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DeptRecvDate->caption(), $patient_services_grid->DeptRecvDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->DeptRecvDate->errorMessage()) ?>");
			<?php if ($patient_services_grid->DeptRecvUser->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DeptRecvUser->caption(), $patient_services_grid->DeptRecvUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->DeptRecived->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecived");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->DeptRecived->caption(), $patient_services_grid->DeptRecived->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->SAuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->SAuthDate->caption(), $patient_services_grid->SAuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->SAuthDate->errorMessage()) ?>");
			<?php if ($patient_services_grid->SAuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->SAuthBy->caption(), $patient_services_grid->SAuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->SAuthendicate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthendicate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->SAuthendicate->caption(), $patient_services_grid->SAuthendicate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->AuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->AuthDate->caption(), $patient_services_grid->AuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->AuthDate->errorMessage()) ?>");
			<?php if ($patient_services_grid->AuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->AuthBy->caption(), $patient_services_grid->AuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Authencate->Required) { ?>
				elm = this.getElements("x" + infix + "_Authencate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Authencate->caption(), $patient_services_grid->Authencate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->EditDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->EditDate->caption(), $patient_services_grid->EditDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->EditDate->errorMessage()) ?>");
			<?php if ($patient_services_grid->EditBy->Required) { ?>
				elm = this.getElements("x" + infix + "_EditBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->EditBy->caption(), $patient_services_grid->EditBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Editted->Required) { ?>
				elm = this.getElements("x" + infix + "_Editted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Editted->caption(), $patient_services_grid->Editted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->PatID->caption(), $patient_services_grid->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->PatID->errorMessage()) ?>");
			<?php if ($patient_services_grid->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->PatientId->caption(), $patient_services_grid->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Mobile->caption(), $patient_services_grid->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->CId->caption(), $patient_services_grid->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->CId->errorMessage()) ?>");
			<?php if ($patient_services_grid->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Order->caption(), $patient_services_grid->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->Order->errorMessage()) ?>");
			<?php if ($patient_services_grid->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->ResType->caption(), $patient_services_grid->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Sample->caption(), $patient_services_grid->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->NoD->caption(), $patient_services_grid->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->NoD->errorMessage()) ?>");
			<?php if ($patient_services_grid->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->BillOrder->caption(), $patient_services_grid->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->BillOrder->errorMessage()) ?>");
			<?php if ($patient_services_grid->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Inactive->caption(), $patient_services_grid->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->CollSample->caption(), $patient_services_grid->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->TestType->caption(), $patient_services_grid->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Repeated->Required) { ?>
				elm = this.getElements("x" + infix + "_Repeated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Repeated->caption(), $patient_services_grid->Repeated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->RepeatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->RepeatedBy->caption(), $patient_services_grid->RepeatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->RepeatedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->RepeatedDate->caption(), $patient_services_grid->RepeatedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->RepeatedDate->errorMessage()) ?>");
			<?php if ($patient_services_grid->serviceID->Required) { ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->serviceID->caption(), $patient_services_grid->serviceID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->serviceID->errorMessage()) ?>");
			<?php if ($patient_services_grid->Service_Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Service_Type->caption(), $patient_services_grid->Service_Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->Service_Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->Service_Department->caption(), $patient_services_grid->Service_Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_services_grid->RequestNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services_grid->RequestNo->caption(), $patient_services_grid->RequestNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_services_grid->RequestNo->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpatient_servicesgrid.emptyRow = function(infix) {
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
	fpatient_servicesgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_servicesgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_servicesgrid.lists["x_Services"] = <?php echo $patient_services_grid->Services->Lookup->toClientList($patient_services_grid) ?>;
	fpatient_servicesgrid.lists["x_Services"].options = <?php echo JsonEncode($patient_services_grid->Services->lookupOptions()) ?>;
	fpatient_servicesgrid.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_servicesgrid.lists["x_status"] = <?php echo $patient_services_grid->status->Lookup->toClientList($patient_services_grid) ?>;
	fpatient_servicesgrid.lists["x_status"].options = <?php echo JsonEncode($patient_services_grid->status->lookupOptions()) ?>;
	fpatient_servicesgrid.lists["x_ServiceSelect[]"] = <?php echo $patient_services_grid->ServiceSelect->Lookup->toClientList($patient_services_grid) ?>;
	fpatient_servicesgrid.lists["x_ServiceSelect[]"].options = <?php echo JsonEncode($patient_services_grid->ServiceSelect->options(FALSE, TRUE)) ?>;
	loadjs.done("fpatient_servicesgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_services_grid->renderOtherOptions();
?>
<?php if ($patient_services_grid->TotalRecords > 0 || $patient_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_services_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_services">
<?php if ($patient_services_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_services_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_servicesgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_services" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_servicesgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_services->RowType = ROWTYPE_HEADER;

// Render list options
$patient_services_grid->renderListOptions();

// Render list options (header, left)
$patient_services_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_services_grid->id->Visible) { // id ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_services_grid->id->headerCellClass() ?>"><div id="elh_patient_services_id" class="patient_services_id"><div class="ew-table-header-caption"><?php echo $patient_services_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_services_grid->id->headerCellClass() ?>"><div><div id="elh_patient_services_id" class="patient_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Reception->Visible) { // Reception ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_services_grid->Reception->headerCellClass() ?>"><div id="elh_patient_services_Reception" class="patient_services_Reception"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_services_grid->Reception->headerCellClass() ?>"><div><div id="elh_patient_services_Reception" class="patient_services_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Services->Visible) { // Services ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $patient_services_grid->Services->headerCellClass() ?>"><div id="elh_patient_services_Services" class="patient_services_Services"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $patient_services_grid->Services->headerCellClass() ?>"><div><div id="elh_patient_services_Services" class="patient_services_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Services->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Services->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->amount->Visible) { // amount ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $patient_services_grid->amount->headerCellClass() ?>"><div id="elh_patient_services_amount" class="patient_services_amount"><div class="ew-table-header-caption"><?php echo $patient_services_grid->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $patient_services_grid->amount->headerCellClass() ?>"><div><div id="elh_patient_services_amount" class="patient_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->description->Visible) { // description ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->description) == "") { ?>
		<th data-name="description" class="<?php echo $patient_services_grid->description->headerCellClass() ?>"><div id="elh_patient_services_description" class="patient_services_description"><div class="ew-table-header-caption"><?php echo $patient_services_grid->description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $patient_services_grid->description->headerCellClass() ?>"><div><div id="elh_patient_services_description" class="patient_services_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->description->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->patient_type->Visible) { // patient_type ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $patient_services_grid->patient_type->headerCellClass() ?>"><div id="elh_patient_services_patient_type" class="patient_services_patient_type"><div class="ew-table-header-caption"><?php echo $patient_services_grid->patient_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $patient_services_grid->patient_type->headerCellClass() ?>"><div><div id="elh_patient_services_patient_type" class="patient_services_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->patient_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->patient_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->charged_date->Visible) { // charged_date ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $patient_services_grid->charged_date->headerCellClass() ?>"><div id="elh_patient_services_charged_date" class="patient_services_charged_date"><div class="ew-table-header-caption"><?php echo $patient_services_grid->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $patient_services_grid->charged_date->headerCellClass() ?>"><div><div id="elh_patient_services_charged_date" class="patient_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->charged_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->charged_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->status->Visible) { // status ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_services_grid->status->headerCellClass() ?>"><div id="elh_patient_services_status" class="patient_services_status"><div class="ew-table-header-caption"><?php echo $patient_services_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_services_grid->status->headerCellClass() ?>"><div><div id="elh_patient_services_status" class="patient_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_services_grid->mrnno->headerCellClass() ?>"><div id="elh_patient_services_mrnno" class="patient_services_mrnno"><div class="ew-table-header-caption"><?php echo $patient_services_grid->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_services_grid->mrnno->headerCellClass() ?>"><div><div id="elh_patient_services_mrnno" class="patient_services_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_services_grid->PatientName->headerCellClass() ?>"><div id="elh_patient_services_PatientName" class="patient_services_PatientName"><div class="ew-table-header-caption"><?php echo $patient_services_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_services_grid->PatientName->headerCellClass() ?>"><div><div id="elh_patient_services_PatientName" class="patient_services_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Age->Visible) { // Age ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_services_grid->Age->headerCellClass() ?>"><div id="elh_patient_services_Age" class="patient_services_Age"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_services_grid->Age->headerCellClass() ?>"><div><div id="elh_patient_services_Age" class="patient_services_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Gender->Visible) { // Gender ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_services_grid->Gender->headerCellClass() ?>"><div id="elh_patient_services_Gender" class="patient_services_Gender"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_services_grid->Gender->headerCellClass() ?>"><div><div id="elh_patient_services_Gender" class="patient_services_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Unit->Visible) { // Unit ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $patient_services_grid->Unit->headerCellClass() ?>"><div id="elh_patient_services_Unit" class="patient_services_Unit"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $patient_services_grid->Unit->headerCellClass() ?>"><div><div id="elh_patient_services_Unit" class="patient_services_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Quantity->Visible) { // Quantity ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $patient_services_grid->Quantity->headerCellClass() ?>"><div id="elh_patient_services_Quantity" class="patient_services_Quantity"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $patient_services_grid->Quantity->headerCellClass() ?>"><div><div id="elh_patient_services_Quantity" class="patient_services_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Discount->Visible) { // Discount ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $patient_services_grid->Discount->headerCellClass() ?>"><div id="elh_patient_services_Discount" class="patient_services_Discount"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $patient_services_grid->Discount->headerCellClass() ?>"><div><div id="elh_patient_services_Discount" class="patient_services_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Discount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Discount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->SubTotal->Visible) { // SubTotal ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $patient_services_grid->SubTotal->headerCellClass() ?>"><div id="elh_patient_services_SubTotal" class="patient_services_SubTotal"><div class="ew-table-header-caption"><?php echo $patient_services_grid->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $patient_services_grid->SubTotal->headerCellClass() ?>"><div><div id="elh_patient_services_SubTotal" class="patient_services_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->SubTotal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->SubTotal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->ServiceSelect->Visible) { // ServiceSelect ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->ServiceSelect) == "") { ?>
		<th data-name="ServiceSelect" class="<?php echo $patient_services_grid->ServiceSelect->headerCellClass() ?>"><div id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect"><div class="ew-table-header-caption"><?php echo $patient_services_grid->ServiceSelect->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ServiceSelect" class="<?php echo $patient_services_grid->ServiceSelect->headerCellClass() ?>"><div><div id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->ServiceSelect->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->ServiceSelect->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->ServiceSelect->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Aid->Visible) { // Aid ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $patient_services_grid->Aid->headerCellClass() ?>"><div id="elh_patient_services_Aid" class="patient_services_Aid"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Aid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $patient_services_grid->Aid->headerCellClass() ?>"><div><div id="elh_patient_services_Aid" class="patient_services_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Aid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Aid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Vid->Visible) { // Vid ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $patient_services_grid->Vid->headerCellClass() ?>"><div id="elh_patient_services_Vid" class="patient_services_Vid"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $patient_services_grid->Vid->headerCellClass() ?>"><div><div id="elh_patient_services_Vid" class="patient_services_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Vid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Vid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DrID->Visible) { // DrID ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $patient_services_grid->DrID->headerCellClass() ?>"><div id="elh_patient_services_DrID" class="patient_services_DrID"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $patient_services_grid->DrID->headerCellClass() ?>"><div><div id="elh_patient_services_DrID" class="patient_services_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DrCODE->Visible) { // DrCODE ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $patient_services_grid->DrCODE->headerCellClass() ?>"><div id="elh_patient_services_DrCODE" class="patient_services_DrCODE"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $patient_services_grid->DrCODE->headerCellClass() ?>"><div><div id="elh_patient_services_DrCODE" class="patient_services_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DrCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DrCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DrName->Visible) { // DrName ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $patient_services_grid->DrName->headerCellClass() ?>"><div id="elh_patient_services_DrName" class="patient_services_DrName"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $patient_services_grid->DrName->headerCellClass() ?>"><div><div id="elh_patient_services_DrName" class="patient_services_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Department->Visible) { // Department ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $patient_services_grid->Department->headerCellClass() ?>"><div id="elh_patient_services_Department" class="patient_services_Department"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $patient_services_grid->Department->headerCellClass() ?>"><div><div id="elh_patient_services_Department" class="patient_services_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DrSharePres) == "") { ?>
		<th data-name="DrSharePres" class="<?php echo $patient_services_grid->DrSharePres->headerCellClass() ?>"><div id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DrSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePres" class="<?php echo $patient_services_grid->DrSharePres->headerCellClass() ?>"><div><div id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DrSharePres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DrSharePres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->HospSharePres) == "") { ?>
		<th data-name="HospSharePres" class="<?php echo $patient_services_grid->HospSharePres->headerCellClass() ?>"><div id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres"><div class="ew-table-header-caption"><?php echo $patient_services_grid->HospSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePres" class="<?php echo $patient_services_grid->HospSharePres->headerCellClass() ?>"><div><div id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->HospSharePres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->HospSharePres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $patient_services_grid->DrShareAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $patient_services_grid->DrShareAmount->headerCellClass() ?>"><div><div id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DrShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DrShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $patient_services_grid->HospShareAmount->headerCellClass() ?>"><div id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount"><div class="ew-table-header-caption"><?php echo $patient_services_grid->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $patient_services_grid->HospShareAmount->headerCellClass() ?>"><div><div id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->HospShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->HospShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DrShareSettiledAmount) == "") { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $patient_services_grid->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DrShareSettiledAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $patient_services_grid->DrShareSettiledAmount->headerCellClass() ?>"><div><div id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DrShareSettiledAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DrShareSettiledAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DrShareSettledId) == "") { ?>
		<th data-name="DrShareSettledId" class="<?php echo $patient_services_grid->DrShareSettledId->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DrShareSettledId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettledId" class="<?php echo $patient_services_grid->DrShareSettledId->headerCellClass() ?>"><div><div id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DrShareSettledId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DrShareSettledId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DrShareSettiledStatus) == "") { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $patient_services_grid->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DrShareSettiledStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $patient_services_grid->DrShareSettiledStatus->headerCellClass() ?>"><div><div id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DrShareSettiledStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DrShareSettiledStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->invoiceId->Visible) { // invoiceId ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $patient_services_grid->invoiceId->headerCellClass() ?>"><div id="elh_patient_services_invoiceId" class="patient_services_invoiceId"><div class="ew-table-header-caption"><?php echo $patient_services_grid->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $patient_services_grid->invoiceId->headerCellClass() ?>"><div><div id="elh_patient_services_invoiceId" class="patient_services_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->invoiceId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->invoiceId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $patient_services_grid->invoiceAmount->headerCellClass() ?>"><div id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount"><div class="ew-table-header-caption"><?php echo $patient_services_grid->invoiceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $patient_services_grid->invoiceAmount->headerCellClass() ?>"><div><div id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->invoiceAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->invoiceAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $patient_services_grid->invoiceStatus->headerCellClass() ?>"><div id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus"><div class="ew-table-header-caption"><?php echo $patient_services_grid->invoiceStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $patient_services_grid->invoiceStatus->headerCellClass() ?>"><div><div id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->invoiceStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->invoiceStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->invoiceStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $patient_services_grid->modeOfPayment->headerCellClass() ?>"><div id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment"><div class="ew-table-header-caption"><?php echo $patient_services_grid->modeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $patient_services_grid->modeOfPayment->headerCellClass() ?>"><div><div id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->modeOfPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->modeOfPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->modeOfPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->HospID->Visible) { // HospID ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_services_grid->HospID->headerCellClass() ?>"><div id="elh_patient_services_HospID" class="patient_services_HospID"><div class="ew-table-header-caption"><?php echo $patient_services_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_services_grid->HospID->headerCellClass() ?>"><div><div id="elh_patient_services_HospID" class="patient_services_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->RIDNO->Visible) { // RIDNO ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $patient_services_grid->RIDNO->headerCellClass() ?>"><div id="elh_patient_services_RIDNO" class="patient_services_RIDNO"><div class="ew-table-header-caption"><?php echo $patient_services_grid->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $patient_services_grid->RIDNO->headerCellClass() ?>"><div><div id="elh_patient_services_RIDNO" class="patient_services_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->TidNo->Visible) { // TidNo ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $patient_services_grid->TidNo->headerCellClass() ?>"><div id="elh_patient_services_TidNo" class="patient_services_TidNo"><div class="ew-table-header-caption"><?php echo $patient_services_grid->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $patient_services_grid->TidNo->headerCellClass() ?>"><div><div id="elh_patient_services_TidNo" class="patient_services_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DiscountCategory) == "") { ?>
		<th data-name="DiscountCategory" class="<?php echo $patient_services_grid->DiscountCategory->headerCellClass() ?>"><div id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DiscountCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountCategory" class="<?php echo $patient_services_grid->DiscountCategory->headerCellClass() ?>"><div><div id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DiscountCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DiscountCategory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DiscountCategory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->sid->Visible) { // sid ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $patient_services_grid->sid->headerCellClass() ?>"><div id="elh_patient_services_sid" class="patient_services_sid"><div class="ew-table-header-caption"><?php echo $patient_services_grid->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $patient_services_grid->sid->headerCellClass() ?>"><div><div id="elh_patient_services_sid" class="patient_services_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->sid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->sid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->ItemCode->Visible) { // ItemCode ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $patient_services_grid->ItemCode->headerCellClass() ?>"><div id="elh_patient_services_ItemCode" class="patient_services_ItemCode"><div class="ew-table-header-caption"><?php echo $patient_services_grid->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $patient_services_grid->ItemCode->headerCellClass() ?>"><div><div id="elh_patient_services_ItemCode" class="patient_services_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->ItemCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->ItemCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $patient_services_grid->TestSubCd->headerCellClass() ?>"><div id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd"><div class="ew-table-header-caption"><?php echo $patient_services_grid->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $patient_services_grid->TestSubCd->headerCellClass() ?>"><div><div id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->TestSubCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->TestSubCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->TestSubCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DEptCd->Visible) { // DEptCd ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $patient_services_grid->DEptCd->headerCellClass() ?>"><div id="elh_patient_services_DEptCd" class="patient_services_DEptCd"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $patient_services_grid->DEptCd->headerCellClass() ?>"><div><div id="elh_patient_services_DEptCd" class="patient_services_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DEptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DEptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->ProfCd->Visible) { // ProfCd ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $patient_services_grid->ProfCd->headerCellClass() ?>"><div id="elh_patient_services_ProfCd" class="patient_services_ProfCd"><div class="ew-table-header-caption"><?php echo $patient_services_grid->ProfCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $patient_services_grid->ProfCd->headerCellClass() ?>"><div><div id="elh_patient_services_ProfCd" class="patient_services_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->ProfCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->ProfCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->ProfCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Comments->Visible) { // Comments ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $patient_services_grid->Comments->headerCellClass() ?>"><div id="elh_patient_services_Comments" class="patient_services_Comments"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Comments->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $patient_services_grid->Comments->headerCellClass() ?>"><div><div id="elh_patient_services_Comments" class="patient_services_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Comments->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Comments->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Comments->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Method->Visible) { // Method ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $patient_services_grid->Method->headerCellClass() ?>"><div id="elh_patient_services_Method" class="patient_services_Method"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $patient_services_grid->Method->headerCellClass() ?>"><div><div id="elh_patient_services_Method" class="patient_services_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Specimen->Visible) { // Specimen ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $patient_services_grid->Specimen->headerCellClass() ?>"><div id="elh_patient_services_Specimen" class="patient_services_Specimen"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Specimen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $patient_services_grid->Specimen->headerCellClass() ?>"><div><div id="elh_patient_services_Specimen" class="patient_services_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Specimen->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Specimen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Specimen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Abnormal->Visible) { // Abnormal ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $patient_services_grid->Abnormal->headerCellClass() ?>"><div id="elh_patient_services_Abnormal" class="patient_services_Abnormal"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $patient_services_grid->Abnormal->headerCellClass() ?>"><div><div id="elh_patient_services_Abnormal" class="patient_services_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Abnormal->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Abnormal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Abnormal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->TestUnit->Visible) { // TestUnit ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $patient_services_grid->TestUnit->headerCellClass() ?>"><div id="elh_patient_services_TestUnit" class="patient_services_TestUnit"><div class="ew-table-header-caption"><?php echo $patient_services_grid->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $patient_services_grid->TestUnit->headerCellClass() ?>"><div><div id="elh_patient_services_TestUnit" class="patient_services_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->TestUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->TestUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $patient_services_grid->LOWHIGH->headerCellClass() ?>"><div id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH"><div class="ew-table-header-caption"><?php echo $patient_services_grid->LOWHIGH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $patient_services_grid->LOWHIGH->headerCellClass() ?>"><div><div id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->LOWHIGH->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->LOWHIGH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->LOWHIGH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Branch->Visible) { // Branch ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $patient_services_grid->Branch->headerCellClass() ?>"><div id="elh_patient_services_Branch" class="patient_services_Branch"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Branch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $patient_services_grid->Branch->headerCellClass() ?>"><div><div id="elh_patient_services_Branch" class="patient_services_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Branch->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Branch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Branch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Dispatch->Visible) { // Dispatch ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $patient_services_grid->Dispatch->headerCellClass() ?>"><div id="elh_patient_services_Dispatch" class="patient_services_Dispatch"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Dispatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $patient_services_grid->Dispatch->headerCellClass() ?>"><div><div id="elh_patient_services_Dispatch" class="patient_services_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Dispatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Dispatch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Dispatch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Pic1->Visible) { // Pic1 ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $patient_services_grid->Pic1->headerCellClass() ?>"><div id="elh_patient_services_Pic1" class="patient_services_Pic1"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $patient_services_grid->Pic1->headerCellClass() ?>"><div><div id="elh_patient_services_Pic1" class="patient_services_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Pic1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Pic1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Pic2->Visible) { // Pic2 ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $patient_services_grid->Pic2->headerCellClass() ?>"><div id="elh_patient_services_Pic2" class="patient_services_Pic2"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $patient_services_grid->Pic2->headerCellClass() ?>"><div><div id="elh_patient_services_Pic2" class="patient_services_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Pic2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Pic2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->GraphPath->Visible) { // GraphPath ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $patient_services_grid->GraphPath->headerCellClass() ?>"><div id="elh_patient_services_GraphPath" class="patient_services_GraphPath"><div class="ew-table-header-caption"><?php echo $patient_services_grid->GraphPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $patient_services_grid->GraphPath->headerCellClass() ?>"><div><div id="elh_patient_services_GraphPath" class="patient_services_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->GraphPath->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->GraphPath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->GraphPath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->MachineCD->Visible) { // MachineCD ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $patient_services_grid->MachineCD->headerCellClass() ?>"><div id="elh_patient_services_MachineCD" class="patient_services_MachineCD"><div class="ew-table-header-caption"><?php echo $patient_services_grid->MachineCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $patient_services_grid->MachineCD->headerCellClass() ?>"><div><div id="elh_patient_services_MachineCD" class="patient_services_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->MachineCD->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->MachineCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->MachineCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->TestCancel->Visible) { // TestCancel ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $patient_services_grid->TestCancel->headerCellClass() ?>"><div id="elh_patient_services_TestCancel" class="patient_services_TestCancel"><div class="ew-table-header-caption"><?php echo $patient_services_grid->TestCancel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $patient_services_grid->TestCancel->headerCellClass() ?>"><div><div id="elh_patient_services_TestCancel" class="patient_services_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->TestCancel->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->TestCancel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->TestCancel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->OutSource->Visible) { // OutSource ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $patient_services_grid->OutSource->headerCellClass() ?>"><div id="elh_patient_services_OutSource" class="patient_services_OutSource"><div class="ew-table-header-caption"><?php echo $patient_services_grid->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $patient_services_grid->OutSource->headerCellClass() ?>"><div><div id="elh_patient_services_OutSource" class="patient_services_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->OutSource->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->OutSource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->OutSource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Printed->Visible) { // Printed ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $patient_services_grid->Printed->headerCellClass() ?>"><div id="elh_patient_services_Printed" class="patient_services_Printed"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $patient_services_grid->Printed->headerCellClass() ?>"><div><div id="elh_patient_services_Printed" class="patient_services_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Printed->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Printed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Printed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->PrintBy->Visible) { // PrintBy ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $patient_services_grid->PrintBy->headerCellClass() ?>"><div id="elh_patient_services_PrintBy" class="patient_services_PrintBy"><div class="ew-table-header-caption"><?php echo $patient_services_grid->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $patient_services_grid->PrintBy->headerCellClass() ?>"><div><div id="elh_patient_services_PrintBy" class="patient_services_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->PrintBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->PrintBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->PrintBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->PrintDate->Visible) { // PrintDate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $patient_services_grid->PrintDate->headerCellClass() ?>"><div id="elh_patient_services_PrintDate" class="patient_services_PrintDate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $patient_services_grid->PrintDate->headerCellClass() ?>"><div><div id="elh_patient_services_PrintDate" class="patient_services_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->PrintDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->PrintDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->BillingDate->Visible) { // BillingDate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->BillingDate) == "") { ?>
		<th data-name="BillingDate" class="<?php echo $patient_services_grid->BillingDate->headerCellClass() ?>"><div id="elh_patient_services_BillingDate" class="patient_services_BillingDate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->BillingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillingDate" class="<?php echo $patient_services_grid->BillingDate->headerCellClass() ?>"><div><div id="elh_patient_services_BillingDate" class="patient_services_BillingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->BillingDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->BillingDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->BilledBy->Visible) { // BilledBy ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->BilledBy) == "") { ?>
		<th data-name="BilledBy" class="<?php echo $patient_services_grid->BilledBy->headerCellClass() ?>"><div id="elh_patient_services_BilledBy" class="patient_services_BilledBy"><div class="ew-table-header-caption"><?php echo $patient_services_grid->BilledBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BilledBy" class="<?php echo $patient_services_grid->BilledBy->headerCellClass() ?>"><div><div id="elh_patient_services_BilledBy" class="patient_services_BilledBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->BilledBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->BilledBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->BilledBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Resulted->Visible) { // Resulted ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $patient_services_grid->Resulted->headerCellClass() ?>"><div id="elh_patient_services_Resulted" class="patient_services_Resulted"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $patient_services_grid->Resulted->headerCellClass() ?>"><div><div id="elh_patient_services_Resulted" class="patient_services_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Resulted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Resulted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->ResultDate->Visible) { // ResultDate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $patient_services_grid->ResultDate->headerCellClass() ?>"><div id="elh_patient_services_ResultDate" class="patient_services_ResultDate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $patient_services_grid->ResultDate->headerCellClass() ?>"><div><div id="elh_patient_services_ResultDate" class="patient_services_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_services_grid->ResultedBy->headerCellClass() ?>"><div id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy"><div class="ew-table-header-caption"><?php echo $patient_services_grid->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_services_grid->ResultedBy->headerCellClass() ?>"><div><div id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->ResultedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->ResultedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->SampleDate->Visible) { // SampleDate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $patient_services_grid->SampleDate->headerCellClass() ?>"><div id="elh_patient_services_SampleDate" class="patient_services_SampleDate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->SampleDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $patient_services_grid->SampleDate->headerCellClass() ?>"><div><div id="elh_patient_services_SampleDate" class="patient_services_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->SampleDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->SampleDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->SampleUser->Visible) { // SampleUser ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $patient_services_grid->SampleUser->headerCellClass() ?>"><div id="elh_patient_services_SampleUser" class="patient_services_SampleUser"><div class="ew-table-header-caption"><?php echo $patient_services_grid->SampleUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $patient_services_grid->SampleUser->headerCellClass() ?>"><div><div id="elh_patient_services_SampleUser" class="patient_services_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->SampleUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->SampleUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->SampleUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Sampled->Visible) { // Sampled ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Sampled) == "") { ?>
		<th data-name="Sampled" class="<?php echo $patient_services_grid->Sampled->headerCellClass() ?>"><div id="elh_patient_services_Sampled" class="patient_services_Sampled"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Sampled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sampled" class="<?php echo $patient_services_grid->Sampled->headerCellClass() ?>"><div><div id="elh_patient_services_Sampled" class="patient_services_Sampled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Sampled->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Sampled->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Sampled->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $patient_services_grid->ReceivedDate->headerCellClass() ?>"><div id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->ReceivedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $patient_services_grid->ReceivedDate->headerCellClass() ?>"><div><div id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->ReceivedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->ReceivedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $patient_services_grid->ReceivedUser->headerCellClass() ?>"><div id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser"><div class="ew-table-header-caption"><?php echo $patient_services_grid->ReceivedUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $patient_services_grid->ReceivedUser->headerCellClass() ?>"><div><div id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->ReceivedUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->ReceivedUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->ReceivedUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Recevied->Visible) { // Recevied ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Recevied) == "") { ?>
		<th data-name="Recevied" class="<?php echo $patient_services_grid->Recevied->headerCellClass() ?>"><div id="elh_patient_services_Recevied" class="patient_services_Recevied"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Recevied->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Recevied" class="<?php echo $patient_services_grid->Recevied->headerCellClass() ?>"><div><div id="elh_patient_services_Recevied" class="patient_services_Recevied">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Recevied->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Recevied->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Recevied->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $patient_services_grid->DeptRecvDate->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DeptRecvDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $patient_services_grid->DeptRecvDate->headerCellClass() ?>"><div><div id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DeptRecvDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DeptRecvDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $patient_services_grid->DeptRecvUser->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DeptRecvUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $patient_services_grid->DeptRecvUser->headerCellClass() ?>"><div><div id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DeptRecvUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DeptRecvUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DeptRecvUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->DeptRecived) == "") { ?>
		<th data-name="DeptRecived" class="<?php echo $patient_services_grid->DeptRecived->headerCellClass() ?>"><div id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived"><div class="ew-table-header-caption"><?php echo $patient_services_grid->DeptRecived->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecived" class="<?php echo $patient_services_grid->DeptRecived->headerCellClass() ?>"><div><div id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->DeptRecived->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->DeptRecived->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->DeptRecived->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $patient_services_grid->SAuthDate->headerCellClass() ?>"><div id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->SAuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $patient_services_grid->SAuthDate->headerCellClass() ?>"><div><div id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->SAuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->SAuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $patient_services_grid->SAuthBy->headerCellClass() ?>"><div id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy"><div class="ew-table-header-caption"><?php echo $patient_services_grid->SAuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $patient_services_grid->SAuthBy->headerCellClass() ?>"><div><div id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->SAuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->SAuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->SAuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->SAuthendicate) == "") { ?>
		<th data-name="SAuthendicate" class="<?php echo $patient_services_grid->SAuthendicate->headerCellClass() ?>"><div id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->SAuthendicate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthendicate" class="<?php echo $patient_services_grid->SAuthendicate->headerCellClass() ?>"><div><div id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->SAuthendicate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->SAuthendicate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->SAuthendicate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->AuthDate->Visible) { // AuthDate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $patient_services_grid->AuthDate->headerCellClass() ?>"><div id="elh_patient_services_AuthDate" class="patient_services_AuthDate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->AuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $patient_services_grid->AuthDate->headerCellClass() ?>"><div><div id="elh_patient_services_AuthDate" class="patient_services_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->AuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->AuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->AuthBy->Visible) { // AuthBy ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $patient_services_grid->AuthBy->headerCellClass() ?>"><div id="elh_patient_services_AuthBy" class="patient_services_AuthBy"><div class="ew-table-header-caption"><?php echo $patient_services_grid->AuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $patient_services_grid->AuthBy->headerCellClass() ?>"><div><div id="elh_patient_services_AuthBy" class="patient_services_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->AuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->AuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->AuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Authencate->Visible) { // Authencate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Authencate) == "") { ?>
		<th data-name="Authencate" class="<?php echo $patient_services_grid->Authencate->headerCellClass() ?>"><div id="elh_patient_services_Authencate" class="patient_services_Authencate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Authencate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Authencate" class="<?php echo $patient_services_grid->Authencate->headerCellClass() ?>"><div><div id="elh_patient_services_Authencate" class="patient_services_Authencate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Authencate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Authencate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Authencate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->EditDate->Visible) { // EditDate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $patient_services_grid->EditDate->headerCellClass() ?>"><div id="elh_patient_services_EditDate" class="patient_services_EditDate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $patient_services_grid->EditDate->headerCellClass() ?>"><div><div id="elh_patient_services_EditDate" class="patient_services_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->EditDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->EditDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->EditBy->Visible) { // EditBy ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->EditBy) == "") { ?>
		<th data-name="EditBy" class="<?php echo $patient_services_grid->EditBy->headerCellClass() ?>"><div id="elh_patient_services_EditBy" class="patient_services_EditBy"><div class="ew-table-header-caption"><?php echo $patient_services_grid->EditBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditBy" class="<?php echo $patient_services_grid->EditBy->headerCellClass() ?>"><div><div id="elh_patient_services_EditBy" class="patient_services_EditBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->EditBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->EditBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->EditBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Editted->Visible) { // Editted ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Editted) == "") { ?>
		<th data-name="Editted" class="<?php echo $patient_services_grid->Editted->headerCellClass() ?>"><div id="elh_patient_services_Editted" class="patient_services_Editted"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Editted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Editted" class="<?php echo $patient_services_grid->Editted->headerCellClass() ?>"><div><div id="elh_patient_services_Editted" class="patient_services_Editted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Editted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Editted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Editted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->PatID->Visible) { // PatID ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_services_grid->PatID->headerCellClass() ?>"><div id="elh_patient_services_PatID" class="patient_services_PatID"><div class="ew-table-header-caption"><?php echo $patient_services_grid->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_services_grid->PatID->headerCellClass() ?>"><div><div id="elh_patient_services_PatID" class="patient_services_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_services_grid->PatientId->headerCellClass() ?>"><div id="elh_patient_services_PatientId" class="patient_services_PatientId"><div class="ew-table-header-caption"><?php echo $patient_services_grid->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_services_grid->PatientId->headerCellClass() ?>"><div><div id="elh_patient_services_PatientId" class="patient_services_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Mobile->Visible) { // Mobile ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $patient_services_grid->Mobile->headerCellClass() ?>"><div id="elh_patient_services_Mobile" class="patient_services_Mobile"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $patient_services_grid->Mobile->headerCellClass() ?>"><div><div id="elh_patient_services_Mobile" class="patient_services_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->CId->Visible) { // CId ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $patient_services_grid->CId->headerCellClass() ?>"><div id="elh_patient_services_CId" class="patient_services_CId"><div class="ew-table-header-caption"><?php echo $patient_services_grid->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $patient_services_grid->CId->headerCellClass() ?>"><div><div id="elh_patient_services_CId" class="patient_services_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->CId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->CId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Order->Visible) { // Order ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $patient_services_grid->Order->headerCellClass() ?>"><div id="elh_patient_services_Order" class="patient_services_Order"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $patient_services_grid->Order->headerCellClass() ?>"><div><div id="elh_patient_services_Order" class="patient_services_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->ResType->Visible) { // ResType ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $patient_services_grid->ResType->headerCellClass() ?>"><div id="elh_patient_services_ResType" class="patient_services_ResType"><div class="ew-table-header-caption"><?php echo $patient_services_grid->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $patient_services_grid->ResType->headerCellClass() ?>"><div><div id="elh_patient_services_ResType" class="patient_services_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->ResType->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->ResType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->ResType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Sample->Visible) { // Sample ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $patient_services_grid->Sample->headerCellClass() ?>"><div id="elh_patient_services_Sample" class="patient_services_Sample"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $patient_services_grid->Sample->headerCellClass() ?>"><div><div id="elh_patient_services_Sample" class="patient_services_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Sample->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Sample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Sample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->NoD->Visible) { // NoD ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $patient_services_grid->NoD->headerCellClass() ?>"><div id="elh_patient_services_NoD" class="patient_services_NoD"><div class="ew-table-header-caption"><?php echo $patient_services_grid->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $patient_services_grid->NoD->headerCellClass() ?>"><div><div id="elh_patient_services_NoD" class="patient_services_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->NoD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->NoD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->BillOrder->Visible) { // BillOrder ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $patient_services_grid->BillOrder->headerCellClass() ?>"><div id="elh_patient_services_BillOrder" class="patient_services_BillOrder"><div class="ew-table-header-caption"><?php echo $patient_services_grid->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $patient_services_grid->BillOrder->headerCellClass() ?>"><div><div id="elh_patient_services_BillOrder" class="patient_services_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->BillOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->BillOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Inactive->Visible) { // Inactive ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $patient_services_grid->Inactive->headerCellClass() ?>"><div id="elh_patient_services_Inactive" class="patient_services_Inactive"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $patient_services_grid->Inactive->headerCellClass() ?>"><div><div id="elh_patient_services_Inactive" class="patient_services_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Inactive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Inactive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->CollSample->Visible) { // CollSample ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $patient_services_grid->CollSample->headerCellClass() ?>"><div id="elh_patient_services_CollSample" class="patient_services_CollSample"><div class="ew-table-header-caption"><?php echo $patient_services_grid->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $patient_services_grid->CollSample->headerCellClass() ?>"><div><div id="elh_patient_services_CollSample" class="patient_services_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->CollSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->CollSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->CollSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->TestType->Visible) { // TestType ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $patient_services_grid->TestType->headerCellClass() ?>"><div id="elh_patient_services_TestType" class="patient_services_TestType"><div class="ew-table-header-caption"><?php echo $patient_services_grid->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $patient_services_grid->TestType->headerCellClass() ?>"><div><div id="elh_patient_services_TestType" class="patient_services_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->TestType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->TestType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Repeated->Visible) { // Repeated ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $patient_services_grid->Repeated->headerCellClass() ?>"><div id="elh_patient_services_Repeated" class="patient_services_Repeated"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $patient_services_grid->Repeated->headerCellClass() ?>"><div><div id="elh_patient_services_Repeated" class="patient_services_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Repeated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Repeated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->RepeatedBy) == "") { ?>
		<th data-name="RepeatedBy" class="<?php echo $patient_services_grid->RepeatedBy->headerCellClass() ?>"><div id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy"><div class="ew-table-header-caption"><?php echo $patient_services_grid->RepeatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedBy" class="<?php echo $patient_services_grid->RepeatedBy->headerCellClass() ?>"><div><div id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->RepeatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->RepeatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->RepeatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->RepeatedDate) == "") { ?>
		<th data-name="RepeatedDate" class="<?php echo $patient_services_grid->RepeatedDate->headerCellClass() ?>"><div id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate"><div class="ew-table-header-caption"><?php echo $patient_services_grid->RepeatedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedDate" class="<?php echo $patient_services_grid->RepeatedDate->headerCellClass() ?>"><div><div id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->RepeatedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->RepeatedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->serviceID->Visible) { // serviceID ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->serviceID) == "") { ?>
		<th data-name="serviceID" class="<?php echo $patient_services_grid->serviceID->headerCellClass() ?>"><div id="elh_patient_services_serviceID" class="patient_services_serviceID"><div class="ew-table-header-caption"><?php echo $patient_services_grid->serviceID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="serviceID" class="<?php echo $patient_services_grid->serviceID->headerCellClass() ?>"><div><div id="elh_patient_services_serviceID" class="patient_services_serviceID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->serviceID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->serviceID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Service_Type->Visible) { // Service_Type ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Service_Type) == "") { ?>
		<th data-name="Service_Type" class="<?php echo $patient_services_grid->Service_Type->headerCellClass() ?>"><div id="elh_patient_services_Service_Type" class="patient_services_Service_Type"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Service_Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Type" class="<?php echo $patient_services_grid->Service_Type->headerCellClass() ?>"><div><div id="elh_patient_services_Service_Type" class="patient_services_Service_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Service_Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Service_Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Service_Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->Service_Department->Visible) { // Service_Department ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->Service_Department) == "") { ?>
		<th data-name="Service_Department" class="<?php echo $patient_services_grid->Service_Department->headerCellClass() ?>"><div id="elh_patient_services_Service_Department" class="patient_services_Service_Department"><div class="ew-table-header-caption"><?php echo $patient_services_grid->Service_Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Department" class="<?php echo $patient_services_grid->Service_Department->headerCellClass() ?>"><div><div id="elh_patient_services_Service_Department" class="patient_services_Service_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->Service_Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->Service_Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->Service_Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services_grid->RequestNo->Visible) { // RequestNo ?>
	<?php if ($patient_services_grid->SortUrl($patient_services_grid->RequestNo) == "") { ?>
		<th data-name="RequestNo" class="<?php echo $patient_services_grid->RequestNo->headerCellClass() ?>"><div id="elh_patient_services_RequestNo" class="patient_services_RequestNo"><div class="ew-table-header-caption"><?php echo $patient_services_grid->RequestNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestNo" class="<?php echo $patient_services_grid->RequestNo->headerCellClass() ?>"><div><div id="elh_patient_services_RequestNo" class="patient_services_RequestNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services_grid->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services_grid->RequestNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_services_grid->RequestNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_services_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_services_grid->StartRecord = 1;
$patient_services_grid->StopRecord = $patient_services_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_services->isConfirm() || $patient_services_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_services_grid->FormKeyCountName) && ($patient_services_grid->isGridAdd() || $patient_services_grid->isGridEdit() || $patient_services->isConfirm())) {
		$patient_services_grid->KeyCount = $CurrentForm->getValue($patient_services_grid->FormKeyCountName);
		$patient_services_grid->StopRecord = $patient_services_grid->StartRecord + $patient_services_grid->KeyCount - 1;
	}
}
$patient_services_grid->RecordCount = $patient_services_grid->StartRecord - 1;
if ($patient_services_grid->Recordset && !$patient_services_grid->Recordset->EOF) {
	$patient_services_grid->Recordset->moveFirst();
	$selectLimit = $patient_services_grid->UseSelectLimit;
	if (!$selectLimit && $patient_services_grid->StartRecord > 1)
		$patient_services_grid->Recordset->move($patient_services_grid->StartRecord - 1);
} elseif (!$patient_services->AllowAddDeleteRow && $patient_services_grid->StopRecord == 0) {
	$patient_services_grid->StopRecord = $patient_services->GridAddRowCount;
}

// Initialize aggregate
$patient_services->RowType = ROWTYPE_AGGREGATEINIT;
$patient_services->resetAttributes();
$patient_services_grid->renderRow();
if ($patient_services_grid->isGridAdd())
	$patient_services_grid->RowIndex = 0;
if ($patient_services_grid->isGridEdit())
	$patient_services_grid->RowIndex = 0;
while ($patient_services_grid->RecordCount < $patient_services_grid->StopRecord) {
	$patient_services_grid->RecordCount++;
	if ($patient_services_grid->RecordCount >= $patient_services_grid->StartRecord) {
		$patient_services_grid->RowCount++;
		if ($patient_services_grid->isGridAdd() || $patient_services_grid->isGridEdit() || $patient_services->isConfirm()) {
			$patient_services_grid->RowIndex++;
			$CurrentForm->Index = $patient_services_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_services_grid->FormActionName) && ($patient_services->isConfirm() || $patient_services_grid->EventCancelled))
				$patient_services_grid->RowAction = strval($CurrentForm->getValue($patient_services_grid->FormActionName));
			elseif ($patient_services_grid->isGridAdd())
				$patient_services_grid->RowAction = "insert";
			else
				$patient_services_grid->RowAction = "";
		}

		// Set up key count
		$patient_services_grid->KeyCount = $patient_services_grid->RowIndex;

		// Init row class and style
		$patient_services->resetAttributes();
		$patient_services->CssClass = "";
		if ($patient_services_grid->isGridAdd()) {
			if ($patient_services->CurrentMode == "copy") {
				$patient_services_grid->loadRowValues($patient_services_grid->Recordset); // Load row values
				$patient_services_grid->setRecordKey($patient_services_grid->RowOldKey, $patient_services_grid->Recordset); // Set old record key
			} else {
				$patient_services_grid->loadRowValues(); // Load default values
				$patient_services_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_services_grid->loadRowValues($patient_services_grid->Recordset); // Load row values
		}
		$patient_services->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_services_grid->isGridAdd()) // Grid add
			$patient_services->RowType = ROWTYPE_ADD; // Render add
		if ($patient_services_grid->isGridAdd() && $patient_services->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_services_grid->restoreCurrentRowFormValues($patient_services_grid->RowIndex); // Restore form values
		if ($patient_services_grid->isGridEdit()) { // Grid edit
			if ($patient_services->EventCancelled)
				$patient_services_grid->restoreCurrentRowFormValues($patient_services_grid->RowIndex); // Restore form values
			if ($patient_services_grid->RowAction == "insert")
				$patient_services->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_services->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_services_grid->isGridEdit() && ($patient_services->RowType == ROWTYPE_EDIT || $patient_services->RowType == ROWTYPE_ADD) && $patient_services->EventCancelled) // Update failed
			$patient_services_grid->restoreCurrentRowFormValues($patient_services_grid->RowIndex); // Restore form values
		if ($patient_services->RowType == ROWTYPE_EDIT) // Edit row
			$patient_services_grid->EditRowCount++;
		if ($patient_services->isConfirm()) // Confirm row
			$patient_services_grid->restoreCurrentRowFormValues($patient_services_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_services->RowAttrs->merge(["data-rowindex" => $patient_services_grid->RowCount, "id" => "r" . $patient_services_grid->RowCount . "_patient_services", "data-rowtype" => $patient_services->RowType]);

		// Render row
		$patient_services_grid->renderRow();

		// Render list options
		$patient_services_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_services_grid->RowAction != "delete" && $patient_services_grid->RowAction != "insertdelete" && !($patient_services_grid->RowAction == "insert" && $patient_services->isConfirm() && $patient_services_grid->emptyRow())) {
?>
	<tr <?php echo $patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_services_grid->ListOptions->render("body", "left", $patient_services_grid->RowCount);
?>
	<?php if ($patient_services_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_services_grid->id->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_id" class="form-group"></span>
<input type="hidden" data-table="patient_services" data-field="x_id" name="o<?php echo $patient_services_grid->RowIndex ?>_id" id="o<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_id" class="form-group">
<span<?php echo $patient_services_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_id" name="x<?php echo $patient_services_grid->RowIndex ?>_id" id="x<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_id">
<span<?php echo $patient_services_grid->id->viewAttributes() ?>><?php echo $patient_services_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_id" name="x<?php echo $patient_services_grid->RowIndex ?>_id" id="x<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_id" name="o<?php echo $patient_services_grid->RowIndex ?>_id" id="o<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_id" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_id" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_id" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_id" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_services_grid->Reception->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services_grid->Reception->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Reception" class="form-group">
<span<?php echo $patient_services_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Reception" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Reception->EditValue ?>"<?php echo $patient_services_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="o<?php echo $patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Reception" class="form-group">
<span<?php echo $patient_services_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Reception">
<span<?php echo $patient_services_grid->Reception->viewAttributes() ?>><?php echo $patient_services_grid->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="o<?php echo $patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_grid->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Reception" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Services->Visible) { // Services ?>
		<td data-name="Services" <?php echo $patient_services_grid->Services->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Services" class="form-group">
<?php
$onchange = $patient_services_grid->Services->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_services_grid->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_services_grid->RowIndex ?>_Services">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($patient_services_grid->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services_grid->Services->getPlaceHolder()) ?>"<?php echo $patient_services_grid->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services_grid->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_Services" id="x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_grid->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_servicesgrid"], function() {
	fpatient_servicesgrid.createAutoSuggest({"id":"x<?php echo $patient_services_grid->RowIndex ?>_Services","forceSelect":true});
});
</script>
<?php echo $patient_services_grid->Services->Lookup->getParamTag($patient_services_grid, "p_x" . $patient_services_grid->RowIndex . "_Services") ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="o<?php echo $patient_services_grid->RowIndex ?>_Services" id="o<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_grid->Services->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Services" class="form-group">
<?php
$onchange = $patient_services_grid->Services->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_services_grid->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_services_grid->RowIndex ?>_Services">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($patient_services_grid->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services_grid->Services->getPlaceHolder()) ?>"<?php echo $patient_services_grid->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services_grid->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_Services" id="x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_grid->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_servicesgrid"], function() {
	fpatient_servicesgrid.createAutoSuggest({"id":"x<?php echo $patient_services_grid->RowIndex ?>_Services","forceSelect":true});
});
</script>
<?php echo $patient_services_grid->Services->Lookup->getParamTag($patient_services_grid, "p_x" . $patient_services_grid->RowIndex . "_Services") ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Services">
<span<?php echo $patient_services_grid->Services->viewAttributes() ?>><?php echo $patient_services_grid->Services->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="x<?php echo $patient_services_grid->RowIndex ?>_Services" id="x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_grid->Services->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Services" name="o<?php echo $patient_services_grid->RowIndex ?>_Services" id="o<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_grid->Services->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Services" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_grid->Services->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Services" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Services" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_grid->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->amount->Visible) { // amount ?>
		<td data-name="amount" <?php echo $patient_services_grid->amount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_amount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_grid->RowIndex ?>_amount" id="x<?php echo $patient_services_grid->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_grid->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->amount->EditValue ?>"<?php echo $patient_services_grid->amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="o<?php echo $patient_services_grid->RowIndex ?>_amount" id="o<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services_grid->amount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_amount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_grid->RowIndex ?>_amount" id="x<?php echo $patient_services_grid->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_grid->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->amount->EditValue ?>"<?php echo $patient_services_grid->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_amount">
<span<?php echo $patient_services_grid->amount->viewAttributes() ?>><?php echo $patient_services_grid->amount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_grid->RowIndex ?>_amount" id="x<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services_grid->amount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_amount" name="o<?php echo $patient_services_grid->RowIndex ?>_amount" id="o<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services_grid->amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_amount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services_grid->amount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_amount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_amount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services_grid->amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->description->Visible) { // description ?>
		<td data-name="description" <?php echo $patient_services_grid->description->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_description" class="form-group">
<input type="text" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_grid->RowIndex ?>_description" id="x<?php echo $patient_services_grid->RowIndex ?>_description" placeholder="<?php echo HtmlEncode($patient_services_grid->description->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->description->EditValue ?>"<?php echo $patient_services_grid->description->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_description" name="o<?php echo $patient_services_grid->RowIndex ?>_description" id="o<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services_grid->description->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_description" class="form-group">
<input type="text" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_grid->RowIndex ?>_description" id="x<?php echo $patient_services_grid->RowIndex ?>_description" placeholder="<?php echo HtmlEncode($patient_services_grid->description->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->description->EditValue ?>"<?php echo $patient_services_grid->description->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_description">
<span<?php echo $patient_services_grid->description->viewAttributes() ?>><?php echo $patient_services_grid->description->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_grid->RowIndex ?>_description" id="x<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services_grid->description->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_description" name="o<?php echo $patient_services_grid->RowIndex ?>_description" id="o<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services_grid->description->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_description" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_description" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services_grid->description->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_description" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_description" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services_grid->description->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" <?php echo $patient_services_grid->patient_type->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_patient_type" class="form-group">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->patient_type->EditValue ?>"<?php echo $patient_services_grid->patient_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services_grid->patient_type->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_patient_type" class="form-group">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->patient_type->EditValue ?>"<?php echo $patient_services_grid->patient_type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_patient_type">
<span<?php echo $patient_services_grid->patient_type->viewAttributes() ?>><?php echo $patient_services_grid->patient_type->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services_grid->patient_type->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services_grid->patient_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services_grid->patient_type->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services_grid->patient_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" <?php echo $patient_services_grid->charged_date->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services_grid->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_charged_date">
<span<?php echo $patient_services_grid->charged_date->viewAttributes() ?>><?php echo $patient_services_grid->charged_date->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="x<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services_grid->charged_date->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services_grid->charged_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services_grid->charged_date->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services_grid->charged_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_services_grid->status->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_services_grid->RowIndex ?>_status" name="x<?php echo $patient_services_grid->RowIndex ?>_status"<?php echo $patient_services_grid->status->editAttributes() ?>>
			<?php echo $patient_services_grid->status->selectOptionListHtml("x{$patient_services_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_services_grid->status->Lookup->getParamTag($patient_services_grid, "p_x" . $patient_services_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_status" name="o<?php echo $patient_services_grid->RowIndex ?>_status" id="o<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_services_grid->RowIndex ?>_status" name="x<?php echo $patient_services_grid->RowIndex ?>_status"<?php echo $patient_services_grid->status->editAttributes() ?>>
			<?php echo $patient_services_grid->status->selectOptionListHtml("x{$patient_services_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_services_grid->status->Lookup->getParamTag($patient_services_grid, "p_x" . $patient_services_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_status">
<span<?php echo $patient_services_grid->status->viewAttributes() ?>><?php echo $patient_services_grid->status->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_status" name="x<?php echo $patient_services_grid->RowIndex ?>_status" id="x<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_status" name="o<?php echo $patient_services_grid->RowIndex ?>_status" id="o<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_status" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_status" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_status" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_status" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_services_grid->mrnno->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_mrnno" class="form-group">
<span<?php echo $patient_services_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_mrnno" class="form-group">
<input type="text" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->mrnno->EditValue ?>"<?php echo $patient_services_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_mrnno" class="form-group">
<span<?php echo $patient_services_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_mrnno">
<span<?php echo $patient_services_grid->mrnno->viewAttributes() ?>><?php echo $patient_services_grid->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_grid->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_services_grid->PatientName->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PatientName" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PatientName->EditValue ?>"<?php echo $patient_services_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PatientName" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PatientName->EditValue ?>"<?php echo $patient_services_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PatientName">
<span<?php echo $patient_services_grid->PatientName->viewAttributes() ?>><?php echo $patient_services_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_services_grid->Age->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Age" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_grid->RowIndex ?>_Age" id="x<?php echo $patient_services_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Age->EditValue ?>"<?php echo $patient_services_grid->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="o<?php echo $patient_services_grid->RowIndex ?>_Age" id="o<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services_grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Age" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_grid->RowIndex ?>_Age" id="x<?php echo $patient_services_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Age->EditValue ?>"<?php echo $patient_services_grid->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Age">
<span<?php echo $patient_services_grid->Age->viewAttributes() ?>><?php echo $patient_services_grid->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_grid->RowIndex ?>_Age" id="x<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Age" name="o<?php echo $patient_services_grid->RowIndex ?>_Age" id="o<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services_grid->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Age" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Age" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Age" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services_grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_services_grid->Gender->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Gender" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $patient_services_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Gender->EditValue ?>"<?php echo $patient_services_grid->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="o<?php echo $patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services_grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Gender" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $patient_services_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Gender->EditValue ?>"<?php echo $patient_services_grid->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Gender">
<span<?php echo $patient_services_grid->Gender->viewAttributes() ?>><?php echo $patient_services_grid->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="o<?php echo $patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services_grid->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Gender" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services_grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Unit->Visible) { // Unit ?>
		<td data-name="Unit" <?php echo $patient_services_grid->Unit->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Unit" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $patient_services_grid->RowIndex ?>_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Unit->EditValue ?>"<?php echo $patient_services_grid->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="o<?php echo $patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services_grid->Unit->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Unit" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $patient_services_grid->RowIndex ?>_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Unit->EditValue ?>"<?php echo $patient_services_grid->Unit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Unit">
<span<?php echo $patient_services_grid->Unit->viewAttributes() ?>><?php echo $patient_services_grid->Unit->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services_grid->Unit->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="o<?php echo $patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services_grid->Unit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services_grid->Unit->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Unit" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services_grid->Unit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $patient_services_grid->Quantity->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Quantity" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Quantity->EditValue ?>"<?php echo $patient_services_grid->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Quantity" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Quantity->EditValue ?>"<?php echo $patient_services_grid->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Quantity">
<span<?php echo $patient_services_grid->Quantity->viewAttributes() ?>><?php echo $patient_services_grid->Quantity->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services_grid->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Discount->Visible) { // Discount ?>
		<td data-name="Discount" <?php echo $patient_services_grid->Discount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Discount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $patient_services_grid->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_grid->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Discount->EditValue ?>"<?php echo $patient_services_grid->Discount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="o<?php echo $patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services_grid->Discount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Discount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $patient_services_grid->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_grid->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Discount->EditValue ?>"<?php echo $patient_services_grid->Discount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Discount">
<span<?php echo $patient_services_grid->Discount->viewAttributes() ?>><?php echo $patient_services_grid->Discount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services_grid->Discount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="o<?php echo $patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services_grid->Discount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services_grid->Discount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Discount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services_grid->Discount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" <?php echo $patient_services_grid->SubTotal->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SubTotal" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_grid->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SubTotal->EditValue ?>"<?php echo $patient_services_grid->SubTotal->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services_grid->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SubTotal" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_grid->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SubTotal->EditValue ?>"<?php echo $patient_services_grid->SubTotal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SubTotal">
<span<?php echo $patient_services_grid->SubTotal->viewAttributes() ?>><?php echo $patient_services_grid->SubTotal->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services_grid->SubTotal->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services_grid->SubTotal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services_grid->SubTotal->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services_grid->SubTotal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ServiceSelect->Visible) { // ServiceSelect ?>
		<td data-name="ServiceSelect" <?php echo $patient_services_grid->ServiceSelect->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ServiceSelect" class="form-group">
<div id="tp_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services_grid->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="{value}"<?php echo $patient_services_grid->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services_grid->ServiceSelect->checkBoxListHtml(FALSE, "x{$patient_services_grid->RowIndex}_ServiceSelect[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="<?php echo HtmlEncode($patient_services_grid->ServiceSelect->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ServiceSelect" class="form-group">
<div id="tp_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services_grid->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="{value}"<?php echo $patient_services_grid->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services_grid->ServiceSelect->checkBoxListHtml(FALSE, "x{$patient_services_grid->RowIndex}_ServiceSelect[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ServiceSelect">
<span<?php echo $patient_services_grid->ServiceSelect->viewAttributes() ?>><?php echo $patient_services_grid->ServiceSelect->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" id="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" value="<?php echo HtmlEncode($patient_services_grid->ServiceSelect->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="<?php echo HtmlEncode($patient_services_grid->ServiceSelect->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" value="<?php echo HtmlEncode($patient_services_grid->ServiceSelect->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="<?php echo HtmlEncode($patient_services_grid->ServiceSelect->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Aid->Visible) { // Aid ?>
		<td data-name="Aid" <?php echo $patient_services_grid->Aid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Aid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $patient_services_grid->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Aid->EditValue ?>"<?php echo $patient_services_grid->Aid->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="o<?php echo $patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services_grid->Aid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Aid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $patient_services_grid->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Aid->EditValue ?>"<?php echo $patient_services_grid->Aid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Aid">
<span<?php echo $patient_services_grid->Aid->viewAttributes() ?>><?php echo $patient_services_grid->Aid->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services_grid->Aid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="o<?php echo $patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services_grid->Aid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services_grid->Aid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Aid" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services_grid->Aid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Vid->Visible) { // Vid ?>
		<td data-name="Vid" <?php echo $patient_services_grid->Vid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services_grid->Vid->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Vid" class="form-group">
<span<?php echo $patient_services_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_grid->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Vid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Vid->EditValue ?>"<?php echo $patient_services_grid->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="o<?php echo $patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_grid->Vid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_services_grid->Vid->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Vid" class="form-group">
<span<?php echo $patient_services_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_grid->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Vid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Vid->EditValue ?>"<?php echo $patient_services_grid->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Vid">
<span<?php echo $patient_services_grid->Vid->viewAttributes() ?>><?php echo $patient_services_grid->Vid->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_grid->Vid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="o<?php echo $patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_grid->Vid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_grid->Vid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Vid" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_grid->Vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $patient_services_grid->DrID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $patient_services_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrID->EditValue ?>"<?php echo $patient_services_grid->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="o<?php echo $patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services_grid->DrID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $patient_services_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrID->EditValue ?>"<?php echo $patient_services_grid->DrID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrID">
<span<?php echo $patient_services_grid->DrID->viewAttributes() ?>><?php echo $patient_services_grid->DrID->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services_grid->DrID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="o<?php echo $patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services_grid->DrID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services_grid->DrID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrID" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services_grid->DrID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" <?php echo $patient_services_grid->DrCODE->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrCODE" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrCODE->EditValue ?>"<?php echo $patient_services_grid->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services_grid->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrCODE" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrCODE->EditValue ?>"<?php echo $patient_services_grid->DrCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrCODE">
<span<?php echo $patient_services_grid->DrCODE->viewAttributes() ?>><?php echo $patient_services_grid->DrCODE->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services_grid->DrCODE->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services_grid->DrCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services_grid->DrCODE->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services_grid->DrCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $patient_services_grid->DrName->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrName" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $patient_services_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrName->EditValue ?>"<?php echo $patient_services_grid->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="o<?php echo $patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services_grid->DrName->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrName" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $patient_services_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrName->EditValue ?>"<?php echo $patient_services_grid->DrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrName">
<span<?php echo $patient_services_grid->DrName->viewAttributes() ?>><?php echo $patient_services_grid->DrName->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services_grid->DrName->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="o<?php echo $patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services_grid->DrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services_grid->DrName->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrName" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services_grid->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $patient_services_grid->Department->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Department" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Department->EditValue ?>"<?php echo $patient_services_grid->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services_grid->Department->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Department" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Department->EditValue ?>"<?php echo $patient_services_grid->Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Department">
<span<?php echo $patient_services_grid->Department->viewAttributes() ?>><?php echo $patient_services_grid->Department->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services_grid->Department->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services_grid->Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Department" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services_grid->Department->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Department" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Department" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services_grid->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres" <?php echo $patient_services_grid->DrSharePres->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrSharePres" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrSharePres->EditValue ?>"<?php echo $patient_services_grid->DrSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services_grid->DrSharePres->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrSharePres" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrSharePres->EditValue ?>"<?php echo $patient_services_grid->DrSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrSharePres">
<span<?php echo $patient_services_grid->DrSharePres->viewAttributes() ?>><?php echo $patient_services_grid->DrSharePres->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services_grid->DrSharePres->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services_grid->DrSharePres->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services_grid->DrSharePres->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services_grid->DrSharePres->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres" <?php echo $patient_services_grid->HospSharePres->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_HospSharePres" class="form-group">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->HospSharePres->EditValue ?>"<?php echo $patient_services_grid->HospSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services_grid->HospSharePres->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_HospSharePres" class="form-group">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->HospSharePres->EditValue ?>"<?php echo $patient_services_grid->HospSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_HospSharePres">
<span<?php echo $patient_services_grid->HospSharePres->viewAttributes() ?>><?php echo $patient_services_grid->HospSharePres->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services_grid->HospSharePres->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services_grid->HospSharePres->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services_grid->HospSharePres->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services_grid->HospSharePres->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" <?php echo $patient_services_grid->DrShareAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareAmount->EditValue ?>"<?php echo $patient_services_grid->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareAmount->EditValue ?>"<?php echo $patient_services_grid->DrShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareAmount">
<span<?php echo $patient_services_grid->DrShareAmount->viewAttributes() ?>><?php echo $patient_services_grid->DrShareAmount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" <?php echo $patient_services_grid->HospShareAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_HospShareAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->HospShareAmount->EditValue ?>"<?php echo $patient_services_grid->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services_grid->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_HospShareAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->HospShareAmount->EditValue ?>"<?php echo $patient_services_grid->HospShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_HospShareAmount">
<span<?php echo $patient_services_grid->HospShareAmount->viewAttributes() ?>><?php echo $patient_services_grid->HospShareAmount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services_grid->HospShareAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services_grid->HospShareAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services_grid->HospShareAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services_grid->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount" <?php echo $patient_services_grid->DrShareSettiledAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareSettiledAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services_grid->DrShareSettiledAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareSettiledAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services_grid->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareSettiledAmount">
<span<?php echo $patient_services_grid->DrShareSettiledAmount->viewAttributes() ?>><?php echo $patient_services_grid->DrShareSettiledAmount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId" <?php echo $patient_services_grid->DrShareSettledId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareSettledId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareSettledId->EditValue ?>"<?php echo $patient_services_grid->DrShareSettledId->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareSettledId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareSettledId->EditValue ?>"<?php echo $patient_services_grid->DrShareSettledId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareSettledId">
<span<?php echo $patient_services_grid->DrShareSettledId->viewAttributes() ?>><?php echo $patient_services_grid->DrShareSettledId->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettledId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettledId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettledId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus" <?php echo $patient_services_grid->DrShareSettiledStatus->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareSettiledStatus" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services_grid->DrShareSettiledStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareSettiledStatus" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services_grid->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DrShareSettiledStatus">
<span<?php echo $patient_services_grid->DrShareSettiledStatus->viewAttributes() ?>><?php echo $patient_services_grid->DrShareSettiledStatus->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledStatus->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledStatus->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" <?php echo $patient_services_grid->invoiceId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_invoiceId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->invoiceId->EditValue ?>"<?php echo $patient_services_grid->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services_grid->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_invoiceId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->invoiceId->EditValue ?>"<?php echo $patient_services_grid->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_invoiceId">
<span<?php echo $patient_services_grid->invoiceId->viewAttributes() ?>><?php echo $patient_services_grid->invoiceId->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services_grid->invoiceId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services_grid->invoiceId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services_grid->invoiceId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services_grid->invoiceId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" <?php echo $patient_services_grid->invoiceAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_invoiceAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->invoiceAmount->EditValue ?>"<?php echo $patient_services_grid->invoiceAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services_grid->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_invoiceAmount" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->invoiceAmount->EditValue ?>"<?php echo $patient_services_grid->invoiceAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_invoiceAmount">
<span<?php echo $patient_services_grid->invoiceAmount->viewAttributes() ?>><?php echo $patient_services_grid->invoiceAmount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services_grid->invoiceAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services_grid->invoiceAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services_grid->invoiceAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services_grid->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" <?php echo $patient_services_grid->invoiceStatus->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_invoiceStatus" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->invoiceStatus->EditValue ?>"<?php echo $patient_services_grid->invoiceStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services_grid->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_invoiceStatus" class="form-group">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->invoiceStatus->EditValue ?>"<?php echo $patient_services_grid->invoiceStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_invoiceStatus">
<span<?php echo $patient_services_grid->invoiceStatus->viewAttributes() ?>><?php echo $patient_services_grid->invoiceStatus->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services_grid->invoiceStatus->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services_grid->invoiceStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services_grid->invoiceStatus->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services_grid->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" <?php echo $patient_services_grid->modeOfPayment->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_modeOfPayment" class="form-group">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->modeOfPayment->EditValue ?>"<?php echo $patient_services_grid->modeOfPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services_grid->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_modeOfPayment" class="form-group">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->modeOfPayment->EditValue ?>"<?php echo $patient_services_grid->modeOfPayment->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_modeOfPayment">
<span<?php echo $patient_services_grid->modeOfPayment->viewAttributes() ?>><?php echo $patient_services_grid->modeOfPayment->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services_grid->modeOfPayment->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services_grid->modeOfPayment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services_grid->modeOfPayment->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services_grid->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_services_grid->HospID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="o<?php echo $patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_HospID">
<span<?php echo $patient_services_grid->HospID->viewAttributes() ?>><?php echo $patient_services_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="x<?php echo $patient_services_grid->RowIndex ?>_HospID" id="x<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="o<?php echo $patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospID" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospID" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $patient_services_grid->RIDNO->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RIDNO" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->RIDNO->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->RIDNO->EditValue ?>"<?php echo $patient_services_grid->RIDNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services_grid->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RIDNO" class="form-group">
<span<?php echo $patient_services_grid->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->RIDNO->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services_grid->RIDNO->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RIDNO">
<span<?php echo $patient_services_grid->RIDNO->viewAttributes() ?>><?php echo $patient_services_grid->RIDNO->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services_grid->RIDNO->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services_grid->RIDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services_grid->RIDNO->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services_grid->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $patient_services_grid->TidNo->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TidNo" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TidNo->EditValue ?>"<?php echo $patient_services_grid->TidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services_grid->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TidNo" class="form-group">
<span<?php echo $patient_services_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->TidNo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services_grid->TidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TidNo">
<span<?php echo $patient_services_grid->TidNo->viewAttributes() ?>><?php echo $patient_services_grid->TidNo->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services_grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services_grid->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services_grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services_grid->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory" <?php echo $patient_services_grid->DiscountCategory->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DiscountCategory" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DiscountCategory->EditValue ?>"<?php echo $patient_services_grid->DiscountCategory->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services_grid->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DiscountCategory" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DiscountCategory->EditValue ?>"<?php echo $patient_services_grid->DiscountCategory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DiscountCategory">
<span<?php echo $patient_services_grid->DiscountCategory->viewAttributes() ?>><?php echo $patient_services_grid->DiscountCategory->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services_grid->DiscountCategory->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services_grid->DiscountCategory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services_grid->DiscountCategory->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services_grid->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->sid->Visible) { // sid ?>
		<td data-name="sid" <?php echo $patient_services_grid->sid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_sid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_grid->RowIndex ?>_sid" id="x<?php echo $patient_services_grid->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_grid->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->sid->EditValue ?>"<?php echo $patient_services_grid->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="o<?php echo $patient_services_grid->RowIndex ?>_sid" id="o<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services_grid->sid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_sid" class="form-group">
<input type="text" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_grid->RowIndex ?>_sid" id="x<?php echo $patient_services_grid->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_grid->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->sid->EditValue ?>"<?php echo $patient_services_grid->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_sid">
<span<?php echo $patient_services_grid->sid->viewAttributes() ?>><?php echo $patient_services_grid->sid->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_grid->RowIndex ?>_sid" id="x<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services_grid->sid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_sid" name="o<?php echo $patient_services_grid->RowIndex ?>_sid" id="o<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services_grid->sid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_sid" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services_grid->sid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_sid" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_sid" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services_grid->sid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" <?php echo $patient_services_grid->ItemCode->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ItemCode" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ItemCode->EditValue ?>"<?php echo $patient_services_grid->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services_grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ItemCode" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ItemCode->EditValue ?>"<?php echo $patient_services_grid->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ItemCode">
<span<?php echo $patient_services_grid->ItemCode->viewAttributes() ?>><?php echo $patient_services_grid->ItemCode->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services_grid->ItemCode->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services_grid->ItemCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services_grid->ItemCode->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services_grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" <?php echo $patient_services_grid->TestSubCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestSubCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestSubCd->EditValue ?>"<?php echo $patient_services_grid->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services_grid->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestSubCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestSubCd->EditValue ?>"<?php echo $patient_services_grid->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestSubCd">
<span<?php echo $patient_services_grid->TestSubCd->viewAttributes() ?>><?php echo $patient_services_grid->TestSubCd->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services_grid->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services_grid->TestSubCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services_grid->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services_grid->TestSubCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" <?php echo $patient_services_grid->DEptCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DEptCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DEptCd->EditValue ?>"<?php echo $patient_services_grid->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services_grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DEptCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DEptCd->EditValue ?>"<?php echo $patient_services_grid->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DEptCd">
<span<?php echo $patient_services_grid->DEptCd->viewAttributes() ?>><?php echo $patient_services_grid->DEptCd->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services_grid->DEptCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services_grid->DEptCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services_grid->DEptCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services_grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" <?php echo $patient_services_grid->ProfCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ProfCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ProfCd->EditValue ?>"<?php echo $patient_services_grid->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services_grid->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ProfCd" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ProfCd->EditValue ?>"<?php echo $patient_services_grid->ProfCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ProfCd">
<span<?php echo $patient_services_grid->ProfCd->viewAttributes() ?>><?php echo $patient_services_grid->ProfCd->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services_grid->ProfCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services_grid->ProfCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services_grid->ProfCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services_grid->ProfCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Comments->Visible) { // Comments ?>
		<td data-name="Comments" <?php echo $patient_services_grid->Comments->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Comments" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Comments->EditValue ?>"<?php echo $patient_services_grid->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="o<?php echo $patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services_grid->Comments->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Comments" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Comments->EditValue ?>"<?php echo $patient_services_grid->Comments->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Comments">
<span<?php echo $patient_services_grid->Comments->viewAttributes() ?>><?php echo $patient_services_grid->Comments->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services_grid->Comments->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="o<?php echo $patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services_grid->Comments->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services_grid->Comments->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Comments" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services_grid->Comments->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $patient_services_grid->Method->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Method" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_grid->RowIndex ?>_Method" id="x<?php echo $patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Method->EditValue ?>"<?php echo $patient_services_grid->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="o<?php echo $patient_services_grid->RowIndex ?>_Method" id="o<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services_grid->Method->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Method" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_grid->RowIndex ?>_Method" id="x<?php echo $patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Method->EditValue ?>"<?php echo $patient_services_grid->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Method">
<span<?php echo $patient_services_grid->Method->viewAttributes() ?>><?php echo $patient_services_grid->Method->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_grid->RowIndex ?>_Method" id="x<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services_grid->Method->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Method" name="o<?php echo $patient_services_grid->RowIndex ?>_Method" id="o<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services_grid->Method->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Method" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services_grid->Method->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Method" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Method" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services_grid->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" <?php echo $patient_services_grid->Specimen->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Specimen" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Specimen->EditValue ?>"<?php echo $patient_services_grid->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services_grid->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Specimen" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Specimen->EditValue ?>"<?php echo $patient_services_grid->Specimen->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Specimen">
<span<?php echo $patient_services_grid->Specimen->viewAttributes() ?>><?php echo $patient_services_grid->Specimen->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services_grid->Specimen->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services_grid->Specimen->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services_grid->Specimen->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services_grid->Specimen->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" <?php echo $patient_services_grid->Abnormal->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Abnormal" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Abnormal->EditValue ?>"<?php echo $patient_services_grid->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services_grid->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Abnormal" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Abnormal->EditValue ?>"<?php echo $patient_services_grid->Abnormal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Abnormal">
<span<?php echo $patient_services_grid->Abnormal->viewAttributes() ?>><?php echo $patient_services_grid->Abnormal->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services_grid->Abnormal->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services_grid->Abnormal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services_grid->Abnormal->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services_grid->Abnormal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" <?php echo $patient_services_grid->TestUnit->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestUnit" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestUnit->EditValue ?>"<?php echo $patient_services_grid->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services_grid->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestUnit" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestUnit->EditValue ?>"<?php echo $patient_services_grid->TestUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestUnit">
<span<?php echo $patient_services_grid->TestUnit->viewAttributes() ?>><?php echo $patient_services_grid->TestUnit->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services_grid->TestUnit->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services_grid->TestUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services_grid->TestUnit->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services_grid->TestUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" <?php echo $patient_services_grid->LOWHIGH->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_LOWHIGH" class="form-group">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->LOWHIGH->EditValue ?>"<?php echo $patient_services_grid->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services_grid->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_LOWHIGH" class="form-group">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->LOWHIGH->EditValue ?>"<?php echo $patient_services_grid->LOWHIGH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_LOWHIGH">
<span<?php echo $patient_services_grid->LOWHIGH->viewAttributes() ?>><?php echo $patient_services_grid->LOWHIGH->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services_grid->LOWHIGH->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services_grid->LOWHIGH->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services_grid->LOWHIGH->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services_grid->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Branch->Visible) { // Branch ?>
		<td data-name="Branch" <?php echo $patient_services_grid->Branch->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Branch" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Branch->EditValue ?>"<?php echo $patient_services_grid->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="o<?php echo $patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services_grid->Branch->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Branch" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Branch->EditValue ?>"<?php echo $patient_services_grid->Branch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Branch">
<span<?php echo $patient_services_grid->Branch->viewAttributes() ?>><?php echo $patient_services_grid->Branch->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services_grid->Branch->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="o<?php echo $patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services_grid->Branch->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services_grid->Branch->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Branch" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services_grid->Branch->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" <?php echo $patient_services_grid->Dispatch->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Dispatch" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Dispatch->EditValue ?>"<?php echo $patient_services_grid->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services_grid->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Dispatch" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Dispatch->EditValue ?>"<?php echo $patient_services_grid->Dispatch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Dispatch">
<span<?php echo $patient_services_grid->Dispatch->viewAttributes() ?>><?php echo $patient_services_grid->Dispatch->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services_grid->Dispatch->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services_grid->Dispatch->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services_grid->Dispatch->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services_grid->Dispatch->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" <?php echo $patient_services_grid->Pic1->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Pic1" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Pic1->EditValue ?>"<?php echo $patient_services_grid->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services_grid->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Pic1" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Pic1->EditValue ?>"<?php echo $patient_services_grid->Pic1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Pic1">
<span<?php echo $patient_services_grid->Pic1->viewAttributes() ?>><?php echo $patient_services_grid->Pic1->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services_grid->Pic1->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services_grid->Pic1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services_grid->Pic1->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services_grid->Pic1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" <?php echo $patient_services_grid->Pic2->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Pic2" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Pic2->EditValue ?>"<?php echo $patient_services_grid->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services_grid->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Pic2" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Pic2->EditValue ?>"<?php echo $patient_services_grid->Pic2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Pic2">
<span<?php echo $patient_services_grid->Pic2->viewAttributes() ?>><?php echo $patient_services_grid->Pic2->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services_grid->Pic2->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services_grid->Pic2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services_grid->Pic2->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services_grid->Pic2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" <?php echo $patient_services_grid->GraphPath->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_GraphPath" class="form-group">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->GraphPath->EditValue ?>"<?php echo $patient_services_grid->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services_grid->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_GraphPath" class="form-group">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->GraphPath->EditValue ?>"<?php echo $patient_services_grid->GraphPath->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_GraphPath">
<span<?php echo $patient_services_grid->GraphPath->viewAttributes() ?>><?php echo $patient_services_grid->GraphPath->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services_grid->GraphPath->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services_grid->GraphPath->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services_grid->GraphPath->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services_grid->GraphPath->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" <?php echo $patient_services_grid->MachineCD->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_MachineCD" class="form-group">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->MachineCD->EditValue ?>"<?php echo $patient_services_grid->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services_grid->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_MachineCD" class="form-group">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->MachineCD->EditValue ?>"<?php echo $patient_services_grid->MachineCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_MachineCD">
<span<?php echo $patient_services_grid->MachineCD->viewAttributes() ?>><?php echo $patient_services_grid->MachineCD->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services_grid->MachineCD->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services_grid->MachineCD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services_grid->MachineCD->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services_grid->MachineCD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" <?php echo $patient_services_grid->TestCancel->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestCancel" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestCancel->EditValue ?>"<?php echo $patient_services_grid->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services_grid->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestCancel" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestCancel->EditValue ?>"<?php echo $patient_services_grid->TestCancel->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestCancel">
<span<?php echo $patient_services_grid->TestCancel->viewAttributes() ?>><?php echo $patient_services_grid->TestCancel->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services_grid->TestCancel->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services_grid->TestCancel->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services_grid->TestCancel->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services_grid->TestCancel->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" <?php echo $patient_services_grid->OutSource->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_OutSource" class="form-group">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->OutSource->EditValue ?>"<?php echo $patient_services_grid->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services_grid->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_OutSource" class="form-group">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->OutSource->EditValue ?>"<?php echo $patient_services_grid->OutSource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_OutSource">
<span<?php echo $patient_services_grid->OutSource->viewAttributes() ?>><?php echo $patient_services_grid->OutSource->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services_grid->OutSource->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services_grid->OutSource->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services_grid->OutSource->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services_grid->OutSource->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Printed->Visible) { // Printed ?>
		<td data-name="Printed" <?php echo $patient_services_grid->Printed->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Printed" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Printed->EditValue ?>"<?php echo $patient_services_grid->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="o<?php echo $patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services_grid->Printed->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Printed" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Printed->EditValue ?>"<?php echo $patient_services_grid->Printed->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Printed">
<span<?php echo $patient_services_grid->Printed->viewAttributes() ?>><?php echo $patient_services_grid->Printed->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services_grid->Printed->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="o<?php echo $patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services_grid->Printed->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services_grid->Printed->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Printed" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services_grid->Printed->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" <?php echo $patient_services_grid->PrintBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PrintBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PrintBy->EditValue ?>"<?php echo $patient_services_grid->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services_grid->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PrintBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PrintBy->EditValue ?>"<?php echo $patient_services_grid->PrintBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PrintBy">
<span<?php echo $patient_services_grid->PrintBy->viewAttributes() ?>><?php echo $patient_services_grid->PrintBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services_grid->PrintBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services_grid->PrintBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services_grid->PrintBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services_grid->PrintBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" <?php echo $patient_services_grid->PrintDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PrintDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($patient_services_grid->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PrintDate->EditValue ?>"<?php echo $patient_services_grid->PrintDate->editAttributes() ?>>
<?php if (!$patient_services_grid->PrintDate->ReadOnly && !$patient_services_grid->PrintDate->Disabled && !isset($patient_services_grid->PrintDate->EditAttrs["readonly"]) && !isset($patient_services_grid->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services_grid->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PrintDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($patient_services_grid->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PrintDate->EditValue ?>"<?php echo $patient_services_grid->PrintDate->editAttributes() ?>>
<?php if (!$patient_services_grid->PrintDate->ReadOnly && !$patient_services_grid->PrintDate->Disabled && !isset($patient_services_grid->PrintDate->EditAttrs["readonly"]) && !isset($patient_services_grid->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PrintDate">
<span<?php echo $patient_services_grid->PrintDate->viewAttributes() ?>><?php echo $patient_services_grid->PrintDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services_grid->PrintDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services_grid->PrintDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services_grid->PrintDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services_grid->PrintDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate" <?php echo $patient_services_grid->BillingDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_BillingDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($patient_services_grid->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->BillingDate->EditValue ?>"<?php echo $patient_services_grid->BillingDate->editAttributes() ?>>
<?php if (!$patient_services_grid->BillingDate->ReadOnly && !$patient_services_grid->BillingDate->Disabled && !isset($patient_services_grid->BillingDate->EditAttrs["readonly"]) && !isset($patient_services_grid->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services_grid->BillingDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_BillingDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($patient_services_grid->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->BillingDate->EditValue ?>"<?php echo $patient_services_grid->BillingDate->editAttributes() ?>>
<?php if (!$patient_services_grid->BillingDate->ReadOnly && !$patient_services_grid->BillingDate->Disabled && !isset($patient_services_grid->BillingDate->EditAttrs["readonly"]) && !isset($patient_services_grid->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_BillingDate">
<span<?php echo $patient_services_grid->BillingDate->viewAttributes() ?>><?php echo $patient_services_grid->BillingDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services_grid->BillingDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services_grid->BillingDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services_grid->BillingDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services_grid->BillingDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy" <?php echo $patient_services_grid->BilledBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_BilledBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->BilledBy->EditValue ?>"<?php echo $patient_services_grid->BilledBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services_grid->BilledBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_BilledBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->BilledBy->EditValue ?>"<?php echo $patient_services_grid->BilledBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_BilledBy">
<span<?php echo $patient_services_grid->BilledBy->viewAttributes() ?>><?php echo $patient_services_grid->BilledBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services_grid->BilledBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services_grid->BilledBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services_grid->BilledBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services_grid->BilledBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" <?php echo $patient_services_grid->Resulted->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Resulted" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Resulted->EditValue ?>"<?php echo $patient_services_grid->Resulted->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services_grid->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Resulted" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Resulted->EditValue ?>"<?php echo $patient_services_grid->Resulted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Resulted">
<span<?php echo $patient_services_grid->Resulted->viewAttributes() ?>><?php echo $patient_services_grid->Resulted->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services_grid->Resulted->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services_grid->Resulted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services_grid->Resulted->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services_grid->Resulted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $patient_services_grid->ResultDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ResultDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($patient_services_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ResultDate->EditValue ?>"<?php echo $patient_services_grid->ResultDate->editAttributes() ?>>
<?php if (!$patient_services_grid->ResultDate->ReadOnly && !$patient_services_grid->ResultDate->Disabled && !isset($patient_services_grid->ResultDate->EditAttrs["readonly"]) && !isset($patient_services_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services_grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ResultDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($patient_services_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ResultDate->EditValue ?>"<?php echo $patient_services_grid->ResultDate->editAttributes() ?>>
<?php if (!$patient_services_grid->ResultDate->ReadOnly && !$patient_services_grid->ResultDate->Disabled && !isset($patient_services_grid->ResultDate->EditAttrs["readonly"]) && !isset($patient_services_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ResultDate">
<span<?php echo $patient_services_grid->ResultDate->viewAttributes() ?>><?php echo $patient_services_grid->ResultDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services_grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services_grid->ResultDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services_grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services_grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" <?php echo $patient_services_grid->ResultedBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ResultedBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ResultedBy->EditValue ?>"<?php echo $patient_services_grid->ResultedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services_grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ResultedBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ResultedBy->EditValue ?>"<?php echo $patient_services_grid->ResultedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ResultedBy">
<span<?php echo $patient_services_grid->ResultedBy->viewAttributes() ?>><?php echo $patient_services_grid->ResultedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services_grid->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services_grid->ResultedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services_grid->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services_grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" <?php echo $patient_services_grid->SampleDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SampleDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($patient_services_grid->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SampleDate->EditValue ?>"<?php echo $patient_services_grid->SampleDate->editAttributes() ?>>
<?php if (!$patient_services_grid->SampleDate->ReadOnly && !$patient_services_grid->SampleDate->Disabled && !isset($patient_services_grid->SampleDate->EditAttrs["readonly"]) && !isset($patient_services_grid->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services_grid->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SampleDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($patient_services_grid->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SampleDate->EditValue ?>"<?php echo $patient_services_grid->SampleDate->editAttributes() ?>>
<?php if (!$patient_services_grid->SampleDate->ReadOnly && !$patient_services_grid->SampleDate->Disabled && !isset($patient_services_grid->SampleDate->EditAttrs["readonly"]) && !isset($patient_services_grid->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SampleDate">
<span<?php echo $patient_services_grid->SampleDate->viewAttributes() ?>><?php echo $patient_services_grid->SampleDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services_grid->SampleDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services_grid->SampleDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services_grid->SampleDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services_grid->SampleDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" <?php echo $patient_services_grid->SampleUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SampleUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SampleUser->EditValue ?>"<?php echo $patient_services_grid->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services_grid->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SampleUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SampleUser->EditValue ?>"<?php echo $patient_services_grid->SampleUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SampleUser">
<span<?php echo $patient_services_grid->SampleUser->viewAttributes() ?>><?php echo $patient_services_grid->SampleUser->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services_grid->SampleUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services_grid->SampleUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services_grid->SampleUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services_grid->SampleUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled" <?php echo $patient_services_grid->Sampled->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Sampled" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Sampled->EditValue ?>"<?php echo $patient_services_grid->Sampled->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services_grid->Sampled->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Sampled" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Sampled->EditValue ?>"<?php echo $patient_services_grid->Sampled->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Sampled">
<span<?php echo $patient_services_grid->Sampled->viewAttributes() ?>><?php echo $patient_services_grid->Sampled->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services_grid->Sampled->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services_grid->Sampled->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services_grid->Sampled->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services_grid->Sampled->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" <?php echo $patient_services_grid->ReceivedDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ReceivedDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services_grid->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ReceivedDate->EditValue ?>"<?php echo $patient_services_grid->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services_grid->ReceivedDate->ReadOnly && !$patient_services_grid->ReceivedDate->Disabled && !isset($patient_services_grid->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services_grid->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services_grid->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ReceivedDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services_grid->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ReceivedDate->EditValue ?>"<?php echo $patient_services_grid->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services_grid->ReceivedDate->ReadOnly && !$patient_services_grid->ReceivedDate->Disabled && !isset($patient_services_grid->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services_grid->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ReceivedDate">
<span<?php echo $patient_services_grid->ReceivedDate->viewAttributes() ?>><?php echo $patient_services_grid->ReceivedDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services_grid->ReceivedDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services_grid->ReceivedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services_grid->ReceivedDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services_grid->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" <?php echo $patient_services_grid->ReceivedUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ReceivedUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ReceivedUser->EditValue ?>"<?php echo $patient_services_grid->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services_grid->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ReceivedUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ReceivedUser->EditValue ?>"<?php echo $patient_services_grid->ReceivedUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ReceivedUser">
<span<?php echo $patient_services_grid->ReceivedUser->viewAttributes() ?>><?php echo $patient_services_grid->ReceivedUser->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services_grid->ReceivedUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services_grid->ReceivedUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services_grid->ReceivedUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services_grid->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied" <?php echo $patient_services_grid->Recevied->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Recevied" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Recevied->EditValue ?>"<?php echo $patient_services_grid->Recevied->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services_grid->Recevied->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Recevied" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Recevied->EditValue ?>"<?php echo $patient_services_grid->Recevied->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Recevied">
<span<?php echo $patient_services_grid->Recevied->viewAttributes() ?>><?php echo $patient_services_grid->Recevied->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services_grid->Recevied->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services_grid->Recevied->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services_grid->Recevied->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services_grid->Recevied->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" <?php echo $patient_services_grid->DeptRecvDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DeptRecvDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services_grid->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DeptRecvDate->EditValue ?>"<?php echo $patient_services_grid->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services_grid->DeptRecvDate->ReadOnly && !$patient_services_grid->DeptRecvDate->Disabled && !isset($patient_services_grid->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services_grid->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DeptRecvDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services_grid->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DeptRecvDate->EditValue ?>"<?php echo $patient_services_grid->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services_grid->DeptRecvDate->ReadOnly && !$patient_services_grid->DeptRecvDate->Disabled && !isset($patient_services_grid->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services_grid->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DeptRecvDate">
<span<?php echo $patient_services_grid->DeptRecvDate->viewAttributes() ?>><?php echo $patient_services_grid->DeptRecvDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" <?php echo $patient_services_grid->DeptRecvUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DeptRecvUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DeptRecvUser->EditValue ?>"<?php echo $patient_services_grid->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DeptRecvUser" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DeptRecvUser->EditValue ?>"<?php echo $patient_services_grid->DeptRecvUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DeptRecvUser">
<span<?php echo $patient_services_grid->DeptRecvUser->viewAttributes() ?>><?php echo $patient_services_grid->DeptRecvUser->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived" <?php echo $patient_services_grid->DeptRecived->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DeptRecived" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DeptRecived->EditValue ?>"<?php echo $patient_services_grid->DeptRecived->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services_grid->DeptRecived->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DeptRecived" class="form-group">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DeptRecived->EditValue ?>"<?php echo $patient_services_grid->DeptRecived->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_DeptRecived">
<span<?php echo $patient_services_grid->DeptRecived->viewAttributes() ?>><?php echo $patient_services_grid->DeptRecived->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services_grid->DeptRecived->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services_grid->DeptRecived->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services_grid->DeptRecived->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services_grid->DeptRecived->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" <?php echo $patient_services_grid->SAuthDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SAuthDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services_grid->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SAuthDate->EditValue ?>"<?php echo $patient_services_grid->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services_grid->SAuthDate->ReadOnly && !$patient_services_grid->SAuthDate->Disabled && !isset($patient_services_grid->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services_grid->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services_grid->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SAuthDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services_grid->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SAuthDate->EditValue ?>"<?php echo $patient_services_grid->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services_grid->SAuthDate->ReadOnly && !$patient_services_grid->SAuthDate->Disabled && !isset($patient_services_grid->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services_grid->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SAuthDate">
<span<?php echo $patient_services_grid->SAuthDate->viewAttributes() ?>><?php echo $patient_services_grid->SAuthDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services_grid->SAuthDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services_grid->SAuthDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services_grid->SAuthDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services_grid->SAuthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" <?php echo $patient_services_grid->SAuthBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SAuthBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SAuthBy->EditValue ?>"<?php echo $patient_services_grid->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services_grid->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SAuthBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SAuthBy->EditValue ?>"<?php echo $patient_services_grid->SAuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SAuthBy">
<span<?php echo $patient_services_grid->SAuthBy->viewAttributes() ?>><?php echo $patient_services_grid->SAuthBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services_grid->SAuthBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services_grid->SAuthBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services_grid->SAuthBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services_grid->SAuthBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate" <?php echo $patient_services_grid->SAuthendicate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SAuthendicate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SAuthendicate->EditValue ?>"<?php echo $patient_services_grid->SAuthendicate->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services_grid->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SAuthendicate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SAuthendicate->EditValue ?>"<?php echo $patient_services_grid->SAuthendicate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_SAuthendicate">
<span<?php echo $patient_services_grid->SAuthendicate->viewAttributes() ?>><?php echo $patient_services_grid->SAuthendicate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services_grid->SAuthendicate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services_grid->SAuthendicate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services_grid->SAuthendicate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services_grid->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" <?php echo $patient_services_grid->AuthDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_AuthDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($patient_services_grid->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->AuthDate->EditValue ?>"<?php echo $patient_services_grid->AuthDate->editAttributes() ?>>
<?php if (!$patient_services_grid->AuthDate->ReadOnly && !$patient_services_grid->AuthDate->Disabled && !isset($patient_services_grid->AuthDate->EditAttrs["readonly"]) && !isset($patient_services_grid->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services_grid->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_AuthDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($patient_services_grid->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->AuthDate->EditValue ?>"<?php echo $patient_services_grid->AuthDate->editAttributes() ?>>
<?php if (!$patient_services_grid->AuthDate->ReadOnly && !$patient_services_grid->AuthDate->Disabled && !isset($patient_services_grid->AuthDate->EditAttrs["readonly"]) && !isset($patient_services_grid->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_AuthDate">
<span<?php echo $patient_services_grid->AuthDate->viewAttributes() ?>><?php echo $patient_services_grid->AuthDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services_grid->AuthDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services_grid->AuthDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services_grid->AuthDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services_grid->AuthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" <?php echo $patient_services_grid->AuthBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_AuthBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->AuthBy->EditValue ?>"<?php echo $patient_services_grid->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services_grid->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_AuthBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->AuthBy->EditValue ?>"<?php echo $patient_services_grid->AuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_AuthBy">
<span<?php echo $patient_services_grid->AuthBy->viewAttributes() ?>><?php echo $patient_services_grid->AuthBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services_grid->AuthBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services_grid->AuthBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services_grid->AuthBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services_grid->AuthBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate" <?php echo $patient_services_grid->Authencate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Authencate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Authencate->EditValue ?>"<?php echo $patient_services_grid->Authencate->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services_grid->Authencate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Authencate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Authencate->EditValue ?>"<?php echo $patient_services_grid->Authencate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Authencate">
<span<?php echo $patient_services_grid->Authencate->viewAttributes() ?>><?php echo $patient_services_grid->Authencate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services_grid->Authencate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services_grid->Authencate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services_grid->Authencate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services_grid->Authencate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" <?php echo $patient_services_grid->EditDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_EditDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($patient_services_grid->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->EditDate->EditValue ?>"<?php echo $patient_services_grid->EditDate->editAttributes() ?>>
<?php if (!$patient_services_grid->EditDate->ReadOnly && !$patient_services_grid->EditDate->Disabled && !isset($patient_services_grid->EditDate->EditAttrs["readonly"]) && !isset($patient_services_grid->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services_grid->EditDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_EditDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($patient_services_grid->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->EditDate->EditValue ?>"<?php echo $patient_services_grid->EditDate->editAttributes() ?>>
<?php if (!$patient_services_grid->EditDate->ReadOnly && !$patient_services_grid->EditDate->Disabled && !isset($patient_services_grid->EditDate->EditAttrs["readonly"]) && !isset($patient_services_grid->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_EditDate">
<span<?php echo $patient_services_grid->EditDate->viewAttributes() ?>><?php echo $patient_services_grid->EditDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services_grid->EditDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services_grid->EditDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services_grid->EditDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services_grid->EditDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy" <?php echo $patient_services_grid->EditBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_EditBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->EditBy->EditValue ?>"<?php echo $patient_services_grid->EditBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services_grid->EditBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_EditBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->EditBy->EditValue ?>"<?php echo $patient_services_grid->EditBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_EditBy">
<span<?php echo $patient_services_grid->EditBy->viewAttributes() ?>><?php echo $patient_services_grid->EditBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services_grid->EditBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services_grid->EditBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services_grid->EditBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services_grid->EditBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Editted->Visible) { // Editted ?>
		<td data-name="Editted" <?php echo $patient_services_grid->Editted->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Editted" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Editted->EditValue ?>"<?php echo $patient_services_grid->Editted->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="o<?php echo $patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services_grid->Editted->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Editted" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Editted->EditValue ?>"<?php echo $patient_services_grid->Editted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Editted">
<span<?php echo $patient_services_grid->Editted->viewAttributes() ?>><?php echo $patient_services_grid->Editted->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services_grid->Editted->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="o<?php echo $patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services_grid->Editted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services_grid->Editted->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Editted" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services_grid->Editted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_services_grid->PatID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services_grid->PatID->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PatID" class="form-group">
<span<?php echo $patient_services_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_grid->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PatID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PatID->EditValue ?>"<?php echo $patient_services_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="o<?php echo $patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_services_grid->PatID->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PatID" class="form-group">
<span<?php echo $patient_services_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_grid->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PatID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PatID->EditValue ?>"<?php echo $patient_services_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PatID">
<span<?php echo $patient_services_grid->PatID->viewAttributes() ?>><?php echo $patient_services_grid->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="o<?php echo $patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_grid->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatID" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_services_grid->PatientId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PatientId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PatientId->EditValue ?>"<?php echo $patient_services_grid->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PatientId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PatientId->EditValue ?>"<?php echo $patient_services_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_PatientId">
<span<?php echo $patient_services_grid->PatientId->viewAttributes() ?>><?php echo $patient_services_grid->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services_grid->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $patient_services_grid->Mobile->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Mobile" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Mobile->EditValue ?>"<?php echo $patient_services_grid->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services_grid->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Mobile" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Mobile->EditValue ?>"<?php echo $patient_services_grid->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Mobile">
<span<?php echo $patient_services_grid->Mobile->viewAttributes() ?>><?php echo $patient_services_grid->Mobile->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services_grid->Mobile->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services_grid->Mobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services_grid->Mobile->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services_grid->Mobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->CId->Visible) { // CId ?>
		<td data-name="CId" <?php echo $patient_services_grid->CId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_CId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_grid->RowIndex ?>_CId" id="x<?php echo $patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->CId->EditValue ?>"<?php echo $patient_services_grid->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="o<?php echo $patient_services_grid->RowIndex ?>_CId" id="o<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services_grid->CId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_CId" class="form-group">
<input type="text" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_grid->RowIndex ?>_CId" id="x<?php echo $patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->CId->EditValue ?>"<?php echo $patient_services_grid->CId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_CId">
<span<?php echo $patient_services_grid->CId->viewAttributes() ?>><?php echo $patient_services_grid->CId->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_grid->RowIndex ?>_CId" id="x<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services_grid->CId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_CId" name="o<?php echo $patient_services_grid->RowIndex ?>_CId" id="o<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services_grid->CId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_CId" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services_grid->CId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_CId" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_CId" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services_grid->CId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $patient_services_grid->Order->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Order" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_grid->RowIndex ?>_Order" id="x<?php echo $patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Order->EditValue ?>"<?php echo $patient_services_grid->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="o<?php echo $patient_services_grid->RowIndex ?>_Order" id="o<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services_grid->Order->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Order" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_grid->RowIndex ?>_Order" id="x<?php echo $patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Order->EditValue ?>"<?php echo $patient_services_grid->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Order">
<span<?php echo $patient_services_grid->Order->viewAttributes() ?>><?php echo $patient_services_grid->Order->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_grid->RowIndex ?>_Order" id="x<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services_grid->Order->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Order" name="o<?php echo $patient_services_grid->RowIndex ?>_Order" id="o<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services_grid->Order->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Order" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services_grid->Order->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Order" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Order" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services_grid->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ResType->Visible) { // ResType ?>
		<td data-name="ResType" <?php echo $patient_services_grid->ResType->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ResType" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ResType->EditValue ?>"<?php echo $patient_services_grid->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="o<?php echo $patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services_grid->ResType->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ResType" class="form-group">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ResType->EditValue ?>"<?php echo $patient_services_grid->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_ResType">
<span<?php echo $patient_services_grid->ResType->viewAttributes() ?>><?php echo $patient_services_grid->ResType->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services_grid->ResType->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="o<?php echo $patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services_grid->ResType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services_grid->ResType->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResType" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services_grid->ResType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Sample->Visible) { // Sample ?>
		<td data-name="Sample" <?php echo $patient_services_grid->Sample->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Sample" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services_grid->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Sample->EditValue ?>"<?php echo $patient_services_grid->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="o<?php echo $patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services_grid->Sample->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Sample" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services_grid->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Sample->EditValue ?>"<?php echo $patient_services_grid->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Sample">
<span<?php echo $patient_services_grid->Sample->viewAttributes() ?>><?php echo $patient_services_grid->Sample->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services_grid->Sample->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="o<?php echo $patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services_grid->Sample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services_grid->Sample->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Sample" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services_grid->Sample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->NoD->Visible) { // NoD ?>
		<td data-name="NoD" <?php echo $patient_services_grid->NoD->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_NoD" class="form-group">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->NoD->EditValue ?>"<?php echo $patient_services_grid->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="o<?php echo $patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services_grid->NoD->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_NoD" class="form-group">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->NoD->EditValue ?>"<?php echo $patient_services_grid->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_NoD">
<span<?php echo $patient_services_grid->NoD->viewAttributes() ?>><?php echo $patient_services_grid->NoD->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services_grid->NoD->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="o<?php echo $patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services_grid->NoD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services_grid->NoD->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_NoD" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services_grid->NoD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" <?php echo $patient_services_grid->BillOrder->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_BillOrder" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->BillOrder->EditValue ?>"<?php echo $patient_services_grid->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services_grid->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_BillOrder" class="form-group">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->BillOrder->EditValue ?>"<?php echo $patient_services_grid->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_BillOrder">
<span<?php echo $patient_services_grid->BillOrder->viewAttributes() ?>><?php echo $patient_services_grid->BillOrder->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services_grid->BillOrder->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services_grid->BillOrder->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services_grid->BillOrder->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services_grid->BillOrder->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" <?php echo $patient_services_grid->Inactive->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Inactive" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Inactive->EditValue ?>"<?php echo $patient_services_grid->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services_grid->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Inactive" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Inactive->EditValue ?>"<?php echo $patient_services_grid->Inactive->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Inactive">
<span<?php echo $patient_services_grid->Inactive->viewAttributes() ?>><?php echo $patient_services_grid->Inactive->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services_grid->Inactive->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services_grid->Inactive->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services_grid->Inactive->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services_grid->Inactive->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" <?php echo $patient_services_grid->CollSample->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_CollSample" class="form-group">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->CollSample->EditValue ?>"<?php echo $patient_services_grid->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services_grid->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_CollSample" class="form-group">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->CollSample->EditValue ?>"<?php echo $patient_services_grid->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_CollSample">
<span<?php echo $patient_services_grid->CollSample->viewAttributes() ?>><?php echo $patient_services_grid->CollSample->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services_grid->CollSample->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services_grid->CollSample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services_grid->CollSample->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services_grid->CollSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->TestType->Visible) { // TestType ?>
		<td data-name="TestType" <?php echo $patient_services_grid->TestType->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestType" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $patient_services_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestType->EditValue ?>"<?php echo $patient_services_grid->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="o<?php echo $patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services_grid->TestType->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestType" class="form-group">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $patient_services_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestType->EditValue ?>"<?php echo $patient_services_grid->TestType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_TestType">
<span<?php echo $patient_services_grid->TestType->viewAttributes() ?>><?php echo $patient_services_grid->TestType->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services_grid->TestType->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="o<?php echo $patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services_grid->TestType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services_grid->TestType->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestType" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services_grid->TestType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" <?php echo $patient_services_grid->Repeated->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Repeated" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Repeated->EditValue ?>"<?php echo $patient_services_grid->Repeated->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services_grid->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Repeated" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Repeated->EditValue ?>"<?php echo $patient_services_grid->Repeated->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Repeated">
<span<?php echo $patient_services_grid->Repeated->viewAttributes() ?>><?php echo $patient_services_grid->Repeated->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services_grid->Repeated->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services_grid->Repeated->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services_grid->Repeated->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services_grid->Repeated->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy" <?php echo $patient_services_grid->RepeatedBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RepeatedBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->RepeatedBy->EditValue ?>"<?php echo $patient_services_grid->RepeatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services_grid->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RepeatedBy" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->RepeatedBy->EditValue ?>"<?php echo $patient_services_grid->RepeatedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RepeatedBy">
<span<?php echo $patient_services_grid->RepeatedBy->viewAttributes() ?>><?php echo $patient_services_grid->RepeatedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services_grid->RepeatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services_grid->RepeatedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services_grid->RepeatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services_grid->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate" <?php echo $patient_services_grid->RepeatedDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RepeatedDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services_grid->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->RepeatedDate->EditValue ?>"<?php echo $patient_services_grid->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services_grid->RepeatedDate->ReadOnly && !$patient_services_grid->RepeatedDate->Disabled && !isset($patient_services_grid->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services_grid->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services_grid->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RepeatedDate" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services_grid->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->RepeatedDate->EditValue ?>"<?php echo $patient_services_grid->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services_grid->RepeatedDate->ReadOnly && !$patient_services_grid->RepeatedDate->Disabled && !isset($patient_services_grid->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services_grid->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RepeatedDate">
<span<?php echo $patient_services_grid->RepeatedDate->viewAttributes() ?>><?php echo $patient_services_grid->RepeatedDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services_grid->RepeatedDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services_grid->RepeatedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services_grid->RepeatedDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services_grid->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID" <?php echo $patient_services_grid->serviceID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_serviceID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->serviceID->EditValue ?>"<?php echo $patient_services_grid->serviceID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services_grid->serviceID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_serviceID" class="form-group">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->serviceID->EditValue ?>"<?php echo $patient_services_grid->serviceID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_serviceID">
<span<?php echo $patient_services_grid->serviceID->viewAttributes() ?>><?php echo $patient_services_grid->serviceID->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services_grid->serviceID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services_grid->serviceID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services_grid->serviceID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services_grid->serviceID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type" <?php echo $patient_services_grid->Service_Type->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Service_Type" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Service_Type->EditValue ?>"<?php echo $patient_services_grid->Service_Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services_grid->Service_Type->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Service_Type" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Service_Type->EditValue ?>"<?php echo $patient_services_grid->Service_Type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Service_Type">
<span<?php echo $patient_services_grid->Service_Type->viewAttributes() ?>><?php echo $patient_services_grid->Service_Type->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services_grid->Service_Type->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services_grid->Service_Type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services_grid->Service_Type->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services_grid->Service_Type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department" <?php echo $patient_services_grid->Service_Department->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Service_Department" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Service_Department->EditValue ?>"<?php echo $patient_services_grid->Service_Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services_grid->Service_Department->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Service_Department" class="form-group">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Service_Department->EditValue ?>"<?php echo $patient_services_grid->Service_Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_Service_Department">
<span<?php echo $patient_services_grid->Service_Department->viewAttributes() ?>><?php echo $patient_services_grid->Service_Department->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services_grid->Service_Department->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services_grid->Service_Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services_grid->Service_Department->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services_grid->Service_Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services_grid->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo" <?php echo $patient_services_grid->RequestNo->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RequestNo" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->RequestNo->EditValue ?>"<?php echo $patient_services_grid->RequestNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services_grid->RequestNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RequestNo" class="form-group">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->RequestNo->EditValue ?>"<?php echo $patient_services_grid->RequestNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCount ?>_patient_services_RequestNo">
<span<?php echo $patient_services_grid->RequestNo->viewAttributes() ?>><?php echo $patient_services_grid->RequestNo->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services_grid->RequestNo->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services_grid->RequestNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services_grid->RequestNo->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services_grid->RequestNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_services_grid->ListOptions->render("body", "right", $patient_services_grid->RowCount);
?>
	</tr>
<?php if ($patient_services->RowType == ROWTYPE_ADD || $patient_services->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "load"], function() {
	fpatient_servicesgrid.updateLists(<?php echo $patient_services_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_services_grid->isGridAdd() || $patient_services->CurrentMode == "copy")
		if (!$patient_services_grid->Recordset->EOF)
			$patient_services_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_services->CurrentMode == "add" || $patient_services->CurrentMode == "copy" || $patient_services->CurrentMode == "edit") {
		$patient_services_grid->RowIndex = '$rowindex$';
		$patient_services_grid->loadRowValues();

		// Set row properties
		$patient_services->resetAttributes();
		$patient_services->RowAttrs->merge(["data-rowindex" => $patient_services_grid->RowIndex, "id" => "r0_patient_services", "data-rowtype" => ROWTYPE_ADD]);
		$patient_services->RowAttrs->appendClass("ew-template");
		$patient_services->RowType = ROWTYPE_ADD;

		// Render row
		$patient_services_grid->renderRow();

		// Render list options
		$patient_services_grid->renderListOptions();
		$patient_services_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_services_grid->ListOptions->render("body", "left", $patient_services_grid->RowIndex);
?>
	<?php if ($patient_services_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_id" class="form-group patient_services_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_id" class="form-group patient_services_id">
<span<?php echo $patient_services_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_id" name="x<?php echo $patient_services_grid->RowIndex ?>_id" id="x<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_id" name="o<?php echo $patient_services_grid->RowIndex ?>_id" id="o<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_services->isConfirm()) { ?>
<?php if ($patient_services_grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_services_Reception" class="form-group patient_services_Reception">
<span<?php echo $patient_services_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_services_Reception" class="form-group patient_services_Reception">
<input type="text" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Reception->EditValue ?>"<?php echo $patient_services_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Reception" class="form-group patient_services_Reception">
<span<?php echo $patient_services_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="o<?php echo $patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services_grid->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Services->Visible) { // Services ?>
		<td data-name="Services">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Services" class="form-group patient_services_Services">
<?php
$onchange = $patient_services_grid->Services->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_services_grid->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_services_grid->RowIndex ?>_Services">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($patient_services_grid->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services_grid->Services->getPlaceHolder()) ?>"<?php echo $patient_services_grid->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services_grid->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_Services" id="x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_grid->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_servicesgrid"], function() {
	fpatient_servicesgrid.createAutoSuggest({"id":"x<?php echo $patient_services_grid->RowIndex ?>_Services","forceSelect":true});
});
</script>
<?php echo $patient_services_grid->Services->Lookup->getParamTag($patient_services_grid, "p_x" . $patient_services_grid->RowIndex . "_Services") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Services" class="form-group patient_services_Services">
<span<?php echo $patient_services_grid->Services->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Services->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="x<?php echo $patient_services_grid->RowIndex ?>_Services" id="x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_grid->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="o<?php echo $patient_services_grid->RowIndex ?>_Services" id="o<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services_grid->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->amount->Visible) { // amount ?>
		<td data-name="amount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_amount" class="form-group patient_services_amount">
<input type="text" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_grid->RowIndex ?>_amount" id="x<?php echo $patient_services_grid->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_grid->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->amount->EditValue ?>"<?php echo $patient_services_grid->amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_amount" class="form-group patient_services_amount">
<span<?php echo $patient_services_grid->amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->amount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_grid->RowIndex ?>_amount" id="x<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services_grid->amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="o<?php echo $patient_services_grid->RowIndex ?>_amount" id="o<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services_grid->amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->description->Visible) { // description ?>
		<td data-name="description">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_description" class="form-group patient_services_description">
<input type="text" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_grid->RowIndex ?>_description" id="x<?php echo $patient_services_grid->RowIndex ?>_description" placeholder="<?php echo HtmlEncode($patient_services_grid->description->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->description->EditValue ?>"<?php echo $patient_services_grid->description->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_description" class="form-group patient_services_description">
<span<?php echo $patient_services_grid->description->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->description->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_grid->RowIndex ?>_description" id="x<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services_grid->description->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_description" name="o<?php echo $patient_services_grid->RowIndex ?>_description" id="o<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services_grid->description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_patient_type" class="form-group patient_services_patient_type">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->patient_type->EditValue ?>"<?php echo $patient_services_grid->patient_type->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_patient_type" class="form-group patient_services_patient_type">
<span<?php echo $patient_services_grid->patient_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->patient_type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services_grid->patient_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services_grid->patient_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date">
<?php if (!$patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_charged_date" class="form-group patient_services_charged_date">
<span<?php echo $patient_services_grid->charged_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->charged_date->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="x<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services_grid->charged_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services_grid->charged_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_status" class="form-group patient_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_services_grid->RowIndex ?>_status" name="x<?php echo $patient_services_grid->RowIndex ?>_status"<?php echo $patient_services_grid->status->editAttributes() ?>>
			<?php echo $patient_services_grid->status->selectOptionListHtml("x{$patient_services_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_services_grid->status->Lookup->getParamTag($patient_services_grid, "p_x" . $patient_services_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_status" class="form-group patient_services_status">
<span<?php echo $patient_services_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_status" name="x<?php echo $patient_services_grid->RowIndex ?>_status" id="x<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_status" name="o<?php echo $patient_services_grid->RowIndex ?>_status" id="o<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services_grid->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_services->isConfirm()) { ?>
<?php if ($patient_services_grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_services_mrnno" class="form-group patient_services_mrnno">
<span<?php echo $patient_services_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_services_mrnno" class="form-group patient_services_mrnno">
<input type="text" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->mrnno->EditValue ?>"<?php echo $patient_services_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_mrnno" class="form-group patient_services_mrnno">
<span<?php echo $patient_services_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services_grid->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PatientName" class="form-group patient_services_PatientName">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PatientName->EditValue ?>"<?php echo $patient_services_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatientName" class="form-group patient_services_PatientName">
<span<?php echo $patient_services_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Age" class="form-group patient_services_Age">
<input type="text" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_grid->RowIndex ?>_Age" id="x<?php echo $patient_services_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Age->EditValue ?>"<?php echo $patient_services_grid->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Age" class="form-group patient_services_Age">
<span<?php echo $patient_services_grid->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Age->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_grid->RowIndex ?>_Age" id="x<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services_grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="o<?php echo $patient_services_grid->RowIndex ?>_Age" id="o<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services_grid->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Gender" class="form-group patient_services_Gender">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $patient_services_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Gender->EditValue ?>"<?php echo $patient_services_grid->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Gender" class="form-group patient_services_Gender">
<span<?php echo $patient_services_grid->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Gender->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services_grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="o<?php echo $patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services_grid->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Unit->Visible) { // Unit ?>
		<td data-name="Unit">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Unit" class="form-group patient_services_Unit">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $patient_services_grid->RowIndex ?>_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Unit->EditValue ?>"<?php echo $patient_services_grid->Unit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Unit" class="form-group patient_services_Unit">
<span<?php echo $patient_services_grid->Unit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Unit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services_grid->Unit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="o<?php echo $patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services_grid->Unit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Quantity" class="form-group patient_services_Quantity">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Quantity->EditValue ?>"<?php echo $patient_services_grid->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Quantity" class="form-group patient_services_Quantity">
<span<?php echo $patient_services_grid->Quantity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Quantity->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services_grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services_grid->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Discount->Visible) { // Discount ?>
		<td data-name="Discount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Discount" class="form-group patient_services_Discount">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $patient_services_grid->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_grid->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Discount->EditValue ?>"<?php echo $patient_services_grid->Discount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Discount" class="form-group patient_services_Discount">
<span<?php echo $patient_services_grid->Discount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Discount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services_grid->Discount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="o<?php echo $patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services_grid->Discount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SubTotal" class="form-group patient_services_SubTotal">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services_grid->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SubTotal->EditValue ?>"<?php echo $patient_services_grid->SubTotal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SubTotal" class="form-group patient_services_SubTotal">
<span<?php echo $patient_services_grid->SubTotal->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->SubTotal->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services_grid->SubTotal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services_grid->SubTotal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ServiceSelect->Visible) { // ServiceSelect ?>
		<td data-name="ServiceSelect">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ServiceSelect" class="form-group patient_services_ServiceSelect">
<div id="tp_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services_grid->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="{value}"<?php echo $patient_services_grid->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services_grid->ServiceSelect->checkBoxListHtml(FALSE, "x{$patient_services_grid->RowIndex}_ServiceSelect[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ServiceSelect" class="form-group patient_services_ServiceSelect">
<span<?php echo $patient_services_grid->ServiceSelect->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->ServiceSelect->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" id="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" value="<?php echo HtmlEncode($patient_services_grid->ServiceSelect->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="<?php echo HtmlEncode($patient_services_grid->ServiceSelect->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Aid->Visible) { // Aid ?>
		<td data-name="Aid">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Aid" class="form-group patient_services_Aid">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $patient_services_grid->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Aid->EditValue ?>"<?php echo $patient_services_grid->Aid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Aid" class="form-group patient_services_Aid">
<span<?php echo $patient_services_grid->Aid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Aid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services_grid->Aid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="o<?php echo $patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services_grid->Aid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if (!$patient_services->isConfirm()) { ?>
<?php if ($patient_services_grid->Vid->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_services_Vid" class="form-group patient_services_Vid">
<span<?php echo $patient_services_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_grid->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_services_Vid" class="form-group patient_services_Vid">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Vid->EditValue ?>"<?php echo $patient_services_grid->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Vid" class="form-group patient_services_Vid">
<span<?php echo $patient_services_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_grid->Vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="o<?php echo $patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services_grid->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrID" class="form-group patient_services_DrID">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $patient_services_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrID->EditValue ?>"<?php echo $patient_services_grid->DrID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrID" class="form-group patient_services_DrID">
<span<?php echo $patient_services_grid->DrID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DrID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services_grid->DrID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="o<?php echo $patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services_grid->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrCODE" class="form-group patient_services_DrCODE">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrCODE->EditValue ?>"<?php echo $patient_services_grid->DrCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrCODE" class="form-group patient_services_DrCODE">
<span<?php echo $patient_services_grid->DrCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DrCODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services_grid->DrCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services_grid->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrName" class="form-group patient_services_DrName">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $patient_services_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrName->EditValue ?>"<?php echo $patient_services_grid->DrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrName" class="form-group patient_services_DrName">
<span<?php echo $patient_services_grid->DrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DrName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services_grid->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="o<?php echo $patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services_grid->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Department->Visible) { // Department ?>
		<td data-name="Department">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Department" class="form-group patient_services_Department">
<input type="text" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Department->EditValue ?>"<?php echo $patient_services_grid->Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Department" class="form-group patient_services_Department">
<span<?php echo $patient_services_grid->Department->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Department->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services_grid->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services_grid->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrSharePres" class="form-group patient_services_DrSharePres">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrSharePres->EditValue ?>"<?php echo $patient_services_grid->DrSharePres->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrSharePres" class="form-group patient_services_DrSharePres">
<span<?php echo $patient_services_grid->DrSharePres->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DrSharePres->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services_grid->DrSharePres->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services_grid->DrSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_HospSharePres" class="form-group patient_services_HospSharePres">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->HospSharePres->EditValue ?>"<?php echo $patient_services_grid->HospSharePres->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_HospSharePres" class="form-group patient_services_HospSharePres">
<span<?php echo $patient_services_grid->HospSharePres->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->HospSharePres->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services_grid->HospSharePres->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services_grid->HospSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareAmount" class="form-group patient_services_DrShareAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareAmount->EditValue ?>"<?php echo $patient_services_grid->DrShareAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareAmount" class="form-group patient_services_DrShareAmount">
<span<?php echo $patient_services_grid->DrShareAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DrShareAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_HospShareAmount" class="form-group patient_services_HospShareAmount">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->HospShareAmount->EditValue ?>"<?php echo $patient_services_grid->HospShareAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_HospShareAmount" class="form-group patient_services_HospShareAmount">
<span<?php echo $patient_services_grid->HospShareAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->HospShareAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services_grid->HospShareAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services_grid->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledAmount" class="form-group patient_services_DrShareSettiledAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services_grid->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledAmount" class="form-group patient_services_DrShareSettiledAmount">
<span<?php echo $patient_services_grid->DrShareSettiledAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DrShareSettiledAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareSettledId" class="form-group patient_services_DrShareSettledId">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareSettledId->EditValue ?>"<?php echo $patient_services_grid->DrShareSettledId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareSettledId" class="form-group patient_services_DrShareSettledId">
<span<?php echo $patient_services_grid->DrShareSettledId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DrShareSettledId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettledId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettledId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledStatus" class="form-group patient_services_DrShareSettiledStatus">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services_grid->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledStatus" class="form-group patient_services_DrShareSettiledStatus">
<span<?php echo $patient_services_grid->DrShareSettiledStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DrShareSettiledStatus->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services_grid->DrShareSettiledStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_invoiceId" class="form-group patient_services_invoiceId">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->invoiceId->EditValue ?>"<?php echo $patient_services_grid->invoiceId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_invoiceId" class="form-group patient_services_invoiceId">
<span<?php echo $patient_services_grid->invoiceId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->invoiceId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services_grid->invoiceId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services_grid->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_invoiceAmount" class="form-group patient_services_invoiceAmount">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->invoiceAmount->EditValue ?>"<?php echo $patient_services_grid->invoiceAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_invoiceAmount" class="form-group patient_services_invoiceAmount">
<span<?php echo $patient_services_grid->invoiceAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->invoiceAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services_grid->invoiceAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services_grid->invoiceAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_invoiceStatus" class="form-group patient_services_invoiceStatus">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->invoiceStatus->EditValue ?>"<?php echo $patient_services_grid->invoiceStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_invoiceStatus" class="form-group patient_services_invoiceStatus">
<span<?php echo $patient_services_grid->invoiceStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->invoiceStatus->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services_grid->invoiceStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services_grid->invoiceStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_modeOfPayment" class="form-group patient_services_modeOfPayment">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->modeOfPayment->EditValue ?>"<?php echo $patient_services_grid->modeOfPayment->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_modeOfPayment" class="form-group patient_services_modeOfPayment">
<span<?php echo $patient_services_grid->modeOfPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->modeOfPayment->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services_grid->modeOfPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services_grid->modeOfPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_HospID" class="form-group patient_services_HospID">
<span<?php echo $patient_services_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="x<?php echo $patient_services_grid->RowIndex ?>_HospID" id="x<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="o<?php echo $patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RIDNO" class="form-group patient_services_RIDNO">
<input type="text" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->RIDNO->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->RIDNO->EditValue ?>"<?php echo $patient_services_grid->RIDNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RIDNO" class="form-group patient_services_RIDNO">
<span<?php echo $patient_services_grid->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->RIDNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services_grid->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services_grid->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TidNo" class="form-group patient_services_TidNo">
<input type="text" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TidNo->EditValue ?>"<?php echo $patient_services_grid->TidNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TidNo" class="form-group patient_services_TidNo">
<span<?php echo $patient_services_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services_grid->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services_grid->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DiscountCategory" class="form-group patient_services_DiscountCategory">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DiscountCategory->EditValue ?>"<?php echo $patient_services_grid->DiscountCategory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DiscountCategory" class="form-group patient_services_DiscountCategory">
<span<?php echo $patient_services_grid->DiscountCategory->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DiscountCategory->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services_grid->DiscountCategory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services_grid->DiscountCategory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->sid->Visible) { // sid ?>
		<td data-name="sid">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_sid" class="form-group patient_services_sid">
<input type="text" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_grid->RowIndex ?>_sid" id="x<?php echo $patient_services_grid->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_grid->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->sid->EditValue ?>"<?php echo $patient_services_grid->sid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_sid" class="form-group patient_services_sid">
<span<?php echo $patient_services_grid->sid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->sid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_grid->RowIndex ?>_sid" id="x<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services_grid->sid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="o<?php echo $patient_services_grid->RowIndex ?>_sid" id="o<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services_grid->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ItemCode" class="form-group patient_services_ItemCode">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ItemCode->EditValue ?>"<?php echo $patient_services_grid->ItemCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ItemCode" class="form-group patient_services_ItemCode">
<span<?php echo $patient_services_grid->ItemCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->ItemCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services_grid->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services_grid->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestSubCd" class="form-group patient_services_TestSubCd">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestSubCd->EditValue ?>"<?php echo $patient_services_grid->TestSubCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestSubCd" class="form-group patient_services_TestSubCd">
<span<?php echo $patient_services_grid->TestSubCd->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->TestSubCd->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services_grid->TestSubCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services_grid->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DEptCd" class="form-group patient_services_DEptCd">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DEptCd->EditValue ?>"<?php echo $patient_services_grid->DEptCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DEptCd" class="form-group patient_services_DEptCd">
<span<?php echo $patient_services_grid->DEptCd->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DEptCd->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services_grid->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services_grid->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ProfCd" class="form-group patient_services_ProfCd">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ProfCd->EditValue ?>"<?php echo $patient_services_grid->ProfCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ProfCd" class="form-group patient_services_ProfCd">
<span<?php echo $patient_services_grid->ProfCd->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->ProfCd->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services_grid->ProfCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services_grid->ProfCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Comments->Visible) { // Comments ?>
		<td data-name="Comments">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Comments" class="form-group patient_services_Comments">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Comments->EditValue ?>"<?php echo $patient_services_grid->Comments->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Comments" class="form-group patient_services_Comments">
<span<?php echo $patient_services_grid->Comments->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Comments->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services_grid->Comments->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="o<?php echo $patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services_grid->Comments->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Method->Visible) { // Method ?>
		<td data-name="Method">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Method" class="form-group patient_services_Method">
<input type="text" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_grid->RowIndex ?>_Method" id="x<?php echo $patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Method->EditValue ?>"<?php echo $patient_services_grid->Method->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Method" class="form-group patient_services_Method">
<span<?php echo $patient_services_grid->Method->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Method->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_grid->RowIndex ?>_Method" id="x<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services_grid->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="o<?php echo $patient_services_grid->RowIndex ?>_Method" id="o<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services_grid->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Specimen" class="form-group patient_services_Specimen">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Specimen->EditValue ?>"<?php echo $patient_services_grid->Specimen->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Specimen" class="form-group patient_services_Specimen">
<span<?php echo $patient_services_grid->Specimen->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Specimen->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services_grid->Specimen->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services_grid->Specimen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Abnormal" class="form-group patient_services_Abnormal">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Abnormal->EditValue ?>"<?php echo $patient_services_grid->Abnormal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Abnormal" class="form-group patient_services_Abnormal">
<span<?php echo $patient_services_grid->Abnormal->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Abnormal->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services_grid->Abnormal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services_grid->Abnormal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestUnit" class="form-group patient_services_TestUnit">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestUnit->EditValue ?>"<?php echo $patient_services_grid->TestUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestUnit" class="form-group patient_services_TestUnit">
<span<?php echo $patient_services_grid->TestUnit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->TestUnit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services_grid->TestUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services_grid->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_LOWHIGH" class="form-group patient_services_LOWHIGH">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->LOWHIGH->EditValue ?>"<?php echo $patient_services_grid->LOWHIGH->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_LOWHIGH" class="form-group patient_services_LOWHIGH">
<span<?php echo $patient_services_grid->LOWHIGH->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->LOWHIGH->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services_grid->LOWHIGH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services_grid->LOWHIGH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Branch->Visible) { // Branch ?>
		<td data-name="Branch">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Branch" class="form-group patient_services_Branch">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Branch->EditValue ?>"<?php echo $patient_services_grid->Branch->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Branch" class="form-group patient_services_Branch">
<span<?php echo $patient_services_grid->Branch->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Branch->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services_grid->Branch->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="o<?php echo $patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services_grid->Branch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Dispatch" class="form-group patient_services_Dispatch">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Dispatch->EditValue ?>"<?php echo $patient_services_grid->Dispatch->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Dispatch" class="form-group patient_services_Dispatch">
<span<?php echo $patient_services_grid->Dispatch->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Dispatch->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services_grid->Dispatch->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services_grid->Dispatch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Pic1" class="form-group patient_services_Pic1">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Pic1->EditValue ?>"<?php echo $patient_services_grid->Pic1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Pic1" class="form-group patient_services_Pic1">
<span<?php echo $patient_services_grid->Pic1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Pic1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services_grid->Pic1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services_grid->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Pic2" class="form-group patient_services_Pic2">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Pic2->EditValue ?>"<?php echo $patient_services_grid->Pic2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Pic2" class="form-group patient_services_Pic2">
<span<?php echo $patient_services_grid->Pic2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Pic2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services_grid->Pic2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services_grid->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_GraphPath" class="form-group patient_services_GraphPath">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->GraphPath->EditValue ?>"<?php echo $patient_services_grid->GraphPath->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_GraphPath" class="form-group patient_services_GraphPath">
<span<?php echo $patient_services_grid->GraphPath->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->GraphPath->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services_grid->GraphPath->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services_grid->GraphPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_MachineCD" class="form-group patient_services_MachineCD">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->MachineCD->EditValue ?>"<?php echo $patient_services_grid->MachineCD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_MachineCD" class="form-group patient_services_MachineCD">
<span<?php echo $patient_services_grid->MachineCD->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->MachineCD->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services_grid->MachineCD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services_grid->MachineCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestCancel" class="form-group patient_services_TestCancel">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestCancel->EditValue ?>"<?php echo $patient_services_grid->TestCancel->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestCancel" class="form-group patient_services_TestCancel">
<span<?php echo $patient_services_grid->TestCancel->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->TestCancel->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services_grid->TestCancel->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services_grid->TestCancel->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_OutSource" class="form-group patient_services_OutSource">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->OutSource->EditValue ?>"<?php echo $patient_services_grid->OutSource->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_OutSource" class="form-group patient_services_OutSource">
<span<?php echo $patient_services_grid->OutSource->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->OutSource->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services_grid->OutSource->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services_grid->OutSource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Printed->Visible) { // Printed ?>
		<td data-name="Printed">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Printed" class="form-group patient_services_Printed">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Printed->EditValue ?>"<?php echo $patient_services_grid->Printed->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Printed" class="form-group patient_services_Printed">
<span<?php echo $patient_services_grid->Printed->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Printed->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services_grid->Printed->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="o<?php echo $patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services_grid->Printed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PrintBy" class="form-group patient_services_PrintBy">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PrintBy->EditValue ?>"<?php echo $patient_services_grid->PrintBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PrintBy" class="form-group patient_services_PrintBy">
<span<?php echo $patient_services_grid->PrintBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->PrintBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services_grid->PrintBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services_grid->PrintBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PrintDate" class="form-group patient_services_PrintDate">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($patient_services_grid->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PrintDate->EditValue ?>"<?php echo $patient_services_grid->PrintDate->editAttributes() ?>>
<?php if (!$patient_services_grid->PrintDate->ReadOnly && !$patient_services_grid->PrintDate->Disabled && !isset($patient_services_grid->PrintDate->EditAttrs["readonly"]) && !isset($patient_services_grid->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PrintDate" class="form-group patient_services_PrintDate">
<span<?php echo $patient_services_grid->PrintDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->PrintDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services_grid->PrintDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services_grid->PrintDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_BillingDate" class="form-group patient_services_BillingDate">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($patient_services_grid->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->BillingDate->EditValue ?>"<?php echo $patient_services_grid->BillingDate->editAttributes() ?>>
<?php if (!$patient_services_grid->BillingDate->ReadOnly && !$patient_services_grid->BillingDate->Disabled && !isset($patient_services_grid->BillingDate->EditAttrs["readonly"]) && !isset($patient_services_grid->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_BillingDate" class="form-group patient_services_BillingDate">
<span<?php echo $patient_services_grid->BillingDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->BillingDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services_grid->BillingDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services_grid->BillingDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_BilledBy" class="form-group patient_services_BilledBy">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->BilledBy->EditValue ?>"<?php echo $patient_services_grid->BilledBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_BilledBy" class="form-group patient_services_BilledBy">
<span<?php echo $patient_services_grid->BilledBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->BilledBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services_grid->BilledBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services_grid->BilledBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Resulted" class="form-group patient_services_Resulted">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Resulted->EditValue ?>"<?php echo $patient_services_grid->Resulted->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Resulted" class="form-group patient_services_Resulted">
<span<?php echo $patient_services_grid->Resulted->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Resulted->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services_grid->Resulted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services_grid->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ResultDate" class="form-group patient_services_ResultDate">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($patient_services_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ResultDate->EditValue ?>"<?php echo $patient_services_grid->ResultDate->editAttributes() ?>>
<?php if (!$patient_services_grid->ResultDate->ReadOnly && !$patient_services_grid->ResultDate->Disabled && !isset($patient_services_grid->ResultDate->EditAttrs["readonly"]) && !isset($patient_services_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ResultDate" class="form-group patient_services_ResultDate">
<span<?php echo $patient_services_grid->ResultDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->ResultDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services_grid->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services_grid->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ResultedBy" class="form-group patient_services_ResultedBy">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ResultedBy->EditValue ?>"<?php echo $patient_services_grid->ResultedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ResultedBy" class="form-group patient_services_ResultedBy">
<span<?php echo $patient_services_grid->ResultedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->ResultedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services_grid->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services_grid->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SampleDate" class="form-group patient_services_SampleDate">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($patient_services_grid->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SampleDate->EditValue ?>"<?php echo $patient_services_grid->SampleDate->editAttributes() ?>>
<?php if (!$patient_services_grid->SampleDate->ReadOnly && !$patient_services_grid->SampleDate->Disabled && !isset($patient_services_grid->SampleDate->EditAttrs["readonly"]) && !isset($patient_services_grid->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SampleDate" class="form-group patient_services_SampleDate">
<span<?php echo $patient_services_grid->SampleDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->SampleDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services_grid->SampleDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services_grid->SampleDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SampleUser" class="form-group patient_services_SampleUser">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SampleUser->EditValue ?>"<?php echo $patient_services_grid->SampleUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SampleUser" class="form-group patient_services_SampleUser">
<span<?php echo $patient_services_grid->SampleUser->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->SampleUser->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services_grid->SampleUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services_grid->SampleUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Sampled" class="form-group patient_services_Sampled">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Sampled->EditValue ?>"<?php echo $patient_services_grid->Sampled->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Sampled" class="form-group patient_services_Sampled">
<span<?php echo $patient_services_grid->Sampled->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Sampled->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services_grid->Sampled->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services_grid->Sampled->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ReceivedDate" class="form-group patient_services_ReceivedDate">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services_grid->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ReceivedDate->EditValue ?>"<?php echo $patient_services_grid->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services_grid->ReceivedDate->ReadOnly && !$patient_services_grid->ReceivedDate->Disabled && !isset($patient_services_grid->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services_grid->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ReceivedDate" class="form-group patient_services_ReceivedDate">
<span<?php echo $patient_services_grid->ReceivedDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->ReceivedDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services_grid->ReceivedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services_grid->ReceivedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ReceivedUser" class="form-group patient_services_ReceivedUser">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ReceivedUser->EditValue ?>"<?php echo $patient_services_grid->ReceivedUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ReceivedUser" class="form-group patient_services_ReceivedUser">
<span<?php echo $patient_services_grid->ReceivedUser->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->ReceivedUser->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services_grid->ReceivedUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services_grid->ReceivedUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Recevied" class="form-group patient_services_Recevied">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Recevied->EditValue ?>"<?php echo $patient_services_grid->Recevied->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Recevied" class="form-group patient_services_Recevied">
<span<?php echo $patient_services_grid->Recevied->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Recevied->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services_grid->Recevied->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services_grid->Recevied->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DeptRecvDate" class="form-group patient_services_DeptRecvDate">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services_grid->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DeptRecvDate->EditValue ?>"<?php echo $patient_services_grid->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services_grid->DeptRecvDate->ReadOnly && !$patient_services_grid->DeptRecvDate->Disabled && !isset($patient_services_grid->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services_grid->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DeptRecvDate" class="form-group patient_services_DeptRecvDate">
<span<?php echo $patient_services_grid->DeptRecvDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DeptRecvDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DeptRecvUser" class="form-group patient_services_DeptRecvUser">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DeptRecvUser->EditValue ?>"<?php echo $patient_services_grid->DeptRecvUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DeptRecvUser" class="form-group patient_services_DeptRecvUser">
<span<?php echo $patient_services_grid->DeptRecvUser->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DeptRecvUser->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services_grid->DeptRecvUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DeptRecived" class="form-group patient_services_DeptRecived">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->DeptRecived->EditValue ?>"<?php echo $patient_services_grid->DeptRecived->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DeptRecived" class="form-group patient_services_DeptRecived">
<span<?php echo $patient_services_grid->DeptRecived->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->DeptRecived->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services_grid->DeptRecived->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services_grid->DeptRecived->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SAuthDate" class="form-group patient_services_SAuthDate">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services_grid->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SAuthDate->EditValue ?>"<?php echo $patient_services_grid->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services_grid->SAuthDate->ReadOnly && !$patient_services_grid->SAuthDate->Disabled && !isset($patient_services_grid->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services_grid->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SAuthDate" class="form-group patient_services_SAuthDate">
<span<?php echo $patient_services_grid->SAuthDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->SAuthDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services_grid->SAuthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services_grid->SAuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SAuthBy" class="form-group patient_services_SAuthBy">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SAuthBy->EditValue ?>"<?php echo $patient_services_grid->SAuthBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SAuthBy" class="form-group patient_services_SAuthBy">
<span<?php echo $patient_services_grid->SAuthBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->SAuthBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services_grid->SAuthBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services_grid->SAuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SAuthendicate" class="form-group patient_services_SAuthendicate">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->SAuthendicate->EditValue ?>"<?php echo $patient_services_grid->SAuthendicate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SAuthendicate" class="form-group patient_services_SAuthendicate">
<span<?php echo $patient_services_grid->SAuthendicate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->SAuthendicate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services_grid->SAuthendicate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services_grid->SAuthendicate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_AuthDate" class="form-group patient_services_AuthDate">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($patient_services_grid->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->AuthDate->EditValue ?>"<?php echo $patient_services_grid->AuthDate->editAttributes() ?>>
<?php if (!$patient_services_grid->AuthDate->ReadOnly && !$patient_services_grid->AuthDate->Disabled && !isset($patient_services_grid->AuthDate->EditAttrs["readonly"]) && !isset($patient_services_grid->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_AuthDate" class="form-group patient_services_AuthDate">
<span<?php echo $patient_services_grid->AuthDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->AuthDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services_grid->AuthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services_grid->AuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_AuthBy" class="form-group patient_services_AuthBy">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->AuthBy->EditValue ?>"<?php echo $patient_services_grid->AuthBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_AuthBy" class="form-group patient_services_AuthBy">
<span<?php echo $patient_services_grid->AuthBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->AuthBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services_grid->AuthBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services_grid->AuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Authencate" class="form-group patient_services_Authencate">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Authencate->EditValue ?>"<?php echo $patient_services_grid->Authencate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Authencate" class="form-group patient_services_Authencate">
<span<?php echo $patient_services_grid->Authencate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Authencate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services_grid->Authencate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services_grid->Authencate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_EditDate" class="form-group patient_services_EditDate">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($patient_services_grid->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->EditDate->EditValue ?>"<?php echo $patient_services_grid->EditDate->editAttributes() ?>>
<?php if (!$patient_services_grid->EditDate->ReadOnly && !$patient_services_grid->EditDate->Disabled && !isset($patient_services_grid->EditDate->EditAttrs["readonly"]) && !isset($patient_services_grid->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_EditDate" class="form-group patient_services_EditDate">
<span<?php echo $patient_services_grid->EditDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->EditDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services_grid->EditDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services_grid->EditDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_EditBy" class="form-group patient_services_EditBy">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->EditBy->EditValue ?>"<?php echo $patient_services_grid->EditBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_EditBy" class="form-group patient_services_EditBy">
<span<?php echo $patient_services_grid->EditBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->EditBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services_grid->EditBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services_grid->EditBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Editted->Visible) { // Editted ?>
		<td data-name="Editted">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Editted" class="form-group patient_services_Editted">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Editted->EditValue ?>"<?php echo $patient_services_grid->Editted->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Editted" class="form-group patient_services_Editted">
<span<?php echo $patient_services_grid->Editted->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Editted->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services_grid->Editted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="o<?php echo $patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services_grid->Editted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_services->isConfirm()) { ?>
<?php if ($patient_services_grid->PatID->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_services_PatID" class="form-group patient_services_PatID">
<span<?php echo $patient_services_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_grid->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatID" class="form-group patient_services_PatID">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PatID->EditValue ?>"<?php echo $patient_services_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatID" class="form-group patient_services_PatID">
<span<?php echo $patient_services_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="o<?php echo $patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services_grid->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PatientId" class="form-group patient_services_PatientId">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->PatientId->EditValue ?>"<?php echo $patient_services_grid->PatientId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatientId" class="form-group patient_services_PatientId">
<span<?php echo $patient_services_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services_grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services_grid->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Mobile" class="form-group patient_services_Mobile">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Mobile->EditValue ?>"<?php echo $patient_services_grid->Mobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Mobile" class="form-group patient_services_Mobile">
<span<?php echo $patient_services_grid->Mobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Mobile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services_grid->Mobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services_grid->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->CId->Visible) { // CId ?>
		<td data-name="CId">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_CId" class="form-group patient_services_CId">
<input type="text" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_grid->RowIndex ?>_CId" id="x<?php echo $patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->CId->EditValue ?>"<?php echo $patient_services_grid->CId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_CId" class="form-group patient_services_CId">
<span<?php echo $patient_services_grid->CId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->CId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_grid->RowIndex ?>_CId" id="x<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services_grid->CId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="o<?php echo $patient_services_grid->RowIndex ?>_CId" id="o<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services_grid->CId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Order->Visible) { // Order ?>
		<td data-name="Order">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Order" class="form-group patient_services_Order">
<input type="text" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_grid->RowIndex ?>_Order" id="x<?php echo $patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Order->EditValue ?>"<?php echo $patient_services_grid->Order->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Order" class="form-group patient_services_Order">
<span<?php echo $patient_services_grid->Order->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Order->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_grid->RowIndex ?>_Order" id="x<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services_grid->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="o<?php echo $patient_services_grid->RowIndex ?>_Order" id="o<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services_grid->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ResType" class="form-group patient_services_ResType">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->ResType->EditValue ?>"<?php echo $patient_services_grid->ResType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ResType" class="form-group patient_services_ResType">
<span<?php echo $patient_services_grid->ResType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->ResType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services_grid->ResType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="o<?php echo $patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services_grid->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Sample" class="form-group patient_services_Sample">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services_grid->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Sample->EditValue ?>"<?php echo $patient_services_grid->Sample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Sample" class="form-group patient_services_Sample">
<span<?php echo $patient_services_grid->Sample->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Sample->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services_grid->Sample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="o<?php echo $patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services_grid->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_NoD" class="form-group patient_services_NoD">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->NoD->EditValue ?>"<?php echo $patient_services_grid->NoD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_NoD" class="form-group patient_services_NoD">
<span<?php echo $patient_services_grid->NoD->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->NoD->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services_grid->NoD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="o<?php echo $patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services_grid->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_BillOrder" class="form-group patient_services_BillOrder">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->BillOrder->EditValue ?>"<?php echo $patient_services_grid->BillOrder->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_BillOrder" class="form-group patient_services_BillOrder">
<span<?php echo $patient_services_grid->BillOrder->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->BillOrder->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services_grid->BillOrder->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services_grid->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Inactive" class="form-group patient_services_Inactive">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Inactive->EditValue ?>"<?php echo $patient_services_grid->Inactive->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Inactive" class="form-group patient_services_Inactive">
<span<?php echo $patient_services_grid->Inactive->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Inactive->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services_grid->Inactive->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services_grid->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_CollSample" class="form-group patient_services_CollSample">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->CollSample->EditValue ?>"<?php echo $patient_services_grid->CollSample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_CollSample" class="form-group patient_services_CollSample">
<span<?php echo $patient_services_grid->CollSample->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->CollSample->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services_grid->CollSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services_grid->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestType" class="form-group patient_services_TestType">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $patient_services_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->TestType->EditValue ?>"<?php echo $patient_services_grid->TestType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestType" class="form-group patient_services_TestType">
<span<?php echo $patient_services_grid->TestType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->TestType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services_grid->TestType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="o<?php echo $patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services_grid->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Repeated" class="form-group patient_services_Repeated">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Repeated->EditValue ?>"<?php echo $patient_services_grid->Repeated->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Repeated" class="form-group patient_services_Repeated">
<span<?php echo $patient_services_grid->Repeated->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Repeated->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services_grid->Repeated->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services_grid->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RepeatedBy" class="form-group patient_services_RepeatedBy">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->RepeatedBy->EditValue ?>"<?php echo $patient_services_grid->RepeatedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RepeatedBy" class="form-group patient_services_RepeatedBy">
<span<?php echo $patient_services_grid->RepeatedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->RepeatedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services_grid->RepeatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services_grid->RepeatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RepeatedDate" class="form-group patient_services_RepeatedDate">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services_grid->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->RepeatedDate->EditValue ?>"<?php echo $patient_services_grid->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services_grid->RepeatedDate->ReadOnly && !$patient_services_grid->RepeatedDate->Disabled && !isset($patient_services_grid->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services_grid->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RepeatedDate" class="form-group patient_services_RepeatedDate">
<span<?php echo $patient_services_grid->RepeatedDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->RepeatedDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services_grid->RepeatedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services_grid->RepeatedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_serviceID" class="form-group patient_services_serviceID">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->serviceID->EditValue ?>"<?php echo $patient_services_grid->serviceID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_serviceID" class="form-group patient_services_serviceID">
<span<?php echo $patient_services_grid->serviceID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->serviceID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services_grid->serviceID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services_grid->serviceID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Service_Type" class="form-group patient_services_Service_Type">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Service_Type->EditValue ?>"<?php echo $patient_services_grid->Service_Type->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Service_Type" class="form-group patient_services_Service_Type">
<span<?php echo $patient_services_grid->Service_Type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Service_Type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services_grid->Service_Type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services_grid->Service_Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Service_Department" class="form-group patient_services_Service_Department">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services_grid->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->Service_Department->EditValue ?>"<?php echo $patient_services_grid->Service_Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Service_Department" class="form-group patient_services_Service_Department">
<span<?php echo $patient_services_grid->Service_Department->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->Service_Department->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services_grid->Service_Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services_grid->Service_Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services_grid->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RequestNo" class="form-group patient_services_RequestNo">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services_grid->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services_grid->RequestNo->EditValue ?>"<?php echo $patient_services_grid->RequestNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RequestNo" class="form-group patient_services_RequestNo">
<span<?php echo $patient_services_grid->RequestNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_services_grid->RequestNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services_grid->RequestNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services_grid->RequestNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_services_grid->ListOptions->render("body", "right", $patient_services_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_servicesgrid", "load"], function() {
	fpatient_servicesgrid.updateLists(<?php echo $patient_services_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
<?php

// Render aggregate row
$patient_services->RowType = ROWTYPE_AGGREGATE;
$patient_services->resetAttributes();
$patient_services_grid->renderRow();
?>
<?php if ($patient_services_grid->TotalRecords > 0 && $patient_services->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$patient_services_grid->renderListOptions();

// Render list options (footer, left)
$patient_services_grid->ListOptions->render("footer", "left");
?>
	<?php if ($patient_services_grid->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $patient_services_grid->id->footerCellClass() ?>"><span id="elf_patient_services_id" class="patient_services_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" class="<?php echo $patient_services_grid->Reception->footerCellClass() ?>"><span id="elf_patient_services_Reception" class="patient_services_Reception">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Services->Visible) { // Services ?>
		<td data-name="Services" class="<?php echo $patient_services_grid->Services->footerCellClass() ?>"><span id="elf_patient_services_Services" class="patient_services_Services">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->amount->Visible) { // amount ?>
		<td data-name="amount" class="<?php echo $patient_services_grid->amount->footerCellClass() ?>"><span id="elf_patient_services_amount" class="patient_services_amount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->description->Visible) { // description ?>
		<td data-name="description" class="<?php echo $patient_services_grid->description->footerCellClass() ?>"><span id="elf_patient_services_description" class="patient_services_description">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" class="<?php echo $patient_services_grid->patient_type->footerCellClass() ?>"><span id="elf_patient_services_patient_type" class="patient_services_patient_type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" class="<?php echo $patient_services_grid->charged_date->footerCellClass() ?>"><span id="elf_patient_services_charged_date" class="patient_services_charged_date">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->status->Visible) { // status ?>
		<td data-name="status" class="<?php echo $patient_services_grid->status->footerCellClass() ?>"><span id="elf_patient_services_status" class="patient_services_status">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" class="<?php echo $patient_services_grid->mrnno->footerCellClass() ?>"><span id="elf_patient_services_mrnno" class="patient_services_mrnno">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $patient_services_grid->PatientName->footerCellClass() ?>"><span id="elf_patient_services_PatientName" class="patient_services_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Age->Visible) { // Age ?>
		<td data-name="Age" class="<?php echo $patient_services_grid->Age->footerCellClass() ?>"><span id="elf_patient_services_Age" class="patient_services_Age">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" class="<?php echo $patient_services_grid->Gender->footerCellClass() ?>"><span id="elf_patient_services_Gender" class="patient_services_Gender">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Unit->Visible) { // Unit ?>
		<td data-name="Unit" class="<?php echo $patient_services_grid->Unit->footerCellClass() ?>"><span id="elf_patient_services_Unit" class="patient_services_Unit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $patient_services_grid->Quantity->footerCellClass() ?>"><span id="elf_patient_services_Quantity" class="patient_services_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Discount->Visible) { // Discount ?>
		<td data-name="Discount" class="<?php echo $patient_services_grid->Discount->footerCellClass() ?>"><span id="elf_patient_services_Discount" class="patient_services_Discount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" class="<?php echo $patient_services_grid->SubTotal->footerCellClass() ?>"><span id="elf_patient_services_SubTotal" class="patient_services_SubTotal">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $patient_services_grid->SubTotal->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->ServiceSelect->Visible) { // ServiceSelect ?>
		<td data-name="ServiceSelect" class="<?php echo $patient_services_grid->ServiceSelect->footerCellClass() ?>"><span id="elf_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Aid->Visible) { // Aid ?>
		<td data-name="Aid" class="<?php echo $patient_services_grid->Aid->footerCellClass() ?>"><span id="elf_patient_services_Aid" class="patient_services_Aid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Vid->Visible) { // Vid ?>
		<td data-name="Vid" class="<?php echo $patient_services_grid->Vid->footerCellClass() ?>"><span id="elf_patient_services_Vid" class="patient_services_Vid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DrID->Visible) { // DrID ?>
		<td data-name="DrID" class="<?php echo $patient_services_grid->DrID->footerCellClass() ?>"><span id="elf_patient_services_DrID" class="patient_services_DrID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" class="<?php echo $patient_services_grid->DrCODE->footerCellClass() ?>"><span id="elf_patient_services_DrCODE" class="patient_services_DrCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DrName->Visible) { // DrName ?>
		<td data-name="DrName" class="<?php echo $patient_services_grid->DrName->footerCellClass() ?>"><span id="elf_patient_services_DrName" class="patient_services_DrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Department->Visible) { // Department ?>
		<td data-name="Department" class="<?php echo $patient_services_grid->Department->footerCellClass() ?>"><span id="elf_patient_services_Department" class="patient_services_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres" class="<?php echo $patient_services_grid->DrSharePres->footerCellClass() ?>"><span id="elf_patient_services_DrSharePres" class="patient_services_DrSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres" class="<?php echo $patient_services_grid->HospSharePres->footerCellClass() ?>"><span id="elf_patient_services_HospSharePres" class="patient_services_HospSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" class="<?php echo $patient_services_grid->DrShareAmount->footerCellClass() ?>"><span id="elf_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" class="<?php echo $patient_services_grid->HospShareAmount->footerCellClass() ?>"><span id="elf_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount" class="<?php echo $patient_services_grid->DrShareSettiledAmount->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId" class="<?php echo $patient_services_grid->DrShareSettledId->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus" class="<?php echo $patient_services_grid->DrShareSettiledStatus->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" class="<?php echo $patient_services_grid->invoiceId->footerCellClass() ?>"><span id="elf_patient_services_invoiceId" class="patient_services_invoiceId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" class="<?php echo $patient_services_grid->invoiceAmount->footerCellClass() ?>"><span id="elf_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" class="<?php echo $patient_services_grid->invoiceStatus->footerCellClass() ?>"><span id="elf_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" class="<?php echo $patient_services_grid->modeOfPayment->footerCellClass() ?>"><span id="elf_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $patient_services_grid->HospID->footerCellClass() ?>"><span id="elf_patient_services_HospID" class="patient_services_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" class="<?php echo $patient_services_grid->RIDNO->footerCellClass() ?>"><span id="elf_patient_services_RIDNO" class="patient_services_RIDNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" class="<?php echo $patient_services_grid->TidNo->footerCellClass() ?>"><span id="elf_patient_services_TidNo" class="patient_services_TidNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory" class="<?php echo $patient_services_grid->DiscountCategory->footerCellClass() ?>"><span id="elf_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->sid->Visible) { // sid ?>
		<td data-name="sid" class="<?php echo $patient_services_grid->sid->footerCellClass() ?>"><span id="elf_patient_services_sid" class="patient_services_sid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" class="<?php echo $patient_services_grid->ItemCode->footerCellClass() ?>"><span id="elf_patient_services_ItemCode" class="patient_services_ItemCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" class="<?php echo $patient_services_grid->TestSubCd->footerCellClass() ?>"><span id="elf_patient_services_TestSubCd" class="patient_services_TestSubCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" class="<?php echo $patient_services_grid->DEptCd->footerCellClass() ?>"><span id="elf_patient_services_DEptCd" class="patient_services_DEptCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" class="<?php echo $patient_services_grid->ProfCd->footerCellClass() ?>"><span id="elf_patient_services_ProfCd" class="patient_services_ProfCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Comments->Visible) { // Comments ?>
		<td data-name="Comments" class="<?php echo $patient_services_grid->Comments->footerCellClass() ?>"><span id="elf_patient_services_Comments" class="patient_services_Comments">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Method->Visible) { // Method ?>
		<td data-name="Method" class="<?php echo $patient_services_grid->Method->footerCellClass() ?>"><span id="elf_patient_services_Method" class="patient_services_Method">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" class="<?php echo $patient_services_grid->Specimen->footerCellClass() ?>"><span id="elf_patient_services_Specimen" class="patient_services_Specimen">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" class="<?php echo $patient_services_grid->Abnormal->footerCellClass() ?>"><span id="elf_patient_services_Abnormal" class="patient_services_Abnormal">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" class="<?php echo $patient_services_grid->TestUnit->footerCellClass() ?>"><span id="elf_patient_services_TestUnit" class="patient_services_TestUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" class="<?php echo $patient_services_grid->LOWHIGH->footerCellClass() ?>"><span id="elf_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Branch->Visible) { // Branch ?>
		<td data-name="Branch" class="<?php echo $patient_services_grid->Branch->footerCellClass() ?>"><span id="elf_patient_services_Branch" class="patient_services_Branch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" class="<?php echo $patient_services_grid->Dispatch->footerCellClass() ?>"><span id="elf_patient_services_Dispatch" class="patient_services_Dispatch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" class="<?php echo $patient_services_grid->Pic1->footerCellClass() ?>"><span id="elf_patient_services_Pic1" class="patient_services_Pic1">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" class="<?php echo $patient_services_grid->Pic2->footerCellClass() ?>"><span id="elf_patient_services_Pic2" class="patient_services_Pic2">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" class="<?php echo $patient_services_grid->GraphPath->footerCellClass() ?>"><span id="elf_patient_services_GraphPath" class="patient_services_GraphPath">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" class="<?php echo $patient_services_grid->MachineCD->footerCellClass() ?>"><span id="elf_patient_services_MachineCD" class="patient_services_MachineCD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" class="<?php echo $patient_services_grid->TestCancel->footerCellClass() ?>"><span id="elf_patient_services_TestCancel" class="patient_services_TestCancel">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" class="<?php echo $patient_services_grid->OutSource->footerCellClass() ?>"><span id="elf_patient_services_OutSource" class="patient_services_OutSource">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Printed->Visible) { // Printed ?>
		<td data-name="Printed" class="<?php echo $patient_services_grid->Printed->footerCellClass() ?>"><span id="elf_patient_services_Printed" class="patient_services_Printed">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" class="<?php echo $patient_services_grid->PrintBy->footerCellClass() ?>"><span id="elf_patient_services_PrintBy" class="patient_services_PrintBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" class="<?php echo $patient_services_grid->PrintDate->footerCellClass() ?>"><span id="elf_patient_services_PrintDate" class="patient_services_PrintDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate" class="<?php echo $patient_services_grid->BillingDate->footerCellClass() ?>"><span id="elf_patient_services_BillingDate" class="patient_services_BillingDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy" class="<?php echo $patient_services_grid->BilledBy->footerCellClass() ?>"><span id="elf_patient_services_BilledBy" class="patient_services_BilledBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" class="<?php echo $patient_services_grid->Resulted->footerCellClass() ?>"><span id="elf_patient_services_Resulted" class="patient_services_Resulted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" class="<?php echo $patient_services_grid->ResultDate->footerCellClass() ?>"><span id="elf_patient_services_ResultDate" class="patient_services_ResultDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" class="<?php echo $patient_services_grid->ResultedBy->footerCellClass() ?>"><span id="elf_patient_services_ResultedBy" class="patient_services_ResultedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" class="<?php echo $patient_services_grid->SampleDate->footerCellClass() ?>"><span id="elf_patient_services_SampleDate" class="patient_services_SampleDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" class="<?php echo $patient_services_grid->SampleUser->footerCellClass() ?>"><span id="elf_patient_services_SampleUser" class="patient_services_SampleUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled" class="<?php echo $patient_services_grid->Sampled->footerCellClass() ?>"><span id="elf_patient_services_Sampled" class="patient_services_Sampled">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" class="<?php echo $patient_services_grid->ReceivedDate->footerCellClass() ?>"><span id="elf_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" class="<?php echo $patient_services_grid->ReceivedUser->footerCellClass() ?>"><span id="elf_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied" class="<?php echo $patient_services_grid->Recevied->footerCellClass() ?>"><span id="elf_patient_services_Recevied" class="patient_services_Recevied">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" class="<?php echo $patient_services_grid->DeptRecvDate->footerCellClass() ?>"><span id="elf_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" class="<?php echo $patient_services_grid->DeptRecvUser->footerCellClass() ?>"><span id="elf_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived" class="<?php echo $patient_services_grid->DeptRecived->footerCellClass() ?>"><span id="elf_patient_services_DeptRecived" class="patient_services_DeptRecived">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" class="<?php echo $patient_services_grid->SAuthDate->footerCellClass() ?>"><span id="elf_patient_services_SAuthDate" class="patient_services_SAuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" class="<?php echo $patient_services_grid->SAuthBy->footerCellClass() ?>"><span id="elf_patient_services_SAuthBy" class="patient_services_SAuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate" class="<?php echo $patient_services_grid->SAuthendicate->footerCellClass() ?>"><span id="elf_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" class="<?php echo $patient_services_grid->AuthDate->footerCellClass() ?>"><span id="elf_patient_services_AuthDate" class="patient_services_AuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" class="<?php echo $patient_services_grid->AuthBy->footerCellClass() ?>"><span id="elf_patient_services_AuthBy" class="patient_services_AuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate" class="<?php echo $patient_services_grid->Authencate->footerCellClass() ?>"><span id="elf_patient_services_Authencate" class="patient_services_Authencate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" class="<?php echo $patient_services_grid->EditDate->footerCellClass() ?>"><span id="elf_patient_services_EditDate" class="patient_services_EditDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy" class="<?php echo $patient_services_grid->EditBy->footerCellClass() ?>"><span id="elf_patient_services_EditBy" class="patient_services_EditBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Editted->Visible) { // Editted ?>
		<td data-name="Editted" class="<?php echo $patient_services_grid->Editted->footerCellClass() ?>"><span id="elf_patient_services_Editted" class="patient_services_Editted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID" class="<?php echo $patient_services_grid->PatID->footerCellClass() ?>"><span id="elf_patient_services_PatID" class="patient_services_PatID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $patient_services_grid->PatientId->footerCellClass() ?>"><span id="elf_patient_services_PatientId" class="patient_services_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $patient_services_grid->Mobile->footerCellClass() ?>"><span id="elf_patient_services_Mobile" class="patient_services_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->CId->Visible) { // CId ?>
		<td data-name="CId" class="<?php echo $patient_services_grid->CId->footerCellClass() ?>"><span id="elf_patient_services_CId" class="patient_services_CId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Order->Visible) { // Order ?>
		<td data-name="Order" class="<?php echo $patient_services_grid->Order->footerCellClass() ?>"><span id="elf_patient_services_Order" class="patient_services_Order">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->ResType->Visible) { // ResType ?>
		<td data-name="ResType" class="<?php echo $patient_services_grid->ResType->footerCellClass() ?>"><span id="elf_patient_services_ResType" class="patient_services_ResType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Sample->Visible) { // Sample ?>
		<td data-name="Sample" class="<?php echo $patient_services_grid->Sample->footerCellClass() ?>"><span id="elf_patient_services_Sample" class="patient_services_Sample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->NoD->Visible) { // NoD ?>
		<td data-name="NoD" class="<?php echo $patient_services_grid->NoD->footerCellClass() ?>"><span id="elf_patient_services_NoD" class="patient_services_NoD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" class="<?php echo $patient_services_grid->BillOrder->footerCellClass() ?>"><span id="elf_patient_services_BillOrder" class="patient_services_BillOrder">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" class="<?php echo $patient_services_grid->Inactive->footerCellClass() ?>"><span id="elf_patient_services_Inactive" class="patient_services_Inactive">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" class="<?php echo $patient_services_grid->CollSample->footerCellClass() ?>"><span id="elf_patient_services_CollSample" class="patient_services_CollSample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->TestType->Visible) { // TestType ?>
		<td data-name="TestType" class="<?php echo $patient_services_grid->TestType->footerCellClass() ?>"><span id="elf_patient_services_TestType" class="patient_services_TestType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" class="<?php echo $patient_services_grid->Repeated->footerCellClass() ?>"><span id="elf_patient_services_Repeated" class="patient_services_Repeated">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy" class="<?php echo $patient_services_grid->RepeatedBy->footerCellClass() ?>"><span id="elf_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate" class="<?php echo $patient_services_grid->RepeatedDate->footerCellClass() ?>"><span id="elf_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID" class="<?php echo $patient_services_grid->serviceID->footerCellClass() ?>"><span id="elf_patient_services_serviceID" class="patient_services_serviceID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type" class="<?php echo $patient_services_grid->Service_Type->footerCellClass() ?>"><span id="elf_patient_services_Service_Type" class="patient_services_Service_Type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department" class="<?php echo $patient_services_grid->Service_Department->footerCellClass() ?>"><span id="elf_patient_services_Service_Department" class="patient_services_Service_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($patient_services_grid->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo" class="<?php echo $patient_services_grid->RequestNo->footerCellClass() ?>"><span id="elf_patient_services_RequestNo" class="patient_services_RequestNo">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$patient_services_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($patient_services->CurrentMode == "add" || $patient_services->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_services_grid->FormKeyCountName ?>" id="<?php echo $patient_services_grid->FormKeyCountName ?>" value="<?php echo $patient_services_grid->KeyCount ?>">
<?php echo $patient_services_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_services->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_services_grid->FormKeyCountName ?>" id="<?php echo $patient_services_grid->FormKeyCountName ?>" value="<?php echo $patient_services_grid->KeyCount ?>">
<?php echo $patient_services_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_services->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_servicesgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_services_grid->Recordset)
	$patient_services_grid->Recordset->Close();
?>
<?php if ($patient_services_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_services_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_services_grid->TotalRecords == 0 && !$patient_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_services_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_services_grid->isExport()) { ?>
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
<?php
$patient_services_grid->terminate();
?>