<?php
namespace PHPMaker2019\HIMS;

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
<?php if (!$patient_services->isExport()) { ?>
<script>

// Form object
var fpatient_servicesgrid = new ew.Form("fpatient_servicesgrid", "grid");
fpatient_servicesgrid.formKeyCountName = '<?php echo $patient_services_grid->FormKeyCountName ?>';

// Validate form
fpatient_servicesgrid.validate = function() {
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
		<?php if ($patient_services_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->id->caption(), $patient_services->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Reception->caption(), $patient_services->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Services->caption(), $patient_services->Services->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->amount->caption(), $patient_services->amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->amount->errorMessage()) ?>");
		<?php if ($patient_services_grid->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->description->caption(), $patient_services->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->patient_type->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->patient_type->caption(), $patient_services->patient_type->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_type");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->patient_type->errorMessage()) ?>");
		<?php if ($patient_services_grid->charged_date->Required) { ?>
			elm = this.getElements("x" + infix + "_charged_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->charged_date->caption(), $patient_services->charged_date->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->status->caption(), $patient_services->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->mrnno->caption(), $patient_services->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PatientName->caption(), $patient_services->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Age->caption(), $patient_services->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Gender->caption(), $patient_services->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Unit->caption(), $patient_services->Unit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Unit->errorMessage()) ?>");
		<?php if ($patient_services_grid->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Quantity->caption(), $patient_services->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Quantity->errorMessage()) ?>");
		<?php if ($patient_services_grid->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Discount->caption(), $patient_services->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Discount->errorMessage()) ?>");
		<?php if ($patient_services_grid->SubTotal->Required) { ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SubTotal->caption(), $patient_services->SubTotal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->SubTotal->errorMessage()) ?>");
		<?php if ($patient_services_grid->ServiceSelect->Required) { ?>
			elm = this.getElements("x" + infix + "_ServiceSelect[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ServiceSelect->caption(), $patient_services->ServiceSelect->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Aid->Required) { ?>
			elm = this.getElements("x" + infix + "_Aid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Aid->caption(), $patient_services->Aid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Aid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Aid->errorMessage()) ?>");
		<?php if ($patient_services_grid->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Vid->caption(), $patient_services->Vid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Vid->errorMessage()) ?>");
		<?php if ($patient_services_grid->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrID->caption(), $patient_services->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrID->errorMessage()) ?>");
		<?php if ($patient_services_grid->DrCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_DrCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrCODE->caption(), $patient_services->DrCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrName->caption(), $patient_services->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Department->caption(), $patient_services->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->DrSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrSharePres->caption(), $patient_services->DrSharePres->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrSharePres->errorMessage()) ?>");
		<?php if ($patient_services_grid->HospSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->HospSharePres->caption(), $patient_services->HospSharePres->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->HospSharePres->errorMessage()) ?>");
		<?php if ($patient_services_grid->DrShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareAmount->caption(), $patient_services->DrShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareAmount->errorMessage()) ?>");
		<?php if ($patient_services_grid->HospShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->HospShareAmount->caption(), $patient_services->HospShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->HospShareAmount->errorMessage()) ?>");
		<?php if ($patient_services_grid->DrShareSettiledAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareSettiledAmount->caption(), $patient_services->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettiledAmount->errorMessage()) ?>");
		<?php if ($patient_services_grid->DrShareSettledId->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareSettledId->caption(), $patient_services->DrShareSettledId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettledId->errorMessage()) ?>");
		<?php if ($patient_services_grid->DrShareSettiledStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DrShareSettiledStatus->caption(), $patient_services->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DrShareSettiledStatus->errorMessage()) ?>");
		<?php if ($patient_services_grid->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->invoiceId->caption(), $patient_services->invoiceId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->invoiceId->errorMessage()) ?>");
		<?php if ($patient_services_grid->invoiceAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->invoiceAmount->caption(), $patient_services->invoiceAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->invoiceAmount->errorMessage()) ?>");
		<?php if ($patient_services_grid->invoiceStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->invoiceStatus->caption(), $patient_services->invoiceStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->modeOfPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_modeOfPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->modeOfPayment->caption(), $patient_services->modeOfPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->HospID->caption(), $patient_services->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RIDNO->caption(), $patient_services->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TidNo->caption(), $patient_services->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->DiscountCategory->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountCategory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DiscountCategory->caption(), $patient_services->DiscountCategory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->sid->caption(), $patient_services->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->sid->errorMessage()) ?>");
		<?php if ($patient_services_grid->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ItemCode->caption(), $patient_services->ItemCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestSubCd->caption(), $patient_services->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DEptCd->caption(), $patient_services->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->ProfCd->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ProfCd->caption(), $patient_services->ProfCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Comments->Required) { ?>
			elm = this.getElements("x" + infix + "_Comments");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Comments->caption(), $patient_services->Comments->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Method->caption(), $patient_services->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Specimen->Required) { ?>
			elm = this.getElements("x" + infix + "_Specimen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Specimen->caption(), $patient_services->Specimen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Abnormal->Required) { ?>
			elm = this.getElements("x" + infix + "_Abnormal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Abnormal->caption(), $patient_services->Abnormal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->TestUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_TestUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestUnit->caption(), $patient_services->TestUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->LOWHIGH->Required) { ?>
			elm = this.getElements("x" + infix + "_LOWHIGH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->LOWHIGH->caption(), $patient_services->LOWHIGH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Branch->Required) { ?>
			elm = this.getElements("x" + infix + "_Branch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Branch->caption(), $patient_services->Branch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Dispatch->Required) { ?>
			elm = this.getElements("x" + infix + "_Dispatch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Dispatch->caption(), $patient_services->Dispatch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Pic1->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Pic1->caption(), $patient_services->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Pic2->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Pic2->caption(), $patient_services->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->GraphPath->Required) { ?>
			elm = this.getElements("x" + infix + "_GraphPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->GraphPath->caption(), $patient_services->GraphPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->MachineCD->Required) { ?>
			elm = this.getElements("x" + infix + "_MachineCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->MachineCD->caption(), $patient_services->MachineCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->TestCancel->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCancel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestCancel->caption(), $patient_services->TestCancel->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->OutSource->Required) { ?>
			elm = this.getElements("x" + infix + "_OutSource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->OutSource->caption(), $patient_services->OutSource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Printed->Required) { ?>
			elm = this.getElements("x" + infix + "_Printed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Printed->caption(), $patient_services->Printed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->PrintBy->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PrintBy->caption(), $patient_services->PrintBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->PrintDate->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PrintDate->caption(), $patient_services->PrintDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->PrintDate->errorMessage()) ?>");
		<?php if ($patient_services_grid->BillingDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->BillingDate->caption(), $patient_services->BillingDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->BillingDate->errorMessage()) ?>");
		<?php if ($patient_services_grid->BilledBy->Required) { ?>
			elm = this.getElements("x" + infix + "_BilledBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->BilledBy->caption(), $patient_services->BilledBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Resulted->Required) { ?>
			elm = this.getElements("x" + infix + "_Resulted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Resulted->caption(), $patient_services->Resulted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ResultDate->caption(), $patient_services->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->ResultDate->errorMessage()) ?>");
		<?php if ($patient_services_grid->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ResultedBy->caption(), $patient_services->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->SampleDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SampleDate->caption(), $patient_services->SampleDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->SampleDate->errorMessage()) ?>");
		<?php if ($patient_services_grid->SampleUser->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SampleUser->caption(), $patient_services->SampleUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Sampled->Required) { ?>
			elm = this.getElements("x" + infix + "_Sampled");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Sampled->caption(), $patient_services->Sampled->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->ReceivedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ReceivedDate->caption(), $patient_services->ReceivedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->ReceivedDate->errorMessage()) ?>");
		<?php if ($patient_services_grid->ReceivedUser->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ReceivedUser->caption(), $patient_services->ReceivedUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Recevied->Required) { ?>
			elm = this.getElements("x" + infix + "_Recevied");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Recevied->caption(), $patient_services->Recevied->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->DeptRecvDate->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DeptRecvDate->caption(), $patient_services->DeptRecvDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->DeptRecvDate->errorMessage()) ?>");
		<?php if ($patient_services_grid->DeptRecvUser->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DeptRecvUser->caption(), $patient_services->DeptRecvUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->DeptRecived->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecived");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->DeptRecived->caption(), $patient_services->DeptRecived->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->SAuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SAuthDate->caption(), $patient_services->SAuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->SAuthDate->errorMessage()) ?>");
		<?php if ($patient_services_grid->SAuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SAuthBy->caption(), $patient_services->SAuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->SAuthendicate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthendicate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->SAuthendicate->caption(), $patient_services->SAuthendicate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->AuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->AuthDate->caption(), $patient_services->AuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->AuthDate->errorMessage()) ?>");
		<?php if ($patient_services_grid->AuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->AuthBy->caption(), $patient_services->AuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Authencate->Required) { ?>
			elm = this.getElements("x" + infix + "_Authencate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Authencate->caption(), $patient_services->Authencate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->EditDate->Required) { ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->EditDate->caption(), $patient_services->EditDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->EditDate->errorMessage()) ?>");
		<?php if ($patient_services_grid->EditBy->Required) { ?>
			elm = this.getElements("x" + infix + "_EditBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->EditBy->caption(), $patient_services->EditBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Editted->Required) { ?>
			elm = this.getElements("x" + infix + "_Editted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Editted->caption(), $patient_services->Editted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PatID->caption(), $patient_services->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->PatID->errorMessage()) ?>");
		<?php if ($patient_services_grid->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->PatientId->caption(), $patient_services->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Mobile->caption(), $patient_services->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->CId->caption(), $patient_services->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->CId->errorMessage()) ?>");
		<?php if ($patient_services_grid->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Order->caption(), $patient_services->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->Order->errorMessage()) ?>");
		<?php if ($patient_services_grid->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->ResType->caption(), $patient_services->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Sample->caption(), $patient_services->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->NoD->caption(), $patient_services->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->NoD->errorMessage()) ?>");
		<?php if ($patient_services_grid->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->BillOrder->caption(), $patient_services->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->BillOrder->errorMessage()) ?>");
		<?php if ($patient_services_grid->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Inactive->caption(), $patient_services->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->CollSample->caption(), $patient_services->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->TestType->caption(), $patient_services->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Repeated->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Repeated->caption(), $patient_services->Repeated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->RepeatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RepeatedBy->caption(), $patient_services->RepeatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->RepeatedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->RepeatedDate->caption(), $patient_services->RepeatedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->RepeatedDate->errorMessage()) ?>");
		<?php if ($patient_services_grid->serviceID->Required) { ?>
			elm = this.getElements("x" + infix + "_serviceID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->serviceID->caption(), $patient_services->serviceID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_serviceID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_services->serviceID->errorMessage()) ?>");
		<?php if ($patient_services_grid->Service_Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Service_Type->caption(), $patient_services->Service_Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->Service_Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_services->Service_Department->caption(), $patient_services->Service_Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_services_grid->RequestNo->Required) { ?>
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

// Form_CustomValidate event
fpatient_servicesgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_servicesgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_servicesgrid.lists["x_Services"] = <?php echo $patient_services_grid->Services->Lookup->toClientList() ?>;
fpatient_servicesgrid.lists["x_Services"].options = <?php echo JsonEncode($patient_services_grid->Services->lookupOptions()) ?>;
fpatient_servicesgrid.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_servicesgrid.lists["x_status"] = <?php echo $patient_services_grid->status->Lookup->toClientList() ?>;
fpatient_servicesgrid.lists["x_status"].options = <?php echo JsonEncode($patient_services_grid->status->lookupOptions()) ?>;
fpatient_servicesgrid.lists["x_ServiceSelect[]"] = <?php echo $patient_services_grid->ServiceSelect->Lookup->toClientList() ?>;
fpatient_servicesgrid.lists["x_ServiceSelect[]"].options = <?php echo JsonEncode($patient_services_grid->ServiceSelect->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_services_grid->renderOtherOptions();
?>
<?php $patient_services_grid->showPageHeader(); ?>
<?php
$patient_services_grid->showMessage();
?>
<?php if ($patient_services_grid->TotalRecs > 0 || $patient_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_services_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_services">
<?php if ($patient_services_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_services_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_servicesgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_services" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_servicesgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_services_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_services_grid->renderListOptions();

// Render list options (header, left)
$patient_services_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_services->id->Visible) { // id ?>
	<?php if ($patient_services->sortUrl($patient_services->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_services->id->headerCellClass() ?>"><div id="elh_patient_services_id" class="patient_services_id"><div class="ew-table-header-caption"><?php echo $patient_services->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_services->id->headerCellClass() ?>"><div><div id="elh_patient_services_id" class="patient_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Reception->Visible) { // Reception ?>
	<?php if ($patient_services->sortUrl($patient_services->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_services->Reception->headerCellClass() ?>"><div id="elh_patient_services_Reception" class="patient_services_Reception"><div class="ew-table-header-caption"><?php echo $patient_services->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_services->Reception->headerCellClass() ?>"><div><div id="elh_patient_services_Reception" class="patient_services_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Services->Visible) { // Services ?>
	<?php if ($patient_services->sortUrl($patient_services->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $patient_services->Services->headerCellClass() ?>"><div id="elh_patient_services_Services" class="patient_services_Services"><div class="ew-table-header-caption"><?php echo $patient_services->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $patient_services->Services->headerCellClass() ?>"><div><div id="elh_patient_services_Services" class="patient_services_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->amount->Visible) { // amount ?>
	<?php if ($patient_services->sortUrl($patient_services->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $patient_services->amount->headerCellClass() ?>"><div id="elh_patient_services_amount" class="patient_services_amount"><div class="ew-table-header-caption"><?php echo $patient_services->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $patient_services->amount->headerCellClass() ?>"><div><div id="elh_patient_services_amount" class="patient_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->description->Visible) { // description ?>
	<?php if ($patient_services->sortUrl($patient_services->description) == "") { ?>
		<th data-name="description" class="<?php echo $patient_services->description->headerCellClass() ?>"><div id="elh_patient_services_description" class="patient_services_description"><div class="ew-table-header-caption"><?php echo $patient_services->description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $patient_services->description->headerCellClass() ?>"><div><div id="elh_patient_services_description" class="patient_services_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->description->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->patient_type->Visible) { // patient_type ?>
	<?php if ($patient_services->sortUrl($patient_services->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $patient_services->patient_type->headerCellClass() ?>"><div id="elh_patient_services_patient_type" class="patient_services_patient_type"><div class="ew-table-header-caption"><?php echo $patient_services->patient_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $patient_services->patient_type->headerCellClass() ?>"><div><div id="elh_patient_services_patient_type" class="patient_services_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->patient_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->patient_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->charged_date->Visible) { // charged_date ?>
	<?php if ($patient_services->sortUrl($patient_services->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $patient_services->charged_date->headerCellClass() ?>"><div id="elh_patient_services_charged_date" class="patient_services_charged_date"><div class="ew-table-header-caption"><?php echo $patient_services->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $patient_services->charged_date->headerCellClass() ?>"><div><div id="elh_patient_services_charged_date" class="patient_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->charged_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->charged_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->status->Visible) { // status ?>
	<?php if ($patient_services->sortUrl($patient_services->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_services->status->headerCellClass() ?>"><div id="elh_patient_services_status" class="patient_services_status"><div class="ew-table-header-caption"><?php echo $patient_services->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_services->status->headerCellClass() ?>"><div><div id="elh_patient_services_status" class="patient_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_services->sortUrl($patient_services->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_services->mrnno->headerCellClass() ?>"><div id="elh_patient_services_mrnno" class="patient_services_mrnno"><div class="ew-table-header-caption"><?php echo $patient_services->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_services->mrnno->headerCellClass() ?>"><div><div id="elh_patient_services_mrnno" class="patient_services_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_services->sortUrl($patient_services->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_services->PatientName->headerCellClass() ?>"><div id="elh_patient_services_PatientName" class="patient_services_PatientName"><div class="ew-table-header-caption"><?php echo $patient_services->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_services->PatientName->headerCellClass() ?>"><div><div id="elh_patient_services_PatientName" class="patient_services_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Age->Visible) { // Age ?>
	<?php if ($patient_services->sortUrl($patient_services->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_services->Age->headerCellClass() ?>"><div id="elh_patient_services_Age" class="patient_services_Age"><div class="ew-table-header-caption"><?php echo $patient_services->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_services->Age->headerCellClass() ?>"><div><div id="elh_patient_services_Age" class="patient_services_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Gender->Visible) { // Gender ?>
	<?php if ($patient_services->sortUrl($patient_services->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_services->Gender->headerCellClass() ?>"><div id="elh_patient_services_Gender" class="patient_services_Gender"><div class="ew-table-header-caption"><?php echo $patient_services->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_services->Gender->headerCellClass() ?>"><div><div id="elh_patient_services_Gender" class="patient_services_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Unit->Visible) { // Unit ?>
	<?php if ($patient_services->sortUrl($patient_services->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $patient_services->Unit->headerCellClass() ?>"><div id="elh_patient_services_Unit" class="patient_services_Unit"><div class="ew-table-header-caption"><?php echo $patient_services->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $patient_services->Unit->headerCellClass() ?>"><div><div id="elh_patient_services_Unit" class="patient_services_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Quantity->Visible) { // Quantity ?>
	<?php if ($patient_services->sortUrl($patient_services->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $patient_services->Quantity->headerCellClass() ?>"><div id="elh_patient_services_Quantity" class="patient_services_Quantity"><div class="ew-table-header-caption"><?php echo $patient_services->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $patient_services->Quantity->headerCellClass() ?>"><div><div id="elh_patient_services_Quantity" class="patient_services_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Discount->Visible) { // Discount ?>
	<?php if ($patient_services->sortUrl($patient_services->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $patient_services->Discount->headerCellClass() ?>"><div id="elh_patient_services_Discount" class="patient_services_Discount"><div class="ew-table-header-caption"><?php echo $patient_services->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $patient_services->Discount->headerCellClass() ?>"><div><div id="elh_patient_services_Discount" class="patient_services_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Discount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Discount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SubTotal->Visible) { // SubTotal ?>
	<?php if ($patient_services->sortUrl($patient_services->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $patient_services->SubTotal->headerCellClass() ?>"><div id="elh_patient_services_SubTotal" class="patient_services_SubTotal"><div class="ew-table-header-caption"><?php echo $patient_services->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $patient_services->SubTotal->headerCellClass() ?>"><div><div id="elh_patient_services_SubTotal" class="patient_services_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SubTotal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SubTotal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ServiceSelect->Visible) { // ServiceSelect ?>
	<?php if ($patient_services->sortUrl($patient_services->ServiceSelect) == "") { ?>
		<th data-name="ServiceSelect" class="<?php echo $patient_services->ServiceSelect->headerCellClass() ?>"><div id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect"><div class="ew-table-header-caption"><?php echo $patient_services->ServiceSelect->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ServiceSelect" class="<?php echo $patient_services->ServiceSelect->headerCellClass() ?>"><div><div id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ServiceSelect->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ServiceSelect->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ServiceSelect->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Aid->Visible) { // Aid ?>
	<?php if ($patient_services->sortUrl($patient_services->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $patient_services->Aid->headerCellClass() ?>"><div id="elh_patient_services_Aid" class="patient_services_Aid"><div class="ew-table-header-caption"><?php echo $patient_services->Aid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $patient_services->Aid->headerCellClass() ?>"><div><div id="elh_patient_services_Aid" class="patient_services_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Aid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Aid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Vid->Visible) { // Vid ?>
	<?php if ($patient_services->sortUrl($patient_services->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $patient_services->Vid->headerCellClass() ?>"><div id="elh_patient_services_Vid" class="patient_services_Vid"><div class="ew-table-header-caption"><?php echo $patient_services->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $patient_services->Vid->headerCellClass() ?>"><div><div id="elh_patient_services_Vid" class="patient_services_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrID->Visible) { // DrID ?>
	<?php if ($patient_services->sortUrl($patient_services->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $patient_services->DrID->headerCellClass() ?>"><div id="elh_patient_services_DrID" class="patient_services_DrID"><div class="ew-table-header-caption"><?php echo $patient_services->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $patient_services->DrID->headerCellClass() ?>"><div><div id="elh_patient_services_DrID" class="patient_services_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrCODE->Visible) { // DrCODE ?>
	<?php if ($patient_services->sortUrl($patient_services->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $patient_services->DrCODE->headerCellClass() ?>"><div id="elh_patient_services_DrCODE" class="patient_services_DrCODE"><div class="ew-table-header-caption"><?php echo $patient_services->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $patient_services->DrCODE->headerCellClass() ?>"><div><div id="elh_patient_services_DrCODE" class="patient_services_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrName->Visible) { // DrName ?>
	<?php if ($patient_services->sortUrl($patient_services->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $patient_services->DrName->headerCellClass() ?>"><div id="elh_patient_services_DrName" class="patient_services_DrName"><div class="ew-table-header-caption"><?php echo $patient_services->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $patient_services->DrName->headerCellClass() ?>"><div><div id="elh_patient_services_DrName" class="patient_services_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Department->Visible) { // Department ?>
	<?php if ($patient_services->sortUrl($patient_services->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $patient_services->Department->headerCellClass() ?>"><div id="elh_patient_services_Department" class="patient_services_Department"><div class="ew-table-header-caption"><?php echo $patient_services->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $patient_services->Department->headerCellClass() ?>"><div><div id="elh_patient_services_Department" class="patient_services_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($patient_services->sortUrl($patient_services->DrSharePres) == "") { ?>
		<th data-name="DrSharePres" class="<?php echo $patient_services->DrSharePres->headerCellClass() ?>"><div id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres"><div class="ew-table-header-caption"><?php echo $patient_services->DrSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePres" class="<?php echo $patient_services->DrSharePres->headerCellClass() ?>"><div><div id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrSharePres->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrSharePres->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($patient_services->sortUrl($patient_services->HospSharePres) == "") { ?>
		<th data-name="HospSharePres" class="<?php echo $patient_services->HospSharePres->headerCellClass() ?>"><div id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres"><div class="ew-table-header-caption"><?php echo $patient_services->HospSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePres" class="<?php echo $patient_services->HospSharePres->headerCellClass() ?>"><div><div id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->HospSharePres->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->HospSharePres->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($patient_services->sortUrl($patient_services->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $patient_services->DrShareAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount"><div class="ew-table-header-caption"><?php echo $patient_services->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $patient_services->DrShareAmount->headerCellClass() ?>"><div><div id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($patient_services->sortUrl($patient_services->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $patient_services->HospShareAmount->headerCellClass() ?>"><div id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount"><div class="ew-table-header-caption"><?php echo $patient_services->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $patient_services->HospShareAmount->headerCellClass() ?>"><div><div id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->HospShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->HospShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($patient_services->sortUrl($patient_services->DrShareSettiledAmount) == "") { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $patient_services->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount"><div class="ew-table-header-caption"><?php echo $patient_services->DrShareSettiledAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $patient_services->DrShareSettiledAmount->headerCellClass() ?>"><div><div id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrShareSettiledAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrShareSettiledAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($patient_services->sortUrl($patient_services->DrShareSettledId) == "") { ?>
		<th data-name="DrShareSettledId" class="<?php echo $patient_services->DrShareSettledId->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId"><div class="ew-table-header-caption"><?php echo $patient_services->DrShareSettledId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettledId" class="<?php echo $patient_services->DrShareSettledId->headerCellClass() ?>"><div><div id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrShareSettledId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrShareSettledId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($patient_services->sortUrl($patient_services->DrShareSettiledStatus) == "") { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $patient_services->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus"><div class="ew-table-header-caption"><?php echo $patient_services->DrShareSettiledStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $patient_services->DrShareSettiledStatus->headerCellClass() ?>"><div><div id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DrShareSettiledStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DrShareSettiledStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->invoiceId->Visible) { // invoiceId ?>
	<?php if ($patient_services->sortUrl($patient_services->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $patient_services->invoiceId->headerCellClass() ?>"><div id="elh_patient_services_invoiceId" class="patient_services_invoiceId"><div class="ew-table-header-caption"><?php echo $patient_services->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $patient_services->invoiceId->headerCellClass() ?>"><div><div id="elh_patient_services_invoiceId" class="patient_services_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->invoiceId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->invoiceId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($patient_services->sortUrl($patient_services->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $patient_services->invoiceAmount->headerCellClass() ?>"><div id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount"><div class="ew-table-header-caption"><?php echo $patient_services->invoiceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $patient_services->invoiceAmount->headerCellClass() ?>"><div><div id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->invoiceAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->invoiceAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($patient_services->sortUrl($patient_services->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $patient_services->invoiceStatus->headerCellClass() ?>"><div id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus"><div class="ew-table-header-caption"><?php echo $patient_services->invoiceStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $patient_services->invoiceStatus->headerCellClass() ?>"><div><div id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->invoiceStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->invoiceStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->invoiceStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($patient_services->sortUrl($patient_services->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $patient_services->modeOfPayment->headerCellClass() ?>"><div id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment"><div class="ew-table-header-caption"><?php echo $patient_services->modeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $patient_services->modeOfPayment->headerCellClass() ?>"><div><div id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->modeOfPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->modeOfPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->modeOfPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->HospID->Visible) { // HospID ?>
	<?php if ($patient_services->sortUrl($patient_services->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_services->HospID->headerCellClass() ?>"><div id="elh_patient_services_HospID" class="patient_services_HospID"><div class="ew-table-header-caption"><?php echo $patient_services->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_services->HospID->headerCellClass() ?>"><div><div id="elh_patient_services_HospID" class="patient_services_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->RIDNO->Visible) { // RIDNO ?>
	<?php if ($patient_services->sortUrl($patient_services->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $patient_services->RIDNO->headerCellClass() ?>"><div id="elh_patient_services_RIDNO" class="patient_services_RIDNO"><div class="ew-table-header-caption"><?php echo $patient_services->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $patient_services->RIDNO->headerCellClass() ?>"><div><div id="elh_patient_services_RIDNO" class="patient_services_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->TidNo->Visible) { // TidNo ?>
	<?php if ($patient_services->sortUrl($patient_services->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $patient_services->TidNo->headerCellClass() ?>"><div id="elh_patient_services_TidNo" class="patient_services_TidNo"><div class="ew-table-header-caption"><?php echo $patient_services->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $patient_services->TidNo->headerCellClass() ?>"><div><div id="elh_patient_services_TidNo" class="patient_services_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($patient_services->sortUrl($patient_services->DiscountCategory) == "") { ?>
		<th data-name="DiscountCategory" class="<?php echo $patient_services->DiscountCategory->headerCellClass() ?>"><div id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory"><div class="ew-table-header-caption"><?php echo $patient_services->DiscountCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountCategory" class="<?php echo $patient_services->DiscountCategory->headerCellClass() ?>"><div><div id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DiscountCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DiscountCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DiscountCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->sid->Visible) { // sid ?>
	<?php if ($patient_services->sortUrl($patient_services->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $patient_services->sid->headerCellClass() ?>"><div id="elh_patient_services_sid" class="patient_services_sid"><div class="ew-table-header-caption"><?php echo $patient_services->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $patient_services->sid->headerCellClass() ?>"><div><div id="elh_patient_services_sid" class="patient_services_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ItemCode->Visible) { // ItemCode ?>
	<?php if ($patient_services->sortUrl($patient_services->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $patient_services->ItemCode->headerCellClass() ?>"><div id="elh_patient_services_ItemCode" class="patient_services_ItemCode"><div class="ew-table-header-caption"><?php echo $patient_services->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $patient_services->ItemCode->headerCellClass() ?>"><div><div id="elh_patient_services_ItemCode" class="patient_services_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($patient_services->sortUrl($patient_services->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $patient_services->TestSubCd->headerCellClass() ?>"><div id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd"><div class="ew-table-header-caption"><?php echo $patient_services->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $patient_services->TestSubCd->headerCellClass() ?>"><div><div id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->TestSubCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->TestSubCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->TestSubCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DEptCd->Visible) { // DEptCd ?>
	<?php if ($patient_services->sortUrl($patient_services->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $patient_services->DEptCd->headerCellClass() ?>"><div id="elh_patient_services_DEptCd" class="patient_services_DEptCd"><div class="ew-table-header-caption"><?php echo $patient_services->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $patient_services->DEptCd->headerCellClass() ?>"><div><div id="elh_patient_services_DEptCd" class="patient_services_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ProfCd->Visible) { // ProfCd ?>
	<?php if ($patient_services->sortUrl($patient_services->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $patient_services->ProfCd->headerCellClass() ?>"><div id="elh_patient_services_ProfCd" class="patient_services_ProfCd"><div class="ew-table-header-caption"><?php echo $patient_services->ProfCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $patient_services->ProfCd->headerCellClass() ?>"><div><div id="elh_patient_services_ProfCd" class="patient_services_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ProfCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ProfCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ProfCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Comments->Visible) { // Comments ?>
	<?php if ($patient_services->sortUrl($patient_services->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $patient_services->Comments->headerCellClass() ?>"><div id="elh_patient_services_Comments" class="patient_services_Comments"><div class="ew-table-header-caption"><?php echo $patient_services->Comments->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $patient_services->Comments->headerCellClass() ?>"><div><div id="elh_patient_services_Comments" class="patient_services_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Comments->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Comments->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Comments->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Method->Visible) { // Method ?>
	<?php if ($patient_services->sortUrl($patient_services->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $patient_services->Method->headerCellClass() ?>"><div id="elh_patient_services_Method" class="patient_services_Method"><div class="ew-table-header-caption"><?php echo $patient_services->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $patient_services->Method->headerCellClass() ?>"><div><div id="elh_patient_services_Method" class="patient_services_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Specimen->Visible) { // Specimen ?>
	<?php if ($patient_services->sortUrl($patient_services->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $patient_services->Specimen->headerCellClass() ?>"><div id="elh_patient_services_Specimen" class="patient_services_Specimen"><div class="ew-table-header-caption"><?php echo $patient_services->Specimen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $patient_services->Specimen->headerCellClass() ?>"><div><div id="elh_patient_services_Specimen" class="patient_services_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Specimen->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Specimen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Specimen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Abnormal->Visible) { // Abnormal ?>
	<?php if ($patient_services->sortUrl($patient_services->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $patient_services->Abnormal->headerCellClass() ?>"><div id="elh_patient_services_Abnormal" class="patient_services_Abnormal"><div class="ew-table-header-caption"><?php echo $patient_services->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $patient_services->Abnormal->headerCellClass() ?>"><div><div id="elh_patient_services_Abnormal" class="patient_services_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Abnormal->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Abnormal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Abnormal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->TestUnit->Visible) { // TestUnit ?>
	<?php if ($patient_services->sortUrl($patient_services->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $patient_services->TestUnit->headerCellClass() ?>"><div id="elh_patient_services_TestUnit" class="patient_services_TestUnit"><div class="ew-table-header-caption"><?php echo $patient_services->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $patient_services->TestUnit->headerCellClass() ?>"><div><div id="elh_patient_services_TestUnit" class="patient_services_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->TestUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->TestUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($patient_services->sortUrl($patient_services->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $patient_services->LOWHIGH->headerCellClass() ?>"><div id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH"><div class="ew-table-header-caption"><?php echo $patient_services->LOWHIGH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $patient_services->LOWHIGH->headerCellClass() ?>"><div><div id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->LOWHIGH->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->LOWHIGH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->LOWHIGH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Branch->Visible) { // Branch ?>
	<?php if ($patient_services->sortUrl($patient_services->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $patient_services->Branch->headerCellClass() ?>"><div id="elh_patient_services_Branch" class="patient_services_Branch"><div class="ew-table-header-caption"><?php echo $patient_services->Branch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $patient_services->Branch->headerCellClass() ?>"><div><div id="elh_patient_services_Branch" class="patient_services_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Branch->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Branch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Branch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Dispatch->Visible) { // Dispatch ?>
	<?php if ($patient_services->sortUrl($patient_services->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $patient_services->Dispatch->headerCellClass() ?>"><div id="elh_patient_services_Dispatch" class="patient_services_Dispatch"><div class="ew-table-header-caption"><?php echo $patient_services->Dispatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $patient_services->Dispatch->headerCellClass() ?>"><div><div id="elh_patient_services_Dispatch" class="patient_services_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Dispatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Dispatch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Dispatch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Pic1->Visible) { // Pic1 ?>
	<?php if ($patient_services->sortUrl($patient_services->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $patient_services->Pic1->headerCellClass() ?>"><div id="elh_patient_services_Pic1" class="patient_services_Pic1"><div class="ew-table-header-caption"><?php echo $patient_services->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $patient_services->Pic1->headerCellClass() ?>"><div><div id="elh_patient_services_Pic1" class="patient_services_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Pic1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Pic1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Pic2->Visible) { // Pic2 ?>
	<?php if ($patient_services->sortUrl($patient_services->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $patient_services->Pic2->headerCellClass() ?>"><div id="elh_patient_services_Pic2" class="patient_services_Pic2"><div class="ew-table-header-caption"><?php echo $patient_services->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $patient_services->Pic2->headerCellClass() ?>"><div><div id="elh_patient_services_Pic2" class="patient_services_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Pic2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Pic2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->GraphPath->Visible) { // GraphPath ?>
	<?php if ($patient_services->sortUrl($patient_services->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $patient_services->GraphPath->headerCellClass() ?>"><div id="elh_patient_services_GraphPath" class="patient_services_GraphPath"><div class="ew-table-header-caption"><?php echo $patient_services->GraphPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $patient_services->GraphPath->headerCellClass() ?>"><div><div id="elh_patient_services_GraphPath" class="patient_services_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->GraphPath->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->GraphPath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->GraphPath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->MachineCD->Visible) { // MachineCD ?>
	<?php if ($patient_services->sortUrl($patient_services->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $patient_services->MachineCD->headerCellClass() ?>"><div id="elh_patient_services_MachineCD" class="patient_services_MachineCD"><div class="ew-table-header-caption"><?php echo $patient_services->MachineCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $patient_services->MachineCD->headerCellClass() ?>"><div><div id="elh_patient_services_MachineCD" class="patient_services_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->MachineCD->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->MachineCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->MachineCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->TestCancel->Visible) { // TestCancel ?>
	<?php if ($patient_services->sortUrl($patient_services->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $patient_services->TestCancel->headerCellClass() ?>"><div id="elh_patient_services_TestCancel" class="patient_services_TestCancel"><div class="ew-table-header-caption"><?php echo $patient_services->TestCancel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $patient_services->TestCancel->headerCellClass() ?>"><div><div id="elh_patient_services_TestCancel" class="patient_services_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->TestCancel->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->TestCancel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->TestCancel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->OutSource->Visible) { // OutSource ?>
	<?php if ($patient_services->sortUrl($patient_services->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $patient_services->OutSource->headerCellClass() ?>"><div id="elh_patient_services_OutSource" class="patient_services_OutSource"><div class="ew-table-header-caption"><?php echo $patient_services->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $patient_services->OutSource->headerCellClass() ?>"><div><div id="elh_patient_services_OutSource" class="patient_services_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->OutSource->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->OutSource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->OutSource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Printed->Visible) { // Printed ?>
	<?php if ($patient_services->sortUrl($patient_services->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $patient_services->Printed->headerCellClass() ?>"><div id="elh_patient_services_Printed" class="patient_services_Printed"><div class="ew-table-header-caption"><?php echo $patient_services->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $patient_services->Printed->headerCellClass() ?>"><div><div id="elh_patient_services_Printed" class="patient_services_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Printed->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Printed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Printed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->PrintBy->Visible) { // PrintBy ?>
	<?php if ($patient_services->sortUrl($patient_services->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $patient_services->PrintBy->headerCellClass() ?>"><div id="elh_patient_services_PrintBy" class="patient_services_PrintBy"><div class="ew-table-header-caption"><?php echo $patient_services->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $patient_services->PrintBy->headerCellClass() ?>"><div><div id="elh_patient_services_PrintBy" class="patient_services_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->PrintBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->PrintBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->PrintBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->PrintDate->Visible) { // PrintDate ?>
	<?php if ($patient_services->sortUrl($patient_services->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $patient_services->PrintDate->headerCellClass() ?>"><div id="elh_patient_services_PrintDate" class="patient_services_PrintDate"><div class="ew-table-header-caption"><?php echo $patient_services->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $patient_services->PrintDate->headerCellClass() ?>"><div><div id="elh_patient_services_PrintDate" class="patient_services_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->PrintDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->PrintDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->BillingDate->Visible) { // BillingDate ?>
	<?php if ($patient_services->sortUrl($patient_services->BillingDate) == "") { ?>
		<th data-name="BillingDate" class="<?php echo $patient_services->BillingDate->headerCellClass() ?>"><div id="elh_patient_services_BillingDate" class="patient_services_BillingDate"><div class="ew-table-header-caption"><?php echo $patient_services->BillingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillingDate" class="<?php echo $patient_services->BillingDate->headerCellClass() ?>"><div><div id="elh_patient_services_BillingDate" class="patient_services_BillingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->BillingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->BillingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->BilledBy->Visible) { // BilledBy ?>
	<?php if ($patient_services->sortUrl($patient_services->BilledBy) == "") { ?>
		<th data-name="BilledBy" class="<?php echo $patient_services->BilledBy->headerCellClass() ?>"><div id="elh_patient_services_BilledBy" class="patient_services_BilledBy"><div class="ew-table-header-caption"><?php echo $patient_services->BilledBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BilledBy" class="<?php echo $patient_services->BilledBy->headerCellClass() ?>"><div><div id="elh_patient_services_BilledBy" class="patient_services_BilledBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->BilledBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->BilledBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->BilledBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Resulted->Visible) { // Resulted ?>
	<?php if ($patient_services->sortUrl($patient_services->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $patient_services->Resulted->headerCellClass() ?>"><div id="elh_patient_services_Resulted" class="patient_services_Resulted"><div class="ew-table-header-caption"><?php echo $patient_services->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $patient_services->Resulted->headerCellClass() ?>"><div><div id="elh_patient_services_Resulted" class="patient_services_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Resulted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Resulted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ResultDate->Visible) { // ResultDate ?>
	<?php if ($patient_services->sortUrl($patient_services->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $patient_services->ResultDate->headerCellClass() ?>"><div id="elh_patient_services_ResultDate" class="patient_services_ResultDate"><div class="ew-table-header-caption"><?php echo $patient_services->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $patient_services->ResultDate->headerCellClass() ?>"><div><div id="elh_patient_services_ResultDate" class="patient_services_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($patient_services->sortUrl($patient_services->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_services->ResultedBy->headerCellClass() ?>"><div id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy"><div class="ew-table-header-caption"><?php echo $patient_services->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_services->ResultedBy->headerCellClass() ?>"><div><div id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SampleDate->Visible) { // SampleDate ?>
	<?php if ($patient_services->sortUrl($patient_services->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $patient_services->SampleDate->headerCellClass() ?>"><div id="elh_patient_services_SampleDate" class="patient_services_SampleDate"><div class="ew-table-header-caption"><?php echo $patient_services->SampleDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $patient_services->SampleDate->headerCellClass() ?>"><div><div id="elh_patient_services_SampleDate" class="patient_services_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SampleDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SampleDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SampleUser->Visible) { // SampleUser ?>
	<?php if ($patient_services->sortUrl($patient_services->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $patient_services->SampleUser->headerCellClass() ?>"><div id="elh_patient_services_SampleUser" class="patient_services_SampleUser"><div class="ew-table-header-caption"><?php echo $patient_services->SampleUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $patient_services->SampleUser->headerCellClass() ?>"><div><div id="elh_patient_services_SampleUser" class="patient_services_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SampleUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SampleUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SampleUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Sampled->Visible) { // Sampled ?>
	<?php if ($patient_services->sortUrl($patient_services->Sampled) == "") { ?>
		<th data-name="Sampled" class="<?php echo $patient_services->Sampled->headerCellClass() ?>"><div id="elh_patient_services_Sampled" class="patient_services_Sampled"><div class="ew-table-header-caption"><?php echo $patient_services->Sampled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sampled" class="<?php echo $patient_services->Sampled->headerCellClass() ?>"><div><div id="elh_patient_services_Sampled" class="patient_services_Sampled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Sampled->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Sampled->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Sampled->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($patient_services->sortUrl($patient_services->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $patient_services->ReceivedDate->headerCellClass() ?>"><div id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate"><div class="ew-table-header-caption"><?php echo $patient_services->ReceivedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $patient_services->ReceivedDate->headerCellClass() ?>"><div><div id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ReceivedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ReceivedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($patient_services->sortUrl($patient_services->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $patient_services->ReceivedUser->headerCellClass() ?>"><div id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser"><div class="ew-table-header-caption"><?php echo $patient_services->ReceivedUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $patient_services->ReceivedUser->headerCellClass() ?>"><div><div id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ReceivedUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ReceivedUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ReceivedUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Recevied->Visible) { // Recevied ?>
	<?php if ($patient_services->sortUrl($patient_services->Recevied) == "") { ?>
		<th data-name="Recevied" class="<?php echo $patient_services->Recevied->headerCellClass() ?>"><div id="elh_patient_services_Recevied" class="patient_services_Recevied"><div class="ew-table-header-caption"><?php echo $patient_services->Recevied->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Recevied" class="<?php echo $patient_services->Recevied->headerCellClass() ?>"><div><div id="elh_patient_services_Recevied" class="patient_services_Recevied">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Recevied->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Recevied->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Recevied->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($patient_services->sortUrl($patient_services->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $patient_services->DeptRecvDate->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate"><div class="ew-table-header-caption"><?php echo $patient_services->DeptRecvDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $patient_services->DeptRecvDate->headerCellClass() ?>"><div><div id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DeptRecvDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DeptRecvDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($patient_services->sortUrl($patient_services->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $patient_services->DeptRecvUser->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser"><div class="ew-table-header-caption"><?php echo $patient_services->DeptRecvUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $patient_services->DeptRecvUser->headerCellClass() ?>"><div><div id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DeptRecvUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DeptRecvUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DeptRecvUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($patient_services->sortUrl($patient_services->DeptRecived) == "") { ?>
		<th data-name="DeptRecived" class="<?php echo $patient_services->DeptRecived->headerCellClass() ?>"><div id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived"><div class="ew-table-header-caption"><?php echo $patient_services->DeptRecived->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecived" class="<?php echo $patient_services->DeptRecived->headerCellClass() ?>"><div><div id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->DeptRecived->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->DeptRecived->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->DeptRecived->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($patient_services->sortUrl($patient_services->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $patient_services->SAuthDate->headerCellClass() ?>"><div id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate"><div class="ew-table-header-caption"><?php echo $patient_services->SAuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $patient_services->SAuthDate->headerCellClass() ?>"><div><div id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SAuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SAuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($patient_services->sortUrl($patient_services->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $patient_services->SAuthBy->headerCellClass() ?>"><div id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy"><div class="ew-table-header-caption"><?php echo $patient_services->SAuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $patient_services->SAuthBy->headerCellClass() ?>"><div><div id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SAuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SAuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SAuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($patient_services->sortUrl($patient_services->SAuthendicate) == "") { ?>
		<th data-name="SAuthendicate" class="<?php echo $patient_services->SAuthendicate->headerCellClass() ?>"><div id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate"><div class="ew-table-header-caption"><?php echo $patient_services->SAuthendicate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthendicate" class="<?php echo $patient_services->SAuthendicate->headerCellClass() ?>"><div><div id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->SAuthendicate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->SAuthendicate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->SAuthendicate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->AuthDate->Visible) { // AuthDate ?>
	<?php if ($patient_services->sortUrl($patient_services->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $patient_services->AuthDate->headerCellClass() ?>"><div id="elh_patient_services_AuthDate" class="patient_services_AuthDate"><div class="ew-table-header-caption"><?php echo $patient_services->AuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $patient_services->AuthDate->headerCellClass() ?>"><div><div id="elh_patient_services_AuthDate" class="patient_services_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->AuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->AuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->AuthBy->Visible) { // AuthBy ?>
	<?php if ($patient_services->sortUrl($patient_services->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $patient_services->AuthBy->headerCellClass() ?>"><div id="elh_patient_services_AuthBy" class="patient_services_AuthBy"><div class="ew-table-header-caption"><?php echo $patient_services->AuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $patient_services->AuthBy->headerCellClass() ?>"><div><div id="elh_patient_services_AuthBy" class="patient_services_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->AuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->AuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->AuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Authencate->Visible) { // Authencate ?>
	<?php if ($patient_services->sortUrl($patient_services->Authencate) == "") { ?>
		<th data-name="Authencate" class="<?php echo $patient_services->Authencate->headerCellClass() ?>"><div id="elh_patient_services_Authencate" class="patient_services_Authencate"><div class="ew-table-header-caption"><?php echo $patient_services->Authencate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Authencate" class="<?php echo $patient_services->Authencate->headerCellClass() ?>"><div><div id="elh_patient_services_Authencate" class="patient_services_Authencate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Authencate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Authencate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Authencate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->EditDate->Visible) { // EditDate ?>
	<?php if ($patient_services->sortUrl($patient_services->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $patient_services->EditDate->headerCellClass() ?>"><div id="elh_patient_services_EditDate" class="patient_services_EditDate"><div class="ew-table-header-caption"><?php echo $patient_services->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $patient_services->EditDate->headerCellClass() ?>"><div><div id="elh_patient_services_EditDate" class="patient_services_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->EditDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->EditDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->EditBy->Visible) { // EditBy ?>
	<?php if ($patient_services->sortUrl($patient_services->EditBy) == "") { ?>
		<th data-name="EditBy" class="<?php echo $patient_services->EditBy->headerCellClass() ?>"><div id="elh_patient_services_EditBy" class="patient_services_EditBy"><div class="ew-table-header-caption"><?php echo $patient_services->EditBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditBy" class="<?php echo $patient_services->EditBy->headerCellClass() ?>"><div><div id="elh_patient_services_EditBy" class="patient_services_EditBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->EditBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->EditBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->EditBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Editted->Visible) { // Editted ?>
	<?php if ($patient_services->sortUrl($patient_services->Editted) == "") { ?>
		<th data-name="Editted" class="<?php echo $patient_services->Editted->headerCellClass() ?>"><div id="elh_patient_services_Editted" class="patient_services_Editted"><div class="ew-table-header-caption"><?php echo $patient_services->Editted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Editted" class="<?php echo $patient_services->Editted->headerCellClass() ?>"><div><div id="elh_patient_services_Editted" class="patient_services_Editted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Editted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Editted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Editted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->PatID->Visible) { // PatID ?>
	<?php if ($patient_services->sortUrl($patient_services->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_services->PatID->headerCellClass() ?>"><div id="elh_patient_services_PatID" class="patient_services_PatID"><div class="ew-table-header-caption"><?php echo $patient_services->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_services->PatID->headerCellClass() ?>"><div><div id="elh_patient_services_PatID" class="patient_services_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_services->sortUrl($patient_services->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_services->PatientId->headerCellClass() ?>"><div id="elh_patient_services_PatientId" class="patient_services_PatientId"><div class="ew-table-header-caption"><?php echo $patient_services->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_services->PatientId->headerCellClass() ?>"><div><div id="elh_patient_services_PatientId" class="patient_services_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Mobile->Visible) { // Mobile ?>
	<?php if ($patient_services->sortUrl($patient_services->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $patient_services->Mobile->headerCellClass() ?>"><div id="elh_patient_services_Mobile" class="patient_services_Mobile"><div class="ew-table-header-caption"><?php echo $patient_services->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $patient_services->Mobile->headerCellClass() ?>"><div><div id="elh_patient_services_Mobile" class="patient_services_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->CId->Visible) { // CId ?>
	<?php if ($patient_services->sortUrl($patient_services->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $patient_services->CId->headerCellClass() ?>"><div id="elh_patient_services_CId" class="patient_services_CId"><div class="ew-table-header-caption"><?php echo $patient_services->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $patient_services->CId->headerCellClass() ?>"><div><div id="elh_patient_services_CId" class="patient_services_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Order->Visible) { // Order ?>
	<?php if ($patient_services->sortUrl($patient_services->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $patient_services->Order->headerCellClass() ?>"><div id="elh_patient_services_Order" class="patient_services_Order"><div class="ew-table-header-caption"><?php echo $patient_services->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $patient_services->Order->headerCellClass() ?>"><div><div id="elh_patient_services_Order" class="patient_services_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->ResType->Visible) { // ResType ?>
	<?php if ($patient_services->sortUrl($patient_services->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $patient_services->ResType->headerCellClass() ?>"><div id="elh_patient_services_ResType" class="patient_services_ResType"><div class="ew-table-header-caption"><?php echo $patient_services->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $patient_services->ResType->headerCellClass() ?>"><div><div id="elh_patient_services_ResType" class="patient_services_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->ResType->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->ResType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->ResType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Sample->Visible) { // Sample ?>
	<?php if ($patient_services->sortUrl($patient_services->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $patient_services->Sample->headerCellClass() ?>"><div id="elh_patient_services_Sample" class="patient_services_Sample"><div class="ew-table-header-caption"><?php echo $patient_services->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $patient_services->Sample->headerCellClass() ?>"><div><div id="elh_patient_services_Sample" class="patient_services_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Sample->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Sample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Sample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->NoD->Visible) { // NoD ?>
	<?php if ($patient_services->sortUrl($patient_services->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $patient_services->NoD->headerCellClass() ?>"><div id="elh_patient_services_NoD" class="patient_services_NoD"><div class="ew-table-header-caption"><?php echo $patient_services->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $patient_services->NoD->headerCellClass() ?>"><div><div id="elh_patient_services_NoD" class="patient_services_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->NoD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->NoD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->BillOrder->Visible) { // BillOrder ?>
	<?php if ($patient_services->sortUrl($patient_services->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $patient_services->BillOrder->headerCellClass() ?>"><div id="elh_patient_services_BillOrder" class="patient_services_BillOrder"><div class="ew-table-header-caption"><?php echo $patient_services->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $patient_services->BillOrder->headerCellClass() ?>"><div><div id="elh_patient_services_BillOrder" class="patient_services_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->BillOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->BillOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Inactive->Visible) { // Inactive ?>
	<?php if ($patient_services->sortUrl($patient_services->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $patient_services->Inactive->headerCellClass() ?>"><div id="elh_patient_services_Inactive" class="patient_services_Inactive"><div class="ew-table-header-caption"><?php echo $patient_services->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $patient_services->Inactive->headerCellClass() ?>"><div><div id="elh_patient_services_Inactive" class="patient_services_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Inactive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Inactive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->CollSample->Visible) { // CollSample ?>
	<?php if ($patient_services->sortUrl($patient_services->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $patient_services->CollSample->headerCellClass() ?>"><div id="elh_patient_services_CollSample" class="patient_services_CollSample"><div class="ew-table-header-caption"><?php echo $patient_services->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $patient_services->CollSample->headerCellClass() ?>"><div><div id="elh_patient_services_CollSample" class="patient_services_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->CollSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->CollSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->CollSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->TestType->Visible) { // TestType ?>
	<?php if ($patient_services->sortUrl($patient_services->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $patient_services->TestType->headerCellClass() ?>"><div id="elh_patient_services_TestType" class="patient_services_TestType"><div class="ew-table-header-caption"><?php echo $patient_services->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $patient_services->TestType->headerCellClass() ?>"><div><div id="elh_patient_services_TestType" class="patient_services_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Repeated->Visible) { // Repeated ?>
	<?php if ($patient_services->sortUrl($patient_services->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $patient_services->Repeated->headerCellClass() ?>"><div id="elh_patient_services_Repeated" class="patient_services_Repeated"><div class="ew-table-header-caption"><?php echo $patient_services->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $patient_services->Repeated->headerCellClass() ?>"><div><div id="elh_patient_services_Repeated" class="patient_services_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Repeated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Repeated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($patient_services->sortUrl($patient_services->RepeatedBy) == "") { ?>
		<th data-name="RepeatedBy" class="<?php echo $patient_services->RepeatedBy->headerCellClass() ?>"><div id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy"><div class="ew-table-header-caption"><?php echo $patient_services->RepeatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedBy" class="<?php echo $patient_services->RepeatedBy->headerCellClass() ?>"><div><div id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->RepeatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->RepeatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->RepeatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($patient_services->sortUrl($patient_services->RepeatedDate) == "") { ?>
		<th data-name="RepeatedDate" class="<?php echo $patient_services->RepeatedDate->headerCellClass() ?>"><div id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate"><div class="ew-table-header-caption"><?php echo $patient_services->RepeatedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedDate" class="<?php echo $patient_services->RepeatedDate->headerCellClass() ?>"><div><div id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->RepeatedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->RepeatedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->serviceID->Visible) { // serviceID ?>
	<?php if ($patient_services->sortUrl($patient_services->serviceID) == "") { ?>
		<th data-name="serviceID" class="<?php echo $patient_services->serviceID->headerCellClass() ?>"><div id="elh_patient_services_serviceID" class="patient_services_serviceID"><div class="ew-table-header-caption"><?php echo $patient_services->serviceID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="serviceID" class="<?php echo $patient_services->serviceID->headerCellClass() ?>"><div><div id="elh_patient_services_serviceID" class="patient_services_serviceID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->serviceID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->serviceID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Service_Type->Visible) { // Service_Type ?>
	<?php if ($patient_services->sortUrl($patient_services->Service_Type) == "") { ?>
		<th data-name="Service_Type" class="<?php echo $patient_services->Service_Type->headerCellClass() ?>"><div id="elh_patient_services_Service_Type" class="patient_services_Service_Type"><div class="ew-table-header-caption"><?php echo $patient_services->Service_Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Type" class="<?php echo $patient_services->Service_Type->headerCellClass() ?>"><div><div id="elh_patient_services_Service_Type" class="patient_services_Service_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Service_Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Service_Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Service_Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->Service_Department->Visible) { // Service_Department ?>
	<?php if ($patient_services->sortUrl($patient_services->Service_Department) == "") { ?>
		<th data-name="Service_Department" class="<?php echo $patient_services->Service_Department->headerCellClass() ?>"><div id="elh_patient_services_Service_Department" class="patient_services_Service_Department"><div class="ew-table-header-caption"><?php echo $patient_services->Service_Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Department" class="<?php echo $patient_services->Service_Department->headerCellClass() ?>"><div><div id="elh_patient_services_Service_Department" class="patient_services_Service_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->Service_Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->Service_Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->Service_Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_services->RequestNo->Visible) { // RequestNo ?>
	<?php if ($patient_services->sortUrl($patient_services->RequestNo) == "") { ?>
		<th data-name="RequestNo" class="<?php echo $patient_services->RequestNo->headerCellClass() ?>"><div id="elh_patient_services_RequestNo" class="patient_services_RequestNo"><div class="ew-table-header-caption"><?php echo $patient_services->RequestNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestNo" class="<?php echo $patient_services->RequestNo->headerCellClass() ?>"><div><div id="elh_patient_services_RequestNo" class="patient_services_RequestNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_services->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_services->RequestNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_services->RequestNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
$patient_services_grid->StartRec = 1;
$patient_services_grid->StopRec = $patient_services_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_services_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_services_grid->FormKeyCountName) && ($patient_services->isGridAdd() || $patient_services->isGridEdit() || $patient_services->isConfirm())) {
		$patient_services_grid->KeyCount = $CurrentForm->getValue($patient_services_grid->FormKeyCountName);
		$patient_services_grid->StopRec = $patient_services_grid->StartRec + $patient_services_grid->KeyCount - 1;
	}
}
$patient_services_grid->RecCnt = $patient_services_grid->StartRec - 1;
if ($patient_services_grid->Recordset && !$patient_services_grid->Recordset->EOF) {
	$patient_services_grid->Recordset->moveFirst();
	$selectLimit = $patient_services_grid->UseSelectLimit;
	if (!$selectLimit && $patient_services_grid->StartRec > 1)
		$patient_services_grid->Recordset->move($patient_services_grid->StartRec - 1);
} elseif (!$patient_services->AllowAddDeleteRow && $patient_services_grid->StopRec == 0) {
	$patient_services_grid->StopRec = $patient_services->GridAddRowCount;
}

// Initialize aggregate
$patient_services->RowType = ROWTYPE_AGGREGATEINIT;
$patient_services->resetAttributes();
$patient_services_grid->renderRow();
if ($patient_services->isGridAdd())
	$patient_services_grid->RowIndex = 0;
if ($patient_services->isGridEdit())
	$patient_services_grid->RowIndex = 0;
while ($patient_services_grid->RecCnt < $patient_services_grid->StopRec) {
	$patient_services_grid->RecCnt++;
	if ($patient_services_grid->RecCnt >= $patient_services_grid->StartRec) {
		$patient_services_grid->RowCnt++;
		if ($patient_services->isGridAdd() || $patient_services->isGridEdit() || $patient_services->isConfirm()) {
			$patient_services_grid->RowIndex++;
			$CurrentForm->Index = $patient_services_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_services_grid->FormActionName) && $patient_services_grid->EventCancelled)
				$patient_services_grid->RowAction = strval($CurrentForm->getValue($patient_services_grid->FormActionName));
			elseif ($patient_services->isGridAdd())
				$patient_services_grid->RowAction = "insert";
			else
				$patient_services_grid->RowAction = "";
		}

		// Set up key count
		$patient_services_grid->KeyCount = $patient_services_grid->RowIndex;

		// Init row class and style
		$patient_services->resetAttributes();
		$patient_services->CssClass = "";
		if ($patient_services->isGridAdd()) {
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
		if ($patient_services->isGridAdd()) // Grid add
			$patient_services->RowType = ROWTYPE_ADD; // Render add
		if ($patient_services->isGridAdd() && $patient_services->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_services_grid->restoreCurrentRowFormValues($patient_services_grid->RowIndex); // Restore form values
		if ($patient_services->isGridEdit()) { // Grid edit
			if ($patient_services->EventCancelled)
				$patient_services_grid->restoreCurrentRowFormValues($patient_services_grid->RowIndex); // Restore form values
			if ($patient_services_grid->RowAction == "insert")
				$patient_services->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_services->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_services->isGridEdit() && ($patient_services->RowType == ROWTYPE_EDIT || $patient_services->RowType == ROWTYPE_ADD) && $patient_services->EventCancelled) // Update failed
			$patient_services_grid->restoreCurrentRowFormValues($patient_services_grid->RowIndex); // Restore form values
		if ($patient_services->RowType == ROWTYPE_EDIT) // Edit row
			$patient_services_grid->EditRowCnt++;
		if ($patient_services->isConfirm()) // Confirm row
			$patient_services_grid->restoreCurrentRowFormValues($patient_services_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_services->RowAttrs = array_merge($patient_services->RowAttrs, array('data-rowindex'=>$patient_services_grid->RowCnt, 'id'=>'r' . $patient_services_grid->RowCnt . '_patient_services', 'data-rowtype'=>$patient_services->RowType));

		// Render row
		$patient_services_grid->renderRow();

		// Render list options
		$patient_services_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_services_grid->RowAction <> "delete" && $patient_services_grid->RowAction <> "insertdelete" && !($patient_services_grid->RowAction == "insert" && $patient_services->isConfirm() && $patient_services_grid->emptyRow())) {
?>
	<tr<?php echo $patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_services_grid->ListOptions->render("body", "left", $patient_services_grid->RowCnt);
?>
	<?php if ($patient_services->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_services->id->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_id" name="o<?php echo $patient_services_grid->RowIndex ?>_id" id="o<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_id" class="form-group patient_services_id">
<span<?php echo $patient_services->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_id" name="x<?php echo $patient_services_grid->RowIndex ?>_id" id="x<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_id" class="patient_services_id">
<span<?php echo $patient_services->id->viewAttributes() ?>>
<?php echo $patient_services->id->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_id" name="x<?php echo $patient_services_grid->RowIndex ?>_id" id="x<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services->id->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_id" name="o<?php echo $patient_services_grid->RowIndex ?>_id" id="o<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_id" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_id" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services->id->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_id" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_id" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_services->Reception->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services->Reception->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Reception" class="form-group patient_services_Reception">
<span<?php echo $patient_services->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Reception" class="form-group patient_services_Reception">
<input type="text" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_services->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_services->Reception->EditValue ?>"<?php echo $patient_services->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="o<?php echo $patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Reception" class="form-group patient_services_Reception">
<span<?php echo $patient_services->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Reception" class="patient_services_Reception">
<span<?php echo $patient_services->Reception->viewAttributes() ?>>
<?php echo $patient_services->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="o<?php echo $patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Reception" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $patient_services->Services->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Services" class="form-group patient_services_Services">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_services_grid->RowIndex ?>_Services" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_services_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>"<?php echo $patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_Services" id="x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_servicesgrid.createAutoSuggest({"id":"x<?php echo $patient_services_grid->RowIndex ?>_Services","forceSelect":true});
</script>
<?php echo $patient_services->Services->Lookup->getParamTag("p_x" . $patient_services_grid->RowIndex . "_Services") ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="o<?php echo $patient_services_grid->RowIndex ?>_Services" id="o<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Services" class="form-group patient_services_Services">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_services_grid->RowIndex ?>_Services" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_services_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>"<?php echo $patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_Services" id="x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_servicesgrid.createAutoSuggest({"id":"x<?php echo $patient_services_grid->RowIndex ?>_Services","forceSelect":true});
</script>
<?php echo $patient_services->Services->Lookup->getParamTag("p_x" . $patient_services_grid->RowIndex . "_Services") ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Services" class="patient_services_Services">
<span<?php echo $patient_services->Services->viewAttributes() ?>>
<?php echo $patient_services->Services->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="x<?php echo $patient_services_grid->RowIndex ?>_Services" id="x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Services" name="o<?php echo $patient_services_grid->RowIndex ?>_Services" id="o<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Services" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Services" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Services" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $patient_services->amount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_amount" class="form-group patient_services_amount">
<input type="text" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_grid->RowIndex ?>_amount" id="x<?php echo $patient_services_grid->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services->amount->EditValue ?>"<?php echo $patient_services->amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="o<?php echo $patient_services_grid->RowIndex ?>_amount" id="o<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services->amount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_amount" class="form-group patient_services_amount">
<input type="text" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_grid->RowIndex ?>_amount" id="x<?php echo $patient_services_grid->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services->amount->EditValue ?>"<?php echo $patient_services->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_amount" class="patient_services_amount">
<span<?php echo $patient_services->amount->viewAttributes() ?>>
<?php echo $patient_services->amount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_grid->RowIndex ?>_amount" id="x<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services->amount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_amount" name="o<?php echo $patient_services_grid->RowIndex ?>_amount" id="o<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services->amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_amount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services->amount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_amount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_amount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services->amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->description->Visible) { // description ?>
		<td data-name="description"<?php echo $patient_services->description->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_description" class="form-group patient_services_description">
<input type="text" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_grid->RowIndex ?>_description" id="x<?php echo $patient_services_grid->RowIndex ?>_description" placeholder="<?php echo HtmlEncode($patient_services->description->getPlaceHolder()) ?>" value="<?php echo $patient_services->description->EditValue ?>"<?php echo $patient_services->description->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_description" name="o<?php echo $patient_services_grid->RowIndex ?>_description" id="o<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services->description->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_description" class="form-group patient_services_description">
<input type="text" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_grid->RowIndex ?>_description" id="x<?php echo $patient_services_grid->RowIndex ?>_description" placeholder="<?php echo HtmlEncode($patient_services->description->getPlaceHolder()) ?>" value="<?php echo $patient_services->description->EditValue ?>"<?php echo $patient_services->description->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_description" class="patient_services_description">
<span<?php echo $patient_services->description->viewAttributes() ?>>
<?php echo $patient_services->description->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_grid->RowIndex ?>_description" id="x<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services->description->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_description" name="o<?php echo $patient_services_grid->RowIndex ?>_description" id="o<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services->description->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_description" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_description" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services->description->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_description" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_description" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services->description->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type"<?php echo $patient_services->patient_type->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_patient_type" class="form-group patient_services_patient_type">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services->patient_type->EditValue ?>"<?php echo $patient_services->patient_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services->patient_type->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_patient_type" class="form-group patient_services_patient_type">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services->patient_type->EditValue ?>"<?php echo $patient_services->patient_type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_patient_type" class="patient_services_patient_type">
<span<?php echo $patient_services->patient_type->viewAttributes() ?>>
<?php echo $patient_services->patient_type->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services->patient_type->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services->patient_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services->patient_type->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services->patient_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date"<?php echo $patient_services->charged_date->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_charged_date" class="patient_services_charged_date">
<span<?php echo $patient_services->charged_date->viewAttributes() ?>>
<?php echo $patient_services->charged_date->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="x<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services->charged_date->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services->charged_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services->charged_date->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services->charged_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_services->status->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_status" class="form-group patient_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_services_grid->RowIndex ?>_status" name="x<?php echo $patient_services_grid->RowIndex ?>_status"<?php echo $patient_services->status->editAttributes() ?>>
		<?php echo $patient_services->status->selectOptionListHtml("x<?php echo $patient_services_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_services->status->Lookup->getParamTag("p_x" . $patient_services_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_status" name="o<?php echo $patient_services_grid->RowIndex ?>_status" id="o<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_status" class="form-group patient_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_services_grid->RowIndex ?>_status" name="x<?php echo $patient_services_grid->RowIndex ?>_status"<?php echo $patient_services->status->editAttributes() ?>>
		<?php echo $patient_services->status->selectOptionListHtml("x<?php echo $patient_services_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_services->status->Lookup->getParamTag("p_x" . $patient_services_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_status" class="patient_services_status">
<span<?php echo $patient_services->status->viewAttributes() ?>>
<?php echo $patient_services->status->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_status" name="x<?php echo $patient_services_grid->RowIndex ?>_status" id="x<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services->status->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_status" name="o<?php echo $patient_services_grid->RowIndex ?>_status" id="o<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_status" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_status" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services->status->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_status" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_status" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_services->mrnno->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services->mrnno->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_mrnno" class="form-group patient_services_mrnno">
<span<?php echo $patient_services->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_mrnno" class="form-group patient_services_mrnno">
<input type="text" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_services->mrnno->EditValue ?>"<?php echo $patient_services->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_mrnno" class="form-group patient_services_mrnno">
<span<?php echo $patient_services->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_mrnno" class="patient_services_mrnno">
<span<?php echo $patient_services->mrnno->viewAttributes() ?>>
<?php echo $patient_services->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_services->PatientName->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PatientName" class="form-group patient_services_PatientName">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientName->EditValue ?>"<?php echo $patient_services->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PatientName" class="form-group patient_services_PatientName">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientName->EditValue ?>"<?php echo $patient_services->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PatientName" class="patient_services_PatientName">
<span<?php echo $patient_services->PatientName->viewAttributes() ?>>
<?php echo $patient_services->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_services->Age->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Age" class="form-group patient_services_Age">
<input type="text" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_grid->RowIndex ?>_Age" id="x<?php echo $patient_services_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services->Age->EditValue ?>"<?php echo $patient_services->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="o<?php echo $patient_services_grid->RowIndex ?>_Age" id="o<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Age" class="form-group patient_services_Age">
<input type="text" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_grid->RowIndex ?>_Age" id="x<?php echo $patient_services_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services->Age->EditValue ?>"<?php echo $patient_services->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Age" class="patient_services_Age">
<span<?php echo $patient_services->Age->viewAttributes() ?>>
<?php echo $patient_services->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_grid->RowIndex ?>_Age" id="x<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services->Age->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Age" name="o<?php echo $patient_services_grid->RowIndex ?>_Age" id="o<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Age" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services->Age->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Age" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Age" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_services->Gender->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Gender" class="form-group patient_services_Gender">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $patient_services_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services->Gender->EditValue ?>"<?php echo $patient_services->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="o<?php echo $patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Gender" class="form-group patient_services_Gender">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $patient_services_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services->Gender->EditValue ?>"<?php echo $patient_services->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Gender" class="patient_services_Gender">
<span<?php echo $patient_services->Gender->viewAttributes() ?>>
<?php echo $patient_services->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="o<?php echo $patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Gender" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Unit->Visible) { // Unit ?>
		<td data-name="Unit"<?php echo $patient_services->Unit->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Unit" class="form-group patient_services_Unit">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $patient_services_grid->RowIndex ?>_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services->Unit->EditValue ?>"<?php echo $patient_services->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="o<?php echo $patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services->Unit->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Unit" class="form-group patient_services_Unit">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $patient_services_grid->RowIndex ?>_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services->Unit->EditValue ?>"<?php echo $patient_services->Unit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Unit" class="patient_services_Unit">
<span<?php echo $patient_services->Unit->viewAttributes() ?>>
<?php echo $patient_services->Unit->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services->Unit->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="o<?php echo $patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services->Unit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services->Unit->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Unit" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services->Unit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $patient_services->Quantity->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Quantity" class="form-group patient_services_Quantity">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services->Quantity->EditValue ?>"<?php echo $patient_services->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Quantity" class="form-group patient_services_Quantity">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services->Quantity->EditValue ?>"<?php echo $patient_services->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Quantity" class="patient_services_Quantity">
<span<?php echo $patient_services->Quantity->viewAttributes() ?>>
<?php echo $patient_services->Quantity->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services->Quantity->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services->Quantity->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Discount->Visible) { // Discount ?>
		<td data-name="Discount"<?php echo $patient_services->Discount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Discount" class="form-group patient_services_Discount">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $patient_services_grid->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services->Discount->EditValue ?>"<?php echo $patient_services->Discount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="o<?php echo $patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services->Discount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Discount" class="form-group patient_services_Discount">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $patient_services_grid->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services->Discount->EditValue ?>"<?php echo $patient_services->Discount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Discount" class="patient_services_Discount">
<span<?php echo $patient_services->Discount->viewAttributes() ?>>
<?php echo $patient_services->Discount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services->Discount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="o<?php echo $patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services->Discount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services->Discount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Discount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services->Discount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal"<?php echo $patient_services->SubTotal->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SubTotal" class="form-group patient_services_SubTotal">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services->SubTotal->EditValue ?>"<?php echo $patient_services->SubTotal->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SubTotal" class="form-group patient_services_SubTotal">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services->SubTotal->EditValue ?>"<?php echo $patient_services->SubTotal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SubTotal" class="patient_services_SubTotal">
<span<?php echo $patient_services->SubTotal->viewAttributes() ?>>
<?php echo $patient_services->SubTotal->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services->SubTotal->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services->SubTotal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services->SubTotal->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services->SubTotal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ServiceSelect->Visible) { // ServiceSelect ?>
		<td data-name="ServiceSelect"<?php echo $patient_services->ServiceSelect->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ServiceSelect" class="form-group patient_services_ServiceSelect">
<div id="tp_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="{value}"<?php echo $patient_services->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services->ServiceSelect->checkBoxListHtml(FALSE, "x{$patient_services_grid->RowIndex}_ServiceSelect[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="<?php echo HtmlEncode($patient_services->ServiceSelect->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ServiceSelect" class="form-group patient_services_ServiceSelect">
<div id="tp_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="{value}"<?php echo $patient_services->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services->ServiceSelect->checkBoxListHtml(FALSE, "x{$patient_services_grid->RowIndex}_ServiceSelect[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
<span<?php echo $patient_services->ServiceSelect->viewAttributes() ?>>
<?php echo $patient_services->ServiceSelect->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" id="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" value="<?php echo HtmlEncode($patient_services->ServiceSelect->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="<?php echo HtmlEncode($patient_services->ServiceSelect->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" value="<?php echo HtmlEncode($patient_services->ServiceSelect->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="<?php echo HtmlEncode($patient_services->ServiceSelect->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Aid->Visible) { // Aid ?>
		<td data-name="Aid"<?php echo $patient_services->Aid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Aid" class="form-group patient_services_Aid">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $patient_services_grid->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Aid->EditValue ?>"<?php echo $patient_services->Aid->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="o<?php echo $patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services->Aid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Aid" class="form-group patient_services_Aid">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $patient_services_grid->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Aid->EditValue ?>"<?php echo $patient_services->Aid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Aid" class="patient_services_Aid">
<span<?php echo $patient_services->Aid->viewAttributes() ?>>
<?php echo $patient_services->Aid->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services->Aid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="o<?php echo $patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services->Aid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services->Aid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Aid" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services->Aid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Vid->Visible) { // Vid ?>
		<td data-name="Vid"<?php echo $patient_services->Vid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Vid" class="form-group patient_services_Vid">
<span<?php echo $patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Vid" class="form-group patient_services_Vid">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Vid->EditValue ?>"<?php echo $patient_services->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="o<?php echo $patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_services->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Vid" class="form-group patient_services_Vid">
<span<?php echo $patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Vid" class="form-group patient_services_Vid">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Vid->EditValue ?>"<?php echo $patient_services->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Vid" class="patient_services_Vid">
<span<?php echo $patient_services->Vid->viewAttributes() ?>>
<?php echo $patient_services->Vid->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="o<?php echo $patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Vid" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $patient_services->DrID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrID" class="form-group patient_services_DrID">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $patient_services_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrID->EditValue ?>"<?php echo $patient_services->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="o<?php echo $patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services->DrID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrID" class="form-group patient_services_DrID">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $patient_services_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrID->EditValue ?>"<?php echo $patient_services->DrID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrID" class="patient_services_DrID">
<span<?php echo $patient_services->DrID->viewAttributes() ?>>
<?php echo $patient_services->DrID->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services->DrID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="o<?php echo $patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services->DrID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services->DrID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrID" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services->DrID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE"<?php echo $patient_services->DrCODE->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrCODE" class="form-group patient_services_DrCODE">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrCODE->EditValue ?>"<?php echo $patient_services->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrCODE" class="form-group patient_services_DrCODE">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrCODE->EditValue ?>"<?php echo $patient_services->DrCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrCODE" class="patient_services_DrCODE">
<span<?php echo $patient_services->DrCODE->viewAttributes() ?>>
<?php echo $patient_services->DrCODE->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services->DrCODE->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services->DrCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services->DrCODE->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services->DrCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $patient_services->DrName->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrName" class="form-group patient_services_DrName">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $patient_services_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrName->EditValue ?>"<?php echo $patient_services->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="o<?php echo $patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services->DrName->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrName" class="form-group patient_services_DrName">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $patient_services_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrName->EditValue ?>"<?php echo $patient_services->DrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrName" class="patient_services_DrName">
<span<?php echo $patient_services->DrName->viewAttributes() ?>>
<?php echo $patient_services->DrName->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services->DrName->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="o<?php echo $patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services->DrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services->DrName->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrName" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $patient_services->Department->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Department" class="form-group patient_services_Department">
<input type="text" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Department->EditValue ?>"<?php echo $patient_services->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services->Department->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Department" class="form-group patient_services_Department">
<input type="text" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Department->EditValue ?>"<?php echo $patient_services->Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Department" class="patient_services_Department">
<span<?php echo $patient_services->Department->viewAttributes() ?>>
<?php echo $patient_services->Department->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services->Department->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services->Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Department" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services->Department->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Department" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Department" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres"<?php echo $patient_services->DrSharePres->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrSharePres" class="form-group patient_services_DrSharePres">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrSharePres->EditValue ?>"<?php echo $patient_services->DrSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services->DrSharePres->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrSharePres" class="form-group patient_services_DrSharePres">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrSharePres->EditValue ?>"<?php echo $patient_services->DrSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrSharePres" class="patient_services_DrSharePres">
<span<?php echo $patient_services->DrSharePres->viewAttributes() ?>>
<?php echo $patient_services->DrSharePres->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services->DrSharePres->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services->DrSharePres->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services->DrSharePres->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services->DrSharePres->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres"<?php echo $patient_services->HospSharePres->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_HospSharePres" class="form-group patient_services_HospSharePres">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospSharePres->EditValue ?>"<?php echo $patient_services->HospSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services->HospSharePres->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_HospSharePres" class="form-group patient_services_HospSharePres">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospSharePres->EditValue ?>"<?php echo $patient_services->HospSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_HospSharePres" class="patient_services_HospSharePres">
<span<?php echo $patient_services->HospSharePres->viewAttributes() ?>>
<?php echo $patient_services->HospSharePres->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services->HospSharePres->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services->HospSharePres->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services->HospSharePres->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services->HospSharePres->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount"<?php echo $patient_services->DrShareAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareAmount" class="form-group patient_services_DrShareAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareAmount->EditValue ?>"<?php echo $patient_services->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareAmount" class="form-group patient_services_DrShareAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareAmount->EditValue ?>"<?php echo $patient_services->DrShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
<span<?php echo $patient_services->DrShareAmount->viewAttributes() ?>>
<?php echo $patient_services->DrShareAmount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services->DrShareAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services->DrShareAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services->DrShareAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount"<?php echo $patient_services->HospShareAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_HospShareAmount" class="form-group patient_services_HospShareAmount">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospShareAmount->EditValue ?>"<?php echo $patient_services->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_HospShareAmount" class="form-group patient_services_HospShareAmount">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospShareAmount->EditValue ?>"<?php echo $patient_services->HospShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
<span<?php echo $patient_services->HospShareAmount->viewAttributes() ?>>
<?php echo $patient_services->HospShareAmount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services->HospShareAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services->HospShareAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services->HospShareAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount"<?php echo $patient_services->DrShareSettiledAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareSettiledAmount" class="form-group patient_services_DrShareSettiledAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareSettiledAmount" class="form-group patient_services_DrShareSettiledAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
<span<?php echo $patient_services->DrShareSettiledAmount->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettiledAmount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId"<?php echo $patient_services->DrShareSettledId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareSettledId" class="form-group patient_services_DrShareSettledId">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettledId->EditValue ?>"<?php echo $patient_services->DrShareSettledId->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareSettledId" class="form-group patient_services_DrShareSettledId">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettledId->EditValue ?>"<?php echo $patient_services->DrShareSettledId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
<span<?php echo $patient_services->DrShareSettledId->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettledId->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services->DrShareSettledId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services->DrShareSettledId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services->DrShareSettledId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus"<?php echo $patient_services->DrShareSettiledStatus->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareSettiledStatus" class="form-group patient_services_DrShareSettiledStatus">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareSettiledStatus" class="form-group patient_services_DrShareSettiledStatus">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
<span<?php echo $patient_services->DrShareSettiledStatus->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettiledStatus->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId"<?php echo $patient_services->invoiceId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_invoiceId" class="form-group patient_services_invoiceId">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceId->EditValue ?>"<?php echo $patient_services->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_invoiceId" class="form-group patient_services_invoiceId">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceId->EditValue ?>"<?php echo $patient_services->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_invoiceId" class="patient_services_invoiceId">
<span<?php echo $patient_services->invoiceId->viewAttributes() ?>>
<?php echo $patient_services->invoiceId->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services->invoiceId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services->invoiceId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services->invoiceId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services->invoiceId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount"<?php echo $patient_services->invoiceAmount->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_invoiceAmount" class="form-group patient_services_invoiceAmount">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceAmount->EditValue ?>"<?php echo $patient_services->invoiceAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_invoiceAmount" class="form-group patient_services_invoiceAmount">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceAmount->EditValue ?>"<?php echo $patient_services->invoiceAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
<span<?php echo $patient_services->invoiceAmount->viewAttributes() ?>>
<?php echo $patient_services->invoiceAmount->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services->invoiceAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services->invoiceAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services->invoiceAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus"<?php echo $patient_services->invoiceStatus->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_invoiceStatus" class="form-group patient_services_invoiceStatus">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceStatus->EditValue ?>"<?php echo $patient_services->invoiceStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_invoiceStatus" class="form-group patient_services_invoiceStatus">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceStatus->EditValue ?>"<?php echo $patient_services->invoiceStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
<span<?php echo $patient_services->invoiceStatus->viewAttributes() ?>>
<?php echo $patient_services->invoiceStatus->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services->invoiceStatus->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services->invoiceStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services->invoiceStatus->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment"<?php echo $patient_services->modeOfPayment->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_modeOfPayment" class="form-group patient_services_modeOfPayment">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services->modeOfPayment->EditValue ?>"<?php echo $patient_services->modeOfPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_modeOfPayment" class="form-group patient_services_modeOfPayment">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services->modeOfPayment->EditValue ?>"<?php echo $patient_services->modeOfPayment->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
<span<?php echo $patient_services->modeOfPayment->viewAttributes() ?>>
<?php echo $patient_services->modeOfPayment->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services->modeOfPayment->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services->modeOfPayment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services->modeOfPayment->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_services->HospID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="o<?php echo $patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_HospID" class="patient_services_HospID">
<span<?php echo $patient_services->HospID->viewAttributes() ?>>
<?php echo $patient_services->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="x<?php echo $patient_services_grid->RowIndex ?>_HospID" id="x<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="o<?php echo $patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospID" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospID" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $patient_services->RIDNO->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RIDNO" class="form-group patient_services_RIDNO">
<input type="text" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($patient_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $patient_services->RIDNO->EditValue ?>"<?php echo $patient_services->RIDNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RIDNO" class="form-group patient_services_RIDNO">
<span<?php echo $patient_services->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->RIDNO->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services->RIDNO->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RIDNO" class="patient_services_RIDNO">
<span<?php echo $patient_services->RIDNO->viewAttributes() ?>>
<?php echo $patient_services->RIDNO->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services->RIDNO->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services->RIDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services->RIDNO->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $patient_services->TidNo->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TidNo" class="form-group patient_services_TidNo">
<input type="text" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($patient_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $patient_services->TidNo->EditValue ?>"<?php echo $patient_services->TidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TidNo" class="form-group patient_services_TidNo">
<span<?php echo $patient_services->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->TidNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services->TidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TidNo" class="patient_services_TidNo">
<span<?php echo $patient_services->TidNo->viewAttributes() ?>>
<?php echo $patient_services->TidNo->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services->TidNo->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services->TidNo->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory"<?php echo $patient_services->DiscountCategory->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DiscountCategory" class="form-group patient_services_DiscountCategory">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services->DiscountCategory->EditValue ?>"<?php echo $patient_services->DiscountCategory->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DiscountCategory" class="form-group patient_services_DiscountCategory">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services->DiscountCategory->EditValue ?>"<?php echo $patient_services->DiscountCategory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
<span<?php echo $patient_services->DiscountCategory->viewAttributes() ?>>
<?php echo $patient_services->DiscountCategory->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services->DiscountCategory->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services->DiscountCategory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services->DiscountCategory->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $patient_services->sid->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_sid" class="form-group patient_services_sid">
<input type="text" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_grid->RowIndex ?>_sid" id="x<?php echo $patient_services_grid->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services->sid->EditValue ?>"<?php echo $patient_services->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="o<?php echo $patient_services_grid->RowIndex ?>_sid" id="o<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services->sid->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_sid" class="form-group patient_services_sid">
<input type="text" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_grid->RowIndex ?>_sid" id="x<?php echo $patient_services_grid->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services->sid->EditValue ?>"<?php echo $patient_services->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_sid" class="patient_services_sid">
<span<?php echo $patient_services->sid->viewAttributes() ?>>
<?php echo $patient_services->sid->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_grid->RowIndex ?>_sid" id="x<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services->sid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_sid" name="o<?php echo $patient_services_grid->RowIndex ?>_sid" id="o<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services->sid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_sid" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services->sid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_sid" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_sid" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services->sid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $patient_services->ItemCode->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ItemCode" class="form-group patient_services_ItemCode">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services->ItemCode->EditValue ?>"<?php echo $patient_services->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ItemCode" class="form-group patient_services_ItemCode">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services->ItemCode->EditValue ?>"<?php echo $patient_services->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ItemCode" class="patient_services_ItemCode">
<span<?php echo $patient_services->ItemCode->viewAttributes() ?>>
<?php echo $patient_services->ItemCode->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services->ItemCode->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services->ItemCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services->ItemCode->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd"<?php echo $patient_services->TestSubCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestSubCd" class="form-group patient_services_TestSubCd">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestSubCd->EditValue ?>"<?php echo $patient_services->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestSubCd" class="form-group patient_services_TestSubCd">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestSubCd->EditValue ?>"<?php echo $patient_services->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestSubCd" class="patient_services_TestSubCd">
<span<?php echo $patient_services->TestSubCd->viewAttributes() ?>>
<?php echo $patient_services->TestSubCd->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services->TestSubCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services->TestSubCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $patient_services->DEptCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DEptCd" class="form-group patient_services_DEptCd">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->DEptCd->EditValue ?>"<?php echo $patient_services->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DEptCd" class="form-group patient_services_DEptCd">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->DEptCd->EditValue ?>"<?php echo $patient_services->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DEptCd" class="patient_services_DEptCd">
<span<?php echo $patient_services->DEptCd->viewAttributes() ?>>
<?php echo $patient_services->DEptCd->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services->DEptCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services->DEptCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services->DEptCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd"<?php echo $patient_services->ProfCd->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ProfCd" class="form-group patient_services_ProfCd">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->ProfCd->EditValue ?>"<?php echo $patient_services->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ProfCd" class="form-group patient_services_ProfCd">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->ProfCd->EditValue ?>"<?php echo $patient_services->ProfCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ProfCd" class="patient_services_ProfCd">
<span<?php echo $patient_services->ProfCd->viewAttributes() ?>>
<?php echo $patient_services->ProfCd->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services->ProfCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services->ProfCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services->ProfCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services->ProfCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Comments->Visible) { // Comments ?>
		<td data-name="Comments"<?php echo $patient_services->Comments->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Comments" class="form-group patient_services_Comments">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services->Comments->EditValue ?>"<?php echo $patient_services->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="o<?php echo $patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services->Comments->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Comments" class="form-group patient_services_Comments">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services->Comments->EditValue ?>"<?php echo $patient_services->Comments->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Comments" class="patient_services_Comments">
<span<?php echo $patient_services->Comments->viewAttributes() ?>>
<?php echo $patient_services->Comments->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services->Comments->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="o<?php echo $patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services->Comments->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services->Comments->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Comments" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services->Comments->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $patient_services->Method->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Method" class="form-group patient_services_Method">
<input type="text" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_grid->RowIndex ?>_Method" id="x<?php echo $patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services->Method->EditValue ?>"<?php echo $patient_services->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="o<?php echo $patient_services_grid->RowIndex ?>_Method" id="o<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services->Method->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Method" class="form-group patient_services_Method">
<input type="text" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_grid->RowIndex ?>_Method" id="x<?php echo $patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services->Method->EditValue ?>"<?php echo $patient_services->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Method" class="patient_services_Method">
<span<?php echo $patient_services->Method->viewAttributes() ?>>
<?php echo $patient_services->Method->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_grid->RowIndex ?>_Method" id="x<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services->Method->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Method" name="o<?php echo $patient_services_grid->RowIndex ?>_Method" id="o<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services->Method->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Method" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services->Method->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Method" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Method" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen"<?php echo $patient_services->Specimen->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Specimen" class="form-group patient_services_Specimen">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services->Specimen->EditValue ?>"<?php echo $patient_services->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Specimen" class="form-group patient_services_Specimen">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services->Specimen->EditValue ?>"<?php echo $patient_services->Specimen->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Specimen" class="patient_services_Specimen">
<span<?php echo $patient_services->Specimen->viewAttributes() ?>>
<?php echo $patient_services->Specimen->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services->Specimen->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services->Specimen->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services->Specimen->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services->Specimen->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal"<?php echo $patient_services->Abnormal->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Abnormal" class="form-group patient_services_Abnormal">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services->Abnormal->EditValue ?>"<?php echo $patient_services->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Abnormal" class="form-group patient_services_Abnormal">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services->Abnormal->EditValue ?>"<?php echo $patient_services->Abnormal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Abnormal" class="patient_services_Abnormal">
<span<?php echo $patient_services->Abnormal->viewAttributes() ?>>
<?php echo $patient_services->Abnormal->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services->Abnormal->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services->Abnormal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services->Abnormal->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services->Abnormal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit"<?php echo $patient_services->TestUnit->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestUnit" class="form-group patient_services_TestUnit">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestUnit->EditValue ?>"<?php echo $patient_services->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestUnit" class="form-group patient_services_TestUnit">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestUnit->EditValue ?>"<?php echo $patient_services->TestUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestUnit" class="patient_services_TestUnit">
<span<?php echo $patient_services->TestUnit->viewAttributes() ?>>
<?php echo $patient_services->TestUnit->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services->TestUnit->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services->TestUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services->TestUnit->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services->TestUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH"<?php echo $patient_services->LOWHIGH->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_LOWHIGH" class="form-group patient_services_LOWHIGH">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services->LOWHIGH->EditValue ?>"<?php echo $patient_services->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_LOWHIGH" class="form-group patient_services_LOWHIGH">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services->LOWHIGH->EditValue ?>"<?php echo $patient_services->LOWHIGH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
<span<?php echo $patient_services->LOWHIGH->viewAttributes() ?>>
<?php echo $patient_services->LOWHIGH->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services->LOWHIGH->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services->LOWHIGH->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services->LOWHIGH->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Branch->Visible) { // Branch ?>
		<td data-name="Branch"<?php echo $patient_services->Branch->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Branch" class="form-group patient_services_Branch">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Branch->EditValue ?>"<?php echo $patient_services->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="o<?php echo $patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services->Branch->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Branch" class="form-group patient_services_Branch">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Branch->EditValue ?>"<?php echo $patient_services->Branch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Branch" class="patient_services_Branch">
<span<?php echo $patient_services->Branch->viewAttributes() ?>>
<?php echo $patient_services->Branch->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services->Branch->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="o<?php echo $patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services->Branch->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services->Branch->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Branch" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services->Branch->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch"<?php echo $patient_services->Dispatch->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Dispatch" class="form-group patient_services_Dispatch">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Dispatch->EditValue ?>"<?php echo $patient_services->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Dispatch" class="form-group patient_services_Dispatch">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Dispatch->EditValue ?>"<?php echo $patient_services->Dispatch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Dispatch" class="patient_services_Dispatch">
<span<?php echo $patient_services->Dispatch->viewAttributes() ?>>
<?php echo $patient_services->Dispatch->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services->Dispatch->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services->Dispatch->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services->Dispatch->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services->Dispatch->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1"<?php echo $patient_services->Pic1->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Pic1" class="form-group patient_services_Pic1">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic1->EditValue ?>"<?php echo $patient_services->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Pic1" class="form-group patient_services_Pic1">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic1->EditValue ?>"<?php echo $patient_services->Pic1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Pic1" class="patient_services_Pic1">
<span<?php echo $patient_services->Pic1->viewAttributes() ?>>
<?php echo $patient_services->Pic1->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services->Pic1->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services->Pic1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services->Pic1->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services->Pic1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2"<?php echo $patient_services->Pic2->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Pic2" class="form-group patient_services_Pic2">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic2->EditValue ?>"<?php echo $patient_services->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Pic2" class="form-group patient_services_Pic2">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic2->EditValue ?>"<?php echo $patient_services->Pic2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Pic2" class="patient_services_Pic2">
<span<?php echo $patient_services->Pic2->viewAttributes() ?>>
<?php echo $patient_services->Pic2->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services->Pic2->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services->Pic2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services->Pic2->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services->Pic2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath"<?php echo $patient_services->GraphPath->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_GraphPath" class="form-group patient_services_GraphPath">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services->GraphPath->EditValue ?>"<?php echo $patient_services->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_GraphPath" class="form-group patient_services_GraphPath">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services->GraphPath->EditValue ?>"<?php echo $patient_services->GraphPath->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_GraphPath" class="patient_services_GraphPath">
<span<?php echo $patient_services->GraphPath->viewAttributes() ?>>
<?php echo $patient_services->GraphPath->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services->GraphPath->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services->GraphPath->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services->GraphPath->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services->GraphPath->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD"<?php echo $patient_services->MachineCD->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_MachineCD" class="form-group patient_services_MachineCD">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services->MachineCD->EditValue ?>"<?php echo $patient_services->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_MachineCD" class="form-group patient_services_MachineCD">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services->MachineCD->EditValue ?>"<?php echo $patient_services->MachineCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_MachineCD" class="patient_services_MachineCD">
<span<?php echo $patient_services->MachineCD->viewAttributes() ?>>
<?php echo $patient_services->MachineCD->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services->MachineCD->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services->MachineCD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services->MachineCD->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services->MachineCD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel"<?php echo $patient_services->TestCancel->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestCancel" class="form-group patient_services_TestCancel">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestCancel->EditValue ?>"<?php echo $patient_services->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestCancel" class="form-group patient_services_TestCancel">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestCancel->EditValue ?>"<?php echo $patient_services->TestCancel->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestCancel" class="patient_services_TestCancel">
<span<?php echo $patient_services->TestCancel->viewAttributes() ?>>
<?php echo $patient_services->TestCancel->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services->TestCancel->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services->TestCancel->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services->TestCancel->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services->TestCancel->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource"<?php echo $patient_services->OutSource->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_OutSource" class="form-group patient_services_OutSource">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services->OutSource->EditValue ?>"<?php echo $patient_services->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_OutSource" class="form-group patient_services_OutSource">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services->OutSource->EditValue ?>"<?php echo $patient_services->OutSource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_OutSource" class="patient_services_OutSource">
<span<?php echo $patient_services->OutSource->viewAttributes() ?>>
<?php echo $patient_services->OutSource->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services->OutSource->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services->OutSource->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services->OutSource->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services->OutSource->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Printed->Visible) { // Printed ?>
		<td data-name="Printed"<?php echo $patient_services->Printed->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Printed" class="form-group patient_services_Printed">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services->Printed->EditValue ?>"<?php echo $patient_services->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="o<?php echo $patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services->Printed->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Printed" class="form-group patient_services_Printed">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services->Printed->EditValue ?>"<?php echo $patient_services->Printed->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Printed" class="patient_services_Printed">
<span<?php echo $patient_services->Printed->viewAttributes() ?>>
<?php echo $patient_services->Printed->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services->Printed->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="o<?php echo $patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services->Printed->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services->Printed->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Printed" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services->Printed->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy"<?php echo $patient_services->PrintBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PrintBy" class="form-group patient_services_PrintBy">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintBy->EditValue ?>"<?php echo $patient_services->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PrintBy" class="form-group patient_services_PrintBy">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintBy->EditValue ?>"<?php echo $patient_services->PrintBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PrintBy" class="patient_services_PrintBy">
<span<?php echo $patient_services->PrintBy->viewAttributes() ?>>
<?php echo $patient_services->PrintBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services->PrintBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services->PrintBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services->PrintBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services->PrintBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate"<?php echo $patient_services->PrintDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PrintDate" class="form-group patient_services_PrintDate">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintDate->EditValue ?>"<?php echo $patient_services->PrintDate->editAttributes() ?>>
<?php if (!$patient_services->PrintDate->ReadOnly && !$patient_services->PrintDate->Disabled && !isset($patient_services->PrintDate->EditAttrs["readonly"]) && !isset($patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PrintDate" class="form-group patient_services_PrintDate">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintDate->EditValue ?>"<?php echo $patient_services->PrintDate->editAttributes() ?>>
<?php if (!$patient_services->PrintDate->ReadOnly && !$patient_services->PrintDate->Disabled && !isset($patient_services->PrintDate->EditAttrs["readonly"]) && !isset($patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PrintDate" class="patient_services_PrintDate">
<span<?php echo $patient_services->PrintDate->viewAttributes() ?>>
<?php echo $patient_services->PrintDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services->PrintDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services->PrintDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services->PrintDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services->PrintDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate"<?php echo $patient_services->BillingDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_BillingDate" class="form-group patient_services_BillingDate">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillingDate->EditValue ?>"<?php echo $patient_services->BillingDate->editAttributes() ?>>
<?php if (!$patient_services->BillingDate->ReadOnly && !$patient_services->BillingDate->Disabled && !isset($patient_services->BillingDate->EditAttrs["readonly"]) && !isset($patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services->BillingDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_BillingDate" class="form-group patient_services_BillingDate">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillingDate->EditValue ?>"<?php echo $patient_services->BillingDate->editAttributes() ?>>
<?php if (!$patient_services->BillingDate->ReadOnly && !$patient_services->BillingDate->Disabled && !isset($patient_services->BillingDate->EditAttrs["readonly"]) && !isset($patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_BillingDate" class="patient_services_BillingDate">
<span<?php echo $patient_services->BillingDate->viewAttributes() ?>>
<?php echo $patient_services->BillingDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services->BillingDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services->BillingDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services->BillingDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services->BillingDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy"<?php echo $patient_services->BilledBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_BilledBy" class="form-group patient_services_BilledBy">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->BilledBy->EditValue ?>"<?php echo $patient_services->BilledBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services->BilledBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_BilledBy" class="form-group patient_services_BilledBy">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->BilledBy->EditValue ?>"<?php echo $patient_services->BilledBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_BilledBy" class="patient_services_BilledBy">
<span<?php echo $patient_services->BilledBy->viewAttributes() ?>>
<?php echo $patient_services->BilledBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services->BilledBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services->BilledBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services->BilledBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services->BilledBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted"<?php echo $patient_services->Resulted->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Resulted" class="form-group patient_services_Resulted">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Resulted->EditValue ?>"<?php echo $patient_services->Resulted->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Resulted" class="form-group patient_services_Resulted">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Resulted->EditValue ?>"<?php echo $patient_services->Resulted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Resulted" class="patient_services_Resulted">
<span<?php echo $patient_services->Resulted->viewAttributes() ?>>
<?php echo $patient_services->Resulted->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services->Resulted->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services->Resulted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services->Resulted->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services->Resulted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $patient_services->ResultDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ResultDate" class="form-group patient_services_ResultDate">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultDate->EditValue ?>"<?php echo $patient_services->ResultDate->editAttributes() ?>>
<?php if (!$patient_services->ResultDate->ReadOnly && !$patient_services->ResultDate->Disabled && !isset($patient_services->ResultDate->EditAttrs["readonly"]) && !isset($patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ResultDate" class="form-group patient_services_ResultDate">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultDate->EditValue ?>"<?php echo $patient_services->ResultDate->editAttributes() ?>>
<?php if (!$patient_services->ResultDate->ReadOnly && !$patient_services->ResultDate->Disabled && !isset($patient_services->ResultDate->EditAttrs["readonly"]) && !isset($patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ResultDate" class="patient_services_ResultDate">
<span<?php echo $patient_services->ResultDate->viewAttributes() ?>>
<?php echo $patient_services->ResultDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services->ResultDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services->ResultDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services->ResultDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $patient_services->ResultedBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ResultedBy" class="form-group patient_services_ResultedBy">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultedBy->EditValue ?>"<?php echo $patient_services->ResultedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ResultedBy" class="form-group patient_services_ResultedBy">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultedBy->EditValue ?>"<?php echo $patient_services->ResultedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ResultedBy" class="patient_services_ResultedBy">
<span<?php echo $patient_services->ResultedBy->viewAttributes() ?>>
<?php echo $patient_services->ResultedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services->ResultedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate"<?php echo $patient_services->SampleDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SampleDate" class="form-group patient_services_SampleDate">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleDate->EditValue ?>"<?php echo $patient_services->SampleDate->editAttributes() ?>>
<?php if (!$patient_services->SampleDate->ReadOnly && !$patient_services->SampleDate->Disabled && !isset($patient_services->SampleDate->EditAttrs["readonly"]) && !isset($patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SampleDate" class="form-group patient_services_SampleDate">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleDate->EditValue ?>"<?php echo $patient_services->SampleDate->editAttributes() ?>>
<?php if (!$patient_services->SampleDate->ReadOnly && !$patient_services->SampleDate->Disabled && !isset($patient_services->SampleDate->EditAttrs["readonly"]) && !isset($patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SampleDate" class="patient_services_SampleDate">
<span<?php echo $patient_services->SampleDate->viewAttributes() ?>>
<?php echo $patient_services->SampleDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services->SampleDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services->SampleDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services->SampleDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services->SampleDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser"<?php echo $patient_services->SampleUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SampleUser" class="form-group patient_services_SampleUser">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleUser->EditValue ?>"<?php echo $patient_services->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SampleUser" class="form-group patient_services_SampleUser">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleUser->EditValue ?>"<?php echo $patient_services->SampleUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SampleUser" class="patient_services_SampleUser">
<span<?php echo $patient_services->SampleUser->viewAttributes() ?>>
<?php echo $patient_services->SampleUser->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services->SampleUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services->SampleUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services->SampleUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services->SampleUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled"<?php echo $patient_services->Sampled->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Sampled" class="form-group patient_services_Sampled">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sampled->EditValue ?>"<?php echo $patient_services->Sampled->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services->Sampled->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Sampled" class="form-group patient_services_Sampled">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sampled->EditValue ?>"<?php echo $patient_services->Sampled->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Sampled" class="patient_services_Sampled">
<span<?php echo $patient_services->Sampled->viewAttributes() ?>>
<?php echo $patient_services->Sampled->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services->Sampled->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services->Sampled->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services->Sampled->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services->Sampled->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate"<?php echo $patient_services->ReceivedDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ReceivedDate" class="form-group patient_services_ReceivedDate">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedDate->EditValue ?>"<?php echo $patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services->ReceivedDate->ReadOnly && !$patient_services->ReceivedDate->Disabled && !isset($patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ReceivedDate" class="form-group patient_services_ReceivedDate">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedDate->EditValue ?>"<?php echo $patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services->ReceivedDate->ReadOnly && !$patient_services->ReceivedDate->Disabled && !isset($patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
<span<?php echo $patient_services->ReceivedDate->viewAttributes() ?>>
<?php echo $patient_services->ReceivedDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services->ReceivedDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services->ReceivedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services->ReceivedDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser"<?php echo $patient_services->ReceivedUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ReceivedUser" class="form-group patient_services_ReceivedUser">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedUser->EditValue ?>"<?php echo $patient_services->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ReceivedUser" class="form-group patient_services_ReceivedUser">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedUser->EditValue ?>"<?php echo $patient_services->ReceivedUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
<span<?php echo $patient_services->ReceivedUser->viewAttributes() ?>>
<?php echo $patient_services->ReceivedUser->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services->ReceivedUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services->ReceivedUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services->ReceivedUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied"<?php echo $patient_services->Recevied->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Recevied" class="form-group patient_services_Recevied">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services->Recevied->EditValue ?>"<?php echo $patient_services->Recevied->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services->Recevied->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Recevied" class="form-group patient_services_Recevied">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services->Recevied->EditValue ?>"<?php echo $patient_services->Recevied->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Recevied" class="patient_services_Recevied">
<span<?php echo $patient_services->Recevied->viewAttributes() ?>>
<?php echo $patient_services->Recevied->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services->Recevied->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services->Recevied->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services->Recevied->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services->Recevied->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate"<?php echo $patient_services->DeptRecvDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DeptRecvDate" class="form-group patient_services_DeptRecvDate">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvDate->EditValue ?>"<?php echo $patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services->DeptRecvDate->ReadOnly && !$patient_services->DeptRecvDate->Disabled && !isset($patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DeptRecvDate" class="form-group patient_services_DeptRecvDate">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvDate->EditValue ?>"<?php echo $patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services->DeptRecvDate->ReadOnly && !$patient_services->DeptRecvDate->Disabled && !isset($patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
<span<?php echo $patient_services->DeptRecvDate->viewAttributes() ?>>
<?php echo $patient_services->DeptRecvDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services->DeptRecvDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services->DeptRecvDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services->DeptRecvDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser"<?php echo $patient_services->DeptRecvUser->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DeptRecvUser" class="form-group patient_services_DeptRecvUser">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvUser->EditValue ?>"<?php echo $patient_services->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DeptRecvUser" class="form-group patient_services_DeptRecvUser">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvUser->EditValue ?>"<?php echo $patient_services->DeptRecvUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
<span<?php echo $patient_services->DeptRecvUser->viewAttributes() ?>>
<?php echo $patient_services->DeptRecvUser->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services->DeptRecvUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services->DeptRecvUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services->DeptRecvUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived"<?php echo $patient_services->DeptRecived->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DeptRecived" class="form-group patient_services_DeptRecived">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecived->EditValue ?>"<?php echo $patient_services->DeptRecived->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services->DeptRecived->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DeptRecived" class="form-group patient_services_DeptRecived">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecived->EditValue ?>"<?php echo $patient_services->DeptRecived->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_DeptRecived" class="patient_services_DeptRecived">
<span<?php echo $patient_services->DeptRecived->viewAttributes() ?>>
<?php echo $patient_services->DeptRecived->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services->DeptRecived->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services->DeptRecived->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services->DeptRecived->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services->DeptRecived->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate"<?php echo $patient_services->SAuthDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SAuthDate" class="form-group patient_services_SAuthDate">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthDate->EditValue ?>"<?php echo $patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services->SAuthDate->ReadOnly && !$patient_services->SAuthDate->Disabled && !isset($patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SAuthDate" class="form-group patient_services_SAuthDate">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthDate->EditValue ?>"<?php echo $patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services->SAuthDate->ReadOnly && !$patient_services->SAuthDate->Disabled && !isset($patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SAuthDate" class="patient_services_SAuthDate">
<span<?php echo $patient_services->SAuthDate->viewAttributes() ?>>
<?php echo $patient_services->SAuthDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services->SAuthDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services->SAuthDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services->SAuthDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services->SAuthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy"<?php echo $patient_services->SAuthBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SAuthBy" class="form-group patient_services_SAuthBy">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthBy->EditValue ?>"<?php echo $patient_services->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SAuthBy" class="form-group patient_services_SAuthBy">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthBy->EditValue ?>"<?php echo $patient_services->SAuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SAuthBy" class="patient_services_SAuthBy">
<span<?php echo $patient_services->SAuthBy->viewAttributes() ?>>
<?php echo $patient_services->SAuthBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services->SAuthBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services->SAuthBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services->SAuthBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services->SAuthBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate"<?php echo $patient_services->SAuthendicate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SAuthendicate" class="form-group patient_services_SAuthendicate">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthendicate->EditValue ?>"<?php echo $patient_services->SAuthendicate->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SAuthendicate" class="form-group patient_services_SAuthendicate">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthendicate->EditValue ?>"<?php echo $patient_services->SAuthendicate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
<span<?php echo $patient_services->SAuthendicate->viewAttributes() ?>>
<?php echo $patient_services->SAuthendicate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services->SAuthendicate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services->SAuthendicate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services->SAuthendicate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate"<?php echo $patient_services->AuthDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_AuthDate" class="form-group patient_services_AuthDate">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthDate->EditValue ?>"<?php echo $patient_services->AuthDate->editAttributes() ?>>
<?php if (!$patient_services->AuthDate->ReadOnly && !$patient_services->AuthDate->Disabled && !isset($patient_services->AuthDate->EditAttrs["readonly"]) && !isset($patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_AuthDate" class="form-group patient_services_AuthDate">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthDate->EditValue ?>"<?php echo $patient_services->AuthDate->editAttributes() ?>>
<?php if (!$patient_services->AuthDate->ReadOnly && !$patient_services->AuthDate->Disabled && !isset($patient_services->AuthDate->EditAttrs["readonly"]) && !isset($patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_AuthDate" class="patient_services_AuthDate">
<span<?php echo $patient_services->AuthDate->viewAttributes() ?>>
<?php echo $patient_services->AuthDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services->AuthDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services->AuthDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services->AuthDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services->AuthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy"<?php echo $patient_services->AuthBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_AuthBy" class="form-group patient_services_AuthBy">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthBy->EditValue ?>"<?php echo $patient_services->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_AuthBy" class="form-group patient_services_AuthBy">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthBy->EditValue ?>"<?php echo $patient_services->AuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_AuthBy" class="patient_services_AuthBy">
<span<?php echo $patient_services->AuthBy->viewAttributes() ?>>
<?php echo $patient_services->AuthBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services->AuthBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services->AuthBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services->AuthBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services->AuthBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate"<?php echo $patient_services->Authencate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Authencate" class="form-group patient_services_Authencate">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services->Authencate->EditValue ?>"<?php echo $patient_services->Authencate->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services->Authencate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Authencate" class="form-group patient_services_Authencate">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services->Authencate->EditValue ?>"<?php echo $patient_services->Authencate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Authencate" class="patient_services_Authencate">
<span<?php echo $patient_services->Authencate->viewAttributes() ?>>
<?php echo $patient_services->Authencate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services->Authencate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services->Authencate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services->Authencate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services->Authencate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate"<?php echo $patient_services->EditDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_EditDate" class="form-group patient_services_EditDate">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditDate->EditValue ?>"<?php echo $patient_services->EditDate->editAttributes() ?>>
<?php if (!$patient_services->EditDate->ReadOnly && !$patient_services->EditDate->Disabled && !isset($patient_services->EditDate->EditAttrs["readonly"]) && !isset($patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services->EditDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_EditDate" class="form-group patient_services_EditDate">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditDate->EditValue ?>"<?php echo $patient_services->EditDate->editAttributes() ?>>
<?php if (!$patient_services->EditDate->ReadOnly && !$patient_services->EditDate->Disabled && !isset($patient_services->EditDate->EditAttrs["readonly"]) && !isset($patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_EditDate" class="patient_services_EditDate">
<span<?php echo $patient_services->EditDate->viewAttributes() ?>>
<?php echo $patient_services->EditDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services->EditDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services->EditDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services->EditDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services->EditDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy"<?php echo $patient_services->EditBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_EditBy" class="form-group patient_services_EditBy">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditBy->EditValue ?>"<?php echo $patient_services->EditBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services->EditBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_EditBy" class="form-group patient_services_EditBy">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditBy->EditValue ?>"<?php echo $patient_services->EditBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_EditBy" class="patient_services_EditBy">
<span<?php echo $patient_services->EditBy->viewAttributes() ?>>
<?php echo $patient_services->EditBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services->EditBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services->EditBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services->EditBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services->EditBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Editted->Visible) { // Editted ?>
		<td data-name="Editted"<?php echo $patient_services->Editted->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Editted" class="form-group patient_services_Editted">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Editted->EditValue ?>"<?php echo $patient_services->Editted->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="o<?php echo $patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services->Editted->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Editted" class="form-group patient_services_Editted">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Editted->EditValue ?>"<?php echo $patient_services->Editted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Editted" class="patient_services_Editted">
<span<?php echo $patient_services->Editted->viewAttributes() ?>>
<?php echo $patient_services->Editted->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services->Editted->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="o<?php echo $patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services->Editted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services->Editted->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Editted" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services->Editted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_services->PatID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_services->PatID->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PatID" class="form-group patient_services_PatID">
<span<?php echo $patient_services->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PatID" class="form-group patient_services_PatID">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatID->EditValue ?>"<?php echo $patient_services->PatID->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="o<?php echo $patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_services->PatID->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PatID" class="form-group patient_services_PatID">
<span<?php echo $patient_services->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PatID" class="form-group patient_services_PatID">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatID->EditValue ?>"<?php echo $patient_services->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PatID" class="patient_services_PatID">
<span<?php echo $patient_services->PatID->viewAttributes() ?>>
<?php echo $patient_services->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="o<?php echo $patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatID" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_services->PatientId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PatientId" class="form-group patient_services_PatientId">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientId->EditValue ?>"<?php echo $patient_services->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PatientId" class="form-group patient_services_PatientId">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientId->EditValue ?>"<?php echo $patient_services->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_PatientId" class="patient_services_PatientId">
<span<?php echo $patient_services->PatientId->viewAttributes() ?>>
<?php echo $patient_services->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $patient_services->Mobile->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Mobile" class="form-group patient_services_Mobile">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services->Mobile->EditValue ?>"<?php echo $patient_services->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Mobile" class="form-group patient_services_Mobile">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services->Mobile->EditValue ?>"<?php echo $patient_services->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Mobile" class="patient_services_Mobile">
<span<?php echo $patient_services->Mobile->viewAttributes() ?>>
<?php echo $patient_services->Mobile->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services->Mobile->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services->Mobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services->Mobile->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services->Mobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $patient_services->CId->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_CId" class="form-group patient_services_CId">
<input type="text" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_grid->RowIndex ?>_CId" id="x<?php echo $patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services->CId->EditValue ?>"<?php echo $patient_services->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="o<?php echo $patient_services_grid->RowIndex ?>_CId" id="o<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services->CId->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_CId" class="form-group patient_services_CId">
<input type="text" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_grid->RowIndex ?>_CId" id="x<?php echo $patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services->CId->EditValue ?>"<?php echo $patient_services->CId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_CId" class="patient_services_CId">
<span<?php echo $patient_services->CId->viewAttributes() ?>>
<?php echo $patient_services->CId->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_grid->RowIndex ?>_CId" id="x<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services->CId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_CId" name="o<?php echo $patient_services_grid->RowIndex ?>_CId" id="o<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services->CId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_CId" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services->CId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_CId" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_CId" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services->CId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $patient_services->Order->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Order" class="form-group patient_services_Order">
<input type="text" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_grid->RowIndex ?>_Order" id="x<?php echo $patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services->Order->EditValue ?>"<?php echo $patient_services->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="o<?php echo $patient_services_grid->RowIndex ?>_Order" id="o<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services->Order->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Order" class="form-group patient_services_Order">
<input type="text" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_grid->RowIndex ?>_Order" id="x<?php echo $patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services->Order->EditValue ?>"<?php echo $patient_services->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Order" class="patient_services_Order">
<span<?php echo $patient_services->Order->viewAttributes() ?>>
<?php echo $patient_services->Order->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_grid->RowIndex ?>_Order" id="x<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services->Order->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Order" name="o<?php echo $patient_services_grid->RowIndex ?>_Order" id="o<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services->Order->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Order" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services->Order->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Order" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Order" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->ResType->Visible) { // ResType ?>
		<td data-name="ResType"<?php echo $patient_services->ResType->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ResType" class="form-group patient_services_ResType">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResType->EditValue ?>"<?php echo $patient_services->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="o<?php echo $patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services->ResType->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ResType" class="form-group patient_services_ResType">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResType->EditValue ?>"<?php echo $patient_services->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_ResType" class="patient_services_ResType">
<span<?php echo $patient_services->ResType->viewAttributes() ?>>
<?php echo $patient_services->ResType->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services->ResType->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="o<?php echo $patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services->ResType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services->ResType->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResType" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services->ResType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Sample->Visible) { // Sample ?>
		<td data-name="Sample"<?php echo $patient_services->Sample->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Sample" class="form-group patient_services_Sample">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sample->EditValue ?>"<?php echo $patient_services->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="o<?php echo $patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services->Sample->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Sample" class="form-group patient_services_Sample">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sample->EditValue ?>"<?php echo $patient_services->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Sample" class="patient_services_Sample">
<span<?php echo $patient_services->Sample->viewAttributes() ?>>
<?php echo $patient_services->Sample->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services->Sample->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="o<?php echo $patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services->Sample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services->Sample->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Sample" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services->Sample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->NoD->Visible) { // NoD ?>
		<td data-name="NoD"<?php echo $patient_services->NoD->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_NoD" class="form-group patient_services_NoD">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services->NoD->EditValue ?>"<?php echo $patient_services->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="o<?php echo $patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services->NoD->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_NoD" class="form-group patient_services_NoD">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services->NoD->EditValue ?>"<?php echo $patient_services->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_NoD" class="patient_services_NoD">
<span<?php echo $patient_services->NoD->viewAttributes() ?>>
<?php echo $patient_services->NoD->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services->NoD->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="o<?php echo $patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services->NoD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services->NoD->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_NoD" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services->NoD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder"<?php echo $patient_services->BillOrder->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_BillOrder" class="form-group patient_services_BillOrder">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillOrder->EditValue ?>"<?php echo $patient_services->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_BillOrder" class="form-group patient_services_BillOrder">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillOrder->EditValue ?>"<?php echo $patient_services->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_BillOrder" class="patient_services_BillOrder">
<span<?php echo $patient_services->BillOrder->viewAttributes() ?>>
<?php echo $patient_services->BillOrder->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services->BillOrder->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services->BillOrder->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services->BillOrder->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services->BillOrder->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive"<?php echo $patient_services->Inactive->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Inactive" class="form-group patient_services_Inactive">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services->Inactive->EditValue ?>"<?php echo $patient_services->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Inactive" class="form-group patient_services_Inactive">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services->Inactive->EditValue ?>"<?php echo $patient_services->Inactive->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Inactive" class="patient_services_Inactive">
<span<?php echo $patient_services->Inactive->viewAttributes() ?>>
<?php echo $patient_services->Inactive->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services->Inactive->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services->Inactive->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services->Inactive->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services->Inactive->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample"<?php echo $patient_services->CollSample->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_CollSample" class="form-group patient_services_CollSample">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services->CollSample->EditValue ?>"<?php echo $patient_services->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_CollSample" class="form-group patient_services_CollSample">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services->CollSample->EditValue ?>"<?php echo $patient_services->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_CollSample" class="patient_services_CollSample">
<span<?php echo $patient_services->CollSample->viewAttributes() ?>>
<?php echo $patient_services->CollSample->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services->CollSample->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services->CollSample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services->CollSample->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services->CollSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $patient_services->TestType->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestType" class="form-group patient_services_TestType">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $patient_services_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestType->EditValue ?>"<?php echo $patient_services->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="o<?php echo $patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services->TestType->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestType" class="form-group patient_services_TestType">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $patient_services_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestType->EditValue ?>"<?php echo $patient_services->TestType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_TestType" class="patient_services_TestType">
<span<?php echo $patient_services->TestType->viewAttributes() ?>>
<?php echo $patient_services->TestType->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services->TestType->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="o<?php echo $patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services->TestType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services->TestType->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestType" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services->TestType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated"<?php echo $patient_services->Repeated->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Repeated" class="form-group patient_services_Repeated">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services->Repeated->EditValue ?>"<?php echo $patient_services->Repeated->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Repeated" class="form-group patient_services_Repeated">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services->Repeated->EditValue ?>"<?php echo $patient_services->Repeated->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Repeated" class="patient_services_Repeated">
<span<?php echo $patient_services->Repeated->viewAttributes() ?>>
<?php echo $patient_services->Repeated->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services->Repeated->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services->Repeated->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services->Repeated->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services->Repeated->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy"<?php echo $patient_services->RepeatedBy->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RepeatedBy" class="form-group patient_services_RepeatedBy">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedBy->EditValue ?>"<?php echo $patient_services->RepeatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RepeatedBy" class="form-group patient_services_RepeatedBy">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedBy->EditValue ?>"<?php echo $patient_services->RepeatedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
<span<?php echo $patient_services->RepeatedBy->viewAttributes() ?>>
<?php echo $patient_services->RepeatedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services->RepeatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services->RepeatedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services->RepeatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate"<?php echo $patient_services->RepeatedDate->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RepeatedDate" class="form-group patient_services_RepeatedDate">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedDate->EditValue ?>"<?php echo $patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services->RepeatedDate->ReadOnly && !$patient_services->RepeatedDate->Disabled && !isset($patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RepeatedDate" class="form-group patient_services_RepeatedDate">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedDate->EditValue ?>"<?php echo $patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services->RepeatedDate->ReadOnly && !$patient_services->RepeatedDate->Disabled && !isset($patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
<span<?php echo $patient_services->RepeatedDate->viewAttributes() ?>>
<?php echo $patient_services->RepeatedDate->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services->RepeatedDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services->RepeatedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services->RepeatedDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID"<?php echo $patient_services->serviceID->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_serviceID" class="form-group patient_services_serviceID">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services->serviceID->EditValue ?>"<?php echo $patient_services->serviceID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services->serviceID->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_serviceID" class="form-group patient_services_serviceID">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services->serviceID->EditValue ?>"<?php echo $patient_services->serviceID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_serviceID" class="patient_services_serviceID">
<span<?php echo $patient_services->serviceID->viewAttributes() ?>>
<?php echo $patient_services->serviceID->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services->serviceID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services->serviceID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services->serviceID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services->serviceID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type"<?php echo $patient_services->Service_Type->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Service_Type" class="form-group patient_services_Service_Type">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Type->EditValue ?>"<?php echo $patient_services->Service_Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services->Service_Type->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Service_Type" class="form-group patient_services_Service_Type">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Type->EditValue ?>"<?php echo $patient_services->Service_Type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Service_Type" class="patient_services_Service_Type">
<span<?php echo $patient_services->Service_Type->viewAttributes() ?>>
<?php echo $patient_services->Service_Type->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services->Service_Type->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services->Service_Type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services->Service_Type->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services->Service_Type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department"<?php echo $patient_services->Service_Department->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Service_Department" class="form-group patient_services_Service_Department">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Department->EditValue ?>"<?php echo $patient_services->Service_Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services->Service_Department->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Service_Department" class="form-group patient_services_Service_Department">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Department->EditValue ?>"<?php echo $patient_services->Service_Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_Service_Department" class="patient_services_Service_Department">
<span<?php echo $patient_services->Service_Department->viewAttributes() ?>>
<?php echo $patient_services->Service_Department->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services->Service_Department->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services->Service_Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services->Service_Department->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services->Service_Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_services->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo"<?php echo $patient_services->RequestNo->cellAttributes() ?>>
<?php if ($patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RequestNo" class="form-group patient_services_RequestNo">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services->RequestNo->EditValue ?>"<?php echo $patient_services->RequestNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services->RequestNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RequestNo" class="form-group patient_services_RequestNo">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services->RequestNo->EditValue ?>"<?php echo $patient_services->RequestNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_services_grid->RowCnt ?>_patient_services_RequestNo" class="patient_services_RequestNo">
<span<?php echo $patient_services->RequestNo->viewAttributes() ?>>
<?php echo $patient_services->RequestNo->getViewValue() ?></span>
</span>
<?php if (!$patient_services->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services->RequestNo->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services->RequestNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="fpatient_servicesgrid$x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services->RequestNo->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="fpatient_servicesgrid$o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services->RequestNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_services_grid->ListOptions->render("body", "right", $patient_services_grid->RowCnt);
?>
	</tr>
<?php if ($patient_services->RowType == ROWTYPE_ADD || $patient_services->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_servicesgrid.updateLists(<?php echo $patient_services_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_services->isGridAdd() || $patient_services->CurrentMode == "copy")
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
		$patient_services->RowAttrs = array_merge($patient_services->RowAttrs, array('data-rowindex'=>$patient_services_grid->RowIndex, 'id'=>'r0_patient_services', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_services->RowAttrs["class"], "ew-template");
		$patient_services->RowType = ROWTYPE_ADD;

		// Render row
		$patient_services_grid->renderRow();

		// Render list options
		$patient_services_grid->renderListOptions();
		$patient_services_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_services_grid->ListOptions->render("body", "left", $patient_services_grid->RowIndex);
?>
	<?php if ($patient_services->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_id" class="form-group patient_services_id">
<span<?php echo $patient_services->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_id" name="x<?php echo $patient_services_grid->RowIndex ?>_id" id="x<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_id" name="o<?php echo $patient_services_grid->RowIndex ?>_id" id="o<?php echo $patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_services->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_services->isConfirm()) { ?>
<?php if ($patient_services->Reception->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_services_Reception" class="form-group patient_services_Reception">
<span<?php echo $patient_services->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_services_Reception" class="form-group patient_services_Reception">
<input type="text" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_services->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_services->Reception->EditValue ?>"<?php echo $patient_services->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Reception" class="form-group patient_services_Reception">
<span<?php echo $patient_services->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="x<?php echo $patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" name="o<?php echo $patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_services->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Services->Visible) { // Services ?>
		<td data-name="Services">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Services" class="form-group patient_services_Services">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_services_grid->RowIndex ?>_Services" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_services_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_services->Services->getPlaceHolder()) ?>"<?php echo $patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-value-separator="<?php echo $patient_services->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_Services" id="x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_servicesgrid.createAutoSuggest({"id":"x<?php echo $patient_services_grid->RowIndex ?>_Services","forceSelect":true});
</script>
<?php echo $patient_services->Services->Lookup->getParamTag("p_x" . $patient_services_grid->RowIndex . "_Services") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Services" class="form-group patient_services_Services">
<span<?php echo $patient_services->Services->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Services->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="x<?php echo $patient_services_grid->RowIndex ?>_Services" id="x<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Services" name="o<?php echo $patient_services_grid->RowIndex ?>_Services" id="o<?php echo $patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($patient_services->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->amount->Visible) { // amount ?>
		<td data-name="amount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_amount" class="form-group patient_services_amount">
<input type="text" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_grid->RowIndex ?>_amount" id="x<?php echo $patient_services_grid->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $patient_services->amount->EditValue ?>"<?php echo $patient_services->amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_amount" class="form-group patient_services_amount">
<span<?php echo $patient_services->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->amount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="x<?php echo $patient_services_grid->RowIndex ?>_amount" id="x<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services->amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_amount" name="o<?php echo $patient_services_grid->RowIndex ?>_amount" id="o<?php echo $patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($patient_services->amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->description->Visible) { // description ?>
		<td data-name="description">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_description" class="form-group patient_services_description">
<input type="text" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_grid->RowIndex ?>_description" id="x<?php echo $patient_services_grid->RowIndex ?>_description" placeholder="<?php echo HtmlEncode($patient_services->description->getPlaceHolder()) ?>" value="<?php echo $patient_services->description->EditValue ?>"<?php echo $patient_services->description->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_description" class="form-group patient_services_description">
<span<?php echo $patient_services->description->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->description->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_description" name="x<?php echo $patient_services_grid->RowIndex ?>_description" id="x<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services->description->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_description" name="o<?php echo $patient_services_grid->RowIndex ?>_description" id="o<?php echo $patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($patient_services->description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_patient_type" class="form-group patient_services_patient_type">
<input type="text" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($patient_services->patient_type->getPlaceHolder()) ?>" value="<?php echo $patient_services->patient_type->EditValue ?>"<?php echo $patient_services->patient_type->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_patient_type" class="form-group patient_services_patient_type">
<span<?php echo $patient_services->patient_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->patient_type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services->patient_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" name="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($patient_services->patient_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date">
<?php if (!$patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_charged_date" class="form-group patient_services_charged_date">
<span<?php echo $patient_services->charged_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->charged_date->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="x<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services->charged_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" name="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($patient_services->charged_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_status" class="form-group patient_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_services" data-field="x_status" data-value-separator="<?php echo $patient_services->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_services_grid->RowIndex ?>_status" name="x<?php echo $patient_services_grid->RowIndex ?>_status"<?php echo $patient_services->status->editAttributes() ?>>
		<?php echo $patient_services->status->selectOptionListHtml("x<?php echo $patient_services_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_services->status->Lookup->getParamTag("p_x" . $patient_services_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_status" class="form-group patient_services_status">
<span<?php echo $patient_services->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_status" name="x<?php echo $patient_services_grid->RowIndex ?>_status" id="x<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_status" name="o<?php echo $patient_services_grid->RowIndex ?>_status" id="o<?php echo $patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_services->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_services->isConfirm()) { ?>
<?php if ($patient_services->mrnno->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_services_mrnno" class="form-group patient_services_mrnno">
<span<?php echo $patient_services->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_services_mrnno" class="form-group patient_services_mrnno">
<input type="text" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_services->mrnno->EditValue ?>"<?php echo $patient_services->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_mrnno" class="form-group patient_services_mrnno">
<span<?php echo $patient_services->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" name="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_services->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PatientName" class="form-group patient_services_PatientName">
<input type="text" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientName->EditValue ?>"<?php echo $patient_services->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatientName" class="form-group patient_services_PatientName">
<span<?php echo $patient_services->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_services->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Age" class="form-group patient_services_Age">
<input type="text" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_grid->RowIndex ?>_Age" id="x<?php echo $patient_services_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Age->getPlaceHolder()) ?>" value="<?php echo $patient_services->Age->EditValue ?>"<?php echo $patient_services->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Age" class="form-group patient_services_Age">
<span<?php echo $patient_services->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="x<?php echo $patient_services_grid->RowIndex ?>_Age" id="x<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Age" name="o<?php echo $patient_services_grid->RowIndex ?>_Age" id="o<?php echo $patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_services->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Gender" class="form-group patient_services_Gender">
<input type="text" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $patient_services_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_services->Gender->EditValue ?>"<?php echo $patient_services->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Gender" class="form-group patient_services_Gender">
<span<?php echo $patient_services->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="x<?php echo $patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Gender" name="o<?php echo $patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_services->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Unit->Visible) { // Unit ?>
		<td data-name="Unit">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Unit" class="form-group patient_services_Unit">
<input type="text" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $patient_services_grid->RowIndex ?>_Unit" size="30" placeholder="<?php echo HtmlEncode($patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $patient_services->Unit->EditValue ?>"<?php echo $patient_services->Unit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Unit" class="form-group patient_services_Unit">
<span<?php echo $patient_services->Unit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Unit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="x<?php echo $patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services->Unit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Unit" name="o<?php echo $patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($patient_services->Unit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Quantity" class="form-group patient_services_Quantity">
<input type="text" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $patient_services->Quantity->EditValue ?>"<?php echo $patient_services->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Quantity" class="form-group patient_services_Quantity">
<span<?php echo $patient_services->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Quantity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" name="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($patient_services->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Discount->Visible) { // Discount ?>
		<td data-name="Discount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Discount" class="form-group patient_services_Discount">
<input type="text" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $patient_services_grid->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $patient_services->Discount->EditValue ?>"<?php echo $patient_services->Discount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Discount" class="form-group patient_services_Discount">
<span<?php echo $patient_services->Discount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Discount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="x<?php echo $patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services->Discount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Discount" name="o<?php echo $patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($patient_services->Discount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SubTotal" class="form-group patient_services_SubTotal">
<input type="text" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?php echo HtmlEncode($patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $patient_services->SubTotal->EditValue ?>"<?php echo $patient_services->SubTotal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SubTotal" class="form-group patient_services_SubTotal">
<span<?php echo $patient_services->SubTotal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->SubTotal->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services->SubTotal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" name="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($patient_services->SubTotal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->ServiceSelect->Visible) { // ServiceSelect ?>
		<td data-name="ServiceSelect">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ServiceSelect" class="form-group patient_services_ServiceSelect">
<div id="tp_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_services" data-field="x_ServiceSelect" data-value-separator="<?php echo $patient_services->ServiceSelect->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="{value}"<?php echo $patient_services->ServiceSelect->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_services->ServiceSelect->checkBoxListHtml(FALSE, "x{$patient_services_grid->RowIndex}_ServiceSelect[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ServiceSelect" class="form-group patient_services_ServiceSelect">
<span<?php echo $patient_services->ServiceSelect->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->ServiceSelect->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" id="x<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect" value="<?php echo HtmlEncode($patient_services->ServiceSelect->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" name="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" id="o<?php echo $patient_services_grid->RowIndex ?>_ServiceSelect[]" value="<?php echo HtmlEncode($patient_services->ServiceSelect->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Aid->Visible) { // Aid ?>
		<td data-name="Aid">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Aid" class="form-group patient_services_Aid">
<input type="text" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $patient_services_grid->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Aid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Aid->EditValue ?>"<?php echo $patient_services->Aid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Aid" class="form-group patient_services_Aid">
<span<?php echo $patient_services->Aid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Aid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="x<?php echo $patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services->Aid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Aid" name="o<?php echo $patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($patient_services->Aid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if (!$patient_services->isConfirm()) { ?>
<?php if ($patient_services->Vid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_services_Vid" class="form-group patient_services_Vid">
<span<?php echo $patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_services_Vid" class="form-group patient_services_Vid">
<input type="text" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($patient_services->Vid->getPlaceHolder()) ?>" value="<?php echo $patient_services->Vid->EditValue ?>"<?php echo $patient_services->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Vid" class="form-group patient_services_Vid">
<span<?php echo $patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="x<?php echo $patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" name="o<?php echo $patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($patient_services->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrID" class="form-group patient_services_DrID">
<input type="text" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $patient_services_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrID->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrID->EditValue ?>"<?php echo $patient_services->DrID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrID" class="form-group patient_services_DrID">
<span<?php echo $patient_services->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DrID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="x<?php echo $patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services->DrID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrID" name="o<?php echo $patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($patient_services->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrCODE" class="form-group patient_services_DrCODE">
<input type="text" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrCODE->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrCODE->EditValue ?>"<?php echo $patient_services->DrCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrCODE" class="form-group patient_services_DrCODE">
<span<?php echo $patient_services->DrCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DrCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services->DrCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" name="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($patient_services->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrName" class="form-group patient_services_DrName">
<input type="text" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $patient_services_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DrName->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrName->EditValue ?>"<?php echo $patient_services->DrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrName" class="form-group patient_services_DrName">
<span<?php echo $patient_services->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="x<?php echo $patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrName" name="o<?php echo $patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($patient_services->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Department->Visible) { // Department ?>
		<td data-name="Department">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Department" class="form-group patient_services_Department">
<input type="text" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Department->EditValue ?>"<?php echo $patient_services->Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Department" class="form-group patient_services_Department">
<span<?php echo $patient_services->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Department->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($patient_services->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrSharePres" class="form-group patient_services_DrSharePres">
<input type="text" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrSharePres->EditValue ?>"<?php echo $patient_services->DrSharePres->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrSharePres" class="form-group patient_services_DrSharePres">
<span<?php echo $patient_services->DrSharePres->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DrSharePres->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services->DrSharePres->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($patient_services->DrSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_HospSharePres" class="form-group patient_services_HospSharePres">
<input type="text" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospSharePres->EditValue ?>"<?php echo $patient_services->HospSharePres->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_HospSharePres" class="form-group patient_services_HospSharePres">
<span<?php echo $patient_services->HospSharePres->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->HospSharePres->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services->HospSharePres->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" name="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($patient_services->HospSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareAmount" class="form-group patient_services_DrShareAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareAmount->EditValue ?>"<?php echo $patient_services->DrShareAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareAmount" class="form-group patient_services_DrShareAmount">
<span<?php echo $patient_services->DrShareAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DrShareAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services->DrShareAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($patient_services->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_HospShareAmount" class="form-group patient_services_HospShareAmount">
<input type="text" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->HospShareAmount->EditValue ?>"<?php echo $patient_services->HospShareAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_HospShareAmount" class="form-group patient_services_HospShareAmount">
<span<?php echo $patient_services->HospShareAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->HospShareAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services->HospShareAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($patient_services->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledAmount" class="form-group patient_services_DrShareSettiledAmount">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledAmount" class="form-group patient_services_DrShareSettiledAmount">
<span<?php echo $patient_services->DrShareSettiledAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DrShareSettiledAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($patient_services->DrShareSettiledAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareSettledId" class="form-group patient_services_DrShareSettledId">
<input type="text" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettledId->EditValue ?>"<?php echo $patient_services->DrShareSettledId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareSettledId" class="form-group patient_services_DrShareSettledId">
<span<?php echo $patient_services->DrShareSettledId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DrShareSettledId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services->DrShareSettledId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($patient_services->DrShareSettledId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledStatus" class="form-group patient_services_DrShareSettiledStatus">
<input type="text" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledStatus" class="form-group patient_services_DrShareSettiledStatus">
<span<?php echo $patient_services->DrShareSettiledStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DrShareSettiledStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($patient_services->DrShareSettiledStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_invoiceId" class="form-group patient_services_invoiceId">
<input type="text" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceId->EditValue ?>"<?php echo $patient_services->invoiceId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_invoiceId" class="form-group patient_services_invoiceId">
<span<?php echo $patient_services->invoiceId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->invoiceId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services->invoiceId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($patient_services->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_invoiceAmount" class="form-group patient_services_invoiceAmount">
<input type="text" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceAmount->EditValue ?>"<?php echo $patient_services->invoiceAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_invoiceAmount" class="form-group patient_services_invoiceAmount">
<span<?php echo $patient_services->invoiceAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->invoiceAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services->invoiceAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($patient_services->invoiceAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_invoiceStatus" class="form-group patient_services_invoiceStatus">
<input type="text" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $patient_services->invoiceStatus->EditValue ?>"<?php echo $patient_services->invoiceStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_invoiceStatus" class="form-group patient_services_invoiceStatus">
<span<?php echo $patient_services->invoiceStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->invoiceStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services->invoiceStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" name="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($patient_services->invoiceStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_modeOfPayment" class="form-group patient_services_modeOfPayment">
<input type="text" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $patient_services->modeOfPayment->EditValue ?>"<?php echo $patient_services->modeOfPayment->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_modeOfPayment" class="form-group patient_services_modeOfPayment">
<span<?php echo $patient_services->modeOfPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->modeOfPayment->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services->modeOfPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" name="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($patient_services->modeOfPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_HospID" class="form-group patient_services_HospID">
<span<?php echo $patient_services->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="x<?php echo $patient_services_grid->RowIndex ?>_HospID" id="x<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" name="o<?php echo $patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_services->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RIDNO" class="form-group patient_services_RIDNO">
<input type="text" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($patient_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $patient_services->RIDNO->EditValue ?>"<?php echo $patient_services->RIDNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RIDNO" class="form-group patient_services_RIDNO">
<span<?php echo $patient_services->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" name="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($patient_services->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TidNo" class="form-group patient_services_TidNo">
<input type="text" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($patient_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $patient_services->TidNo->EditValue ?>"<?php echo $patient_services->TidNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TidNo" class="form-group patient_services_TidNo">
<span<?php echo $patient_services->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" name="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($patient_services->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DiscountCategory" class="form-group patient_services_DiscountCategory">
<input type="text" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DiscountCategory->getPlaceHolder()) ?>" value="<?php echo $patient_services->DiscountCategory->EditValue ?>"<?php echo $patient_services->DiscountCategory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DiscountCategory" class="form-group patient_services_DiscountCategory">
<span<?php echo $patient_services->DiscountCategory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DiscountCategory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services->DiscountCategory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" name="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($patient_services->DiscountCategory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->sid->Visible) { // sid ?>
		<td data-name="sid">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_sid" class="form-group patient_services_sid">
<input type="text" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_grid->RowIndex ?>_sid" id="x<?php echo $patient_services_grid->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $patient_services->sid->EditValue ?>"<?php echo $patient_services->sid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_sid" class="form-group patient_services_sid">
<span<?php echo $patient_services->sid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->sid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="x<?php echo $patient_services_grid->RowIndex ?>_sid" id="x<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services->sid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_sid" name="o<?php echo $patient_services_grid->RowIndex ?>_sid" id="o<?php echo $patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($patient_services->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ItemCode" class="form-group patient_services_ItemCode">
<input type="text" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $patient_services->ItemCode->EditValue ?>"<?php echo $patient_services->ItemCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ItemCode" class="form-group patient_services_ItemCode">
<span<?php echo $patient_services->ItemCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->ItemCode->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" name="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($patient_services->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestSubCd" class="form-group patient_services_TestSubCd">
<input type="text" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestSubCd->EditValue ?>"<?php echo $patient_services->TestSubCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestSubCd" class="form-group patient_services_TestSubCd">
<span<?php echo $patient_services->TestSubCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->TestSubCd->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services->TestSubCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" name="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($patient_services->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DEptCd" class="form-group patient_services_DEptCd">
<input type="text" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->DEptCd->EditValue ?>"<?php echo $patient_services->DEptCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DEptCd" class="form-group patient_services_DEptCd">
<span<?php echo $patient_services->DEptCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DEptCd->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" name="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($patient_services->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ProfCd" class="form-group patient_services_ProfCd">
<input type="text" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $patient_services->ProfCd->EditValue ?>"<?php echo $patient_services->ProfCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ProfCd" class="form-group patient_services_ProfCd">
<span<?php echo $patient_services->ProfCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->ProfCd->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services->ProfCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" name="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($patient_services->ProfCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Comments->Visible) { // Comments ?>
		<td data-name="Comments">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Comments" class="form-group patient_services_Comments">
<input type="text" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $patient_services->Comments->EditValue ?>"<?php echo $patient_services->Comments->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Comments" class="form-group patient_services_Comments">
<span<?php echo $patient_services->Comments->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Comments->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="x<?php echo $patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services->Comments->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Comments" name="o<?php echo $patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($patient_services->Comments->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Method->Visible) { // Method ?>
		<td data-name="Method">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Method" class="form-group patient_services_Method">
<input type="text" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_grid->RowIndex ?>_Method" id="x<?php echo $patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $patient_services->Method->EditValue ?>"<?php echo $patient_services->Method->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Method" class="form-group patient_services_Method">
<span<?php echo $patient_services->Method->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Method->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="x<?php echo $patient_services_grid->RowIndex ?>_Method" id="x<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Method" name="o<?php echo $patient_services_grid->RowIndex ?>_Method" id="o<?php echo $patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($patient_services->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Specimen" class="form-group patient_services_Specimen">
<input type="text" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $patient_services->Specimen->EditValue ?>"<?php echo $patient_services->Specimen->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Specimen" class="form-group patient_services_Specimen">
<span<?php echo $patient_services->Specimen->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Specimen->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services->Specimen->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" name="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($patient_services->Specimen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Abnormal" class="form-group patient_services_Abnormal">
<input type="text" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $patient_services->Abnormal->EditValue ?>"<?php echo $patient_services->Abnormal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Abnormal" class="form-group patient_services_Abnormal">
<span<?php echo $patient_services->Abnormal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Abnormal->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services->Abnormal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" name="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($patient_services->Abnormal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestUnit" class="form-group patient_services_TestUnit">
<input type="text" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestUnit->EditValue ?>"<?php echo $patient_services->TestUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestUnit" class="form-group patient_services_TestUnit">
<span<?php echo $patient_services->TestUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->TestUnit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services->TestUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" name="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($patient_services->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_LOWHIGH" class="form-group patient_services_LOWHIGH">
<input type="text" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $patient_services->LOWHIGH->EditValue ?>"<?php echo $patient_services->LOWHIGH->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_LOWHIGH" class="form-group patient_services_LOWHIGH">
<span<?php echo $patient_services->LOWHIGH->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->LOWHIGH->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services->LOWHIGH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" name="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($patient_services->LOWHIGH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Branch->Visible) { // Branch ?>
		<td data-name="Branch">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Branch" class="form-group patient_services_Branch">
<input type="text" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Branch->EditValue ?>"<?php echo $patient_services->Branch->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Branch" class="form-group patient_services_Branch">
<span<?php echo $patient_services->Branch->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Branch->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="x<?php echo $patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services->Branch->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Branch" name="o<?php echo $patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($patient_services->Branch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Dispatch" class="form-group patient_services_Dispatch">
<input type="text" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $patient_services->Dispatch->EditValue ?>"<?php echo $patient_services->Dispatch->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Dispatch" class="form-group patient_services_Dispatch">
<span<?php echo $patient_services->Dispatch->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Dispatch->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services->Dispatch->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" name="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($patient_services->Dispatch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Pic1" class="form-group patient_services_Pic1">
<input type="text" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic1->EditValue ?>"<?php echo $patient_services->Pic1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Pic1" class="form-group patient_services_Pic1">
<span<?php echo $patient_services->Pic1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Pic1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services->Pic1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($patient_services->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Pic2" class="form-group patient_services_Pic2">
<input type="text" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $patient_services->Pic2->EditValue ?>"<?php echo $patient_services->Pic2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Pic2" class="form-group patient_services_Pic2">
<span<?php echo $patient_services->Pic2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Pic2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services->Pic2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" name="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($patient_services->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_GraphPath" class="form-group patient_services_GraphPath">
<input type="text" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $patient_services->GraphPath->EditValue ?>"<?php echo $patient_services->GraphPath->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_GraphPath" class="form-group patient_services_GraphPath">
<span<?php echo $patient_services->GraphPath->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->GraphPath->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services->GraphPath->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" name="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($patient_services->GraphPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_MachineCD" class="form-group patient_services_MachineCD">
<input type="text" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $patient_services->MachineCD->EditValue ?>"<?php echo $patient_services->MachineCD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_MachineCD" class="form-group patient_services_MachineCD">
<span<?php echo $patient_services->MachineCD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->MachineCD->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services->MachineCD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" name="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($patient_services->MachineCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestCancel" class="form-group patient_services_TestCancel">
<input type="text" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestCancel->EditValue ?>"<?php echo $patient_services->TestCancel->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestCancel" class="form-group patient_services_TestCancel">
<span<?php echo $patient_services->TestCancel->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->TestCancel->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services->TestCancel->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" name="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($patient_services->TestCancel->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_OutSource" class="form-group patient_services_OutSource">
<input type="text" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $patient_services->OutSource->EditValue ?>"<?php echo $patient_services->OutSource->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_OutSource" class="form-group patient_services_OutSource">
<span<?php echo $patient_services->OutSource->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->OutSource->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services->OutSource->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" name="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($patient_services->OutSource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Printed->Visible) { // Printed ?>
		<td data-name="Printed">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Printed" class="form-group patient_services_Printed">
<input type="text" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $patient_services->Printed->EditValue ?>"<?php echo $patient_services->Printed->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Printed" class="form-group patient_services_Printed">
<span<?php echo $patient_services->Printed->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Printed->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="x<?php echo $patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services->Printed->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Printed" name="o<?php echo $patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($patient_services->Printed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PrintBy" class="form-group patient_services_PrintBy">
<input type="text" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintBy->EditValue ?>"<?php echo $patient_services->PrintBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PrintBy" class="form-group patient_services_PrintBy">
<span<?php echo $patient_services->PrintBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->PrintBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services->PrintBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($patient_services->PrintBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PrintDate" class="form-group patient_services_PrintDate">
<input type="text" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->PrintDate->EditValue ?>"<?php echo $patient_services->PrintDate->editAttributes() ?>>
<?php if (!$patient_services->PrintDate->ReadOnly && !$patient_services->PrintDate->Disabled && !isset($patient_services->PrintDate->EditAttrs["readonly"]) && !isset($patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PrintDate" class="form-group patient_services_PrintDate">
<span<?php echo $patient_services->PrintDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->PrintDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services->PrintDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" name="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($patient_services->PrintDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_BillingDate" class="form-group patient_services_BillingDate">
<input type="text" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillingDate->EditValue ?>"<?php echo $patient_services->BillingDate->editAttributes() ?>>
<?php if (!$patient_services->BillingDate->ReadOnly && !$patient_services->BillingDate->Disabled && !isset($patient_services->BillingDate->EditAttrs["readonly"]) && !isset($patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_BillingDate" class="form-group patient_services_BillingDate">
<span<?php echo $patient_services->BillingDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->BillingDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services->BillingDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" name="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($patient_services->BillingDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_BilledBy" class="form-group patient_services_BilledBy">
<input type="text" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->BilledBy->EditValue ?>"<?php echo $patient_services->BilledBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_BilledBy" class="form-group patient_services_BilledBy">
<span<?php echo $patient_services->BilledBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->BilledBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services->BilledBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" name="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($patient_services->BilledBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Resulted" class="form-group patient_services_Resulted">
<input type="text" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Resulted->EditValue ?>"<?php echo $patient_services->Resulted->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Resulted" class="form-group patient_services_Resulted">
<span<?php echo $patient_services->Resulted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Resulted->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services->Resulted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" name="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($patient_services->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ResultDate" class="form-group patient_services_ResultDate">
<input type="text" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultDate->EditValue ?>"<?php echo $patient_services->ResultDate->editAttributes() ?>>
<?php if (!$patient_services->ResultDate->ReadOnly && !$patient_services->ResultDate->Disabled && !isset($patient_services->ResultDate->EditAttrs["readonly"]) && !isset($patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ResultDate" class="form-group patient_services_ResultDate">
<span<?php echo $patient_services->ResultDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->ResultDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($patient_services->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ResultedBy" class="form-group patient_services_ResultedBy">
<input type="text" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResultedBy->EditValue ?>"<?php echo $patient_services->ResultedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ResultedBy" class="form-group patient_services_ResultedBy">
<span<?php echo $patient_services->ResultedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->ResultedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_services->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SampleDate" class="form-group patient_services_SampleDate">
<input type="text" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleDate->EditValue ?>"<?php echo $patient_services->SampleDate->editAttributes() ?>>
<?php if (!$patient_services->SampleDate->ReadOnly && !$patient_services->SampleDate->Disabled && !isset($patient_services->SampleDate->EditAttrs["readonly"]) && !isset($patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SampleDate" class="form-group patient_services_SampleDate">
<span<?php echo $patient_services->SampleDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->SampleDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services->SampleDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($patient_services->SampleDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SampleUser" class="form-group patient_services_SampleUser">
<input type="text" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->SampleUser->EditValue ?>"<?php echo $patient_services->SampleUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SampleUser" class="form-group patient_services_SampleUser">
<span<?php echo $patient_services->SampleUser->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->SampleUser->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services->SampleUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" name="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($patient_services->SampleUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Sampled" class="form-group patient_services_Sampled">
<input type="text" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sampled->EditValue ?>"<?php echo $patient_services->Sampled->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Sampled" class="form-group patient_services_Sampled">
<span<?php echo $patient_services->Sampled->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Sampled->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services->Sampled->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" name="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($patient_services->Sampled->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ReceivedDate" class="form-group patient_services_ReceivedDate">
<input type="text" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedDate->EditValue ?>"<?php echo $patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$patient_services->ReceivedDate->ReadOnly && !$patient_services->ReceivedDate->Disabled && !isset($patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ReceivedDate" class="form-group patient_services_ReceivedDate">
<span<?php echo $patient_services->ReceivedDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->ReceivedDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services->ReceivedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($patient_services->ReceivedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ReceivedUser" class="form-group patient_services_ReceivedUser">
<input type="text" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->ReceivedUser->EditValue ?>"<?php echo $patient_services->ReceivedUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ReceivedUser" class="form-group patient_services_ReceivedUser">
<span<?php echo $patient_services->ReceivedUser->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->ReceivedUser->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services->ReceivedUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" name="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($patient_services->ReceivedUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Recevied" class="form-group patient_services_Recevied">
<input type="text" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $patient_services->Recevied->EditValue ?>"<?php echo $patient_services->Recevied->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Recevied" class="form-group patient_services_Recevied">
<span<?php echo $patient_services->Recevied->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Recevied->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services->Recevied->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" name="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($patient_services->Recevied->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DeptRecvDate" class="form-group patient_services_DeptRecvDate">
<input type="text" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvDate->EditValue ?>"<?php echo $patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$patient_services->DeptRecvDate->ReadOnly && !$patient_services->DeptRecvDate->Disabled && !isset($patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DeptRecvDate" class="form-group patient_services_DeptRecvDate">
<span<?php echo $patient_services->DeptRecvDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DeptRecvDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services->DeptRecvDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($patient_services->DeptRecvDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DeptRecvUser" class="form-group patient_services_DeptRecvUser">
<input type="text" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecvUser->EditValue ?>"<?php echo $patient_services->DeptRecvUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DeptRecvUser" class="form-group patient_services_DeptRecvUser">
<span<?php echo $patient_services->DeptRecvUser->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DeptRecvUser->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services->DeptRecvUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($patient_services->DeptRecvUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DeptRecived" class="form-group patient_services_DeptRecived">
<input type="text" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $patient_services->DeptRecived->EditValue ?>"<?php echo $patient_services->DeptRecived->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DeptRecived" class="form-group patient_services_DeptRecived">
<span<?php echo $patient_services->DeptRecived->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->DeptRecived->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services->DeptRecived->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" name="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($patient_services->DeptRecived->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SAuthDate" class="form-group patient_services_SAuthDate">
<input type="text" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthDate->EditValue ?>"<?php echo $patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$patient_services->SAuthDate->ReadOnly && !$patient_services->SAuthDate->Disabled && !isset($patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SAuthDate" class="form-group patient_services_SAuthDate">
<span<?php echo $patient_services->SAuthDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->SAuthDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services->SAuthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($patient_services->SAuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SAuthBy" class="form-group patient_services_SAuthBy">
<input type="text" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthBy->EditValue ?>"<?php echo $patient_services->SAuthBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SAuthBy" class="form-group patient_services_SAuthBy">
<span<?php echo $patient_services->SAuthBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->SAuthBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services->SAuthBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($patient_services->SAuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SAuthendicate" class="form-group patient_services_SAuthendicate">
<input type="text" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $patient_services->SAuthendicate->EditValue ?>"<?php echo $patient_services->SAuthendicate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SAuthendicate" class="form-group patient_services_SAuthendicate">
<span<?php echo $patient_services->SAuthendicate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->SAuthendicate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services->SAuthendicate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" name="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($patient_services->SAuthendicate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_AuthDate" class="form-group patient_services_AuthDate">
<input type="text" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthDate->EditValue ?>"<?php echo $patient_services->AuthDate->editAttributes() ?>>
<?php if (!$patient_services->AuthDate->ReadOnly && !$patient_services->AuthDate->Disabled && !isset($patient_services->AuthDate->EditAttrs["readonly"]) && !isset($patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_AuthDate" class="form-group patient_services_AuthDate">
<span<?php echo $patient_services->AuthDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->AuthDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services->AuthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($patient_services->AuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_AuthBy" class="form-group patient_services_AuthBy">
<input type="text" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->AuthBy->EditValue ?>"<?php echo $patient_services->AuthBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_AuthBy" class="form-group patient_services_AuthBy">
<span<?php echo $patient_services->AuthBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->AuthBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services->AuthBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" name="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($patient_services->AuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Authencate" class="form-group patient_services_Authencate">
<input type="text" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $patient_services->Authencate->EditValue ?>"<?php echo $patient_services->Authencate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Authencate" class="form-group patient_services_Authencate">
<span<?php echo $patient_services->Authencate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Authencate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services->Authencate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" name="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($patient_services->Authencate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_EditDate" class="form-group patient_services_EditDate">
<input type="text" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditDate->EditValue ?>"<?php echo $patient_services->EditDate->editAttributes() ?>>
<?php if (!$patient_services->EditDate->ReadOnly && !$patient_services->EditDate->Disabled && !isset($patient_services->EditDate->EditAttrs["readonly"]) && !isset($patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_EditDate" class="form-group patient_services_EditDate">
<span<?php echo $patient_services->EditDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->EditDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services->EditDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" name="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($patient_services->EditDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_EditBy" class="form-group patient_services_EditBy">
<input type="text" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->EditBy->EditValue ?>"<?php echo $patient_services->EditBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_EditBy" class="form-group patient_services_EditBy">
<span<?php echo $patient_services->EditBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->EditBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services->EditBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" name="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($patient_services->EditBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Editted->Visible) { // Editted ?>
		<td data-name="Editted">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Editted" class="form-group patient_services_Editted">
<input type="text" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $patient_services->Editted->EditValue ?>"<?php echo $patient_services->Editted->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Editted" class="form-group patient_services_Editted">
<span<?php echo $patient_services->Editted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Editted->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="x<?php echo $patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services->Editted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Editted" name="o<?php echo $patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($patient_services->Editted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_services->isConfirm()) { ?>
<?php if ($patient_services->PatID->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_services_PatID" class="form-group patient_services_PatID">
<span<?php echo $patient_services->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatID" class="form-group patient_services_PatID">
<input type="text" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatID->EditValue ?>"<?php echo $patient_services->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatID" class="form-group patient_services_PatID">
<span<?php echo $patient_services->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="x<?php echo $patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" name="o<?php echo $patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_services->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PatientId" class="form-group patient_services_PatientId">
<input type="text" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_services->PatientId->EditValue ?>"<?php echo $patient_services->PatientId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatientId" class="form-group patient_services_PatientId">
<span<?php echo $patient_services->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" name="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_services->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Mobile" class="form-group patient_services_Mobile">
<input type="text" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $patient_services->Mobile->EditValue ?>"<?php echo $patient_services->Mobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Mobile" class="form-group patient_services_Mobile">
<span<?php echo $patient_services->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Mobile->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services->Mobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" name="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($patient_services->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->CId->Visible) { // CId ?>
		<td data-name="CId">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_CId" class="form-group patient_services_CId">
<input type="text" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_grid->RowIndex ?>_CId" id="x<?php echo $patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $patient_services->CId->EditValue ?>"<?php echo $patient_services->CId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_CId" class="form-group patient_services_CId">
<span<?php echo $patient_services->CId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->CId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="x<?php echo $patient_services_grid->RowIndex ?>_CId" id="x<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services->CId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_CId" name="o<?php echo $patient_services_grid->RowIndex ?>_CId" id="o<?php echo $patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($patient_services->CId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Order->Visible) { // Order ?>
		<td data-name="Order">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Order" class="form-group patient_services_Order">
<input type="text" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_grid->RowIndex ?>_Order" id="x<?php echo $patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $patient_services->Order->EditValue ?>"<?php echo $patient_services->Order->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Order" class="form-group patient_services_Order">
<span<?php echo $patient_services->Order->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Order->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="x<?php echo $patient_services_grid->RowIndex ?>_Order" id="x<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Order" name="o<?php echo $patient_services_grid->RowIndex ?>_Order" id="o<?php echo $patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($patient_services->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ResType" class="form-group patient_services_ResType">
<input type="text" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $patient_services->ResType->EditValue ?>"<?php echo $patient_services->ResType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ResType" class="form-group patient_services_ResType">
<span<?php echo $patient_services->ResType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->ResType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="x<?php echo $patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services->ResType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ResType" name="o<?php echo $patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($patient_services->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Sample" class="form-group patient_services_Sample">
<input type="text" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $patient_services->Sample->EditValue ?>"<?php echo $patient_services->Sample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Sample" class="form-group patient_services_Sample">
<span<?php echo $patient_services->Sample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Sample->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="x<?php echo $patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services->Sample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Sample" name="o<?php echo $patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($patient_services->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_NoD" class="form-group patient_services_NoD">
<input type="text" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $patient_services->NoD->EditValue ?>"<?php echo $patient_services->NoD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_NoD" class="form-group patient_services_NoD">
<span<?php echo $patient_services->NoD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->NoD->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="x<?php echo $patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services->NoD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_NoD" name="o<?php echo $patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($patient_services->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_BillOrder" class="form-group patient_services_BillOrder">
<input type="text" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $patient_services->BillOrder->EditValue ?>"<?php echo $patient_services->BillOrder->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_BillOrder" class="form-group patient_services_BillOrder">
<span<?php echo $patient_services->BillOrder->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->BillOrder->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services->BillOrder->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" name="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($patient_services->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Inactive" class="form-group patient_services_Inactive">
<input type="text" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $patient_services->Inactive->EditValue ?>"<?php echo $patient_services->Inactive->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Inactive" class="form-group patient_services_Inactive">
<span<?php echo $patient_services->Inactive->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Inactive->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services->Inactive->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" name="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($patient_services->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_CollSample" class="form-group patient_services_CollSample">
<input type="text" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $patient_services->CollSample->EditValue ?>"<?php echo $patient_services->CollSample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_CollSample" class="form-group patient_services_CollSample">
<span<?php echo $patient_services->CollSample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->CollSample->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services->CollSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" name="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($patient_services->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestType" class="form-group patient_services_TestType">
<input type="text" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $patient_services_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->TestType->getPlaceHolder()) ?>" value="<?php echo $patient_services->TestType->EditValue ?>"<?php echo $patient_services->TestType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestType" class="form-group patient_services_TestType">
<span<?php echo $patient_services->TestType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->TestType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="x<?php echo $patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services->TestType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestType" name="o<?php echo $patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($patient_services->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Repeated" class="form-group patient_services_Repeated">
<input type="text" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $patient_services->Repeated->EditValue ?>"<?php echo $patient_services->Repeated->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Repeated" class="form-group patient_services_Repeated">
<span<?php echo $patient_services->Repeated->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Repeated->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services->Repeated->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" name="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($patient_services->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RepeatedBy" class="form-group patient_services_RepeatedBy">
<input type="text" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedBy->EditValue ?>"<?php echo $patient_services->RepeatedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RepeatedBy" class="form-group patient_services_RepeatedBy">
<span<?php echo $patient_services->RepeatedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->RepeatedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services->RepeatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($patient_services->RepeatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RepeatedDate" class="form-group patient_services_RepeatedDate">
<input type="text" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $patient_services->RepeatedDate->EditValue ?>"<?php echo $patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$patient_services->RepeatedDate->ReadOnly && !$patient_services->RepeatedDate->Disabled && !isset($patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_servicesgrid", "x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RepeatedDate" class="form-group patient_services_RepeatedDate">
<span<?php echo $patient_services->RepeatedDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->RepeatedDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services->RepeatedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" name="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($patient_services->RepeatedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_serviceID" class="form-group patient_services_serviceID">
<input type="text" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $patient_services->serviceID->EditValue ?>"<?php echo $patient_services->serviceID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_serviceID" class="form-group patient_services_serviceID">
<span<?php echo $patient_services->serviceID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->serviceID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services->serviceID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" name="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($patient_services->serviceID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Service_Type" class="form-group patient_services_Service_Type">
<input type="text" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Type->EditValue ?>"<?php echo $patient_services->Service_Type->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Service_Type" class="form-group patient_services_Service_Type">
<span<?php echo $patient_services->Service_Type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Service_Type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services->Service_Type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($patient_services->Service_Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Service_Department" class="form-group patient_services_Service_Department">
<input type="text" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $patient_services->Service_Department->EditValue ?>"<?php echo $patient_services->Service_Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Service_Department" class="form-group patient_services_Service_Department">
<span<?php echo $patient_services->Service_Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->Service_Department->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services->Service_Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" name="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($patient_services->Service_Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_services->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo">
<?php if (!$patient_services->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RequestNo" class="form-group patient_services_RequestNo">
<input type="text" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $patient_services->RequestNo->EditValue ?>"<?php echo $patient_services->RequestNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RequestNo" class="form-group patient_services_RequestNo">
<span<?php echo $patient_services->RequestNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_services->RequestNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services->RequestNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" name="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($patient_services->RequestNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_services_grid->ListOptions->render("body", "right", $patient_services_grid->RowIndex);
?>
<script>
fpatient_servicesgrid.updateLists(<?php echo $patient_services_grid->RowIndex ?>);
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
<?php if ($patient_services_grid->TotalRecs > 0 && $patient_services->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$patient_services_grid->renderListOptions();

// Render list options (footer, left)
$patient_services_grid->ListOptions->render("footer", "left");
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
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $patient_services->SubTotal->ViewValue ?></span>
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
$patient_services_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
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
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_services_grid->Recordset)
	$patient_services_grid->Recordset->Close();
?>
</div>
<?php if ($patient_services_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_services_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_services_grid->TotalRecs == 0 && !$patient_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_services_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_services_grid->terminate();
?>
<?php if (!$patient_services->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_services", "95%", "");
</script>
<?php } ?>