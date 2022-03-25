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
$ivf_semenanalysisreport_edit = new ivf_semenanalysisreport_edit();

// Run the page
$ivf_semenanalysisreport_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenanalysisreport_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_semenanalysisreportedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fivf_semenanalysisreportedit = currentForm = new ew.Form("fivf_semenanalysisreportedit", "edit");

	// Validate form
	fivf_semenanalysisreportedit.validate = function() {
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
			<?php if ($ivf_semenanalysisreport_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->id->caption(), $ivf_semenanalysisreport_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->RIDNo->caption(), $ivf_semenanalysisreport_edit->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_edit->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->PatientName->caption(), $ivf_semenanalysisreport_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->HusbandName->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->HusbandName->caption(), $ivf_semenanalysisreport_edit->HusbandName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->RequestDr->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->RequestDr->caption(), $ivf_semenanalysisreport_edit->RequestDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->CollectionDate->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->CollectionDate->caption(), $ivf_semenanalysisreport_edit->CollectionDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CollectionDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_edit->CollectionDate->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_edit->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->ResultDate->caption(), $ivf_semenanalysisreport_edit->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_edit->ResultDate->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_edit->RequestSample->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->RequestSample->caption(), $ivf_semenanalysisreport_edit->RequestSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->CollectionType->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->CollectionType->caption(), $ivf_semenanalysisreport_edit->CollectionType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->CollectionMethod->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionMethod");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->CollectionMethod->caption(), $ivf_semenanalysisreport_edit->CollectionMethod->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Medicationused->Required) { ?>
				elm = this.getElements("x" + infix + "_Medicationused");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Medicationused->caption(), $ivf_semenanalysisreport_edit->Medicationused->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->DifficultiesinCollection->Required) { ?>
				elm = this.getElements("x" + infix + "_DifficultiesinCollection");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->DifficultiesinCollection->caption(), $ivf_semenanalysisreport_edit->DifficultiesinCollection->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->pH->Required) { ?>
				elm = this.getElements("x" + infix + "_pH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->pH->caption(), $ivf_semenanalysisreport_edit->pH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Timeofcollection->Required) { ?>
				elm = this.getElements("x" + infix + "_Timeofcollection");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Timeofcollection->caption(), $ivf_semenanalysisreport_edit->Timeofcollection->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Timeofexamination->Required) { ?>
				elm = this.getElements("x" + infix + "_Timeofexamination");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Timeofexamination->caption(), $ivf_semenanalysisreport_edit->Timeofexamination->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Volume->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Volume->caption(), $ivf_semenanalysisreport_edit->Volume->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Concentration->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Concentration->caption(), $ivf_semenanalysisreport_edit->Concentration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Total->Required) { ?>
				elm = this.getElements("x" + infix + "_Total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Total->caption(), $ivf_semenanalysisreport_edit->Total->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->ProgressiveMotility->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->ProgressiveMotility->caption(), $ivf_semenanalysisreport_edit->ProgressiveMotility->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->NonProgrssiveMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->NonProgrssiveMotile->caption(), $ivf_semenanalysisreport_edit->NonProgrssiveMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Immotile->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Immotile->caption(), $ivf_semenanalysisreport_edit->Immotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->TotalProgrssiveMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->TotalProgrssiveMotile->caption(), $ivf_semenanalysisreport_edit->TotalProgrssiveMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Appearance->Required) { ?>
				elm = this.getElements("x" + infix + "_Appearance");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Appearance->caption(), $ivf_semenanalysisreport_edit->Appearance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Homogenosity->Required) { ?>
				elm = this.getElements("x" + infix + "_Homogenosity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Homogenosity->caption(), $ivf_semenanalysisreport_edit->Homogenosity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->CompleteSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CompleteSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->CompleteSample->caption(), $ivf_semenanalysisreport_edit->CompleteSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Liquefactiontime->Required) { ?>
				elm = this.getElements("x" + infix + "_Liquefactiontime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Liquefactiontime->caption(), $ivf_semenanalysisreport_edit->Liquefactiontime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Normal->Required) { ?>
				elm = this.getElements("x" + infix + "_Normal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Normal->caption(), $ivf_semenanalysisreport_edit->Normal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Abnormal->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Abnormal->caption(), $ivf_semenanalysisreport_edit->Abnormal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Headdefects->Required) { ?>
				elm = this.getElements("x" + infix + "_Headdefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Headdefects->caption(), $ivf_semenanalysisreport_edit->Headdefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->MidpieceDefects->Required) { ?>
				elm = this.getElements("x" + infix + "_MidpieceDefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->MidpieceDefects->caption(), $ivf_semenanalysisreport_edit->MidpieceDefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->TailDefects->Required) { ?>
				elm = this.getElements("x" + infix + "_TailDefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->TailDefects->caption(), $ivf_semenanalysisreport_edit->TailDefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->NormalProgMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_NormalProgMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->NormalProgMotile->caption(), $ivf_semenanalysisreport_edit->NormalProgMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->ImmatureForms->Required) { ?>
				elm = this.getElements("x" + infix + "_ImmatureForms");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->ImmatureForms->caption(), $ivf_semenanalysisreport_edit->ImmatureForms->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Leucocytes->Required) { ?>
				elm = this.getElements("x" + infix + "_Leucocytes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Leucocytes->caption(), $ivf_semenanalysisreport_edit->Leucocytes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Agglutination->Required) { ?>
				elm = this.getElements("x" + infix + "_Agglutination");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Agglutination->caption(), $ivf_semenanalysisreport_edit->Agglutination->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Debris->Required) { ?>
				elm = this.getElements("x" + infix + "_Debris");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Debris->caption(), $ivf_semenanalysisreport_edit->Debris->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Diagnosis->Required) { ?>
				elm = this.getElements("x" + infix + "_Diagnosis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Diagnosis->caption(), $ivf_semenanalysisreport_edit->Diagnosis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Observations->Required) { ?>
				elm = this.getElements("x" + infix + "_Observations");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Observations->caption(), $ivf_semenanalysisreport_edit->Observations->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Signature->Required) { ?>
				elm = this.getElements("x" + infix + "_Signature");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Signature->caption(), $ivf_semenanalysisreport_edit->Signature->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->SemenOrgin->Required) { ?>
				elm = this.getElements("x" + infix + "_SemenOrgin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->SemenOrgin->caption(), $ivf_semenanalysisreport_edit->SemenOrgin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Donor->Required) { ?>
				elm = this.getElements("x" + infix + "_Donor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Donor->caption(), $ivf_semenanalysisreport_edit->Donor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->DonorBloodgroup->Required) { ?>
				elm = this.getElements("x" + infix + "_DonorBloodgroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->DonorBloodgroup->caption(), $ivf_semenanalysisreport_edit->DonorBloodgroup->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Tank->caption(), $ivf_semenanalysisreport_edit->Tank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Location->Required) { ?>
				elm = this.getElements("x" + infix + "_Location");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Location->caption(), $ivf_semenanalysisreport_edit->Location->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Volume1->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Volume1->caption(), $ivf_semenanalysisreport_edit->Volume1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Concentration1->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Concentration1->caption(), $ivf_semenanalysisreport_edit->Concentration1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Total1->Required) { ?>
				elm = this.getElements("x" + infix + "_Total1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Total1->caption(), $ivf_semenanalysisreport_edit->Total1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->ProgressiveMotility1->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->ProgressiveMotility1->caption(), $ivf_semenanalysisreport_edit->ProgressiveMotility1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->NonProgrssiveMotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->NonProgrssiveMotile1->caption(), $ivf_semenanalysisreport_edit->NonProgrssiveMotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Immotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Immotile1->caption(), $ivf_semenanalysisreport_edit->Immotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->TotalProgrssiveMotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->TotalProgrssiveMotile1->caption(), $ivf_semenanalysisreport_edit->TotalProgrssiveMotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->TidNo->caption(), $ivf_semenanalysisreport_edit->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_edit->TidNo->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_edit->Color->Required) { ?>
				elm = this.getElements("x" + infix + "_Color");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Color->caption(), $ivf_semenanalysisreport_edit->Color->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->DoneBy->Required) { ?>
				elm = this.getElements("x" + infix + "_DoneBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->DoneBy->caption(), $ivf_semenanalysisreport_edit->DoneBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Method->caption(), $ivf_semenanalysisreport_edit->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Abstinence->Required) { ?>
				elm = this.getElements("x" + infix + "_Abstinence");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Abstinence->caption(), $ivf_semenanalysisreport_edit->Abstinence->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->ProcessedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcessedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->ProcessedBy->caption(), $ivf_semenanalysisreport_edit->ProcessedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->InseminationTime->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminationTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->InseminationTime->caption(), $ivf_semenanalysisreport_edit->InseminationTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->InseminationBy->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminationBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->InseminationBy->caption(), $ivf_semenanalysisreport_edit->InseminationBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Big->Required) { ?>
				elm = this.getElements("x" + infix + "_Big");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Big->caption(), $ivf_semenanalysisreport_edit->Big->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Medium->Required) { ?>
				elm = this.getElements("x" + infix + "_Medium");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Medium->caption(), $ivf_semenanalysisreport_edit->Medium->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Small->Required) { ?>
				elm = this.getElements("x" + infix + "_Small");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Small->caption(), $ivf_semenanalysisreport_edit->Small->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->NoHalo->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHalo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->NoHalo->caption(), $ivf_semenanalysisreport_edit->NoHalo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Fragmented->Required) { ?>
				elm = this.getElements("x" + infix + "_Fragmented");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Fragmented->caption(), $ivf_semenanalysisreport_edit->Fragmented->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->NonFragmented->Required) { ?>
				elm = this.getElements("x" + infix + "_NonFragmented");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->NonFragmented->caption(), $ivf_semenanalysisreport_edit->NonFragmented->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->DFI->Required) { ?>
				elm = this.getElements("x" + infix + "_DFI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->DFI->caption(), $ivf_semenanalysisreport_edit->DFI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->IsueBy->Required) { ?>
				elm = this.getElements("x" + infix + "_IsueBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->IsueBy->caption(), $ivf_semenanalysisreport_edit->IsueBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Volume2->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Volume2->caption(), $ivf_semenanalysisreport_edit->Volume2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Concentration2->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Concentration2->caption(), $ivf_semenanalysisreport_edit->Concentration2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Total2->Required) { ?>
				elm = this.getElements("x" + infix + "_Total2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Total2->caption(), $ivf_semenanalysisreport_edit->Total2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->ProgressiveMotility2->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->ProgressiveMotility2->caption(), $ivf_semenanalysisreport_edit->ProgressiveMotility2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->NonProgrssiveMotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->NonProgrssiveMotile2->caption(), $ivf_semenanalysisreport_edit->NonProgrssiveMotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->Immotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->Immotile2->caption(), $ivf_semenanalysisreport_edit->Immotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->TotalProgrssiveMotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->TotalProgrssiveMotile2->caption(), $ivf_semenanalysisreport_edit->TotalProgrssiveMotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->MACS->Required) { ?>
				elm = this.getElements("x" + infix + "_MACS[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->MACS->caption(), $ivf_semenanalysisreport_edit->MACS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->IssuedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_IssuedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->IssuedBy->caption(), $ivf_semenanalysisreport_edit->IssuedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->IssuedTo->Required) { ?>
				elm = this.getElements("x" + infix + "_IssuedTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->IssuedTo->caption(), $ivf_semenanalysisreport_edit->IssuedTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->PaID->Required) { ?>
				elm = this.getElements("x" + infix + "_PaID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->PaID->caption(), $ivf_semenanalysisreport_edit->PaID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->PaName->Required) { ?>
				elm = this.getElements("x" + infix + "_PaName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->PaName->caption(), $ivf_semenanalysisreport_edit->PaName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->PaMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_PaMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->PaMobile->caption(), $ivf_semenanalysisreport_edit->PaMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->PartnerID->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->PartnerID->caption(), $ivf_semenanalysisreport_edit->PartnerID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->PartnerName->caption(), $ivf_semenanalysisreport_edit->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->PartnerMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->PartnerMobile->caption(), $ivf_semenanalysisreport_edit->PartnerMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->PREG_TEST_DATE->Required) { ?>
				elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->PREG_TEST_DATE->caption(), $ivf_semenanalysisreport_edit->PREG_TEST_DATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_edit->PREG_TEST_DATE->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->Required) { ?>
				elm = this.getElements("x" + infix + "_SPECIFIC_PROBLEMS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->caption(), $ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->IMSC_1->Required) { ?>
				elm = this.getElements("x" + infix + "_IMSC_1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->IMSC_1->caption(), $ivf_semenanalysisreport_edit->IMSC_1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->IMSC_2->Required) { ?>
				elm = this.getElements("x" + infix + "_IMSC_2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->IMSC_2->caption(), $ivf_semenanalysisreport_edit->IMSC_2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->Required) { ?>
				elm = this.getElements("x" + infix + "_LIQUIFACTION_STORAGE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->caption(), $ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->IUI_PREP_METHOD->Required) { ?>
				elm = this.getElements("x" + infix + "_IUI_PREP_METHOD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->IUI_PREP_METHOD->caption(), $ivf_semenanalysisreport_edit->IUI_PREP_METHOD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->Required) { ?>
				elm = this.getElements("x" + infix + "_TIME_FROM_TRIGGER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->caption(), $ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->Required) { ?>
				elm = this.getElements("x" + infix + "_COLLECTION_TO_PREPARATION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->caption(), $ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_edit->TIME_FROM_PREP_TO_INSEM->Required) { ?>
				elm = this.getElements("x" + infix + "_TIME_FROM_PREP_TO_INSEM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_edit->TIME_FROM_PREP_TO_INSEM->caption(), $ivf_semenanalysisreport_edit->TIME_FROM_PREP_TO_INSEM->RequiredErrorMessage)) ?>");
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
	fivf_semenanalysisreportedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_semenanalysisreportedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_semenanalysisreportedit.lists["x_RequestSample"] = <?php echo $ivf_semenanalysisreport_edit->RequestSample->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_RequestSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->RequestSample->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_CollectionType"] = <?php echo $ivf_semenanalysisreport_edit->CollectionType->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_CollectionType"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->CollectionType->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_CollectionMethod"] = <?php echo $ivf_semenanalysisreport_edit->CollectionMethod->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_CollectionMethod"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->CollectionMethod->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_Medicationused"] = <?php echo $ivf_semenanalysisreport_edit->Medicationused->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_Medicationused"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->Medicationused->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_DifficultiesinCollection"] = <?php echo $ivf_semenanalysisreport_edit->DifficultiesinCollection->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_DifficultiesinCollection"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->DifficultiesinCollection->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_Homogenosity"] = <?php echo $ivf_semenanalysisreport_edit->Homogenosity->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_Homogenosity"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->Homogenosity->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_CompleteSample"] = <?php echo $ivf_semenanalysisreport_edit->CompleteSample->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_CompleteSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->CompleteSample->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_SemenOrgin"] = <?php echo $ivf_semenanalysisreport_edit->SemenOrgin->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_SemenOrgin"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->SemenOrgin->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_Donor"] = <?php echo $ivf_semenanalysisreport_edit->Donor->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_Donor"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->Donor->lookupOptions()) ?>;
	fivf_semenanalysisreportedit.lists["x_MACS[]"] = <?php echo $ivf_semenanalysisreport_edit->MACS->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_MACS[]"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->MACS->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_SPECIFIC_PROBLEMS"] = <?php echo $ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_SPECIFIC_PROBLEMS"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_LIQUIFACTION_STORAGE"] = <?php echo $ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_LIQUIFACTION_STORAGE"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_IUI_PREP_METHOD"] = <?php echo $ivf_semenanalysisreport_edit->IUI_PREP_METHOD->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_IUI_PREP_METHOD"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->IUI_PREP_METHOD->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_TIME_FROM_TRIGGER"] = <?php echo $ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_TIME_FROM_TRIGGER"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportedit.lists["x_COLLECTION_TO_PREPARATION"] = <?php echo $ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->Lookup->toClientList($ivf_semenanalysisreport_edit) ?>;
	fivf_semenanalysisreportedit.lists["x_COLLECTION_TO_PREPARATION"].options = <?php echo JsonEncode($ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_semenanalysisreportedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_semenanalysisreport_edit->showPageHeader(); ?>
<?php
$ivf_semenanalysisreport_edit->showMessage();
?>
<form name="fivf_semenanalysisreportedit" id="fivf_semenanalysisreportedit" class="<?php echo $ivf_semenanalysisreport_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_semenanalysisreport_edit->IsModal ?>">
<?php if ($ivf_semenanalysisreport->getCurrentMasterTable() == "view_ivf_treatment") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_ivf_treatment">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->TidNo->getSessionValue()) ?>">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->PatientName->getSessionValue()) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->getCurrentMasterTable() == "ivf_treatment_plan") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->PatientName->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->TidNo->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ivf_semenanalysisreport_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_id" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_id" type="text/html"><?php echo $ivf_semenanalysisreport_edit->id->caption() ?><?php echo $ivf_semenanalysisreport_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->id->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_id" type="text/html"><span id="el_ivf_semenanalysisreport_id">
<span<?php echo $ivf_semenanalysisreport_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->id->CurrentValue) ?>">
<?php echo $ivf_semenanalysisreport_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_RIDNo" for="x_RIDNo" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_RIDNo" type="text/html"><?php echo $ivf_semenanalysisreport_edit->RIDNo->caption() ?><?php echo $ivf_semenanalysisreport_edit->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->RIDNo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport_edit->RIDNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_semenanalysisreport_RIDNo" type="text/html"><span id="el_ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport_edit->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_edit->RIDNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_RIDNo" name="x_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_semenanalysisreport_RIDNo" type="text/html"><span id="el_ivf_semenanalysisreport_RIDNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->RIDNo->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->RIDNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_semenanalysisreport_edit->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PatientName" for="x_PatientName" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PatientName" type="text/html"><?php echo $ivf_semenanalysisreport_edit->PatientName->caption() ?><?php echo $ivf_semenanalysisreport_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->PatientName->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport_edit->PatientName->getSessionValue() != "") { ?>
<script id="tpx_ivf_semenanalysisreport_PatientName" type="text/html"><span id="el_ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport_edit->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_edit->PatientName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_PatientName" name="x_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->PatientName->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_semenanalysisreport_PatientName" type="text/html"><span id="el_ivf_semenanalysisreport_PatientName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->PatientName->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->PatientName->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_semenanalysisreport_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->HusbandName->Visible) { // HusbandName ?>
	<div id="r_HusbandName" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_HusbandName" for="x_HusbandName" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_HusbandName" type="text/html"><?php echo $ivf_semenanalysisreport_edit->HusbandName->caption() ?><?php echo $ivf_semenanalysisreport_edit->HusbandName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->HusbandName->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_HusbandName" type="text/html"><span id="el_ivf_semenanalysisreport_HusbandName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x_HusbandName" id="x_HusbandName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->HusbandName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->HusbandName->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->HusbandName->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->HusbandName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->RequestDr->Visible) { // RequestDr ?>
	<div id="r_RequestDr" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_RequestDr" for="x_RequestDr" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_RequestDr" type="text/html"><?php echo $ivf_semenanalysisreport_edit->RequestDr->caption() ?><?php echo $ivf_semenanalysisreport_edit->RequestDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->RequestDr->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_RequestDr" type="text/html"><span id="el_ivf_semenanalysisreport_RequestDr">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x_RequestDr" id="x_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->RequestDr->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->RequestDr->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->RequestDr->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->RequestDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->CollectionDate->Visible) { // CollectionDate ?>
	<div id="r_CollectionDate" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_CollectionDate" for="x_CollectionDate" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_CollectionDate" type="text/html"><?php echo $ivf_semenanalysisreport_edit->CollectionDate->caption() ?><?php echo $ivf_semenanalysisreport_edit->CollectionDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->CollectionDate->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CollectionDate" type="text/html"><span id="el_ivf_semenanalysisreport_CollectionDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x_CollectionDate" id="x_CollectionDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->CollectionDate->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->CollectionDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_edit->CollectionDate->ReadOnly && !$ivf_semenanalysisreport_edit->CollectionDate->Disabled && !isset($ivf_semenanalysisreport_edit->CollectionDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_edit->CollectionDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_semenanalysisreportedit_js">
loadjs.ready(["fivf_semenanalysisreportedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportedit", "x_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_semenanalysisreport_edit->CollectionDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ResultDate" for="x_ResultDate" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ResultDate" type="text/html"><?php echo $ivf_semenanalysisreport_edit->ResultDate->caption() ?><?php echo $ivf_semenanalysisreport_edit->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->ResultDate->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ResultDate" type="text/html"><span id="el_ivf_semenanalysisreport_ResultDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->ResultDate->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->ResultDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_edit->ResultDate->ReadOnly && !$ivf_semenanalysisreport_edit->ResultDate->Disabled && !isset($ivf_semenanalysisreport_edit->ResultDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_edit->ResultDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_semenanalysisreportedit_js">
loadjs.ready(["fivf_semenanalysisreportedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportedit", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_semenanalysisreport_edit->ResultDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->RequestSample->Visible) { // RequestSample ?>
	<div id="r_RequestSample" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_RequestSample" for="x_RequestSample" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_RequestSample" type="text/html"><?php echo $ivf_semenanalysisreport_edit->RequestSample->caption() ?><?php echo $ivf_semenanalysisreport_edit->RequestSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->RequestSample->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_RequestSample" type="text/html"><span id="el_ivf_semenanalysisreport_RequestSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->RequestSample->displayValueSeparatorAttribute() ?>" id="x_RequestSample" name="x_RequestSample"<?php echo $ivf_semenanalysisreport_edit->RequestSample->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->RequestSample->selectOptionListHtml("x_RequestSample") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->RequestSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->CollectionType->Visible) { // CollectionType ?>
	<div id="r_CollectionType" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_CollectionType" for="x_CollectionType" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_CollectionType" type="text/html"><?php echo $ivf_semenanalysisreport_edit->CollectionType->caption() ?><?php echo $ivf_semenanalysisreport_edit->CollectionType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->CollectionType->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CollectionType" type="text/html"><span id="el_ivf_semenanalysisreport_CollectionType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->CollectionType->displayValueSeparatorAttribute() ?>" id="x_CollectionType" name="x_CollectionType"<?php echo $ivf_semenanalysisreport_edit->CollectionType->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->CollectionType->selectOptionListHtml("x_CollectionType") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->CollectionType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->CollectionMethod->Visible) { // CollectionMethod ?>
	<div id="r_CollectionMethod" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_CollectionMethod" for="x_CollectionMethod" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_CollectionMethod" type="text/html"><?php echo $ivf_semenanalysisreport_edit->CollectionMethod->caption() ?><?php echo $ivf_semenanalysisreport_edit->CollectionMethod->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->CollectionMethod->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CollectionMethod" type="text/html"><span id="el_ivf_semenanalysisreport_CollectionMethod">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->CollectionMethod->displayValueSeparatorAttribute() ?>" id="x_CollectionMethod" name="x_CollectionMethod"<?php echo $ivf_semenanalysisreport_edit->CollectionMethod->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->CollectionMethod->selectOptionListHtml("x_CollectionMethod") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->CollectionMethod->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Medicationused->Visible) { // Medicationused ?>
	<div id="r_Medicationused" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Medicationused" for="x_Medicationused" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Medicationused" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Medicationused->caption() ?><?php echo $ivf_semenanalysisreport_edit->Medicationused->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Medicationused->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Medicationused" type="text/html"><span id="el_ivf_semenanalysisreport_Medicationused">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->Medicationused->displayValueSeparatorAttribute() ?>" id="x_Medicationused" name="x_Medicationused"<?php echo $ivf_semenanalysisreport_edit->Medicationused->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->Medicationused->selectOptionListHtml("x_Medicationused") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Medicationused->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<div id="r_DifficultiesinCollection" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_DifficultiesinCollection" for="x_DifficultiesinCollection" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_DifficultiesinCollection" type="text/html"><?php echo $ivf_semenanalysisreport_edit->DifficultiesinCollection->caption() ?><?php echo $ivf_semenanalysisreport_edit->DifficultiesinCollection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->DifficultiesinCollection->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DifficultiesinCollection" type="text/html"><span id="el_ivf_semenanalysisreport_DifficultiesinCollection">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->DifficultiesinCollection->displayValueSeparatorAttribute() ?>" id="x_DifficultiesinCollection" name="x_DifficultiesinCollection"<?php echo $ivf_semenanalysisreport_edit->DifficultiesinCollection->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->DifficultiesinCollection->selectOptionListHtml("x_DifficultiesinCollection") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->DifficultiesinCollection->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->pH->Visible) { // pH ?>
	<div id="r_pH" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_pH" for="x_pH" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_pH" type="text/html"><?php echo $ivf_semenanalysisreport_edit->pH->caption() ?><?php echo $ivf_semenanalysisreport_edit->pH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->pH->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_pH" type="text/html"><span id="el_ivf_semenanalysisreport_pH">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x_pH" id="x_pH" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->pH->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->pH->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->pH->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->pH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Timeofcollection->Visible) { // Timeofcollection ?>
	<div id="r_Timeofcollection" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Timeofcollection" for="x_Timeofcollection" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Timeofcollection" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Timeofcollection->caption() ?><?php echo $ivf_semenanalysisreport_edit->Timeofcollection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Timeofcollection->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Timeofcollection" type="text/html"><span id="el_ivf_semenanalysisreport_Timeofcollection">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x_Timeofcollection" id="x_Timeofcollection" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Timeofcollection->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Timeofcollection->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Timeofcollection->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_edit->Timeofcollection->ReadOnly && !$ivf_semenanalysisreport_edit->Timeofcollection->Disabled && !isset($ivf_semenanalysisreport_edit->Timeofcollection->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_edit->Timeofcollection->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_semenanalysisreportedit_js">
loadjs.ready(["fivf_semenanalysisreportedit", "timepicker"], function() {
	ew.createTimePicker("fivf_semenanalysisreportedit", "x_Timeofcollection", {"timeFormat":"h:i A","step":15});
});
</script>
<?php echo $ivf_semenanalysisreport_edit->Timeofcollection->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Timeofexamination->Visible) { // Timeofexamination ?>
	<div id="r_Timeofexamination" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Timeofexamination" for="x_Timeofexamination" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Timeofexamination" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Timeofexamination->caption() ?><?php echo $ivf_semenanalysisreport_edit->Timeofexamination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Timeofexamination->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Timeofexamination" type="text/html"><span id="el_ivf_semenanalysisreport_Timeofexamination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x_Timeofexamination" id="x_Timeofexamination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Timeofexamination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Timeofexamination->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Timeofexamination->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_edit->Timeofexamination->ReadOnly && !$ivf_semenanalysisreport_edit->Timeofexamination->Disabled && !isset($ivf_semenanalysisreport_edit->Timeofexamination->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_edit->Timeofexamination->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_semenanalysisreportedit_js">
loadjs.ready(["fivf_semenanalysisreportedit", "timepicker"], function() {
	ew.createTimePicker("fivf_semenanalysisreportedit", "x_Timeofexamination", {"timeFormat":"h:i A","step":15});
});
</script>
<?php echo $ivf_semenanalysisreport_edit->Timeofexamination->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Volume->Visible) { // Volume ?>
	<div id="r_Volume" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Volume" for="x_Volume" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Volume" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Volume->caption() ?><?php echo $ivf_semenanalysisreport_edit->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Volume->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Volume" type="text/html"><span id="el_ivf_semenanalysisreport_Volume">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x_Volume" id="x_Volume" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Volume->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Volume->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Volume->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Concentration->Visible) { // Concentration ?>
	<div id="r_Concentration" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Concentration" for="x_Concentration" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Concentration" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Concentration->caption() ?><?php echo $ivf_semenanalysisreport_edit->Concentration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Concentration->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Concentration" type="text/html"><span id="el_ivf_semenanalysisreport_Concentration">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x_Concentration" id="x_Concentration" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Concentration->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Concentration->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Concentration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Total->Visible) { // Total ?>
	<div id="r_Total" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Total" for="x_Total" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Total" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Total->caption() ?><?php echo $ivf_semenanalysisreport_edit->Total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Total->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Total" type="text/html"><span id="el_ivf_semenanalysisreport_Total">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x_Total" id="x_Total" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Total->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Total->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Total->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<div id="r_ProgressiveMotility" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ProgressiveMotility" for="x_ProgressiveMotility" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ProgressiveMotility" type="text/html"><?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility->caption() ?><?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProgressiveMotility" type="text/html"><span id="el_ivf_semenanalysisreport_ProgressiveMotility">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x_ProgressiveMotility" id="x_ProgressiveMotility" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->ProgressiveMotility->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<div id="r_NonProgrssiveMotile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" for="x_NonProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile" type="text/html"><?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile->caption() ?><?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile" type="text/html"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x_NonProgrssiveMotile" id="x_NonProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Immotile->Visible) { // Immotile ?>
	<div id="r_Immotile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Immotile" for="x_Immotile" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Immotile" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Immotile->caption() ?><?php echo $ivf_semenanalysisreport_edit->Immotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Immotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Immotile" type="text/html"><span id="el_ivf_semenanalysisreport_Immotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x_Immotile" id="x_Immotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Immotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Immotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Immotile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Immotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<div id="r_TotalProgrssiveMotile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" for="x_TotalProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile" type="text/html"><?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile->caption() ?><?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile" type="text/html"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x_TotalProgrssiveMotile" id="x_TotalProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Appearance->Visible) { // Appearance ?>
	<div id="r_Appearance" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Appearance" for="x_Appearance" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Appearance" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Appearance->caption() ?><?php echo $ivf_semenanalysisreport_edit->Appearance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Appearance->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Appearance" type="text/html"><span id="el_ivf_semenanalysisreport_Appearance">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x_Appearance" id="x_Appearance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Appearance->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Appearance->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Appearance->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Appearance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Homogenosity->Visible) { // Homogenosity ?>
	<div id="r_Homogenosity" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Homogenosity" for="x_Homogenosity" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Homogenosity" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Homogenosity->caption() ?><?php echo $ivf_semenanalysisreport_edit->Homogenosity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Homogenosity->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Homogenosity" type="text/html"><span id="el_ivf_semenanalysisreport_Homogenosity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->Homogenosity->displayValueSeparatorAttribute() ?>" id="x_Homogenosity" name="x_Homogenosity"<?php echo $ivf_semenanalysisreport_edit->Homogenosity->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->Homogenosity->selectOptionListHtml("x_Homogenosity") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Homogenosity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->CompleteSample->Visible) { // CompleteSample ?>
	<div id="r_CompleteSample" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_CompleteSample" for="x_CompleteSample" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_CompleteSample" type="text/html"><?php echo $ivf_semenanalysisreport_edit->CompleteSample->caption() ?><?php echo $ivf_semenanalysisreport_edit->CompleteSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->CompleteSample->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CompleteSample" type="text/html"><span id="el_ivf_semenanalysisreport_CompleteSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->CompleteSample->displayValueSeparatorAttribute() ?>" id="x_CompleteSample" name="x_CompleteSample"<?php echo $ivf_semenanalysisreport_edit->CompleteSample->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->CompleteSample->selectOptionListHtml("x_CompleteSample") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->CompleteSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<div id="r_Liquefactiontime" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Liquefactiontime" for="x_Liquefactiontime" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Liquefactiontime" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Liquefactiontime->caption() ?><?php echo $ivf_semenanalysisreport_edit->Liquefactiontime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Liquefactiontime->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Liquefactiontime" type="text/html"><span id="el_ivf_semenanalysisreport_Liquefactiontime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x_Liquefactiontime" id="x_Liquefactiontime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Liquefactiontime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Liquefactiontime->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Liquefactiontime->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Liquefactiontime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Normal->Visible) { // Normal ?>
	<div id="r_Normal" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Normal" for="x_Normal" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Normal" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Normal->caption() ?><?php echo $ivf_semenanalysisreport_edit->Normal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Normal->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Normal" type="text/html"><span id="el_ivf_semenanalysisreport_Normal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x_Normal" id="x_Normal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Normal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Normal->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Normal->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Normal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Abnormal" for="x_Abnormal" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Abnormal" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Abnormal->caption() ?><?php echo $ivf_semenanalysisreport_edit->Abnormal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Abnormal->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Abnormal" type="text/html"><span id="el_ivf_semenanalysisreport_Abnormal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Abnormal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Abnormal->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Abnormal->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Abnormal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Headdefects->Visible) { // Headdefects ?>
	<div id="r_Headdefects" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Headdefects" for="x_Headdefects" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Headdefects" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Headdefects->caption() ?><?php echo $ivf_semenanalysisreport_edit->Headdefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Headdefects->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Headdefects" type="text/html"><span id="el_ivf_semenanalysisreport_Headdefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x_Headdefects" id="x_Headdefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Headdefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Headdefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Headdefects->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Headdefects->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<div id="r_MidpieceDefects" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_MidpieceDefects" for="x_MidpieceDefects" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_MidpieceDefects" type="text/html"><?php echo $ivf_semenanalysisreport_edit->MidpieceDefects->caption() ?><?php echo $ivf_semenanalysisreport_edit->MidpieceDefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->MidpieceDefects->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_MidpieceDefects" type="text/html"><span id="el_ivf_semenanalysisreport_MidpieceDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x_MidpieceDefects" id="x_MidpieceDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->MidpieceDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->MidpieceDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->MidpieceDefects->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->MidpieceDefects->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->TailDefects->Visible) { // TailDefects ?>
	<div id="r_TailDefects" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TailDefects" for="x_TailDefects" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TailDefects" type="text/html"><?php echo $ivf_semenanalysisreport_edit->TailDefects->caption() ?><?php echo $ivf_semenanalysisreport_edit->TailDefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->TailDefects->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TailDefects" type="text/html"><span id="el_ivf_semenanalysisreport_TailDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x_TailDefects" id="x_TailDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->TailDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->TailDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->TailDefects->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->TailDefects->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<div id="r_NormalProgMotile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NormalProgMotile" for="x_NormalProgMotile" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NormalProgMotile" type="text/html"><?php echo $ivf_semenanalysisreport_edit->NormalProgMotile->caption() ?><?php echo $ivf_semenanalysisreport_edit->NormalProgMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->NormalProgMotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NormalProgMotile" type="text/html"><span id="el_ivf_semenanalysisreport_NormalProgMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x_NormalProgMotile" id="x_NormalProgMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->NormalProgMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->NormalProgMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->NormalProgMotile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->NormalProgMotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->ImmatureForms->Visible) { // ImmatureForms ?>
	<div id="r_ImmatureForms" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ImmatureForms" for="x_ImmatureForms" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ImmatureForms" type="text/html"><?php echo $ivf_semenanalysisreport_edit->ImmatureForms->caption() ?><?php echo $ivf_semenanalysisreport_edit->ImmatureForms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->ImmatureForms->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ImmatureForms" type="text/html"><span id="el_ivf_semenanalysisreport_ImmatureForms">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x_ImmatureForms" id="x_ImmatureForms" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->ImmatureForms->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->ImmatureForms->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->ImmatureForms->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->ImmatureForms->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Leucocytes->Visible) { // Leucocytes ?>
	<div id="r_Leucocytes" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Leucocytes" for="x_Leucocytes" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Leucocytes" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Leucocytes->caption() ?><?php echo $ivf_semenanalysisreport_edit->Leucocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Leucocytes->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Leucocytes" type="text/html"><span id="el_ivf_semenanalysisreport_Leucocytes">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x_Leucocytes" id="x_Leucocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Leucocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Leucocytes->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Leucocytes->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Leucocytes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Agglutination->Visible) { // Agglutination ?>
	<div id="r_Agglutination" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Agglutination" for="x_Agglutination" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Agglutination" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Agglutination->caption() ?><?php echo $ivf_semenanalysisreport_edit->Agglutination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Agglutination->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Agglutination" type="text/html"><span id="el_ivf_semenanalysisreport_Agglutination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x_Agglutination" id="x_Agglutination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Agglutination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Agglutination->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Agglutination->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Agglutination->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Debris->Visible) { // Debris ?>
	<div id="r_Debris" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Debris" for="x_Debris" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Debris" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Debris->caption() ?><?php echo $ivf_semenanalysisreport_edit->Debris->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Debris->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Debris" type="text/html"><span id="el_ivf_semenanalysisreport_Debris">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x_Debris" id="x_Debris" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Debris->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Debris->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Debris->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Debris->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Diagnosis->Visible) { // Diagnosis ?>
	<div id="r_Diagnosis" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Diagnosis" for="x_Diagnosis" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Diagnosis" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Diagnosis->caption() ?><?php echo $ivf_semenanalysisreport_edit->Diagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Diagnosis->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Diagnosis" type="text/html"><span id="el_ivf_semenanalysisreport_Diagnosis">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x_Diagnosis" id="x_Diagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Diagnosis->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport_edit->Diagnosis->editAttributes() ?>><?php echo $ivf_semenanalysisreport_edit->Diagnosis->EditValue ?></textarea>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Diagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Observations->Visible) { // Observations ?>
	<div id="r_Observations" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Observations" for="x_Observations" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Observations" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Observations->caption() ?><?php echo $ivf_semenanalysisreport_edit->Observations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Observations->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Observations" type="text/html"><span id="el_ivf_semenanalysisreport_Observations">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x_Observations" id="x_Observations" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Observations->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport_edit->Observations->editAttributes() ?>><?php echo $ivf_semenanalysisreport_edit->Observations->EditValue ?></textarea>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Observations->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Signature->Visible) { // Signature ?>
	<div id="r_Signature" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Signature" for="x_Signature" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Signature" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Signature->caption() ?><?php echo $ivf_semenanalysisreport_edit->Signature->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Signature->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Signature" type="text/html"><span id="el_ivf_semenanalysisreport_Signature">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x_Signature" id="x_Signature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Signature->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Signature->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Signature->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Signature->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->SemenOrgin->Visible) { // SemenOrgin ?>
	<div id="r_SemenOrgin" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_SemenOrgin" for="x_SemenOrgin" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_SemenOrgin" type="text/html"><?php echo $ivf_semenanalysisreport_edit->SemenOrgin->caption() ?><?php echo $ivf_semenanalysisreport_edit->SemenOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->SemenOrgin->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_SemenOrgin" type="text/html"><span id="el_ivf_semenanalysisreport_SemenOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->SemenOrgin->displayValueSeparatorAttribute() ?>" id="x_SemenOrgin" name="x_SemenOrgin"<?php echo $ivf_semenanalysisreport_edit->SemenOrgin->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->SemenOrgin->selectOptionListHtml("x_SemenOrgin") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->SemenOrgin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Donor->Visible) { // Donor ?>
	<div id="r_Donor" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Donor" for="x_Donor" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Donor" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Donor->caption() ?><?php echo $ivf_semenanalysisreport_edit->Donor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Donor->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Donor" type="text/html"><span id="el_ivf_semenanalysisreport_Donor">
<?php $ivf_semenanalysisreport_edit->Donor->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Donor"><?php echo EmptyValue(strval($ivf_semenanalysisreport_edit->Donor->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_semenanalysisreport_edit->Donor->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_semenanalysisreport_edit->Donor->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_semenanalysisreport_edit->Donor->ReadOnly || $ivf_semenanalysisreport_edit->Donor->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Donor',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_semenanalysisreport_edit->Donor->Lookup->getParamTag($ivf_semenanalysisreport_edit, "p_x_Donor") ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->Donor->displayValueSeparatorAttribute() ?>" name="x_Donor" id="x_Donor" value="<?php echo $ivf_semenanalysisreport_edit->Donor->CurrentValue ?>"<?php echo $ivf_semenanalysisreport_edit->Donor->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Donor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<div id="r_DonorBloodgroup" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_DonorBloodgroup" for="x_DonorBloodgroup" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_DonorBloodgroup" type="text/html"><?php echo $ivf_semenanalysisreport_edit->DonorBloodgroup->caption() ?><?php echo $ivf_semenanalysisreport_edit->DonorBloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->DonorBloodgroup->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DonorBloodgroup" type="text/html"><span id="el_ivf_semenanalysisreport_DonorBloodgroup">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x_DonorBloodgroup" id="x_DonorBloodgroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->DonorBloodgroup->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->DonorBloodgroup->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->DonorBloodgroup->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->DonorBloodgroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Tank->Visible) { // Tank ?>
	<div id="r_Tank" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Tank" for="x_Tank" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Tank" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Tank->caption() ?><?php echo $ivf_semenanalysisreport_edit->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Tank->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Tank" type="text/html"><span id="el_ivf_semenanalysisreport_Tank">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x_Tank" id="x_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Tank->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Tank->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Tank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Location->Visible) { // Location ?>
	<div id="r_Location" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Location" for="x_Location" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Location" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Location->caption() ?><?php echo $ivf_semenanalysisreport_edit->Location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Location->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Location" type="text/html"><span id="el_ivf_semenanalysisreport_Location">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x_Location" id="x_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Location->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Location->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Location->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Location->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Volume1->Visible) { // Volume1 ?>
	<div id="r_Volume1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Volume1" for="x_Volume1" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Volume1" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Volume1->caption() ?><?php echo $ivf_semenanalysisreport_edit->Volume1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Volume1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Volume1" type="text/html"><span id="el_ivf_semenanalysisreport_Volume1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x_Volume1" id="x_Volume1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Volume1->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Volume1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Volume1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Concentration1->Visible) { // Concentration1 ?>
	<div id="r_Concentration1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Concentration1" for="x_Concentration1" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Concentration1" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Concentration1->caption() ?><?php echo $ivf_semenanalysisreport_edit->Concentration1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Concentration1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Concentration1" type="text/html"><span id="el_ivf_semenanalysisreport_Concentration1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x_Concentration1" id="x_Concentration1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Concentration1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Concentration1->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Concentration1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Concentration1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Total1->Visible) { // Total1 ?>
	<div id="r_Total1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Total1" for="x_Total1" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Total1" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Total1->caption() ?><?php echo $ivf_semenanalysisreport_edit->Total1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Total1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Total1" type="text/html"><span id="el_ivf_semenanalysisreport_Total1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x_Total1" id="x_Total1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Total1->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Total1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Total1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<div id="r_ProgressiveMotility1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ProgressiveMotility1" for="x_ProgressiveMotility1" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ProgressiveMotility1" type="text/html"><?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility1->caption() ?><?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProgressiveMotility1" type="text/html"><span id="el_ivf_semenanalysisreport_ProgressiveMotility1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x_ProgressiveMotility1" id="x_ProgressiveMotility1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility1->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<div id="r_NonProgrssiveMotile1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" for="x_NonProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile1" type="text/html"><?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile1->caption() ?><?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile1" type="text/html"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x_NonProgrssiveMotile1" id="x_NonProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Immotile1->Visible) { // Immotile1 ?>
	<div id="r_Immotile1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Immotile1" for="x_Immotile1" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Immotile1" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Immotile1->caption() ?><?php echo $ivf_semenanalysisreport_edit->Immotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Immotile1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Immotile1" type="text/html"><span id="el_ivf_semenanalysisreport_Immotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x_Immotile1" id="x_Immotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Immotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Immotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Immotile1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Immotile1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<div id="r_TotalProgrssiveMotile1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" for="x_TotalProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile1" type="text/html"><?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile1->caption() ?><?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile1" type="text/html"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x_TotalProgrssiveMotile1" id="x_TotalProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TidNo" for="x_TidNo" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TidNo" type="text/html"><?php echo $ivf_semenanalysisreport_edit->TidNo->caption() ?><?php echo $ivf_semenanalysisreport_edit->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->TidNo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport_edit->TidNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_semenanalysisreport_TidNo" type="text/html"><span id="el_ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport_edit->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_edit->TidNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->TidNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_semenanalysisreport_TidNo" type="text/html"><span id="el_ivf_semenanalysisreport_TidNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->TidNo->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->TidNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_semenanalysisreport_edit->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Color->Visible) { // Color ?>
	<div id="r_Color" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Color" for="x_Color" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Color" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Color->caption() ?><?php echo $ivf_semenanalysisreport_edit->Color->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Color->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Color" type="text/html"><span id="el_ivf_semenanalysisreport_Color">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x_Color" id="x_Color" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Color->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Color->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Color->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Color->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->DoneBy->Visible) { // DoneBy ?>
	<div id="r_DoneBy" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_DoneBy" for="x_DoneBy" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_DoneBy" type="text/html"><?php echo $ivf_semenanalysisreport_edit->DoneBy->caption() ?><?php echo $ivf_semenanalysisreport_edit->DoneBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->DoneBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DoneBy" type="text/html"><span id="el_ivf_semenanalysisreport_DoneBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x_DoneBy" id="x_DoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->DoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->DoneBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->DoneBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->DoneBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Method" for="x_Method" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Method" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Method->caption() ?><?php echo $ivf_semenanalysisreport_edit->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Method->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Method" type="text/html"><span id="el_ivf_semenanalysisreport_Method">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Method->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Method->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Method->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Abstinence->Visible) { // Abstinence ?>
	<div id="r_Abstinence" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Abstinence" for="x_Abstinence" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Abstinence" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Abstinence->caption() ?><?php echo $ivf_semenanalysisreport_edit->Abstinence->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Abstinence->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Abstinence" type="text/html"><span id="el_ivf_semenanalysisreport_Abstinence">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x_Abstinence" id="x_Abstinence" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Abstinence->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Abstinence->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Abstinence->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Abstinence->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->ProcessedBy->Visible) { // ProcessedBy ?>
	<div id="r_ProcessedBy" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ProcessedBy" for="x_ProcessedBy" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ProcessedBy" type="text/html"><?php echo $ivf_semenanalysisreport_edit->ProcessedBy->caption() ?><?php echo $ivf_semenanalysisreport_edit->ProcessedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->ProcessedBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProcessedBy" type="text/html"><span id="el_ivf_semenanalysisreport_ProcessedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x_ProcessedBy" id="x_ProcessedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->ProcessedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->ProcessedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->ProcessedBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->ProcessedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->InseminationTime->Visible) { // InseminationTime ?>
	<div id="r_InseminationTime" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_InseminationTime" for="x_InseminationTime" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_InseminationTime" type="text/html"><?php echo $ivf_semenanalysisreport_edit->InseminationTime->caption() ?><?php echo $ivf_semenanalysisreport_edit->InseminationTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->InseminationTime->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_InseminationTime" type="text/html"><span id="el_ivf_semenanalysisreport_InseminationTime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x_InseminationTime" id="x_InseminationTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->InseminationTime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->InseminationTime->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->InseminationTime->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->InseminationTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->InseminationBy->Visible) { // InseminationBy ?>
	<div id="r_InseminationBy" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_InseminationBy" for="x_InseminationBy" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_InseminationBy" type="text/html"><?php echo $ivf_semenanalysisreport_edit->InseminationBy->caption() ?><?php echo $ivf_semenanalysisreport_edit->InseminationBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->InseminationBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_InseminationBy" type="text/html"><span id="el_ivf_semenanalysisreport_InseminationBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x_InseminationBy" id="x_InseminationBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->InseminationBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->InseminationBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->InseminationBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->InseminationBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Big->Visible) { // Big ?>
	<div id="r_Big" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Big" for="x_Big" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Big" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Big->caption() ?><?php echo $ivf_semenanalysisreport_edit->Big->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Big->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Big" type="text/html"><span id="el_ivf_semenanalysisreport_Big">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x_Big" id="x_Big" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Big->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Big->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Big->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Big->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Medium->Visible) { // Medium ?>
	<div id="r_Medium" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Medium" for="x_Medium" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Medium" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Medium->caption() ?><?php echo $ivf_semenanalysisreport_edit->Medium->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Medium->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Medium" type="text/html"><span id="el_ivf_semenanalysisreport_Medium">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x_Medium" id="x_Medium" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Medium->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Medium->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Medium->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Medium->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Small->Visible) { // Small ?>
	<div id="r_Small" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Small" for="x_Small" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Small" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Small->caption() ?><?php echo $ivf_semenanalysisreport_edit->Small->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Small->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Small" type="text/html"><span id="el_ivf_semenanalysisreport_Small">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x_Small" id="x_Small" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Small->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Small->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Small->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Small->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->NoHalo->Visible) { // NoHalo ?>
	<div id="r_NoHalo" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NoHalo" for="x_NoHalo" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NoHalo" type="text/html"><?php echo $ivf_semenanalysisreport_edit->NoHalo->caption() ?><?php echo $ivf_semenanalysisreport_edit->NoHalo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->NoHalo->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NoHalo" type="text/html"><span id="el_ivf_semenanalysisreport_NoHalo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x_NoHalo" id="x_NoHalo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->NoHalo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->NoHalo->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->NoHalo->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->NoHalo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Fragmented->Visible) { // Fragmented ?>
	<div id="r_Fragmented" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Fragmented" for="x_Fragmented" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Fragmented" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Fragmented->caption() ?><?php echo $ivf_semenanalysisreport_edit->Fragmented->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Fragmented->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Fragmented" type="text/html"><span id="el_ivf_semenanalysisreport_Fragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x_Fragmented" id="x_Fragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Fragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Fragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Fragmented->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Fragmented->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->NonFragmented->Visible) { // NonFragmented ?>
	<div id="r_NonFragmented" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NonFragmented" for="x_NonFragmented" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NonFragmented" type="text/html"><?php echo $ivf_semenanalysisreport_edit->NonFragmented->caption() ?><?php echo $ivf_semenanalysisreport_edit->NonFragmented->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->NonFragmented->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonFragmented" type="text/html"><span id="el_ivf_semenanalysisreport_NonFragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x_NonFragmented" id="x_NonFragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->NonFragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->NonFragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->NonFragmented->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->NonFragmented->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->DFI->Visible) { // DFI ?>
	<div id="r_DFI" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_DFI" for="x_DFI" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_DFI" type="text/html"><?php echo $ivf_semenanalysisreport_edit->DFI->caption() ?><?php echo $ivf_semenanalysisreport_edit->DFI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->DFI->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DFI" type="text/html"><span id="el_ivf_semenanalysisreport_DFI">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x_DFI" id="x_DFI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->DFI->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->DFI->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->DFI->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->DFI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->IsueBy->Visible) { // IsueBy ?>
	<div id="r_IsueBy" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IsueBy" for="x_IsueBy" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IsueBy" type="text/html"><?php echo $ivf_semenanalysisreport_edit->IsueBy->caption() ?><?php echo $ivf_semenanalysisreport_edit->IsueBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->IsueBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IsueBy" type="text/html"><span id="el_ivf_semenanalysisreport_IsueBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x_IsueBy" id="x_IsueBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->IsueBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->IsueBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->IsueBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->IsueBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Volume2->Visible) { // Volume2 ?>
	<div id="r_Volume2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Volume2" for="x_Volume2" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Volume2" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Volume2->caption() ?><?php echo $ivf_semenanalysisreport_edit->Volume2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Volume2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Volume2" type="text/html"><span id="el_ivf_semenanalysisreport_Volume2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x_Volume2" id="x_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Volume2->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Volume2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Volume2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Concentration2->Visible) { // Concentration2 ?>
	<div id="r_Concentration2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Concentration2" for="x_Concentration2" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Concentration2" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Concentration2->caption() ?><?php echo $ivf_semenanalysisreport_edit->Concentration2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Concentration2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Concentration2" type="text/html"><span id="el_ivf_semenanalysisreport_Concentration2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x_Concentration2" id="x_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Concentration2->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Concentration2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Concentration2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Total2->Visible) { // Total2 ?>
	<div id="r_Total2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Total2" for="x_Total2" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Total2" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Total2->caption() ?><?php echo $ivf_semenanalysisreport_edit->Total2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Total2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Total2" type="text/html"><span id="el_ivf_semenanalysisreport_Total2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x_Total2" id="x_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Total2->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Total2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Total2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<div id="r_ProgressiveMotility2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ProgressiveMotility2" for="x_ProgressiveMotility2" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ProgressiveMotility2" type="text/html"><?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility2->caption() ?><?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProgressiveMotility2" type="text/html"><span id="el_ivf_semenanalysisreport_ProgressiveMotility2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x_ProgressiveMotility2" id="x_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility2->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->ProgressiveMotility2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<div id="r_NonProgrssiveMotile2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" for="x_NonProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile2" type="text/html"><?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile2->caption() ?><?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile2" type="text/html"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x_NonProgrssiveMotile2" id="x_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->NonProgrssiveMotile2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->Immotile2->Visible) { // Immotile2 ?>
	<div id="r_Immotile2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Immotile2" for="x_Immotile2" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Immotile2" type="text/html"><?php echo $ivf_semenanalysisreport_edit->Immotile2->caption() ?><?php echo $ivf_semenanalysisreport_edit->Immotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->Immotile2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Immotile2" type="text/html"><span id="el_ivf_semenanalysisreport_Immotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x_Immotile2" id="x_Immotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->Immotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->Immotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->Immotile2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->Immotile2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<div id="r_TotalProgrssiveMotile2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" for="x_TotalProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile2" type="text/html"><?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile2->caption() ?><?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile2" type="text/html"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x_TotalProgrssiveMotile2" id="x_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->TotalProgrssiveMotile2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->MACS->Visible) { // MACS ?>
	<div id="r_MACS" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_MACS" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_MACS" type="text/html"><?php echo $ivf_semenanalysisreport_edit->MACS->caption() ?><?php echo $ivf_semenanalysisreport_edit->MACS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->MACS->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_MACS" type="text/html"><span id="el_ivf_semenanalysisreport_MACS">
<div id="tp_x_MACS" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_semenanalysisreport" data-field="x_MACS" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->MACS->displayValueSeparatorAttribute() ?>" name="x_MACS[]" id="x_MACS[]" value="{value}"<?php echo $ivf_semenanalysisreport_edit->MACS->editAttributes() ?>></div>
<div id="dsl_x_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_semenanalysisreport_edit->MACS->checkBoxListHtml(FALSE, "x_MACS[]") ?>
</div></div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->MACS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->IssuedBy->Visible) { // IssuedBy ?>
	<div id="r_IssuedBy" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IssuedBy" for="x_IssuedBy" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IssuedBy" type="text/html"><?php echo $ivf_semenanalysisreport_edit->IssuedBy->caption() ?><?php echo $ivf_semenanalysisreport_edit->IssuedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->IssuedBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IssuedBy" type="text/html"><span id="el_ivf_semenanalysisreport_IssuedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x_IssuedBy" id="x_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->IssuedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->IssuedBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->IssuedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->IssuedTo->Visible) { // IssuedTo ?>
	<div id="r_IssuedTo" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IssuedTo" for="x_IssuedTo" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IssuedTo" type="text/html"><?php echo $ivf_semenanalysisreport_edit->IssuedTo->caption() ?><?php echo $ivf_semenanalysisreport_edit->IssuedTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->IssuedTo->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IssuedTo" type="text/html"><span id="el_ivf_semenanalysisreport_IssuedTo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x_IssuedTo" id="x_IssuedTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->IssuedTo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->IssuedTo->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->IssuedTo->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->IssuedTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->PaID->Visible) { // PaID ?>
	<div id="r_PaID" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PaID" for="x_PaID" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PaID" type="text/html"><?php echo $ivf_semenanalysisreport_edit->PaID->caption() ?><?php echo $ivf_semenanalysisreport_edit->PaID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->PaID->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PaID" type="text/html"><span id="el_ivf_semenanalysisreport_PaID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x_PaID" id="x_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->PaID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->PaID->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->PaID->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->PaID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->PaName->Visible) { // PaName ?>
	<div id="r_PaName" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PaName" for="x_PaName" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PaName" type="text/html"><?php echo $ivf_semenanalysisreport_edit->PaName->caption() ?><?php echo $ivf_semenanalysisreport_edit->PaName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->PaName->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PaName" type="text/html"><span id="el_ivf_semenanalysisreport_PaName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x_PaName" id="x_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->PaName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->PaName->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->PaName->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->PaName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->PaMobile->Visible) { // PaMobile ?>
	<div id="r_PaMobile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PaMobile" for="x_PaMobile" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PaMobile" type="text/html"><?php echo $ivf_semenanalysisreport_edit->PaMobile->caption() ?><?php echo $ivf_semenanalysisreport_edit->PaMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->PaMobile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PaMobile" type="text/html"><span id="el_ivf_semenanalysisreport_PaMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x_PaMobile" id="x_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->PaMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->PaMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->PaMobile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->PaMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PartnerID" for="x_PartnerID" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PartnerID" type="text/html"><?php echo $ivf_semenanalysisreport_edit->PartnerID->caption() ?><?php echo $ivf_semenanalysisreport_edit->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->PartnerID->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PartnerID" type="text/html"><span id="el_ivf_semenanalysisreport_PartnerID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->PartnerID->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->PartnerID->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PartnerName" for="x_PartnerName" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PartnerName" type="text/html"><?php echo $ivf_semenanalysisreport_edit->PartnerName->caption() ?><?php echo $ivf_semenanalysisreport_edit->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->PartnerName->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PartnerName" type="text/html"><span id="el_ivf_semenanalysisreport_PartnerName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->PartnerName->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->PartnerName->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->PartnerMobile->Visible) { // PartnerMobile ?>
	<div id="r_PartnerMobile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PartnerMobile" for="x_PartnerMobile" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PartnerMobile" type="text/html"><?php echo $ivf_semenanalysisreport_edit->PartnerMobile->caption() ?><?php echo $ivf_semenanalysisreport_edit->PartnerMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->PartnerMobile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PartnerMobile" type="text/html"><span id="el_ivf_semenanalysisreport_PartnerMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->PartnerMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->PartnerMobile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->PartnerMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<div id="r_PREG_TEST_DATE" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" for="x_PREG_TEST_DATE" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PREG_TEST_DATE" type="text/html"><?php echo $ivf_semenanalysisreport_edit->PREG_TEST_DATE->caption() ?><?php echo $ivf_semenanalysisreport_edit->PREG_TEST_DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->PREG_TEST_DATE->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PREG_TEST_DATE" type="text/html"><span id="el_ivf_semenanalysisreport_PREG_TEST_DATE">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->PREG_TEST_DATE->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_edit->PREG_TEST_DATE->ReadOnly && !$ivf_semenanalysisreport_edit->PREG_TEST_DATE->Disabled && !isset($ivf_semenanalysisreport_edit->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_edit->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_semenanalysisreportedit_js">
loadjs.ready(["fivf_semenanalysisreportedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportedit", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_semenanalysisreport_edit->PREG_TEST_DATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<div id="r_SPECIFIC_PROBLEMS" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" for="x_SPECIFIC_PROBLEMS" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" type="text/html"><?php echo $ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->caption() ?><?php echo $ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" type="text/html"><span id="el_ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x_SPECIFIC_PROBLEMS" name="x_SPECIFIC_PROBLEMS"<?php echo $ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->selectOptionListHtml("x_SPECIFIC_PROBLEMS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->SPECIFIC_PROBLEMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->IMSC_1->Visible) { // IMSC_1 ?>
	<div id="r_IMSC_1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IMSC_1" for="x_IMSC_1" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IMSC_1" type="text/html"><?php echo $ivf_semenanalysisreport_edit->IMSC_1->caption() ?><?php echo $ivf_semenanalysisreport_edit->IMSC_1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->IMSC_1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IMSC_1" type="text/html"><span id="el_ivf_semenanalysisreport_IMSC_1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x_IMSC_1" id="x_IMSC_1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->IMSC_1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->IMSC_1->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->IMSC_1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->IMSC_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->IMSC_2->Visible) { // IMSC_2 ?>
	<div id="r_IMSC_2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IMSC_2" for="x_IMSC_2" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IMSC_2" type="text/html"><?php echo $ivf_semenanalysisreport_edit->IMSC_2->caption() ?><?php echo $ivf_semenanalysisreport_edit->IMSC_2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->IMSC_2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IMSC_2" type="text/html"><span id="el_ivf_semenanalysisreport_IMSC_2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x_IMSC_2" id="x_IMSC_2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->IMSC_2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->IMSC_2->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->IMSC_2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->IMSC_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<div id="r_LIQUIFACTION_STORAGE" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" for="x_LIQUIFACTION_STORAGE" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" type="text/html"><?php echo $ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->caption() ?><?php echo $ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" type="text/html"><span id="el_ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>" id="x_LIQUIFACTION_STORAGE" name="x_LIQUIFACTION_STORAGE"<?php echo $ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->selectOptionListHtml("x_LIQUIFACTION_STORAGE") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->LIQUIFACTION_STORAGE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<div id="r_IUI_PREP_METHOD" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" for="x_IUI_PREP_METHOD" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IUI_PREP_METHOD" type="text/html"><?php echo $ivf_semenanalysisreport_edit->IUI_PREP_METHOD->caption() ?><?php echo $ivf_semenanalysisreport_edit->IUI_PREP_METHOD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->IUI_PREP_METHOD->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IUI_PREP_METHOD" type="text/html"><span id="el_ivf_semenanalysisreport_IUI_PREP_METHOD">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>" id="x_IUI_PREP_METHOD" name="x_IUI_PREP_METHOD"<?php echo $ivf_semenanalysisreport_edit->IUI_PREP_METHOD->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->IUI_PREP_METHOD->selectOptionListHtml("x_IUI_PREP_METHOD") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->IUI_PREP_METHOD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<div id="r_TIME_FROM_TRIGGER" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" for="x_TIME_FROM_TRIGGER" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TIME_FROM_TRIGGER" type="text/html"><?php echo $ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->caption() ?><?php echo $ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TIME_FROM_TRIGGER" type="text/html"><span id="el_ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>" id="x_TIME_FROM_TRIGGER" name="x_TIME_FROM_TRIGGER"<?php echo $ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->selectOptionListHtml("x_TIME_FROM_TRIGGER") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->TIME_FROM_TRIGGER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<div id="r_COLLECTION_TO_PREPARATION" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" for="x_COLLECTION_TO_PREPARATION" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" type="text/html"><?php echo $ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->caption() ?><?php echo $ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" type="text/html"><span id="el_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-value-separator="<?php echo $ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>" id="x_COLLECTION_TO_PREPARATION" name="x_COLLECTION_TO_PREPARATION"<?php echo $ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->selectOptionListHtml("x_COLLECTION_TO_PREPARATION") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->COLLECTION_TO_PREPARATION->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_edit->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<div id="r_TIME_FROM_PREP_TO_INSEM" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" for="x_TIME_FROM_PREP_TO_INSEM" class="<?php echo $ivf_semenanalysisreport_edit->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" type="text/html"><?php echo $ivf_semenanalysisreport_edit->TIME_FROM_PREP_TO_INSEM->caption() ?><?php echo $ivf_semenanalysisreport_edit->TIME_FROM_PREP_TO_INSEM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_edit->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_edit->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" type="text/html"><span id="el_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x_TIME_FROM_PREP_TO_INSEM" id="x_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_edit->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_edit->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?php echo $ivf_semenanalysisreport_edit->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_edit->TIME_FROM_PREP_TO_INSEM->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_semenanalysisreportedit" class="ew-custom-template"></div>
<script id="tpm_ivf_semenanalysisreportedit" type="text/html">
<div id="ct_ivf_semenanalysisreport_edit"><style>
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

//if( $showmaster=="ivf_treatment_plan")
//{
//$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where id='".$Tid."'; ";
//$results = $dbhelper->ExecuteRows($sql);
//$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$results[0]["RIDNo"]."'; ";
//$results = $dbhelper->ExecuteRows($sql);

$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where id='".$Tid."'; ";
$results = $dbhelper->ExecuteRows($sql);
if($results[0]["RIDNo"] == null)
{
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["HusbandName"]."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["HusbandName"]."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
}else{
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$results[0]["RIDNo"]."'; ";
	$results = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
}

//}else{
//$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
//$results = $dbhelper->ExecuteRows($sql);
//}
//$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
//$results1 = $dbhelper->ExecuteRows($sql);
//$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
//$results2 = $dbhelper->ExecuteRows($sql);

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
<div id="viewPatientInfo" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
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
<div id="ViewPartnerInfo" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
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
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_SemenOrgin"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_SemenOrgin")/}} </td>
		</tr>
		<tr id="donorId">
			<td>Donor</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Donor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Donor")/}}</td>
		</tr>
		<tr id="DonorBloodGroupId">
			<td>Donor Bloodgroup</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_DonorBloodgroup"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_DonorBloodgroup")/}}</td>
		</tr>
	</tbody>
</table>
			</td>
			<td>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td>Request Dr</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_RequestDr"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_RequestDr")/}}</td>
		</tr>
	<tr>
			<td>Collection Date</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_CollectionDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_CollectionDate")/}}</td>
		</tr>
		<tr>
			<td>Result Date</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_ResultDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_ResultDate")/}}</td>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_semenanalysisreport_RequestSample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_RequestSample")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_semenanalysisreport_CollectionType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_CollectionType")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_semenanalysisreport_CollectionMethod"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_CollectionMethod")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_semenanalysisreport_Abstinence"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Abstinence")/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_semenanalysisreport_Medicationused"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Medicationused")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_semenanalysisreport_DifficultiesinCollection"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_DifficultiesinCollection")/}}</span>
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
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_pH"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_pH")/}}>=7.2</td>
			<td></td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Timeofcollection"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Timeofcollection")/}}</td>
			<td></td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Timeofexamination"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Timeofexamination")/}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:50%">
	<tbody>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_Appearance"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Appearance")/}}</td>
			<td ></td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_Color"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Color")/}}</td>
			<td ></td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_Homogenosity"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Homogenosity")/}}</td>
			<td ></td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_CompleteSample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_CompleteSample")/}}</td>
			<td ></td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_Liquefactiontime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Liquefactiontime")/}}</td>
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
	{{include tmpl="#tpc_ivf_semenanalysisreport_MACS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_MACS")/}}
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
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Volume"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Volume")/}}</td>
			<td id="Volume1">{{include tmpl="#tpc_ivf_semenanalysisreport_Volume1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Volume1")/}}</td>
			<td id="Volume2">{{include tmpl="#tpc_ivf_semenanalysisreport_Volume2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Volume2")/}}</td>
			<td>>=1.5ml</td>
		</tr>
		<tr>
			<td>Concentration (mill/ml)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Concentration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Concentration")/}}</td>
			<td  id="Concentration1">{{include tmpl="#tpc_ivf_semenanalysisreport_Concentration1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Concentration1")/}}</td>
			<td  id="Concentration2">{{include tmpl="#tpc_ivf_semenanalysisreport_Concentration2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Concentration2")/}}</td>
			<td>>= 15</td>
		</tr>
		<tr>
			<td>Total (mill/ejaculate)</td>
				<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Total"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Total")/}}</td>
			<td  id="Total1">{{include tmpl="#tpc_ivf_semenanalysisreport_Total1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Total1")/}}</td>
			<td  id="Total2">{{include tmpl="#tpc_ivf_semenanalysisreport_Total2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Total2")/}}</td>
			<td>>=39</td>
		</tr>
		<tr>
			<td>Progressive Motility (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_ProgressiveMotility"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_ProgressiveMotility")/}}</td>
			<td  id="ProgressiveMotility1">{{include tmpl="#tpc_ivf_semenanalysisreport_ProgressiveMotility1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_ProgressiveMotility1")/}}</td>
			<td  id="ProgressiveMotility2">{{include tmpl="#tpc_ivf_semenanalysisreport_ProgressiveMotility2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_ProgressiveMotility2")/}}</td>
			<td>>=32%</td>
		</tr>
		<tr>
			<td>Non Progrssive Motile (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_NonProgrssiveMotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NonProgrssiveMotile")/}}</td>
			<td  id="NonProgrssiveMotile1">{{include tmpl="#tpc_ivf_semenanalysisreport_NonProgrssiveMotile1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NonProgrssiveMotile1")/}}</td>
			<td  id="NonProgrssiveMotile2">{{include tmpl="#tpc_ivf_semenanalysisreport_NonProgrssiveMotile2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NonProgrssiveMotile2")/}}</td>
			<td></td>
		</tr>
		<tr>
			<td>Immotile (%)</td>
			<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_Immotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Immotile")/}}</td>
			<td  id="Immotile1">{{include tmpl="#tpc_ivf_semenanalysisreport_Immotile1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Immotile1")/}}</td>
			<td  id="Immotile2">{{include tmpl="#tpc_ivf_semenanalysisreport_Immotile2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Immotile2")/}}</td>
			<td></td>
		</tr>
		<tr>
			<td>Total Motility (%)</td>
				<td>:</td>
			<td>{{include tmpl="#tpc_ivf_semenanalysisreport_TotalProgrssiveMotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_TotalProgrssiveMotile")/}}</td>
			<td  id="TotalProgrssiveMotile1">{{include tmpl="#tpc_ivf_semenanalysisreport_TotalProgrssiveMotile1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_TotalProgrssiveMotile1")/}}</td>
			<td  id="TotalProgrssiveMotile2">{{include tmpl="#tpc_ivf_semenanalysisreport_TotalProgrssiveMotile2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_TotalProgrssiveMotile2")/}}</td>
			<td>>=40% PR+NP</td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:40%">
	<tbody>
		<tr>
			<td >Normal</td>		
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_Normal"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Normal")/}}%</td>
			<td >>=4%</td>
		</tr>
		<tr>
			<td >Abnormal</td>
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_Abnormal"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Abnormal")/}}%</td>
			<td ></td>
		</tr>	
		<tr>
			<td >Head Defects</td>
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_Headdefects"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Headdefects")/}}%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Midpiece Defects</td>
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_MidpieceDefects"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_MidpieceDefects")/}}%</td>
			<td></td>
		</tr>
		<tr>
			<td >Tail Defects</td>
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_TailDefects"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_TailDefects")/}}%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Vitality(%)</td>
			<td >:{{include tmpl="#tpc_ivf_semenanalysisreport_NormalProgMotile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NormalProgMotile")/}}</td>
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
			<td id="Method">{{include tmpl="#tpc_ivf_semenanalysisreport_Method"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Method")/}}</td>
			<td ></td>
			<td ></td>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_Agglutination"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Agglutination")/}}</td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_ImmatureForms"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_ImmatureForms")/}}</td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_Leucocytes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Leucocytes")/}}</td>
			<td >%   <1 mill/ml or 20/field </td>
				<td ></td>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_Debris"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Debris")/}}</td>
		</tr>
	</tbody>
