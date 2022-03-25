<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$view_patient_services_grid->isExport()) { ?>
<script>
var fview_patient_servicesgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fview_patient_servicesgrid = new ew.Form("fview_patient_servicesgrid", "grid");
	fview_patient_servicesgrid.formKeyCountName = '<?php echo $view_patient_services_grid->FormKeyCountName ?>';

	// Validate form
	fview_patient_servicesgrid.validate = function() {
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
			<?php if ($view_patient_services_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->id->caption(), $view_patient_services_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Reception->caption(), $view_patient_services_grid->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->mrnno->caption(), $view_patient_services_grid->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->PatientName->caption(), $view_patient_services_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Age->caption(), $view_patient_services_grid->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Gender->caption(), $view_patient_services_grid->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->profilePic->caption(), $view_patient_services_grid->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Services->Required) { ?>
				elm = this.getElements("x" + infix + "_Services");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Services->caption(), $view_patient_services_grid->Services->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Unit->caption(), $view_patient_services_grid->Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->Unit->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->amount->caption(), $view_patient_services_grid->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->amount->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Quantity->caption(), $view_patient_services_grid->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->Quantity->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->DiscountCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DiscountCategory->caption(), $view_patient_services_grid->DiscountCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Discount->caption(), $view_patient_services_grid->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->Discount->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->SubTotal->Required) { ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->SubTotal->caption(), $view_patient_services_grid->SubTotal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->SubTotal->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->description->caption(), $view_patient_services_grid->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->patient_type->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->patient_type->caption(), $view_patient_services_grid->patient_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->charged_date->caption(), $view_patient_services_grid->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->status->caption(), $view_patient_services_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->createdby->caption(), $view_patient_services_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->createddatetime->caption(), $view_patient_services_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->modifiedby->caption(), $view_patient_services_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->modifieddatetime->caption(), $view_patient_services_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Aid->Required) { ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Aid->caption(), $view_patient_services_grid->Aid->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Vid->Required) { ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Vid->caption(), $view_patient_services_grid->Vid->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DrID->caption(), $view_patient_services_grid->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->DrCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_DrCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DrCODE->caption(), $view_patient_services_grid->DrCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->DrName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DrName->caption(), $view_patient_services_grid->DrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Department->caption(), $view_patient_services_grid->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->DrSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DrSharePres->caption(), $view_patient_services_grid->DrSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->DrSharePres->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->HospSharePres->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->HospSharePres->caption(), $view_patient_services_grid->HospSharePres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePres");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->HospSharePres->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DrShareAmount->caption(), $view_patient_services_grid->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->DrShareAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->HospShareAmount->caption(), $view_patient_services_grid->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->HospShareAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->DrShareSettiledAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DrShareSettiledAmount->caption(), $view_patient_services_grid->DrShareSettiledAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->DrShareSettiledAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->DrShareSettledId->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DrShareSettledId->caption(), $view_patient_services_grid->DrShareSettledId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettledId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->DrShareSettledId->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->DrShareSettiledStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DrShareSettiledStatus->caption(), $view_patient_services_grid->DrShareSettiledStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareSettiledStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->DrShareSettiledStatus->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->invoiceId->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->invoiceId->caption(), $view_patient_services_grid->invoiceId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->invoiceId->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->invoiceAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->invoiceAmount->caption(), $view_patient_services_grid->invoiceAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->invoiceAmount->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->invoiceStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->invoiceStatus->caption(), $view_patient_services_grid->invoiceStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->modeOfPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_modeOfPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->modeOfPayment->caption(), $view_patient_services_grid->modeOfPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->HospID->caption(), $view_patient_services_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->RIDNO->caption(), $view_patient_services_grid->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->RIDNO->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->ItemCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->ItemCode->caption(), $view_patient_services_grid->ItemCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->TidNo->caption(), $view_patient_services_grid->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->TidNo->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->sid->Required) { ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->sid->caption(), $view_patient_services_grid->sid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->sid->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->TestSubCd->caption(), $view_patient_services_grid->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->DEptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DEptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DEptCd->caption(), $view_patient_services_grid->DEptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->ProfCd->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->ProfCd->caption(), $view_patient_services_grid->ProfCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Comments->Required) { ?>
				elm = this.getElements("x" + infix + "_Comments");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Comments->caption(), $view_patient_services_grid->Comments->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Method->caption(), $view_patient_services_grid->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Specimen->Required) { ?>
				elm = this.getElements("x" + infix + "_Specimen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Specimen->caption(), $view_patient_services_grid->Specimen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Abnormal->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Abnormal->caption(), $view_patient_services_grid->Abnormal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->TestUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_TestUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->TestUnit->caption(), $view_patient_services_grid->TestUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->LOWHIGH->Required) { ?>
				elm = this.getElements("x" + infix + "_LOWHIGH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->LOWHIGH->caption(), $view_patient_services_grid->LOWHIGH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Branch->Required) { ?>
				elm = this.getElements("x" + infix + "_Branch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Branch->caption(), $view_patient_services_grid->Branch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Dispatch->Required) { ?>
				elm = this.getElements("x" + infix + "_Dispatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Dispatch->caption(), $view_patient_services_grid->Dispatch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Pic1->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Pic1->caption(), $view_patient_services_grid->Pic1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Pic2->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Pic2->caption(), $view_patient_services_grid->Pic2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->GraphPath->Required) { ?>
				elm = this.getElements("x" + infix + "_GraphPath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->GraphPath->caption(), $view_patient_services_grid->GraphPath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->MachineCD->Required) { ?>
				elm = this.getElements("x" + infix + "_MachineCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->MachineCD->caption(), $view_patient_services_grid->MachineCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->TestCancel->Required) { ?>
				elm = this.getElements("x" + infix + "_TestCancel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->TestCancel->caption(), $view_patient_services_grid->TestCancel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->OutSource->Required) { ?>
				elm = this.getElements("x" + infix + "_OutSource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->OutSource->caption(), $view_patient_services_grid->OutSource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Printed->Required) { ?>
				elm = this.getElements("x" + infix + "_Printed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Printed->caption(), $view_patient_services_grid->Printed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->PrintBy->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->PrintBy->caption(), $view_patient_services_grid->PrintBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->PrintDate->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->PrintDate->caption(), $view_patient_services_grid->PrintDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->PrintDate->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->BillingDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->BillingDate->caption(), $view_patient_services_grid->BillingDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillingDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->BillingDate->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->BilledBy->Required) { ?>
				elm = this.getElements("x" + infix + "_BilledBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->BilledBy->caption(), $view_patient_services_grid->BilledBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Resulted->Required) { ?>
				elm = this.getElements("x" + infix + "_Resulted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Resulted->caption(), $view_patient_services_grid->Resulted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->ResultDate->caption(), $view_patient_services_grid->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->ResultDate->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->ResultedBy->caption(), $view_patient_services_grid->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->SampleDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->SampleDate->caption(), $view_patient_services_grid->SampleDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->SampleDate->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->SampleUser->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->SampleUser->caption(), $view_patient_services_grid->SampleUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Sampled->Required) { ?>
				elm = this.getElements("x" + infix + "_Sampled");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Sampled->caption(), $view_patient_services_grid->Sampled->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->ReceivedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->ReceivedDate->caption(), $view_patient_services_grid->ReceivedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->ReceivedDate->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->ReceivedUser->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->ReceivedUser->caption(), $view_patient_services_grid->ReceivedUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Recevied->Required) { ?>
				elm = this.getElements("x" + infix + "_Recevied");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Recevied->caption(), $view_patient_services_grid->Recevied->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->DeptRecvDate->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DeptRecvDate->caption(), $view_patient_services_grid->DeptRecvDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->DeptRecvDate->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->DeptRecvUser->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DeptRecvUser->caption(), $view_patient_services_grid->DeptRecvUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->DeptRecived->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecived");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->DeptRecived->caption(), $view_patient_services_grid->DeptRecived->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->SAuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->SAuthDate->caption(), $view_patient_services_grid->SAuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->SAuthDate->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->SAuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->SAuthBy->caption(), $view_patient_services_grid->SAuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->SAuthendicate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthendicate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->SAuthendicate->caption(), $view_patient_services_grid->SAuthendicate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->AuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->AuthDate->caption(), $view_patient_services_grid->AuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->AuthDate->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->AuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->AuthBy->caption(), $view_patient_services_grid->AuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Authencate->Required) { ?>
				elm = this.getElements("x" + infix + "_Authencate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Authencate->caption(), $view_patient_services_grid->Authencate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->EditDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->EditDate->caption(), $view_patient_services_grid->EditDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->EditDate->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->EditBy->Required) { ?>
				elm = this.getElements("x" + infix + "_EditBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->EditBy->caption(), $view_patient_services_grid->EditBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Editted->Required) { ?>
				elm = this.getElements("x" + infix + "_Editted");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Editted->caption(), $view_patient_services_grid->Editted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->PatID->caption(), $view_patient_services_grid->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->PatID->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->PatientId->caption(), $view_patient_services_grid->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Mobile->caption(), $view_patient_services_grid->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->CId->caption(), $view_patient_services_grid->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->CId->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Order->caption(), $view_patient_services_grid->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->Order->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->ResType->caption(), $view_patient_services_grid->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Sample->caption(), $view_patient_services_grid->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->NoD->caption(), $view_patient_services_grid->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->NoD->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->BillOrder->caption(), $view_patient_services_grid->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->BillOrder->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Inactive->caption(), $view_patient_services_grid->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->CollSample->caption(), $view_patient_services_grid->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->TestType->caption(), $view_patient_services_grid->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Repeated->Required) { ?>
				elm = this.getElements("x" + infix + "_Repeated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Repeated->caption(), $view_patient_services_grid->Repeated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->RepeatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->RepeatedBy->caption(), $view_patient_services_grid->RepeatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->RepeatedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->RepeatedDate->caption(), $view_patient_services_grid->RepeatedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RepeatedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->RepeatedDate->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->serviceID->Required) { ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->serviceID->caption(), $view_patient_services_grid->serviceID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_serviceID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->serviceID->errorMessage()) ?>");
			<?php if ($view_patient_services_grid->Service_Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Service_Type->caption(), $view_patient_services_grid->Service_Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->Service_Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Service_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->Service_Department->caption(), $view_patient_services_grid->Service_Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_patient_services_grid->RequestNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_services_grid->RequestNo->caption(), $view_patient_services_grid->RequestNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RequestNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_patient_services_grid->RequestNo->errorMessage()) ?>");

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fview_patient_servicesgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_patient_servicesgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_patient_servicesgrid.lists["x_Services"] = <?php echo $view_patient_services_grid->Services->Lookup->toClientList($view_patient_services_grid) ?>;
	fview_patient_servicesgrid.lists["x_Services"].options = <?php echo JsonEncode($view_patient_services_grid->Services->lookupOptions()) ?>;
	fview_patient_servicesgrid.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_patient_servicesgrid.lists["x_DiscountCategory"] = <?php echo $view_patient_services_grid->DiscountCategory->Lookup->toClientList($view_patient_services_grid) ?>;
	fview_patient_servicesgrid.lists["x_DiscountCategory"].options = <?php echo JsonEncode($view_patient_services_grid->DiscountCategory->lookupOptions()) ?>;
	loadjs.done("fview_patient_servicesgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$view_patient_services_grid->renderOtherOptions();
?>
<?php if ($view_patient_services_grid->TotalRecords > 0 || $view_patient_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_patient_services_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_services">
<?php if ($view_patient_services_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_patient_services_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_patient_servicesgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_patient_services" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_patient_servicesgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_patient_services->RowType = ROWTYPE_HEADER;

// Render list options
$view_patient_services_grid->renderListOptions();

// Render list options (header, left)
$view_patient_services_grid->ListOptions->render("header", "left");
?>
<?php if ($view_patient_services_grid->id->Visible) { // id ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_patient_services_grid->id->headerCellClass() ?>"><div id="elh_view_patient_services_id" class="view_patient_services_id"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_patient_services_grid->id->headerCellClass() ?>"><div><div id="elh_view_patient_services_id" class="view_patient_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Reception->Visible) { // Reception ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_patient_services_grid->Reception->headerCellClass() ?>"><div id="elh_view_patient_services_Reception" class="view_patient_services_Reception"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_patient_services_grid->Reception->headerCellClass() ?>"><div><div id="elh_view_patient_services_Reception" class="view_patient_services_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->mrnno->Visible) { // mrnno ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_services_grid->mrnno->headerCellClass() ?>"><div id="elh_view_patient_services_mrnno" class="view_patient_services_mrnno"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_services_grid->mrnno->headerCellClass() ?>"><div><div id="elh_view_patient_services_mrnno" class="view_patient_services_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_services_grid->PatientName->headerCellClass() ?>"><div id="elh_view_patient_services_PatientName" class="view_patient_services_PatientName"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_services_grid->PatientName->headerCellClass() ?>"><div><div id="elh_view_patient_services_PatientName" class="view_patient_services_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Age->Visible) { // Age ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_patient_services_grid->Age->headerCellClass() ?>"><div id="elh_view_patient_services_Age" class="view_patient_services_Age"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_patient_services_grid->Age->headerCellClass() ?>"><div><div id="elh_view_patient_services_Age" class="view_patient_services_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Gender->Visible) { // Gender ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_patient_services_grid->Gender->headerCellClass() ?>"><div id="elh_view_patient_services_Gender" class="view_patient_services_Gender"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_patient_services_grid->Gender->headerCellClass() ?>"><div><div id="elh_view_patient_services_Gender" class="view_patient_services_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->profilePic->Visible) { // profilePic ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_services_grid->profilePic->headerCellClass() ?>"><div id="elh_view_patient_services_profilePic" class="view_patient_services_profilePic"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_services_grid->profilePic->headerCellClass() ?>"><div><div id="elh_view_patient_services_profilePic" class="view_patient_services_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->profilePic->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->profilePic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->profilePic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Services->Visible) { // Services ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_patient_services_grid->Services->headerCellClass() ?>"><div id="elh_view_patient_services_Services" class="view_patient_services_Services"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_patient_services_grid->Services->headerCellClass() ?>"><div><div id="elh_view_patient_services_Services" class="view_patient_services_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Services->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Services->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Unit->Visible) { // Unit ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $view_patient_services_grid->Unit->headerCellClass() ?>"><div id="elh_view_patient_services_Unit" class="view_patient_services_Unit"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $view_patient_services_grid->Unit->headerCellClass() ?>"><div><div id="elh_view_patient_services_Unit" class="view_patient_services_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->amount->Visible) { // amount ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $view_patient_services_grid->amount->headerCellClass() ?>"><div id="elh_view_patient_services_amount" class="view_patient_services_amount"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $view_patient_services_grid->amount->headerCellClass() ?>"><div><div id="elh_view_patient_services_amount" class="view_patient_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Quantity->Visible) { // Quantity ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_patient_services_grid->Quantity->headerCellClass() ?>"><div id="elh_view_patient_services_Quantity" class="view_patient_services_Quantity"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_patient_services_grid->Quantity->headerCellClass() ?>"><div><div id="elh_view_patient_services_Quantity" class="view_patient_services_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DiscountCategory) == "") { ?>
		<th data-name="DiscountCategory" class="<?php echo $view_patient_services_grid->DiscountCategory->headerCellClass() ?>"><div id="elh_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DiscountCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountCategory" class="<?php echo $view_patient_services_grid->DiscountCategory->headerCellClass() ?>"><div><div id="elh_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DiscountCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DiscountCategory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DiscountCategory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Discount->Visible) { // Discount ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $view_patient_services_grid->Discount->headerCellClass() ?>"><div id="elh_view_patient_services_Discount" class="view_patient_services_Discount"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $view_patient_services_grid->Discount->headerCellClass() ?>"><div><div id="elh_view_patient_services_Discount" class="view_patient_services_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Discount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Discount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $view_patient_services_grid->SubTotal->headerCellClass() ?>"><div id="elh_view_patient_services_SubTotal" class="view_patient_services_SubTotal"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $view_patient_services_grid->SubTotal->headerCellClass() ?>"><div><div id="elh_view_patient_services_SubTotal" class="view_patient_services_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->SubTotal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->SubTotal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->description->Visible) { // description ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->description) == "") { ?>
		<th data-name="description" class="<?php echo $view_patient_services_grid->description->headerCellClass() ?>"><div id="elh_view_patient_services_description" class="view_patient_services_description"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $view_patient_services_grid->description->headerCellClass() ?>"><div><div id="elh_view_patient_services_description" class="view_patient_services_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->description->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->patient_type->Visible) { // patient_type ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $view_patient_services_grid->patient_type->headerCellClass() ?>"><div id="elh_view_patient_services_patient_type" class="view_patient_services_patient_type"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->patient_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $view_patient_services_grid->patient_type->headerCellClass() ?>"><div><div id="elh_view_patient_services_patient_type" class="view_patient_services_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->patient_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->patient_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->charged_date->Visible) { // charged_date ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $view_patient_services_grid->charged_date->headerCellClass() ?>"><div id="elh_view_patient_services_charged_date" class="view_patient_services_charged_date"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $view_patient_services_grid->charged_date->headerCellClass() ?>"><div><div id="elh_view_patient_services_charged_date" class="view_patient_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->charged_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->charged_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->status->Visible) { // status ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_patient_services_grid->status->headerCellClass() ?>"><div id="elh_view_patient_services_status" class="view_patient_services_status"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_patient_services_grid->status->headerCellClass() ?>"><div><div id="elh_view_patient_services_status" class="view_patient_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->createdby->Visible) { // createdby ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_patient_services_grid->createdby->headerCellClass() ?>"><div id="elh_view_patient_services_createdby" class="view_patient_services_createdby"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_patient_services_grid->createdby->headerCellClass() ?>"><div><div id="elh_view_patient_services_createdby" class="view_patient_services_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_services_grid->createddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_createddatetime" class="view_patient_services_createddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_services_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_view_patient_services_createddatetime" class="view_patient_services_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_services_grid->modifiedby->headerCellClass() ?>"><div id="elh_view_patient_services_modifiedby" class="view_patient_services_modifiedby"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_services_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_view_patient_services_modifiedby" class="view_patient_services_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_services_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_services_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Aid->Visible) { // Aid ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $view_patient_services_grid->Aid->headerCellClass() ?>"><div id="elh_view_patient_services_Aid" class="view_patient_services_Aid"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Aid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $view_patient_services_grid->Aid->headerCellClass() ?>"><div><div id="elh_view_patient_services_Aid" class="view_patient_services_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Aid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Aid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Vid->Visible) { // Vid ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_patient_services_grid->Vid->headerCellClass() ?>"><div id="elh_view_patient_services_Vid" class="view_patient_services_Vid"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_patient_services_grid->Vid->headerCellClass() ?>"><div><div id="elh_view_patient_services_Vid" class="view_patient_services_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Vid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Vid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DrID->Visible) { // DrID ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_patient_services_grid->DrID->headerCellClass() ?>"><div id="elh_view_patient_services_DrID" class="view_patient_services_DrID"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_patient_services_grid->DrID->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrID" class="view_patient_services_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_patient_services_grid->DrCODE->headerCellClass() ?>"><div id="elh_view_patient_services_DrCODE" class="view_patient_services_DrCODE"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_patient_services_grid->DrCODE->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrCODE" class="view_patient_services_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DrCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DrCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DrName->Visible) { // DrName ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_patient_services_grid->DrName->headerCellClass() ?>"><div id="elh_view_patient_services_DrName" class="view_patient_services_DrName"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_patient_services_grid->DrName->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrName" class="view_patient_services_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Department->Visible) { // Department ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_patient_services_grid->Department->headerCellClass() ?>"><div id="elh_view_patient_services_Department" class="view_patient_services_Department"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_patient_services_grid->Department->headerCellClass() ?>"><div><div id="elh_view_patient_services_Department" class="view_patient_services_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DrSharePres) == "") { ?>
		<th data-name="DrSharePres" class="<?php echo $view_patient_services_grid->DrSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePres" class="<?php echo $view_patient_services_grid->DrSharePres->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DrSharePres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DrSharePres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->HospSharePres) == "") { ?>
		<th data-name="HospSharePres" class="<?php echo $view_patient_services_grid->HospSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->HospSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePres" class="<?php echo $view_patient_services_grid->HospSharePres->headerCellClass() ?>"><div><div id="elh_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->HospSharePres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->HospSharePres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_patient_services_grid->DrShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_patient_services_grid->DrShareAmount->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DrShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DrShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_patient_services_grid->HospShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_patient_services_grid->HospShareAmount->headerCellClass() ?>"><div><div id="elh_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->HospShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->HospShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DrShareSettiledAmount) == "") { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services_grid->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrShareSettiledAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services_grid->DrShareSettiledAmount->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DrShareSettiledAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DrShareSettiledAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DrShareSettledId) == "") { ?>
		<th data-name="DrShareSettledId" class="<?php echo $view_patient_services_grid->DrShareSettledId->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrShareSettledId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettledId" class="<?php echo $view_patient_services_grid->DrShareSettledId->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DrShareSettledId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DrShareSettledId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DrShareSettiledStatus) == "") { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services_grid->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrShareSettiledStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services_grid->DrShareSettiledStatus->headerCellClass() ?>"><div><div id="elh_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DrShareSettiledStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DrShareSettiledStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_patient_services_grid->invoiceId->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceId" class="view_patient_services_invoiceId"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_patient_services_grid->invoiceId->headerCellClass() ?>"><div><div id="elh_view_patient_services_invoiceId" class="view_patient_services_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->invoiceId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->invoiceId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $view_patient_services_grid->invoiceAmount->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->invoiceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $view_patient_services_grid->invoiceAmount->headerCellClass() ?>"><div><div id="elh_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->invoiceAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->invoiceAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $view_patient_services_grid->invoiceStatus->headerCellClass() ?>"><div id="elh_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->invoiceStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $view_patient_services_grid->invoiceStatus->headerCellClass() ?>"><div><div id="elh_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->invoiceStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->invoiceStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->invoiceStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $view_patient_services_grid->modeOfPayment->headerCellClass() ?>"><div id="elh_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->modeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $view_patient_services_grid->modeOfPayment->headerCellClass() ?>"><div><div id="elh_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->modeOfPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->modeOfPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->modeOfPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_patient_services_grid->HospID->headerCellClass() ?>"><div id="elh_view_patient_services_HospID" class="view_patient_services_HospID"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_patient_services_grid->HospID->headerCellClass() ?>"><div><div id="elh_view_patient_services_HospID" class="view_patient_services_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_services_grid->RIDNO->headerCellClass() ?>"><div id="elh_view_patient_services_RIDNO" class="view_patient_services_RIDNO"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_services_grid->RIDNO->headerCellClass() ?>"><div><div id="elh_view_patient_services_RIDNO" class="view_patient_services_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_patient_services_grid->ItemCode->headerCellClass() ?>"><div id="elh_view_patient_services_ItemCode" class="view_patient_services_ItemCode"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_patient_services_grid->ItemCode->headerCellClass() ?>"><div><div id="elh_view_patient_services_ItemCode" class="view_patient_services_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->ItemCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->ItemCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->TidNo->Visible) { // TidNo ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_services_grid->TidNo->headerCellClass() ?>"><div id="elh_view_patient_services_TidNo" class="view_patient_services_TidNo"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_services_grid->TidNo->headerCellClass() ?>"><div><div id="elh_view_patient_services_TidNo" class="view_patient_services_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->sid->Visible) { // sid ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_patient_services_grid->sid->headerCellClass() ?>"><div id="elh_view_patient_services_sid" class="view_patient_services_sid"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_patient_services_grid->sid->headerCellClass() ?>"><div><div id="elh_view_patient_services_sid" class="view_patient_services_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->sid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->sid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $view_patient_services_grid->TestSubCd->headerCellClass() ?>"><div id="elh_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $view_patient_services_grid->TestSubCd->headerCellClass() ?>"><div><div id="elh_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->TestSubCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->TestSubCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->TestSubCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_patient_services_grid->DEptCd->headerCellClass() ?>"><div id="elh_view_patient_services_DEptCd" class="view_patient_services_DEptCd"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_patient_services_grid->DEptCd->headerCellClass() ?>"><div><div id="elh_view_patient_services_DEptCd" class="view_patient_services_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DEptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DEptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->ProfCd->Visible) { // ProfCd ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $view_patient_services_grid->ProfCd->headerCellClass() ?>"><div id="elh_view_patient_services_ProfCd" class="view_patient_services_ProfCd"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->ProfCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $view_patient_services_grid->ProfCd->headerCellClass() ?>"><div><div id="elh_view_patient_services_ProfCd" class="view_patient_services_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->ProfCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->ProfCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->ProfCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Comments->Visible) { // Comments ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $view_patient_services_grid->Comments->headerCellClass() ?>"><div id="elh_view_patient_services_Comments" class="view_patient_services_Comments"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Comments->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $view_patient_services_grid->Comments->headerCellClass() ?>"><div><div id="elh_view_patient_services_Comments" class="view_patient_services_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Comments->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Comments->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Comments->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Method->Visible) { // Method ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $view_patient_services_grid->Method->headerCellClass() ?>"><div id="elh_view_patient_services_Method" class="view_patient_services_Method"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $view_patient_services_grid->Method->headerCellClass() ?>"><div><div id="elh_view_patient_services_Method" class="view_patient_services_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Specimen->Visible) { // Specimen ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $view_patient_services_grid->Specimen->headerCellClass() ?>"><div id="elh_view_patient_services_Specimen" class="view_patient_services_Specimen"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Specimen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $view_patient_services_grid->Specimen->headerCellClass() ?>"><div><div id="elh_view_patient_services_Specimen" class="view_patient_services_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Specimen->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Specimen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Specimen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Abnormal->Visible) { // Abnormal ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $view_patient_services_grid->Abnormal->headerCellClass() ?>"><div id="elh_view_patient_services_Abnormal" class="view_patient_services_Abnormal"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $view_patient_services_grid->Abnormal->headerCellClass() ?>"><div><div id="elh_view_patient_services_Abnormal" class="view_patient_services_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Abnormal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Abnormal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Abnormal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_patient_services_grid->TestUnit->headerCellClass() ?>"><div id="elh_view_patient_services_TestUnit" class="view_patient_services_TestUnit"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_patient_services_grid->TestUnit->headerCellClass() ?>"><div><div id="elh_view_patient_services_TestUnit" class="view_patient_services_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->TestUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->TestUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $view_patient_services_grid->LOWHIGH->headerCellClass() ?>"><div id="elh_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->LOWHIGH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $view_patient_services_grid->LOWHIGH->headerCellClass() ?>"><div><div id="elh_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->LOWHIGH->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->LOWHIGH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->LOWHIGH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Branch->Visible) { // Branch ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $view_patient_services_grid->Branch->headerCellClass() ?>"><div id="elh_view_patient_services_Branch" class="view_patient_services_Branch"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Branch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $view_patient_services_grid->Branch->headerCellClass() ?>"><div><div id="elh_view_patient_services_Branch" class="view_patient_services_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Branch->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Branch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Branch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Dispatch->Visible) { // Dispatch ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $view_patient_services_grid->Dispatch->headerCellClass() ?>"><div id="elh_view_patient_services_Dispatch" class="view_patient_services_Dispatch"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Dispatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $view_patient_services_grid->Dispatch->headerCellClass() ?>"><div><div id="elh_view_patient_services_Dispatch" class="view_patient_services_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Dispatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Dispatch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Dispatch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_patient_services_grid->Pic1->headerCellClass() ?>"><div id="elh_view_patient_services_Pic1" class="view_patient_services_Pic1"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_patient_services_grid->Pic1->headerCellClass() ?>"><div><div id="elh_view_patient_services_Pic1" class="view_patient_services_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Pic1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Pic1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_patient_services_grid->Pic2->headerCellClass() ?>"><div id="elh_view_patient_services_Pic2" class="view_patient_services_Pic2"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_patient_services_grid->Pic2->headerCellClass() ?>"><div><div id="elh_view_patient_services_Pic2" class="view_patient_services_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Pic2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Pic2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->GraphPath->Visible) { // GraphPath ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $view_patient_services_grid->GraphPath->headerCellClass() ?>"><div id="elh_view_patient_services_GraphPath" class="view_patient_services_GraphPath"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->GraphPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $view_patient_services_grid->GraphPath->headerCellClass() ?>"><div><div id="elh_view_patient_services_GraphPath" class="view_patient_services_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->GraphPath->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->GraphPath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->GraphPath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->MachineCD->Visible) { // MachineCD ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $view_patient_services_grid->MachineCD->headerCellClass() ?>"><div id="elh_view_patient_services_MachineCD" class="view_patient_services_MachineCD"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->MachineCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $view_patient_services_grid->MachineCD->headerCellClass() ?>"><div><div id="elh_view_patient_services_MachineCD" class="view_patient_services_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->MachineCD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->MachineCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->MachineCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->TestCancel->Visible) { // TestCancel ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $view_patient_services_grid->TestCancel->headerCellClass() ?>"><div id="elh_view_patient_services_TestCancel" class="view_patient_services_TestCancel"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->TestCancel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $view_patient_services_grid->TestCancel->headerCellClass() ?>"><div><div id="elh_view_patient_services_TestCancel" class="view_patient_services_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->TestCancel->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->TestCancel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->TestCancel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->OutSource->Visible) { // OutSource ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $view_patient_services_grid->OutSource->headerCellClass() ?>"><div id="elh_view_patient_services_OutSource" class="view_patient_services_OutSource"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $view_patient_services_grid->OutSource->headerCellClass() ?>"><div><div id="elh_view_patient_services_OutSource" class="view_patient_services_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->OutSource->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->OutSource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->OutSource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Printed->Visible) { // Printed ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $view_patient_services_grid->Printed->headerCellClass() ?>"><div id="elh_view_patient_services_Printed" class="view_patient_services_Printed"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $view_patient_services_grid->Printed->headerCellClass() ?>"><div><div id="elh_view_patient_services_Printed" class="view_patient_services_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Printed->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Printed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Printed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->PrintBy->Visible) { // PrintBy ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $view_patient_services_grid->PrintBy->headerCellClass() ?>"><div id="elh_view_patient_services_PrintBy" class="view_patient_services_PrintBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $view_patient_services_grid->PrintBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_PrintBy" class="view_patient_services_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->PrintBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->PrintBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->PrintBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->PrintDate->Visible) { // PrintDate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $view_patient_services_grid->PrintDate->headerCellClass() ?>"><div id="elh_view_patient_services_PrintDate" class="view_patient_services_PrintDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $view_patient_services_grid->PrintDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_PrintDate" class="view_patient_services_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->PrintDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->PrintDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->BillingDate->Visible) { // BillingDate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->BillingDate) == "") { ?>
		<th data-name="BillingDate" class="<?php echo $view_patient_services_grid->BillingDate->headerCellClass() ?>"><div id="elh_view_patient_services_BillingDate" class="view_patient_services_BillingDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->BillingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillingDate" class="<?php echo $view_patient_services_grid->BillingDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_BillingDate" class="view_patient_services_BillingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->BillingDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->BillingDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->BilledBy->Visible) { // BilledBy ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->BilledBy) == "") { ?>
		<th data-name="BilledBy" class="<?php echo $view_patient_services_grid->BilledBy->headerCellClass() ?>"><div id="elh_view_patient_services_BilledBy" class="view_patient_services_BilledBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->BilledBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BilledBy" class="<?php echo $view_patient_services_grid->BilledBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_BilledBy" class="view_patient_services_BilledBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->BilledBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->BilledBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->BilledBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Resulted->Visible) { // Resulted ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_patient_services_grid->Resulted->headerCellClass() ?>"><div id="elh_view_patient_services_Resulted" class="view_patient_services_Resulted"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_patient_services_grid->Resulted->headerCellClass() ?>"><div><div id="elh_view_patient_services_Resulted" class="view_patient_services_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Resulted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Resulted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_patient_services_grid->ResultDate->headerCellClass() ?>"><div id="elh_view_patient_services_ResultDate" class="view_patient_services_ResultDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_patient_services_grid->ResultDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_ResultDate" class="view_patient_services_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_patient_services_grid->ResultedBy->headerCellClass() ?>"><div id="elh_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_patient_services_grid->ResultedBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->ResultedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->ResultedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->SampleDate->Visible) { // SampleDate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $view_patient_services_grid->SampleDate->headerCellClass() ?>"><div id="elh_view_patient_services_SampleDate" class="view_patient_services_SampleDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->SampleDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $view_patient_services_grid->SampleDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_SampleDate" class="view_patient_services_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->SampleDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->SampleDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->SampleUser->Visible) { // SampleUser ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $view_patient_services_grid->SampleUser->headerCellClass() ?>"><div id="elh_view_patient_services_SampleUser" class="view_patient_services_SampleUser"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->SampleUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $view_patient_services_grid->SampleUser->headerCellClass() ?>"><div><div id="elh_view_patient_services_SampleUser" class="view_patient_services_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->SampleUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->SampleUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->SampleUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Sampled->Visible) { // Sampled ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Sampled) == "") { ?>
		<th data-name="Sampled" class="<?php echo $view_patient_services_grid->Sampled->headerCellClass() ?>"><div id="elh_view_patient_services_Sampled" class="view_patient_services_Sampled"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Sampled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sampled" class="<?php echo $view_patient_services_grid->Sampled->headerCellClass() ?>"><div><div id="elh_view_patient_services_Sampled" class="view_patient_services_Sampled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Sampled->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Sampled->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Sampled->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $view_patient_services_grid->ReceivedDate->headerCellClass() ?>"><div id="elh_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->ReceivedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $view_patient_services_grid->ReceivedDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->ReceivedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->ReceivedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $view_patient_services_grid->ReceivedUser->headerCellClass() ?>"><div id="elh_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->ReceivedUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $view_patient_services_grid->ReceivedUser->headerCellClass() ?>"><div><div id="elh_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->ReceivedUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->ReceivedUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->ReceivedUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Recevied->Visible) { // Recevied ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Recevied) == "") { ?>
		<th data-name="Recevied" class="<?php echo $view_patient_services_grid->Recevied->headerCellClass() ?>"><div id="elh_view_patient_services_Recevied" class="view_patient_services_Recevied"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Recevied->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Recevied" class="<?php echo $view_patient_services_grid->Recevied->headerCellClass() ?>"><div><div id="elh_view_patient_services_Recevied" class="view_patient_services_Recevied">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Recevied->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Recevied->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Recevied->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $view_patient_services_grid->DeptRecvDate->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DeptRecvDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $view_patient_services_grid->DeptRecvDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DeptRecvDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DeptRecvDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $view_patient_services_grid->DeptRecvUser->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DeptRecvUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $view_patient_services_grid->DeptRecvUser->headerCellClass() ?>"><div><div id="elh_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DeptRecvUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DeptRecvUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DeptRecvUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->DeptRecived) == "") { ?>
		<th data-name="DeptRecived" class="<?php echo $view_patient_services_grid->DeptRecived->headerCellClass() ?>"><div id="elh_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->DeptRecived->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecived" class="<?php echo $view_patient_services_grid->DeptRecived->headerCellClass() ?>"><div><div id="elh_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->DeptRecived->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->DeptRecived->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->DeptRecived->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $view_patient_services_grid->SAuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->SAuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $view_patient_services_grid->SAuthDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->SAuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->SAuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $view_patient_services_grid->SAuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->SAuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $view_patient_services_grid->SAuthBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->SAuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->SAuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->SAuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->SAuthendicate) == "") { ?>
		<th data-name="SAuthendicate" class="<?php echo $view_patient_services_grid->SAuthendicate->headerCellClass() ?>"><div id="elh_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->SAuthendicate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthendicate" class="<?php echo $view_patient_services_grid->SAuthendicate->headerCellClass() ?>"><div><div id="elh_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->SAuthendicate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->SAuthendicate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->SAuthendicate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->AuthDate->Visible) { // AuthDate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $view_patient_services_grid->AuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_AuthDate" class="view_patient_services_AuthDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->AuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $view_patient_services_grid->AuthDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_AuthDate" class="view_patient_services_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->AuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->AuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->AuthBy->Visible) { // AuthBy ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $view_patient_services_grid->AuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_AuthBy" class="view_patient_services_AuthBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->AuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $view_patient_services_grid->AuthBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_AuthBy" class="view_patient_services_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->AuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->AuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->AuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Authencate->Visible) { // Authencate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Authencate) == "") { ?>
		<th data-name="Authencate" class="<?php echo $view_patient_services_grid->Authencate->headerCellClass() ?>"><div id="elh_view_patient_services_Authencate" class="view_patient_services_Authencate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Authencate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Authencate" class="<?php echo $view_patient_services_grid->Authencate->headerCellClass() ?>"><div><div id="elh_view_patient_services_Authencate" class="view_patient_services_Authencate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Authencate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Authencate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Authencate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->EditDate->Visible) { // EditDate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $view_patient_services_grid->EditDate->headerCellClass() ?>"><div id="elh_view_patient_services_EditDate" class="view_patient_services_EditDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $view_patient_services_grid->EditDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_EditDate" class="view_patient_services_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->EditDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->EditDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->EditBy->Visible) { // EditBy ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->EditBy) == "") { ?>
		<th data-name="EditBy" class="<?php echo $view_patient_services_grid->EditBy->headerCellClass() ?>"><div id="elh_view_patient_services_EditBy" class="view_patient_services_EditBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->EditBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditBy" class="<?php echo $view_patient_services_grid->EditBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_EditBy" class="view_patient_services_EditBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->EditBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->EditBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->EditBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Editted->Visible) { // Editted ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Editted) == "") { ?>
		<th data-name="Editted" class="<?php echo $view_patient_services_grid->Editted->headerCellClass() ?>"><div id="elh_view_patient_services_Editted" class="view_patient_services_Editted"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Editted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Editted" class="<?php echo $view_patient_services_grid->Editted->headerCellClass() ?>"><div><div id="elh_view_patient_services_Editted" class="view_patient_services_Editted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Editted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Editted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Editted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->PatID->Visible) { // PatID ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_patient_services_grid->PatID->headerCellClass() ?>"><div id="elh_view_patient_services_PatID" class="view_patient_services_PatID"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_patient_services_grid->PatID->headerCellClass() ?>"><div><div id="elh_view_patient_services_PatID" class="view_patient_services_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->PatientId->Visible) { // PatientId ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_services_grid->PatientId->headerCellClass() ?>"><div id="elh_view_patient_services_PatientId" class="view_patient_services_PatientId"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_services_grid->PatientId->headerCellClass() ?>"><div><div id="elh_view_patient_services_PatientId" class="view_patient_services_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Mobile->Visible) { // Mobile ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_services_grid->Mobile->headerCellClass() ?>"><div id="elh_view_patient_services_Mobile" class="view_patient_services_Mobile"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_services_grid->Mobile->headerCellClass() ?>"><div><div id="elh_view_patient_services_Mobile" class="view_patient_services_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->CId->Visible) { // CId ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $view_patient_services_grid->CId->headerCellClass() ?>"><div id="elh_view_patient_services_CId" class="view_patient_services_CId"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $view_patient_services_grid->CId->headerCellClass() ?>"><div><div id="elh_view_patient_services_CId" class="view_patient_services_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->CId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->CId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Order->Visible) { // Order ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_patient_services_grid->Order->headerCellClass() ?>"><div id="elh_view_patient_services_Order" class="view_patient_services_Order"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_patient_services_grid->Order->headerCellClass() ?>"><div><div id="elh_view_patient_services_Order" class="view_patient_services_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->ResType->Visible) { // ResType ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $view_patient_services_grid->ResType->headerCellClass() ?>"><div id="elh_view_patient_services_ResType" class="view_patient_services_ResType"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $view_patient_services_grid->ResType->headerCellClass() ?>"><div><div id="elh_view_patient_services_ResType" class="view_patient_services_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->ResType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->ResType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->ResType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Sample->Visible) { // Sample ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $view_patient_services_grid->Sample->headerCellClass() ?>"><div id="elh_view_patient_services_Sample" class="view_patient_services_Sample"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $view_patient_services_grid->Sample->headerCellClass() ?>"><div><div id="elh_view_patient_services_Sample" class="view_patient_services_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Sample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Sample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Sample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->NoD->Visible) { // NoD ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $view_patient_services_grid->NoD->headerCellClass() ?>"><div id="elh_view_patient_services_NoD" class="view_patient_services_NoD"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $view_patient_services_grid->NoD->headerCellClass() ?>"><div><div id="elh_view_patient_services_NoD" class="view_patient_services_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->NoD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->NoD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $view_patient_services_grid->BillOrder->headerCellClass() ?>"><div id="elh_view_patient_services_BillOrder" class="view_patient_services_BillOrder"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $view_patient_services_grid->BillOrder->headerCellClass() ?>"><div><div id="elh_view_patient_services_BillOrder" class="view_patient_services_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->BillOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->BillOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Inactive->Visible) { // Inactive ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $view_patient_services_grid->Inactive->headerCellClass() ?>"><div id="elh_view_patient_services_Inactive" class="view_patient_services_Inactive"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $view_patient_services_grid->Inactive->headerCellClass() ?>"><div><div id="elh_view_patient_services_Inactive" class="view_patient_services_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Inactive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Inactive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->CollSample->Visible) { // CollSample ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $view_patient_services_grid->CollSample->headerCellClass() ?>"><div id="elh_view_patient_services_CollSample" class="view_patient_services_CollSample"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $view_patient_services_grid->CollSample->headerCellClass() ?>"><div><div id="elh_view_patient_services_CollSample" class="view_patient_services_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->CollSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->CollSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->CollSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->TestType->Visible) { // TestType ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_patient_services_grid->TestType->headerCellClass() ?>"><div id="elh_view_patient_services_TestType" class="view_patient_services_TestType"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_patient_services_grid->TestType->headerCellClass() ?>"><div><div id="elh_view_patient_services_TestType" class="view_patient_services_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->TestType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->TestType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Repeated->Visible) { // Repeated ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_patient_services_grid->Repeated->headerCellClass() ?>"><div id="elh_view_patient_services_Repeated" class="view_patient_services_Repeated"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_patient_services_grid->Repeated->headerCellClass() ?>"><div><div id="elh_view_patient_services_Repeated" class="view_patient_services_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Repeated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Repeated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->RepeatedBy) == "") { ?>
		<th data-name="RepeatedBy" class="<?php echo $view_patient_services_grid->RepeatedBy->headerCellClass() ?>"><div id="elh_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->RepeatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedBy" class="<?php echo $view_patient_services_grid->RepeatedBy->headerCellClass() ?>"><div><div id="elh_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->RepeatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->RepeatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->RepeatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->RepeatedDate) == "") { ?>
		<th data-name="RepeatedDate" class="<?php echo $view_patient_services_grid->RepeatedDate->headerCellClass() ?>"><div id="elh_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->RepeatedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedDate" class="<?php echo $view_patient_services_grid->RepeatedDate->headerCellClass() ?>"><div><div id="elh_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->RepeatedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->RepeatedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->serviceID->Visible) { // serviceID ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->serviceID) == "") { ?>
		<th data-name="serviceID" class="<?php echo $view_patient_services_grid->serviceID->headerCellClass() ?>"><div id="elh_view_patient_services_serviceID" class="view_patient_services_serviceID"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->serviceID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="serviceID" class="<?php echo $view_patient_services_grid->serviceID->headerCellClass() ?>"><div><div id="elh_view_patient_services_serviceID" class="view_patient_services_serviceID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->serviceID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->serviceID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Service_Type->Visible) { // Service_Type ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Service_Type) == "") { ?>
		<th data-name="Service_Type" class="<?php echo $view_patient_services_grid->Service_Type->headerCellClass() ?>"><div id="elh_view_patient_services_Service_Type" class="view_patient_services_Service_Type"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Service_Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Type" class="<?php echo $view_patient_services_grid->Service_Type->headerCellClass() ?>"><div><div id="elh_view_patient_services_Service_Type" class="view_patient_services_Service_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Service_Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Service_Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Service_Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->Service_Department->Visible) { // Service_Department ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->Service_Department) == "") { ?>
		<th data-name="Service_Department" class="<?php echo $view_patient_services_grid->Service_Department->headerCellClass() ?>"><div id="elh_view_patient_services_Service_Department" class="view_patient_services_Service_Department"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->Service_Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Department" class="<?php echo $view_patient_services_grid->Service_Department->headerCellClass() ?>"><div><div id="elh_view_patient_services_Service_Department" class="view_patient_services_Service_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->Service_Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->Service_Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->Service_Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_grid->RequestNo->Visible) { // RequestNo ?>
	<?php if ($view_patient_services_grid->SortUrl($view_patient_services_grid->RequestNo) == "") { ?>
		<th data-name="RequestNo" class="<?php echo $view_patient_services_grid->RequestNo->headerCellClass() ?>"><div id="elh_view_patient_services_RequestNo" class="view_patient_services_RequestNo"><div class="ew-table-header-caption"><?php echo $view_patient_services_grid->RequestNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestNo" class="<?php echo $view_patient_services_grid->RequestNo->headerCellClass() ?>"><div><div id="elh_view_patient_services_RequestNo" class="view_patient_services_RequestNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_grid->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_grid->RequestNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_services_grid->RequestNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$view_patient_services_grid->StartRecord = 1;
$view_patient_services_grid->StopRecord = $view_patient_services_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($view_patient_services->isConfirm() || $view_patient_services_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_patient_services_grid->FormKeyCountName) && ($view_patient_services_grid->isGridAdd() || $view_patient_services_grid->isGridEdit() || $view_patient_services->isConfirm())) {
		$view_patient_services_grid->KeyCount = $CurrentForm->getValue($view_patient_services_grid->FormKeyCountName);
		$view_patient_services_grid->StopRecord = $view_patient_services_grid->StartRecord + $view_patient_services_grid->KeyCount - 1;
	}
}
$view_patient_services_grid->RecordCount = $view_patient_services_grid->StartRecord - 1;
if ($view_patient_services_grid->Recordset && !$view_patient_services_grid->Recordset->EOF) {
	$view_patient_services_grid->Recordset->moveFirst();
	$selectLimit = $view_patient_services_grid->UseSelectLimit;
	if (!$selectLimit && $view_patient_services_grid->StartRecord > 1)
		$view_patient_services_grid->Recordset->move($view_patient_services_grid->StartRecord - 1);
} elseif (!$view_patient_services->AllowAddDeleteRow && $view_patient_services_grid->StopRecord == 0) {
	$view_patient_services_grid->StopRecord = $view_patient_services->GridAddRowCount;
}

// Initialize aggregate
$view_patient_services->RowType = ROWTYPE_AGGREGATEINIT;
$view_patient_services->resetAttributes();
$view_patient_services_grid->renderRow();
if ($view_patient_services_grid->isGridAdd())
	$view_patient_services_grid->RowIndex = 0;
if ($view_patient_services_grid->isGridEdit())
	$view_patient_services_grid->RowIndex = 0;
while ($view_patient_services_grid->RecordCount < $view_patient_services_grid->StopRecord) {
	$view_patient_services_grid->RecordCount++;
	if ($view_patient_services_grid->RecordCount >= $view_patient_services_grid->StartRecord) {
		$view_patient_services_grid->RowCount++;
		if ($view_patient_services_grid->isGridAdd() || $view_patient_services_grid->isGridEdit() || $view_patient_services->isConfirm()) {
			$view_patient_services_grid->RowIndex++;
			$CurrentForm->Index = $view_patient_services_grid->RowIndex;
			if ($CurrentForm->hasValue($view_patient_services_grid->FormActionName) && ($view_patient_services->isConfirm() || $view_patient_services_grid->EventCancelled))
				$view_patient_services_grid->RowAction = strval($CurrentForm->getValue($view_patient_services_grid->FormActionName));
			elseif ($view_patient_services_grid->isGridAdd())
				$view_patient_services_grid->RowAction = "insert";
			else
				$view_patient_services_grid->RowAction = "";
		}

		// Set up key count
		$view_patient_services_grid->KeyCount = $view_patient_services_grid->RowIndex;

		// Init row class and style
		$view_patient_services->resetAttributes();
		$view_patient_services->CssClass = "";
		if ($view_patient_services_grid->isGridAdd()) {
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
		if ($view_patient_services_grid->isGridAdd()) // Grid add
			$view_patient_services->RowType = ROWTYPE_ADD; // Render add
		if ($view_patient_services_grid->isGridAdd() && $view_patient_services->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_patient_services_grid->restoreCurrentRowFormValues($view_patient_services_grid->RowIndex); // Restore form values
		if ($view_patient_services_grid->isGridEdit()) { // Grid edit
			if ($view_patient_services->EventCancelled)
				$view_patient_services_grid->restoreCurrentRowFormValues($view_patient_services_grid->RowIndex); // Restore form values
			if ($view_patient_services_grid->RowAction == "insert")
				$view_patient_services->RowType = ROWTYPE_ADD; // Render add
			else
				$view_patient_services->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_patient_services_grid->isGridEdit() && ($view_patient_services->RowType == ROWTYPE_EDIT || $view_patient_services->RowType == ROWTYPE_ADD) && $view_patient_services->EventCancelled) // Update failed
			$view_patient_services_grid->restoreCurrentRowFormValues($view_patient_services_grid->RowIndex); // Restore form values
		if ($view_patient_services->RowType == ROWTYPE_EDIT) // Edit row
			$view_patient_services_grid->EditRowCount++;
		if ($view_patient_services->isConfirm()) // Confirm row
			$view_patient_services_grid->restoreCurrentRowFormValues($view_patient_services_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_patient_services->RowAttrs->merge(["data-rowindex" => $view_patient_services_grid->RowCount, "id" => "r" . $view_patient_services_grid->RowCount . "_view_patient_services", "data-rowtype" => $view_patient_services->RowType]);

		// Render row
		$view_patient_services_grid->renderRow();

		// Render list options
		$view_patient_services_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_patient_services_grid->RowAction != "delete" && $view_patient_services_grid->RowAction != "insertdelete" && !($view_patient_services_grid->RowAction == "insert" && $view_patient_services->isConfirm() && $view_patient_services_grid->emptyRow())) {
?>
	<tr <?php echo $view_patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_services_grid->ListOptions->render("body", "left", $view_patient_services_grid->RowCount);
?>
	<?php if ($view_patient_services_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_patient_services_grid->id->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_id" class="form-group"></span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="o<?php echo $view_patient_services_grid->RowIndex ?>_id" id="o<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_id" class="form-group">
<span<?php echo $view_patient_services_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="x<?php echo $view_patient_services_grid->RowIndex ?>_id" id="x<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_id">
<span<?php echo $view_patient_services_grid->id->viewAttributes() ?>><?php echo $view_patient_services_grid->id->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="x<?php echo $view_patient_services_grid->RowIndex ?>_id" id="x<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="o<?php echo $view_patient_services_grid->RowIndex ?>_id" id="o<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_id" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_id" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $view_patient_services_grid->Reception->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Reception" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Reception->EditValue ?>"<?php echo $view_patient_services_grid->Reception->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services_grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Reception" class="form-group">
<span<?php echo $view_patient_services_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services_grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Reception">
<span<?php echo $view_patient_services_grid->Reception->viewAttributes() ?>><?php echo $view_patient_services_grid->Reception->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services_grid->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services_grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $view_patient_services_grid->mrnno->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_mrnno" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->mrnno->EditValue ?>"<?php echo $view_patient_services_grid->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_mrnno" class="form-group">
<span<?php echo $view_patient_services_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services_grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_mrnno">
<span<?php echo $view_patient_services_grid->mrnno->viewAttributes() ?>><?php echo $view_patient_services_grid->mrnno->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services_grid->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_patient_services_grid->PatientName->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PatientName" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PatientName->EditValue ?>"<?php echo $view_patient_services_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PatientName" class="form-group">
<span<?php echo $view_patient_services_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->PatientName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services_grid->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PatientName">
<span<?php echo $view_patient_services_grid->PatientName->viewAttributes() ?>><?php echo $view_patient_services_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $view_patient_services_grid->Age->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Age" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Age->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Age->EditValue ?>"<?php echo $view_patient_services_grid->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services_grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Age" class="form-group">
<span<?php echo $view_patient_services_grid->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Age->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services_grid->Age->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Age">
<span<?php echo $view_patient_services_grid->Age->viewAttributes() ?>><?php echo $view_patient_services_grid->Age->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services_grid->Age->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services_grid->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services_grid->Age->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services_grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $view_patient_services_grid->Gender->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Gender" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Gender->EditValue ?>"<?php echo $view_patient_services_grid->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services_grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Gender" class="form-group">
<span<?php echo $view_patient_services_grid->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Gender->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services_grid->Gender->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Gender">
<span<?php echo $view_patient_services_grid->Gender->viewAttributes() ?>><?php echo $view_patient_services_grid->Gender->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services_grid->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services_grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" <?php echo $view_patient_services_grid->profilePic->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_profilePic" class="form-group">
<textarea data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_grid->profilePic->getPlaceHolder()) ?>"<?php echo $view_patient_services_grid->profilePic->editAttributes() ?>><?php echo $view_patient_services_grid->profilePic->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services_grid->profilePic->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_profilePic" class="form-group">
<span<?php echo $view_patient_services_grid->profilePic->viewAttributes() ?>><?php echo $view_patient_services_grid->profilePic->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services_grid->profilePic->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_profilePic">
<span<?php echo $view_patient_services_grid->profilePic->viewAttributes() ?>><?php echo $view_patient_services_grid->profilePic->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services_grid->profilePic->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services_grid->profilePic->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services_grid->profilePic->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services_grid->profilePic->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Services->Visible) { // Services ?>
		<td data-name="Services" <?php echo $view_patient_services_grid->Services->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Services" class="form-group">
<?php
$onchange = $view_patient_services_grid->Services->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_patient_services_grid->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_grid->RowIndex ?>_Services">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services_grid->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services_grid->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services_grid->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services_grid->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_grid->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_patient_servicesgrid"], function() {
	fview_patient_servicesgrid.createAutoSuggest({"id":"x<?php echo $view_patient_services_grid->RowIndex ?>_Services","forceSelect":false});
});
</script>
<?php echo $view_patient_services_grid->Services->Lookup->getParamTag($view_patient_services_grid, "p_x" . $view_patient_services_grid->RowIndex . "_Services") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_grid->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Services" class="form-group">
<?php
$onchange = $view_patient_services_grid->Services->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_patient_services_grid->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_grid->RowIndex ?>_Services">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services_grid->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services_grid->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services_grid->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services_grid->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_grid->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_patient_servicesgrid"], function() {
	fview_patient_servicesgrid.createAutoSuggest({"id":"x<?php echo $view_patient_services_grid->RowIndex ?>_Services","forceSelect":false});
});
</script>
<?php echo $view_patient_services_grid->Services->Lookup->getParamTag($view_patient_services_grid, "p_x" . $view_patient_services_grid->RowIndex . "_Services") ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Services">
<span<?php echo $view_patient_services_grid->Services->viewAttributes() ?>><?php echo $view_patient_services_grid->Services->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_grid->Services->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_grid->Services->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_grid->Services->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_grid->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Unit->Visible) { // Unit ?>
		<td data-name="Unit" <?php echo $view_patient_services_grid->Unit->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Unit" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Unit->EditValue ?>"<?php echo $view_patient_services_grid->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services_grid->Unit->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Unit" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Unit->EditValue ?>"<?php echo $view_patient_services_grid->Unit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Unit">
<span<?php echo $view_patient_services_grid->Unit->viewAttributes() ?>><?php echo $view_patient_services_grid->Unit->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services_grid->Unit->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services_grid->Unit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services_grid->Unit->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services_grid->Unit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->amount->Visible) { // amount ?>
		<td data-name="amount" <?php echo $view_patient_services_grid->amount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_amount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services_grid->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->amount->EditValue ?>"<?php echo $view_patient_services_grid->amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services_grid->amount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_amount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services_grid->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->amount->EditValue ?>"<?php echo $view_patient_services_grid->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_amount">
<span<?php echo $view_patient_services_grid->amount->viewAttributes() ?>><?php echo $view_patient_services_grid->amount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services_grid->amount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services_grid->amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services_grid->amount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services_grid->amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $view_patient_services_grid->Quantity->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Quantity" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Quantity->EditValue ?>"<?php echo $view_patient_services_grid->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Quantity" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Quantity->EditValue ?>"<?php echo $view_patient_services_grid->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Quantity">
<span<?php echo $view_patient_services_grid->Quantity->viewAttributes() ?>><?php echo $view_patient_services_grid->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services_grid->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory" <?php echo $view_patient_services_grid->DiscountCategory->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DiscountCategory" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services_grid->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services_grid->DiscountCategory->editAttributes() ?>>
			<?php echo $view_patient_services_grid->DiscountCategory->selectOptionListHtml("x{$view_patient_services_grid->RowIndex}_DiscountCategory") ?>
		</select>
</div>
<?php echo $view_patient_services_grid->DiscountCategory->Lookup->getParamTag($view_patient_services_grid, "p_x" . $view_patient_services_grid->RowIndex . "_DiscountCategory") ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services_grid->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DiscountCategory" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services_grid->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services_grid->DiscountCategory->editAttributes() ?>>
			<?php echo $view_patient_services_grid->DiscountCategory->selectOptionListHtml("x{$view_patient_services_grid->RowIndex}_DiscountCategory") ?>
		</select>
</div>
<?php echo $view_patient_services_grid->DiscountCategory->Lookup->getParamTag($view_patient_services_grid, "p_x" . $view_patient_services_grid->RowIndex . "_DiscountCategory") ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DiscountCategory">
<span<?php echo $view_patient_services_grid->DiscountCategory->viewAttributes() ?>><?php echo $view_patient_services_grid->DiscountCategory->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services_grid->DiscountCategory->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services_grid->DiscountCategory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services_grid->DiscountCategory->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services_grid->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Discount->Visible) { // Discount ?>
		<td data-name="Discount" <?php echo $view_patient_services_grid->Discount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Discount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Discount->EditValue ?>"<?php echo $view_patient_services_grid->Discount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services_grid->Discount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Discount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Discount->EditValue ?>"<?php echo $view_patient_services_grid->Discount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Discount">
<span<?php echo $view_patient_services_grid->Discount->viewAttributes() ?>><?php echo $view_patient_services_grid->Discount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services_grid->Discount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services_grid->Discount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services_grid->Discount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services_grid->Discount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" <?php echo $view_patient_services_grid->SubTotal->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SubTotal" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SubTotal->EditValue ?>"<?php echo $view_patient_services_grid->SubTotal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services_grid->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SubTotal" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SubTotal->EditValue ?>"<?php echo $view_patient_services_grid->SubTotal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SubTotal">
<span<?php echo $view_patient_services_grid->SubTotal->viewAttributes() ?>><?php echo $view_patient_services_grid->SubTotal->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services_grid->SubTotal->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services_grid->SubTotal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services_grid->SubTotal->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services_grid->SubTotal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->description->Visible) { // description ?>
		<td data-name="description" <?php echo $view_patient_services_grid->description->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_description" class="form-group">
<textarea data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="x<?php echo $view_patient_services_grid->RowIndex ?>_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_grid->description->getPlaceHolder()) ?>"<?php echo $view_patient_services_grid->description->editAttributes() ?>><?php echo $view_patient_services_grid->description->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="o<?php echo $view_patient_services_grid->RowIndex ?>_description" id="o<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services_grid->description->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_description" class="form-group">
<span<?php echo $view_patient_services_grid->description->viewAttributes() ?>><?php echo $view_patient_services_grid->description->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="x<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services_grid->description->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_description">
<span<?php echo $view_patient_services_grid->description->viewAttributes() ?>><?php echo $view_patient_services_grid->description->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="x<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services_grid->description->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="o<?php echo $view_patient_services_grid->RowIndex ?>_description" id="o<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services_grid->description->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services_grid->description->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_description" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services_grid->description->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" <?php echo $view_patient_services_grid->patient_type->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_patient_type" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->patient_type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->patient_type->EditValue ?>"<?php echo $view_patient_services_grid->patient_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services_grid->patient_type->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_patient_type" class="form-group">
<span<?php echo $view_patient_services_grid->patient_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->patient_type->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services_grid->patient_type->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_patient_type">
<span<?php echo $view_patient_services_grid->patient_type->viewAttributes() ?>><?php echo $view_patient_services_grid->patient_type->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services_grid->patient_type->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services_grid->patient_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services_grid->patient_type->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services_grid->patient_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" <?php echo $view_patient_services_grid->charged_date->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_charged_date" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" placeholder="<?php echo HtmlEncode($view_patient_services_grid->charged_date->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->charged_date->EditValue ?>"<?php echo $view_patient_services_grid->charged_date->editAttributes() ?>>
<?php if (!$view_patient_services_grid->charged_date->ReadOnly && !$view_patient_services_grid->charged_date->Disabled && !isset($view_patient_services_grid->charged_date->EditAttrs["readonly"]) && !isset($view_patient_services_grid->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services_grid->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_charged_date" class="form-group">
<span<?php echo $view_patient_services_grid->charged_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->charged_date->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services_grid->charged_date->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_charged_date">
<span<?php echo $view_patient_services_grid->charged_date->viewAttributes() ?>><?php echo $view_patient_services_grid->charged_date->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services_grid->charged_date->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services_grid->charged_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services_grid->charged_date->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services_grid->charged_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_patient_services_grid->status->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_status" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="x<?php echo $view_patient_services_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->status->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->status->EditValue ?>"<?php echo $view_patient_services_grid->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="o<?php echo $view_patient_services_grid->RowIndex ?>_status" id="o<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_status" class="form-group">
<span<?php echo $view_patient_services_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->status->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="x<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services_grid->status->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_status">
<span<?php echo $view_patient_services_grid->status->viewAttributes() ?>><?php echo $view_patient_services_grid->status->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="x<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services_grid->status->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="o<?php echo $view_patient_services_grid->RowIndex ?>_status" id="o<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services_grid->status->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_status" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_patient_services_grid->createdby->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_createdby">
<span<?php echo $view_patient_services_grid->createdby->viewAttributes() ?>><?php echo $view_patient_services_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_patient_services_grid->createddatetime->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_createddatetime">
<span<?php echo $view_patient_services_grid->createddatetime->viewAttributes() ?>><?php echo $view_patient_services_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_patient_services_grid->modifiedby->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_modifiedby">
<span<?php echo $view_patient_services_grid->modifiedby->viewAttributes() ?>><?php echo $view_patient_services_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_patient_services_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_modifieddatetime">
<span<?php echo $view_patient_services_grid->modifieddatetime->viewAttributes() ?>><?php echo $view_patient_services_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Aid->Visible) { // Aid ?>
		<td data-name="Aid" <?php echo $view_patient_services_grid->Aid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Aid" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Aid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Aid->EditValue ?>"<?php echo $view_patient_services_grid->Aid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services_grid->Aid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Aid" class="form-group">
<span<?php echo $view_patient_services_grid->Aid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Aid->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services_grid->Aid->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Aid">
<span<?php echo $view_patient_services_grid->Aid->viewAttributes() ?>><?php echo $view_patient_services_grid->Aid->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services_grid->Aid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services_grid->Aid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services_grid->Aid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services_grid->Aid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Vid->Visible) { // Vid ?>
		<td data-name="Vid" <?php echo $view_patient_services_grid->Vid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_patient_services_grid->Vid->getSessionValue() != "") { ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Vid" class="form-group">
<span<?php echo $view_patient_services_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_grid->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Vid" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Vid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Vid->EditValue ?>"<?php echo $view_patient_services_grid->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_grid->Vid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Vid" class="form-group">
<span<?php echo $view_patient_services_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Vid->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_grid->Vid->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Vid">
<span<?php echo $view_patient_services_grid->Vid->viewAttributes() ?>><?php echo $view_patient_services_grid->Vid->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_grid->Vid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_grid->Vid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_grid->Vid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_grid->Vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $view_patient_services_grid->DrID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrID" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrID->EditValue ?>"<?php echo $view_patient_services_grid->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services_grid->DrID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrID" class="form-group">
<span<?php echo $view_patient_services_grid->DrID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DrID->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services_grid->DrID->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrID">
<span<?php echo $view_patient_services_grid->DrID->viewAttributes() ?>><?php echo $view_patient_services_grid->DrID->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services_grid->DrID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services_grid->DrID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services_grid->DrID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services_grid->DrID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" <?php echo $view_patient_services_grid->DrCODE->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrCODE" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrCODE->EditValue ?>"<?php echo $view_patient_services_grid->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services_grid->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrCODE" class="form-group">
<span<?php echo $view_patient_services_grid->DrCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DrCODE->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services_grid->DrCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrCODE">
<span<?php echo $view_patient_services_grid->DrCODE->viewAttributes() ?>><?php echo $view_patient_services_grid->DrCODE->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services_grid->DrCODE->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services_grid->DrCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services_grid->DrCODE->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services_grid->DrCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $view_patient_services_grid->DrName->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrName" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrName->EditValue ?>"<?php echo $view_patient_services_grid->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services_grid->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrName" class="form-group">
<span<?php echo $view_patient_services_grid->DrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DrName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services_grid->DrName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrName">
<span<?php echo $view_patient_services_grid->DrName->viewAttributes() ?>><?php echo $view_patient_services_grid->DrName->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services_grid->DrName->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services_grid->DrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services_grid->DrName->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services_grid->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $view_patient_services_grid->Department->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Department" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Department->EditValue ?>"<?php echo $view_patient_services_grid->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Department->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Department" class="form-group">
<span<?php echo $view_patient_services_grid->Department->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Department->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Department->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Department">
<span<?php echo $view_patient_services_grid->Department->viewAttributes() ?>><?php echo $view_patient_services_grid->Department->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Department->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Department->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres" <?php echo $view_patient_services_grid->DrSharePres->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrSharePres" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrSharePres->EditValue ?>"<?php echo $view_patient_services_grid->DrSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->DrSharePres->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrSharePres" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrSharePres->EditValue ?>"<?php echo $view_patient_services_grid->DrSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrSharePres">
<span<?php echo $view_patient_services_grid->DrSharePres->viewAttributes() ?>><?php echo $view_patient_services_grid->DrSharePres->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->DrSharePres->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->DrSharePres->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->DrSharePres->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->DrSharePres->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres" <?php echo $view_patient_services_grid->HospSharePres->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_HospSharePres" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->HospSharePres->EditValue ?>"<?php echo $view_patient_services_grid->HospSharePres->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->HospSharePres->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_HospSharePres" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->HospSharePres->EditValue ?>"<?php echo $view_patient_services_grid->HospSharePres->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_HospSharePres">
<span<?php echo $view_patient_services_grid->HospSharePres->viewAttributes() ?>><?php echo $view_patient_services_grid->HospSharePres->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->HospSharePres->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->HospSharePres->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->HospSharePres->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->HospSharePres->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" <?php echo $view_patient_services_grid->DrShareAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareAmount->EditValue ?>"<?php echo $view_patient_services_grid->DrShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareAmount->EditValue ?>"<?php echo $view_patient_services_grid->DrShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareAmount">
<span<?php echo $view_patient_services_grid->DrShareAmount->viewAttributes() ?>><?php echo $view_patient_services_grid->DrShareAmount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" <?php echo $view_patient_services_grid->HospShareAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_HospShareAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->HospShareAmount->EditValue ?>"<?php echo $view_patient_services_grid->HospShareAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_HospShareAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->HospShareAmount->EditValue ?>"<?php echo $view_patient_services_grid->HospShareAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_HospShareAmount">
<span<?php echo $view_patient_services_grid->HospShareAmount->viewAttributes() ?>><?php echo $view_patient_services_grid->HospShareAmount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->HospShareAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->HospShareAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->HospShareAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount" <?php echo $view_patient_services_grid->DrShareSettiledAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareSettiledAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services_grid->DrShareSettiledAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareSettiledAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services_grid->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareSettiledAmount">
<span<?php echo $view_patient_services_grid->DrShareSettiledAmount->viewAttributes() ?>><?php echo $view_patient_services_grid->DrShareSettiledAmount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId" <?php echo $view_patient_services_grid->DrShareSettledId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareSettledId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services_grid->DrShareSettledId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareSettledId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services_grid->DrShareSettledId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareSettledId">
<span<?php echo $view_patient_services_grid->DrShareSettledId->viewAttributes() ?>><?php echo $view_patient_services_grid->DrShareSettledId->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettledId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettledId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettledId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus" <?php echo $view_patient_services_grid->DrShareSettiledStatus->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareSettiledStatus" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services_grid->DrShareSettiledStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareSettiledStatus" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services_grid->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DrShareSettiledStatus">
<span<?php echo $view_patient_services_grid->DrShareSettiledStatus->viewAttributes() ?>><?php echo $view_patient_services_grid->DrShareSettiledStatus->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledStatus->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledStatus->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" <?php echo $view_patient_services_grid->invoiceId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_invoiceId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->invoiceId->EditValue ?>"<?php echo $view_patient_services_grid->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_invoiceId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->invoiceId->EditValue ?>"<?php echo $view_patient_services_grid->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_invoiceId">
<span<?php echo $view_patient_services_grid->invoiceId->viewAttributes() ?>><?php echo $view_patient_services_grid->invoiceId->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" <?php echo $view_patient_services_grid->invoiceAmount->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_invoiceAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->invoiceAmount->EditValue ?>"<?php echo $view_patient_services_grid->invoiceAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_invoiceAmount" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->invoiceAmount->EditValue ?>"<?php echo $view_patient_services_grid->invoiceAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_invoiceAmount">
<span<?php echo $view_patient_services_grid->invoiceAmount->viewAttributes() ?>><?php echo $view_patient_services_grid->invoiceAmount->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceAmount->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" <?php echo $view_patient_services_grid->invoiceStatus->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_invoiceStatus" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->invoiceStatus->EditValue ?>"<?php echo $view_patient_services_grid->invoiceStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_invoiceStatus" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->invoiceStatus->EditValue ?>"<?php echo $view_patient_services_grid->invoiceStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_invoiceStatus">
<span<?php echo $view_patient_services_grid->invoiceStatus->viewAttributes() ?>><?php echo $view_patient_services_grid->invoiceStatus->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceStatus->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceStatus->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" <?php echo $view_patient_services_grid->modeOfPayment->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_modeOfPayment" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->modeOfPayment->EditValue ?>"<?php echo $view_patient_services_grid->modeOfPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services_grid->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_modeOfPayment" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->modeOfPayment->EditValue ?>"<?php echo $view_patient_services_grid->modeOfPayment->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_modeOfPayment">
<span<?php echo $view_patient_services_grid->modeOfPayment->viewAttributes() ?>><?php echo $view_patient_services_grid->modeOfPayment->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services_grid->modeOfPayment->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services_grid->modeOfPayment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services_grid->modeOfPayment->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services_grid->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_patient_services_grid->HospID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_HospID">
<span<?php echo $view_patient_services_grid->HospID->viewAttributes() ?>><?php echo $view_patient_services_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $view_patient_services_grid->RIDNO->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RIDNO" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RIDNO->EditValue ?>"<?php echo $view_patient_services_grid->RIDNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services_grid->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RIDNO" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RIDNO->EditValue ?>"<?php echo $view_patient_services_grid->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RIDNO">
<span<?php echo $view_patient_services_grid->RIDNO->viewAttributes() ?>><?php echo $view_patient_services_grid->RIDNO->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services_grid->RIDNO->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services_grid->RIDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services_grid->RIDNO->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services_grid->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" <?php echo $view_patient_services_grid->ItemCode->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ItemCode" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ItemCode->EditValue ?>"<?php echo $view_patient_services_grid->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services_grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ItemCode" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ItemCode->EditValue ?>"<?php echo $view_patient_services_grid->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ItemCode">
<span<?php echo $view_patient_services_grid->ItemCode->viewAttributes() ?>><?php echo $view_patient_services_grid->ItemCode->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services_grid->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services_grid->ItemCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services_grid->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services_grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $view_patient_services_grid->TidNo->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TidNo" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TidNo->EditValue ?>"<?php echo $view_patient_services_grid->TidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services_grid->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TidNo" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TidNo->EditValue ?>"<?php echo $view_patient_services_grid->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TidNo">
<span<?php echo $view_patient_services_grid->TidNo->viewAttributes() ?>><?php echo $view_patient_services_grid->TidNo->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services_grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services_grid->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services_grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services_grid->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->sid->Visible) { // sid ?>
		<td data-name="sid" <?php echo $view_patient_services_grid->sid->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_sid" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services_grid->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->sid->EditValue ?>"<?php echo $view_patient_services_grid->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services_grid->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_sid" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services_grid->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->sid->EditValue ?>"<?php echo $view_patient_services_grid->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_sid">
<span<?php echo $view_patient_services_grid->sid->viewAttributes() ?>><?php echo $view_patient_services_grid->sid->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services_grid->sid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services_grid->sid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services_grid->sid->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services_grid->sid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" <?php echo $view_patient_services_grid->TestSubCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestSubCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TestSubCd->EditValue ?>"<?php echo $view_patient_services_grid->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services_grid->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestSubCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TestSubCd->EditValue ?>"<?php echo $view_patient_services_grid->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestSubCd">
<span<?php echo $view_patient_services_grid->TestSubCd->viewAttributes() ?>><?php echo $view_patient_services_grid->TestSubCd->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services_grid->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services_grid->TestSubCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services_grid->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services_grid->TestSubCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" <?php echo $view_patient_services_grid->DEptCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DEptCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DEptCd->EditValue ?>"<?php echo $view_patient_services_grid->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services_grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DEptCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DEptCd->EditValue ?>"<?php echo $view_patient_services_grid->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DEptCd">
<span<?php echo $view_patient_services_grid->DEptCd->viewAttributes() ?>><?php echo $view_patient_services_grid->DEptCd->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services_grid->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services_grid->DEptCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services_grid->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services_grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" <?php echo $view_patient_services_grid->ProfCd->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ProfCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ProfCd->EditValue ?>"<?php echo $view_patient_services_grid->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services_grid->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ProfCd" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ProfCd->EditValue ?>"<?php echo $view_patient_services_grid->ProfCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ProfCd">
<span<?php echo $view_patient_services_grid->ProfCd->viewAttributes() ?>><?php echo $view_patient_services_grid->ProfCd->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services_grid->ProfCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services_grid->ProfCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services_grid->ProfCd->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services_grid->ProfCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Comments->Visible) { // Comments ?>
		<td data-name="Comments" <?php echo $view_patient_services_grid->Comments->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Comments" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Comments->EditValue ?>"<?php echo $view_patient_services_grid->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services_grid->Comments->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Comments" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Comments->EditValue ?>"<?php echo $view_patient_services_grid->Comments->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Comments">
<span<?php echo $view_patient_services_grid->Comments->viewAttributes() ?>><?php echo $view_patient_services_grid->Comments->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services_grid->Comments->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services_grid->Comments->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services_grid->Comments->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services_grid->Comments->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $view_patient_services_grid->Method->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Method" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Method->EditValue ?>"<?php echo $view_patient_services_grid->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services_grid->Method->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Method" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Method->EditValue ?>"<?php echo $view_patient_services_grid->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Method">
<span<?php echo $view_patient_services_grid->Method->viewAttributes() ?>><?php echo $view_patient_services_grid->Method->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services_grid->Method->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services_grid->Method->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services_grid->Method->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services_grid->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" <?php echo $view_patient_services_grid->Specimen->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Specimen" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Specimen->EditValue ?>"<?php echo $view_patient_services_grid->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services_grid->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Specimen" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Specimen->EditValue ?>"<?php echo $view_patient_services_grid->Specimen->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Specimen">
<span<?php echo $view_patient_services_grid->Specimen->viewAttributes() ?>><?php echo $view_patient_services_grid->Specimen->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services_grid->Specimen->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services_grid->Specimen->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services_grid->Specimen->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services_grid->Specimen->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" <?php echo $view_patient_services_grid->Abnormal->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Abnormal" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Abnormal->EditValue ?>"<?php echo $view_patient_services_grid->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services_grid->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Abnormal" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Abnormal->EditValue ?>"<?php echo $view_patient_services_grid->Abnormal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Abnormal">
<span<?php echo $view_patient_services_grid->Abnormal->viewAttributes() ?>><?php echo $view_patient_services_grid->Abnormal->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services_grid->Abnormal->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services_grid->Abnormal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services_grid->Abnormal->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services_grid->Abnormal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" <?php echo $view_patient_services_grid->TestUnit->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestUnit" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TestUnit->EditValue ?>"<?php echo $view_patient_services_grid->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services_grid->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestUnit" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TestUnit->EditValue ?>"<?php echo $view_patient_services_grid->TestUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestUnit">
<span<?php echo $view_patient_services_grid->TestUnit->viewAttributes() ?>><?php echo $view_patient_services_grid->TestUnit->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services_grid->TestUnit->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services_grid->TestUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services_grid->TestUnit->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services_grid->TestUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" <?php echo $view_patient_services_grid->LOWHIGH->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_LOWHIGH" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->LOWHIGH->EditValue ?>"<?php echo $view_patient_services_grid->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services_grid->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_LOWHIGH" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->LOWHIGH->EditValue ?>"<?php echo $view_patient_services_grid->LOWHIGH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_LOWHIGH">
<span<?php echo $view_patient_services_grid->LOWHIGH->viewAttributes() ?>><?php echo $view_patient_services_grid->LOWHIGH->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services_grid->LOWHIGH->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services_grid->LOWHIGH->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services_grid->LOWHIGH->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services_grid->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Branch->Visible) { // Branch ?>
		<td data-name="Branch" <?php echo $view_patient_services_grid->Branch->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Branch" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Branch->EditValue ?>"<?php echo $view_patient_services_grid->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services_grid->Branch->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Branch" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Branch->EditValue ?>"<?php echo $view_patient_services_grid->Branch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Branch">
<span<?php echo $view_patient_services_grid->Branch->viewAttributes() ?>><?php echo $view_patient_services_grid->Branch->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services_grid->Branch->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services_grid->Branch->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services_grid->Branch->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services_grid->Branch->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" <?php echo $view_patient_services_grid->Dispatch->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Dispatch" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Dispatch->EditValue ?>"<?php echo $view_patient_services_grid->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services_grid->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Dispatch" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Dispatch->EditValue ?>"<?php echo $view_patient_services_grid->Dispatch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Dispatch">
<span<?php echo $view_patient_services_grid->Dispatch->viewAttributes() ?>><?php echo $view_patient_services_grid->Dispatch->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services_grid->Dispatch->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services_grid->Dispatch->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services_grid->Dispatch->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services_grid->Dispatch->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" <?php echo $view_patient_services_grid->Pic1->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Pic1" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Pic1->EditValue ?>"<?php echo $view_patient_services_grid->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services_grid->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Pic1" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Pic1->EditValue ?>"<?php echo $view_patient_services_grid->Pic1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Pic1">
<span<?php echo $view_patient_services_grid->Pic1->viewAttributes() ?>><?php echo $view_patient_services_grid->Pic1->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services_grid->Pic1->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services_grid->Pic1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services_grid->Pic1->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services_grid->Pic1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" <?php echo $view_patient_services_grid->Pic2->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Pic2" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Pic2->EditValue ?>"<?php echo $view_patient_services_grid->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services_grid->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Pic2" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Pic2->EditValue ?>"<?php echo $view_patient_services_grid->Pic2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Pic2">
<span<?php echo $view_patient_services_grid->Pic2->viewAttributes() ?>><?php echo $view_patient_services_grid->Pic2->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services_grid->Pic2->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services_grid->Pic2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services_grid->Pic2->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services_grid->Pic2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" <?php echo $view_patient_services_grid->GraphPath->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_GraphPath" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->GraphPath->EditValue ?>"<?php echo $view_patient_services_grid->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services_grid->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_GraphPath" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->GraphPath->EditValue ?>"<?php echo $view_patient_services_grid->GraphPath->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_GraphPath">
<span<?php echo $view_patient_services_grid->GraphPath->viewAttributes() ?>><?php echo $view_patient_services_grid->GraphPath->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services_grid->GraphPath->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services_grid->GraphPath->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services_grid->GraphPath->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services_grid->GraphPath->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" <?php echo $view_patient_services_grid->MachineCD->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_MachineCD" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->MachineCD->EditValue ?>"<?php echo $view_patient_services_grid->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services_grid->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_MachineCD" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->MachineCD->EditValue ?>"<?php echo $view_patient_services_grid->MachineCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_MachineCD">
<span<?php echo $view_patient_services_grid->MachineCD->viewAttributes() ?>><?php echo $view_patient_services_grid->MachineCD->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services_grid->MachineCD->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services_grid->MachineCD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services_grid->MachineCD->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services_grid->MachineCD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" <?php echo $view_patient_services_grid->TestCancel->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestCancel" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TestCancel->EditValue ?>"<?php echo $view_patient_services_grid->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services_grid->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestCancel" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TestCancel->EditValue ?>"<?php echo $view_patient_services_grid->TestCancel->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestCancel">
<span<?php echo $view_patient_services_grid->TestCancel->viewAttributes() ?>><?php echo $view_patient_services_grid->TestCancel->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services_grid->TestCancel->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services_grid->TestCancel->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services_grid->TestCancel->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services_grid->TestCancel->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" <?php echo $view_patient_services_grid->OutSource->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_OutSource" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->OutSource->EditValue ?>"<?php echo $view_patient_services_grid->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services_grid->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_OutSource" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->OutSource->EditValue ?>"<?php echo $view_patient_services_grid->OutSource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_OutSource">
<span<?php echo $view_patient_services_grid->OutSource->viewAttributes() ?>><?php echo $view_patient_services_grid->OutSource->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services_grid->OutSource->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services_grid->OutSource->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services_grid->OutSource->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services_grid->OutSource->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Printed->Visible) { // Printed ?>
		<td data-name="Printed" <?php echo $view_patient_services_grid->Printed->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Printed" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Printed->EditValue ?>"<?php echo $view_patient_services_grid->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services_grid->Printed->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Printed" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Printed->EditValue ?>"<?php echo $view_patient_services_grid->Printed->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Printed">
<span<?php echo $view_patient_services_grid->Printed->viewAttributes() ?>><?php echo $view_patient_services_grid->Printed->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services_grid->Printed->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services_grid->Printed->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services_grid->Printed->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services_grid->Printed->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" <?php echo $view_patient_services_grid->PrintBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PrintBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PrintBy->EditValue ?>"<?php echo $view_patient_services_grid->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services_grid->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PrintBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PrintBy->EditValue ?>"<?php echo $view_patient_services_grid->PrintBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PrintBy">
<span<?php echo $view_patient_services_grid->PrintBy->viewAttributes() ?>><?php echo $view_patient_services_grid->PrintBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services_grid->PrintBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services_grid->PrintBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services_grid->PrintBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services_grid->PrintBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" <?php echo $view_patient_services_grid->PrintDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PrintDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PrintDate->EditValue ?>"<?php echo $view_patient_services_grid->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->PrintDate->ReadOnly && !$view_patient_services_grid->PrintDate->Disabled && !isset($view_patient_services_grid->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services_grid->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PrintDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PrintDate->EditValue ?>"<?php echo $view_patient_services_grid->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->PrintDate->ReadOnly && !$view_patient_services_grid->PrintDate->Disabled && !isset($view_patient_services_grid->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PrintDate">
<span<?php echo $view_patient_services_grid->PrintDate->viewAttributes() ?>><?php echo $view_patient_services_grid->PrintDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services_grid->PrintDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services_grid->PrintDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services_grid->PrintDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services_grid->PrintDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate" <?php echo $view_patient_services_grid->BillingDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_BillingDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->BillingDate->EditValue ?>"<?php echo $view_patient_services_grid->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->BillingDate->ReadOnly && !$view_patient_services_grid->BillingDate->Disabled && !isset($view_patient_services_grid->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services_grid->BillingDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_BillingDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->BillingDate->EditValue ?>"<?php echo $view_patient_services_grid->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->BillingDate->ReadOnly && !$view_patient_services_grid->BillingDate->Disabled && !isset($view_patient_services_grid->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_BillingDate">
<span<?php echo $view_patient_services_grid->BillingDate->viewAttributes() ?>><?php echo $view_patient_services_grid->BillingDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services_grid->BillingDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services_grid->BillingDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services_grid->BillingDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services_grid->BillingDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy" <?php echo $view_patient_services_grid->BilledBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_BilledBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->BilledBy->EditValue ?>"<?php echo $view_patient_services_grid->BilledBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services_grid->BilledBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_BilledBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->BilledBy->EditValue ?>"<?php echo $view_patient_services_grid->BilledBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_BilledBy">
<span<?php echo $view_patient_services_grid->BilledBy->viewAttributes() ?>><?php echo $view_patient_services_grid->BilledBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services_grid->BilledBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services_grid->BilledBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services_grid->BilledBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services_grid->BilledBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" <?php echo $view_patient_services_grid->Resulted->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Resulted" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Resulted->EditValue ?>"<?php echo $view_patient_services_grid->Resulted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services_grid->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Resulted" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Resulted->EditValue ?>"<?php echo $view_patient_services_grid->Resulted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Resulted">
<span<?php echo $view_patient_services_grid->Resulted->viewAttributes() ?>><?php echo $view_patient_services_grid->Resulted->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services_grid->Resulted->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services_grid->Resulted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services_grid->Resulted->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services_grid->Resulted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $view_patient_services_grid->ResultDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ResultDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ResultDate->EditValue ?>"<?php echo $view_patient_services_grid->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->ResultDate->ReadOnly && !$view_patient_services_grid->ResultDate->Disabled && !isset($view_patient_services_grid->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services_grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ResultDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ResultDate->EditValue ?>"<?php echo $view_patient_services_grid->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->ResultDate->ReadOnly && !$view_patient_services_grid->ResultDate->Disabled && !isset($view_patient_services_grid->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ResultDate">
<span<?php echo $view_patient_services_grid->ResultDate->viewAttributes() ?>><?php echo $view_patient_services_grid->ResultDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services_grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services_grid->ResultDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services_grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services_grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" <?php echo $view_patient_services_grid->ResultedBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ResultedBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ResultedBy->EditValue ?>"<?php echo $view_patient_services_grid->ResultedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services_grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ResultedBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ResultedBy->EditValue ?>"<?php echo $view_patient_services_grid->ResultedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ResultedBy">
<span<?php echo $view_patient_services_grid->ResultedBy->viewAttributes() ?>><?php echo $view_patient_services_grid->ResultedBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services_grid->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services_grid->ResultedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services_grid->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services_grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" <?php echo $view_patient_services_grid->SampleDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SampleDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SampleDate->EditValue ?>"<?php echo $view_patient_services_grid->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->SampleDate->ReadOnly && !$view_patient_services_grid->SampleDate->Disabled && !isset($view_patient_services_grid->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services_grid->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SampleDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SampleDate->EditValue ?>"<?php echo $view_patient_services_grid->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->SampleDate->ReadOnly && !$view_patient_services_grid->SampleDate->Disabled && !isset($view_patient_services_grid->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SampleDate">
<span<?php echo $view_patient_services_grid->SampleDate->viewAttributes() ?>><?php echo $view_patient_services_grid->SampleDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services_grid->SampleDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services_grid->SampleDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services_grid->SampleDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services_grid->SampleDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" <?php echo $view_patient_services_grid->SampleUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SampleUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SampleUser->EditValue ?>"<?php echo $view_patient_services_grid->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services_grid->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SampleUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SampleUser->EditValue ?>"<?php echo $view_patient_services_grid->SampleUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SampleUser">
<span<?php echo $view_patient_services_grid->SampleUser->viewAttributes() ?>><?php echo $view_patient_services_grid->SampleUser->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services_grid->SampleUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services_grid->SampleUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services_grid->SampleUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services_grid->SampleUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled" <?php echo $view_patient_services_grid->Sampled->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Sampled" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Sampled->EditValue ?>"<?php echo $view_patient_services_grid->Sampled->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services_grid->Sampled->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Sampled" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Sampled->EditValue ?>"<?php echo $view_patient_services_grid->Sampled->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Sampled">
<span<?php echo $view_patient_services_grid->Sampled->viewAttributes() ?>><?php echo $view_patient_services_grid->Sampled->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services_grid->Sampled->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services_grid->Sampled->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services_grid->Sampled->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services_grid->Sampled->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" <?php echo $view_patient_services_grid->ReceivedDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ReceivedDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ReceivedDate->EditValue ?>"<?php echo $view_patient_services_grid->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->ReceivedDate->ReadOnly && !$view_patient_services_grid->ReceivedDate->Disabled && !isset($view_patient_services_grid->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ReceivedDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ReceivedDate->EditValue ?>"<?php echo $view_patient_services_grid->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->ReceivedDate->ReadOnly && !$view_patient_services_grid->ReceivedDate->Disabled && !isset($view_patient_services_grid->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ReceivedDate">
<span<?php echo $view_patient_services_grid->ReceivedDate->viewAttributes() ?>><?php echo $view_patient_services_grid->ReceivedDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" <?php echo $view_patient_services_grid->ReceivedUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ReceivedUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ReceivedUser->EditValue ?>"<?php echo $view_patient_services_grid->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ReceivedUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ReceivedUser->EditValue ?>"<?php echo $view_patient_services_grid->ReceivedUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ReceivedUser">
<span<?php echo $view_patient_services_grid->ReceivedUser->viewAttributes() ?>><?php echo $view_patient_services_grid->ReceivedUser->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied" <?php echo $view_patient_services_grid->Recevied->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Recevied" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Recevied->EditValue ?>"<?php echo $view_patient_services_grid->Recevied->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services_grid->Recevied->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Recevied" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Recevied->EditValue ?>"<?php echo $view_patient_services_grid->Recevied->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Recevied">
<span<?php echo $view_patient_services_grid->Recevied->viewAttributes() ?>><?php echo $view_patient_services_grid->Recevied->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services_grid->Recevied->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services_grid->Recevied->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services_grid->Recevied->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services_grid->Recevied->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" <?php echo $view_patient_services_grid->DeptRecvDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DeptRecvDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services_grid->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->DeptRecvDate->ReadOnly && !$view_patient_services_grid->DeptRecvDate->Disabled && !isset($view_patient_services_grid->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DeptRecvDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services_grid->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->DeptRecvDate->ReadOnly && !$view_patient_services_grid->DeptRecvDate->Disabled && !isset($view_patient_services_grid->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DeptRecvDate">
<span<?php echo $view_patient_services_grid->DeptRecvDate->viewAttributes() ?>><?php echo $view_patient_services_grid->DeptRecvDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" <?php echo $view_patient_services_grid->DeptRecvUser->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DeptRecvUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services_grid->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DeptRecvUser" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services_grid->DeptRecvUser->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DeptRecvUser">
<span<?php echo $view_patient_services_grid->DeptRecvUser->viewAttributes() ?>><?php echo $view_patient_services_grid->DeptRecvUser->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvUser->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvUser->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived" <?php echo $view_patient_services_grid->DeptRecived->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DeptRecived" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DeptRecived->EditValue ?>"<?php echo $view_patient_services_grid->DeptRecived->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecived->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DeptRecived" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DeptRecived->EditValue ?>"<?php echo $view_patient_services_grid->DeptRecived->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_DeptRecived">
<span<?php echo $view_patient_services_grid->DeptRecived->viewAttributes() ?>><?php echo $view_patient_services_grid->DeptRecived->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecived->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecived->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecived->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecived->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" <?php echo $view_patient_services_grid->SAuthDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SAuthDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SAuthDate->EditValue ?>"<?php echo $view_patient_services_grid->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->SAuthDate->ReadOnly && !$view_patient_services_grid->SAuthDate->Disabled && !isset($view_patient_services_grid->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SAuthDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SAuthDate->EditValue ?>"<?php echo $view_patient_services_grid->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->SAuthDate->ReadOnly && !$view_patient_services_grid->SAuthDate->Disabled && !isset($view_patient_services_grid->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SAuthDate">
<span<?php echo $view_patient_services_grid->SAuthDate->viewAttributes() ?>><?php echo $view_patient_services_grid->SAuthDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" <?php echo $view_patient_services_grid->SAuthBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SAuthBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SAuthBy->EditValue ?>"<?php echo $view_patient_services_grid->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SAuthBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SAuthBy->EditValue ?>"<?php echo $view_patient_services_grid->SAuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SAuthBy">
<span<?php echo $view_patient_services_grid->SAuthBy->viewAttributes() ?>><?php echo $view_patient_services_grid->SAuthBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate" <?php echo $view_patient_services_grid->SAuthendicate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SAuthendicate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SAuthendicate->EditValue ?>"<?php echo $view_patient_services_grid->SAuthendicate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SAuthendicate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SAuthendicate->EditValue ?>"<?php echo $view_patient_services_grid->SAuthendicate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_SAuthendicate">
<span<?php echo $view_patient_services_grid->SAuthendicate->viewAttributes() ?>><?php echo $view_patient_services_grid->SAuthendicate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthendicate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthendicate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthendicate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" <?php echo $view_patient_services_grid->AuthDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_AuthDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->AuthDate->EditValue ?>"<?php echo $view_patient_services_grid->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->AuthDate->ReadOnly && !$view_patient_services_grid->AuthDate->Disabled && !isset($view_patient_services_grid->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_AuthDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->AuthDate->EditValue ?>"<?php echo $view_patient_services_grid->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->AuthDate->ReadOnly && !$view_patient_services_grid->AuthDate->Disabled && !isset($view_patient_services_grid->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_AuthDate">
<span<?php echo $view_patient_services_grid->AuthDate->viewAttributes() ?>><?php echo $view_patient_services_grid->AuthDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->AuthDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->AuthDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->AuthDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->AuthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" <?php echo $view_patient_services_grid->AuthBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_AuthBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->AuthBy->EditValue ?>"<?php echo $view_patient_services_grid->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_AuthBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->AuthBy->EditValue ?>"<?php echo $view_patient_services_grid->AuthBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_AuthBy">
<span<?php echo $view_patient_services_grid->AuthBy->viewAttributes() ?>><?php echo $view_patient_services_grid->AuthBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->AuthBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->AuthBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->AuthBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->AuthBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate" <?php echo $view_patient_services_grid->Authencate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Authencate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Authencate->EditValue ?>"<?php echo $view_patient_services_grid->Authencate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services_grid->Authencate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Authencate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Authencate->EditValue ?>"<?php echo $view_patient_services_grid->Authencate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Authencate">
<span<?php echo $view_patient_services_grid->Authencate->viewAttributes() ?>><?php echo $view_patient_services_grid->Authencate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services_grid->Authencate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services_grid->Authencate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services_grid->Authencate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services_grid->Authencate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" <?php echo $view_patient_services_grid->EditDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_EditDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->EditDate->EditValue ?>"<?php echo $view_patient_services_grid->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->EditDate->ReadOnly && !$view_patient_services_grid->EditDate->Disabled && !isset($view_patient_services_grid->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services_grid->EditDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_EditDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->EditDate->EditValue ?>"<?php echo $view_patient_services_grid->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->EditDate->ReadOnly && !$view_patient_services_grid->EditDate->Disabled && !isset($view_patient_services_grid->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_EditDate">
<span<?php echo $view_patient_services_grid->EditDate->viewAttributes() ?>><?php echo $view_patient_services_grid->EditDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services_grid->EditDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services_grid->EditDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services_grid->EditDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services_grid->EditDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy" <?php echo $view_patient_services_grid->EditBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_EditBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->EditBy->EditValue ?>"<?php echo $view_patient_services_grid->EditBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services_grid->EditBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_EditBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->EditBy->EditValue ?>"<?php echo $view_patient_services_grid->EditBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_EditBy">
<span<?php echo $view_patient_services_grid->EditBy->viewAttributes() ?>><?php echo $view_patient_services_grid->EditBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services_grid->EditBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services_grid->EditBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services_grid->EditBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services_grid->EditBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Editted->Visible) { // Editted ?>
		<td data-name="Editted" <?php echo $view_patient_services_grid->Editted->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Editted" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Editted->EditValue ?>"<?php echo $view_patient_services_grid->Editted->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services_grid->Editted->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Editted" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Editted->EditValue ?>"<?php echo $view_patient_services_grid->Editted->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Editted">
<span<?php echo $view_patient_services_grid->Editted->viewAttributes() ?>><?php echo $view_patient_services_grid->Editted->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services_grid->Editted->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services_grid->Editted->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services_grid->Editted->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services_grid->Editted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $view_patient_services_grid->PatID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PatID" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PatID->EditValue ?>"<?php echo $view_patient_services_grid->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services_grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PatID" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PatID->EditValue ?>"<?php echo $view_patient_services_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PatID">
<span<?php echo $view_patient_services_grid->PatID->viewAttributes() ?>><?php echo $view_patient_services_grid->PatID->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services_grid->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services_grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_patient_services_grid->PatientId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PatientId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PatientId->EditValue ?>"<?php echo $view_patient_services_grid->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PatientId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PatientId->EditValue ?>"<?php echo $view_patient_services_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_PatientId">
<span<?php echo $view_patient_services_grid->PatientId->viewAttributes() ?>><?php echo $view_patient_services_grid->PatientId->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services_grid->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_patient_services_grid->Mobile->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Mobile" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Mobile->EditValue ?>"<?php echo $view_patient_services_grid->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services_grid->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Mobile" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Mobile->EditValue ?>"<?php echo $view_patient_services_grid->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Mobile">
<span<?php echo $view_patient_services_grid->Mobile->viewAttributes() ?>><?php echo $view_patient_services_grid->Mobile->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services_grid->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services_grid->Mobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services_grid->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services_grid->Mobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->CId->Visible) { // CId ?>
		<td data-name="CId" <?php echo $view_patient_services_grid->CId->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_CId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->CId->EditValue ?>"<?php echo $view_patient_services_grid->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services_grid->CId->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_CId" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->CId->EditValue ?>"<?php echo $view_patient_services_grid->CId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_CId">
<span<?php echo $view_patient_services_grid->CId->viewAttributes() ?>><?php echo $view_patient_services_grid->CId->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services_grid->CId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services_grid->CId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services_grid->CId->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services_grid->CId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $view_patient_services_grid->Order->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Order" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Order->EditValue ?>"<?php echo $view_patient_services_grid->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services_grid->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Order" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Order->EditValue ?>"<?php echo $view_patient_services_grid->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Order">
<span<?php echo $view_patient_services_grid->Order->viewAttributes() ?>><?php echo $view_patient_services_grid->Order->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services_grid->Order->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services_grid->Order->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services_grid->Order->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services_grid->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ResType->Visible) { // ResType ?>
		<td data-name="ResType" <?php echo $view_patient_services_grid->ResType->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ResType" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ResType->EditValue ?>"<?php echo $view_patient_services_grid->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services_grid->ResType->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ResType" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ResType->EditValue ?>"<?php echo $view_patient_services_grid->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_ResType">
<span<?php echo $view_patient_services_grid->ResType->viewAttributes() ?>><?php echo $view_patient_services_grid->ResType->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services_grid->ResType->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services_grid->ResType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services_grid->ResType->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services_grid->ResType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Sample->Visible) { // Sample ?>
		<td data-name="Sample" <?php echo $view_patient_services_grid->Sample->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Sample" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Sample->EditValue ?>"<?php echo $view_patient_services_grid->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services_grid->Sample->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Sample" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Sample->EditValue ?>"<?php echo $view_patient_services_grid->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Sample">
<span<?php echo $view_patient_services_grid->Sample->viewAttributes() ?>><?php echo $view_patient_services_grid->Sample->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services_grid->Sample->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services_grid->Sample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services_grid->Sample->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services_grid->Sample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->NoD->Visible) { // NoD ?>
		<td data-name="NoD" <?php echo $view_patient_services_grid->NoD->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_NoD" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->NoD->EditValue ?>"<?php echo $view_patient_services_grid->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services_grid->NoD->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_NoD" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->NoD->EditValue ?>"<?php echo $view_patient_services_grid->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_NoD">
<span<?php echo $view_patient_services_grid->NoD->viewAttributes() ?>><?php echo $view_patient_services_grid->NoD->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services_grid->NoD->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services_grid->NoD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services_grid->NoD->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services_grid->NoD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" <?php echo $view_patient_services_grid->BillOrder->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_BillOrder" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->BillOrder->EditValue ?>"<?php echo $view_patient_services_grid->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services_grid->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_BillOrder" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->BillOrder->EditValue ?>"<?php echo $view_patient_services_grid->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_BillOrder">
<span<?php echo $view_patient_services_grid->BillOrder->viewAttributes() ?>><?php echo $view_patient_services_grid->BillOrder->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services_grid->BillOrder->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services_grid->BillOrder->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services_grid->BillOrder->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services_grid->BillOrder->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" <?php echo $view_patient_services_grid->Inactive->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Inactive" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Inactive->EditValue ?>"<?php echo $view_patient_services_grid->Inactive->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services_grid->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Inactive" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Inactive->EditValue ?>"<?php echo $view_patient_services_grid->Inactive->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Inactive">
<span<?php echo $view_patient_services_grid->Inactive->viewAttributes() ?>><?php echo $view_patient_services_grid->Inactive->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services_grid->Inactive->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services_grid->Inactive->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services_grid->Inactive->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services_grid->Inactive->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" <?php echo $view_patient_services_grid->CollSample->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_CollSample" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->CollSample->EditValue ?>"<?php echo $view_patient_services_grid->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services_grid->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_CollSample" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->CollSample->EditValue ?>"<?php echo $view_patient_services_grid->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_CollSample">
<span<?php echo $view_patient_services_grid->CollSample->viewAttributes() ?>><?php echo $view_patient_services_grid->CollSample->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services_grid->CollSample->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services_grid->CollSample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services_grid->CollSample->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services_grid->CollSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestType->Visible) { // TestType ?>
		<td data-name="TestType" <?php echo $view_patient_services_grid->TestType->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestType" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TestType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TestType->EditValue ?>"<?php echo $view_patient_services_grid->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services_grid->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestType" class="form-group">
<span<?php echo $view_patient_services_grid->TestType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->TestType->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services_grid->TestType->CurrentValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_TestType">
<span<?php echo $view_patient_services_grid->TestType->viewAttributes() ?>><?php echo $view_patient_services_grid->TestType->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services_grid->TestType->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services_grid->TestType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services_grid->TestType->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services_grid->TestType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" <?php echo $view_patient_services_grid->Repeated->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Repeated" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Repeated->EditValue ?>"<?php echo $view_patient_services_grid->Repeated->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services_grid->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Repeated" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Repeated->EditValue ?>"<?php echo $view_patient_services_grid->Repeated->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Repeated">
<span<?php echo $view_patient_services_grid->Repeated->viewAttributes() ?>><?php echo $view_patient_services_grid->Repeated->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services_grid->Repeated->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services_grid->Repeated->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services_grid->Repeated->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services_grid->Repeated->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy" <?php echo $view_patient_services_grid->RepeatedBy->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RepeatedBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RepeatedBy->EditValue ?>"<?php echo $view_patient_services_grid->RepeatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RepeatedBy" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RepeatedBy->EditValue ?>"<?php echo $view_patient_services_grid->RepeatedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RepeatedBy">
<span<?php echo $view_patient_services_grid->RepeatedBy->viewAttributes() ?>><?php echo $view_patient_services_grid->RepeatedBy->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedBy->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate" <?php echo $view_patient_services_grid->RepeatedDate->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RepeatedDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RepeatedDate->EditValue ?>"<?php echo $view_patient_services_grid->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->RepeatedDate->ReadOnly && !$view_patient_services_grid->RepeatedDate->Disabled && !isset($view_patient_services_grid->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RepeatedDate" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RepeatedDate->EditValue ?>"<?php echo $view_patient_services_grid->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->RepeatedDate->ReadOnly && !$view_patient_services_grid->RepeatedDate->Disabled && !isset($view_patient_services_grid->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RepeatedDate">
<span<?php echo $view_patient_services_grid->RepeatedDate->viewAttributes() ?>><?php echo $view_patient_services_grid->RepeatedDate->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedDate->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID" <?php echo $view_patient_services_grid->serviceID->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_serviceID" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->serviceID->EditValue ?>"<?php echo $view_patient_services_grid->serviceID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services_grid->serviceID->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_serviceID" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->serviceID->EditValue ?>"<?php echo $view_patient_services_grid->serviceID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_serviceID">
<span<?php echo $view_patient_services_grid->serviceID->viewAttributes() ?>><?php echo $view_patient_services_grid->serviceID->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services_grid->serviceID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services_grid->serviceID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services_grid->serviceID->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services_grid->serviceID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type" <?php echo $view_patient_services_grid->Service_Type->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Service_Type" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Service_Type->EditValue ?>"<?php echo $view_patient_services_grid->Service_Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Type->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Service_Type" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Service_Type->EditValue ?>"<?php echo $view_patient_services_grid->Service_Type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Service_Type">
<span<?php echo $view_patient_services_grid->Service_Type->viewAttributes() ?>><?php echo $view_patient_services_grid->Service_Type->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Type->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Type->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department" <?php echo $view_patient_services_grid->Service_Department->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Service_Department" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Service_Department->EditValue ?>"<?php echo $view_patient_services_grid->Service_Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Department->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Service_Department" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Service_Department->EditValue ?>"<?php echo $view_patient_services_grid->Service_Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_Service_Department">
<span<?php echo $view_patient_services_grid->Service_Department->viewAttributes() ?>><?php echo $view_patient_services_grid->Service_Department->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Department->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Department->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo" <?php echo $view_patient_services_grid->RequestNo->cellAttributes() ?>>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RequestNo" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RequestNo->EditValue ?>"<?php echo $view_patient_services_grid->RequestNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services_grid->RequestNo->OldValue) ?>">
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RequestNo" class="form-group">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RequestNo->EditValue ?>"<?php echo $view_patient_services_grid->RequestNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_patient_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_patient_services_grid->RowCount ?>_view_patient_services_RequestNo">
<span<?php echo $view_patient_services_grid->RequestNo->viewAttributes() ?>><?php echo $view_patient_services_grid->RequestNo->getViewValue() ?></span>
</span>
<?php if (!$view_patient_services->isConfirm()) { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services_grid->RequestNo->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services_grid->RequestNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="fview_patient_servicesgrid$x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services_grid->RequestNo->FormValue) ?>">
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="fview_patient_servicesgrid$o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services_grid->RequestNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_services_grid->ListOptions->render("body", "right", $view_patient_services_grid->RowCount);
?>
	</tr>
<?php if ($view_patient_services->RowType == ROWTYPE_ADD || $view_patient_services->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "load"], function() {
	fview_patient_servicesgrid.updateLists(<?php echo $view_patient_services_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_patient_services_grid->isGridAdd() || $view_patient_services->CurrentMode == "copy")
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
		$view_patient_services->RowAttrs->merge(["data-rowindex" => $view_patient_services_grid->RowIndex, "id" => "r0_view_patient_services", "data-rowtype" => ROWTYPE_ADD]);
		$view_patient_services->RowAttrs->appendClass("ew-template");
		$view_patient_services->RowType = ROWTYPE_ADD;

		// Render row
		$view_patient_services_grid->renderRow();

		// Render list options
		$view_patient_services_grid->renderListOptions();
		$view_patient_services_grid->StartRowCount = 0;
?>
	<tr <?php echo $view_patient_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_services_grid->ListOptions->render("body", "left", $view_patient_services_grid->RowIndex);
?>
	<?php if ($view_patient_services_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_id" class="form-group view_patient_services_id"></span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_id" class="form-group view_patient_services_id">
<span<?php echo $view_patient_services_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="x<?php echo $view_patient_services_grid->RowIndex ?>_id" id="x<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_id" name="o<?php echo $view_patient_services_grid->RowIndex ?>_id" id="o<?php echo $view_patient_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_patient_services_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Reception" class="form-group view_patient_services_Reception">
<input type="text" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Reception->EditValue ?>"<?php echo $view_patient_services_grid->Reception->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Reception" class="form-group view_patient_services_Reception">
<span<?php echo $view_patient_services_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services_grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_patient_services_grid->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_mrnno" class="form-group view_patient_services_mrnno">
<input type="text" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->mrnno->EditValue ?>"<?php echo $view_patient_services_grid->mrnno->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_mrnno" class="form-group view_patient_services_mrnno">
<span<?php echo $view_patient_services_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="x<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services_grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" name="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" id="o<?php echo $view_patient_services_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_patient_services_grid->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_PatientName" class="form-group view_patient_services_PatientName">
<input type="text" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PatientName->EditValue ?>"<?php echo $view_patient_services_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_PatientName" class="form-group view_patient_services_PatientName">
<span<?php echo $view_patient_services_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_patient_services_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Age" class="form-group view_patient_services_Age">
<input type="text" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Age->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Age->EditValue ?>"<?php echo $view_patient_services_grid->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Age" class="form-group view_patient_services_Age">
<span<?php echo $view_patient_services_grid->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Age->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services_grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_patient_services_grid->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Gender" class="form-group view_patient_services_Gender">
<input type="text" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Gender->EditValue ?>"<?php echo $view_patient_services_grid->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Gender" class="form-group view_patient_services_Gender">
<span<?php echo $view_patient_services_grid->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Gender->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services_grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_patient_services_grid->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_profilePic" class="form-group view_patient_services_profilePic">
<textarea data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_grid->profilePic->getPlaceHolder()) ?>"<?php echo $view_patient_services_grid->profilePic->editAttributes() ?>><?php echo $view_patient_services_grid->profilePic->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_profilePic" class="form-group view_patient_services_profilePic">
<span<?php echo $view_patient_services_grid->profilePic->viewAttributes() ?>><?php echo $view_patient_services_grid->profilePic->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="x<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services_grid->profilePic->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" name="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" id="o<?php echo $view_patient_services_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($view_patient_services_grid->profilePic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Services->Visible) { // Services ?>
		<td data-name="Services">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Services" class="form-group view_patient_services_Services">
<?php
$onchange = $view_patient_services_grid->Services->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_patient_services_grid->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_patient_services_grid->RowIndex ?>_Services">
	<input type="text" class="form-control" name="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="sv_x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo RemoveHtml($view_patient_services_grid->Services->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Services->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_patient_services_grid->Services->getPlaceHolder()) ?>"<?php echo $view_patient_services_grid->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" data-value-separator="<?php echo $view_patient_services_grid->Services->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_grid->Services->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_patient_servicesgrid"], function() {
	fview_patient_servicesgrid.createAutoSuggest({"id":"x<?php echo $view_patient_services_grid->RowIndex ?>_Services","forceSelect":false});
});
</script>
<?php echo $view_patient_services_grid->Services->Lookup->getParamTag($view_patient_services_grid, "p_x" . $view_patient_services_grid->RowIndex . "_Services") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Services" class="form-group view_patient_services_Services">
<span<?php echo $view_patient_services_grid->Services->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Services->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_grid->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Services" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_patient_services_grid->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Unit->Visible) { // Unit ?>
		<td data-name="Unit">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Unit" class="form-group view_patient_services_Unit">
<input type="text" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Unit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Unit->EditValue ?>"<?php echo $view_patient_services_grid->Unit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Unit" class="form-group view_patient_services_Unit">
<span<?php echo $view_patient_services_grid->Unit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Unit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services_grid->Unit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Unit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($view_patient_services_grid->Unit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->amount->Visible) { // amount ?>
		<td data-name="amount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_amount" class="form-group view_patient_services_amount">
<input type="text" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" size="7" maxlength="7" placeholder="<?php echo HtmlEncode($view_patient_services_grid->amount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->amount->EditValue ?>"<?php echo $view_patient_services_grid->amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_amount" class="form-group view_patient_services_amount">
<span<?php echo $view_patient_services_grid->amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->amount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services_grid->amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_amount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_patient_services_grid->amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Quantity" class="form-group view_patient_services_Quantity">
<input type="text" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Quantity->EditValue ?>"<?php echo $view_patient_services_grid->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Quantity" class="form-group view_patient_services_Quantity">
<span<?php echo $view_patient_services_grid->Quantity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Quantity->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services_grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Quantity" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_patient_services_grid->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DiscountCategory" class="form-group view_patient_services_DiscountCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_services" data-field="x_DiscountCategory" data-value-separator="<?php echo $view_patient_services_grid->DiscountCategory->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory"<?php echo $view_patient_services_grid->DiscountCategory->editAttributes() ?>>
			<?php echo $view_patient_services_grid->DiscountCategory->selectOptionListHtml("x{$view_patient_services_grid->RowIndex}_DiscountCategory") ?>
		</select>
</div>
<?php echo $view_patient_services_grid->DiscountCategory->Lookup->getParamTag($view_patient_services_grid, "p_x" . $view_patient_services_grid->RowIndex . "_DiscountCategory") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DiscountCategory" class="form-group view_patient_services_DiscountCategory">
<span<?php echo $view_patient_services_grid->DiscountCategory->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DiscountCategory->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services_grid->DiscountCategory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DiscountCategory" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DiscountCategory" value="<?php echo HtmlEncode($view_patient_services_grid->DiscountCategory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Discount->Visible) { // Discount ?>
		<td data-name="Discount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Discount" class="form-group view_patient_services_Discount">
<input type="text" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Discount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Discount->EditValue ?>"<?php echo $view_patient_services_grid->Discount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Discount" class="form-group view_patient_services_Discount">
<span<?php echo $view_patient_services_grid->Discount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Discount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services_grid->Discount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Discount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Discount" value="<?php echo HtmlEncode($view_patient_services_grid->Discount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SubTotal" class="form-group view_patient_services_SubTotal">
<input type="text" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SubTotal->EditValue ?>"<?php echo $view_patient_services_grid->SubTotal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SubTotal" class="form-group view_patient_services_SubTotal">
<span<?php echo $view_patient_services_grid->SubTotal->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->SubTotal->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services_grid->SubTotal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SubTotal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_patient_services_grid->SubTotal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->description->Visible) { // description ?>
		<td data-name="description">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_description" class="form-group view_patient_services_description">
<textarea data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="x<?php echo $view_patient_services_grid->RowIndex ?>_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_services_grid->description->getPlaceHolder()) ?>"<?php echo $view_patient_services_grid->description->editAttributes() ?>><?php echo $view_patient_services_grid->description->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_description" class="form-group view_patient_services_description">
<span<?php echo $view_patient_services_grid->description->viewAttributes() ?>><?php echo $view_patient_services_grid->description->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="x<?php echo $view_patient_services_grid->RowIndex ?>_description" id="x<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services_grid->description->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_description" name="o<?php echo $view_patient_services_grid->RowIndex ?>_description" id="o<?php echo $view_patient_services_grid->RowIndex ?>_description" value="<?php echo HtmlEncode($view_patient_services_grid->description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_patient_type" class="form-group view_patient_services_patient_type">
<input type="text" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->patient_type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->patient_type->EditValue ?>"<?php echo $view_patient_services_grid->patient_type->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_patient_type" class="form-group view_patient_services_patient_type">
<span<?php echo $view_patient_services_grid->patient_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->patient_type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services_grid->patient_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_patient_type" value="<?php echo HtmlEncode($view_patient_services_grid->patient_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_charged_date" class="form-group view_patient_services_charged_date">
<input type="text" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" placeholder="<?php echo HtmlEncode($view_patient_services_grid->charged_date->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->charged_date->EditValue ?>"<?php echo $view_patient_services_grid->charged_date->editAttributes() ?>>
<?php if (!$view_patient_services_grid->charged_date->ReadOnly && !$view_patient_services_grid->charged_date->Disabled && !isset($view_patient_services_grid->charged_date->EditAttrs["readonly"]) && !isset($view_patient_services_grid->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_charged_date" class="form-group view_patient_services_charged_date">
<span<?php echo $view_patient_services_grid->charged_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->charged_date->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="x<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services_grid->charged_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" name="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" id="o<?php echo $view_patient_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($view_patient_services_grid->charged_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_status" class="form-group view_patient_services_status">
<input type="text" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="x<?php echo $view_patient_services_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->status->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->status->EditValue ?>"<?php echo $view_patient_services_grid->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_status" class="form-group view_patient_services_status">
<span<?php echo $view_patient_services_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="x<?php echo $view_patient_services_grid->RowIndex ?>_status" id="x<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_status" name="o<?php echo $view_patient_services_grid->RowIndex ?>_status" id="o<?php echo $view_patient_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($view_patient_services_grid->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_createdby" class="form-group view_patient_services_createdby">
<span<?php echo $view_patient_services_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="x<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createdby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_patient_services_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_createddatetime" class="form-group view_patient_services_createddatetime">
<span<?php echo $view_patient_services_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_createddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_modifiedby" class="form-group view_patient_services_modifiedby">
<span<?php echo $view_patient_services_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifiedby" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_patient_services_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_modifieddatetime" class="form-group view_patient_services_modifieddatetime">
<span<?php echo $view_patient_services_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modifieddatetime" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_patient_services_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Aid->Visible) { // Aid ?>
		<td data-name="Aid">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Aid" class="form-group view_patient_services_Aid">
<input type="text" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Aid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Aid->EditValue ?>"<?php echo $view_patient_services_grid->Aid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Aid" class="form-group view_patient_services_Aid">
<span<?php echo $view_patient_services_grid->Aid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Aid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services_grid->Aid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Aid" value="<?php echo HtmlEncode($view_patient_services_grid->Aid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php if ($view_patient_services_grid->Vid->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<span<?php echo $view_patient_services_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_grid->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<input type="text" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Vid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Vid->EditValue ?>"<?php echo $view_patient_services_grid->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Vid" class="form-group view_patient_services_Vid">
<span<?php echo $view_patient_services_grid->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_grid->Vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_patient_services_grid->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrID" class="form-group view_patient_services_DrID">
<input type="text" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrID->EditValue ?>"<?php echo $view_patient_services_grid->DrID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrID" class="form-group view_patient_services_DrID">
<span<?php echo $view_patient_services_grid->DrID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DrID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services_grid->DrID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_patient_services_grid->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrCODE" class="form-group view_patient_services_DrCODE">
<input type="text" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrCODE->EditValue ?>"<?php echo $view_patient_services_grid->DrCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrCODE" class="form-group view_patient_services_DrCODE">
<span<?php echo $view_patient_services_grid->DrCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DrCODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services_grid->DrCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_patient_services_grid->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrName" class="form-group view_patient_services_DrName">
<input type="text" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrName->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrName->EditValue ?>"<?php echo $view_patient_services_grid->DrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrName" class="form-group view_patient_services_DrName">
<span<?php echo $view_patient_services_grid->DrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DrName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services_grid->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_patient_services_grid->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Department->Visible) { // Department ?>
		<td data-name="Department">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Department" class="form-group view_patient_services_Department">
<input type="text" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Department->EditValue ?>"<?php echo $view_patient_services_grid->Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Department" class="form-group view_patient_services_Department">
<span<?php echo $view_patient_services_grid->Department->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Department->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrSharePres" class="form-group view_patient_services_DrSharePres">
<input type="text" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrSharePres->EditValue ?>"<?php echo $view_patient_services_grid->DrSharePres->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrSharePres" class="form-group view_patient_services_DrSharePres">
<span<?php echo $view_patient_services_grid->DrSharePres->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DrSharePres->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->DrSharePres->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->DrSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_HospSharePres" class="form-group view_patient_services_HospSharePres">
<input type="text" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->HospSharePres->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->HospSharePres->EditValue ?>"<?php echo $view_patient_services_grid->HospSharePres->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_HospSharePres" class="form-group view_patient_services_HospSharePres">
<span<?php echo $view_patient_services_grid->HospSharePres->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->HospSharePres->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->HospSharePres->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospSharePres" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospSharePres" value="<?php echo HtmlEncode($view_patient_services_grid->HospSharePres->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrShareAmount" class="form-group view_patient_services_DrShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareAmount->EditValue ?>"<?php echo $view_patient_services_grid->DrShareAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrShareAmount" class="form-group view_patient_services_DrShareAmount">
<span<?php echo $view_patient_services_grid->DrShareAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DrShareAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_HospShareAmount" class="form-group view_patient_services_HospShareAmount">
<input type="text" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->HospShareAmount->EditValue ?>"<?php echo $view_patient_services_grid->HospShareAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_HospShareAmount" class="form-group view_patient_services_HospShareAmount">
<span<?php echo $view_patient_services_grid->HospShareAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->HospShareAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->HospShareAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospShareAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospShareAmount" value="<?php echo HtmlEncode($view_patient_services_grid->HospShareAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettiledAmount" class="form-group view_patient_services_DrShareSettiledAmount">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareSettiledAmount->EditValue ?>"<?php echo $view_patient_services_grid->DrShareSettiledAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettiledAmount" class="form-group view_patient_services_DrShareSettiledAmount">
<span<?php echo $view_patient_services_grid->DrShareSettiledAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DrShareSettiledAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledAmount" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettledId" class="form-group view_patient_services_DrShareSettledId">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettledId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareSettledId->EditValue ?>"<?php echo $view_patient_services_grid->DrShareSettledId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettledId" class="form-group view_patient_services_DrShareSettledId">
<span<?php echo $view_patient_services_grid->DrShareSettledId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DrShareSettledId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettledId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettledId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettledId" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettledId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettiledStatus" class="form-group view_patient_services_DrShareSettiledStatus">
<input type="text" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DrShareSettiledStatus->EditValue ?>"<?php echo $view_patient_services_grid->DrShareSettiledStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DrShareSettiledStatus" class="form-group view_patient_services_DrShareSettiledStatus">
<span<?php echo $view_patient_services_grid->DrShareSettiledStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DrShareSettiledStatus->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DrShareSettiledStatus" value="<?php echo HtmlEncode($view_patient_services_grid->DrShareSettiledStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_invoiceId" class="form-group view_patient_services_invoiceId">
<input type="text" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->invoiceId->EditValue ?>"<?php echo $view_patient_services_grid->invoiceId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_invoiceId" class="form-group view_patient_services_invoiceId">
<span<?php echo $view_patient_services_grid->invoiceId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->invoiceId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_invoiceAmount" class="form-group view_patient_services_invoiceAmount">
<input type="text" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->invoiceAmount->EditValue ?>"<?php echo $view_patient_services_grid->invoiceAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_invoiceAmount" class="form-group view_patient_services_invoiceAmount">
<span<?php echo $view_patient_services_grid->invoiceAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->invoiceAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceAmount" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceAmount" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_invoiceStatus" class="form-group view_patient_services_invoiceStatus">
<input type="text" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->invoiceStatus->EditValue ?>"<?php echo $view_patient_services_grid->invoiceStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_invoiceStatus" class="form-group view_patient_services_invoiceStatus">
<span<?php echo $view_patient_services_grid->invoiceStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->invoiceStatus->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="x<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_invoiceStatus" name="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" id="o<?php echo $view_patient_services_grid->RowIndex ?>_invoiceStatus" value="<?php echo HtmlEncode($view_patient_services_grid->invoiceStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_modeOfPayment" class="form-group view_patient_services_modeOfPayment">
<input type="text" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->modeOfPayment->EditValue ?>"<?php echo $view_patient_services_grid->modeOfPayment->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_modeOfPayment" class="form-group view_patient_services_modeOfPayment">
<span<?php echo $view_patient_services_grid->modeOfPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->modeOfPayment->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="x<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services_grid->modeOfPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_modeOfPayment" name="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" id="o<?php echo $view_patient_services_grid->RowIndex ?>_modeOfPayment" value="<?php echo HtmlEncode($view_patient_services_grid->modeOfPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_patient_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_HospID" class="form-group view_patient_services_HospID">
<span<?php echo $view_patient_services_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_HospID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_patient_services_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_RIDNO" class="form-group view_patient_services_RIDNO">
<input type="text" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RIDNO->EditValue ?>"<?php echo $view_patient_services_grid->RIDNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_RIDNO" class="form-group view_patient_services_RIDNO">
<span<?php echo $view_patient_services_grid->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->RIDNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services_grid->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RIDNO" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($view_patient_services_grid->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ItemCode" class="form-group view_patient_services_ItemCode">
<input type="text" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ItemCode->EditValue ?>"<?php echo $view_patient_services_grid->ItemCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ItemCode" class="form-group view_patient_services_ItemCode">
<span<?php echo $view_patient_services_grid->ItemCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->ItemCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services_grid->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ItemCode" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_patient_services_grid->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_TidNo" class="form-group view_patient_services_TidNo">
<input type="text" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TidNo->EditValue ?>"<?php echo $view_patient_services_grid->TidNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_TidNo" class="form-group view_patient_services_TidNo">
<span<?php echo $view_patient_services_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services_grid->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TidNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_patient_services_grid->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->sid->Visible) { // sid ?>
		<td data-name="sid">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_sid" class="form-group view_patient_services_sid">
<input type="text" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_patient_services_grid->sid->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->sid->EditValue ?>"<?php echo $view_patient_services_grid->sid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_sid" class="form-group view_patient_services_sid">
<span<?php echo $view_patient_services_grid->sid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->sid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="x<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services_grid->sid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_sid" name="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" id="o<?php echo $view_patient_services_grid->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_patient_services_grid->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_TestSubCd" class="form-group view_patient_services_TestSubCd">
<input type="text" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TestSubCd->EditValue ?>"<?php echo $view_patient_services_grid->TestSubCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_TestSubCd" class="form-group view_patient_services_TestSubCd">
<span<?php echo $view_patient_services_grid->TestSubCd->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->TestSubCd->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services_grid->TestSubCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestSubCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_patient_services_grid->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DEptCd" class="form-group view_patient_services_DEptCd">
<input type="text" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DEptCd->EditValue ?>"<?php echo $view_patient_services_grid->DEptCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DEptCd" class="form-group view_patient_services_DEptCd">
<span<?php echo $view_patient_services_grid->DEptCd->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DEptCd->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services_grid->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DEptCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_patient_services_grid->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ProfCd" class="form-group view_patient_services_ProfCd">
<input type="text" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ProfCd->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ProfCd->EditValue ?>"<?php echo $view_patient_services_grid->ProfCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ProfCd" class="form-group view_patient_services_ProfCd">
<span<?php echo $view_patient_services_grid->ProfCd->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->ProfCd->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services_grid->ProfCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ProfCd" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($view_patient_services_grid->ProfCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Comments->Visible) { // Comments ?>
		<td data-name="Comments">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Comments" class="form-group view_patient_services_Comments">
<input type="text" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Comments->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Comments->EditValue ?>"<?php echo $view_patient_services_grid->Comments->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Comments" class="form-group view_patient_services_Comments">
<span<?php echo $view_patient_services_grid->Comments->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Comments->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services_grid->Comments->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Comments" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_patient_services_grid->Comments->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Method->Visible) { // Method ?>
		<td data-name="Method">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Method" class="form-group view_patient_services_Method">
<input type="text" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Method->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Method->EditValue ?>"<?php echo $view_patient_services_grid->Method->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Method" class="form-group view_patient_services_Method">
<span<?php echo $view_patient_services_grid->Method->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Method->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services_grid->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Method" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_patient_services_grid->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Specimen" class="form-group view_patient_services_Specimen">
<input type="text" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Specimen->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Specimen->EditValue ?>"<?php echo $view_patient_services_grid->Specimen->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Specimen" class="form-group view_patient_services_Specimen">
<span<?php echo $view_patient_services_grid->Specimen->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Specimen->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services_grid->Specimen->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Specimen" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($view_patient_services_grid->Specimen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Abnormal" class="form-group view_patient_services_Abnormal">
<input type="text" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Abnormal->EditValue ?>"<?php echo $view_patient_services_grid->Abnormal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Abnormal" class="form-group view_patient_services_Abnormal">
<span<?php echo $view_patient_services_grid->Abnormal->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Abnormal->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services_grid->Abnormal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Abnormal" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($view_patient_services_grid->Abnormal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_TestUnit" class="form-group view_patient_services_TestUnit">
<input type="text" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TestUnit->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TestUnit->EditValue ?>"<?php echo $view_patient_services_grid->TestUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_TestUnit" class="form-group view_patient_services_TestUnit">
<span<?php echo $view_patient_services_grid->TestUnit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->TestUnit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services_grid->TestUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestUnit" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_patient_services_grid->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_LOWHIGH" class="form-group view_patient_services_LOWHIGH">
<input type="text" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->LOWHIGH->EditValue ?>"<?php echo $view_patient_services_grid->LOWHIGH->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_LOWHIGH" class="form-group view_patient_services_LOWHIGH">
<span<?php echo $view_patient_services_grid->LOWHIGH->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->LOWHIGH->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="x<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services_grid->LOWHIGH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_LOWHIGH" name="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" id="o<?php echo $view_patient_services_grid->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($view_patient_services_grid->LOWHIGH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Branch->Visible) { // Branch ?>
		<td data-name="Branch">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Branch" class="form-group view_patient_services_Branch">
<input type="text" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Branch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Branch->EditValue ?>"<?php echo $view_patient_services_grid->Branch->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Branch" class="form-group view_patient_services_Branch">
<span<?php echo $view_patient_services_grid->Branch->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Branch->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services_grid->Branch->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Branch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Branch" value="<?php echo HtmlEncode($view_patient_services_grid->Branch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Dispatch" class="form-group view_patient_services_Dispatch">
<input type="text" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Dispatch->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Dispatch->EditValue ?>"<?php echo $view_patient_services_grid->Dispatch->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Dispatch" class="form-group view_patient_services_Dispatch">
<span<?php echo $view_patient_services_grid->Dispatch->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Dispatch->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services_grid->Dispatch->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Dispatch" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($view_patient_services_grid->Dispatch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Pic1" class="form-group view_patient_services_Pic1">
<input type="text" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Pic1->EditValue ?>"<?php echo $view_patient_services_grid->Pic1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Pic1" class="form-group view_patient_services_Pic1">
<span<?php echo $view_patient_services_grid->Pic1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Pic1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services_grid->Pic1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic1" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_patient_services_grid->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Pic2" class="form-group view_patient_services_Pic2">
<input type="text" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Pic2->EditValue ?>"<?php echo $view_patient_services_grid->Pic2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Pic2" class="form-group view_patient_services_Pic2">
<span<?php echo $view_patient_services_grid->Pic2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Pic2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services_grid->Pic2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Pic2" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_patient_services_grid->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_GraphPath" class="form-group view_patient_services_GraphPath">
<input type="text" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->GraphPath->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->GraphPath->EditValue ?>"<?php echo $view_patient_services_grid->GraphPath->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_GraphPath" class="form-group view_patient_services_GraphPath">
<span<?php echo $view_patient_services_grid->GraphPath->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->GraphPath->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="x<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services_grid->GraphPath->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_GraphPath" name="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" id="o<?php echo $view_patient_services_grid->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($view_patient_services_grid->GraphPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_MachineCD" class="form-group view_patient_services_MachineCD">
<input type="text" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->MachineCD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->MachineCD->EditValue ?>"<?php echo $view_patient_services_grid->MachineCD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_MachineCD" class="form-group view_patient_services_MachineCD">
<span<?php echo $view_patient_services_grid->MachineCD->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->MachineCD->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services_grid->MachineCD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_MachineCD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($view_patient_services_grid->MachineCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_TestCancel" class="form-group view_patient_services_TestCancel">
<input type="text" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TestCancel->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TestCancel->EditValue ?>"<?php echo $view_patient_services_grid->TestCancel->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_TestCancel" class="form-group view_patient_services_TestCancel">
<span<?php echo $view_patient_services_grid->TestCancel->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->TestCancel->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services_grid->TestCancel->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestCancel" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($view_patient_services_grid->TestCancel->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_OutSource" class="form-group view_patient_services_OutSource">
<input type="text" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->OutSource->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->OutSource->EditValue ?>"<?php echo $view_patient_services_grid->OutSource->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_OutSource" class="form-group view_patient_services_OutSource">
<span<?php echo $view_patient_services_grid->OutSource->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->OutSource->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="x<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services_grid->OutSource->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_OutSource" name="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" id="o<?php echo $view_patient_services_grid->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($view_patient_services_grid->OutSource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Printed->Visible) { // Printed ?>
		<td data-name="Printed">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Printed" class="form-group view_patient_services_Printed">
<input type="text" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Printed->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Printed->EditValue ?>"<?php echo $view_patient_services_grid->Printed->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Printed" class="form-group view_patient_services_Printed">
<span<?php echo $view_patient_services_grid->Printed->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Printed->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services_grid->Printed->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Printed" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Printed" value="<?php echo HtmlEncode($view_patient_services_grid->Printed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_PrintBy" class="form-group view_patient_services_PrintBy">
<input type="text" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PrintBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PrintBy->EditValue ?>"<?php echo $view_patient_services_grid->PrintBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_PrintBy" class="form-group view_patient_services_PrintBy">
<span<?php echo $view_patient_services_grid->PrintBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->PrintBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services_grid->PrintBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($view_patient_services_grid->PrintBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_PrintDate" class="form-group view_patient_services_PrintDate">
<input type="text" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PrintDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PrintDate->EditValue ?>"<?php echo $view_patient_services_grid->PrintDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->PrintDate->ReadOnly && !$view_patient_services_grid->PrintDate->Disabled && !isset($view_patient_services_grid->PrintDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_PrintDate" class="form-group view_patient_services_PrintDate">
<span<?php echo $view_patient_services_grid->PrintDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->PrintDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services_grid->PrintDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PrintDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($view_patient_services_grid->PrintDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_BillingDate" class="form-group view_patient_services_BillingDate">
<input type="text" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->BillingDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->BillingDate->EditValue ?>"<?php echo $view_patient_services_grid->BillingDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->BillingDate->ReadOnly && !$view_patient_services_grid->BillingDate->Disabled && !isset($view_patient_services_grid->BillingDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_BillingDate" class="form-group view_patient_services_BillingDate">
<span<?php echo $view_patient_services_grid->BillingDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->BillingDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services_grid->BillingDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillingDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillingDate" value="<?php echo HtmlEncode($view_patient_services_grid->BillingDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_BilledBy" class="form-group view_patient_services_BilledBy">
<input type="text" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->BilledBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->BilledBy->EditValue ?>"<?php echo $view_patient_services_grid->BilledBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_BilledBy" class="form-group view_patient_services_BilledBy">
<span<?php echo $view_patient_services_grid->BilledBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->BilledBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services_grid->BilledBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BilledBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BilledBy" value="<?php echo HtmlEncode($view_patient_services_grid->BilledBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Resulted" class="form-group view_patient_services_Resulted">
<input type="text" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Resulted->EditValue ?>"<?php echo $view_patient_services_grid->Resulted->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Resulted" class="form-group view_patient_services_Resulted">
<span<?php echo $view_patient_services_grid->Resulted->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Resulted->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services_grid->Resulted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Resulted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Resulted" value="<?php echo HtmlEncode($view_patient_services_grid->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ResultDate" class="form-group view_patient_services_ResultDate">
<input type="text" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ResultDate->EditValue ?>"<?php echo $view_patient_services_grid->ResultDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->ResultDate->ReadOnly && !$view_patient_services_grid->ResultDate->Disabled && !isset($view_patient_services_grid->ResultDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ResultDate" class="form-group view_patient_services_ResultDate">
<span<?php echo $view_patient_services_grid->ResultDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->ResultDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services_grid->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_patient_services_grid->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ResultedBy" class="form-group view_patient_services_ResultedBy">
<input type="text" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ResultedBy->EditValue ?>"<?php echo $view_patient_services_grid->ResultedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ResultedBy" class="form-group view_patient_services_ResultedBy">
<span<?php echo $view_patient_services_grid->ResultedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->ResultedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services_grid->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResultedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_patient_services_grid->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SampleDate" class="form-group view_patient_services_SampleDate">
<input type="text" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SampleDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SampleDate->EditValue ?>"<?php echo $view_patient_services_grid->SampleDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->SampleDate->ReadOnly && !$view_patient_services_grid->SampleDate->Disabled && !isset($view_patient_services_grid->SampleDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SampleDate" class="form-group view_patient_services_SampleDate">
<span<?php echo $view_patient_services_grid->SampleDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->SampleDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services_grid->SampleDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($view_patient_services_grid->SampleDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SampleUser" class="form-group view_patient_services_SampleUser">
<input type="text" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SampleUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SampleUser->EditValue ?>"<?php echo $view_patient_services_grid->SampleUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SampleUser" class="form-group view_patient_services_SampleUser">
<span<?php echo $view_patient_services_grid->SampleUser->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->SampleUser->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services_grid->SampleUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SampleUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($view_patient_services_grid->SampleUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Sampled" class="form-group view_patient_services_Sampled">
<input type="text" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Sampled->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Sampled->EditValue ?>"<?php echo $view_patient_services_grid->Sampled->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Sampled" class="form-group view_patient_services_Sampled">
<span<?php echo $view_patient_services_grid->Sampled->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Sampled->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services_grid->Sampled->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sampled" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sampled" value="<?php echo HtmlEncode($view_patient_services_grid->Sampled->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ReceivedDate" class="form-group view_patient_services_ReceivedDate">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ReceivedDate->EditValue ?>"<?php echo $view_patient_services_grid->ReceivedDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->ReceivedDate->ReadOnly && !$view_patient_services_grid->ReceivedDate->Disabled && !isset($view_patient_services_grid->ReceivedDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ReceivedDate" class="form-group view_patient_services_ReceivedDate">
<span<?php echo $view_patient_services_grid->ReceivedDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->ReceivedDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ReceivedUser" class="form-group view_patient_services_ReceivedUser">
<input type="text" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ReceivedUser->EditValue ?>"<?php echo $view_patient_services_grid->ReceivedUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ReceivedUser" class="form-group view_patient_services_ReceivedUser">
<span<?php echo $view_patient_services_grid->ReceivedUser->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->ReceivedUser->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ReceivedUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($view_patient_services_grid->ReceivedUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Recevied" class="form-group view_patient_services_Recevied">
<input type="text" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Recevied->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Recevied->EditValue ?>"<?php echo $view_patient_services_grid->Recevied->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Recevied" class="form-group view_patient_services_Recevied">
<span<?php echo $view_patient_services_grid->Recevied->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Recevied->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services_grid->Recevied->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Recevied" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Recevied" value="<?php echo HtmlEncode($view_patient_services_grid->Recevied->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DeptRecvDate" class="form-group view_patient_services_DeptRecvDate">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DeptRecvDate->EditValue ?>"<?php echo $view_patient_services_grid->DeptRecvDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->DeptRecvDate->ReadOnly && !$view_patient_services_grid->DeptRecvDate->Disabled && !isset($view_patient_services_grid->DeptRecvDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DeptRecvDate" class="form-group view_patient_services_DeptRecvDate">
<span<?php echo $view_patient_services_grid->DeptRecvDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DeptRecvDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DeptRecvUser" class="form-group view_patient_services_DeptRecvUser">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DeptRecvUser->EditValue ?>"<?php echo $view_patient_services_grid->DeptRecvUser->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DeptRecvUser" class="form-group view_patient_services_DeptRecvUser">
<span<?php echo $view_patient_services_grid->DeptRecvUser->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DeptRecvUser->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecvUser" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecvUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_DeptRecived" class="form-group view_patient_services_DeptRecived">
<input type="text" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->DeptRecived->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->DeptRecived->EditValue ?>"<?php echo $view_patient_services_grid->DeptRecived->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_DeptRecived" class="form-group view_patient_services_DeptRecived">
<span<?php echo $view_patient_services_grid->DeptRecived->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->DeptRecived->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="x<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecived->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_DeptRecived" name="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" id="o<?php echo $view_patient_services_grid->RowIndex ?>_DeptRecived" value="<?php echo HtmlEncode($view_patient_services_grid->DeptRecived->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SAuthDate" class="form-group view_patient_services_SAuthDate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SAuthDate->EditValue ?>"<?php echo $view_patient_services_grid->SAuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->SAuthDate->ReadOnly && !$view_patient_services_grid->SAuthDate->Disabled && !isset($view_patient_services_grid->SAuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SAuthDate" class="form-group view_patient_services_SAuthDate">
<span<?php echo $view_patient_services_grid->SAuthDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->SAuthDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SAuthBy" class="form-group view_patient_services_SAuthBy">
<input type="text" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SAuthBy->EditValue ?>"<?php echo $view_patient_services_grid->SAuthBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SAuthBy" class="form-group view_patient_services_SAuthBy">
<span<?php echo $view_patient_services_grid->SAuthBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->SAuthBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_SAuthendicate" class="form-group view_patient_services_SAuthendicate">
<input type="text" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->SAuthendicate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->SAuthendicate->EditValue ?>"<?php echo $view_patient_services_grid->SAuthendicate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_SAuthendicate" class="form-group view_patient_services_SAuthendicate">
<span<?php echo $view_patient_services_grid->SAuthendicate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->SAuthendicate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthendicate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_SAuthendicate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_SAuthendicate" value="<?php echo HtmlEncode($view_patient_services_grid->SAuthendicate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_AuthDate" class="form-group view_patient_services_AuthDate">
<input type="text" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->AuthDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->AuthDate->EditValue ?>"<?php echo $view_patient_services_grid->AuthDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->AuthDate->ReadOnly && !$view_patient_services_grid->AuthDate->Disabled && !isset($view_patient_services_grid->AuthDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_AuthDate" class="form-group view_patient_services_AuthDate">
<span<?php echo $view_patient_services_grid->AuthDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->AuthDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->AuthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($view_patient_services_grid->AuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_AuthBy" class="form-group view_patient_services_AuthBy">
<input type="text" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->AuthBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->AuthBy->EditValue ?>"<?php echo $view_patient_services_grid->AuthBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_AuthBy" class="form-group view_patient_services_AuthBy">
<span<?php echo $view_patient_services_grid->AuthBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->AuthBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->AuthBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_AuthBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($view_patient_services_grid->AuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Authencate" class="form-group view_patient_services_Authencate">
<input type="text" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Authencate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Authencate->EditValue ?>"<?php echo $view_patient_services_grid->Authencate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Authencate" class="form-group view_patient_services_Authencate">
<span<?php echo $view_patient_services_grid->Authencate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Authencate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services_grid->Authencate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Authencate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Authencate" value="<?php echo HtmlEncode($view_patient_services_grid->Authencate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_EditDate" class="form-group view_patient_services_EditDate">
<input type="text" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->EditDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->EditDate->EditValue ?>"<?php echo $view_patient_services_grid->EditDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->EditDate->ReadOnly && !$view_patient_services_grid->EditDate->Disabled && !isset($view_patient_services_grid->EditDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_EditDate" class="form-group view_patient_services_EditDate">
<span<?php echo $view_patient_services_grid->EditDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->EditDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services_grid->EditDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditDate" value="<?php echo HtmlEncode($view_patient_services_grid->EditDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_EditBy" class="form-group view_patient_services_EditBy">
<input type="text" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->EditBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->EditBy->EditValue ?>"<?php echo $view_patient_services_grid->EditBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_EditBy" class="form-group view_patient_services_EditBy">
<span<?php echo $view_patient_services_grid->EditBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->EditBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services_grid->EditBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_EditBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_EditBy" value="<?php echo HtmlEncode($view_patient_services_grid->EditBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Editted->Visible) { // Editted ?>
		<td data-name="Editted">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Editted" class="form-group view_patient_services_Editted">
<input type="text" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Editted->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Editted->EditValue ?>"<?php echo $view_patient_services_grid->Editted->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Editted" class="form-group view_patient_services_Editted">
<span<?php echo $view_patient_services_grid->Editted->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Editted->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services_grid->Editted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Editted" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Editted" value="<?php echo HtmlEncode($view_patient_services_grid->Editted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_PatID" class="form-group view_patient_services_PatID">
<input type="text" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PatID->EditValue ?>"<?php echo $view_patient_services_grid->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_PatID" class="form-group view_patient_services_PatID">
<span<?php echo $view_patient_services_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services_grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_patient_services_grid->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_PatientId" class="form-group view_patient_services_PatientId">
<input type="text" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->PatientId->EditValue ?>"<?php echo $view_patient_services_grid->PatientId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_PatientId" class="form-group view_patient_services_PatientId">
<span<?php echo $view_patient_services_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services_grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_patient_services_grid->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Mobile" class="form-group view_patient_services_Mobile">
<input type="text" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Mobile->EditValue ?>"<?php echo $view_patient_services_grid->Mobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Mobile" class="form-group view_patient_services_Mobile">
<span<?php echo $view_patient_services_grid->Mobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Mobile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services_grid->Mobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Mobile" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_patient_services_grid->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->CId->Visible) { // CId ?>
		<td data-name="CId">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_CId" class="form-group view_patient_services_CId">
<input type="text" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->CId->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->CId->EditValue ?>"<?php echo $view_patient_services_grid->CId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_CId" class="form-group view_patient_services_CId">
<span<?php echo $view_patient_services_grid->CId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->CId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services_grid->CId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CId" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CId" value="<?php echo HtmlEncode($view_patient_services_grid->CId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Order->Visible) { // Order ?>
		<td data-name="Order">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Order" class="form-group view_patient_services_Order">
<input type="text" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Order->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Order->EditValue ?>"<?php echo $view_patient_services_grid->Order->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Order" class="form-group view_patient_services_Order">
<span<?php echo $view_patient_services_grid->Order->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Order->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services_grid->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Order" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_patient_services_grid->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_ResType" class="form-group view_patient_services_ResType">
<input type="text" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->ResType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->ResType->EditValue ?>"<?php echo $view_patient_services_grid->ResType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_ResType" class="form-group view_patient_services_ResType">
<span<?php echo $view_patient_services_grid->ResType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->ResType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services_grid->ResType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_ResType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_patient_services_grid->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Sample" class="form-group view_patient_services_Sample">
<input type="text" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Sample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Sample->EditValue ?>"<?php echo $view_patient_services_grid->Sample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Sample" class="form-group view_patient_services_Sample">
<span<?php echo $view_patient_services_grid->Sample->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Sample->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services_grid->Sample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Sample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_patient_services_grid->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_NoD" class="form-group view_patient_services_NoD">
<input type="text" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->NoD->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->NoD->EditValue ?>"<?php echo $view_patient_services_grid->NoD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_NoD" class="form-group view_patient_services_NoD">
<span<?php echo $view_patient_services_grid->NoD->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->NoD->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="x<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services_grid->NoD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_NoD" name="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" id="o<?php echo $view_patient_services_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_patient_services_grid->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_BillOrder" class="form-group view_patient_services_BillOrder">
<input type="text" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->BillOrder->EditValue ?>"<?php echo $view_patient_services_grid->BillOrder->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_BillOrder" class="form-group view_patient_services_BillOrder">
<span<?php echo $view_patient_services_grid->BillOrder->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->BillOrder->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services_grid->BillOrder->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_BillOrder" name="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_patient_services_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_patient_services_grid->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Inactive" class="form-group view_patient_services_Inactive">
<input type="text" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Inactive->EditValue ?>"<?php echo $view_patient_services_grid->Inactive->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Inactive" class="form-group view_patient_services_Inactive">
<span<?php echo $view_patient_services_grid->Inactive->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Inactive->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services_grid->Inactive->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Inactive" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_patient_services_grid->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_CollSample" class="form-group view_patient_services_CollSample">
<input type="text" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->CollSample->EditValue ?>"<?php echo $view_patient_services_grid->CollSample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_CollSample" class="form-group view_patient_services_CollSample">
<span<?php echo $view_patient_services_grid->CollSample->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->CollSample->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="x<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services_grid->CollSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_CollSample" name="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" id="o<?php echo $view_patient_services_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_patient_services_grid->CollSample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_TestType" class="form-group view_patient_services_TestType">
<input type="text" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->TestType->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->TestType->EditValue ?>"<?php echo $view_patient_services_grid->TestType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_TestType" class="form-group view_patient_services_TestType">
<span<?php echo $view_patient_services_grid->TestType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->TestType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="x<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services_grid->TestType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" name="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" id="o<?php echo $view_patient_services_grid->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_patient_services_grid->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Repeated" class="form-group view_patient_services_Repeated">
<input type="text" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Repeated->EditValue ?>"<?php echo $view_patient_services_grid->Repeated->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Repeated" class="form-group view_patient_services_Repeated">
<span<?php echo $view_patient_services_grid->Repeated->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Repeated->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services_grid->Repeated->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Repeated" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Repeated" value="<?php echo HtmlEncode($view_patient_services_grid->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_RepeatedBy" class="form-group view_patient_services_RepeatedBy">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RepeatedBy->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RepeatedBy->EditValue ?>"<?php echo $view_patient_services_grid->RepeatedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_RepeatedBy" class="form-group view_patient_services_RepeatedBy">
<span<?php echo $view_patient_services_grid->RepeatedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->RepeatedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedBy" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedBy" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_RepeatedDate" class="form-group view_patient_services_RepeatedDate">
<input type="text" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RepeatedDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RepeatedDate->EditValue ?>"<?php echo $view_patient_services_grid->RepeatedDate->editAttributes() ?>>
<?php if (!$view_patient_services_grid->RepeatedDate->ReadOnly && !$view_patient_services_grid->RepeatedDate->Disabled && !isset($view_patient_services_grid->RepeatedDate->EditAttrs["readonly"]) && !isset($view_patient_services_grid->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_patient_servicesgrid", "x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_RepeatedDate" class="form-group view_patient_services_RepeatedDate">
<span<?php echo $view_patient_services_grid->RepeatedDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->RepeatedDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RepeatedDate" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RepeatedDate" value="<?php echo HtmlEncode($view_patient_services_grid->RepeatedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_serviceID" class="form-group view_patient_services_serviceID">
<input type="text" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->serviceID->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->serviceID->EditValue ?>"<?php echo $view_patient_services_grid->serviceID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_serviceID" class="form-group view_patient_services_serviceID">
<span<?php echo $view_patient_services_grid->serviceID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->serviceID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="x<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services_grid->serviceID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_serviceID" name="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" id="o<?php echo $view_patient_services_grid->RowIndex ?>_serviceID" value="<?php echo HtmlEncode($view_patient_services_grid->serviceID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Service_Type" class="form-group view_patient_services_Service_Type">
<input type="text" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Service_Type->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Service_Type->EditValue ?>"<?php echo $view_patient_services_grid->Service_Type->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Service_Type" class="form-group view_patient_services_Service_Type">
<span<?php echo $view_patient_services_grid->Service_Type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Service_Type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Type" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Type" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_Service_Department" class="form-group view_patient_services_Service_Department">
<input type="text" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_services_grid->Service_Department->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->Service_Department->EditValue ?>"<?php echo $view_patient_services_grid->Service_Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_Service_Department" class="form-group view_patient_services_Service_Department">
<span<?php echo $view_patient_services_grid->Service_Department->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->Service_Department->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="x<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_Service_Department" name="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" id="o<?php echo $view_patient_services_grid->RowIndex ?>_Service_Department" value="<?php echo HtmlEncode($view_patient_services_grid->Service_Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo">
<?php if (!$view_patient_services->isConfirm()) { ?>
<span id="el$rowindex$_view_patient_services_RequestNo" class="form-group view_patient_services_RequestNo">
<input type="text" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" size="30" placeholder="<?php echo HtmlEncode($view_patient_services_grid->RequestNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_services_grid->RequestNo->EditValue ?>"<?php echo $view_patient_services_grid->RequestNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_patient_services_RequestNo" class="form-group view_patient_services_RequestNo">
<span<?php echo $view_patient_services_grid->RequestNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_patient_services_grid->RequestNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="x<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services_grid->RequestNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_patient_services" data-field="x_RequestNo" name="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" id="o<?php echo $view_patient_services_grid->RowIndex ?>_RequestNo" value="<?php echo HtmlEncode($view_patient_services_grid->RequestNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_services_grid->ListOptions->render("body", "right", $view_patient_services_grid->RowIndex);
?>
<script>
loadjs.ready(["fview_patient_servicesgrid", "load"], function() {
	fview_patient_servicesgrid.updateLists(<?php echo $view_patient_services_grid->RowIndex ?>);
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
$view_patient_services_grid->renderRow();
?>
<?php if ($view_patient_services_grid->TotalRecords > 0 && $view_patient_services->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_patient_services_grid->renderListOptions();

// Render list options (footer, left)
$view_patient_services_grid->ListOptions->render("footer", "left");
?>
	<?php if ($view_patient_services_grid->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_patient_services_grid->id->footerCellClass() ?>"><span id="elf_view_patient_services_id" class="view_patient_services_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" class="<?php echo $view_patient_services_grid->Reception->footerCellClass() ?>"><span id="elf_view_patient_services_Reception" class="view_patient_services_Reception">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" class="<?php echo $view_patient_services_grid->mrnno->footerCellClass() ?>"><span id="elf_view_patient_services_mrnno" class="view_patient_services_mrnno">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_patient_services_grid->PatientName->footerCellClass() ?>"><span id="elf_view_patient_services_PatientName" class="view_patient_services_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Age->Visible) { // Age ?>
		<td data-name="Age" class="<?php echo $view_patient_services_grid->Age->footerCellClass() ?>"><span id="elf_view_patient_services_Age" class="view_patient_services_Age">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" class="<?php echo $view_patient_services_grid->Gender->footerCellClass() ?>"><span id="elf_view_patient_services_Gender" class="view_patient_services_Gender">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" class="<?php echo $view_patient_services_grid->profilePic->footerCellClass() ?>"><span id="elf_view_patient_services_profilePic" class="view_patient_services_profilePic">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Services->Visible) { // Services ?>
		<td data-name="Services" class="<?php echo $view_patient_services_grid->Services->footerCellClass() ?>"><span id="elf_view_patient_services_Services" class="view_patient_services_Services">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Unit->Visible) { // Unit ?>
		<td data-name="Unit" class="<?php echo $view_patient_services_grid->Unit->footerCellClass() ?>"><span id="elf_view_patient_services_Unit" class="view_patient_services_Unit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->amount->Visible) { // amount ?>
		<td data-name="amount" class="<?php echo $view_patient_services_grid->amount->footerCellClass() ?>"><span id="elf_view_patient_services_amount" class="view_patient_services_amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_patient_services_grid->amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $view_patient_services_grid->Quantity->footerCellClass() ?>"><span id="elf_view_patient_services_Quantity" class="view_patient_services_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory" class="<?php echo $view_patient_services_grid->DiscountCategory->footerCellClass() ?>"><span id="elf_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Discount->Visible) { // Discount ?>
		<td data-name="Discount" class="<?php echo $view_patient_services_grid->Discount->footerCellClass() ?>"><span id="elf_view_patient_services_Discount" class="view_patient_services_Discount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" class="<?php echo $view_patient_services_grid->SubTotal->footerCellClass() ?>"><span id="elf_view_patient_services_SubTotal" class="view_patient_services_SubTotal">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_patient_services_grid->SubTotal->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->description->Visible) { // description ?>
		<td data-name="description" class="<?php echo $view_patient_services_grid->description->footerCellClass() ?>"><span id="elf_view_patient_services_description" class="view_patient_services_description">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" class="<?php echo $view_patient_services_grid->patient_type->footerCellClass() ?>"><span id="elf_view_patient_services_patient_type" class="view_patient_services_patient_type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" class="<?php echo $view_patient_services_grid->charged_date->footerCellClass() ?>"><span id="elf_view_patient_services_charged_date" class="view_patient_services_charged_date">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->status->Visible) { // status ?>
		<td data-name="status" class="<?php echo $view_patient_services_grid->status->footerCellClass() ?>"><span id="elf_view_patient_services_status" class="view_patient_services_status">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $view_patient_services_grid->createdby->footerCellClass() ?>"><span id="elf_view_patient_services_createdby" class="view_patient_services_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_patient_services_grid->createddatetime->footerCellClass() ?>"><span id="elf_view_patient_services_createddatetime" class="view_patient_services_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" class="<?php echo $view_patient_services_grid->modifiedby->footerCellClass() ?>"><span id="elf_view_patient_services_modifiedby" class="view_patient_services_modifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" class="<?php echo $view_patient_services_grid->modifieddatetime->footerCellClass() ?>"><span id="elf_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Aid->Visible) { // Aid ?>
		<td data-name="Aid" class="<?php echo $view_patient_services_grid->Aid->footerCellClass() ?>"><span id="elf_view_patient_services_Aid" class="view_patient_services_Aid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Vid->Visible) { // Vid ?>
		<td data-name="Vid" class="<?php echo $view_patient_services_grid->Vid->footerCellClass() ?>"><span id="elf_view_patient_services_Vid" class="view_patient_services_Vid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrID->Visible) { // DrID ?>
		<td data-name="DrID" class="<?php echo $view_patient_services_grid->DrID->footerCellClass() ?>"><span id="elf_view_patient_services_DrID" class="view_patient_services_DrID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" class="<?php echo $view_patient_services_grid->DrCODE->footerCellClass() ?>"><span id="elf_view_patient_services_DrCODE" class="view_patient_services_DrCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrName->Visible) { // DrName ?>
		<td data-name="DrName" class="<?php echo $view_patient_services_grid->DrName->footerCellClass() ?>"><span id="elf_view_patient_services_DrName" class="view_patient_services_DrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Department->Visible) { // Department ?>
		<td data-name="Department" class="<?php echo $view_patient_services_grid->Department->footerCellClass() ?>"><span id="elf_view_patient_services_Department" class="view_patient_services_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres" class="<?php echo $view_patient_services_grid->DrSharePres->footerCellClass() ?>"><span id="elf_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres" class="<?php echo $view_patient_services_grid->HospSharePres->footerCellClass() ?>"><span id="elf_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" class="<?php echo $view_patient_services_grid->DrShareAmount->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" class="<?php echo $view_patient_services_grid->HospShareAmount->footerCellClass() ?>"><span id="elf_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services_grid->DrShareSettiledAmount->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId" class="<?php echo $view_patient_services_grid->DrShareSettledId->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services_grid->DrShareSettiledStatus->footerCellClass() ?>"><span id="elf_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" class="<?php echo $view_patient_services_grid->invoiceId->footerCellClass() ?>"><span id="elf_view_patient_services_invoiceId" class="view_patient_services_invoiceId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" class="<?php echo $view_patient_services_grid->invoiceAmount->footerCellClass() ?>"><span id="elf_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" class="<?php echo $view_patient_services_grid->invoiceStatus->footerCellClass() ?>"><span id="elf_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" class="<?php echo $view_patient_services_grid->modeOfPayment->footerCellClass() ?>"><span id="elf_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_patient_services_grid->HospID->footerCellClass() ?>"><span id="elf_view_patient_services_HospID" class="view_patient_services_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" class="<?php echo $view_patient_services_grid->RIDNO->footerCellClass() ?>"><span id="elf_view_patient_services_RIDNO" class="view_patient_services_RIDNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" class="<?php echo $view_patient_services_grid->ItemCode->footerCellClass() ?>"><span id="elf_view_patient_services_ItemCode" class="view_patient_services_ItemCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" class="<?php echo $view_patient_services_grid->TidNo->footerCellClass() ?>"><span id="elf_view_patient_services_TidNo" class="view_patient_services_TidNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->sid->Visible) { // sid ?>
		<td data-name="sid" class="<?php echo $view_patient_services_grid->sid->footerCellClass() ?>"><span id="elf_view_patient_services_sid" class="view_patient_services_sid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" class="<?php echo $view_patient_services_grid->TestSubCd->footerCellClass() ?>"><span id="elf_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" class="<?php echo $view_patient_services_grid->DEptCd->footerCellClass() ?>"><span id="elf_view_patient_services_DEptCd" class="view_patient_services_DEptCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" class="<?php echo $view_patient_services_grid->ProfCd->footerCellClass() ?>"><span id="elf_view_patient_services_ProfCd" class="view_patient_services_ProfCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Comments->Visible) { // Comments ?>
		<td data-name="Comments" class="<?php echo $view_patient_services_grid->Comments->footerCellClass() ?>"><span id="elf_view_patient_services_Comments" class="view_patient_services_Comments">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Method->Visible) { // Method ?>
		<td data-name="Method" class="<?php echo $view_patient_services_grid->Method->footerCellClass() ?>"><span id="elf_view_patient_services_Method" class="view_patient_services_Method">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" class="<?php echo $view_patient_services_grid->Specimen->footerCellClass() ?>"><span id="elf_view_patient_services_Specimen" class="view_patient_services_Specimen">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" class="<?php echo $view_patient_services_grid->Abnormal->footerCellClass() ?>"><span id="elf_view_patient_services_Abnormal" class="view_patient_services_Abnormal">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" class="<?php echo $view_patient_services_grid->TestUnit->footerCellClass() ?>"><span id="elf_view_patient_services_TestUnit" class="view_patient_services_TestUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" class="<?php echo $view_patient_services_grid->LOWHIGH->footerCellClass() ?>"><span id="elf_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Branch->Visible) { // Branch ?>
		<td data-name="Branch" class="<?php echo $view_patient_services_grid->Branch->footerCellClass() ?>"><span id="elf_view_patient_services_Branch" class="view_patient_services_Branch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" class="<?php echo $view_patient_services_grid->Dispatch->footerCellClass() ?>"><span id="elf_view_patient_services_Dispatch" class="view_patient_services_Dispatch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" class="<?php echo $view_patient_services_grid->Pic1->footerCellClass() ?>"><span id="elf_view_patient_services_Pic1" class="view_patient_services_Pic1">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" class="<?php echo $view_patient_services_grid->Pic2->footerCellClass() ?>"><span id="elf_view_patient_services_Pic2" class="view_patient_services_Pic2">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" class="<?php echo $view_patient_services_grid->GraphPath->footerCellClass() ?>"><span id="elf_view_patient_services_GraphPath" class="view_patient_services_GraphPath">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" class="<?php echo $view_patient_services_grid->MachineCD->footerCellClass() ?>"><span id="elf_view_patient_services_MachineCD" class="view_patient_services_MachineCD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" class="<?php echo $view_patient_services_grid->TestCancel->footerCellClass() ?>"><span id="elf_view_patient_services_TestCancel" class="view_patient_services_TestCancel">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" class="<?php echo $view_patient_services_grid->OutSource->footerCellClass() ?>"><span id="elf_view_patient_services_OutSource" class="view_patient_services_OutSource">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Printed->Visible) { // Printed ?>
		<td data-name="Printed" class="<?php echo $view_patient_services_grid->Printed->footerCellClass() ?>"><span id="elf_view_patient_services_Printed" class="view_patient_services_Printed">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" class="<?php echo $view_patient_services_grid->PrintBy->footerCellClass() ?>"><span id="elf_view_patient_services_PrintBy" class="view_patient_services_PrintBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" class="<?php echo $view_patient_services_grid->PrintDate->footerCellClass() ?>"><span id="elf_view_patient_services_PrintDate" class="view_patient_services_PrintDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate" class="<?php echo $view_patient_services_grid->BillingDate->footerCellClass() ?>"><span id="elf_view_patient_services_BillingDate" class="view_patient_services_BillingDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy" class="<?php echo $view_patient_services_grid->BilledBy->footerCellClass() ?>"><span id="elf_view_patient_services_BilledBy" class="view_patient_services_BilledBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" class="<?php echo $view_patient_services_grid->Resulted->footerCellClass() ?>"><span id="elf_view_patient_services_Resulted" class="view_patient_services_Resulted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" class="<?php echo $view_patient_services_grid->ResultDate->footerCellClass() ?>"><span id="elf_view_patient_services_ResultDate" class="view_patient_services_ResultDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" class="<?php echo $view_patient_services_grid->ResultedBy->footerCellClass() ?>"><span id="elf_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" class="<?php echo $view_patient_services_grid->SampleDate->footerCellClass() ?>"><span id="elf_view_patient_services_SampleDate" class="view_patient_services_SampleDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" class="<?php echo $view_patient_services_grid->SampleUser->footerCellClass() ?>"><span id="elf_view_patient_services_SampleUser" class="view_patient_services_SampleUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled" class="<?php echo $view_patient_services_grid->Sampled->footerCellClass() ?>"><span id="elf_view_patient_services_Sampled" class="view_patient_services_Sampled">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" class="<?php echo $view_patient_services_grid->ReceivedDate->footerCellClass() ?>"><span id="elf_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" class="<?php echo $view_patient_services_grid->ReceivedUser->footerCellClass() ?>"><span id="elf_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied" class="<?php echo $view_patient_services_grid->Recevied->footerCellClass() ?>"><span id="elf_view_patient_services_Recevied" class="view_patient_services_Recevied">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" class="<?php echo $view_patient_services_grid->DeptRecvDate->footerCellClass() ?>"><span id="elf_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" class="<?php echo $view_patient_services_grid->DeptRecvUser->footerCellClass() ?>"><span id="elf_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived" class="<?php echo $view_patient_services_grid->DeptRecived->footerCellClass() ?>"><span id="elf_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" class="<?php echo $view_patient_services_grid->SAuthDate->footerCellClass() ?>"><span id="elf_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" class="<?php echo $view_patient_services_grid->SAuthBy->footerCellClass() ?>"><span id="elf_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate" class="<?php echo $view_patient_services_grid->SAuthendicate->footerCellClass() ?>"><span id="elf_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" class="<?php echo $view_patient_services_grid->AuthDate->footerCellClass() ?>"><span id="elf_view_patient_services_AuthDate" class="view_patient_services_AuthDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" class="<?php echo $view_patient_services_grid->AuthBy->footerCellClass() ?>"><span id="elf_view_patient_services_AuthBy" class="view_patient_services_AuthBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate" class="<?php echo $view_patient_services_grid->Authencate->footerCellClass() ?>"><span id="elf_view_patient_services_Authencate" class="view_patient_services_Authencate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" class="<?php echo $view_patient_services_grid->EditDate->footerCellClass() ?>"><span id="elf_view_patient_services_EditDate" class="view_patient_services_EditDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy" class="<?php echo $view_patient_services_grid->EditBy->footerCellClass() ?>"><span id="elf_view_patient_services_EditBy" class="view_patient_services_EditBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Editted->Visible) { // Editted ?>
		<td data-name="Editted" class="<?php echo $view_patient_services_grid->Editted->footerCellClass() ?>"><span id="elf_view_patient_services_Editted" class="view_patient_services_Editted">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID" class="<?php echo $view_patient_services_grid->PatID->footerCellClass() ?>"><span id="elf_view_patient_services_PatID" class="view_patient_services_PatID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $view_patient_services_grid->PatientId->footerCellClass() ?>"><span id="elf_view_patient_services_PatientId" class="view_patient_services_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $view_patient_services_grid->Mobile->footerCellClass() ?>"><span id="elf_view_patient_services_Mobile" class="view_patient_services_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->CId->Visible) { // CId ?>
		<td data-name="CId" class="<?php echo $view_patient_services_grid->CId->footerCellClass() ?>"><span id="elf_view_patient_services_CId" class="view_patient_services_CId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Order->Visible) { // Order ?>
		<td data-name="Order" class="<?php echo $view_patient_services_grid->Order->footerCellClass() ?>"><span id="elf_view_patient_services_Order" class="view_patient_services_Order">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->ResType->Visible) { // ResType ?>
		<td data-name="ResType" class="<?php echo $view_patient_services_grid->ResType->footerCellClass() ?>"><span id="elf_view_patient_services_ResType" class="view_patient_services_ResType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Sample->Visible) { // Sample ?>
		<td data-name="Sample" class="<?php echo $view_patient_services_grid->Sample->footerCellClass() ?>"><span id="elf_view_patient_services_Sample" class="view_patient_services_Sample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->NoD->Visible) { // NoD ?>
		<td data-name="NoD" class="<?php echo $view_patient_services_grid->NoD->footerCellClass() ?>"><span id="elf_view_patient_services_NoD" class="view_patient_services_NoD">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" class="<?php echo $view_patient_services_grid->BillOrder->footerCellClass() ?>"><span id="elf_view_patient_services_BillOrder" class="view_patient_services_BillOrder">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" class="<?php echo $view_patient_services_grid->Inactive->footerCellClass() ?>"><span id="elf_view_patient_services_Inactive" class="view_patient_services_Inactive">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" class="<?php echo $view_patient_services_grid->CollSample->footerCellClass() ?>"><span id="elf_view_patient_services_CollSample" class="view_patient_services_CollSample">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->TestType->Visible) { // TestType ?>
		<td data-name="TestType" class="<?php echo $view_patient_services_grid->TestType->footerCellClass() ?>"><span id="elf_view_patient_services_TestType" class="view_patient_services_TestType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" class="<?php echo $view_patient_services_grid->Repeated->footerCellClass() ?>"><span id="elf_view_patient_services_Repeated" class="view_patient_services_Repeated">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy" class="<?php echo $view_patient_services_grid->RepeatedBy->footerCellClass() ?>"><span id="elf_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate" class="<?php echo $view_patient_services_grid->RepeatedDate->footerCellClass() ?>"><span id="elf_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID" class="<?php echo $view_patient_services_grid->serviceID->footerCellClass() ?>"><span id="elf_view_patient_services_serviceID" class="view_patient_services_serviceID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type" class="<?php echo $view_patient_services_grid->Service_Type->footerCellClass() ?>"><span id="elf_view_patient_services_Service_Type" class="view_patient_services_Service_Type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department" class="<?php echo $view_patient_services_grid->Service_Department->footerCellClass() ?>"><span id="elf_view_patient_services_Service_Department" class="view_patient_services_Service_Department">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_patient_services_grid->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo" class="<?php echo $view_patient_services_grid->RequestNo->footerCellClass() ?>"><span id="elf_view_patient_services_RequestNo" class="view_patient_services_RequestNo">
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
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_patient_services_grid->Recordset)
	$view_patient_services_grid->Recordset->Close();
?>
<?php if ($view_patient_services_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_patient_services_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_patient_services_grid->TotalRecords == 0 && !$view_patient_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_patient_services_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$view_patient_services_grid->isExport()) { ?>
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
<?php
$view_patient_services_grid->terminate();
?>