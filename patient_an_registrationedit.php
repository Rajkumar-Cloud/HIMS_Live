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
$patient_an_registration_edit = new patient_an_registration_edit();

// Run the page
$patient_an_registration_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_an_registration_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpatient_an_registrationedit = currentForm = new ew.Form("fpatient_an_registrationedit", "edit");

// Validate form
fpatient_an_registrationedit.validate = function() {
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
		<?php if ($patient_an_registration_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->id->caption(), $patient_an_registration->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->pid->Required) { ?>
			elm = this.getElements("x" + infix + "_pid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->pid->caption(), $patient_an_registration->pid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_an_registration->pid->errorMessage()) ?>");
		<?php if ($patient_an_registration_edit->fid->Required) { ?>
			elm = this.getElements("x" + infix + "_fid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->fid->caption(), $patient_an_registration->fid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_fid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_an_registration->fid->errorMessage()) ?>");
		<?php if ($patient_an_registration_edit->G->Required) { ?>
			elm = this.getElements("x" + infix + "_G");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->G->caption(), $patient_an_registration->G->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->P->Required) { ?>
			elm = this.getElements("x" + infix + "_P");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->P->caption(), $patient_an_registration->P->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->L->Required) { ?>
			elm = this.getElements("x" + infix + "_L");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->L->caption(), $patient_an_registration->L->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A->Required) { ?>
			elm = this.getElements("x" + infix + "_A");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A->caption(), $patient_an_registration->A->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->E->Required) { ?>
			elm = this.getElements("x" + infix + "_E");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->E->caption(), $patient_an_registration->E->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->M->Required) { ?>
			elm = this.getElements("x" + infix + "_M");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->M->caption(), $patient_an_registration->M->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->LMP->Required) { ?>
			elm = this.getElements("x" + infix + "_LMP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->LMP->caption(), $patient_an_registration->LMP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->EDO->Required) { ?>
			elm = this.getElements("x" + infix + "_EDO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EDO->caption(), $patient_an_registration->EDO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->MenstrualHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MenstrualHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->MenstrualHistory->caption(), $patient_an_registration->MenstrualHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->MaritalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MaritalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->MaritalHistory->caption(), $patient_an_registration->MaritalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ObstetricHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_ObstetricHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ObstetricHistory->caption(), $patient_an_registration->ObstetricHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->PreviousHistoryofGDM->Required) { ?>
			elm = this.getElements("x" + infix + "_PreviousHistoryofGDM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PreviousHistoryofGDM->caption(), $patient_an_registration->PreviousHistoryofGDM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->PreviousHistorofPIH->Required) { ?>
			elm = this.getElements("x" + infix + "_PreviousHistorofPIH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PreviousHistorofPIH->caption(), $patient_an_registration->PreviousHistorofPIH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->PreviousHistoryofIUGR->Required) { ?>
			elm = this.getElements("x" + infix + "_PreviousHistoryofIUGR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PreviousHistoryofIUGR->caption(), $patient_an_registration->PreviousHistoryofIUGR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->PreviousHistoryofOligohydramnios->Required) { ?>
			elm = this.getElements("x" + infix + "_PreviousHistoryofOligohydramnios");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PreviousHistoryofOligohydramnios->caption(), $patient_an_registration->PreviousHistoryofOligohydramnios->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->PreviousHistoryofPreterm->Required) { ?>
			elm = this.getElements("x" + infix + "_PreviousHistoryofPreterm");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PreviousHistoryofPreterm->caption(), $patient_an_registration->PreviousHistoryofPreterm->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->G1->Required) { ?>
			elm = this.getElements("x" + infix + "_G1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->G1->caption(), $patient_an_registration->G1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->G2->Required) { ?>
			elm = this.getElements("x" + infix + "_G2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->G2->caption(), $patient_an_registration->G2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->G3->Required) { ?>
			elm = this.getElements("x" + infix + "_G3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->G3->caption(), $patient_an_registration->G3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->DeliveryNDLSCS1->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryNDLSCS1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DeliveryNDLSCS1->caption(), $patient_an_registration->DeliveryNDLSCS1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->DeliveryNDLSCS2->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryNDLSCS2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DeliveryNDLSCS2->caption(), $patient_an_registration->DeliveryNDLSCS2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->DeliveryNDLSCS3->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryNDLSCS3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DeliveryNDLSCS3->caption(), $patient_an_registration->DeliveryNDLSCS3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->BabySexweight1->Required) { ?>
			elm = this.getElements("x" + infix + "_BabySexweight1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->BabySexweight1->caption(), $patient_an_registration->BabySexweight1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->BabySexweight2->Required) { ?>
			elm = this.getElements("x" + infix + "_BabySexweight2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->BabySexweight2->caption(), $patient_an_registration->BabySexweight2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->BabySexweight3->Required) { ?>
			elm = this.getElements("x" + infix + "_BabySexweight3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->BabySexweight3->caption(), $patient_an_registration->BabySexweight3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->PastMedicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_PastMedicalHistory[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PastMedicalHistory->caption(), $patient_an_registration->PastMedicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->PastSurgicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_PastSurgicalHistory[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PastSurgicalHistory->caption(), $patient_an_registration->PastSurgicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->FamilyHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_FamilyHistory[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->FamilyHistory->caption(), $patient_an_registration->FamilyHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Viability->Required) { ?>
			elm = this.getElements("x" + infix + "_Viability");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Viability->caption(), $patient_an_registration->Viability->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ViabilityDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_ViabilityDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ViabilityDATE->caption(), $patient_an_registration->ViabilityDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ViabilityREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_ViabilityREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ViabilityREPORT->caption(), $patient_an_registration->ViabilityREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Viability2->Required) { ?>
			elm = this.getElements("x" + infix + "_Viability2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Viability2->caption(), $patient_an_registration->Viability2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Viability2DATE->Required) { ?>
			elm = this.getElements("x" + infix + "_Viability2DATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Viability2DATE->caption(), $patient_an_registration->Viability2DATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Viability2REPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_Viability2REPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Viability2REPORT->caption(), $patient_an_registration->Viability2REPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->NTscan->Required) { ?>
			elm = this.getElements("x" + infix + "_NTscan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NTscan->caption(), $patient_an_registration->NTscan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->NTscanDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_NTscanDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NTscanDATE->caption(), $patient_an_registration->NTscanDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->NTscanREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_NTscanREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NTscanREPORT->caption(), $patient_an_registration->NTscanREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->EarlyTarget->Required) { ?>
			elm = this.getElements("x" + infix + "_EarlyTarget");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EarlyTarget->caption(), $patient_an_registration->EarlyTarget->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->EarlyTargetDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_EarlyTargetDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EarlyTargetDATE->caption(), $patient_an_registration->EarlyTargetDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->EarlyTargetREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_EarlyTargetREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EarlyTargetREPORT->caption(), $patient_an_registration->EarlyTargetREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Anomaly->Required) { ?>
			elm = this.getElements("x" + infix + "_Anomaly");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Anomaly->caption(), $patient_an_registration->Anomaly->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->AnomalyDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_AnomalyDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->AnomalyDATE->caption(), $patient_an_registration->AnomalyDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->AnomalyREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_AnomalyREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->AnomalyREPORT->caption(), $patient_an_registration->AnomalyREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Growth->Required) { ?>
			elm = this.getElements("x" + infix + "_Growth");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Growth->caption(), $patient_an_registration->Growth->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->GrowthDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_GrowthDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->GrowthDATE->caption(), $patient_an_registration->GrowthDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->GrowthREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_GrowthREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->GrowthREPORT->caption(), $patient_an_registration->GrowthREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Growth1->Required) { ?>
			elm = this.getElements("x" + infix + "_Growth1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Growth1->caption(), $patient_an_registration->Growth1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Growth1DATE->Required) { ?>
			elm = this.getElements("x" + infix + "_Growth1DATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Growth1DATE->caption(), $patient_an_registration->Growth1DATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Growth1REPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_Growth1REPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Growth1REPORT->caption(), $patient_an_registration->Growth1REPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ANProfile->Required) { ?>
			elm = this.getElements("x" + infix + "_ANProfile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANProfile->caption(), $patient_an_registration->ANProfile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ANProfileDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_ANProfileDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANProfileDATE->caption(), $patient_an_registration->ANProfileDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ANProfileINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_ANProfileINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANProfileINHOUSE->caption(), $patient_an_registration->ANProfileINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ANProfileREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_ANProfileREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANProfileREPORT->caption(), $patient_an_registration->ANProfileREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->DualMarker->Required) { ?>
			elm = this.getElements("x" + infix + "_DualMarker");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DualMarker->caption(), $patient_an_registration->DualMarker->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->DualMarkerDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_DualMarkerDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DualMarkerDATE->caption(), $patient_an_registration->DualMarkerDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->DualMarkerINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_DualMarkerINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DualMarkerINHOUSE->caption(), $patient_an_registration->DualMarkerINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->DualMarkerREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_DualMarkerREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DualMarkerREPORT->caption(), $patient_an_registration->DualMarkerREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Quadruple->Required) { ?>
			elm = this.getElements("x" + infix + "_Quadruple");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Quadruple->caption(), $patient_an_registration->Quadruple->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->QuadrupleDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_QuadrupleDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->QuadrupleDATE->caption(), $patient_an_registration->QuadrupleDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->QuadrupleINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_QuadrupleINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->QuadrupleINHOUSE->caption(), $patient_an_registration->QuadrupleINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->QuadrupleREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_QuadrupleREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->QuadrupleREPORT->caption(), $patient_an_registration->QuadrupleREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A5month->Required) { ?>
			elm = this.getElements("x" + infix + "_A5month");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A5month->caption(), $patient_an_registration->A5month->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A5monthDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_A5monthDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A5monthDATE->caption(), $patient_an_registration->A5monthDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A5monthINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_A5monthINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A5monthINHOUSE->caption(), $patient_an_registration->A5monthINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A5monthREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_A5monthREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A5monthREPORT->caption(), $patient_an_registration->A5monthREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A7month->Required) { ?>
			elm = this.getElements("x" + infix + "_A7month");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A7month->caption(), $patient_an_registration->A7month->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A7monthDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_A7monthDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A7monthDATE->caption(), $patient_an_registration->A7monthDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A7monthINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_A7monthINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A7monthINHOUSE->caption(), $patient_an_registration->A7monthINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A7monthREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_A7monthREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A7monthREPORT->caption(), $patient_an_registration->A7monthREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A9month->Required) { ?>
			elm = this.getElements("x" + infix + "_A9month");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A9month->caption(), $patient_an_registration->A9month->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A9monthDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_A9monthDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A9monthDATE->caption(), $patient_an_registration->A9monthDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A9monthINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_A9monthINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A9monthINHOUSE->caption(), $patient_an_registration->A9monthINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->A9monthREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_A9monthREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->A9monthREPORT->caption(), $patient_an_registration->A9monthREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->INJ->Required) { ?>
			elm = this.getElements("x" + infix + "_INJ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->INJ->caption(), $patient_an_registration->INJ->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->INJDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_INJDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->INJDATE->caption(), $patient_an_registration->INJDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->INJINHOUSE->Required) { ?>
			elm = this.getElements("x" + infix + "_INJINHOUSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->INJINHOUSE->caption(), $patient_an_registration->INJINHOUSE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->INJREPORT->Required) { ?>
			elm = this.getElements("x" + infix + "_INJREPORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->INJREPORT->caption(), $patient_an_registration->INJREPORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Bleeding->Required) { ?>
			elm = this.getElements("x" + infix + "_Bleeding[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Bleeding->caption(), $patient_an_registration->Bleeding->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Hypothyroidism->Required) { ?>
			elm = this.getElements("x" + infix + "_Hypothyroidism");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Hypothyroidism->caption(), $patient_an_registration->Hypothyroidism->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->PICMENumber->Required) { ?>
			elm = this.getElements("x" + infix + "_PICMENumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PICMENumber->caption(), $patient_an_registration->PICMENumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Outcome->Required) { ?>
			elm = this.getElements("x" + infix + "_Outcome");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Outcome->caption(), $patient_an_registration->Outcome->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->DateofAdmission->Required) { ?>
			elm = this.getElements("x" + infix + "_DateofAdmission");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DateofAdmission->caption(), $patient_an_registration->DateofAdmission->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->DateodProcedure->Required) { ?>
			elm = this.getElements("x" + infix + "_DateodProcedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->DateodProcedure->caption(), $patient_an_registration->DateodProcedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Miscarriage->Required) { ?>
			elm = this.getElements("x" + infix + "_Miscarriage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Miscarriage->caption(), $patient_an_registration->Miscarriage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ModeOfDelivery->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeOfDelivery");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ModeOfDelivery->caption(), $patient_an_registration->ModeOfDelivery->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ND->Required) { ?>
			elm = this.getElements("x" + infix + "_ND");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ND->caption(), $patient_an_registration->ND->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->NDS->Required) { ?>
			elm = this.getElements("x" + infix + "_NDS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NDS->caption(), $patient_an_registration->NDS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->NDP->Required) { ?>
			elm = this.getElements("x" + infix + "_NDP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NDP->caption(), $patient_an_registration->NDP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Vaccum->Required) { ?>
			elm = this.getElements("x" + infix + "_Vaccum");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Vaccum->caption(), $patient_an_registration->Vaccum->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->VaccumS->Required) { ?>
			elm = this.getElements("x" + infix + "_VaccumS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->VaccumS->caption(), $patient_an_registration->VaccumS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->VaccumP->Required) { ?>
			elm = this.getElements("x" + infix + "_VaccumP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->VaccumP->caption(), $patient_an_registration->VaccumP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Forceps->Required) { ?>
			elm = this.getElements("x" + infix + "_Forceps");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Forceps->caption(), $patient_an_registration->Forceps->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ForcepsS->Required) { ?>
			elm = this.getElements("x" + infix + "_ForcepsS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ForcepsS->caption(), $patient_an_registration->ForcepsS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ForcepsP->Required) { ?>
			elm = this.getElements("x" + infix + "_ForcepsP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ForcepsP->caption(), $patient_an_registration->ForcepsP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Elective->Required) { ?>
			elm = this.getElements("x" + infix + "_Elective");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Elective->caption(), $patient_an_registration->Elective->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ElectiveS->Required) { ?>
			elm = this.getElements("x" + infix + "_ElectiveS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ElectiveS->caption(), $patient_an_registration->ElectiveS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ElectiveP->Required) { ?>
			elm = this.getElements("x" + infix + "_ElectiveP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ElectiveP->caption(), $patient_an_registration->ElectiveP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Emergency->Required) { ?>
			elm = this.getElements("x" + infix + "_Emergency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Emergency->caption(), $patient_an_registration->Emergency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->EmergencyS->Required) { ?>
			elm = this.getElements("x" + infix + "_EmergencyS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EmergencyS->caption(), $patient_an_registration->EmergencyS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->EmergencyP->Required) { ?>
			elm = this.getElements("x" + infix + "_EmergencyP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->EmergencyP->caption(), $patient_an_registration->EmergencyP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Maturity->Required) { ?>
			elm = this.getElements("x" + infix + "_Maturity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Maturity->caption(), $patient_an_registration->Maturity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Baby1->Required) { ?>
			elm = this.getElements("x" + infix + "_Baby1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Baby1->caption(), $patient_an_registration->Baby1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Baby2->Required) { ?>
			elm = this.getElements("x" + infix + "_Baby2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Baby2->caption(), $patient_an_registration->Baby2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->sex1->Required) { ?>
			elm = this.getElements("x" + infix + "_sex1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->sex1->caption(), $patient_an_registration->sex1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->sex2->Required) { ?>
			elm = this.getElements("x" + infix + "_sex2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->sex2->caption(), $patient_an_registration->sex2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->weight1->Required) { ?>
			elm = this.getElements("x" + infix + "_weight1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->weight1->caption(), $patient_an_registration->weight1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->weight2->Required) { ?>
			elm = this.getElements("x" + infix + "_weight2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->weight2->caption(), $patient_an_registration->weight2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->NICU1->Required) { ?>
			elm = this.getElements("x" + infix + "_NICU1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NICU1->caption(), $patient_an_registration->NICU1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->NICU2->Required) { ?>
			elm = this.getElements("x" + infix + "_NICU2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->NICU2->caption(), $patient_an_registration->NICU2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Jaundice1->Required) { ?>
			elm = this.getElements("x" + infix + "_Jaundice1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Jaundice1->caption(), $patient_an_registration->Jaundice1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Jaundice2->Required) { ?>
			elm = this.getElements("x" + infix + "_Jaundice2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Jaundice2->caption(), $patient_an_registration->Jaundice2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Others1->Required) { ?>
			elm = this.getElements("x" + infix + "_Others1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Others1->caption(), $patient_an_registration->Others1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->Others2->Required) { ?>
			elm = this.getElements("x" + infix + "_Others2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->Others2->caption(), $patient_an_registration->Others2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->SpillOverReasons->Required) { ?>
			elm = this.getElements("x" + infix + "_SpillOverReasons");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->SpillOverReasons->caption(), $patient_an_registration->SpillOverReasons->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ANClosed->Required) { ?>
			elm = this.getElements("x" + infix + "_ANClosed[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANClosed->caption(), $patient_an_registration->ANClosed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ANClosedDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_ANClosedDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ANClosedDATE->caption(), $patient_an_registration->ANClosedDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->PastMedicalHistoryOthers->Required) { ?>
			elm = this.getElements("x" + infix + "_PastMedicalHistoryOthers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PastMedicalHistoryOthers->caption(), $patient_an_registration->PastMedicalHistoryOthers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->PastSurgicalHistoryOthers->Required) { ?>
			elm = this.getElements("x" + infix + "_PastSurgicalHistoryOthers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PastSurgicalHistoryOthers->caption(), $patient_an_registration->PastSurgicalHistoryOthers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->FamilyHistoryOthers->Required) { ?>
			elm = this.getElements("x" + infix + "_FamilyHistoryOthers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->FamilyHistoryOthers->caption(), $patient_an_registration->FamilyHistoryOthers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->PresentPregnancyComplicationsOthers->Required) { ?>
			elm = this.getElements("x" + infix + "_PresentPregnancyComplicationsOthers");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->PresentPregnancyComplicationsOthers->caption(), $patient_an_registration->PresentPregnancyComplicationsOthers->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_an_registration_edit->ETdate->Required) { ?>
			elm = this.getElements("x" + infix + "_ETdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_an_registration->ETdate->caption(), $patient_an_registration->ETdate->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
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

// Form_CustomValidate event
fpatient_an_registrationedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_an_registrationedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_an_registrationedit.lists["x_MenstrualHistory"] = <?php echo $patient_an_registration_edit->MenstrualHistory->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_MenstrualHistory"].options = <?php echo JsonEncode($patient_an_registration_edit->MenstrualHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_PreviousHistoryofGDM"] = <?php echo $patient_an_registration_edit->PreviousHistoryofGDM->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_PreviousHistoryofGDM"].options = <?php echo JsonEncode($patient_an_registration_edit->PreviousHistoryofGDM->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_PreviousHistorofPIH"] = <?php echo $patient_an_registration_edit->PreviousHistorofPIH->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_PreviousHistorofPIH"].options = <?php echo JsonEncode($patient_an_registration_edit->PreviousHistorofPIH->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_PreviousHistoryofIUGR"] = <?php echo $patient_an_registration_edit->PreviousHistoryofIUGR->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_PreviousHistoryofIUGR"].options = <?php echo JsonEncode($patient_an_registration_edit->PreviousHistoryofIUGR->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_PreviousHistoryofOligohydramnios"] = <?php echo $patient_an_registration_edit->PreviousHistoryofOligohydramnios->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_PreviousHistoryofOligohydramnios"].options = <?php echo JsonEncode($patient_an_registration_edit->PreviousHistoryofOligohydramnios->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_PreviousHistoryofPreterm"] = <?php echo $patient_an_registration_edit->PreviousHistoryofPreterm->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_PreviousHistoryofPreterm"].options = <?php echo JsonEncode($patient_an_registration_edit->PreviousHistoryofPreterm->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_PastMedicalHistory[]"] = <?php echo $patient_an_registration_edit->PastMedicalHistory->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_PastMedicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_edit->PastMedicalHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_PastSurgicalHistory[]"] = <?php echo $patient_an_registration_edit->PastSurgicalHistory->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_PastSurgicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_edit->PastSurgicalHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_FamilyHistory[]"] = <?php echo $patient_an_registration_edit->FamilyHistory->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_FamilyHistory[]"].options = <?php echo JsonEncode($patient_an_registration_edit->FamilyHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_Bleeding[]"] = <?php echo $patient_an_registration_edit->Bleeding->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_Bleeding[]"].options = <?php echo JsonEncode($patient_an_registration_edit->Bleeding->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_Miscarriage"] = <?php echo $patient_an_registration_edit->Miscarriage->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_Miscarriage"].options = <?php echo JsonEncode($patient_an_registration_edit->Miscarriage->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_ModeOfDelivery"] = <?php echo $patient_an_registration_edit->ModeOfDelivery->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_ModeOfDelivery"].options = <?php echo JsonEncode($patient_an_registration_edit->ModeOfDelivery->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_NDS"] = <?php echo $patient_an_registration_edit->NDS->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_NDS"].options = <?php echo JsonEncode($patient_an_registration_edit->NDS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_NDP"] = <?php echo $patient_an_registration_edit->NDP->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_NDP"].options = <?php echo JsonEncode($patient_an_registration_edit->NDP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_VaccumS"] = <?php echo $patient_an_registration_edit->VaccumS->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_VaccumS"].options = <?php echo JsonEncode($patient_an_registration_edit->VaccumS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_VaccumP"] = <?php echo $patient_an_registration_edit->VaccumP->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_VaccumP"].options = <?php echo JsonEncode($patient_an_registration_edit->VaccumP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_ForcepsS"] = <?php echo $patient_an_registration_edit->ForcepsS->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_ForcepsS"].options = <?php echo JsonEncode($patient_an_registration_edit->ForcepsS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_ForcepsP"] = <?php echo $patient_an_registration_edit->ForcepsP->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_ForcepsP"].options = <?php echo JsonEncode($patient_an_registration_edit->ForcepsP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_ElectiveS"] = <?php echo $patient_an_registration_edit->ElectiveS->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_ElectiveS"].options = <?php echo JsonEncode($patient_an_registration_edit->ElectiveS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_ElectiveP"] = <?php echo $patient_an_registration_edit->ElectiveP->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_ElectiveP"].options = <?php echo JsonEncode($patient_an_registration_edit->ElectiveP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_EmergencyS"] = <?php echo $patient_an_registration_edit->EmergencyS->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_EmergencyS"].options = <?php echo JsonEncode($patient_an_registration_edit->EmergencyS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_EmergencyP"] = <?php echo $patient_an_registration_edit->EmergencyP->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_EmergencyP"].options = <?php echo JsonEncode($patient_an_registration_edit->EmergencyP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_Maturity"] = <?php echo $patient_an_registration_edit->Maturity->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_Maturity"].options = <?php echo JsonEncode($patient_an_registration_edit->Maturity->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_SpillOverReasons"] = <?php echo $patient_an_registration_edit->SpillOverReasons->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_SpillOverReasons"].options = <?php echo JsonEncode($patient_an_registration_edit->SpillOverReasons->options(FALSE, TRUE)) ?>;
fpatient_an_registrationedit.lists["x_ANClosed[]"] = <?php echo $patient_an_registration_edit->ANClosed->Lookup->toClientList() ?>;
fpatient_an_registrationedit.lists["x_ANClosed[]"].options = <?php echo JsonEncode($patient_an_registration_edit->ANClosed->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_an_registration_edit->showPageHeader(); ?>
<?php
$patient_an_registration_edit->showMessage();
?>
<form name="fpatient_an_registrationedit" id="fpatient_an_registrationedit" class="<?php echo $patient_an_registration_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_an_registration_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_an_registration_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_an_registration_edit->IsModal ?>">
<?php if ($patient_an_registration->getCurrentMasterTable() == "patient_opd_follow_up") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient_opd_follow_up">
<input type="hidden" name="fk_PatientId" value="<?php echo $patient_an_registration->pid->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $patient_an_registration->fid->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($patient_an_registration->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_an_registration_id" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_id" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->id->caption() ?><?php echo ($patient_an_registration->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->id->cellAttributes() ?>>
<script id="tpx_patient_an_registration_id" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_id">
<span<?php echo $patient_an_registration->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_an_registration->id->CurrentValue) ?>">
<?php echo $patient_an_registration->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->pid->Visible) { // pid ?>
	<div id="r_pid" class="form-group row">
		<label id="elh_patient_an_registration_pid" for="x_pid" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_pid" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->pid->caption() ?><?php echo ($patient_an_registration->pid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->pid->cellAttributes() ?>>
<?php if ($patient_an_registration->pid->getSessionValue() <> "") { ?>
<script id="tpx_patient_an_registration_pid" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_pid">
<span<?php echo $patient_an_registration->pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->pid->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_pid" name="x_pid" value="<?php echo HtmlEncode($patient_an_registration->pid->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_an_registration_pid" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_pid">
<input type="text" data-table="patient_an_registration" data-field="x_pid" name="x_pid" id="x_pid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration->pid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->pid->EditValue ?>"<?php echo $patient_an_registration->pid->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_an_registration->pid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->fid->Visible) { // fid ?>
	<div id="r_fid" class="form-group row">
		<label id="elh_patient_an_registration_fid" for="x_fid" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_fid" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->fid->caption() ?><?php echo ($patient_an_registration->fid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->fid->cellAttributes() ?>>
<?php if ($patient_an_registration->fid->getSessionValue() <> "") { ?>
<script id="tpx_patient_an_registration_fid" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_fid">
<span<?php echo $patient_an_registration->fid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_an_registration->fid->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_fid" name="x_fid" value="<?php echo HtmlEncode($patient_an_registration->fid->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_an_registration_fid" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_fid">
<input type="text" data-table="patient_an_registration" data-field="x_fid" name="x_fid" id="x_fid" size="30" placeholder="<?php echo HtmlEncode($patient_an_registration->fid->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->fid->EditValue ?>"<?php echo $patient_an_registration->fid->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_an_registration->fid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->G->Visible) { // G ?>
	<div id="r_G" class="form-group row">
		<label id="elh_patient_an_registration_G" for="x_G" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_G" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->G->caption() ?><?php echo ($patient_an_registration->G->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->G->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_G">
<input type="text" data-table="patient_an_registration" data-field="x_G" name="x_G" id="x_G" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G->EditValue ?>"<?php echo $patient_an_registration->G->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->G->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->P->Visible) { // P ?>
	<div id="r_P" class="form-group row">
		<label id="elh_patient_an_registration_P" for="x_P" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_P" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->P->caption() ?><?php echo ($patient_an_registration->P->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->P->cellAttributes() ?>>
<script id="tpx_patient_an_registration_P" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_P">
<input type="text" data-table="patient_an_registration" data-field="x_P" name="x_P" id="x_P" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->P->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->P->EditValue ?>"<?php echo $patient_an_registration->P->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->P->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->L->Visible) { // L ?>
	<div id="r_L" class="form-group row">
		<label id="elh_patient_an_registration_L" for="x_L" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_L" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->L->caption() ?><?php echo ($patient_an_registration->L->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->L->cellAttributes() ?>>
<script id="tpx_patient_an_registration_L" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_L">
<input type="text" data-table="patient_an_registration" data-field="x_L" name="x_L" id="x_L" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->L->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->L->EditValue ?>"<?php echo $patient_an_registration->L->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->L->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A->Visible) { // A ?>
	<div id="r_A" class="form-group row">
		<label id="elh_patient_an_registration_A" for="x_A" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A->caption() ?><?php echo ($patient_an_registration->A->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A">
<input type="text" data-table="patient_an_registration" data-field="x_A" name="x_A" id="x_A" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A->EditValue ?>"<?php echo $patient_an_registration->A->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->A->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->E->Visible) { // E ?>
	<div id="r_E" class="form-group row">
		<label id="elh_patient_an_registration_E" for="x_E" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_E" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->E->caption() ?><?php echo ($patient_an_registration->E->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->E->cellAttributes() ?>>
<script id="tpx_patient_an_registration_E" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_E">
<input type="text" data-table="patient_an_registration" data-field="x_E" name="x_E" id="x_E" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->E->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->E->EditValue ?>"<?php echo $patient_an_registration->E->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->E->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->M->Visible) { // M ?>
	<div id="r_M" class="form-group row">
		<label id="elh_patient_an_registration_M" for="x_M" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_M" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->M->caption() ?><?php echo ($patient_an_registration->M->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->M->cellAttributes() ?>>
<script id="tpx_patient_an_registration_M" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_M">
<input type="text" data-table="patient_an_registration" data-field="x_M" name="x_M" id="x_M" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->M->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->M->EditValue ?>"<?php echo $patient_an_registration->M->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->M->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label id="elh_patient_an_registration_LMP" for="x_LMP" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_LMP" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->LMP->caption() ?><?php echo ($patient_an_registration->LMP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->LMP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_LMP" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_LMP">
<input type="text" data-table="patient_an_registration" data-field="x_LMP" name="x_LMP" id="x_LMP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->LMP->EditValue ?>"<?php echo $patient_an_registration->LMP->editAttributes() ?>>
<?php if (!$patient_an_registration->LMP->ReadOnly && !$patient_an_registration->LMP->Disabled && !isset($patient_an_registration->LMP->EditAttrs["readonly"]) && !isset($patient_an_registration->LMP->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->LMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->EDO->Visible) { // EDO ?>
	<div id="r_EDO" class="form-group row">
		<label id="elh_patient_an_registration_EDO" for="x_EDO" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EDO" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->EDO->caption() ?><?php echo ($patient_an_registration->EDO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->EDO->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EDO" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_EDO">
<input type="text" data-table="patient_an_registration" data-field="x_EDO" name="x_EDO" id="x_EDO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EDO->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EDO->EditValue ?>"<?php echo $patient_an_registration->EDO->editAttributes() ?>>
<?php if (!$patient_an_registration->EDO->ReadOnly && !$patient_an_registration->EDO->Disabled && !isset($patient_an_registration->EDO->EditAttrs["readonly"]) && !isset($patient_an_registration->EDO->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_EDO", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->EDO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<div id="r_MenstrualHistory" class="form-group row">
		<label id="elh_patient_an_registration_MenstrualHistory" for="x_MenstrualHistory" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_MenstrualHistory" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->MenstrualHistory->caption() ?><?php echo ($patient_an_registration->MenstrualHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_MenstrualHistory" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_MenstrualHistory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_MenstrualHistory" data-value-separator="<?php echo $patient_an_registration->MenstrualHistory->displayValueSeparatorAttribute() ?>" id="x_MenstrualHistory" name="x_MenstrualHistory"<?php echo $patient_an_registration->MenstrualHistory->editAttributes() ?>>
		<?php echo $patient_an_registration->MenstrualHistory->selectOptionListHtml("x_MenstrualHistory") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->MenstrualHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->MaritalHistory->Visible) { // MaritalHistory ?>
	<div id="r_MaritalHistory" class="form-group row">
		<label id="elh_patient_an_registration_MaritalHistory" for="x_MaritalHistory" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_MaritalHistory" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->MaritalHistory->caption() ?><?php echo ($patient_an_registration->MaritalHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->MaritalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_MaritalHistory" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_MaritalHistory">
<input type="text" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x_MaritalHistory" id="x_MaritalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->MaritalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->MaritalHistory->EditValue ?>"<?php echo $patient_an_registration->MaritalHistory->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->MaritalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<div id="r_ObstetricHistory" class="form-group row">
		<label id="elh_patient_an_registration_ObstetricHistory" for="x_ObstetricHistory" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ObstetricHistory" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ObstetricHistory->caption() ?><?php echo ($patient_an_registration->ObstetricHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ObstetricHistory" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ObstetricHistory">
<input type="text" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ObstetricHistory->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ObstetricHistory->EditValue ?>"<?php echo $patient_an_registration->ObstetricHistory->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->ObstetricHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
	<div id="r_PreviousHistoryofGDM" class="form-group row">
		<label id="elh_patient_an_registration_PreviousHistoryofGDM" for="x_PreviousHistoryofGDM" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->PreviousHistoryofGDM->caption() ?><?php echo ($patient_an_registration->PreviousHistoryofGDM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->PreviousHistoryofGDM->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_PreviousHistoryofGDM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofGDM->displayValueSeparatorAttribute() ?>" id="x_PreviousHistoryofGDM" name="x_PreviousHistoryofGDM"<?php echo $patient_an_registration->PreviousHistoryofGDM->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofGDM->selectOptionListHtml("x_PreviousHistoryofGDM") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->PreviousHistoryofGDM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
	<div id="r_PreviousHistorofPIH" class="form-group row">
		<label id="elh_patient_an_registration_PreviousHistorofPIH" for="x_PreviousHistorofPIH" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PreviousHistorofPIH" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->PreviousHistorofPIH->caption() ?><?php echo ($patient_an_registration->PreviousHistorofPIH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->PreviousHistorofPIH->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistorofPIH" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_PreviousHistorofPIH">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" data-value-separator="<?php echo $patient_an_registration->PreviousHistorofPIH->displayValueSeparatorAttribute() ?>" id="x_PreviousHistorofPIH" name="x_PreviousHistorofPIH"<?php echo $patient_an_registration->PreviousHistorofPIH->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistorofPIH->selectOptionListHtml("x_PreviousHistorofPIH") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->PreviousHistorofPIH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
	<div id="r_PreviousHistoryofIUGR" class="form-group row">
		<label id="elh_patient_an_registration_PreviousHistoryofIUGR" for="x_PreviousHistoryofIUGR" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->PreviousHistoryofIUGR->caption() ?><?php echo ($patient_an_registration->PreviousHistoryofIUGR->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->PreviousHistoryofIUGR->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_PreviousHistoryofIUGR">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofIUGR->displayValueSeparatorAttribute() ?>" id="x_PreviousHistoryofIUGR" name="x_PreviousHistoryofIUGR"<?php echo $patient_an_registration->PreviousHistoryofIUGR->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofIUGR->selectOptionListHtml("x_PreviousHistoryofIUGR") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->PreviousHistoryofIUGR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
	<div id="r_PreviousHistoryofOligohydramnios" class="form-group row">
		<label id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" for="x_PreviousHistoryofOligohydramnios" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->caption() ?><?php echo ($patient_an_registration->PreviousHistoryofOligohydramnios->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_PreviousHistoryofOligohydramnios">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->displayValueSeparatorAttribute() ?>" id="x_PreviousHistoryofOligohydramnios" name="x_PreviousHistoryofOligohydramnios"<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->selectOptionListHtml("x_PreviousHistoryofOligohydramnios") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
	<div id="r_PreviousHistoryofPreterm" class="form-group row">
		<label id="elh_patient_an_registration_PreviousHistoryofPreterm" for="x_PreviousHistoryofPreterm" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->PreviousHistoryofPreterm->caption() ?><?php echo ($patient_an_registration->PreviousHistoryofPreterm->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->PreviousHistoryofPreterm->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_PreviousHistoryofPreterm">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" data-value-separator="<?php echo $patient_an_registration->PreviousHistoryofPreterm->displayValueSeparatorAttribute() ?>" id="x_PreviousHistoryofPreterm" name="x_PreviousHistoryofPreterm"<?php echo $patient_an_registration->PreviousHistoryofPreterm->editAttributes() ?>>
		<?php echo $patient_an_registration->PreviousHistoryofPreterm->selectOptionListHtml("x_PreviousHistoryofPreterm") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->PreviousHistoryofPreterm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->G1->Visible) { // G1 ?>
	<div id="r_G1" class="form-group row">
		<label id="elh_patient_an_registration_G1" for="x_G1" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_G1" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->G1->caption() ?><?php echo ($patient_an_registration->G1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->G1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G1" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_G1">
<input type="text" data-table="patient_an_registration" data-field="x_G1" name="x_G1" id="x_G1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G1->EditValue ?>"<?php echo $patient_an_registration->G1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->G1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->G2->Visible) { // G2 ?>
	<div id="r_G2" class="form-group row">
		<label id="elh_patient_an_registration_G2" for="x_G2" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_G2" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->G2->caption() ?><?php echo ($patient_an_registration->G2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->G2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G2" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_G2">
<input type="text" data-table="patient_an_registration" data-field="x_G2" name="x_G2" id="x_G2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G2->EditValue ?>"<?php echo $patient_an_registration->G2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->G2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->G3->Visible) { // G3 ?>
	<div id="r_G3" class="form-group row">
		<label id="elh_patient_an_registration_G3" for="x_G3" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_G3" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->G3->caption() ?><?php echo ($patient_an_registration->G3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->G3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G3" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_G3">
<input type="text" data-table="patient_an_registration" data-field="x_G3" name="x_G3" id="x_G3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->G3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->G3->EditValue ?>"<?php echo $patient_an_registration->G3->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->G3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
	<div id="r_DeliveryNDLSCS1" class="form-group row">
		<label id="elh_patient_an_registration_DeliveryNDLSCS1" for="x_DeliveryNDLSCS1" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->DeliveryNDLSCS1->caption() ?><?php echo ($patient_an_registration->DeliveryNDLSCS1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->DeliveryNDLSCS1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_DeliveryNDLSCS1">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x_DeliveryNDLSCS1" id="x_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS1->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->DeliveryNDLSCS1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
	<div id="r_DeliveryNDLSCS2" class="form-group row">
		<label id="elh_patient_an_registration_DeliveryNDLSCS2" for="x_DeliveryNDLSCS2" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->DeliveryNDLSCS2->caption() ?><?php echo ($patient_an_registration->DeliveryNDLSCS2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->DeliveryNDLSCS2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_DeliveryNDLSCS2">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x_DeliveryNDLSCS2" id="x_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS2->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->DeliveryNDLSCS2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
	<div id="r_DeliveryNDLSCS3" class="form-group row">
		<label id="elh_patient_an_registration_DeliveryNDLSCS3" for="x_DeliveryNDLSCS3" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->DeliveryNDLSCS3->caption() ?><?php echo ($patient_an_registration->DeliveryNDLSCS3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->DeliveryNDLSCS3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_DeliveryNDLSCS3">
<input type="text" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x_DeliveryNDLSCS3" id="x_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DeliveryNDLSCS3->EditValue ?>"<?php echo $patient_an_registration->DeliveryNDLSCS3->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->DeliveryNDLSCS3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight1->Visible) { // BabySexweight1 ?>
	<div id="r_BabySexweight1" class="form-group row">
		<label id="elh_patient_an_registration_BabySexweight1" for="x_BabySexweight1" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_BabySexweight1" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->BabySexweight1->caption() ?><?php echo ($patient_an_registration->BabySexweight1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->BabySexweight1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight1" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_BabySexweight1">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x_BabySexweight1" id="x_BabySexweight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight1->EditValue ?>"<?php echo $patient_an_registration->BabySexweight1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->BabySexweight1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight2->Visible) { // BabySexweight2 ?>
	<div id="r_BabySexweight2" class="form-group row">
		<label id="elh_patient_an_registration_BabySexweight2" for="x_BabySexweight2" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_BabySexweight2" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->BabySexweight2->caption() ?><?php echo ($patient_an_registration->BabySexweight2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->BabySexweight2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight2" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_BabySexweight2">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x_BabySexweight2" id="x_BabySexweight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight2->EditValue ?>"<?php echo $patient_an_registration->BabySexweight2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->BabySexweight2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight3->Visible) { // BabySexweight3 ?>
	<div id="r_BabySexweight3" class="form-group row">
		<label id="elh_patient_an_registration_BabySexweight3" for="x_BabySexweight3" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_BabySexweight3" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->BabySexweight3->caption() ?><?php echo ($patient_an_registration->BabySexweight3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->BabySexweight3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight3" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_BabySexweight3">
<input type="text" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x_BabySexweight3" id="x_BabySexweight3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->BabySexweight3->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->BabySexweight3->EditValue ?>"<?php echo $patient_an_registration->BabySexweight3->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->BabySexweight3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
	<div id="r_PastMedicalHistory" class="form-group row">
		<label id="elh_patient_an_registration_PastMedicalHistory" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PastMedicalHistory" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->PastMedicalHistory->caption() ?><?php echo ($patient_an_registration->PastMedicalHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->PastMedicalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastMedicalHistory" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_PastMedicalHistory">
<div id="tp_x_PastMedicalHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_PastMedicalHistory" data-value-separator="<?php echo $patient_an_registration->PastMedicalHistory->displayValueSeparatorAttribute() ?>" name="x_PastMedicalHistory[]" id="x_PastMedicalHistory[]" value="{value}"<?php echo $patient_an_registration->PastMedicalHistory->editAttributes() ?>></div>
<div id="dsl_x_PastMedicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->PastMedicalHistory->checkBoxListHtml(FALSE, "x_PastMedicalHistory[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_an_registration->PastMedicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
	<div id="r_PastSurgicalHistory" class="form-group row">
		<label id="elh_patient_an_registration_PastSurgicalHistory" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PastSurgicalHistory" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->PastSurgicalHistory->caption() ?><?php echo ($patient_an_registration->PastSurgicalHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->PastSurgicalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastSurgicalHistory" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_PastSurgicalHistory">
<div id="tp_x_PastSurgicalHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" data-value-separator="<?php echo $patient_an_registration->PastSurgicalHistory->displayValueSeparatorAttribute() ?>" name="x_PastSurgicalHistory[]" id="x_PastSurgicalHistory[]" value="{value}"<?php echo $patient_an_registration->PastSurgicalHistory->editAttributes() ?>></div>
<div id="dsl_x_PastSurgicalHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->PastSurgicalHistory->checkBoxListHtml(FALSE, "x_PastSurgicalHistory[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_an_registration->PastSurgicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistory->Visible) { // FamilyHistory ?>
	<div id="r_FamilyHistory" class="form-group row">
		<label id="elh_patient_an_registration_FamilyHistory" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_FamilyHistory" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->FamilyHistory->caption() ?><?php echo ($patient_an_registration->FamilyHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->FamilyHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_FamilyHistory" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_FamilyHistory">
<div id="tp_x_FamilyHistory" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_FamilyHistory" data-value-separator="<?php echo $patient_an_registration->FamilyHistory->displayValueSeparatorAttribute() ?>" name="x_FamilyHistory[]" id="x_FamilyHistory[]" value="{value}"<?php echo $patient_an_registration->FamilyHistory->editAttributes() ?>></div>
<div id="dsl_x_FamilyHistory" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->FamilyHistory->checkBoxListHtml(FALSE, "x_FamilyHistory[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_an_registration->FamilyHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Viability->Visible) { // Viability ?>
	<div id="r_Viability" class="form-group row">
		<label id="elh_patient_an_registration_Viability" for="x_Viability" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Viability" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Viability->caption() ?><?php echo ($patient_an_registration->Viability->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Viability->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Viability">
<input type="text" data-table="patient_an_registration" data-field="x_Viability" name="x_Viability" id="x_Viability" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability->EditValue ?>"<?php echo $patient_an_registration->Viability->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Viability->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ViabilityDATE->Visible) { // ViabilityDATE ?>
	<div id="r_ViabilityDATE" class="form-group row">
		<label id="elh_patient_an_registration_ViabilityDATE" for="x_ViabilityDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ViabilityDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ViabilityDATE->caption() ?><?php echo ($patient_an_registration->ViabilityDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ViabilityDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ViabilityDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ViabilityDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x_ViabilityDATE" id="x_ViabilityDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ViabilityDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ViabilityDATE->EditValue ?>"<?php echo $patient_an_registration->ViabilityDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ViabilityDATE->ReadOnly && !$patient_an_registration->ViabilityDATE->Disabled && !isset($patient_an_registration->ViabilityDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ViabilityDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_ViabilityDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->ViabilityDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
	<div id="r_ViabilityREPORT" class="form-group row">
		<label id="elh_patient_an_registration_ViabilityREPORT" for="x_ViabilityREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ViabilityREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ViabilityREPORT->caption() ?><?php echo ($patient_an_registration->ViabilityREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ViabilityREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ViabilityREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ViabilityREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x_ViabilityREPORT" id="x_ViabilityREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ViabilityREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ViabilityREPORT->EditValue ?>"<?php echo $patient_an_registration->ViabilityREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->ViabilityREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Viability2->Visible) { // Viability2 ?>
	<div id="r_Viability2" class="form-group row">
		<label id="elh_patient_an_registration_Viability2" for="x_Viability2" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Viability2" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Viability2->caption() ?><?php echo ($patient_an_registration->Viability2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Viability2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Viability2">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2" name="x_Viability2" id="x_Viability2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2->EditValue ?>"<?php echo $patient_an_registration->Viability2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Viability2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Viability2DATE->Visible) { // Viability2DATE ?>
	<div id="r_Viability2DATE" class="form-group row">
		<label id="elh_patient_an_registration_Viability2DATE" for="x_Viability2DATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Viability2DATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Viability2DATE->caption() ?><?php echo ($patient_an_registration->Viability2DATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Viability2DATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2DATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Viability2DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x_Viability2DATE" id="x_Viability2DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2DATE->EditValue ?>"<?php echo $patient_an_registration->Viability2DATE->editAttributes() ?>>
<?php if (!$patient_an_registration->Viability2DATE->ReadOnly && !$patient_an_registration->Viability2DATE->Disabled && !isset($patient_an_registration->Viability2DATE->EditAttrs["readonly"]) && !isset($patient_an_registration->Viability2DATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_Viability2DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->Viability2DATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Viability2REPORT->Visible) { // Viability2REPORT ?>
	<div id="r_Viability2REPORT" class="form-group row">
		<label id="elh_patient_an_registration_Viability2REPORT" for="x_Viability2REPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Viability2REPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Viability2REPORT->caption() ?><?php echo ($patient_an_registration->Viability2REPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Viability2REPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2REPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Viability2REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x_Viability2REPORT" id="x_Viability2REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Viability2REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Viability2REPORT->EditValue ?>"<?php echo $patient_an_registration->Viability2REPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Viability2REPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->NTscan->Visible) { // NTscan ?>
	<div id="r_NTscan" class="form-group row">
		<label id="elh_patient_an_registration_NTscan" for="x_NTscan" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NTscan" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->NTscan->caption() ?><?php echo ($patient_an_registration->NTscan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->NTscan->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscan" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_NTscan">
<input type="text" data-table="patient_an_registration" data-field="x_NTscan" name="x_NTscan" id="x_NTscan" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscan->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscan->EditValue ?>"<?php echo $patient_an_registration->NTscan->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->NTscan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->NTscanDATE->Visible) { // NTscanDATE ?>
	<div id="r_NTscanDATE" class="form-group row">
		<label id="elh_patient_an_registration_NTscanDATE" for="x_NTscanDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NTscanDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->NTscanDATE->caption() ?><?php echo ($patient_an_registration->NTscanDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->NTscanDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscanDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_NTscanDATE">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x_NTscanDATE" id="x_NTscanDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscanDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscanDATE->EditValue ?>"<?php echo $patient_an_registration->NTscanDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->NTscanDATE->ReadOnly && !$patient_an_registration->NTscanDATE->Disabled && !isset($patient_an_registration->NTscanDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->NTscanDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_NTscanDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->NTscanDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->NTscanREPORT->Visible) { // NTscanREPORT ?>
	<div id="r_NTscanREPORT" class="form-group row">
		<label id="elh_patient_an_registration_NTscanREPORT" for="x_NTscanREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NTscanREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->NTscanREPORT->caption() ?><?php echo ($patient_an_registration->NTscanREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->NTscanREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscanREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_NTscanREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x_NTscanREPORT" id="x_NTscanREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NTscanREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NTscanREPORT->EditValue ?>"<?php echo $patient_an_registration->NTscanREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->NTscanREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->EarlyTarget->Visible) { // EarlyTarget ?>
	<div id="r_EarlyTarget" class="form-group row">
		<label id="elh_patient_an_registration_EarlyTarget" for="x_EarlyTarget" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EarlyTarget" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->EarlyTarget->caption() ?><?php echo ($patient_an_registration->EarlyTarget->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->EarlyTarget->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTarget" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_EarlyTarget">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x_EarlyTarget" id="x_EarlyTarget" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTarget->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTarget->EditValue ?>"<?php echo $patient_an_registration->EarlyTarget->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->EarlyTarget->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
	<div id="r_EarlyTargetDATE" class="form-group row">
		<label id="elh_patient_an_registration_EarlyTargetDATE" for="x_EarlyTargetDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EarlyTargetDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->EarlyTargetDATE->caption() ?><?php echo ($patient_an_registration->EarlyTargetDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->EarlyTargetDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTargetDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_EarlyTargetDATE">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x_EarlyTargetDATE" id="x_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTargetDATE->EditValue ?>"<?php echo $patient_an_registration->EarlyTargetDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->EarlyTargetDATE->ReadOnly && !$patient_an_registration->EarlyTargetDATE->Disabled && !isset($patient_an_registration->EarlyTargetDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->EarlyTargetDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_EarlyTargetDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->EarlyTargetDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
	<div id="r_EarlyTargetREPORT" class="form-group row">
		<label id="elh_patient_an_registration_EarlyTargetREPORT" for="x_EarlyTargetREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EarlyTargetREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->EarlyTargetREPORT->caption() ?><?php echo ($patient_an_registration->EarlyTargetREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->EarlyTargetREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTargetREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_EarlyTargetREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x_EarlyTargetREPORT" id="x_EarlyTargetREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->EarlyTargetREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->EarlyTargetREPORT->EditValue ?>"<?php echo $patient_an_registration->EarlyTargetREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->EarlyTargetREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Anomaly->Visible) { // Anomaly ?>
	<div id="r_Anomaly" class="form-group row">
		<label id="elh_patient_an_registration_Anomaly" for="x_Anomaly" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Anomaly" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Anomaly->caption() ?><?php echo ($patient_an_registration->Anomaly->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Anomaly->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Anomaly" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Anomaly">
<input type="text" data-table="patient_an_registration" data-field="x_Anomaly" name="x_Anomaly" id="x_Anomaly" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Anomaly->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Anomaly->EditValue ?>"<?php echo $patient_an_registration->Anomaly->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Anomaly->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->AnomalyDATE->Visible) { // AnomalyDATE ?>
	<div id="r_AnomalyDATE" class="form-group row">
		<label id="elh_patient_an_registration_AnomalyDATE" for="x_AnomalyDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_AnomalyDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->AnomalyDATE->caption() ?><?php echo ($patient_an_registration->AnomalyDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->AnomalyDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_AnomalyDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_AnomalyDATE">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x_AnomalyDATE" id="x_AnomalyDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->AnomalyDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->AnomalyDATE->EditValue ?>"<?php echo $patient_an_registration->AnomalyDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->AnomalyDATE->ReadOnly && !$patient_an_registration->AnomalyDATE->Disabled && !isset($patient_an_registration->AnomalyDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->AnomalyDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_AnomalyDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->AnomalyDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
	<div id="r_AnomalyREPORT" class="form-group row">
		<label id="elh_patient_an_registration_AnomalyREPORT" for="x_AnomalyREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_AnomalyREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->AnomalyREPORT->caption() ?><?php echo ($patient_an_registration->AnomalyREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->AnomalyREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_AnomalyREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_AnomalyREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x_AnomalyREPORT" id="x_AnomalyREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->AnomalyREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->AnomalyREPORT->EditValue ?>"<?php echo $patient_an_registration->AnomalyREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->AnomalyREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Growth->Visible) { // Growth ?>
	<div id="r_Growth" class="form-group row">
		<label id="elh_patient_an_registration_Growth" for="x_Growth" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Growth" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Growth->caption() ?><?php echo ($patient_an_registration->Growth->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Growth->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Growth">
<input type="text" data-table="patient_an_registration" data-field="x_Growth" name="x_Growth" id="x_Growth" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth->EditValue ?>"<?php echo $patient_an_registration->Growth->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Growth->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->GrowthDATE->Visible) { // GrowthDATE ?>
	<div id="r_GrowthDATE" class="form-group row">
		<label id="elh_patient_an_registration_GrowthDATE" for="x_GrowthDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_GrowthDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->GrowthDATE->caption() ?><?php echo ($patient_an_registration->GrowthDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->GrowthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_GrowthDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_GrowthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x_GrowthDATE" id="x_GrowthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->GrowthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->GrowthDATE->EditValue ?>"<?php echo $patient_an_registration->GrowthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->GrowthDATE->ReadOnly && !$patient_an_registration->GrowthDATE->Disabled && !isset($patient_an_registration->GrowthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->GrowthDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_GrowthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->GrowthDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->GrowthREPORT->Visible) { // GrowthREPORT ?>
	<div id="r_GrowthREPORT" class="form-group row">
		<label id="elh_patient_an_registration_GrowthREPORT" for="x_GrowthREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_GrowthREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->GrowthREPORT->caption() ?><?php echo ($patient_an_registration->GrowthREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->GrowthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_GrowthREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_GrowthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x_GrowthREPORT" id="x_GrowthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->GrowthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->GrowthREPORT->EditValue ?>"<?php echo $patient_an_registration->GrowthREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->GrowthREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Growth1->Visible) { // Growth1 ?>
	<div id="r_Growth1" class="form-group row">
		<label id="elh_patient_an_registration_Growth1" for="x_Growth1" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Growth1" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Growth1->caption() ?><?php echo ($patient_an_registration->Growth1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Growth1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Growth1">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1" name="x_Growth1" id="x_Growth1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1->EditValue ?>"<?php echo $patient_an_registration->Growth1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Growth1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Growth1DATE->Visible) { // Growth1DATE ?>
	<div id="r_Growth1DATE" class="form-group row">
		<label id="elh_patient_an_registration_Growth1DATE" for="x_Growth1DATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Growth1DATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Growth1DATE->caption() ?><?php echo ($patient_an_registration->Growth1DATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Growth1DATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1DATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Growth1DATE">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x_Growth1DATE" id="x_Growth1DATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1DATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1DATE->EditValue ?>"<?php echo $patient_an_registration->Growth1DATE->editAttributes() ?>>
<?php if (!$patient_an_registration->Growth1DATE->ReadOnly && !$patient_an_registration->Growth1DATE->Disabled && !isset($patient_an_registration->Growth1DATE->EditAttrs["readonly"]) && !isset($patient_an_registration->Growth1DATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_Growth1DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->Growth1DATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Growth1REPORT->Visible) { // Growth1REPORT ?>
	<div id="r_Growth1REPORT" class="form-group row">
		<label id="elh_patient_an_registration_Growth1REPORT" for="x_Growth1REPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Growth1REPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Growth1REPORT->caption() ?><?php echo ($patient_an_registration->Growth1REPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Growth1REPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1REPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Growth1REPORT">
<input type="text" data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x_Growth1REPORT" id="x_Growth1REPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Growth1REPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Growth1REPORT->EditValue ?>"<?php echo $patient_an_registration->Growth1REPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Growth1REPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ANProfile->Visible) { // ANProfile ?>
	<div id="r_ANProfile" class="form-group row">
		<label id="elh_patient_an_registration_ANProfile" for="x_ANProfile" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANProfile" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ANProfile->caption() ?><?php echo ($patient_an_registration->ANProfile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ANProfile->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfile" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ANProfile">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfile" name="x_ANProfile" id="x_ANProfile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfile->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfile->EditValue ?>"<?php echo $patient_an_registration->ANProfile->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->ANProfile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ANProfileDATE->Visible) { // ANProfileDATE ?>
	<div id="r_ANProfileDATE" class="form-group row">
		<label id="elh_patient_an_registration_ANProfileDATE" for="x_ANProfileDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANProfileDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ANProfileDATE->caption() ?><?php echo ($patient_an_registration->ANProfileDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ANProfileDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ANProfileDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x_ANProfileDATE" id="x_ANProfileDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileDATE->EditValue ?>"<?php echo $patient_an_registration->ANProfileDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ANProfileDATE->ReadOnly && !$patient_an_registration->ANProfileDATE->Disabled && !isset($patient_an_registration->ANProfileDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ANProfileDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_ANProfileDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->ANProfileDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
	<div id="r_ANProfileINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_ANProfileINHOUSE" for="x_ANProfileINHOUSE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANProfileINHOUSE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ANProfileINHOUSE->caption() ?><?php echo ($patient_an_registration->ANProfileINHOUSE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ANProfileINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileINHOUSE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ANProfileINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x_ANProfileINHOUSE" id="x_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileINHOUSE->EditValue ?>"<?php echo $patient_an_registration->ANProfileINHOUSE->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->ANProfileINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
	<div id="r_ANProfileREPORT" class="form-group row">
		<label id="elh_patient_an_registration_ANProfileREPORT" for="x_ANProfileREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANProfileREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ANProfileREPORT->caption() ?><?php echo ($patient_an_registration->ANProfileREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ANProfileREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ANProfileREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x_ANProfileREPORT" id="x_ANProfileREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANProfileREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANProfileREPORT->EditValue ?>"<?php echo $patient_an_registration->ANProfileREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->ANProfileREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->DualMarker->Visible) { // DualMarker ?>
	<div id="r_DualMarker" class="form-group row">
		<label id="elh_patient_an_registration_DualMarker" for="x_DualMarker" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DualMarker" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->DualMarker->caption() ?><?php echo ($patient_an_registration->DualMarker->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->DualMarker->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarker" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_DualMarker">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarker" name="x_DualMarker" id="x_DualMarker" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarker->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarker->EditValue ?>"<?php echo $patient_an_registration->DualMarker->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->DualMarker->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
	<div id="r_DualMarkerDATE" class="form-group row">
		<label id="elh_patient_an_registration_DualMarkerDATE" for="x_DualMarkerDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DualMarkerDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->DualMarkerDATE->caption() ?><?php echo ($patient_an_registration->DualMarkerDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->DualMarkerDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_DualMarkerDATE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x_DualMarkerDATE" id="x_DualMarkerDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerDATE->EditValue ?>"<?php echo $patient_an_registration->DualMarkerDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->DualMarkerDATE->ReadOnly && !$patient_an_registration->DualMarkerDATE->Disabled && !isset($patient_an_registration->DualMarkerDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->DualMarkerDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_DualMarkerDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->DualMarkerDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
	<div id="r_DualMarkerINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_DualMarkerINHOUSE" for="x_DualMarkerINHOUSE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->DualMarkerINHOUSE->caption() ?><?php echo ($patient_an_registration->DualMarkerINHOUSE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->DualMarkerINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_DualMarkerINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x_DualMarkerINHOUSE" id="x_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerINHOUSE->EditValue ?>"<?php echo $patient_an_registration->DualMarkerINHOUSE->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->DualMarkerINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
	<div id="r_DualMarkerREPORT" class="form-group row">
		<label id="elh_patient_an_registration_DualMarkerREPORT" for="x_DualMarkerREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DualMarkerREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->DualMarkerREPORT->caption() ?><?php echo ($patient_an_registration->DualMarkerREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->DualMarkerREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_DualMarkerREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x_DualMarkerREPORT" id="x_DualMarkerREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DualMarkerREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DualMarkerREPORT->EditValue ?>"<?php echo $patient_an_registration->DualMarkerREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->DualMarkerREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Quadruple->Visible) { // Quadruple ?>
	<div id="r_Quadruple" class="form-group row">
		<label id="elh_patient_an_registration_Quadruple" for="x_Quadruple" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Quadruple" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Quadruple->caption() ?><?php echo ($patient_an_registration->Quadruple->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Quadruple->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Quadruple" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Quadruple">
<input type="text" data-table="patient_an_registration" data-field="x_Quadruple" name="x_Quadruple" id="x_Quadruple" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Quadruple->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Quadruple->EditValue ?>"<?php echo $patient_an_registration->Quadruple->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Quadruple->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
	<div id="r_QuadrupleDATE" class="form-group row">
		<label id="elh_patient_an_registration_QuadrupleDATE" for="x_QuadrupleDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_QuadrupleDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->QuadrupleDATE->caption() ?><?php echo ($patient_an_registration->QuadrupleDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->QuadrupleDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_QuadrupleDATE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x_QuadrupleDATE" id="x_QuadrupleDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleDATE->EditValue ?>"<?php echo $patient_an_registration->QuadrupleDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->QuadrupleDATE->ReadOnly && !$patient_an_registration->QuadrupleDATE->Disabled && !isset($patient_an_registration->QuadrupleDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->QuadrupleDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_QuadrupleDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->QuadrupleDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
	<div id="r_QuadrupleINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_QuadrupleINHOUSE" for="x_QuadrupleINHOUSE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->QuadrupleINHOUSE->caption() ?><?php echo ($patient_an_registration->QuadrupleINHOUSE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->QuadrupleINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_QuadrupleINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x_QuadrupleINHOUSE" id="x_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleINHOUSE->EditValue ?>"<?php echo $patient_an_registration->QuadrupleINHOUSE->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->QuadrupleINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
	<div id="r_QuadrupleREPORT" class="form-group row">
		<label id="elh_patient_an_registration_QuadrupleREPORT" for="x_QuadrupleREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_QuadrupleREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->QuadrupleREPORT->caption() ?><?php echo ($patient_an_registration->QuadrupleREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->QuadrupleREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_QuadrupleREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x_QuadrupleREPORT" id="x_QuadrupleREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->QuadrupleREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->QuadrupleREPORT->EditValue ?>"<?php echo $patient_an_registration->QuadrupleREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->QuadrupleREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A5month->Visible) { // A5month ?>
	<div id="r_A5month" class="form-group row">
		<label id="elh_patient_an_registration_A5month" for="x_A5month" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A5month" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A5month->caption() ?><?php echo ($patient_an_registration->A5month->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A5month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5month" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A5month">
<input type="text" data-table="patient_an_registration" data-field="x_A5month" name="x_A5month" id="x_A5month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5month->EditValue ?>"<?php echo $patient_an_registration->A5month->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->A5month->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A5monthDATE->Visible) { // A5monthDATE ?>
	<div id="r_A5monthDATE" class="form-group row">
		<label id="elh_patient_an_registration_A5monthDATE" for="x_A5monthDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A5monthDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A5monthDATE->caption() ?><?php echo ($patient_an_registration->A5monthDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A5monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A5monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x_A5monthDATE" id="x_A5monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthDATE->EditValue ?>"<?php echo $patient_an_registration->A5monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A5monthDATE->ReadOnly && !$patient_an_registration->A5monthDATE->Disabled && !isset($patient_an_registration->A5monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A5monthDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_A5monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->A5monthDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
	<div id="r_A5monthINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_A5monthINHOUSE" for="x_A5monthINHOUSE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A5monthINHOUSE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A5monthINHOUSE->caption() ?><?php echo ($patient_an_registration->A5monthINHOUSE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A5monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthINHOUSE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A5monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x_A5monthINHOUSE" id="x_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A5monthINHOUSE->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->A5monthINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A5monthREPORT->Visible) { // A5monthREPORT ?>
	<div id="r_A5monthREPORT" class="form-group row">
		<label id="elh_patient_an_registration_A5monthREPORT" for="x_A5monthREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A5monthREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A5monthREPORT->caption() ?><?php echo ($patient_an_registration->A5monthREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A5monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A5monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x_A5monthREPORT" id="x_A5monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A5monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A5monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A5monthREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->A5monthREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A7month->Visible) { // A7month ?>
	<div id="r_A7month" class="form-group row">
		<label id="elh_patient_an_registration_A7month" for="x_A7month" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A7month" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A7month->caption() ?><?php echo ($patient_an_registration->A7month->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A7month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7month" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A7month">
<input type="text" data-table="patient_an_registration" data-field="x_A7month" name="x_A7month" id="x_A7month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7month->EditValue ?>"<?php echo $patient_an_registration->A7month->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->A7month->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A7monthDATE->Visible) { // A7monthDATE ?>
	<div id="r_A7monthDATE" class="form-group row">
		<label id="elh_patient_an_registration_A7monthDATE" for="x_A7monthDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A7monthDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A7monthDATE->caption() ?><?php echo ($patient_an_registration->A7monthDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A7monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A7monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x_A7monthDATE" id="x_A7monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthDATE->EditValue ?>"<?php echo $patient_an_registration->A7monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A7monthDATE->ReadOnly && !$patient_an_registration->A7monthDATE->Disabled && !isset($patient_an_registration->A7monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A7monthDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_A7monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->A7monthDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
	<div id="r_A7monthINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_A7monthINHOUSE" for="x_A7monthINHOUSE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A7monthINHOUSE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A7monthINHOUSE->caption() ?><?php echo ($patient_an_registration->A7monthINHOUSE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A7monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthINHOUSE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A7monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x_A7monthINHOUSE" id="x_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A7monthINHOUSE->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->A7monthINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A7monthREPORT->Visible) { // A7monthREPORT ?>
	<div id="r_A7monthREPORT" class="form-group row">
		<label id="elh_patient_an_registration_A7monthREPORT" for="x_A7monthREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A7monthREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A7monthREPORT->caption() ?><?php echo ($patient_an_registration->A7monthREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A7monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A7monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x_A7monthREPORT" id="x_A7monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A7monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A7monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A7monthREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->A7monthREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A9month->Visible) { // A9month ?>
	<div id="r_A9month" class="form-group row">
		<label id="elh_patient_an_registration_A9month" for="x_A9month" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A9month" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A9month->caption() ?><?php echo ($patient_an_registration->A9month->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A9month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9month" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A9month">
<input type="text" data-table="patient_an_registration" data-field="x_A9month" name="x_A9month" id="x_A9month" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9month->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9month->EditValue ?>"<?php echo $patient_an_registration->A9month->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->A9month->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A9monthDATE->Visible) { // A9monthDATE ?>
	<div id="r_A9monthDATE" class="form-group row">
		<label id="elh_patient_an_registration_A9monthDATE" for="x_A9monthDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A9monthDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A9monthDATE->caption() ?><?php echo ($patient_an_registration->A9monthDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A9monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A9monthDATE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x_A9monthDATE" id="x_A9monthDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthDATE->EditValue ?>"<?php echo $patient_an_registration->A9monthDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->A9monthDATE->ReadOnly && !$patient_an_registration->A9monthDATE->Disabled && !isset($patient_an_registration->A9monthDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->A9monthDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_A9monthDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->A9monthDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
	<div id="r_A9monthINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_A9monthINHOUSE" for="x_A9monthINHOUSE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A9monthINHOUSE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A9monthINHOUSE->caption() ?><?php echo ($patient_an_registration->A9monthINHOUSE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A9monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthINHOUSE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A9monthINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x_A9monthINHOUSE" id="x_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthINHOUSE->EditValue ?>"<?php echo $patient_an_registration->A9monthINHOUSE->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->A9monthINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->A9monthREPORT->Visible) { // A9monthREPORT ?>
	<div id="r_A9monthREPORT" class="form-group row">
		<label id="elh_patient_an_registration_A9monthREPORT" for="x_A9monthREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_A9monthREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->A9monthREPORT->caption() ?><?php echo ($patient_an_registration->A9monthREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->A9monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_A9monthREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x_A9monthREPORT" id="x_A9monthREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->A9monthREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->A9monthREPORT->EditValue ?>"<?php echo $patient_an_registration->A9monthREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->A9monthREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->INJ->Visible) { // INJ ?>
	<div id="r_INJ" class="form-group row">
		<label id="elh_patient_an_registration_INJ" for="x_INJ" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_INJ" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->INJ->caption() ?><?php echo ($patient_an_registration->INJ->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->INJ->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJ" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_INJ">
<input type="text" data-table="patient_an_registration" data-field="x_INJ" name="x_INJ" id="x_INJ" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJ->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJ->EditValue ?>"<?php echo $patient_an_registration->INJ->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->INJ->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->INJDATE->Visible) { // INJDATE ?>
	<div id="r_INJDATE" class="form-group row">
		<label id="elh_patient_an_registration_INJDATE" for="x_INJDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_INJDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->INJDATE->caption() ?><?php echo ($patient_an_registration->INJDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->INJDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_INJDATE">
<input type="text" data-table="patient_an_registration" data-field="x_INJDATE" name="x_INJDATE" id="x_INJDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJDATE->EditValue ?>"<?php echo $patient_an_registration->INJDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->INJDATE->ReadOnly && !$patient_an_registration->INJDATE->Disabled && !isset($patient_an_registration->INJDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->INJDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_INJDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->INJDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->INJINHOUSE->Visible) { // INJINHOUSE ?>
	<div id="r_INJINHOUSE" class="form-group row">
		<label id="elh_patient_an_registration_INJINHOUSE" for="x_INJINHOUSE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_INJINHOUSE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->INJINHOUSE->caption() ?><?php echo ($patient_an_registration->INJINHOUSE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->INJINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJINHOUSE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_INJINHOUSE">
<input type="text" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x_INJINHOUSE" id="x_INJINHOUSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJINHOUSE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJINHOUSE->EditValue ?>"<?php echo $patient_an_registration->INJINHOUSE->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->INJINHOUSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->INJREPORT->Visible) { // INJREPORT ?>
	<div id="r_INJREPORT" class="form-group row">
		<label id="elh_patient_an_registration_INJREPORT" for="x_INJREPORT" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_INJREPORT" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->INJREPORT->caption() ?><?php echo ($patient_an_registration->INJREPORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->INJREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJREPORT" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_INJREPORT">
<input type="text" data-table="patient_an_registration" data-field="x_INJREPORT" name="x_INJREPORT" id="x_INJREPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->INJREPORT->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->INJREPORT->EditValue ?>"<?php echo $patient_an_registration->INJREPORT->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->INJREPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Bleeding->Visible) { // Bleeding ?>
	<div id="r_Bleeding" class="form-group row">
		<label id="elh_patient_an_registration_Bleeding" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Bleeding" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Bleeding->caption() ?><?php echo ($patient_an_registration->Bleeding->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Bleeding->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Bleeding" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Bleeding">
<div id="tp_x_Bleeding" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_Bleeding" data-value-separator="<?php echo $patient_an_registration->Bleeding->displayValueSeparatorAttribute() ?>" name="x_Bleeding[]" id="x_Bleeding[]" value="{value}"<?php echo $patient_an_registration->Bleeding->editAttributes() ?>></div>
<div id="dsl_x_Bleeding" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->Bleeding->checkBoxListHtml(FALSE, "x_Bleeding[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_an_registration->Bleeding->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Hypothyroidism->Visible) { // Hypothyroidism ?>
	<div id="r_Hypothyroidism" class="form-group row">
		<label id="elh_patient_an_registration_Hypothyroidism" for="x_Hypothyroidism" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Hypothyroidism" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Hypothyroidism->caption() ?><?php echo ($patient_an_registration->Hypothyroidism->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Hypothyroidism->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Hypothyroidism" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Hypothyroidism">
<input type="text" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x_Hypothyroidism" id="x_Hypothyroidism" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Hypothyroidism->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Hypothyroidism->EditValue ?>"<?php echo $patient_an_registration->Hypothyroidism->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Hypothyroidism->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->PICMENumber->Visible) { // PICMENumber ?>
	<div id="r_PICMENumber" class="form-group row">
		<label id="elh_patient_an_registration_PICMENumber" for="x_PICMENumber" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PICMENumber" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->PICMENumber->caption() ?><?php echo ($patient_an_registration->PICMENumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->PICMENumber->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PICMENumber" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_PICMENumber">
<input type="text" data-table="patient_an_registration" data-field="x_PICMENumber" name="x_PICMENumber" id="x_PICMENumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PICMENumber->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PICMENumber->EditValue ?>"<?php echo $patient_an_registration->PICMENumber->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->PICMENumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Outcome->Visible) { // Outcome ?>
	<div id="r_Outcome" class="form-group row">
		<label id="elh_patient_an_registration_Outcome" for="x_Outcome" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Outcome" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Outcome->caption() ?><?php echo ($patient_an_registration->Outcome->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Outcome->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Outcome" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Outcome">
<input type="text" data-table="patient_an_registration" data-field="x_Outcome" name="x_Outcome" id="x_Outcome" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Outcome->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Outcome->EditValue ?>"<?php echo $patient_an_registration->Outcome->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Outcome->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->DateofAdmission->Visible) { // DateofAdmission ?>
	<div id="r_DateofAdmission" class="form-group row">
		<label id="elh_patient_an_registration_DateofAdmission" for="x_DateofAdmission" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DateofAdmission" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->DateofAdmission->caption() ?><?php echo ($patient_an_registration->DateofAdmission->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->DateofAdmission->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DateofAdmission" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_DateofAdmission">
<input type="text" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x_DateofAdmission" id="x_DateofAdmission" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DateofAdmission->EditValue ?>"<?php echo $patient_an_registration->DateofAdmission->editAttributes() ?>>
<?php if (!$patient_an_registration->DateofAdmission->ReadOnly && !$patient_an_registration->DateofAdmission->Disabled && !isset($patient_an_registration->DateofAdmission->EditAttrs["readonly"]) && !isset($patient_an_registration->DateofAdmission->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->DateofAdmission->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->DateodProcedure->Visible) { // DateodProcedure ?>
	<div id="r_DateodProcedure" class="form-group row">
		<label id="elh_patient_an_registration_DateodProcedure" for="x_DateodProcedure" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_DateodProcedure" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->DateodProcedure->caption() ?><?php echo ($patient_an_registration->DateodProcedure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->DateodProcedure->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DateodProcedure" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_DateodProcedure">
<input type="text" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x_DateodProcedure" id="x_DateodProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->DateodProcedure->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->DateodProcedure->EditValue ?>"<?php echo $patient_an_registration->DateodProcedure->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->DateodProcedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Miscarriage->Visible) { // Miscarriage ?>
	<div id="r_Miscarriage" class="form-group row">
		<label id="elh_patient_an_registration_Miscarriage" for="x_Miscarriage" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Miscarriage" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Miscarriage->caption() ?><?php echo ($patient_an_registration->Miscarriage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Miscarriage->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Miscarriage" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Miscarriage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Miscarriage" data-value-separator="<?php echo $patient_an_registration->Miscarriage->displayValueSeparatorAttribute() ?>" id="x_Miscarriage" name="x_Miscarriage"<?php echo $patient_an_registration->Miscarriage->editAttributes() ?>>
		<?php echo $patient_an_registration->Miscarriage->selectOptionListHtml("x_Miscarriage") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->Miscarriage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
	<div id="r_ModeOfDelivery" class="form-group row">
		<label id="elh_patient_an_registration_ModeOfDelivery" for="x_ModeOfDelivery" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ModeOfDelivery" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ModeOfDelivery->caption() ?><?php echo ($patient_an_registration->ModeOfDelivery->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ModeOfDelivery->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ModeOfDelivery" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ModeOfDelivery">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ModeOfDelivery" data-value-separator="<?php echo $patient_an_registration->ModeOfDelivery->displayValueSeparatorAttribute() ?>" id="x_ModeOfDelivery" name="x_ModeOfDelivery"<?php echo $patient_an_registration->ModeOfDelivery->editAttributes() ?>>
		<?php echo $patient_an_registration->ModeOfDelivery->selectOptionListHtml("x_ModeOfDelivery") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->ModeOfDelivery->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ND->Visible) { // ND ?>
	<div id="r_ND" class="form-group row">
		<label id="elh_patient_an_registration_ND" for="x_ND" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ND" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ND->caption() ?><?php echo ($patient_an_registration->ND->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ND->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ND" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ND">
<input type="text" data-table="patient_an_registration" data-field="x_ND" name="x_ND" id="x_ND" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ND->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ND->EditValue ?>"<?php echo $patient_an_registration->ND->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->ND->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->NDS->Visible) { // NDS ?>
	<div id="r_NDS" class="form-group row">
		<label id="elh_patient_an_registration_NDS" for="x_NDS" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NDS" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->NDS->caption() ?><?php echo ($patient_an_registration->NDS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->NDS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NDS" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_NDS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDS" data-value-separator="<?php echo $patient_an_registration->NDS->displayValueSeparatorAttribute() ?>" id="x_NDS" name="x_NDS"<?php echo $patient_an_registration->NDS->editAttributes() ?>>
		<?php echo $patient_an_registration->NDS->selectOptionListHtml("x_NDS") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->NDS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->NDP->Visible) { // NDP ?>
	<div id="r_NDP" class="form-group row">
		<label id="elh_patient_an_registration_NDP" for="x_NDP" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NDP" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->NDP->caption() ?><?php echo ($patient_an_registration->NDP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->NDP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NDP" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_NDP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_NDP" data-value-separator="<?php echo $patient_an_registration->NDP->displayValueSeparatorAttribute() ?>" id="x_NDP" name="x_NDP"<?php echo $patient_an_registration->NDP->editAttributes() ?>>
		<?php echo $patient_an_registration->NDP->selectOptionListHtml("x_NDP") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->NDP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Vaccum->Visible) { // Vaccum ?>
	<div id="r_Vaccum" class="form-group row">
		<label id="elh_patient_an_registration_Vaccum" for="x_Vaccum" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Vaccum" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Vaccum->caption() ?><?php echo ($patient_an_registration->Vaccum->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Vaccum->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Vaccum" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Vaccum">
<input type="text" data-table="patient_an_registration" data-field="x_Vaccum" name="x_Vaccum" id="x_Vaccum" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Vaccum->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Vaccum->EditValue ?>"<?php echo $patient_an_registration->Vaccum->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Vaccum->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->VaccumS->Visible) { // VaccumS ?>
	<div id="r_VaccumS" class="form-group row">
		<label id="elh_patient_an_registration_VaccumS" for="x_VaccumS" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_VaccumS" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->VaccumS->caption() ?><?php echo ($patient_an_registration->VaccumS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->VaccumS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_VaccumS" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_VaccumS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumS" data-value-separator="<?php echo $patient_an_registration->VaccumS->displayValueSeparatorAttribute() ?>" id="x_VaccumS" name="x_VaccumS"<?php echo $patient_an_registration->VaccumS->editAttributes() ?>>
		<?php echo $patient_an_registration->VaccumS->selectOptionListHtml("x_VaccumS") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->VaccumS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->VaccumP->Visible) { // VaccumP ?>
	<div id="r_VaccumP" class="form-group row">
		<label id="elh_patient_an_registration_VaccumP" for="x_VaccumP" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_VaccumP" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->VaccumP->caption() ?><?php echo ($patient_an_registration->VaccumP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->VaccumP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_VaccumP" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_VaccumP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_VaccumP" data-value-separator="<?php echo $patient_an_registration->VaccumP->displayValueSeparatorAttribute() ?>" id="x_VaccumP" name="x_VaccumP"<?php echo $patient_an_registration->VaccumP->editAttributes() ?>>
		<?php echo $patient_an_registration->VaccumP->selectOptionListHtml("x_VaccumP") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->VaccumP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Forceps->Visible) { // Forceps ?>
	<div id="r_Forceps" class="form-group row">
		<label id="elh_patient_an_registration_Forceps" for="x_Forceps" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Forceps" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Forceps->caption() ?><?php echo ($patient_an_registration->Forceps->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Forceps->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Forceps" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Forceps">
<input type="text" data-table="patient_an_registration" data-field="x_Forceps" name="x_Forceps" id="x_Forceps" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Forceps->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Forceps->EditValue ?>"<?php echo $patient_an_registration->Forceps->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Forceps->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ForcepsS->Visible) { // ForcepsS ?>
	<div id="r_ForcepsS" class="form-group row">
		<label id="elh_patient_an_registration_ForcepsS" for="x_ForcepsS" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ForcepsS" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ForcepsS->caption() ?><?php echo ($patient_an_registration->ForcepsS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ForcepsS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ForcepsS" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ForcepsS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsS" data-value-separator="<?php echo $patient_an_registration->ForcepsS->displayValueSeparatorAttribute() ?>" id="x_ForcepsS" name="x_ForcepsS"<?php echo $patient_an_registration->ForcepsS->editAttributes() ?>>
		<?php echo $patient_an_registration->ForcepsS->selectOptionListHtml("x_ForcepsS") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->ForcepsS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ForcepsP->Visible) { // ForcepsP ?>
	<div id="r_ForcepsP" class="form-group row">
		<label id="elh_patient_an_registration_ForcepsP" for="x_ForcepsP" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ForcepsP" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ForcepsP->caption() ?><?php echo ($patient_an_registration->ForcepsP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ForcepsP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ForcepsP" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ForcepsP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ForcepsP" data-value-separator="<?php echo $patient_an_registration->ForcepsP->displayValueSeparatorAttribute() ?>" id="x_ForcepsP" name="x_ForcepsP"<?php echo $patient_an_registration->ForcepsP->editAttributes() ?>>
		<?php echo $patient_an_registration->ForcepsP->selectOptionListHtml("x_ForcepsP") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->ForcepsP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Elective->Visible) { // Elective ?>
	<div id="r_Elective" class="form-group row">
		<label id="elh_patient_an_registration_Elective" for="x_Elective" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Elective" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Elective->caption() ?><?php echo ($patient_an_registration->Elective->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Elective->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Elective" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Elective">
<input type="text" data-table="patient_an_registration" data-field="x_Elective" name="x_Elective" id="x_Elective" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Elective->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Elective->EditValue ?>"<?php echo $patient_an_registration->Elective->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Elective->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ElectiveS->Visible) { // ElectiveS ?>
	<div id="r_ElectiveS" class="form-group row">
		<label id="elh_patient_an_registration_ElectiveS" for="x_ElectiveS" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ElectiveS" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ElectiveS->caption() ?><?php echo ($patient_an_registration->ElectiveS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ElectiveS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ElectiveS" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ElectiveS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveS" data-value-separator="<?php echo $patient_an_registration->ElectiveS->displayValueSeparatorAttribute() ?>" id="x_ElectiveS" name="x_ElectiveS"<?php echo $patient_an_registration->ElectiveS->editAttributes() ?>>
		<?php echo $patient_an_registration->ElectiveS->selectOptionListHtml("x_ElectiveS") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->ElectiveS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ElectiveP->Visible) { // ElectiveP ?>
	<div id="r_ElectiveP" class="form-group row">
		<label id="elh_patient_an_registration_ElectiveP" for="x_ElectiveP" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ElectiveP" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ElectiveP->caption() ?><?php echo ($patient_an_registration->ElectiveP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ElectiveP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ElectiveP" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ElectiveP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_ElectiveP" data-value-separator="<?php echo $patient_an_registration->ElectiveP->displayValueSeparatorAttribute() ?>" id="x_ElectiveP" name="x_ElectiveP"<?php echo $patient_an_registration->ElectiveP->editAttributes() ?>>
		<?php echo $patient_an_registration->ElectiveP->selectOptionListHtml("x_ElectiveP") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->ElectiveP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Emergency->Visible) { // Emergency ?>
	<div id="r_Emergency" class="form-group row">
		<label id="elh_patient_an_registration_Emergency" for="x_Emergency" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Emergency" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Emergency->caption() ?><?php echo ($patient_an_registration->Emergency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Emergency->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Emergency" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Emergency">
<input type="text" data-table="patient_an_registration" data-field="x_Emergency" name="x_Emergency" id="x_Emergency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Emergency->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Emergency->EditValue ?>"<?php echo $patient_an_registration->Emergency->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Emergency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->EmergencyS->Visible) { // EmergencyS ?>
	<div id="r_EmergencyS" class="form-group row">
		<label id="elh_patient_an_registration_EmergencyS" for="x_EmergencyS" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EmergencyS" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->EmergencyS->caption() ?><?php echo ($patient_an_registration->EmergencyS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->EmergencyS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EmergencyS" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_EmergencyS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyS" data-value-separator="<?php echo $patient_an_registration->EmergencyS->displayValueSeparatorAttribute() ?>" id="x_EmergencyS" name="x_EmergencyS"<?php echo $patient_an_registration->EmergencyS->editAttributes() ?>>
		<?php echo $patient_an_registration->EmergencyS->selectOptionListHtml("x_EmergencyS") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->EmergencyS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->EmergencyP->Visible) { // EmergencyP ?>
	<div id="r_EmergencyP" class="form-group row">
		<label id="elh_patient_an_registration_EmergencyP" for="x_EmergencyP" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_EmergencyP" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->EmergencyP->caption() ?><?php echo ($patient_an_registration->EmergencyP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->EmergencyP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EmergencyP" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_EmergencyP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_EmergencyP" data-value-separator="<?php echo $patient_an_registration->EmergencyP->displayValueSeparatorAttribute() ?>" id="x_EmergencyP" name="x_EmergencyP"<?php echo $patient_an_registration->EmergencyP->editAttributes() ?>>
		<?php echo $patient_an_registration->EmergencyP->selectOptionListHtml("x_EmergencyP") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->EmergencyP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Maturity->Visible) { // Maturity ?>
	<div id="r_Maturity" class="form-group row">
		<label id="elh_patient_an_registration_Maturity" for="x_Maturity" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Maturity" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Maturity->caption() ?><?php echo ($patient_an_registration->Maturity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Maturity->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Maturity" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Maturity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_Maturity" data-value-separator="<?php echo $patient_an_registration->Maturity->displayValueSeparatorAttribute() ?>" id="x_Maturity" name="x_Maturity"<?php echo $patient_an_registration->Maturity->editAttributes() ?>>
		<?php echo $patient_an_registration->Maturity->selectOptionListHtml("x_Maturity") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->Maturity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Baby1->Visible) { // Baby1 ?>
	<div id="r_Baby1" class="form-group row">
		<label id="elh_patient_an_registration_Baby1" for="x_Baby1" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Baby1" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Baby1->caption() ?><?php echo ($patient_an_registration->Baby1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Baby1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Baby1" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Baby1">
<input type="text" data-table="patient_an_registration" data-field="x_Baby1" name="x_Baby1" id="x_Baby1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Baby1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Baby1->EditValue ?>"<?php echo $patient_an_registration->Baby1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Baby1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Baby2->Visible) { // Baby2 ?>
	<div id="r_Baby2" class="form-group row">
		<label id="elh_patient_an_registration_Baby2" for="x_Baby2" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Baby2" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Baby2->caption() ?><?php echo ($patient_an_registration->Baby2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Baby2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Baby2" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Baby2">
<input type="text" data-table="patient_an_registration" data-field="x_Baby2" name="x_Baby2" id="x_Baby2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Baby2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Baby2->EditValue ?>"<?php echo $patient_an_registration->Baby2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Baby2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->sex1->Visible) { // sex1 ?>
	<div id="r_sex1" class="form-group row">
		<label id="elh_patient_an_registration_sex1" for="x_sex1" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_sex1" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->sex1->caption() ?><?php echo ($patient_an_registration->sex1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->sex1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_sex1" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_sex1">
<input type="text" data-table="patient_an_registration" data-field="x_sex1" name="x_sex1" id="x_sex1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->sex1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->sex1->EditValue ?>"<?php echo $patient_an_registration->sex1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->sex1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->sex2->Visible) { // sex2 ?>
	<div id="r_sex2" class="form-group row">
		<label id="elh_patient_an_registration_sex2" for="x_sex2" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_sex2" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->sex2->caption() ?><?php echo ($patient_an_registration->sex2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->sex2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_sex2" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_sex2">
<input type="text" data-table="patient_an_registration" data-field="x_sex2" name="x_sex2" id="x_sex2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->sex2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->sex2->EditValue ?>"<?php echo $patient_an_registration->sex2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->sex2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->weight1->Visible) { // weight1 ?>
	<div id="r_weight1" class="form-group row">
		<label id="elh_patient_an_registration_weight1" for="x_weight1" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_weight1" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->weight1->caption() ?><?php echo ($patient_an_registration->weight1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->weight1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_weight1" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_weight1">
<input type="text" data-table="patient_an_registration" data-field="x_weight1" name="x_weight1" id="x_weight1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->weight1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->weight1->EditValue ?>"<?php echo $patient_an_registration->weight1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->weight1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->weight2->Visible) { // weight2 ?>
	<div id="r_weight2" class="form-group row">
		<label id="elh_patient_an_registration_weight2" for="x_weight2" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_weight2" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->weight2->caption() ?><?php echo ($patient_an_registration->weight2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->weight2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_weight2" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_weight2">
<input type="text" data-table="patient_an_registration" data-field="x_weight2" name="x_weight2" id="x_weight2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->weight2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->weight2->EditValue ?>"<?php echo $patient_an_registration->weight2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->weight2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->NICU1->Visible) { // NICU1 ?>
	<div id="r_NICU1" class="form-group row">
		<label id="elh_patient_an_registration_NICU1" for="x_NICU1" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NICU1" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->NICU1->caption() ?><?php echo ($patient_an_registration->NICU1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->NICU1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NICU1" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_NICU1">
<input type="text" data-table="patient_an_registration" data-field="x_NICU1" name="x_NICU1" id="x_NICU1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NICU1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NICU1->EditValue ?>"<?php echo $patient_an_registration->NICU1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->NICU1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->NICU2->Visible) { // NICU2 ?>
	<div id="r_NICU2" class="form-group row">
		<label id="elh_patient_an_registration_NICU2" for="x_NICU2" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_NICU2" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->NICU2->caption() ?><?php echo ($patient_an_registration->NICU2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->NICU2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NICU2" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_NICU2">
<input type="text" data-table="patient_an_registration" data-field="x_NICU2" name="x_NICU2" id="x_NICU2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->NICU2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->NICU2->EditValue ?>"<?php echo $patient_an_registration->NICU2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->NICU2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Jaundice1->Visible) { // Jaundice1 ?>
	<div id="r_Jaundice1" class="form-group row">
		<label id="elh_patient_an_registration_Jaundice1" for="x_Jaundice1" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Jaundice1" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Jaundice1->caption() ?><?php echo ($patient_an_registration->Jaundice1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Jaundice1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Jaundice1" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Jaundice1">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice1" name="x_Jaundice1" id="x_Jaundice1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Jaundice1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Jaundice1->EditValue ?>"<?php echo $patient_an_registration->Jaundice1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Jaundice1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Jaundice2->Visible) { // Jaundice2 ?>
	<div id="r_Jaundice2" class="form-group row">
		<label id="elh_patient_an_registration_Jaundice2" for="x_Jaundice2" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Jaundice2" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Jaundice2->caption() ?><?php echo ($patient_an_registration->Jaundice2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Jaundice2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Jaundice2" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Jaundice2">
<input type="text" data-table="patient_an_registration" data-field="x_Jaundice2" name="x_Jaundice2" id="x_Jaundice2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Jaundice2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Jaundice2->EditValue ?>"<?php echo $patient_an_registration->Jaundice2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Jaundice2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Others1->Visible) { // Others1 ?>
	<div id="r_Others1" class="form-group row">
		<label id="elh_patient_an_registration_Others1" for="x_Others1" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Others1" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Others1->caption() ?><?php echo ($patient_an_registration->Others1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Others1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Others1" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Others1">
<input type="text" data-table="patient_an_registration" data-field="x_Others1" name="x_Others1" id="x_Others1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Others1->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Others1->EditValue ?>"<?php echo $patient_an_registration->Others1->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Others1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->Others2->Visible) { // Others2 ?>
	<div id="r_Others2" class="form-group row">
		<label id="elh_patient_an_registration_Others2" for="x_Others2" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_Others2" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->Others2->caption() ?><?php echo ($patient_an_registration->Others2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->Others2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Others2" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_Others2">
<input type="text" data-table="patient_an_registration" data-field="x_Others2" name="x_Others2" id="x_Others2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->Others2->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->Others2->EditValue ?>"<?php echo $patient_an_registration->Others2->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->Others2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->SpillOverReasons->Visible) { // SpillOverReasons ?>
	<div id="r_SpillOverReasons" class="form-group row">
		<label id="elh_patient_an_registration_SpillOverReasons" for="x_SpillOverReasons" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_SpillOverReasons" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->SpillOverReasons->caption() ?><?php echo ($patient_an_registration->SpillOverReasons->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->SpillOverReasons->cellAttributes() ?>>
<script id="tpx_patient_an_registration_SpillOverReasons" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_SpillOverReasons">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_an_registration" data-field="x_SpillOverReasons" data-value-separator="<?php echo $patient_an_registration->SpillOverReasons->displayValueSeparatorAttribute() ?>" id="x_SpillOverReasons" name="x_SpillOverReasons"<?php echo $patient_an_registration->SpillOverReasons->editAttributes() ?>>
		<?php echo $patient_an_registration->SpillOverReasons->selectOptionListHtml("x_SpillOverReasons") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_an_registration->SpillOverReasons->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ANClosed->Visible) { // ANClosed ?>
	<div id="r_ANClosed" class="form-group row">
		<label id="elh_patient_an_registration_ANClosed" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANClosed" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ANClosed->caption() ?><?php echo ($patient_an_registration->ANClosed->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ANClosed->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANClosed" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ANClosed">
<div id="tp_x_ANClosed" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_an_registration" data-field="x_ANClosed" data-value-separator="<?php echo $patient_an_registration->ANClosed->displayValueSeparatorAttribute() ?>" name="x_ANClosed[]" id="x_ANClosed[]" value="{value}"<?php echo $patient_an_registration->ANClosed->editAttributes() ?>></div>
<div id="dsl_x_ANClosed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_an_registration->ANClosed->checkBoxListHtml(FALSE, "x_ANClosed[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_an_registration->ANClosed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ANClosedDATE->Visible) { // ANClosedDATE ?>
	<div id="r_ANClosedDATE" class="form-group row">
		<label id="elh_patient_an_registration_ANClosedDATE" for="x_ANClosedDATE" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ANClosedDATE" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ANClosedDATE->caption() ?><?php echo ($patient_an_registration->ANClosedDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ANClosedDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANClosedDATE" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ANClosedDATE">
<input type="text" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x_ANClosedDATE" id="x_ANClosedDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ANClosedDATE->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ANClosedDATE->EditValue ?>"<?php echo $patient_an_registration->ANClosedDATE->editAttributes() ?>>
<?php if (!$patient_an_registration->ANClosedDATE->ReadOnly && !$patient_an_registration->ANClosedDATE->Disabled && !isset($patient_an_registration->ANClosedDATE->EditAttrs["readonly"]) && !isset($patient_an_registration->ANClosedDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_ANClosedDATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_an_registration->ANClosedDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
	<div id="r_PastMedicalHistoryOthers" class="form-group row">
		<label id="elh_patient_an_registration_PastMedicalHistoryOthers" for="x_PastMedicalHistoryOthers" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->PastMedicalHistoryOthers->caption() ?><?php echo ($patient_an_registration->PastMedicalHistoryOthers->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->PastMedicalHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_PastMedicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x_PastMedicalHistoryOthers" id="x_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PastMedicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->PastMedicalHistoryOthers->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->PastMedicalHistoryOthers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
	<div id="r_PastSurgicalHistoryOthers" class="form-group row">
		<label id="elh_patient_an_registration_PastSurgicalHistoryOthers" for="x_PastSurgicalHistoryOthers" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->PastSurgicalHistoryOthers->caption() ?><?php echo ($patient_an_registration->PastSurgicalHistoryOthers->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->PastSurgicalHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_PastSurgicalHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x_PastSurgicalHistoryOthers" id="x_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->PastSurgicalHistoryOthers->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->PastSurgicalHistoryOthers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
	<div id="r_FamilyHistoryOthers" class="form-group row">
		<label id="elh_patient_an_registration_FamilyHistoryOthers" for="x_FamilyHistoryOthers" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_FamilyHistoryOthers" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->FamilyHistoryOthers->caption() ?><?php echo ($patient_an_registration->FamilyHistoryOthers->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->FamilyHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_FamilyHistoryOthers" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_FamilyHistoryOthers">
<input type="text" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x_FamilyHistoryOthers" id="x_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->FamilyHistoryOthers->EditValue ?>"<?php echo $patient_an_registration->FamilyHistoryOthers->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->FamilyHistoryOthers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
	<div id="r_PresentPregnancyComplicationsOthers" class="form-group row">
		<label id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" for="x_PresentPregnancyComplicationsOthers" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->caption() ?><?php echo ($patient_an_registration->PresentPregnancyComplicationsOthers->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_PresentPregnancyComplicationsOthers">
<input type="text" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x_PresentPregnancyComplicationsOthers" id="x_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->EditValue ?>"<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->editAttributes() ?>>
</span>
</script>
<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_an_registration->ETdate->Visible) { // ETdate ?>
	<div id="r_ETdate" class="form-group row">
		<label id="elh_patient_an_registration_ETdate" for="x_ETdate" class="<?php echo $patient_an_registration_edit->LeftColumnClass ?>"><script id="tpc_patient_an_registration_ETdate" class="patient_an_registrationedit" type="text/html"><span><?php echo $patient_an_registration->ETdate->caption() ?><?php echo ($patient_an_registration->ETdate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_an_registration_edit->RightColumnClass ?>"><div<?php echo $patient_an_registration->ETdate->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ETdate" class="patient_an_registrationedit" type="text/html">
<span id="el_patient_an_registration_ETdate">
<input type="text" data-table="patient_an_registration" data-field="x_ETdate" name="x_ETdate" id="x_ETdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_an_registration->ETdate->getPlaceHolder()) ?>" value="<?php echo $patient_an_registration->ETdate->EditValue ?>"<?php echo $patient_an_registration->ETdate->editAttributes() ?>>
<?php if (!$patient_an_registration->ETdate->ReadOnly && !$patient_an_registration->ETdate->Disabled && !isset($patient_an_registration->ETdate->EditAttrs["readonly"]) && !isset($patient_an_registration->ETdate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_an_registrationedit_js">
ew.createDateTimePicker("fpatient_an_registrationedit", "x_ETdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $patient_an_registration->ETdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_an_registrationedit" class="ew-custom-template"></div>
<script id="tpm_patient_an_registrationedit" type="text/html">
<div id="ct_patient_an_registration_edit"><style>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_G"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_G"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_P"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_P"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_L"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_L"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_A"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_A"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_E"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_E"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_M"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_M"/}}</span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_LMP"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_LMP"/}}</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ETdate"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_ETdate"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_EDO"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_EDO"/}}</span>
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_MenstrualHistory"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_MenstrualHistory"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ObstetricHistory"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_ObstetricHistory"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofGDM"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PreviousHistoryofGDM"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistorofPIH"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PreviousHistorofPIH"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofIUGR"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PreviousHistoryofIUGR"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofOligohydramnios"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PreviousHistoryofOligohydramnios"/}}</span>
				</td>
				<td>				
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofPreterm"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PreviousHistoryofPreterm"/}}</span>
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
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_G1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DeliveryNDLSCS1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_BabySexweight1"/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_G2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DeliveryNDLSCS2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_BabySexweight2"/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">3</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_G3"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DeliveryNDLSCS3"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_BabySexweight3"/}}</span></td>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastMedicalHistory"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PastMedicalHistory"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastMedicalHistoryOthers"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PastMedicalHistoryOthers"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastSurgicalHistory"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PastSurgicalHistory"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastSurgicalHistoryOthers"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PastSurgicalHistoryOthers"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_FamilyHistory"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_FamilyHistory"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_FamilyHistoryOthers"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_FamilyHistoryOthers"/}}</span>
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
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ViabilityDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ViabilityREPORT"/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Viability2</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_Viability2DATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_Viability2REPORT"/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">NTscan</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_NTscanDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_NTscanREPORT"/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">EarlyTarget</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_EarlyTargetDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_EarlyTargetREPORT"/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Anomaly</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_AnomalyDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_AnomalyREPORT"/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Growth</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_GrowthDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_GrowthREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Growth1</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_Growth1DATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_Growth1REPORT"/}}</span></td>
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
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ANProfileDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ANProfileINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ANProfileREPORT"/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Dual Marker</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DualMarkerDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DualMarkerINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DualMarkerREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Quadruple Marker</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_QuadrupleDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_QuadrupleINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_QuadrupleREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">5 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A5monthDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A5monthINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A5monthREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">7 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A7monthDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A7monthINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A7monthREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">9 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A9monthDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A9monthINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A9monthREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Inj Dexamethasone</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_INJDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_INJINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_INJREPORT"/}}</span></td>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Bleeding"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Bleeding"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PresentPregnancyComplicationsOthers"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PresentPregnancyComplicationsOthers"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PICMENumber"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PICMENumber"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Outcome"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Outcome"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		 <tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_DateofAdmission"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_DateofAdmission"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_DateodProcedure"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_DateodProcedure"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Miscarriage"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Miscarriage"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ModeOfDelivery"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_ModeOfDelivery"/}}</span>
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
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_NDS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_NDP"/}}</span></td>
		</tr> 
		<tr>
				<td><span class="ew-cell">Vaccum D</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_VaccumS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_VaccumP"/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">Forceps D</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ForcepsS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ForcepsP"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Elective LSCS</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ElectiveS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ElectiveP"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Emergency LSCS</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_EmergencyS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_EmergencyP"/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
</div>
{{include tmpl="#tpc_patient_an_registration_Maturity"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Maturity"/}}
<div class="card-body">
Paediatric : 
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">1</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Baby1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Baby1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_sex1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_sex1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_weight1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_weight1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_NICU1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_NICU1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Jaundice1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Jaundice1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Others1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Others1"/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Baby2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Baby2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_sex2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_sex2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_weight2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_weight2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_NICU2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_NICU2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Jaundice2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Jaundice2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Others2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Others2"/}}</span></td>
		</tr> 
	</tbody>
</table>
 <!-- /.card-body -->
</div>
{{include tmpl="#tpc_patient_an_registration_SpillOverReasons"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_SpillOverReasons"/}}
{{include tmpl="#tpc_patient_an_registration_ANClosed"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_ANClosed"/}}
{{include tmpl="#tpc_patient_an_registration_ANClosedDATE"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_ANClosedDATE"/}}
		</div>
	</div>
</div>
</div>
</script>
<?php if (!$patient_an_registration_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_an_registration_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_an_registration_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_an_registration->Rows) ?> };
ew.applyTemplate("tpd_patient_an_registrationedit", "tpm_patient_an_registrationedit", "patient_an_registrationedit", "<?php echo $patient_an_registration->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_an_registrationedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_an_registration_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_an_registration_edit->terminate();
?>