</table>
</div>
<div class="">
{{include tmpl="#tpc_ivf_semenanalysisreport_Diagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Diagnosis")/}}
</div>
<div class="">
{{include tmpl="#tpc_ivf_semenanalysisreport_Observations"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Observations")/}}
</div>
<div class="row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td id='Big' >{{include tmpl="#tpc_ivf_semenanalysisreport_Big"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Big")/}}</td>
			<td id='Medium' >{{include tmpl="#tpc_ivf_semenanalysisreport_Medium"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Medium")/}}</td>
			<td id='Small'>{{include tmpl="#tpc_ivf_semenanalysisreport_Small"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Small")/}}</td>
			<td id='NoHalo'>{{include tmpl="#tpc_ivf_semenanalysisreport_NoHalo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NoHalo")/}}</td>
		</tr>
		<tr>
			<td id='Fragmented'>{{include tmpl="#tpc_ivf_semenanalysisreport_Fragmented"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Fragmented")/}}</td>
			<td id='NonFragmented'>{{include tmpl="#tpc_ivf_semenanalysisreport_NonFragmented"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_NonFragmented")/}}</td>
			<td id='DFI'>{{include tmpl="#tpc_ivf_semenanalysisreport_DFI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_DFI")/}}</td>
		</tr>
		<tr>		
		<tr>
			<td id='InseminationTime'>{{include tmpl="#tpc_ivf_semenanalysisreport_InseminationTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_InseminationTime")/}}</td>
			<td ></td>
			<td ></td>
			<td id='InseminationBy'>{{include tmpl="#tpc_ivf_semenanalysisreport_InseminationBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_InseminationBy")/}}</td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_ProcessedBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_ProcessedBy")/}}</td>
			<td id='IsueBy'>{{include tmpl="#tpc_ivf_semenanalysisreport_IsueBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_IsueBy")/}}</td>
			<td ></td>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_DoneBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_DoneBy")/}}</td>
		</tr>	
	</tbody>
</table>
</div>
<div class="row" id="TankLocation">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_Tank"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Tank")/}}</td>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_Location"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_Location")/}}</td>
		</tr>
	</tbody>
