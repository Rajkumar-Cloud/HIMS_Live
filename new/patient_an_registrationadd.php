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
$patient_an_registration_add = new patient_an_registration_add();

// Run the page
$patient_an_registration_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_an_registration_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_an_registrationadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatient_an_registrationadd = currentForm = new ew.Form("fpatient_an_registrationadd", "add");

	// Validate form
	fpatient_an_registrationadd.validate = function() {
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
			<?php if ($patient_an_registration_add->pid->Required) { ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->pid->caption(), $patient_an_registration_add->pid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_an_registration_add->pid->errorMessage()) ?>");
			<?php if ($patient_an_registration_add->fid->Required) { ?>
				elm = this.getElements("x" + infix + "_fid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->fid->caption(), $patient_an_registration_add->fid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_an_registration_add->fid->errorMessage()) ?>");
			<?php if ($patient_an_registration_add->G->Required) { ?>
				elm = this.getElements("x" + infix + "_G");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->G->caption(), $patient_an_registration_add->G->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->P->Required) { ?>
				elm = this.getElements("x" + infix + "_P");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->P->caption(), $patient_an_registration_add->P->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->L->Required) { ?>
				elm = this.getElements("x" + infix + "_L");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->L->caption(), $patient_an_registration_add->L->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A->Required) { ?>
				elm = this.getElements("x" + infix + "_A");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A->caption(), $patient_an_registration_add->A->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->E->Required) { ?>
				elm = this.getElements("x" + infix + "_E");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->E->caption(), $patient_an_registration_add->E->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->M->Required) { ?>
				elm = this.getElements("x" + infix + "_M");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->M->caption(), $patient_an_registration_add->M->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->LMP->Required) { ?>
				elm = this.getElements("x" + infix + "_LMP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->LMP->caption(), $patient_an_registration_add->LMP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->EDO->Required) { ?>
				elm = this.getElements("x" + infix + "_EDO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->EDO->caption(), $patient_an_registration_add->EDO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->MenstrualHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_MenstrualHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->MenstrualHistory->caption(), $patient_an_registration_add->MenstrualHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->MaritalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_MaritalHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->MaritalHistory->caption(), $patient_an_registration_add->MaritalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ObstetricHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_ObstetricHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ObstetricHistory->caption(), $patient_an_registration_add->ObstetricHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->PreviousHistoryofGDM->Required) { ?>
				elm = this.getElements("x" + infix + "_PreviousHistoryofGDM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->PreviousHistoryofGDM->caption(), $patient_an_registration_add->PreviousHistoryofGDM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->PreviousHistorofPIH->Required) { ?>
				elm = this.getElements("x" + infix + "_PreviousHistorofPIH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->PreviousHistorofPIH->caption(), $patient_an_registration_add->PreviousHistorofPIH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->PreviousHistoryofIUGR->Required) { ?>
				elm = this.getElements("x" + infix + "_PreviousHistoryofIUGR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->PreviousHistoryofIUGR->caption(), $patient_an_registration_add->PreviousHistoryofIUGR->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->PreviousHistoryofOligohydramnios->Required) { ?>
				elm = this.getElements("x" + infix + "_PreviousHistoryofOligohydramnios");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->PreviousHistoryofOligohydramnios->caption(), $patient_an_registration_add->PreviousHistoryofOligohydramnios->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->PreviousHistoryofPreterm->Required) { ?>
				elm = this.getElements("x" + infix + "_PreviousHistoryofPreterm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->PreviousHistoryofPreterm->caption(), $patient_an_registration_add->PreviousHistoryofPreterm->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->G1->Required) { ?>
				elm = this.getElements("x" + infix + "_G1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->G1->caption(), $patient_an_registration_add->G1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->G2->Required) { ?>
				elm = this.getElements("x" + infix + "_G2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->G2->caption(), $patient_an_registration_add->G2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->G3->Required) { ?>
				elm = this.getElements("x" + infix + "_G3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->G3->caption(), $patient_an_registration_add->G3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->DeliveryNDLSCS1->Required) { ?>
				elm = this.getElements("x" + infix + "_DeliveryNDLSCS1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->DeliveryNDLSCS1->caption(), $patient_an_registration_add->DeliveryNDLSCS1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->DeliveryNDLSCS2->Required) { ?>
				elm = this.getElements("x" + infix + "_DeliveryNDLSCS2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->DeliveryNDLSCS2->caption(), $patient_an_registration_add->DeliveryNDLSCS2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->DeliveryNDLSCS3->Required) { ?>
				elm = this.getElements("x" + infix + "_DeliveryNDLSCS3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->DeliveryNDLSCS3->caption(), $patient_an_registration_add->DeliveryNDLSCS3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->BabySexweight1->Required) { ?>
				elm = this.getElements("x" + infix + "_BabySexweight1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->BabySexweight1->caption(), $patient_an_registration_add->BabySexweight1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->BabySexweight2->Required) { ?>
				elm = this.getElements("x" + infix + "_BabySexweight2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->BabySexweight2->caption(), $patient_an_registration_add->BabySexweight2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->BabySexweight3->Required) { ?>
				elm = this.getElements("x" + infix + "_BabySexweight3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->BabySexweight3->caption(), $patient_an_registration_add->BabySexweight3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->PastMedicalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_PastMedicalHistory[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->PastMedicalHistory->caption(), $patient_an_registration_add->PastMedicalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->PastSurgicalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_PastSurgicalHistory[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->PastSurgicalHistory->caption(), $patient_an_registration_add->PastSurgicalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->FamilyHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_FamilyHistory[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->FamilyHistory->caption(), $patient_an_registration_add->FamilyHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Viability->Required) { ?>
				elm = this.getElements("x" + infix + "_Viability");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Viability->caption(), $patient_an_registration_add->Viability->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ViabilityDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_ViabilityDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ViabilityDATE->caption(), $patient_an_registration_add->ViabilityDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ViabilityREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_ViabilityREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ViabilityREPORT->caption(), $patient_an_registration_add->ViabilityREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Viability2->Required) { ?>
				elm = this.getElements("x" + infix + "_Viability2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Viability2->caption(), $patient_an_registration_add->Viability2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Viability2DATE->Required) { ?>
				elm = this.getElements("x" + infix + "_Viability2DATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Viability2DATE->caption(), $patient_an_registration_add->Viability2DATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Viability2REPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_Viability2REPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Viability2REPORT->caption(), $patient_an_registration_add->Viability2REPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->NTscan->Required) { ?>
				elm = this.getElements("x" + infix + "_NTscan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->NTscan->caption(), $patient_an_registration_add->NTscan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->NTscanDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_NTscanDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->NTscanDATE->caption(), $patient_an_registration_add->NTscanDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->NTscanREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_NTscanREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->NTscanREPORT->caption(), $patient_an_registration_add->NTscanREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->EarlyTarget->Required) { ?>
				elm = this.getElements("x" + infix + "_EarlyTarget");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->EarlyTarget->caption(), $patient_an_registration_add->EarlyTarget->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->EarlyTargetDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_EarlyTargetDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->EarlyTargetDATE->caption(), $patient_an_registration_add->EarlyTargetDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->EarlyTargetREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_EarlyTargetREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->EarlyTargetREPORT->caption(), $patient_an_registration_add->EarlyTargetREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Anomaly->Required) { ?>
				elm = this.getElements("x" + infix + "_Anomaly");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Anomaly->caption(), $patient_an_registration_add->Anomaly->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->AnomalyDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_AnomalyDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->AnomalyDATE->caption(), $patient_an_registration_add->AnomalyDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->AnomalyREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_AnomalyREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->AnomalyREPORT->caption(), $patient_an_registration_add->AnomalyREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Growth->Required) { ?>
				elm = this.getElements("x" + infix + "_Growth");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Growth->caption(), $patient_an_registration_add->Growth->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->GrowthDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_GrowthDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->GrowthDATE->caption(), $patient_an_registration_add->GrowthDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->GrowthREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_GrowthREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->GrowthREPORT->caption(), $patient_an_registration_add->GrowthREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Growth1->Required) { ?>
				elm = this.getElements("x" + infix + "_Growth1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Growth1->caption(), $patient_an_registration_add->Growth1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Growth1DATE->Required) { ?>
				elm = this.getElements("x" + infix + "_Growth1DATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Growth1DATE->caption(), $patient_an_registration_add->Growth1DATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Growth1REPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_Growth1REPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Growth1REPORT->caption(), $patient_an_registration_add->Growth1REPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ANProfile->Required) { ?>
				elm = this.getElements("x" + infix + "_ANProfile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ANProfile->caption(), $patient_an_registration_add->ANProfile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ANProfileDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_ANProfileDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ANProfileDATE->caption(), $patient_an_registration_add->ANProfileDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ANProfileINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_ANProfileINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ANProfileINHOUSE->caption(), $patient_an_registration_add->ANProfileINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ANProfileREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_ANProfileREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ANProfileREPORT->caption(), $patient_an_registration_add->ANProfileREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->DualMarker->Required) { ?>
				elm = this.getElements("x" + infix + "_DualMarker");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->DualMarker->caption(), $patient_an_registration_add->DualMarker->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->DualMarkerDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_DualMarkerDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->DualMarkerDATE->caption(), $patient_an_registration_add->DualMarkerDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->DualMarkerINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_DualMarkerINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->DualMarkerINHOUSE->caption(), $patient_an_registration_add->DualMarkerINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->DualMarkerREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_DualMarkerREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->DualMarkerREPORT->caption(), $patient_an_registration_add->DualMarkerREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Quadruple->Required) { ?>
				elm = this.getElements("x" + infix + "_Quadruple");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Quadruple->caption(), $patient_an_registration_add->Quadruple->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->QuadrupleDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_QuadrupleDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->QuadrupleDATE->caption(), $patient_an_registration_add->QuadrupleDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->QuadrupleINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_QuadrupleINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->QuadrupleINHOUSE->caption(), $patient_an_registration_add->QuadrupleINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->QuadrupleREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_QuadrupleREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->QuadrupleREPORT->caption(), $patient_an_registration_add->QuadrupleREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A5month->Required) { ?>
				elm = this.getElements("x" + infix + "_A5month");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A5month->caption(), $patient_an_registration_add->A5month->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A5monthDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_A5monthDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A5monthDATE->caption(), $patient_an_registration_add->A5monthDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A5monthINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_A5monthINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A5monthINHOUSE->caption(), $patient_an_registration_add->A5monthINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A5monthREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_A5monthREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A5monthREPORT->caption(), $patient_an_registration_add->A5monthREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A7month->Required) { ?>
				elm = this.getElements("x" + infix + "_A7month");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A7month->caption(), $patient_an_registration_add->A7month->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A7monthDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_A7monthDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A7monthDATE->caption(), $patient_an_registration_add->A7monthDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A7monthINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_A7monthINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A7monthINHOUSE->caption(), $patient_an_registration_add->A7monthINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A7monthREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_A7monthREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A7monthREPORT->caption(), $patient_an_registration_add->A7monthREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A9month->Required) { ?>
				elm = this.getElements("x" + infix + "_A9month");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A9month->caption(), $patient_an_registration_add->A9month->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A9monthDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_A9monthDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A9monthDATE->caption(), $patient_an_registration_add->A9monthDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A9monthINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_A9monthINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A9monthINHOUSE->caption(), $patient_an_registration_add->A9monthINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->A9monthREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_A9monthREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->A9monthREPORT->caption(), $patient_an_registration_add->A9monthREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->INJ->Required) { ?>
				elm = this.getElements("x" + infix + "_INJ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->INJ->caption(), $patient_an_registration_add->INJ->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->INJDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_INJDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->INJDATE->caption(), $patient_an_registration_add->INJDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->INJINHOUSE->Required) { ?>
				elm = this.getElements("x" + infix + "_INJINHOUSE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->INJINHOUSE->caption(), $patient_an_registration_add->INJINHOUSE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->INJREPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_INJREPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->INJREPORT->caption(), $patient_an_registration_add->INJREPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Bleeding->Required) { ?>
				elm = this.getElements("x" + infix + "_Bleeding[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Bleeding->caption(), $patient_an_registration_add->Bleeding->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Hypothyroidism->Required) { ?>
				elm = this.getElements("x" + infix + "_Hypothyroidism");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Hypothyroidism->caption(), $patient_an_registration_add->Hypothyroidism->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->PICMENumber->Required) { ?>
				elm = this.getElements("x" + infix + "_PICMENumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->PICMENumber->caption(), $patient_an_registration_add->PICMENumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Outcome->Required) { ?>
				elm = this.getElements("x" + infix + "_Outcome");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Outcome->caption(), $patient_an_registration_add->Outcome->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->DateofAdmission->Required) { ?>
				elm = this.getElements("x" + infix + "_DateofAdmission");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->DateofAdmission->caption(), $patient_an_registration_add->DateofAdmission->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->DateodProcedure->Required) { ?>
				elm = this.getElements("x" + infix + "_DateodProcedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->DateodProcedure->caption(), $patient_an_registration_add->DateodProcedure->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Miscarriage->Required) { ?>
				elm = this.getElements("x" + infix + "_Miscarriage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Miscarriage->caption(), $patient_an_registration_add->Miscarriage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ModeOfDelivery->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeOfDelivery");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ModeOfDelivery->caption(), $patient_an_registration_add->ModeOfDelivery->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ND->Required) { ?>
				elm = this.getElements("x" + infix + "_ND");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ND->caption(), $patient_an_registration_add->ND->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->NDS->Required) { ?>
				elm = this.getElements("x" + infix + "_NDS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->NDS->caption(), $patient_an_registration_add->NDS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->NDP->Required) { ?>
				elm = this.getElements("x" + infix + "_NDP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->NDP->caption(), $patient_an_registration_add->NDP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Vaccum->Required) { ?>
				elm = this.getElements("x" + infix + "_Vaccum");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Vaccum->caption(), $patient_an_registration_add->Vaccum->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->VaccumS->Required) { ?>
				elm = this.getElements("x" + infix + "_VaccumS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->VaccumS->caption(), $patient_an_registration_add->VaccumS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->VaccumP->Required) { ?>
				elm = this.getElements("x" + infix + "_VaccumP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->VaccumP->caption(), $patient_an_registration_add->VaccumP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Forceps->Required) { ?>
				elm = this.getElements("x" + infix + "_Forceps");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Forceps->caption(), $patient_an_registration_add->Forceps->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ForcepsS->Required) { ?>
				elm = this.getElements("x" + infix + "_ForcepsS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ForcepsS->caption(), $patient_an_registration_add->ForcepsS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ForcepsP->Required) { ?>
				elm = this.getElements("x" + infix + "_ForcepsP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ForcepsP->caption(), $patient_an_registration_add->ForcepsP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Elective->Required) { ?>
				elm = this.getElements("x" + infix + "_Elective");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Elective->caption(), $patient_an_registration_add->Elective->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ElectiveS->Required) { ?>
				elm = this.getElements("x" + infix + "_ElectiveS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ElectiveS->caption(), $patient_an_registration_add->ElectiveS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ElectiveP->Required) { ?>
				elm = this.getElements("x" + infix + "_ElectiveP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ElectiveP->caption(), $patient_an_registration_add->ElectiveP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Emergency->Required) { ?>
				elm = this.getElements("x" + infix + "_Emergency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Emergency->caption(), $patient_an_registration_add->Emergency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->EmergencyS->Required) { ?>
				elm = this.getElements("x" + infix + "_EmergencyS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->EmergencyS->caption(), $patient_an_registration_add->EmergencyS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->EmergencyP->Required) { ?>
				elm = this.getElements("x" + infix + "_EmergencyP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->EmergencyP->caption(), $patient_an_registration_add->EmergencyP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Maturity->Required) { ?>
				elm = this.getElements("x" + infix + "_Maturity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Maturity->caption(), $patient_an_registration_add->Maturity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Baby1->Required) { ?>
				elm = this.getElements("x" + infix + "_Baby1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Baby1->caption(), $patient_an_registration_add->Baby1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Baby2->Required) { ?>
				elm = this.getElements("x" + infix + "_Baby2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Baby2->caption(), $patient_an_registration_add->Baby2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->sex1->Required) { ?>
				elm = this.getElements("x" + infix + "_sex1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->sex1->caption(), $patient_an_registration_add->sex1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->sex2->Required) { ?>
				elm = this.getElements("x" + infix + "_sex2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->sex2->caption(), $patient_an_registration_add->sex2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->weight1->Required) { ?>
				elm = this.getElements("x" + infix + "_weight1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->weight1->caption(), $patient_an_registration_add->weight1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->weight2->Required) { ?>
				elm = this.getElements("x" + infix + "_weight2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->weight2->caption(), $patient_an_registration_add->weight2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->NICU1->Required) { ?>
				elm = this.getElements("x" + infix + "_NICU1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->NICU1->caption(), $patient_an_registration_add->NICU1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->NICU2->Required) { ?>
				elm = this.getElements("x" + infix + "_NICU2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->NICU2->caption(), $patient_an_registration_add->NICU2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Jaundice1->Required) { ?>
				elm = this.getElements("x" + infix + "_Jaundice1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Jaundice1->caption(), $patient_an_registration_add->Jaundice1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Jaundice2->Required) { ?>
				elm = this.getElements("x" + infix + "_Jaundice2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Jaundice2->caption(), $patient_an_registration_add->Jaundice2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Others1->Required) { ?>
				elm = this.getElements("x" + infix + "_Others1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Others1->caption(), $patient_an_registration_add->Others1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->Others2->Required) { ?>
				elm = this.getElements("x" + infix + "_Others2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->Others2->caption(), $patient_an_registration_add->Others2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->SpillOverReasons->Required) { ?>
				elm = this.getElements("x" + infix + "_SpillOverReasons");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->SpillOverReasons->caption(), $patient_an_registration_add->SpillOverReasons->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ANClosed->Required) { ?>
				elm = this.getElements("x" + infix + "_ANClosed[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ANClosed->caption(), $patient_an_registration_add->ANClosed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ANClosedDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_ANClosedDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ANClosedDATE->caption(), $patient_an_registration_add->ANClosedDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->PastMedicalHistoryOthers->Required) { ?>
				elm = this.getElements("x" + infix + "_PastMedicalHistoryOthers");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->PastMedicalHistoryOthers->caption(), $patient_an_registration_add->PastMedicalHistoryOthers->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->PastSurgicalHistoryOthers->Required) { ?>
				elm = this.getElements("x" + infix + "_PastSurgicalHistoryOthers");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->PastSurgicalHistoryOthers->caption(), $patient_an_registration_add->PastSurgicalHistoryOthers->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->FamilyHistoryOthers->Required) { ?>
				elm = this.getElements("x" + infix + "_FamilyHistoryOthers");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->FamilyHistoryOthers->caption(), $patient_an_registration_add->FamilyHistoryOthers->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->PresentPregnancyComplicationsOthers->Required) { ?>
				elm = this.getElements("x" + infix + "_PresentPregnancyComplicationsOthers");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->PresentPregnancyComplicationsOthers->caption(), $patient_an_registration_add->PresentPregnancyComplicationsOthers->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_an_registration_add->ETdate->Required) { ?>
				elm = this.getElements("x" + infix + "_ETdate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration_add->ETdate->caption(), $patient_an_registration_add->ETdate->RequiredErrorMessage)) ?>");
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
	fpatient_an_registrationadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_an_registrationadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_an_registrationadd.lists["x_MenstrualHistory"] = <?php echo $patient_an_registration_add->MenstrualHistory->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_MenstrualHistory"].options = <?php echo JsonEncode($patient_an_registration_add->MenstrualHistory->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_PreviousHistoryofGDM"] = <?php echo $patient_an_registration_add->PreviousHistoryofGDM->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_PreviousHistoryofGDM"].options = <?php echo JsonEncode($patient_an_registration_add->PreviousHistoryofGDM->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_PreviousHistorofPIH"] = <?php echo $patient_an_registration_add->PreviousHistorofPIH->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_PreviousHistorofPIH"].options = <?php echo JsonEncode($patient_an_registration_add->PreviousHistorofPIH->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_PreviousHistoryofIUGR"] = <?php echo $patient_an_registration_add->PreviousHistoryofIUGR->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_PreviousHistoryofIUGR"].options = <?php echo JsonEncode($patient_an_registration_add->PreviousHistoryofIUGR->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_PreviousHistoryofOligohydramnios"] = <?php echo $patient_an_registration_add->PreviousHistoryofOligohydramnios->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_PreviousHistoryofOligohydramnios"].options = <?php echo JsonEncode($patient_an_registration_add->PreviousHistoryofOligohydramnios->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_PreviousHistoryofPreterm"] = <?php echo $patient_an_registration_add->PreviousHistoryofPreterm->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_PreviousHistoryofPreterm"].options = <?php echo JsonEncode($patient_an_registration_add->PreviousHistoryofPreterm->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_PastMedicalHistory[]"] = <?php echo $patient_an_registration_add->PastMedicalHistory->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_PastMedicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_add->PastMedicalHistory->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_PastSurgicalHistory[]"] = <?php echo $patient_an_registration_add->PastSurgicalHistory->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_PastSurgicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_add->PastSurgicalHistory->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_FamilyHistory[]"] = <?php echo $patient_an_registration_add->FamilyHistory->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_FamilyHistory[]"].options = <?php echo JsonEncode($patient_an_registration_add->FamilyHistory->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_Bleeding[]"] = <?php echo $patient_an_registration_add->Bleeding->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_Bleeding[]"].options = <?php echo JsonEncode($patient_an_registration_add->Bleeding->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_Miscarriage"] = <?php echo $patient_an_registration_add->Miscarriage->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_Miscarriage"].options = <?php echo JsonEncode($patient_an_registration_add->Miscarriage->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_ModeOfDelivery"] = <?php echo $patient_an_registration_add->ModeOfDelivery->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_ModeOfDelivery"].options = <?php echo JsonEncode($patient_an_registration_add->ModeOfDelivery->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_NDS"] = <?php echo $patient_an_registration_add->NDS->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_NDS"].options = <?php echo JsonEncode($patient_an_registration_add->NDS->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_NDP"] = <?php echo $patient_an_registration_add->NDP->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_NDP"].options = <?php echo JsonEncode($patient_an_registration_add->NDP->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_VaccumS"] = <?php echo $patient_an_registration_add->VaccumS->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_VaccumS"].options = <?php echo JsonEncode($patient_an_registration_add->VaccumS->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_VaccumP"] = <?php echo $patient_an_registration_add->VaccumP->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_VaccumP"].options = <?php echo JsonEncode($patient_an_registration_add->VaccumP->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_ForcepsS"] = <?php echo $patient_an_registration_add->ForcepsS->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_ForcepsS"].options = <?php echo JsonEncode($patient_an_registration_add->ForcepsS->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_ForcepsP"] = <?php echo $patient_an_registration_add->ForcepsP->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_ForcepsP"].options = <?php echo JsonEncode($patient_an_registration_add->ForcepsP->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_ElectiveS"] = <?php echo $patient_an_registration_add->ElectiveS->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_ElectiveS"].options = <?php echo JsonEncode($patient_an_registration_add->ElectiveS->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_ElectiveP"] = <?php echo $patient_an_registration_add->ElectiveP->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_ElectiveP"].options = <?php echo JsonEncode($patient_an_registration_add->ElectiveP->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_EmergencyS"] = <?php echo $patient_an_registration_add->EmergencyS->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_EmergencyS"].options = <?php echo JsonEncode($patient_an_registration_add->EmergencyS->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_EmergencyP"] = <?php echo $patient_an_registration_add->EmergencyP->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_EmergencyP"].options = <?php echo JsonEncode($patient_an_registration_add->EmergencyP->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_Maturity"] = <?php echo $patient_an_registration_add->Maturity->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_Maturity"].options = <?php echo JsonEncode($patient_an_registration_add->Maturity->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_SpillOverReasons"] = <?php echo $patient_an_registration_add->SpillOverReasons->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_SpillOverReasons"].options = <?php echo JsonEncode($patient_an_registration_add->SpillOverReasons->options(FALSE, TRUE)) ?>;
	fpatient_an_registrationadd.lists["x_ANClosed[]"] = <?php echo $patient_an_registration_add->ANClosed->Lookup->toClientList($patient_an_registration_add) ?>;
	fpatient_an_registrationadd.lists["x_ANClosed[]"].options = <?php echo JsonEncode($patient_an_registration_add->ANClosed->options(FALSE, TRUE)) ?>;
	loadjs.done("fpatient_an_registrationadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_an_registration_add->showPageHeader(); ?>
<?php
$patient_an_registration_add->showMessage();
?>
<form name="fpatient_an_registrationadd" id="fpatient_an_registrationadd" class="<?php echo $patient_an_registration_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_an_registration_add->IsModal ?>">
<?php if ($patient_an_registration->getCurrentMasterTable() == "patient_opd_follow_up") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="patient_opd_follow_up">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_an_registration_add->fid->getSessionValue()) ?>">
<input type="hidden" name="fk_PatientId" value="<?php echo HtmlEncode($patient_an_registration_add->pid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($patient_an_registration_add->pid->Visible) { // pid ?>
	<div id="r_pid" class="form-group row">
		<label id="elh_patient_an_registration_pid" for="x_pid" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_pid" type="text/html"><?php echo $patient_an_registration_add->pid->caption() ?><?php echo $patient_an_registration_add->pid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->pid->cellAttributes() ?>>
<?php if ($patient_an_registration_add->pid->getSessionValue() != "") { ?>
<script id="tpx_patient_an_registration_pid" type="text/html"><span id="el_patient_an_registration_pid">
<span<?php echo $patient_an_registration_add->pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_add->pid->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_pid" name="x_pid" value="<?php echo HtmlEncode($patient_an_registration_add->pid->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_an_registration_pid" type="text/html"><span id="el_patient_an_registration_pid">
<input type="text" data-table="patient_an_registration" data-field="x_pid" name="x_pid" id="x_pid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration_add->pid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->pid->EditValue ?>"<?php echo $patient_an_registration_add->pid->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_an_registration_add->pid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->fid->Visible) { // fid ?>
	<div id="r_fid" class="form-group row">
		<label id="elh_patient_an_registration_fid" for="x_fid" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_fid" type="text/html"><?php echo $patient_an_registration_add->fid->caption() ?><?php echo $patient_an_registration_add->fid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->fid->cellAttributes() ?>>
<?php if ($patient_an_registration_add->fid->getSessionValue() != "") { ?>
<script id="tpx_patient_an_registration_fid" type="text/html"><span id="el_patient_an_registration_fid">
<span<?php echo $patient_an_registration_add->fid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_an_registration_add->fid->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_fid" name="x_fid" value="<?php echo HtmlEncode($patient_an_registration_add->fid->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_an_registration_fid" type="text/html"><span id="el_patient_an_registration_fid">
<input type="text" data-table="patient_an_registration" data-field="x_fid" name="x_fid" id="x_fid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration_add->fid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->fid->EditValue ?>"<?php echo $patient_an_registration_add->fid->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_an_registration_add->fid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->G->Visible) { // G ?>
	<div id="r_G" class="form-group row">
		<label id="elh_patient_an_registration_G" for="x_G" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_G" type="text/html"><?php echo $patient_an_registration_add->G->caption() ?><?php echo $patient_an_registration_add->G->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->G->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G" type="text/html"><span id="el_patient_an_registration_G">
<input type="text" data-table="patient_an_registration" data-field="x_G" name="x_G" id="x_G" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->G->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->G->EditValue ?>"<?php echo $patient_an_registration_add->G->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->G->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->P->Visible) { // P ?>
	<div id="r_P" class="form-group row">
		<label id="elh_patient_an_registration_P" for="x_P" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_P" type="text/html"><?php echo $patient_an_registration_add->P->caption() ?><?php echo $patient_an_registration_add->P->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->P->cellAttributes() ?>>
<script id="tpx_patient_an_registration_P" type="text/html"><span id="el_patient_an_registration_P">
<input type="text" data-table="patient_an_registration" data-field="x_P" name="x_P" id="x_P" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->P->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->P->EditValue ?>"<?php echo $patient_an_registration_add->P->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->P->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->L->Visible) { // L ?>
	<div id="r_L" class="form-group row">
		<label id="elh_patient_an_registration_L" for="x_L" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_L" type="text/html"><?php echo $patient_an_registration_add->L->caption() ?><?php echo $patient_an_registration_add->L->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->L->cellAttributes() ?>>
<script id="tpx_patient_an_registration_L" type="text/html"><span id="el_patient_an_registration_L">
<input type="text" data-table="patient_an_registration" data-field="x_L" name="x_L" id="x_L" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->L->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->L->EditValue ?>"<?php echo $patient_an_registration_add->L->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->L->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A->Visible) { // A ?>
	<div id="r_A" class="form-group row">
		<label id="elh_patient_an_registration_A" for="x_A" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A" type="text/html"><?php echo $patient_an_registration_add->A->caption() ?><?php echo $patient_an_registration_add->A->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A" type="text/html"><span id="el_patient_an_registration_A">
<input type="text" data-table="patient_an_registration" data-field="x_A" name="x_A" id="x_A" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A->EditValue ?>"<?php echo $patient_an_registration_add->A->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->A->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->E->Visible) { // E ?>
	<div id="r_E" class="form-group row">
		<label id="elh_patient_an_registration_E" for="x_E" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_E" type="text/html"><?php echo $patient_an_registration_add->E->caption() ?><?php echo $patient_an_registration_add->E->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->E->cellAttributes() ?>>
<script id="tpx_patient_an_registration_E" type="text/html"><span id="el_patient_an_registration_E">
<input type="text" data-table="patient_an_registration" data-field="x_E" name="x_E" id="x_E" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->E->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->E->EditValue ?>"<?php echo $patient_an_registration_add->E->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->E->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->M->Visible) { // M ?>
	<div id="r_M" class="form-group row">
		<label id="elh_patient_an_registration_M" for="x_M" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_M" type="text/html"><?php echo $patient_an_registration_add->M->caption() ?><?php echo $patient_an_registration_add->M->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->M->cellAttributes() ?>>
<script id="tpx_patient_an_registration_M" type="text/html"><span id="el_patient_an_registration_M">
<input type="text" data-table="patient_an_registration" data-field="x_M" name="x_M" id="x_M" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->M->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->M->EditValue ?>"<?php echo $patient_an_registration_add->M->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->M->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label id="elh_patient_an_registration_LMP" for="x_LMP" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_LMP" type="text/html"><?php echo $patient_an_registration_add->LMP->caption() ?><?php echo $patient_an_registration_add->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->LMP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_LMP" type="text/html"><span id="el_patient_an_registration_LMP">
<input type="text" data-table="patient_an_registration" data-field="x_LMP" name="x_LMP" id="x_LMP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->LMP->EditValue ?>"<?php echo $patient_an_registration_add->LMP->editAttributes() ?>>
<?php if (!$patient_an_registration_add->LMP->ReadOnly && !$patient_an_registration_add->LMP->Disabled && !isset($patient_an_registration_add->LMP->EditAttrs["readonly"]) && !isset($patient_an_registration_add->LMP->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->LMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->EDO->Visible) { // EDO ?>
	<div id="r_EDO" class="form-group row">
		<label id="elh_patient_an_registration_EDO" for="x_EDO" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EDO" type="text/html"><?php echo $patient_an_registration_add->EDO->caption() ?><?php echo $patient_an_registration_add->EDO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->EDO->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EDO" type="text/html"><span id="el_patient_an_registration_EDO">
<input type="text" data-table="patient_an_registration" data-field="x_EDO" name="x_EDO" id="x_EDO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->EDO->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->EDO->EditValue ?>"<?php echo $patient_an_registration_add->EDO->editAttributes() ?>>
<?php if (!$patient_an_registration_add->EDO->ReadOnly && !$patient_an_registration_add->EDO->Disabled && !isset($patient_an_registration_add->EDO->EditAttrs["readonly"]) && !isset($patient_an_registration_add->EDO->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->EDO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<div id="r_MenstrualHistory" class="form-group row">
		<label id="elh_patient_an_registration_MenstrualHistory" for="x_MenstrualHistory" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_MenstrualHistory" type="text/html"><?php echo $patient_an_registration_add->MenstrualHistory->caption() ?><?php echo $patient_an_registration_add->MenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_MenstrualHistory" type="text/html"><span id="el_patient_an_registration_MenstrualHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-value-separator="<?php echo $patient_an_registration_add->MenstrualHistory->displayValueSeparatorAttribute() ?>" id="x_MenstrualHistory" name="x_MenstrualHistory"<?php echo $patient_an_registration_add->MenstrualHistory->editAttributes() ?>>
			<?php echo $patient_an_registration_add->MenstrualHistory->selectOptionListHtml("x_MenstrualHistory") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->MenstrualHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->MaritalHistory->Visible) { // MaritalHistory ?>
	<div id="r_MaritalHistory" class="form-group row">
		<label id="elh_patient_an_registration_MaritalHistory" for="x_MaritalHistory" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_MaritalHistory" type="text/html"><?php echo $patient_an_registration_add->MaritalHistory->caption() ?><?php echo $patient_an_registration_add->MaritalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->MaritalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_MaritalHistory" type="text/html"><span id="el_patient_an_registration_MaritalHistory">
<input type="text" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x_MaritalHistory" id="x_MaritalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->MaritalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->MaritalHistory->EditValue ?>"<?php echo $patient_an_registration_add->MaritalHistory->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->MaritalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<div id="r_ObstetricHistory" class="form-group row">
		<label id="elh_patient_an_registration_ObstetricHistory" for="x_ObstetricHistory" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ObstetricHistory" type="text/html"><?php echo $patient_an_registration_add->ObstetricHistory->caption() ?><?php echo $patient_an_registration_add->ObstetricHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ObstetricHistory" type="text/html"><span id="el_patient_an_registration_ObstetricHistory">
<input type="text" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->ObstetricHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->ObstetricHistory->EditValue ?>"<?php echo $patient_an_registration_add->ObstetricHistory->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->ObstetricHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
	<div id="r_PreviousHistoryofGDM" class="form-group row">
		<label id="elh_patient_an_registration_PreviousHistoryofGDM" for="x_PreviousHistoryofGDM" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PreviousHistoryofGDM" type="text/html"><?php echo $patient_an_registration_add->PreviousHistoryofGDM->caption() ?><?php echo $patient_an_registration_add->PreviousHistoryofGDM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->PreviousHistoryofGDM->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofGDM" type="text/html"><span id="el_patient_an_registration_PreviousHistoryofGDM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-value-separator="<?php echo $patient_an_registration_add->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>" id="x_PreviousHistoryofGDM" name="x_PreviousHistoryofGDM"<?php echo $patient_an_registration_add->PreviousHistoryofGDM->editAttributes() ?>>
			<?php echo $patient_an_registration_add->PreviousHistoryofGDM->selectOptionListHtml("x_PreviousHistoryofGDM") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->PreviousHistoryofGDM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
	<div id="r_PreviousHistorofPIH" class="form-group row">
		<label id="elh_patient_an_registration_PreviousHistorofPIH" for="x_PreviousHistorofPIH" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PreviousHistorofPIH" type="text/html"><?php echo $patient_an_registration_add->PreviousHistorofPIH->caption() ?><?php echo $patient_an_registration_add->PreviousHistorofPIH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->PreviousHistorofPIH->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistorofPIH" type="text/html"><span id="el_patient_an_registration_PreviousHistorofPIH">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-value-separator="<?php echo $patient_an_registration_add->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>" id="x_PreviousHistorofPIH" name="x_PreviousHistorofPIH"<?php echo $patient_an_registration_add->PreviousHistorofPIH->editAttributes() ?>>
			<?php echo $patient_an_registration_add->PreviousHistorofPIH->selectOptionListHtml("x_PreviousHistorofPIH") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->PreviousHistorofPIH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
	<div id="r_PreviousHistoryofIUGR" class="form-group row">
		<label id="elh_patient_an_registration_PreviousHistoryofIUGR" for="x_PreviousHistoryofIUGR" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PreviousHistoryofIUGR" type="text/html"><?php echo $patient_an_registration_add->PreviousHistoryofIUGR->caption() ?><?php echo $patient_an_registration_add->PreviousHistoryofIUGR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->PreviousHistoryofIUGR->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofIUGR" type="text/html"><span id="el_patient_an_registration_PreviousHistoryofIUGR">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-value-separator="<?php echo $patient_an_registration_add->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>" id="x_PreviousHistoryofIUGR" name="x_PreviousHistoryofIUGR"<?php echo $patient_an_registration_add->PreviousHistoryofIUGR->editAttributes() ?>>
			<?php echo $patient_an_registration_add->PreviousHistoryofIUGR->selectOptionListHtml("x_PreviousHistoryofIUGR") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->PreviousHistoryofIUGR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
	<div id="r_PreviousHistoryofOligohydramnios" class="form-group row">
		<label id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" for="x_PreviousHistoryofOligohydramnios" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PreviousHistoryofOligohydramnios" type="text/html"><?php echo $patient_an_registration_add->PreviousHistoryofOligohydramnios->caption() ?><?php echo $patient_an_registration_add->PreviousHistoryofOligohydramnios->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofOligohydramnios" type="text/html"><span id="el_patient_an_registration_PreviousHistoryofOligohydramnios">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-value-separator="<?php echo $patient_an_registration_add->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>" id="x_PreviousHistoryofOligohydramnios" name="x_PreviousHistoryofOligohydramnios"<?php echo $patient_an_registration_add->PreviousHistoryofOligohydramnios->editAttributes() ?>>
			<?php echo $patient_an_registration_add->PreviousHistoryofOligohydramnios->selectOptionListHtml("x_PreviousHistoryofOligohydramnios") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->PreviousHistoryofOligohydramnios->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
	<div id="r_PreviousHistoryofPreterm" class="form-group row">
		<label id="elh_patient_an_registration_PreviousHistoryofPreterm" for="x_PreviousHistoryofPreterm" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PreviousHistoryofPreterm" type="text/html"><?php echo $patient_an_registration_add->PreviousHistoryofPreterm->caption() ?><?php echo $patient_an_registration_add->PreviousHistoryofPreterm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->PreviousHistoryofPreterm->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofPreterm" type="text/html"><span id="el_patient_an_registration_PreviousHistoryofPreterm">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-value-separator="<?php echo $patient_an_registration_add->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>" id="x_PreviousHistoryofPreterm" name="x_PreviousHistoryofPreterm"<?php echo $patient_an_registration_add->PreviousHistoryofPreterm->editAttributes() ?>>
			<?php echo $patient_an_registration_add->PreviousHistoryofPreterm->selectOptionListHtml("x_PreviousHistoryofPreterm") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->PreviousHistoryofPreterm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->G1->Visible) { // G1 ?>
	<div id="r_G1" class="form-group row">
		<label id="elh_patient_an_registration_G1" for="x_G1" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_G1" type="text/html"><?php echo $patient_an_registration_add->G1->caption() ?><?php echo $patient_an_registration_add->G1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->G1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G1" type="text/html"><span id="el_patient_an_registration_G1">
<input type="text" data-table="patient_an_registration" data-field="x_G1" name="x_G1" id="x_G1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->G1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->G1->EditValue ?>"<?php echo $patient_an_registration_add->G1->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->G1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->G2->Visible) { // G2 ?>
	<div id="r_G2" class="form-group row">
		<label id="elh_patient_an_registration_G2" for="x_G2" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_G2" type="text/html"><?php echo $patient_an_registration_add->G2->caption() ?><?php echo $patient_an_registration_add->G2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->G2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G2" type="text/html"><span id="el_patient_an_registration_G2">
<input type="text" data-table="patient_an_registration" data-field="x_G2" name="x_G2" id="x_G2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->G2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->G2->EditValue ?>"<?php echo $patient_an_registration_add->G2->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->G2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->G3->Visible) { // G3 ?>
	<div id="r_G3" class="form-group row">
		<label id="elh_patient_an_registration_G3" for="x_G3" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_G3" type="text/html"><?php echo $patient_an_registration_add->G3->caption() ?><?php echo $patient_an_registration_add->G3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->G3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G3" type="text/html"><span id="el_patient_an_registration_G3">
<input type="text" data-table="patient_an_registration" data-field="x_G3" name="x_G3" id="x_G3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->G3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->G3->EditValue ?>"<?php echo $patient_an_registration_add->G3->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->G3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
	<div id="r_DeliveryNDLSCS1" class="form-group row">
		<label id="elh_patient_an_registration_DeliveryNDLSCS1" for="x_DeliveryNDLSCS1" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DeliveryNDLSCS1" type="text/html"><?php echo $patient_an_registration_add->DeliveryNDLSCS1->caption() ?><?php echo $patient_an_registration_add->DeliveryNDLSCS1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->DeliveryNDLSCS1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS1" type="text/html"><span id="el_patient_an_registration_DeliveryNDLSCS1">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x_DeliveryNDLSCS1" id="x_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->DeliveryNDLSCS1->EditValue ?>"<?php echo $patient_an_registration_add->DeliveryNDLSCS1->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->DeliveryNDLSCS1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
	<div id="r_DeliveryNDLSCS2" class="form-group row">
		<label id="elh_patient_an_registration_DeliveryNDLSCS2" for="x_DeliveryNDLSCS2" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DeliveryNDLSCS2" type="text/html"><?php echo $patient_an_registration_add->DeliveryNDLSCS2->caption() ?><?php echo $patient_an_registration_add->DeliveryNDLSCS2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->DeliveryNDLSCS2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS2" type="text/html"><span id="el_patient_an_registration_DeliveryNDLSCS2">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x_DeliveryNDLSCS2" id="x_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->DeliveryNDLSCS2->EditValue ?>"<?php echo $patient_an_registration_add->DeliveryNDLSCS2->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->DeliveryNDLSCS2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
	<div id="r_DeliveryNDLSCS3" class="form-group row">
		<label id="elh_patient_an_registration_DeliveryNDLSCS3" for="x_DeliveryNDLSCS3" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DeliveryNDLSCS3" type="text/html"><?php echo $patient_an_registration_add->DeliveryNDLSCS3->caption() ?><?php echo $patient_an_registration_add->DeliveryNDLSCS3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->DeliveryNDLSCS3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS3" type="text/html"><span id="el_patient_an_registration_DeliveryNDLSCS3">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x_DeliveryNDLSCS3" id="x_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->DeliveryNDLSCS3->EditValue ?>"<?php echo $patient_an_registration_add->DeliveryNDLSCS3->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->DeliveryNDLSCS3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->BabySexweight1->Visible) { // BabySexweight1 ?>
	<div id="r_BabySexweight1" class="form-group row">
		<label id="elh_patient_an_registration_BabySexweight1" for="x_BabySexweight1" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_BabySexweight1" type="text/html"><?php echo $patient_an_registration_add->BabySexweight1->caption() ?><?php echo $patient_an_registration_add->BabySexweight1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->BabySexweight1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight1" type="text/html"><span id="el_patient_an_registration_BabySexweight1">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x_BabySexweight1" id="x_BabySexweight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->BabySexweight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->BabySexweight1->EditValue ?>"<?php echo $patient_an_registration_add->BabySexweight1->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->BabySexweight1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->BabySexweight2->Visible) { // BabySexweight2 ?>
	<div id="r_BabySexweight2" class="form-group row">
		<label id="elh_patient_an_registration_BabySexweight2" for="x_BabySexweight2" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_BabySexweight2" type="text/html"><?php echo $patient_an_registration_add->BabySexweight2->caption() ?><?php echo $patient_an_registration_add->BabySexweight2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->BabySexweight2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight2" type="text/html"><span id="el_patient_an_registration_BabySexweight2">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x_BabySexweight2" id="x_BabySexweight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->BabySexweight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->BabySexweight2->EditValue ?>"<?php echo $patient_an_registration_add->BabySexweight2->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->BabySexweight2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->BabySexweight3->Visible) { // BabySexweight3 ?>
	<div id="r_BabySexweight3" class="form-group row">
		<label id="elh_patient_an_registration_BabySexweight3" for="x_BabySexweight3" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_BabySexweight3" type="text/html"><?php echo $patient_an_registration_add->BabySexweight3->caption() ?><?php echo $patient_an_registration_add->BabySexweight3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->BabySexweight3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight3" type="text/html"><span id="el_patient_an_registration_BabySexweight3">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x_BabySexweight3" id="x_BabySexweight3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->BabySexweight3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->BabySexweight3->EditValue ?>"<?php echo $patient_an_registration_add->BabySexweight3->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->BabySexweight3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
	<div id="r_PastMedicalHistory" class="form-group row">
		<label id="elh_patient_an_registration_PastMedicalHistory" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PastMedicalHistory" type="text/html"><?php echo $patient_an_registration_add->PastMedicalHistory->caption() ?><?php echo $patient_an_registration_add->PastMedicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->PastMedicalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastMedicalHistory" type="text/html"><span id="el_patient_an_registration_PastMedicalHistory">
<div id="tp_x_PastMedicalHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-value-separator="<?php echo $patient_an_registration_add->PastMedicalHistory->displayValueSeparatorAttribute() ?>" name="x_PastMedicalHistory[]" id="x_PastMedicalHistory[]" value="{value}"<?php echo $patient_an_registration_add->PastMedicalHistory->editAttributes() ?>></div>
<div id="dsl_x_PastMedicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_add->PastMedicalHistory->checkBoxListHtml(FALSE, "x_PastMedicalHistory[]") ?>
</div></div>
</span></script>
<?php echo $patient_an_registration_add->PastMedicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
	<div id="r_PastSurgicalHistory" class="form-group row">
		<label id="elh_patient_an_registration_PastSurgicalHistory" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PastSurgicalHistory" type="text/html"><?php echo $patient_an_registration_add->PastSurgicalHistory->caption() ?><?php echo $patient_an_registration_add->PastSurgicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->PastSurgicalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastSurgicalHistory" type="text/html"><span id="el_patient_an_registration_PastSurgicalHistory">
<div id="tp_x_PastSurgicalHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-value-separator="<?php echo $patient_an_registration_add->PastSurgicalHistory->displayValueSeparatorAttribute() ?>" name="x_PastSurgicalHistory[]" id="x_PastSurgicalHistory[]" value="{value}"<?php echo $patient_an_registration_add->PastSurgicalHistory->editAttributes() ?>></div>
<div id="dsl_x_PastSurgicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_add->PastSurgicalHistory->checkBoxListHtml(FALSE, "x_PastSurgicalHistory[]") ?>
</div></div>
</span></script>
<?php echo $patient_an_registration_add->PastSurgicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->FamilyHistory->Visible) { // FamilyHistory ?>
	<div id="r_FamilyHistory" class="form-group row">
		<label id="elh_patient_an_registration_FamilyHistory" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_FamilyHistory" type="text/html"><?php echo $patient_an_registration_add->FamilyHistory->caption() ?><?php echo $patient_an_registration_add->FamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->FamilyHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_FamilyHistory" type="text/html"><span id="el_patient_an_registration_FamilyHistory">
<div id="tp_x_FamilyHistory" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_FamilyHistory" data-value-separator="<?php echo $patient_an_registration_add->FamilyHistory->displayValueSeparatorAttribute() ?>" name="x_FamilyHistory[]" id="x_FamilyHistory[]" value="{value}"<?php echo $patient_an_registration_add->FamilyHistory->editAttributes() ?>></div>
<div id="dsl_x_FamilyHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_add->FamilyHistory->checkBoxListHtml(FALSE, "x_FamilyHistory[]") ?>
</div></div>
</span></script>
<?php echo $patient_an_registration_add->FamilyHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Viability->Visible) { // Viability ?>
	<div id="r_Viability" class="form-group row">
		<label id="elh_patient_an_registration_Viability" for="x_Viability" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Viability" type="text/html"><?php echo $patient_an_registration_add->Viability->caption() ?><?php echo $patient_an_registration_add->Viability->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Viability->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability" type="text/html"><span id="el_patient_an_registration_Viability">
<input type="text" data-table="patient_an_registration" data-field="x_Viability" name="x_Viability" id="x_Viability" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Viability->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Viability->EditValue ?>"<?php echo $patient_an_registration_add->Viability->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Viability->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ViabilityDATE->Visible) { // ViabilityDATE ?>
	<div id="r_ViabilityDATE" class="form-group row">
		<label id="elh_patient_an_registration_ViabilityDATE" for="x_ViabilityDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ViabilityDATE" type="text/html"><?php echo $patient_an_registration_add->ViabilityDATE->caption() ?><?php echo $patient_an_registration_add->ViabilityDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ViabilityDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ViabilityDATE" type="text/html"><span id="el_patient_an_registration_ViabilityDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x_ViabilityDATE" id="x_ViabilityDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->ViabilityDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->ViabilityDATE->EditValue ?>"<?php echo $patient_an_registration_add->ViabilityDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->ViabilityDATE->ReadOnly && !$patient_an_registration_add->ViabilityDATE->Disabled && !isset($patient_an_registration_add->ViabilityDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->ViabilityDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->ViabilityDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
	<div id="r_ViabilityREPORT" class="form-group row">
		<label id="elh_patient_an_registration_ViabilityREPORT" for="x_ViabilityREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ViabilityREPORT" type="text/html"><?php echo $patient_an_registration_add->ViabilityREPORT->caption() ?><?php echo $patient_an_registration_add->ViabilityREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ViabilityREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ViabilityREPORT" type="text/html"><span id="el_patient_an_registration_ViabilityREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x_ViabilityREPORT" id="x_ViabilityREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->ViabilityREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->ViabilityREPORT->EditValue ?>"<?php echo $patient_an_registration_add->ViabilityREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->ViabilityREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Viability2->Visible) { // Viability2 ?>
	<div id="r_Viability2" class="form-group row">
		<label id="elh_patient_an_registration_Viability2" for="x_Viability2" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Viability2" type="text/html"><?php echo $patient_an_registration_add->Viability2->caption() ?><?php echo $patient_an_registration_add->Viability2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Viability2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2" type="text/html"><span id="el_patient_an_registration_Viability2">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2" name="x_Viability2" id="x_Viability2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Viability2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Viability2->EditValue ?>"<?php echo $patient_an_registration_add->Viability2->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Viability2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Viability2DATE->Visible) { // Viability2DATE ?>
	<div id="r_Viability2DATE" class="form-group row">
		<label id="elh_patient_an_registration_Viability2DATE" for="x_Viability2DATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Viability2DATE" type="text/html"><?php echo $patient_an_registration_add->Viability2DATE->caption() ?><?php echo $patient_an_registration_add->Viability2DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Viability2DATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2DATE" type="text/html"><span id="el_patient_an_registration_Viability2DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x_Viability2DATE" id="x_Viability2DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Viability2DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Viability2DATE->EditValue ?>"<?php echo $patient_an_registration_add->Viability2DATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->Viability2DATE->ReadOnly && !$patient_an_registration_add->Viability2DATE->Disabled && !isset($patient_an_registration_add->Viability2DATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->Viability2DATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->Viability2DATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Viability2REPORT->Visible) { // Viability2REPORT ?>
	<div id="r_Viability2REPORT" class="form-group row">
		<label id="elh_patient_an_registration_Viability2REPORT" for="x_Viability2REPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Viability2REPORT" type="text/html"><?php echo $patient_an_registration_add->Viability2REPORT->caption() ?><?php echo $patient_an_registration_add->Viability2REPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Viability2REPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2REPORT" type="text/html"><span id="el_patient_an_registration_Viability2REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x_Viability2REPORT" id="x_Viability2REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Viability2REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Viability2REPORT->EditValue ?>"<?php echo $patient_an_registration_add->Viability2REPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Viability2REPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->NTscan->Visible) { // NTscan ?>
	<div id="r_NTscan" class="form-group row">
		<label id="elh_patient_an_registration_NTscan" for="x_NTscan" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NTscan" type="text/html"><?php echo $patient_an_registration_add->NTscan->caption() ?><?php echo $patient_an_registration_add->NTscan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->NTscan->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscan" type="text/html"><span id="el_patient_an_registration_NTscan">
<input type="text" data-table="patient_an_registration" data-field="x_NTscan" name="x_NTscan" id="x_NTscan" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->NTscan->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->NTscan->EditValue ?>"<?php echo $patient_an_registration_add->NTscan->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->NTscan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->NTscanDATE->Visible) { // NTscanDATE ?>
	<div id="r_NTscanDATE" class="form-group row">
		<label id="elh_patient_an_registration_NTscanDATE" for="x_NTscanDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NTscanDATE" type="text/html"><?php echo $patient_an_registration_add->NTscanDATE->caption() ?><?php echo $patient_an_registration_add->NTscanDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->NTscanDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscanDATE" type="text/html"><span id="el_patient_an_registration_NTscanDATE">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x_NTscanDATE" id="x_NTscanDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->NTscanDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->NTscanDATE->EditValue ?>"<?php echo $patient_an_registration_add->NTscanDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->NTscanDATE->ReadOnly && !$patient_an_registration_add->NTscanDATE->Disabled && !isset($patient_an_registration_add->NTscanDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->NTscanDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->NTscanDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->NTscanREPORT->Visible) { // NTscanREPORT ?>
	<div id="r_NTscanREPORT" class="form-group row">
		<label id="elh_patient_an_registration_NTscanREPORT" for="x_NTscanREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NTscanREPORT" type="text/html"><?php echo $patient_an_registration_add->NTscanREPORT->caption() ?><?php echo $patient_an_registration_add->NTscanREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->NTscanREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscanREPORT" type="text/html"><span id="el_patient_an_registration_NTscanREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x_NTscanREPORT" id="x_NTscanREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->NTscanREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->NTscanREPORT->EditValue ?>"<?php echo $patient_an_registration_add->NTscanREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->NTscanREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->EarlyTarget->Visible) { // EarlyTarget ?>
	<div id="r_EarlyTarget" class="form-group row">
		<label id="elh_patient_an_registration_EarlyTarget" for="x_EarlyTarget" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EarlyTarget" type="text/html"><?php echo $patient_an_registration_add->EarlyTarget->caption() ?><?php echo $patient_an_registration_add->EarlyTarget->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->EarlyTarget->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTarget" type="text/html"><span id="el_patient_an_registration_EarlyTarget">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x_EarlyTarget" id="x_EarlyTarget" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->EarlyTarget->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->EarlyTarget->EditValue ?>"<?php echo $patient_an_registration_add->EarlyTarget->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->EarlyTarget->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
	<div id="r_EarlyTargetDATE" class="form-group row">
		<label id="elh_patient_an_registration_EarlyTargetDATE" for="x_EarlyTargetDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EarlyTargetDATE" type="text/html"><?php echo $patient_an_registration_add->EarlyTargetDATE->caption() ?><?php echo $patient_an_registration_add->EarlyTargetDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->EarlyTargetDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTargetDATE" type="text/html"><span id="el_patient_an_registration_EarlyTargetDATE">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x_EarlyTargetDATE" id="x_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->EarlyTargetDATE->EditValue ?>"<?php echo $patient_an_registration_add->EarlyTargetDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->EarlyTargetDATE->ReadOnly && !$patient_an_registration_add->EarlyTargetDATE->Disabled && !isset($patient_an_registration_add->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->EarlyTargetDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
	<div id="r_EarlyTargetREPORT" class="form-group row">
		<label id="elh_patient_an_registration_EarlyTargetREPORT" for="x_EarlyTargetREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EarlyTargetREPORT" type="text/html"><?php echo $patient_an_registration_add->EarlyTargetREPORT->caption() ?><?php echo $patient_an_registration_add->EarlyTargetREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->EarlyTargetREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTargetREPORT" type="text/html"><span id="el_patient_an_registration_EarlyTargetREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x_EarlyTargetREPORT" id="x_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->EarlyTargetREPORT->EditValue ?>"<?php echo $patient_an_registration_add->EarlyTargetREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->EarlyTargetREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Anomaly->Visible) { // Anomaly ?>
	<div id="r_Anomaly" class="form-group row">
		<label id="elh_patient_an_registration_Anomaly" for="x_Anomaly" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Anomaly" type="text/html"><?php echo $patient_an_registration_add->Anomaly->caption() ?><?php echo $patient_an_registration_add->Anomaly->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Anomaly->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Anomaly" type="text/html"><span id="el_patient_an_registration_Anomaly">
<input type="text" data-table="patient_an_registration" data-field="x_Anomaly" name="x_Anomaly" id="x_Anomaly" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Anomaly->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Anomaly->EditValue ?>"<?php echo $patient_an_registration_add->Anomaly->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Anomaly->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->AnomalyDATE->Visible) { // AnomalyDATE ?>
	<div id="r_AnomalyDATE" class="form-group row">
		<label id="elh_patient_an_registration_AnomalyDATE" for="x_AnomalyDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_AnomalyDATE" type="text/html"><?php echo $patient_an_registration_add->AnomalyDATE->caption() ?><?php echo $patient_an_registration_add->AnomalyDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->AnomalyDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_AnomalyDATE" type="text/html"><span id="el_patient_an_registration_AnomalyDATE">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x_AnomalyDATE" id="x_AnomalyDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->AnomalyDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->AnomalyDATE->EditValue ?>"<?php echo $patient_an_registration_add->AnomalyDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->AnomalyDATE->ReadOnly && !$patient_an_registration_add->AnomalyDATE->Disabled && !isset($patient_an_registration_add->AnomalyDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->AnomalyDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->AnomalyDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
	<div id="r_AnomalyREPORT" class="form-group row">
		<label id="elh_patient_an_registration_AnomalyREPORT" for="x_AnomalyREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_AnomalyREPORT" type="text/html"><?php echo $patient_an_registration_add->AnomalyREPORT->caption() ?><?php echo $patient_an_registration_add->AnomalyREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->AnomalyREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_AnomalyREPORT" type="text/html"><span id="el_patient_an_registration_AnomalyREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x_AnomalyREPORT" id="x_AnomalyREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->AnomalyREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->AnomalyREPORT->EditValue ?>"<?php echo $patient_an_registration_add->AnomalyREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->AnomalyREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Growth->Visible) { // Growth ?>
	<div id="r_Growth" class="form-group row">
		<label id="elh_patient_an_registration_Growth" for="x_Growth" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Growth" type="text/html"><?php echo $patient_an_registration_add->Growth->caption() ?><?php echo $patient_an_registration_add->Growth->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Growth->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth" type="text/html"><span id="el_patient_an_registration_Growth">
<input type="text" data-table="patient_an_registration" data-field="x_Growth" name="x_Growth" id="x_Growth" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Growth->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Growth->EditValue ?>"<?php echo $patient_an_registration_add->Growth->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Growth->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->GrowthDATE->Visible) { // GrowthDATE ?>
	<div id="r_GrowthDATE" class="form-group row">
		<label id="elh_patient_an_registration_GrowthDATE" for="x_GrowthDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_GrowthDATE" type="text/html"><?php echo $patient_an_registration_add->GrowthDATE->caption() ?><?php echo $patient_an_registration_add->GrowthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->GrowthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_GrowthDATE" type="text/html"><span id="el_patient_an_registration_GrowthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x_GrowthDATE" id="x_GrowthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->GrowthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->GrowthDATE->EditValue ?>"<?php echo $patient_an_registration_add->GrowthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->GrowthDATE->ReadOnly && !$patient_an_registration_add->GrowthDATE->Disabled && !isset($patient_an_registration_add->GrowthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->GrowthDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->GrowthDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->GrowthREPORT->Visible) { // GrowthREPORT ?>
	<div id="r_GrowthREPORT" class="form-group row">
		<label id="elh_patient_an_registration_GrowthREPORT" for="x_GrowthREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_GrowthREPORT" type="text/html"><?php echo $patient_an_registration_add->GrowthREPORT->caption() ?><?php echo $patient_an_registration_add->GrowthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->GrowthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_GrowthREPORT" type="text/html"><span id="el_patient_an_registration_GrowthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x_GrowthREPORT" id="x_GrowthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->GrowthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->GrowthREPORT->EditValue ?>"<?php echo $patient_an_registration_add->GrowthREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->GrowthREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Growth1->Visible) { // Growth1 ?>
	<div id="r_Growth1" class="form-group row">
		<label id="elh_patient_an_registration_Growth1" for="x_Growth1" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Growth1" type="text/html"><?php echo $patient_an_registration_add->Growth1->caption() ?><?php echo $patient_an_registration_add->Growth1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Growth1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1" type="text/html"><span id="el_patient_an_registration_Growth1">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1" name="x_Growth1" id="x_Growth1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Growth1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Growth1->EditValue ?>"<?php echo $patient_an_registration_add->Growth1->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Growth1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Growth1DATE->Visible) { // Growth1DATE ?>
	<div id="r_Growth1DATE" class="form-group row">
		<label id="elh_patient_an_registration_Growth1DATE" for="x_Growth1DATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Growth1DATE" type="text/html"><?php echo $patient_an_registration_add->Growth1DATE->caption() ?><?php echo $patient_an_registration_add->Growth1DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Growth1DATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1DATE" type="text/html"><span id="el_patient_an_registration_Growth1DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x_Growth1DATE" id="x_Growth1DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Growth1DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Growth1DATE->EditValue ?>"<?php echo $patient_an_registration_add->Growth1DATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->Growth1DATE->ReadOnly && !$patient_an_registration_add->Growth1DATE->Disabled && !isset($patient_an_registration_add->Growth1DATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->Growth1DATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->Growth1DATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Growth1REPORT->Visible) { // Growth1REPORT ?>
	<div id="r_Growth1REPORT" class="form-group row">
		<label id="elh_patient_an_registration_Growth1REPORT" for="x_Growth1REPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Growth1REPORT" type="text/html"><?php echo $patient_an_registration_add->Growth1REPORT->caption() ?><?php echo $patient_an_registration_add->Growth1REPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Growth1REPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1REPORT" type="text/html"><span id="el_patient_an_registration_Growth1REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x_Growth1REPORT" id="x_Growth1REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Growth1REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Growth1REPORT->EditValue ?>"<?php echo $patient_an_registration_add->Growth1REPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Growth1REPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ANProfile->Visible) { // ANProfile ?>
	<div id="r_ANProfile" class="form-group row">
		<label id="elh_patient_an_registration_ANProfile" for="x_ANProfile" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANProfile" type="text/html"><?php echo $patient_an_registration_add->ANProfile->caption() ?><?php echo $patient_an_registration_add->ANProfile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ANProfile->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfile" type="text/html"><span id="el_patient_an_registration_ANProfile">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfile" name="x_ANProfile" id="x_ANProfile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->ANProfile->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->ANProfile->EditValue ?>"<?php echo $patient_an_registration_add->ANProfile->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->ANProfile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ANProfileDATE->Visible) { // ANProfileDATE ?>
	<div id="r_ANProfileDATE" class="form-group row">
		<label id="elh_patient_an_registration_ANProfileDATE" for="x_ANProfileDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANProfileDATE" type="text/html"><?php echo $patient_an_registration_add->ANProfileDATE->caption() ?><?php echo $patient_an_registration_add->ANProfileDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ANProfileDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileDATE" type="text/html"><span id="el_patient_an_registration_ANProfileDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x_ANProfileDATE" id="x_ANProfileDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->ANProfileDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->ANProfileDATE->EditValue ?>"<?php echo $patient_an_registration_add->ANProfileDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->ANProfileDATE->ReadOnly && !$patient_an_registration_add->ANProfileDATE->Disabled && !isset($patient_an_registration_add->ANProfileDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->ANProfileDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->ANProfileDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
	<div id="r_ANProfileINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_ANProfileINHOUSE" for="x_ANProfileINHOUSE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANProfileINHOUSE" type="text/html"><?php echo $patient_an_registration_add->ANProfileINHOUSE->caption() ?><?php echo $patient_an_registration_add->ANProfileINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ANProfileINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileINHOUSE" type="text/html"><span id="el_patient_an_registration_ANProfileINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x_ANProfileINHOUSE" id="x_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->ANProfileINHOUSE->EditValue ?>"<?php echo $patient_an_registration_add->ANProfileINHOUSE->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->ANProfileINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
	<div id="r_ANProfileREPORT" class="form-group row">
		<label id="elh_patient_an_registration_ANProfileREPORT" for="x_ANProfileREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANProfileREPORT" type="text/html"><?php echo $patient_an_registration_add->ANProfileREPORT->caption() ?><?php echo $patient_an_registration_add->ANProfileREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ANProfileREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileREPORT" type="text/html"><span id="el_patient_an_registration_ANProfileREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x_ANProfileREPORT" id="x_ANProfileREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->ANProfileREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->ANProfileREPORT->EditValue ?>"<?php echo $patient_an_registration_add->ANProfileREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->ANProfileREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->DualMarker->Visible) { // DualMarker ?>
	<div id="r_DualMarker" class="form-group row">
		<label id="elh_patient_an_registration_DualMarker" for="x_DualMarker" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DualMarker" type="text/html"><?php echo $patient_an_registration_add->DualMarker->caption() ?><?php echo $patient_an_registration_add->DualMarker->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->DualMarker->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarker" type="text/html"><span id="el_patient_an_registration_DualMarker">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarker" name="x_DualMarker" id="x_DualMarker" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->DualMarker->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->DualMarker->EditValue ?>"<?php echo $patient_an_registration_add->DualMarker->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->DualMarker->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
	<div id="r_DualMarkerDATE" class="form-group row">
		<label id="elh_patient_an_registration_DualMarkerDATE" for="x_DualMarkerDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DualMarkerDATE" type="text/html"><?php echo $patient_an_registration_add->DualMarkerDATE->caption() ?><?php echo $patient_an_registration_add->DualMarkerDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->DualMarkerDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerDATE" type="text/html"><span id="el_patient_an_registration_DualMarkerDATE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x_DualMarkerDATE" id="x_DualMarkerDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->DualMarkerDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->DualMarkerDATE->EditValue ?>"<?php echo $patient_an_registration_add->DualMarkerDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->DualMarkerDATE->ReadOnly && !$patient_an_registration_add->DualMarkerDATE->Disabled && !isset($patient_an_registration_add->DualMarkerDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->DualMarkerDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
	<div id="r_DualMarkerINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_DualMarkerINHOUSE" for="x_DualMarkerINHOUSE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DualMarkerINHOUSE" type="text/html"><?php echo $patient_an_registration_add->DualMarkerINHOUSE->caption() ?><?php echo $patient_an_registration_add->DualMarkerINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->DualMarkerINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerINHOUSE" type="text/html"><span id="el_patient_an_registration_DualMarkerINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x_DualMarkerINHOUSE" id="x_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->DualMarkerINHOUSE->EditValue ?>"<?php echo $patient_an_registration_add->DualMarkerINHOUSE->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->DualMarkerINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
	<div id="r_DualMarkerREPORT" class="form-group row">
		<label id="elh_patient_an_registration_DualMarkerREPORT" for="x_DualMarkerREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DualMarkerREPORT" type="text/html"><?php echo $patient_an_registration_add->DualMarkerREPORT->caption() ?><?php echo $patient_an_registration_add->DualMarkerREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->DualMarkerREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerREPORT" type="text/html"><span id="el_patient_an_registration_DualMarkerREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x_DualMarkerREPORT" id="x_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->DualMarkerREPORT->EditValue ?>"<?php echo $patient_an_registration_add->DualMarkerREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->DualMarkerREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Quadruple->Visible) { // Quadruple ?>
	<div id="r_Quadruple" class="form-group row">
		<label id="elh_patient_an_registration_Quadruple" for="x_Quadruple" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Quadruple" type="text/html"><?php echo $patient_an_registration_add->Quadruple->caption() ?><?php echo $patient_an_registration_add->Quadruple->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Quadruple->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Quadruple" type="text/html"><span id="el_patient_an_registration_Quadruple">
<input type="text" data-table="patient_an_registration" data-field="x_Quadruple" name="x_Quadruple" id="x_Quadruple" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Quadruple->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Quadruple->EditValue ?>"<?php echo $patient_an_registration_add->Quadruple->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Quadruple->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
	<div id="r_QuadrupleDATE" class="form-group row">
		<label id="elh_patient_an_registration_QuadrupleDATE" for="x_QuadrupleDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_QuadrupleDATE" type="text/html"><?php echo $patient_an_registration_add->QuadrupleDATE->caption() ?><?php echo $patient_an_registration_add->QuadrupleDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->QuadrupleDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleDATE" type="text/html"><span id="el_patient_an_registration_QuadrupleDATE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x_QuadrupleDATE" id="x_QuadrupleDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->QuadrupleDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->QuadrupleDATE->EditValue ?>"<?php echo $patient_an_registration_add->QuadrupleDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->QuadrupleDATE->ReadOnly && !$patient_an_registration_add->QuadrupleDATE->Disabled && !isset($patient_an_registration_add->QuadrupleDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->QuadrupleDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
	<div id="r_QuadrupleINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_QuadrupleINHOUSE" for="x_QuadrupleINHOUSE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_QuadrupleINHOUSE" type="text/html"><?php echo $patient_an_registration_add->QuadrupleINHOUSE->caption() ?><?php echo $patient_an_registration_add->QuadrupleINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->QuadrupleINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleINHOUSE" type="text/html"><span id="el_patient_an_registration_QuadrupleINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x_QuadrupleINHOUSE" id="x_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->QuadrupleINHOUSE->EditValue ?>"<?php echo $patient_an_registration_add->QuadrupleINHOUSE->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->QuadrupleINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
	<div id="r_QuadrupleREPORT" class="form-group row">
		<label id="elh_patient_an_registration_QuadrupleREPORT" for="x_QuadrupleREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_QuadrupleREPORT" type="text/html"><?php echo $patient_an_registration_add->QuadrupleREPORT->caption() ?><?php echo $patient_an_registration_add->QuadrupleREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->QuadrupleREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleREPORT" type="text/html"><span id="el_patient_an_registration_QuadrupleREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x_QuadrupleREPORT" id="x_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->QuadrupleREPORT->EditValue ?>"<?php echo $patient_an_registration_add->QuadrupleREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->QuadrupleREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A5month->Visible) { // A5month ?>
	<div id="r_A5month" class="form-group row">
		<label id="elh_patient_an_registration_A5month" for="x_A5month" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A5month" type="text/html"><?php echo $patient_an_registration_add->A5month->caption() ?><?php echo $patient_an_registration_add->A5month->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A5month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5month" type="text/html"><span id="el_patient_an_registration_A5month">
<input type="text" data-table="patient_an_registration" data-field="x_A5month" name="x_A5month" id="x_A5month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A5month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A5month->EditValue ?>"<?php echo $patient_an_registration_add->A5month->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->A5month->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A5monthDATE->Visible) { // A5monthDATE ?>
	<div id="r_A5monthDATE" class="form-group row">
		<label id="elh_patient_an_registration_A5monthDATE" for="x_A5monthDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A5monthDATE" type="text/html"><?php echo $patient_an_registration_add->A5monthDATE->caption() ?><?php echo $patient_an_registration_add->A5monthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A5monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthDATE" type="text/html"><span id="el_patient_an_registration_A5monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x_A5monthDATE" id="x_A5monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A5monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A5monthDATE->EditValue ?>"<?php echo $patient_an_registration_add->A5monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->A5monthDATE->ReadOnly && !$patient_an_registration_add->A5monthDATE->Disabled && !isset($patient_an_registration_add->A5monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->A5monthDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->A5monthDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
	<div id="r_A5monthINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_A5monthINHOUSE" for="x_A5monthINHOUSE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A5monthINHOUSE" type="text/html"><?php echo $patient_an_registration_add->A5monthINHOUSE->caption() ?><?php echo $patient_an_registration_add->A5monthINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A5monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthINHOUSE" type="text/html"><span id="el_patient_an_registration_A5monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x_A5monthINHOUSE" id="x_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A5monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_add->A5monthINHOUSE->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->A5monthINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A5monthREPORT->Visible) { // A5monthREPORT ?>
	<div id="r_A5monthREPORT" class="form-group row">
		<label id="elh_patient_an_registration_A5monthREPORT" for="x_A5monthREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A5monthREPORT" type="text/html"><?php echo $patient_an_registration_add->A5monthREPORT->caption() ?><?php echo $patient_an_registration_add->A5monthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A5monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthREPORT" type="text/html"><span id="el_patient_an_registration_A5monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x_A5monthREPORT" id="x_A5monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A5monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A5monthREPORT->EditValue ?>"<?php echo $patient_an_registration_add->A5monthREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->A5monthREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A7month->Visible) { // A7month ?>
	<div id="r_A7month" class="form-group row">
		<label id="elh_patient_an_registration_A7month" for="x_A7month" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A7month" type="text/html"><?php echo $patient_an_registration_add->A7month->caption() ?><?php echo $patient_an_registration_add->A7month->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A7month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7month" type="text/html"><span id="el_patient_an_registration_A7month">
<input type="text" data-table="patient_an_registration" data-field="x_A7month" name="x_A7month" id="x_A7month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A7month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A7month->EditValue ?>"<?php echo $patient_an_registration_add->A7month->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->A7month->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A7monthDATE->Visible) { // A7monthDATE ?>
	<div id="r_A7monthDATE" class="form-group row">
		<label id="elh_patient_an_registration_A7monthDATE" for="x_A7monthDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A7monthDATE" type="text/html"><?php echo $patient_an_registration_add->A7monthDATE->caption() ?><?php echo $patient_an_registration_add->A7monthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A7monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthDATE" type="text/html"><span id="el_patient_an_registration_A7monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x_A7monthDATE" id="x_A7monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A7monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A7monthDATE->EditValue ?>"<?php echo $patient_an_registration_add->A7monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->A7monthDATE->ReadOnly && !$patient_an_registration_add->A7monthDATE->Disabled && !isset($patient_an_registration_add->A7monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->A7monthDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->A7monthDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
	<div id="r_A7monthINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_A7monthINHOUSE" for="x_A7monthINHOUSE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A7monthINHOUSE" type="text/html"><?php echo $patient_an_registration_add->A7monthINHOUSE->caption() ?><?php echo $patient_an_registration_add->A7monthINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A7monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthINHOUSE" type="text/html"><span id="el_patient_an_registration_A7monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x_A7monthINHOUSE" id="x_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A7monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_add->A7monthINHOUSE->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->A7monthINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A7monthREPORT->Visible) { // A7monthREPORT ?>
	<div id="r_A7monthREPORT" class="form-group row">
		<label id="elh_patient_an_registration_A7monthREPORT" for="x_A7monthREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A7monthREPORT" type="text/html"><?php echo $patient_an_registration_add->A7monthREPORT->caption() ?><?php echo $patient_an_registration_add->A7monthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A7monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthREPORT" type="text/html"><span id="el_patient_an_registration_A7monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x_A7monthREPORT" id="x_A7monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A7monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A7monthREPORT->EditValue ?>"<?php echo $patient_an_registration_add->A7monthREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->A7monthREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A9month->Visible) { // A9month ?>
	<div id="r_A9month" class="form-group row">
		<label id="elh_patient_an_registration_A9month" for="x_A9month" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A9month" type="text/html"><?php echo $patient_an_registration_add->A9month->caption() ?><?php echo $patient_an_registration_add->A9month->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A9month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9month" type="text/html"><span id="el_patient_an_registration_A9month">
<input type="text" data-table="patient_an_registration" data-field="x_A9month" name="x_A9month" id="x_A9month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A9month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A9month->EditValue ?>"<?php echo $patient_an_registration_add->A9month->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->A9month->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A9monthDATE->Visible) { // A9monthDATE ?>
	<div id="r_A9monthDATE" class="form-group row">
		<label id="elh_patient_an_registration_A9monthDATE" for="x_A9monthDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A9monthDATE" type="text/html"><?php echo $patient_an_registration_add->A9monthDATE->caption() ?><?php echo $patient_an_registration_add->A9monthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A9monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthDATE" type="text/html"><span id="el_patient_an_registration_A9monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x_A9monthDATE" id="x_A9monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A9monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A9monthDATE->EditValue ?>"<?php echo $patient_an_registration_add->A9monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->A9monthDATE->ReadOnly && !$patient_an_registration_add->A9monthDATE->Disabled && !isset($patient_an_registration_add->A9monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->A9monthDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->A9monthDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
	<div id="r_A9monthINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_A9monthINHOUSE" for="x_A9monthINHOUSE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A9monthINHOUSE" type="text/html"><?php echo $patient_an_registration_add->A9monthINHOUSE->caption() ?><?php echo $patient_an_registration_add->A9monthINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A9monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthINHOUSE" type="text/html"><span id="el_patient_an_registration_A9monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x_A9monthINHOUSE" id="x_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A9monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration_add->A9monthINHOUSE->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->A9monthINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->A9monthREPORT->Visible) { // A9monthREPORT ?>
	<div id="r_A9monthREPORT" class="form-group row">
		<label id="elh_patient_an_registration_A9monthREPORT" for="x_A9monthREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A9monthREPORT" type="text/html"><?php echo $patient_an_registration_add->A9monthREPORT->caption() ?><?php echo $patient_an_registration_add->A9monthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->A9monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthREPORT" type="text/html"><span id="el_patient_an_registration_A9monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x_A9monthREPORT" id="x_A9monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->A9monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->A9monthREPORT->EditValue ?>"<?php echo $patient_an_registration_add->A9monthREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->A9monthREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->INJ->Visible) { // INJ ?>
	<div id="r_INJ" class="form-group row">
		<label id="elh_patient_an_registration_INJ" for="x_INJ" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_INJ" type="text/html"><?php echo $patient_an_registration_add->INJ->caption() ?><?php echo $patient_an_registration_add->INJ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->INJ->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJ" type="text/html"><span id="el_patient_an_registration_INJ">
<input type="text" data-table="patient_an_registration" data-field="x_INJ" name="x_INJ" id="x_INJ" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->INJ->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->INJ->EditValue ?>"<?php echo $patient_an_registration_add->INJ->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->INJ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->INJDATE->Visible) { // INJDATE ?>
	<div id="r_INJDATE" class="form-group row">
		<label id="elh_patient_an_registration_INJDATE" for="x_INJDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_INJDATE" type="text/html"><?php echo $patient_an_registration_add->INJDATE->caption() ?><?php echo $patient_an_registration_add->INJDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->INJDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJDATE" type="text/html"><span id="el_patient_an_registration_INJDATE">
<input type="text" data-table="patient_an_registration" data-field="x_INJDATE" name="x_INJDATE" id="x_INJDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->INJDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->INJDATE->EditValue ?>"<?php echo $patient_an_registration_add->INJDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->INJDATE->ReadOnly && !$patient_an_registration_add->INJDATE->Disabled && !isset($patient_an_registration_add->INJDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->INJDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->INJDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->INJINHOUSE->Visible) { // INJINHOUSE ?>
	<div id="r_INJINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_INJINHOUSE" for="x_INJINHOUSE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_INJINHOUSE" type="text/html"><?php echo $patient_an_registration_add->INJINHOUSE->caption() ?><?php echo $patient_an_registration_add->INJINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->INJINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJINHOUSE" type="text/html"><span id="el_patient_an_registration_INJINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x_INJINHOUSE" id="x_INJINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->INJINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->INJINHOUSE->EditValue ?>"<?php echo $patient_an_registration_add->INJINHOUSE->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->INJINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->INJREPORT->Visible) { // INJREPORT ?>
	<div id="r_INJREPORT" class="form-group row">
		<label id="elh_patient_an_registration_INJREPORT" for="x_INJREPORT" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_INJREPORT" type="text/html"><?php echo $patient_an_registration_add->INJREPORT->caption() ?><?php echo $patient_an_registration_add->INJREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->INJREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJREPORT" type="text/html"><span id="el_patient_an_registration_INJREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_INJREPORT" name="x_INJREPORT" id="x_INJREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->INJREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->INJREPORT->EditValue ?>"<?php echo $patient_an_registration_add->INJREPORT->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->INJREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Bleeding->Visible) { // Bleeding ?>
	<div id="r_Bleeding" class="form-group row">
		<label id="elh_patient_an_registration_Bleeding" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Bleeding" type="text/html"><?php echo $patient_an_registration_add->Bleeding->caption() ?><?php echo $patient_an_registration_add->Bleeding->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Bleeding->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Bleeding" type="text/html"><span id="el_patient_an_registration_Bleeding">
<div id="tp_x_Bleeding" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_Bleeding" data-value-separator="<?php echo $patient_an_registration_add->Bleeding->displayValueSeparatorAttribute() ?>" name="x_Bleeding[]" id="x_Bleeding[]" value="{value}"<?php echo $patient_an_registration_add->Bleeding->editAttributes() ?>></div>
<div id="dsl_x_Bleeding" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_add->Bleeding->checkBoxListHtml(FALSE, "x_Bleeding[]") ?>
</div></div>
</span></script>
<?php echo $patient_an_registration_add->Bleeding->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Hypothyroidism->Visible) { // Hypothyroidism ?>
	<div id="r_Hypothyroidism" class="form-group row">
		<label id="elh_patient_an_registration_Hypothyroidism" for="x_Hypothyroidism" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Hypothyroidism" type="text/html"><?php echo $patient_an_registration_add->Hypothyroidism->caption() ?><?php echo $patient_an_registration_add->Hypothyroidism->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Hypothyroidism->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Hypothyroidism" type="text/html"><span id="el_patient_an_registration_Hypothyroidism">
<input type="text" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x_Hypothyroidism" id="x_Hypothyroidism" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Hypothyroidism->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Hypothyroidism->EditValue ?>"<?php echo $patient_an_registration_add->Hypothyroidism->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Hypothyroidism->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->PICMENumber->Visible) { // PICMENumber ?>
	<div id="r_PICMENumber" class="form-group row">
		<label id="elh_patient_an_registration_PICMENumber" for="x_PICMENumber" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PICMENumber" type="text/html"><?php echo $patient_an_registration_add->PICMENumber->caption() ?><?php echo $patient_an_registration_add->PICMENumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->PICMENumber->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PICMENumber" type="text/html"><span id="el_patient_an_registration_PICMENumber">
<input type="text" data-table="patient_an_registration" data-field="x_PICMENumber" name="x_PICMENumber" id="x_PICMENumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->PICMENumber->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->PICMENumber->EditValue ?>"<?php echo $patient_an_registration_add->PICMENumber->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->PICMENumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Outcome->Visible) { // Outcome ?>
	<div id="r_Outcome" class="form-group row">
		<label id="elh_patient_an_registration_Outcome" for="x_Outcome" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Outcome" type="text/html"><?php echo $patient_an_registration_add->Outcome->caption() ?><?php echo $patient_an_registration_add->Outcome->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Outcome->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Outcome" type="text/html"><span id="el_patient_an_registration_Outcome">
<input type="text" data-table="patient_an_registration" data-field="x_Outcome" name="x_Outcome" id="x_Outcome" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Outcome->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Outcome->EditValue ?>"<?php echo $patient_an_registration_add->Outcome->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Outcome->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->DateofAdmission->Visible) { // DateofAdmission ?>
	<div id="r_DateofAdmission" class="form-group row">
		<label id="elh_patient_an_registration_DateofAdmission" for="x_DateofAdmission" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DateofAdmission" type="text/html"><?php echo $patient_an_registration_add->DateofAdmission->caption() ?><?php echo $patient_an_registration_add->DateofAdmission->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->DateofAdmission->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DateofAdmission" type="text/html"><span id="el_patient_an_registration_DateofAdmission">
<input type="text" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x_DateofAdmission" id="x_DateofAdmission" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->DateofAdmission->EditValue ?>"<?php echo $patient_an_registration_add->DateofAdmission->editAttributes() ?>>
<?php if (!$patient_an_registration_add->DateofAdmission->ReadOnly && !$patient_an_registration_add->DateofAdmission->Disabled && !isset($patient_an_registration_add->DateofAdmission->EditAttrs["readonly"]) && !isset($patient_an_registration_add->DateofAdmission->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->DateofAdmission->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->DateodProcedure->Visible) { // DateodProcedure ?>
	<div id="r_DateodProcedure" class="form-group row">
		<label id="elh_patient_an_registration_DateodProcedure" for="x_DateodProcedure" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DateodProcedure" type="text/html"><?php echo $patient_an_registration_add->DateodProcedure->caption() ?><?php echo $patient_an_registration_add->DateodProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->DateodProcedure->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DateodProcedure" type="text/html"><span id="el_patient_an_registration_DateodProcedure">
<input type="text" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x_DateodProcedure" id="x_DateodProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->DateodProcedure->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->DateodProcedure->EditValue ?>"<?php echo $patient_an_registration_add->DateodProcedure->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->DateodProcedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Miscarriage->Visible) { // Miscarriage ?>
	<div id="r_Miscarriage" class="form-group row">
		<label id="elh_patient_an_registration_Miscarriage" for="x_Miscarriage" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Miscarriage" type="text/html"><?php echo $patient_an_registration_add->Miscarriage->caption() ?><?php echo $patient_an_registration_add->Miscarriage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Miscarriage->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Miscarriage" type="text/html"><span id="el_patient_an_registration_Miscarriage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Miscarriage" data-value-separator="<?php echo $patient_an_registration_add->Miscarriage->displayValueSeparatorAttribute() ?>" id="x_Miscarriage" name="x_Miscarriage"<?php echo $patient_an_registration_add->Miscarriage->editAttributes() ?>>
			<?php echo $patient_an_registration_add->Miscarriage->selectOptionListHtml("x_Miscarriage") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->Miscarriage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
	<div id="r_ModeOfDelivery" class="form-group row">
		<label id="elh_patient_an_registration_ModeOfDelivery" for="x_ModeOfDelivery" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ModeOfDelivery" type="text/html"><?php echo $patient_an_registration_add->ModeOfDelivery->caption() ?><?php echo $patient_an_registration_add->ModeOfDelivery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ModeOfDelivery->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ModeOfDelivery" type="text/html"><span id="el_patient_an_registration_ModeOfDelivery">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-value-separator="<?php echo $patient_an_registration_add->ModeOfDelivery->displayValueSeparatorAttribute() ?>" id="x_ModeOfDelivery" name="x_ModeOfDelivery"<?php echo $patient_an_registration_add->ModeOfDelivery->editAttributes() ?>>
			<?php echo $patient_an_registration_add->ModeOfDelivery->selectOptionListHtml("x_ModeOfDelivery") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->ModeOfDelivery->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ND->Visible) { // ND ?>
	<div id="r_ND" class="form-group row">
		<label id="elh_patient_an_registration_ND" for="x_ND" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ND" type="text/html"><?php echo $patient_an_registration_add->ND->caption() ?><?php echo $patient_an_registration_add->ND->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ND->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ND" type="text/html"><span id="el_patient_an_registration_ND">
<input type="text" data-table="patient_an_registration" data-field="x_ND" name="x_ND" id="x_ND" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->ND->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->ND->EditValue ?>"<?php echo $patient_an_registration_add->ND->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->ND->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->NDS->Visible) { // NDS ?>
	<div id="r_NDS" class="form-group row">
		<label id="elh_patient_an_registration_NDS" for="x_NDS" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NDS" type="text/html"><?php echo $patient_an_registration_add->NDS->caption() ?><?php echo $patient_an_registration_add->NDS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->NDS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NDS" type="text/html"><span id="el_patient_an_registration_NDS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDS" data-value-separator="<?php echo $patient_an_registration_add->NDS->displayValueSeparatorAttribute() ?>" id="x_NDS" name="x_NDS"<?php echo $patient_an_registration_add->NDS->editAttributes() ?>>
			<?php echo $patient_an_registration_add->NDS->selectOptionListHtml("x_NDS") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->NDS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->NDP->Visible) { // NDP ?>
	<div id="r_NDP" class="form-group row">
		<label id="elh_patient_an_registration_NDP" for="x_NDP" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NDP" type="text/html"><?php echo $patient_an_registration_add->NDP->caption() ?><?php echo $patient_an_registration_add->NDP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->NDP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NDP" type="text/html"><span id="el_patient_an_registration_NDP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDP" data-value-separator="<?php echo $patient_an_registration_add->NDP->displayValueSeparatorAttribute() ?>" id="x_NDP" name="x_NDP"<?php echo $patient_an_registration_add->NDP->editAttributes() ?>>
			<?php echo $patient_an_registration_add->NDP->selectOptionListHtml("x_NDP") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->NDP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Vaccum->Visible) { // Vaccum ?>
	<div id="r_Vaccum" class="form-group row">
		<label id="elh_patient_an_registration_Vaccum" for="x_Vaccum" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Vaccum" type="text/html"><?php echo $patient_an_registration_add->Vaccum->caption() ?><?php echo $patient_an_registration_add->Vaccum->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Vaccum->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Vaccum" type="text/html"><span id="el_patient_an_registration_Vaccum">
<input type="text" data-table="patient_an_registration" data-field="x_Vaccum" name="x_Vaccum" id="x_Vaccum" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Vaccum->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Vaccum->EditValue ?>"<?php echo $patient_an_registration_add->Vaccum->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Vaccum->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->VaccumS->Visible) { // VaccumS ?>
	<div id="r_VaccumS" class="form-group row">
		<label id="elh_patient_an_registration_VaccumS" for="x_VaccumS" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_VaccumS" type="text/html"><?php echo $patient_an_registration_add->VaccumS->caption() ?><?php echo $patient_an_registration_add->VaccumS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->VaccumS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_VaccumS" type="text/html"><span id="el_patient_an_registration_VaccumS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumS" data-value-separator="<?php echo $patient_an_registration_add->VaccumS->displayValueSeparatorAttribute() ?>" id="x_VaccumS" name="x_VaccumS"<?php echo $patient_an_registration_add->VaccumS->editAttributes() ?>>
			<?php echo $patient_an_registration_add->VaccumS->selectOptionListHtml("x_VaccumS") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->VaccumS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->VaccumP->Visible) { // VaccumP ?>
	<div id="r_VaccumP" class="form-group row">
		<label id="elh_patient_an_registration_VaccumP" for="x_VaccumP" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_VaccumP" type="text/html"><?php echo $patient_an_registration_add->VaccumP->caption() ?><?php echo $patient_an_registration_add->VaccumP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->VaccumP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_VaccumP" type="text/html"><span id="el_patient_an_registration_VaccumP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumP" data-value-separator="<?php echo $patient_an_registration_add->VaccumP->displayValueSeparatorAttribute() ?>" id="x_VaccumP" name="x_VaccumP"<?php echo $patient_an_registration_add->VaccumP->editAttributes() ?>>
			<?php echo $patient_an_registration_add->VaccumP->selectOptionListHtml("x_VaccumP") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->VaccumP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Forceps->Visible) { // Forceps ?>
	<div id="r_Forceps" class="form-group row">
		<label id="elh_patient_an_registration_Forceps" for="x_Forceps" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Forceps" type="text/html"><?php echo $patient_an_registration_add->Forceps->caption() ?><?php echo $patient_an_registration_add->Forceps->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Forceps->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Forceps" type="text/html"><span id="el_patient_an_registration_Forceps">
<input type="text" data-table="patient_an_registration" data-field="x_Forceps" name="x_Forceps" id="x_Forceps" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Forceps->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Forceps->EditValue ?>"<?php echo $patient_an_registration_add->Forceps->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Forceps->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ForcepsS->Visible) { // ForcepsS ?>
	<div id="r_ForcepsS" class="form-group row">
		<label id="elh_patient_an_registration_ForcepsS" for="x_ForcepsS" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ForcepsS" type="text/html"><?php echo $patient_an_registration_add->ForcepsS->caption() ?><?php echo $patient_an_registration_add->ForcepsS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ForcepsS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ForcepsS" type="text/html"><span id="el_patient_an_registration_ForcepsS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsS" data-value-separator="<?php echo $patient_an_registration_add->ForcepsS->displayValueSeparatorAttribute() ?>" id="x_ForcepsS" name="x_ForcepsS"<?php echo $patient_an_registration_add->ForcepsS->editAttributes() ?>>
			<?php echo $patient_an_registration_add->ForcepsS->selectOptionListHtml("x_ForcepsS") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->ForcepsS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ForcepsP->Visible) { // ForcepsP ?>
	<div id="r_ForcepsP" class="form-group row">
		<label id="elh_patient_an_registration_ForcepsP" for="x_ForcepsP" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ForcepsP" type="text/html"><?php echo $patient_an_registration_add->ForcepsP->caption() ?><?php echo $patient_an_registration_add->ForcepsP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ForcepsP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ForcepsP" type="text/html"><span id="el_patient_an_registration_ForcepsP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsP" data-value-separator="<?php echo $patient_an_registration_add->ForcepsP->displayValueSeparatorAttribute() ?>" id="x_ForcepsP" name="x_ForcepsP"<?php echo $patient_an_registration_add->ForcepsP->editAttributes() ?>>
			<?php echo $patient_an_registration_add->ForcepsP->selectOptionListHtml("x_ForcepsP") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->ForcepsP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Elective->Visible) { // Elective ?>
	<div id="r_Elective" class="form-group row">
		<label id="elh_patient_an_registration_Elective" for="x_Elective" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Elective" type="text/html"><?php echo $patient_an_registration_add->Elective->caption() ?><?php echo $patient_an_registration_add->Elective->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Elective->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Elective" type="text/html"><span id="el_patient_an_registration_Elective">
<input type="text" data-table="patient_an_registration" data-field="x_Elective" name="x_Elective" id="x_Elective" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Elective->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Elective->EditValue ?>"<?php echo $patient_an_registration_add->Elective->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Elective->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ElectiveS->Visible) { // ElectiveS ?>
	<div id="r_ElectiveS" class="form-group row">
		<label id="elh_patient_an_registration_ElectiveS" for="x_ElectiveS" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ElectiveS" type="text/html"><?php echo $patient_an_registration_add->ElectiveS->caption() ?><?php echo $patient_an_registration_add->ElectiveS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ElectiveS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ElectiveS" type="text/html"><span id="el_patient_an_registration_ElectiveS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveS" data-value-separator="<?php echo $patient_an_registration_add->ElectiveS->displayValueSeparatorAttribute() ?>" id="x_ElectiveS" name="x_ElectiveS"<?php echo $patient_an_registration_add->ElectiveS->editAttributes() ?>>
			<?php echo $patient_an_registration_add->ElectiveS->selectOptionListHtml("x_ElectiveS") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->ElectiveS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ElectiveP->Visible) { // ElectiveP ?>
	<div id="r_ElectiveP" class="form-group row">
		<label id="elh_patient_an_registration_ElectiveP" for="x_ElectiveP" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ElectiveP" type="text/html"><?php echo $patient_an_registration_add->ElectiveP->caption() ?><?php echo $patient_an_registration_add->ElectiveP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ElectiveP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ElectiveP" type="text/html"><span id="el_patient_an_registration_ElectiveP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveP" data-value-separator="<?php echo $patient_an_registration_add->ElectiveP->displayValueSeparatorAttribute() ?>" id="x_ElectiveP" name="x_ElectiveP"<?php echo $patient_an_registration_add->ElectiveP->editAttributes() ?>>
			<?php echo $patient_an_registration_add->ElectiveP->selectOptionListHtml("x_ElectiveP") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->ElectiveP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Emergency->Visible) { // Emergency ?>
	<div id="r_Emergency" class="form-group row">
		<label id="elh_patient_an_registration_Emergency" for="x_Emergency" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Emergency" type="text/html"><?php echo $patient_an_registration_add->Emergency->caption() ?><?php echo $patient_an_registration_add->Emergency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Emergency->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Emergency" type="text/html"><span id="el_patient_an_registration_Emergency">
<input type="text" data-table="patient_an_registration" data-field="x_Emergency" name="x_Emergency" id="x_Emergency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Emergency->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Emergency->EditValue ?>"<?php echo $patient_an_registration_add->Emergency->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Emergency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->EmergencyS->Visible) { // EmergencyS ?>
	<div id="r_EmergencyS" class="form-group row">
		<label id="elh_patient_an_registration_EmergencyS" for="x_EmergencyS" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EmergencyS" type="text/html"><?php echo $patient_an_registration_add->EmergencyS->caption() ?><?php echo $patient_an_registration_add->EmergencyS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->EmergencyS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EmergencyS" type="text/html"><span id="el_patient_an_registration_EmergencyS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyS" data-value-separator="<?php echo $patient_an_registration_add->EmergencyS->displayValueSeparatorAttribute() ?>" id="x_EmergencyS" name="x_EmergencyS"<?php echo $patient_an_registration_add->EmergencyS->editAttributes() ?>>
			<?php echo $patient_an_registration_add->EmergencyS->selectOptionListHtml("x_EmergencyS") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->EmergencyS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->EmergencyP->Visible) { // EmergencyP ?>
	<div id="r_EmergencyP" class="form-group row">
		<label id="elh_patient_an_registration_EmergencyP" for="x_EmergencyP" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EmergencyP" type="text/html"><?php echo $patient_an_registration_add->EmergencyP->caption() ?><?php echo $patient_an_registration_add->EmergencyP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->EmergencyP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EmergencyP" type="text/html"><span id="el_patient_an_registration_EmergencyP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyP" data-value-separator="<?php echo $patient_an_registration_add->EmergencyP->displayValueSeparatorAttribute() ?>" id="x_EmergencyP" name="x_EmergencyP"<?php echo $patient_an_registration_add->EmergencyP->editAttributes() ?>>
			<?php echo $patient_an_registration_add->EmergencyP->selectOptionListHtml("x_EmergencyP") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->EmergencyP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Maturity->Visible) { // Maturity ?>
	<div id="r_Maturity" class="form-group row">
		<label id="elh_patient_an_registration_Maturity" for="x_Maturity" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Maturity" type="text/html"><?php echo $patient_an_registration_add->Maturity->caption() ?><?php echo $patient_an_registration_add->Maturity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Maturity->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Maturity" type="text/html"><span id="el_patient_an_registration_Maturity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Maturity" data-value-separator="<?php echo $patient_an_registration_add->Maturity->displayValueSeparatorAttribute() ?>" id="x_Maturity" name="x_Maturity"<?php echo $patient_an_registration_add->Maturity->editAttributes() ?>>
			<?php echo $patient_an_registration_add->Maturity->selectOptionListHtml("x_Maturity") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->Maturity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Baby1->Visible) { // Baby1 ?>
	<div id="r_Baby1" class="form-group row">
		<label id="elh_patient_an_registration_Baby1" for="x_Baby1" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Baby1" type="text/html"><?php echo $patient_an_registration_add->Baby1->caption() ?><?php echo $patient_an_registration_add->Baby1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Baby1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Baby1" type="text/html"><span id="el_patient_an_registration_Baby1">
<input type="text" data-table="patient_an_registration" data-field="x_Baby1" name="x_Baby1" id="x_Baby1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Baby1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Baby1->EditValue ?>"<?php echo $patient_an_registration_add->Baby1->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Baby1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Baby2->Visible) { // Baby2 ?>
	<div id="r_Baby2" class="form-group row">
		<label id="elh_patient_an_registration_Baby2" for="x_Baby2" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Baby2" type="text/html"><?php echo $patient_an_registration_add->Baby2->caption() ?><?php echo $patient_an_registration_add->Baby2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Baby2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Baby2" type="text/html"><span id="el_patient_an_registration_Baby2">
<input type="text" data-table="patient_an_registration" data-field="x_Baby2" name="x_Baby2" id="x_Baby2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Baby2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Baby2->EditValue ?>"<?php echo $patient_an_registration_add->Baby2->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Baby2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->sex1->Visible) { // sex1 ?>
	<div id="r_sex1" class="form-group row">
		<label id="elh_patient_an_registration_sex1" for="x_sex1" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_sex1" type="text/html"><?php echo $patient_an_registration_add->sex1->caption() ?><?php echo $patient_an_registration_add->sex1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->sex1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_sex1" type="text/html"><span id="el_patient_an_registration_sex1">
<input type="text" data-table="patient_an_registration" data-field="x_sex1" name="x_sex1" id="x_sex1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->sex1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->sex1->EditValue ?>"<?php echo $patient_an_registration_add->sex1->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->sex1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->sex2->Visible) { // sex2 ?>
	<div id="r_sex2" class="form-group row">
		<label id="elh_patient_an_registration_sex2" for="x_sex2" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_sex2" type="text/html"><?php echo $patient_an_registration_add->sex2->caption() ?><?php echo $patient_an_registration_add->sex2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->sex2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_sex2" type="text/html"><span id="el_patient_an_registration_sex2">
<input type="text" data-table="patient_an_registration" data-field="x_sex2" name="x_sex2" id="x_sex2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->sex2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->sex2->EditValue ?>"<?php echo $patient_an_registration_add->sex2->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->sex2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->weight1->Visible) { // weight1 ?>
	<div id="r_weight1" class="form-group row">
		<label id="elh_patient_an_registration_weight1" for="x_weight1" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_weight1" type="text/html"><?php echo $patient_an_registration_add->weight1->caption() ?><?php echo $patient_an_registration_add->weight1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->weight1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_weight1" type="text/html"><span id="el_patient_an_registration_weight1">
<input type="text" data-table="patient_an_registration" data-field="x_weight1" name="x_weight1" id="x_weight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->weight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->weight1->EditValue ?>"<?php echo $patient_an_registration_add->weight1->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->weight1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->weight2->Visible) { // weight2 ?>
	<div id="r_weight2" class="form-group row">
		<label id="elh_patient_an_registration_weight2" for="x_weight2" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_weight2" type="text/html"><?php echo $patient_an_registration_add->weight2->caption() ?><?php echo $patient_an_registration_add->weight2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->weight2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_weight2" type="text/html"><span id="el_patient_an_registration_weight2">
<input type="text" data-table="patient_an_registration" data-field="x_weight2" name="x_weight2" id="x_weight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->weight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->weight2->EditValue ?>"<?php echo $patient_an_registration_add->weight2->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->weight2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->NICU1->Visible) { // NICU1 ?>
	<div id="r_NICU1" class="form-group row">
		<label id="elh_patient_an_registration_NICU1" for="x_NICU1" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NICU1" type="text/html"><?php echo $patient_an_registration_add->NICU1->caption() ?><?php echo $patient_an_registration_add->NICU1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->NICU1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NICU1" type="text/html"><span id="el_patient_an_registration_NICU1">
<input type="text" data-table="patient_an_registration" data-field="x_NICU1" name="x_NICU1" id="x_NICU1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->NICU1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->NICU1->EditValue ?>"<?php echo $patient_an_registration_add->NICU1->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->NICU1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->NICU2->Visible) { // NICU2 ?>
	<div id="r_NICU2" class="form-group row">
		<label id="elh_patient_an_registration_NICU2" for="x_NICU2" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NICU2" type="text/html"><?php echo $patient_an_registration_add->NICU2->caption() ?><?php echo $patient_an_registration_add->NICU2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->NICU2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NICU2" type="text/html"><span id="el_patient_an_registration_NICU2">
<input type="text" data-table="patient_an_registration" data-field="x_NICU2" name="x_NICU2" id="x_NICU2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->NICU2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->NICU2->EditValue ?>"<?php echo $patient_an_registration_add->NICU2->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->NICU2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Jaundice1->Visible) { // Jaundice1 ?>
	<div id="r_Jaundice1" class="form-group row">
		<label id="elh_patient_an_registration_Jaundice1" for="x_Jaundice1" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Jaundice1" type="text/html"><?php echo $patient_an_registration_add->Jaundice1->caption() ?><?php echo $patient_an_registration_add->Jaundice1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Jaundice1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Jaundice1" type="text/html"><span id="el_patient_an_registration_Jaundice1">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice1" name="x_Jaundice1" id="x_Jaundice1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Jaundice1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Jaundice1->EditValue ?>"<?php echo $patient_an_registration_add->Jaundice1->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Jaundice1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Jaundice2->Visible) { // Jaundice2 ?>
	<div id="r_Jaundice2" class="form-group row">
		<label id="elh_patient_an_registration_Jaundice2" for="x_Jaundice2" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Jaundice2" type="text/html"><?php echo $patient_an_registration_add->Jaundice2->caption() ?><?php echo $patient_an_registration_add->Jaundice2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Jaundice2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Jaundice2" type="text/html"><span id="el_patient_an_registration_Jaundice2">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice2" name="x_Jaundice2" id="x_Jaundice2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Jaundice2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Jaundice2->EditValue ?>"<?php echo $patient_an_registration_add->Jaundice2->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Jaundice2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Others1->Visible) { // Others1 ?>
	<div id="r_Others1" class="form-group row">
		<label id="elh_patient_an_registration_Others1" for="x_Others1" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Others1" type="text/html"><?php echo $patient_an_registration_add->Others1->caption() ?><?php echo $patient_an_registration_add->Others1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Others1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Others1" type="text/html"><span id="el_patient_an_registration_Others1">
<input type="text" data-table="patient_an_registration" data-field="x_Others1" name="x_Others1" id="x_Others1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Others1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Others1->EditValue ?>"<?php echo $patient_an_registration_add->Others1->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Others1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->Others2->Visible) { // Others2 ?>
	<div id="r_Others2" class="form-group row">
		<label id="elh_patient_an_registration_Others2" for="x_Others2" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Others2" type="text/html"><?php echo $patient_an_registration_add->Others2->caption() ?><?php echo $patient_an_registration_add->Others2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->Others2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Others2" type="text/html"><span id="el_patient_an_registration_Others2">
<input type="text" data-table="patient_an_registration" data-field="x_Others2" name="x_Others2" id="x_Others2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->Others2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->Others2->EditValue ?>"<?php echo $patient_an_registration_add->Others2->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->Others2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->SpillOverReasons->Visible) { // SpillOverReasons ?>
	<div id="r_SpillOverReasons" class="form-group row">
		<label id="elh_patient_an_registration_SpillOverReasons" for="x_SpillOverReasons" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_SpillOverReasons" type="text/html"><?php echo $patient_an_registration_add->SpillOverReasons->caption() ?><?php echo $patient_an_registration_add->SpillOverReasons->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->SpillOverReasons->cellAttributes() ?>>
<script id="tpx_patient_an_registration_SpillOverReasons" type="text/html"><span id="el_patient_an_registration_SpillOverReasons">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-value-separator="<?php echo $patient_an_registration_add->SpillOverReasons->displayValueSeparatorAttribute() ?>" id="x_SpillOverReasons" name="x_SpillOverReasons"<?php echo $patient_an_registration_add->SpillOverReasons->editAttributes() ?>>
			<?php echo $patient_an_registration_add->SpillOverReasons->selectOptionListHtml("x_SpillOverReasons") ?>
		</select>
</div>
</span></script>
<?php echo $patient_an_registration_add->SpillOverReasons->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ANClosed->Visible) { // ANClosed ?>
	<div id="r_ANClosed" class="form-group row">
		<label id="elh_patient_an_registration_ANClosed" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANClosed" type="text/html"><?php echo $patient_an_registration_add->ANClosed->caption() ?><?php echo $patient_an_registration_add->ANClosed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ANClosed->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANClosed" type="text/html"><span id="el_patient_an_registration_ANClosed">
<div id="tp_x_ANClosed" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_an_registration" data-field="x_ANClosed" data-value-separator="<?php echo $patient_an_registration_add->ANClosed->displayValueSeparatorAttribute() ?>" name="x_ANClosed[]" id="x_ANClosed[]" value="{value}"<?php echo $patient_an_registration_add->ANClosed->editAttributes() ?>></div>
<div id="dsl_x_ANClosed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration_add->ANClosed->checkBoxListHtml(FALSE, "x_ANClosed[]") ?>
</div></div>
</span></script>
<?php echo $patient_an_registration_add->ANClosed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ANClosedDATE->Visible) { // ANClosedDATE ?>
	<div id="r_ANClosedDATE" class="form-group row">
		<label id="elh_patient_an_registration_ANClosedDATE" for="x_ANClosedDATE" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANClosedDATE" type="text/html"><?php echo $patient_an_registration_add->ANClosedDATE->caption() ?><?php echo $patient_an_registration_add->ANClosedDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ANClosedDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANClosedDATE" type="text/html"><span id="el_patient_an_registration_ANClosedDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x_ANClosedDATE" id="x_ANClosedDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->ANClosedDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->ANClosedDATE->EditValue ?>"<?php echo $patient_an_registration_add->ANClosedDATE->editAttributes() ?>>
<?php if (!$patient_an_registration_add->ANClosedDATE->ReadOnly && !$patient_an_registration_add->ANClosedDATE->Disabled && !isset($patient_an_registration_add->ANClosedDATE->EditAttrs["readonly"]) && !isset($patient_an_registration_add->ANClosedDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_an_registration_add->ANClosedDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
	<div id="r_PastMedicalHistoryOthers" class="form-group row">
		<label id="elh_patient_an_registration_PastMedicalHistoryOthers" for="x_PastMedicalHistoryOthers" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PastMedicalHistoryOthers" type="text/html"><?php echo $patient_an_registration_add->PastMedicalHistoryOthers->caption() ?><?php echo $patient_an_registration_add->PastMedicalHistoryOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->PastMedicalHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastMedicalHistoryOthers" type="text/html"><span id="el_patient_an_registration_PastMedicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x_PastMedicalHistoryOthers" id="x_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->PastMedicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_add->PastMedicalHistoryOthers->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->PastMedicalHistoryOthers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
	<div id="r_PastSurgicalHistoryOthers" class="form-group row">
		<label id="elh_patient_an_registration_PastSurgicalHistoryOthers" for="x_PastSurgicalHistoryOthers" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PastSurgicalHistoryOthers" type="text/html"><?php echo $patient_an_registration_add->PastSurgicalHistoryOthers->caption() ?><?php echo $patient_an_registration_add->PastSurgicalHistoryOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->PastSurgicalHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastSurgicalHistoryOthers" type="text/html"><span id="el_patient_an_registration_PastSurgicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x_PastSurgicalHistoryOthers" id="x_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->PastSurgicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_add->PastSurgicalHistoryOthers->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->PastSurgicalHistoryOthers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
	<div id="r_FamilyHistoryOthers" class="form-group row">
		<label id="elh_patient_an_registration_FamilyHistoryOthers" for="x_FamilyHistoryOthers" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_FamilyHistoryOthers" type="text/html"><?php echo $patient_an_registration_add->FamilyHistoryOthers->caption() ?><?php echo $patient_an_registration_add->FamilyHistoryOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->FamilyHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_FamilyHistoryOthers" type="text/html"><span id="el_patient_an_registration_FamilyHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x_FamilyHistoryOthers" id="x_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->FamilyHistoryOthers->EditValue ?>"<?php echo $patient_an_registration_add->FamilyHistoryOthers->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->FamilyHistoryOthers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
	<div id="r_PresentPregnancyComplicationsOthers" class="form-group row">
		<label id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" for="x_PresentPregnancyComplicationsOthers" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PresentPregnancyComplicationsOthers" type="text/html"><?php echo $patient_an_registration_add->PresentPregnancyComplicationsOthers->caption() ?><?php echo $patient_an_registration_add->PresentPregnancyComplicationsOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PresentPregnancyComplicationsOthers" type="text/html"><span id="el_patient_an_registration_PresentPregnancyComplicationsOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x_PresentPregnancyComplicationsOthers" id="x_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->PresentPregnancyComplicationsOthers->EditValue ?>"<?php echo $patient_an_registration_add->PresentPregnancyComplicationsOthers->editAttributes() ?>>
</span></script>
<?php echo $patient_an_registration_add->PresentPregnancyComplicationsOthers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration_add->ETdate->Visible) { // ETdate ?>
	<div id="r_ETdate" class="form-group row">
		<label id="elh_patient_an_registration_ETdate" for="x_ETdate" class="<?php echo $patient_an_registration_add->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ETdate" type="text/html"><?php echo $patient_an_registration_add->ETdate->caption() ?><?php echo $patient_an_registration_add->ETdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_an_registration_add->RightColumnClass ?>"><div <?php echo $patient_an_registration_add->ETdate->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ETdate" type="text/html"><span id="el_patient_an_registration_ETdate">
<input type="text" data-table="patient_an_registration" data-field="x_ETdate" name="x_ETdate" id="x_ETdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration_add->ETdate->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration_add->ETdate->EditValue ?>"<?php echo $patient_an_registration_add->ETdate->editAttributes() ?>>
<?php if (!$patient_an_registration_add->ETdate->ReadOnly && !$patient_an_registration_add->ETdate->Disabled && !isset($patient_an_registration_add->ETdate->EditAttrs["readonly"]) && !isset($patient_an_registration_add->ETdate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_an_registrationadd_js">
loadjs.ready(["fpatient_an_registrationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_an_registrationadd", "x_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $patient_an_registration_add->ETdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_an_registrationadd" class="ew-custom-template"></div>
<script id="tpm_patient_an_registrationadd" type="text/html">
<div id="ct_patient_an_registration_add"><style>
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
.input-group {
	position: relative;
	display: flex;
	flex-wrap: inherit;
	align-items: stretch;
	width: 100%;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
::placeholder {
  color: red;
  opacity: 1; /* Firefox */
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: red;
}
::-ms-input-placeholder { /* Microsoft Edge */
 color: red;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["fk_id"];//
$showmaster = $_GET["showmaster"] ;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_opd_follow_up where id='".$Tid."'; ";
$resultsA = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where CoupleID='".$resultsA[0]["PatID"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
if($results[0]["Female"] != '')
{
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
}else{
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$resultsA[0]["PatientId"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$results[0]["id"]."'; ";
$resultsVitalHistory = $dbhelper->ExecuteRows($sql);
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
$pageHeader = 'Stimulation Chart For ' . $resultsA[0]["ARTCYCLE"];
?>	
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
  ?>
<div class="row">
<div class="col-md-6">
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
<div class="col-md-6">
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
<div class="row">
<?php echo $resultsVitalHistory[count($resultsVitalHistory)-1]["Chiefcomplaints"] ;?>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">AN Registration</h3>
			</div>
			<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_G"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_G")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_P"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_P")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_L"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_L")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_A"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_A")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_E"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_E")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_M"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_M")/}}</span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_LMP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_LMP")/}}</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ETdate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_ETdate")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_EDO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_EDO")/}}</span>
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_MenstrualHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_MenstrualHistory")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ObstetricHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_ObstetricHistory")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofGDM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PreviousHistoryofGDM")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistorofPIH"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PreviousHistorofPIH")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofIUGR"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PreviousHistoryofIUGR")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofOligohydramnios"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PreviousHistoryofOligohydramnios")/}}</span>
				</td>
				<td>				
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofPreterm"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PreviousHistoryofPreterm")/}}</span>
				</td>
				<td>				
				</td>
				<td>					 
				</td>
		 </tr> 
	</tbody>
</table>
</div>
<div class="card-body">
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">G</span></th>
		  		<th><span class="ew-cell">AN Complication</span></th>
		  		<th><span class="ew-cell">Delivery – ND/ LSCS Place of delivery</span></th>
		  		<th><span class="ew-cell">Baby Sex/ weight/ problems</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">1</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_G1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DeliveryNDLSCS1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_BabySexweight1")/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_G2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DeliveryNDLSCS2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_BabySexweight2")/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">3</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_G3")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DeliveryNDLSCS3")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_BabySexweight3")/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
</div>
<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastMedicalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PastMedicalHistory")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastMedicalHistoryOthers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PastMedicalHistoryOthers")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastSurgicalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PastSurgicalHistory")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastSurgicalHistoryOthers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PastSurgicalHistoryOthers")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_FamilyHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_FamilyHistory")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_FamilyHistoryOthers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_FamilyHistoryOthers")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
	</tbody>
</table>
</div>
<div class="card-body">
Scan :
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">Scan Type</span></th>
		  		<th><span class="ew-cell">Done Date</span></th>
		  		<th><span class="ew-cell">Report</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">Viability</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ViabilityDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ViabilityREPORT")/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Viability2</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_Viability2DATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_Viability2REPORT")/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">NTscan</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_NTscanDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_NTscanREPORT")/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">EarlyTarget</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_EarlyTargetDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_EarlyTargetREPORT")/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Anomaly</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_AnomalyDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_AnomalyREPORT")/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Growth</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_GrowthDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_GrowthREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Growth1</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_Growth1DATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_Growth1REPORT")/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
<div class="card-body">
Investigation:
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">Investigation Type</span></th>
		  		<th><span class="ew-cell">Done date</span></th>
		  		<th><span class="ew-cell">Inhouse / Outside Lab</span></th>
		  		<th><span class="ew-cell">Report</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">AN Profile</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ANProfileDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ANProfileINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ANProfileREPORT")/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Dual Marker</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DualMarkerDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DualMarkerINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DualMarkerREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Quadruple Marker</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_QuadrupleDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_QuadrupleINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_QuadrupleREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">5 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A5monthDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A5monthINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A5monthREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">7 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A7monthDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A7monthINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A7monthREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">9 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A9monthDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A9monthINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A9monthREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Inj Dexamethasone</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_INJDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_INJINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_INJREPORT")/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
<div class="card-body">
Present Pregnancy Complications :
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Bleeding"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Bleeding")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PresentPregnancyComplicationsOthers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PresentPregnancyComplicationsOthers")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PICMENumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PICMENumber")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Outcome"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Outcome")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		 <tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_DateofAdmission"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_DateofAdmission")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_DateodProcedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_DateodProcedure")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Miscarriage"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Miscarriage")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ModeOfDelivery"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_ModeOfDelivery")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
	</tbody>
</table>
</div>
<div class="card-body">
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">ND</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_NDS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_NDP")/}}</span></td>
		</tr> 
		<tr>
				<td><span class="ew-cell">Vaccum D</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_VaccumS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_VaccumP")/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">Forceps D</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ForcepsS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ForcepsP")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Elective LSCS</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ElectiveS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ElectiveP")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Emergency LSCS</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_EmergencyS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_EmergencyP")/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
</div>
{{include tmpl="#tpc_patient_an_registration_Maturity"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Maturity")/}}
<div class="card-body">
Paediatric : 
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">1</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Baby1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Baby1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_sex1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_sex1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_weight1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_weight1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_NICU1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_NICU1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Jaundice1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Jaundice1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Others1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Others1")/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Baby2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Baby2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_sex2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_sex2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_weight2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_weight2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_NICU2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_NICU2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Jaundice2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Jaundice2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Others2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Others2")/}}</span></td>
		</tr> 
	</tbody>
</table>
 <!-- /.card-body -->
</div>
{{include tmpl="#tpc_patient_an_registration_SpillOverReasons"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_SpillOverReasons")/}}
{{include tmpl="#tpc_patient_an_registration_ANClosed"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_ANClosed")/}}
{{include tmpl="#tpc_patient_an_registration_ANClosedDATE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_ANClosedDATE")/}}
		</div>
	</div>
</div>
</div>
</script>

<?php if (!$patient_an_registration_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_an_registration_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_an_registration_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_an_registration->Rows) ?> };
	ew.applyTemplate("tpd_patient_an_registrationadd", "tpm_patient_an_registrationadd", "patient_an_registrationadd", "<?php echo $patient_an_registration->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_an_registrationadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_an_registration_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$patient_an_registration_add->terminate();
?>