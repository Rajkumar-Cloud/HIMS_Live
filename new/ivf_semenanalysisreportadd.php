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
$ivf_semenanalysisreport_add = new ivf_semenanalysisreport_add();

// Run the page
$ivf_semenanalysisreport_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenanalysisreport_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_semenanalysisreportadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_semenanalysisreportadd = currentForm = new ew.Form("fivf_semenanalysisreportadd", "add");

	// Validate form
	fivf_semenanalysisreportadd.validate = function() {
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
			<?php if ($ivf_semenanalysisreport_add->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->RIDNo->caption(), $ivf_semenanalysisreport_add->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_add->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->PatientName->caption(), $ivf_semenanalysisreport_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->HusbandName->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->HusbandName->caption(), $ivf_semenanalysisreport_add->HusbandName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->RequestDr->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->RequestDr->caption(), $ivf_semenanalysisreport_add->RequestDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->CollectionDate->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->CollectionDate->caption(), $ivf_semenanalysisreport_add->CollectionDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CollectionDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_add->CollectionDate->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_add->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->ResultDate->caption(), $ivf_semenanalysisreport_add->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_add->ResultDate->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_add->RequestSample->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->RequestSample->caption(), $ivf_semenanalysisreport_add->RequestSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->CollectionType->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->CollectionType->caption(), $ivf_semenanalysisreport_add->CollectionType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->CollectionMethod->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionMethod");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->CollectionMethod->caption(), $ivf_semenanalysisreport_add->CollectionMethod->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Medicationused->Required) { ?>
				elm = this.getElements("x" + infix + "_Medicationused");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Medicationused->caption(), $ivf_semenanalysisreport_add->Medicationused->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->DifficultiesinCollection->Required) { ?>
				elm = this.getElements("x" + infix + "_DifficultiesinCollection");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->DifficultiesinCollection->caption(), $ivf_semenanalysisreport_add->DifficultiesinCollection->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->pH->Required) { ?>
				elm = this.getElements("x" + infix + "_pH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->pH->caption(), $ivf_semenanalysisreport_add->pH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Timeofcollection->Required) { ?>
				elm = this.getElements("x" + infix + "_Timeofcollection");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Timeofcollection->caption(), $ivf_semenanalysisreport_add->Timeofcollection->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Timeofexamination->Required) { ?>
				elm = this.getElements("x" + infix + "_Timeofexamination");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Timeofexamination->caption(), $ivf_semenanalysisreport_add->Timeofexamination->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Volume->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Volume->caption(), $ivf_semenanalysisreport_add->Volume->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Concentration->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Concentration->caption(), $ivf_semenanalysisreport_add->Concentration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Total->Required) { ?>
				elm = this.getElements("x" + infix + "_Total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Total->caption(), $ivf_semenanalysisreport_add->Total->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->ProgressiveMotility->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->ProgressiveMotility->caption(), $ivf_semenanalysisreport_add->ProgressiveMotility->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->NonProgrssiveMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->NonProgrssiveMotile->caption(), $ivf_semenanalysisreport_add->NonProgrssiveMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Immotile->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Immotile->caption(), $ivf_semenanalysisreport_add->Immotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->TotalProgrssiveMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->TotalProgrssiveMotile->caption(), $ivf_semenanalysisreport_add->TotalProgrssiveMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Appearance->Required) { ?>
				elm = this.getElements("x" + infix + "_Appearance");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Appearance->caption(), $ivf_semenanalysisreport_add->Appearance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Homogenosity->Required) { ?>
				elm = this.getElements("x" + infix + "_Homogenosity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Homogenosity->caption(), $ivf_semenanalysisreport_add->Homogenosity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->CompleteSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CompleteSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->CompleteSample->caption(), $ivf_semenanalysisreport_add->CompleteSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Liquefactiontime->Required) { ?>
				elm = this.getElements("x" + infix + "_Liquefactiontime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Liquefactiontime->caption(), $ivf_semenanalysisreport_add->Liquefactiontime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Normal->Required) { ?>
				elm = this.getElements("x" + infix + "_Normal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Normal->caption(), $ivf_semenanalysisreport_add->Normal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Abnormal->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Abnormal->caption(), $ivf_semenanalysisreport_add->Abnormal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Headdefects->Required) { ?>
				elm = this.getElements("x" + infix + "_Headdefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Headdefects->caption(), $ivf_semenanalysisreport_add->Headdefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->MidpieceDefects->Required) { ?>
				elm = this.getElements("x" + infix + "_MidpieceDefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->MidpieceDefects->caption(), $ivf_semenanalysisreport_add->MidpieceDefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->TailDefects->Required) { ?>
				elm = this.getElements("x" + infix + "_TailDefects");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->TailDefects->caption(), $ivf_semenanalysisreport_add->TailDefects->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->NormalProgMotile->Required) { ?>
				elm = this.getElements("x" + infix + "_NormalProgMotile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->NormalProgMotile->caption(), $ivf_semenanalysisreport_add->NormalProgMotile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->ImmatureForms->Required) { ?>
				elm = this.getElements("x" + infix + "_ImmatureForms");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->ImmatureForms->caption(), $ivf_semenanalysisreport_add->ImmatureForms->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Leucocytes->Required) { ?>
				elm = this.getElements("x" + infix + "_Leucocytes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Leucocytes->caption(), $ivf_semenanalysisreport_add->Leucocytes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Agglutination->Required) { ?>
				elm = this.getElements("x" + infix + "_Agglutination");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Agglutination->caption(), $ivf_semenanalysisreport_add->Agglutination->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Debris->Required) { ?>
				elm = this.getElements("x" + infix + "_Debris");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Debris->caption(), $ivf_semenanalysisreport_add->Debris->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Diagnosis->Required) { ?>
				elm = this.getElements("x" + infix + "_Diagnosis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Diagnosis->caption(), $ivf_semenanalysisreport_add->Diagnosis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Observations->Required) { ?>
				elm = this.getElements("x" + infix + "_Observations");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Observations->caption(), $ivf_semenanalysisreport_add->Observations->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Signature->Required) { ?>
				elm = this.getElements("x" + infix + "_Signature");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Signature->caption(), $ivf_semenanalysisreport_add->Signature->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->SemenOrgin->Required) { ?>
				elm = this.getElements("x" + infix + "_SemenOrgin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->SemenOrgin->caption(), $ivf_semenanalysisreport_add->SemenOrgin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Donor->Required) { ?>
				elm = this.getElements("x" + infix + "_Donor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Donor->caption(), $ivf_semenanalysisreport_add->Donor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->DonorBloodgroup->Required) { ?>
				elm = this.getElements("x" + infix + "_DonorBloodgroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->DonorBloodgroup->caption(), $ivf_semenanalysisreport_add->DonorBloodgroup->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Tank->caption(), $ivf_semenanalysisreport_add->Tank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Location->Required) { ?>
				elm = this.getElements("x" + infix + "_Location");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Location->caption(), $ivf_semenanalysisreport_add->Location->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Volume1->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Volume1->caption(), $ivf_semenanalysisreport_add->Volume1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Concentration1->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Concentration1->caption(), $ivf_semenanalysisreport_add->Concentration1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Total1->Required) { ?>
				elm = this.getElements("x" + infix + "_Total1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Total1->caption(), $ivf_semenanalysisreport_add->Total1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->ProgressiveMotility1->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->ProgressiveMotility1->caption(), $ivf_semenanalysisreport_add->ProgressiveMotility1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->NonProgrssiveMotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->NonProgrssiveMotile1->caption(), $ivf_semenanalysisreport_add->NonProgrssiveMotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Immotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Immotile1->caption(), $ivf_semenanalysisreport_add->Immotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->TotalProgrssiveMotile1->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->TotalProgrssiveMotile1->caption(), $ivf_semenanalysisreport_add->TotalProgrssiveMotile1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->TidNo->caption(), $ivf_semenanalysisreport_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_add->TidNo->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_add->Color->Required) { ?>
				elm = this.getElements("x" + infix + "_Color");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Color->caption(), $ivf_semenanalysisreport_add->Color->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->DoneBy->Required) { ?>
				elm = this.getElements("x" + infix + "_DoneBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->DoneBy->caption(), $ivf_semenanalysisreport_add->DoneBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Method->caption(), $ivf_semenanalysisreport_add->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Abstinence->Required) { ?>
				elm = this.getElements("x" + infix + "_Abstinence");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Abstinence->caption(), $ivf_semenanalysisreport_add->Abstinence->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->ProcessedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcessedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->ProcessedBy->caption(), $ivf_semenanalysisreport_add->ProcessedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->InseminationTime->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminationTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->InseminationTime->caption(), $ivf_semenanalysisreport_add->InseminationTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->InseminationBy->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminationBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->InseminationBy->caption(), $ivf_semenanalysisreport_add->InseminationBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Big->Required) { ?>
				elm = this.getElements("x" + infix + "_Big");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Big->caption(), $ivf_semenanalysisreport_add->Big->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Medium->Required) { ?>
				elm = this.getElements("x" + infix + "_Medium");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Medium->caption(), $ivf_semenanalysisreport_add->Medium->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Small->Required) { ?>
				elm = this.getElements("x" + infix + "_Small");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Small->caption(), $ivf_semenanalysisreport_add->Small->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->NoHalo->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHalo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->NoHalo->caption(), $ivf_semenanalysisreport_add->NoHalo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Fragmented->Required) { ?>
				elm = this.getElements("x" + infix + "_Fragmented");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Fragmented->caption(), $ivf_semenanalysisreport_add->Fragmented->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->NonFragmented->Required) { ?>
				elm = this.getElements("x" + infix + "_NonFragmented");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->NonFragmented->caption(), $ivf_semenanalysisreport_add->NonFragmented->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->DFI->Required) { ?>
				elm = this.getElements("x" + infix + "_DFI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->DFI->caption(), $ivf_semenanalysisreport_add->DFI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->IsueBy->Required) { ?>
				elm = this.getElements("x" + infix + "_IsueBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->IsueBy->caption(), $ivf_semenanalysisreport_add->IsueBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Volume2->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Volume2->caption(), $ivf_semenanalysisreport_add->Volume2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Concentration2->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Concentration2->caption(), $ivf_semenanalysisreport_add->Concentration2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Total2->Required) { ?>
				elm = this.getElements("x" + infix + "_Total2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Total2->caption(), $ivf_semenanalysisreport_add->Total2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->ProgressiveMotility2->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgressiveMotility2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->ProgressiveMotility2->caption(), $ivf_semenanalysisreport_add->ProgressiveMotility2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->NonProgrssiveMotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_NonProgrssiveMotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->NonProgrssiveMotile2->caption(), $ivf_semenanalysisreport_add->NonProgrssiveMotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->Immotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_Immotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->Immotile2->caption(), $ivf_semenanalysisreport_add->Immotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->TotalProgrssiveMotile2->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalProgrssiveMotile2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->TotalProgrssiveMotile2->caption(), $ivf_semenanalysisreport_add->TotalProgrssiveMotile2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->MACS->Required) { ?>
				elm = this.getElements("x" + infix + "_MACS[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->MACS->caption(), $ivf_semenanalysisreport_add->MACS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->IssuedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_IssuedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->IssuedBy->caption(), $ivf_semenanalysisreport_add->IssuedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->IssuedTo->Required) { ?>
				elm = this.getElements("x" + infix + "_IssuedTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->IssuedTo->caption(), $ivf_semenanalysisreport_add->IssuedTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->PaID->Required) { ?>
				elm = this.getElements("x" + infix + "_PaID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->PaID->caption(), $ivf_semenanalysisreport_add->PaID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->PaName->Required) { ?>
				elm = this.getElements("x" + infix + "_PaName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->PaName->caption(), $ivf_semenanalysisreport_add->PaName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->PaMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_PaMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->PaMobile->caption(), $ivf_semenanalysisreport_add->PaMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->PartnerID->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->PartnerID->caption(), $ivf_semenanalysisreport_add->PartnerID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->PartnerName->caption(), $ivf_semenanalysisreport_add->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->PartnerMobile->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerMobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->PartnerMobile->caption(), $ivf_semenanalysisreport_add->PartnerMobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->PREG_TEST_DATE->Required) { ?>
				elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->PREG_TEST_DATE->caption(), $ivf_semenanalysisreport_add->PREG_TEST_DATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_semenanalysisreport_add->PREG_TEST_DATE->errorMessage()) ?>");
			<?php if ($ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->Required) { ?>
				elm = this.getElements("x" + infix + "_SPECIFIC_PROBLEMS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->caption(), $ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->IMSC_1->Required) { ?>
				elm = this.getElements("x" + infix + "_IMSC_1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->IMSC_1->caption(), $ivf_semenanalysisreport_add->IMSC_1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->IMSC_2->Required) { ?>
				elm = this.getElements("x" + infix + "_IMSC_2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->IMSC_2->caption(), $ivf_semenanalysisreport_add->IMSC_2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->Required) { ?>
				elm = this.getElements("x" + infix + "_LIQUIFACTION_STORAGE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->caption(), $ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->IUI_PREP_METHOD->Required) { ?>
				elm = this.getElements("x" + infix + "_IUI_PREP_METHOD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->IUI_PREP_METHOD->caption(), $ivf_semenanalysisreport_add->IUI_PREP_METHOD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->Required) { ?>
				elm = this.getElements("x" + infix + "_TIME_FROM_TRIGGER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->caption(), $ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->Required) { ?>
				elm = this.getElements("x" + infix + "_COLLECTION_TO_PREPARATION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->caption(), $ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenanalysisreport_add->TIME_FROM_PREP_TO_INSEM->Required) { ?>
				elm = this.getElements("x" + infix + "_TIME_FROM_PREP_TO_INSEM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenanalysisreport_add->TIME_FROM_PREP_TO_INSEM->caption(), $ivf_semenanalysisreport_add->TIME_FROM_PREP_TO_INSEM->RequiredErrorMessage)) ?>");
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
	fivf_semenanalysisreportadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_semenanalysisreportadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_semenanalysisreportadd.lists["x_RequestSample"] = <?php echo $ivf_semenanalysisreport_add->RequestSample->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_RequestSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->RequestSample->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_CollectionType"] = <?php echo $ivf_semenanalysisreport_add->CollectionType->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_CollectionType"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->CollectionType->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_CollectionMethod"] = <?php echo $ivf_semenanalysisreport_add->CollectionMethod->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_CollectionMethod"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->CollectionMethod->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_Medicationused"] = <?php echo $ivf_semenanalysisreport_add->Medicationused->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_Medicationused"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->Medicationused->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_DifficultiesinCollection"] = <?php echo $ivf_semenanalysisreport_add->DifficultiesinCollection->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_DifficultiesinCollection"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->DifficultiesinCollection->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_Homogenosity"] = <?php echo $ivf_semenanalysisreport_add->Homogenosity->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_Homogenosity"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->Homogenosity->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_CompleteSample"] = <?php echo $ivf_semenanalysisreport_add->CompleteSample->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_CompleteSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->CompleteSample->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_SemenOrgin"] = <?php echo $ivf_semenanalysisreport_add->SemenOrgin->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_SemenOrgin"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->SemenOrgin->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_Donor"] = <?php echo $ivf_semenanalysisreport_add->Donor->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_Donor"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->Donor->lookupOptions()) ?>;
	fivf_semenanalysisreportadd.lists["x_MACS[]"] = <?php echo $ivf_semenanalysisreport_add->MACS->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_MACS[]"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->MACS->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_SPECIFIC_PROBLEMS"] = <?php echo $ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_SPECIFIC_PROBLEMS"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_LIQUIFACTION_STORAGE"] = <?php echo $ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_LIQUIFACTION_STORAGE"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_IUI_PREP_METHOD"] = <?php echo $ivf_semenanalysisreport_add->IUI_PREP_METHOD->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_IUI_PREP_METHOD"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->IUI_PREP_METHOD->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_TIME_FROM_TRIGGER"] = <?php echo $ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_TIME_FROM_TRIGGER"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->options(FALSE, TRUE)) ?>;
	fivf_semenanalysisreportadd.lists["x_COLLECTION_TO_PREPARATION"] = <?php echo $ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->Lookup->toClientList($ivf_semenanalysisreport_add) ?>;
	fivf_semenanalysisreportadd.lists["x_COLLECTION_TO_PREPARATION"].options = <?php echo JsonEncode($ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_semenanalysisreportadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_semenanalysisreport_add->showPageHeader(); ?>
<?php
$ivf_semenanalysisreport_add->showMessage();
?>
<form name="fivf_semenanalysisreportadd" id="fivf_semenanalysisreportadd" class="<?php echo $ivf_semenanalysisreport_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_semenanalysisreport_add->IsModal ?>">
<?php if ($ivf_semenanalysisreport->getCurrentMasterTable() == "view_ivf_treatment") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_ivf_treatment">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_add->TidNo->getSessionValue()) ?>">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_semenanalysisreport_add->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_semenanalysisreport_add->PatientName->getSessionValue()) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->getCurrentMasterTable() == "ivf_treatment_plan") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_semenanalysisreport_add->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_semenanalysisreport_add->PatientName->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_add->TidNo->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_semenanalysisreport_add->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_RIDNo" for="x_RIDNo" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_RIDNo" type="text/html"><?php echo $ivf_semenanalysisreport_add->RIDNo->caption() ?><?php echo $ivf_semenanalysisreport_add->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->RIDNo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport_add->RIDNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_semenanalysisreport_RIDNo" type="text/html"><span id="el_ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport_add->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_add->RIDNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_RIDNo" name="x_RIDNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_add->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_semenanalysisreport_RIDNo" type="text/html"><span id="el_ivf_semenanalysisreport_RIDNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->RIDNo->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->RIDNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_semenanalysisreport_add->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PatientName" for="x_PatientName" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PatientName" type="text/html"><?php echo $ivf_semenanalysisreport_add->PatientName->caption() ?><?php echo $ivf_semenanalysisreport_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->PatientName->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport_add->PatientName->getSessionValue() != "") { ?>
<script id="tpx_ivf_semenanalysisreport_PatientName" type="text/html"><span id="el_ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport_add->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_add->PatientName->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_PatientName" name="x_PatientName" value="<?php echo HtmlEncode($ivf_semenanalysisreport_add->PatientName->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_semenanalysisreport_PatientName" type="text/html"><span id="el_ivf_semenanalysisreport_PatientName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->PatientName->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->PatientName->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_semenanalysisreport_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->HusbandName->Visible) { // HusbandName ?>
	<div id="r_HusbandName" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_HusbandName" for="x_HusbandName" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_HusbandName" type="text/html"><?php echo $ivf_semenanalysisreport_add->HusbandName->caption() ?><?php echo $ivf_semenanalysisreport_add->HusbandName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->HusbandName->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_HusbandName" type="text/html"><span id="el_ivf_semenanalysisreport_HusbandName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x_HusbandName" id="x_HusbandName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->HusbandName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->HusbandName->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->HusbandName->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->HusbandName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->RequestDr->Visible) { // RequestDr ?>
	<div id="r_RequestDr" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_RequestDr" for="x_RequestDr" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_RequestDr" type="text/html"><?php echo $ivf_semenanalysisreport_add->RequestDr->caption() ?><?php echo $ivf_semenanalysisreport_add->RequestDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->RequestDr->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_RequestDr" type="text/html"><span id="el_ivf_semenanalysisreport_RequestDr">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x_RequestDr" id="x_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->RequestDr->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->RequestDr->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->RequestDr->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->RequestDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->CollectionDate->Visible) { // CollectionDate ?>
	<div id="r_CollectionDate" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_CollectionDate" for="x_CollectionDate" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_CollectionDate" type="text/html"><?php echo $ivf_semenanalysisreport_add->CollectionDate->caption() ?><?php echo $ivf_semenanalysisreport_add->CollectionDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->CollectionDate->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CollectionDate" type="text/html"><span id="el_ivf_semenanalysisreport_CollectionDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x_CollectionDate" id="x_CollectionDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->CollectionDate->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->CollectionDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_add->CollectionDate->ReadOnly && !$ivf_semenanalysisreport_add->CollectionDate->Disabled && !isset($ivf_semenanalysisreport_add->CollectionDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_add->CollectionDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_semenanalysisreportadd_js">
loadjs.ready(["fivf_semenanalysisreportadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportadd", "x_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_semenanalysisreport_add->CollectionDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ResultDate" for="x_ResultDate" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ResultDate" type="text/html"><?php echo $ivf_semenanalysisreport_add->ResultDate->caption() ?><?php echo $ivf_semenanalysisreport_add->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->ResultDate->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ResultDate" type="text/html"><span id="el_ivf_semenanalysisreport_ResultDate">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->ResultDate->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->ResultDate->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_add->ResultDate->ReadOnly && !$ivf_semenanalysisreport_add->ResultDate->Disabled && !isset($ivf_semenanalysisreport_add->ResultDate->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_add->ResultDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_semenanalysisreportadd_js">
loadjs.ready(["fivf_semenanalysisreportadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportadd", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_semenanalysisreport_add->ResultDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->RequestSample->Visible) { // RequestSample ?>
	<div id="r_RequestSample" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_RequestSample" for="x_RequestSample" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_RequestSample" type="text/html"><?php echo $ivf_semenanalysisreport_add->RequestSample->caption() ?><?php echo $ivf_semenanalysisreport_add->RequestSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->RequestSample->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_RequestSample" type="text/html"><span id="el_ivf_semenanalysisreport_RequestSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-value-separator="<?php echo $ivf_semenanalysisreport_add->RequestSample->displayValueSeparatorAttribute() ?>" id="x_RequestSample" name="x_RequestSample"<?php echo $ivf_semenanalysisreport_add->RequestSample->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->RequestSample->selectOptionListHtml("x_RequestSample") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->RequestSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->CollectionType->Visible) { // CollectionType ?>
	<div id="r_CollectionType" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_CollectionType" for="x_CollectionType" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_CollectionType" type="text/html"><?php echo $ivf_semenanalysisreport_add->CollectionType->caption() ?><?php echo $ivf_semenanalysisreport_add->CollectionType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->CollectionType->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CollectionType" type="text/html"><span id="el_ivf_semenanalysisreport_CollectionType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-value-separator="<?php echo $ivf_semenanalysisreport_add->CollectionType->displayValueSeparatorAttribute() ?>" id="x_CollectionType" name="x_CollectionType"<?php echo $ivf_semenanalysisreport_add->CollectionType->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->CollectionType->selectOptionListHtml("x_CollectionType") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->CollectionType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->CollectionMethod->Visible) { // CollectionMethod ?>
	<div id="r_CollectionMethod" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_CollectionMethod" for="x_CollectionMethod" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_CollectionMethod" type="text/html"><?php echo $ivf_semenanalysisreport_add->CollectionMethod->caption() ?><?php echo $ivf_semenanalysisreport_add->CollectionMethod->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->CollectionMethod->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CollectionMethod" type="text/html"><span id="el_ivf_semenanalysisreport_CollectionMethod">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-value-separator="<?php echo $ivf_semenanalysisreport_add->CollectionMethod->displayValueSeparatorAttribute() ?>" id="x_CollectionMethod" name="x_CollectionMethod"<?php echo $ivf_semenanalysisreport_add->CollectionMethod->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->CollectionMethod->selectOptionListHtml("x_CollectionMethod") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->CollectionMethod->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Medicationused->Visible) { // Medicationused ?>
	<div id="r_Medicationused" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Medicationused" for="x_Medicationused" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Medicationused" type="text/html"><?php echo $ivf_semenanalysisreport_add->Medicationused->caption() ?><?php echo $ivf_semenanalysisreport_add->Medicationused->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Medicationused->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Medicationused" type="text/html"><span id="el_ivf_semenanalysisreport_Medicationused">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-value-separator="<?php echo $ivf_semenanalysisreport_add->Medicationused->displayValueSeparatorAttribute() ?>" id="x_Medicationused" name="x_Medicationused"<?php echo $ivf_semenanalysisreport_add->Medicationused->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->Medicationused->selectOptionListHtml("x_Medicationused") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Medicationused->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<div id="r_DifficultiesinCollection" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_DifficultiesinCollection" for="x_DifficultiesinCollection" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_DifficultiesinCollection" type="text/html"><?php echo $ivf_semenanalysisreport_add->DifficultiesinCollection->caption() ?><?php echo $ivf_semenanalysisreport_add->DifficultiesinCollection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->DifficultiesinCollection->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DifficultiesinCollection" type="text/html"><span id="el_ivf_semenanalysisreport_DifficultiesinCollection">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-value-separator="<?php echo $ivf_semenanalysisreport_add->DifficultiesinCollection->displayValueSeparatorAttribute() ?>" id="x_DifficultiesinCollection" name="x_DifficultiesinCollection"<?php echo $ivf_semenanalysisreport_add->DifficultiesinCollection->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->DifficultiesinCollection->selectOptionListHtml("x_DifficultiesinCollection") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->DifficultiesinCollection->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->pH->Visible) { // pH ?>
	<div id="r_pH" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_pH" for="x_pH" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_pH" type="text/html"><?php echo $ivf_semenanalysisreport_add->pH->caption() ?><?php echo $ivf_semenanalysisreport_add->pH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->pH->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_pH" type="text/html"><span id="el_ivf_semenanalysisreport_pH">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x_pH" id="x_pH" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->pH->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->pH->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->pH->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->pH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Timeofcollection->Visible) { // Timeofcollection ?>
	<div id="r_Timeofcollection" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Timeofcollection" for="x_Timeofcollection" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Timeofcollection" type="text/html"><?php echo $ivf_semenanalysisreport_add->Timeofcollection->caption() ?><?php echo $ivf_semenanalysisreport_add->Timeofcollection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Timeofcollection->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Timeofcollection" type="text/html"><span id="el_ivf_semenanalysisreport_Timeofcollection">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x_Timeofcollection" id="x_Timeofcollection" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Timeofcollection->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Timeofcollection->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Timeofcollection->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_add->Timeofcollection->ReadOnly && !$ivf_semenanalysisreport_add->Timeofcollection->Disabled && !isset($ivf_semenanalysisreport_add->Timeofcollection->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_add->Timeofcollection->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_semenanalysisreportadd_js">
loadjs.ready(["fivf_semenanalysisreportadd", "timepicker"], function() {
	ew.createTimePicker("fivf_semenanalysisreportadd", "x_Timeofcollection", {"timeFormat":"h:i A","step":15});
});
</script>
<?php echo $ivf_semenanalysisreport_add->Timeofcollection->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Timeofexamination->Visible) { // Timeofexamination ?>
	<div id="r_Timeofexamination" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Timeofexamination" for="x_Timeofexamination" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Timeofexamination" type="text/html"><?php echo $ivf_semenanalysisreport_add->Timeofexamination->caption() ?><?php echo $ivf_semenanalysisreport_add->Timeofexamination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Timeofexamination->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Timeofexamination" type="text/html"><span id="el_ivf_semenanalysisreport_Timeofexamination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x_Timeofexamination" id="x_Timeofexamination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Timeofexamination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Timeofexamination->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Timeofexamination->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_add->Timeofexamination->ReadOnly && !$ivf_semenanalysisreport_add->Timeofexamination->Disabled && !isset($ivf_semenanalysisreport_add->Timeofexamination->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_add->Timeofexamination->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_semenanalysisreportadd_js">
loadjs.ready(["fivf_semenanalysisreportadd", "timepicker"], function() {
	ew.createTimePicker("fivf_semenanalysisreportadd", "x_Timeofexamination", {"timeFormat":"h:i A","step":15});
});
</script>
<?php echo $ivf_semenanalysisreport_add->Timeofexamination->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Volume->Visible) { // Volume ?>
	<div id="r_Volume" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Volume" for="x_Volume" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Volume" type="text/html"><?php echo $ivf_semenanalysisreport_add->Volume->caption() ?><?php echo $ivf_semenanalysisreport_add->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Volume->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Volume" type="text/html"><span id="el_ivf_semenanalysisreport_Volume">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x_Volume" id="x_Volume" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Volume->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Volume->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Volume->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Concentration->Visible) { // Concentration ?>
	<div id="r_Concentration" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Concentration" for="x_Concentration" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Concentration" type="text/html"><?php echo $ivf_semenanalysisreport_add->Concentration->caption() ?><?php echo $ivf_semenanalysisreport_add->Concentration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Concentration->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Concentration" type="text/html"><span id="el_ivf_semenanalysisreport_Concentration">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x_Concentration" id="x_Concentration" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Concentration->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Concentration->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Concentration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Total->Visible) { // Total ?>
	<div id="r_Total" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Total" for="x_Total" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Total" type="text/html"><?php echo $ivf_semenanalysisreport_add->Total->caption() ?><?php echo $ivf_semenanalysisreport_add->Total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Total->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Total" type="text/html"><span id="el_ivf_semenanalysisreport_Total">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x_Total" id="x_Total" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Total->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Total->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Total->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<div id="r_ProgressiveMotility" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ProgressiveMotility" for="x_ProgressiveMotility" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ProgressiveMotility" type="text/html"><?php echo $ivf_semenanalysisreport_add->ProgressiveMotility->caption() ?><?php echo $ivf_semenanalysisreport_add->ProgressiveMotility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->ProgressiveMotility->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProgressiveMotility" type="text/html"><span id="el_ivf_semenanalysisreport_ProgressiveMotility">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x_ProgressiveMotility" id="x_ProgressiveMotility" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->ProgressiveMotility->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->ProgressiveMotility->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->ProgressiveMotility->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->ProgressiveMotility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<div id="r_NonProgrssiveMotile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" for="x_NonProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile" type="text/html"><?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile->caption() ?><?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile" type="text/html"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x_NonProgrssiveMotile" id="x_NonProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Immotile->Visible) { // Immotile ?>
	<div id="r_Immotile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Immotile" for="x_Immotile" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Immotile" type="text/html"><?php echo $ivf_semenanalysisreport_add->Immotile->caption() ?><?php echo $ivf_semenanalysisreport_add->Immotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Immotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Immotile" type="text/html"><span id="el_ivf_semenanalysisreport_Immotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x_Immotile" id="x_Immotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Immotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Immotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Immotile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Immotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<div id="r_TotalProgrssiveMotile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" for="x_TotalProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile" type="text/html"><?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile->caption() ?><?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile" type="text/html"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x_TotalProgrssiveMotile" id="x_TotalProgrssiveMotile" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Appearance->Visible) { // Appearance ?>
	<div id="r_Appearance" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Appearance" for="x_Appearance" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Appearance" type="text/html"><?php echo $ivf_semenanalysisreport_add->Appearance->caption() ?><?php echo $ivf_semenanalysisreport_add->Appearance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Appearance->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Appearance" type="text/html"><span id="el_ivf_semenanalysisreport_Appearance">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x_Appearance" id="x_Appearance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Appearance->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Appearance->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Appearance->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Appearance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Homogenosity->Visible) { // Homogenosity ?>
	<div id="r_Homogenosity" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Homogenosity" for="x_Homogenosity" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Homogenosity" type="text/html"><?php echo $ivf_semenanalysisreport_add->Homogenosity->caption() ?><?php echo $ivf_semenanalysisreport_add->Homogenosity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Homogenosity->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Homogenosity" type="text/html"><span id="el_ivf_semenanalysisreport_Homogenosity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-value-separator="<?php echo $ivf_semenanalysisreport_add->Homogenosity->displayValueSeparatorAttribute() ?>" id="x_Homogenosity" name="x_Homogenosity"<?php echo $ivf_semenanalysisreport_add->Homogenosity->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->Homogenosity->selectOptionListHtml("x_Homogenosity") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Homogenosity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->CompleteSample->Visible) { // CompleteSample ?>
	<div id="r_CompleteSample" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_CompleteSample" for="x_CompleteSample" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_CompleteSample" type="text/html"><?php echo $ivf_semenanalysisreport_add->CompleteSample->caption() ?><?php echo $ivf_semenanalysisreport_add->CompleteSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->CompleteSample->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_CompleteSample" type="text/html"><span id="el_ivf_semenanalysisreport_CompleteSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-value-separator="<?php echo $ivf_semenanalysisreport_add->CompleteSample->displayValueSeparatorAttribute() ?>" id="x_CompleteSample" name="x_CompleteSample"<?php echo $ivf_semenanalysisreport_add->CompleteSample->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->CompleteSample->selectOptionListHtml("x_CompleteSample") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->CompleteSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<div id="r_Liquefactiontime" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Liquefactiontime" for="x_Liquefactiontime" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Liquefactiontime" type="text/html"><?php echo $ivf_semenanalysisreport_add->Liquefactiontime->caption() ?><?php echo $ivf_semenanalysisreport_add->Liquefactiontime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Liquefactiontime->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Liquefactiontime" type="text/html"><span id="el_ivf_semenanalysisreport_Liquefactiontime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x_Liquefactiontime" id="x_Liquefactiontime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Liquefactiontime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Liquefactiontime->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Liquefactiontime->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Liquefactiontime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Normal->Visible) { // Normal ?>
	<div id="r_Normal" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Normal" for="x_Normal" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Normal" type="text/html"><?php echo $ivf_semenanalysisreport_add->Normal->caption() ?><?php echo $ivf_semenanalysisreport_add->Normal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Normal->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Normal" type="text/html"><span id="el_ivf_semenanalysisreport_Normal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x_Normal" id="x_Normal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Normal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Normal->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Normal->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Normal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Abnormal" for="x_Abnormal" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Abnormal" type="text/html"><?php echo $ivf_semenanalysisreport_add->Abnormal->caption() ?><?php echo $ivf_semenanalysisreport_add->Abnormal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Abnormal->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Abnormal" type="text/html"><span id="el_ivf_semenanalysisreport_Abnormal">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Abnormal->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Abnormal->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Abnormal->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Abnormal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Headdefects->Visible) { // Headdefects ?>
	<div id="r_Headdefects" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Headdefects" for="x_Headdefects" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Headdefects" type="text/html"><?php echo $ivf_semenanalysisreport_add->Headdefects->caption() ?><?php echo $ivf_semenanalysisreport_add->Headdefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Headdefects->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Headdefects" type="text/html"><span id="el_ivf_semenanalysisreport_Headdefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x_Headdefects" id="x_Headdefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Headdefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Headdefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Headdefects->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Headdefects->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<div id="r_MidpieceDefects" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_MidpieceDefects" for="x_MidpieceDefects" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_MidpieceDefects" type="text/html"><?php echo $ivf_semenanalysisreport_add->MidpieceDefects->caption() ?><?php echo $ivf_semenanalysisreport_add->MidpieceDefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->MidpieceDefects->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_MidpieceDefects" type="text/html"><span id="el_ivf_semenanalysisreport_MidpieceDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x_MidpieceDefects" id="x_MidpieceDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->MidpieceDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->MidpieceDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->MidpieceDefects->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->MidpieceDefects->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->TailDefects->Visible) { // TailDefects ?>
	<div id="r_TailDefects" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TailDefects" for="x_TailDefects" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TailDefects" type="text/html"><?php echo $ivf_semenanalysisreport_add->TailDefects->caption() ?><?php echo $ivf_semenanalysisreport_add->TailDefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->TailDefects->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TailDefects" type="text/html"><span id="el_ivf_semenanalysisreport_TailDefects">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x_TailDefects" id="x_TailDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->TailDefects->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->TailDefects->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->TailDefects->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->TailDefects->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<div id="r_NormalProgMotile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NormalProgMotile" for="x_NormalProgMotile" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NormalProgMotile" type="text/html"><?php echo $ivf_semenanalysisreport_add->NormalProgMotile->caption() ?><?php echo $ivf_semenanalysisreport_add->NormalProgMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->NormalProgMotile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NormalProgMotile" type="text/html"><span id="el_ivf_semenanalysisreport_NormalProgMotile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x_NormalProgMotile" id="x_NormalProgMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->NormalProgMotile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->NormalProgMotile->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->NormalProgMotile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->NormalProgMotile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->ImmatureForms->Visible) { // ImmatureForms ?>
	<div id="r_ImmatureForms" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ImmatureForms" for="x_ImmatureForms" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ImmatureForms" type="text/html"><?php echo $ivf_semenanalysisreport_add->ImmatureForms->caption() ?><?php echo $ivf_semenanalysisreport_add->ImmatureForms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->ImmatureForms->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ImmatureForms" type="text/html"><span id="el_ivf_semenanalysisreport_ImmatureForms">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x_ImmatureForms" id="x_ImmatureForms" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->ImmatureForms->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->ImmatureForms->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->ImmatureForms->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->ImmatureForms->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Leucocytes->Visible) { // Leucocytes ?>
	<div id="r_Leucocytes" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Leucocytes" for="x_Leucocytes" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Leucocytes" type="text/html"><?php echo $ivf_semenanalysisreport_add->Leucocytes->caption() ?><?php echo $ivf_semenanalysisreport_add->Leucocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Leucocytes->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Leucocytes" type="text/html"><span id="el_ivf_semenanalysisreport_Leucocytes">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x_Leucocytes" id="x_Leucocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Leucocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Leucocytes->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Leucocytes->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Leucocytes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Agglutination->Visible) { // Agglutination ?>
	<div id="r_Agglutination" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Agglutination" for="x_Agglutination" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Agglutination" type="text/html"><?php echo $ivf_semenanalysisreport_add->Agglutination->caption() ?><?php echo $ivf_semenanalysisreport_add->Agglutination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Agglutination->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Agglutination" type="text/html"><span id="el_ivf_semenanalysisreport_Agglutination">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x_Agglutination" id="x_Agglutination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Agglutination->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Agglutination->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Agglutination->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Agglutination->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Debris->Visible) { // Debris ?>
	<div id="r_Debris" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Debris" for="x_Debris" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Debris" type="text/html"><?php echo $ivf_semenanalysisreport_add->Debris->caption() ?><?php echo $ivf_semenanalysisreport_add->Debris->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Debris->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Debris" type="text/html"><span id="el_ivf_semenanalysisreport_Debris">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x_Debris" id="x_Debris" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Debris->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Debris->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Debris->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Debris->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Diagnosis->Visible) { // Diagnosis ?>
	<div id="r_Diagnosis" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Diagnosis" for="x_Diagnosis" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Diagnosis" type="text/html"><?php echo $ivf_semenanalysisreport_add->Diagnosis->caption() ?><?php echo $ivf_semenanalysisreport_add->Diagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Diagnosis->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Diagnosis" type="text/html"><span id="el_ivf_semenanalysisreport_Diagnosis">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x_Diagnosis" id="x_Diagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Diagnosis->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport_add->Diagnosis->editAttributes() ?>><?php echo $ivf_semenanalysisreport_add->Diagnosis->EditValue ?></textarea>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Diagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Observations->Visible) { // Observations ?>
	<div id="r_Observations" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Observations" for="x_Observations" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Observations" type="text/html"><?php echo $ivf_semenanalysisreport_add->Observations->caption() ?><?php echo $ivf_semenanalysisreport_add->Observations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Observations->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Observations" type="text/html"><span id="el_ivf_semenanalysisreport_Observations">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x_Observations" id="x_Observations" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Observations->getPlaceHolder()) ?>"<?php echo $ivf_semenanalysisreport_add->Observations->editAttributes() ?>><?php echo $ivf_semenanalysisreport_add->Observations->EditValue ?></textarea>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Observations->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Signature->Visible) { // Signature ?>
	<div id="r_Signature" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Signature" for="x_Signature" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Signature" type="text/html"><?php echo $ivf_semenanalysisreport_add->Signature->caption() ?><?php echo $ivf_semenanalysisreport_add->Signature->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Signature->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Signature" type="text/html"><span id="el_ivf_semenanalysisreport_Signature">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x_Signature" id="x_Signature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Signature->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Signature->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Signature->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Signature->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->SemenOrgin->Visible) { // SemenOrgin ?>
	<div id="r_SemenOrgin" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_SemenOrgin" for="x_SemenOrgin" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_SemenOrgin" type="text/html"><?php echo $ivf_semenanalysisreport_add->SemenOrgin->caption() ?><?php echo $ivf_semenanalysisreport_add->SemenOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->SemenOrgin->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_SemenOrgin" type="text/html"><span id="el_ivf_semenanalysisreport_SemenOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-value-separator="<?php echo $ivf_semenanalysisreport_add->SemenOrgin->displayValueSeparatorAttribute() ?>" id="x_SemenOrgin" name="x_SemenOrgin"<?php echo $ivf_semenanalysisreport_add->SemenOrgin->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->SemenOrgin->selectOptionListHtml("x_SemenOrgin") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->SemenOrgin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Donor->Visible) { // Donor ?>
	<div id="r_Donor" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Donor" for="x_Donor" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Donor" type="text/html"><?php echo $ivf_semenanalysisreport_add->Donor->caption() ?><?php echo $ivf_semenanalysisreport_add->Donor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Donor->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Donor" type="text/html"><span id="el_ivf_semenanalysisreport_Donor">
<?php $ivf_semenanalysisreport_add->Donor->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Donor"><?php echo EmptyValue(strval($ivf_semenanalysisreport_add->Donor->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_semenanalysisreport_add->Donor->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_semenanalysisreport_add->Donor->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_semenanalysisreport_add->Donor->ReadOnly || $ivf_semenanalysisreport_add->Donor->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Donor',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_semenanalysisreport_add->Donor->Lookup->getParamTag($ivf_semenanalysisreport_add, "p_x_Donor") ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_semenanalysisreport_add->Donor->displayValueSeparatorAttribute() ?>" name="x_Donor" id="x_Donor" value="<?php echo $ivf_semenanalysisreport_add->Donor->CurrentValue ?>"<?php echo $ivf_semenanalysisreport_add->Donor->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Donor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<div id="r_DonorBloodgroup" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_DonorBloodgroup" for="x_DonorBloodgroup" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_DonorBloodgroup" type="text/html"><?php echo $ivf_semenanalysisreport_add->DonorBloodgroup->caption() ?><?php echo $ivf_semenanalysisreport_add->DonorBloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->DonorBloodgroup->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DonorBloodgroup" type="text/html"><span id="el_ivf_semenanalysisreport_DonorBloodgroup">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x_DonorBloodgroup" id="x_DonorBloodgroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->DonorBloodgroup->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->DonorBloodgroup->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->DonorBloodgroup->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->DonorBloodgroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Tank->Visible) { // Tank ?>
	<div id="r_Tank" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Tank" for="x_Tank" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Tank" type="text/html"><?php echo $ivf_semenanalysisreport_add->Tank->caption() ?><?php echo $ivf_semenanalysisreport_add->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Tank->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Tank" type="text/html"><span id="el_ivf_semenanalysisreport_Tank">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x_Tank" id="x_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Tank->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Tank->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Tank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Location->Visible) { // Location ?>
	<div id="r_Location" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Location" for="x_Location" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Location" type="text/html"><?php echo $ivf_semenanalysisreport_add->Location->caption() ?><?php echo $ivf_semenanalysisreport_add->Location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Location->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Location" type="text/html"><span id="el_ivf_semenanalysisreport_Location">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x_Location" id="x_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Location->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Location->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Location->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Location->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Volume1->Visible) { // Volume1 ?>
	<div id="r_Volume1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Volume1" for="x_Volume1" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Volume1" type="text/html"><?php echo $ivf_semenanalysisreport_add->Volume1->caption() ?><?php echo $ivf_semenanalysisreport_add->Volume1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Volume1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Volume1" type="text/html"><span id="el_ivf_semenanalysisreport_Volume1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x_Volume1" id="x_Volume1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Volume1->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Volume1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Volume1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Concentration1->Visible) { // Concentration1 ?>
	<div id="r_Concentration1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Concentration1" for="x_Concentration1" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Concentration1" type="text/html"><?php echo $ivf_semenanalysisreport_add->Concentration1->caption() ?><?php echo $ivf_semenanalysisreport_add->Concentration1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Concentration1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Concentration1" type="text/html"><span id="el_ivf_semenanalysisreport_Concentration1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x_Concentration1" id="x_Concentration1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Concentration1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Concentration1->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Concentration1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Concentration1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Total1->Visible) { // Total1 ?>
	<div id="r_Total1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Total1" for="x_Total1" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Total1" type="text/html"><?php echo $ivf_semenanalysisreport_add->Total1->caption() ?><?php echo $ivf_semenanalysisreport_add->Total1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Total1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Total1" type="text/html"><span id="el_ivf_semenanalysisreport_Total1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x_Total1" id="x_Total1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Total1->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Total1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Total1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<div id="r_ProgressiveMotility1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ProgressiveMotility1" for="x_ProgressiveMotility1" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ProgressiveMotility1" type="text/html"><?php echo $ivf_semenanalysisreport_add->ProgressiveMotility1->caption() ?><?php echo $ivf_semenanalysisreport_add->ProgressiveMotility1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->ProgressiveMotility1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProgressiveMotility1" type="text/html"><span id="el_ivf_semenanalysisreport_ProgressiveMotility1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x_ProgressiveMotility1" id="x_ProgressiveMotility1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->ProgressiveMotility1->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->ProgressiveMotility1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->ProgressiveMotility1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<div id="r_NonProgrssiveMotile1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" for="x_NonProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile1" type="text/html"><?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile1->caption() ?><?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile1" type="text/html"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x_NonProgrssiveMotile1" id="x_NonProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Immotile1->Visible) { // Immotile1 ?>
	<div id="r_Immotile1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Immotile1" for="x_Immotile1" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Immotile1" type="text/html"><?php echo $ivf_semenanalysisreport_add->Immotile1->caption() ?><?php echo $ivf_semenanalysisreport_add->Immotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Immotile1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Immotile1" type="text/html"><span id="el_ivf_semenanalysisreport_Immotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x_Immotile1" id="x_Immotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Immotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Immotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Immotile1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Immotile1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<div id="r_TotalProgrssiveMotile1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" for="x_TotalProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile1" type="text/html"><?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile1->caption() ?><?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile1" type="text/html"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x_TotalProgrssiveMotile1" id="x_TotalProgrssiveMotile1" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile1->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TidNo" for="x_TidNo" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TidNo" type="text/html"><?php echo $ivf_semenanalysisreport_add->TidNo->caption() ?><?php echo $ivf_semenanalysisreport_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->TidNo->cellAttributes() ?>>
<?php if ($ivf_semenanalysisreport_add->TidNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_semenanalysisreport_TidNo" type="text/html"><span id="el_ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport_add->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenanalysisreport_add->TidNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?php echo HtmlEncode($ivf_semenanalysisreport_add->TidNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_semenanalysisreport_TidNo" type="text/html"><span id="el_ivf_semenanalysisreport_TidNo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->TidNo->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->TidNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_semenanalysisreport_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Color->Visible) { // Color ?>
	<div id="r_Color" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Color" for="x_Color" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Color" type="text/html"><?php echo $ivf_semenanalysisreport_add->Color->caption() ?><?php echo $ivf_semenanalysisreport_add->Color->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Color->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Color" type="text/html"><span id="el_ivf_semenanalysisreport_Color">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x_Color" id="x_Color" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Color->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Color->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Color->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Color->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->DoneBy->Visible) { // DoneBy ?>
	<div id="r_DoneBy" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_DoneBy" for="x_DoneBy" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_DoneBy" type="text/html"><?php echo $ivf_semenanalysisreport_add->DoneBy->caption() ?><?php echo $ivf_semenanalysisreport_add->DoneBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->DoneBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DoneBy" type="text/html"><span id="el_ivf_semenanalysisreport_DoneBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x_DoneBy" id="x_DoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->DoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->DoneBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->DoneBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->DoneBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Method" for="x_Method" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Method" type="text/html"><?php echo $ivf_semenanalysisreport_add->Method->caption() ?><?php echo $ivf_semenanalysisreport_add->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Method->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Method" type="text/html"><span id="el_ivf_semenanalysisreport_Method">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Method->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Method->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Method->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Abstinence->Visible) { // Abstinence ?>
	<div id="r_Abstinence" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Abstinence" for="x_Abstinence" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Abstinence" type="text/html"><?php echo $ivf_semenanalysisreport_add->Abstinence->caption() ?><?php echo $ivf_semenanalysisreport_add->Abstinence->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Abstinence->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Abstinence" type="text/html"><span id="el_ivf_semenanalysisreport_Abstinence">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x_Abstinence" id="x_Abstinence" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Abstinence->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Abstinence->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Abstinence->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Abstinence->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->ProcessedBy->Visible) { // ProcessedBy ?>
	<div id="r_ProcessedBy" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ProcessedBy" for="x_ProcessedBy" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ProcessedBy" type="text/html"><?php echo $ivf_semenanalysisreport_add->ProcessedBy->caption() ?><?php echo $ivf_semenanalysisreport_add->ProcessedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->ProcessedBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProcessedBy" type="text/html"><span id="el_ivf_semenanalysisreport_ProcessedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x_ProcessedBy" id="x_ProcessedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->ProcessedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->ProcessedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->ProcessedBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->ProcessedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->InseminationTime->Visible) { // InseminationTime ?>
	<div id="r_InseminationTime" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_InseminationTime" for="x_InseminationTime" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_InseminationTime" type="text/html"><?php echo $ivf_semenanalysisreport_add->InseminationTime->caption() ?><?php echo $ivf_semenanalysisreport_add->InseminationTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->InseminationTime->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_InseminationTime" type="text/html"><span id="el_ivf_semenanalysisreport_InseminationTime">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x_InseminationTime" id="x_InseminationTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->InseminationTime->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->InseminationTime->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->InseminationTime->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->InseminationTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->InseminationBy->Visible) { // InseminationBy ?>
	<div id="r_InseminationBy" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_InseminationBy" for="x_InseminationBy" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_InseminationBy" type="text/html"><?php echo $ivf_semenanalysisreport_add->InseminationBy->caption() ?><?php echo $ivf_semenanalysisreport_add->InseminationBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->InseminationBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_InseminationBy" type="text/html"><span id="el_ivf_semenanalysisreport_InseminationBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x_InseminationBy" id="x_InseminationBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->InseminationBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->InseminationBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->InseminationBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->InseminationBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Big->Visible) { // Big ?>
	<div id="r_Big" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Big" for="x_Big" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Big" type="text/html"><?php echo $ivf_semenanalysisreport_add->Big->caption() ?><?php echo $ivf_semenanalysisreport_add->Big->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Big->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Big" type="text/html"><span id="el_ivf_semenanalysisreport_Big">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x_Big" id="x_Big" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Big->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Big->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Big->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Big->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Medium->Visible) { // Medium ?>
	<div id="r_Medium" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Medium" for="x_Medium" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Medium" type="text/html"><?php echo $ivf_semenanalysisreport_add->Medium->caption() ?><?php echo $ivf_semenanalysisreport_add->Medium->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Medium->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Medium" type="text/html"><span id="el_ivf_semenanalysisreport_Medium">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x_Medium" id="x_Medium" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Medium->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Medium->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Medium->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Medium->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Small->Visible) { // Small ?>
	<div id="r_Small" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Small" for="x_Small" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Small" type="text/html"><?php echo $ivf_semenanalysisreport_add->Small->caption() ?><?php echo $ivf_semenanalysisreport_add->Small->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Small->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Small" type="text/html"><span id="el_ivf_semenanalysisreport_Small">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x_Small" id="x_Small" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Small->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Small->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Small->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Small->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->NoHalo->Visible) { // NoHalo ?>
	<div id="r_NoHalo" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NoHalo" for="x_NoHalo" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NoHalo" type="text/html"><?php echo $ivf_semenanalysisreport_add->NoHalo->caption() ?><?php echo $ivf_semenanalysisreport_add->NoHalo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->NoHalo->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NoHalo" type="text/html"><span id="el_ivf_semenanalysisreport_NoHalo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x_NoHalo" id="x_NoHalo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->NoHalo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->NoHalo->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->NoHalo->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->NoHalo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Fragmented->Visible) { // Fragmented ?>
	<div id="r_Fragmented" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Fragmented" for="x_Fragmented" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Fragmented" type="text/html"><?php echo $ivf_semenanalysisreport_add->Fragmented->caption() ?><?php echo $ivf_semenanalysisreport_add->Fragmented->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Fragmented->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Fragmented" type="text/html"><span id="el_ivf_semenanalysisreport_Fragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x_Fragmented" id="x_Fragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Fragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Fragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Fragmented->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Fragmented->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->NonFragmented->Visible) { // NonFragmented ?>
	<div id="r_NonFragmented" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NonFragmented" for="x_NonFragmented" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NonFragmented" type="text/html"><?php echo $ivf_semenanalysisreport_add->NonFragmented->caption() ?><?php echo $ivf_semenanalysisreport_add->NonFragmented->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->NonFragmented->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonFragmented" type="text/html"><span id="el_ivf_semenanalysisreport_NonFragmented">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x_NonFragmented" id="x_NonFragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->NonFragmented->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->NonFragmented->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->NonFragmented->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->NonFragmented->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->DFI->Visible) { // DFI ?>
	<div id="r_DFI" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_DFI" for="x_DFI" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_DFI" type="text/html"><?php echo $ivf_semenanalysisreport_add->DFI->caption() ?><?php echo $ivf_semenanalysisreport_add->DFI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->DFI->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_DFI" type="text/html"><span id="el_ivf_semenanalysisreport_DFI">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x_DFI" id="x_DFI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->DFI->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->DFI->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->DFI->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->DFI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->IsueBy->Visible) { // IsueBy ?>
	<div id="r_IsueBy" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IsueBy" for="x_IsueBy" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IsueBy" type="text/html"><?php echo $ivf_semenanalysisreport_add->IsueBy->caption() ?><?php echo $ivf_semenanalysisreport_add->IsueBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->IsueBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IsueBy" type="text/html"><span id="el_ivf_semenanalysisreport_IsueBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x_IsueBy" id="x_IsueBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->IsueBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->IsueBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->IsueBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->IsueBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Volume2->Visible) { // Volume2 ?>
	<div id="r_Volume2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Volume2" for="x_Volume2" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Volume2" type="text/html"><?php echo $ivf_semenanalysisreport_add->Volume2->caption() ?><?php echo $ivf_semenanalysisreport_add->Volume2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Volume2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Volume2" type="text/html"><span id="el_ivf_semenanalysisreport_Volume2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x_Volume2" id="x_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Volume2->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Volume2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Volume2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Concentration2->Visible) { // Concentration2 ?>
	<div id="r_Concentration2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Concentration2" for="x_Concentration2" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Concentration2" type="text/html"><?php echo $ivf_semenanalysisreport_add->Concentration2->caption() ?><?php echo $ivf_semenanalysisreport_add->Concentration2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Concentration2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Concentration2" type="text/html"><span id="el_ivf_semenanalysisreport_Concentration2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x_Concentration2" id="x_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Concentration2->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Concentration2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Concentration2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Total2->Visible) { // Total2 ?>
	<div id="r_Total2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Total2" for="x_Total2" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Total2" type="text/html"><?php echo $ivf_semenanalysisreport_add->Total2->caption() ?><?php echo $ivf_semenanalysisreport_add->Total2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Total2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Total2" type="text/html"><span id="el_ivf_semenanalysisreport_Total2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x_Total2" id="x_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Total2->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Total2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Total2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<div id="r_ProgressiveMotility2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_ProgressiveMotility2" for="x_ProgressiveMotility2" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_ProgressiveMotility2" type="text/html"><?php echo $ivf_semenanalysisreport_add->ProgressiveMotility2->caption() ?><?php echo $ivf_semenanalysisreport_add->ProgressiveMotility2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->ProgressiveMotility2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_ProgressiveMotility2" type="text/html"><span id="el_ivf_semenanalysisreport_ProgressiveMotility2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x_ProgressiveMotility2" id="x_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->ProgressiveMotility2->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->ProgressiveMotility2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->ProgressiveMotility2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<div id="r_NonProgrssiveMotile2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" for="x_NonProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile2" type="text/html"><?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile2->caption() ?><?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile2" type="text/html"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x_NonProgrssiveMotile2" id="x_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->NonProgrssiveMotile2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->Immotile2->Visible) { // Immotile2 ?>
	<div id="r_Immotile2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_Immotile2" for="x_Immotile2" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_Immotile2" type="text/html"><?php echo $ivf_semenanalysisreport_add->Immotile2->caption() ?><?php echo $ivf_semenanalysisreport_add->Immotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->Immotile2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_Immotile2" type="text/html"><span id="el_ivf_semenanalysisreport_Immotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x_Immotile2" id="x_Immotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->Immotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->Immotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->Immotile2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->Immotile2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<div id="r_TotalProgrssiveMotile2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" for="x_TotalProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile2" type="text/html"><?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile2->caption() ?><?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile2" type="text/html"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x_TotalProgrssiveMotile2" id="x_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile2->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->TotalProgrssiveMotile2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->MACS->Visible) { // MACS ?>
	<div id="r_MACS" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_MACS" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_MACS" type="text/html"><?php echo $ivf_semenanalysisreport_add->MACS->caption() ?><?php echo $ivf_semenanalysisreport_add->MACS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->MACS->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_MACS" type="text/html"><span id="el_ivf_semenanalysisreport_MACS">
<div id="tp_x_MACS" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_semenanalysisreport" data-field="x_MACS" data-value-separator="<?php echo $ivf_semenanalysisreport_add->MACS->displayValueSeparatorAttribute() ?>" name="x_MACS[]" id="x_MACS[]" value="{value}"<?php echo $ivf_semenanalysisreport_add->MACS->editAttributes() ?>></div>
<div id="dsl_x_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_semenanalysisreport_add->MACS->checkBoxListHtml(FALSE, "x_MACS[]") ?>
</div></div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->MACS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->IssuedBy->Visible) { // IssuedBy ?>
	<div id="r_IssuedBy" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IssuedBy" for="x_IssuedBy" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IssuedBy" type="text/html"><?php echo $ivf_semenanalysisreport_add->IssuedBy->caption() ?><?php echo $ivf_semenanalysisreport_add->IssuedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->IssuedBy->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IssuedBy" type="text/html"><span id="el_ivf_semenanalysisreport_IssuedBy">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x_IssuedBy" id="x_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->IssuedBy->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->IssuedBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->IssuedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->IssuedTo->Visible) { // IssuedTo ?>
	<div id="r_IssuedTo" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IssuedTo" for="x_IssuedTo" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IssuedTo" type="text/html"><?php echo $ivf_semenanalysisreport_add->IssuedTo->caption() ?><?php echo $ivf_semenanalysisreport_add->IssuedTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->IssuedTo->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IssuedTo" type="text/html"><span id="el_ivf_semenanalysisreport_IssuedTo">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x_IssuedTo" id="x_IssuedTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->IssuedTo->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->IssuedTo->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->IssuedTo->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->IssuedTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->PaID->Visible) { // PaID ?>
	<div id="r_PaID" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PaID" for="x_PaID" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PaID" type="text/html"><?php echo $ivf_semenanalysisreport_add->PaID->caption() ?><?php echo $ivf_semenanalysisreport_add->PaID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->PaID->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PaID" type="text/html"><span id="el_ivf_semenanalysisreport_PaID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x_PaID" id="x_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->PaID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->PaID->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->PaID->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->PaID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->PaName->Visible) { // PaName ?>
	<div id="r_PaName" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PaName" for="x_PaName" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PaName" type="text/html"><?php echo $ivf_semenanalysisreport_add->PaName->caption() ?><?php echo $ivf_semenanalysisreport_add->PaName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->PaName->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PaName" type="text/html"><span id="el_ivf_semenanalysisreport_PaName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x_PaName" id="x_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->PaName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->PaName->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->PaName->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->PaName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->PaMobile->Visible) { // PaMobile ?>
	<div id="r_PaMobile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PaMobile" for="x_PaMobile" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PaMobile" type="text/html"><?php echo $ivf_semenanalysisreport_add->PaMobile->caption() ?><?php echo $ivf_semenanalysisreport_add->PaMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->PaMobile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PaMobile" type="text/html"><span id="el_ivf_semenanalysisreport_PaMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x_PaMobile" id="x_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->PaMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->PaMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->PaMobile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->PaMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PartnerID" for="x_PartnerID" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PartnerID" type="text/html"><?php echo $ivf_semenanalysisreport_add->PartnerID->caption() ?><?php echo $ivf_semenanalysisreport_add->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->PartnerID->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PartnerID" type="text/html"><span id="el_ivf_semenanalysisreport_PartnerID">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->PartnerID->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->PartnerID->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PartnerName" for="x_PartnerName" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PartnerName" type="text/html"><?php echo $ivf_semenanalysisreport_add->PartnerName->caption() ?><?php echo $ivf_semenanalysisreport_add->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->PartnerName->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PartnerName" type="text/html"><span id="el_ivf_semenanalysisreport_PartnerName">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->PartnerName->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->PartnerName->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->PartnerMobile->Visible) { // PartnerMobile ?>
	<div id="r_PartnerMobile" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PartnerMobile" for="x_PartnerMobile" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PartnerMobile" type="text/html"><?php echo $ivf_semenanalysisreport_add->PartnerMobile->caption() ?><?php echo $ivf_semenanalysisreport_add->PartnerMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->PartnerMobile->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PartnerMobile" type="text/html"><span id="el_ivf_semenanalysisreport_PartnerMobile">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->PartnerMobile->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->PartnerMobile->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->PartnerMobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<div id="r_PREG_TEST_DATE" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" for="x_PREG_TEST_DATE" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_PREG_TEST_DATE" type="text/html"><?php echo $ivf_semenanalysisreport_add->PREG_TEST_DATE->caption() ?><?php echo $ivf_semenanalysisreport_add->PREG_TEST_DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->PREG_TEST_DATE->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_PREG_TEST_DATE" type="text/html"><span id="el_ivf_semenanalysisreport_PREG_TEST_DATE">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->PREG_TEST_DATE->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$ivf_semenanalysisreport_add->PREG_TEST_DATE->ReadOnly && !$ivf_semenanalysisreport_add->PREG_TEST_DATE->Disabled && !isset($ivf_semenanalysisreport_add->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($ivf_semenanalysisreport_add->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_semenanalysisreportadd_js">
loadjs.ready(["fivf_semenanalysisreportadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_semenanalysisreportadd", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_semenanalysisreport_add->PREG_TEST_DATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<div id="r_SPECIFIC_PROBLEMS" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" for="x_SPECIFIC_PROBLEMS" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" type="text/html"><?php echo $ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->caption() ?><?php echo $ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" type="text/html"><span id="el_ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-value-separator="<?php echo $ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x_SPECIFIC_PROBLEMS" name="x_SPECIFIC_PROBLEMS"<?php echo $ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->selectOptionListHtml("x_SPECIFIC_PROBLEMS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->SPECIFIC_PROBLEMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->IMSC_1->Visible) { // IMSC_1 ?>
	<div id="r_IMSC_1" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IMSC_1" for="x_IMSC_1" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IMSC_1" type="text/html"><?php echo $ivf_semenanalysisreport_add->IMSC_1->caption() ?><?php echo $ivf_semenanalysisreport_add->IMSC_1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->IMSC_1->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IMSC_1" type="text/html"><span id="el_ivf_semenanalysisreport_IMSC_1">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x_IMSC_1" id="x_IMSC_1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->IMSC_1->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->IMSC_1->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->IMSC_1->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->IMSC_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->IMSC_2->Visible) { // IMSC_2 ?>
	<div id="r_IMSC_2" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IMSC_2" for="x_IMSC_2" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IMSC_2" type="text/html"><?php echo $ivf_semenanalysisreport_add->IMSC_2->caption() ?><?php echo $ivf_semenanalysisreport_add->IMSC_2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->IMSC_2->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IMSC_2" type="text/html"><span id="el_ivf_semenanalysisreport_IMSC_2">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x_IMSC_2" id="x_IMSC_2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->IMSC_2->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->IMSC_2->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->IMSC_2->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->IMSC_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<div id="r_LIQUIFACTION_STORAGE" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" for="x_LIQUIFACTION_STORAGE" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" type="text/html"><?php echo $ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->caption() ?><?php echo $ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" type="text/html"><span id="el_ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-value-separator="<?php echo $ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>" id="x_LIQUIFACTION_STORAGE" name="x_LIQUIFACTION_STORAGE"<?php echo $ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->selectOptionListHtml("x_LIQUIFACTION_STORAGE") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->LIQUIFACTION_STORAGE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<div id="r_IUI_PREP_METHOD" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" for="x_IUI_PREP_METHOD" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_IUI_PREP_METHOD" type="text/html"><?php echo $ivf_semenanalysisreport_add->IUI_PREP_METHOD->caption() ?><?php echo $ivf_semenanalysisreport_add->IUI_PREP_METHOD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->IUI_PREP_METHOD->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_IUI_PREP_METHOD" type="text/html"><span id="el_ivf_semenanalysisreport_IUI_PREP_METHOD">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-value-separator="<?php echo $ivf_semenanalysisreport_add->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>" id="x_IUI_PREP_METHOD" name="x_IUI_PREP_METHOD"<?php echo $ivf_semenanalysisreport_add->IUI_PREP_METHOD->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->IUI_PREP_METHOD->selectOptionListHtml("x_IUI_PREP_METHOD") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->IUI_PREP_METHOD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<div id="r_TIME_FROM_TRIGGER" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" for="x_TIME_FROM_TRIGGER" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TIME_FROM_TRIGGER" type="text/html"><?php echo $ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->caption() ?><?php echo $ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TIME_FROM_TRIGGER" type="text/html"><span id="el_ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-value-separator="<?php echo $ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>" id="x_TIME_FROM_TRIGGER" name="x_TIME_FROM_TRIGGER"<?php echo $ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->selectOptionListHtml("x_TIME_FROM_TRIGGER") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->TIME_FROM_TRIGGER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<div id="r_COLLECTION_TO_PREPARATION" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" for="x_COLLECTION_TO_PREPARATION" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" type="text/html"><?php echo $ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->caption() ?><?php echo $ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" type="text/html"><span id="el_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-value-separator="<?php echo $ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>" id="x_COLLECTION_TO_PREPARATION" name="x_COLLECTION_TO_PREPARATION"<?php echo $ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->editAttributes() ?>>
			<?php echo $ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->selectOptionListHtml("x_COLLECTION_TO_PREPARATION") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_semenanalysisreport_add->COLLECTION_TO_PREPARATION->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_add->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<div id="r_TIME_FROM_PREP_TO_INSEM" class="form-group row">
		<label id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" for="x_TIME_FROM_PREP_TO_INSEM" class="<?php echo $ivf_semenanalysisreport_add->LeftColumnClass ?>"><script id="tpc_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" type="text/html"><?php echo $ivf_semenanalysisreport_add->TIME_FROM_PREP_TO_INSEM->caption() ?><?php echo $ivf_semenanalysisreport_add->TIME_FROM_PREP_TO_INSEM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_semenanalysisreport_add->RightColumnClass ?>"><div <?php echo $ivf_semenanalysisreport_add->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<script id="tpx_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" type="text/html"><span id="el_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<input type="text" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x_TIME_FROM_PREP_TO_INSEM" id="x_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenanalysisreport_add->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?php echo $ivf_semenanalysisreport_add->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?php echo $ivf_semenanalysisreport_add->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
</span></script>
<?php echo $ivf_semenanalysisreport_add->TIME_FROM_PREP_TO_INSEM->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_semenanalysisreportadd" class="ew-custom-template"></div>
<script id="tpm_ivf_semenanalysisreportadd" type="text/html">
<div id="ct_ivf_semenanalysisreport_add"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_ivf_semenanalysisreport_HusbandName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_HusbandName")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_ivf_semenanalysisreport_RIDNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_RIDNo")/}}</h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;">
{{include tmpl="#tpc_ivf_semenanalysisreport_PaID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_PaID")/}}
{{include tmpl="#tpc_ivf_semenanalysisreport_PaName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_PaName")/}}
{{include tmpl="#tpc_ivf_semenanalysisreport_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_PatientName")/}}
{{include tmpl="#tpc_ivf_semenanalysisreport_PaMobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_PaMobile")/}}
{{include tmpl="#tpc_ivf_semenanalysisreport_PartnerID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_PartnerID")/}}
{{include tmpl="#tpc_ivf_semenanalysisreport_PartnerName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_PartnerName")/}}
{{include tmpl="#tpc_ivf_semenanalysisreport_PartnerMobile"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_semenanalysisreport_PartnerMobile")/}}
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

<?php if (!$ivf_semenanalysisreport_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_semenanalysisreport_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_semenanalysisreport_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_semenanalysisreport->Rows) ?> };
	ew.applyTemplate("tpd_ivf_semenanalysisreportadd", "tpm_ivf_semenanalysisreportadd", "ivf_semenanalysisreportadd", "<?php echo $ivf_semenanalysisreport->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_semenanalysisreportadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_semenanalysisreport_add->showPageFooter();
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
$ivf_semenanalysisreport_add->terminate();
?>