</table>
</div>
<div class="row" id="IUILocation">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION")/}}</td>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_IMSC_1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_IMSC_1")/}}</td>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_IMSC_2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_IMSC_2")/}}</td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_IUI_PREP_METHOD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_IUI_PREP_METHOD")/}}</td>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_LIQUIFACTION_STORAGE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_LIQUIFACTION_STORAGE")/}}</td>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_PREG_TEST_DATE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_PREG_TEST_DATE")/}}</td>
		</tr>
		<tr>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_SPECIFIC_PROBLEMS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_SPECIFIC_PROBLEMS")/}}</td>
			<td >{{include tmpl="#tpc_ivf_semenanalysisreport_TIME_FROM_TRIGGER"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_TIME_FROM_TRIGGER")/}}</td>
			<td ></td>
		</tr>
	</tbody>
</table>
</div>
</div>
</script>
<script type="text/html" class="ivf_semenanalysisreportedit_js">

		var OatientType = '<?php     $dbhelper = &DbHelper();
								$Tid = $_GET["id"] ;
								$showmaster = $_GET["showmaster"] ;
								$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where id='".$Tid."'; ";
								$results = $dbhelper->ExecuteRows($sql); echo $results[0]["RIDNo"];  ?>';
	if(OatientType == '')
	{
		document.getElementById("ViewPartnerInfo").style.display = "none";
		document.getElementById("viewPatientInfo").className = "col-md-12";
	}

</script>

<?php if (!$ivf_semenanalysisreport_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_semenanalysisreport_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_semenanalysisreport_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_semenanalysisreport->Rows) ?> };
	ew.applyTemplate("tpd_ivf_semenanalysisreportedit", "tpm_ivf_semenanalysisreportedit", "ivf_semenanalysisreportedit", "<?php echo $ivf_semenanalysisreport->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_semenanalysisreportedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_semenanalysisreport_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("x_pH").style.width="80px",document.getElementById("x_Volume").style.width="80px",document.getElementById("x_Concentration").style.width="80px",document.getElementById("x_Total").style.width="80px",document.getElementById("x_ProgressiveMotility").style.width="80px",document.getElementById("x_NonProgrssiveMotile").style.width="80px",document.getElementById("x_Immotile").style.width="80px",document.getElementById("x_TotalProgrssiveMotile").style.width="80px",document.getElementById("x_Normal").style.width="80px",document.getElementById("x_Abnormal").style.width="80px",document.getElementById("x_Headdefects").style.width="80px",document.getElementById("x_MidpieceDefects").style.width="80px",document.getElementById("x_TailDefects").style.width="80px",document.getElementById("x_NormalProgMotile").style.width="80px",document.getElementById("x_Volume1").style.width="80px",document.getElementById("x_Concentration1").style.width="80px",document.getElementById("x_Total1").style.width="80px",document.getElementById("x_ProgressiveMotility1").style.width="80px",document.getElementById("x_NonProgrssiveMotile1").style.width="80px",document.getElementById("x_Immotile1").style.width="80px",document.getElementById("x_TotalProgrssiveMotile1").style.width="80px",document.getElementById("x_Volume2").style.width="80px",document.getElementById("x_Concentration2").style.width="80px",document.getElementById("x_Total2").style.width="80px",document.getElementById("x_ProgressiveMotility2").style.width="80px",document.getElementById("x_NonProgrssiveMotile2").style.width="80px",document.getElementById("x_Immotile2").style.width="80px",document.getElementById("x_TotalProgrssiveMotile2").style.width="80px",document.getElementById("idMacs").style.visibility="hidden";var RequestSample=(e=document.getElementById("x_RequestSample")).options[e.selectedIndex].value,TankLocation=document.getElementById("TankLocation");document.getElementById("SemenHeading").innerText="Spermiogram","Freezing"==RequestSample?(document.getElementById("SemenHeading").innerText="Semen Freezing",TankLocation.style.visibility="visible"):TankLocation.style.visibility="hidden";var capacitationTable=document.getElementById("capacitationTable");"IUI processing"==RequestSample?(capacitationTable.style.width="100%",document.getElementById("SemenHeading").innerText="INTRA UTERINE INSEMINATION",document.getElementById("Big").style.visibility="hidden",document.getElementById("Medium").style.visibility="hidden",document.getElementById("Small").style.visibility="hidden",document.getElementById("NoHalo").style.visibility="hidden",document.getElementById("Fragmented").style.visibility="hidden",document.getElementById("NonFragmented").style.visibility="hidden",document.getElementById("DFI").style.visibility="hidden",document.getElementById("Volume1").style.visibility="visible",document.getElementById("Concentration1").style.visibility="visible",document.getElementById("Total1").style.visibility="visible",document.getElementById("ProgressiveMotility1").style.visibility="visible",document.getElementById("NonProgrssiveMotile1").style.visibility="visible",document.getElementById("Immotile1").style.visibility="visible",document.getElementById("TotalProgrssiveMotile1").style.visibility="visible",document.getElementById("capacitationTableHead").style.visibility="visible",document.getElementById("PreCapacitation").innerText="Pre Capacitation",document.getElementById("PostCapacitation").innerText="Post Capacitation",document.getElementById("x_Volume1").style.width="80px",document.getElementById("x_Concentration1").style.width="80px",document.getElementById("x_Total1").style.width="80px",document.getElementById("x_ProgressiveMotility1").style.width="80px",document.getElementById("x_NonProgrssiveMotile1").style.width="80px",document.getElementById("x_Immotile1").style.width="80px",document.getElementById("x_TotalProgrssiveMotile1").style.width="80px"):(capacitationTable.style.width="60%",document.getElementById("Volume1").style.visibility="hidden",document.getElementById("Concentration1").style.visibility="hidden",document.getElementById("Total1").style.visibility="hidden",document.getElementById("ProgressiveMotility1").style.visibility="hidden",document.getElementById("NonProgrssiveMotile1").style.visibility="hidden",document.getElementById("Immotile1").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile1").style.visibility="hidden",document.getElementById("capacitationTableHead").style.visibility="hidden",document.getElementById("PreCapacitation").innerText="",document.getElementById("PostCapacitation").innerText="",document.getElementById("x_Volume1").style.width="0px",document.getElementById("x_Concentration1").style.width="0px",document.getElementById("x_Total1").style.width="0px",document.getElementById("x_ProgressiveMotility1").style.width="0px",document.getElementById("x_NonProgrssiveMotile1").style.width="0px",document.getElementById("x_Immotile1").style.width="0px",document.getElementById("x_TotalProgrssiveMotile1").style.width="0px",document.getElementById("x_Volume2").style.width="0px",document.getElementById("x_Concentration2").style.width="0px",document.getElementById("x_Total2").style.width="0px",document.getElementById("x_ProgressiveMotility2").style.width="0px",document.getElementById("x_NonProgrssiveMotile2").style.width="0px",document.getElementById("x_Immotile2").style.width="0px",document.getElementById("x_TotalProgrssiveMotile2").style.width="0px",document.getElementById("Volume2").style.visibility="hidden",document.getElementById("Concentration2").style.visibility="hidden",document.getElementById("Total2").style.visibility="hidden",document.getElementById("ProgressiveMotility2").style.visibility="hidden",document.getElementById("NonProgrssiveMotile2").style.visibility="hidden",document.getElementById("Immotile2").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile2").style.visibility="hidden",document.getElementById("Big").style.visibility="hidden",document.getElementById("Medium").style.visibility="hidden",document.getElementById("Small").style.visibility="hidden",document.getElementById("NoHalo").style.visibility="hidden",document.getElementById("Fragmented").style.visibility="hidden",document.getElementById("NonFragmented").style.visibility="hidden",document.getElementById("DFI").style.visibility="hidden",document.getElementById("InseminationTime").style.visibility="hidden",document.getElementById("InseminationBy").style.visibility="hidden",document.getElementById("IsueBy").style.visibility="hidden"),"DFI"==RequestSample&&(document.getElementById("SemenHeading").innerText="DNA Framgmentation Index",document.getElementById("Big").style.visibility="visible",document.getElementById("Medium").style.visibility="visible",document.getElementById("Small").style.visibility="visible",document.getElementById("NoHalo").style.visibility="visible",document.getElementById("Fragmented").style.visibility="visible",document.getElementById("NonFragmented").style.visibility="visible",document.getElementById("DFI").style.visibility="visible");var e,SemenOrgin=(e=document.getElementById("x_SemenOrgin")).options[e.selectedIndex].value,donorId=document.getElementById("donorId"),DonorBloodGroupId=document.getElementById("DonorBloodGroupId");"Donor"==SemenOrgin?(donorId.style.visibility="visible",DonorBloodGroupId.style.visibility="visible"):(donorId.style.visibility="hidden",DonorBloodGroupId.style.visibility="hidden");
});
</script>
<?php include_once "footer.php"; ?>
<?php
$ivf_semenanalysisreport_edit->terminate();
?>