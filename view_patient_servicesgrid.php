<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_patient_services_grid))
	$view_patient_services_grid = new view_patient_services_grid();

// Run the page
$view_patient_services_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_services_grid->Page_Render();
?>
<?php if (!$view_patient_services->isExport()) { ?>
<script>

// Form object
var fview_patient_servicesgrid = new ew.Form("fview_patient_servicesgrid", "grid");
fview_patient_servicesgrid.formKeyCountName = '<?php echo $view_patient_services_grid->FormKeyCountName ?>';

// Validate form
fview_patient_servicesgrid.validate = function() {
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
		<?php if ($view_patient_services_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->id->caption(), $view_patient_services->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Reception->caption(), $view_patient_services->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->mrnno->caption(), $view_patient_services->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PatientName->caption(), $view_patient_services->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Age->caption(), $view_patient_services->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Gender->caption(), $view_patient_services->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->profilePic->caption(), $view_patient_services->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Services->caption(), $view_patient_services->Services->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Unit->caption(), $view_patient_services->Unit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Unit->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->amount->caption(), $view_patient_services->amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->amount->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Quantity->caption(), $view_patient_services->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Quantity->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->DiscountCategory->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountCategory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DiscountCategory->caption(), $view_patient_services->DiscountCategory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Discount->caption(), $view_patient_services->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Discount->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->SubTotal->Required) { ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SubTotal->caption(), $view_patient_services->SubTotal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->SubTotal->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->description->caption(), $view_patient_services->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->patient_type->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->patient_type->caption(), $view_patient_services->patient_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->charged_date->Required) { ?>
			elm = this.getElements("x" + infix + "_charged_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->charged_date->caption(), $view_patient_services->charged_date->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->status->caption(), $view_patient_services->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->createdby->caption(), $view_patient_services->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->createddatetime->caption(), $view_patient_services->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->modifiedby->caption(), $view_patient_services->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->modifieddatetime->caption(), $view_patient_services->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Aid->Required) { ?>
			elm = this.getElements("x" + infix + "_Aid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Aid->caption(), $view_patient_services->Aid->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Vid->caption(), $view_patient_services->Vid->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrID->caption(), $view_patient_services->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->DrCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_DrCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrCODE->caption(), $view_patient_services->DrCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrName->caption(), $view_patient_services->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Department->caption(), $view_patient_services->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->DrSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrSharePres->caption(), $view_patient_services->DrSharePres->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrSharePres");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrSharePres->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->HospSharePres->Required) { ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->HospSharePres->caption(), $view_patient_services->HospSharePres->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospSharePres");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->HospSharePres->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->DrShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareAmount->caption(), $view_patient_services->DrShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->HospShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->HospShareAmount->caption(), $view_patient_services->HospShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->HospShareAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->DrShareSettiledAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareSettiledAmount->caption(), $view_patient_services->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareSettiledAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->DrShareSettledId->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareSettledId->caption(), $view_patient_services->DrShareSettledId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettledId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareSettledId->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->DrShareSettiledStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DrShareSettiledStatus->caption(), $view_patient_services->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DrShareSettiledStatus->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->invoiceId->caption(), $view_patient_services->invoiceId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->invoiceId->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->invoiceAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->invoiceAmount->caption(), $view_patient_services->invoiceAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->invoiceAmount->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->invoiceStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->invoiceStatus->caption(), $view_patient_services->invoiceStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->modeOfPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_modeOfPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->modeOfPayment->caption(), $view_patient_services->modeOfPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->HospID->caption(), $view_patient_services->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->RIDNO->caption(), $view_patient_services->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->RIDNO->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ItemCode->caption(), $view_patient_services->ItemCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TidNo->caption(), $view_patient_services->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->TidNo->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->sid->caption(), $view_patient_services->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->sid->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestSubCd->caption(), $view_patient_services->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DEptCd->caption(), $view_patient_services->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->ProfCd->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ProfCd->caption(), $view_patient_services->ProfCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Comments->Required) { ?>
			elm = this.getElements("x" + infix + "_Comments");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Comments->caption(), $view_patient_services->Comments->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Method->caption(), $view_patient_services->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Specimen->Required) { ?>
			elm = this.getElements("x" + infix + "_Specimen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Specimen->caption(), $view_patient_services->Specimen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Abnormal->Required) { ?>
			elm = this.getElements("x" + infix + "_Abnormal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Abnormal->caption(), $view_patient_services->Abnormal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->TestUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_TestUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestUnit->caption(), $view_patient_services->TestUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->LOWHIGH->Required) { ?>
			elm = this.getElements("x" + infix + "_LOWHIGH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->LOWHIGH->caption(), $view_patient_services->LOWHIGH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Branch->Required) { ?>
			elm = this.getElements("x" + infix + "_Branch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Branch->caption(), $view_patient_services->Branch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Dispatch->Required) { ?>
			elm = this.getElements("x" + infix + "_Dispatch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Dispatch->caption(), $view_patient_services->Dispatch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Pic1->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Pic1->caption(), $view_patient_services->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Pic2->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Pic2->caption(), $view_patient_services->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->GraphPath->Required) { ?>
			elm = this.getElements("x" + infix + "_GraphPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->GraphPath->caption(), $view_patient_services->GraphPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->MachineCD->Required) { ?>
			elm = this.getElements("x" + infix + "_MachineCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->MachineCD->caption(), $view_patient_services->MachineCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->TestCancel->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCancel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestCancel->caption(), $view_patient_services->TestCancel->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->OutSource->Required) { ?>
			elm = this.getElements("x" + infix + "_OutSource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->OutSource->caption(), $view_patient_services->OutSource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Printed->Required) { ?>
			elm = this.getElements("x" + infix + "_Printed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Printed->caption(), $view_patient_services->Printed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->PrintBy->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PrintBy->caption(), $view_patient_services->PrintBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->PrintDate->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PrintDate->caption(), $view_patient_services->PrintDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->PrintDate->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->BillingDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->BillingDate->caption(), $view_patient_services->BillingDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillingDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->BillingDate->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->BilledBy->Required) { ?>
			elm = this.getElements("x" + infix + "_BilledBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->BilledBy->caption(), $view_patient_services->BilledBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Resulted->Required) { ?>
			elm = this.getElements("x" + infix + "_Resulted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Resulted->caption(), $view_patient_services->Resulted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ResultDate->caption(), $view_patient_services->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->ResultDate->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ResultedBy->caption(), $view_patient_services->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->SampleDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SampleDate->caption(), $view_patient_services->SampleDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->SampleDate->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->SampleUser->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SampleUser->caption(), $view_patient_services->SampleUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Sampled->Required) { ?>
			elm = this.getElements("x" + infix + "_Sampled");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Sampled->caption(), $view_patient_services->Sampled->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->ReceivedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ReceivedDate->caption(), $view_patient_services->ReceivedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->ReceivedDate->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->ReceivedUser->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ReceivedUser->caption(), $view_patient_services->ReceivedUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Recevied->Required) { ?>
			elm = this.getElements("x" + infix + "_Recevied");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Recevied->caption(), $view_patient_services->Recevied->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->DeptRecvDate->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DeptRecvDate->caption(), $view_patient_services->DeptRecvDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->DeptRecvDate->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->DeptRecvUser->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DeptRecvUser->caption(), $view_patient_services->DeptRecvUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->DeptRecived->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecived");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->DeptRecived->caption(), $view_patient_services->DeptRecived->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->SAuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SAuthDate->caption(), $view_patient_services->SAuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->SAuthDate->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->SAuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SAuthBy->caption(), $view_patient_services->SAuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->SAuthendicate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthendicate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->SAuthendicate->caption(), $view_patient_services->SAuthendicate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->AuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->AuthDate->caption(), $view_patient_services->AuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->AuthDate->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->AuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->AuthBy->caption(), $view_patient_services->AuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Authencate->Required) { ?>
			elm = this.getElements("x" + infix + "_Authencate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Authencate->caption(), $view_patient_services->Authencate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->EditDate->Required) { ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->EditDate->caption(), $view_patient_services->EditDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->EditDate->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->EditBy->Required) { ?>
			elm = this.getElements("x" + infix + "_EditBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->EditBy->caption(), $view_patient_services->EditBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Editted->Required) { ?>
			elm = this.getElements("x" + infix + "_Editted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Editted->caption(), $view_patient_services->Editted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PatID->caption(), $view_patient_services->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->PatID->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->PatientId->caption(), $view_patient_services->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Mobile->caption(), $view_patient_services->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->CId->caption(), $view_patient_services->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->CId->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Order->caption(), $view_patient_services->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->Order->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->ResType->caption(), $view_patient_services->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Sample->caption(), $view_patient_services->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->NoD->caption(), $view_patient_services->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->NoD->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->BillOrder->caption(), $view_patient_services->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->BillOrder->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Inactive->caption(), $view_patient_services->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->CollSample->caption(), $view_patient_services->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->TestType->caption(), $view_patient_services->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Repeated->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Repeated->caption(), $view_patient_services->Repeated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->RepeatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->RepeatedBy->caption(), $view_patient_services->RepeatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->RepeatedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->RepeatedDate->caption(), $view_patient_services->RepeatedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RepeatedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->RepeatedDate->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->serviceID->Required) { ?>
			elm = this.getElements("x" + infix + "_serviceID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->serviceID->caption(), $view_patient_services->serviceID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_serviceID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_services->serviceID->errorMessage()) ?>");
		<?php if ($view_patient_services_grid->Service_Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Service_Type->caption(), $view_patient_services->Service_Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->Service_Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Service_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services->Service_Department->caption(), $view_patient_services->Service_Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_services_grid->RequestNo->Required) { ?>
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
	return true;
}

// Check empty row
fview_patient_servicesgrid.emptyRow = function(infix) {
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
fview_patient_servicesgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_patient_servicesgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_patient_servicesgrid.lists["x_Services"] = <?php echo $view_patient_services_grid->Services->Lookup->toClientList() ?>;
fview_patient_servicesgrid.lists["x_Services"].options = <?php echo JsonEncode($view_patient_services_grid->Services->lookupOptions()) ?>;
fview_patient_servicesgrid.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_patient_servicesgrid.lists["x_DiscountCategory"] = <?php echo $view_patient_services_grid->DiscountCategory->Lookup->toClientList() ?>;
fview_patient_servicesgrid.lists["x_DiscountCategory"].options = <?php echo JsonEncode($view_patient_services_grid->DiscountCategory->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_patient_services_grid->renderOtherOptions();
?>
<?php $view_patient_services_grid->showPageHeader(); ?>
<?php
$view_patient_services_grid->showMessage();
?>
<?php if ($view_patient_services_grid->TotalRecs > 0 || $view_patient_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_patient_services_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_services">
<?php if ($view_patient_services_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_patient_services_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_patient_servicesgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_patient_services" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_patient_servicesgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_patient_services_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_patient_services_grid->renderListOptions();

// Render list options (header, left)
$view_patient_services_grid->ListOptions->render("header", "left");
?>
<?php if ($view_patient_services->id->Visible) { // id ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_patient_services->id->headerCellClass() ?>"><div id="elh_view_patient_services_id" class="view_patient_services_id"><div class="ew-table-header-caption"><?php echo $view_patient_services->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_patient_services->id->headerCellClass() ?>"><div><div id="elh_view_patient_services_id" class="view_patient_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Reception->Visible) { // Reception ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_patient_services->Reception->headerCellClass() ?>"><div id="elh_view_patient_services_Reception" class="view_patient_services_Reception"><div class="ew-table-header-caption"><?php echo $view_patient_services->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_patient_services->Reception->headerCellClass() ?>"><div><div id="elh_view_patient_services_Reception" class="view_patient_services_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->mrnno->Visible) { // mrnno ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_services->mrnno->headerCellClass() ?>"><div id="elh_view_patient_services_mrnno" class="view_patient_services_mrnno"><div class="ew-table-header-caption"><?php echo $view_patient_services->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_services->mrnno->headerCellClass() ?>"><div><div id="elh_view_patient_services_mrnno" class="view_patient_services_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PatientName->Visible) { // PatientName ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_services->PatientName->headerCellClass() ?>"><div id="elh_view_patient_services_PatientName" class="view_patient_services_PatientName"><div class="ew-table-header-caption"><?php echo $view_patient_services->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_services->PatientName->headerCellClass() ?>"><div><div id="elh_view_patient_services_PatientName" class="view_patient_services_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Age->Visible) { // Age ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_patient_services->Age->headerCellClass() ?>"><div id="elh_view_patient_services_Age" class="view_patient_services_Age"><div class="ew-table-header-caption"><?php echo $view_patient_services->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_patient_services->Age->headerCellClass() ?>"><div><div id="elh_view_patient_services_Age" class="view_patient_services_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Gender->Visible) { // Gender ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_patient_services->Gender->headerCellClass() ?>"><div id="elh_view_patient_services_Gender" class="view_patient_services_Gender"><div class="ew-table-header-caption"><?php echo $view_patient_services->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_patient_services->Gender->headerCellClass() ?>"><div><div id="elh_view_patient_services_Gender" class="view_patient_services_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->profilePic->Visible) { // profilePic ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_services->profilePic->headerCellClass() ?>"><div id="elh_view_patient_services_profilePic" class="view_patient_services_profilePic"><div class="ew-table-header-caption"><?php echo $view_patient_services->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_services->profilePic->headerCellClass() ?>"><div><div id="elh_view_patient_services_profilePic" class="view_patient_services_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->profilePic->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Services->Visible) { // Services ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_patient_services->Services->headerCellClass() ?>"><div id="elh_view_patient_services_Services" class="view_patient_services_Services"><div class="ew-table-header-caption"><?php echo $view_patient_services->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_patient_services->Services->headerCellClass() ?>"><div><div id="elh_view_patient_services_Services" class="view_patient_services_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Unit->Visible) { // Unit ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $view_patient_services->Unit->headerCellClass() ?>"><div id="elh_view_patient_services_Unit" class="view_patient_services_Unit"><div class="ew-table-header-caption"><?php echo $view_patient_services->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $view_patient_services->Unit->headerCellClass() ?>"><div><div id="elh_view_patient_services_Unit" class="view_patient_services_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->amount->Visible) { // amount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $view_patient_services->amount->headerCellClass() ?>"><div id="elh_view_patient_services_amount" class="view_patient_services_amount"><div class="ew-table-header-caption"><?php echo $view_patient_services->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $view_patient_services->amount->headerCellClass() ?>"><div><div id="elh_view_patient_services_amount" class="view_patient_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Quantity->Visible) { // Quantity ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_patient_services->Quantity->headerCellClass() ?>"><div id="elh_view_patient_services_Quantity" class="view_patient_services_Quantity"><div class="ew-table-header-caption"><?php echo $view_patient_services->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_patient_services->Quantity->headerCellClass() ?>"><div><div id="elh_view_patient_services_Quantity" class="view_patient_services_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DiscountCategory) == "") { ?>
		<th data-name="DiscountCategory" class="<?php echo $view_patient_services->DiscountCategory->headerCellClass() ?>"><div id="elh_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory"><div class="ew-table-header-caption"><?php echo $view_patient_services->DiscountCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountCategory" class="<?php echo $view_patient_services->DiscountCategory->headerCellClass() ?>"><div><div id="elh_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DiscountCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DiscountCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DiscountCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Discount->Visible) { // Discount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $view_patient_services->Discount->headerCellClass() ?>"><div id="elh_view_patient_services_Discount" class="view_patient_services_Discount"><div class="ew-table-header-caption"><?php echo $view_patient_services->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $view_patient_services->Discount->headerCellClass() ?>"><div><div id="elh_view_patient_services_Discount" class="view_patient_services_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Discount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Discount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $view_patient_services->SubTotal->headerCellClass() ?>"><div id="elh_view_patient_services_SubTotal" class="view_patient_services_SubTotal"><div class="ew-table-header-caption"><?php echo $view_patient_services->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $view_patient_services->SubTotal->headerCellClass() ?>"><div><div id="elh_view_patient_services_SubTotal" class="view_patient_services_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SubTotal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SubTotal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->description->Visible) { // description ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->description) == "") { ?>
		<th data-name="description" class="<?php echo $view_patient_services->description->headerCellClass() ?>"><div id="elh_view_patient_services_description" class="view_patient_services_description"><div class="ew-table-header-caption"><?php echo $view_patient_services->description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $view_patient_services->description->headerCellClass() ?>"><div><div id="elh_view_patient_services_description" class="view_patient_services_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->description->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->patient_type->Visible) { // patient_type ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $view_patient_services->patient_type->headerCellClass() ?>"><div id="elh_view_patient_services_patient_type" class="view_patient_services_patient_type"><div class="ew-table-header-caption"><?php echo $view_patient_services->patient_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $view_patient_services->patient_type->headerCellClass() ?>"><div><div id="elh_view_patient_services_patient_type" class="view_patient_services_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->patient_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->patient_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->charged_date->Visible) { // charged_date ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $view_patient_services->charged_date->headerCellClass() ?>"><div id="elh_view_patient_services_charged_date" class="view_patient_services_charged_date"><div class="ew-table-header-caption"><?php echo $view_patient_services->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $view_patient_services->charged_date->headerCellClass() ?>"><div><div id="elh_view_patient_services_charged_date" class="view_patient_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->charged_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->charged_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->status->Visible) { // status ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_patient_services->status->headerCellClass() ?>"><div id="elh_view_patient_services_status" class="view_patient_services_status"><div class="ew-table-header-caption"><?php echo $view_patient_services->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_patient_services->status->headerCellClass() ?>"><div><div id="elh_view_patient_services_status" class="view_patient_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->createdby->Visible) { // createdby ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_patient_services->createdby->headerCellClass() ?>"><div id="elh_view_patient_services_createdby" class="view_patient_services_createdby"><div class="ew-table-header-caption"><?php echo $view_patient_services->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_patient_services->createdby->headerCellClass() ?>"><div><div id="elh_view_patient_services_createdby" class="view_patient_services_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_services->createddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_createddatetime" class="view_patient_services_createddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_services->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_services->createddatetime->headerCellClass() ?>"><div><div id="elh_view_patient_services_createddatetime" class="view_patient_services_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_services->modifiedby->headerCellClass() ?>"><div id="elh_view_patient_services_modifiedby" class="view_patient_services_modifiedby"><div class="ew-table-header-caption"><?php echo $view_patient_services->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_services->modifiedby->headerCellClass() ?>"><div><div id="elh_view_patient_services_modifiedby" class="view_patient_services_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_services->modifieddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_services->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_services->modifieddatetime->headerCellClass() ?>"><div><div id="elh_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Aid->Visible) { // Aid ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $view_patient_services->Aid->headerCellClass() ?>"><div id="elh_view_patient_services_Aid" class="view_patient_services_Aid"><div class="ew-table-header-caption"><?php echo $view_patient_services->Aid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $view_patient_services->Aid->headerCellClass() ?>"><div><div id="elh_view_patient_services_Aid" class="view_patient_services_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Aid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Aid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Vid->Visible) { // Vid ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_patient_services->Vid->headerCellClass() ?>"><div id="elh_view_patient_services_Vid" class="view_patient_services_Vid"><div class="ew-table-header-caption"><?php echo $view_patient_services->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_patient_services->Vid->headerCellClass() ?>"><div><div id="elh_view_patient_services_Vid" class="view_patient_services_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrID->Visible) { // DrID ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_patient_services->DrID->headerCellClass() ?>"><div id="elh_view_patient_services_DrID" class="view_patient_services_DrID"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_patient_services->DrID->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrID" class="view_patient_services_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_patient_services->DrCODE->headerCellClass() ?>"><div id="elh_view_patient_services_DrCODE" class="view_patient_services_DrCODE"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_patient_services->DrCODE->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrCODE" class="view_patient_services_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrName->Visible) { // DrName ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_patient_services->DrName->headerCellClass() ?>"><div id="elh_view_patient_services_DrName" class="view_patient_services_DrName"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_patient_services->DrName->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrName" class="view_patient_services_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Department->Visible) { // Department ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_patient_services->Department->headerCellClass() ?>"><div id="elh_view_patient_services_Department" class="view_patient_services_Department"><div class="ew-table-header-caption"><?php echo $view_patient_services->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_patient_services->Department->headerCellClass() ?>"><div><div id="elh_view_patient_services_Department" class="view_patient_services_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrSharePres) == "") { ?>
		<th data-name="DrSharePres" class="<?php echo $view_patient_services->DrSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePres" class="<?php echo $view_patient_services->DrSharePres->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrSharePres->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrSharePres->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->HospSharePres) == "") { ?>
		<th data-name="HospSharePres" class="<?php echo $view_patient_services->HospSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres"><div class="ew-table-header-caption"><?php echo $view_patient_services->HospSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePres" class="<?php echo $view_patient_services->HospSharePres->headerCellClass() ?>"><div><div id="elh_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->HospSharePres->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->HospSharePres->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_patient_services->DrShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_patient_services->DrShareAmount->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_patient_services->HospShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_patient_services->HospShareAmount->headerCellClass() ?>"><div><div id="elh_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->HospShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->HospShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrShareSettiledAmount) == "") { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettiledAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services->DrShareSettiledAmount->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrShareSettiledAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrShareSettiledAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrShareSettledId) == "") { ?>
		<th data-name="DrShareSettledId" class="<?php echo $view_patient_services->DrShareSettledId->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettledId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettledId" class="<?php echo $view_patient_services->DrShareSettledId->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrShareSettledId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrShareSettledId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DrShareSettiledStatus) == "") { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus"><div class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettiledStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services->DrShareSettiledStatus->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DrShareSettiledStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DrShareSettiledStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_patient_services->invoiceId->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceId" class="view_patient_services_invoiceId"><div class="ew-table-header-caption"><?php echo $view_patient_services->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_patient_services->invoiceId->headerCellClass() ?>"><div><div id="elh_view_patient_services_invoiceId" class="view_patient_services_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->invoiceId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->invoiceId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $view_patient_services->invoiceAmount->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services->invoiceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $view_patient_services->invoiceAmount->headerCellClass() ?>"><div><div id="elh_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->invoiceAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->invoiceAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $view_patient_services->invoiceStatus->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus"><div class="ew-table-header-caption"><?php echo $view_patient_services->invoiceStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $view_patient_services->invoiceStatus->headerCellClass() ?>"><div><div id="elh_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->invoiceStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->invoiceStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->invoiceStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $view_patient_services->modeOfPayment->headerCellClass() ?>"><div id="elh_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment"><div class="ew-table-header-caption"><?php echo $view_patient_services->modeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $view_patient_services->modeOfPayment->headerCellClass() ?>"><div><div id="elh_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->modeOfPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->modeOfPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->modeOfPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_patient_services->HospID->headerCellClass() ?>"><div id="elh_view_patient_services_HospID" class="view_patient_services_HospID"><div class="ew-table-header-caption"><?php echo $view_patient_services->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_patient_services->HospID->headerCellClass() ?>"><div><div id="elh_view_patient_services_HospID" class="view_patient_services_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_services->RIDNO->headerCellClass() ?>"><div id="elh_view_patient_services_RIDNO" class="view_patient_services_RIDNO"><div class="ew-table-header-caption"><?php echo $view_patient_services->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_services->RIDNO->headerCellClass() ?>"><div><div id="elh_view_patient_services_RIDNO" class="view_patient_services_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_patient_services->ItemCode->headerCellClass() ?>"><div id="elh_view_patient_services_ItemCode" class="view_patient_services_ItemCode"><div class="ew-table-header-caption"><?php echo $view_patient_services->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_patient_services->ItemCode->headerCellClass() ?>"><div><div id="elh_view_patient_services_ItemCode" class="view_patient_services_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TidNo->Visible) { // TidNo ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_services->TidNo->headerCellClass() ?>"><div id="elh_view_patient_services_TidNo" class="view_patient_services_TidNo"><div class="ew-table-header-caption"><?php echo $view_patient_services->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_services->TidNo->headerCellClass() ?>"><div><div id="elh_view_patient_services_TidNo" class="view_patient_services_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->sid->Visible) { // sid ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_patient_services->sid->headerCellClass() ?>"><div id="elh_view_patient_services_sid" class="view_patient_services_sid"><div class="ew-table-header-caption"><?php echo $view_patient_services->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_patient_services->sid->headerCellClass() ?>"><div><div id="elh_view_patient_services_sid" class="view_patient_services_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $view_patient_services->TestSubCd->headerCellClass() ?>"><div id="elh_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd"><div class="ew-table-header-caption"><?php echo $view_patient_services->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $view_patient_services->TestSubCd->headerCellClass() ?>"><div><div id="elh_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->TestSubCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->TestSubCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->TestSubCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_patient_services->DEptCd->headerCellClass() ?>"><div id="elh_view_patient_services_DEptCd" class="view_patient_services_DEptCd"><div class="ew-table-header-caption"><?php echo $view_patient_services->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_patient_services->DEptCd->headerCellClass() ?>"><div><div id="elh_view_patient_services_DEptCd" class="view_patient_services_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ProfCd->Visible) { // ProfCd ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $view_patient_services->ProfCd->headerCellClass() ?>"><div id="elh_view_patient_services_ProfCd" class="view_patient_services_ProfCd"><div class="ew-table-header-caption"><?php echo $view_patient_services->ProfCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $view_patient_services->ProfCd->headerCellClass() ?>"><div><div id="elh_view_patient_services_ProfCd" class="view_patient_services_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ProfCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ProfCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ProfCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Comments->Visible) { // Comments ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $view_patient_services->Comments->headerCellClass() ?>"><div id="elh_view_patient_services_Comments" class="view_patient_services_Comments"><div class="ew-table-header-caption"><?php echo $view_patient_services->Comments->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $view_patient_services->Comments->headerCellClass() ?>"><div><div id="elh_view_patient_services_Comments" class="view_patient_services_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Comments->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Comments->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Comments->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Method->Visible) { // Method ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $view_patient_services->Method->headerCellClass() ?>"><div id="elh_view_patient_services_Method" class="view_patient_services_Method"><div class="ew-table-header-caption"><?php echo $view_patient_services->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $view_patient_services->Method->headerCellClass() ?>"><div><div id="elh_view_patient_services_Method" class="view_patient_services_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Specimen->Visible) { // Specimen ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $view_patient_services->Specimen->headerCellClass() ?>"><div id="elh_view_patient_services_Specimen" class="view_patient_services_Specimen"><div class="ew-table-header-caption"><?php echo $view_patient_services->Specimen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $view_patient_services->Specimen->headerCellClass() ?>"><div><div id="elh_view_patient_services_Specimen" class="view_patient_services_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Specimen->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Specimen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Specimen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Abnormal->Visible) { // Abnormal ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $view_patient_services->Abnormal->headerCellClass() ?>"><div id="elh_view_patient_services_Abnormal" class="view_patient_services_Abnormal"><div class="ew-table-header-caption"><?php echo $view_patient_services->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $view_patient_services->Abnormal->headerCellClass() ?>"><div><div id="elh_view_patient_services_Abnormal" class="view_patient_services_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Abnormal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Abnormal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Abnormal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_patient_services->TestUnit->headerCellClass() ?>"><div id="elh_view_patient_services_TestUnit" class="view_patient_services_TestUnit"><div class="ew-table-header-caption"><?php echo $view_patient_services->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_patient_services->TestUnit->headerCellClass() ?>"><div><div id="elh_view_patient_services_TestUnit" class="view_patient_services_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->TestUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->TestUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $view_patient_services->LOWHIGH->headerCellClass() ?>"><div id="elh_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH"><div class="ew-table-header-caption"><?php echo $view_patient_services->LOWHIGH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $view_patient_services->LOWHIGH->headerCellClass() ?>"><div><div id="elh_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->LOWHIGH->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->LOWHIGH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->LOWHIGH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Branch->Visible) { // Branch ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $view_patient_services->Branch->headerCellClass() ?>"><div id="elh_view_patient_services_Branch" class="view_patient_services_Branch"><div class="ew-table-header-caption"><?php echo $view_patient_services->Branch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $view_patient_services->Branch->headerCellClass() ?>"><div><div id="elh_view_patient_services_Branch" class="view_patient_services_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Branch->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Branch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Branch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Dispatch->Visible) { // Dispatch ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $view_patient_services->Dispatch->headerCellClass() ?>"><div id="elh_view_patient_services_Dispatch" class="view_patient_services_Dispatch"><div class="ew-table-header-caption"><?php echo $view_patient_services->Dispatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $view_patient_services->Dispatch->headerCellClass() ?>"><div><div id="elh_view_patient_services_Dispatch" class="view_patient_services_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Dispatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Dispatch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Dispatch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_patient_services->Pic1->headerCellClass() ?>"><div id="elh_view_patient_services_Pic1" class="view_patient_services_Pic1"><div class="ew-table-header-caption"><?php echo $view_patient_services->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_patient_services->Pic1->headerCellClass() ?>"><div><div id="elh_view_patient_services_Pic1" class="view_patient_services_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Pic1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Pic1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_patient_services->Pic2->headerCellClass() ?>"><div id="elh_view_patient_services_Pic2" class="view_patient_services_Pic2"><div class="ew-table-header-caption"><?php echo $view_patient_services->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_patient_services->Pic2->headerCellClass() ?>"><div><div id="elh_view_patient_services_Pic2" class="view_patient_services_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Pic2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Pic2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->GraphPath->Visible) { // GraphPath ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $view_patient_services->GraphPath->headerCellClass() ?>"><div id="elh_view_patient_services_GraphPath" class="view_patient_services_GraphPath"><div class="ew-table-header-caption"><?php echo $view_patient_services->GraphPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $view_patient_services->GraphPath->headerCellClass() ?>"><div><div id="elh_view_patient_services_GraphPath" class="view_patient_services_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->GraphPath->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->GraphPath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->GraphPath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->MachineCD->Visible) { // MachineCD ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $view_patient_services->MachineCD->headerCellClass() ?>"><div id="elh_view_patient_services_MachineCD" class="view_patient_services_MachineCD"><div class="ew-table-header-caption"><?php echo $view_patient_services->MachineCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $view_patient_services->MachineCD->headerCellClass() ?>"><div><div id="elh_view_patient_services_MachineCD" class="view_patient_services_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->MachineCD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->MachineCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->MachineCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestCancel->Visible) { // TestCancel ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $view_patient_services->TestCancel->headerCellClass() ?>"><div id="elh_view_patient_services_TestCancel" class="view_patient_services_TestCancel"><div class="ew-table-header-caption"><?php echo $view_patient_services->TestCancel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $view_patient_services->TestCancel->headerCellClass() ?>"><div><div id="elh_view_patient_services_TestCancel" class="view_patient_services_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->TestCancel->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->TestCancel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->TestCancel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->OutSource->Visible) { // OutSource ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $view_patient_services->OutSource->headerCellClass() ?>"><div id="elh_view_patient_services_OutSource" class="view_patient_services_OutSource"><div class="ew-table-header-caption"><?php echo $view_patient_services->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $view_patient_services->OutSource->headerCellClass() ?>"><div><div id="elh_view_patient_services_OutSource" class="view_patient_services_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->OutSource->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->OutSource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->OutSource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Printed->Visible) { // Printed ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $view_patient_services->Printed->headerCellClass() ?>"><div id="elh_view_patient_services_Printed" class="view_patient_services_Printed"><div class="ew-table-header-caption"><?php echo $view_patient_services->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $view_patient_services->Printed->headerCellClass() ?>"><div><div id="elh_view_patient_services_Printed" class="view_patient_services_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Printed->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Printed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Printed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PrintBy->Visible) { // PrintBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $view_patient_services->PrintBy->headerCellClass() ?>"><div id="elh_view_patient_services_PrintBy" class="view_patient_services_PrintBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $view_patient_services->PrintBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_PrintBy" class="view_patient_services_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->PrintBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->PrintBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->PrintBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PrintDate->Visible) { // PrintDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $view_patient_services->PrintDate->headerCellClass() ?>"><div id="elh_view_patient_services_PrintDate" class="view_patient_services_PrintDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $view_patient_services->PrintDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_PrintDate" class="view_patient_services_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->PrintDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->PrintDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->BillingDate->Visible) { // BillingDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->BillingDate) == "") { ?>
		<th data-name="BillingDate" class="<?php echo $view_patient_services->BillingDate->headerCellClass() ?>"><div id="elh_view_patient_services_BillingDate" class="view_patient_services_BillingDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->BillingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillingDate" class="<?php echo $view_patient_services->BillingDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_BillingDate" class="view_patient_services_BillingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->BillingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->BillingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->BilledBy->Visible) { // BilledBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->BilledBy) == "") { ?>
		<th data-name="BilledBy" class="<?php echo $view_patient_services->BilledBy->headerCellClass() ?>"><div id="elh_view_patient_services_BilledBy" class="view_patient_services_BilledBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->BilledBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BilledBy" class="<?php echo $view_patient_services->BilledBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_BilledBy" class="view_patient_services_BilledBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->BilledBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->BilledBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->BilledBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Resulted->Visible) { // Resulted ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_patient_services->Resulted->headerCellClass() ?>"><div id="elh_view_patient_services_Resulted" class="view_patient_services_Resulted"><div class="ew-table-header-caption"><?php echo $view_patient_services->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_patient_services->Resulted->headerCellClass() ?>"><div><div id="elh_view_patient_services_Resulted" class="view_patient_services_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Resulted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Resulted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_patient_services->ResultDate->headerCellClass() ?>"><div id="elh_view_patient_services_ResultDate" class="view_patient_services_ResultDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_patient_services->ResultDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_ResultDate" class="view_patient_services_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_patient_services->ResultedBy->headerCellClass() ?>"><div id="elh_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_patient_services->ResultedBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SampleDate->Visible) { // SampleDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $view_patient_services->SampleDate->headerCellClass() ?>"><div id="elh_view_patient_services_SampleDate" class="view_patient_services_SampleDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->SampleDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $view_patient_services->SampleDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_SampleDate" class="view_patient_services_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SampleDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SampleDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SampleUser->Visible) { // SampleUser ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $view_patient_services->SampleUser->headerCellClass() ?>"><div id="elh_view_patient_services_SampleUser" class="view_patient_services_SampleUser"><div class="ew-table-header-caption"><?php echo $view_patient_services->SampleUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $view_patient_services->SampleUser->headerCellClass() ?>"><div><div id="elh_view_patient_services_SampleUser" class="view_patient_services_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SampleUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SampleUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SampleUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Sampled->Visible) { // Sampled ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Sampled) == "") { ?>
		<th data-name="Sampled" class="<?php echo $view_patient_services->Sampled->headerCellClass() ?>"><div id="elh_view_patient_services_Sampled" class="view_patient_services_Sampled"><div class="ew-table-header-caption"><?php echo $view_patient_services->Sampled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sampled" class="<?php echo $view_patient_services->Sampled->headerCellClass() ?>"><div><div id="elh_view_patient_services_Sampled" class="view_patient_services_Sampled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Sampled->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Sampled->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Sampled->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $view_patient_services->ReceivedDate->headerCellClass() ?>"><div id="elh_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->ReceivedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $view_patient_services->ReceivedDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ReceivedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ReceivedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $view_patient_services->ReceivedUser->headerCellClass() ?>"><div id="elh_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser"><div class="ew-table-header-caption"><?php echo $view_patient_services->ReceivedUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $view_patient_services->ReceivedUser->headerCellClass() ?>"><div><div id="elh_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ReceivedUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ReceivedUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ReceivedUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Recevied->Visible) { // Recevied ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Recevied) == "") { ?>
		<th data-name="Recevied" class="<?php echo $view_patient_services->Recevied->headerCellClass() ?>"><div id="elh_view_patient_services_Recevied" class="view_patient_services_Recevied"><div class="ew-table-header-caption"><?php echo $view_patient_services->Recevied->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Recevied" class="<?php echo $view_patient_services->Recevied->headerCellClass() ?>"><div><div id="elh_view_patient_services_Recevied" class="view_patient_services_Recevied">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Recevied->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Recevied->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Recevied->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $view_patient_services->DeptRecvDate->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecvDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $view_patient_services->DeptRecvDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DeptRecvDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DeptRecvDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $view_patient_services->DeptRecvUser->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser"><div class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecvUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $view_patient_services->DeptRecvUser->headerCellClass() ?>"><div><div id="elh_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecvUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DeptRecvUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DeptRecvUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->DeptRecived) == "") { ?>
		<th data-name="DeptRecived" class="<?php echo $view_patient_services->DeptRecived->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived"><div class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecived->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecived" class="<?php echo $view_patient_services->DeptRecived->headerCellClass() ?>"><div><div id="elh_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->DeptRecived->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->DeptRecived->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->DeptRecived->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $view_patient_services->SAuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->SAuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $view_patient_services->SAuthDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SAuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SAuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $view_patient_services->SAuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->SAuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $view_patient_services->SAuthBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SAuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SAuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SAuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->SAuthendicate) == "") { ?>
		<th data-name="SAuthendicate" class="<?php echo $view_patient_services->SAuthendicate->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate"><div class="ew-table-header-caption"><?php echo $view_patient_services->SAuthendicate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthendicate" class="<?php echo $view_patient_services->SAuthendicate->headerCellClass() ?>"><div><div id="elh_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->SAuthendicate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->SAuthendicate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->SAuthendicate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->AuthDate->Visible) { // AuthDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $view_patient_services->AuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_AuthDate" class="view_patient_services_AuthDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->AuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $view_patient_services->AuthDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_AuthDate" class="view_patient_services_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->AuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->AuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->AuthBy->Visible) { // AuthBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $view_patient_services->AuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_AuthBy" class="view_patient_services_AuthBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->AuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $view_patient_services->AuthBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_AuthBy" class="view_patient_services_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->AuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->AuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->AuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Authencate->Visible) { // Authencate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Authencate) == "") { ?>
		<th data-name="Authencate" class="<?php echo $view_patient_services->Authencate->headerCellClass() ?>"><div id="elh_view_patient_services_Authencate" class="view_patient_services_Authencate"><div class="ew-table-header-caption"><?php echo $view_patient_services->Authencate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Authencate" class="<?php echo $view_patient_services->Authencate->headerCellClass() ?>"><div><div id="elh_view_patient_services_Authencate" class="view_patient_services_Authencate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Authencate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Authencate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Authencate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->EditDate->Visible) { // EditDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $view_patient_services->EditDate->headerCellClass() ?>"><div id="elh_view_patient_services_EditDate" class="view_patient_services_EditDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $view_patient_services->EditDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_EditDate" class="view_patient_services_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->EditDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->EditDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->EditBy->Visible) { // EditBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->EditBy) == "") { ?>
		<th data-name="EditBy" class="<?php echo $view_patient_services->EditBy->headerCellClass() ?>"><div id="elh_view_patient_services_EditBy" class="view_patient_services_EditBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->EditBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditBy" class="<?php echo $view_patient_services->EditBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_EditBy" class="view_patient_services_EditBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->EditBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->EditBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->EditBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Editted->Visible) { // Editted ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Editted) == "") { ?>
		<th data-name="Editted" class="<?php echo $view_patient_services->Editted->headerCellClass() ?>"><div id="elh_view_patient_services_Editted" class="view_patient_services_Editted"><div class="ew-table-header-caption"><?php echo $view_patient_services->Editted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Editted" class="<?php echo $view_patient_services->Editted->headerCellClass() ?>"><div><div id="elh_view_patient_services_Editted" class="view_patient_services_Editted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Editted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Editted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Editted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PatID->Visible) { // PatID ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_patient_services->PatID->headerCellClass() ?>"><div id="elh_view_patient_services_PatID" class="view_patient_services_PatID"><div class="ew-table-header-caption"><?php echo $view_patient_services->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_patient_services->PatID->headerCellClass() ?>"><div><div id="elh_view_patient_services_PatID" class="view_patient_services_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->PatientId->Visible) { // PatientId ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_services->PatientId->headerCellClass() ?>"><div id="elh_view_patient_services_PatientId" class="view_patient_services_PatientId"><div class="ew-table-header-caption"><?php echo $view_patient_services->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_services->PatientId->headerCellClass() ?>"><div><div id="elh_view_patient_services_PatientId" class="view_patient_services_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Mobile->Visible) { // Mobile ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_services->Mobile->headerCellClass() ?>"><div id="elh_view_patient_services_Mobile" class="view_patient_services_Mobile"><div class="ew-table-header-caption"><?php echo $view_patient_services->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_services->Mobile->headerCellClass() ?>"><div><div id="elh_view_patient_services_Mobile" class="view_patient_services_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->CId->Visible) { // CId ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $view_patient_services->CId->headerCellClass() ?>"><div id="elh_view_patient_services_CId" class="view_patient_services_CId"><div class="ew-table-header-caption"><?php echo $view_patient_services->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $view_patient_services->CId->headerCellClass() ?>"><div><div id="elh_view_patient_services_CId" class="view_patient_services_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Order->Visible) { // Order ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_patient_services->Order->headerCellClass() ?>"><div id="elh_view_patient_services_Order" class="view_patient_services_Order"><div class="ew-table-header-caption"><?php echo $view_patient_services->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_patient_services->Order->headerCellClass() ?>"><div><div id="elh_view_patient_services_Order" class="view_patient_services_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->ResType->Visible) { // ResType ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $view_patient_services->ResType->headerCellClass() ?>"><div id="elh_view_patient_services_ResType" class="view_patient_services_ResType"><div class="ew-table-header-caption"><?php echo $view_patient_services->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $view_patient_services->ResType->headerCellClass() ?>"><div><div id="elh_view_patient_services_ResType" class="view_patient_services_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->ResType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->ResType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->ResType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Sample->Visible) { // Sample ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $view_patient_services->Sample->headerCellClass() ?>"><div id="elh_view_patient_services_Sample" class="view_patient_services_Sample"><div class="ew-table-header-caption"><?php echo $view_patient_services->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $view_patient_services->Sample->headerCellClass() ?>"><div><div id="elh_view_patient_services_Sample" class="view_patient_services_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Sample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Sample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Sample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->NoD->Visible) { // NoD ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $view_patient_services->NoD->headerCellClass() ?>"><div id="elh_view_patient_services_NoD" class="view_patient_services_NoD"><div class="ew-table-header-caption"><?php echo $view_patient_services->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $view_patient_services->NoD->headerCellClass() ?>"><div><div id="elh_view_patient_services_NoD" class="view_patient_services_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->NoD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->NoD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $view_patient_services->BillOrder->headerCellClass() ?>"><div id="elh_view_patient_services_BillOrder" class="view_patient_services_BillOrder"><div class="ew-table-header-caption"><?php echo $view_patient_services->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $view_patient_services->BillOrder->headerCellClass() ?>"><div><div id="elh_view_patient_services_BillOrder" class="view_patient_services_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->BillOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->BillOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Inactive->Visible) { // Inactive ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $view_patient_services->Inactive->headerCellClass() ?>"><div id="elh_view_patient_services_Inactive" class="view_patient_services_Inactive"><div class="ew-table-header-caption"><?php echo $view_patient_services->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $view_patient_services->Inactive->headerCellClass() ?>"><div><div id="elh_view_patient_services_Inactive" class="view_patient_services_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Inactive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Inactive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->CollSample->Visible) { // CollSample ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $view_patient_services->CollSample->headerCellClass() ?>"><div id="elh_view_patient_services_CollSample" class="view_patient_services_CollSample"><div class="ew-table-header-caption"><?php echo $view_patient_services->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $view_patient_services->CollSample->headerCellClass() ?>"><div><div id="elh_view_patient_services_CollSample" class="view_patient_services_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->CollSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->CollSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->CollSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->TestType->Visible) { // TestType ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_patient_services->TestType->headerCellClass() ?>"><div id="elh_view_patient_services_TestType" class="view_patient_services_TestType"><div class="ew-table-header-caption"><?php echo $view_patient_services->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_patient_services->TestType->headerCellClass() ?>"><div><div id="elh_view_patient_services_TestType" class="view_patient_services_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Repeated->Visible) { // Repeated ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_patient_services->Repeated->headerCellClass() ?>"><div id="elh_view_patient_services_Repeated" class="view_patient_services_Repeated"><div class="ew-table-header-caption"><?php echo $view_patient_services->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_patient_services->Repeated->headerCellClass() ?>"><div><div id="elh_view_patient_services_Repeated" class="view_patient_services_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Repeated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Repeated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->RepeatedBy) == "") { ?>
		<th data-name="RepeatedBy" class="<?php echo $view_patient_services->RepeatedBy->headerCellClass() ?>"><div id="elh_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy"><div class="ew-table-header-caption"><?php echo $view_patient_services->RepeatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedBy" class="<?php echo $view_patient_services->RepeatedBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->RepeatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->RepeatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->RepeatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->RepeatedDate) == "") { ?>
		<th data-name="RepeatedDate" class="<?php echo $view_patient_services->RepeatedDate->headerCellClass() ?>"><div id="elh_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate"><div class="ew-table-header-caption"><?php echo $view_patient_services->RepeatedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedDate" class="<?php echo $view_patient_services->RepeatedDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->RepeatedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->RepeatedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->serviceID->Visible) { // serviceID ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->serviceID) == "") { ?>
		<th data-name="serviceID" class="<?php echo $view_patient_services->serviceID->headerCellClass() ?>"><div id="elh_view_patient_services_serviceID" class="view_patient_services_serviceID"><div class="ew-table-header-caption"><?php echo $view_patient_services->serviceID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="serviceID" class="<?php echo $view_patient_services->serviceID->headerCellClass() ?>"><div><div id="elh_view_patient_services_serviceID" class="view_patient_services_serviceID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->serviceID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->serviceID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Service_Type->Visible) { // Service_Type ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Service_Type) == "") { ?>
		<th data-name="Service_Type" class="<?php echo $view_patient_services->Service_Type->headerCellClass() ?>"><div id="elh_view_patient_services_Service_Type" class="view_patient_services_Service_Type"><div class="ew-table-header-caption"><?php echo $view_patient_services->Service_Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Type" class="<?php echo $view_patient_services->Service_Type->headerCellClass() ?>"><div><div id="elh_view_patient_services_Service_Type" class="view_patient_services_Service_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Service_Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Service_Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Service_Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->Service_Department->Visible) { // Service_Department ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->Service_Department) == "") { ?>
		<th data-name="Service_Department" class="<?php echo $view_patient_services->Service_Department->headerCellClass() ?>"><div id="elh_view_patient_services_Service_Department" class="view_patient_services_Service_Department"><div class="ew-table-header-caption"><?php echo $view_patient_services->Service_Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Department" class="<?php echo $view_patient_services->Service_Department->headerCellClass() ?>"><div><div id="elh_view_patient_services_Service_Department" class="view_patient_services_Service_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->Service_Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->Service_Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->Service_Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services->RequestNo->Visible) { // RequestNo ?>
	<?php if ($view_patient_services->sortUrl($view_patient_services->RequestNo) == "") { ?>
		<th data-name="RequestNo" class="<?php echo $view_patient_services->RequestNo->headerCellClass() ?>"><div id="elh_view_patient_services_RequestNo" class="view_patient_services_RequestNo"><div class="ew-table-header-caption"><?php echo $view_patient_services->RequestNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestNo" class="<?php echo $view_patient_services->RequestNo->headerCellClass() ?>"><div><div id="elh_view_patient_services_RequestNo" class="view_patient_services_RequestNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services->RequestNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services->RequestNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_patient_services_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_patient_services_grid->StartRec = 1;
$view_patient_services_grid->StopRec = $view_patient_services_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_patient_services_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_patient_services_grid->FormKeyCountName) && ($view_patient_services->isGridAdd() || $view_patient_services->isGridEdit() || $view_patient_services->isConfirm())) {
		$view_patient_services_grid->KeyCount = $CurrentForm->getValue($view_patient_services_grid->FormKeyCountName);
		$view_patient_services_grid->StopRec = $view_patient_services_grid->StartRec + $view_patient_services_grid->KeyCount - 1;
	}
}
$view_patient_services_grid->RecCnt = $view_patient_services_grid->StartRec - 1;
if ($view_patient_services_grid->Recordset && !$view_patient_services_grid->Recordset->EOF) {
	$view_patient_services_grid->Recordset->moveFirst();
	$selectLimit = $view_patient_services_grid->UseSelectLimit;
	if (!$selectLimit && $view_patient_services_grid->StartRec > 1)
		$view_patient_services_grid->Recordset->move($view_patient_services_grid->StartRec - 1);
} elseif (!$view_patient_services->AllowAddDeleteRow && $view_patient_services_grid->StopRec == 0) {
	$view_patient_services_grid->StopRec = $view_patient_services->GridAddRowCount;
}

// Initialize aggregate
$view_patient_services->RowType = ROWTYPE_AGGREGATEINIT;
$view_patient_services->resetAttributes();
$view_patient_services_grid->renderRow();
if ($view_patient_services->isGridAdd())
	$view_patient_services_grid->RowIndex = 0;
if ($view_patient_services->isGridEdit())
	$view_patient_services_grid->RowIndex = 0;
while ($view_patient_services_grid->RecCnt < $view_patient_services_grid->StopRec) {
	$view_patient_services_grid->RecCnt++;
	if ($view_patient_services_grid->RecCnt >= $view_patient_services_grid->StartRec) {
		$view_patient_services_grid->RowCnt++;
		if ($view_patient_services->isGridAdd() || $view_patient_services->isGridEdit() || $view_patient_services->isConfirm()) {
			$view_patient_services_grid->RowIndex++;
			$CurrentForm->Index = $view_patient_services_grid->RowIndex;
			if ($CurrentForm->hasValue($view_patient_services_grid->FormActionName) && $view_patient_services_grid->EventCancelled)
				$view_patient_services_grid->RowAction = strval($CurrentForm->getValue($view_patient_services_grid->FormActionName));
			elseif ($view_patient_services->isGridAdd())
				$view_patient_services_grid->RowAction = "insert";
			else
				$view_patient_services_grid->RowAction = "";
		}

		// Set up key count
		$view_patient_services_grid->KeyCount = $view_patient_services_grid->RowIndex;

		// Init row class and style
		$view_patient_services->resetAttributes();
		$view_patient_services->CssClass = "";
		if ($view_patient_services->isGridAdd()) {
			if ($view_patient_services->CurrentMode == "copy") {
				$view_patient_services_grid->loadRowValues($view_patient_services_grid->Recordset); // Load row values
				$view_patient_services_grid->setRecordKey($view_patient_services_grid->RowOldKey, $view_patient_services_grid->Recordset); // Set old record key
			} else {
				$view_patient_services_grid->loadRowValues(); // Load default values
				$view_patient_services_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_patient_services_grid->loadRowValues($view_patient_services_grid->Recordset); // Load row values
		}
		$view_patient_services->RowType = ROWTYPE_VIEW; // Render view
		if ($view_patient_services->isGridAdd()) // Grid add
			$view_patient_services->RowType = ROWTYPE_ADD; // Render add
		if ($view_patient_services->isGridAdd() && $view_patient_services->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_patient_services_grid->restoreCurrentRowFormValues($view_patient_services_grid->RowIndex); // Restore form values
		if ($view_patient_services->isGridEdit()) { // Grid edit
			if ($view_patient_services->EventCancelled)
				$view_patient_services_grid->restoreCurrentRowFormValues($view_patient_services_grid->RowIndex); // Restore form values
			if ($view_patient_services_grid->RowAction == "insert")
				$view_patient_services->RowType = ROWTYPE_ADD; // Render add
			else
				$view_patient_services->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_patient_services->isGridEdit() && ($view_patient_services->RowType == ROWTYPE_EDIT || $view_patient_services->RowType == ROWTYPE_ADD) && $view_patient_services->EventCancelled) // Update failed
			$view_patient_services_grid->restoreCurrentRowFormValues($view_patient_services_grid->RowIndex); // Restore form values
		if ($view_patient_services->RowType == ROWTYPE_EDIT) // Edit row
			$view_patient_services_grid->EditRowCnt++;
		if ($view_patient_services->isConfirm()) // Confirm row
			$view_patient_services_grid->restoreCurrentRowFormValues($view_patient_services_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_patient_services->RowAttrs = array_merge($view_patient_services->RowAttrs, array('data-rowindex'=>$view_patient_services_grid->RowCnt, 'id'=>'r' . $view_patient_services_grid->RowCnt . '_view_patient_services', 'data-rowtype'=>$view_patient_services->RowType));

		// Render row
		$view_patient_services_grid->renderRow();

		// Render list options
		$view_patient_services_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_patient_services_grid->RowAction <> "delete" && $view_patient_services_grid->RowAction <> "insertdelete" && !($view_patient_services_grid->RowAction == "insert" && $view_patient_services->isConfirm() && $view_patient_services_grid->emptyRow())) {
?>
	<tr<?php echo $view_patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_services_grid->ListOptions->render("body", "left", $view_patient_services_grid->RowCnt);
?>
	<?php if ($view_patient_services->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_patient_services->id->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="o<?php echo $view_patient_services_grid->RowIndex ?>_id" id="o<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services->id->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_id" class="form-group view_patient_services_id">
<span<?php echo $view_patient_services->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="x<?php echo $view_patient_services_grid->RowIndex ?>_id" id="x<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_id" class="view_patient_services_id">
<span<?php echo $view_patient_services->id->viewAttributes() ?>>
<?php echo $view_patient_services->id->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="x<?php echo $view_patient_services_grid->RowIndex ?>_id" id="x<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services->id->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="o<?php echo $view_patient_services_grid->RowIndex ?>_id" id="o<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_id" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services->id->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_id" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_patient_services->Reception->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Reception" class="form-group view_patient_services_Reception">
<input type="text" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Reception->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Reception->EditValue ?>"<?php echo $view_patient_services->Reception->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Reception" class="form-group view_patient_services_Reception">
<span<?php echo $view_patient_services->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Reception" class="view_patient_services_Reception">
<span<?php echo $view_patient_services->Reception->viewAttributes() ?>>
<?php echo $view_patient_services->Reception->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_patient_services->mrnno->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_mrnno" class="form-group view_patient_services_mrnno">
<input type="text" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->mrnno->EditValue ?>"<?php echo $view_patient_services->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_mrnno" class="form-group view_patient_services_mrnno">
<span<?php echo $view_patient_services->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_mrnno" class="view_patient_services_mrnno">
<span<?php echo $view_patient_services->mrnno->viewAttributes() ?>>
<?php echo $view_patient_services->mrnno->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_patient_services->PatientName->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PatientName" class="form-group view_patient_services_PatientName">
<input type="text" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatientName->EditValue ?>"<?php echo $view_patient_services->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PatientName" class="form-group view_patient_services_PatientName">
<span<?php echo $view_patient_services->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->PatientName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PatientName" class="view_patient_services_PatientName">
<span<?php echo $view_patient_services->PatientName->viewAttributes() ?>>
<?php echo $view_patient_services->PatientName->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_patient_services->Age->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Age" class="form-group view_patient_services_Age">
<input type="text" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Age->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Age->EditValue ?>"<?php echo $view_patient_services->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services->Age->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Age" class="form-group view_patient_services_Age">
<span<?php echo $view_patient_services->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Age->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services->Age->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Age" class="view_patient_services_Age">
<span<?php echo $view_patient_services->Age->viewAttributes() ?>>
<?php echo $view_patient_services->Age->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services->Age->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services->Age->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_patient_services->Gender->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Gender" class="form-group view_patient_services_Gender">
<input type="text" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Gender->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Gender->EditValue ?>"<?php echo $view_patient_services->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Gender" class="form-group view_patient_services_Gender">
<span<?php echo $view_patient_services->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Gender->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Gender" class="view_patient_services_Gender">
<span<?php echo $view_patient_services->Gender->viewAttributes() ?>>
<?php echo $view_patient_services->Gender->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic"<?php echo $view_patient_services->profilePic->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_profilePic" class="form-group view_patient_services_profilePic">
<textarea data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->profilePic->getPlaceHolder()) ?>"<?php echo $view_patient_services->profilePic->editAttributes() ?>><?php echo $view_patient_services->profilePic->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_profilePic" class="form-group view_patient_services_profilePic">
<span<?php echo $view_patient_services->profilePic->viewAttributes() ?>>
<?php echo $view_patient_services->profilePic->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_profilePic" class="view_patient_services_profilePic">
<span<?php echo $view_patient_services->profilePic->viewAttributes() ?>>
<?php echo $view_patient_services->profilePic->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $view_patient_services->Services->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Services" class="form-group view_patient_services_Services">
<?php
$wrkonchange = "" . trim(@$view_patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" class="text-nowrap" style="z-index: <?php echo (9000 - $view_patient_services_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_patient_servicesgrid.createAutoSuggest({"id":"x<?php echo $view_patient_services_grid->RowIndex ?>_Services","forceSelect":false});
</script>
<?php echo $view_patient_services->Services->Lookup->getParamTag("p_x" . $view_patient_services_grid->RowIndex . "_Services") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Services" class="form-group view_patient_services_Services">
<?php
$wrkonchange = "" . trim(@$view_patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" class="text-nowrap" style="z-index: <?php echo (9000 - $view_patient_services_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_patient_servicesgrid.createAutoSuggest({"id":"x<?php echo $view_patient_services_grid->RowIndex ?>_Services","forceSelect":false});
</script>
<?php echo $view_patient_services->Services->Lookup->getParamTag("p_x" . $view_patient_services_grid->RowIndex . "_Services") ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Services" class="view_patient_services_Services">
<span<?php echo $view_patient_services->Services->viewAttributes() ?>>
<?php echo $view_patient_services->Services->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Unit->Visible) { // Unit ?>
		<td data-name="Unit"<?php echo $view_patient_services->Unit->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Unit" class="form-group view_patient_services_Unit">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Unit->EditValue ?>"<?php echo $view_patient_services->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services->Unit->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Unit" class="form-group view_patient_services_Unit">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Unit->EditValue ?>"<?php echo $view_patient_services->Unit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Unit" class="view_patient_services_Unit">
<span<?php echo $view_patient_services->Unit->viewAttributes() ?>>
<?php echo $view_patient_services->Unit->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services->Unit->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services->Unit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services->Unit->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services->Unit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $view_patient_services->amount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_amount" class="form-group view_patient_services_amount">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->amount->EditValue ?>"<?php echo $view_patient_services->amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services->amount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_amount" class="form-group view_patient_services_amount">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->amount->EditValue ?>"<?php echo $view_patient_services->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_amount" class="view_patient_services_amount">
<span<?php echo $view_patient_services->amount->viewAttributes() ?>>
<?php echo $view_patient_services->amount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services->amount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services->amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services->amount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services->amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_patient_services->Quantity->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Quantity" class="form-group view_patient_services_Quantity">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Quantity->EditValue ?>"<?php echo $view_patient_services->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Quantity" class="form-group view_patient_services_Quantity">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Quantity->EditValue ?>"<?php echo $view_patient_services->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Quantity" class="view_patient_services_Quantity">
<span<?php echo $view_patient_services->Quantity->viewAttributes() ?>>
<?php echo $view_patient_services->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory"<?php echo $view_patient_services->DiscountCategory->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DiscountCategory" class="form-group view_patient_services_DiscountCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services->DiscountCategory->editAttributes() ?>>
		<?php echo $view_patient_services->DiscountCategory->selectOptionListHtml("x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory") ?>
	</select>
</div>
<?php echo $view_patient_services->DiscountCategory->Lookup->getParamTag("p_x" . $view_patient_services_grid->RowIndex . "_DiscountCategory") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DiscountCategory" class="form-group view_patient_services_DiscountCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services->DiscountCategory->editAttributes() ?>>
		<?php echo $view_patient_services->DiscountCategory->selectOptionListHtml("x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory") ?>
	</select>
</div>
<?php echo $view_patient_services->DiscountCategory->Lookup->getParamTag("p_x" . $view_patient_services_grid->RowIndex . "_DiscountCategory") ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory">
<span<?php echo $view_patient_services->DiscountCategory->viewAttributes() ?>>
<?php echo $view_patient_services->DiscountCategory->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services->DiscountCategory->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services->DiscountCategory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services->DiscountCategory->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Discount->Visible) { // Discount ?>
		<td data-name="Discount"<?php echo $view_patient_services->Discount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Discount" class="form-group view_patient_services_Discount">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Discount->EditValue ?>"<?php echo $view_patient_services->Discount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services->Discount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Discount" class="form-group view_patient_services_Discount">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Discount->EditValue ?>"<?php echo $view_patient_services->Discount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Discount" class="view_patient_services_Discount">
<span<?php echo $view_patient_services->Discount->viewAttributes() ?>>
<?php echo $view_patient_services->Discount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services->Discount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services->Discount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services->Discount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services->Discount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal"<?php echo $view_patient_services->SubTotal->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SubTotal" class="form-group view_patient_services_SubTotal">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SubTotal->EditValue ?>"<?php echo $view_patient_services->SubTotal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SubTotal" class="form-group view_patient_services_SubTotal">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SubTotal->EditValue ?>"<?php echo $view_patient_services->SubTotal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SubTotal" class="view_patient_services_SubTotal">
<span<?php echo $view_patient_services->SubTotal->viewAttributes() ?>>
<?php echo $view_patient_services->SubTotal->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services->SubTotal->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services->SubTotal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services->SubTotal->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services->SubTotal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->description->Visible) { // description ?>
		<td data-name="description"<?php echo $view_patient_services->description->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_description" class="form-group view_patient_services_description">
<textarea data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="x<?php echo $view_patient_services_grid->RowIndex ?>_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->description->getPlaceHolder()) ?>"<?php echo $view_patient_services->description->editAttributes() ?>><?php echo $view_patient_services->description->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="o<?php echo $view_patient_services_grid->RowIndex ?>_description" id="o<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services->description->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_description" class="form-group view_patient_services_description">
<span<?php echo $view_patient_services->description->viewAttributes() ?>>
<?php echo $view_patient_services->description->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="x<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services->description->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_description" class="view_patient_services_description">
<span<?php echo $view_patient_services->description->viewAttributes() ?>>
<?php echo $view_patient_services->description->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="x<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services->description->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="o<?php echo $view_patient_services_grid->RowIndex ?>_description" id="o<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services->description->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services->description->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_description" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services->description->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type"<?php echo $view_patient_services->patient_type->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_patient_type" class="form-group view_patient_services_patient_type">
<input type="text" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->patient_type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->patient_type->EditValue ?>"<?php echo $view_patient_services->patient_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_patient_type" class="form-group view_patient_services_patient_type">
<span<?php echo $view_patient_services->patient_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->patient_type->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_patient_type" class="view_patient_services_patient_type">
<span<?php echo $view_patient_services->patient_type->viewAttributes() ?>>
<?php echo $view_patient_services->patient_type->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date"<?php echo $view_patient_services->charged_date->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_charged_date" class="form-group view_patient_services_charged_date">
<input type="text" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" placeholder="<?php echo HtmlEncode($view_patient_services->charged_date->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->charged_date->EditValue ?>"<?php echo $view_patient_services->charged_date->editAttributes() ?>>
<?php if (!$view_patient_services->charged_date->ReadOnly && !$view_patient_services->charged_date->Disabled && !isset($view_patient_services->charged_date->EditAttrs["readonly"]) && !isset($view_patient_services->charged_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_charged_date" class="form-group view_patient_services_charged_date">
<span<?php echo $view_patient_services->charged_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->charged_date->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_charged_date" class="view_patient_services_charged_date">
<span<?php echo $view_patient_services->charged_date->viewAttributes() ?>>
<?php echo $view_patient_services->charged_date->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_patient_services->status->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_status" class="form-group view_patient_services_status">
<input type="text" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="x<?php echo $view_patient_services_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->status->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->status->EditValue ?>"<?php echo $view_patient_services->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="o<?php echo $view_patient_services_grid->RowIndex ?>_status" id="o<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services->status->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_status" class="form-group view_patient_services_status">
<span<?php echo $view_patient_services->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->status->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="x<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services->status->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_status" class="view_patient_services_status">
<span<?php echo $view_patient_services->status->viewAttributes() ?>>
<?php echo $view_patient_services->status->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="x<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services->status->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="o<?php echo $view_patient_services_grid->RowIndex ?>_status" id="o<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services->status->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_status" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_patient_services->createdby->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_createdby" class="view_patient_services_createdby">
<span<?php echo $view_patient_services->createdby->viewAttributes() ?>>
<?php echo $view_patient_services->createdby->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services->createdby->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services->createdby->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_patient_services->createddatetime->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_createddatetime" class="view_patient_services_createddatetime">
<span<?php echo $view_patient_services->createddatetime->viewAttributes() ?>>
<?php echo $view_patient_services->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_patient_services->modifiedby->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_modifiedby" class="view_patient_services_modifiedby">
<span<?php echo $view_patient_services->modifiedby->viewAttributes() ?>>
<?php echo $view_patient_services->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_patient_services->modifieddatetime->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime">
<span<?php echo $view_patient_services->modifieddatetime->viewAttributes() ?>>
<?php echo $view_patient_services->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Aid->Visible) { // Aid ?>
		<td data-name="Aid"<?php echo $view_patient_services->Aid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Aid" class="form-group view_patient_services_Aid">
<input type="text" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Aid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Aid->EditValue ?>"<?php echo $view_patient_services->Aid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Aid" class="form-group view_patient_services_Aid">
<span<?php echo $view_patient_services->Aid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Aid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Aid" class="view_patient_services_Aid">
<span<?php echo $view_patient_services->Aid->viewAttributes() ?>>
<?php echo $view_patient_services->Aid->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Vid->Visible) { // Vid ?>
		<td data-name="Vid"<?php echo $view_patient_services->Vid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_patient_services->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<span<?php echo $view_patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<input type="text" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Vid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Vid->EditValue ?>"<?php echo $view_patient_services->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<span<?php echo $view_patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Vid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Vid" class="view_patient_services_Vid">
<span<?php echo $view_patient_services->Vid->viewAttributes() ?>>
<?php echo $view_patient_services->Vid->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_patient_services->DrID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrID" class="form-group view_patient_services_DrID">
<input type="text" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrID->EditValue ?>"<?php echo $view_patient_services->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrID" class="form-group view_patient_services_DrID">
<span<?php echo $view_patient_services->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrID" class="view_patient_services_DrID">
<span<?php echo $view_patient_services->DrID->viewAttributes() ?>>
<?php echo $view_patient_services->DrID->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE"<?php echo $view_patient_services->DrCODE->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrCODE" class="form-group view_patient_services_DrCODE">
<input type="text" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrCODE->EditValue ?>"<?php echo $view_patient_services->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrCODE" class="form-group view_patient_services_DrCODE">
<span<?php echo $view_patient_services->DrCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrCODE->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrCODE" class="view_patient_services_DrCODE">
<span<?php echo $view_patient_services->DrCODE->viewAttributes() ?>>
<?php echo $view_patient_services->DrCODE->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $view_patient_services->DrName->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrName" class="form-group view_patient_services_DrName">
<input type="text" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DrName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrName->EditValue ?>"<?php echo $view_patient_services->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrName" class="form-group view_patient_services_DrName">
<span<?php echo $view_patient_services->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrName" class="view_patient_services_DrName">
<span<?php echo $view_patient_services->DrName->viewAttributes() ?>>
<?php echo $view_patient_services->DrName->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $view_patient_services->Department->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Department" class="form-group view_patient_services_Department">
<input type="text" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Department->EditValue ?>"<?php echo $view_patient_services->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services->Department->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Department" class="form-group view_patient_services_Department">
<span<?php echo $view_patient_services->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Department->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services->Department->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Department" class="view_patient_services_Department">
<span<?php echo $view_patient_services->Department->viewAttributes() ?>>
<?php echo $view_patient_services->Department->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services->Department->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services->Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services->Department->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres"<?php echo $view_patient_services->DrSharePres->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrSharePres" class="form-group view_patient_services_DrSharePres">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrSharePres->EditValue ?>"<?php echo $view_patient_services->DrSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services->DrSharePres->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrSharePres" class="form-group view_patient_services_DrSharePres">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrSharePres->EditValue ?>"<?php echo $view_patient_services->DrSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres">
<span<?php echo $view_patient_services->DrSharePres->viewAttributes() ?>>
<?php echo $view_patient_services->DrSharePres->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services->DrSharePres->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services->DrSharePres->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services->DrSharePres->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services->DrSharePres->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres"<?php echo $view_patient_services->HospSharePres->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_HospSharePres" class="form-group view_patient_services_HospSharePres">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospSharePres->EditValue ?>"<?php echo $view_patient_services->HospSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services->HospSharePres->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_HospSharePres" class="form-group view_patient_services_HospSharePres">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospSharePres->EditValue ?>"<?php echo $view_patient_services->HospSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres">
<span<?php echo $view_patient_services->HospSharePres->viewAttributes() ?>>
<?php echo $view_patient_services->HospSharePres->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services->HospSharePres->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services->HospSharePres->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services->HospSharePres->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services->HospSharePres->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount"<?php echo $view_patient_services->DrShareAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareAmount" class="form-group view_patient_services_DrShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareAmount->EditValue ?>"<?php echo $view_patient_services->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareAmount" class="form-group view_patient_services_DrShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareAmount->EditValue ?>"<?php echo $view_patient_services->DrShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount">
<span<?php echo $view_patient_services->DrShareAmount->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareAmount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount"<?php echo $view_patient_services->HospShareAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_HospShareAmount" class="form-group view_patient_services_HospShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospShareAmount->EditValue ?>"<?php echo $view_patient_services->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_HospShareAmount" class="form-group view_patient_services_HospShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospShareAmount->EditValue ?>"<?php echo $view_patient_services->HospShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount">
<span<?php echo $view_patient_services->HospShareAmount->viewAttributes() ?>>
<?php echo $view_patient_services->HospShareAmount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services->HospShareAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services->HospShareAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services->HospShareAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount"<?php echo $view_patient_services->DrShareSettiledAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareSettiledAmount" class="form-group view_patient_services_DrShareSettiledAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareSettiledAmount" class="form-group view_patient_services_DrShareSettiledAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount">
<span<?php echo $view_patient_services->DrShareSettiledAmount->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareSettiledAmount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId"<?php echo $view_patient_services->DrShareSettledId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareSettledId" class="form-group view_patient_services_DrShareSettledId">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services->DrShareSettledId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareSettledId" class="form-group view_patient_services_DrShareSettledId">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services->DrShareSettledId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId">
<span<?php echo $view_patient_services->DrShareSettledId->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareSettledId->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus"<?php echo $view_patient_services->DrShareSettiledStatus->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareSettiledStatus" class="form-group view_patient_services_DrShareSettiledStatus">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareSettiledStatus" class="form-group view_patient_services_DrShareSettiledStatus">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus">
<span<?php echo $view_patient_services->DrShareSettiledStatus->viewAttributes() ?>>
<?php echo $view_patient_services->DrShareSettiledStatus->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId"<?php echo $view_patient_services->invoiceId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_invoiceId" class="form-group view_patient_services_invoiceId">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceId->EditValue ?>"<?php echo $view_patient_services->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_invoiceId" class="form-group view_patient_services_invoiceId">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceId->EditValue ?>"<?php echo $view_patient_services->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_invoiceId" class="view_patient_services_invoiceId">
<span<?php echo $view_patient_services->invoiceId->viewAttributes() ?>>
<?php echo $view_patient_services->invoiceId->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services->invoiceId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services->invoiceId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services->invoiceId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services->invoiceId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount"<?php echo $view_patient_services->invoiceAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_invoiceAmount" class="form-group view_patient_services_invoiceAmount">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceAmount->EditValue ?>"<?php echo $view_patient_services->invoiceAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_invoiceAmount" class="form-group view_patient_services_invoiceAmount">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceAmount->EditValue ?>"<?php echo $view_patient_services->invoiceAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount">
<span<?php echo $view_patient_services->invoiceAmount->viewAttributes() ?>>
<?php echo $view_patient_services->invoiceAmount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services->invoiceAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services->invoiceAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services->invoiceAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus"<?php echo $view_patient_services->invoiceStatus->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_invoiceStatus" class="form-group view_patient_services_invoiceStatus">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceStatus->EditValue ?>"<?php echo $view_patient_services->invoiceStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_invoiceStatus" class="form-group view_patient_services_invoiceStatus">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceStatus->EditValue ?>"<?php echo $view_patient_services->invoiceStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus">
<span<?php echo $view_patient_services->invoiceStatus->viewAttributes() ?>>
<?php echo $view_patient_services->invoiceStatus->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services->invoiceStatus->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services->invoiceStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services->invoiceStatus->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment"<?php echo $view_patient_services->modeOfPayment->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_modeOfPayment" class="form-group view_patient_services_modeOfPayment">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->modeOfPayment->EditValue ?>"<?php echo $view_patient_services->modeOfPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_modeOfPayment" class="form-group view_patient_services_modeOfPayment">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->modeOfPayment->EditValue ?>"<?php echo $view_patient_services->modeOfPayment->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment">
<span<?php echo $view_patient_services->modeOfPayment->viewAttributes() ?>>
<?php echo $view_patient_services->modeOfPayment->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services->modeOfPayment->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services->modeOfPayment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services->modeOfPayment->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_patient_services->HospID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_HospID" class="view_patient_services_HospID">
<span<?php echo $view_patient_services->HospID->viewAttributes() ?>>
<?php echo $view_patient_services->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services->HospID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services->HospID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_patient_services->RIDNO->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RIDNO" class="form-group view_patient_services_RIDNO">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RIDNO->EditValue ?>"<?php echo $view_patient_services->RIDNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RIDNO" class="form-group view_patient_services_RIDNO">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RIDNO->EditValue ?>"<?php echo $view_patient_services->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RIDNO" class="view_patient_services_RIDNO">
<span<?php echo $view_patient_services->RIDNO->viewAttributes() ?>>
<?php echo $view_patient_services->RIDNO->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services->RIDNO->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services->RIDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services->RIDNO->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $view_patient_services->ItemCode->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ItemCode" class="form-group view_patient_services_ItemCode">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ItemCode->EditValue ?>"<?php echo $view_patient_services->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ItemCode" class="form-group view_patient_services_ItemCode">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ItemCode->EditValue ?>"<?php echo $view_patient_services->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ItemCode" class="view_patient_services_ItemCode">
<span<?php echo $view_patient_services->ItemCode->viewAttributes() ?>>
<?php echo $view_patient_services->ItemCode->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services->ItemCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $view_patient_services->TidNo->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TidNo" class="form-group view_patient_services_TidNo">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TidNo->EditValue ?>"<?php echo $view_patient_services->TidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TidNo" class="form-group view_patient_services_TidNo">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TidNo->EditValue ?>"<?php echo $view_patient_services->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TidNo" class="view_patient_services_TidNo">
<span<?php echo $view_patient_services->TidNo->viewAttributes() ?>>
<?php echo $view_patient_services->TidNo->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services->TidNo->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services->TidNo->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $view_patient_services->sid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_sid" class="form-group view_patient_services_sid">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->sid->EditValue ?>"<?php echo $view_patient_services->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_sid" class="form-group view_patient_services_sid">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->sid->EditValue ?>"<?php echo $view_patient_services->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_sid" class="view_patient_services_sid">
<span<?php echo $view_patient_services->sid->viewAttributes() ?>>
<?php echo $view_patient_services->sid->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services->sid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services->sid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services->sid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services->sid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd"<?php echo $view_patient_services->TestSubCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestSubCd" class="form-group view_patient_services_TestSubCd">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestSubCd->EditValue ?>"<?php echo $view_patient_services->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestSubCd" class="form-group view_patient_services_TestSubCd">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestSubCd->EditValue ?>"<?php echo $view_patient_services->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd">
<span<?php echo $view_patient_services->TestSubCd->viewAttributes() ?>>
<?php echo $view_patient_services->TestSubCd->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services->TestSubCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services->TestSubCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $view_patient_services->DEptCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DEptCd" class="form-group view_patient_services_DEptCd">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DEptCd->EditValue ?>"<?php echo $view_patient_services->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DEptCd" class="form-group view_patient_services_DEptCd">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DEptCd->EditValue ?>"<?php echo $view_patient_services->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DEptCd" class="view_patient_services_DEptCd">
<span<?php echo $view_patient_services->DEptCd->viewAttributes() ?>>
<?php echo $view_patient_services->DEptCd->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services->DEptCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd"<?php echo $view_patient_services->ProfCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ProfCd" class="form-group view_patient_services_ProfCd">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ProfCd->EditValue ?>"<?php echo $view_patient_services->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ProfCd" class="form-group view_patient_services_ProfCd">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ProfCd->EditValue ?>"<?php echo $view_patient_services->ProfCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ProfCd" class="view_patient_services_ProfCd">
<span<?php echo $view_patient_services->ProfCd->viewAttributes() ?>>
<?php echo $view_patient_services->ProfCd->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services->ProfCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services->ProfCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services->ProfCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services->ProfCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Comments->Visible) { // Comments ?>
		<td data-name="Comments"<?php echo $view_patient_services->Comments->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Comments" class="form-group view_patient_services_Comments">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Comments->EditValue ?>"<?php echo $view_patient_services->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services->Comments->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Comments" class="form-group view_patient_services_Comments">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Comments->EditValue ?>"<?php echo $view_patient_services->Comments->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Comments" class="view_patient_services_Comments">
<span<?php echo $view_patient_services->Comments->viewAttributes() ?>>
<?php echo $view_patient_services->Comments->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services->Comments->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services->Comments->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services->Comments->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services->Comments->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $view_patient_services->Method->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Method" class="form-group view_patient_services_Method">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Method->EditValue ?>"<?php echo $view_patient_services->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services->Method->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Method" class="form-group view_patient_services_Method">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Method->EditValue ?>"<?php echo $view_patient_services->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Method" class="view_patient_services_Method">
<span<?php echo $view_patient_services->Method->viewAttributes() ?>>
<?php echo $view_patient_services->Method->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services->Method->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services->Method->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services->Method->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen"<?php echo $view_patient_services->Specimen->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Specimen" class="form-group view_patient_services_Specimen">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Specimen->EditValue ?>"<?php echo $view_patient_services->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Specimen" class="form-group view_patient_services_Specimen">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Specimen->EditValue ?>"<?php echo $view_patient_services->Specimen->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Specimen" class="view_patient_services_Specimen">
<span<?php echo $view_patient_services->Specimen->viewAttributes() ?>>
<?php echo $view_patient_services->Specimen->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services->Specimen->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services->Specimen->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services->Specimen->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services->Specimen->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal"<?php echo $view_patient_services->Abnormal->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Abnormal" class="form-group view_patient_services_Abnormal">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Abnormal->EditValue ?>"<?php echo $view_patient_services->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Abnormal" class="form-group view_patient_services_Abnormal">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Abnormal->EditValue ?>"<?php echo $view_patient_services->Abnormal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Abnormal" class="view_patient_services_Abnormal">
<span<?php echo $view_patient_services->Abnormal->viewAttributes() ?>>
<?php echo $view_patient_services->Abnormal->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services->Abnormal->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services->Abnormal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services->Abnormal->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services->Abnormal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit"<?php echo $view_patient_services->TestUnit->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestUnit" class="form-group view_patient_services_TestUnit">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestUnit->EditValue ?>"<?php echo $view_patient_services->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestUnit" class="form-group view_patient_services_TestUnit">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestUnit->EditValue ?>"<?php echo $view_patient_services->TestUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestUnit" class="view_patient_services_TestUnit">
<span<?php echo $view_patient_services->TestUnit->viewAttributes() ?>>
<?php echo $view_patient_services->TestUnit->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services->TestUnit->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services->TestUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services->TestUnit->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services->TestUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH"<?php echo $view_patient_services->LOWHIGH->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_LOWHIGH" class="form-group view_patient_services_LOWHIGH">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->LOWHIGH->EditValue ?>"<?php echo $view_patient_services->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_LOWHIGH" class="form-group view_patient_services_LOWHIGH">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->LOWHIGH->EditValue ?>"<?php echo $view_patient_services->LOWHIGH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH">
<span<?php echo $view_patient_services->LOWHIGH->viewAttributes() ?>>
<?php echo $view_patient_services->LOWHIGH->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services->LOWHIGH->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services->LOWHIGH->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services->LOWHIGH->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Branch->Visible) { // Branch ?>
		<td data-name="Branch"<?php echo $view_patient_services->Branch->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Branch" class="form-group view_patient_services_Branch">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Branch->EditValue ?>"<?php echo $view_patient_services->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services->Branch->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Branch" class="form-group view_patient_services_Branch">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Branch->EditValue ?>"<?php echo $view_patient_services->Branch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Branch" class="view_patient_services_Branch">
<span<?php echo $view_patient_services->Branch->viewAttributes() ?>>
<?php echo $view_patient_services->Branch->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services->Branch->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services->Branch->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services->Branch->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services->Branch->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch"<?php echo $view_patient_services->Dispatch->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Dispatch" class="form-group view_patient_services_Dispatch">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Dispatch->EditValue ?>"<?php echo $view_patient_services->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Dispatch" class="form-group view_patient_services_Dispatch">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Dispatch->EditValue ?>"<?php echo $view_patient_services->Dispatch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Dispatch" class="view_patient_services_Dispatch">
<span<?php echo $view_patient_services->Dispatch->viewAttributes() ?>>
<?php echo $view_patient_services->Dispatch->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services->Dispatch->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services->Dispatch->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services->Dispatch->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services->Dispatch->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1"<?php echo $view_patient_services->Pic1->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Pic1" class="form-group view_patient_services_Pic1">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic1->EditValue ?>"<?php echo $view_patient_services->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Pic1" class="form-group view_patient_services_Pic1">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic1->EditValue ?>"<?php echo $view_patient_services->Pic1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Pic1" class="view_patient_services_Pic1">
<span<?php echo $view_patient_services->Pic1->viewAttributes() ?>>
<?php echo $view_patient_services->Pic1->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services->Pic1->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services->Pic1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services->Pic1->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services->Pic1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2"<?php echo $view_patient_services->Pic2->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Pic2" class="form-group view_patient_services_Pic2">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic2->EditValue ?>"<?php echo $view_patient_services->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Pic2" class="form-group view_patient_services_Pic2">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic2->EditValue ?>"<?php echo $view_patient_services->Pic2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Pic2" class="view_patient_services_Pic2">
<span<?php echo $view_patient_services->Pic2->viewAttributes() ?>>
<?php echo $view_patient_services->Pic2->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services->Pic2->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services->Pic2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services->Pic2->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services->Pic2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath"<?php echo $view_patient_services->GraphPath->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_GraphPath" class="form-group view_patient_services_GraphPath">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->GraphPath->EditValue ?>"<?php echo $view_patient_services->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_GraphPath" class="form-group view_patient_services_GraphPath">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->GraphPath->EditValue ?>"<?php echo $view_patient_services->GraphPath->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_GraphPath" class="view_patient_services_GraphPath">
<span<?php echo $view_patient_services->GraphPath->viewAttributes() ?>>
<?php echo $view_patient_services->GraphPath->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services->GraphPath->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services->GraphPath->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services->GraphPath->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services->GraphPath->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD"<?php echo $view_patient_services->MachineCD->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_MachineCD" class="form-group view_patient_services_MachineCD">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->MachineCD->EditValue ?>"<?php echo $view_patient_services->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_MachineCD" class="form-group view_patient_services_MachineCD">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->MachineCD->EditValue ?>"<?php echo $view_patient_services->MachineCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_MachineCD" class="view_patient_services_MachineCD">
<span<?php echo $view_patient_services->MachineCD->viewAttributes() ?>>
<?php echo $view_patient_services->MachineCD->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services->MachineCD->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services->MachineCD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services->MachineCD->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services->MachineCD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel"<?php echo $view_patient_services->TestCancel->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestCancel" class="form-group view_patient_services_TestCancel">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestCancel->EditValue ?>"<?php echo $view_patient_services->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestCancel" class="form-group view_patient_services_TestCancel">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestCancel->EditValue ?>"<?php echo $view_patient_services->TestCancel->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestCancel" class="view_patient_services_TestCancel">
<span<?php echo $view_patient_services->TestCancel->viewAttributes() ?>>
<?php echo $view_patient_services->TestCancel->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services->TestCancel->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services->TestCancel->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services->TestCancel->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services->TestCancel->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource"<?php echo $view_patient_services->OutSource->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_OutSource" class="form-group view_patient_services_OutSource">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->OutSource->EditValue ?>"<?php echo $view_patient_services->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_OutSource" class="form-group view_patient_services_OutSource">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->OutSource->EditValue ?>"<?php echo $view_patient_services->OutSource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_OutSource" class="view_patient_services_OutSource">
<span<?php echo $view_patient_services->OutSource->viewAttributes() ?>>
<?php echo $view_patient_services->OutSource->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services->OutSource->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services->OutSource->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services->OutSource->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services->OutSource->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Printed->Visible) { // Printed ?>
		<td data-name="Printed"<?php echo $view_patient_services->Printed->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Printed" class="form-group view_patient_services_Printed">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Printed->EditValue ?>"<?php echo $view_patient_services->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services->Printed->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Printed" class="form-group view_patient_services_Printed">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Printed->EditValue ?>"<?php echo $view_patient_services->Printed->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Printed" class="view_patient_services_Printed">
<span<?php echo $view_patient_services->Printed->viewAttributes() ?>>
<?php echo $view_patient_services->Printed->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services->Printed->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services->Printed->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services->Printed->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services->Printed->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy"<?php echo $view_patient_services->PrintBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PrintBy" class="form-group view_patient_services_PrintBy">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintBy->EditValue ?>"<?php echo $view_patient_services->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PrintBy" class="form-group view_patient_services_PrintBy">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintBy->EditValue ?>"<?php echo $view_patient_services->PrintBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PrintBy" class="view_patient_services_PrintBy">
<span<?php echo $view_patient_services->PrintBy->viewAttributes() ?>>
<?php echo $view_patient_services->PrintBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services->PrintBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services->PrintBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services->PrintBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services->PrintBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate"<?php echo $view_patient_services->PrintDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PrintDate" class="form-group view_patient_services_PrintDate">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintDate->EditValue ?>"<?php echo $view_patient_services->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services->PrintDate->ReadOnly && !$view_patient_services->PrintDate->Disabled && !isset($view_patient_services->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PrintDate" class="form-group view_patient_services_PrintDate">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintDate->EditValue ?>"<?php echo $view_patient_services->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services->PrintDate->ReadOnly && !$view_patient_services->PrintDate->Disabled && !isset($view_patient_services->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PrintDate" class="view_patient_services_PrintDate">
<span<?php echo $view_patient_services->PrintDate->viewAttributes() ?>>
<?php echo $view_patient_services->PrintDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services->PrintDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services->PrintDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services->PrintDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services->PrintDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate"<?php echo $view_patient_services->BillingDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_BillingDate" class="form-group view_patient_services_BillingDate">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillingDate->EditValue ?>"<?php echo $view_patient_services->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services->BillingDate->ReadOnly && !$view_patient_services->BillingDate->Disabled && !isset($view_patient_services->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services->BillingDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_BillingDate" class="form-group view_patient_services_BillingDate">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillingDate->EditValue ?>"<?php echo $view_patient_services->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services->BillingDate->ReadOnly && !$view_patient_services->BillingDate->Disabled && !isset($view_patient_services->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_BillingDate" class="view_patient_services_BillingDate">
<span<?php echo $view_patient_services->BillingDate->viewAttributes() ?>>
<?php echo $view_patient_services->BillingDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services->BillingDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services->BillingDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services->BillingDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services->BillingDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy"<?php echo $view_patient_services->BilledBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_BilledBy" class="form-group view_patient_services_BilledBy">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BilledBy->EditValue ?>"<?php echo $view_patient_services->BilledBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services->BilledBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_BilledBy" class="form-group view_patient_services_BilledBy">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BilledBy->EditValue ?>"<?php echo $view_patient_services->BilledBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_BilledBy" class="view_patient_services_BilledBy">
<span<?php echo $view_patient_services->BilledBy->viewAttributes() ?>>
<?php echo $view_patient_services->BilledBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services->BilledBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services->BilledBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services->BilledBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services->BilledBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted"<?php echo $view_patient_services->Resulted->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Resulted" class="form-group view_patient_services_Resulted">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Resulted->EditValue ?>"<?php echo $view_patient_services->Resulted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Resulted" class="form-group view_patient_services_Resulted">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Resulted->EditValue ?>"<?php echo $view_patient_services->Resulted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Resulted" class="view_patient_services_Resulted">
<span<?php echo $view_patient_services->Resulted->viewAttributes() ?>>
<?php echo $view_patient_services->Resulted->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services->Resulted->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services->Resulted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services->Resulted->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services->Resulted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $view_patient_services->ResultDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ResultDate" class="form-group view_patient_services_ResultDate">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultDate->EditValue ?>"<?php echo $view_patient_services->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services->ResultDate->ReadOnly && !$view_patient_services->ResultDate->Disabled && !isset($view_patient_services->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ResultDate" class="form-group view_patient_services_ResultDate">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultDate->EditValue ?>"<?php echo $view_patient_services->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services->ResultDate->ReadOnly && !$view_patient_services->ResultDate->Disabled && !isset($view_patient_services->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ResultDate" class="view_patient_services_ResultDate">
<span<?php echo $view_patient_services->ResultDate->viewAttributes() ?>>
<?php echo $view_patient_services->ResultDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services->ResultDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services->ResultDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services->ResultDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $view_patient_services->ResultedBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ResultedBy" class="form-group view_patient_services_ResultedBy">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultedBy->EditValue ?>"<?php echo $view_patient_services->ResultedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ResultedBy" class="form-group view_patient_services_ResultedBy">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultedBy->EditValue ?>"<?php echo $view_patient_services->ResultedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy">
<span<?php echo $view_patient_services->ResultedBy->viewAttributes() ?>>
<?php echo $view_patient_services->ResultedBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services->ResultedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate"<?php echo $view_patient_services->SampleDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SampleDate" class="form-group view_patient_services_SampleDate">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleDate->EditValue ?>"<?php echo $view_patient_services->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services->SampleDate->ReadOnly && !$view_patient_services->SampleDate->Disabled && !isset($view_patient_services->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SampleDate" class="form-group view_patient_services_SampleDate">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleDate->EditValue ?>"<?php echo $view_patient_services->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services->SampleDate->ReadOnly && !$view_patient_services->SampleDate->Disabled && !isset($view_patient_services->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SampleDate" class="view_patient_services_SampleDate">
<span<?php echo $view_patient_services->SampleDate->viewAttributes() ?>>
<?php echo $view_patient_services->SampleDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services->SampleDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services->SampleDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services->SampleDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services->SampleDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser"<?php echo $view_patient_services->SampleUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SampleUser" class="form-group view_patient_services_SampleUser">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleUser->EditValue ?>"<?php echo $view_patient_services->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SampleUser" class="form-group view_patient_services_SampleUser">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleUser->EditValue ?>"<?php echo $view_patient_services->SampleUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SampleUser" class="view_patient_services_SampleUser">
<span<?php echo $view_patient_services->SampleUser->viewAttributes() ?>>
<?php echo $view_patient_services->SampleUser->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services->SampleUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services->SampleUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services->SampleUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services->SampleUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled"<?php echo $view_patient_services->Sampled->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Sampled" class="form-group view_patient_services_Sampled">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sampled->EditValue ?>"<?php echo $view_patient_services->Sampled->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services->Sampled->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Sampled" class="form-group view_patient_services_Sampled">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sampled->EditValue ?>"<?php echo $view_patient_services->Sampled->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Sampled" class="view_patient_services_Sampled">
<span<?php echo $view_patient_services->Sampled->viewAttributes() ?>>
<?php echo $view_patient_services->Sampled->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services->Sampled->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services->Sampled->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services->Sampled->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services->Sampled->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate"<?php echo $view_patient_services->ReceivedDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ReceivedDate" class="form-group view_patient_services_ReceivedDate">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedDate->EditValue ?>"<?php echo $view_patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services->ReceivedDate->ReadOnly && !$view_patient_services->ReceivedDate->Disabled && !isset($view_patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ReceivedDate" class="form-group view_patient_services_ReceivedDate">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedDate->EditValue ?>"<?php echo $view_patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services->ReceivedDate->ReadOnly && !$view_patient_services->ReceivedDate->Disabled && !isset($view_patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate">
<span<?php echo $view_patient_services->ReceivedDate->viewAttributes() ?>>
<?php echo $view_patient_services->ReceivedDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services->ReceivedDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services->ReceivedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services->ReceivedDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser"<?php echo $view_patient_services->ReceivedUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ReceivedUser" class="form-group view_patient_services_ReceivedUser">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedUser->EditValue ?>"<?php echo $view_patient_services->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ReceivedUser" class="form-group view_patient_services_ReceivedUser">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedUser->EditValue ?>"<?php echo $view_patient_services->ReceivedUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser">
<span<?php echo $view_patient_services->ReceivedUser->viewAttributes() ?>>
<?php echo $view_patient_services->ReceivedUser->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services->ReceivedUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services->ReceivedUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services->ReceivedUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied"<?php echo $view_patient_services->Recevied->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Recevied" class="form-group view_patient_services_Recevied">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Recevied->EditValue ?>"<?php echo $view_patient_services->Recevied->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services->Recevied->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Recevied" class="form-group view_patient_services_Recevied">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Recevied->EditValue ?>"<?php echo $view_patient_services->Recevied->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Recevied" class="view_patient_services_Recevied">
<span<?php echo $view_patient_services->Recevied->viewAttributes() ?>>
<?php echo $view_patient_services->Recevied->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services->Recevied->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services->Recevied->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services->Recevied->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services->Recevied->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate"<?php echo $view_patient_services->DeptRecvDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DeptRecvDate" class="form-group view_patient_services_DeptRecvDate">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services->DeptRecvDate->ReadOnly && !$view_patient_services->DeptRecvDate->Disabled && !isset($view_patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DeptRecvDate" class="form-group view_patient_services_DeptRecvDate">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services->DeptRecvDate->ReadOnly && !$view_patient_services->DeptRecvDate->Disabled && !isset($view_patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate">
<span<?php echo $view_patient_services->DeptRecvDate->viewAttributes() ?>>
<?php echo $view_patient_services->DeptRecvDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser"<?php echo $view_patient_services->DeptRecvUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DeptRecvUser" class="form-group view_patient_services_DeptRecvUser">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DeptRecvUser" class="form-group view_patient_services_DeptRecvUser">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services->DeptRecvUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser">
<span<?php echo $view_patient_services->DeptRecvUser->viewAttributes() ?>>
<?php echo $view_patient_services->DeptRecvUser->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived"<?php echo $view_patient_services->DeptRecived->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DeptRecived" class="form-group view_patient_services_DeptRecived">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecived->EditValue ?>"<?php echo $view_patient_services->DeptRecived->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services->DeptRecived->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DeptRecived" class="form-group view_patient_services_DeptRecived">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecived->EditValue ?>"<?php echo $view_patient_services->DeptRecived->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived">
<span<?php echo $view_patient_services->DeptRecived->viewAttributes() ?>>
<?php echo $view_patient_services->DeptRecived->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services->DeptRecived->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services->DeptRecived->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services->DeptRecived->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services->DeptRecived->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate"<?php echo $view_patient_services->SAuthDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SAuthDate" class="form-group view_patient_services_SAuthDate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthDate->EditValue ?>"<?php echo $view_patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->SAuthDate->ReadOnly && !$view_patient_services->SAuthDate->Disabled && !isset($view_patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SAuthDate" class="form-group view_patient_services_SAuthDate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthDate->EditValue ?>"<?php echo $view_patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->SAuthDate->ReadOnly && !$view_patient_services->SAuthDate->Disabled && !isset($view_patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate">
<span<?php echo $view_patient_services->SAuthDate->viewAttributes() ?>>
<?php echo $view_patient_services->SAuthDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services->SAuthDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services->SAuthDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services->SAuthDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services->SAuthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy"<?php echo $view_patient_services->SAuthBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SAuthBy" class="form-group view_patient_services_SAuthBy">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthBy->EditValue ?>"<?php echo $view_patient_services->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SAuthBy" class="form-group view_patient_services_SAuthBy">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthBy->EditValue ?>"<?php echo $view_patient_services->SAuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy">
<span<?php echo $view_patient_services->SAuthBy->viewAttributes() ?>>
<?php echo $view_patient_services->SAuthBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services->SAuthBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services->SAuthBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services->SAuthBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services->SAuthBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate"<?php echo $view_patient_services->SAuthendicate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SAuthendicate" class="form-group view_patient_services_SAuthendicate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthendicate->EditValue ?>"<?php echo $view_patient_services->SAuthendicate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SAuthendicate" class="form-group view_patient_services_SAuthendicate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthendicate->EditValue ?>"<?php echo $view_patient_services->SAuthendicate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate">
<span<?php echo $view_patient_services->SAuthendicate->viewAttributes() ?>>
<?php echo $view_patient_services->SAuthendicate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services->SAuthendicate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services->SAuthendicate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services->SAuthendicate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate"<?php echo $view_patient_services->AuthDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_AuthDate" class="form-group view_patient_services_AuthDate">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthDate->EditValue ?>"<?php echo $view_patient_services->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->AuthDate->ReadOnly && !$view_patient_services->AuthDate->Disabled && !isset($view_patient_services->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_AuthDate" class="form-group view_patient_services_AuthDate">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthDate->EditValue ?>"<?php echo $view_patient_services->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->AuthDate->ReadOnly && !$view_patient_services->AuthDate->Disabled && !isset($view_patient_services->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_AuthDate" class="view_patient_services_AuthDate">
<span<?php echo $view_patient_services->AuthDate->viewAttributes() ?>>
<?php echo $view_patient_services->AuthDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services->AuthDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services->AuthDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services->AuthDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services->AuthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy"<?php echo $view_patient_services->AuthBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_AuthBy" class="form-group view_patient_services_AuthBy">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthBy->EditValue ?>"<?php echo $view_patient_services->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_AuthBy" class="form-group view_patient_services_AuthBy">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthBy->EditValue ?>"<?php echo $view_patient_services->AuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_AuthBy" class="view_patient_services_AuthBy">
<span<?php echo $view_patient_services->AuthBy->viewAttributes() ?>>
<?php echo $view_patient_services->AuthBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services->AuthBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services->AuthBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services->AuthBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services->AuthBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate"<?php echo $view_patient_services->Authencate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Authencate" class="form-group view_patient_services_Authencate">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Authencate->EditValue ?>"<?php echo $view_patient_services->Authencate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services->Authencate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Authencate" class="form-group view_patient_services_Authencate">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Authencate->EditValue ?>"<?php echo $view_patient_services->Authencate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Authencate" class="view_patient_services_Authencate">
<span<?php echo $view_patient_services->Authencate->viewAttributes() ?>>
<?php echo $view_patient_services->Authencate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services->Authencate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services->Authencate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services->Authencate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services->Authencate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate"<?php echo $view_patient_services->EditDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_EditDate" class="form-group view_patient_services_EditDate">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditDate->EditValue ?>"<?php echo $view_patient_services->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services->EditDate->ReadOnly && !$view_patient_services->EditDate->Disabled && !isset($view_patient_services->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services->EditDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_EditDate" class="form-group view_patient_services_EditDate">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditDate->EditValue ?>"<?php echo $view_patient_services->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services->EditDate->ReadOnly && !$view_patient_services->EditDate->Disabled && !isset($view_patient_services->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_EditDate" class="view_patient_services_EditDate">
<span<?php echo $view_patient_services->EditDate->viewAttributes() ?>>
<?php echo $view_patient_services->EditDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services->EditDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services->EditDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services->EditDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services->EditDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy"<?php echo $view_patient_services->EditBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_EditBy" class="form-group view_patient_services_EditBy">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditBy->EditValue ?>"<?php echo $view_patient_services->EditBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services->EditBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_EditBy" class="form-group view_patient_services_EditBy">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditBy->EditValue ?>"<?php echo $view_patient_services->EditBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_EditBy" class="view_patient_services_EditBy">
<span<?php echo $view_patient_services->EditBy->viewAttributes() ?>>
<?php echo $view_patient_services->EditBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services->EditBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services->EditBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services->EditBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services->EditBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Editted->Visible) { // Editted ?>
		<td data-name="Editted"<?php echo $view_patient_services->Editted->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Editted" class="form-group view_patient_services_Editted">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Editted->EditValue ?>"<?php echo $view_patient_services->Editted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services->Editted->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Editted" class="form-group view_patient_services_Editted">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Editted->EditValue ?>"<?php echo $view_patient_services->Editted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Editted" class="view_patient_services_Editted">
<span<?php echo $view_patient_services->Editted->viewAttributes() ?>>
<?php echo $view_patient_services->Editted->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services->Editted->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services->Editted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services->Editted->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services->Editted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $view_patient_services->PatID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PatID" class="form-group view_patient_services_PatID">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatID->EditValue ?>"<?php echo $view_patient_services->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PatID" class="form-group view_patient_services_PatID">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatID->EditValue ?>"<?php echo $view_patient_services->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PatID" class="view_patient_services_PatID">
<span<?php echo $view_patient_services->PatID->viewAttributes() ?>>
<?php echo $view_patient_services->PatID->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services->PatID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services->PatID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_patient_services->PatientId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PatientId" class="form-group view_patient_services_PatientId">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatientId->EditValue ?>"<?php echo $view_patient_services->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PatientId" class="form-group view_patient_services_PatientId">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatientId->EditValue ?>"<?php echo $view_patient_services->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_PatientId" class="view_patient_services_PatientId">
<span<?php echo $view_patient_services->PatientId->viewAttributes() ?>>
<?php echo $view_patient_services->PatientId->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services->PatientId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services->PatientId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_patient_services->Mobile->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Mobile" class="form-group view_patient_services_Mobile">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Mobile->EditValue ?>"<?php echo $view_patient_services->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Mobile" class="form-group view_patient_services_Mobile">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Mobile->EditValue ?>"<?php echo $view_patient_services->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Mobile" class="view_patient_services_Mobile">
<span<?php echo $view_patient_services->Mobile->viewAttributes() ?>>
<?php echo $view_patient_services->Mobile->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services->Mobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services->Mobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $view_patient_services->CId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_CId" class="form-group view_patient_services_CId">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CId->EditValue ?>"<?php echo $view_patient_services->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services->CId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_CId" class="form-group view_patient_services_CId">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CId->EditValue ?>"<?php echo $view_patient_services->CId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_CId" class="view_patient_services_CId">
<span<?php echo $view_patient_services->CId->viewAttributes() ?>>
<?php echo $view_patient_services->CId->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services->CId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services->CId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services->CId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services->CId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $view_patient_services->Order->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Order" class="form-group view_patient_services_Order">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Order->EditValue ?>"<?php echo $view_patient_services->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Order" class="form-group view_patient_services_Order">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Order->EditValue ?>"<?php echo $view_patient_services->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Order" class="view_patient_services_Order">
<span<?php echo $view_patient_services->Order->viewAttributes() ?>>
<?php echo $view_patient_services->Order->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services->Order->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services->Order->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services->Order->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResType->Visible) { // ResType ?>
		<td data-name="ResType"<?php echo $view_patient_services->ResType->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ResType" class="form-group view_patient_services_ResType">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResType->EditValue ?>"<?php echo $view_patient_services->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services->ResType->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ResType" class="form-group view_patient_services_ResType">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResType->EditValue ?>"<?php echo $view_patient_services->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_ResType" class="view_patient_services_ResType">
<span<?php echo $view_patient_services->ResType->viewAttributes() ?>>
<?php echo $view_patient_services->ResType->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services->ResType->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services->ResType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services->ResType->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services->ResType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Sample->Visible) { // Sample ?>
		<td data-name="Sample"<?php echo $view_patient_services->Sample->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Sample" class="form-group view_patient_services_Sample">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sample->EditValue ?>"<?php echo $view_patient_services->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services->Sample->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Sample" class="form-group view_patient_services_Sample">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sample->EditValue ?>"<?php echo $view_patient_services->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Sample" class="view_patient_services_Sample">
<span<?php echo $view_patient_services->Sample->viewAttributes() ?>>
<?php echo $view_patient_services->Sample->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services->Sample->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services->Sample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services->Sample->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services->Sample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->NoD->Visible) { // NoD ?>
		<td data-name="NoD"<?php echo $view_patient_services->NoD->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_NoD" class="form-group view_patient_services_NoD">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->NoD->EditValue ?>"<?php echo $view_patient_services->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services->NoD->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_NoD" class="form-group view_patient_services_NoD">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->NoD->EditValue ?>"<?php echo $view_patient_services->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_NoD" class="view_patient_services_NoD">
<span<?php echo $view_patient_services->NoD->viewAttributes() ?>>
<?php echo $view_patient_services->NoD->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services->NoD->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services->NoD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services->NoD->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services->NoD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder"<?php echo $view_patient_services->BillOrder->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_BillOrder" class="form-group view_patient_services_BillOrder">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillOrder->EditValue ?>"<?php echo $view_patient_services->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_BillOrder" class="form-group view_patient_services_BillOrder">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillOrder->EditValue ?>"<?php echo $view_patient_services->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_BillOrder" class="view_patient_services_BillOrder">
<span<?php echo $view_patient_services->BillOrder->viewAttributes() ?>>
<?php echo $view_patient_services->BillOrder->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services->BillOrder->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services->BillOrder->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services->BillOrder->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services->BillOrder->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive"<?php echo $view_patient_services->Inactive->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Inactive" class="form-group view_patient_services_Inactive">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Inactive->EditValue ?>"<?php echo $view_patient_services->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Inactive" class="form-group view_patient_services_Inactive">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Inactive->EditValue ?>"<?php echo $view_patient_services->Inactive->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Inactive" class="view_patient_services_Inactive">
<span<?php echo $view_patient_services->Inactive->viewAttributes() ?>>
<?php echo $view_patient_services->Inactive->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services->Inactive->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services->Inactive->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services->Inactive->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services->Inactive->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample"<?php echo $view_patient_services->CollSample->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_CollSample" class="form-group view_patient_services_CollSample">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CollSample->EditValue ?>"<?php echo $view_patient_services->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_CollSample" class="form-group view_patient_services_CollSample">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CollSample->EditValue ?>"<?php echo $view_patient_services->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_CollSample" class="view_patient_services_CollSample">
<span<?php echo $view_patient_services->CollSample->viewAttributes() ?>>
<?php echo $view_patient_services->CollSample->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services->CollSample->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services->CollSample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services->CollSample->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services->CollSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $view_patient_services->TestType->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestType" class="form-group view_patient_services_TestType">
<input type="text" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestType->EditValue ?>"<?php echo $view_patient_services->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestType" class="form-group view_patient_services_TestType">
<span<?php echo $view_patient_services->TestType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->TestType->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_TestType" class="view_patient_services_TestType">
<span<?php echo $view_patient_services->TestType->viewAttributes() ?>>
<?php echo $view_patient_services->TestType->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated"<?php echo $view_patient_services->Repeated->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Repeated" class="form-group view_patient_services_Repeated">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Repeated->EditValue ?>"<?php echo $view_patient_services->Repeated->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Repeated" class="form-group view_patient_services_Repeated">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Repeated->EditValue ?>"<?php echo $view_patient_services->Repeated->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Repeated" class="view_patient_services_Repeated">
<span<?php echo $view_patient_services->Repeated->viewAttributes() ?>>
<?php echo $view_patient_services->Repeated->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services->Repeated->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services->Repeated->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services->Repeated->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services->Repeated->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy"<?php echo $view_patient_services->RepeatedBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RepeatedBy" class="form-group view_patient_services_RepeatedBy">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedBy->EditValue ?>"<?php echo $view_patient_services->RepeatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RepeatedBy" class="form-group view_patient_services_RepeatedBy">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedBy->EditValue ?>"<?php echo $view_patient_services->RepeatedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy">
<span<?php echo $view_patient_services->RepeatedBy->viewAttributes() ?>>
<?php echo $view_patient_services->RepeatedBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services->RepeatedBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services->RepeatedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services->RepeatedBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate"<?php echo $view_patient_services->RepeatedDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RepeatedDate" class="form-group view_patient_services_RepeatedDate">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedDate->EditValue ?>"<?php echo $view_patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services->RepeatedDate->ReadOnly && !$view_patient_services->RepeatedDate->Disabled && !isset($view_patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RepeatedDate" class="form-group view_patient_services_RepeatedDate">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedDate->EditValue ?>"<?php echo $view_patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services->RepeatedDate->ReadOnly && !$view_patient_services->RepeatedDate->Disabled && !isset($view_patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate">
<span<?php echo $view_patient_services->RepeatedDate->viewAttributes() ?>>
<?php echo $view_patient_services->RepeatedDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services->RepeatedDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services->RepeatedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services->RepeatedDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID"<?php echo $view_patient_services->serviceID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_serviceID" class="form-group view_patient_services_serviceID">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->serviceID->EditValue ?>"<?php echo $view_patient_services->serviceID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services->serviceID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_serviceID" class="form-group view_patient_services_serviceID">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->serviceID->EditValue ?>"<?php echo $view_patient_services->serviceID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_serviceID" class="view_patient_services_serviceID">
<span<?php echo $view_patient_services->serviceID->viewAttributes() ?>>
<?php echo $view_patient_services->serviceID->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services->serviceID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services->serviceID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services->serviceID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services->serviceID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type"<?php echo $view_patient_services->Service_Type->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Service_Type" class="form-group view_patient_services_Service_Type">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Type->EditValue ?>"<?php echo $view_patient_services->Service_Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services->Service_Type->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Service_Type" class="form-group view_patient_services_Service_Type">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Type->EditValue ?>"<?php echo $view_patient_services->Service_Type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Service_Type" class="view_patient_services_Service_Type">
<span<?php echo $view_patient_services->Service_Type->viewAttributes() ?>>
<?php echo $view_patient_services->Service_Type->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services->Service_Type->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services->Service_Type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services->Service_Type->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services->Service_Type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department"<?php echo $view_patient_services->Service_Department->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Service_Department" class="form-group view_patient_services_Service_Department">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Department->EditValue ?>"<?php echo $view_patient_services->Service_Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services->Service_Department->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Service_Department" class="form-group view_patient_services_Service_Department">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Department->EditValue ?>"<?php echo $view_patient_services->Service_Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_Service_Department" class="view_patient_services_Service_Department">
<span<?php echo $view_patient_services->Service_Department->viewAttributes() ?>>
<?php echo $view_patient_services->Service_Department->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services->Service_Department->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services->Service_Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services->Service_Department->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services->Service_Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo"<?php echo $view_patient_services->RequestNo->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RequestNo" class="form-group view_patient_services_RequestNo">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RequestNo->EditValue ?>"<?php echo $view_patient_services->RequestNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services->RequestNo->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RequestNo" class="form-group view_patient_services_RequestNo">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RequestNo->EditValue ?>"<?php echo $view_patient_services->RequestNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCnt ?>_view_patient_services_RequestNo" class="view_patient_services_RequestNo">
<span<?php echo $view_patient_services->RequestNo->viewAttributes() ?>>
<?php echo $view_patient_services->RequestNo->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services->RequestNo->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services->RequestNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services->RequestNo->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services->RequestNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_services_grid->ListOptions->render("body", "right", $view_patient_services_grid->RowCnt);
?>
	</tr>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD || $view_patient_services->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_patient_servicesgrid.updateLists(<?php echo $view_patient_services_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_patient_services->isGridAdd() || $view_patient_services->CurrentMode == "copy")
		if (!$view_patient_services_grid->Recordset->EOF)
			$view_patient_services_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_patient_services->CurrentMode == "add" || $view_patient_services->CurrentMode == "copy" || $view_patient_services->CurrentMode == "edit") {
		$view_patient_services_grid->RowIndex = '$rowindex$';
		$view_patient_services_grid->loadRowValues();

		// Set row properties
		$view_patient_services->resetAttributes();
		$view_patient_services->RowAttrs = array_merge($view_patient_services->RowAttrs, array('data-rowindex'=>$view_patient_services_grid->RowIndex, 'id'=>'r0_view_patient_services', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_patient_services->RowAttrs["class"], "ew-template");
		$view_patient_services->RowType = ROWTYPE_ADD;

		// Render row
		$view_patient_services_grid->renderRow();

		// Render list options
		$view_patient_services_grid->renderListOptions();
		$view_patient_services_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_services_grid->ListOptions->render("body", "left", $view_patient_services_grid->RowIndex);
?>
	<?php if ($view_patient_services->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_id" class="form-group view_patient_services_id">
<span<?php echo $view_patient_services->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="x<?php echo $view_patient_services_grid->RowIndex ?>_id" id="x<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="o<?php echo $view_patient_services_grid->RowIndex ?>_id" id="o<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Reception" class="form-group view_patient_services_Reception">
<input type="text" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Reception->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Reception->EditValue ?>"<?php echo $view_patient_services->Reception->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Reception" class="form-group view_patient_services_Reception">
<span<?php echo $view_patient_services->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_mrnno" class="form-group view_patient_services_mrnno">
<input type="text" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->mrnno->EditValue ?>"<?php echo $view_patient_services->mrnno->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_mrnno" class="form-group view_patient_services_mrnno">
<span<?php echo $view_patient_services->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_PatientName" class="form-group view_patient_services_PatientName">
<input type="text" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatientName->EditValue ?>"<?php echo $view_patient_services->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_PatientName" class="form-group view_patient_services_PatientName">
<span<?php echo $view_patient_services->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Age" class="form-group view_patient_services_Age">
<input type="text" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Age->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Age->EditValue ?>"<?php echo $view_patient_services->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Age" class="form-group view_patient_services_Age">
<span<?php echo $view_patient_services->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Gender" class="form-group view_patient_services_Gender">
<input type="text" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Gender->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Gender->EditValue ?>"<?php echo $view_patient_services->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Gender" class="form-group view_patient_services_Gender">
<span<?php echo $view_patient_services->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_profilePic" class="form-group view_patient_services_profilePic">
<textarea data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->profilePic->getPlaceHolder()) ?>"<?php echo $view_patient_services->profilePic->editAttributes() ?>><?php echo $view_patient_services->profilePic->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_profilePic" class="form-group view_patient_services_profilePic">
<span<?php echo $view_patient_services->profilePic->viewAttributes() ?>>
<?php echo $view_patient_services->profilePic->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services->profilePic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Services->Visible) { // Services ?>
		<td data-name="Services">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Services" class="form-group view_patient_services_Services">
<?php
$wrkonchange = "" . trim(@$view_patient_services->Services->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_patient_services->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" class="text-nowrap" style="z-index: <?php echo (9000 - $view_patient_services_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_patient_servicesgrid.createAutoSuggest({"id":"x<?php echo $view_patient_services_grid->RowIndex ?>_Services","forceSelect":false});
</script>
<?php echo $view_patient_services->Services->Lookup->getParamTag("p_x" . $view_patient_services_grid->RowIndex . "_Services") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Services" class="form-group view_patient_services_Services">
<span<?php echo $view_patient_services->Services->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Services->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Unit->Visible) { // Unit ?>
		<td data-name="Unit">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Unit" class="form-group view_patient_services_Unit">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Unit->EditValue ?>"<?php echo $view_patient_services->Unit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Unit" class="form-group view_patient_services_Unit">
<span<?php echo $view_patient_services->Unit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Unit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services->Unit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services->Unit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->amount->Visible) { // amount ?>
		<td data-name="amount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_amount" class="form-group view_patient_services_amount">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->amount->EditValue ?>"<?php echo $view_patient_services->amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_amount" class="form-group view_patient_services_amount">
<span<?php echo $view_patient_services->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->amount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services->amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services->amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Quantity" class="form-group view_patient_services_Quantity">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Quantity->EditValue ?>"<?php echo $view_patient_services->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Quantity" class="form-group view_patient_services_Quantity">
<span<?php echo $view_patient_services->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Quantity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DiscountCategory" class="form-group view_patient_services_DiscountCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services->DiscountCategory->editAttributes() ?>>
		<?php echo $view_patient_services->DiscountCategory->selectOptionListHtml("x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory") ?>
	</select>
</div>
<?php echo $view_patient_services->DiscountCategory->Lookup->getParamTag("p_x" . $view_patient_services_grid->RowIndex . "_DiscountCategory") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DiscountCategory" class="form-group view_patient_services_DiscountCategory">
<span<?php echo $view_patient_services->DiscountCategory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DiscountCategory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services->DiscountCategory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services->DiscountCategory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Discount->Visible) { // Discount ?>
		<td data-name="Discount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Discount" class="form-group view_patient_services_Discount">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_patient_services->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Discount->EditValue ?>"<?php echo $view_patient_services->Discount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Discount" class="form-group view_patient_services_Discount">
<span<?php echo $view_patient_services->Discount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Discount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services->Discount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services->Discount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SubTotal" class="form-group view_patient_services_SubTotal">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SubTotal->EditValue ?>"<?php echo $view_patient_services->SubTotal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SubTotal" class="form-group view_patient_services_SubTotal">
<span<?php echo $view_patient_services->SubTotal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->SubTotal->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services->SubTotal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services->SubTotal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->description->Visible) { // description ?>
		<td data-name="description">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_description" class="form-group view_patient_services_description">
<textarea data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="x<?php echo $view_patient_services_grid->RowIndex ?>_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services->description->getPlaceHolder()) ?>"<?php echo $view_patient_services->description->editAttributes() ?>><?php echo $view_patient_services->description->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_description" class="form-group view_patient_services_description">
<span<?php echo $view_patient_services->description->viewAttributes() ?>>
<?php echo $view_patient_services->description->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="x<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services->description->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="o<?php echo $view_patient_services_grid->RowIndex ?>_description" id="o<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services->description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_patient_type" class="form-group view_patient_services_patient_type">
<input type="text" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->patient_type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->patient_type->EditValue ?>"<?php echo $view_patient_services->patient_type->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_patient_type" class="form-group view_patient_services_patient_type">
<span<?php echo $view_patient_services->patient_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->patient_type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services->patient_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_charged_date" class="form-group view_patient_services_charged_date">
<input type="text" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" placeholder="<?php echo HtmlEncode($view_patient_services->charged_date->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->charged_date->EditValue ?>"<?php echo $view_patient_services->charged_date->editAttributes() ?>>
<?php if (!$view_patient_services->charged_date->ReadOnly && !$view_patient_services->charged_date->Disabled && !isset($view_patient_services->charged_date->EditAttrs["readonly"]) && !isset($view_patient_services->charged_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_charged_date" class="form-group view_patient_services_charged_date">
<span<?php echo $view_patient_services->charged_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->charged_date->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services->charged_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_status" class="form-group view_patient_services_status">
<input type="text" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="x<?php echo $view_patient_services_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->status->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->status->EditValue ?>"<?php echo $view_patient_services->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_status" class="form-group view_patient_services_status">
<span<?php echo $view_patient_services->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="x<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="o<?php echo $view_patient_services_grid->RowIndex ?>_status" id="o<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_createdby" class="form-group view_patient_services_createdby">
<span<?php echo $view_patient_services->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_createddatetime" class="form-group view_patient_services_createddatetime">
<span<?php echo $view_patient_services->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_modifiedby" class="form-group view_patient_services_modifiedby">
<span<?php echo $view_patient_services->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_modifieddatetime" class="form-group view_patient_services_modifieddatetime">
<span<?php echo $view_patient_services->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Aid->Visible) { // Aid ?>
		<td data-name="Aid">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Aid" class="form-group view_patient_services_Aid">
<input type="text" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Aid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Aid->EditValue ?>"<?php echo $view_patient_services->Aid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Aid" class="form-group view_patient_services_Aid">
<span<?php echo $view_patient_services->Aid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Aid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services->Aid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php if ($view_patient_services->Vid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<span<?php echo $view_patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<input type="text" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Vid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Vid->EditValue ?>"<?php echo $view_patient_services->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<span<?php echo $view_patient_services->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrID" class="form-group view_patient_services_DrID">
<input type="text" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrID->EditValue ?>"<?php echo $view_patient_services->DrID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrID" class="form-group view_patient_services_DrID">
<span<?php echo $view_patient_services->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrCODE" class="form-group view_patient_services_DrCODE">
<input type="text" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrCODE->EditValue ?>"<?php echo $view_patient_services->DrCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrCODE" class="form-group view_patient_services_DrCODE">
<span<?php echo $view_patient_services->DrCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrName" class="form-group view_patient_services_DrName">
<input type="text" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DrName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrName->EditValue ?>"<?php echo $view_patient_services->DrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrName" class="form-group view_patient_services_DrName">
<span<?php echo $view_patient_services->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Department->Visible) { // Department ?>
		<td data-name="Department">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Department" class="form-group view_patient_services_Department">
<input type="text" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Department->EditValue ?>"<?php echo $view_patient_services->Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Department" class="form-group view_patient_services_Department">
<span<?php echo $view_patient_services->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Department->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrSharePres" class="form-group view_patient_services_DrSharePres">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrSharePres->EditValue ?>"<?php echo $view_patient_services->DrSharePres->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrSharePres" class="form-group view_patient_services_DrSharePres">
<span<?php echo $view_patient_services->DrSharePres->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrSharePres->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services->DrSharePres->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services->DrSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_HospSharePres" class="form-group view_patient_services_HospSharePres">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospSharePres->EditValue ?>"<?php echo $view_patient_services->HospSharePres->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_HospSharePres" class="form-group view_patient_services_HospSharePres">
<span<?php echo $view_patient_services->HospSharePres->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->HospSharePres->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services->HospSharePres->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services->HospSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrShareAmount" class="form-group view_patient_services_DrShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareAmount->EditValue ?>"<?php echo $view_patient_services->DrShareAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrShareAmount" class="form-group view_patient_services_DrShareAmount">
<span<?php echo $view_patient_services->DrShareAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrShareAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_HospShareAmount" class="form-group view_patient_services_HospShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->HospShareAmount->EditValue ?>"<?php echo $view_patient_services->HospShareAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_HospShareAmount" class="form-group view_patient_services_HospShareAmount">
<span<?php echo $view_patient_services->HospShareAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->HospShareAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services->HospShareAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettiledAmount" class="form-group view_patient_services_DrShareSettiledAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettiledAmount" class="form-group view_patient_services_DrShareSettiledAmount">
<span<?php echo $view_patient_services->DrShareSettiledAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrShareSettiledAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettledId" class="form-group view_patient_services_DrShareSettledId">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services->DrShareSettledId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettledId" class="form-group view_patient_services_DrShareSettledId">
<span<?php echo $view_patient_services->DrShareSettledId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrShareSettledId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services->DrShareSettledId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettiledStatus" class="form-group view_patient_services_DrShareSettiledStatus">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettiledStatus" class="form-group view_patient_services_DrShareSettiledStatus">
<span<?php echo $view_patient_services->DrShareSettiledStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DrShareSettiledStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services->DrShareSettiledStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_invoiceId" class="form-group view_patient_services_invoiceId">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceId->EditValue ?>"<?php echo $view_patient_services->invoiceId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_invoiceId" class="form-group view_patient_services_invoiceId">
<span<?php echo $view_patient_services->invoiceId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->invoiceId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services->invoiceId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_invoiceAmount" class="form-group view_patient_services_invoiceAmount">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceAmount->EditValue ?>"<?php echo $view_patient_services->invoiceAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_invoiceAmount" class="form-group view_patient_services_invoiceAmount">
<span<?php echo $view_patient_services->invoiceAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->invoiceAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services->invoiceAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services->invoiceAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_invoiceStatus" class="form-group view_patient_services_invoiceStatus">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->invoiceStatus->EditValue ?>"<?php echo $view_patient_services->invoiceStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_invoiceStatus" class="form-group view_patient_services_invoiceStatus">
<span<?php echo $view_patient_services->invoiceStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->invoiceStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services->invoiceStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services->invoiceStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_modeOfPayment" class="form-group view_patient_services_modeOfPayment">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->modeOfPayment->EditValue ?>"<?php echo $view_patient_services->modeOfPayment->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_modeOfPayment" class="form-group view_patient_services_modeOfPayment">
<span<?php echo $view_patient_services->modeOfPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->modeOfPayment->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services->modeOfPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services->modeOfPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_HospID" class="form-group view_patient_services_HospID">
<span<?php echo $view_patient_services->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_RIDNO" class="form-group view_patient_services_RIDNO">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RIDNO->EditValue ?>"<?php echo $view_patient_services->RIDNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_RIDNO" class="form-group view_patient_services_RIDNO">
<span<?php echo $view_patient_services->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ItemCode" class="form-group view_patient_services_ItemCode">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ItemCode->EditValue ?>"<?php echo $view_patient_services->ItemCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ItemCode" class="form-group view_patient_services_ItemCode">
<span<?php echo $view_patient_services->ItemCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->ItemCode->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_TidNo" class="form-group view_patient_services_TidNo">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TidNo->EditValue ?>"<?php echo $view_patient_services->TidNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_TidNo" class="form-group view_patient_services_TidNo">
<span<?php echo $view_patient_services->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->sid->Visible) { // sid ?>
		<td data-name="sid">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_sid" class="form-group view_patient_services_sid">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->sid->EditValue ?>"<?php echo $view_patient_services->sid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_sid" class="form-group view_patient_services_sid">
<span<?php echo $view_patient_services->sid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->sid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services->sid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_TestSubCd" class="form-group view_patient_services_TestSubCd">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestSubCd->EditValue ?>"<?php echo $view_patient_services->TestSubCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_TestSubCd" class="form-group view_patient_services_TestSubCd">
<span<?php echo $view_patient_services->TestSubCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->TestSubCd->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services->TestSubCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DEptCd" class="form-group view_patient_services_DEptCd">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DEptCd->EditValue ?>"<?php echo $view_patient_services->DEptCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DEptCd" class="form-group view_patient_services_DEptCd">
<span<?php echo $view_patient_services->DEptCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DEptCd->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ProfCd" class="form-group view_patient_services_ProfCd">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ProfCd->EditValue ?>"<?php echo $view_patient_services->ProfCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ProfCd" class="form-group view_patient_services_ProfCd">
<span<?php echo $view_patient_services->ProfCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->ProfCd->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services->ProfCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services->ProfCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Comments->Visible) { // Comments ?>
		<td data-name="Comments">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Comments" class="form-group view_patient_services_Comments">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Comments->EditValue ?>"<?php echo $view_patient_services->Comments->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Comments" class="form-group view_patient_services_Comments">
<span<?php echo $view_patient_services->Comments->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Comments->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services->Comments->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services->Comments->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Method->Visible) { // Method ?>
		<td data-name="Method">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Method" class="form-group view_patient_services_Method">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Method->EditValue ?>"<?php echo $view_patient_services->Method->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Method" class="form-group view_patient_services_Method">
<span<?php echo $view_patient_services->Method->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Method->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Specimen" class="form-group view_patient_services_Specimen">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Specimen->EditValue ?>"<?php echo $view_patient_services->Specimen->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Specimen" class="form-group view_patient_services_Specimen">
<span<?php echo $view_patient_services->Specimen->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Specimen->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services->Specimen->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services->Specimen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Abnormal" class="form-group view_patient_services_Abnormal">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Abnormal->EditValue ?>"<?php echo $view_patient_services->Abnormal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Abnormal" class="form-group view_patient_services_Abnormal">
<span<?php echo $view_patient_services->Abnormal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Abnormal->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services->Abnormal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services->Abnormal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_TestUnit" class="form-group view_patient_services_TestUnit">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestUnit->EditValue ?>"<?php echo $view_patient_services->TestUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_TestUnit" class="form-group view_patient_services_TestUnit">
<span<?php echo $view_patient_services->TestUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->TestUnit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services->TestUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_LOWHIGH" class="form-group view_patient_services_LOWHIGH">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->LOWHIGH->EditValue ?>"<?php echo $view_patient_services->LOWHIGH->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_LOWHIGH" class="form-group view_patient_services_LOWHIGH">
<span<?php echo $view_patient_services->LOWHIGH->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->LOWHIGH->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services->LOWHIGH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services->LOWHIGH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Branch->Visible) { // Branch ?>
		<td data-name="Branch">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Branch" class="form-group view_patient_services_Branch">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Branch->EditValue ?>"<?php echo $view_patient_services->Branch->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Branch" class="form-group view_patient_services_Branch">
<span<?php echo $view_patient_services->Branch->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Branch->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services->Branch->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services->Branch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Dispatch" class="form-group view_patient_services_Dispatch">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Dispatch->EditValue ?>"<?php echo $view_patient_services->Dispatch->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Dispatch" class="form-group view_patient_services_Dispatch">
<span<?php echo $view_patient_services->Dispatch->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Dispatch->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services->Dispatch->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services->Dispatch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Pic1" class="form-group view_patient_services_Pic1">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic1->EditValue ?>"<?php echo $view_patient_services->Pic1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Pic1" class="form-group view_patient_services_Pic1">
<span<?php echo $view_patient_services->Pic1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Pic1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services->Pic1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Pic2" class="form-group view_patient_services_Pic2">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Pic2->EditValue ?>"<?php echo $view_patient_services->Pic2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Pic2" class="form-group view_patient_services_Pic2">
<span<?php echo $view_patient_services->Pic2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Pic2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services->Pic2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_GraphPath" class="form-group view_patient_services_GraphPath">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->GraphPath->EditValue ?>"<?php echo $view_patient_services->GraphPath->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_GraphPath" class="form-group view_patient_services_GraphPath">
<span<?php echo $view_patient_services->GraphPath->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->GraphPath->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services->GraphPath->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services->GraphPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_MachineCD" class="form-group view_patient_services_MachineCD">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->MachineCD->EditValue ?>"<?php echo $view_patient_services->MachineCD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_MachineCD" class="form-group view_patient_services_MachineCD">
<span<?php echo $view_patient_services->MachineCD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->MachineCD->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services->MachineCD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services->MachineCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_TestCancel" class="form-group view_patient_services_TestCancel">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestCancel->EditValue ?>"<?php echo $view_patient_services->TestCancel->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_TestCancel" class="form-group view_patient_services_TestCancel">
<span<?php echo $view_patient_services->TestCancel->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->TestCancel->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services->TestCancel->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services->TestCancel->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_OutSource" class="form-group view_patient_services_OutSource">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->OutSource->EditValue ?>"<?php echo $view_patient_services->OutSource->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_OutSource" class="form-group view_patient_services_OutSource">
<span<?php echo $view_patient_services->OutSource->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->OutSource->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services->OutSource->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services->OutSource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Printed->Visible) { // Printed ?>
		<td data-name="Printed">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Printed" class="form-group view_patient_services_Printed">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Printed->EditValue ?>"<?php echo $view_patient_services->Printed->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Printed" class="form-group view_patient_services_Printed">
<span<?php echo $view_patient_services->Printed->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Printed->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services->Printed->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services->Printed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_PrintBy" class="form-group view_patient_services_PrintBy">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintBy->EditValue ?>"<?php echo $view_patient_services->PrintBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_PrintBy" class="form-group view_patient_services_PrintBy">
<span<?php echo $view_patient_services->PrintBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->PrintBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services->PrintBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services->PrintBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_PrintDate" class="form-group view_patient_services_PrintDate">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PrintDate->EditValue ?>"<?php echo $view_patient_services->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services->PrintDate->ReadOnly && !$view_patient_services->PrintDate->Disabled && !isset($view_patient_services->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_PrintDate" class="form-group view_patient_services_PrintDate">
<span<?php echo $view_patient_services->PrintDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->PrintDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services->PrintDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services->PrintDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_BillingDate" class="form-group view_patient_services_BillingDate">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillingDate->EditValue ?>"<?php echo $view_patient_services->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services->BillingDate->ReadOnly && !$view_patient_services->BillingDate->Disabled && !isset($view_patient_services->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services->BillingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_BillingDate" class="form-group view_patient_services_BillingDate">
<span<?php echo $view_patient_services->BillingDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->BillingDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services->BillingDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services->BillingDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_BilledBy" class="form-group view_patient_services_BilledBy">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BilledBy->EditValue ?>"<?php echo $view_patient_services->BilledBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_BilledBy" class="form-group view_patient_services_BilledBy">
<span<?php echo $view_patient_services->BilledBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->BilledBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services->BilledBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services->BilledBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Resulted" class="form-group view_patient_services_Resulted">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Resulted->EditValue ?>"<?php echo $view_patient_services->Resulted->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Resulted" class="form-group view_patient_services_Resulted">
<span<?php echo $view_patient_services->Resulted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Resulted->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services->Resulted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ResultDate" class="form-group view_patient_services_ResultDate">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultDate->EditValue ?>"<?php echo $view_patient_services->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services->ResultDate->ReadOnly && !$view_patient_services->ResultDate->Disabled && !isset($view_patient_services->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ResultDate" class="form-group view_patient_services_ResultDate">
<span<?php echo $view_patient_services->ResultDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->ResultDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ResultedBy" class="form-group view_patient_services_ResultedBy">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResultedBy->EditValue ?>"<?php echo $view_patient_services->ResultedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ResultedBy" class="form-group view_patient_services_ResultedBy">
<span<?php echo $view_patient_services->ResultedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->ResultedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SampleDate" class="form-group view_patient_services_SampleDate">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleDate->EditValue ?>"<?php echo $view_patient_services->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services->SampleDate->ReadOnly && !$view_patient_services->SampleDate->Disabled && !isset($view_patient_services->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SampleDate" class="form-group view_patient_services_SampleDate">
<span<?php echo $view_patient_services->SampleDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->SampleDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services->SampleDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services->SampleDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SampleUser" class="form-group view_patient_services_SampleUser">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SampleUser->EditValue ?>"<?php echo $view_patient_services->SampleUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SampleUser" class="form-group view_patient_services_SampleUser">
<span<?php echo $view_patient_services->SampleUser->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->SampleUser->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services->SampleUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services->SampleUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Sampled" class="form-group view_patient_services_Sampled">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sampled->EditValue ?>"<?php echo $view_patient_services->Sampled->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Sampled" class="form-group view_patient_services_Sampled">
<span<?php echo $view_patient_services->Sampled->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Sampled->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services->Sampled->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services->Sampled->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ReceivedDate" class="form-group view_patient_services_ReceivedDate">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedDate->EditValue ?>"<?php echo $view_patient_services->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services->ReceivedDate->ReadOnly && !$view_patient_services->ReceivedDate->Disabled && !isset($view_patient_services->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ReceivedDate" class="form-group view_patient_services_ReceivedDate">
<span<?php echo $view_patient_services->ReceivedDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->ReceivedDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services->ReceivedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services->ReceivedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ReceivedUser" class="form-group view_patient_services_ReceivedUser">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ReceivedUser->EditValue ?>"<?php echo $view_patient_services->ReceivedUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ReceivedUser" class="form-group view_patient_services_ReceivedUser">
<span<?php echo $view_patient_services->ReceivedUser->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->ReceivedUser->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services->ReceivedUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services->ReceivedUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Recevied" class="form-group view_patient_services_Recevied">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Recevied->EditValue ?>"<?php echo $view_patient_services->Recevied->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Recevied" class="form-group view_patient_services_Recevied">
<span<?php echo $view_patient_services->Recevied->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Recevied->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services->Recevied->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services->Recevied->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DeptRecvDate" class="form-group view_patient_services_DeptRecvDate">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services->DeptRecvDate->ReadOnly && !$view_patient_services->DeptRecvDate->Disabled && !isset($view_patient_services->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DeptRecvDate" class="form-group view_patient_services_DeptRecvDate">
<span<?php echo $view_patient_services->DeptRecvDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DeptRecvDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services->DeptRecvDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DeptRecvUser" class="form-group view_patient_services_DeptRecvUser">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services->DeptRecvUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DeptRecvUser" class="form-group view_patient_services_DeptRecvUser">
<span<?php echo $view_patient_services->DeptRecvUser->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DeptRecvUser->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services->DeptRecvUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DeptRecived" class="form-group view_patient_services_DeptRecived">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->DeptRecived->EditValue ?>"<?php echo $view_patient_services->DeptRecived->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DeptRecived" class="form-group view_patient_services_DeptRecived">
<span<?php echo $view_patient_services->DeptRecived->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->DeptRecived->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services->DeptRecived->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services->DeptRecived->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SAuthDate" class="form-group view_patient_services_SAuthDate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthDate->EditValue ?>"<?php echo $view_patient_services->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->SAuthDate->ReadOnly && !$view_patient_services->SAuthDate->Disabled && !isset($view_patient_services->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SAuthDate" class="form-group view_patient_services_SAuthDate">
<span<?php echo $view_patient_services->SAuthDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->SAuthDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services->SAuthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services->SAuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SAuthBy" class="form-group view_patient_services_SAuthBy">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthBy->EditValue ?>"<?php echo $view_patient_services->SAuthBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SAuthBy" class="form-group view_patient_services_SAuthBy">
<span<?php echo $view_patient_services->SAuthBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->SAuthBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services->SAuthBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services->SAuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SAuthendicate" class="form-group view_patient_services_SAuthendicate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->SAuthendicate->EditValue ?>"<?php echo $view_patient_services->SAuthendicate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SAuthendicate" class="form-group view_patient_services_SAuthendicate">
<span<?php echo $view_patient_services->SAuthendicate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->SAuthendicate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services->SAuthendicate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services->SAuthendicate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_AuthDate" class="form-group view_patient_services_AuthDate">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthDate->EditValue ?>"<?php echo $view_patient_services->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services->AuthDate->ReadOnly && !$view_patient_services->AuthDate->Disabled && !isset($view_patient_services->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_AuthDate" class="form-group view_patient_services_AuthDate">
<span<?php echo $view_patient_services->AuthDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->AuthDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services->AuthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services->AuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_AuthBy" class="form-group view_patient_services_AuthBy">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->AuthBy->EditValue ?>"<?php echo $view_patient_services->AuthBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_AuthBy" class="form-group view_patient_services_AuthBy">
<span<?php echo $view_patient_services->AuthBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->AuthBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services->AuthBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services->AuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Authencate" class="form-group view_patient_services_Authencate">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Authencate->EditValue ?>"<?php echo $view_patient_services->Authencate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Authencate" class="form-group view_patient_services_Authencate">
<span<?php echo $view_patient_services->Authencate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Authencate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services->Authencate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services->Authencate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_EditDate" class="form-group view_patient_services_EditDate">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditDate->EditValue ?>"<?php echo $view_patient_services->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services->EditDate->ReadOnly && !$view_patient_services->EditDate->Disabled && !isset($view_patient_services->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_EditDate" class="form-group view_patient_services_EditDate">
<span<?php echo $view_patient_services->EditDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->EditDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services->EditDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services->EditDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_EditBy" class="form-group view_patient_services_EditBy">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->EditBy->EditValue ?>"<?php echo $view_patient_services->EditBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_EditBy" class="form-group view_patient_services_EditBy">
<span<?php echo $view_patient_services->EditBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->EditBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services->EditBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services->EditBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Editted->Visible) { // Editted ?>
		<td data-name="Editted">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Editted" class="form-group view_patient_services_Editted">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Editted->EditValue ?>"<?php echo $view_patient_services->Editted->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Editted" class="form-group view_patient_services_Editted">
<span<?php echo $view_patient_services->Editted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Editted->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services->Editted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services->Editted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_PatID" class="form-group view_patient_services_PatID">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatID->EditValue ?>"<?php echo $view_patient_services->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_PatID" class="form-group view_patient_services_PatID">
<span<?php echo $view_patient_services->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_PatientId" class="form-group view_patient_services_PatientId">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->PatientId->EditValue ?>"<?php echo $view_patient_services->PatientId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_PatientId" class="form-group view_patient_services_PatientId">
<span<?php echo $view_patient_services->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Mobile" class="form-group view_patient_services_Mobile">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Mobile->EditValue ?>"<?php echo $view_patient_services->Mobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Mobile" class="form-group view_patient_services_Mobile">
<span<?php echo $view_patient_services->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Mobile->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services->Mobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->CId->Visible) { // CId ?>
		<td data-name="CId">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_CId" class="form-group view_patient_services_CId">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CId->EditValue ?>"<?php echo $view_patient_services->CId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_CId" class="form-group view_patient_services_CId">
<span<?php echo $view_patient_services->CId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->CId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services->CId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services->CId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Order->Visible) { // Order ?>
		<td data-name="Order">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Order" class="form-group view_patient_services_Order">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Order->EditValue ?>"<?php echo $view_patient_services->Order->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Order" class="form-group view_patient_services_Order">
<span<?php echo $view_patient_services->Order->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Order->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ResType" class="form-group view_patient_services_ResType">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->ResType->EditValue ?>"<?php echo $view_patient_services->ResType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ResType" class="form-group view_patient_services_ResType">
<span<?php echo $view_patient_services->ResType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->ResType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services->ResType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Sample" class="form-group view_patient_services_Sample">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Sample->EditValue ?>"<?php echo $view_patient_services->Sample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Sample" class="form-group view_patient_services_Sample">
<span<?php echo $view_patient_services->Sample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Sample->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services->Sample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_NoD" class="form-group view_patient_services_NoD">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->NoD->EditValue ?>"<?php echo $view_patient_services->NoD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_NoD" class="form-group view_patient_services_NoD">
<span<?php echo $view_patient_services->NoD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->NoD->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services->NoD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_BillOrder" class="form-group view_patient_services_BillOrder">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->BillOrder->EditValue ?>"<?php echo $view_patient_services->BillOrder->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_BillOrder" class="form-group view_patient_services_BillOrder">
<span<?php echo $view_patient_services->BillOrder->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->BillOrder->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services->BillOrder->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Inactive" class="form-group view_patient_services_Inactive">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Inactive->EditValue ?>"<?php echo $view_patient_services->Inactive->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Inactive" class="form-group view_patient_services_Inactive">
<span<?php echo $view_patient_services->Inactive->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Inactive->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services->Inactive->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_CollSample" class="form-group view_patient_services_CollSample">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->CollSample->EditValue ?>"<?php echo $view_patient_services->CollSample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_CollSample" class="form-group view_patient_services_CollSample">
<span<?php echo $view_patient_services->CollSample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->CollSample->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services->CollSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_TestType" class="form-group view_patient_services_TestType">
<input type="text" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->TestType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->TestType->EditValue ?>"<?php echo $view_patient_services->TestType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_TestType" class="form-group view_patient_services_TestType">
<span<?php echo $view_patient_services->TestType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->TestType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Repeated" class="form-group view_patient_services_Repeated">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Repeated->EditValue ?>"<?php echo $view_patient_services->Repeated->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Repeated" class="form-group view_patient_services_Repeated">
<span<?php echo $view_patient_services->Repeated->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Repeated->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services->Repeated->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_RepeatedBy" class="form-group view_patient_services_RepeatedBy">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedBy->EditValue ?>"<?php echo $view_patient_services->RepeatedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_RepeatedBy" class="form-group view_patient_services_RepeatedBy">
<span<?php echo $view_patient_services->RepeatedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->RepeatedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services->RepeatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services->RepeatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_RepeatedDate" class="form-group view_patient_services_RepeatedDate">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RepeatedDate->EditValue ?>"<?php echo $view_patient_services->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services->RepeatedDate->ReadOnly && !$view_patient_services->RepeatedDate->Disabled && !isset($view_patient_services->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_RepeatedDate" class="form-group view_patient_services_RepeatedDate">
<span<?php echo $view_patient_services->RepeatedDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->RepeatedDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services->RepeatedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services->RepeatedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_serviceID" class="form-group view_patient_services_serviceID">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->serviceID->EditValue ?>"<?php echo $view_patient_services->serviceID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_serviceID" class="form-group view_patient_services_serviceID">
<span<?php echo $view_patient_services->serviceID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->serviceID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services->serviceID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services->serviceID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Service_Type" class="form-group view_patient_services_Service_Type">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Type->EditValue ?>"<?php echo $view_patient_services->Service_Type->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Service_Type" class="form-group view_patient_services_Service_Type">
<span<?php echo $view_patient_services->Service_Type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Service_Type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services->Service_Type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services->Service_Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Service_Department" class="form-group view_patient_services_Service_Department">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->Service_Department->EditValue ?>"<?php echo $view_patient_services->Service_Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Service_Department" class="form-group view_patient_services_Service_Department">
<span<?php echo $view_patient_services->Service_Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->Service_Department->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services->Service_Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services->Service_Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_RequestNo" class="form-group view_patient_services_RequestNo">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services->RequestNo->EditValue ?>"<?php echo $view_patient_services->RequestNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_RequestNo" class="form-group view_patient_services_RequestNo">
<span<?php echo $view_patient_services->RequestNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_services->RequestNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services->RequestNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services->RequestNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_services_grid->ListOptions->render("body", "right", $view_patient_services_grid->RowIndex);
?>
<script>
fview_patient_servicesgrid.updateLists(<?php echo $view_patient_services_grid->RowIndex ?>);
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
$view_patient_services_grid->renderRow();
?>
<?php if ($view_patient_services_grid->TotalRecs > 0 && $view_patient_services->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_patient_services_grid->renderListOptions();

// Render list options (footer, left)
$view_patient_services_grid->ListOptions->render("footer", "left");
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
$view_patient_services_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php if ($view_patient_services->CurrentMode == "add" || $view_patient_services->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_patient_services_grid->FormKeyCountName ?>" id="<?php echo $view_patient_services_grid->FormKeyCountName ?>" value="<?php echo $view_patient_services_grid->KeyCount ?>">
<?php echo $view_patient_services_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_patient_services->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_patient_services_grid->FormKeyCountName ?>" id="<?php echo $view_patient_services_grid->FormKeyCountName ?>" value="<?php echo $view_patient_services_grid->KeyCount ?>">
<?php echo $view_patient_services_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_patient_services->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_patient_servicesgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_patient_services_grid->Recordset)
	$view_patient_services_grid->Recordset->Close();
?>
</div>
<?php if ($view_patient_services_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_patient_services_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_patient_services_grid->TotalRecs == 0 && !$view_patient_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_patient_services_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_patient_services_grid->terminate();
?>
<?php if (!$view_patient_services->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_patient_services", "95%", "");
</script>
<?php } ?>