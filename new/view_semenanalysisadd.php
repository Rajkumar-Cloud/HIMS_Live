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
$view_semenanalysis_add = new view_semenanalysis_add();

// Run the page
$view_semenanalysis_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_semenanalysis_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_semenanalysisadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fview_semenanalysisadd = currentForm = new ew.Form("fview_semenanalysisadd", "add");

	// Validate form
	fview_semenanalysisadd.validate = function() {
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
			<?php if ($view_semenanalysis_add->PaID->Required) { ?>
				elm = this.getElements("x" + infix + "_PaID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->PaID->caption(), $view_semenanalysis_add->PaID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->PaName->Required) { ?>
				elm = this.getElements("x" + infix + "_PaName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->PaName->caption(), $view_semenanalysis_add->PaName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->PaMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_PaMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->PaMobile->caption(), $view_semenanalysis_add->PaMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->PartnerID->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->PartnerID->caption(), $view_semenanalysis_add->PartnerID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->PartnerName->caption(), $view_semenanalysis_add->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->PartnerMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->PartnerMobile->caption(), $view_semenanalysis_add->PartnerMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->RIDNo->caption(), $view_semenanalysis_add->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->PatientName->caption(), $view_semenanalysis_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->HusbandName->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->HusbandName->caption(), $view_semenanalysis_add->HusbandName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->RequestDr->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->RequestDr->caption(), $view_semenanalysis_add->RequestDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->CollectionDate->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->CollectionDate->caption(), $view_semenanalysis_add->CollectionDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CollectionDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_semenanalysis_add->CollectionDate->errorMessage()) ?>");
			<?php if ($view_semenanalysis_add->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->ResultDate->caption(), $view_semenanalysis_add->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_semenanalysis_add->ResultDate->errorMessage()) ?>");
			<?php if ($view_semenanalysis_add->RequestSample->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->RequestSample->caption(), $view_semenanalysis_add->RequestSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->CollectionType->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->CollectionType->caption(), $view_semenanalysis_add->CollectionType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->CollectionMethod->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionMethod");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->CollectionMethod->caption(), $view_semenanalysis_add->CollectionMethod->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Medicationused->Required) { ?>
				elm = this.getElements("x" + infix + "_Medicationused");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Medicationused->caption(), $view_semenanalysis_add->Medicationused->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->DifficultiesinCollection->Required) { ?>
				elm = this.getElements("x" + infix + "_DifficultiesinCollection");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->DifficultiesinCollection->caption(), $view_semenanalysis_add->DifficultiesinCollection->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Volume->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Volume->caption(), $view_semenanalysis_add->Volume->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->pH->Required) { ?>
				elm = this.getElements("x" + infix + "_pH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->pH->caption(), $view_semenanalysis_add->pH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Timeofcollection->Required) { ?>
				elm = this.getElements("x" + infix + "_Timeofcollection");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Timeofcollection->caption(), $view_semenanalysis_add->Timeofcollection->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Timeofexamination->Required) { ?>
				elm = this.getElements("x" + infix + "_Timeofexamination");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Timeofexamination->caption(), $view_semenanalysis_add->Timeofexamination->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Concentration->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Concentration->caption(), $view_semenanalysis_add->Concentration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Total->Required) { ?>
				elm = this.getElements("x" + infix + "_Total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Total->caption(), $view_semenanalysis_add->Total->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->ProgressiveMotility->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->ProgressiveMotility->caption(), $view_semenanalysis_add->ProgressiveMotility->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->NonProgrssiveMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->NonProgrssiveMotile->caption(), $view_semenanalysis_add->NonProgrssiveMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Immotile->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Immotile->caption(), $view_semenanalysis_add->Immotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->TotalProgrssiveMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->TotalProgrssiveMotile->caption(), $view_semenanalysis_add->TotalProgrssiveMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Appearance->Required) { ?>
				elm = this.getElements("x" + infix + "_Appearance");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Appearance->caption(), $view_semenanalysis_add->Appearance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Homogenosity->Required) { ?>
				elm = this.getElements("x" + infix + "_Homogenosity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Homogenosity->caption(), $view_semenanalysis_add->Homogenosity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->CompleteSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CompleteSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->CompleteSample->caption(), $view_semenanalysis_add->CompleteSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Liquefactiontime->Required) { ?>
				elm = this.getElements("x" + infix + "_Liquefactiontime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Liquefactiontime->caption(), $view_semenanalysis_add->Liquefactiontime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Normal->Required) { ?>
				elm = this.getElements("x" + infix + "_Normal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Normal->caption(), $view_semenanalysis_add->Normal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Abnormal->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Abnormal->caption(), $view_semenanalysis_add->Abnormal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Headdefects->Required) { ?>
				elm = this.getElements("x" + infix + "_Headdefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Headdefects->caption(), $view_semenanalysis_add->Headdefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->MidpieceDefects->Required) { ?>
				elm = this.getElements("x" + infix + "_MidpieceDefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->MidpieceDefects->caption(), $view_semenanalysis_add->MidpieceDefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->TailDefects->Required) { ?>
				elm = this.getElements("x" + infix + "_TailDefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->TailDefects->caption(), $view_semenanalysis_add->TailDefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->NormalProgMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_NormalProgMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->NormalProgMotile->caption(), $view_semenanalysis_add->NormalProgMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->ImmatureForms->Required) { ?>
				elm = this.getElements("x" + infix + "_ImmatureForms");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->ImmatureForms->caption(), $view_semenanalysis_add->ImmatureForms->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Leucocytes->Required) { ?>
				elm = this.getElements("x" + infix + "_Leucocytes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Leucocytes->caption(), $view_semenanalysis_add->Leucocytes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Agglutination->Required) { ?>
				elm = this.getElements("x" + infix + "_Agglutination");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Agglutination->caption(), $view_semenanalysis_add->Agglutination->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Debris->Required) { ?>
				elm = this.getElements("x" + infix + "_Debris");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Debris->caption(), $view_semenanalysis_add->Debris->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Diagnosis->Required) { ?>
				elm = this.getElements("x" + infix + "_Diagnosis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Diagnosis->caption(), $view_semenanalysis_add->Diagnosis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Observations->Required) { ?>
				elm = this.getElements("x" + infix + "_Observations");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Observations->caption(), $view_semenanalysis_add->Observations->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Signature->Required) { ?>
				elm = this.getElements("x" + infix + "_Signature");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Signature->caption(), $view_semenanalysis_add->Signature->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->SemenOrgin->Required) { ?>
				elm = this.getElements("x" + infix + "_SemenOrgin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->SemenOrgin->caption(), $view_semenanalysis_add->SemenOrgin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Donor->Required) { ?>
				elm = this.getElements("x" + infix + "_Donor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Donor->caption(), $view_semenanalysis_add->Donor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->DonorBloodgroup->Required) { ?>
				elm = this.getElements("x" + infix + "_DonorBloodgroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->DonorBloodgroup->caption(), $view_semenanalysis_add->DonorBloodgroup->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Tank->caption(), $view_semenanalysis_add->Tank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Location->Required) { ?>
				elm = this.getElements("x" + infix + "_Location");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Location->caption(), $view_semenanalysis_add->Location->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Volume1->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Volume1->caption(), $view_semenanalysis_add->Volume1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Concentration1->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Concentration1->caption(), $view_semenanalysis_add->Concentration1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Total1->Required) { ?>
				elm = this.getElements("x" + infix + "_Total1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Total1->caption(), $view_semenanalysis_add->Total1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->ProgressiveMotility1->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->ProgressiveMotility1->caption(), $view_semenanalysis_add->ProgressiveMotility1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->NonProgrssiveMotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->NonProgrssiveMotile1->caption(), $view_semenanalysis_add->NonProgrssiveMotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Immotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Immotile1->caption(), $view_semenanalysis_add->Immotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->TotalProgrssiveMotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->TotalProgrssiveMotile1->caption(), $view_semenanalysis_add->TotalProgrssiveMotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->TidNo->caption(), $view_semenanalysis_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_semenanalysis_add->TidNo->errorMessage()) ?>");
			<?php if ($view_semenanalysis_add->Color->Required) { ?>
				elm = this.getElements("x" + infix + "_Color");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Color->caption(), $view_semenanalysis_add->Color->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->DoneBy->Required) { ?>
				elm = this.getElements("x" + infix + "_DoneBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->DoneBy->caption(), $view_semenanalysis_add->DoneBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Method->caption(), $view_semenanalysis_add->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Abstinence->Required) { ?>
				elm = this.getElements("x" + infix + "_Abstinence");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Abstinence->caption(), $view_semenanalysis_add->Abstinence->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->ProcessedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcessedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->ProcessedBy->caption(), $view_semenanalysis_add->ProcessedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->InseminationTime->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminationTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->InseminationTime->caption(), $view_semenanalysis_add->InseminationTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->InseminationBy->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminationBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->InseminationBy->caption(), $view_semenanalysis_add->InseminationBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Big->Required) { ?>
				elm = this.getElements("x" + infix + "_Big");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Big->caption(), $view_semenanalysis_add->Big->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Medium->Required) { ?>
				elm = this.getElements("x" + infix + "_Medium");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Medium->caption(), $view_semenanalysis_add->Medium->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Small->Required) { ?>
				elm = this.getElements("x" + infix + "_Small");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Small->caption(), $view_semenanalysis_add->Small->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->NoHalo->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHalo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->NoHalo->caption(), $view_semenanalysis_add->NoHalo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Fragmented->Required) { ?>
				elm = this.getElements("x" + infix + "_Fragmented");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Fragmented->caption(), $view_semenanalysis_add->Fragmented->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->NonFragmented->Required) { ?>
				elm = this.getElements("x" + infix + "_NonFragmented");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->NonFragmented->caption(), $view_semenanalysis_add->NonFragmented->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->DFI->Required) { ?>
				elm = this.getElements("x" + infix + "_DFI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->DFI->caption(), $view_semenanalysis_add->DFI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->IsueBy->Required) { ?>
				elm = this.getElements("x" + infix + "_IsueBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->IsueBy->caption(), $view_semenanalysis_add->IsueBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Volume2->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Volume2->caption(), $view_semenanalysis_add->Volume2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Concentration2->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Concentration2->caption(), $view_semenanalysis_add->Concentration2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Total2->Required) { ?>
				elm = this.getElements("x" + infix + "_Total2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Total2->caption(), $view_semenanalysis_add->Total2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->ProgressiveMotility2->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->ProgressiveMotility2->caption(), $view_semenanalysis_add->ProgressiveMotility2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->NonProgrssiveMotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->NonProgrssiveMotile2->caption(), $view_semenanalysis_add->NonProgrssiveMotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->Immotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->Immotile2->caption(), $view_semenanalysis_add->Immotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->TotalProgrssiveMotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->TotalProgrssiveMotile2->caption(), $view_semenanalysis_add->TotalProgrssiveMotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->IssuedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_IssuedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->IssuedBy->caption(), $view_semenanalysis_add->IssuedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->IssuedTo->Required) { ?>
				elm = this.getElements("x" + infix + "_IssuedTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->IssuedTo->caption(), $view_semenanalysis_add->IssuedTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->MACS->Required) { ?>
				elm = this.getElements("x" + infix + "_MACS[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->MACS->caption(), $view_semenanalysis_add->MACS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->PREG_TEST_DATE->Required) { ?>
				elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->PREG_TEST_DATE->caption(), $view_semenanalysis_add->PREG_TEST_DATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_semenanalysis_add->PREG_TEST_DATE->errorMessage()) ?>");
			<?php if ($view_semenanalysis_add->SPECIFIC_PROBLEMS->Required) { ?>
				elm = this.getElements("x" + infix + "_SPECIFIC_PROBLEMS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->SPECIFIC_PROBLEMS->caption(), $view_semenanalysis_add->SPECIFIC_PROBLEMS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->IMSC_1->Required) { ?>
				elm = this.getElements("x" + infix + "_IMSC_1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->IMSC_1->caption(), $view_semenanalysis_add->IMSC_1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->IMSC_2->Required) { ?>
				elm = this.getElements("x" + infix + "_IMSC_2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->IMSC_2->caption(), $view_semenanalysis_add->IMSC_2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->LIQUIFACTION_STORAGE->Required) { ?>
				elm = this.getElements("x" + infix + "_LIQUIFACTION_STORAGE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->LIQUIFACTION_STORAGE->caption(), $view_semenanalysis_add->LIQUIFACTION_STORAGE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->IUI_PREP_METHOD->Required) { ?>
				elm = this.getElements("x" + infix + "_IUI_PREP_METHOD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->IUI_PREP_METHOD->caption(), $view_semenanalysis_add->IUI_PREP_METHOD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->TIME_FROM_TRIGGER->Required) { ?>
				elm = this.getElements("x" + infix + "_TIME_FROM_TRIGGER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->TIME_FROM_TRIGGER->caption(), $view_semenanalysis_add->TIME_FROM_TRIGGER->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->COLLECTION_TO_PREPARATION->Required) { ?>
				elm = this.getElements("x" + infix + "_COLLECTION_TO_PREPARATION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->COLLECTION_TO_PREPARATION->caption(), $view_semenanalysis_add->COLLECTION_TO_PREPARATION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->Required) { ?>
				elm = this.getElements("x" + infix + "_TIME_FROM_PREP_TO_INSEM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->caption(), $view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->RequiredErrorMessage)) ?>");
			<?php } ?>

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
	fview_semenanalysisadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_semenanalysisadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_semenanalysisadd.lists["x_RIDNo"] = <?php echo $view_semenanalysis_add->RIDNo->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_RIDNo"].options = <?php echo JsonEncode($view_semenanalysis_add->RIDNo->lookupOptions()) ?>;
	fview_semenanalysisadd.lists["x_PatientName"] = <?php echo $view_semenanalysis_add->PatientName->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_PatientName"].options = <?php echo JsonEncode($view_semenanalysis_add->PatientName->lookupOptions()) ?>;
	fview_semenanalysisadd.autoSuggests["x_PatientName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_semenanalysisadd.lists["x_HusbandName"] = <?php echo $view_semenanalysis_add->HusbandName->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_HusbandName"].options = <?php echo JsonEncode($view_semenanalysis_add->HusbandName->lookupOptions()) ?>;
	fview_semenanalysisadd.lists["x_RequestSample"] = <?php echo $view_semenanalysis_add->RequestSample->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_RequestSample"].options = <?php echo JsonEncode($view_semenanalysis_add->RequestSample->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_CollectionType"] = <?php echo $view_semenanalysis_add->CollectionType->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_CollectionType"].options = <?php echo JsonEncode($view_semenanalysis_add->CollectionType->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_CollectionMethod"] = <?php echo $view_semenanalysis_add->CollectionMethod->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_CollectionMethod"].options = <?php echo JsonEncode($view_semenanalysis_add->CollectionMethod->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_Medicationused"] = <?php echo $view_semenanalysis_add->Medicationused->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_Medicationused"].options = <?php echo JsonEncode($view_semenanalysis_add->Medicationused->lookupOptions()) ?>;
	fview_semenanalysisadd.lists["x_DifficultiesinCollection"] = <?php echo $view_semenanalysis_add->DifficultiesinCollection->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_DifficultiesinCollection"].options = <?php echo JsonEncode($view_semenanalysis_add->DifficultiesinCollection->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_Homogenosity"] = <?php echo $view_semenanalysis_add->Homogenosity->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_Homogenosity"].options = <?php echo JsonEncode($view_semenanalysis_add->Homogenosity->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_CompleteSample"] = <?php echo $view_semenanalysis_add->CompleteSample->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_CompleteSample"].options = <?php echo JsonEncode($view_semenanalysis_add->CompleteSample->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_SemenOrgin"] = <?php echo $view_semenanalysis_add->SemenOrgin->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_SemenOrgin"].options = <?php echo JsonEncode($view_semenanalysis_add->SemenOrgin->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_Donor"] = <?php echo $view_semenanalysis_add->Donor->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_Donor"].options = <?php echo JsonEncode($view_semenanalysis_add->Donor->lookupOptions()) ?>;
	fview_semenanalysisadd.lists["x_MACS[]"] = <?php echo $view_semenanalysis_add->MACS->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_MACS[]"].options = <?php echo JsonEncode($view_semenanalysis_add->MACS->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_SPECIFIC_PROBLEMS"] = <?php echo $view_semenanalysis_add->SPECIFIC_PROBLEMS->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_SPECIFIC_PROBLEMS"].options = <?php echo JsonEncode($view_semenanalysis_add->SPECIFIC_PROBLEMS->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_LIQUIFACTION_STORAGE"] = <?php echo $view_semenanalysis_add->LIQUIFACTION_STORAGE->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_LIQUIFACTION_STORAGE"].options = <?php echo JsonEncode($view_semenanalysis_add->LIQUIFACTION_STORAGE->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_IUI_PREP_METHOD"] = <?php echo $view_semenanalysis_add->IUI_PREP_METHOD->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_IUI_PREP_METHOD"].options = <?php echo JsonEncode($view_semenanalysis_add->IUI_PREP_METHOD->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_TIME_FROM_TRIGGER"] = <?php echo $view_semenanalysis_add->TIME_FROM_TRIGGER->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_TIME_FROM_TRIGGER"].options = <?php echo JsonEncode($view_semenanalysis_add->TIME_FROM_TRIGGER->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_COLLECTION_TO_PREPARATION"] = <?php echo $view_semenanalysis_add->COLLECTION_TO_PREPARATION->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_COLLECTION_TO_PREPARATION"].options = <?php echo JsonEncode($view_semenanalysis_add->COLLECTION_TO_PREPARATION->options(FALSE, TRUE)) ?>;
	fview_semenanalysisadd.lists["x_TIME_FROM_PREP_TO_INSEM"] = <?php echo $view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->Lookup->toClientList($view_semenanalysis_add) ?>;
	fview_semenanalysisadd.lists["x_TIME_FROM_PREP_TO_INSEM"].options = <?php echo JsonEncode($view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_semenanalysisadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_semenanalysis_add->showPageHeader(); ?>
<?php
$view_semenanalysis_add->showMessage();
?>
<form name="fview_semenanalysisadd" id="fview_semenanalysisadd" class="<?php echo $view_semenanalysis_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_semenanalysis">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_semenanalysis_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($view_semenanalysis_add->PaID->Visible) { // PaID ?>
	<div id="r_PaID" class="form-group row">
		<label id="elh_view_semenanalysis_PaID" for="x_PaID" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_PaID" type="text/html"><?php echo $view_semenanalysis_add->PaID->caption() ?><?php echo $view_semenanalysis_add->PaID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->PaID->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PaID" type="text/html"><span id="el_view_semenanalysis_PaID">
<input type="text" data-table="view_semenanalysis" data-field="x_PaID" name="x_PaID" id="x_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->PaID->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->PaID->EditValue ?>"<?php echo $view_semenanalysis_add->PaID->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->PaID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->PaName->Visible) { // PaName ?>
	<div id="r_PaName" class="form-group row">
		<label id="elh_view_semenanalysis_PaName" for="x_PaName" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_PaName" type="text/html"><?php echo $view_semenanalysis_add->PaName->caption() ?><?php echo $view_semenanalysis_add->PaName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->PaName->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PaName" type="text/html"><span id="el_view_semenanalysis_PaName">
<input type="text" data-table="view_semenanalysis" data-field="x_PaName" name="x_PaName" id="x_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->PaName->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->PaName->EditValue ?>"<?php echo $view_semenanalysis_add->PaName->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->PaName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->PaMobile->Visible) { // PaMobile ?>
	<div id="r_PaMobile" class="form-group row">
		<label id="elh_view_semenanalysis_PaMobile" for="x_PaMobile" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_PaMobile" type="text/html"><?php echo $view_semenanalysis_add->PaMobile->caption() ?><?php echo $view_semenanalysis_add->PaMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->PaMobile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PaMobile" type="text/html"><span id="el_view_semenanalysis_PaMobile">
<input type="text" data-table="view_semenanalysis" data-field="x_PaMobile" name="x_PaMobile" id="x_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->PaMobile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->PaMobile->EditValue ?>"<?php echo $view_semenanalysis_add->PaMobile->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->PaMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_view_semenanalysis_PartnerID" for="x_PartnerID" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_PartnerID" type="text/html"><?php echo $view_semenanalysis_add->PartnerID->caption() ?><?php echo $view_semenanalysis_add->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->PartnerID->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PartnerID" type="text/html"><span id="el_view_semenanalysis_PartnerID">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->PartnerID->EditValue ?>"<?php echo $view_semenanalysis_add->PartnerID->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_view_semenanalysis_PartnerName" for="x_PartnerName" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_PartnerName" type="text/html"><?php echo $view_semenanalysis_add->PartnerName->caption() ?><?php echo $view_semenanalysis_add->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->PartnerName->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PartnerName" type="text/html"><span id="el_view_semenanalysis_PartnerName">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->PartnerName->EditValue ?>"<?php echo $view_semenanalysis_add->PartnerName->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->PartnerMobile->Visible) { // PartnerMobile ?>
	<div id="r_PartnerMobile" class="form-group row">
		<label id="elh_view_semenanalysis_PartnerMobile" for="x_PartnerMobile" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_PartnerMobile" type="text/html"><?php echo $view_semenanalysis_add->PartnerMobile->caption() ?><?php echo $view_semenanalysis_add->PartnerMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->PartnerMobile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PartnerMobile" type="text/html"><span id="el_view_semenanalysis_PartnerMobile">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->PartnerMobile->EditValue ?>"<?php echo $view_semenanalysis_add->PartnerMobile->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->PartnerMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_view_semenanalysis_RIDNo" for="x_RIDNo" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_RIDNo" type="text/html"><?php echo $view_semenanalysis_add->RIDNo->caption() ?><?php echo $view_semenanalysis_add->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->RIDNo->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_RIDNo" type="text/html"><span id="el_view_semenanalysis_RIDNo">
<?php $view_semenanalysis_add->RIDNo->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNo"><?php echo EmptyValue(strval($view_semenanalysis_add->RIDNo->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_semenanalysis_add->RIDNo->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_semenanalysis_add->RIDNo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_semenanalysis_add->RIDNo->ReadOnly || $view_semenanalysis_add->RIDNo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNo',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_semenanalysis_add->RIDNo->Lookup->getParamTag($view_semenanalysis_add, "p_x_RIDNo") ?>
<input type="hidden" data-table="view_semenanalysis" data-field="x_RIDNo" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_semenanalysis_add->RIDNo->displayValueSeparatorAttribute() ?>" name="x_RIDNo" id="x_RIDNo" value="<?php echo $view_semenanalysis_add->RIDNo->CurrentValue ?>"<?php echo $view_semenanalysis_add->RIDNo->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_semenanalysis_PatientName" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_PatientName" type="text/html"><?php echo $view_semenanalysis_add->PatientName->caption() ?><?php echo $view_semenanalysis_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->PatientName->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PatientName" type="text/html"><span id="el_view_semenanalysis_PatientName">
<?php
$onchange = $view_semenanalysis_add->PatientName->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_semenanalysis_add->PatientName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PatientName">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_PatientName" id="sv_x_PatientName" value="<?php echo RemoveHtml($view_semenanalysis_add->PatientName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->PatientName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_semenanalysis_add->PatientName->getPlaceHolder()) ?>"<?php echo $view_semenanalysis_add->PatientName->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_semenanalysis_add->PatientName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_PatientName',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($view_semenanalysis_add->PatientName->ReadOnly || $view_semenanalysis_add->PatientName->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="view_semenanalysis" data-field="x_PatientName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_semenanalysis_add->PatientName->displayValueSeparatorAttribute() ?>" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($view_semenanalysis_add->PatientName->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $view_semenanalysis_add->PatientName->Lookup->getParamTag($view_semenanalysis_add, "p_x_PatientName") ?>
</span></script>
<script type="text/html" class="view_semenanalysisadd_js">
loadjs.ready(["fview_semenanalysisadd"], function() {
	fview_semenanalysisadd.createAutoSuggest({"id":"x_PatientName","forceSelect":false});
});
</script>
<?php echo $view_semenanalysis_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->HusbandName->Visible) { // HusbandName ?>
	<div id="r_HusbandName" class="form-group row">
		<label id="elh_view_semenanalysis_HusbandName" for="x_HusbandName" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_HusbandName" type="text/html"><?php echo $view_semenanalysis_add->HusbandName->caption() ?><?php echo $view_semenanalysis_add->HusbandName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->HusbandName->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_HusbandName" type="text/html"><span id="el_view_semenanalysis_HusbandName">
<?php $view_semenanalysis_add->HusbandName->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_HusbandName"><?php echo EmptyValue(strval($view_semenanalysis_add->HusbandName->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_semenanalysis_add->HusbandName->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_semenanalysis_add->HusbandName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_semenanalysis_add->HusbandName->ReadOnly || $view_semenanalysis_add->HusbandName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_HusbandName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_semenanalysis_add->HusbandName->Lookup->getParamTag($view_semenanalysis_add, "p_x_HusbandName") ?>
<input type="hidden" data-table="view_semenanalysis" data-field="x_HusbandName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_semenanalysis_add->HusbandName->displayValueSeparatorAttribute() ?>" name="x_HusbandName" id="x_HusbandName" value="<?php echo $view_semenanalysis_add->HusbandName->CurrentValue ?>"<?php echo $view_semenanalysis_add->HusbandName->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->HusbandName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->RequestDr->Visible) { // RequestDr ?>
	<div id="r_RequestDr" class="form-group row">
		<label id="elh_view_semenanalysis_RequestDr" for="x_RequestDr" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_RequestDr" type="text/html"><?php echo $view_semenanalysis_add->RequestDr->caption() ?><?php echo $view_semenanalysis_add->RequestDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->RequestDr->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_RequestDr" type="text/html"><span id="el_view_semenanalysis_RequestDr">
<input type="text" data-table="view_semenanalysis" data-field="x_RequestDr" name="x_RequestDr" id="x_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->RequestDr->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->RequestDr->EditValue ?>"<?php echo $view_semenanalysis_add->RequestDr->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->RequestDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->CollectionDate->Visible) { // CollectionDate ?>
	<div id="r_CollectionDate" class="form-group row">
		<label id="elh_view_semenanalysis_CollectionDate" for="x_CollectionDate" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_CollectionDate" type="text/html"><?php echo $view_semenanalysis_add->CollectionDate->caption() ?><?php echo $view_semenanalysis_add->CollectionDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->CollectionDate->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_CollectionDate" type="text/html"><span id="el_view_semenanalysis_CollectionDate">
<input type="text" data-table="view_semenanalysis" data-field="x_CollectionDate" data-format="7" name="x_CollectionDate" id="x_CollectionDate" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->CollectionDate->EditValue ?>"<?php echo $view_semenanalysis_add->CollectionDate->editAttributes() ?>>
<?php if (!$view_semenanalysis_add->CollectionDate->ReadOnly && !$view_semenanalysis_add->CollectionDate->Disabled && !isset($view_semenanalysis_add->CollectionDate->EditAttrs["readonly"]) && !isset($view_semenanalysis_add->CollectionDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_semenanalysisadd_js">
loadjs.ready(["fview_semenanalysisadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_semenanalysisadd", "x_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $view_semenanalysis_add->CollectionDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label id="elh_view_semenanalysis_ResultDate" for="x_ResultDate" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_ResultDate" type="text/html"><?php echo $view_semenanalysis_add->ResultDate->caption() ?><?php echo $view_semenanalysis_add->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->ResultDate->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ResultDate" type="text/html"><span id="el_view_semenanalysis_ResultDate">
<input type="text" data-table="view_semenanalysis" data-field="x_ResultDate" data-format="7" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->ResultDate->EditValue ?>"<?php echo $view_semenanalysis_add->ResultDate->editAttributes() ?>>
<?php if (!$view_semenanalysis_add->ResultDate->ReadOnly && !$view_semenanalysis_add->ResultDate->Disabled && !isset($view_semenanalysis_add->ResultDate->EditAttrs["readonly"]) && !isset($view_semenanalysis_add->ResultDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_semenanalysisadd_js">
loadjs.ready(["fview_semenanalysisadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_semenanalysisadd", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $view_semenanalysis_add->ResultDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->RequestSample->Visible) { // RequestSample ?>
	<div id="r_RequestSample" class="form-group row">
		<label id="elh_view_semenanalysis_RequestSample" for="x_RequestSample" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_RequestSample" type="text/html"><?php echo $view_semenanalysis_add->RequestSample->caption() ?><?php echo $view_semenanalysis_add->RequestSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->RequestSample->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_RequestSample" type="text/html"><span id="el_view_semenanalysis_RequestSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_RequestSample" data-value-separator="<?php echo $view_semenanalysis_add->RequestSample->displayValueSeparatorAttribute() ?>" id="x_RequestSample" name="x_RequestSample"<?php echo $view_semenanalysis_add->RequestSample->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->RequestSample->selectOptionListHtml("x_RequestSample") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->RequestSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->CollectionType->Visible) { // CollectionType ?>
	<div id="r_CollectionType" class="form-group row">
		<label id="elh_view_semenanalysis_CollectionType" for="x_CollectionType" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_CollectionType" type="text/html"><?php echo $view_semenanalysis_add->CollectionType->caption() ?><?php echo $view_semenanalysis_add->CollectionType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->CollectionType->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_CollectionType" type="text/html"><span id="el_view_semenanalysis_CollectionType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_CollectionType" data-value-separator="<?php echo $view_semenanalysis_add->CollectionType->displayValueSeparatorAttribute() ?>" id="x_CollectionType" name="x_CollectionType"<?php echo $view_semenanalysis_add->CollectionType->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->CollectionType->selectOptionListHtml("x_CollectionType") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->CollectionType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->CollectionMethod->Visible) { // CollectionMethod ?>
	<div id="r_CollectionMethod" class="form-group row">
		<label id="elh_view_semenanalysis_CollectionMethod" for="x_CollectionMethod" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_CollectionMethod" type="text/html"><?php echo $view_semenanalysis_add->CollectionMethod->caption() ?><?php echo $view_semenanalysis_add->CollectionMethod->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->CollectionMethod->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_CollectionMethod" type="text/html"><span id="el_view_semenanalysis_CollectionMethod">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_CollectionMethod" data-value-separator="<?php echo $view_semenanalysis_add->CollectionMethod->displayValueSeparatorAttribute() ?>" id="x_CollectionMethod" name="x_CollectionMethod"<?php echo $view_semenanalysis_add->CollectionMethod->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->CollectionMethod->selectOptionListHtml("x_CollectionMethod") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->CollectionMethod->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Medicationused->Visible) { // Medicationused ?>
	<div id="r_Medicationused" class="form-group row">
		<label id="elh_view_semenanalysis_Medicationused" for="x_Medicationused" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Medicationused" type="text/html"><?php echo $view_semenanalysis_add->Medicationused->caption() ?><?php echo $view_semenanalysis_add->Medicationused->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Medicationused->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Medicationused" type="text/html"><span id="el_view_semenanalysis_Medicationused">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_Medicationused" data-value-separator="<?php echo $view_semenanalysis_add->Medicationused->displayValueSeparatorAttribute() ?>" id="x_Medicationused" name="x_Medicationused"<?php echo $view_semenanalysis_add->Medicationused->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->Medicationused->selectOptionListHtml("x_Medicationused") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_semenan_medication") && !$view_semenanalysis_add->Medicationused->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Medicationused" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_semenanalysis_add->Medicationused->caption() ?>" data-title="<?php echo $view_semenanalysis_add->Medicationused->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Medicationused',url:'ivf_semenan_medicationaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $view_semenanalysis_add->Medicationused->Lookup->getParamTag($view_semenanalysis_add, "p_x_Medicationused") ?>
</span></script>
<?php echo $view_semenanalysis_add->Medicationused->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<div id="r_DifficultiesinCollection" class="form-group row">
		<label id="elh_view_semenanalysis_DifficultiesinCollection" for="x_DifficultiesinCollection" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_DifficultiesinCollection" type="text/html"><?php echo $view_semenanalysis_add->DifficultiesinCollection->caption() ?><?php echo $view_semenanalysis_add->DifficultiesinCollection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->DifficultiesinCollection->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_DifficultiesinCollection" type="text/html"><span id="el_view_semenanalysis_DifficultiesinCollection">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_DifficultiesinCollection" data-value-separator="<?php echo $view_semenanalysis_add->DifficultiesinCollection->displayValueSeparatorAttribute() ?>" id="x_DifficultiesinCollection" name="x_DifficultiesinCollection"<?php echo $view_semenanalysis_add->DifficultiesinCollection->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->DifficultiesinCollection->selectOptionListHtml("x_DifficultiesinCollection") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->DifficultiesinCollection->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Volume->Visible) { // Volume ?>
	<div id="r_Volume" class="form-group row">
		<label id="elh_view_semenanalysis_Volume" for="x_Volume" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Volume" type="text/html"><?php echo $view_semenanalysis_add->Volume->caption() ?><?php echo $view_semenanalysis_add->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Volume->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Volume" type="text/html"><span id="el_view_semenanalysis_Volume">
<input type="text" data-table="view_semenanalysis" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Volume->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Volume->EditValue ?>"<?php echo $view_semenanalysis_add->Volume->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Volume->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->pH->Visible) { // pH ?>
	<div id="r_pH" class="form-group row">
		<label id="elh_view_semenanalysis_pH" for="x_pH" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_pH" type="text/html"><?php echo $view_semenanalysis_add->pH->caption() ?><?php echo $view_semenanalysis_add->pH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->pH->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_pH" type="text/html"><span id="el_view_semenanalysis_pH">
<input type="text" data-table="view_semenanalysis" data-field="x_pH" name="x_pH" id="x_pH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->pH->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->pH->EditValue ?>"<?php echo $view_semenanalysis_add->pH->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->pH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Timeofcollection->Visible) { // Timeofcollection ?>
	<div id="r_Timeofcollection" class="form-group row">
		<label id="elh_view_semenanalysis_Timeofcollection" for="x_Timeofcollection" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Timeofcollection" type="text/html"><?php echo $view_semenanalysis_add->Timeofcollection->caption() ?><?php echo $view_semenanalysis_add->Timeofcollection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Timeofcollection->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Timeofcollection" type="text/html"><span id="el_view_semenanalysis_Timeofcollection">
<input type="text" data-table="view_semenanalysis" data-field="x_Timeofcollection" name="x_Timeofcollection" id="x_Timeofcollection" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Timeofcollection->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Timeofcollection->EditValue ?>"<?php echo $view_semenanalysis_add->Timeofcollection->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Timeofcollection->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Timeofexamination->Visible) { // Timeofexamination ?>
	<div id="r_Timeofexamination" class="form-group row">
		<label id="elh_view_semenanalysis_Timeofexamination" for="x_Timeofexamination" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Timeofexamination" type="text/html"><?php echo $view_semenanalysis_add->Timeofexamination->caption() ?><?php echo $view_semenanalysis_add->Timeofexamination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Timeofexamination->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Timeofexamination" type="text/html"><span id="el_view_semenanalysis_Timeofexamination">
<input type="text" data-table="view_semenanalysis" data-field="x_Timeofexamination" name="x_Timeofexamination" id="x_Timeofexamination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Timeofexamination->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Timeofexamination->EditValue ?>"<?php echo $view_semenanalysis_add->Timeofexamination->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Timeofexamination->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Concentration->Visible) { // Concentration ?>
	<div id="r_Concentration" class="form-group row">
		<label id="elh_view_semenanalysis_Concentration" for="x_Concentration" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Concentration" type="text/html"><?php echo $view_semenanalysis_add->Concentration->caption() ?><?php echo $view_semenanalysis_add->Concentration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Concentration->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Concentration" type="text/html"><span id="el_view_semenanalysis_Concentration">
<input type="text" data-table="view_semenanalysis" data-field="x_Concentration" name="x_Concentration" id="x_Concentration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Concentration->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Concentration->EditValue ?>"<?php echo $view_semenanalysis_add->Concentration->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Concentration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Total->Visible) { // Total ?>
	<div id="r_Total" class="form-group row">
		<label id="elh_view_semenanalysis_Total" for="x_Total" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Total" type="text/html"><?php echo $view_semenanalysis_add->Total->caption() ?><?php echo $view_semenanalysis_add->Total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Total->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Total" type="text/html"><span id="el_view_semenanalysis_Total">
<input type="text" data-table="view_semenanalysis" data-field="x_Total" name="x_Total" id="x_Total" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Total->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Total->EditValue ?>"<?php echo $view_semenanalysis_add->Total->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Total->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<div id="r_ProgressiveMotility" class="form-group row">
		<label id="elh_view_semenanalysis_ProgressiveMotility" for="x_ProgressiveMotility" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_ProgressiveMotility" type="text/html"><?php echo $view_semenanalysis_add->ProgressiveMotility->caption() ?><?php echo $view_semenanalysis_add->ProgressiveMotility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->ProgressiveMotility->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ProgressiveMotility" type="text/html"><span id="el_view_semenanalysis_ProgressiveMotility">
<input type="text" data-table="view_semenanalysis" data-field="x_ProgressiveMotility" name="x_ProgressiveMotility" id="x_ProgressiveMotility" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->ProgressiveMotility->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->ProgressiveMotility->EditValue ?>"<?php echo $view_semenanalysis_add->ProgressiveMotility->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->ProgressiveMotility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<div id="r_NonProgrssiveMotile" class="form-group row">
		<label id="elh_view_semenanalysis_NonProgrssiveMotile" for="x_NonProgrssiveMotile" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_NonProgrssiveMotile" type="text/html"><?php echo $view_semenanalysis_add->NonProgrssiveMotile->caption() ?><?php echo $view_semenanalysis_add->NonProgrssiveMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->NonProgrssiveMotile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NonProgrssiveMotile" type="text/html"><span id="el_view_semenanalysis_NonProgrssiveMotile">
<input type="text" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile" name="x_NonProgrssiveMotile" id="x_NonProgrssiveMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->NonProgrssiveMotile->EditValue ?>"<?php echo $view_semenanalysis_add->NonProgrssiveMotile->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->NonProgrssiveMotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Immotile->Visible) { // Immotile ?>
	<div id="r_Immotile" class="form-group row">
		<label id="elh_view_semenanalysis_Immotile" for="x_Immotile" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Immotile" type="text/html"><?php echo $view_semenanalysis_add->Immotile->caption() ?><?php echo $view_semenanalysis_add->Immotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Immotile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Immotile" type="text/html"><span id="el_view_semenanalysis_Immotile">
<input type="text" data-table="view_semenanalysis" data-field="x_Immotile" name="x_Immotile" id="x_Immotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Immotile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Immotile->EditValue ?>"<?php echo $view_semenanalysis_add->Immotile->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Immotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<div id="r_TotalProgrssiveMotile" class="form-group row">
		<label id="elh_view_semenanalysis_TotalProgrssiveMotile" for="x_TotalProgrssiveMotile" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_TotalProgrssiveMotile" type="text/html"><?php echo $view_semenanalysis_add->TotalProgrssiveMotile->caption() ?><?php echo $view_semenanalysis_add->TotalProgrssiveMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->TotalProgrssiveMotile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TotalProgrssiveMotile" type="text/html"><span id="el_view_semenanalysis_TotalProgrssiveMotile">
<input type="text" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile" name="x_TotalProgrssiveMotile" id="x_TotalProgrssiveMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->TotalProgrssiveMotile->EditValue ?>"<?php echo $view_semenanalysis_add->TotalProgrssiveMotile->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->TotalProgrssiveMotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Appearance->Visible) { // Appearance ?>
	<div id="r_Appearance" class="form-group row">
		<label id="elh_view_semenanalysis_Appearance" for="x_Appearance" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Appearance" type="text/html"><?php echo $view_semenanalysis_add->Appearance->caption() ?><?php echo $view_semenanalysis_add->Appearance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Appearance->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Appearance" type="text/html"><span id="el_view_semenanalysis_Appearance">
<input type="text" data-table="view_semenanalysis" data-field="x_Appearance" name="x_Appearance" id="x_Appearance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Appearance->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Appearance->EditValue ?>"<?php echo $view_semenanalysis_add->Appearance->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Appearance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Homogenosity->Visible) { // Homogenosity ?>
	<div id="r_Homogenosity" class="form-group row">
		<label id="elh_view_semenanalysis_Homogenosity" for="x_Homogenosity" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Homogenosity" type="text/html"><?php echo $view_semenanalysis_add->Homogenosity->caption() ?><?php echo $view_semenanalysis_add->Homogenosity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Homogenosity->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Homogenosity" type="text/html"><span id="el_view_semenanalysis_Homogenosity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_Homogenosity" data-value-separator="<?php echo $view_semenanalysis_add->Homogenosity->displayValueSeparatorAttribute() ?>" id="x_Homogenosity" name="x_Homogenosity"<?php echo $view_semenanalysis_add->Homogenosity->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->Homogenosity->selectOptionListHtml("x_Homogenosity") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->Homogenosity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->CompleteSample->Visible) { // CompleteSample ?>
	<div id="r_CompleteSample" class="form-group row">
		<label id="elh_view_semenanalysis_CompleteSample" for="x_CompleteSample" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_CompleteSample" type="text/html"><?php echo $view_semenanalysis_add->CompleteSample->caption() ?><?php echo $view_semenanalysis_add->CompleteSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->CompleteSample->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_CompleteSample" type="text/html"><span id="el_view_semenanalysis_CompleteSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_CompleteSample" data-value-separator="<?php echo $view_semenanalysis_add->CompleteSample->displayValueSeparatorAttribute() ?>" id="x_CompleteSample" name="x_CompleteSample"<?php echo $view_semenanalysis_add->CompleteSample->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->CompleteSample->selectOptionListHtml("x_CompleteSample") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->CompleteSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<div id="r_Liquefactiontime" class="form-group row">
		<label id="elh_view_semenanalysis_Liquefactiontime" for="x_Liquefactiontime" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Liquefactiontime" type="text/html"><?php echo $view_semenanalysis_add->Liquefactiontime->caption() ?><?php echo $view_semenanalysis_add->Liquefactiontime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Liquefactiontime->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Liquefactiontime" type="text/html"><span id="el_view_semenanalysis_Liquefactiontime">
<input type="text" data-table="view_semenanalysis" data-field="x_Liquefactiontime" name="x_Liquefactiontime" id="x_Liquefactiontime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Liquefactiontime->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Liquefactiontime->EditValue ?>"<?php echo $view_semenanalysis_add->Liquefactiontime->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Liquefactiontime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Normal->Visible) { // Normal ?>
	<div id="r_Normal" class="form-group row">
		<label id="elh_view_semenanalysis_Normal" for="x_Normal" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Normal" type="text/html"><?php echo $view_semenanalysis_add->Normal->caption() ?><?php echo $view_semenanalysis_add->Normal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Normal->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Normal" type="text/html"><span id="el_view_semenanalysis_Normal">
<input type="text" data-table="view_semenanalysis" data-field="x_Normal" name="x_Normal" id="x_Normal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Normal->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Normal->EditValue ?>"<?php echo $view_semenanalysis_add->Normal->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Normal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label id="elh_view_semenanalysis_Abnormal" for="x_Abnormal" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Abnormal" type="text/html"><?php echo $view_semenanalysis_add->Abnormal->caption() ?><?php echo $view_semenanalysis_add->Abnormal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Abnormal->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Abnormal" type="text/html"><span id="el_view_semenanalysis_Abnormal">
<input type="text" data-table="view_semenanalysis" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Abnormal->EditValue ?>"<?php echo $view_semenanalysis_add->Abnormal->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Abnormal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Headdefects->Visible) { // Headdefects ?>
	<div id="r_Headdefects" class="form-group row">
		<label id="elh_view_semenanalysis_Headdefects" for="x_Headdefects" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Headdefects" type="text/html"><?php echo $view_semenanalysis_add->Headdefects->caption() ?><?php echo $view_semenanalysis_add->Headdefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Headdefects->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Headdefects" type="text/html"><span id="el_view_semenanalysis_Headdefects">
<input type="text" data-table="view_semenanalysis" data-field="x_Headdefects" name="x_Headdefects" id="x_Headdefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Headdefects->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Headdefects->EditValue ?>"<?php echo $view_semenanalysis_add->Headdefects->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Headdefects->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<div id="r_MidpieceDefects" class="form-group row">
		<label id="elh_view_semenanalysis_MidpieceDefects" for="x_MidpieceDefects" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_MidpieceDefects" type="text/html"><?php echo $view_semenanalysis_add->MidpieceDefects->caption() ?><?php echo $view_semenanalysis_add->MidpieceDefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->MidpieceDefects->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_MidpieceDefects" type="text/html"><span id="el_view_semenanalysis_MidpieceDefects">
<input type="text" data-table="view_semenanalysis" data-field="x_MidpieceDefects" name="x_MidpieceDefects" id="x_MidpieceDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->MidpieceDefects->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->MidpieceDefects->EditValue ?>"<?php echo $view_semenanalysis_add->MidpieceDefects->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->MidpieceDefects->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->TailDefects->Visible) { // TailDefects ?>
	<div id="r_TailDefects" class="form-group row">
		<label id="elh_view_semenanalysis_TailDefects" for="x_TailDefects" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_TailDefects" type="text/html"><?php echo $view_semenanalysis_add->TailDefects->caption() ?><?php echo $view_semenanalysis_add->TailDefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->TailDefects->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TailDefects" type="text/html"><span id="el_view_semenanalysis_TailDefects">
<input type="text" data-table="view_semenanalysis" data-field="x_TailDefects" name="x_TailDefects" id="x_TailDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->TailDefects->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->TailDefects->EditValue ?>"<?php echo $view_semenanalysis_add->TailDefects->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->TailDefects->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<div id="r_NormalProgMotile" class="form-group row">
		<label id="elh_view_semenanalysis_NormalProgMotile" for="x_NormalProgMotile" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_NormalProgMotile" type="text/html"><?php echo $view_semenanalysis_add->NormalProgMotile->caption() ?><?php echo $view_semenanalysis_add->NormalProgMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->NormalProgMotile->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NormalProgMotile" type="text/html"><span id="el_view_semenanalysis_NormalProgMotile">
<input type="text" data-table="view_semenanalysis" data-field="x_NormalProgMotile" name="x_NormalProgMotile" id="x_NormalProgMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->NormalProgMotile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->NormalProgMotile->EditValue ?>"<?php echo $view_semenanalysis_add->NormalProgMotile->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->NormalProgMotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->ImmatureForms->Visible) { // ImmatureForms ?>
	<div id="r_ImmatureForms" class="form-group row">
		<label id="elh_view_semenanalysis_ImmatureForms" for="x_ImmatureForms" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_ImmatureForms" type="text/html"><?php echo $view_semenanalysis_add->ImmatureForms->caption() ?><?php echo $view_semenanalysis_add->ImmatureForms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->ImmatureForms->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ImmatureForms" type="text/html"><span id="el_view_semenanalysis_ImmatureForms">
<input type="text" data-table="view_semenanalysis" data-field="x_ImmatureForms" name="x_ImmatureForms" id="x_ImmatureForms" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->ImmatureForms->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->ImmatureForms->EditValue ?>"<?php echo $view_semenanalysis_add->ImmatureForms->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->ImmatureForms->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Leucocytes->Visible) { // Leucocytes ?>
	<div id="r_Leucocytes" class="form-group row">
		<label id="elh_view_semenanalysis_Leucocytes" for="x_Leucocytes" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Leucocytes" type="text/html"><?php echo $view_semenanalysis_add->Leucocytes->caption() ?><?php echo $view_semenanalysis_add->Leucocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Leucocytes->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Leucocytes" type="text/html"><span id="el_view_semenanalysis_Leucocytes">
<input type="text" data-table="view_semenanalysis" data-field="x_Leucocytes" name="x_Leucocytes" id="x_Leucocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Leucocytes->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Leucocytes->EditValue ?>"<?php echo $view_semenanalysis_add->Leucocytes->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Leucocytes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Agglutination->Visible) { // Agglutination ?>
	<div id="r_Agglutination" class="form-group row">
		<label id="elh_view_semenanalysis_Agglutination" for="x_Agglutination" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Agglutination" type="text/html"><?php echo $view_semenanalysis_add->Agglutination->caption() ?><?php echo $view_semenanalysis_add->Agglutination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Agglutination->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Agglutination" type="text/html"><span id="el_view_semenanalysis_Agglutination">
<input type="text" data-table="view_semenanalysis" data-field="x_Agglutination" name="x_Agglutination" id="x_Agglutination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Agglutination->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Agglutination->EditValue ?>"<?php echo $view_semenanalysis_add->Agglutination->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Agglutination->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Debris->Visible) { // Debris ?>
	<div id="r_Debris" class="form-group row">
		<label id="elh_view_semenanalysis_Debris" for="x_Debris" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Debris" type="text/html"><?php echo $view_semenanalysis_add->Debris->caption() ?><?php echo $view_semenanalysis_add->Debris->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Debris->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Debris" type="text/html"><span id="el_view_semenanalysis_Debris">
<input type="text" data-table="view_semenanalysis" data-field="x_Debris" name="x_Debris" id="x_Debris" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Debris->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Debris->EditValue ?>"<?php echo $view_semenanalysis_add->Debris->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Debris->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Diagnosis->Visible) { // Diagnosis ?>
	<div id="r_Diagnosis" class="form-group row">
		<label id="elh_view_semenanalysis_Diagnosis" for="x_Diagnosis" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Diagnosis" type="text/html"><?php echo $view_semenanalysis_add->Diagnosis->caption() ?><?php echo $view_semenanalysis_add->Diagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Diagnosis->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Diagnosis" type="text/html"><span id="el_view_semenanalysis_Diagnosis">
<input type="text" data-table="view_semenanalysis" data-field="x_Diagnosis" name="x_Diagnosis" id="x_Diagnosis" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Diagnosis->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Diagnosis->EditValue ?>"<?php echo $view_semenanalysis_add->Diagnosis->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Diagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Observations->Visible) { // Observations ?>
	<div id="r_Observations" class="form-group row">
		<label id="elh_view_semenanalysis_Observations" for="x_Observations" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Observations" type="text/html"><?php echo $view_semenanalysis_add->Observations->caption() ?><?php echo $view_semenanalysis_add->Observations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Observations->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Observations" type="text/html"><span id="el_view_semenanalysis_Observations">
<input type="text" data-table="view_semenanalysis" data-field="x_Observations" name="x_Observations" id="x_Observations" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Observations->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Observations->EditValue ?>"<?php echo $view_semenanalysis_add->Observations->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Observations->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Signature->Visible) { // Signature ?>
	<div id="r_Signature" class="form-group row">
		<label id="elh_view_semenanalysis_Signature" for="x_Signature" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Signature" type="text/html"><?php echo $view_semenanalysis_add->Signature->caption() ?><?php echo $view_semenanalysis_add->Signature->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Signature->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Signature" type="text/html"><span id="el_view_semenanalysis_Signature">
<input type="text" data-table="view_semenanalysis" data-field="x_Signature" name="x_Signature" id="x_Signature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Signature->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Signature->EditValue ?>"<?php echo $view_semenanalysis_add->Signature->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Signature->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->SemenOrgin->Visible) { // SemenOrgin ?>
	<div id="r_SemenOrgin" class="form-group row">
		<label id="elh_view_semenanalysis_SemenOrgin" for="x_SemenOrgin" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_SemenOrgin" type="text/html"><?php echo $view_semenanalysis_add->SemenOrgin->caption() ?><?php echo $view_semenanalysis_add->SemenOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->SemenOrgin->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_SemenOrgin" type="text/html"><span id="el_view_semenanalysis_SemenOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_SemenOrgin" data-value-separator="<?php echo $view_semenanalysis_add->SemenOrgin->displayValueSeparatorAttribute() ?>" id="x_SemenOrgin" name="x_SemenOrgin"<?php echo $view_semenanalysis_add->SemenOrgin->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->SemenOrgin->selectOptionListHtml("x_SemenOrgin") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->SemenOrgin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Donor->Visible) { // Donor ?>
	<div id="r_Donor" class="form-group row">
		<label id="elh_view_semenanalysis_Donor" for="x_Donor" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Donor" type="text/html"><?php echo $view_semenanalysis_add->Donor->caption() ?><?php echo $view_semenanalysis_add->Donor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Donor->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Donor" type="text/html"><span id="el_view_semenanalysis_Donor">
<?php $view_semenanalysis_add->Donor->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Donor"><?php echo EmptyValue(strval($view_semenanalysis_add->Donor->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_semenanalysis_add->Donor->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_semenanalysis_add->Donor->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_semenanalysis_add->Donor->ReadOnly || $view_semenanalysis_add->Donor->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Donor',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_semenanalysis_add->Donor->Lookup->getParamTag($view_semenanalysis_add, "p_x_Donor") ?>
<input type="hidden" data-table="view_semenanalysis" data-field="x_Donor" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_semenanalysis_add->Donor->displayValueSeparatorAttribute() ?>" name="x_Donor" id="x_Donor" value="<?php echo $view_semenanalysis_add->Donor->CurrentValue ?>"<?php echo $view_semenanalysis_add->Donor->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Donor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<div id="r_DonorBloodgroup" class="form-group row">
		<label id="elh_view_semenanalysis_DonorBloodgroup" for="x_DonorBloodgroup" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_DonorBloodgroup" type="text/html"><?php echo $view_semenanalysis_add->DonorBloodgroup->caption() ?><?php echo $view_semenanalysis_add->DonorBloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->DonorBloodgroup->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_DonorBloodgroup" type="text/html"><span id="el_view_semenanalysis_DonorBloodgroup">
<input type="text" data-table="view_semenanalysis" data-field="x_DonorBloodgroup" name="x_DonorBloodgroup" id="x_DonorBloodgroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->DonorBloodgroup->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->DonorBloodgroup->EditValue ?>"<?php echo $view_semenanalysis_add->DonorBloodgroup->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->DonorBloodgroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Tank->Visible) { // Tank ?>
	<div id="r_Tank" class="form-group row">
		<label id="elh_view_semenanalysis_Tank" for="x_Tank" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Tank" type="text/html"><?php echo $view_semenanalysis_add->Tank->caption() ?><?php echo $view_semenanalysis_add->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Tank->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Tank" type="text/html"><span id="el_view_semenanalysis_Tank">
<input type="text" data-table="view_semenanalysis" data-field="x_Tank" name="x_Tank" id="x_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Tank->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Tank->EditValue ?>"<?php echo $view_semenanalysis_add->Tank->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Tank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Location->Visible) { // Location ?>
	<div id="r_Location" class="form-group row">
		<label id="elh_view_semenanalysis_Location" for="x_Location" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Location" type="text/html"><?php echo $view_semenanalysis_add->Location->caption() ?><?php echo $view_semenanalysis_add->Location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Location->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Location" type="text/html"><span id="el_view_semenanalysis_Location">
<input type="text" data-table="view_semenanalysis" data-field="x_Location" name="x_Location" id="x_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Location->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Location->EditValue ?>"<?php echo $view_semenanalysis_add->Location->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Location->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Volume1->Visible) { // Volume1 ?>
	<div id="r_Volume1" class="form-group row">
		<label id="elh_view_semenanalysis_Volume1" for="x_Volume1" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Volume1" type="text/html"><?php echo $view_semenanalysis_add->Volume1->caption() ?><?php echo $view_semenanalysis_add->Volume1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Volume1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Volume1" type="text/html"><span id="el_view_semenanalysis_Volume1">
<input type="text" data-table="view_semenanalysis" data-field="x_Volume1" name="x_Volume1" id="x_Volume1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Volume1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Volume1->EditValue ?>"<?php echo $view_semenanalysis_add->Volume1->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Volume1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Concentration1->Visible) { // Concentration1 ?>
	<div id="r_Concentration1" class="form-group row">
		<label id="elh_view_semenanalysis_Concentration1" for="x_Concentration1" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Concentration1" type="text/html"><?php echo $view_semenanalysis_add->Concentration1->caption() ?><?php echo $view_semenanalysis_add->Concentration1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Concentration1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Concentration1" type="text/html"><span id="el_view_semenanalysis_Concentration1">
<input type="text" data-table="view_semenanalysis" data-field="x_Concentration1" name="x_Concentration1" id="x_Concentration1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Concentration1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Concentration1->EditValue ?>"<?php echo $view_semenanalysis_add->Concentration1->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Concentration1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Total1->Visible) { // Total1 ?>
	<div id="r_Total1" class="form-group row">
		<label id="elh_view_semenanalysis_Total1" for="x_Total1" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Total1" type="text/html"><?php echo $view_semenanalysis_add->Total1->caption() ?><?php echo $view_semenanalysis_add->Total1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Total1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Total1" type="text/html"><span id="el_view_semenanalysis_Total1">
<input type="text" data-table="view_semenanalysis" data-field="x_Total1" name="x_Total1" id="x_Total1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Total1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Total1->EditValue ?>"<?php echo $view_semenanalysis_add->Total1->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Total1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<div id="r_ProgressiveMotility1" class="form-group row">
		<label id="elh_view_semenanalysis_ProgressiveMotility1" for="x_ProgressiveMotility1" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_ProgressiveMotility1" type="text/html"><?php echo $view_semenanalysis_add->ProgressiveMotility1->caption() ?><?php echo $view_semenanalysis_add->ProgressiveMotility1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->ProgressiveMotility1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ProgressiveMotility1" type="text/html"><span id="el_view_semenanalysis_ProgressiveMotility1">
<input type="text" data-table="view_semenanalysis" data-field="x_ProgressiveMotility1" name="x_ProgressiveMotility1" id="x_ProgressiveMotility1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->ProgressiveMotility1->EditValue ?>"<?php echo $view_semenanalysis_add->ProgressiveMotility1->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->ProgressiveMotility1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<div id="r_NonProgrssiveMotile1" class="form-group row">
		<label id="elh_view_semenanalysis_NonProgrssiveMotile1" for="x_NonProgrssiveMotile1" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_NonProgrssiveMotile1" type="text/html"><?php echo $view_semenanalysis_add->NonProgrssiveMotile1->caption() ?><?php echo $view_semenanalysis_add->NonProgrssiveMotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->NonProgrssiveMotile1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NonProgrssiveMotile1" type="text/html"><span id="el_view_semenanalysis_NonProgrssiveMotile1">
<input type="text" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile1" name="x_NonProgrssiveMotile1" id="x_NonProgrssiveMotile1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->NonProgrssiveMotile1->EditValue ?>"<?php echo $view_semenanalysis_add->NonProgrssiveMotile1->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->NonProgrssiveMotile1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Immotile1->Visible) { // Immotile1 ?>
	<div id="r_Immotile1" class="form-group row">
		<label id="elh_view_semenanalysis_Immotile1" for="x_Immotile1" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Immotile1" type="text/html"><?php echo $view_semenanalysis_add->Immotile1->caption() ?><?php echo $view_semenanalysis_add->Immotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Immotile1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Immotile1" type="text/html"><span id="el_view_semenanalysis_Immotile1">
<input type="text" data-table="view_semenanalysis" data-field="x_Immotile1" name="x_Immotile1" id="x_Immotile1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Immotile1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Immotile1->EditValue ?>"<?php echo $view_semenanalysis_add->Immotile1->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Immotile1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<div id="r_TotalProgrssiveMotile1" class="form-group row">
		<label id="elh_view_semenanalysis_TotalProgrssiveMotile1" for="x_TotalProgrssiveMotile1" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_TotalProgrssiveMotile1" type="text/html"><?php echo $view_semenanalysis_add->TotalProgrssiveMotile1->caption() ?><?php echo $view_semenanalysis_add->TotalProgrssiveMotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->TotalProgrssiveMotile1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TotalProgrssiveMotile1" type="text/html"><span id="el_view_semenanalysis_TotalProgrssiveMotile1">
<input type="text" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile1" name="x_TotalProgrssiveMotile1" id="x_TotalProgrssiveMotile1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->TotalProgrssiveMotile1->EditValue ?>"<?php echo $view_semenanalysis_add->TotalProgrssiveMotile1->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->TotalProgrssiveMotile1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_view_semenanalysis_TidNo" for="x_TidNo" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_TidNo" type="text/html"><?php echo $view_semenanalysis_add->TidNo->caption() ?><?php echo $view_semenanalysis_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->TidNo->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TidNo" type="text/html"><span id="el_view_semenanalysis_TidNo">
<input type="text" data-table="view_semenanalysis" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->TidNo->EditValue ?>"<?php echo $view_semenanalysis_add->TidNo->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Color->Visible) { // Color ?>
	<div id="r_Color" class="form-group row">
		<label id="elh_view_semenanalysis_Color" for="x_Color" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Color" type="text/html"><?php echo $view_semenanalysis_add->Color->caption() ?><?php echo $view_semenanalysis_add->Color->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Color->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Color" type="text/html"><span id="el_view_semenanalysis_Color">
<input type="text" data-table="view_semenanalysis" data-field="x_Color" name="x_Color" id="x_Color" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Color->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Color->EditValue ?>"<?php echo $view_semenanalysis_add->Color->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Color->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->DoneBy->Visible) { // DoneBy ?>
	<div id="r_DoneBy" class="form-group row">
		<label id="elh_view_semenanalysis_DoneBy" for="x_DoneBy" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_DoneBy" type="text/html"><?php echo $view_semenanalysis_add->DoneBy->caption() ?><?php echo $view_semenanalysis_add->DoneBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->DoneBy->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_DoneBy" type="text/html"><span id="el_view_semenanalysis_DoneBy">
<input type="text" data-table="view_semenanalysis" data-field="x_DoneBy" name="x_DoneBy" id="x_DoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->DoneBy->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->DoneBy->EditValue ?>"<?php echo $view_semenanalysis_add->DoneBy->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->DoneBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_view_semenanalysis_Method" for="x_Method" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Method" type="text/html"><?php echo $view_semenanalysis_add->Method->caption() ?><?php echo $view_semenanalysis_add->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Method->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Method" type="text/html"><span id="el_view_semenanalysis_Method">
<input type="text" data-table="view_semenanalysis" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Method->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Method->EditValue ?>"<?php echo $view_semenanalysis_add->Method->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Abstinence->Visible) { // Abstinence ?>
	<div id="r_Abstinence" class="form-group row">
		<label id="elh_view_semenanalysis_Abstinence" for="x_Abstinence" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Abstinence" type="text/html"><?php echo $view_semenanalysis_add->Abstinence->caption() ?><?php echo $view_semenanalysis_add->Abstinence->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Abstinence->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Abstinence" type="text/html"><span id="el_view_semenanalysis_Abstinence">
<input type="text" data-table="view_semenanalysis" data-field="x_Abstinence" name="x_Abstinence" id="x_Abstinence" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Abstinence->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Abstinence->EditValue ?>"<?php echo $view_semenanalysis_add->Abstinence->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Abstinence->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->ProcessedBy->Visible) { // ProcessedBy ?>
	<div id="r_ProcessedBy" class="form-group row">
		<label id="elh_view_semenanalysis_ProcessedBy" for="x_ProcessedBy" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_ProcessedBy" type="text/html"><?php echo $view_semenanalysis_add->ProcessedBy->caption() ?><?php echo $view_semenanalysis_add->ProcessedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->ProcessedBy->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ProcessedBy" type="text/html"><span id="el_view_semenanalysis_ProcessedBy">
<input type="text" data-table="view_semenanalysis" data-field="x_ProcessedBy" name="x_ProcessedBy" id="x_ProcessedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->ProcessedBy->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->ProcessedBy->EditValue ?>"<?php echo $view_semenanalysis_add->ProcessedBy->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->ProcessedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->InseminationTime->Visible) { // InseminationTime ?>
	<div id="r_InseminationTime" class="form-group row">
		<label id="elh_view_semenanalysis_InseminationTime" for="x_InseminationTime" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_InseminationTime" type="text/html"><?php echo $view_semenanalysis_add->InseminationTime->caption() ?><?php echo $view_semenanalysis_add->InseminationTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->InseminationTime->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_InseminationTime" type="text/html"><span id="el_view_semenanalysis_InseminationTime">
<input type="text" data-table="view_semenanalysis" data-field="x_InseminationTime" name="x_InseminationTime" id="x_InseminationTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->InseminationTime->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->InseminationTime->EditValue ?>"<?php echo $view_semenanalysis_add->InseminationTime->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->InseminationTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->InseminationBy->Visible) { // InseminationBy ?>
	<div id="r_InseminationBy" class="form-group row">
		<label id="elh_view_semenanalysis_InseminationBy" for="x_InseminationBy" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_InseminationBy" type="text/html"><?php echo $view_semenanalysis_add->InseminationBy->caption() ?><?php echo $view_semenanalysis_add->InseminationBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->InseminationBy->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_InseminationBy" type="text/html"><span id="el_view_semenanalysis_InseminationBy">
<input type="text" data-table="view_semenanalysis" data-field="x_InseminationBy" name="x_InseminationBy" id="x_InseminationBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->InseminationBy->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->InseminationBy->EditValue ?>"<?php echo $view_semenanalysis_add->InseminationBy->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->InseminationBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Big->Visible) { // Big ?>
	<div id="r_Big" class="form-group row">
		<label id="elh_view_semenanalysis_Big" for="x_Big" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Big" type="text/html"><?php echo $view_semenanalysis_add->Big->caption() ?><?php echo $view_semenanalysis_add->Big->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Big->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Big" type="text/html"><span id="el_view_semenanalysis_Big">
<input type="text" data-table="view_semenanalysis" data-field="x_Big" name="x_Big" id="x_Big" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Big->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Big->EditValue ?>"<?php echo $view_semenanalysis_add->Big->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Big->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Medium->Visible) { // Medium ?>
	<div id="r_Medium" class="form-group row">
		<label id="elh_view_semenanalysis_Medium" for="x_Medium" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Medium" type="text/html"><?php echo $view_semenanalysis_add->Medium->caption() ?><?php echo $view_semenanalysis_add->Medium->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Medium->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Medium" type="text/html"><span id="el_view_semenanalysis_Medium">
<input type="text" data-table="view_semenanalysis" data-field="x_Medium" name="x_Medium" id="x_Medium" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Medium->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Medium->EditValue ?>"<?php echo $view_semenanalysis_add->Medium->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Medium->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Small->Visible) { // Small ?>
	<div id="r_Small" class="form-group row">
		<label id="elh_view_semenanalysis_Small" for="x_Small" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Small" type="text/html"><?php echo $view_semenanalysis_add->Small->caption() ?><?php echo $view_semenanalysis_add->Small->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Small->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Small" type="text/html"><span id="el_view_semenanalysis_Small">
<input type="text" data-table="view_semenanalysis" data-field="x_Small" name="x_Small" id="x_Small" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Small->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Small->EditValue ?>"<?php echo $view_semenanalysis_add->Small->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Small->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->NoHalo->Visible) { // NoHalo ?>
	<div id="r_NoHalo" class="form-group row">
		<label id="elh_view_semenanalysis_NoHalo" for="x_NoHalo" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_NoHalo" type="text/html"><?php echo $view_semenanalysis_add->NoHalo->caption() ?><?php echo $view_semenanalysis_add->NoHalo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->NoHalo->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NoHalo" type="text/html"><span id="el_view_semenanalysis_NoHalo">
<input type="text" data-table="view_semenanalysis" data-field="x_NoHalo" name="x_NoHalo" id="x_NoHalo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->NoHalo->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->NoHalo->EditValue ?>"<?php echo $view_semenanalysis_add->NoHalo->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->NoHalo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Fragmented->Visible) { // Fragmented ?>
	<div id="r_Fragmented" class="form-group row">
		<label id="elh_view_semenanalysis_Fragmented" for="x_Fragmented" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Fragmented" type="text/html"><?php echo $view_semenanalysis_add->Fragmented->caption() ?><?php echo $view_semenanalysis_add->Fragmented->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Fragmented->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Fragmented" type="text/html"><span id="el_view_semenanalysis_Fragmented">
<input type="text" data-table="view_semenanalysis" data-field="x_Fragmented" name="x_Fragmented" id="x_Fragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Fragmented->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Fragmented->EditValue ?>"<?php echo $view_semenanalysis_add->Fragmented->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Fragmented->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->NonFragmented->Visible) { // NonFragmented ?>
	<div id="r_NonFragmented" class="form-group row">
		<label id="elh_view_semenanalysis_NonFragmented" for="x_NonFragmented" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_NonFragmented" type="text/html"><?php echo $view_semenanalysis_add->NonFragmented->caption() ?><?php echo $view_semenanalysis_add->NonFragmented->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->NonFragmented->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NonFragmented" type="text/html"><span id="el_view_semenanalysis_NonFragmented">
<input type="text" data-table="view_semenanalysis" data-field="x_NonFragmented" name="x_NonFragmented" id="x_NonFragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->NonFragmented->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->NonFragmented->EditValue ?>"<?php echo $view_semenanalysis_add->NonFragmented->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->NonFragmented->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->DFI->Visible) { // DFI ?>
	<div id="r_DFI" class="form-group row">
		<label id="elh_view_semenanalysis_DFI" for="x_DFI" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_DFI" type="text/html"><?php echo $view_semenanalysis_add->DFI->caption() ?><?php echo $view_semenanalysis_add->DFI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->DFI->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_DFI" type="text/html"><span id="el_view_semenanalysis_DFI">
<input type="text" data-table="view_semenanalysis" data-field="x_DFI" name="x_DFI" id="x_DFI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->DFI->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->DFI->EditValue ?>"<?php echo $view_semenanalysis_add->DFI->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->DFI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->IsueBy->Visible) { // IsueBy ?>
	<div id="r_IsueBy" class="form-group row">
		<label id="elh_view_semenanalysis_IsueBy" for="x_IsueBy" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_IsueBy" type="text/html"><?php echo $view_semenanalysis_add->IsueBy->caption() ?><?php echo $view_semenanalysis_add->IsueBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->IsueBy->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IsueBy" type="text/html"><span id="el_view_semenanalysis_IsueBy">
<input type="text" data-table="view_semenanalysis" data-field="x_IsueBy" name="x_IsueBy" id="x_IsueBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->IsueBy->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->IsueBy->EditValue ?>"<?php echo $view_semenanalysis_add->IsueBy->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->IsueBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Volume2->Visible) { // Volume2 ?>
	<div id="r_Volume2" class="form-group row">
		<label id="elh_view_semenanalysis_Volume2" for="x_Volume2" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Volume2" type="text/html"><?php echo $view_semenanalysis_add->Volume2->caption() ?><?php echo $view_semenanalysis_add->Volume2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Volume2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Volume2" type="text/html"><span id="el_view_semenanalysis_Volume2">
<input type="text" data-table="view_semenanalysis" data-field="x_Volume2" name="x_Volume2" id="x_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Volume2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Volume2->EditValue ?>"<?php echo $view_semenanalysis_add->Volume2->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Volume2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Concentration2->Visible) { // Concentration2 ?>
	<div id="r_Concentration2" class="form-group row">
		<label id="elh_view_semenanalysis_Concentration2" for="x_Concentration2" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Concentration2" type="text/html"><?php echo $view_semenanalysis_add->Concentration2->caption() ?><?php echo $view_semenanalysis_add->Concentration2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Concentration2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Concentration2" type="text/html"><span id="el_view_semenanalysis_Concentration2">
<input type="text" data-table="view_semenanalysis" data-field="x_Concentration2" name="x_Concentration2" id="x_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Concentration2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Concentration2->EditValue ?>"<?php echo $view_semenanalysis_add->Concentration2->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Concentration2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Total2->Visible) { // Total2 ?>
	<div id="r_Total2" class="form-group row">
		<label id="elh_view_semenanalysis_Total2" for="x_Total2" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Total2" type="text/html"><?php echo $view_semenanalysis_add->Total2->caption() ?><?php echo $view_semenanalysis_add->Total2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Total2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Total2" type="text/html"><span id="el_view_semenanalysis_Total2">
<input type="text" data-table="view_semenanalysis" data-field="x_Total2" name="x_Total2" id="x_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Total2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Total2->EditValue ?>"<?php echo $view_semenanalysis_add->Total2->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Total2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<div id="r_ProgressiveMotility2" class="form-group row">
		<label id="elh_view_semenanalysis_ProgressiveMotility2" for="x_ProgressiveMotility2" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_ProgressiveMotility2" type="text/html"><?php echo $view_semenanalysis_add->ProgressiveMotility2->caption() ?><?php echo $view_semenanalysis_add->ProgressiveMotility2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->ProgressiveMotility2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_ProgressiveMotility2" type="text/html"><span id="el_view_semenanalysis_ProgressiveMotility2">
<input type="text" data-table="view_semenanalysis" data-field="x_ProgressiveMotility2" name="x_ProgressiveMotility2" id="x_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->ProgressiveMotility2->EditValue ?>"<?php echo $view_semenanalysis_add->ProgressiveMotility2->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->ProgressiveMotility2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<div id="r_NonProgrssiveMotile2" class="form-group row">
		<label id="elh_view_semenanalysis_NonProgrssiveMotile2" for="x_NonProgrssiveMotile2" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_NonProgrssiveMotile2" type="text/html"><?php echo $view_semenanalysis_add->NonProgrssiveMotile2->caption() ?><?php echo $view_semenanalysis_add->NonProgrssiveMotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->NonProgrssiveMotile2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_NonProgrssiveMotile2" type="text/html"><span id="el_view_semenanalysis_NonProgrssiveMotile2">
<input type="text" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile2" name="x_NonProgrssiveMotile2" id="x_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->NonProgrssiveMotile2->EditValue ?>"<?php echo $view_semenanalysis_add->NonProgrssiveMotile2->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->NonProgrssiveMotile2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->Immotile2->Visible) { // Immotile2 ?>
	<div id="r_Immotile2" class="form-group row">
		<label id="elh_view_semenanalysis_Immotile2" for="x_Immotile2" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_Immotile2" type="text/html"><?php echo $view_semenanalysis_add->Immotile2->caption() ?><?php echo $view_semenanalysis_add->Immotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->Immotile2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_Immotile2" type="text/html"><span id="el_view_semenanalysis_Immotile2">
<input type="text" data-table="view_semenanalysis" data-field="x_Immotile2" name="x_Immotile2" id="x_Immotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->Immotile2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->Immotile2->EditValue ?>"<?php echo $view_semenanalysis_add->Immotile2->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->Immotile2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<div id="r_TotalProgrssiveMotile2" class="form-group row">
		<label id="elh_view_semenanalysis_TotalProgrssiveMotile2" for="x_TotalProgrssiveMotile2" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_TotalProgrssiveMotile2" type="text/html"><?php echo $view_semenanalysis_add->TotalProgrssiveMotile2->caption() ?><?php echo $view_semenanalysis_add->TotalProgrssiveMotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->TotalProgrssiveMotile2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TotalProgrssiveMotile2" type="text/html"><span id="el_view_semenanalysis_TotalProgrssiveMotile2">
<input type="text" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile2" name="x_TotalProgrssiveMotile2" id="x_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->TotalProgrssiveMotile2->EditValue ?>"<?php echo $view_semenanalysis_add->TotalProgrssiveMotile2->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->TotalProgrssiveMotile2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->IssuedBy->Visible) { // IssuedBy ?>
	<div id="r_IssuedBy" class="form-group row">
		<label id="elh_view_semenanalysis_IssuedBy" for="x_IssuedBy" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_IssuedBy" type="text/html"><?php echo $view_semenanalysis_add->IssuedBy->caption() ?><?php echo $view_semenanalysis_add->IssuedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->IssuedBy->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IssuedBy" type="text/html"><span id="el_view_semenanalysis_IssuedBy">
<input type="text" data-table="view_semenanalysis" data-field="x_IssuedBy" name="x_IssuedBy" id="x_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->IssuedBy->EditValue ?>"<?php echo $view_semenanalysis_add->IssuedBy->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->IssuedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->IssuedTo->Visible) { // IssuedTo ?>
	<div id="r_IssuedTo" class="form-group row">
		<label id="elh_view_semenanalysis_IssuedTo" for="x_IssuedTo" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_IssuedTo" type="text/html"><?php echo $view_semenanalysis_add->IssuedTo->caption() ?><?php echo $view_semenanalysis_add->IssuedTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->IssuedTo->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IssuedTo" type="text/html"><span id="el_view_semenanalysis_IssuedTo">
<input type="text" data-table="view_semenanalysis" data-field="x_IssuedTo" name="x_IssuedTo" id="x_IssuedTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->IssuedTo->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->IssuedTo->EditValue ?>"<?php echo $view_semenanalysis_add->IssuedTo->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->IssuedTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->MACS->Visible) { // MACS ?>
	<div id="r_MACS" class="form-group row">
		<label id="elh_view_semenanalysis_MACS" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_MACS" type="text/html"><?php echo $view_semenanalysis_add->MACS->caption() ?><?php echo $view_semenanalysis_add->MACS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->MACS->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_MACS" type="text/html"><span id="el_view_semenanalysis_MACS">
<div id="tp_x_MACS" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_semenanalysis" data-field="x_MACS" data-value-separator="<?php echo $view_semenanalysis_add->MACS->displayValueSeparatorAttribute() ?>" name="x_MACS[]" id="x_MACS[]" value="{value}"<?php echo $view_semenanalysis_add->MACS->editAttributes() ?>></div>
<div id="dsl_x_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_semenanalysis_add->MACS->checkBoxListHtml(FALSE, "x_MACS[]") ?>
</div></div>
</span></script>
<?php echo $view_semenanalysis_add->MACS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<div id="r_PREG_TEST_DATE" class="form-group row">
		<label id="elh_view_semenanalysis_PREG_TEST_DATE" for="x_PREG_TEST_DATE" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_PREG_TEST_DATE" type="text/html"><?php echo $view_semenanalysis_add->PREG_TEST_DATE->caption() ?><?php echo $view_semenanalysis_add->PREG_TEST_DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->PREG_TEST_DATE->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_PREG_TEST_DATE" type="text/html"><span id="el_view_semenanalysis_PREG_TEST_DATE">
<input type="text" data-table="view_semenanalysis" data-field="x_PREG_TEST_DATE" data-format="7" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->PREG_TEST_DATE->EditValue ?>"<?php echo $view_semenanalysis_add->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$view_semenanalysis_add->PREG_TEST_DATE->ReadOnly && !$view_semenanalysis_add->PREG_TEST_DATE->Disabled && !isset($view_semenanalysis_add->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($view_semenanalysis_add->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_semenanalysisadd_js">
loadjs.ready(["fview_semenanalysisadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_semenanalysisadd", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $view_semenanalysis_add->PREG_TEST_DATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<div id="r_SPECIFIC_PROBLEMS" class="form-group row">
		<label id="elh_view_semenanalysis_SPECIFIC_PROBLEMS" for="x_SPECIFIC_PROBLEMS" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_SPECIFIC_PROBLEMS" type="text/html"><?php echo $view_semenanalysis_add->SPECIFIC_PROBLEMS->caption() ?><?php echo $view_semenanalysis_add->SPECIFIC_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_SPECIFIC_PROBLEMS" type="text/html"><span id="el_view_semenanalysis_SPECIFIC_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_SPECIFIC_PROBLEMS" data-value-separator="<?php echo $view_semenanalysis_add->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x_SPECIFIC_PROBLEMS" name="x_SPECIFIC_PROBLEMS"<?php echo $view_semenanalysis_add->SPECIFIC_PROBLEMS->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->SPECIFIC_PROBLEMS->selectOptionListHtml("x_SPECIFIC_PROBLEMS") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->SPECIFIC_PROBLEMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->IMSC_1->Visible) { // IMSC_1 ?>
	<div id="r_IMSC_1" class="form-group row">
		<label id="elh_view_semenanalysis_IMSC_1" for="x_IMSC_1" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_IMSC_1" type="text/html"><?php echo $view_semenanalysis_add->IMSC_1->caption() ?><?php echo $view_semenanalysis_add->IMSC_1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->IMSC_1->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IMSC_1" type="text/html"><span id="el_view_semenanalysis_IMSC_1">
<input type="text" data-table="view_semenanalysis" data-field="x_IMSC_1" name="x_IMSC_1" id="x_IMSC_1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->IMSC_1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->IMSC_1->EditValue ?>"<?php echo $view_semenanalysis_add->IMSC_1->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->IMSC_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->IMSC_2->Visible) { // IMSC_2 ?>
	<div id="r_IMSC_2" class="form-group row">
		<label id="elh_view_semenanalysis_IMSC_2" for="x_IMSC_2" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_IMSC_2" type="text/html"><?php echo $view_semenanalysis_add->IMSC_2->caption() ?><?php echo $view_semenanalysis_add->IMSC_2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->IMSC_2->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IMSC_2" type="text/html"><span id="el_view_semenanalysis_IMSC_2">
<input type="text" data-table="view_semenanalysis" data-field="x_IMSC_2" name="x_IMSC_2" id="x_IMSC_2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_add->IMSC_2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_add->IMSC_2->EditValue ?>"<?php echo $view_semenanalysis_add->IMSC_2->editAttributes() ?>>
</span></script>
<?php echo $view_semenanalysis_add->IMSC_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<div id="r_LIQUIFACTION_STORAGE" class="form-group row">
		<label id="elh_view_semenanalysis_LIQUIFACTION_STORAGE" for="x_LIQUIFACTION_STORAGE" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_LIQUIFACTION_STORAGE" type="text/html"><?php echo $view_semenanalysis_add->LIQUIFACTION_STORAGE->caption() ?><?php echo $view_semenanalysis_add->LIQUIFACTION_STORAGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_LIQUIFACTION_STORAGE" type="text/html"><span id="el_view_semenanalysis_LIQUIFACTION_STORAGE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_LIQUIFACTION_STORAGE" data-value-separator="<?php echo $view_semenanalysis_add->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>" id="x_LIQUIFACTION_STORAGE" name="x_LIQUIFACTION_STORAGE"<?php echo $view_semenanalysis_add->LIQUIFACTION_STORAGE->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->LIQUIFACTION_STORAGE->selectOptionListHtml("x_LIQUIFACTION_STORAGE") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->LIQUIFACTION_STORAGE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<div id="r_IUI_PREP_METHOD" class="form-group row">
		<label id="elh_view_semenanalysis_IUI_PREP_METHOD" for="x_IUI_PREP_METHOD" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_IUI_PREP_METHOD" type="text/html"><?php echo $view_semenanalysis_add->IUI_PREP_METHOD->caption() ?><?php echo $view_semenanalysis_add->IUI_PREP_METHOD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->IUI_PREP_METHOD->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_IUI_PREP_METHOD" type="text/html"><span id="el_view_semenanalysis_IUI_PREP_METHOD">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_IUI_PREP_METHOD" data-value-separator="<?php echo $view_semenanalysis_add->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>" id="x_IUI_PREP_METHOD" name="x_IUI_PREP_METHOD"<?php echo $view_semenanalysis_add->IUI_PREP_METHOD->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->IUI_PREP_METHOD->selectOptionListHtml("x_IUI_PREP_METHOD") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->IUI_PREP_METHOD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<div id="r_TIME_FROM_TRIGGER" class="form-group row">
		<label id="elh_view_semenanalysis_TIME_FROM_TRIGGER" for="x_TIME_FROM_TRIGGER" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_TIME_FROM_TRIGGER" type="text/html"><?php echo $view_semenanalysis_add->TIME_FROM_TRIGGER->caption() ?><?php echo $view_semenanalysis_add->TIME_FROM_TRIGGER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->TIME_FROM_TRIGGER->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TIME_FROM_TRIGGER" type="text/html"><span id="el_view_semenanalysis_TIME_FROM_TRIGGER">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_TIME_FROM_TRIGGER" data-value-separator="<?php echo $view_semenanalysis_add->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>" id="x_TIME_FROM_TRIGGER" name="x_TIME_FROM_TRIGGER"<?php echo $view_semenanalysis_add->TIME_FROM_TRIGGER->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->TIME_FROM_TRIGGER->selectOptionListHtml("x_TIME_FROM_TRIGGER") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->TIME_FROM_TRIGGER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<div id="r_COLLECTION_TO_PREPARATION" class="form-group row">
		<label id="elh_view_semenanalysis_COLLECTION_TO_PREPARATION" for="x_COLLECTION_TO_PREPARATION" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_COLLECTION_TO_PREPARATION" type="text/html"><?php echo $view_semenanalysis_add->COLLECTION_TO_PREPARATION->caption() ?><?php echo $view_semenanalysis_add->COLLECTION_TO_PREPARATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_COLLECTION_TO_PREPARATION" type="text/html"><span id="el_view_semenanalysis_COLLECTION_TO_PREPARATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_COLLECTION_TO_PREPARATION" data-value-separator="<?php echo $view_semenanalysis_add->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>" id="x_COLLECTION_TO_PREPARATION" name="x_COLLECTION_TO_PREPARATION"<?php echo $view_semenanalysis_add->COLLECTION_TO_PREPARATION->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->COLLECTION_TO_PREPARATION->selectOptionListHtml("x_COLLECTION_TO_PREPARATION") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->COLLECTION_TO_PREPARATION->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<div id="r_TIME_FROM_PREP_TO_INSEM" class="form-group row">
		<label id="elh_view_semenanalysis_TIME_FROM_PREP_TO_INSEM" for="x_TIME_FROM_PREP_TO_INSEM" class="<?php echo $view_semenanalysis_add->LeftColumnClass ?>"><script id="tpc_view_semenanalysis_TIME_FROM_PREP_TO_INSEM" type="text/html"><?php echo $view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->caption() ?><?php echo $view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_semenanalysis_add->RightColumnClass ?>"><div <?php echo $view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<script id="tpx_view_semenanalysis_TIME_FROM_PREP_TO_INSEM" type="text/html"><span id="el_view_semenanalysis_TIME_FROM_PREP_TO_INSEM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_TIME_FROM_PREP_TO_INSEM" data-value-separator="<?php echo $view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->displayValueSeparatorAttribute() ?>" id="x_TIME_FROM_PREP_TO_INSEM" name="x_TIME_FROM_PREP_TO_INSEM"<?php echo $view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
			<?php echo $view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->selectOptionListHtml("x_TIME_FROM_PREP_TO_INSEM") ?>
		</select>
</div>
</span></script>
<?php echo $view_semenanalysis_add->TIME_FROM_PREP_TO_INSEM->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_semenanalysisadd" class="ew-custom-template"></div>
<script id="tpm_view_semenanalysisadd" type="text/html">
<div id="ct_view_semenanalysis_add"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["id"] ;
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$Tid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$results[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
?>	
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_semenanalysis_HusbandName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_HusbandName")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_semenanalysis_RIDNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_RIDNo")/}}</h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;">
{{include tmpl="#tpc_view_semenanalysis_PaID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_PaID")/}}
{{include tmpl="#tpc_view_semenanalysis_PaName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_PaName")/}}
{{include tmpl="#tpc_view_semenanalysis_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_PatientName")/}}
{{include tmpl="#tpc_view_semenanalysis_PaMobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_PaMobile")/}}
{{include tmpl="#tpc_view_semenanalysis_PartnerID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_PartnerID")/}}
{{include tmpl="#tpc_view_semenanalysis_PartnerName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_PartnerName")/}}
{{include tmpl="#tpc_view_semenanalysis_PartnerMobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_PartnerMobile")/}}
</div>
<div class="row">
<div id="patientdataview" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div id="partnerdataview" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPartnerId" class="ew-cell">Partner Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPartnerPatientName" class="ew-cell">Partner Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPartnerGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPartnerBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="SemPartnerprofilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPartnerAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPartnerMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPartnerEmail" class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistoryRowCount > 0)
	{
		if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
		{
			$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
		}else{
			$kk = 0;
			for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
				if($cid == $VitalsHistory[$x]["TidNo"])
				{
					$kk = 1;
					$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
				}
			}
			if($kk == 0)
			{
				$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
			}
		}
	}else{
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add

	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";

	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";

	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
?>
 <div style="width:100%">
<font face = "courier" >
<font size="4" style="font-weight: bold;">
<div class="row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td>Semen Orgin</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_SemenOrgin"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_SemenOrgin")/}} </td>
		</tr>
		<tr id="donorId">
			<td>Donor</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_Donor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Donor")/}}</td>
		</tr>
		<tr id="DonorBloodGroupId">
			<td>Donor Bloodgroup</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_DonorBloodgroup"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_DonorBloodgroup")/}}</td>
		</tr>
	</tbody>
</table>
			</td>
			<td>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td>Request Dr</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_RequestDr"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_RequestDr")/}}</td>
		</tr>
	<tr>
			<td>Collection Date</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_CollectionDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_CollectionDate")/}}</td>
		</tr>
		<tr>
			<td>Result Date</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_ResultDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_ResultDate")/}}</td>
		</tr>
	</tbody>
</table>
			</td>
		</tr>
	</tbody>
</table>
</div>
<h2  id="SemenHeading"  align="center">Semen Analysis</h2>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_semenanalysis_RequestSample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_RequestSample")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_semenanalysis_CollectionType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_CollectionType")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_semenanalysis_CollectionMethod"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_CollectionMethod")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_semenanalysis_Abstinence"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Abstinence")/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_semenanalysis_Medicationused"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Medicationused")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_semenanalysis_DifficultiesinCollection"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_DifficultiesinCollection")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Macroscopic Analysis</h3>
			</div>
			<div class="card-body">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:50%">
	<tbody>
		<tr>
			<td>{{include tmpl="#tpc_view_semenanalysis_pH"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_pH")/}}>=7.2</td>
			<td></td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_semenanalysis_Timeofcollection"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Timeofcollection")/}}</td>
			<td></td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_semenanalysis_Timeofexamination"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Timeofexamination")/}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:50%">
	<tbody>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_Appearance"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Appearance")/}}</td>
			<td ></td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_Color"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Color")/}}</td>
			<td ></td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_Homogenosity"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Homogenosity")/}}</td>
			<td ></td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_CompleteSample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_CompleteSample")/}}</td>
			<td ></td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_Liquefactiontime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Liquefactiontime")/}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Microscopic Analysis</h3>
			</div>
			<div class="card-body">
<div id="idMacs">				
	{{include tmpl="#tpc_view_semenanalysis_MACS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_MACS")/}}
</div>
<table id="capacitationTable" class="" align="left" border="0" cellpadding="1" cellspacing="1" style="width:60%">
<thead id="capacitationTableHead">
		<tr  style="background-color:#707B7C;color:white;" >
			<td></td>
			<td></td>
			<td id="PreCapacitation">Pre Capacitation</td>
			<td id="PostCapacitation">Post Capacitation</td>
			<td id="MaxCapacitation">MACS Capacitation</td>
			<td></td>
		</tr>
</thead>
	<tbody>
		<tr>
			<td>Volume (ml)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_Volume"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Volume")/}}</td>
			<td id="Volume1">{{include tmpl="#tpc_view_semenanalysis_Volume1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Volume1")/}}</td>
			<td id="Volume2">{{include tmpl="#tpc_view_semenanalysis_Volume2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Volume2")/}}</td>
			<td>>=1.5ml</td>
		</tr>
		<tr>
			<td>Concentration (mill/ml)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_Concentration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Concentration")/}}</td>
			<td  id="Concentration1">{{include tmpl="#tpc_view_semenanalysis_Concentration1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Concentration1")/}}</td>
			<td  id="Concentration2">{{include tmpl="#tpc_view_semenanalysis_Concentration2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Concentration2")/}}</td>
			<td>>= 15</td>
		</tr>
		<tr>
			<td>Total (mill/ejaculate)</td>
				<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_Total"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Total")/}}</td>
			<td  id="Total1">{{include tmpl="#tpc_view_semenanalysis_Total1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Total1")/}}</td>
			<td  id="Total2">{{include tmpl="#tpc_view_semenanalysis_Total2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Total2")/}}</td>
			<td>>=39</td>
		</tr>
		<tr>
			<td>Progressive Motility (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_ProgressiveMotility"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_ProgressiveMotility")/}}</td>
			<td  id="ProgressiveMotility1">{{include tmpl="#tpc_view_semenanalysis_ProgressiveMotility1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_ProgressiveMotility1")/}}</td>
			<td  id="ProgressiveMotility2">{{include tmpl="#tpc_view_semenanalysis_ProgressiveMotility2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_ProgressiveMotility2")/}}</td>
			<td>>=32%</td>
		</tr>
		<tr>
			<td>Non Progrssive Motile (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_NonProgrssiveMotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_NonProgrssiveMotile")/}}</td>
			<td  id="NonProgrssiveMotile1">{{include tmpl="#tpc_view_semenanalysis_NonProgrssiveMotile1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_NonProgrssiveMotile1")/}}</td>
			<td  id="NonProgrssiveMotile2">{{include tmpl="#tpc_view_semenanalysis_NonProgrssiveMotile2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_NonProgrssiveMotile2")/}}</td>
			<td></td>
		</tr>
		<tr>
			<td>Immotile (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_Immotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Immotile")/}}</td>
			<td  id="Immotile1">{{include tmpl="#tpc_view_semenanalysis_Immotile1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Immotile1")/}}</td>
			<td  id="Immotile2">{{include tmpl="#tpc_view_semenanalysis_Immotile2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Immotile2")/}}</td>
			<td></td>
		</tr>
		<tr>
			<td>Total motile sperm count (TMSC) </td>
				<td>:</td>
			<td>{{include tmpl="#tpc_view_semenanalysis_TotalProgrssiveMotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_TotalProgrssiveMotile")/}}</td>
			<td  id="TotalProgrssiveMotile1">{{include tmpl="#tpc_view_semenanalysis_TotalProgrssiveMotile1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_TotalProgrssiveMotile1")/}}</td>
			<td  id="TotalProgrssiveMotile2">{{include tmpl="#tpc_view_semenanalysis_TotalProgrssiveMotile2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_TotalProgrssiveMotile2")/}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:40%">
	<tbody>
		<tr>
			<td >Normal</td>		
			<td >:{{include tmpl="#tpc_view_semenanalysis_Normal"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Normal")/}}%</td>
			<td >>=4%</td>
		</tr>
		<tr>
			<td >Abnormal</td>
			<td >:{{include tmpl="#tpc_view_semenanalysis_Abnormal"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Abnormal")/}}%</td>
			<td ></td>
		</tr>	
		<tr>
			<td >Head Defects</td>
			<td >:{{include tmpl="#tpc_view_semenanalysis_Headdefects"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Headdefects")/}}%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Midpiece Defects</td>
			<td >:{{include tmpl="#tpc_view_semenanalysis_MidpieceDefects"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_MidpieceDefects")/}}%</td>
			<td></td>
		</tr>
		<tr>
			<td >Tail Defects</td>
			<td >:{{include tmpl="#tpc_view_semenanalysis_TailDefects"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_TailDefects")/}}%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Vitality(%)</td>
			<td >:{{include tmpl="#tpc_view_semenanalysis_NormalProgMotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_NormalProgMotile")/}}</td>
			<td>>=58%</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
	<tr>
			<td id="Method">{{include tmpl="#tpc_view_semenanalysis_Method"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Method")/}}</td>
			<td ></td>
			<td ></td>
			<td >{{include tmpl="#tpc_view_semenanalysis_Agglutination"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Agglutination")/}}</td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_ImmatureForms"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_ImmatureForms")/}}</td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_Leucocytes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Leucocytes")/}}</td>
			<td >%   <1 mill/ml or 20/field </td>
				<td ></td>
			<td >{{include tmpl="#tpc_view_semenanalysis_Debris"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Debris")/}}</td>
		</tr>
	</tbody>
</table>
</div>
<div class="">
{{include tmpl="#tpc_view_semenanalysis_Diagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Diagnosis")/}}
</div>
<div class="">
{{include tmpl="#tpc_view_semenanalysis_Observations"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Observations")/}}
</div>
<div class="row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td id='Big' >{{include tmpl="#tpc_view_semenanalysis_Big"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Big")/}}</td>
			<td id='Medium' >{{include tmpl="#tpc_view_semenanalysis_Medium"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Medium")/}}</td>
			<td id='Small'>{{include tmpl="#tpc_view_semenanalysis_Small"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Small")/}}</td>
			<td id='NoHalo'>{{include tmpl="#tpc_view_semenanalysis_NoHalo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_NoHalo")/}}</td>
		</tr>
		<tr>
			<td id='Fragmented'>{{include tmpl="#tpc_view_semenanalysis_Fragmented"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Fragmented")/}}</td>
			<td id='NonFragmented'>{{include tmpl="#tpc_view_semenanalysis_NonFragmented"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_NonFragmented")/}}</td>
			<td id='DFI'>{{include tmpl="#tpc_view_semenanalysis_DFI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_DFI")/}}</td>
		</tr>
		<tr>		
		<tr>
			<td id='InseminationTime'>{{include tmpl="#tpc_view_semenanalysis_InseminationTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_InseminationTime")/}}</td>
			<td ></td>
			<td ></td>
			<td id='InseminationBy'>{{include tmpl="#tpc_view_semenanalysis_InseminationBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_InseminationBy")/}}</td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_ProcessedBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_ProcessedBy")/}}</td>
			<td id='IsueBy'>{{include tmpl="#tpc_view_semenanalysis_IsueBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_IsueBy")/}}</td>
			<td ></td>
			<td >{{include tmpl="#tpc_view_semenanalysis_DoneBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_DoneBy")/}}</td>
		</tr>	
	</tbody>
</table>
</div>
<div class="row" id="TankLocation">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_Tank"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Tank")/}}</td>
			<td >{{include tmpl="#tpc_view_semenanalysis_Location"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_Location")/}}</td>
		</tr>
	</tbody>
</table>
</div>
<div class="row" id="IUILocation">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_COLLECTION_TO_PREPARATION"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_COLLECTION_TO_PREPARATION")/}}</td>
			<td >{{include tmpl="#tpc_view_semenanalysis_IMSC_1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_IMSC_1")/}}</td>
			<td >{{include tmpl="#tpc_view_semenanalysis_IMSC_2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_IMSC_2")/}}</td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_IUI_PREP_METHOD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_IUI_PREP_METHOD")/}}</td>
			<td >{{include tmpl="#tpc_view_semenanalysis_LIQUIFACTION_STORAGE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_LIQUIFACTION_STORAGE")/}}</td>
			<td >{{include tmpl="#tpc_view_semenanalysis_PREG_TEST_DATE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_PREG_TEST_DATE")/}}</td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_view_semenanalysis_SPECIFIC_PROBLEMS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_SPECIFIC_PROBLEMS")/}}</td>
			<td >{{include tmpl="#tpc_view_semenanalysis_TIME_FROM_TRIGGER"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_TIME_FROM_TRIGGER")/}}</td>
			<td >{{include tmpl="#tpc_view_semenanalysis_TIME_FROM_PREP_TO_INSEM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_semenanalysis_TIME_FROM_PREP_TO_INSEM")/}}</td>
		</tr>
	</tbody>
</table>
</div>
</div>
</script>

<?php if (!$view_semenanalysis_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_semenanalysis_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_semenanalysis_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_semenanalysis->Rows) ?> };
	ew.applyTemplate("tpd_view_semenanalysisadd", "tpm_view_semenanalysisadd", "view_semenanalysisadd", "<?php echo $view_semenanalysis->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_semenanalysisadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_semenanalysis_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("x_pH").style.width="80px",document.getElementById("x_Volume").style.width="80px",document.getElementById("x_Concentration").style.width="80px",document.getElementById("x_Total").style.width="80px",document.getElementById("x_ProgressiveMotility").style.width="80px",document.getElementById("x_NonProgrssiveMotile").style.width="80px",document.getElementById("x_Immotile").style.width="80px",document.getElementById("x_TotalProgrssiveMotile").style.width="80px",document.getElementById("x_Normal").style.width="80px",document.getElementById("x_Abnormal").style.width="80px",document.getElementById("x_Headdefects").style.width="80px",document.getElementById("x_MidpieceDefects").style.width="80px",document.getElementById("x_TailDefects").style.width="80px",document.getElementById("x_NormalProgMotile").style.width="80px",document.getElementById("x_Volume1").style.width="80px",document.getElementById("x_Concentration1").style.width="80px",document.getElementById("x_Total1").style.width="80px",document.getElementById("x_ProgressiveMotility1").style.width="80px",document.getElementById("x_NonProgrssiveMotile1").style.width="80px",document.getElementById("x_Immotile1").style.width="80px",document.getElementById("x_TotalProgrssiveMotile1").style.width="80px",document.getElementById("x_Volume2").style.width="80px",document.getElementById("x_Concentration2").style.width="80px",document.getElementById("x_Total2").style.width="80px",document.getElementById("x_ProgressiveMotility2").style.width="80px",document.getElementById("x_NonProgrssiveMotile2").style.width="80px",document.getElementById("x_Immotile2").style.width="80px",document.getElementById("x_TotalProgrssiveMotile2").style.width="80px",document.getElementById("idMacs").style.visibility="hidden",document.getElementById("IUILocation").style.visibility="hidden";var RequestSample=(e=document.getElementById("x_RequestSample")).options[e.selectedIndex].value,TankLocation=document.getElementById("TankLocation");document.getElementById("SemenHeading").innerText="Spermiogram","Freezing"==RequestSample?(document.getElementById("SemenHeading").innerText="Semen Freezing",TankLocation.style.visibility="visible"):TankLocation.style.visibility="hidden";var capacitationTable=document.getElementById("capacitationTable");"IUI processing"==RequestSample?(capacitationTable.style.width="100%",document.getElementById("SemenHeading").innerText="INTRA UTERINE INSEMINATION",document.getElementById("Big").style.visibility="hidden",document.getElementById("Medium").style.visibility="hidden",document.getElementById("Small").style.visibility="hidden",document.getElementById("NoHalo").style.visibility="hidden",document.getElementById("Fragmented").style.visibility="hidden",document.getElementById("NonFragmented").style.visibility="hidden",document.getElementById("DFI").style.visibility="hidden",document.getElementById("Volume1").style.visibility="visible",document.getElementById("Concentration1").style.visibility="visible",document.getElementById("Total1").style.visibility="visible",document.getElementById("ProgressiveMotility1").style.visibility="visible",document.getElementById("NonProgrssiveMotile1").style.visibility="visible",document.getElementById("Immotile1").style.visibility="visible",document.getElementById("TotalProgrssiveMotile1").style.visibility="visible",document.getElementById("capacitationTableHead").style.visibility="visible",document.getElementById("PreCapacitation").innerText="Pre Capacitation",document.getElementById("PostCapacitation").innerText="Post Capacitation",document.getElementById("x_Volume1").style.width="80px",document.getElementById("x_Concentration1").style.width="80px",document.getElementById("x_Total1").style.width="80px",document.getElementById("x_ProgressiveMotility1").style.width="80px",document.getElementById("x_NonProgrssiveMotile1").style.width="80px",document.getElementById("x_Immotile1").style.width="80px",document.getElementById("x_TotalProgrssiveMotile1").style.width="80px",document.getElementById("IUILocation").style.visibility="visible"):(capacitationTable.style.width="60%",document.getElementById("Volume1").style.visibility="hidden",document.getElementById("Concentration1").style.visibility="hidden",document.getElementById("Total1").style.visibility="hidden",document.getElementById("ProgressiveMotility1").style.visibility="hidden",document.getElementById("NonProgrssiveMotile1").style.visibility="hidden",document.getElementById("Immotile1").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile1").style.visibility="hidden",document.getElementById("capacitationTableHead").style.visibility="hidden",document.getElementById("PreCapacitation").innerText="",document.getElementById("PostCapacitation").innerText="",document.getElementById("x_Volume1").style.width="0px",document.getElementById("x_Concentration1").style.width="0px",document.getElementById("x_Total1").style.width="0px",document.getElementById("x_ProgressiveMotility1").style.width="0px",document.getElementById("x_NonProgrssiveMotile1").style.width="0px",document.getElementById("x_Immotile1").style.width="0px",document.getElementById("x_TotalProgrssiveMotile1").style.width="0px",document.getElementById("x_Volume2").style.width="0px",document.getElementById("x_Concentration2").style.width="0px",document.getElementById("x_Total2").style.width="0px",document.getElementById("x_ProgressiveMotility2").style.width="0px",document.getElementById("x_NonProgrssiveMotile2").style.width="0px",document.getElementById("x_Immotile2").style.width="0px",document.getElementById("x_TotalProgrssiveMotile2").style.width="0px",document.getElementById("Volume2").style.visibility="hidden",document.getElementById("Concentration2").style.visibility="hidden",document.getElementById("Total2").style.visibility="hidden",document.getElementById("ProgressiveMotility2").style.visibility="hidden",document.getElementById("NonProgrssiveMotile2").style.visibility="hidden",document.getElementById("Immotile2").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile2").style.visibility="hidden",document.getElementById("Big").style.visibility="hidden",document.getElementById("Medium").style.visibility="hidden",document.getElementById("Small").style.visibility="hidden",document.getElementById("NoHalo").style.visibility="hidden",document.getElementById("Fragmented").style.visibility="hidden",document.getElementById("NonFragmented").style.visibility="hidden",document.getElementById("DFI").style.visibility="hidden",document.getElementById("InseminationTime").style.visibility="hidden",document.getElementById("InseminationBy").style.visibility="hidden",document.getElementById("IsueBy").style.visibility="hidden"),"DFI"==RequestSample&&(document.getElementById("SemenHeading").innerText="DNA Framgmentation Index",document.getElementById("Big").style.visibility="visible",document.getElementById("Medium").style.visibility="visible",document.getElementById("Small").style.visibility="visible",document.getElementById("NoHalo").style.visibility="visible",document.getElementById("Fragmented").style.visibility="visible",document.getElementById("NonFragmented").style.visibility="visible",document.getElementById("DFI").style.visibility="visible");var e,SemenOrgin=(e=document.getElementById("x_SemenOrgin")).options[e.selectedIndex].value,donorId=document.getElementById("donorId"),DonorBloodGroupId=document.getElementById("DonorBloodGroupId");"Donor"==SemenOrgin?(donorId.style.visibility="visible",DonorBloodGroupId.style.visibility="visible"):(donorId.style.visibility="hidden",DonorBloodGroupId.style.visibility="hidden");
});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_semenanalysis_add->terminate();
?>